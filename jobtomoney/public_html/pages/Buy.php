 <div class="line">
            <div class="box margin-bottom">
                <div class="row">
                    <div class="col-sm-8">
                       <h3 style="text-align: left;font-family: arial;border:none">BrightFuture</h3>
                 <span>Buy Now Get Link instantly</span><br> 
                 Already registered, please login and get your download links
                
                    </div>
                    <div class="col-sm-4">
                    
                      <?php
                      $display=true;
                      if (isset($_POST['buynowBtn']))  {
                          $display=false;
                      }
                      if (isset($_POST['DocuLoginBtn']))  {
                          $display=false;
                      }
                      if (isset($_POST['DocuRegisterBtn']))  {
                          $display=false;
                      }
                      if ( $display ) {
                          if (isset($_POST['DocuLoginBtn2'])) {
                       $mydata =  $mysql->select("select * from _tbl_documents_user where Password='".trim($_POST['xPassword'])."' and MobileNumber='".trim($_POST['xMobileNumber'])."'"); 
                       $login_error=0;
                       if (sizeof($mydata)==0) {
                            $xlogin_error++;
                            $xlogin_message = "Invaild login details";
                             $_POST['buynowBtn']="";
                       } else {
                           $_SESSION['DocUser']=$mydata[0];
                           echo "<script>location.href='MyDocuments'</script>";
                       }
                                                
                    }                             
                 ?>
                     <h5>Customer Login</h5>
                      Already registered, please login and get your download links 
                               <form action="" method="post">
                                <table>
                                    <tr>
                                        <td>Mobile Number<br>
                                        <input type="text" required name="xMobileNumber" value="<?php echo isset($_POST['xMobileNumber']) ? $_POST['xMobileNumber'] : "";?>" placeholder="Registered Mobile Number" class="form-control"></td>
                                    </tr>
                                    <tr>
                                        <td>Password<br>
                                         <input type="Password" required name="xPassword"  value="<?php echo isset($_POST['xPassword']) ? $_POST['xPassword'] : "";?>" placeholder="Password" class="form-control">
                                         <span style="color:red"><?php echo $xlogin_message;?></span>
                                         </td>
                                    </tr>
                                    <tr>
                                        <td> <input type="submit" value="Login" name="DocuLoginBtn2" class="btn btn-success">
                                        
                                        </td>      
                                    </tr>
                                </table>
                                </form>
                 <?php } ?>
                              </div>
                     
                 
                </div>
               <div class="row" >
               
               <div class="col-sm-12">
                
                 <?php
                    if (isset($_POST['DocuLoginBtn'])) {
                       $mydata =  $mysql->select("select * from _tbl_documents_user where Password='".trim($_POST['Password'])."' and MobileNumber='".trim($_POST['MobileNumber'])."'"); 
                       $login_error=0;
                       if (sizeof($mydata)==0) {
                            $login_error++;
                            $login_message = "Invaild login details";
                             $_POST['buynowBtn']="";
                       } else {
                           $_SESSION['DocUser']=$mydata[0];
                           $userid=$mydata[0]['UserID'];
                           $startPayment=true;
                           
                       }
                       
                    }
                     if (isset($_POST['DocuRegisterBtn'])) {
                         $email = $mysql->select("select * from _tbl_documents_user where EmailID='".trim($_POST['EmailID'])."'");
                         $register_error=0;
                         if (sizeof($email)>0) {
                             $email_error="Email ID Already Exists";
                             $register_error++;
                         }
                           $moible = $mysql->select("select * from _tbl_documents_user where MobileNumber='".trim($_POST['MobileNumber'])."'");
                          if (sizeof($moible)>0) {
                             $mobile_error="Mobile Number Already Exists";
                             $register_error++;
                         }
                         
                         if (!($_POST['MobileNumber']>=6000000000 && $_POST['MobileNumber']<=9999999999)) {
                              $mobile_error="Invalid Mobile Number";
                             $register_error++;
                         }
                         if (strlen($_POST['Password'])<6) {
                               $password_error="Password must have 6 characters";
                             $register_error++;
                         }
                         
                         if ($register_error==0) {
                       $userid =  $mysql->insert("_tbl_documents_user",array("UserName"     => $_POST['UserName'],
                                                                    "MobileNumber" => trim($_POST['MobileNumber']),
                                                                    "EmailID"      => trim($_POST['EmailID']),
                                                                    "Password"     => trim($_POST['Password']),
                                                                    "CreatedOn"    => date("Y-m-d H:i:s")));
                       echo "Registration Completed.";
                       $mydata = $mysql->select("select * from _tbl_documents_user where UserID='".$userid."'");
                         $_SESSION['DocUser']=$mydata[0];
                       $startPayment=true;
                         } else {
                             $_POST['buynowBtn']="";
                         } 
                     }
                     
                     if (isset($startPayment) && $startPayment==true) {
                         
                     $products = $mysql->select("select * from _tbl_documents where md5(concat('doc',DocID))='".$_POST['DocumentCode']."'"); 
                   
                     $userinformation = $mysql->select("select * from _tbl_documents_user where UserID='".$userid."'");
 
$amount = $products[0]['Price'];
$paymentfor = strtolower("document_".$products[0]['DocumentName']);
           
$paymentid = $mysql->insert("_tblPayments",array("TxnDate"    => date("Y-m-d H:i:s"),
                                                 "TxnAmount"  => $amount,
                                                 "ClientID"   => $userinformation[0]['UserID'],
                                                 "DocumentID"  => $products[0]['DocID'],
                                                 "PaymentFor" => $paymentfor));
                                                 

    $mysql->execute("update _tblPayments set PaymentFrom='PayU' where PaymentID='".$paymentid."'");
    $MERCHANT_KEY = "8Pkzifyu";
    $SALT = "YqbXwgaFWV";
    $PAYU_BASE_URL = "https://secure.payu.in";            // For Production Mode
    $action = '';
    $posted = array();
    $posted['key']=$MERCHANT_KEY;
    $posted['txnid']=$paymentid;
    $posted['amount']=$amount;
    $posted['firstname']=$userinformation[0]['UserName'];
    $posted['email']=$userinformation[0]['EmailID'];
    $posted['phone']=$userinformation[0]['MobileNumber'];
    $posted['productinfo']="";
    $posted['surl']='https://www.jobtomoney.com/BuyPayment';
    $posted['furl']='https://www.jobtomoney.com/BuyPayment';
    $posted['service_provider']="payu_paisa";
       
    $txnid = $paymentid;
    $hash = '';
    $hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";
    //$posted['productinfo'] = json_encode(json_decode('[{"name":"tutionfee","description":"","value":"500","isRequired":"false"},{"name":"developmentfee","description":"monthly tution fee","value":"1500","isRequired":"false"}]'));
    $posted['productinfo'] = json_encode(json_decode('[{"name":"Membershipfee","description":"","value":"'.$amount.'","isRequired":"false"}]'));
    $hashVarsSeq = explode('|', $hashSequence);
    $hash_string = '';    
    foreach($hashVarsSeq as $hash_var) {
        $hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
        $hash_string .= '|';
    }
    $hash_string .= $SALT;
    $hash = strtolower(hash('sha512', $hash_string));
    $action = $PAYU_BASE_URL . '/_payment';
?>
<form action="<?php echo $action; ?>" method="post" name="payuForm" id="payuForm">
    <input type="hidden" name="key" value="<?php echo $MERCHANT_KEY ?>" />
    <input type="hidden" name="hash" value="<?php echo $hash ?>"/>
    <input type="hidden" name="txnid" value="<?php echo $txnid ?>" />
    <input type="hidden" name="amount" value="<?php echo $amount; ?>" />
    <input type="hidden" name="firstname" id="firstname" value="<?php echo $posted['firstname']; ?>" /> 
    <input type="hidden" name="email" id="email" value="<?php echo $posted['email']; ?>" />
    <input type="hidden" name="phone" value="<?php echo $posted['phone']; ?>" />
    <textarea style="height:0px;width:0px;" name="productinfo"><?php echo $posted['productinfo']; ?></textarea>
    <input type="hidden" name="surl" value="<?php echo $posted['surl']; ?>"  />
    <input type="hidden" name="furl" value="<?php echo $posted['furl']; ?>"  />
    <input type="hidden" name="service_provider" value="payu_paisa" size="64" />
</form>
<script>
 document.getElementById("payuForm").submit();</script>
                         <?php
                      exit;
                     }
                 ?>
                
<br><Br>
                <?php if (isset($_POST['buynowBtn']))  {
                  $products = $mysql->select("select * from _tbl_documents where md5(concat('doc',DocID))='".$_POST['DocumentCode']."'");
                  $p=$products[0];
                 ?>
                      <div class="row">
                         <!--   <div class="col-sm-4" style="margin-bottom:15px">
                            <div style="border:1px solid #ccc;padding:10px">
                                <img src="assets/documents/<?php echo $p['Photopath'];?>" style="width: 100%;">
                                <br>
                                
                               
                                  
                                    
                                   
                               
                            </div>
                        </div> -->
                          <div class="col-sm-5" style="margin-bottom:15px">
                          
                              
                              
                              <h5>Customer Login</h5>
                               <form action="" method="post">
                             <input type="hidden" name="DocumentCode" value="<?php echo md5("doc".$p['DocID']);?>">
                                <table>
                                    <tr>
                                        <td>Mobile Number<br>
                                        <input type="text" required name="MobileNumber" value="<?php echo isset($_POST['MobileNumber']) ? $_POST['MobileNumber'] : "";?>" placeholder="Registered Mobile Number" class="form-control"></td>
                                    </tr>
                                    <tr>
                                        <td>Password<br>
                                         <input type="Password" required name="Password"  value="<?php echo isset($_POST['Password']) ? $_POST['Password'] : "";?>" placeholder="Password" class="form-control">
                                         <span style="color:red"><?php echo $login_message;?></span>
                                         </td>
                                    </tr>
                                    <tr>
                                        <td> <input type="submit" value="Login & Pay Rs. <?php echo $p['Price'];?>" name="DocuLoginBtn" class="btn btn-success">
                                       
                                        </td>      
                                    </tr>
                                </table>
                                </form>
                              
                             </div>
                              <div class="col-sm-2" style="margin-bottom:15px">
                              </div>
                              <div class="col-sm-5" style="margin-bottom:15px">
                                              
                                 
                                   
                                   <h5>New Customer</h5>
                                    <form action="" method="post">
                             
                             <input type="hidden" name="DocumentCode" value="<?php echo md5("doc".$p['DocID']);?>">
                                <table>
                                      <tr>
                                        <td>
                                            Your Name<br>
                                            <input type="text" required name="UserName"  value="<?php echo isset($_POST['UserName']) ? $_POST['UserName'] : "";?>" placeholder="Your Name" class="form-control">
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Mobile Number<br> 
                                         <input type="text" required name="MobileNumber"  value="<?php echo isset($_POST['MobileNumber']) ? $_POST['MobileNumber'] : "";?>" placeholder="Mobile number" class="form-control">
                                         <span style="color:red"><?php echo $mobile_error;?></span>
                                         </td>
                                    </tr>
                                    <tr>
                                        <td>Email ID<br>
                                        <input type="text" required name="EmailID"  value="<?php echo isset($_POST['EmailID']) ? $_POST['EmailID'] : "";?>" placeholder="Email  ID" class="form-control">
                                        <span style="color:red"><?php echo $email_error;?></span>
                                        </td>
                                        
                                    </tr>
                                    <tr>
                                        <td>Login Password<br>
                                      <input type="password" required name="Password"  value="<?php echo isset($_POST['Password']) ? $_POST['Password'] : "";?>" placeholder="Password" class="form-control">
                                      <span style="color:red"><?php echo $password_error;?></span>
                                      </td>         
                                    </tr>
                                    <tr>
                                        <td> <input type="submit" value="Register & Pay Rs. <?php echo $p['Price'];?>" name="DocuRegisterBtn" class="btn btn-success">
                                        
                                        </td>
                                    </tr>
                                </table>
                                </form>
                                
                             </div>
                                
                          </div>
                        
                       
                <?php } else { ?>
                 
                 <div class="row">
                 <?php
                    $products = $mysql->select("select * from _tbl_documents where IsPublish='1' and IsDelete='0' order by DocID");
                    foreach($products as $p) {
                        ?>
                        <div class="col-sm-6" style="margin-bottom:15px">
                            <div style="border:1px solid #ccc;padding:10px">
                                <img src="assets/documents/<?php echo $p['Photopath'];?>" style="width: 100%;">
                                <br>
                                
                                <form action="" method="post">
                                    <input type="hidden" name="DocumentCode" value="<?php echo md5("doc".$p['DocID']);?>">
                                    <span style="font-size:30px;color:#333;font-weight:bold;">Rs. <?php echo $p['Price'];?></span>
                                    <input type="submit" value="Download" name="buynowBtn" class="btn btn-success"  style="float:right">
                                </form>
                            </div>
                        </div>
                        <?php
                    }
                 ?>
                </div> 
                <?php } ?>
                     
               </div>                                        
               
                
                   
                   
            </div>
            </div>
            </div> 
              