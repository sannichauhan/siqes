<div class="rev_slider_wrapper">
				<div class="rev_slider" data-version="5.0">
					<ul>
			<?php 
			$banner_query = mysql_query("select * from sqs_banner where status = 1");
			while($row_banner = mysql_fetch_array($banner_query))
			{
			?>
			
						<li data-transition="fade">
							
							<img src="doc/banner/<?php echo $row_banner['banner_image']; ?>" alt="" class="img-responsive">
							
						<div class="tp-caption"
								 data-x="center" 
								 data-y="center"
								 data-start="300" 
								 data-transform_in="o:0;s:700;"
								 data-transform_out="o:0;s:700;">
							</div>
							
							<div class="tp-caption big-title" 
								 data-x="center" 
								 data-y="center" 
								 data-speed="500" 
								 data-start="2000" 
								 data-transform_in="x:0;s:700;e:Power2.easeIn;"
                                 data-transform_out="x:0;s:700;">

								<?php echo $row_banner['banner_text']; ?>
							</div>
							
							
							
							<div class="tp-caption big-title-shadow" 
								 data-x="680" 
								 data-y="center" 
								 data-speed="700" 
								 data-start="2600" 
								 data-transform_in="o:0;s:700;"
                                 data-transform_out="x:100;s:700;">
								
							</div>
							
							
							
							
						</li>
			<?php } ?>
						
					</ul>
				</div><!-- rev_slider -->
			</div><!-- rev_slider_wrapper -->