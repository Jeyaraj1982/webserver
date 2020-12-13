<?php
        session_start();  
       
        require("classes/mysql.php");
        $mysql = new MySql();
        $secret_key = "7a0d1671861f02e83bf27da3d2c87eef";     // Your Secret Key
            
               
         if(isset($_GET['DR'])) {
        require('classes/Rc43.php');
        $DR = preg_replace("/\s/","+",$_GET['DR']);
        $rc4 = new Crypt_RC4($secret_key);
        $QueryString = base64_decode($DR);
        $rc4->decrypt($QueryString);
        $QueryString = split('&',$QueryString);

        $response = array();
        foreach($QueryString as $param){
            $param = split('=',$param);
            $response[$param[0]] = urldecode($param[1]);
        }
    }
 
      $invoiceNo = $response['MerchantRefNo'];
    $PaymentID = $response['PaymentID'];
    $TransactionID = $response['TransactionID'];
    $PaymentMethod =$response['PaymentMethod'];
    
    
       $in = $mysql->select("select * from _tbl_invoice where invoiceid='".$invoiceNo."' and paymenttransactionid='0' and transactionid='0' and paymentstatus='0'");
    if (sizeof($in)==0) {
        
        
                                            
    echo $response['ResponseMessage'];
    
      
    $mysql->execute("update _tbl_invoice set paymentresponse='".$_REQUEST['DR']."',paymenttransactionid='".$PaymentID."', transactionid='".$TransactionID."', paymentstatus='".$response['ResponseCode']."' where invoiceid='".$invoiceNo."'");
    //echo "<script>setTimeout(\"location.href='p/viewinvoice&in=".md5($invoiceNo)."';\",1500);</script>";
     
       ?>
             <form action="http://www.kejugroups.com/register" method="post" target="_self" id="inSub" name="inSub">
                        <input type="hidden" value="<?php echo $invoiceNo;?>" name="invoiceid" id="invoiceid">
                        
             </form>
             <script>setTimeout("document.getElementById('inSub').submit();",1500);</script>
       <?php
    
    }  else {
        
        ?>
              <form action="http://www.kejugroups.com/register" method="post" target="_self" id="inSub" name="inSub">
                        <input type="hidden" value="0" name="invoiceid" id="invoiceid">
                        
             </form>
             <script>setTimeout("document.getElementById('inSub').submit();",1500);</script>
        <?php
    }
    
?>