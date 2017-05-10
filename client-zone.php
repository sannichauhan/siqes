<?php
	include("config/connection.php");
	$obj = new Connection();
?>

<!doctype html>
<html>
	<head>
		<?php
			$seo_query = mysql_query("select * from sqs_meta_seo where page_name= 'client_page'");
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
	</head>
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
								<!-- <h5>Client Zone</h5> -->
							</div><!-- col -->
						</div><!-- row -->
					</div><!-- container -->
				</div>
           		<br />
       			<div class="container">
	                <div class="row">
	                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
	                        <div class="headline">
								<h3>Our Clients</h3>
								<!-- <h6>we provide best services</h6> -->
							</div>
						</div>
	                </div>
	            </div>
				
				<div class="container clients">
					<div class="row">
						<?php
							$client_query = mysql_query("select * from sqs_client where status = 1 order by client_title");
							$client_count = mysql_num_rows($client_query);
							while($client = mysql_fetch_array($client_query))
							{ ?>
						
						<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
							<div class="image-box">
								<div class="image-box-thumbnail">
									<img src="doc/client/<?php echo $client['client_logo']; ?>" alt="">
								</div><!-- image-box-thumbnail -->
								<h6 class="res_client_name"><?php echo $client['client_title']; ?></h6>
								<div class="image-box-content">
									<h6><?php echo $client['client_title']; ?></h6>
									<p><?php echo $client['client_description']; ?></p>
									<!-- <a href="#">Read more <i class="sydney-icon-right"></i></a> -->
								
								</div><!-- image-box-content -->
							</div><!-- image-box -->
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
		
		<script>
			$(document).ready(function()
			{
				$(".service_1_toggle_btn").click(function(){
					// alert("low");
					$(".toggle_visible_block.service_1").toggleClass("more_text");
				});
				$(".service_2_toggle_btn").click(function(){
					// alert("low");
					$(".toggle_visible_block.service_2").toggleClass("more_text");
				});
				$(".service_3_toggle_btn").click(function(){
					// alert("low");
					$(".toggle_visible_block.service_3").toggleClass("more_text");
				});
				$(".service_4_toggle_btn").click(function(){
					// alert("low");
					$(".toggle_visible_block.service_4").toggleClass("more_text");
				});
				$(".service_5_toggle_btn").click(function(){
					// alert("low");
					$(".toggle_visible_block.service_5").toggleClass("more_text");
				});
				$(".service_6_toggle_btn").click(function(){
					// alert("low");
					$(".toggle_visible_block.service_6").toggleClass("more_text");
				});
			});
		</script>
	</body>
</html>
