<?php
include("config/connection.php");
$obj = new Connection();
?>
<!doctype html>
<html>

<head>
<?php 
     $blog_id = $_REQUEST['Blog_id'];
      if(isset($_REQUEST['Blog_id'],$_REQUEST['action']) and ($_REQUEST['action']=='BlogDetail') and !empty($_REQUEST['Blog_id']) )	
	  {		  
         $detail_blog_qr = mysql_query("select b.*,bc.blog_category from sqs_blog b join sqs_blog_category bc on b.category_id = bc.id where b.blog_id = '".$blog_id."'");
		 $row_detail = mysql_fetch_array($detail_blog_qr);
	  }
    ?>	
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">
	<meta name="keywords" content="<?php if($row_detail['meta_keyword']!="") echo $row_detail['meta_keyword']; ?>">
	<meta name="description" content="<?php if($row_detail['meta_description']!="") echo $row_detail['meta_description']; ?>">
	
	<title>SIQES : <?php if($row_detail['meta_title']!="") echo $row_detail['meta_title']; ?></title>
	
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
							
							<h5>Blog Detail</h5>
							
							
						</div><!-- col -->
					</div><!-- row -->
				</div><!-- container -->
			</div>
	
					<div class="container">
				<div class="row">
					<div class="col-md-offset-1 col-md-10">
						
						<div class="blog-article">
						
							<div class="blog-article-thumbnail">
								
								<img src="doc/blog/<?php echo $row_detail['blog_image']; ?>" alt="">	
							
							</div><!-- blog-article-thumbnail -->
							
							<h4 class="blog-article-title"><?php echo $row_detail['blog_title']; ?></h4>
							
							<div class="blog-article-details">
							
								<a class="date" href="#"><?php echo date('F d, Y', strtotime($row_detail['created_on'])); ?></a>
								Posted by: <a class="author" href="#"><?php echo $row_detail['created_by']; ?></a>
								
								
								
							</div><!-- blog-article-details -->
							
							<div class="blog-article-content">
								
								<p><?php echo $row_detail['blog_description']; ?></p>
								
							</div><!-- blog-article-content -->													
						
						</div><!-- blog-article -->
						
                     </div><!-- col -->
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
