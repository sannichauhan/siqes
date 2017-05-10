<?php
include("config/connection.php");
$obj = new Connection();
?>
<!doctype html>
<html>

<head>
<?php
$seo_query = mysql_query("select * from sqs_meta_seo where page_name= 'gallery_page'");
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
				<div class="container">
					<div class="row">
						<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
							
							<!-- <h5>Gallery</h5> -->
							
							
						</div><!-- col -->
					</div><!-- row -->
				</div><!-- container -->
			</div>
       <?php 
		$gall_typ_qr = mysql_query("select * from sqs_gallery_type where status = 1 order by gal_typ_name");
		$gall_img_qr = mysql_query("select * from sqs_gallery");
		$gall_img_qr1 = mysql_query("select * from sqs_gallery");
		?>    			
           	
		
			
			<div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    	<ul class="filter">
                            <li>
                                <a class="active" href="#" data-filter="*">All</a>
                            </li>
						<?php
						while($row_gall_typ = mysql_fetch_array($gall_typ_qr))
						{
						?>
                            <li>
                                <a href="#" data-filter=".categ-<?php echo $row_gall_typ['gal_typ_id']; ?>"><?php echo $row_gall_typ['gal_typ_name']; ?></a>
                            </li>
						<?php } ?>
                            <!--<li>
                                <a href="#" data-filter=".categ-2">Gallery-1</a>
                            </li>-->
                            
                        </ul>
                        
                    </div><!-- col -->
                </div><!-- row -->
            </div><!-- container -->
			
			<div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">

                        <div class="isotope col-3">
						<?php
					while($row_gall_img = mysql_fetch_array($gall_img_qr))
					{
					?>
							<div class="isotope-item categ-<?php echo $row_gall_img['gallery_type']; ?> ">
								
								<div class="portfolio-item">
										
									<div class="portfolio-item-thumbnail">
										
										<img src="doc/gallery/<?php echo $row_gall_img['gallery_url']; ?>" alt="">
										
									</div><!-- portfolio-item-thumbnail -->
									<div class="portfolio-item-hover">
										<a class="fancybox" data-fancybox-group="gallery" href="doc/gallery/<?php echo $row_gall_img['gallery_url']; ?>" ><?php echo $row_gall_img['image_name']; ?> <i class="sydney-icon-right"></i></a>
									</div>
								<!-- 	<div class="portfolio-item-details">
										<h5><a href="project-single.html">Lorem ipsum dolor sit amet</a></h5>
										<p>Lorem ipsum</p>
									</div> -->
									
								</div><!-- portfolio-item -->
								
							</div><!-- isotope-item -->
						<?php } ?>

						</div><!-- isotope -->

                    </div><!-- col -->
                </div><!-- row -->

            </div><!-- container -->
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

</body>

</html>
