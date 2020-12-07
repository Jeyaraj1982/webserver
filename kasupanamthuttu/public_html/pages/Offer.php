
<?php
                        
                        if (isset($_POST['registerBtn'])) {
                            
                            $array = array("personname"     => trim($_POST['personname']),
                                           "gender"         => trim($_POST['gender']),
                                           "mobileno"       => trim($_POST['mobileno']),
                                           "emailid"        => trim($_POST['emailid']),
                                           "password"       => trim($_POST['password']),
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
                                     if (sizeof($_SESSION['cartItem'])>0) { 
                                     echo "<script>location.href='http://www.kasupanamthuttu.com/viewCart';</script>";
                                     } else {
                                         echo "<script>location.href='http://www.kasupanamthuttu.com/usr_mypage';</script>";  
                                     }
                                     
                                } else {
                                    echo "<div style='border-radius:5px;background:#FFE8E5;border:1px solid #F75742;margin:10px;padding:10px;text-align:center;font-weight:bold;color:#222'>You have already registered.</div>";
                                }
                            } else {
                                echo "<div style='border-radius:5px;background:#FFE8E5;border:1px solid #F75742;margin:10px;padding:10px;text-align:center;font-weight:bold;color:#222'>All Fields are required. <br>Password and Confrim password should be same</div>";
                            }
                            
                        }   
                    ?> 
                    
                   <?php include_once("game_clients/menu.php");?>

         <div class="line">
            <div class="box margin-bottom">
               
                  <!-- CONTENT -->
                  <div class="row">
                       <div class="col-sm-8">            
                          <h4>Offer</h4>
                          <p style="text-align: center;font-size:30px;color:#A82062;">No Loss Scheme</p>
<!--                          <p> If you choose  any one and pay for it, you will have that item and money in your wallet. So you can play and win without losing 1 rupee.</p>
                          <p> Refer Your Friend You Will Get Rs 400)  </p>--> 
                          <div style="padding:20px">
                          
                         
                          
                          <img src="assets/Screenshot_2020_0518_185111.png">
                          <img src="assets/Screenshot_2020_0520_163802.png">
                         <!-- <img src="assets/Screenshot_2020_0520_162157.png">
                          <img src="assets/Screenshot_2020_0520_161822.png">
                          <img src="assets/Screenshot_2020_0520_162404.png">-->
                          
                          <div class="row">
                 <?php
                 if (isset($_POST['buyNowBtn'])) {
                     $cpoints = $dealmaass->getPoints($_SESSION['USER']['userid']);
                      $product = $mysql->select("select * from _tbl_offers where id='".$_POST['pid']."'");
                     if ($product[0]['points']<=$cpoints) {
                         $mysql->insert("_tblPoints",array("userid"=>$_SESSION['USER']['userid'],
                                                           "TxnDate"=>date("Y-m-d H:i:s"),
                                                           "Particulars"=>"Get Product /".$_POST['pid'],
                                                           "Credits"=>"0",
                                                           "Debits"=>$product[0]['points'],
                                                           "Balance"=> $cpoints-$product[0]['points'])); 
                         $mysql->insert("_tbl_offers_requested",array("userid"=>$_SESSION['USER']['userid'],
                                                           "RequestedOn"=>date("Y-m-d H:i:s"),
                                                           "OfferID"=>$product[0]['id'],
                                                           "points"=>$product[0]['points']));
                         echo "Product Reqeust submitted";
                     }
                 }
                    $points =  ($_SESSION['USER']['userid']>0) ?  $dealmaass->getPoints($_SESSION['USER']['userid']) : 0;  
                    $products = $mysql->select("select * from _tbl_offers order by points");
                    foreach($products as $p) {
                        ?>
                        <div class="col-sm-6" style="margin-bottom:15px">
                            <div style="border:1px solid #ccc;padding:10px">
                                <img src="assets/offers/<?php echo $p['photopath'];?>" style="width: 100%;">
                                <br>
                               <span style="font-size:12px"> Required Points: <span style="font-size:35px;"><?php echo $p['points'];?></span></span><br><Br>
                                <?php if ($_SESSION['USER']['userid']>0) {?>
                                <br>
                                My Points : <?php echo $points; ?><br><Br>
                                <?php if ($p['points']<=$points) { ?>
                                    <form action="" method="post">  
                                        <input type="hidden" value="<?php echo $p['id'];?>" name="pid">
                                     <input type="submit" value="Buy Now" name="buyNowBtn" class="btn btn-success btn-sm">
                                     </form>
                                <?php } else { ?>
                                     <input type="submit" value="Buy Now"  class="btn btn-secondary btn-sm" disabled>
                                <?php } ?>
                                <?php }  else {?>
                                    <input type="button" value="Buy Now"   class="btn btn-primary btn-sm" onclick="location.href='https://kasupanamthuttu.com/GameRegister'">
                                <?php } ?>
                            </div>
                        </div>
                        <?php
                    }
                 ?>
                </div> 
                          
                          
                          
                          
                          </div>
                       </div>  
                       <div class="col-sm-4">
                            <table align="center" style="background: #fff;">
                                <tr>
                                    <td valign="top" style="background:url('assets/registerback.jpg');">
                                        <h3 style="color:#EA0E83;font-family:arial;border-bottom:1px solid #EA0E83;padding-bottom:5px;margin-bottom:10px;">Register <span style="color:#fff;font-size:15px;">(Free)</span></h3>
                                        <div style="font-family:arial;font-size:12px;color:#222">
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
                                                        <td style="padding:0px;padding-bottom:0px;background:#fff;border:none"><input type="text" placeholder="Your Name" required style="padding:5px 10px;width:100%;border:1px solid #d5d5d5" name="personname" value="<?php echo $_POST['personname'];?>" id="personname"></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding:0px;color:#fff;border:none;">Gender</td>
                                                    </tr>
                                                    <tr style="background:none;">
                                                        <td style="padding:0px;padding-bottom:0px;background:none;border:none;"><select name="gender" id="gender" style="border:1px solid #d5d5d5"><option value="Male" <?php echo ($_POST['gender']=="Male") ? 'selected="selected"' : ""; ?>>Male</option><option value="Female" <?php echo ($_POST['gender']=="Male") ? 'selected="selected"' : ""; ?>>Female</option></select></td>
                                                    </tr>    
                                                    <tr>
                                                        <td style="padding:0px;padding-bottom:0px;color:#fff;border:none;">Mobile Number</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding:0px;padding-bottom:0px;background:none"><input type="text" placeholder="Mobile Number" required name="mobileno" id="mobileno"  value="<?php echo $_POST['mobileno'];?>" style="padding:5px 10px;width:100%;border:1px solid #d5d5d5"></td>
                                                    </tr>    
                                                    <tr>
                                                        <td style="padding:0px;padding-bottom:0px;border:none;color:#fff;">Email ID</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding:0px;padding-bottom:0px;background:none"><input type="text" placeholder="Email ID" required name="emailid" id="emailid"  value="<?php echo $_POST['emailid'];?>" style="padding:5px 10px;width:100%;border:1px solid #d5d5d5"></td>
                                                    </tr>      
                                                    <tr>
                                                        <td style="padding:0px;padding-bottom:0px;border:none;color:#fff">Password</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding:0px;padding-bottom:0px;background:none"><input type="password" placeholder="Password" required  name="password" id="password"  value="<?php echo $_POST['password'];?>" style="padding:5px 10px;width:100%;border:1px solid #d5d5d5"></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding:0px;padding-bottom:0px;border:none;color:#fff">Confrim Password&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding:0px;padding-bottom:0px;background:none;"><input type="password" placeholder="Confirm Password" required name="cpassword" id="cpassword"  value="<?php echo $_POST['cpassword'];?>" style="padding:5px 10px;width:100%;border:1px solid #d5d5d5"></td>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding:5px;padding-bottom:5px;border:none;background:none;color:#fff"> <input type="checkbox" required name="agree" id="agree" value="1" <?php echo ($_POST['agree']==1) ? 'checked="checked"' : ""; ?>> I Agree to these Terms & Conditions </td>
                                                    </tr>  
                                                    <tr style="background:none;">
                                                        <td style="padding:0px;padding-bottom:0px;background:none;border:none">
                                                            <input type="submit" value="Register" name="registerBtn" style="border:none;padding:5px;background:#EA0E83;color:#ffffff;font-weight:bold;font-family: arial;padding-left:20px;padding-right:20px;">
                                                        </td>
                                                    </tr>
                                                </table>
                                            </form>
                                        </div>                  
        </td>
        
</tr>
<tr>
    <td>
      <h3 style="color:#EA0E83;font-family:arial;border-bottom:1px solid #EA0E83;padding-bottom:5px;margin-bottom:10px;">Login</h3>
            <?php
     if (isset($_POST['loginBtn'])) {
         $d = $mysql->select("select * from _usertable where emailid='".$_POST['emailid']."' and password='".$_POST['password']."'");
                            
         if (sizeof($d)>0) {
               $_SESSION['USER']=$d[0];
                if (sizeof($_SESSION['cartItem'])>0) {   
                     echo "<script>location.href='http://www.kasupanamthuttu.com/viewCart'</script>";
                } else {
                    echo "<script>location.href='http://www.kasupanamthuttu.com/usr_mypage'</script>";     
                }
                
               
         }   else {
             $msg = "invalid login details";
         }
                            
                        }   
?>
            <div style="font-family:arial;font-size:12px;color:#222">
            
                <form action="" method="post" target="_self">
                    <table style="font-family: arial;font-size:12px;border:none;" align="left" cellpadding="0" cellspacing="0">
    <tr>
        <td style="background:#F0F0F0;padding:0px;border:none;">Email ID</td>
    </tr>
    <tr>
        <td style="background:#F0F0F0;padding:0px;border:none;"><input placeholder="Email ID"  value="<?php echo $_POST['emailid'];?>" name="emailid" required type="text" style="padding:5px 10px;width:100%;border:1px solid #d5d5d5"></td>
    </tr>
    <tr>
        <td style="background:#F0F0F0;padding:0px;border:none;">Password</td>
    </tr>
    <tr>
        <td style="background:#F0F0F0;padding:0px;border:none;"><input placeholder="Password" value="<?php echo $_POST['password'];?>" name="password" required type="password" style="padding:5px 10px;width:100%;border:1px solid #d5d5d5"></td>
    </tr>
    <tr>
     
        <td style="background:#F0F0F0;padding:10px;padding-left:0px;border:none;"><input name="loginBtn" type="submit" value="  Login  " style="border:none;padding:5px;background:#EA0E83;color:#ffffff;font-weight:bold;font-family: arial;padding-left:20px;padding-right:20px;">
        
         <?php
        if (isset($msg)) {
            ?>
            <span style="color:red">&nbsp;&nbsp;  <?php echo $msg; ?> </span>
               
            <?php
        }
?>
        </td>
    </tr>
   
</table>
</form>
</div>
    </td>
</tr>
</table>
                       </div>

                  </article>
                  <!-- ASIDE NAV -->
               <!--   <div class="s-12 m-5 l-4">
                     <h3>Navigation</h3>
                     <div class="aside-nav">
                        <ul>
                           <li><a>Home</a></li>
                           <li>
                              <a>Product</a>
                              <ul>
                                 <li><a>Product 1</a></li>
                                 <li><a>Product 2</a></li>
                                 <li>
                                    <a>Product 3</a>
                                    <ul>
                                       <li><a>Product 3-1</a></li>
                                       <li><a>Product 3-2</a></li>
                                       <li><a>Product 3-3</a></li>
                                    </ul>
                                 </li>
                              </ul>
                           </li>
                           <li>
                              <a>Company</a>
                              <ul>
                                 <li><a>About</a></li>
                                 <li><a>Location</a></li>
                              </ul>
                           </li>
                           <li><a>Contact</a></li>
                        </ul>
                     </div>
                  </div> -->
              
            </div>
         </div>
       