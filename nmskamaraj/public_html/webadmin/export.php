<?php
error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
date_default_timezone_set('Europe/London');

if (PHP_SAPI == 'cli')
    die('This example should only be run from a Web Browser');

/** Include PHPExcel */
require_once dirname(__FILE__) . '/PHPExcel.php';
 include_once("mysql.php");
                            $mysql =   new MySql();
   $alumini = $mysql->select("select * from alumini");

// Create new PHPExcel object
$objPHPExcel = new PHPExcel();

// Set document properties
//$objPHPExcel->getProperties()->setCreator("Maarten Balliauw")
                           //  ->setLastModifiedBy("Maarten Balliauw")
                           //  ->setTitle("Office 2007 XLSX Test Document")
                           //  ->setSubject("Office 2007 XLSX Test Document")
                           //  ->setDescription("Test document for Office 2007 XLSX, generated using PHP classes.")
                           //  ->setKeywords("office 2007 openxml php")
                            // ->setCategory("Test result file");


// Add some data
$i=1;
$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A'.$i, "Student Name")
            ->setCellValue('B'.$i, "Working Organization")
            ->setCellValue('C'.$i, "Phone Number")
            ->setCellValue('D'.$i, "Email ID") 
            ->setCellValue('E'.$i, "Year Of Completed")
            ->setCellValue('F'.$i, "Branch Name")
            ->setCellValue('G'.$i, "Address")
            ->setCellValue('H'.$i, "Comments")
            ->setCellValue('I'.$i, "Posted On");
            
foreach($alumini as $a) {
    $i++;
$objPHPExcel->setActiveSheetIndex(0)
            ->setCellValue('A'.$i, $a['studentname'])
            ->setCellValue('B'.$i, $a['workingorganization'])
            ->setCellValue('C'.$i, $a['phonenumber'])
            ->setCellValue('D'.$i, $a['emailid']) 
            ->setCellValue('E'.$i, $a['yearofcompletion'])
            ->setCellValue('F'.$i, $a['branchname'])
            ->setCellValue('G'.$i, $a['address'])
            ->setCellValue('H'.$i, $a['comments'])
            ->setCellValue('I'.$i, $a['postedon']);
}
// Miscellaneous glyphs, UTF-8
//$objPHPExcel->setActiveSheetIndex(0)
  //          ->setCellValue('A4', 'Miscellaneous glyphs')
    //        ->setCellValue('A5', 'éàèùâêîôûëïüÿäöüç');

// Rename worksheet
$objPHPExcel->getActiveSheet()->setTitle('nmskamarajpolytechnic');


// Set active sheet index to the first sheet, so Excel opens this as the first sheet
$objPHPExcel->setActiveSheetIndex(0);


// Redirect output to a client’s web browser (Excel2007)
header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
header('Content-Disposition: attachment;filename="01simple.xlsx"');
header('Cache-Control: max-age=0');
// If you're serving to IE 9, then the following may be needed
header('Cache-Control: max-age=1');

// If you're serving to IE over SSL, then the following may be needed
header ('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
header ('Last-Modified: '.gmdate('D, d M Y H:i:s').' GMT'); // always modified
header ('Cache-Control: cache, must-revalidate'); // HTTP/1.1
header ('Pragma: public'); // HTTP/1.0

$objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
$objWriter->save('php://output');
exit;
