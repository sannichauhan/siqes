<?php
include("config/connection.php");
$obj = new Connection();
?>
<!doctype html>
<html>
<head>
	<?php
	$seo_query = mysql_query("select * from sqs_meta_seo where page_name= 'home_page'");
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

	
	<!-- THEME OPTIONS -->
<!-- 	<link rel="stylesheet" href="assets/plugins/theme-options/theme-options.css">  
-->	
<!-- ALTERNATIVE STYLES -->

</head>

<body>

	<div id="main-container">
		
		<!-- Start Header -->
		<?php include 'includes/header.php'; ?>
		<!-- End Header -->
		
		<!-- PAGE CONTENT -->
		<div id="page-content">
			
			<!-- Start Slider -->
			<?php include 'includes/slider.php'; ?>
			<!-- End Slider -->
			<?php
			if(isset($_REQUEST['id']))
			{
				$user_id=base64_decode($_REQUEST['id']);
				$sqlactive=mysql_query("UPDATE sqs_subscribe set status = 1 where id='".$user_id."'")or die();
				if($sqlactive)
				{
					echo "<script>alert('Thanks for subscribing to SIQES.');</script>";
					echo "<script>window.location.href='index.php'</script>";
				}
			}
			
			?>		
			<div class="container">

				<div class="row">
					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
						
						<div class="image-box">
							<?php $query_about = mysql_query("SELECT * FROM sqs_aboutus where about_title='About Us'");
							$row_about = mysql_fetch_array($query_about);
							?>			
							<div class="image-box-thumbnail">
								<img src="doc/aboutusimg/<?php echo $row_about['about_image']; ?>" alt="">
							</div><!-- image-box-thumbnail -->
							
							<h6><?php if($row_about['about_title']='About Us'){ echo 'ABOUT US';} ?></h6>
							
							<div class="image-box-content">
								
								<h6><?php if($row_about['about_title']='About Us'){ echo 'ABOUT US';} ?></h6>
								
								<p><?php 
								$stra= $row_about['about_description'];
								if(strlen($stra)>177)
								{
									$posa= strpos($stra, ' ', 177);
									echo substr($stra,0,$posa); 
								}
								else
								{
									echo $row_about['about_description'];
								}
								?></p>
								
								<a href="about-us.php">Read more <i class="sydney-icon-right"></i></a>
								
							</div><!-- image-box-content -->
							
						</div><!-- image-box -->

					</div><!-- col -->
					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
						
						<div class="image-box">
							<?php $query_vision = mysql_query("SELECT * FROM sqs_aboutus where about_title='Our Vision'");
							$row_vision = mysql_fetch_array($query_vision);
							?>						
							<div class="image-box-thumbnail">
								<img src="doc/aboutusimg/<?php echo $row_vision['about_image']; ?>" alt="">
							</div><!-- image-box-thumbnail -->
							
							
							<h6><?php if($row_vision['about_title'] = 'Our Vision'){ echo 'OUR VISION';} ?></h6>
							
							<div class="image-box-content">
								
								<h6><?php if($row_vision['about_title'] = 'Our Vision'){ echo 'OUR VISION';} ?></h6>
								
								<p><?php 
								$strv= $row_vision['about_description'];
								if(strlen($strv)>177)
								{
									$posv= strpos($strv, ' ', 177);
									echo substr($strv,0,$posv);
								}
								else{
									echo $row_vision['about_description'];
								}
								?></p>
								
								<a href="about-us.php">Read more <i class="sydney-icon-right"></i></a>
								
							</div><!-- image-box-content -->
							
						</div><!-- image-box -->
						
					</div><!-- col -->
					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
						
						<div class="image-box">
							<?php $query_mission = mysql_query("SELECT * FROM sqs_aboutus where about_title='Our Mission'");
							$row_mission = mysql_fetch_array($query_mission);
							?>						
							<div class="image-box-thumbnail">
								<img src="doc/aboutusimg/<?php echo $row_mission['about_image']; ?>" alt="">
							</div><!-- image-box-thumbnail -->
							
							<h6><?php if($row_mission['about_title']='Our Mission'){ echo 'OUR MISSION';} ?></h6>
							
							<div class="image-box-content">
								
								<h6><?php if($row_mission['about_title']='Our Mission'){ echo 'OUR MISSION';} ?></h6>
								
								<p><?php 
								$strm= $row_mission['about_description'];
								if(strlen($strm)>177)
								{
									$posm= strpos($strm, ' ', 177);
									echo substr($strm,0,$posm);
								}
								else{
									echo $row_mission['about_description'];
								}
								?></p>
								
								<a href="about-us.php">Read more <i class="sydney-icon-right"></i></a>
								
							</div><!-- image-box-content -->
							
						</div><!-- image-box -->
						
					</div><!-- col -->
				</div><!-- row -->
			</div><!-- container -->
			
			<br><br>
			
			<div class="container">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

						<div class="headline">
							
							<h3>Services</h3>
							<!-- <h6>you know what we offer</h6> -->
						</div><!-- headline -->

					</div><!-- col -->
				</div><!-- row -->
			</div><!-- container -->
			
			<div class="container">
				<div class="row">
					<div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 col_480_12">

						<div class="service-box c_service_box style-1 hserviceblock">
							<div class="service-box-heading">
								<i class="sydney-icon-multimedia-option1"></i>
								<h5><a href="services.php">Software <br>Development</a></h5>
							</div>
							<div class="service-box-content">
								<p>
									<ul>
										<li>Java</li>
										<li>.Net</li>
										<li>PHP</li>
									</ul>
								</p>
							</div><!-- service-box-content -->
						</div><!-- service-box c_service_box -->
					</div><!-- col -->
					<div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 col_480_12">
						<div class="service-box c_service_box style-1 hserviceblock">
							<div class="service-box-heading">
								<i class="sydney-icon-monitor2"></i>
								<h5><a href="services.php">Software <br>QA</a></h5>
							</div>
							<div class="service-box-content">
								<p>
									<ul>
										<li>Requirement Analysis</li>
										<li>Requirement Estimation</li>
										<li>Planning</li>
										<li>Execution</li>
									</ul>
								</p>
							</div><!-- service-box-content -->
						</div><!-- service-box c_service_box -->
					</div><!-- col -->
					<div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 col_480_12">
						<div class="service-box c_service_box style-1 hserviceblock">
							<div class="service-box-heading">
								<i class="sydney-icon-smartphone2"></i>
								<h5><a href="services.php">ITSM</a></h5>
							</div>
							<div class="service-box-content">
								<p class="text">Tier I – Global Customer Service</p>
								<p class="text">Tier II – Technical</p>
								<p class="text">Tier III – RCA (Incident and Problem Management)</p>
								<ul>
									<li>CRM Applications</li>
									<li>Help Desk</li>
									<li>Test Management Tool</li>
								</ul>
							</div><!-- service-box-content -->
						</div><!-- service-box c_service_box -->
					</div><!-- col -->
					<div class="col-lg-3 col-md-3 col-sm-6 col-xs-6 col_480_12">
						<div class="service-box c_service_box style-1 hserviceblock">
							<div class="service-box-heading">
								<i class="sydney-icon-ereader"></i>
								<h5><a href="services.php">EDI <br>Services </a></h5>
							</div>
							<div class="service-box-content">
								<p>
									<ul>
										<li>End to End EDI Services</li>
										<li>Manual QA</li>
										<li>Automation QA</li>
										<li>Web Services/API</li>
										<li>Stress & Performance</li>
									</ul>
								</p>
								
							</div>
							<!-- service-box-content -->
							
						</div>
						<!-- service-box c_service_box -->

					</div>
					<!-- col -->
					
					
					
				</div><!-- row -->
			</div><!-- container -->
			
			<!-- <div class="container">
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

                        <div class="service-box c_service_box style-1">
							
							<i class="sydney-icon-video-camera1"></i>
							
							<div class="service-box-content">
								
								<h5><a href="#">Capability <br>Analysis</a></h5>
								
								<p>Lorem ipsum dolor sit amet, consectet ur adipiscing elit. Donec nisl urna, porta eu vulputate eu, 
								scelerisque vel.</p>
								
							</div>
							
						</div>

                    </div>
					<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">

                        <div class="service-box c_service_box style-1">
							
							<i class="sydney-icon-key"></i>
							
							<div class="service-box-content">
								
								<h5><a href="#">SME Team <br>Processes</a></h5>
								
								<p>Lorem ipsum dolor sit amet, consectet ur adipiscing elit. Donec nisl urna, porta eu vulputate eu, 
								scelerisque vel.</p>
								
							</div>
							
						</div>

                    </div>
                </div>
            </div> -->
            <div class="container">
            	<div class="row">
            		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            			<div class="hr"></div>
            		</div><!-- col -->
            	</div><!-- row -->
            </div><!-- container -->
          <!--   <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                        <div class="headline">
							
							<h3>Travel Portal</h3>
							<h6>you know what we offer</h6>
							
						</div>

                    </div>
                </div>
            </div> -->
          <!--   <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    	<h3>Pellentesque habitant morbi</h3>
                    	<p>The Travel Portal provides online booking facilities to customers or end users visiting the website. Travel Portal constitutes of following important features to its customers. Air ticket booking for domestic and international airlines, Hotel booking for domestic and international hotels, Bus Booking engine using which a user can book Bus from one location to the other location nationwide, Car Booking engine which can help a user to book the car rental of his choice at his desired location, Chartered plane booking & exclusive travel and destination holiday packages. Holiday packages helps users to choose the desired or suiting package as per the requirement. The package section is exclusive in features and can be categorized into different user segment</p>
                    	<p>Siqes provides end to end solution in the travel segment which does not confines to only Flight booking, Hotel booking, Bus booking, Car Booking but also offers other important services like travel & recharge portal development along with travel portal consultancy. We provide also readymade travel portal development services to our customers depends upon business requirements.</p>
                    	<a class="more_btn" href="travel-portal.php">
							Read more <i class=" sydney-icon-right"></i>
						</a>

                    </div>
                </div>
            </div> -->

            <section class="full-section dark-section parallax" id="section-1" data-stellar-background-ratio="0.1">
            	
            	<div class="full-section-overlay-color"></div>
            	
            	<div class="full-section-container">
            		
            		<div class="container">
            			<div class="row">
            				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            					
            					<h2 style="color:#cd4800;">Key<span  style="color:#cd4800;"> Clients </span></h2>
            					
            				</div><!-- col -->
            			</div><!-- row -->
            		</div><!-- container -->
            		
            		<br>
            		
            		<div class="container">
            			<div class="row">
            				<?php
            				$client_qr = mysql_query("select * from sqs_partners where status = 1 order by part_title");
            				while($row_client = mysql_fetch_array($client_qr))
            				{
            					?>	
            					<div class="col-lg-2 col-md-2 col-sm-2 col-xs-12">
            						<div class="counter">
            							<img src="doc/partner/<?php echo $row_client['part_logo']; ?>" class="center-block img-size"/>
            							<!--<img src="images/client/intrra.png" class="center-block"/>-->
            						</div>
            						
								<!-- <div class="counter">
									
									<div class="counter-value" data-value="325"></div>
									<div class="counter-details">Customers</div>
									
								</div> -->
								
							</div><!-- col -->
							<?php } ?>	
							
						</div><!-- row -->
					</div><!-- container -->
					
				</div><!-- full-section-container -->
			</section><!-- full-section -->
			
			<div class="container">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

						<div class="headline">
							
							<h3>Testimonials</h3>
							<!-- <h6>what people say</h6> -->
							
						</div><!-- headline -->

					</div><!-- col -->
				</div><!-- row -->
			</div><!-- container -->
			
			<div class="container">
				<div class="row">
					<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

						<div class="owl-carousel testimonials-slider">
							<?php
							$testim_qr = mysql_query("select * from sqs_testimonials where status = 1 order by created_on desc");
							while($testim_row = mysql_fetch_array($testim_qr))
							{
								?>
								
								<div class="item">
									
									<div class="testimonial">
										
										<img src="doc/testimonials/<?php echo $testim_row['testimo_image']; ?>" alt="">
										
										<blockquote>
											<p><?php echo $testim_row['testimo_statement']; ?></p>
										</blockquote>
										
										<div class="testimonial-author">
											
											<h4><?php echo $testim_row['testimo_name']; ?></h4>
											<h6><?php echo $testim_row['testimo_designation']; ?></h6>
											<p><?php echo $testim_row['testimo_comp']; ?></p>
											
										</div><!-- testimonial-author -->
										
									</div><!-- testimonial -->
									
								</div><!-- item -->
								<?php } ?>
								
							</div><!-- testimonias-slider -->

						</div><!-- col -->
					</div><!-- row -->
				</div><!-- container -->
				
				<section class="full-section dark-section parallax" id="section-2" data-stellar-background-ratio="0.1">
					<div class="full-section-container">
						
						<div class="container">
							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
									
									<h2 class="text-center no-margin-bottom txt_colr-chng"><strong>We believe in value addition through</strong></h2>
									
									
								</div><!-- col -->
							</div><!-- row -->
						</div><!-- container -->
						
						<br>
						<div class="container">
							<div class="row">
								<div class="col-lg-8 col-lg-offset-2 col-md-8 col-md-offset-2 col-sm-12 col-xs-12 text-center lin_aftr txt_colr-chng">
									<div class="col-sm-3 col-xs-3 text-center lin_aftr quate_col_full">
										
										<h3 class="text-center no-margin-bottom">People</h3><span></span>
										
									</div>
									<div class="col-sm-3 col-xs-3 text-center quate_col_full">
										
										<h3 class="text-center no-margin-bottom">Process</h3><span></span>
										
									</div>
									<div class="col-sm-3 col-xs-3 text-center quate_col_full">
										
										<h3 class="text-center no-margin-bottom">Reserve</h3><span></span>
										
									</div>
									<div class="col-sm-3 col-xs-3 quate_col_full">	
										
										<h3 class="text-center no-margin-bottom">Culture</h3>
										
									</div>
								</div>
							</div>
						</div> 
						
					</div><!-- full-section-container -->
				</section><!-- full-section -->
				
				<div class="container">
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

							<div class="headline">
								
								<h3>Blog</h3>
								<!-- <h6>what's going on</h6> -->
								
							</div><!-- headline -->

						</div><!-- col -->
					</div><!-- row -->
				</div><!-- container -->
				
				<div class="container">
					<div class="row">
						<?php
						$blog_qr = mysql_query("select * from sqs_blog where status = 1 order by created_on desc");
						while($blog_row = mysql_fetch_array($blog_qr))
						{
							?>
							
							<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">

								<div class="blog-article">
									
									<div class="blog-article-thumbnail">
										
										<img src="doc/blog/<?php echo $blog_row['blog_image']; ?>" alt="">	
										
									</div><!-- blog-article-thumbnail -->
									
									<div class="blog-article-details">
										
										<!--<a class="category" href="#">News</a>-->
										<a class="date" href="#"><?php echo date('F d, Y', strtotime($blog_row['created_on'])); ?></a>
										
									</div><!-- blog-article-details -->
									
									<h4 class="blog-article-title"><a href="#"><?php echo $blog_row['blog_title']; ?></a></h4>
									
									<div class="blog-article-content">
										
										
										<p><?php 
										$str_blog= $blog_row['blog_description'];
										if(strlen($str_blog)>190)
										{
											$pos_blog= strpos($str_blog, ' ', 190);
											echo substr($str_blog,0,$pos_blog);
										}else{
											echo $blog_row['blog_description'];
										}
										?></p>
										
										<a href="blog-detail.php?action=BlogDetail&Blog_id=<?php echo $blog_row['blog_id']; ?>">Read more <i class="sydney-icon-right"></i></a>
										
									</div><!-- blog-article-content -->													
									
								</div><!-- blog-article -->

							</div><!-- col -->
							<?php } ?>
							
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

		</body>

		</html>