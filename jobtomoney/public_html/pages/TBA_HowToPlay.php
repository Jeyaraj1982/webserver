 
                    
                   <?php include_once("game_clients/menu.php");?>

         <div class="line">
            <div class="box margin-bottom">
               
                  <!-- CONTENT -->
                  <div class="row">
                       <div class="col-sm-8">
                        <img src="assets/indx.jpeg" width="100%">
                              <h4>Time based auction</h4>
                              <p align="right">
                              <A href="TBA_HowToPlay" style="color:#8E1D49;font-weight:bold">How to play</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                              <A href="Offer" style="color:#8E1D49;font-weight:bold">Take Free</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                              <A href="Testimonials" style="color:#8E1D49;font-weight:bold">Testimonials</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                              <A href="Winners" style="color:#8E1D49;font-weight:bold">Winners</a> 
                              </p>
                              
                               
                        
                        
                        
                          
                              
                              <div style="padding:10px;margin:10px;border:1px solid #ccc;font-size:13px;margin-left:0px">
You must choose which of the numbers from 0.1 to 1000 is the least number. The name of the person selected will be displayed. If another person chooses the same number that you choose, your two numbers will disappear and the name of the person who recorded the next lowest number will be displayed. This is how the game
</div>

<div style="padding:10px;margin:10px;border:1px solid #ccc;font-size:13px;margin-left:0px">
   <video width="100%" height="100%" controls poster="images/aaranjudefault.jpg">
          <source src="assets/video2.mp4" type="video/mp4">
        Your browser does not support the video tag.
       </video>
</div>

<div style="padding:10px;margin:10px;border:1px solid #ccc;font-size:13px;margin-left:0px">
நீங்கள் 0.1 லிருந்து 1000 எண் வரை உள்ள எண்களில் எது குறைந்த எண்ணோ அதை தேர்வு செய்ய வேண்டும். தேர்வு செய்யும் நபரின் பெயர் காண்பிக்கப்படும். நீங்கள் தேர்வு செய்கின்ற அதே எண்ணை இன்னொரு நபரும் தேர்வு செய்தால் உங்கள் இருவரின் எண்களும் மறைந்து அடுத்த குறைவான எண்ணை யார் பதிவு செய்தார்களோ அவரின் பெயர் காண்பிக்கபடும். இப்படியே விளையாட்டு சென்று கொண்டுருக்கும். இதற்கு குறிப்பிட்ட நேரம் கொடுத்து இருக்கும். அந்த நேரம் முடிவில் யார் குறைந்த எண்ணை பதிவு செய்தார்களோ அவர்கள் பெயர் காண்பிக்க படும் அவருக்கு  அங்க கொடுக்கப்பட்டுள்ள பொருள் கொடுத்து வெற்றி பெற்றவராக அறிவிக்க படுவார்கள்.
</div>
 
 
 
     <div class="row">
                <?php
                    $items = $mysql->select("select * from _items where ispublish='1' and auctiontype='tba'  and endon >= '".date("Y-m-d H:i:s")."' limit 0,2 ");
                    foreach($items as $item) { 
                ?>   
                <div class="col-sm-6">
                    <div style="border:1px solid #ccc;padding:10px">
                        <table width="100%" cellpadding="0" cellspacing="0" style="border:none;">
                            <tr>
                                <td style="padding-left:5px;border:none">
                                    <div style="color:#666666;font-family: arial;font-size:18px;">
                                    <span class="text-success" style="font-weight:bold;"><?php echo $item['itemname'];?></span>
                                </div>
                                <div>INR <?php echo number_format($item['price'],2);?>/-</div>
                                </td>
                            </tr>
                            <tr>
                                <td style="background:#fff;border:none">
                                    <img src="assets/products/<?php echo $item['productimage']; ?>" style="width:80%;margin:0px auto">
                                </td>
                            </tr>
                            <tr>                     
                                <td style="border:none;padding:0px;">
                                    <div>&nbsp;&nbsp;Closed In</div>
                                    <table cellspacing="0" cellpadding="0"   style="border:none;">
                                        <tr>
                                            <td style="padding:2px;border:none"><div id="cBox"><span id="daysBox_<?php echo $item['itemid'];?>"  class="timeresult"></span><br><span id="ddBox_<?php echo $item['itemid'];?>" class="timecaption"></span></div></td>
                                            <td style="padding:2px;border:none"><div id="cBox"><span id="hoursBox_<?php echo $item['itemid'];?>" class="timeresult"></span><br><span id="hhBox_<?php echo $item['itemid'];?>" class="timecaption"></span></div></td>
                                            <td style="padding:2px;border:none"><div id="cBox"><span id="minsBox_<?php echo $item['itemid'];?>"  class="timeresult"></span><br><span id="mmBox_<?php echo $item['itemid'];?>" class="timecaption"></span></div></td>
                                            <td style="padding:2px;border:none"><div id="cBox"><span id="secsBox_<?php echo $item['itemid'];?>"  class="timeresult"></span><br><span id="ssBox_<?php echo $item['itemid'];?>" class="timecaption"></span></div></td> 
                                        </tr>                            
                                        <tr>
                                            <td colspan="4" style="border:none;background:#fff;padding:5px">
                                                <table width="100%" style="border:1px solid orange">
                                                    <tr style="background:#fff;">    
                                                        <td style="padding:3px;">
                                                            <div style="text-align:center;color:#666666;font-size:15px;"><?php echo $item['bidamount'];?> / Bid</div>
                                                        </td>
                                                        <td style="border:none;text-align:right;padding:3px">
                                                            <a href="buynow?buynow=<?php echo $item['itemid']; ?>" class="btn btn-primary" style="color:#fff"> Buy Now </a>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                    </table>
                                </td>
                            </tr>
                            <tr>
                                <td style="background:#f1f1f1;height:40px;border-top:1px solid #aaaaaa;font-family:arial;font-size:12px;">Current Lowest Unique bidder:
                                    <?php echo $dealmaass->GetLowestBidUserName($item['itemid']); ?>
                                </td>
                            </tr>       
                        </table>
                        <script type="text/javascript">cd('<?php echo date("m d, Y H:i:s",strtotime($item['endon']));?>','<?php echo $item['itemid'];?>');</script>
                    </div>
                </div>
                <?php } ?>
            </div>  
            
               <div class="row">
                <div class="col-sm-12" style="padding-top:10px">
                    <a href="TBA_PlayGame" class="btn btn-success" style="color:#fff">View All Time Based Auction</a>
                </div>
            </div>                            

 
 
                                                                                        
                       </div>
                       <div class="col-sm-4">
                            <table align="center" style="background: #fff;">
                                <tr>
                                    <td valign="top" style="background:url('assets/registerback.jpg');">
                                        <h3 style="color:#EA0E83;font-family:arial;border-bottom:1px solid #EA0E83;padding-bottom:5px;margin-bottom:10px;">Register <span style="color:#fff;font-size:15px;">(Free)</span></h3>
                                        <div style="font-family:arial;font-size:12px;color:#222">
                                            <?php include_once("includes/game_registration.php");?>
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
                     echo "<script>location.href='http://www.jobtomoney.com/viewCart'</script>";
                } else {
                    echo "<script>location.href='http://www.jobtomoney.com/usr_mypage'</script>";     
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

                  </div>
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
       