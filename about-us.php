<?php
include("config/connection.php");
$obj = new Connection();
?>
<!doctype html>
<html>

<head>
	<?php
	$seo_query = mysql_query("select * from sqs_meta_seo where page_name= 'about_page'");
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
				
				<div id="page-header">  
					<div class="container-fluid">
						<div class="row">
							<img src="images/banner/banner-about.jpg" alt="" class="image-btn img-responsive">
						</div>
					</div>
					<div class="container">
						<div class="row">
							<!-- <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<h5>About Us</h5>
							</div> -->
						</div>
					</div>
				</div>
				<br />
				<div class="container">
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

							<div class="headline">
								
								<h3>What are we about</h3>
								<!-- <h6>discover us</h6> -->
								
							</div><!-- headline -->

						</div><!-- col -->
					</div><!-- row -->
				</div><!-- container -->
				<!-- <div class="container"> -->
				<?php
				$query = mysql_query("SELECT * FROM sqs_aboutus");
				$k=1; 
				while($content = mysql_fetch_array($query))
				{

					?>
					<div class="container">
						<div class="row"> 


							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 c_bord_left">
								<h5><strong><?php echo $content['about_title']; ?></strong></h5>
								<?php echo $content['about_description']; ?>
							</div>

						</div>
					</div>
					<?php	
				}
				?>


				<section class="full-section dark-section parallax" id="section-4" data-stellar-background-ratio="0.1">
					<div class="full-section-overlay-color dark_overlay_color"></div>
					<div class="full-section-container">
						<div class="container">
							<div class="row">
								<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 align_center">
									<h3 class="last">We provide the best Services</h3>
								</div><!--col -->
								<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 align_center">
									<a class="btn dark_btn" href="services.php">Go to services</a>
								</div><!-- col -->
							</div><!-- row -->
						</div><!-- container -->
					</div><!-- full-section-container -->
				</section><!-- full-section -->
				<!-- <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                        <div class="headline">
							
							<h3>Meet The Management</h3>
							<h6>here to help</h6>
							
						</div>
						
                </div>
            </div>
        
        -->
		<!-- 	<div class="container">
                <div class="row">
					<div class="owl-carousel team-slider">
			<?php 
			$team_query = mysql_query("select * from sqs_management");
			 while($team = mysql_fetch_array($team_query))
			 {
			?>		<div class="item">
                        <div class="about-me">
							<img src="doc/management/<?php echo $team['manag_image']; ?>" alt="">
							<h5><?php echo $team['manag_name']; ?></h5>
							<h6><?php echo $team['manag_desig']; ?></h6>
							<p><?php echo $team['manag_desc']; ?></p>
						</div>
                    </div>
			 <?php } ?>		
					</div>
                </div>
            </div> -->

        </div>


        <!-- FOOTER -->
        <!-- Start Footer -->
        <?php include 'includes/footer.php'; ?>
        <!-- End Footer -->
        <!-- FOOTER -->

        <!-- </div> --><!-- MAIN CONTAINER -->


        <!-- SCROLL UP -->
        <a id="scroll-up"><i class="fa fa-angle-up"></i></a>

        <!-- Start Foot -->
        <?php include 'includes/foot.php'; ?>
        <!-- End Foot -->

    </body>

    </html>
