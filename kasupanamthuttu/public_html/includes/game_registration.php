<?php
                        
                        if (isset($_POST['registerBtn'])) {
                                       
                            $array = array("personname"     => trim($_POST['personname']),
                                           "gender"         => trim($_POST['gender']),
                                           "mobileno"       => trim($_POST['mobileno']),
                                           "emailid"        => trim($_POST['emailid']),
                                           "password"       => trim($_POST['password']),
                                           "StateName"       => trim($_POST['StateName']),
                                           "DistrictName"       => trim($_POST['DistrictName']),
                                           "referedby"       => isset($_SESSION['xrefference']) ? $_SESSION['xrefference'] : 0,
                                           "dateofregister" => date("Y-m-d H:i:s"));
                                           
                            if  ( (strlen(trim($_POST['personname']))>0 && ($_POST['password']==$_POST['cpassword']) ) ) {
                                $c = $mysql->select("select * from  _usertable where emailid='".trim($_POST['emailid'])."' or mobileno='".trim($_POST['mobileno'])."'");
                                if (sizeof($c)==0) {
                                    $userid = $mysql->insert("_usertable",$array);
                                    $rlink = $userid."@".getrealname($_POST['personname']);
                                    $mysql->execute("update _usertable set rlink='".$rlink."' where userid='".$userid."'");
                                    
                                        $headers = "MIME-Version: 1.0\r\n";
                                        $headers .= "From: info@kasupanamthuttu.com\r\n";
                                        $headers .= "Content-type: text/html\r\n";
                                        $headers .= "X-Mailer: PHP/".phpversion();
        
                                        $t = "Registration Completed.<br>";
                                        $t .= "Your Password : ".$_POST['password']."<br>";
                                        $t .= "Your Link : https://www.kasupanamthuttu.com/".$rlink."<br>";
                                        $t .= "Thanks<br>kasupanamthuttu Team.";
        
        
                                        mail("jeyaraj_123@yahoo.com","Your account has been activated",$t,$headers);  
                                        mail(trim($_POST['emailid']),"Your account has been activated",$t,$headers); 
                                        mail("info@kasupanamthuttu.com",trim($_POST['emailid'])."-:-Your account has been activated",$t,$headers); 
                                    echo "<div style='border-radius:5px;background:#FFFEF7;border:1px solid #EBBE01;margin:10px;padding:10px;text-align:center;font-weight:bold;color:#222'>Registration Completed.</div>";    
                                    
                                    $d = $mysql->select("select * from _usertable where userid='".$userid."' and password='".$_POST['password']."'");     
                                    
                                      $_SESSION['USER']=$d[0];   
                                   //  if (sizeof($_SESSION['cartItem'])>0) { 
                                     //echo "<script>location.href='http://www.kasupanamthuttu.com/viewCart';</script>";
                                     //} else {
                                         echo "<script>location.href='http://www.kasupanamthuttu.com/usr_mypage';</script>";  
                                     //} 
                                     
                                } else {
                                    echo "<div style='border-radius:5px;background:#FFE8E5;border:1px solid #F75742;margin:10px;padding:10px;text-align:center;font-weight:bold;color:#222'>You have already registered.</div>";
                                }
                            } else {
                                echo "<div style='border-radius:5px;background:#FFE8E5;border:1px solid #F75742;margin:10px;padding:10px;text-align:center;font-weight:bold;color:#222'>All Fields are required. <br>Password and Confrim password should be same</div>";
                            }
                            
                        }                      
                    ?> 
<form action="" method="post" target="_self" id="frmc">
                                                    <?php  if ($_SESSION['xrefference']>0) {
                            $refData = $mysql->select("select * from _usertable where userid='".$_SESSION['xrefference']."'");
                ?>
                 <div style="border:1px solid #ccc;background:#fcfcfc;padding:10px;">
            <h5 >Sponsor's Information</h5>
                
                            <b>Sponsor's ID:</b><br>
                        <?php echo $refData[0]['userid'];?><br><Br>
                    
                        <b>Sponsor's Name:</b><br>
                        <?php echo $refData[0]['personname'];?>
                  
                </div>                        
                <br>
            <?php } ?>
                                                <table style="font-family: arial;font-size:12px;border:none;background:none" align="left" cellpadding="0" cellspacing="0">
                                                    <tr>
                                                        <td style="padding:0px;color:#fff;border:none">Name</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding:0px;padding-bottom:0px;background:#fff;border:none"><input type="text" placeholder="Your Name" required  class="form-control"   name="personname" value="<?php echo $_POST['personname'];?>" id="personname"></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding:0px;color:#fff;border:none;">Gender</td>
                                                    </tr>
                                                    <tr style="background:none;">
                                                        <td style="padding:0px;padding-bottom:0px;background:none;border:none;"><select name="gender" id="gender"  class="form-control"  ><option value="Male" <?php echo ($_POST['gender']=="Male") ? 'selected="selected"' : ""; ?>>Male</option><option value="Female" <?php echo ($_POST['gender']=="Male") ? 'selected="selected"' : ""; ?>>Female</option></select></td>
                                                    </tr>    
                                                    <tr>
                                                        <td style="padding:0px;padding-bottom:0px;color:#fff;border:none;">Mobile Number</td>                                                   
                                                    </tr>
                                                    <tr>
                                                        <td style="padding:0px;padding-bottom:0px;background:none"><input type="text" placeholder="Mobile Number" required name="mobileno" id="mobileno"  value="<?php echo $_POST['mobileno'];?>"  class="form-control"  ></td>
                                                    </tr>    
                                                    <tr>
                                                        <td style="padding:0px;padding-bottom:0px;border:none;color:#fff;">Email ID</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding:0px;padding-bottom:0px;background:none"><input type="text" placeholder="Email ID" required name="emailid" id="emailid" class="form-control"  value="<?php echo $_POST['emailid'];?>"></td>
                                                    </tr>      
                                                    <tr>
                                                        <td  style="padding:0px;padding-bottom:0px;background:none">State Name</td>
                                                    </tr>
                                                    <tr>
                                                        <td  style="padding:0px;padding-bottom:0px;background:none">
                                                            <?php  $statenames=$mysql->select("select * from _statenames order by statenames"); ?>
                                                            <select id='state' name="StateName" class="form-control" onchange="$('#dis_name').html($('#_s'+$(this).val()).html())">
                                                                <option value="">Select State Name</option>
                                                                <?php foreach($statenames as $statename) { ?>
                                                                <option value="<?php echo $statename['id'];?>"   <?php echo ((($statename['id']==$_POST['statename']) || ($statename['id']==31)) ? "selected=selected" : ""); ?> ><?php echo $statename['statenames'];?></option>
                                                                <?php } ?>
                                                            </select>  
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td  style="padding:0px;padding-bottom:0px;background:none">District Name</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding:0px;padding-bottom:0px;background:none">
                                                            <div id='dis_name'>
                                                            <select name="DistrictName" class="form-control">
                                                                <option value="">Select District Name</option>
                                                            </select>  
                                                            </div>
                                                            <?php if (isset($_POST['statename'])) { ?>
                                                            <script>$('#dis_name').html($('#_s31').html());</script>
                                                            <?php } ?>
                                                        </td>
                                                    </tr>                      
                                                    <tr>
                                                        <td style="padding:0px;padding-bottom:0px;border:none;color:#fff">Password</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding:0px;padding-bottom:0px;background:none"><input type="password" placeholder="Password" required  name="password" id="password"  value="<?php echo $_POST['password'];?>"  class="form-control"  ></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding:0px;padding-bottom:0px;border:none;color:#fff">Confrim Password&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding:0px;padding-bottom:0px;background:none;"><input type="password" placeholder="Confirm Password" required name="cpassword" id="cpassword"  value="<?php echo $_POST['cpassword'];?>"  class="form-control"  ></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding:5px;padding-bottom:5px;border:none;background:none;color:#fff"> <input type="checkbox" required name="agree" id="agree" value="1" <?php echo ($_POST['agree']==1) ? 'checked="checked"' : ""; ?>> I Agree to these <a href="GamesTermsofConditions" style="color:orange">Terms & Conditions</a> </td>
                                                    </tr>  
                                                    <tr style="background:none;">
                                                        <td style="padding:0px;padding-bottom:0px;background:none;border:none">
                                                            <input type="submit" value="Register" name="registerBtn" style="border:none;padding:5px;background:#EA0E83;color:#ffffff;font-weight:bold;font-family: arial;padding-left:20px;padding-right:20px;">
                                                        </td>
                                                    </tr>
                                                </table>
                                                  </form>
                                                <?php
                                                       

    $sn = $mysql->select("select * from _statenames order by statenames");
    foreach($sn as $s) {
        echo "<div id='_s".$s['id']."' style='display:none'>";
        
        $dn = $mysql->select("select * from _districtnames where stateid=".$s['id']);
        
         echo "<select id='DistrictName' name='DistrictName' class='form-control'>";
         
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
    
    
?>
<script>
                                         $('#dis_name').html($('#_s31').html());
                                         </script>
                                                
                                          