<?php
require_once("config/connection.php");
$obj = new Connection();


$link = mysql_fetch_array(mysql_query("select * from sqs_sitemanagement"));

?>
<header>
	<div id="header-top">
		
		<div class="container">
			<div class="row">
				<div class="col-sm-7">
					
					<div class="widget widget-contact">
						
						<ul>
							<li>
								<i class="sydney-icon-location1"></i>
								<?php echo $link['site_address']; ?>
							</li>
									<!--  <li>    
										<i class="sydney-icon-alarm"></i>
										+91 120 4782030
									</li>  -->
									<li class="pull-right res_pull_left">
										<i class="sydney-icon-active "></i>
										<?php echo $link['sitephone_no']; ?>
									</li>
								</ul>
								
							</div><!-- widget-contact -->
							
						</div><!-- col -->
						<div class="col-sm-3">
						<!-- 	
							<div class="widget widget-search header_search">
								
								
								<script>
								(function() {
									var cx = '014681256390523477746:n4we8omj1-e';
									var gcse = document.createElement('script');
									gcse.type = 'text/javascript';
									gcse.async = true;
									gcse.src = 'https://cse.google.com/cse.js?cx=' + cx;
									var s = document.getElementsByTagName('script')[0];
									s.parentNode.insertBefore(gcse, s);
								})();
								</script>
								<gcse:search></gcse:search>
								
							</div> -->
							<!-- widget-search -->
							
						</div><!-- col -->
						<div class="col-sm-2">
							<div class="widget widget-contact font-top">
								<ul class="top_link">
									<li><a href="blog.php">Blog</a></li>
									<li><a href="career.php">Career</a></li>									
									<li ><a href="request-for-query.php">RFQ</a></li>
								</ul>
							</div>
						</div>
					</div><!-- row -->
				</div><!-- container -->
				
			</div><!-- header-top -->
			
			<div id="header">
				
				<div class="container">
					<div class="row">
						<div class="col-sm-2">
							
							<!-- LOGO -->
							<div class="logo_main">
								<a href="index.php">
									<img src="images/logos/logo.png" alt="">
								</a>
							</div><!-- LOGO -->
							
						</div><!-- col -->
						<div class="col-sm-10">
							
							<!-- MENU --> 
							<nav>
								
								<a id="mobile-menu-button" href="#"><i class="fa fa-bars"></i></a>
								
								<ul class="menu clearfix" id="menu">
									<li ><a href="index.php">Home</a></li>
									<li ><a href="about-us.php">About Us</a></li>
									<li ><a href="services.php">Services</a></li>
									<li ><a href="client-zone.php">Client Zone</a></li>
									<!-- <li ><a href="partner-zone.php">Partners Zone</a></li> -->
									<li ><a href="travel-portal.php">Other Ventures</a></li>
									<!-- <li ><a href="request-for-query.php">RFQ</a></li> -->
									<!-- <li ><a href="gallery.php">Gallery</a></li> -->
									<!-- <li ><a href="contact.php">Contact Us</a></li> -->
									
								</ul>
								
							</nav>
							
						</div><!-- col -->
					</div><!-- row -->
				</div><!-- container -->
				
			</div><!-- header -->
		</header>
		