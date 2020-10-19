<?php
if(!empty($_GET['file'])){
    $fileName = $_GET['file'];
    $filePath = 'assets/'.$fileName;
    if(!empty($fileName) && file_exists($filePath)){
        header('Content-Length: ' . filesize($filePath));  
        header('Content-Encoding: none');
        header("Cache-Control: public");
        header("Content-Description: File Transfer");
        header("Content-Disposition: attachment; filename=$fileName");
        header("Content-Type: image/jpeg");
        header("Content-Transfer-Encoding: binary");
        readfile($filePath);
        exit;
    }else{
        echo 'The File '.$fileName.' does not exist.';
    }
}
?>
 