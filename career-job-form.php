<?php
include("classes/mailerClass.php");
?>
<!doctype html>
<html>

<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
	<meta name="keywords" content="">
	<meta name="description" content="">
	
	<title>SIQES</title>
	
	<!-- Start Head -->
	<?php include 'includes/head.php'; ?>
	<!-- End Head -->
	<script>
    function validApplication(){
		$(".alert_job").css("display", "none");
		$(".alert_name").css("display", "none");
		$(".alert_email").css("display", "none");
		$(".alert_experience").css("display", "none");
		if(document.application_frm.job_name.value.trim() == '')
		{
			$('.alert_job').html('Please Enter Job Profile');
			$(".alert_job").css("display", "block");
			document.application_frm.job_name.focus();
			return false;
		}
		else{
			$(".alert_job").css("display", "none");
		}
		if(document.application_frm.name.value.trim() == '')
		{
			$('.alert_name').html('Please enter your name');
			$(".alert_name").css("display", "block");
			document.application_frm.name.focus();
			return false;
		}
		else{
			$(".alert_name").css("display", "none");
		}
		
		if(document.application_frm.name.value.trim().length < 3)
		{
			$('.alert_name').html('Name should be greater than 2 characters.');
			$(".alert_name").css("display", "block");
			document.application_frm.name.focus();
			return false;
		}else{
			$(".alert_name").css("display", "none");
		}
		if (document.application_frm.email.value.trim() == '') {
            $('.alert_email').html('Please enter email address');
			$(".alert_email").css("display", "block");
            document.application_frm.email.focus();
            return false;
        }
		else{
			$(".alert_email").css("display", "none");
		}
        if (document.application_frm.email.value != '') {
            if (!(/^\w+([\.-]?\w+)*\@\w+([\.-]?\w+)*(\.\w{2,4})+$/.test(document.application_frm.email.value))) {
                $('.alert_email').html('Invalid email address. Please enter valid email address.');
				$(".alert_email").css("display", "block");
                document.application_frm.email.focus();
                return false;
            }
			else{
			$(".alert_email").css("display", "none");
		}
            if (document.application_frm.email.value.length > 50) {
                $('.alert_email').html('Your email should not be greater than 50 characters');
				$(".alert_email").css("display", "block");
                document.application_frm.email.focus();
                return false;
            }
			else{
			$(".alert_email").css("display", "none");
		}
        }
		if (document.application_frm.experience.value == '') {
            $('.alert_experience').html('Please enter your experience in year');
			$(".alert_experience").css("display", "block");
            document.application_frm.experience.focus();
            return false;
        }
		else{
			$(".alert_experience").css("display", "none");
		}
		if (document.application_frm.datafile.value == '') {
            $('.alert_datafile').html('Please upload your CV');
			$(".alert_datafile").css("display", "block");
            document.application_frm.datafile.focus();
            return false;
        }
		else{
			$(".alert_experience").css("display", "none");
		}
	}
	function nameCharacter(evt)
	{              
		var charCode = (evt.which) ? evt.which : event.keyCode
		if((64 < charCode && charCode < 91) || (96 <charCode && charCode< 123) || (charCode==32) || charCode == 8  || charCode == 46){
		return true;
		}else{
		return false;      
		}                                                                                                 
	}
    </script>

<body>

	<div id="main-container">
	
			<!-- Start Header -->
			<?php include 'includes/header.php'; ?>
			<!-- End Header -->
		
		<!-- PAGE CONTENT -->
			<div id="page-content">
			
					<div id="page-header">  
				<div class="container">
					<div class="row">
						<div class="col-sm-12">
							
							<h5>Job Form</h5>
							
							
						</div><!-- col -->
					</div><!-- row -->
				</div><!-- container -->
			</div>
		<?php
		$msg= "";
		$msg1= "";
		$msg_name= "";
		$msg_file= "";
	if(isset($_REQUEST['action'],$_REQUEST['Job_Id']) && $_REQUEST['action']=='GetJobId' && $_REQUEST['Job_Id']!='')
	{
		$job_id = $_REQUEST['Job_Id'];
		$job_detail_qr = mysql_query("select * from sqs_post_job where  job_id='".$job_id."'");
		$row_job_detail = mysql_fetch_array($job_detail_qr);
	}
	
if(isset($_POST['submit']))
 {
	if($_POST['job_id']!="" && $_POST['job_name']!="" && $_POST['experience']!="")
		{
			$server_host = $_SERVER['HTTP_REFERER'];
	        if(strpos($server_host,'career-job-form.php')!== false )
	        {

	
				$job_name= $_POST['job_name'];
				$job_id= $_POST['job_id'];
				$name = $_POST['name'];
				$user_email= $_POST['email'];
				$experience = $_POST['experience'];
				if(strstr($name,'.com') || strstr($name,'.in') || strstr($name,'.it') || strstr($name,'http://www') ||strstr($name,'https://www') || strstr($name,'www.') || strstr($name,'@')  || strstr($name,'url'))
				{ 
					//echo "<script>window.location.href='".$server_host."'</script>";
					$msg_name = "Please enter correct name formate.";
					
				}
				else
				{
					$jobapplication_query ='';
					$dir_name = "doc/jobapplication";
					if($_FILES["datafile"]["name"]!=''){
					 //echo "test";die;
						$fsize = $_FILES["datafile"]["size"];
						//####CHECK SIZE FOR FILE ######//                
						if($fsize > FILESIZE){
							$msg_file = "Please upload size is less then 2 MB";
						}                 
						$filename = explode(".",$_FILES["datafile"]["name"]);
						$file_ext =  strtolower(end($filename));
						$application_name = substr($_FILES["datafile"]["name"],0,-(strlen($file_ext)+1));
						$filename = str_replace(" ","_",$application_name);
						//#########CHECK EXTENTION FOR DOCUMENT############//                
						$allExtarray = array("doc","docx","text","pdf");
						if(!in_array($file_ext,$allExtarray)){                
							$msg_file = "Please upload file type are .doc, .text, and .pdf only";
						}      
						$document = time().'_'.$filename.'.'.$file_ext;
						
						if(!file_exists($dir_name))
						{
							$flag = mkdir($dir_name, 0777,true);                    
						}
						if(file_exists($dir_name."/".$document))
						{                    
							@unlink($dir_name."/".$document);
						}
						$movefile=move_uploaded_file($_FILES["datafile"]["tmp_name"],$dir_name."/".$document);
						$doc_name = $dir_name."/".$document;
							
						if($movefile){
							$jobapplication_query = "applicatio_doc='".$document."'";
						}
					}
					else{
						$msg_file = "Please upload your CV";
					}
					$sql = "insert into sqs_job_application set job_profile_id= '".$job_id."', job_profile= '".$job_name."', name= '".$name."', email= '".$user_email."', experiance= '".$experience."', posted_on= '".date('Y-m-d::H:i:s')."', $jobapplication_query";
					$resp = mysql_query($sql);
					if($resp==true){
						$admin = sendmailAdmin($name,$job_name,$experience,$doc_name);
						$user = sendmailUser($user_email,$name,$job_name);
						$msg1 = " Your application have send successfully";
					}else{
						$msg = "SQL Error";
					}
				}
			}
			else{
		       echo "<script>window.location.href='".$server_host."'</script>";
	            }
		}
		else{
				$msg = "Required parameter missing.";
			}
 }
		
	function sendMailAdmin($name,$job_name,$experience,$doc_name)
	{	
		$mail=new PHPmailer;
		$mail->IsHTML(true);
		$mail->From='info@siqes.in';
		$mail->FromName='SIQES';
		$mail->AddAddress(Admin_EmailId); 
        //$email->AddCC($s_email);
		//$email->AddBCC($s_email);	
		$mail->AddAttachment($doc_name);
		$mail->Subject="Job Application";
		$mail->Body.="<b>"."Dear Admin,"."</b>"."<br><br>"."".$name." has applied for job '".$job_name."' through website application form. <br> Please find attached CV and below details for your reference: -  <br><br> Name: ".$name."  <br> Application for: ".$job_name."  <br> Experience: ".$experience."";
		$mail->WordWrap=100;
		//print_r($mail);die;
			$mail->Send();
	}
	
	function sendMailUser($user_email,$name)
	{	
		$mail=new PHPmailer;
		$mail->IsHTML(true);
		$mail->From=From_Email;
		$mail->FromName=From_Site;
		$mail->AddAddress($user_email); 				
		$mail->Subject="Application Response from SIQES";
		$mail->Body.="<b> Dear ".$name."</b><br><br>Your CV has been submitted successfully. We will get back to you shortly.<br><br><br>Regards <br/>".From_Name."<br>".Site_Url."<br> ".Contact."";
		$mail->WordWrap=100;
		//print_r($mail);die;
			$mail->Send();
	}
	
	?>	
					
           	<div class="container">
				<div class="row">
					<div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-8 col-sm-offset-2 col-xs-12">
                        <div class="">
                        	<form name="application_frm" action="" method="post" onsubmit="return validApplication();" enctype="multipart/form-data">
	                            <fieldset>

	                                <div id="alert-area">
									<span style="color:red"><?php echo $msg; ?></span>
									<span style="color:green"><?php echo $msg1; ?></span>
									</div>
									
									<div class="row">
										<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
											<input type="hidden" name="job_id" value="<?php echo $row_job_detail['job_id']; ?>" >
											
											<input class="col-xs-12" id="job_name" name="job_name" value="<?php echo $row_job_detail['job_title']; ?>" placeholder="Apply For*" type="text">
											<span style="color:red" class="alert_job"></span>
										</div><!-- col -->
										<div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
											<input class="col-xs-12" id="name" name="name" placeholder="Name*" type="text" maxlength="30" onkeypress="return nameCharacter(event)">
											<span style="color:red" class="alert_name"><?php echo $msg_name; ?></span>
										</div>
										<div class="col-sm-6">
												 <input class="col-xs-12" id="email" name="email"  placeholder="Email*" type="text">
												 <span style="color:red" class="alert_email"></span>
										</div><!-- col -->
										<div class="col-sm-6 col-lg-6 col-xs-6">
											<input class="col-xs-12" id="experience" name="experience" placeholder="Experience(Year/Month)*" type="text">
										<span style="color:red" class="alert_experience"></span>
										</div>
										<div class="clearfix"></div>
										<div class="col-sm-6 col-lg-6 col-xs-6">
											<input type="file" name="datafile" size="40">
											<span style="color:red" class="alert_datafile"><?php echo $msg_file; ?></span>
											<span style="color:red" class="">Please upload .doc, .text, .pdf file</span>
										</div>
									</div>

	                                <button class="btn" id="submit" type="submit" name="submit" value="">Submit</button>

	                            </fieldset>
	                        </form>
                        </div>
					</div>
				</div><!-- row -->
			</div><!-- container -->
           			
           			
               		
				
			</div><!-- PAGE CONTENT -->
		
		
		<!-- FOOTER -->
		<!-- Start Footer -->
		<?php include 'includes/footer.php'; ?>
		<!-- End Footer -->
		<!-- FOOTER -->
		
	</div><!-- MAIN CONTAINER -->
	
	
	<!-- SCROLL UP -->
	<a id="scroll-up"><i class="fa fa-angle-up"></i></a>
	
	<!-- Start Foot -->
	<?php include 'includes/foot.php'; ?>
	<!-- End Foot -->
<!--<script>
	$(document).ready(function() {
		$(".tab_btn").click(function(){
		$(".form_tab2").show()
		$(".form_tab1").hide()
		$(".detail_btn").addClass("active_tab");
		$(".description_btn").removeClass("active_tab");
		$(".review_btn").removeClass("active_tab");
		$(".indications_btn").removeClass("active_tab");
	  });
	});
</script>-->

</body>

</html>
