<?php
include("config/connection.php");
$obj = new Connection();
?>
<!doctype html>
<html>

<head>
<?php
$seo_query = mysql_query("select * from sqs_meta_seo where page_name= 'contact_page'");
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

<body>

	<div id="main-container">
	
			<!-- Start Header -->
			<?php include 'includes/header.php'; ?>
			<!-- End Header -->
		
		<!-- PAGE CONTENT -->
			<div id="page-content padding_b_0">
			
					
			
					<div id="page-header">  
				<div class="container">
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							
							<!-- <h5>Contact Us</h5> -->
							
							
						</div><!-- col -->
					</div><!-- row -->
				</div><!-- container -->
			</div>
           				<br />
           			<div class="container">
				
						<!-- <div class="col-md-7 col-sm-12">
						
						<form >
                            <fieldset>

                                <div id="alert-area"></div>
								
								<div class="row">
									<div class="col-md-6">
										
										<input class="col-xs-12" id="name" type="text" name="name" placeholder="Name*">
										
									</div>
									<div class="col-md-6">
										
										<input class="col-xs-12" id="email" type="email" name="email" placeholder="E-mail*">
										
									</div>
								</div>

                                <input class="col-xs-12" id="subject" type="text" name="subject" placeholder="Subject*">

                                <textarea class="col-xs-12" id="message" name="message" rows="7" cols="25" placeholder="Message*"></textarea>

                                <button class="btn" id="submit" type="submit" name="submit" value="">Submit</button>

                            </fieldset>
                        </form>
						
							
						</div> -->
					
						<div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-10 col-sm-offset-1 col-xs-12">

	                        <div class="address text-box style-2">
								
								<h4 class="text-center">ADDRESS</h4>
								<P class="text-center"><i class="sydney-icon-location1 icon_styl"></i><?php echo $link['site_address']; ?>  </P>
								<P class="text-center"><i class="sydney-icon-active icon_styl"></i><?php echo $link['sitephone_no']; ?></P>
								<P class="text-center"><i class="sydney-icon-envelope icon_styl"></i><a href="mailto:info@siqes.com"><?php echo $link['site_email']; ?></a></P>
								
								
							</div><!-- text-box -->
								<div class="social-media square text-center">
							
								<a class="pinterest" href="<?php echo $link['site_pinterest']; ?>" target="_blank"><i class="fa fa-pinterest"></i></a>
								<a class="linkedin" href="<?php echo $link['site_linkdin']; ?>" target="_blank"><i class="fa fa-linkedin"></i></a>
								<!--<a class="instagram" href="#"><i class="fa fa-instagram" target="_blank"></i></a>-->
								<a class="facebook" href="<?php echo $link['site_facebook']; ?>" target="_blank"><i class="fa fa-facebook"></i></a>
								<a class="twitter" href="<?php echo $link['site_twitter']; ?>" target="_blank"><i class="fa fa-twitter"></i></a>
							
							</div><!-- social-media -->
						
                    	</div><!-- col -->
				
				</div>
				<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3505.1320160287146!2d77.39516561494621!3d28.53575139520575!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390ce8b9c0b09489%3A0xc5bcebbb37ebb6cd!2sNSEZ!5e0!3m2!1sen!2sin!4v1469617304608" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
           			<!-- <div class="map" data-zoom="17" data-height="300" data-address="SDF K-10, NSEZ Phase-II, Noida " data-address-details="Our location" style="margin-bottom:-50px;"></div> -->
           			
               		
				
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

</body>

</html>
