<?php
error_reporting(-1);
include("../classes/site_class.php");
$obj = new Site();
if($_SESSION['admin']['name']=='')
	{
		echo "<script>window.location.href='index.php'</script>";
	}
	if(isset($_REQUEST['action']) and !empty($_REQUEST['action']) and ($_REQUEST['action']=='updatesubCat'))
	{
		
			$resp = $obj->updateSubCategory();
			if($resp==0)
			{
			  echo "<script>alert('Required parameter missing')</script>";
			}
			if($resp==5)
			{
				echo "<script>alert('Successfully Updated')</script>";
				echo "<script>window.location.href='subcategory-list.php'</script>";
			}
			if($resp==1 )
			{
				echo "<script>alert('Your subcategory is not save, Please try later')</script>";
				echo "<script>window.location.href='edit-subcategory.php'</script>";
			}
			
	}
	
	if(isset($_REQUEST['subcat_id'],$_REQUEST['action']) and ($_REQUEST['action']=='editsubCat') and !empty($_REQUEST['subcat_id']))
	{        
		$data  = mysql_fetch_array(mysql_query("SELECT * FROM eg_subcategory where subcat_id='".$_REQUEST['subcat_id']."'")); 
				
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
     <title>ESCO || GLOBAL</title>
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
                    <li><a href="dashboard.php">Dashboard</a> <span class="divider">></span></li>                
                    <li class="active">Edit Sub Category Zone</li>
                </ul>
            </div>
            <div class="workplace">
				<form name="frmsubcategory" id="frmsubcategory"  action="" method="post" onsubmit="return validSubCategory();" enctype="multipart/form-data">
				<input type="hidden" name="action" value="updatesubCat" />
                    <input type="hidden" name="subcat_id" value="<?php echo $data['subcat_id']; ?>" />
				
					<div class="row-fluid">
						<div class="span12">
							<div class="head clearfix">
								<div class="isw-documents"></div>
								<h1>Edit Sub Category Details</h1>
								<ul class="buttons">
									<li>
										<a href="#" class="isw-settings"></a>
										<ul class="dd-list">
											<li><a href="subcategory-list.php"><span class="isw-edit"></span> View/ Edit</a></li>
										</ul>
									</li>
								</ul>       
							</div>
							<div class="block-fluid">
								<div class="row-form clearfix" >
									<div class="span2" ><b>Sub Category <span style="color:red">*</span>:</b></div>
									<div class="span4"> 
									   <input type="text" name="subcat_name" maxlength="20" class="subcat_name" value="<?php echo $data['subcat_name'];?>" onkeypress="return nameCharacter(event)"/>
									</div>
									<div class="span2" ><b>Category <span style="color:red">*</span>:</b></div>
										<div class="span4" >
										 <select name="cat_name" class="cat_name">
										 <option value="">select</option>
										 <?php 
										 $cat_query = mysql_query("select * from eg_category where status = 1 order by cat_name");
										 while($row_cat = mysql_fetch_array($cat_query)){ ?>
										 <option value="<?php echo $row_cat['cat_id'];?>" <?php if($data['cat_id']==$row_cat['cat_id']){ echo "selected"; } ?>><?php echo $row_cat['cat_name'];?></option>
										 <?php } ?>

										 </select>		
										</div>
								</div>
								<div class="row-form clearfix" >    
									<div class="span2" ><b>Status:</b></div>
									<div class="span4 "> 
										<input type="radio" name="status" class="status" style="float:left;" value="1" <?php if($data['status']==1) { echo 'checked="checked"';} ?> />
                                        Active
										<input type="radio" name="status" class="status" style="float:left;" value="0" <?php if($data['status']==0) { echo 'checked="checked"';} ?> />
                                        Deactivate
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
</html>
