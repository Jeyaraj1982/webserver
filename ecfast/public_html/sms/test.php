<?php
 
 error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
/*
define('EOL',(PHP_SAPI == 'cli') ? PHP_EOL : '<br />');

require_once dirname(__FILE__) . 'PHPExcel/IOFactory.php';
      $filename = "excels/test.xlsx";
if (!file_exists($filename)) {
    //exit("Please run 05featuredemo.php first." . EOL);
    exit("errorloadingfine");
}

$objPHPExcel = PHPExcel_IOFactory::load($filename);

  */

include 'PHPExcel/IOFactory.php';

$inputFileName = "excels/test.xlsx";

//  Read your Excel workbook
try {
    $inputFileType = PHPExcel_IOFactory::identify($inputFileName);
    $objReader = PHPExcel_IOFactory::createReader($inputFileType);
    $objPHPExcel = $objReader->load($inputFileName);
} catch(Exception $e) {
    die('Error loading file "'.pathinfo($inputFileName,PATHINFO_BASENAME).'": '.$e->getMessage());
}

$sheet = $objPHPExcel->getSheet(0); 
$highestRow = $sheet->getHighestRow(); 
$highestColumn = $sheet->getHighestColumn();

//  Loop through each row of the worksheet in turn
for ($row = 1; $row <= $highestRow; $row++){ 
    //  Read a row of data into an array
    $rowData = $sheet->rangeToArray('A' . $row . ':' . $highestColumn . $row,
                                    NULL,
                                    TRUE,
                                    FALSE);
    print_r($rowData);
    //  Insert row data array into your database of choice here
}

?>