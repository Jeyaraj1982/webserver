<?php
  include_once("../config.php");

  if (isset($_GET['Invoice'])) {
 
    $res =  Invoice::getInvoice($_GET['Invoice']);
  
  }
  
  if (isset($_GET['Receipt'])) {
 
    $res =  Receipt::getReceipt($_GET['Receipt']);
  
  }
     include("lib/mpdf/mpdf.php");
                          $mpdf=new mPDF(); 
                          $mpdf->WriteHTML($res);
                          //$fname= "app/assets/pdf/".$orderID.'.pdf';
                          //$fname= $orderID.'.pdf';
                          $mpdf->Output();
?> 