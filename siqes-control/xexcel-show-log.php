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
			$sql = "select us.name,cm.company_name,prd.product_name,cat.cat_name,DATE_FORMAT(lg.date,'%d/%m/%Y')as showdate,DATE_FORMAT(lg.date,'%H:%i:%s') as TimeONLY, lg.* from tp_countmobileno_log lg,tp_product prd,tp_category cat, tp_users us,tp_cities c,tp_company cm where lg.user_id=us.id and prd.city_id=c.city_id and cm.id =us.company_id and  prd.cat_id=cat.cat_id and lg.prod_id=prd.prod_id";
			$uval=mysql_unbuffered_query($sql);
		}
	// Add some data
	$objPHPExcel->setActiveSheetIndex(0)
			->setCellValue('A1', 'Trust Portal Show Number Log')
            ->setCellValue('A3', 'S.No')
            ->setCellValue('B3', 'User Name')
            ->setCellValue('C3', 'User Company')
            ->setCellValue('D3', 'Product Name')
            ->setCellValue('E3', 'Product Category')
            ->setCellValue('F3', 'Show Number Count')
            ->setCellValue('G3', 'Number Shown From')
            ->setCellValue('H3', 'Date')
            ->setCellValue('I3', 'Time');
			$i = 3;
			$j = 1;
			$n = 1;
	while($key=mysql_fetch_array($uval))
			{	
				
				$K = $i + $j;
				$uName=$key['name'];
				$cmpName=$key['company_name'];
				$pdName=$key['product_name'];
				$pdCat=$key['cat_name'];
				$cntNo=$key['count_no'];
				$showpageUrl=$key['page_url'];
				//$date=$key['showdate'];
				$date= date('j-F-Y', strtotime($key['showdate']));
				$time= date('h:i: s A ', strtotime($key['TimeONLY']));
				$objPHPExcel->setActiveSheetIndex(0)
				->setCellValue('A'.$K, $n )
				->setCellValue('B'.$K, $uName)
				->setCellValue('C'.$K, $cmpName)
				->setCellValue('D'.$K, $pdName)
				->setCellValue('E'.$K, $pdCat)
				->setCellValue('F'.$K, $cntNo)
				->setCellValue('G'.$K, $showpageUrl)      
				->setCellValue('H'.$K, $key['showdate'])     
				->setCellValue('I'.$K, $time);      
				
			$i++;
			$n++;
			}		
			


// Rename worksheet
$objPHPExcel->getActiveSheet()->setTitle('TP');


// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);

// Redirect output to a client’s web browser (Excel2007)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="trust_portal_log'. date("j-F-Y") .'.xlsx"');
header('Cache-Control: max-age=0');

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');
exit;
