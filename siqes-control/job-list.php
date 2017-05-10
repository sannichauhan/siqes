<?php
//error_reporting(0);
include("../config/connection.php");
$obj = new Connection();
if($_SESSION['admin']['name']=='')
	{
		echo "<script>window.location.href='index.php'</script>";
	}
	/*if(isset($_REQUEST['action'],$_REQUEST['manag_id'],$_SESSION['admin']['id']) and  ($_REQUEST['action']=='deleteManagement') and !empty($_REQUEST['manag_id'])   and !empty($_SESSION['admin']['id'])){
		$manag_id=$_REQUEST['manag_id'];
		$query=mysql_query("select * from  sqs_management where manag_id='".$manag_id."'");
		 $delete=mysql_fetch_array($query);
		$sql=mysql_query("delete  FROM  sqs_management WHERE  manag_id='".$manag_id."'");
		if($sql==true){			
			echo "<script>window.location='management-list.php'</script>";
		}
	}*/
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
                    <li><a href="dashboard.php">Dashboard</a> <span class="divider">></span></li>                
                    <li class="active">Job Zone </li>
                </ul>
				
            </div>
            <div class="workplace">
				<div class="row-fluid">
					<div class="span12">
						<div class="head clearfix">
							<div class="isw-documents"></div>
							<h1>Job List</h1>
							<ul class="buttons">
							<li>
								<a href="#" class="isw-settings"></a>
								<ul class="dd-list">
									<li><a href="add-job.php"><span class="isw-plus"></span>Add New</a></li>
								</ul>
							</li>
						</ul>           
						</div>
						<div class="block-fluid">
							<table cellpadding="0" cellspacing="0" width="100%" class="table displaytable">
							<thead>
								<tr>	
									<th width="15%">Job Title</th>
									<th width="10%">Location</th>
									<th width="10%">Experience</th>
									<!--<th width="15%">Descriptions</th>-->
									<th width="10%">Status</th>
									<th width="10%">Created On</th>
									<th width="10%">Updated On</th>
                                    <th width="10%">Action</th>									
								</tr>
							</thead>
							<tbody> 
								<?php
                                    $adjacents = 4;
                                    $target='job-list.php';
                                    $limit='';
                                    $pagination='';
                                    $incat='';
                                    $table='';
                                    $messagepagging='';
                                    if(isset($_GET["page"])) 
                                    { 
                                        $page = $_GET["page"];					
                                    }
                                    else
                                    {
                                        $page=1;
                                    }
                                    $start_from = ($page - 1) * $limit;
                                    $sqlpresd='';                                    
                                   
                                    $sql = mysql_query("select * from sqs_post_job order by created_on desc");
                                    $count = mysql_num_rows($sql);
									
                                    if($count>0){
                                        
                                        $sql_count="select * from sqs_post_job order by created_on desc";
										
										$count_exec=mysql_query($sql_count);
										$arr_count['count']=mysql_num_rows($count_exec);
										$total_records = $arr_count['count'];
										if ($page == 0) $page = 1;                                   
										$prev = $page - 1;                                                                                  
										$next = $page + 1;                                                                                 
										$lastpage = ceil($total_records/$limit);
										$lpm1 = $lastpage - 1;                
										$pagination = "";
										
										if($lastpage > 1)
										{      
																				
											$pagination .= "<div class=\"pagination \" >";
											//previous button
											if ($page > 1) 
											{
														$pagination.= "<a href=\"$target?page=$prev\" >Previous</a>";
											}
											else
											{
														$pagination.= "<span class=\"disabled\">Previous</span>";          
											}
											//pages 
											if ($lastpage < 7 + ($adjacents * 2))         //not enough pages to bother breaking it up
											{           
												for ($counter = 1; $counter <= $lastpage; $counter++)
												{
															if ($counter == $page)
															{
																		$pagination.= "<span class=\"current\">$counter</span>";
															}
															else
															{
																		$pagination.= "<a href=\"$target?page=$counter\">$counter</a>";
															}
												}
											}
											else if($lastpage > 5 + ($adjacents * 2))   //enough pages to hide some
											{
												//close to beginning; only hide later pages
												if($page < 1 + ($adjacents * 2))               
												{
													for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
													{
														if ($counter == $page)
														{
																	$pagination.= "<span class=\"current\">$counter</span>";
														}
														else
														{
															$pagination.= "<a href=\"$target?page=$counter\">$counter</a>";                                                 
														}
												}
													$pagination.= "...";
													$pagination.= "<a href=\"$target?page=$lpm1\">$lpm1</a>";
													$pagination.= "<a href=\"$target?page=$lastpage\">$lastpage</a>";                      
												}
												//in middle; hide some front and some back
												else if($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
												{
													$pagination.= "<a href=\"$target?page=1\">1</a>";
													$pagination.= "<a href=\"$target?page=2\">2</a>";
													$pagination.= "...";
													for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
													{
														if ($counter == $page)
														{
																	$pagination.= "<span class=\"current\">$counter</span>";
														}
														else
														{
																	$pagination.= "<a href=\"$target?page=$counter\">$counter</a>";                                                 
														}
													}
													$pagination.= "...";
													$pagination.= "<a href=\"$target?page=$lpm1\">$lpm1</a>";
													$pagination.= "<a href=\"$target?page=$lastpage\">$lastpage</a>";                      
												}
														//close to end; only hide early pages
												else
												{
													$pagination.= "<a href=\"$target?page=1\">1</a>";
													$pagination.= "<a href=\"$target?page=2\">2</a>";
													$pagination.= "...";
													for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
													{
																if ($counter == $page)
																$pagination.= "<span class=\"current\">$counter</span>";
																else
																$pagination.= "<a href=\"$target?page=$counter\">$counter</a>";                                                 
													}
												}
											}

											//next button
											if ($page < $counter - 1) 
											$pagination.= "<a href=\"$target?page=$next\" >Next</a>";
											else
											$pagination.= "<span class=\"disabled\">Next</span>";
											$pagination.= "</div>\n";             
										}
										if($count >0)
										{
											$i=0;
											if(isset($_GET['page']))
											{
												if($_GET['page']>1)
												{
													$i=($limit*($_GET['page']-1));
													$i=$i+1;
												}
												else
												{
													$i=1;
												}
											}
											else
											{
												$i=1;
											}  
                                        }
								while($rows=mysql_fetch_array($sql))
								{
								?>
								<tr>
								<td><?php echo $rows['job_title']; ?></td>
								<td><?php echo $rows['location']; ?></td>
								<td><?php echo $rows['experience']; ?></td>
								<!--<td><?php echo $rows['job_detail']; ?></td>-->
								<td><a ><?php if($rows['status']==1){ echo 'Published';}else if($rows['status']==0){ echo 'Unpublished';} ?></a></td>
								<td><?php echo $rows['created_on']; ?></td>
								<td><?php echo $rows['updated_on']; ?></td>
								<td>
									<a href="edit-job.php?action=editJob&job_id=<?php echo $rows['job_id'] ?>">
										<i class="isb-edit"></i>
									</a>
									<!--<a href="management-list.php?action=deleteManagement&manag_id=<?php echo $rows['manag_id'] ?>" onclick="return confirm('Are you sure want to delete?')"><i class="isb-delete"></i>
									</a>-->
								</td>
                                </tr>
								<?php
									}
								}else{ 
								?>
								<tr>
									<td>No record found</td>
								</tr>
                                <?php } ?>					
							</tbody>
							</table>
								<?php // echo $pagination; ?>
						</div>
						
					</div>
				</div>
                <div class="dr"><span></span></div>
            </div>

        </div>   
    </div>
</body>
</html>
