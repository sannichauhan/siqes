<?php
//error_reporting(0);
include("../classes/site_class.php");
$obj = new Site();
if($_SESSION['admin']['name']=='')
	{
		echo "<script>window.location.href='index.php'</script>";
	}
	if(isset($_REQUEST['action']) and !empty($_REQUEST['action']) and ($_REQUEST['action']=='updateProduct'))
	{
	   
		$resp = $obj->updateProduct();
		if($resp==0)
		{
		  echo "<script>alert('Required parameter missing')</script>";
		}
		if($resp==5)
		{
			echo "<script>alert('Updated successfully')</script>";
			echo "<script>window.location.href='product-list.php'</script>";
		}
		if($resp==1 )
		{
			echo "<script>alert('Not save, Please try later')</script>";
			echo "<script>window.location.href='edit-product.php'</script>";
		}
		if($resp==8)
		{
				echo "<script>alert('Invalid  image type.')</script>";
				echo "<script>window.location.href='edit-product.php'</script>";
		}
		if($resp==7)
		{
			echo "<script>alert('Please upload valid image size')</script>";
			echo "<script>window.location.href='edit-product.php'</script>";
		}
	}
	if(isset($_REQUEST['prod_id'],$_REQUEST['action']) and ($_REQUEST['action']=='editProduct') and !empty($_REQUEST['prod_id']))
	{        
		$data  = mysql_fetch_array(mysql_query("SELECT * FROM sqs_product where prod_id='".$_REQUEST['prod_id']."'")); 
				
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
                    <li class="active">Product Zone</li>
                </ul>
            </div>
            <div class="workplace">
				<form name="frmproduct" action="" method="post" onsubmit="return validEditProd();" enctype="multipart/form-data"> 
				<input type="hidden" name="action" value="updateProduct" />
					<div class="row-fluid">
						<div class="span12">
							<div class="head clearfix">
								<div class="isw-documents"></div>
								<h1>Product Detail</h1>
								<ul class="buttons">
									<li>
										<a href="#" class="isw-settings"></a>
										<ul class="dd-list">
											<li><a href="product-list.php"><span class="isw-edit"></span> View/ Edit</a></li>
										</ul>
									</li>
								</ul>       
							</div>
							<div class="block-fluid">
								<div class="row-form clearfix" >
									<div class="span2" ><b>Product Name <span style="color:red">*</span>:</b></div>
									<div class="span4"> 
										<input type="text" name="product_name" maxlength="30" value="<?php echo $data['prod_name']; ?>" class="product_name" onkeypress="return nameCharacter(event)"/>
									</div>
									<div class="span2" ><b>Status:</b></div>
									<div class="span4 "> 
										<input type="radio" name="status" class="status" style="float:left;" value="1" <?php if($data['status']==1) { echo 'checked="checked"';} ?> />
                                        Active
										<input type="radio" name="status" class="status" style="float:left;" value="0" <?php if($data['status']==0) { echo 'checked="checked"';} ?>/>
                                        Deactive
									</div>
									
								</div>
								<div class="row-form clearfix" >
								<div class="span2" ><b>Product Image <span style="color:red">*</span>:</b></div>
							        <div class="span4"> 
									<?php if($data['prod_image']!=''){ ?>
												<a class="fancybox" rel="profile" href="<?php echo '../doc/product/'.$data['prod_image'] ?>"><img  width="40" src="<?php echo '../doc/product/'.$data['prod_image']; ?>" class="img-polaroid"></a>
												<?php } ?>
							        <input type="file" name="product_image" class="product_image" />
									<input type="hidden" name="edit_image" class="edit_image"  value="<?php echo $data['prod_image']; ?>">
								      <p class="hint">Please upload image(.png or .jpg or .jpeg or .gif),dimension(300X150)px</p>
								   </div>
								   <div class="span2" ><b>Short Descriprtion <span style="color:red">*</span>:</b></div>
										<div class="span4" > 
													<textarea  id="editor"  name="short_description" maxlength="200"><?php echo $data['prod_shortdesc']; ?></textarea>
										</div>
								</div>
								<div class="row-form clearfix" > 
								<div class="span2" ><b>Descriptions <span style="color:red">*</span>:</b></div>
										<div class="span8" >
                                       <textarea class="ckeditor" id="editor1"  name="description"><?php echo $data['prod_description']; ?></textarea>										
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
