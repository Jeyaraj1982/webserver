<?
  function getrealname($seoname) {
        $seoname = preg_replace('/\%/',' percentage',$seoname);
        $seoname = preg_replace('/\@/',' at ',$seoname);
        $seoname = preg_replace('/\&/',' and ',$seoname);
        $seoname = preg_replace('/[\s\W]+/','',$seoname);    // Strip off spaces and non-alpha-numeric
        $seoname = preg_replace('/[\.]+$/','',$seoname); // // Strip off the ending hyphens
        $seoname = strtolower($seoname);
        return $seoname;
    }
    
    $mysql = new MySqlC(); 
    
if (isset($_REQUEST['DR'])) {

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
    
    if (isset($_REQUEST['role']) && $_REQUEST['role']=='bu') {
        
        $invoiceNo     = $response['MerchantRefNo'];
        $PaymentID     = $response['PaymentID'];
        $TransactionID = $response['TransactionID'];
        $PaymentMethod = $response['PaymentMethod'];
        $invoiceNo     = explode("-",$invoiceNo);
        $invoiceNo     = $invoiceNo[0];
           
        $array = array("userid"               => $invoiceNo,
                       "particulars"          => "Amount Added To Widget ".(($TransactionID>0) ? " " : "[ Transaction Failed ]"),
                       "cramount"             => (($TransactionID>0) ? $response['Amount'] : "0.00"),
                       "actualamt"            => $response['Amount'],
                       "dramount"             => "0.00",
                       "txndate"              => date("Y-m-d H:i:s"),
                       "remarks"              => "",
                       "paymenttransactionid" => $PaymentID ,
                       "transactionid"        => $TransactionID ,
                       "paymentstatus"        => $response['ResponseCode'],
                       "paymentresponse"      => $_REQUEST['DR']);
                           
        $mysql->insert("_acc_txn",$array);
        echo "<script>window.location.href='http://www.dealmaass.in/p/usr_mypage';</script>";
        
    } else {
        
        $invoiceNo     = $response['MerchantRefNo'];
        $PaymentID     = $response['PaymentID'];
        $TransactionID = $response['TransactionID'];
        $PaymentMethod = $response['PaymentMethod'];
           
        $in = $mysql->select("select * from _clients where id='".$invoiceNo."' and paymentresponse='1".trim($_REQUEST['DR'])."'");
            
            echo "<div style='text-align:center;margin:100px;font-family:arial;font-size:12px;color:#333333'>";
            echo $response['ResponseMessage']; 
            echo "<br>Please wait....";
            echo "</div>";
  
        if (sizeof($in)==0) {
                
            
            $data = $mysql->select("select * from _clients where id=".$invoiceNo);
            
            $mysql->execute("update _clients set paymentresponse='".$_REQUEST['DR']."',paymenttransactionid='".$PaymentID."', transactionid='".$TransactionID."', paymentstatus='".$response['ResponseCode']."',paymentresponse='".$_REQUEST['DR']."' where id='".$invoiceNo."'");
                   
            if ($TransactionID>0) {
                
                $link=$data[0]['id']."-".getrealname($data[0]['firstname']);
     
    
       
                $mysql->execute("update _clients set userlink='".$link."', isactive='1', activatedon='".date("Y-m-d H:i:s")."'  where id=".$invoiceNo);
                
                
                $postData = "
                <h3 style='text-align:left;font-family:arial;color:rgb(38,74,148);'>YOUR ACCOUNT SUCCESSFULLY ACTIVATED.</h3>  
                <div style='font-family:arial;font-size:13px;margin:10px;padding:10px;line-height:25px;text-align:justify'>
                    Now You Can Start work. Just do login by using your registered email id and password is <b>password</b>.<br>
                    After First Login You must charge  your password.<br><br>
                    <b>Account Details:<b><br><br>
                    - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -<br>
                    Account Id : ".$data[0]['id']."<br>
                    Url : http://www.dealmaas.com/u/".$link."<br>
                    - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -<br>                    
                </div>";
                
                 $t = "Your account has been activated.<br>";
                 $t .= "Your Account ID : ".$invoiceNo."<br>";
                 $t .= "Your Password : password<br>";
                 $t .= "Your Link : http://www.dealmaass.in/u/".$link."<br>";
                 $t .= "Thanks<br>Dealmaass Team.";
        
        
         mail("jeyaraj_123@yahoo.com","Dealmaas.in [PJ] Your account has been activated",$t,$headers);  
         mail(trim($data[0]['emailid']),"Dealmaas.in [PJ] Your account has been activated",$t,$headers); 
         mail("dealmaass@gmail.com",trim($data[0]['emailid'])."Dealmaas.in [PJ] -:-Your account has been activated",$t,$headers); 
          ?>
                  <form action="http://www.dealmaass.in/p/free_parttimejob_register" method="post" target="_self" id="inSub" name="inSub">
                        <textarea style="display:none;" name="pinfo" id="pinfo">
                            <?php echo base64_encode($postData);?>
                        </textarea>
                        <input type="hidden" value="<?php echo $invoiceNo;?>" name="confUserid" id="confUserid">
             </form>
             <script>setTimeout("document.getElementById('inSub').submit();",1500);</script>
          <?php
          
         
        } else {
             $postData = "
                <h3 style='text-align:left;font-family:arial;color:rgb(38,74,148);'>PAYMENT TRANSACTION FAILED.</h3>  
                <div style='font-family:arial;font-size:13px;margin:10px;padding:10px;line-height:25px;text-align:justify'>
                    Your payment transaction has been failed. If any issue please contact us.<br><br>
                    Your account has been not activate. If you want to activate your account you must pay training fee Rs. 300.<br><br>
                    
                    Don't worry, you shouldn't register again.<br>
                    You can pay later by using <b>Activate My Account</b> on right side window.
                </div>";
                        ?>
                  <form action="http://www.dealmaass.in/p/free_parttimejob_register" method="post" target="_self" id="inSub" name="inSub">
                        <textarea style="display:none;" name="pinfo" id="pinfo">
                            <?php echo base64_encode($postData);?>
                        </textarea>
                        <input type="hidden" value="<?php echo $invoiceNo;?>" name="confUserid" id="confUserid">
             </form>
             <script>setTimeout("document.getElementById('inSub').submit();",1500);</script>
          <?php  
          
        }
    }  else {
        
                     $postData = "
                <h3 style='text-align:left;font-family:arial;color:rgb(38,74,148);'>PAYMENT TRANSACTION TERMINATED.</h3>  
                <div style='font-family:arial;font-size:13px;margin:10px;padding:10px;line-height:25px;text-align:justify'>
                    Your payment transaction has been terminated. If any issue please contact us.<br><br>
                    Your account has been not activate. If you want to activate your account you must pay training fee Rs. 300.<br><br>
                    
                    Don't worry, you shouldn't register again.<br>
                    You can pay later by using <b>Activate My Account</b> on right side window.
                </div>";
                            ?>
                  <form action="http://www.dealmaass.in/p/free_parttimejob_register" method="post" target="_self" id="inSub" name="inSub">
                        <textarea style="display:none;" name="pinfo" id="pinfo">
                            <?php echo base64_encode($postData);?>
                        </textarea>
                        <input type="hidden" value="<?php echo $invoiceNo;?>" name="confUserid" id="confUserid">
             </form>
             <script>setTimeout("document.getElementById('inSub').submit();",1500);</script>
          <?php
       
    }
    
    ?>
    
              
             
    <?php
    
    }

} else {
    
    if (isset($_POST['partimeJob'])) {
         $amount = 300;
         $invoiceID = $_POST['inUserid'];
         $usrDetails = $mysql->select("select * from _clients where id=".$invoiceID);
         $return_url   = "http://www.dealmaass.com/paymentgateway.php?role=ptu&DR={DR}"; 
         $description  =  "dealmaasin PTU - ".$_POST['inUserid'];
    } else if (isset($_POST['bids'])) {
        $amount = $_POST['amt'];
        $invoiceID = $_POST['inUserid']."-".time();
        $usrDetails = $mysql->select("select * from _usertable where userid=".$_POST['inUserid']);
        
        $usrDetails[0]['firstname']=$usrDetails[0]['personname'];
        $usrDetails[0]['mobileno']=$usrDetails[0]['mobileno'];
        $usrDetails[0]['emailid']=$usrDetails[0]['emailid'];
        $usrDetails[0]['city']=substr($usrDetails[0]['address1']." ".$usrDetails[0]['address2'],0,10);
        $usrDetails[0]['firstname']=$usrDetails[0]['pincode'];
        $return_url   = "http://www.dealmaass.com/paymentgateway.php?role=bu&DR={DR}"; 
        $description  =  "dealmaasin BU - ".$_POST['inUserid'];
    }
  
     $accountid    = "14029";
     $mode         = "LIVE";
     $hash         = "7a0d1671861f02e83bf27da3d2c87eef"."|".$accountid."|".$amount."|".$invoiceID."|".$return_url."|".$mode; 
     $secure_hash  = md5($hash);          

?>
<form  method="post" action="https://secure.ebs.in/pg/ma/sale/pay" name="frmTransaction" id="frmTransaction" target="_self">
    <input name="account_id" type="hidden" value="<?php echo $accountid; ?>">
    <input name="return_url" type="hidden" size="60" value="<?php echo $return_url; ?>" />
    <input name="mode" type="hidden" size="60" value="<?php echo $mode; ?>" />
    <input name="reference_no" type="hidden" value="<? echo  $invoiceID; ?>" />
    <input name="amount" type="hidden" value="<? echo $amount?>"/>
    <input name="description" type="hidden" value="<?php echo $description;?>" /> 
    <input name="name" type="hidden" maxlength="255" value="<?php echo $usrDetails[0]['firstname'];?>" />
    <input name="address" type="hidden" maxlength="255" value="<?php echo $usrDetails[0]['city'];?>" />
    <input name="city" type="hidden" maxlength="255" value="<?php echo $usrDetails[0]['city'];?>" />
    <input name="state" type="hidden" maxlength="255" value="<?php echo $usrDetails[0]['city'];?>" />
    <input name="postal_code" type="hidden" maxlength="255" value="<?php echo $usrDetails[0]['pincode'];?>" />
    <input name="country" type="hidden" maxlength="255" value="IND" />
    <input name="phone" type="hidden" maxlength="255" value="<?php echo $usrDetails[0]['mobileno'];?>" />
    <input name="email" type="hidden" size="60" value="<?php echo $usrDetails[0]['emailid'];?>" />
    <input name="ship_name" type="hidden" maxlength="255" value="<?php echo $usrDetails[0]['firstname'];?>" />
    <input name="ship_address" type="hidden" maxlength="255" value="<?php echo $usrDetails[0]['city'];?>" />
    <input name="ship_city" type="hidden" maxlength="255" value="<?php echo $usrDetails[0]['city'];?>" />
    <input name="ship_state" type="hidden" maxlength="255" value="<?php echo $usrDetails[0]['city'];?>" />
    <input name="ship_postal_code" type="hidden" maxlength="255" value="<?php echo $usrDetails[0]['pincode'];?>" />
    <input name="ship_country" type="hidden" maxlength="255" value="IND" />
    <input name="ship_phone" type="hidden" maxlength="255" value="<?php echo$usrDetails[0]['mobileno'];?>" />
    <input name="secure_hash" type="hidden" size="60" value="<? echo $secure_hash;?>" />
</form> 
<div style="text-align:center;padding:20px;">Please wait ...</div> 
<script>setTimeout("document.getElementById('frmTransaction').submit();",1500);</script>
<?php  } ?>


<?php
    
    class MySqlC {
        
        var $link; 
        var $dbHost = "localhost";
        var $dbUser = "dealmaassin";
        var $dbPass = "dealmaassin";
        var $dbName = "dealmaassin";
   /*     
        var $dbHost = "localhost";
        var $dbUser = "india_user";
        var $dbPass = "123456789";
        var $dbName = "indiansvictoryparty_com_mydb"; */
        
        var $qry = "";
        
        function MySqlC(){
            $this->link = mysql_connect($this->dbHost,$this->dbUser,$this->dbPass);
        }
        
        function select($sql) {
            mysql_select_db($this->dbName,$this->link);
              mysql_query('SET collation_server=utf8_general_ci',$this->link);
              mysql_query('SET collation_connection=utf8_general_ci',$this->link);
              mysql_query('SET collation_database=utf8_general_ci',$this->link);

              mysql_query('SET character_set_server = utf8',$this->link);
              mysql_query('SET character_set_database = utf8',$this->link);
              mysql_query('SET names utf8;',$this->link);
              mysql_query('SET character_set utf8;',$this->link);

              mysql_query('SET character_set_results=utf8',$this->link);
              mysql_query('SET character_set_client=utf8',$this->link);
              mysql_query('SET character_set_connection=utf8',$this->link);
              mysql_query('SET collation_connection=utf8_general_ci',$this->link);
            $result = mysql_query($sql,$this->link);
            $resultData= array();
            while ($row = mysql_fetch_assoc($result)){
                $resultData[]=$row;
            }
            return $resultData;
        }
        
        function execute($sql) {
            mysql_select_db($this->dbName,$this->link);
              mysql_query('SET collation_server=utf8_general_ci',$this->link);
              mysql_query('SET collation_connection=utf8_general_ci',$this->link);
              mysql_query('SET collation_database=utf8_general_ci',$this->link);

              mysql_query('SET character_set_server = utf8',$this->link);
              mysql_query('SET character_set_database = utf8',$this->link);
              mysql_query('SET names utf8;',$this->link);
              mysql_query('SET character_set utf8;',$this->link);

              mysql_query('SET character_set_results=utf8',$this->link);
              mysql_query('SET character_set_client=utf8',$this->link);
              mysql_query('SET character_set_connection=utf8',$this->link);
              mysql_query('SET collation_connection=utf8_general_ci',$this->link);
            mysql_query($sql,$this->link);
  return mysql_affected_rows($this->link); 
        }
        
        function insert($tableName,$rowData) {
            $r = "insert into `".$tableName."` (";
            $l = " values (";
            foreach($rowData as $key => $value) {
                $r.="`".$key."`,";
                if ($value=="Null") {
                    $l.="Null,";
                } else {
                    $l.="'".$value."',";    
                }
                
            }
            $r = substr($r,0,strlen($r)-1).")";
            $l = substr($l,0,strlen($l)-1).")";
            $sql = $r.$l;
            
            mysql_select_db($this->dbName,$this->link);
              mysql_query('SET collation_server=utf8_general_ci',$this->link);
              mysql_query('SET collation_connection=utf8_general_ci',$this->link);
              mysql_query('SET collation_database=utf8_general_ci',$this->link);

              mysql_query('SET character_set_server = utf8',$this->link);
              mysql_query('SET character_set_database = utf8',$this->link);
              mysql_query('SET names utf8;',$this->link);
              mysql_query('SET character_set utf8;',$this->link);

              mysql_query('SET character_set_results=utf8',$this->link);
              mysql_query('SET character_set_client=utf8',$this->link);
              mysql_query('SET character_set_connection=utf8',$this->link);
              mysql_query('SET collation_connection=utf8_general_ci',$this->link);
            $this->qry=$sql;  
            mysql_query($sql,$this->link);
          //  return $sql;
            return mysql_insert_id($this->link);
    
        }
        
        function insRow($sql) {
            mysql_select_db($this->dbName,$this->link);
              mysql_query('SET collation_server=utf8_general_ci',$this->link);
              mysql_query('SET collation_connection=utf8_general_ci',$this->link);
              mysql_query('SET collation_database=utf8_general_ci',$this->link);

              mysql_query('SET character_set_server = utf8',$this->link);
              mysql_query('SET character_set_database = utf8',$this->link);
              mysql_query('SET names utf8;',$this->link);
              mysql_query('SET character_set utf8;',$this->link);

              mysql_query('SET character_set_results=utf8',$this->link);
              mysql_query('SET character_set_client=utf8',$this->link);
              mysql_query('SET character_set_connection=utf8',$this->link);
              mysql_query('SET collation_connection=utf8_general_ci',$this->link);
            $this->qry=$sql;  
            mysql_query($sql,$this->link);
            if (mysql_affected_rows()==1) {
                return "1";
            } else {
                return "-1";
            }
        //  return mysql_affected_rows();
          //  return mysql_insert_id($this->link); 
        }
    }
?>