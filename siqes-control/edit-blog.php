<?php
//error_reporting(0);
include("../classes/site_class.php");
$obj = new Site();
if($_SESSION['admin']['name']=='')
	{
		echo "<script>window.location.href='index.php'</script>";
	}
	if(isset($_REQUEST['action']) and !empty($_REQUEST['action']) and ($_REQUEST['action']=='updateBlog'))
	{
	   
		$resp = $obj->editBlog();
		if($resp==0)
		{
		  echo "<script>alert('Required parameter missing')</script>";
		}
		if($resp==5)
		{
			echo "<script>alert('Updated successfully')</script>";
			echo "<script>window.location.href='blog-list.php'</script>";
		}
		if($resp==1 )
		{
			echo "<script>alert('Not save, Please try later')</script>";
			echo "<script>window.location.href='edit-blog.php'</script>";
		}
		if($resp==8)
		{
				echo "<script>alert('Invalid  image type.')</script>";
				echo "<script>window.location.href='edit-blog.php'</script>";
		}
		if($resp==7)
		{
			echo "<script>alert('Please upload valid image size')</script>";
			echo "<script>window.location.href='edit-blog.php'</script>";
		}
	}
	if(isset($_REQUEST['blog_id'],$_REQUEST['action']) and ($_REQUEST['action']=='editBlog') and !empty($_REQUEST['blog_id']))
	{        
		$data  = mysql_fetch_array(mysql_query("SELECT * FROM sqs_blog where blog_id='".$_REQUEST['blog_id']."'")); 
				
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>        
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
    <!--[if gt IE 8]>
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <![endif]-->
     <title>SIQES</title>
    <?php  include("scripting-admin.php"); ?>
	
</head>
<body>
    <div class="wrapper"> 
        <!--BEGIN header-->
		<?php include("inc-header.php");?>
		<!-- END header--> 
		<!--BEGIN Navigation-->
		<?php include("inc-navigation.php");?>
		<!-- END Navigation--> 
        <div class="content">
            <div class="breadLine">

                <ul class="breadcrumb">
                    <li><a href="#">Dashboard</a> <span class="divider">></span></li>                
                    <li class="active">Blog Zone</li>
                </ul>
            </div>
            <div class="workplace">
				<form name="frmcblog" action="" method="post" onsubmit="return validEditBlog();" enctype="multipart/form-data"> 
				<input type="hidden" name="action" value="updateBlog" />
					<div class="row-fluid">
						<div class="span12">
							<div class="head clearfix">
								<div class="isw-documents"></div>
								<h1>Blog Details</h1>
								<ul class="buttons">
									<li>
										<a href="#" class="isw-settings"></a>
										<ul class="dd-list">
											<li><a href="blog-list.php"><span class="isw-edit"></span> View/ Edit</a></li>
										</ul>
									</li>
								</ul>       
							</div>
							<div class="block-fluid">
								<div class="row-form clearfix" >
									<div class="span2" ><b>Blog Title <span style="color:red">*</span>:</b></div>
									<div class="span4"> 
										<input type="text" name="blog_title" value="<?php echo $data['blog_title']; ?>" maxlength="30" class="blog_title" onkeypress="return nameCharacter(event)"/>
									</div>
									<div class="span2" ><b>Blog Image <span style="color:red">*</span>:</b></div>
							        <div class="span4">
									<?php if($data['blog_image']!=''){ ?>
												<a class="fancybox" rel="profile" href="<?php echo '../doc/blog/'.$data['blog_image'] ?>"><img  width="40" src="<?php echo '../doc/blog/'.$data['blog_image']; ?>" class="img-polaroid"></a>
												<?php } ?>
									
							        <input type="file" name="blog_img" class="blog_img" />
									<input type="hidden" name="edit_img" class="edit_img"  value="<?php echo $data['blog_image']; ?>">
								      <p class="hint">Please upload image(.png or .jpg or .jpeg or .gif),dimension(850X380)px</p>
								   </div>
									
								</div>
								<!--<div class="row-form clearfix" >  
									<div class="span2" ><b>Small Image <span style="color:red">*</span>:</b></div>
							        <div class="span4"> 
									<?php if($data['small_image']!=''){ ?>
												<a class="fancybox" rel="profile" href="<?php echo '../doc/blogsmall/'.$data['small_image'] ?>"><img  width="40" src="<?php echo '../doc/blogsmall/'.$data['small_image']; ?>" class="img-polaroid"></a>
												<?php } ?>
							        <input type="file" name="small_img" class="small_img" />
									<input type="hidden" name="edit_small_img" class="edit_small_img"  value="<?php echo $data['small_image']; ?>">
								      <p class="hint">Please upload image(.png or .jpg or .jpeg or .gif),dimension(40X40)px</p>
								   </div>
								</div>-->
								<div class="row-form clearfix" >
								<div class="span2" ><b>Blog Category <span style="color:red">*</span>:</b></div>
										<div class="span4" > 
										<select name="category" class="category" />
										<option value="select">Select Category</option>
										<?php $cat_sql = mysql_query("select * from sqs_blog_category where status = 1");
										while($cat_row = mysql_fetch_array($cat_sql))
										{
										?>
										<option value="<?php echo $cat_row['id']; ?>" <?php if($data['category_id'] == $cat_row['id']) { echo "selected";} ?>><?php echo $cat_row['blog_category']; ?></option>
										<?php } ?>
										</select>
										</div>
								   <!--<div class="span2" ><b>Url <span style="color:red">*</span>:</b></div>
										<div class="span4" > 
										<input type="text" name="blog_url" value="<?php echo $data['blog_url']; ?>" class="blog_url" />
										</div>-->
								</div>
								<div class="row-form clearfix" > 
								<div class="span2" ><b>Descriptions <span style="color:red">*</span>:</b></div>
										<div class="span8" >
                                       <textarea class="ckeditor" id="editor1"  name="description"><?php echo $data['blog_description']; ?></textarea>										
										</div>
									</div>
									<div class="row-form clearfix" > 
								     <div class="span2" ><b>Meta Title <span style="color:red"></span>:</b></div>
										<div class="span4" >
                                       <input type="text" name="meta_title" value="<?php echo $data['meta_title']; ?>" class="meta_title" />										
										</div>
										<div class="span2" ><b>Meta Keword <span style="color:red"></span>:</b></div>
										<div class="span4" >
                                       <input type="text" name="meta_key" value="<?php echo $data['meta_keyword']; ?>" class="meta_key" />										
										</div>
									</div>
								<div class="row-form clearfix" > 
								     <div class="span2" ><b>Meta Description <span style="color:red"></span>:</b></div>
										<div class="span4" >
                                       <textarea class="meta_desc" name="meta_desc"><?php echo $data['meta_description']; ?></textarea>										
										</div>
										
									</div>	
									<div class="row-form clearfix" > 
								<div class="span2" ><b>Status:</b></div>
									<div class="span4 "> 
										<input type="radio" name="status" class="status" style="float:left;" value="1" <?php if($data['status']==1) { echo 'checked="checked"';} ?> />
                                        Active
										<input type="radio" name="status" class="status" style="float:left;" value="0" <?php if($data['status']==0) { echo 'checked="checked"';} ?>/>
                                        Deactive
									</div>
								</div>
								<div class="footer tar">
									<input type="submit" name="Submit" value="Update"  class="btn"/>
								</div>                            
							</div>
						</div>
					</div>
				</form>
                <div class="dr"><span></span></div>
            </div>
        </div>   
    </div>
</body>
<script src="ckeditor/ckeditor.js"></script>
<script src="ckeditor/adapters/jquery.js"></script>
</html>	
