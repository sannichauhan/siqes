<?php
//error_reporting(0);
include("../classes/site_class.php");
$obj = new Site();
if($_SESSION['admin']['name']=='')
	{
		echo "<script>window.location.href='index.php'</script>";
	}
	if(isset($_REQUEST['Submit']) and !empty($_REQUEST['Submit']))
	{
		$resp = $obj->addJob();
		if($resp==0)
		{
		  echo "<script>alert('Required parameter missing')</script>";
		}
		if($resp==5)
		{
			echo "<script>alert('Added successfully')</script>";
			echo "<script>window.location.href='job-list.php'</script>";
		}
		if($resp==1 )
		{
			echo "<script>alert('Not save, Please try later')</script>";
			echo "<script>window.location.href='add-job.php'</script>";
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
                    <li class="active">Job Zone</li>
                </ul>
            </div>
            <div class="workplace">
				<form name="frmjob" action="" method="post" onsubmit="return validJob();" enctype="multipart/form-data"> 
					<div class="row-fluid">
						<div class="span12">
							<div class="head clearfix">
								<div class="isw-documents"></div>
								<h1>Job Details</h1>
								<ul class="buttons">
									<li>
										<a href="#" class="isw-settings"></a>
										<ul class="dd-list">
											<li><a href="job-list.php"><span class="isw-edit"></span> View/ Edit</a></li>
										</ul>
									</li>
								</ul>       
							</div>
							<div class="block-fluid">
								<div class="row-form clearfix" >
									<div class="span2" ><b>Job Title <span style="color:red">*</span>:</b></div>
									<div class="span4"> 
										<input type="text" name="job_name" maxlength="50" class="job_name" />
									</div>
									<div class="span2" ><b>Location <span style="color:red">*</span>:</b></div>
									<div class="span4"> 
										<input type="text" name="job_location" maxlength="50" class="job_location" />
									</div>
									
								</div>
								<div class="row-form clearfix" >
								<div class="span2" ><b>Experience <span style="color:red">*</span>:</b></div>
							        <div class="span4"> 
							        <input type="text" name="experience" class="experience" />
								      
								   </div>	
								</div>
								<div class="row-form clearfix" > 
								<div class="span2" ><b>Descriptions <span style="color:red">*</span>:</b></div>
										<div class="span8" >
                                       <textarea class="ckeditor" id="editor1"  name="description"></textarea>										
										</div>
									</div>
									<div class="row-form clearfix" > 
								     <div class="span2" ><b>Meta Title <span style="color:red"></span>:</b></div>
										<div class="span4" >
                                       <input type="text" name="meta_title" class="meta_title" />										
										</div>
										<div class="span2" ><b>Meta Keword <span style="color:red"></span>:</b></div>
										<div class="span4" >
                                       <input type="text" name="meta_key" class="meta_key" />										
										</div>
									</div>
								<div class="row-form clearfix" > 
								     <div class="span2" ><b>Meta Description <span style="color:red"></span>:</b></div>
										<div class="span4" >
                                       <textarea class="meta_desc" name="meta_desc"></textarea>										
										</div>
										
									</div>	
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
