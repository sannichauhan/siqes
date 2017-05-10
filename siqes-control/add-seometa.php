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
		$resp = $obj->addSeo();
		if($resp==0)
		{
		  echo "<script>alert('Required parameter missing')</script>";
		}
		if($resp==5)
		{
			echo "<script>alert('Added successfully')</script>";
			echo "<script>window.location.href='seometa-list.php'</script>";
		}
		if($resp==1 )
		{
			echo "<script>alert('Not save, Please try later')</script>";
			echo "<script>window.location.href='add-seometa.php'</script>";
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
                    <li class="active">SEO Zone</li>
                </ul>
            </div>
            <div class="workplace">
				<form name="frmmanagement" action="" method="post" onsubmit="return validManagement();" enctype="multipart/form-data"> 
					<div class="row-fluid">
						<div class="span12">
							<div class="head clearfix">
								<div class="isw-documents"></div>
								<h1>SEO Details</h1>
								<ul class="buttons">
									<li>
										<a href="#" class="isw-settings"></a>
										<ul class="dd-list">
											<li><a href="seometa-list.php"><span class="isw-edit"></span> View/ Edit</a></li>
										</ul>
									</li>
								</ul>       
							</div>
							<div class="block-fluid">
								<div class="row-form clearfix" >
									<div class="span2" ><b>Page Name <span style="color:red">*</span>:</b></div>
									<div class="span4"> 
										<select name="page_name">
										<option value="page">Select Page</option>
										<option value="home_page">Home Page</option>
										<option value="about_page">About Company</option>
										<option value="services_page">Services</option>
										<option value="client_page">Client Zone</option>
										<option value="partner_page">Partners Zone</option>
										<option value="travel_page">Travel Portal</option>
										<option value="rfq_page">RFQ</option>
										<option value="gallery_page">Gallery</option>
										<option value="contact_page">Contact Us</option>
										<option value="blog_page">Blog</option>
										<option value="career_page">career</option>
										</select>
									</div>
									<div class="span2" ><b>Meta Title <span style="color:red">*</span>:</b></div>
										<div class="span4" > 
										<input type="text" name="title" value="" class="title" />
										</div>
								</div>
								<div class="row-form clearfix" >
								<div class="span2" ><b>Meta Keyword <span style="color:red"></span>:</b></div>
									<div class="span4"> 
										<input type="text" name="meta_key" value="" class="meta_key" />
									</div>
								   <div class="span2" ><b>Meta Description <span style="color:red"></span>:</b></div>
										<div class="span4" > 
										<input type="text" name="description" value="" class="description" />
										</div>
								</div>
							   <div class="row-form clearfix" >
								<div class="span2" ><b>Status:</b></div>
									<div class="span4 "> 
										<input type="radio" name="status" class="status" style="float:left;" value="1" />
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
</html>	
