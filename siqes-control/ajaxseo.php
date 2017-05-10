<?php
error_reporting(0);
include("../classes/site_class.php");
$obj = new Connection();
if(isset($_REQUEST['action'])  and ($_REQUEST['action']=='checkName')){ 
		$i=0;
		$product_seo_name = $_REQUEST['product_seo_name'];
		//echo $product_seo_name; exit;
		$temp = $product_seo_name;
		do{
			$sqlProductSeo = "select * from tp_product where product_seo_name='".$temp."'";
			$queryProductSeo = mysql_query($sqlProductSeo) or die(mysql_error());
			$rowProductSeo = mysql_num_rows($queryProductSeo);
			if($rowProductSeo > 0){
				$temp = $product_seo_name;
			}else{
				echo $temp;
			}
			$i++;
			$temp = $temp.$i;
		}
		while($rowProductSeo != 0);
		exit;       
    }
	//****************CAT SEO NAME
	if(isset($_REQUEST['action'])  and ($_REQUEST['action']=='checkCat')){
		$i=0;
		$cat_seo_name = $_REQUEST['cat_seo_name'];
		$temp = $cat_seo_name;
		do{
			$sqlCatSeo = "select * from tp_category where cat_seo_name='".$temp."'";
			$queryCatSeo = mysql_query($sqlCatSeo) or die(mysql_error());
			$rowCatSeo = mysql_num_rows($queryCatSeo);
			if($rowCatSeo > 0){
				$temp = $cat_seo_name;
			}else{
				echo $temp;
			}
			$i++;
			$temp = $temp.$i;
		}
		while($rowCatSeo != 0);
		exit;       
    }
	
				
?>
