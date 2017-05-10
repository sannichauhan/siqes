<?php
require_once('../config/connection.php');
include ('resize-class.php');
class Site extends Connection{
	function __construct(){
	   $this->createConnection();
	}  
	
	//*******************ABOUT US MANAGEMENT****************************/
	function aboutus()
	{
		if(isset($_REQUEST['content_type']) && $_REQUEST['content_type'] != "")
		{
			$admin=$_SESSION['admin']['name'];
			$title= $_REQUEST['content_type'];
			$status=$_REQUEST['status'];
			//$s_description = mysql_real_escape_string(trim($_REQUEST['short_description']));
			$l_description = mysql_real_escape_string(trim($_REQUEST['long_description']));
		

        /* $banner_imagequery ='';
			$dir_name = "../doc/aboutusbanner";
			if($_FILES["banner"]["name"]!=''){
			 
				$fsize = $_FILES["banner"]["size"];
				//####CHECK SIZE FOR IMAGE ######//                
				if($fsize > FILESIZE){
					return 7; exit;//##### file is greater then 2 MB
				}                 
				$filename = explode(".",$_FILES["banner"]["name"]);
				$file_ext =  strtolower(end($filename));
				$imgname = substr($_FILES["banner"]["name"],0,-(strlen($file_ext)+1));
				$filename = str_replace(" ","_",$imgname);
				//#########CHECK EXTENTION FOR IMAGE############//                
				$allExtarray = array("jpg","jpeg","png","gif");
				if(!in_array($file_ext,$allExtarray)){                
					return 8; exit;//##### file extension not accepted
				}      
				$banner = time().'_'.$filename.'.'.$file_ext;
				//$dance_image = $filename.'.'.$file_ext;
				if(!file_exists($dir_name))
				{
					$flag = mkdir($dir_name, 0777,true);                    
				}
				if(file_exists($dir_name."/".$banner))
				{                    
					@unlink($dir_name."/".$banner);
				}
				$movefile=move_uploaded_file($_FILES["banner"]["tmp_name"],$dir_name."/".$banner);
				$image_name = $dir_name."/".$banner;
				list($w, $h) = getimagesize($image_name);
					
						 $banner_imagequery = "about_banner='".$banner."'";
					
					
				if($movefile){
					$banner_imagequery = "about_banner='".$banner."'";
				}
			}
            
            $image_imagequery ='';
			$dir_name = "../doc/aboutusimg";
			if($_FILES["about_image"]["name"]!=''){
			 
				$fsize = $_FILES["about_image"]["size"];
				//####CHECK SIZE FOR IMAGE ######//                
				if($fsize > FILESIZE){
					return 7; exit;//##### file is greater then 2 MB
				}                 
				$filename = explode(".",$_FILES["about_image"]["name"]);
				$file_ext =  strtolower(end($filename));
				$imgname = substr($_FILES["about_image"]["name"],0,-(strlen($file_ext)+1));
				$filename = str_replace(" ","_",$imgname);
				//#########CHECK EXTENTION FOR IMAGE############//                
				$allExtarray = array("jpg","jpeg","png","gif");
				if(!in_array($file_ext,$allExtarray)){                
					return 8; exit;//##### file extension not accepted
				}      
				$image = time().'_'.$filename.'.'.$file_ext;
				//$dance_image = $filename.'.'.$file_ext;
				if(!file_exists($dir_name))
				{
					$flag = mkdir($dir_name, 0777,true);                    
				}
				if(file_exists($dir_name."/".$image))
				{                    
					@unlink($dir_name."/".$image);
				}
				$movefile=move_uploaded_file($_FILES["about_image"]["tmp_name"],$dir_name."/".$image);
				$image_name = $dir_name."/".$image;
				list($w, $h) = getimagesize($image_name);
					
						 $image_imagequery = "about_image='".$image."'";
					
					
				if($movefile){
					$image_imagequery = "about_image='".$image."'";
				}
			}*/
			
            //$sql = "insert into sqs_aboutus set about_title='".$title."',$banner_imagequery,$image_imagequery,status='".$status."',about_shortdesc='".$s_description."',about_description='".$l_description."',created_by='".$admin."', created_on='".date('Y-m-d::H:i:s')."'"; 
			$sql = "insert into sqs_aboutus set about_title='".$title."',status='".$status."',about_description='".$l_description."',created_by='".$admin."', created_on='".date('Y-m-d::H:i:s')."'"; 
			$resp = mysql_query($sql);
			if($resp==true){
				return 5; //##### ADDED SUCCESS
			}else{
				 return 1; //##### FAILED SQL ERROR
			}
		}
		else{
			return 0;  //##### REQUIRED PARAMETER MISSING
		}
	}
	
	
	function UpdateAboutus()
	{
		if(isset($_REQUEST['content_type']) && $_REQUEST['content_type'] != "")
		{
			$admin=$_SESSION['admin']['name'];
			$title= $_REQUEST['content_type'];
			//$status=$_REQUEST['status'];
			//$s_description = mysql_real_escape_string(trim($_REQUEST['short_description']));
			$l_description = mysql_real_escape_string(trim($_REQUEST['long_description']));
		

        /* $banner_imagequery ='';
			$dir_name = "../doc/aboutusbanner";
			if($_FILES["banner"]["name"]!=''){
			 
				$fsize = $_FILES["banner"]["size"];
				//####CHECK SIZE FOR IMAGE ######//                
				if($fsize > FILESIZE){
					return 7; exit;//##### file is greater then 2 MB
				}                 
				$filename = explode(".",$_FILES["banner"]["name"]);
				$file_ext =  strtolower(end($filename));
				$imgname = substr($_FILES["banner"]["name"],0,-(strlen($file_ext)+1));
				$filename = str_replace(" ","_",$imgname);
				//#########CHECK EXTENTION FOR IMAGE############//                
				$allExtarray = array("jpg","jpeg","png","gif");
				if(!in_array($file_ext,$allExtarray)){                
					return 8; exit;//##### file extension not accepted
				}      
				$banner = time().'_'.$filename.'.'.$file_ext;
				//$dance_image = $filename.'.'.$file_ext;
				if(!file_exists($dir_name))
				{
					$flag = mkdir($dir_name, 0777,true);                    
				}
				if(file_exists($dir_name."/".$banner))
				{                    
					@unlink($dir_name."/".$banner);
				}
				$movefile=move_uploaded_file($_FILES["banner"]["tmp_name"],$dir_name."/".$banner);
				$image_name = $dir_name."/".$banner;
				list($w, $h) = getimagesize($image_name);
					
						 $banner_imagequery = "about_banner='".$banner."'";
					
					
				if($movefile){
					$banner_imagequery = ",about_banner='".$banner."'";
				}
			}*/
            
            $image_imagequery ='';
			$dir_name = "../doc/aboutusimg";
			if($_FILES["about_image"]["name"]!=''){
			 
				$fsize = $_FILES["about_image"]["size"];
				//####CHECK SIZE FOR IMAGE ######//                
				if($fsize > FILESIZE){
					return 7; exit;//##### file is greater then 2 MB
				}                 
				$filename = explode(".",$_FILES["about_image"]["name"]);
				$file_ext =  strtolower(end($filename));
				$imgname = substr($_FILES["about_image"]["name"],0,-(strlen($file_ext)+1));
				$filename = str_replace(" ","_",$imgname);
				//#########CHECK EXTENTION FOR IMAGE############//                
				$allExtarray = array("jpg","jpeg","png","gif");
				if(!in_array($file_ext,$allExtarray)){                
					return 8; exit;//##### file extension not accepted
				}      
				$image = time().'_'.$filename.'.'.$file_ext;
				//$dance_image = $filename.'.'.$file_ext;
				if(!file_exists($dir_name))
				{
					$flag = mkdir($dir_name, 0777,true);                    
				}
				if(file_exists($dir_name."/".$image))
				{                    
					@unlink($dir_name."/".$image);
				}
				$movefile=move_uploaded_file($_FILES["about_image"]["tmp_name"],$dir_name."/".$image);
				$image_name = $dir_name."/".$image;
				list($w, $h) = getimagesize($image_name);
					
						 $image_imagequery = "about_image='".$image."'";
					
					
				if($movefile){
					$image_imagequery = ",about_image='".$image."'";
				}
			}
			
           // $sql = "update sqs_aboutus set about_title='".$title."'$banner_imagequery, status='".$status."'$image_imagequery,about_shortdesc='".$s_description."',about_description='".$l_description."',updated_by='".$admin."', updated_on='".date('Y-m-d::H:i:s')."'";
			
			$sql = "update sqs_aboutus set about_title='".$title."' $image_imagequery, about_description='".$l_description."',updated_by='".$admin."', updated_on='".date('Y-m-d::H:i:s')."' where about_title= '".$title."'";
			$resp = mysql_query($sql);
			if($resp==true){
				return 5; //##### ADDED SUCCESS
			}else{
				 return 1; //##### FAILED SQL ERROR
			}
		}
		else{
			return 0;  //##### REQUIRED PARAMETER MISSING
		}
	}
	
	
	//*******************BANNER MANAGEMENT****************************/
	function addBanner()
	{ 
		if(isset($_REQUEST['banner_name']) && $_REQUEST['banner_name']!= "")
		{
			$admin=$_SESSION['admin']['name'];
			$banner_name= $_REQUEST['banner_name'];
			$status=$_REQUEST['status'];
			$banner_text= $_REQUEST['banner_text'];
			//$banner_url= $_REQUEST['banner_url'];

         $banner_imagequery ='';
			$dir_name = "../doc/banner";
			if($_FILES["banner_image"]["name"]!=''){
			 
				$fsize = $_FILES["banner_image"]["size"];
				//####CHECK SIZE FOR IMAGE ######//                
				if($fsize > FILESIZE){
					return 7; exit;//##### file is greater then 2 MB
				}                 
				$filename = explode(".",$_FILES["banner_image"]["name"]);
				$file_ext =  strtolower(end($filename));
				$imgname = substr($_FILES["banner_image"]["name"],0,-(strlen($file_ext)+1));
				$filename = str_replace(" ","_",$imgname);
				//#########CHECK EXTENTION FOR IMAGE############//                
				$allExtarray = array("jpg","jpeg","png","gif");
				if(!in_array($file_ext,$allExtarray)){                
					return 8; exit;//##### file extension not accepted
				}      
				$banner = time().'_'.$filename.'.'.$file_ext;
				//$dance_image = $filename.'.'.$file_ext;
				if(!file_exists($dir_name))
				{
					$flag = mkdir($dir_name, 0777,true);                    
				}
				if(file_exists($dir_name."/".$banner))
				{                    
					@unlink($dir_name."/".$banner);
				}
				$movefile=move_uploaded_file($_FILES["banner_image"]["tmp_name"],$dir_name."/".$banner);
				$image_name = $dir_name."/".$banner;
				list($w, $h) = getimagesize($image_name);
					
						 $banner_imagequery = "banner_image='".$banner."'";
					
					
				if($movefile){
					$banner_imagequery = "banner_image='".$banner."'";
				}
			}
            
            
			
            $sql = "insert into sqs_banner set banner_name='".$banner_name."', banner_text= '".$banner_text."',$banner_imagequery,status='".$status."',created_by='".$admin."', created_on='".date('Y-m-d::H:i:s')."'"; 
			$resp = mysql_query($sql);
			if($resp==true){
				return 5; //##### ADDED SUCCESS
			}else{
				 return 1; //##### FAILED SQL ERROR
			}
		}
		else{
			return 0;  //##### REQUIRED PARAMETER MISSING
		}
	}
	
	function UpdateBanner()
	{ 
		if(isset($_REQUEST['banner_name'],$_REQUEST['banner_id']) and !empty($_REQUEST['banner_name']) and !empty($_REQUEST['banner_id']))
		{
			$admin=$_SESSION['admin']['name'];
			$banner_id= $_REQUEST['banner_id'];
			$banner_name= $_REQUEST['banner_name'];
			$status=$_REQUEST['status'];
			$banner_text= $_REQUEST['banner_text'];
			//$banner_url= $_REQUEST['banner_url'];

         $banner_imagequery ='';
			$dir_name = "../doc/banner";
			if($_FILES["banner_image"]["name"]!=''){
			 
				$fsize = $_FILES["banner_image"]["size"];
				//####CHECK SIZE FOR IMAGE ######//                
				if($fsize > FILESIZE){
					return 7; exit;//##### file is greater then 2 MB
				}                 
				$filename = explode(".",$_FILES["banner_image"]["name"]);
				$file_ext =  strtolower(end($filename));
				$imgname = substr($_FILES["banner_image"]["name"],0,-(strlen($file_ext)+1));
				$filename = str_replace(" ","_",$imgname);
				//#########CHECK EXTENTION FOR IMAGE############//                
				$allExtarray = array("jpg","jpeg","png","gif");
				if(!in_array($file_ext,$allExtarray)){                
					return 8; exit;//##### file extension not accepted
				}      
				$banner = time().'_'.$filename.'.'.$file_ext;
				//$dance_image = $filename.'.'.$file_ext;
				if(!file_exists($dir_name))
				{
					$flag = mkdir($dir_name, 0777,true);                    
				}
				if(file_exists($dir_name."/".$banner))
				{                    
					@unlink($dir_name."/".$banner);
				}
				$movefile=move_uploaded_file($_FILES["banner_image"]["tmp_name"],$dir_name."/".$banner);
				$image_name = $dir_name."/".$banner;
				list($w, $h) = getimagesize($image_name);
					
						 $banner_imagequery = "banner_image='".$banner."'";
					
					
				if($movefile){
					$banner_imagequery = ",banner_image='".$banner."'";
				}
			}
            
            
			
            $sql = "update sqs_banner set banner_name='".$banner_name."', banner_text= '".$banner_text."' $banner_imagequery,status='".$status."',updated_by='".$admin."', updated_on='".date('Y-m-d::H:i:s')."' where banner_id= '".$banner_id."'"; 
			$resp = mysql_query($sql);
			if($resp==true){
				return 5; //##### ADDED SUCCESS
			}else{
				 return 1; //##### FAILED SQL ERROR
			}
		}
		else{
			return 0;  //##### REQUIRED PARAMETER MISSING
		}
	}
	
	
	
	//*******************SERVICE MANAGEMENT****************************/
	function addServices()
	{ 
		if(isset($_REQUEST['service_title']) && $_REQUEST['service_title']!= "")
		{
			$admin=$_SESSION['admin']['name'];
			$service_title= $_REQUEST['service_title'];
			$status=$_REQUEST['status'];
			$description= mysql_real_escape_string(trim($_REQUEST['description']));
			

         $services_imagequery ='';
			$dir_name = "../doc/services";
			if($_FILES["service_image"]["name"]!=''){
			 
				$fsize = $_FILES["service_image"]["size"];
				//####CHECK SIZE FOR IMAGE ######//                
				if($fsize > FILESIZE){
					return 7; exit;//##### file is greater then 2 MB
				}                 
				$filename = explode(".",$_FILES["service_image"]["name"]);
				$file_ext =  strtolower(end($filename));
				$imgname = substr($_FILES["service_image"]["name"],0,-(strlen($file_ext)+1));
				$filename = str_replace(" ","_",$imgname);
				//#########CHECK EXTENTION FOR IMAGE############//                
				$allExtarray = array("jpg","jpeg","png","gif");
				if(!in_array($file_ext,$allExtarray)){                
					return 8; exit;//##### file extension not accepted
				}      
				$services = time().'_'.$filename.'.'.$file_ext;
				//$dance_image = $filename.'.'.$file_ext;
				if(!file_exists($dir_name))
				{
					$flag = mkdir($dir_name, 0777,true);                    
				}
				if(file_exists($dir_name."/".$services))
				{                    
					@unlink($dir_name."/".$services);
				}
				$movefile=move_uploaded_file($_FILES["service_image"]["tmp_name"],$dir_name."/".$services);
				$image_name = $dir_name."/".$services;
				list($w, $h) = getimagesize($image_name);
					
						 $services_imagequery = "serv_image='".$services."'";
					
					
				if($movefile){
					$services_imagequery = "serv_image='".$services."'";
				}
			}
            
            
			
            $sql = "insert into sqs_services set serv_title='".$service_title."',$services_imagequery, serv_description= '".$description."',status='".$status."',created_by='".$admin."', created_on='".date('Y-m-d::H:i:s')."'"; 
			$resp = mysql_query($sql);
			if($resp==true){
				return 5; //##### ADDED SUCCESS
			}else{
				 return 1; //##### FAILED SQL ERROR
			}
		}
		else{
			return 0;  //##### REQUIRED PARAMETER MISSING
		}
	}
	
	function updateServices()
	{ 
		if(isset($_REQUEST['service_title']) && $_REQUEST['service_title']!= "")
		{
			$admin=$_SESSION['admin']['name'];
			$service_title= $_REQUEST['service_title'];
			$status=$_REQUEST['status'];
			$description= mysql_real_escape_string(trim($_REQUEST['description']));
			

         $services_imagequery ='';
			$dir_name = "../doc/services";
			if($_FILES["service_image"]["name"]!=''){
			 
				$fsize = $_FILES["service_image"]["size"];
				//####CHECK SIZE FOR IMAGE ######//                
				if($fsize > FILESIZE){
					return 7; exit;//##### file is greater then 2 MB
				}                 
				$filename = explode(".",$_FILES["service_image"]["name"]);
				$file_ext =  strtolower(end($filename));
				$imgname = substr($_FILES["service_image"]["name"],0,-(strlen($file_ext)+1));
				$filename = str_replace(" ","_",$imgname);
				//#########CHECK EXTENTION FOR IMAGE############//                
				$allExtarray = array("jpg","jpeg","png","gif");
				if(!in_array($file_ext,$allExtarray)){                
					return 8; exit;//##### file extension not accepted
				}      
				$services = time().'_'.$filename.'.'.$file_ext;
				//$dance_image = $filename.'.'.$file_ext;
				if(!file_exists($dir_name))
				{
					$flag = mkdir($dir_name, 0777,true);                    
				}
				if(file_exists($dir_name."/".$services))
				{                    
					@unlink($dir_name."/".$services);
				}
				$movefile=move_uploaded_file($_FILES["service_image"]["tmp_name"],$dir_name."/".$services);
				$image_name = $dir_name."/".$services;
				list($w, $h) = getimagesize($image_name);
					
						 $services_imagequery = "serv_image='".$services."'";
					
					
				if($movefile){
					$services_imagequery = ",serv_image='".$services."'";
				}
			}
            
            
			
            $sql = "update sqs_services set serv_title='".$service_title."'$services_imagequery, serv_description= '".$description."',status='".$status."',updated_by='".$admin."', updated_on='".date('Y-m-d::H:i:s')."' where serv_id='".$_REQUEST['serv_id']."'"; 
			$resp = mysql_query($sql);
			if($resp==true){
				return 5; //##### ADDED SUCCESS
			}else{
				 return 1; //##### FAILED SQL ERROR
			}
		}
		else{
			return 0;  //##### REQUIRED PARAMETER MISSING
		}
	}
	//*******************PRODUCT MANAGEMENT****************************/
    function addProduct()
	{ 
		if(isset($_REQUEST['product_name']) && $_REQUEST['product_name']!= "")
		{
			$admin=$_SESSION['admin']['name'];
			$product_name= $_REQUEST['product_name'];
			$status=$_REQUEST['status'];
			$short_description= mysql_real_escape_string(trim($_REQUEST['short_description']));
			$description= mysql_real_escape_string(trim($_REQUEST['description']));
			

         $product_imagequery ='';
			$dir_name = "../doc/product";
			if($_FILES["product_image"]["name"]!=''){
			 
				$fsize = $_FILES["product_image"]["size"];
				//####CHECK SIZE FOR IMAGE ######//                
				if($fsize > FILESIZE){
					return 7; exit;//##### file is greater then 2 MB
				}                 
				$filename = explode(".",$_FILES["product_image"]["name"]);
				$file_ext =  strtolower(end($filename));
				$imgname = substr($_FILES["product_image"]["name"],0,-(strlen($file_ext)+1));
				$filename = str_replace(" ","_",$imgname);
				//#########CHECK EXTENTION FOR IMAGE############//                
				$allExtarray = array("jpg","jpeg","png","gif");
				if(!in_array($file_ext,$allExtarray)){                
					return 8; exit;//##### file extension not accepted
				}      
				$product = time().'_'.$filename.'.'.$file_ext;
				//$dance_image = $filename.'.'.$file_ext;
				if(!file_exists($dir_name))
				{
					$flag = mkdir($dir_name, 0777,true);                    
				}
				if(file_exists($dir_name."/".$product))
				{                    
					@unlink($dir_name."/".$product);
				}
				$movefile=move_uploaded_file($_FILES["product_image"]["tmp_name"],$dir_name."/".$product);
				$image_name = $dir_name."/".$product;
				list($w, $h) = getimagesize($image_name);
					
						 $product_imagequery = "prod_image='".$product."'";
					
					
				if($movefile){
					$product_imagequery = "prod_image='".$product."'";
				}
			}
            
            
			
            $sql = "insert into sqs_product set prod_name='".$product_name."',$product_imagequery, prod_shortdesc= '".$short_description."',prod_description='".$description."',status='".$status."',created_by='".$admin."', created_on='".date('Y-m-d::H:i:s')."'"; 
			$resp = mysql_query($sql);
			if($resp==true){
				return 5; //##### ADDED SUCCESS
			}else{
				 return 1; //##### FAILED SQL ERROR
			}
		}
		else{
			return 0;  //##### REQUIRED PARAMETER MISSING
		}
	}
	
	function updateProduct()
	{ 
		if(isset($_REQUEST['product_name']) && $_REQUEST['product_name']!= "")
		{
			$admin=$_SESSION['admin']['name'];
			$product_name= $_REQUEST['product_name'];
			$status=$_REQUEST['status'];
			$short_description= mysql_real_escape_string(trim($_REQUEST['short_description']));
			$description= mysql_real_escape_string(trim($_REQUEST['description']));
			

         $product_imagequery ='';
			$dir_name = "../doc/product";
			if($_FILES["product_image"]["name"]!=''){
			 
				$fsize = $_FILES["product_image"]["size"];
				//####CHECK SIZE FOR IMAGE ######//                
				if($fsize > FILESIZE){
					return 7; exit;//##### file is greater then 2 MB
				}                 
				$filename = explode(".",$_FILES["product_image"]["name"]);
				$file_ext =  strtolower(end($filename));
				$imgname = substr($_FILES["product_image"]["name"],0,-(strlen($file_ext)+1));
				$filename = str_replace(" ","_",$imgname);
				//#########CHECK EXTENTION FOR IMAGE############//                
				$allExtarray = array("jpg","jpeg","png","gif");
				if(!in_array($file_ext,$allExtarray)){                
					return 8; exit;//##### file extension not accepted
				}      
				$product = time().'_'.$filename.'.'.$file_ext;
				//$dance_image = $filename.'.'.$file_ext;
				if(!file_exists($dir_name))
				{
					$flag = mkdir($dir_name, 0777,true);                    
				}
				if(file_exists($dir_name."/".$product))
				{                    
					@unlink($dir_name."/".$product);
				}
				$movefile=move_uploaded_file($_FILES["product_image"]["tmp_name"],$dir_name."/".$product);
				$image_name = $dir_name."/".$product;
				list($w, $h) = getimagesize($image_name);
					
						 $product_imagequery = "prod_image='".$product."'";
					
					
				if($movefile){
					$product_imagequery = ",prod_image='".$product."'";
				}
			}
            
            
			
            $sql = "update sqs_product set prod_name='".$product_name."' $product_imagequery, prod_shortdesc= '".$short_description."',prod_description='".$description."',status='".$status."',updated_by='".$admin."', updated_on='".date('Y-m-d::H:i:s')."' where prod_id= '".$_REQUEST[prod_id]."'"; 
			$resp = mysql_query($sql);
			if($resp==true){
				return 5; //##### ADDED SUCCESS
			}else{
				 return 1; //##### FAILED SQL ERROR
			}
		}
		else{
			return 0;  //##### REQUIRED PARAMETER MISSING
		}
	}

	//*******************CLIENT MANAGEMENT****************************/
    function addClient()
	{ 
		if(isset($_REQUEST['client_title']) && $_REQUEST['client_title']!= "")
		{
			$admin=$_SESSION['admin']['name'];
			$client_title= $_REQUEST['client_title'];
			$url = $_REQUEST['client_url'];
			$status=$_REQUEST['status'];
			$description= mysql_real_escape_string(trim($_REQUEST['description']));
			

         $client_imagequery ='';
			$dir_name = "../doc/client";
			if($_FILES["client_logo"]["name"]!=''){
			 
				$fsize = $_FILES["client_logo"]["size"];
				//####CHECK SIZE FOR IMAGE ######//                
				if($fsize > FILESIZE){
					return 7; exit;//##### file is greater then 2 MB
				}                 
				$filename = explode(".",$_FILES["client_logo"]["name"]);
				$file_ext =  strtolower(end($filename));
				$imgname = substr($_FILES["client_logo"]["name"],0,-(strlen($file_ext)+1));
				$filename = str_replace(" ","_",$imgname);
				//#########CHECK EXTENTION FOR IMAGE############//                
				$allExtarray = array("png");
				if(!in_array($file_ext,$allExtarray)){                
					return 8; exit;//##### file extension not accepted
				}      
				$client = time().'_'.$filename.'.'.$file_ext;
				//$dance_image = $filename.'.'.$file_ext;
				if(!file_exists($dir_name))
				{
					$flag = mkdir($dir_name, 0777,true);                    
				}
				if(file_exists($dir_name."/".$client))
				{                    
					@unlink($dir_name."/".$client);
				}
				$movefile=move_uploaded_file($_FILES["client_logo"]["tmp_name"],$dir_name."/".$client);
				$image_name = $dir_name."/".$client;
				list($w, $h) = getimagesize($image_name);
					
						 $client_imagequery = "client_logo='".$client."'";
					
					
				if($movefile){
					$client_imagequery = "client_logo='".$client."'";
				}
			}
            
            
			
            $sql = "insert into sqs_client set client_title='".$client_title."',$client_imagequery, client_url= '".$url."',client_description='".$description."',status='".$status."',created_by='".$admin."', created_on='".date('Y-m-d::H:i:s')."'"; 
			$resp = mysql_query($sql);
			if($resp==true){
				return 5; //##### ADDED SUCCESS
			}else{
				 return 1; //##### FAILED SQL ERROR
			}
		}
		else{
			return 0;  //##### REQUIRED PARAMETER MISSING
		}
	}

    function editClient()
	{ 
		if(isset($_REQUEST['client_title']) && $_REQUEST['client_title']!= "")
		{
			$admin=$_SESSION['admin']['name'];
			$client_title= $_REQUEST['client_title'];
			$url = $_REQUEST['client_url'];
			$status=$_REQUEST['status'];
			$description= mysql_real_escape_string(trim($_REQUEST['description']));
			

         $client_imagequery ='';
			$dir_name = "../doc/client";
			if($_FILES["client_logo"]["name"]!=''){
			 
				$fsize = $_FILES["client_logo"]["size"];
				//####CHECK SIZE FOR IMAGE ######//                
				if($fsize > FILESIZE){
					return 7; exit;//##### file is greater then 2 MB
				}                 
				$filename = explode(".",$_FILES["client_logo"]["name"]);
				$file_ext =  strtolower(end($filename));
				$imgname = substr($_FILES["client_logo"]["name"],0,-(strlen($file_ext)+1));
				$filename = str_replace(" ","_",$imgname);
				//#########CHECK EXTENTION FOR IMAGE############//                
				$allExtarray = array("png");
				if(!in_array($file_ext,$allExtarray)){                
					return 8; exit;//##### file extension not accepted
				}      
				$client = time().'_'.$filename.'.'.$file_ext;
				//$dance_image = $filename.'.'.$file_ext;
				if(!file_exists($dir_name))
				{
					$flag = mkdir($dir_name, 0777,true);                    
				}
				if(file_exists($dir_name."/".$client))
				{                    
					@unlink($dir_name."/".$client);
				}
				$movefile=move_uploaded_file($_FILES["client_logo"]["tmp_name"],$dir_name."/".$client);
				$image_name = $dir_name."/".$client;
				list($w, $h) = getimagesize($image_name);
					
						 $client_imagequery = "client_logo='".$client."'";
					
					
				if($movefile){
					$client_imagequery = ",client_logo='".$client."'";
				}
			}
            
            
			
            $sql = "update sqs_client set client_title='".$client_title."'$client_imagequery, client_url= '".$url."',client_description='".$description."',status='".$status."',updated_by='".$admin."', updated_on='".date('Y-m-d::H:i:s')."' where client_id= '".$_REQUEST['client_id']."'"; 
			$resp = mysql_query($sql);
			if($resp==true){
				return 5; //##### ADDED SUCCESS
			}else{
				 return 1; //##### FAILED SQL ERROR
			}
		}
		else{
			return 0;  //##### REQUIRED PARAMETER MISSING
		}
	}

    //*******************Partner MANAGEMENT****************************/
    function addPartner()
	{ 
		if(isset($_REQUEST['partner_title']) && $_REQUEST['partner_title']!= "")
		{
			$admin=$_SESSION['admin']['name'];
			$partner_title= $_REQUEST['partner_title'];
			$url = $_REQUEST['partner_url'];
			$status=$_REQUEST['status'];
			$description= mysql_real_escape_string(trim($_REQUEST['description']));
			

         $partner_imagequery ='';
			$dir_name = "../doc/partner";
			if($_FILES["partner_logo"]["name"]!=''){
			 
				$fsize = $_FILES["partner_logo"]["size"];
				//####CHECK SIZE FOR IMAGE ######//                
				if($fsize > FILESIZE){
					return 7; exit;//##### file is greater then 2 MB
				}                 
				$filename = explode(".",$_FILES["partner_logo"]["name"]);
				$file_ext =  strtolower(end($filename));
				$imgname = substr($_FILES["partner_logo"]["name"],0,-(strlen($file_ext)+1));
				$filename = str_replace(" ","_",$imgname);
				//#########CHECK EXTENTION FOR IMAGE############//                
				$allExtarray = array("png");
				if(!in_array($file_ext,$allExtarray)){                
					return 8; exit;//##### file extension not accepted
				}      
				$partner = time().'_'.$filename.'.'.$file_ext;
				//$dance_image = $filename.'.'.$file_ext;
				if(!file_exists($dir_name))
				{
					$flag = mkdir($dir_name, 0777,true);                    
				}
				if(file_exists($dir_name."/".$partner))
				{                    
					@unlink($dir_name."/".$partner);
				}
				$movefile=move_uploaded_file($_FILES["partner_logo"]["tmp_name"],$dir_name."/".$partner);
				$image_name = $dir_name."/".$partner;
				list($w, $h) = getimagesize($image_name);
					
						 $partner_imagequery = "part_logo='".$partner."'";
					
					
				if($movefile){
					$partner_imagequery = "part_logo='".$partner."'";
				}
			}
            
            
			
            $sql = "insert into sqs_partners set part_title='".$partner_title."',$partner_imagequery, part_link= '".$url."',part_description='".$description."',status='".$status."',created_by='".$admin."', created_on='".date('Y-m-d::H:i:s')."'"; 
			$resp = mysql_query($sql);
			if($resp==true){
				return 5; //##### ADDED SUCCESS
			}else{
				 return 1; //##### FAILED SQL ERROR
			}
		}
		else{
			return 0;  //##### REQUIRED PARAMETER MISSING
		}
	}

    function editPartner()
	{ 
		if(isset($_REQUEST['partner_title']) && $_REQUEST['partner_title']!= "")
		{
			$admin=$_SESSION['admin']['name'];
			$partner_title= $_REQUEST['partner_title'];
			$url = $_REQUEST['partner_url'];
			$status=$_REQUEST['status'];
			$description= mysql_real_escape_string(trim($_REQUEST['description']));
			

         $partner_imagequery ='';
			$dir_name = "../doc/partner";
			if($_FILES["partner_logo"]["name"]!=''){
			 
				$fsize = $_FILES["partner_logo"]["size"];
				//####CHECK SIZE FOR IMAGE ######//                
				if($fsize > FILESIZE){
					return 7; exit;//##### file is greater then 2 MB
				}                 
				$filename = explode(".",$_FILES["partner_logo"]["name"]);
				$file_ext =  strtolower(end($filename));
				$imgname = substr($_FILES["partner_logo"]["name"],0,-(strlen($file_ext)+1));
				$filename = str_replace(" ","_",$imgname);
				//#########CHECK EXTENTION FOR IMAGE############//                
				$allExtarray = array("png");
				if(!in_array($file_ext,$allExtarray)){                
					return 8; exit;//##### file extension not accepted
				}      
				$partner = time().'_'.$filename.'.'.$file_ext;
				//$dance_image = $filename.'.'.$file_ext;
				if(!file_exists($dir_name))
				{
					$flag = mkdir($dir_name, 0777,true);                    
				}
				if(file_exists($dir_name."/".$partner))
				{                    
					@unlink($dir_name."/".$partner);
				}
				$movefile=move_uploaded_file($_FILES["partner_logo"]["tmp_name"],$dir_name."/".$partner);
				$image_name = $dir_name."/".$partner;
				list($w, $h) = getimagesize($image_name);
					
						 $partner_imagequery = "part_logo='".$partner."'";
					
					
				if($movefile){
					$partner_imagequery = ",part_logo='".$partner."'";
				}
			}
            
            
			
            $sql = "update sqs_partners set part_title='".$partner_title."' $partner_imagequery, part_link= '".$url."',part_description='".$description."',status='".$status."',updated_by='".$admin."', updated_on='".date('Y-m-d::H:i:s')."' where part_id= '".$_REQUEST['part_id']."'"; 
			$resp = mysql_query($sql);
			if($resp==true){
				return 5; //##### ADDED SUCCESS
			}else{
				 return 1; //##### FAILED SQL ERROR
			}
		}
		else{
			return 0;  //##### REQUIRED PARAMETER MISSING
		}
	}

    //*******************GALLERY MANAGEMENT****************************/
    function addGallery()
	{ 
		if(isset($_REQUEST['gallery_type']) && $_REQUEST['gallery_type']!= "")
		{
			$admin=$_SESSION['admin']['name'];
			$gallery_value = $_REQUEST['gallery_type'];
			$image_name = $_REQUEST['image_name'];
			$status=$_REQUEST['status'];
			//$description= mysql_real_escape_string(trim($_REQUEST['description']));
			/*if($_REQUEST['gallery_type']== 'video')
			{
					$gallery_value = $_REQUEST['video_url'];
					
					 $sql = "insert into sqs_gallery set gallery_type='video',gallery_url= '".$gallery_value."',gallery_description='".$description."',status='".$status."',created_by='".$admin."', created_on='".date('Y-m-d::H:i:s')."'"; 
				$resp = mysql_query($sql);
				if($resp==true){
					return 5; //##### ADDED SUCCESS
				}else{
					 return 1; //##### FAILED SQL ERROR
				}
				
			}
			elseif($_REQUEST['gallery_type']== 'image')
				{
					$gallery_value = $_REQUEST['gallery_img'];
				*/

			     $gallery_imagequery ='';
				 $dir_name = "../doc/gallery";
				 if($_FILES["gallery_img"]["name"]!=''){
				 
					$fsize = $_FILES["gallery_img"]["size"];
					//####CHECK SIZE FOR IMAGE ######//                
					if($fsize > FILESIZE){
						return 7; exit;//##### file is greater then 2 MB
					}                 
					$filename = explode(".",$_FILES["gallery_img"]["name"]);
					$file_ext =  strtolower(end($filename));
					$imgname = substr($_FILES["gallery_img"]["name"],0,-(strlen($file_ext)+1));
					$filename = str_replace(" ","_",$imgname);
					//#########CHECK EXTENTION FOR IMAGE############//                
					$allExtarray = array("jpg","jpeg","png","gif");
					if(!in_array($file_ext,$allExtarray)){                
						return 8; exit;//##### file extension not accepted
					}      
					$gallery = time().'_'.$filename.'.'.$file_ext;
					//$dance_image = $filename.'.'.$file_ext;
					if(!file_exists($dir_name))
					{
						$flag = mkdir($dir_name, 0777,true);                    
					}
					if(file_exists($dir_name."/".$gallery))
					{                    
						@unlink($dir_name."/".$gallery);
					}
					$movefile=move_uploaded_file($_FILES["gallery_img"]["tmp_name"],$dir_name."/".$gallery);
					$image_name = $dir_name."/".$gallery;
					list($w, $h) = getimagesize($image_name);
						
							 $gallery_imagequery = "gallery_url='".$gallery."'";
						
						
					if($movefile){
						$gallery_imagequery = "gallery_url='".$gallery."'";
					}
				}
				
				
				
				$sql = "insert into sqs_gallery set gallery_type='".$gallery_value."',$gallery_imagequery,image_name= '".$image_name."',status='".$status."',created_by='".$admin."', created_on='".date('Y-m-d::H:i:s')."'"; 
				$resp = mysql_query($sql);
				if($resp==true){
					return 5; //##### ADDED SUCCESS
				}else{
					 return 1; //##### FAILED SQL ERROR
				}
			// }	
		}
		else{
			return 0;  //##### REQUIRED PARAMETER MISSING
		}
	}

    function editGallery()
	{ 
		if(isset($_REQUEST['gallery_type']) && $_REQUEST['gallery_type']!= "")
		{
			$admin=$_SESSION['admin']['name'];
			$status=$_REQUEST['status'];
			$gallery_value = $_REQUEST['gallery_type'];
			$image_name= $_REQUEST['image_name'];
			//$description= mysql_real_escape_string(trim($_REQUEST['description']));
			/*if($_REQUEST['gallery_type']== 'video')
			{
					$gallery_value = $_REQUEST['video_url'];
					
					 $sql = "update sqs_gallery set gallery_type='video',gallery_url= '".$gallery_value."',gallery_description='".$description."',status='".$status."',updated_by='".$admin."', updated_on='".date('Y-m-d::H:i:s')."' where gallery_id= '".$_REQUEST['gallery_id']."'"; 
				$resp = mysql_query($sql);
				if($resp==true){
					return 5; //##### ADDED SUCCESS
				}else{
					 return 1; //##### FAILED SQL ERROR
				}
				
			}
			elseif($_REQUEST['gallery_type']== 'image')
				{
					$gallery_value = $_REQUEST['gallery_img'];
				*/

			     $gallery_imagequery ='';
				 $dir_name = "../doc/gallery";
				 if($_FILES["gallery_img"]["name"]!=''){
				 
					$fsize = $_FILES["gallery_img"]["size"];
					//####CHECK SIZE FOR IMAGE ######//                
					if($fsize > FILESIZE){
						return 7; exit;//##### file is greater then 2 MB
					}                 
					$filename = explode(".",$_FILES["gallery_img"]["name"]);
					$file_ext =  strtolower(end($filename));
					$imgname = substr($_FILES["gallery_img"]["name"],0,-(strlen($file_ext)+1));
					$filename = str_replace(" ","_",$imgname);
					//#########CHECK EXTENTION FOR IMAGE############//                
					$allExtarray = array("jpg","jpeg","png","gif");
					if(!in_array($file_ext,$allExtarray)){                
						return 8; exit;//##### file extension not accepted
					}      
					$gallery = time().'_'.$filename.'.'.$file_ext;
					//$dance_image = $filename.'.'.$file_ext;
					if(!file_exists($dir_name))
					{
						$flag = mkdir($dir_name, 0777,true);                    
					}
					if(file_exists($dir_name."/".$gallery))
					{                    
						@unlink($dir_name."/".$gallery);
					}
					$movefile=move_uploaded_file($_FILES["gallery_img"]["tmp_name"],$dir_name."/".$gallery);
					$image_name = $dir_name."/".$gallery;
					list($w, $h) = getimagesize($image_name);
						
							 $gallery_imagequery = "gallery_url='".$gallery."'";
						
						
					if($movefile){
						$gallery_imagequery = ",gallery_url='".$gallery."'";
					}
				}
				
				
				
				$sql = "update sqs_gallery set gallery_type='".$gallery_value."' $gallery_imagequery, image_name= '".$image_name."',status='".$status."',created_by='".$admin."', updated_by='".$admin."', updated_on='".date('Y-m-d::H:i:s')."' where gallery_id= '".$_REQUEST['gallery_id']."'"; 
				$resp = mysql_query($sql);
				if($resp==true){
					return 5; //##### ADDED SUCCESS
				}else{
					 return 1; //##### FAILED SQL ERROR
				}
			// }	
		}
		else{
			return 0;  //##### REQUIRED PARAMETER MISSING
		}
	}


   //*******************BLOG MANAGEMENT****************************/
    function addBlog()
	{ 
		if(isset($_REQUEST['blog_title']) && $_REQUEST['blog_title']!= "")
		{
			$admin=$_SESSION['admin']['name'];
			$blog_title= $_REQUEST['blog_title'];
			//$url = $_REQUEST['blog_url'];
			$status=$_REQUEST['status'];
			$description= mysql_real_escape_string(trim($_REQUEST['description']));
			$category_id = $_REQUEST['category'];
			$meta_title = $_REQUEST['meta_title'];
			$meta_keyword= $_REQUEST['meta_key'];
			$meta_description= $_REQUEST['meta_desc'];

         $blog_imagequery ='';
			$dir_name = "../doc/blog";
			if($_FILES["blog_img"]["name"]!=''){
			 
				$fsize = $_FILES["blog_img"]["size"];
				//####CHECK SIZE FOR IMAGE ######//                
				if($fsize > FILESIZE){
					return 7; exit;//##### file is greater then 2 MB
				}                 
				$filename = explode(".",$_FILES["blog_img"]["name"]);
				$file_ext =  strtolower(end($filename));
				$imgname = substr($_FILES["blog_img"]["name"],0,-(strlen($file_ext)+1));
				$filename = str_replace(" ","_",$imgname);
				//#########CHECK EXTENTION FOR IMAGE############//                
				$allExtarray = array("jpg","jpeg","png","gif");
				if(!in_array($file_ext,$allExtarray)){                
					return 8; exit;//##### file extension not accepted
				}      
				$blog = time().'_'.$filename.'.'.$file_ext;
				//$dance_image = $filename.'.'.$file_ext;
				if(!file_exists($dir_name))
				{
					$flag = mkdir($dir_name, 0777,true);                    
				}
				if(file_exists($dir_name."/".$blog))
				{                    
					@unlink($dir_name."/".$blog);
				}
				$movefile=move_uploaded_file($_FILES["blog_img"]["tmp_name"],$dir_name."/".$blog);
				$image_name = $dir_name."/".$blog;
				list($w, $h) = getimagesize($image_name);
					
						 $blog_imagequery = "blog_image='".$blog."'";
					
					
				if($movefile){
					$blog_imagequery = "blog_image='".$blog."'";
				}
				
				//-------------crop image for small image-----
				$dir_name1 = "../doc/blogsmall";
				$resizeObj = new resize($image_name);
				$resizeObj -> resizeImage(40,40, 'exact');
				$resizeObj -> saveImage($dir_name1."/".$blog, 100);
			}
            
           /* $small_imagequery ='';
			$dir_name = "../doc/blogsmall";
			if($_FILES["small_img"]["name"]!=''){
			 
				$fsize = $_FILES["small_img"]["size"];
				//####CHECK SIZE FOR IMAGE ######//                
				if($fsize > FILESIZE){
					return 7; exit;//##### file is greater then 2 MB
				}                 
				$filename = explode(".",$_FILES["small_img"]["name"]);
				$file_ext =  strtolower(end($filename));
				$imgname = substr($_FILES["small_img"]["name"],0,-(strlen($file_ext)+1));
				$filename = str_replace(" ","_",$imgname);
				//#########CHECK EXTENTION FOR IMAGE############//                
				$allExtarray = array("jpg","jpeg","png","gif");
				if(!in_array($file_ext,$allExtarray)){                
					return 8; exit;//##### file extension not accepted
				}      
				$blog_small = time().'_'.$filename.'.'.$file_ext;
				//$dance_image = $filename.'.'.$file_ext;
				if(!file_exists($dir_name))
				{
					$flag = mkdir($dir_name, 0777,true);                    
				}
				if(file_exists($dir_name."/".$blog_small))
				{                    
					@unlink($dir_name."/".$blog_small);
				}
				$movefile=move_uploaded_file($_FILES["small_img"]["tmp_name"],$dir_name."/".$blog_small);
				$image_name = $dir_name."/".$blog_small;
				list($w, $h) = getimagesize($image_name);
					
						 $small_imagequery = "small_image='".$blog_small."'";
					
					
				if($movefile){
					$small_imagequery = "small_image='".$blog_small."'";
				}
			}*/
			
            //$sql = "insert into sqs_blog set blog_title='".$blog_title."',category_id= '".$category_id."',$blog_imagequery,$small_imagequery, blog_url= '".$url."',blog_description='".$description."',status='".$status."',created_by='".$admin."', created_on='".date('Y-m-d::H:i:s')."'";
			
			$sql = "insert into sqs_blog set blog_title='".$blog_title."',category_id= '".$category_id."',$blog_imagequery, blog_description='".$description."',status='".$status."',meta_title='".$meta_title."',meta_keyword='".$meta_keyword."',meta_description='".$meta_description."',created_by='".$admin."', created_on='".date('Y-m-d::H:i:s')."'"; 
			$resp = mysql_query($sql);
			if($resp==true){
				return 5; //##### ADDED SUCCESS
			}else{
				 return 1; //##### FAILED SQL ERROR
			}
		}
		else{
			return 0;  //##### REQUIRED PARAMETER MISSING
		}
	}

    function editBlog()
	{ 
		if(isset($_REQUEST['blog_title']) && $_REQUEST['blog_title']!= "")
		{
			$admin=$_SESSION['admin']['name'];
			$blog_title= $_REQUEST['blog_title'];
			//$url = $_REQUEST['blog_url'];
			$status=$_REQUEST['status'];
			$description= mysql_real_escape_string(trim($_REQUEST['description']));
			$category_id = $_REQUEST['category'];
			$meta_title = $_REQUEST['meta_title'];
			$meta_keyword= $_REQUEST['meta_key'];
			$meta_description= $_REQUEST['meta_desc'];

         $blog_imagequery ='';
			$dir_name = "../doc/blog";
			if($_FILES["blog_img"]["name"]!=''){
			 
				$fsize = $_FILES["blog_img"]["size"];
				//####CHECK SIZE FOR IMAGE ######//                
				if($fsize > FILESIZE){
					return 7; exit;//##### file is greater then 2 MB
				}                 
				$filename = explode(".",$_FILES["blog_img"]["name"]);
				$file_ext =  strtolower(end($filename));
				$imgname = substr($_FILES["blog_img"]["name"],0,-(strlen($file_ext)+1));
				$filename = str_replace(" ","_",$imgname);
				//#########CHECK EXTENTION FOR IMAGE############//                
				$allExtarray = array("jpg","jpeg","png","gif");
				if(!in_array($file_ext,$allExtarray)){                
					return 8; exit;//##### file extension not accepted
				}      
				$blog = time().'_'.$filename.'.'.$file_ext;
				//$dance_image = $filename.'.'.$file_ext;
				if(!file_exists($dir_name))
				{
					$flag = mkdir($dir_name, 0777,true);                    
				}
				if(file_exists($dir_name."/".$blog))
				{                    
					@unlink($dir_name."/".$blog);
				}
				$movefile=move_uploaded_file($_FILES["blog_img"]["tmp_name"],$dir_name."/".$blog);
				$image_name = $dir_name."/".$blog;
				list($w, $h) = getimagesize($image_name);
					
						 $blog_imagequery = "blog_image='".$blog."'";
					
					
				if($movefile){
					$blog_imagequery = ",blog_image='".$blog."'";
				}
				//-------------crop image for small image-----
				$dir_name1 = "../doc/blogsmall";
				$resizeObj = new resize($image_name);
				$resizeObj -> resizeImage(40,40, 'exact');
				$resizeObj -> saveImage($dir_name1."/".$blog, 100);
			}
            
           /* $small_imagequery ='';
			$dir_name = "../doc/blogsmall";
			if($_FILES["small_img"]["name"]!=''){
			 
				$fsize = $_FILES["small_img"]["size"];
				//####CHECK SIZE FOR IMAGE ######//                
				if($fsize > FILESIZE){
					return 7; exit;//##### file is greater then 2 MB
				}                 
				$filename = explode(".",$_FILES["small_img"]["name"]);
				$file_ext =  strtolower(end($filename));
				$imgname = substr($_FILES["small_img"]["name"],0,-(strlen($file_ext)+1));
				$filename = str_replace(" ","_",$imgname);
				//#########CHECK EXTENTION FOR IMAGE############//                
				$allExtarray = array("jpg","jpeg","png","gif");
				if(!in_array($file_ext,$allExtarray)){                
					return 8; exit;//##### file extension not accepted
				}      
				$blog_small = time().'_'.$filename.'.'.$file_ext;
				//$dance_image = $filename.'.'.$file_ext;
				if(!file_exists($dir_name))
				{
					$flag = mkdir($dir_name, 0777,true);                    
				}
				if(file_exists($dir_name."/".$blog_small))
				{                    
					@unlink($dir_name."/".$blog_small);
				}
				$movefile=move_uploaded_file($_FILES["small_img"]["tmp_name"],$dir_name."/".$blog_small);
				$image_name = $dir_name."/".$blog_small;
				list($w, $h) = getimagesize($image_name);
					
						 $small_imagequery = "small_image='".$blog_small."'";
					
					
				if($movefile){
					$small_imagequery = ",small_image='".$blog_small."'";
				}
			}*/
			
            $sql = "update sqs_blog set blog_title='".$blog_title."',category_id= '".$category_id."' $blog_imagequery, blog_description='".$description."',status='".$status."',meta_title='".$meta_title."',meta_keyword='".$meta_keyword."',meta_description='".$meta_description."',updated_by='".$admin."', updated_on='".date('Y-m-d::H:i:s')."' where blog_id= '".$_REQUEST['blog_id']."'"; 
			$resp = mysql_query($sql);
			if($resp==true){
				return 5; //##### ADDED SUCCESS
			}else{
				 return 1; //##### FAILED SQL ERROR
			}
		}
		else{
			return 0;  //##### REQUIRED PARAMETER MISSING
		}
	}	
	
	
	//*******************SITE MANAGEMENT****************************/
	
	function editSocial()
	{ 
		if(isset($_REQUEST['contact']) && $_REQUEST['contact']!= "")
		{
			$admin=$_SESSION['admin']['name'];
			$contact = $_REQUEST['contact'];
			$address= $_REQUEST['address'];
			$email= $_REQUEST['email'];
			$copyright = $_REQUEST['copyright'];
			$facebook = $_REQUEST['facebook'];
			$twitter = $_REQUEST['twitter'];
			$linkedin = $_REQUEST['linkedin'];
			$pinterest = $_REQUEST['pinterest'];
			$status=$_REQUEST['status'];
			
            $sql = "update sqs_sitemanagement set sitephone_no='".$contact."',site_address= '".$address."', site_email= '".$email."',site_copyright='".$copyright."', site_twitter= '".$twitter."', site_facebook= '".$facebook."', site_linkdin= '".$linkedin."', site_pinterest= '".$pinterest."',status='".$status."',updated_by='".$admin."', updated_on='".date('Y-m-d::H:i:s')."'"; 
			$resp = mysql_query($sql);
			if($resp==true){
				return 5; //##### ADDED SUCCESS
			}else{
				 return 1; //##### FAILED SQL ERROR
			}
		}
		else{
			return 0;  //##### REQUIRED PARAMETER MISSING
		}
	}
	
	//*******************Testimonial MANAGEMENT****************************/
    function addTestimonials()
	{ 
		if(isset($_REQUEST['name']) && $_REQUEST['name']!= "")
		{
			$admin=$_SESSION['admin']['name'];
			$name= $_REQUEST['name'];
			$designation = $_REQUEST['designation'];
			$company = $_REQUEST['company'];
			$status=$_REQUEST['status'];
			$description= mysql_real_escape_string(trim($_REQUEST['description']));
			
            $testimo_imagequery ='';
			$dir_name = "../doc/testimonials";
			if($_FILES["testimo_image"]["name"]!=''){
			 
				$fsize = $_FILES["testimo_image"]["size"];
				//####CHECK SIZE FOR IMAGE ######//                
				if($fsize > FILESIZE){
					return 7; exit;//##### file is greater then 2 MB
				}                 
				$filename = explode(".",$_FILES["testimo_image"]["name"]);
				$file_ext =  strtolower(end($filename));
				$imgname = substr($_FILES["testimo_image"]["name"],0,-(strlen($file_ext)+1));
				$filename = str_replace(" ","_",$imgname);
				//#########CHECK EXTENTION FOR IMAGE############//                
				$allExtarray = array("jpg","jpeg","png","gif");
				if(!in_array($file_ext,$allExtarray)){                
					return 8; exit;//##### file extension not accepted
				}      
				$testimonial = time().'_'.$filename.'.'.$file_ext;
				//$dance_image = $filename.'.'.$file_ext;
				if(!file_exists($dir_name))
				{
					$flag = mkdir($dir_name, 0777,true);                    
				}
				if(file_exists($dir_name."/".$testimonial))
				{                    
					@unlink($dir_name."/".$testimonial);
				}
				$movefile=move_uploaded_file($_FILES["testimo_image"]["tmp_name"],$dir_name."/".$testimonial);
				$image_name = $dir_name."/".$testimonial;
				list($w, $h) = getimagesize($image_name);
					
						 $testimo_imagequery = "testimo_image='".$testimonial."'";
					
					
				if($movefile){
					$testimo_imagequery = "testimo_image='".$testimonial."'";
				}
			}
			
            $sql = "insert into sqs_testimonials set testimo_name='".$name."', testimo_designation= '".$designation."', testimo_comp= '".$company."',$testimo_imagequery, testimo_statement='".$description."',status='".$status."',created_by='".$admin."', created_on='".date('Y-m-d::H:i:s')."'"; 
			$resp = mysql_query($sql);
			if($resp==true){
				return 5; //##### ADDED SUCCESS
			}else{
				 return 1; //##### FAILED SQL ERROR
			}
		}
		else{
			return 0;  //##### REQUIRED PARAMETER MISSING
		}
	}
	
	function updateTestimonial()
	{ 
		if(isset($_REQUEST['name']) && $_REQUEST['name']!= "")
		{
			$admin=$_SESSION['admin']['name'];
			$name= $_REQUEST['name'];
			$designation = $_REQUEST['designation'];
			$company = $_REQUEST['company'];
			$status=$_REQUEST['status'];
			$description= mysql_real_escape_string(trim($_REQUEST['description']));
			
            $testimo_imagequery ='';
			$dir_name = "../doc/testimonials";
			if($_FILES["testimo_image"]["name"]!=''){
			 
				$fsize = $_FILES["testimo_image"]["size"];
				//####CHECK SIZE FOR IMAGE ######//                
				if($fsize > FILESIZE){
					return 7; exit;//##### file is greater then 2 MB
				}                 
				$filename = explode(".",$_FILES["testimo_image"]["name"]);
				$file_ext =  strtolower(end($filename));
				$imgname = substr($_FILES["testimo_image"]["name"],0,-(strlen($file_ext)+1));
				$filename = str_replace(" ","_",$imgname);
				//#########CHECK EXTENTION FOR IMAGE############//                
				$allExtarray = array("jpg","jpeg","png","gif");
				if(!in_array($file_ext,$allExtarray)){                
					return 8; exit;//##### file extension not accepted
				}      
				$testimonial = time().'_'.$filename.'.'.$file_ext;
				//$dance_image = $filename.'.'.$file_ext;
				if(!file_exists($dir_name))
				{
					$flag = mkdir($dir_name, 0777,true);                    
				}
				if(file_exists($dir_name."/".$testimonial))
				{                    
					@unlink($dir_name."/".$testimonial);
				}
				$movefile=move_uploaded_file($_FILES["testimo_image"]["tmp_name"],$dir_name."/".$testimonial);
				$image_name = $dir_name."/".$testimonial;
				list($w, $h) = getimagesize($image_name);
					
						 $testimo_imagequery = "testimo_image='".$testimonial."'";
					
					
				if($movefile){
					$testimo_imagequery = ",testimo_image='".$testimonial."'";
				}
			}
			
            $sql = "update sqs_testimonials set testimo_name='".$name."', testimo_designation= '".$designation."', testimo_comp= '".$company."' $testimo_imagequery, testimo_statement='".$description."',status='".$status."',updated_by='".$admin."', updated_on='".date('Y-m-d::H:i:s')."' where testimo_id= '".$_REQUEST['testimo_id']."'"; 
			$resp = mysql_query($sql);
			if($resp==true){
				return 5; //##### ADDED SUCCESS
			}else{
				 return 1; //##### FAILED SQL ERROR
			}
		}
		else{
			return 0;  //##### REQUIRED PARAMETER MISSING
		}
	}
	
	
	//*******************MANAGEMENT manage****************************/
    function addManagement()
	{ 
		if(isset($_REQUEST['name']) && $_REQUEST['name']!= "")
		{
			$admin=$_SESSION['admin']['name'];
			$name= $_REQUEST['name'];
			$designation = $_REQUEST['designation'];
			$status=$_REQUEST['status'];
			$description= mysql_real_escape_string(trim($_REQUEST['description']));
			
            $management_imagequery ='';
			$dir_name = "../doc/management";
			if($_FILES["manage_image"]["name"]!=''){
			 
				$fsize = $_FILES["manage_image"]["size"];
				//####CHECK SIZE FOR IMAGE ######//                
				if($fsize > FILESIZE){
					return 7; exit;//##### file is greater then 2 MB
				}                 
				$filename = explode(".",$_FILES["manage_image"]["name"]);
				$file_ext =  strtolower(end($filename));
				$imgname = substr($_FILES["manage_image"]["name"],0,-(strlen($file_ext)+1));
				$filename = str_replace(" ","_",$imgname);
				//#########CHECK EXTENTION FOR IMAGE############//                
				$allExtarray = array("jpg","jpeg","png","gif");
				if(!in_array($file_ext,$allExtarray)){                
					return 8; exit;//##### file extension not accepted
				}      
				$management = time().'_'.$filename.'.'.$file_ext;
				//$dance_image = $filename.'.'.$file_ext;
				if(!file_exists($dir_name))
				{
					$flag = mkdir($dir_name, 0777,true);                    
				}
				if(file_exists($dir_name."/".$management))
				{                    
					@unlink($dir_name."/".$management);
				}
				$movefile=move_uploaded_file($_FILES["manage_image"]["tmp_name"],$dir_name."/".$management);
				$image_name = $dir_name."/".$management;
				list($w, $h) = getimagesize($image_name);
					
						 $management_imagequery = "manag_image='".$management."'";
					
					
				if($movefile){
					$management_imagequery = "manag_image='".$management."'";
				}
			}
			
            $sql = "insert into sqs_management set manag_name='".$name."', manag_desig= '".$designation."',$management_imagequery, manag_desc='".$description."',status='".$status."',created_by='".$admin."', created_on='".date('Y-m-d::H:i:s')."'"; 
			$resp = mysql_query($sql);
			if($resp==true){
				return 5; //##### ADDED SUCCESS
			}else{
				 return 1; //##### FAILED SQL ERROR
			}
		}
		else{
			return 0;  //##### REQUIRED PARAMETER MISSING
		}
	}
	
	function updateManagement()
	{ 
		if(isset($_REQUEST['name']) && $_REQUEST['name']!= "")
		{
			$admin=$_SESSION['admin']['name'];
			$name= $_REQUEST['name'];
			$designation = $_REQUEST['designation'];
			$status=$_REQUEST['status'];
			$description= mysql_real_escape_string(trim($_REQUEST['description']));
			
            $management_imagequery ='';
			$dir_name = "../doc/management";
			if($_FILES["manage_image"]["name"]!=''){
			 
				$fsize = $_FILES["manage_image"]["size"];
				//####CHECK SIZE FOR IMAGE ######//                
				if($fsize > FILESIZE){
					return 7; exit;//##### file is greater then 2 MB
				}                 
				$filename = explode(".",$_FILES["manage_image"]["name"]);
				$file_ext =  strtolower(end($filename));
				$imgname = substr($_FILES["manage_image"]["name"],0,-(strlen($file_ext)+1));
				$filename = str_replace(" ","_",$imgname);
				//#########CHECK EXTENTION FOR IMAGE############//                
				$allExtarray = array("jpg","jpeg","png","gif");
				if(!in_array($file_ext,$allExtarray)){                
					return 8; exit;//##### file extension not accepted
				}      
				$management = time().'_'.$filename.'.'.$file_ext;
				//$dance_image = $filename.'.'.$file_ext;
				if(!file_exists($dir_name))
				{
					$flag = mkdir($dir_name, 0777,true);                    
				}
				if(file_exists($dir_name."/".$management))
				{                    
					@unlink($dir_name."/".$management);
				}
				$movefile=move_uploaded_file($_FILES["manage_image"]["tmp_name"],$dir_name."/".$management);
				$image_name = $dir_name."/".$management;
				list($w, $h) = getimagesize($image_name);
					
						 $management_imagequery = "manag_image='".$management."'";
					
					
				if($movefile){
					$management_imagequery = ",manag_image='".$management."'";
				}
			}
			
            $sql = "update sqs_management set manag_name='".$name."', manag_desig= '".$designation."'   $management_imagequery, manag_desc='".$description."',status='".$status."',updated_by='".$admin."', updated_on='".date('Y-m-d::H:i:s')."' where manag_id= '".$_REQUEST['manag_id']."'"; 
			$resp = mysql_query($sql);
			if($resp==true){
				return 5; //##### ADDED SUCCESS
			}else{
				 return 1; //##### FAILED SQL ERROR
			}
		}
		else{
			return 0;  //##### REQUIRED PARAMETER MISSING
		}
	}
	
	//*******************MANAGEMENT Blog Category****************************/
    function addBlogCategory()
	{ 
		if(isset($_REQUEST['cat_name']) && $_REQUEST['cat_name']!= "")
		{
			$admin=$_SESSION['admin']['name'];
			$cat_name= $_REQUEST['cat_name'];
			$status=$_REQUEST['status'];
			
            $sql = "insert into sqs_blog_category set blog_category='".$cat_name."', status='".$status."',created_by='".$admin."', created_on='".date('Y-m-d::H:i:s')."'"; 
			$resp = mysql_query($sql);
			if($resp==true){
				return 5; //##### ADDED SUCCESS
			}else{
				 return 1; //##### FAILED SQL ERROR
			}
		}
		else{
			return 0;  //##### REQUIRED PARAMETER MISSING
		}
	}
	function updateBlogCategory()
	{ 
		if(isset($_REQUEST['cat_name']) && $_REQUEST['cat_name']!= "")
		{
			$admin=$_SESSION['admin']['name'];
			$cat_name= $_REQUEST['cat_name'];
			$status=$_REQUEST['status'];
			
            $sql = "update sqs_blog_category set blog_category='".$cat_name."', status='".$status."',updated_by='".$admin."', updated_on='".date('Y-m-d::H:i:s')."' where id= '".$_REQUEST['id']."'"; 
			$resp = mysql_query($sql);
			if($resp==true){
				return 5; //##### ADDED SUCCESS
			}else{
				 return 1; //##### FAILED SQL ERROR
			}
		}
		else{
			return 0;  //##### REQUIRED PARAMETER MISSING
		}
	}
	
	//*******************MANAGEMENT Gallery Type****************************/
    function addGallType()
	{ 
		if(isset($_REQUEST['typ_name']) && $_REQUEST['typ_name']!= "")
		{
			$admin=$_SESSION['admin']['name'];
			$typ_name= $_REQUEST['typ_name'];
			$status=$_REQUEST['status'];
			
            $sql = "insert into sqs_gallery_type set gal_typ_name='".$typ_name."', status='".$status."',created_by='".$admin."', created_on='".date('Y-m-d::H:i:s')."'"; 
			$resp = mysql_query($sql);
			if($resp==true){
				return 5; //##### ADDED SUCCESS
			}else{
				 return 1; //##### FAILED SQL ERROR
			}
		}
		else{
			return 0;  //##### REQUIRED PARAMETER MISSING
		}
	}
	function updateGallType()
	{ 
		if(isset($_REQUEST['typ_name']) && $_REQUEST['typ_name']!= "")
		{
			$admin=$_SESSION['admin']['name'];
			$typ_name= $_REQUEST['typ_name'];
			$status=$_REQUEST['status'];
			
            $sql = "update sqs_gallery_type set gal_typ_name='".$typ_name."', status='".$status."',updated_by='".$admin."', updated_on='".date('Y-m-d::H:i:s')."' where gal_typ_id= '".$_REQUEST['id']."'"; 
			$resp = mysql_query($sql);
			if($resp==true){
				return 5; //##### ADDED SUCCESS
			}else{
				 return 1; //##### FAILED SQL ERROR
			}
		}
		else{
			return 0;  //##### REQUIRED PARAMETER MISSING
		}
	}
	//*******************JOB MANAGEMENT****************************/
    function addJob()
	{ 
		if(isset($_REQUEST['job_name']) && $_REQUEST['job_name']!= "")
		{
			$admin=$_SESSION['admin']['name'];
			$job_name= $_REQUEST['job_name'];
			$location= $_REQUEST['job_location'];
			$experience= $_REQUEST['experience'];
			$status=$_REQUEST['status'];
			$description= mysql_real_escape_string(trim($_REQUEST['description']));
			$meta_title = $_REQUEST['meta_title'];
			$meta_keyword= $_REQUEST['meta_key'];
			$meta_description= $_REQUEST['meta_desc'];
			
            $sql = "insert into sqs_post_job set job_title='".$job_name."', job_detail='".$description."', location= '".$location."', experience= '".$experience."',meta_title='".$meta_title."',meta_keyword='".$meta_keyword."',meta_description='".$meta_description."', status='".$status."',created_by='".$admin."', created_on='".date('Y-m-d::H:i:s')."'"; 
			$resp = mysql_query($sql);
			if($resp==true){
				return 5; //##### ADDED SUCCESS
			}else{
				 return 1; //##### FAILED SQL ERROR
			}
		}
		else{
			return 0;  //##### REQUIRED PARAMETER MISSING
		}
	}
	
	function updateJob()
	{ 
		if(isset($_REQUEST['job_name']) && $_REQUEST['job_name']!= "")
		{
			$admin=$_SESSION['admin']['name'];
			$job_name= $_REQUEST['job_name'];
			$location= $_REQUEST['job_location'];
			$experience= $_REQUEST['experience'];
			$status=$_REQUEST['status'];
			$description= mysql_real_escape_string(trim($_REQUEST['description']));
			$meta_title = $_REQUEST['meta_title'];
			$meta_keyword= $_REQUEST['meta_key'];
			$meta_description= $_REQUEST['meta_desc'];
			
            $sql = "update sqs_post_job set job_title='".$job_name."', job_detail='".$description."', location= '".$location."', experience= '".$experience."',meta_title='".$meta_title."',meta_keyword='".$meta_keyword."',meta_description='".$meta_description."', status='".$status."',updated_by='".$admin."', updated_on='".date('Y-m-d::H:i:s')."' where job_id= '".$_REQUEST['job_id']."'"; 
			$resp = mysql_query($sql);
			if($resp==true){
				return 5; //##### ADDED SUCCESS
			}else{
				 return 1; //##### FAILED SQL ERROR
			}
		}
		else{
			return 0;  //##### REQUIRED PARAMETER MISSING
		}
	}
	
	//*******************SEO MANAGEMENT****************************/
    function addSeo()
	{ 
		if(isset($_REQUEST['page_name'],$_REQUEST['title']) && $_REQUEST['page_name']!= "" && $_REQUEST['title']!="")
		{
			$admin=$_SESSION['admin']['name'];
			$page_name= $_REQUEST['page_name'];
			$title = $_REQUEST['title'];
			$meta_key=$_REQUEST['meta_key'];
			$status=$_REQUEST['status'];
			$description= mysql_real_escape_string(trim($_REQUEST['description']));
            
			
            $sql = "insert into sqs_meta_seo set page_name='".$page_name."',meta_title= '".$title."',meta_keyword='".$meta_key."',meta_description= '".$description."', status='".$status."',created_by='".$admin."', created_on='".date('Y-m-d::H:i:s')."'"; 
			$resp = mysql_query($sql);
			if($resp==true){
				return 5; //##### ADDED SUCCESS
			}else{
				 return 1; //##### FAILED SQL ERROR
			}
		}
		else{
			return 0;  //##### REQUIRED PARAMETER MISSING
		}
	}

    function editSeo()
	{ 
		if(isset($_REQUEST['page_name'],$_REQUEST['title']) && $_REQUEST['page_name']!= "" && $_REQUEST['title']!="")
		{
			$admin=$_SESSION['admin']['name'];
			$page_name= $_REQUEST['page_name'];
			$title = $_REQUEST['title'];
			$meta_key=$_REQUEST['meta_key'];
			$status=$_REQUEST['status'];
			$description= mysql_real_escape_string(trim($_REQUEST['description']));
            
			
            $sql = "update sqs_meta_seo set page_name='".$page_name."',meta_title= '".$title."',meta_keyword='".$meta_key."',meta_description= '".$description."', status= 1,created_by='".$admin."', created_on='".date('Y-m-d::H:i:s')."' where page_name= '".$page_name."'"; 
			$resp = mysql_query($sql);
			if($resp==true){
				return 5; //##### ADDED SUCCESS
			}else{
				 return 1; //##### FAILED SQL ERROR
			}
		}
		else{
			return 0;  //##### REQUIRED PARAMETER MISSING
		}
	}
}
?>