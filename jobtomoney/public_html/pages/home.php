<?php include_once("game_clients/menu.php");?>
    <div class="line">
         <div class="row">
          <div class="col-sm-12">
            <h3>Top Winners <a href="https://www.jobtomoney.com/GameRegister" style="color:#fff" class="btn btn-success btn-sm">Register Now</a></h3>
          </div>
          <div class="col-sm-12">
          <div style="height:155px;overflow:hidden;background:#222;padding:10px">
          <?php $recods = $mysql->select("select * from _tblwinners order by id desc");?>
            <div style="width:<?php echo sizeof($recods)*150;?>px;padding-left:0px;">
                            <marquee style="margin-left:-80%;width:100%">
 
             <?php  foreach($recods as $p) { ?>
               <div style="float:left;height:135px;margin-right:15px;padding:10px;border:1px solid #ccc;background:#fff"><img  src="assets/winners/<?php echo $p['ProductPhoto'];?>" style="height:80px;margin:0px auto"><br>
              <?php echo $p['test_name'];?>
              </div>
             
             <?php } ?>
             <br><br>
        
         </marquee>
         </div>
         </div>
         </div>
         </div>
         
         
        </div>
         <div class="line">
            <div class="box margin-bottom">
               
                  <!-- CONTENT -->
                  <div class="row">
                       <div class="col-sm-8">
                   
                        <img src="assets/indx.jpeg" width="100%">
                      
         
                                  <h4>Scratch 2 Win Cash</h4>
                                    <p align="right">
                              <A href="S2W_HowToPlay" style="color:#8E1D49;font-weight:bold">How to play</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                              <A href="Offer" style="color:#8E1D49;font-weight:bold">Take Free</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                              <A href="Testimonials" style="color:#8E1D49;font-weight:bold">Testimonials</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                              <A href="Winners" style="color:#8E1D49;font-weight:bold">Winners</a> 
                              </p>
          <div class="row">
                <?php
                    $items = $mysql->select("select * from _items where auctiontype='s2w' and ispublish='1' order by itemid desc limit 0,2  ");
                    foreach($items as $item) {
                        
               
                ?>
                <div class="col-sm-6" style="overflow:hidden;background:#fff;" >
                    <div style="border:1px solid #ccc;padding:10px">
                        <table cellpadding="0" cellspacing="0" style="border:none;width:100%">
                        <tr>
                            <td style="padding-left:5px">
                                <div style="color:#666666;font-family: arial;font-size:18px;">
                                    <span class="text-success" style="font-weight:bold;"><?php echo $item['itemname'];?></span>
                                </div>
                                
                            </td>
                        </tr>
                        
                         <tr>
                                <td style="background:#fff;border:none">
                                    <img src="https://www.jobtomoney.com/assets/products/<?php echo $item['productimage']; ?>" style="width:80%;margin:0px auto">
                                </td>
                            </tr>
                        <tr>
                            <td style="padding:5px;background: #fff" >
                                <table style="margin:0px auto;border:1px solid orange">
                                    <tr>    
                                        <td style="border:none;">
                                            <div style="border:1px solid #ffffff;background:#ffffff;border-radius:5px;;font-family: arial;font-size:14px;padding:5px;text-align:center;color:#666666">
                                                <span style="font-weight:bold"><?php echo $item['bidamount'];?></span> / Seat
                                            </div>
                                        </td>
                                        <td style="border: none;text-align:right">
                                         <?php if ($percentage<100) { ?>
                                            <a href="buynow?buynow=<?php echo $item['itemid']; ?>" class="btn btn-primary" style="color:#fff"> Buy Now </a>        
                                        <?php } else { ?>
                                            Winner :  <?php echo $dealmaass->getWinnerM2W($item['itemid']);?>
                                        <?php  } ?>
                                             
                                            
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                    </div>
                </div>
                <?php } ?>
            </div>
 
  <div class="row">
                <div class="col-sm-12" style="padding-top:10px">
                    <a href="S2W_PlayGame" class="btn btn-success" style="color:#fff">View All Scratch 2 Win Cash</a>
                </div>
            </div>       
            
      <Br><br>
                   
                              <h4>Time based auction</h4>
                              <p align="right">
                              <A href="TBA_HowToPlay" style="color:#8E1D49;font-weight:bold">How to play</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                              <A href="Offer" style="color:#8E1D49;font-weight:bold">Take Free</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                              <A href="Testimonials" style="color:#8E1D49;font-weight:bold">Testimonials</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                              <A href="Winners" style="color:#8E1D49;font-weight:bold">Winners</a> 
                              </p>
                              
                               
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
                        
                        
                          
                              
                               

 
           <Br><br>
 
 
                                  <h4>Match and Win</h4>
                                    <p align="right">
                              <A href="M2W_HowToPlay" style="color:#8E1D49;font-weight:bold">How to play</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                              <A href="Offer" style="color:#8E1D49;font-weight:bold">Take Free</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                              <A href="Testimonials" style="color:#8E1D49;font-weight:bold">Testimonials</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                              <A href="Winners" style="color:#8E1D49;font-weight:bold">Winners</a> 
                              </p>
          <div class="row">
                <?php
                    $items = $mysql->select("select * from _items where auctiontype='m2w'  and ispublish='1' order by itemid desc limit 0,2  ");
                    foreach($items as $item) {
                        $bidusers = $mysql->select("select * from _bids as b where b.productid='".$item['itemid']."'   ");
                        if (sizeof($bidusers)==0) {
                            $percentage=0;
                        } else {
                            $percentage =  (sizeof($bidusers)/$item['maximumbids'])*100;
                            if ($percentage<100) {
                                $percentage = number_format(100-$percentage,2);
                            } else {
                                $percentage = 100;
                            }
                        }
               
                ?>
                <div class="col-sm-6" style="overflow:hidden;background:#fff;" >
                    <div style="border:1px solid #ccc;padding:10px">
                        <table cellpadding="0" cellspacing="0" style="border:none;width:100%">
                        <tr>
                            <td style="padding-left:5px">
                                <div style="color:#666666;font-family: arial;font-size:18px;">
                                    <span class="text-success" style="font-weight:bold;"><?php echo $item['itemname'];?></span>
                                </div>
                                
                            </td>
                        </tr>
                        <tr>
                            <td style="background: #fff"  ><div style="text-align: center;"><img src="assets/products/<?php echo $item['productimage']; ?>" width="100%" height="265"></div></td>
                        </tr>
                        <tr>
                            <td style="padding:5px;background: #fff" >
                                <table style="margin:0px auto;border:1px solid orange">
                                    <tr>    
                                        <td style="border:none;">
                                            <div style="border:1px solid #ffffff;background:#ffffff;border-radius:5px;;font-family: arial;font-size:14px;padding:5px;text-align:center;color:#666666">
                                                <span style="font-weight:bold"><?php echo $item['bidamount'];?></span> / Seat
                                            </div>
                                        </td>
                                        <td style="border: none;text-align:right">
                                         <?php if ($percentage<100) { ?>
                                            <a href="buynow?buynow=<?php echo $item['itemid']; ?>" class="btn btn-primary" style="color:#fff"> Buy Now </a>        
                                        <?php } else { ?>
                                            Winner :  <?php echo $dealmaass->getWinnerM2W($item['itemid']);?>
                                        <?php  } ?>
                                             
                                            
                                        </td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                    </table>
                    </div>
                </div>
                <?php } ?>
            </div>
 
  <div class="row">
                <div class="col-sm-12" style="padding-top:10px">
                    <a href="M2W_PlayGame" class="btn btn-success" style="color:#fff">View All Match & Win Auction</a>
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
       
       