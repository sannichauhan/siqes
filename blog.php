<?php
include("config/connection.php");
$obj = new Connection();
?>
<!doctype html>
<html>

<head>
<?php
$seo_query = mysql_query("select * from sqs_meta_seo where page_name= 'blog_page'");
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
							<h5>Blog</h5>
							
							
						</div><!-- col -->
					</div><!-- row -->
				</div><!-- container -->
			</div>
<?php
//$blog_cat_sql = mysql_query("select * from sqs_blog_category where status = 1");
$blog_cat_sql = mysql_query("SELECT DISTINCT b.category_id,bc.* FROM sqs_blog b join sqs_blog_category bc WHERE b.category_id = bc.id and b.status=1 order by bc.blog_category");
$blog_sql = mysql_query("select * from sqs_blog where status = 1 order by created_on desc limit 5");

    
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

//------Accordind to category wise display blog with pagination------

if(isset($_REQUEST['CatId']) && ($_REQUEST['CatId'] != " " || $_REQUEST['CatId']!= null))
{
  $blog_sql1 = mysql_query("select b.*,bc.blog_category from sqs_blog b join sqs_blog_category bc on b.category_id = bc.id where b.category_id = '".$_REQUEST['CatId']."' and b.status = 1 LIMIT $start, $limit");
  
  $countRecod=mysql_query("select * from sqs_blog where category_id= '".$_REQUEST['CatId']."' and status = 1");
    $rowsTotal=mysql_num_rows($countRecod);
	$total=ceil($rowsTotal/$limit);  
}

//------Accordind to letest display blog------

elseif(isset($_REQUEST['LetestBlogId']) && ($_REQUEST['LetestBlogId'] != " " || $_REQUEST['LetestBlogId']!= null))
{ 
  $blog_sql1 = mysql_query("select b.*,bc.blog_category from sqs_blog b join sqs_blog_category bc on b.category_id = bc.id where b.blog_id = '".$_REQUEST['LetestBlogId']."' and b.status = 1");
  $total=1;
}

//------Accordind to archive wise display blog------

elseif(isset($_REQUEST['ArchMonth']) && ($_REQUEST['ArchMonth'] != " " || $_REQUEST['ArchMonth']!= null))
{ 

$arch_month = base64_decode($_REQUEST['ArchMonth']);
  $blog_sql1 = mysql_query("select * from sqs_blog where DATE_FORMAT(created_on,'%m-%Y') = DATE_FORMAT('".$arch_month."','%m-%Y') and status = 1 order by created_on desc LIMIT $start, $limit");
  
  $countRecod=mysql_query("select * from sqs_blog where DATE_FORMAT(created_on,'%m-%Y') = DATE_FORMAT('".$_REQUEST['ArchMonth']."','%m-%Y') and status = 1");
    $rowsTotal=mysql_num_rows($countRecod);
	$total=ceil($rowsTotal/$limit);
}

//------All display blog------
else
{
  $blog_sql1 = mysql_query("select b.*,bc.blog_category from sqs_blog b join sqs_blog_category bc on b.category_id = bc.id where b.status = 1 order by b.created_on desc LIMIT $start, $limit");
  
  $countRecod=mysql_query("select * from sqs_blog where status = 1");
    $rowsTotal=mysql_num_rows($countRecod);
	$total=ceil($rowsTotal/$limit);
}
?>
			
					
           			<div class="container">
				<div class="row">
					<div class="col-lg-9 col-md-9 col-sm-8 col-xs-12">
					<?php
					while($blog_detail= mysql_fetch_array($blog_sql1))
					{
						?>
						<div class="blog-article">
						
							<div class="blog-article-thumbnail">
								
								<img src="doc/blog/<?php echo $blog_detail['blog_image']; ?>" alt="">	
							
							</div><!-- blog-article-thumbnail -->
							
							<div class="blog-article-details">
								
								<a class="category" href="#"><?php echo $blog_detail['blog_title']; ?></a>
								<a class="date" href="#"><?php echo date('F d, Y', strtotime($blog_detail['created_on'])); ?></a>
								
							</div><!-- blog-article-details -->
							
							<h4 class="blog-article-title"><a ><?php echo $blog_detail['blog_title']; ?></a></h4>
							
							<div class="blog-article-content">
								
								<p><?php 
								if(isset($_REQUEST['LetestBlogId']) && ($_REQUEST['LetestBlogId'] != " " || $_REQUEST['LetestBlogId']!= null))
								{
									echo $blog_detail['blog_description'];
								}
								else 
								{
								//-------- limit character length 423------
										$strr= $blog_detail['blog_description'];
										if(strlen($strr)>423){
										$poss= strpos($strr, ' ', 423); 
										echo substr($strr,0,$poss);
										}
										else
										{
											echo $blog_detail['blog_description'];
										}
										?></p>
								
								
								<a href="blog-detail.php?action=BlogDetail&Blog_id=<?php echo $blog_detail['blog_id']; ?>">Read more <i class="sydney-icon-right"></i></a>
							<?php } ?>
							</div><!-- blog-article-content -->													
							
						</div><!-- blog-article -->
						<?php } ?>
						<nav aria-label="...">
					<ul class="pagination">
							<li>
							<?php if($page>1)
							{
							  echo "<a href='blog.php?page=".($page-1)."'>&laquo;</a>";
							}
							?>
							</li>
							<?php 
							for($i=1;$i<=$total;$i++)
							{
									if($i==$page) 
									{ 
									  echo "<li><a class='current' href='blog.php?page=".$i."'>".$i."</a></li>";
									}
									else 
									{
									  echo "<li><a href='blog.php?page=".$i."'>".$i."</a></li>";
									}
									
							}
							?>
							<li>
							<?php
								if($page!=$total)
								{
									echo "<a href='blog.php?page=".($page+1)."'>&raquo;</a>";
								}
							?>
							</li>
						</ul>
						</nav>
					</div><!-- col -->
					
					<div class="col-lg-3 col-md-3 col-sm-4 col-xs-12">

						<div class="widget widget-categories">
					   
							<h5 class="widget-title">Categories</h5>
							
							<ul>
							<?php
							while($blog_cat_value = mysql_fetch_array($blog_cat_sql))
							{
							?>
								<li><a href="blog.php?CatId=<?php echo $blog_cat_value['id']; ?>"><?php echo $blog_cat_value['blog_category']; ?></a></li>
							<?php } ?>
							</ul>
							
						</div><!-- widget-categories -->
						
						<div class="widget widget-recent-posts">

						
							<h5 class="widget-title">Latest Blog</h5>
							
							<ul>
							<?php while($blog_row = mysql_fetch_array($blog_sql)) 
							{ ?>
								<li>
									<img src="doc/blogsmall/<?php echo $blog_row['blog_image']; ?>" alt="">
									<!------ date formate like (July 07, 2016)------>
									<p><a class="post-date" href="blog.php?LetestBlogId=<?php echo $blog_row['blog_id']; ?>"><?php echo date('F d, Y', strtotime($blog_row['created_on'])); ?></a></p>
									<a class="post-title" href="blog.php?LetestBlogId=<?php echo $blog_row['blog_id']; ?>"><?php echo $blog_row['blog_title']; ?> </a>
								</li>
							<?php } ?>
							</ul>
							
						</div>
						<div class="widget widget-archives panel-group" id="accordion2">
						
							<h5 class="widget-title">Archives</h5>
							
							<ul>
							<?php
							//$arch_qr = mysql_query("select created_on, count(*) as count from sqs_blog where status = 1 group by DATE_FORMAT(created_on,'%m-%Y') order by created_on desc limit 1,$past_month_count");
							
							$arch_qr = mysql_query("select created_on, count(*) as count from sqs_blog where status = 1 group by DATE_FORMAT(created_on,'%Y') order by created_on desc ");
							
							while($arch_row = mysql_fetch_array($arch_qr))
							{
								$selected_year = date('Y', strtotime($arch_row['created_on']));
							?>
								<li data-toggle="collapse" data-parent="#accordion2" href="#collapse1-<?php echo $selected_year; ?>" aria-expanded="true"><a href="#"><?php echo $selected_year; ?></a>
								<ul id="collapse1-<?php echo $selected_year; ?>" class="sub_level panel-collapse collapse">
								
								<?php 
								$currentMonth = date('m');
								if($selected_year == date('Y'))
								{ 
									$arch_month_qr = mysql_query("select created_on, count(*) as count from sqs_blog where status = 1 and YEAR(created_on)= '".$selected_year."' and MONTH(created_on) <> '".$currentMonth."' group by DATE_FORMAT(created_on,'%m-%Y') order by created_on desc ");
								}
								else
								{ 
								$arch_month_qr = mysql_query("select created_on, count(*) as count from sqs_blog where status = 1 and YEAR(created_on)= '".$selected_year."' group by DATE_FORMAT(created_on,'%m-%Y') order by created_on desc ");
								}								
								while($month_row_arc = mysql_fetch_array($arch_month_qr))
								{
								?>
										<li onclick="f1('ArchMonth=<?php echo base64_encode($month_row_arc['created_on']); ?>');"><?php echo date('F', strtotime($month_row_arc['created_on'])); ?><span>(<?php echo $month_row_arc['count']; ?>)</span></li>
								<?php } ?>
										
									</ul>
								</li>
						<?php } ?>
								
							</ul>
							
						</div><!-- widget-archives -->
						
					
						
						
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

</body>
<script>
function f1(ArchMonth){
	
	window.location.href='blog.php?'+ArchMonth;
	//alert('blog.php?'+ArchMonth);
}

</script>
</html>
