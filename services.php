<?php
include("config/connection.php");
$obj = new Connection();
?>
<!doctype html>
<html>

<head>
<?php
$seo_query = mysql_query("select * from sqs_meta_seo where page_name= 'services_page'");
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

<body class="service_page">

	<div id="main-container">
	
			<!-- Start Header -->
			<?php include 'includes/header.php'; ?>
			<!-- End Header -->
		
		<!-- PAGE CONTENT -->
			<div id="page-content">
				<div id="page-header">  
					<div class="container">
						<div class="row">
							<!-- <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
								<h5>Services & Support</h5>
							</div> -->
							
						</div>
						
					</div>
					
				</div>
           		<br />
					<div class="full-section-container">
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
	                	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
	                		<div class="row">
	                			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-3 block_1 active_tab">
			                    	<div class="service_block service_block1">
				                    	<div class="service_icon service_icon_2 text-center"><i class="sydney-icon-multimedia-option1"></i></div>
										<p><a href="javascript:void(0);" class="service_tab_heading tab_1">Software Development</a></p>
										<div class="active_icon"></div>
										<div class="active_show"></div>
			                    	</div>
			                    </div>
			                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-3 block_2 ">
			                    	<div class="service_block service_block2">
				                    	<div class="service_icon service_icon_2 text-center"><i class="sydney-icon-monitor2"></i></div>
										<p><a href="javascript:void(0);" class="service_tab_heading tab_2">Software QA</a></p>
										<div class="active_icon"></div>
										<div class="active_show"></div>
			                    	</div>
			                    </div>
			                    
			                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-3 block_3">
			                    	<div class="service_block service_block3">
				                    	<div class="service_icon service_icon_3 text-center"><i class="sydney-icon-smartphone2"></i></div>
										<p><a href="javascript:void(0);" class="service_tab_heading tab_3">ISTM</a></p>
										<div class="active_icon"></div>
										<div class="active_show"></div>
			                    	</div>
			                    </div>
			                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-3 block_4">
			                    	<div class="service_block service_block4">
				                    	<div class="service_icon service_icon_4 text-center"><i class="sydney-icon-ereader"></i></div>
										<p><a href="javascript:void(0);" class="service_tab_heading tab_4">EDI Service</a></p>
										<div class="active_icon"></div>
										<div class="active_show"></div>
			                    	</div>
			                    </div>
	                		</div>
	                	</div>
	                	<div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
	                		<div class="row">
	                			<div class="row">
	            		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 service_tab_1">
	            			<div class="service_1_tab service_tab active">
		            			<!-- <h5><strong>Software Development</strong></h5> -->
		            			<div class="row">
		            				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 left">
		            					<a class="list_heading" href="javascript:void(0);">Software Development</a>
		            					<ul class="service_list">
				            				<li><i class="fa fa-angle-double-right" style=""></i> <a href="javascript:void(0);">Java</a></li>
		            						<li><i class="fa fa-angle-double-right" style=""></i> <a href="javascript:void(0);">.Net</a></li>
		            						<li><i class="fa fa-angle-double-right" style=""></i> <a href="javascript:void(0);">PHP</a></li>
				            			</ul>
		            				</div>
		            				
		            			</div>
	            			</div>
	            		</div>
	            		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 service_tab_2">
	            			<div class="service_1_tab service_tab active">
		            			<div class="row">
		            				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 left">
		            					<a class="list_heading" href="javascript:void(0);">Software QA</a>
		            					<ul class="service_list">
				            				<li><i class="fa fa-angle-double-right" style=""></i> <a href="javascript:void(0);">Requirement Analysis</a></li>
		            						<li><i class="fa fa-angle-double-right" style=""></i> <a href="javascript:void(0);">Requirement Estimation</a></li>
		            						<li><i class="fa fa-angle-double-right" style=""></i> <a href="javascript:void(0);">Planning</a></li>
				            				<li><i class="fa fa-angle-double-right" style=""></i> <a href="javascript:void(0);">Execution</a></li>
				            			</ul>
		            				</div>
		            			</div>
	            			</div>
	            		</div>
	            		
	            		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 service_tab_3">
	            			<div class="service_1_tab service_tab active">
		            			<!-- <h5><strong>ISTM</strong></h5> -->
		            			<div class="row">
		            				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 left">
		            					<a class="list_heading" href="javascript:void(0);">ISTM</a>
		            					<p><span>Tier I – Global Customer Service</span></p>
		            					<p><span>Tier II – Technical</span></p>
		            					<p><span>Tier III – RCA (Incident and Problem Management)</span></p>
		            					<ul class="service_list">
				            				<li><i class="fa fa-angle-double-right" style=""></i> <a href="javascript:void(0);">CRM Applications</a></li>
		            						<li><i class="fa fa-angle-double-right" style=""></i> <a href="javascript:void(0);">Help Desk</a></li>
		            						<li><i class="fa fa-angle-double-right" style=""></i> <a href="javascript:void(0);">Test Management Tool</a>
		            							<ul>
		            								<li><i class="fa fa-angle-double-right" style=""></i> <a href="javascript:void(0);">SQLs and PLSQLs</a></li>
		            								<li><i class="fa fa-angle-double-right" style=""></i> <a href="javascript:void(0);">Database</a></li>
		            								<li><i class="fa fa-angle-double-right" style=""></i> <a href="javascript:void(0);">Process Flows</a></li>
		            								<li><i class="fa fa-angle-double-right" style=""></i> <a href="javascript:void(0);">Analytical Ability</a></li>
		            							</ul>
		            						</li>
				            			</ul>
		            				</div>
		            			</div>
	            			</div>
	            		</div>
	            		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 service_tab_4">
	            			<div class="service_1_tab service_tab active">
		            			<!-- <h5><strong>EDI Service</strong></h5> -->
		            			<div class="row">
		            				<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 left">
		            					<a class="list_heading" href="javascript:void(0);">EDI Service</a>
		            					<!-- <p><span>End to End EDI Services</span></p> -->
		            					<ul class="service_list">
		            						<li>
		            							<ul class="service_list last">
						            				<li><i class="fa fa-angle-double-right" style=""></i> <a href="javascript:void(0);">End to End EDI Services</a></li>
				            						<li><i class="fa fa-angle-double-right" style=""></i> <a href="javascript:void(0);">Manual QA</a></li>
				            						<li><i class="fa fa-angle-double-right" style=""></i> <a href="javascript:void(0);">Automation QA</a></li>
						            				<li><i class="fa fa-angle-double-right" style=""></i> <a href="javascript:void(0);">Web Services/API</a></li>
						            				<li><i class="fa fa-angle-double-right" style=""></i> <a href="javascript:void(0);">Stress & Performance</a></li>
						            			</ul>
		            						</li>
		            					</ul>
		            					
		            				</div>
	            			</div>
	            		</div>
	            	</div>
	            </div>
	                		</div>
	                	</div>
	                </div><!-- row -->
	            </div><!-- container -->
	            <div class="container">
	            	
					</div><!-- full-section-container -->
				
	            
			
			

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
		 $(document).ready(function(){ 
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
	<script>
		 $(document).ready(function(){ 
		 	 $(".service_block1, .tab_1").click(function(){
		 	 	var div = $(".service_tab_1");
		 	 	 //div.animate({height: '300px', opacity: '0.4'}, "slow");
		 	 	 div.animate({ opacity: '0.4'});
		 	 	 div.animate( {opacity: '1'});
				$(".service_tab_1").show()
				$(".service_tab_2").hide()
				$(".service_tab_3").hide()
				$(".service_tab_4").hide()
				$(".block_1").addClass("active_tab");
				$(".block_2").removeClass("active_tab");
				$(".block_3").removeClass("active_tab");
				$(".block_4").removeClass("active_tab");
			  });
		 	 $(".service_block2, .tab_2").click(function(){
		 	 	var div = $(".service_tab_2");
		 	 	div.animate({ opacity: '0.4'});
		 	 	 div.animate( {opacity: '1'});
				$(".service_tab_2").show()
				$(".service_tab_1").hide()
				$(".service_tab_3").hide()
				$(".service_tab_4").hide()
				$(".block_2").addClass("active_tab");
				$(".block_1").removeClass("active_tab");
				$(".block_3").removeClass("active_tab");
				$(".block_4").removeClass("active_tab");
			  });
		 	 $(".service_block3, .tab_3").click(function(){
		 	 	var div = $(".service_tab_3");
		 	 	div.animate({ opacity: '0.4'});
		 	 	 div.animate( {opacity: '1'});
				$(".service_tab_3").show()
				$(".service_tab_1").hide()
				$(".service_tab_2").hide()
				$(".service_tab_4").hide()
				$(".block_3").addClass("active_tab");
				$(".block_1").removeClass("active_tab");
				$(".block_2").removeClass("active_tab");
				$(".block_4").removeClass("active_tab");
			  });
		 	 $(".service_block4, .tab_4").click(function(){
		 	 	var div = $(".service_tab_4");
		 	 	div.animate({ opacity: '0.4'});
		 	 	 div.animate( {opacity: '1'});
				$(".service_tab_4").show()
				$(".service_tab_1").hide()
				$(".service_tab_2").hide()
				$(".service_tab_3").hide()
				$(".block_4").addClass("active_tab");
				$(".block_1").removeClass("active_tab");
				$(".block_2").removeClass("active_tab");
				$(".block_3").removeClass("active_tab");
			  });
		});
	</script>

</body>

</html>
