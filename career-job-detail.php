<?php
include("config/connection.php");
$obj = new Connection();
?>
<!doctype html>
<html>

<head>
<?php
	if(isset($_REQUEST['action'],$_REQUEST['Job_Id']) && $_REQUEST['action']=='GetJobId' && $_REQUEST['Job_Id']!='')
	{
		$job_id = $_REQUEST['Job_Id'];
		$job_detail_qr = mysql_query("select * from sqs_post_job where  job_id='".$job_id."'");
		$row_job_detail = mysql_fetch_array($job_detail_qr);
	}
	?>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
	<meta name="keywords" content="<?php if($row_job_detail['meta_keyword']!="") echo $row_job_detail['meta_keyword']; ?>">
	<meta name="description" content="<?php if($row_job_detail['meta_description']!="") echo $row_job_detail['meta_description']; ?>">
	
	<title>SIQES : <?php if($row_job_detail['meta_title']!="") echo $row_job_detail['meta_title']; ?></title>
	
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
							
							<!-- <h5>Job Detail</h5> -->
							
							
						</div><!-- col -->
					</div><!-- row -->
				</div><!-- container -->
			</div>
			
           	<div class="container">
				<div class="row">
					<div class="col-lg-6 col-lg-offset-3 col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3 col-xs-12">
						<h5><strong>Job Details</strong></h5>
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
									<tr>
										<td><a href="#"><?php echo $row_job_detail['job_title']; ?></a></td>
										<td class="text-center"><?php echo date('F d, Y', strtotime($row_job_detail['created_on'])); ?></td>
										<td class="text-center"><?php echo $row_job_detail['location']; ?></td>
										<td class="text-center"><?php echo $row_job_detail['experience']; ?></td>
									</tr>
									
								</tbody>
							</table>
						</div>
						<h5><strong>Job Description</strong></h5>
						<div class="table-responsive">
							<?php echo $row_job_detail['job_detail']; ?>
						</div>
						 <a class="btn tab_btn" href="career-job-form.php?action=GetJobId&Job_Id=<?php echo $row_job_detail['job_id']; ?>">Apply</a>
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
