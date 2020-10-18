<?php
if (isset($_GET['file'])) {
$fileName = basename($_GET['file']);
$filePath = 'uploads/Form16/'.$_GET['file'];
header('Content-Description: File Transfer');
header('Content-Type: application/force-download');
header("Content-Disposition: attachment; filename=\"" . basename($fileName) . "\";");
header('Content-Transfer-Encoding: binary');
header('Expires: 0');
header('Cache-Control: must-revalidate');
header('Pragma: public');
header('Content-Length: ' . filesize($filePath));
ob_clean();
flush();
readfile($filePath); //showing the path to the server where the file is to be download
}
if (isset($_GET['all'])) {
$form= $mysql->select("Select * from _tbl_form_16 where md5(concat(AssestmentYear,id))='".$_GET['all']."' ");

$zip = new ZipArchive();
$filename = "uploads/Form16/".$form[0]['FormByCode']."/myform_".date("Y_d_h_i_s").".zip";
if ($zip->open($filename, ZipArchive::CREATE)!==TRUE) {
    exit;
}
$dir = "uploads/Form16/".$form[0]['FormByCode']."/";
createZip($zip,$dir); 
$zip->close();   
header('Content-Description: File Transfer');
header('Content-Type: application/force-download');
header("Content-Disposition: attachment; filename=\"" . basename($fileName) . "\";");
header('Content-Transfer-Encoding: binary');
header('Expires: 0');
header('Cache-Control: must-revalidate');
header('Pragma: public');
header('Content-Length: ' . filesize($filename));
ob_clean();
flush();
readfile($filename); //showing the path to the server where the file is to be download
//unlink($filename);
}
exit;
?>