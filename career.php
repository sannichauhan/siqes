<?php
include("config/connection.php");
$obj = new Connection();
?>
<!doctype html>
<html>

<head>
<?php
$seo_query = mysql_query("select * from sqs_meta_seo where page_name= 'career_page'");
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
						<div class="col-sm-12">
							
							<h5>Career</h5>
							
							
						</div><!-- col -->
					</div><!-- row -->
				</div><!-- container -->
			</div>
	<?php
	$start=0;
	$limit=2;
	$page='';
	if(isset($_GET['page']))
	{
		$page=$_GET['page'];
		
	}
	else
	{
	
	$page='1';
	}
	$start=($page-1)*$limit;
	
	//count total rows pagination
	$sql=mysql_query("select * from sqs_post_job where  status='1' LIMIT $start, $limit");
	$countRecod=mysql_query("select job_id from sqs_post_job where  status='1'");
	$rowsTotal=mysql_num_rows($countRecod);
	$total=ceil($rowsTotal/$limit);
	?>

	
					
           	<div class="container">
				<div class="row">
					<div class="col-md-7 col-sm-7 col-xs-12">
						<div class="table-responsive">
						<table class="table-condensed table table-striped">
							<thead>
								<tr>
									<th>Job Title</th>
									<th class="text-center">Post Date</th>
									<th class="text-center">Location</th>
									<th class="text-center">Experience</th>
								</tr>
							</thead>
							<tbody>
							<?php while($row_job = mysql_fetch_array($sql))
							{
								?>
								<tr>
									<td><a href="career-job-detail.php?action=GetJobId&Job_Id=<?php echo $row_job['job_id']; ?>"><?php echo $row_job['job_title']; ?></a></td>
									<td class="text-center"><?php echo date('F d, Y', strtotime($row_job['created_on'])); ?></td>
									<td class="text-center"><?php echo $row_job['location']; ?></td>
									<td class="text-center"><?php echo $row_job['experience']; ?></td>
								</tr>
					  <?php } ?>	
							</tbody>
						</table>
					</div>
					<nav aria-label="...">
					<ul class="pagination">
							<li>
							<?php if($page>1)
							{
							  echo "<a href='career.php?page=".($page-1)."'>&laquo;</a>";
							}
							?>
							</li>
							<?php 
							for($i=1;$i<=$total;$i++)
							{
									if($i==$page) 
									{ 
									  echo "<li><a class='current' href='career.php?page=".$i."'>".$i."</a></li>";
									}
									else 
									{
									  echo "<li><a href='career.php?page=".$i."'>".$i."</a></li>";
									}
									
							}
							?>
							<li>
							<?php
								if($page!=$total)
								{
									echo "<a href='career.php?page=".($page+1)."'>&raquo;</a>";
								}
							?>
							</li>
						</ul>
						</nav>
						<!--<nav aria-label="...">
						  <ul class="pagination">
						    <li class="disabled"><a href="#" title="Previous" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>
						    <li class="active"><a href="#">1 <span class="sr-only">(current)</span></a></li>
						    <li class=""><a href="#">2 <span class="sr-only"></span></a></li>
						    <li class=""><a href="#">3 <span class="sr-only"></span></a></li>
						    <li class=""><a href="#">4 <span class="sr-only"></span></a></li>
						    <li class=""><a href="#">5 <span class="sr-only"></span></a></li>
						    <li class=""><a href="#" title="Next" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>
						    <li class=""><a href="#" title="Last" aria-label="Last"><span aria-hidden="true">last</span></a></li>
						  </ul>
						</nav>-->
                    	
						
						
						
						
					</div><!-- col -->
					<div class="col-lg-5 col-mg-5 col-sm-12 col-xs-12">
						<div class="col-lg-12 col-sm-12 col-xs-12">
							<img src="images/career.jpg" class="img-responsive center-block">
						</div>
						
						<div class="col-lg-12 col-sm-12 col-xs-12">
							<br>
							<h4>EDI Specialist</h4>
							<ul>
								<li>Provides technical expertise and support for EDI communications.</li>
								<li>Test, implement and maintain EDI transactions.</li>
								<li>Analyze, design and develop specifications for enhancements and extensions to electronic data interchange application interfaces and maps.</li>
							</ul>
						</div>
						


					</div>
				
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
<!--<script>
	$(document).ready(function() {
		$(".tab_btn").click(function(){
		$(".form_tab2").show()
		$(".form_tab1").hide()
		$(".detail_btn").addClass("active_tab");
		$(".description_btn").removeClass("active_tab");
		$(".review_btn").removeClass("active_tab");
		$(".indications_btn").removeClass("active_tab");
	  });
	});
</script>-->
</body>

</html>
