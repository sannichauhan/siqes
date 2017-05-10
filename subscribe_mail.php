<?php
//error_reporting(0);
require_once('config/connection.php'); 
$obj = new Connection();
include("classes/mailerClass.php");
	
	if(isset($_REQUEST['Submit']) and $_REQUEST['Submit']=='Submit')
	{
		$user_email=$_POST['email'];
		$sql1=mysql_query("select * from  sqs_subscribe where subs_email='".$user_email."' and status='1'") or die();
		$chk_qur = mysql_num_rows($sql1);
		if($chk_qur > 0)
		{
			echo "<script>alert('You have already subscribed for this email Id.');</script>";
			echo "<script>window.location.href='index.php'</script>";
			
		}
		else
		{ 
			$current_id='';
			$id='';
			$Query=mysql_query("select * from  sqs_subscribe where subs_email='".$user_email."'") or die();
			$queryRes=mysql_fetch_array($Query);
			$userid=$queryRes['id'];
			$Check = mysql_num_rows($Query);
			 if($Check>0)
			 {
				$sql=mysql_query("update sqs_subscribe set subs_email='".$user_email."' where id='".$userid."'") or die();
				$id= $userid;
				$current_id=base64_encode($id);
				if($sql)
				{
					$success = sendMailUser($current_id,$user_email);
					
					if($success==1)
					{
						echo "<script>alert('Thanks for subscribing to SIQES, Please confirm email Id.');</script>";
						echo "<script>window.location.href='index.php'</script>";
					}
					else
					{ 
						echo "<script>alert('Some thing goes wrong! Please try again later.');</script>";
						echo "<script>window.location.href='index.php'/script>";
					}
				
				}
			
			} 
			else 
			{
				$sql=mysql_query("insert into  sqs_subscribe set subs_email='".$user_email."'") or die();
				$id=mysql_insert_id();
				$current_id=base64_encode($id);
				if($sql)
				{
					$success = sendMailUser($current_id,$user_email);
					if($success==1)
					{
						echo "<script>alert('Thanks for subscribing to SIQES,Please confirm email Id.');</script>";
						echo "<script>window.location.href='index.php'</script>";
					}
					else
					{
						echo "<script>alert('Some thing goes wrong! Please try again later.');</script>";
						echo "<script>window.location.href='index.php'</script>";
					}
				
				}
			}
	    }	
    } 	
	
	
	
	function sendMailUser($current_id,$user_email)
	{	
		$mail=new PHPmailer;		
		$mail->IsHTML(true);		
		$mail->From=From_Email;		
		$mail->FromName=From_Site;		
		$mail->AddAddress($user_email);		
		$mail->Subject="SIQES: Email Subscribe.";		
		$mail->Body.= "<b>"."Dear Sir/Madam, "."</b>"."<br/><br/>"."Thanks for subscribing to SIQES."."<br/><br/>".		"<a href='".Site_Url."index.php?id=$current_id' target='_blank'><b>Click here</b></a> to confirm your email address."."<br/><br/>Please visit www.siqes.com for more information.<br/><br/>"."Regards <br/>".From_Name."<br>".Site_Url."<br> ".Contact."";
		
		$mail->WordWrap=100;		
		//print_r($mail);die;
        $mail->Send();		
		if($mail==true)
		{
			return $success=1;
		}
		else
		{
			return $success=0;
		}
	
	}

?>