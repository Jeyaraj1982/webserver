<?php
$fileName = basename($_GET['file']);
$filePath = 'assets/products/'.$_GET['file'];
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
exit;
?>