<?php
include("../config/connection.php");
$obj = new Connection();
if(isset($_REQUEST['action']) and ($_REQUEST['action']=='get_content')){
	$type = $_POST['content_type']; 
	
	$query = mysql_query("select * from sqs_aboutus where about_title= '".$type."'");
	$row = mysql_fetch_array($query);
	//echo $row['about_image']; exit;
	echo $row['about_description']."$$"."<a class='fancybox' rel='profile' href='../doc/aboutusimg/$row[about_image]'><img  width='40' src='../doc/aboutusimg/$row[about_image]' class='img-polaroid'></a>";
}

if(isset($_REQUEST['action']) and ($_REQUEST['action']=='get_seometa')){
	$page_name = $_POST['page_name']; 
	
	$query = mysql_query("select * from sqs_meta_seo where page_name= '".$page_name."'");
	$row = mysql_fetch_array($query);
	//echo $row['about_image']; exit;
	echo $row['meta_title']."$$".$row['meta_keyword']."$$".$row['meta_description'];
}
?>