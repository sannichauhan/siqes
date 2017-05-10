<?php
include("../config/connection.php");
$obj = new Connection();
?>

<?php  	
		function xls($uval)
		{
			header("Pragma: public");
			header("Expires: 0");
			header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
			header("Content-Type: application/force-download");
			header("Content-Type: application/octet-stream");
			header("Content-Type: application/download");
			header("Content-Disposition: attachment;filename=Trust-Portal-Log-".date("j-F-Y"). ".xls");
			header("Content-Transfer-Encoding: binary");
			xlsBOF();
			xlsWriteLabel(0,0,"TRUST PORTAL");
			xlsWriteLabel(2,0,"S.No");			
			xlsWriteLabel(2,1,"User Name");
			xlsWriteLabel(2,2,"User Company");
			xlsWriteLabel(2,3,"Product Name");
			xlsWriteLabel(2,4,"Product Category");
			xlsWriteLabel(2,5,"Show Number Count");
			xlsWriteLabel(2,6,"Number Shown From");
			xlsWriteLabel(2,7,"Date");
			
			$xlsRow = 4;
			$i=1;
			
			while($sqlFet=mysql_fetch_array($uval))
			{	
				
				$uName=$sqlFet['name'];
				$cmpName=$sqlFet['company_name'];
				$pdName=$sqlFet['product_name'];
				$pdCat=$sqlFet['cat_name'];
				$cntNo=$sqlFet['count_no'];
				$showpageUrl=$sqlFet['page_url'];
				$date=$sqlFet['showdate'];
				
					
				xlsWriteLabel($xlsRow,0,$i);
				xlsWriteLabel($xlsRow,1,$uName);
				xlsWriteLabel($xlsRow,2,$cmpName);
				xlsWriteLabel($xlsRow,3,$pdName);
				xlsWriteLabel($xlsRow,4,$pdCat);
				xlsWriteLabel($xlsRow,5,$cntNo);
				xlsWriteLabel($xlsRow,6,$showpageUrl);
				xlsWriteLabel($xlsRow,7,$date);
				
				$xlsRow++;
				$i++;
			}
			xlsEOF();

		}
		function xlsBOF()
		{
			echo pack("ssssss", 0x809, 0x8, 0x0, 0x10, 0x0, 0x0);
			return;
		}
		function xlsEOF()
		{
			echo pack("ss", 0x0A, 0x00);
			return;
		}
		function xlsWriteNumber($Row, $Col, $Value)
		{
			echo pack("sssss", 0x203, 14, $Row, $Col, 0x0);
			echo pack("d", $Value);
			return;
		}
		function xlsWriteLabel($Row, $Col, $Value )
		{
			$L = strlen($Value);
			echo pack("ssssss", 0x204, 8 + $L, $Row, $Col, 0x0, $L);
			echo $Value;
			return;
		}
	
	if(isset($_POST['excelsubmit']))
	{
		$sql = "select us.name,cm.company_name,prd.product_name,cat.cat_name,DATE_FORMAT(lg.date,'%d/%m/%Y')as showdate, lg.* from tp_countmobileno_log lg,tp_product prd,tp_category cat, tp_users us,tp_cities c,tp_company cm where lg.user_id=us.id and prd.city_id=c.city_id and cm.id =us.company_id and  prd.cat_id=cat.cat_id and lg.prod_id=prd.prod_id";
		//echo "select us.name,cm.company_name,prd.product_name,cat.cat_name,DATE_FORMAT(lg.date,'%d/%m/%Y')as showdate, lg.* from tp_countmobileno_log lg,tp_product prd,tp_category cat, tp_users us,tp_cities c,tp_company cm where lg.user_id=us.id and prd.city_id=c.city_id and cm.id =us.company_id and  prd.cat_id=cat.cat_id and lg.prod_id=prd.prod_id";exit;
		$uval=mysql_query($sql);
		//echo $uval; die;
		xls($uval);
	}
	?>