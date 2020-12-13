<h2 style="text-align: left;font-family: arial;">Registration at earnmoneytech</h2>
<?php
    if (isset($_POST['firstname'])) {
        $isTrue = 0;
        $isTrue += validate($_POST['firstname']);
        $isTrue += validate($_POST['emailid']);
        $isTrue += validate($_POST['doorno']);
        $isTrue += validate($_POST['streetname']);
        $isTrue += validate($_POST['city']);
        $isTrue += validate($_POST['state']);
        $isTrue += validate($_POST['pincode']);
        $isTrue += validate($_POST['mobileno']);
        $isTrue += validate($_POST['password']);
        $isTrue += validate($_POST['cpassword']);
        
        
        if (isset($_POST['agree']) && ($_POST['agree']==10)) {
        } else {
             $isTrue +=1; 
             echo "<div style='color:red;'>Please agree the terms and conditions.</div>";
        }
        // Mobile Number Validation
    //    if (($_POST['mobileno']>7000000000) && ($_POST['mobileno']<=9999999999)){
   //     } else {
   //          $isTrue +=1; 
   //          echo "<div style='color:red;'>Invalid Mobile Number</div>";
   //     }
        // Mobile Number & Confrim Mobile Number Validation
     ///   if ($_POST['mobileno']!=$_POST['cmobileno']) {
     //       $isTrue +=1; 
     //       echo "<div style='color:red;'>Mobile Number is not same</div>";
     //   }

        if ($_POST['password']!=$_POST['cpassword']) {
            $isTrue +=1; 
            echo "<div style='color:red;'>Password and Confrim Password should be same</div>";
        }

        
       // Email Validation
        if (!(isValidEmail($_POST['emailid']))) {
            $isTrue +=1; 
            echo "<div style='color:red;'>Invalid Email id</div>";
        }
        // Duplicate Email Validation from DB
        $data = $mysql->select("select * from _clients where emailid='".$_POST['emailid']."'");
        if (sizeof($data)>0) {
            $isTrue +=1; 
            echo "<div style='color:red;'>This Email Id Already Exists</div>"; 
        }
        // Duplicate Mobile Number Validation from DB
        $data = $mysql->select("select * from _clients where mobileno='".$_POST['mobileno']."'");
        if (sizeof($data)>0) {
            $isTrue +=1; 
            echo "<div style='color:red;'>This Moblie Number Already Exists</div>"; 
        }
        if ($isTrue==0) {
                 $t="<table cellpadding='5' cellspacing='5' style='font-size:12px;'>";
                 $t.="<tr><td>First Name </td><td>".$_POST['firstname']."</td></tr>";
                 $t.="<tr><td>Last Name </td><td>".$_POST['lastname']."</td></tr>";
                 $t.="<tr><td>Email Id</td><td>".$_POST['emailid']."</td></tr>";
                 $t.="<tr><td>Date Of Birth</td><td>".$_POST['dd']."-".$_POST['mm']."-".$_POST['yy']."</td></tr>";
                 $t.="<tr><td>Sex</td><td>".$_POST['sex']."</td></tr>";
                 $t.="<tr><td>Door No</td><td>".$_POST['doorno']."</td></tr>";
                 $t.="<tr><td>Building Name</td><td>".$_POST['buildingname']."</td></tr>";
                 $t.="<tr><td>District Name</td><td>".$_POST['streetname']."</td></tr>";
                 $t.="<tr><td>City</td><td>".$_POST['city']."</td></tr>";
                 $t.="<tr><td>State</td><td>".$_POST['state']."</td></tr>"; 
                 $t.="<tr><td>Pincode</td><td>".$_POST['pincode']."</td></tr>"; 
                 $t.="<tr><td>Plan</td><td>".$_POST['plan']."</td></tr>"; 
                 $t.="<tr><td>Mobile No</td><td>".$_POST['mobileno']."</td></tr>"; 
                 $t.="<tr><td>Password</td><td>".$_POST['password']."</td></tr>"; 
                 $t.="<tr><td>Country</td><td>".$_POST['country']."</td></tr>"; 
                 $t.="<tr><td>Referring</td><td>".(($_SESSION['refference']>0)? $_SESSION['refference']: '')."</td></tr>";
                 $t.="</table>";
                 $t.="<br><div style='color:blue'>Thanks for Registration. Your registration details are sent to the administrator. We will response very soon to you</div>";
                 $t.="<br><br>By<br>EarnMoneyTech Team<b>";
                 $headers  = "From: info@earnmoneytech.com\r\n";
                 $headers .= "Content-type: text/html\r\n";
                 // Add New Record 
                 
                 switch($_POST['country']) {
                     case 'dubai' :
                        $statename = "-----";
                        $districtname = "-----";
                        break;
                        
                     case 'malaysia' :
                        $statename = "-----";
                        $districtname = "-----";
                        break;                        
                        
                                             case 'singapore' :
                        $statename = "-----";
                        $districtname = "-----";
                        break;
                        
                                             case 'india' :
                        $statename = $_POST['state'];
                        $districtname = $_POST['streetname'];
                        break;
                 }
                   
                      
                 $rowData = array( "id"=>'Null',
                                "firstname" => $_POST['firstname'],
                                "lastname" => $_POST['lastname'],
                                "emailid" => $_POST['emailid'],
                                "dateofbirth"=> $_POST['yy']."-".$_POST['mm']."-".$_POST['dd'],
                                "sex" => $_POST['sex'],
                                "plan" => $_POST['plan'],
                                "doorno" => $_POST['doorno'],
                                "buildingname" => $_POST['buildingname'],
                                "streetname" => $districtname,
                                "city" => $_POST['city'],
                                "state" => $statename,
                                "pincode" => $_POST['pincode'],
                                "mobileno" => $_POST['mobileno'],
                                "postedon" => date("Y-m-d H:i:s"),
                                "isactive" => '0',
                                "isblock" => '-1',
                                "referringby" => (($_SESSION['refference']>0)? $_SESSION['refference']: '0'),
                                "password" => $_POST['password'],
                                "activatedon" => "0000-00-00 00:00:00",
                                "visitors" => '1',
                                "userlink" => ' ',
                                "country"=>$_POST['country']);
                 $_SESSION['refference']=-1;
                 $recordId = $mysql->insert("_clients",$rowData);
                 if ($recordId>0) {
                    // Thanks Message To Registratnt
                    mail($_POST['emailid'],"Thanks For Register with Us : ",$t,$headers);  
                    // Mail To Administrator
                    mail("jeyaraj_123@yahoo.com","New Registration : ",$t,$headers);  
                    mail("info@earnmoneytech.com","New Registration : ",$t,$headers); 
                    // Display Success Message
                    echo "<div style='padding:10px;text-align:left;margin:10px;font-family:arial;font-size:13px;line-height: 20px;text-align:justify;border:1px solid #ccc;'>Thanks for Registration. Your registration details are sent to the administrator. We will response very soon to you</div>";
                    echo "<style>.formwindow {display:none}</style>";  
                                        ?>
   <div style='border: 1px solid #ccc;margin:5px;padding:10px;'>
                        Hello member <b><?php echo $_POST['firstname']; ?></b>!<br><br>
                        Thank You For Joining Us.<br><br>
                        <span style="color:red;font-size:15px;font-weight:bold">Account Had Been Created But It's Not Active Yet.</span><br><br>
                        <span style="color:green;font-size:13px">To Activate Your Account, Please Make a Payment for Your Membership.</span><br><br>
                        <span style="color:Orange;font-size:13px"><b>Note:</b>"<b>If You Have Not Paid Now Don't Worry. Just Choose The Below Payment Options. Go and Make a Payment then login with your login details send SMS to admin to activate your account instantly</b>"</span><br><br>
                        <span style="color:#FF00BF;font-size:15px">Lots of people much Younger than you Earning More In This ! WHY NOT YOU?<br><br>
                    Please Select Your Payment Method To Pay Manually:<br><br>
                    <b>Payment Option Through : Please Select</b>,<br><span style='color:#35A6FF'> Bank Deposit, Bank Transfer, -Money Order,western moneyorder :</span></span><br><br>
                    </div>

                    <?php
                    echo $t;
                      
                } else {
                    // Error message display when inserting
                    echo "<div style='padding:10px;text-align:left;margin:10px;font-family:arial;font-size:13px;line-height: 20px;text-align:justify;border:1px solid #ccc;'>Error Occured when sending your infromation to administrator. Please Try again.</div>";
                }
        } else {
            echo "<div style='color:red'>All Fields are required</div>";    
        }
    }   
?>
    <div id="formwindow" class="formwindow">
        <form action="" method="post">  
            <?php 
                if ($_SESSION['refference']>0) {
                    $refData = $mysql->select("select * from _clients where id=".$_SESSION['refference']);
            ?>
            <h3 style="text-align: left;font-family: arial;color:#264A94">SPONSOR INFORMATION</h3>
                <table cellpadding="5" cellspacing="5" style="text-align:left;margin:10px;font-family:arial;font-size:13px;line-height: 20px;text-align:justify;" width="100%">
                    <tr>
                        <td width="100"> Sponser ID</td>
                        <td width="20">&nbsp;:&nbsp;</td>
                        <td><?php echo $refData[0]['id'];?></td>
                    </tr>
                    <tr>
                        <td>Sponser Name</td>
                        <td>&nbsp;:&nbsp;</td>
                        <td><?php echo $refData[0]['firstname'];?></td>
                    </tr>
                    <tr>
                        <td>Sponser Plan</td>
                        <td>&nbsp;:&nbsp;</td>
                        <td><?php echo $refData[0]['plan'];?></td>
                    </tr>
                </table>                         
            <?php } ?>
            
            <h3 style="text-align: left;font-family: arial;color:#264A94">PERSONAL INFORMATION</h3>     
                <table cellpadding="5" cellspacing="5" style="text-align:left;margin:10px;font-family:arial;font-size:13px;line-height: 20px;text-align:justify;width: 100%;">
                    <tr>
                        <td width="150">Name<span class="man">*</span></td>
                        <td><input type="text" name="firstname" value="<?php echo $_POST['firstname'];?>" style="width: 100%;border:1px solid #D4E3F6;padding:3px;"></td>
                    </tr>
                    <input type="hidden" name="lastname" value="------"  style="width: 100%;border:1px solid #D4E3F6;padding:3px;">
                    <!--<tr>
                        <td>Last Name</td>
                        <td><input type="text" name="lastname" value="<?php echo $_POST['lastname'];?>"  style="width: 100%;border:1px solid #D4E3F6;padding:3px;"></td>
                    </tr>-->
                    <tr>
                        <td>E-mail ID<span class="man">*</span></td>
                        <td><input type="text" name="emailid"  value="<?php echo $_POST['emailid'];?>" style="width: 100%;border:1px solid #D4E3F6;padding:3px;"></td>
                    </tr>
                    <tr>
                        <td>Date of Birth</td>
                        <td>
                            <select name="dd" style="border:1px solid #D4E3F6;padding:3px;">
                                <?php for($i=1;$i<=31;$i++) { ?>
                                    <option value="<?php echo $i;?>" <?php echo ($i==$_POST['dd'])? 'selected=selected':'';?>><?php echo $i;?></option>
                                <?php } ?>
                            </select>&nbsp;/&nbsp;
                            <select name="mm" style="border:1px solid #D4E3F6;padding:3px;">
                                <?php for($i=1;$i<=12;$i++) { ?>
                                    <option value="<?php echo $i;?>" <?php echo ($i==$_POST['mm'])? 'selected=selected':'';?>><?php echo $i;?></option>
                                <?php } ?>
                            </select>&nbsp;/&nbsp;
                            <select name="yy" style="border:1px solid #D4E3F6;padding:3px;">
                                <?php for($i=1960;$i<=(date("Y")-18);$i++) { ?>
                                    <option value="<?php echo $i;?>" <?php echo ($i==$_POST['yy'])? 'selected=selected':'';?>><?php echo $i;?></option>
                                <?php } ?>
                            </select> 
                        </td>
                    </tr>
                    <tr>
                        <td>Gender</td>
                        <td>
                            <select name="sex" style="border:1px solid #D4E3F6;padding:3px;">
                                <option value="male" <?php echo ($_POST['sex']=="male")? 'selected=selected':'';?>>Male</option>
                                <option value="female" <?php echo ($_POST['sex']=="female")? 'selected=selected':'';?>>Female</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>Plan</td>
                        <td>
                            <select name="plan" style="border:1px solid #D4E3F6;padding:3px;">
                                <option value="1" <?php echo ($_POST['plan']=="1")? 'selected=selected':'';?>>Plan 1</option>
                                <option value="2" <?php echo ($_POST['plan']=="2")? 'selected=selected':'';?>>Plan 2</option>
                                <option value="3" <?php echo ($_POST['plan']=="3")? 'selected=selected':'';?>>Plan 3</option>  
                            </select>
                        </td>
                    </tr>
                    <input type="hidden" name="doorno" size="3" value="-----" style="width: 100%;border:1px solid #D4E3F6;padding:3px;">
              <!--      <tr>
                        <td>Door or House No<span class="man">*</span></td>
                        <td><input type="text" name="doorno" size="3" value="<?php echo $_POST['doorno'];?>" style="width: 100%;border:1px solid #D4E3F6;padding:3px;"></td>
                    </tr> -->
                    <input type="hidden" value="---" name="buildingname"  style="width: 100%;border:1px solid #D4E3F6;padding:3px;">
             <!--       <tr>
                        <td>Street Name<span class="man">*</span></td>
                        <td><input type="text" name="streetname"  value="<?php echo $_POST['streetname'];?>"  style="width: 100%;border:1px solid #D4E3F6;padding:3px;"></td>
                    </tr>          -->
                    <tr>
                        <td>City / Town<span class="man">*</span></td>
                        <td><input type="text" name="city"   value="<?php echo $_POST['city'];?>" style="width: 100%;border:1px solid #D4E3F6;padding:3px;"></td>
                    </tr>
                  <!--  <tr>
                        <td>State<span class="man">*</span></td>
                        <td><input type="text" name="state"  value="<?php echo $_POST['state'];?>" style="width: 100%;border:1px solid #D4E3F6;padding:3px;"></td>  
                    </tr> -->
                    <tr>
                        <td>Country Name<span class="man">*</span></td>
                        <td>
                        <script>
                            function countryselect(val) {
                                //alert(val);
                                if (val=='dubai') {
                                  $('#state').hide(); 
                                  $('#streetname').hide(); 
                                } 
                                
                                if (val=='malaysia') {
                                  $('#state').hide();  
                                  $('#streetname').hide();
                                } 
                                
                                if (val=='singapore') {
                                  $('#state').hide();  
                                  $('#streetname').hide();
                                }
                                
                                if (val=='india') {
                                  $('#state').show();  
                                  $('#streetname').show();
                                }
                                 
                            }
                        </script>
                            <select name='country'  style="border:1px solid #D4E3F6;padding:3px;" onchange="countryselect($(this).val())">
                                <option value='dubai' <?php echo ($_POST['country']=='dubai')?'selected=selected':'';?> >Dubai</option>
                                <option value='india' selected="selected" <?php echo ($_POST['country']=='india')?'selected=selected':'';?> >India</option>
                                <option value='malaysia' <?php echo ($_POST['country']=='malaysia')?'selected=selected':'';?> >Malaysia</option>
                                <option value='singapore' <?php echo ($_POST['country']=='singapore')?'selected=selected':'';?> >Singapore</option>
                            </select>
                        </td>  
                    </tr>
                                        <tr>
                        <td>State Name</td>
                        <td>
                        <?php  $statenames=$mysql->select("select * from _statenames order by statenames"); ?>
                            <select id='state' name="state" style="border:1px solid #D4E3F6;padding:3px;width: 400px" onchange="$('#dis_name').html($('#_s'+$(this).val()).html())">
                            <option value="">Select State Name</option>
                            <?php foreach($statenames as $statename) { ?>
                                    <option value="<?php echo $statename['id'];?>"   <?php echo ((($statename['id']==$_POST['statename']) || ($statename['id']==31)) ? "selected=selected" : ""); ?> ><?php echo $statename['statenames'];?></option>
                            <?php } ?>
                            </select>  
                            
                         
                        </td>
                    </tr>
                    <tr>
                        <td>District Name</td>
                        <td><div id='dis_name'>
                            <select name="streetname" style="border:1px solid #D4E3F6;padding:3px;width: 400px">
                            <option value="">Select District Name</option>
                            </select>  
                            </div>
                            
                               <?php
                                if (isset($_POST['statename'])) {
                                    ?>
                                         <script>
                                         $('#dis_name').html($('#_s31').html());
                                         //function call_Later() {
                                          //  $('#dis_name').html($('#_s<?php echo $_POST['statename'];?>').html());                                             
                                           // $('#dis_name').html($('#_s31').html());
                                         //}
                                         //setTimeout("call_Later()",500);
                                             
                                         </script>
                                    <?php
                                }
?>

                        </td>
                    </tr>                      
                    <input type="hidden" name="pincode" value="------"  style="width: 100%;border:1px solid #D4E3F6;padding:3px;">
                  <!--  <tr>
                        <td>Pin Code<span class="man">*</span></td>                      
                        <td><input type="text" name="pincode" value="<?php echo $_POST['pincode'];?>"  style="width: 100%;border:1px solid #D4E3F6;padding:3px;"></td>
                    </tr>             -->
                    <tr>
                        <td>Phone<span class="man">*</span></td>
                        <td><input type="text" name="mobileno" value="<?php echo $_POST['mobileno'];?>"  style="width: 100%;border:1px solid #D4E3F6;padding:3px;"></td>
                    </tr>            
                    <tr>
                        <td>Password<span class="man">*</span></td>
                        <td><input type="password" name="password" value="<?php echo $_POST['password'];?>"  style="width: 100%;border:1px solid #D4E3F6;padding:3px;"></td>
                    </tr>            
                    <tr>
                        <td>Confrim Password<span class="man">*</span></td>
                        <td><input type="password" name="cpassword" value="<?php echo $_POST['cpassword'];?>"  style="width: 100%;border:1px solid #D4E3F6;padding:3px;"></td>
                    </tr> 
                    <tr>
                        <td valign="top">Terms & Conditions</td>
                        <td>
                            <div style="height:80px;overflow:auto;padding:5px;border:1px solid #ccc;text-align: justify;font-size:11px;line-height:14px;">
                                You agree to become a member of our TO BE RICH Money Making Program introduced by <b>earnmoneytech.com</b> and are bound by the terms of this agreement. * To become a member of our team you must be at least 18 years of age. * All International members can join. * Sub-Contract of this program is strictly prohibited. * Registration Fee Charged is a one-time fee and completely non-refundable. Registration should be made only according to the Registration details and instructions given by earnmoneytech.com. We will not be responsible for any error made by you in the Registration procedures. * It may take 5 or more business days for us to confirm your payment depending on the mode of Payment you have made us. As soon as we confirm your Payment, Membership details will be sent to you within 2 to 3 business hours. * Your Earnings depend upon the number of Confirmed Registrations occur through your website. Rs.500 or $10 will be credited for Plan No:1to your Account& Rs.1000 or $20 for Plan No;2. For successful payment validations, make sure you are registering the members in your Plan ,failing which you will get the earning as per your plan which ever is the smaller amount. * If there is any Technical Problem, until we solve it kindly co-operate with us. *You may use graphic and text links both on your website and in emails. The site may also be advertised offline in classified ads, magazines, and newspapers. You may use the graphics and text provided to you by us, or you may create your own as long as they are deemed appropriate according to the conditions. * You are free to download the Products provided by us in our Member area. * You can download the Products and host it only on your own server, while selling the Products. * You don't have any right to host it with our server. If found, severe actions will be taken. *When a web surfer clicks through your member link, a cookie is set in their browser that contains your username. Also, their IP address is tracked in the database along with your name. When this person decides to register, the script will look for this cookie and/or try to match their IP address to identify the member who will be awarded the payment. Visitors sent through your member link may join later in time and the commission will still be awarded if the cookie is present in their browser and/or they are using the same IP address as the one logged in the database. * earnmoneytech com will not be responsible for the taxes on your income. You will have to pay it on your own. * If somebody wants to quit this Program then he/she has to notify us about the same. * Your Account will be immediately terminated, if any of the following happens. 1. Inappropriate advertisements (False claims, misleading hyperlinks). 2. Spamming (mass email, mass newsgroup posting, sms etc...). 3. Advertising on sites containing/promoting illegal activities. 4. Violation of intellectual property rights. 5. If any member violates the Terms & Conditions of earnmoneytech.com. 6. If you had not earned anything continuously for 3 months. * Minimum Payout Rs.500/-. * Your payment will be sent to you every 7 days (Once a week). * Once Payment is processed will not be canceled. *Currently all International Members are paid only by WESTERN UNION. * We will not be responsible if Payee Name, Bank Name, Branch Name, Bank A/C No., Payable City, Payment Address or any other detail is incorrect. * Payments will be processed according to the Payment Mode that you choose. * A Minimum Payout of Rs.500/- is required for Bank Transfer. Payment will be Transferred Online directly to your Bank Account. * Only if your Account Balance reaches Rs.1000/- or more Payment will be done by Cheque. Your Cheque will be sent to you by Speed Post. * A Minimum Payout of Rs.1000/- is required for Money Order. * A Minimum Payout of $20 is required for WESTERN UNION. * Payment charges will be deducted from your Account balance. * No arguments will be entertained once the payment is made. * These terms will begin upon your signup with the program and will end when your account is terminated. If any modification to the terms is unacceptable to you, your only choice is to terminate your account. Your continuing participation in the program will constitute your acceptance of any change. * We will not be liable for indirect or accidental damages (loss of revenue, commissions) due to tracking failures, loss of database files, and any results of intents of harm to the program or our website. We do not make any expressed or implied warranties with respect to the program and/or products sold at this site. We make no claim that the operation of the affiliate program and our website will be error-free and we will not be liable for any interruptions or errors. * By filling out the signup form you acknowledge that you have read the terms and conditions, understand, and agree with them. * - earnmoneytech.com has complete rights to change the Terms & Conditions and Instructions of work without prior notice. Subject to change: This agreement can change. Although we have the right to change this agreement without any prior notice to our members, we will send out a notice to all of our members the new terms and/or terms that have changed. If for any reason you do not accept the changes, you will need to contact us, and your account will be removed.
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <td><input type="checkbox" name="agree" value="10" <?php echo ($_POST['agree']==10) ? 'checked="checked"' : '';?>>&nbsp;I Accepts the Terms & Conditions </td>
                    </tr>    
                    <tr>
                        <td>&nbsp;</td>
                        <td><input src="images/blue-register-button.jpg" type="image"></td>
                    </tr>
                </table>                   
        </form>
    </div>
    
    
    <?php
        function getBrowserType() {
        
        if (!empty($_SERVER['HTTP_USER_AGENT'])) { 
           $HTTP_USER_AGENT = $_SERVER['HTTP_USER_AGENT']; 
        } else if (!empty($HTTP_SERVER_VARS['HTTP_USER_AGENT'])) { 
           $HTTP_USER_AGENT = $HTTP_SERVER_VARS['HTTP_USER_AGENT']; 
        } else if (!isset($HTTP_USER_AGENT)) { 
           $HTTP_USER_AGENT = ''; 
        } 

        if (ereg('Opera(/| )([0-9].[0-9]{1,2})', $HTTP_USER_AGENT, $log_version)) { 
           $browser_version = $log_version[2]; 
           $browser_agent = 'Opera'; 
        } else if (ereg('MSIE ([0-9].[0-9]{1,2})', $HTTP_USER_AGENT, $log_version)) { 
           $browser_version = $log_version[1]; 
           $browser_agent = 'MSIE'; 
        } else if (ereg('OmniWeb/([0-9].[0-9]{1,2})', $HTTP_USER_AGENT, $log_version)) { 
           $browser_version = $log_version[1]; 
           $browser_agent = 'OmniWeb'; 
        } else if (ereg('Netscape([0-9]{1})', $HTTP_USER_AGENT, $log_version)) { 
           $browser_version = $log_version[1]; 
           $browser_agent = 'Netscape'; 
        } else if (ereg('Mozilla/([0-9].[0-9]{1,2})', $HTTP_USER_AGENT, $log_version)) { 
           $browser_version = $log_version[1]; 
           $browser_agent = 'Mozilla'; 
        } else if (ereg('Konqueror/([0-9].[0-9]{1,2})', $HTTP_USER_AGENT, $log_version)) { 
           $browser_version = $log_version[1]; 
           $browser_agent = 'Konqueror'; 
        } else { 
           $browser_version = 0; 
           $browser_agent = 'Other'; 
        }

        return $browser_agent;
    }
    $json = json_decode(file_get_contents("http://api.ipinfodb.com/v3/ip-city/?key=550aff244c23ee15e1dfca6551d6afc2e9fdf79f4d976952b4688a667a782dbf&ip=".$_SERVER['REMOTE_ADDR']."&format=json"));
      
      $array = array(
        "id"=>'null',
        "browser"=>getBrowserType(),
        "ip"=>$_SERVER['REMOTE_ADDR'],
        "country"=>$json->countryName,
        "regionname"=>$json->regionName,         
        "cityname"=>$json->cityName,
        "latitude"=>$json->latitude,
        "longitude"=>$json->longitude,
        "timezone"=>$json->timeZone,
        "viewon"=>date("Y-m-d H:i:s"),
        "userid"=>(($_SESSION['refference']>0)? $_SESSION['refference']: '0')
      );
      
      if ($_SESSION['refference']>0) {
      
          $d = $mysql->select("select * from _visitor where ip='".$_SERVER['REMOTE_ADDR']."' and userid='".$_SESSION['refference']."' and (date(viewon) = date('".date("Y-m-d")."'))");

          $rclient = $mysql->select("select * from _clients where id=".$_SESSION['refference']);    

          
          if (sizeof($d)==0) {
            $recordId = $mysql->insert("_visitor",$array);
        
        /*    if ($rclient[0]['plan']==1) {
                $cramount_ref=1.00;
            } else if ($rclient[0]['plan']==2) {
                $cramount_ref=2.00;
            } else if ($rclient[0]['plan']==3) {
                $cramount_ref=3.00;    
            }*/
       
       
       if ($rclient[0]['country']=="india") {
        $cramount_ref = getCommissionAmount($rclient[0]['country'],$rclient[0]['plan'])    ;
        
            $array = array("id"=>'Null',
                "clientid"=>$_SESSION['refference'],
                "date"=>date("Y-m-d H:i:s"),
                "particulars" => "Earn via visting your link - ".$recordId,
                "cramount" => $cramount_ref,
                "dramount" => '0',
                "description"=>"Earn via visting your link - ".$recordId
            );
            $recordId = $mysql->insert("_clients_account",$array);        
          }
        }
          
      }
      
      function getCommissionAmount($country,$plan) {
           
           switch($country) {
               case 'dubai' :
                         switch($plan) {
                             case '1' :
                                   return "0.2";
                             break;
                             
                             case '2' :
                                return "0.30";
                             break;
                             
                             case '3' :
                                return "0.40";
                             break;
                         }
               
               break;
               
               case 'india' :
                          switch($plan) {
                             case '1' :
                                return '1';
                                   //return "1000";
                             break;
                             
                             case '2' :
                             return "2";
                             
                             //   return "1600";
                             break;
                             
                             case '3' :
                             return "3";                             
                                //return "2400";
                             break;
                         }
               break;
               
               case 'malaysia' :
                          switch($plan) {
                             case '1' :
                                   return "0.10";
                             break;
                             
                             case '2' :
                                return "0.15";
                             break;
                             
                             case '3' :
                                return "0.20";
                             break;
                         }
               break;
               
               case 'singapore' :
                             switch($plan) {
                             case '1' :
                                   return "0.1";
                             break;
                             
                             case '2' :
                                return "0.15";
                             break;
                             
                             case '3' :
                                return "0.2";
                             break;
                         }
               break;
           }
       }  
 
?>

    <?php
    $sn = $mysql->select("select * from _statenames order by statenames");
    foreach($sn as $s) {
        echo "<div id='_s".$s['id']."' style='display:none'>";
        
        $dn = $mysql->select("select * from _districtnames where stateid=".$s['id']);
        
         echo "<select id='streetname' name='streetname' style='border:1px solid #D4E3F6;padding:3px;width: 400px'>";
         
         if (sizeof($dn)>0) {
            foreach($dn as $d) {     ?>
              <option value="<?php echo trim(str_replace("\n","",$d['districtname']));?>"  <?php echo (($d['id']==$_POST['districtname']) ? "selected=selected" : ""); ?> ><?php echo $d['districtname'];?></option>
                <?php
            }
         } else {
             echo "<option value='-1'>None</option>";
         }
         
         echo "</select>";
        
        
        echo "</div>";
    }
    
    
?><script>
                                         $('#dis_name').html($('#_s31').html());
                                         </script>