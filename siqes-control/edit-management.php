<?php
//error_reporting(0);
include("../classes/site_class.php");
$obj = new Site();
if($_SESSION['admin']['name']=='')
	{
		echo "<script>window.location.href='index.php'</script>";
	}
	if(isset($_REQUEST['action']) and !empty($_REQUEST['action']) and ($_REQUEST['action']=='updateManagement'))
	{
	   
		$resp = $obj->updateManagement();
		if($resp==0)
		{
		  echo "<script>alert('Required parameter missing')</script>";
		}
		if($resp==5)
		{
			echo "<script>alert('Updated successfully')</script>";
			echo "<script>window.location.href='management-list.php'</script>";
		}
		if($resp==1 )
		{
			echo "<script>alert('Not save, Please try later')</script>";
			echo "<script>window.location.href='edit-management.php'</script>";
		}
		if($resp==8)
		{
				echo "<script>alert('Invalid  image type.')</script>";
				echo "<script>window.location.href='edit-management.php'</script>";
		}
		if($resp==7)
		{
			echo "<script>alert('Please upload valid image size')</script>";
			echo "<script>window.location.href='edit-management.php'</script>";
		}
	}
	if(isset($_REQUEST['manag_id'],$_REQUEST['action']) and ($_REQUEST['action']=='editManagement') and !empty($_REQUEST['manag_id']))
	{        
		$data  = mysql_fetch_array(mysql_query("SELECT * FROM sqs_management where manag_id='".$_REQUEST['manag_id']."'")); 
				
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
                    <li class="active">Management Zone</li>
                </ul>
            </div>
            <div class="workplace">
				<form name="frmmanagement" action="" method="post" onsubmit="return validEditmanage();" enctype="multipart/form-data"> 
				<input type="hidden" name="action" value="updateManagement" />
					<div class="row-fluid">
						<div class="span12">
							<div class="head clearfix">
								<div class="isw-documents"></div>
								<h1>Management Details</h1>
								<ul class="buttons">
									<li>
										<a href="#" class="isw-settings"></a>
										<ul class="dd-list">
											<li><a href="testimonials-list.php"><span class="isw-edit"></span> View/ Edit</a></li>
										</ul>
									</li>
								</ul>       
							</div>
							<div class="block-fluid">
								<div class="row-form clearfix" >
									<div class="span2" ><b>Name <span style="color:red">*</span>:</b></div>
									<div class="span4"> 
										<input type="text" name="name" value="<?php echo $data['manag_name']; ?>" maxlength="30" class="name" onkeypress="return nameCharacter(event)"/>
									</div>
									<div class="span2" ><b>Designation <span style="color:red">*</span>:</b></div>
									<div class="span4"> 
										<input type="text" name="designation" value="<?php echo $data['manag_desig']; ?>" maxlength="40" class="designation" />
									</div>
									
								</div>
								<div class="row-form clearfix" >
								<div class="span2" ><b>Image <span style="color:red">*</span>:</b></div>
							        <div class="span4"> 
									<?php if($data['manag_image']!=''){ ?>
												<a class="fancybox" rel="profile" href="<?php echo '../doc/management/'.$data['manag_image'] ?>"><img  width="40" src="<?php echo '../doc/management/'.$data['manag_image']; ?>" class="img-polaroid"></a>
												<?php } ?>
							        <input type="file" name="manage_image" class="manage_image" />
									<input type="hidden" name="edit_image" class="edit_image"  value="<?php echo $data['manag_image']; ?>">
								      <p class="hint">Please upload image(.png or .jpg or .jpeg or .gif),dimension(480X630)px</p>
								   </div>	
								</div>
								<div class="row-form clearfix" > 
								<div class="span2" ><b>Descriptions <span style="color:red">*</span>:</b></div>
										<div class="span4" >
                                       <textarea name="description"><?php echo $data['manag_desc']; ?></textarea>										
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
