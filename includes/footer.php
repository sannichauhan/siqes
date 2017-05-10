<?php
require_once('config/connection.php'); 
$obj = new Connection();
require_once("classes/mailerClass.php");
	$msg = '';
	//$current_url = $_SERVER['HTTP_REFERER'];
      $current_url=$_SERVER['REQUEST_URI'];

	if(isset($_REQUEST['Submit']) and $_REQUEST['Submit']=='Submit')
	{
		$user_email=$_POST['email'];
		$sql1=mysql_query("select * from  sqs_subscribe where subs_email='".$user_email."' and status='1'") or die();
		$chk_qur = mysql_num_rows($sql1);
		if($chk_qur > 0)
		{
			$msg = 'You have already subscribed for this email Id.';
			//echo "<script>alert('You have already subscribed for this email Id.');</script>";
			echo "<script>window.location.href='".$current_url."#subscribes'</script>";
			
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
					$success = sendMailUser1($current_id,$user_email);
					
					if($success==1)
					{
						$msg = 'Thanks for subscribing to SIQES, Please confirm email Id.';
						//echo "<script> document.getElementById('myModal').style.display='';</script>";
						echo "<script>window.location.href='".$current_url."#subscribes'</script>";
					}
					else
					{ 
				        $msg = 'Some thing goes wrong! Please try again later.';
						echo "<script>window.location.href='".$current_url."#subscribes'</script>";
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
					$success = sendMailUser1($current_id,$user_email);
					if($success==1)
					{
						$msg = 'Thanks for subscribing to SIQES,Please confirm email Id.';
						echo "<script>window.location.href='".$current_url."#subscribes'</script>";
					}
					else
					{
						$msg = 'Some thing goes wrong! Please try again later.';
						echo "<script>window.location.href='".$current_url."#subscribes'</script>";
					}
				
				}
			}
	    }	
    } 	
	
	
	
	function sendMailUser1($current_id,$user_email)
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
<footer id="footer-container">

			<div class="container">
				<div class="row">
					<div class="col-sm-12">
						
						<div id="footer">
							
							<div class="row">
<?php
	$about = mysql_fetch_array(mysql_query("select * from sqs_aboutus where about_title= 'About Us'"));
	if($about['about_description'] != ""){
?>
								<div class="col-sm-4">
									
									<div class="widget widget-text">
										
										<div>
										
											<h3>About us</h3>
									
										<p><?php 
										$str= $about['about_description'];
										if(strlen($str)>245)
										{
										$pos= strpos($str, ' ', 245);
										echo substr($str,0,$pos);
										}else{
											echo $about['about_description'];
										}
										?>
										</p>
											<a href="about-us.php">Read more <i class="sydney-icon-right"></i></a>
										</div>
										
									</div><!-- widget-text -->
									
								</div><!-- col -->
						<?php } ?>
								
								<div class="col-sm-4">
									
									<div class="widget widget-pages">
																
										<h5 class="widget-title">Useful links</h5>
										
										<ul>
											<li ><a href="index.php">Home</a></li>
											<li ><a href="services.php">Services</a></li>
											<li ><a href="client-zone.php">Client Zone</a></li>
											<!-- <li ><a href="partner-zone.php">Partner Zone</a></li> -->
											<li ><a href="request-for-query.php">RFQ</a></li>

										</ul>
										
										<ul>
											<li ><a href="gallery.php">Gallery</a></li>	
											<li ><a href="contact.php">Contact Us</a></li>
											<li><a href="career.php">Career</a></li>
											<li><a href="blog.php">Blog</a></li>
										</ul>
										
									</div><!-- widget-pages -->
									
								</div><!-- col -->
								<div class="col-sm-4">
									
									<div class="widget widget-newsletter">
										<a name="subscribes">
										<h5 class="widget-title">Subscribe</h5>
										
										<form name="newsletter" method="post" action="" onsubmit="return validformnewsletter();">
											<fieldset>
											   <span style="color:black" ></span>
											   <span style="color:green" ></span>
												<input id="newsletter-email" class="email_newsletter" type="email" name="email" placeholder="your email">
												<input type="submit" name="Submit" value="Submit" class="submit">
												<span style="color:black" class="alert_email"></span>
												<span style="color:black" class="alert_success"><?php echo $msg; ?></span>
											</fieldset>
										</form>
										
										</a>
										
										<br>
									
										
									</div><!-- widget-newsletter -->
									
								</div><!-- col -->
							</div><!-- row -->
							
						</div><!-- footer -->
						
						<div id="footer-bottom">
							
							<div class="row">
								<div class="col-sm-6">
									
									<div class="widget widget-social">
										<p><?php echo $link['site_copyright']; ?></p>		
									</div><!-- widget-social -->
									
								</div><!-- col -->
								<div class="col-sm-6">
									
									<div class="widget widget-pages">
										
										<!-- <ul>
											<li><a href="term.php">Terms of Use</a></li>
											<li><a href="privacy.php">Privacy Policy</a></li>
											<li><a href="disclaimer.php">Disclaimer</a></li>
											<li><a href="legal-notice.php">Legal Notice</a></li>
										</ul> -->
										
									</div><!-- widget-pages -->
									
								</div><!-- col -->
							</div><!-- row -->
							
						</div><!-- footer-bottom -->
						
					</div><!-- col -->
				</div><!-- row -->
			</div><!-- container -->
			<script>
function validformnewsletter(){
	            $(".alert_email").css("display", "none");
				$(".alert_success").css("display", "none");
		    if (document.newsletter.email.value.trim() == '') {
				$('.alert_email').html('Please enter email address');
				$(".alert_email").css("display", "block");
				document.newsletter.email.focus();
				return false;
        }
		else{
			$(".alert_email").css("display", "none");
		}
        if (document.newsletter.email.value != '') {
            if (!(/^\w+([\.-]?\w+)*\@\w+([\.-]?\w+)*(\.\w{2,4})+$/.test(document.newsletter.email.value))) {
                $('.alert_email').html('Invalid email address. Please enter valid email address.');
				$(".alert_email").css("display", "block");
                document.newsletter.email.focus();
                return false;
            }
			else{
			$(".alert_email").css("display", "none");
		}
            if (document.newsletter.email.value.length > 50) {
                $('.alert_email').html('Your email should not be greater than 50 characters');
				$(".alert_email").css("display", "block");
                document.newsletter.email.focus();
                return false;
            }
			else{
			$(".alert_email").css("display", "none");
		}
        }
	}
	
	
			</script>
			
			
		</footer>