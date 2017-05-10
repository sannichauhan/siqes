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
		$resp = $obj->UpdateAboutus();
		if($resp==0)
		{
		  echo "<script>alert('Required parameter missing')</script>";
		}
		if($resp==5)
		{
			echo "<script>alert('Updated successfully')</script>";
			//echo "<script>window.location.href='product-list.php'</script>";
		}
		if($resp==1 )
		{
			echo "<script>alert('Not save, Please try later')</script>";
			//echo "<script>window.location.href='add-product.php'</script>";
		}
	}
	//$data  = mysql_fetch_array(mysql_query("SELECT * FROM sqs_aboutus"));
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
	$(document).ready(function(){
		$('.content_type').change(function(){
			var selected_value = $(this).val();
			//alert(selected_value);
			$.ajax({
			url: 'ajax.php',
			type: 'POST',
			data: {action: 'get_content',content_type: selected_value},
			success: function(data) { 
				if(data !=''){ 
				var res = data.split("$$");
					CKEDITOR.instances['editor1'].setData(res[0]);
					$('.img_abt').html(res[1]);
				}
			  }
           });
		})
	})
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
                    <li class="active">About Us Zone</li>
                </ul>
            </div>
            <div class="workplace">
				<form name="frmabout" action="" method="post" onsubmit="return validAboutUsUpdate();" enctype="multipart/form-data"> 
					<div class="row-fluid">
						<div class="span12">
							<div class="head clearfix">
								<div class="isw-documents"></div>
								<h1>About Us Detail</h1>
								<ul class="buttons">
									<li>
										<a href="#" class="isw-settings"></a>
										<ul class="dd-list">
											<li><a href="edit-aboutus.php"><span class="isw-edit"></span> View/ Edit</a></li>
										</ul>
									</li>
								</ul>       
							</div>
							<div class="block-fluid">
								<div class="row-form clearfix" >
									<div class="span2" ><b>Content Type <span style="color:red">*</span>:</b></div>
									<div class="span4"> 
										<select name="content_type" class="content_type">
										<option value="">Select Type </option>
										<option value="About Us">About Us</option>
										<option value="Our Vision">Our Vision</option>
										<option value="Our Mission">Our Mission</option>
										<option value="Our Vallues">Our Vallues</option>
										</select>
									</div>
									
									<div class="span2" ><b>Image <span style="color:red">*</span>:</b></div>
							        <div class="span4">
									<div class="img_abt"> </div>
							        <input type="file" name="about_image"  class="image" />
									<input type="hidden" name="image_image" class="image_image"  value="<?php echo $data['about_image']; ?>">
								      <p class="hint">Please upload image(.png or .jpg or .jpeg or .gif),dimension(480X350)px</p>
								   </div>
								</div>
								<!--<div class="row-form clearfix" >
								<div class="span2" ><b>Banner <span style="color:red">*</span>:</b></div>
									<div class="span4"> 
									<?php if($data['about_banner']!=''){ ?>
												<a class="fancybox" rel="profile" href="<?php echo '../doc/aboutusbanner/'.$data['about_banner'] ?>"><img  width="40" src="<?php echo '../doc/aboutusbanner/'.$data['about_banner']; ?>" class="img-polaroid"></a>
												<?php } ?>
									<input type="file" name="banner"  class="banner" />
									<input type="hidden" name="banner_image" class="banner_image"  value="<?php echo $data['about_banner']; ?>">
										<p class="hint">Please upload image(.png or .jpg or .jpeg or .gif),dimension(600X300)px</p>
										</div>
								
								</div>
								<div class="row-form clearfix" > 
								<div class="span2" ><b>Short Descriprtion <span style="color:red">*</span>:</b></div>
										<div class="span4" > 
													<textarea  id="editor1"  name="short_description"  maxlength="500"> <?php echo $data['about_shortdesc']; ?> </textarea>
										</div>
									</div>-->
								<div class="row-form clearfix" >    
									<div class="span2" ><b>Descriptions <span style="color:red">*</span>:</b></div>
									<div class="span8">
										<textarea class="ckeditor content_desc" id="editor1"  name="long_description"> </textarea>
									</div>
								</div>
								<!--<div class="row-form clearfix" >
								<div class="span2" ><b>Status:</b></div>
									<div class="span4 "> 
										<input type="radio" name="status" class="status" style="float:left;" value="1" <?php if($data['status']==1) { echo 'checked="checked"';} ?> />
                                        Active
										<input type="radio" name="status" class="status" style="float:left;" value="0" <?php if($data['status']==0) { echo 'checked="checked"';} ?>/>
                                        Deactive
									</div>
									</div>-->
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
