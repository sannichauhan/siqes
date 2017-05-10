<?php
//error_reporting(0);
include("../classes/site_class.php");
$obj = new Site();
if($_SESSION['admin']['name']=='')
	{
		echo "<script>window.location.href='index.php'</script>";
	}
	if(isset($_REQUEST['action']) and !empty($_REQUEST['action']) and ($_REQUEST['action']=='updateGallery'))
	{
	   
		$resp = $obj->editGallery();
		if($resp==0)
		{
		  echo "<script>alert('Required parameter missing')</script>";
		}
		if($resp==5)
		{
			echo "<script>alert('Updated successfully')</script>";
			echo "<script>window.location.href='gallery-list.php'</script>";
		}
		if($resp==1 )
		{
			echo "<script>alert('Not save, Please try later')</script>";
			echo "<script>window.location.href='edit-gallery.php'</script>";
		}
		if($resp==8)
		{
				echo "<script>alert('Invalid  image type.')</script>";
				echo "<script>window.location.href='edit-gallery.php'</script>";
		}
		if($resp==7)
		{
			echo "<script>alert('Please upload valid image size')</script>";
			echo "<script>window.location.href='edit-gallery.php'</script>";
		}
	}
	if(isset($_REQUEST['gallery_id'],$_REQUEST['action']) and ($_REQUEST['action']=='editGallery') and !empty($_REQUEST['gallery_id']))
	{        
		$data  = mysql_fetch_array(mysql_query("SELECT * FROM sqs_gallery where gallery_id='".$_REQUEST['gallery_id']."'")); 
				
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
                    <li class="active">Gallery Zone</li>
                </ul>
            </div>
            <div class="workplace">
				<form name="frmcgallery" action="" method="post" onsubmit="return validEditGallery();" enctype="multipart/form-data"> 
				<input type="hidden" name="action" value="updateGallery" />
					<div class="row-fluid">
						<div class="span12">
							<div class="head clearfix">
								<div class="isw-documents"></div>
								<h1>Gallery Details</h1>
								<ul class="buttons">
									<li>
										<a href="#" class="isw-settings"></a>
										<ul class="dd-list">
											<li><a href="gallery-list.php"><span class="isw-edit"></span> View/ Edit</a></li>
										</ul>
									</li>
								</ul>       
							</div>
							<div class="block-fluid">
								<div class="row-form clearfix" >
									<div class="span2" ><b>Gallery Type <span style="color:red">*</span>:</b></div>
									<div class="span4"> 
										<select name="gallery_type" class="gallery_type">
										<option value="select">Select Gallery</option>
										<!--<?php if($data['gallery_type']== 'image'){ ?>
										<option value="image">Image</option>
										<?php } else { ?>
										<option value="video">Video</option>
										<?php } ?>-->
										<?php 
										$gall_type_qr  = mysql_query("select * from sqs_gallery_type where status = 1");
										while($gall_type = mysql_fetch_array($gall_type_qr)) { ?>
										<option value="<?php echo $gall_type['gal_typ_id']; ?>" <?php if($gall_type['gal_typ_id'] == $data['gallery_type']) echo "selected" ?>><?php echo $gall_type['gal_typ_name']; ?></option>
										<?php } ?>
										</select>
									</div>
								</div>
								<?php //if($data['gallery_type']== 'image'){ ?>
								<div class="row-form clearfix" id="gallery_image" >
								<div class="span2" ><b>Gallery Image <span style="color:red">*</span>:</b></div>
							        <div class="span4">
									<?php if($data['gallery_type']!=''){ ?>
												<a class="fancybox" rel="profile" href="<?php echo '../doc/gallery/'.$data['gallery_url'] ?>"><img  width="40" src="<?php echo '../doc/gallery/'.$data['gallery_url']; ?>" class="img-polaroid"></a>
												<?php } ?>
							        <input type="file" name="gallery_img" class="gallery_img" />
									<input type="hidden" name="gall_img" class="gall_img"  value="<?php echo $data['gallery_url']; ?>">
								      <p class="hint">Please upload image(.png or .jpg or .jpeg or .gif),dimension(480X370)px</p>
								   </div>
								   <div class="span2" ><b>Image Name <span style="color:red"></span>:</b></div>
										<div class="span4" > 
										<input type="text" value="<?php echo $data['image_name']; ?>" name="image_name" class="image_name" />
										</div>
								</div>
								<?php //} else { ?>
								<!--<div class="row-form clearfix" id="gallery_video" >
								   <div class="span2" ><b>Video Url <span style="color:red">*</span>:</b></div>
										<div class="span4" > 
										<input type="text" name="video_url" value="<?php echo $data['gallery_url']; ?>" class="video_url" />
										</div>
								</div>-->
								<?php //} ?>
								<!--<div class="row-form clearfix" > 
								<div class="span2" ><b>Descriptions <span style="color:red"></span>:</b></div>
										<div class="span8" >
                                       <textarea class="ckeditor" id="editor1"  name="description"><?php echo $data['gallery_description']; ?></textarea>										
										</div>
									</div>-->
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
									<input type="submit" name="Submit" value="Submit"  class="btn"/>
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
