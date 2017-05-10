<?php
include("classes/mailerClass.php");
include("config/connection.php");
$obj = new Connection();
?>
<!doctype html>
<html>

<head>
	<?php
	$seo_query = mysql_query("select * from sqs_meta_seo where page_name= 'rfq_page'");
	$seo_row = mysql_fetch_array($seo_query);
	?>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
	<meta name="keywords" content="<?php if($seo_row['meta_keyword']!="") echo $seo_row['meta_keyword']; ?>">
	<meta name="description" content="<?php if($seo_row['meta_description']!="") echo $seo_row['meta_description']; ?>">
	
	<title>SIQES : <?php if($seo_row['meta_title']!="") echo $seo_row['meta_title']; ?></title>
	
	<!-- Start Head -->
	<?php include 'includes/head.php'; ?>
	<!-- End Head -->
	<script>
	function validformquery(){
		$(".alert_email").css("display", "none");
		$(".alert_name").css("display", "none");
		$(".alert_contact").css("display", "none");
		$(".alert_message").css("display", "none");
		if(document.formquery.name.value.trim() == '')
		{
			$('.alert_name').html('Please Enter Name');
			$(".alert_name").css("display", "block");
			document.formquery.name.focus();
			return false;
		}
		else{
			$(".alert_name").css("display", "none");
		}
		
		if(document.formquery.name.value.trim().length < 3)
		{
			$('.alert_name').html('Name should be greater than 2 characters.');
			$(".alert_name").css("display", "block");
			document.formquery.name.focus();
			return false;
		}else{
			$(".alert_name").css("display", "none");
		}
		if (document.formquery.email.value.trim() == '') {
			$('.alert_email').html('Please enter email address');
			$(".alert_email").css("display", "block");
			document.formquery.email.focus();
			return false;
		}
		else{
			$(".alert_email").css("display", "none");
		}
		if (document.formquery.email.value != '') {
			if (!(/^\w+([\.-]?\w+)*\@\w+([\.-]?\w+)*(\.\w{2,4})+$/.test(document.formquery.email.value))) {
				$('.alert_email').html('Invalid email address. Please enter valid email address.');
				$(".alert_email").css("display", "block");
				document.formquery.email.focus();
				return false;
			}
			else{
				$(".alert_email").css("display", "none");
			}
			if (document.formquery.email.value.length > 50) {
				$('.alert_email').html('Your email should not be greater than 50 characters');
				$(".alert_email").css("display", "block");
				document.formquery.email.focus();
				return false;
			}
			else{
				$(".alert_email").css("display", "none");
			}
		}
		if (document.formquery.contact.value == '') {
			$('.alert_contact').html('Please enter contact number');
			$(".alert_contact").css("display", "block");
			document.formquery.contact.focus();
			return false;
		}
		else{
			$(".alert_contact").css("display", "none");
		}
		if (document.formquery.contact.value != '') {

			if (document.formquery.contact.value.length < 10) {
				$('.alert_contact').html('Your contact no should not be less than 10 characters');
				$(".alert_contact").css("display", "block");
				document.formquery.contact.focus();
				return false;
			}
			else{
				$(".alert_contact").css("display", "none");
			}		
		}
		if (document.formquery.message.value == '') {
			$('.alert_message').html('Please enter query message');
			$(".alert_message").css("display", "block");
			document.formquery.message.focus();
			return false;
		}
		else{
			$(".alert_message").css("display", "none");
		}
		if (document.formquery.message.value != '') {

			if (document.formquery.message.value.length < 3) {
				$('.alert_message').html('Your query message should not be less than 3 characters');
				$(".alert_message").css("display", "block");
				document.formquery.message.focus();
				return false;
			}
			else{
				$(".alert_message").css("display", "none");
			}		
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
	
	function contactFormate(evt)
	{
		var charCode = (evt.which) ? evt.which : event.keyCode
		if (charCode > 31 && (charCode < 48 || charCode > 57))
		{
			return false;
		}else{
			return true;      
		}
	}
	</script>

	<body>
		<div id="main-container">

			<!-- Start Header -->
			<?php include 'includes/header.php'; ?>
			<!-- End Header -->
			<?php

			$msg="";
			$msg1="";
			$msg_name="";
			$msg_email="";
			if(isset($_POST['submit']) && $_POST['name']!= "" && $_POST['email']!= "" && $_POST['contact']!="")
			{ 
				$server_host = $_SERVER['HTTP_REFERER'];
				if(strpos($server_host, Site_Url)!== false )
				{ 
					$user_name = $_POST['name'];
					$user_email = $_POST['email'];
					$phone = $_POST['contact'];
					$message = $_POST['message'];
					$pattern = '/^(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){255,})(?!(?:(?:\\x22?\\x5C[\\x00-\\x7E]\\x22?)|(?:\\x22?[^\\x5C\\x22]\\x22?)){65,}@)(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22))(?:\\.(?:(?:[\\x21\\x23-\\x27\\x2A\\x2B\\x2D\\x2F-\\x39\\x3D\\x3F\\x5E-\\x7E]+)|(?:\\x22(?:[\\x01-\\x08\\x0B\\x0C\\x0E-\\x1F\\x21\\x23-\\x5B\\x5D-\\x7F]|(?:\\x5C[\\x00-\\x7F]))*\\x22)))*@(?:(?:(?!.*[^.]{64,})(?:(?:(?:xn--)?[a-z0-9]+(?:-+[a-z0-9]+)*\\.){1,126}){1,}(?:(?:[a-z][a-z0-9]*)|(?:(?:xn--)[a-z0-9]+))(?:-+[a-z0-9]+)*)|(?:\\[(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){7})|(?:(?!(?:.*[a-f0-9][:\\]]){7,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,5})?)))|(?:(?:IPv6:(?:(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){5}:)|(?:(?!(?:.*[a-f0-9]:){5,})(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3})?::(?:[a-f0-9]{1,4}(?::[a-f0-9]{1,4}){0,3}:)?)))?(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))(?:\\.(?:(?:25[0-5])|(?:2[0-4][0-9])|(?:1[0-9]{2})|(?:[1-9]?[0-9]))){3}))\\]))$/iD';

					if(strstr($user_name,'.com') || strstr($user_name,'.in') || strstr($user_name,'.it') || strstr($user_name,'http://www') ||strstr($user_name,'https://www') || strstr($user_name,'www.') || strstr($user_name,'@')  || strstr($user_name,'url'))
					{ 
					//echo "<script>window.location.href='".$server_host."'</script>";
						$msg_name = "Please enter correct name formate.";

					}
					elseif(preg_match($pattern, $user_email) !== 1)
					{
						$msg_email = "Please enter correct email formate.";
					}
					else
					{
						$insert_query = mysql_query("insert into sqs_rfq set rfq_name= '".$user_name."', rfq_email='".$user_email."', rfq_phone= '".$phone."', rfq_query= '".$message."', status= 1, created_on='".date('Y-m-d::H:i:s')."'");
						
						$admin = sendmailAdmin($user_name,$user_email,$phone,$message);
						$user = sendmailUser($user_email,$user_name,$phone,$message);
						
						if($insert_query== true)
						{
							$msg1 = "Your quote send successfully";
						}						
					}

				}
				else{
					echo "<script>window.location.href='".$server_host."'</script>";
				}
			}

			function sendMailAdmin($user_name,$user_email,$phone,$message)
			{	
				$mail=new PHPmailer;
				$mail->IsHTML(true);
				$mail->From='info@siqes.in';
				$mail->FromName='SIQES';
				$mail->AddAddress(Admin_EmailId); 
        //$email->AddCC($s_email);
		//$email->AddBCC($s_email);		
				$mail->Subject="Query from SIQES user";
				$mail->Body.="<b>"."Dear Admin, "."</b>"."<br><br>"."Query has been received from your website section RFQ (Siqes). <br>Please find below details for your reference: - <br><br> Name: ".$user_name."  <br> Contact No: ".$phone."  <br> Email: ".$user_email." <br> Query: ".$message." "."<br><br>";
				$mail->WordWrap=100;
		//print_r($mail);die;
				$mail->Send();
			}

			function sendMailUser($user_email,$user_name,$phone,$message)
			{	
				$mail=new PHPmailer;
				$mail->IsHTML(true);
				$mail->From=From_Email;
				$mail->FromName=From_Site;
				$mail->AddAddress($_POST['email']); 				
				$mail->Subject="Query Response";
				$mail->Body.="<b> Dear ".$user_name."</b>,<br><br>Your query has been submitted successfully. We will get back to you soon.<br> Your details as given by you is as  – <br><br> Name: ".$user_name."  <br> Contact No: ".$phone."  <br> Email: ".$user_email." <br> Query: ".$message."<br><br><br>Regards <br/>".From_Name."<br>".Site_Url."<br> ".Contact."";
				$mail->WordWrap=100;
		//print_r($mail);die;
				$mail->Send();
			}
			?>
			<!-- PAGE CONTENT -->
			<div id="page-content">



				<div id="page-header">  
					<div class="container">
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

								<h5>Request For Quote</h5>


							</div><!-- col -->
						</div><!-- row -->
					</div><!-- container -->
				</div>
				<br />
				<div class="container">
					<div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-12 col-xs-12">
						<form name="formquery" action="" method="post" >
							<fieldset>
								<div id="alert-area"></div>
								<span style="color:red"><?php echo $msg; ?></span>
								<span style="color:green"><?php echo $msg1; ?></span>
								<div class="row">
									<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
										<input class="col-xs-12" id="name" type="text" name="name" placeholder="Name*" maxlength="30" onkeypress="return nameCharacter(event)">
										<span style="color:red" class="alert_name"><?php echo $msg_name; ?></span>
									</div>
									<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
										<input class="col-xs-12" id="email" type="email" name="email" placeholder="E-mail*">
										<span style="color:red" class="alert_email"><?php echo $msg_email; ?></span>
									</div>
								</div>
								<input class="col-lg-12 col-md-12 col-sm-12 col-xs-12" id="subject" type="text" name="contact" placeholder="Phone no*" maxlength="13" onkeypress="return contactFormate(event)">
								<span style="color:red" class="alert_contact"></span>
								<textarea class="col-xs-12" id="message" name="message" rows="7" cols="25" placeholder="Message*"></textarea>
								<div class="form-group">
									
									<div class="input-group">
										<span class="input-group-btn">
											<span class="btn-new btn-default btn-file">
												Browse <input type="file" id="imgInp">
											</span>
										</span>
										<input type="text" class="form-control" readonly>
									</div>
									<img id='img-upload'/>
								</div>
								<span style="color:red" class="alert_message"></span>
								<button class="btn" id="submit" type="submit" name="submit" value="" onclick="return validformquery();">Submit</button>
							</fieldset>
						</form>
					</div>



				</div>



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
		<script>
		$(document).ready( function() {
			$(document).on('change', '.btn-file :file', function() {
				var input = $(this),
				label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
				input.trigger('fileselect', [label]);
			});

			$('.btn-file :file').on('fileselect', function(event, label) {

				var input = $(this).parents('.input-group').find(':text'),
				log = label;

				if( input.length ) {
					input.val(log);
				} else {
					if( log ) alert(log);
				}

			});
			function readURL(input) {
				if (input.files && input.files[0]) {
					var reader = new FileReader();

					reader.onload = function (e) {
						$('#img-upload').attr('src', e.target.result);
					}

					reader.readAsDataURL(input.files[0]);
				}
			}

			$("#imgInp").change(function(){
				readURL(this);
			}); 	
		});
		</script>

	</body>

	</html>
