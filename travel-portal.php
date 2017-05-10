<?php
include("config/connection.php");
$obj = new Connection();
?>
<!doctype html>
<html>

<head>
<?php
$seo_query = mysql_query("select * from sqs_meta_seo where page_name= 'travel_page'");
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
			<div id="page-content">
				<section class="">
					<img src="images/banner/travel-portal-banner.jpg" class="img-responsive" />

				</section>
				<!-- <div id="page-header">  
					<div class="container">
						<div class="row">
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<h5>Travel Portal</h5>
							</div>
						</div>
					</div>
				</div> -->
           		<br />
       			<div class="container">
	                <div class="row">
	                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

	                        <div class="headline">
								
								<h3>What is travel Portal</h3>
								<!-- <h6>discover us</h6> -->
								
							</div><!-- headline -->

	                    </div><!-- col -->
	                </div><!-- row -->
	            </div><!-- container -->
	            <div class="container">
	                <div class="row">
	                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							<h5><strong>About Us</strong></h5>
							<p class="text-justify">Lorem ipsum dolor sit amet, consectet ur adipiscing elit. Donec nisl urna, porta eu vulputate eu, duis unde vel 
							turpis.  Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec nisl urna, porta eu vulputate eu, 
							scelerisque vel turpis. Nullam et quam justo. Suspen disse consequat velit finibus, vehicula. Lorem ipsum dolor.</p>
							<p class="text-justify">Quisque a ipsum nunc. Morbi pellentesque, purus vel tristique vulputate, riasus nisl scelerisque arcu, id 
							facilisis tellus ipsum a purus. Fusce dictum enim sit amet leo convallis, vel suscipit sem placerat.
							Aenean eget mi mollis, sagittis purus sit amet, cursus nisi. Mergers and acquisitions.</p>
	                    </div>
	                </div><!-- row -->
	            </div><!-- container -->
	            <section class="full-section dark-section parallax" id="section-4" data-stellar-background-ratio="0.1">
					<div class="full-section-overlay-color dark_overlay_color"></div>
					<div class="full-section-container">
						<div class="container">
							<div class="row">
								<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 align_center">
									<h3 class="last">We provide the best Travel Services</h3>
								</div><!--col -->
								<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 align_center">
									<a class="btn dark_btn" href="#">Go to Travel Portal</a>
								</div><!-- col -->
							</div><!-- row -->
						</div><!-- container -->
					</div><!-- full-section-container -->
				</section><!-- full-section -->
				<div class="container">
                	<div class="row">
	                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

	                        <div class="headline">
								
								<h3>Services</h3>
								<!-- <h6>you know what we offer</h6> -->
								
							</div><!-- headline-->

	                    </div><!-- col -->
                	</div><!-- row -->
            	</div><!-- container -->
            	<div class="container">
	                <div class="row">
	                   <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	                        <div class="service-box style-2">
	                        	<div class="row">
									<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
										<i class="sydney-icon-ereader"></i>
										<h4><a href="#">Lorem ipsum </a></h4>
									</div>
									<div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
										<div class="service-box-content">
											<p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec efficitur auctor ultrices. Nam neque sem, aliquam non pretium nec, ultricies quis arcu. Aenean quis justo lacus. Pellentesque iaculis convallis elit, eu ornare ex tincidunt vitae. Ut nulla purus, porttitor sit amet dignissim ac, ultricies sit amet ex. Quisque id mauris ut sapien fringilla viverra. Phasellus vulputate rutrum convallis. Nunc eu leo felis. Integer dui sem, pharetra eu neque vitae, scelerisque rutrum velit. In hac habitasse platea. Quisque id mauris ut sapien fringilla viverra. Phasellus vulputate rutrum convallis. Nunc eu leo felis. Integer dui sem, pharetra eu neque vitae, scelerisque rutrum velit. In hac habitasse platea.</p>
										</div><!-- service-box-content -->
									</div>
								</div>
							</div><!-- service-box -->
	                    </div><!-- col -->
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	                        <div class="service-box style-2">
	                        	<div class="row">
									<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 pull-right">
										<i class="sydney-icon-ereader icon_2_right"></i>
										<h4><a href="#">Lorem ipsum </a></h4>
									</div>
									<div class="col-lg-10 col-md-10 col-sm-10 col-xs-12 pull-left">
										<div class="service-box-content">
											<p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec efficitur auctor ultrices. Nam neque sem, aliquam non pretium nec, ultricies quis arcu. Aenean quis justo lacus. Pellentesque iaculis convallis elit, eu ornare ex tincidunt vitae. Ut nulla purus, porttitor sit amet dignissim ac, ultricies sit amet ex. Quisque id mauris ut sapien fringilla viverra. Phasellus vulputate rutrum convallis. Nunc eu leo felis. Integer dui sem, pharetra eu neque vitae, scelerisque rutrum velit. In hac habitasse platea. Quisque id mauris ut sapien fringilla viverra. Phasellus vulputate rutrum convallis. Nunc eu leo felis. Integer dui sem, pharetra eu neque vitae, scelerisque rutrum velit. In hac habitasse platea.</p>
										</div><!-- service-box-content -->
									</div>
								</div>
							</div><!-- service-box -->
	                    </div><!-- col -->
	                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	                        <div class="service-box style-2">
	                        	<div class="row">
									<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
										<i class="sydney-icon-ereader"></i>
										<h4><a href="#">Lorem ipsum </a></h4>
									</div>
									<div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
										<div class="service-box-content">
											<p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec efficitur auctor ultrices. Nam neque sem, aliquam non pretium nec, ultricies quis arcu. Aenean quis justo lacus. Pellentesque iaculis convallis elit, eu ornare ex tincidunt vitae. Ut nulla purus, porttitor sit amet dignissim ac, ultricies sit amet ex. Quisque id mauris ut sapien fringilla viverra. Phasellus vulputate rutrum convallis. Nunc eu leo felis. Integer dui sem, pharetra eu neque vitae, scelerisque rutrum velit. In hac habitasse platea. Quisque id mauris ut sapien fringilla viverra. Phasellus vulputate rutrum convallis. Nunc eu leo felis. Integer dui sem, pharetra eu neque vitae, scelerisque rutrum velit. In hac habitasse platea.</p>
										</div><!-- service-box-content -->
									</div>
								</div>
							</div><!-- service-box -->
	                    </div><!-- col -->
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	                        <div class="service-box style-2">
	                        	<div class="row">
									<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12 pull-right">
										<i class="sydney-icon-ereader icon_2_right"></i>
										<h4><a href="#">Lorem ipsum </a></h4>
									</div>
									<div class="col-lg-10 col-md-10 col-sm-10 col-xs-12 pull-left">
										<div class="service-box-content">
											<p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec efficitur auctor ultrices. Nam neque sem, aliquam non pretium nec, ultricies quis arcu. Aenean quis justo lacus. Pellentesque iaculis convallis elit, eu ornare ex tincidunt vitae. Ut nulla purus, porttitor sit amet dignissim ac, ultricies sit amet ex. Quisque id mauris ut sapien fringilla viverra. Phasellus vulputate rutrum convallis. Nunc eu leo felis. Integer dui sem, pharetra eu neque vitae, scelerisque rutrum velit. In hac habitasse platea. Quisque id mauris ut sapien fringilla viverra. Phasellus vulputate rutrum convallis. Nunc eu leo felis. Integer dui sem, pharetra eu neque vitae, scelerisque rutrum velit. In hac habitasse platea.</p>
										</div><!-- service-box-content -->
									</div>
								</div>
							</div><!-- service-box -->
	                    </div><!-- col -->
	                </div><!-- row -->
	            </div><!-- container -->
	            <section class="full-section dark-section parallax features_section_7" id="section-7" data-stellar-background-ratio="0.1">
					<div class="full-section-overlay-color dark_overlay_color"></div>
					<div class="full-section-container">
						<div class="container">
							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
									<div class="headline">
										<h3>Features</h3>
										<h6>great experiences you can get</h6>
									</div><!-- headline -->
								</div><!-- col -->
							</div><!-- row -->
						</div><!-- container -->
						<div class="container">
							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
									<div class="owl-carousel text-boxes-slider">
										<div class="item">
											<div class="text-box style-1 text-center">
												<h4><a href="single-service.html">A good deal</a></h4>
												<p>Lorem ipsum dolor sit amet, consectet ur adip isc ing elit. Donec nisl urna, porta eu 
												vulputate eu, scelerisque. Nullam varius tortor quis nulla hendrerit.</p>
												<!-- <a href="single-service.html">Read more <i class=" sydney-icon-right"></i></a> -->
											</div><!-- text-box -->
										</div><!-- item -->
										<div class="item">
											<div class="text-box style-1 text-center">
												<h4><a href="single-service.html">Wommens Only Packages</a></h4>
												<p>Quisque a ipsum nunc. Morbi pellen tesque, purus vel tristique vulputate, risus nisl sce 
												leris que arcu. Nullam varius tortor quis nulla hendrerit.</p>
												<!-- <a href="single-service.html">Read more <i class=" sydney-icon-right"></i></a> -->
											</div><!-- text-box -->
										</div><!-- item -->
										<div class="item">
											<div class="text-box style-1 text-center">
												<h4><a href="single-service.html">Ticket Booking</a></h4>
												<p>Donec nisl urna, porta eu vulputate eu, scel eris que vel turpis. Nullam et quam justo. 
												Suspen disse consequat. Nullam varius tortor quis nulla hendrerit.</p>
												<!-- <a href="single-service.html">Read more <i class=" sydney-icon-right"></i></a> -->
											</div><!-- text-box -->
										</div><!-- item -->
										<div class="item">
											<div class="text-box style-1 text-center">
												<h4><a href="single-service.html">Hot Deals</a></h4>
												<p>Maecenas pretium consectetur libero, ut dapibus massa euismod ac. Curabitur ac ligula sapien. 
												Pellentesque eget. Nullam varius tortor quis nulla hendrerit.</p>
												<!-- <a href="single-service.html">Read more <i class=" sydney-icon-right"></i></a> -->
											</div><!-- text-box -->
										</div><!-- item -->
										<div class="item">
											<div class="text-box style-1 text-center">
												<h4><a href="single-service.html">Last Minnute Deals</a></h4>
												<p>Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia auctor neque 
												mattis duis amet. Nullam varius tortor quis nulla hendrerit.</p>
												<!-- <a href="single-service.html">Read more <i class=" sydney-icon-right"></i></a> -->
											</div><!-- text-box -->
										</div><!-- item -->
										<div class="item">
											<div class="text-box style-1 text-center">
												<h4><a href="single-service.html">Travel Ideas</a></h4>
												<p>Nullam varius tortor quis nulla hendrerit pulvinar. Curabitur ut orci tristique, molestie 
												nibh sed, pretium leo. Nullam varius tortor quis nulla hendrerit.</p>
												<!-- <a href="single-service.html">Read more <i class=" sydney-icon-right"></i></a> -->
											</div><!-- text-box -->
										</div><!-- item -->
									</div><!-- text-boxes-slider -->
								</div><!-- col -->
							</div><!-- row -->
						</div><!-- container -->
						
					</div><!-- full-section-container -->
				</section><!-- full-section -->
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
