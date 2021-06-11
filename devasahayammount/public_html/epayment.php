 <?php
    error_reporting(0);
    include_once("config.php");
    
   if ($_REQUEST['key']=='dsmount') {
       
       $secret_key = "7fa9344ab35256796b6d543d6b67c2da";   
     
         if(isset($_GET['rand'])) {

             $DR = preg_replace("/\s/","+",$_GET['rand']);
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
   
        $invoiceNo      = $response['MerchantRefNo'];
        $PaymentID      = $response['PaymentID'];
        $TransactionID  = $response['TransactionID'];
        $PaymentMethod  = $response['PaymentMethod'];
        
        $mysql = new MySql("localhost","dsmount","dsmount","dsmount");
    
        echo $response['ResponseMessage'];                                  
              
            //  TRANSACTION SUCCESS {
            if ( (trim(strtolower($response['ResponseMessage']))==strtolower('Transaction Successful')) && ($response['ResponseCode']==0) ) {
               $mysql->execute("update _massbooking set paymentstatus='SUCCESS' where id=".$invoiceNo);
               $data= $mysql->select("select * from _massbooking where id=".$invoiceNo);
               
               if ($data[0]['bookfor']=="Donation") {
                  $_SMS = "Dear ".$data[0]['donor'].", Thanks for giving donation Rs. ".$data[0]['amount']." has been received on your receipt no : ".$data[0]['id'];
               file_get_contents("http://sms.j2jsoftwaresolutions.com/api/sendmsg.php?user=j2jsoftwaresolutions&pass=123&sender=ETOKEN&phone=".$data[0]['mobilno']."&text=".urlencode($_SMS)."&priority=ndnd&stype=normal");    
               file_get_contents("http://sms.j2jsoftwaresolutions.com/api/sendmsg.php?user=j2jsoftwaresolutions&pass=123&sender=ETOKEN&phone=9677720856&text=".urlencode($_SMS)."&priority=ndnd&stype=normal");    
               $t = "Donating Process successfully Completed.<br>
               
               
                <div style='border:1px solid #ccc;padding:10px;margin:10px;'>
               
                <table style='font-size:13px;font-family:trebuchet ms'>
                    <tr>
                        <td style='text-align:center;font-weight:bold;'>   தூய வியாகுல அன்னை திருத்தலம்,  <br>
        26/87,தெற்கு தெரு, தேவசகாயம் மவுண்ட்,<br>
        ஆரல்வாய்மொழி , கன்னயாகுமரி-629301.<br>

        தொலைபேசி: 04652 263135   Web: devasahayammountshrine.com <br>

                    </td>
                    </tr>
                    <tr>
                        <td><br><br>
                        Thanks you for your donation in the amount of   Rs. ".number_format($data[0]['amount'],2)."  made on ".date("Y-m-d").",  . Your contribution is greatly appreciated.  Please retail this receipt for your records.
                        Transaction ID: ".$data[0]['id']."
                        <br><br>
                        
                        Thanks<Br>
                        Parish Priest,<br>
                        Our Lady of Sorrows Shrine.<br>
                        
                                        </td>
        </tr>
        </table>

                        
                
               
               </div> ";
               
               /* 
               <b>Donor Name:</b> ".$data[0]['donor']."
               <b>Recived Amount :</b> Rs.".$data[0]['amount']."<br> 
               <b>Transaction/Recepit No :</b> ".$invoiceNo."<br>";         */
               $url = "http://www.devasahayammountshrine.com/donate_complete.php";
                //Thanks you for your donation in the amount of made on . Your contribution is greatly appreciated.  Please retail this receipt for your records.
               } else {
               $_SMS = "Dear ".$data[0]['donor'].", Thanks for booking mass on ".$data[0]['dateofpreferred']." due to ".$data[0]['bookfor'].". Rs. ".$data[0]['amount']." has been received on your receipt no : ".$data[0]['id'];
               file_get_contents("http://sms.j2jsoftwaresolutions.com/api/sendmsg.php?user=j2jsoftwaresolutions&pass=123&sender=ETOKEN&phone=".$data[0]['mobilno']."&text=".urlencode($_SMS)."&priority=ndnd&stype=normal");    
               file_get_contents("http://sms.j2jsoftwaresolutions.com/api/sendmsg.php?user=j2jsoftwaresolutions&pass=123&sender=ETOKEN&phone=9677720856&text=".urlencode($_SMS)."&priority=ndnd&stype=normal");    
               $t = "Massbooking successfully Completed.<br><br><br>
               
               <div style='border:1px solid #ccc;padding:10px;margin:10px;'>
               
                <table  style='font-size:13px;font-family:trebuchet ms'>
                    <tr>
                        <td style='text-align:center;font-weight:bold;'>   தூய வியாகுல அன்னை திருத்தலம்,  <br>
        26/87,தெற்கு தெரு, தேவசகாயம் மவுண்ட்,<br>
        ஆரல்வாய்மொழி , கன்னயாகுமரி-629301.<br>

        தொலைபேசி: 04652 263135   Web: devasahayammountshrine.com <br>

                    </td>
                    </tr>
                    <tr>
                        <td>Dear ".$data[0]['donor'].", <br><br> We have recevied sum of Rs. ".number_format($data[0]['amount'])." on ".date("Y-m-d").", for the purpose of Mass Booking (date of preferred) on ".$data[0]['dateofpreferred'].". Transaction ID: ".$data[0]['id']."<br><br>
                        
                        Thanks<Br>
                        Parish Priest,<br>
                        Our Lady of Sorrows Shrine.<br>
                    </td>
        </tr>
        </table>
                        
                    
                        
                
               
               </div> ";
                
              /* 
               <b>Date Of Preferred On:</b> ".$data[0]['dateofpreferred']."<br> 
               <b>Book For :</b> ".$data[0]['bookfor']."<br> 
               <b>Donor Name:</b> ".$data[0]['donor']."<br>
               <b>Recived Amount :</b> Rs.".$data[0]['amount']."<br> 
               <b>Transaction/Recepit No :</b> ".$invoiceNo."<br>";   */
               $url = "http://www.devasahayammountshrine.com/massbooking_complete.php";
               }   
            } else {
                $t = "Transaction May Failed/Incomplete";
                 $mysql->execute("update _massbooking set paymentstatus='Failed/Incomplete' where id=".$invoiceNo);
                 $url = "http://www.devasahayammountshrine.com/massbooking_complete.php";
            }
            
            ?>
            <form action="<?php echo $url;?>" id="completefrm" name="completefrm" method="post">
            <textarea name="t" style="visibility: hidden"><?php echo $t;?></textarea>
            </form> 
            
                
            Please wait ....
            <script>
                setTimeout("document.getElementById('completefrm').submit();",500);
            </script>
            
            <?php
        
         
         
    
     
     }     
     

/**
* RC4 stream cipher routines implementation
*
* in PHP4 based on code written by Damien Miller <djm@mindrot.org>
*
* Usage:
* $key = "pear";
* $message = "PEAR rulez!";
*
* $rc4 = new Crypt_RC4;
* $rc4->key($key);
* echo "Original message: $message <br>\n";
* $rc4->crypt($message);
* echo "Encrypted message: $message <br>\n";
* $rc4->decrypt($message);
* echo "Decrypted message: $message <br>\n";
*
* @version $Revision: 1.6 $
* @access public
* @package Crypt
* @author Dave Mertens <dmertens@zyprexia.com>
 */
class Crypt_RC4 {

    /**
    * Real programmers...
    * @var array
    */
    var $s= array();
    /**
    * Real programmers...
    * @var array
    */
    var $i= 0;
    /**
    * Real programmers...
    * @var array
    */
    var $j= 0;

    /**
    * Key holder
    * @var string
    */
    var $_key;

    /**
    * Constructor
    * Pass encryption key to key()
    *
    * @see    key() 
    * @param  string key    - Key which will be used for encryption
    * @return void
    * @access public
    */
    function Crypt_RC4($key = null) {
        if ($key != null) {
            $this->setKey($key);
        }
    }

    function setKey($key) {
        if (strlen($key) > 0)
            $this->_key = $key;
    }

    /**
    * Assign encryption key to class
    *
    * @param  string key    - Key which will be used for encryption
    * @return void
    * @access public    
    */
    function key(&$key) {
        $len= strlen($key);
        for ($this->i = 0; $this->i < 256; $this->i++) {
            $this->s[$this->i] = $this->i;
        }

        $this->j = 0;
        for ($this->i = 0; $this->i < 256; $this->i++) {
            $this->j = ($this->j + $this->s[$this->i] + ord($key[$this->i % $len])) % 256;
            $t = $this->s[$this->i];
            $this->s[$this->i] = $this->s[$this->j];
            $this->s[$this->j] = $t;
        }
        $this->i = $this->j = 0;
    }

    /**
    * Encrypt function
    *
    * @param  string paramstr     - string that will encrypted
    * @return void
    * @access public    
    */
    function crypt(&$paramstr) {

        //Init key for every call, Bugfix 22316
        $this->key($this->_key);

        $len= strlen($paramstr);
        for ($c= 0; $c < $len; $c++) {
            $this->i = ($this->i + 1) % 256;
            $this->j = ($this->j + $this->s[$this->i]) % 256;
            $t = $this->s[$this->i];
            $this->s[$this->i] = $this->s[$this->j];
            $this->s[$this->j] = $t;

            $t = ($this->s[$this->i] + $this->s[$this->j]) % 256;

            $paramstr[$c] = chr(ord($paramstr[$c]) ^ $this->s[$t]);
        }
    }

    /**
    * Decrypt function
    *
    * @param  string paramstr     - string that will decrypted
    * @return void
    * @access public    
    */
    function decrypt(&$paramstr) {
        //Decrypt is exactly the same as encrypting the string. Reuse (en)crypt code
        $this->crypt($paramstr);
    }


}    //end of RC4 class
 ?>