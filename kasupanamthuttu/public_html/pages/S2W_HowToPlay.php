
  
                    
                   <?php include_once("game_clients/menu.php");?>

         <div class="line">
            <div class="box margin-bottom">
               
                  <!-- CONTENT -->
                  <div class="row">
                       <div class="col-sm-8">
                        <img src="assets/indx.jpeg" width="100%">
                              <h4>Scratch 2 Win Cash</h4>
                              <p align="right">
                              <A href="S2W_HowToPlay" style="color:#8E1D49;font-weight:bold">How to play</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                              <A href="Testimonials" style="color:#8E1D49;font-weight:bold">Testimonials</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                              <A href="Winners" style="color:#8E1D49;font-weight:bold">Winners</a> 
                              </p>
                              
                               
                        

<div style="padding:10px;margin:10px;border:1px solid #ccc;font-size:13px;margin-left:0px">
   <video width="100%" height="100%" controls poster="images/aaranjudefault.jpg">
          <source src="assets/video3.mp4" type="video/mp4">
        Your browser does not support the video tag.
       </video>
</div>

 
 
 
      <div class="row">
                <?php
                    $items = $mysql->select("select * from _items where auctiontype='s2w'  and ispublish='1'  order by itemid desc limit 0,2  ");
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
                                    <img src="assets/products/<?php echo $item['productimage']; ?>" style="width:80%;margin:0px auto">
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
                    <a href="S2W_PlayGame" class="btn btn-success" style="color:#fff">View All Scratch 2 Win </a>
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
       