<?php
error_reporting(-1);
include("../classes/site_class.php");
$obj = new Site();
if($_SESSION['admin']['name']=='')
	{
		echo "<script>window.location.href='index.php'</script>";
	}
	if(isset($_REQUEST['Submit']) and !empty($_REQUEST['Submit']))
	{
		$resp = $obj->addGallery();
		if($resp==0)
		{
		  echo "<script>alert('Required parameter missing')</script>";
		}
		if($resp==5)
		{
			echo "<script>alert('Added successfully')</script>";
			echo "<script>window.location.href='gallery-list.php'</script>";
		}
		if($resp==1 )
		{
			echo "<script>alert('Not save, Please try later')</script>";
			echo "<script>window.location.href='add-gallery.php'</script>";
		}
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
	
	<script>
	/*$(document).ready(function(){
		$('.gallery_type').change(function(){
			var g_type = $(this).val();
			if(g_type=='image')
			{
				$('#gallery_image').show();
			}
			else{
				$('#gallery_image').hide();
			}
			if(g_type=='video')
			{
				$('#gallery_video').show();
				
			}
			else{
				$('#gallery_video').hide();
			}
		})
	})*/
	</script>
	
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
				<form name="frmcgallery" action="" method="post" onsubmit="return validGallery();" enctype="multipart/form-data"> 
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
										<option value="select">Select Gallery </option>
										<?php 
										$gall_type_qr  = mysql_query("select * from sqs_gallery_type where status = 1");
										while($gall_type = mysql_fetch_array($gall_type_qr)) { ?>
										<option value="<?php echo $gall_type['gal_typ_id']; ?>"><?php echo $gall_type['gal_typ_name']; ?></option>
										<?php } ?>
										<!--<option value="video">Video</option>-->
										</select>
									</div>
								</div>
								<div class="row-form clearfix" id="gallery_image" style="display:block" >
								<div class="span2" ><b>Gallery Image <span style="color:red">*</span>:</b></div>
							        <div class="span4"> 
							        <input type="file" name="gallery_img" class="gallery_img" />
								      <p class="hint">Please upload image(.png or .jpg or .jpeg or .gif),dimension(480X370)px</p>
								   </div>
								
								   <div class="span2" ><b>Image Name <span style="color:red"></span>:</b></div>
										<div class="span4" > 
										<input type="text" name="image_name" class="image_name" />
										</div>
								</div>
								<!--<div class="row-form clearfix" > 
								<div class="span2" ><b>Descriptions <span style="color:red"></span>:</b></div>
										<div class="span8" >
                                       <textarea class="ckeditor" id="editor1"  name="description"></textarea>										
										</div>
									</div>-->
								<div class="row-form clearfix" >	
									<div class="span2" ><b>Status:</b></div>
									<div class="span4 "> 
										<input type="radio" name="status" class="status" style="float:left;" value="1" checked="checked" />
                                        Active
										<input type="radio" name="status" class="status" style="float:left;" value="0" />
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
