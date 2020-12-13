<table cellpadding="0" cellspacing="0">
    <tr>
        <td><img src="images/student.jpg"></td>
        <td style="width: 314px;background:url(images/form-bg.jpg);">
                 <Br>
                <div style="font-family:arial;font-size:12px;color:#222">
                  
                    <?php
                        
                        if (isset($_POST['registerBtn'])) {
                            
                            $err = 0;                
                            
                            if (!((strlen(trim($_POST['pincode']))==6) && (($_POST['pincode']>=0)  && ($_POST['pincode']<=999999)))) {
                                $err++;
                                $msg = "Invalid PinCode";
                            }
                            
                            if (!preg_match("/^[a-zA-Z ]*$/",trim($_POST['cityname']))) {
                                $err++;
                                $msg = "Invalid City Name. Only letters and white space allowed";
                            }
  
                            if (!(strlen(trim($_POST['cityname']))>3)) {
                                $err++;
                                $msg = "Invalid City Name. Only letters and white space allowed";
                            }
                               
                            if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",trim($_POST['emailid']))) {
                                $err++;
                                $msg = "Invalid Email ID";
                            }
  
                            if (!((strlen(trim($_POST['mobileno']))==10) && (($_POST['mobileno']>=6666666666)  && ($_POST['mobileno']<=9999999999)))) {
                                $err++;
                                $msg = "Invalid Mobile No";
                            }
  
                            if (!preg_match("/^[a-zA-Z ]*$/",trim($_POST['personname']))) {
                                $err++;
                                $msg = "Invalid Name. Only letters and white space allowed";
                            }
  
                            if (!(strlen(trim($_POST['personname']))>3)) {
                                $err++;
                                $msg = "Invalid Person Name. Only letters and white space allowed";
                            }
                   
                            if ($err==0) {  
                                $array = array("firstname"   => trim($_POST['personname']),
                                               "mobileno"    => trim($_POST['mobileno']),
                                               "emailid"     => trim($_POST['emailid']),
                                               "city"        => trim($_POST['cityname']),
                                               "pincode"     => trim($_POST['pincode']),
                                               "postedon"    => date("Y-m-d H:i:s"),
                                               "isactive"    => "0",                             
                                               "isblock"     => "0",                              
                                               "referringby" => (($_SESSION['refference']>0)? $_SESSION['refference']: '0'),                         
                                               "password"    => "password",                        
                                               "activatedon" => "0000-00-00 00:00:00",
                                               "visitors"    => "0",
                                               "userlink"    => " " );
                                           
                                $c = $mysql->select("select * from  _clients where emailid='".trim($_POST['emailid'])."' or mobileno='".trim($_POST['mobileno'])."'");
                                if (sizeof($c)==0) {
                                    $userid = $mysql->insert("_clients",$array);
                                    
                                    
                 $t="<table cellpadding='5' cellspacing='5' style='font-size:12px;'>";
                 $t.="<tr><td>First Name </td><td>".$_POST['personname']."</td></tr>";
                 $t.="<tr style='font-weight:bold;color:red'><td>Email Id<br>(Login ID)</td><td>".$_POST['emailid']."</td></tr>";
                 $t.="<tr><td>Place Name</td><td>".$_POST['cityname']."</td></tr>";
                 $t.="<tr><td>Pincode</td><td>".$_POST['pincode']."</td></tr>"; 
                 $t.="<tr><td>Mobile No</td><td>".$_POST['mobileno']."</td></tr>"; 
                   if ($_SESSION['refference']>0) {
                    $rclient = $mysql->select("select * from _clients where id=".$_SESSION['refference']);    
                    $t.="<tr style='font-weight:bold;color:red'><td>Referring</td><td>http://www.dealmaass.in/u/".$link."</td></tr>";
                   }
                 $t.="</table>";
                 $t.="<br><div style='color:blue'>Thanks for Registration.</div>";
                 $t.="<br><br>By<br>Dealmaass Team<b>";
                 $headers  = "From: dealmaass@gmail.com\r\n";
                 $headers .= "Content-type: text/html\r\n";
                 
                  mail($_POST['emailid'],"Thanks For Register with Us : ",$t,$headers);  
                    // Mail To Administrator
                    mail("jeyaraj_123@yahoo.com","Dealmaas.in [PJ] New Registration : ",$t,$headers);  
                    mail("dealmaass@gmail.com","Dealmaas.in [PJ] New Registration : ",$t,$headers); 
                    
                    
                                } else {
                                    echo "<div style='border-radius:5px;background:#FFE8E5;border:1px solid #F75742;margin:10px;padding:10px;text-align:center;font-weight:bold;color:#222'>You have already registered.</div>";
                                }
                             
                          } else {
                             echo "<div style='border-radius:5px;background:#FFE8E5;border:1px solid #F75742;margin:10px;padding:10px;text-align:center;font-weight:bold;color:#222'>".$msg."</div>";
                          }
                        }   
                    ?> 
                <form action="" method="post" target="_self">
                <table style="font-family: arial;font-size:13px;color:#ffffff" align="center" cellpadding="5" cellspacing="5">
                    <tr>
                        <td style="font-family: arial;font-size:13px;color:#ffffff">Name</td>
                        <td><input type="text" style="border:1px solid #d5d5d5" name="personname" value="<?php echo ($userid>0) ? "" : $_POST['personname'];?>" id="personname"></td>
                    </tr>
                   
                    <tr>
                        <td style="font-family: arial;font-size:13px;color:#ffffff">Phone Number</td>
                        <td><input type="text" name="mobileno" id="mobileno"  value="<?php echo ($userid>0) ? "" : $_POST['mobileno'];?>" style="border:1px solid #d5d5d5"></td>
                    </tr>    
                    <tr>
                        <td style="font-family: arial;font-size:13px;color:#ffffff">Email ID</td>
                        <td><input type="text" name="emailid" id="emailid"  value="<?php echo ($userid>0) ? "" : $_POST['emailid'];?>" style="border:1px solid #d5d5d5"></td>
                    </tr>      
                    <tr>
                        <td style="font-family: arial;font-size:13px;color:#ffffff">City Name</td>
                        <td><input type="text"  name="cityname" id="cityname"  value="<?php echo ($userid>0) ? "" : $_POST['cityname'];?>" style="border:1px solid #d5d5d5"></td>
                    </tr>
                    <tr>
                        <td style="font-family: arial;font-size:13px;color:#ffffff">Pincode</td>
                        <td><input type="text"  name="pincode" id="pincode"  value="<?php echo ($userid>0) ? "" : $_POST['pincode'];?>" style="border:1px solid #d5d5d5"></td>
                    </tr>                   
                    <tr>
                        <td>&nbsp;</td>
                        <td><input type="submit" value="Register" name="registerBtn" style="border:none;padding:5px;background:#FC6C05;color:#ffffff;font-weight:bold;font-family: arial;padding-left:20px;padding-right:20px;"></td>
                    </tr>
                </table>
                </form>
        
        </td>
    </tr>
    <tr>
        <td colspan="2">
            <table cellpadding="0" cellspacing="0">
    <tr>
        <td><img src="images/list_0.png" width="250"></td>
        <td><img src="images/list_1.png" width="250"></td>
        <td><img src="images/list_2.png" width="250"></td>
        <td><img src="images/list_3.png" width="250"></td>
    </tr>   
    </table>
    </td>
    </tr>
</table>
<script>getMenuItems('freeparttimejob');</script> 