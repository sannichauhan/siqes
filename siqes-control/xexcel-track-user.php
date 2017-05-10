<?php
/**
 * PHPExcel
 *
 * Copyright (C) 2006 - 2013 PHPExcel
 *
 * This library is free software; you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation; either
 * version 2.1 of the License, or (at your option) any later version.
 *
 * This library is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this library; if not, write to the Free Software
 * Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301  USA
 *
 * @category   PHPExcel
 * @package    PHPExcel
 * @copyright  Copyright (c) 2006 - 2013 PHPExcel (http://www.codeplex.com/PHPExcel)
 * @license    http://www.gnu.org/licenses/old-licenses/lgpl-2.1.txt	LGPL
 * @version    1.7.9, 2013-06-02
 */

/** Error reporting */
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
date_default_timezone_set('Asia/Kolkata');

if (PHP_SAPI == 'cli')
	die('This example should only be run from a Web Browser');

require_once '../classes/PHPExcel.php';
include("../config/connection.php");
$obj = new Connection();

// Create new PHPExcel object
$objPHPExcel = new PHPExcel();

// Set document properties
$objPHPExcel->getProperties()->setCreator("TP")
							 ->setLastModifiedBy("TP")
							 ->setTitle("TP Office 2007 XLSX Test Document")
							 ->setSubject("TP Office 2007 XLSX Test Document")
							 ->setDescription("TP document for Office 2007 XLSX, generated using PHP classes.")
							 ->setKeywords("office 2007 openxml php")
							 ->setCategory("TP result file");
							 
		if(isset($_POST['excelsubmit']))
		{
			$sql = "select *, DATE_FORMAT(query_date,'%d/%m/%Y')as showdate from eg_user_query order by query_date  DESC";
			$uval=mysql_query($sql);
			
		}
	// Add some data
	$objPHPExcel->setActiveSheetIndex(0)
			->setCellValue('A1', 'Esco Global User Query')
            ->setCellValue('A3', 'S.No')
            ->setCellValue('B3', 'User Name')
            ->setCellValue('C3', 'Contact')
            ->setCellValue('D3', 'Email')
			->setCellValue('E3', 'City')
			->setCellValue('F3', 'Category')
			->setCellValue('G3', 'Sub Category')
			->setCellValue('H3', 'Product')
			->setCellValue('I3', 'Brand')
			->setCellValue('J3', 'Specification')
			->setCellValue('K3', 'Query Date')
			->setCellValue('L3', 'Query Time');
			
			$i = 3;
			$j = 1;
			$n = 1;
	while($key=mysql_fetch_array($uval))
			{	
				
				
				$K = $i + $j;
				$cat_namequery = mysql_query("select cat_name from eg_category where cat_id= '".$key['cat_id']."'");
				$row_cat = mysql_fetch_array($cat_namequery);

				$subcat_namequery = mysql_query("select subcat_name from eg_subcategory where subcat_id= '".$key['subcat_id']."'");
				$row_subcat = mysql_fetch_array($subcat_namequery);

				$product_name = mysql_query("select prod_name from eg_product where prod_id= '".$key['prod_id']."'");
				$row_prod = mysql_fetch_array($product_name);

				$brand_namequery = mysql_query("select brand_name from eg_brand where brand_id= '".$key['brand_id']."'");
				$row_brand = mysql_fetch_array($brand_namequery);
				
				$username=$key['user_name'];
				$email=$key['email'];
				$city=$key['city'];
				$contact=$key['contact'];
				$cat_name= $row_cat['cat_name'];
				$subcat_name= $row_subcat['subcat_name'];
				$prod_name= $row_prod['prod_name'];
				$brand_name= $row_brand['brand_name'];
				$specification=$key['specification'];
				$date= date('j-F-Y', strtotime($key['showdate']));
				$time= date('h:i: s A ', strtotime($key['TimeONLY']));
				$objPHPExcel->setActiveSheetIndex(0)
				->setCellValue('A'.$K, $n )
				->setCellValue('B'.$K, $username)
				->setCellValue('C'.$K, $contact)
				->setCellValue('D'.$K, $email)
				->setCellValue('E'.$K, $city)
				->setCellValue('F'.$K, $cat_name)
				->setCellValue('G'.$K, $subcat_name)
				->setCellValue('H'.$K, $prod_name)
				->setCellValue('I'.$K, $brand_name)
				->setCellValue('J'.$K, $specification)
				->setCellValue('K'.$K, $key['showdate'])     
				->setCellValue('L'.$K, $time);      
				
			$i++;
			$n++;
			}		
			


// Rename worksheet
$objPHPExcel->getActiveSheet()->setTitle('TP');


// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);

// Redirect output to a client’s web browser (Excel2007)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="Esco-Global-User-Query'. date("j-F-Y") .'.xlsx"');
header('Cache-Control: max-age=0');

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');
exit;
