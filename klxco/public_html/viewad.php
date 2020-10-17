<?php
    include_once("config.php"); 
    
    
    $q = explode("-",$_GET['a']);
    $adID = $q[0];
    $d = JPostads::getAd($adID,isset($_SESSION['USER']['userid']) ? $_SESSION['USER']['userid'] : 0);
    $filename = ((strlen(trim($d[0]['filepath1']))>4) && file_exists("assets/".$config['thumb'].$d[0]['filepath1'])) ? "assets/".$config['thumb'].$d[0]['filepath1'] : "assets/cms/".Jca::getAppSetting('noimage');
    $t = "";
    foreach(explode(" ",$d[0]['title']) as $x) {
        if (trim($x)!="") {
            $x = str_replace(array(","),"",trim($x));
           $t.=trim($x); 
        }
        $t.="-";
    }
   $t .= $d[0]['postadid']; 
   
   if($_SESSION['USER']['userid']>0){
       $viewbyuserid=$_SESSION['USER']['userid'];
   } else {
       $viewbyuserid="0";
   }
   
       $viewlog = $mysql->insert("_tbl_view_add_logs",array("AddID"           => $d[0]['postadid'],
                                                            "AddByUserID"     => $d[0]['postedby'],
                                                            "ViewedOn"        => date("Y-m-d H:i:s"),
                                                            "ViewedByUserID"  => $viewbyuserid));  
   
   $postedByInfo = $mysql->select("select * from _jusertable where userid='".$d[0]['postedby']."'");
   
   $ad = $d;
   
  $share=true; 
include_once("header.php");
  if($_SESSION['USER']['userid']>0){
   
      $logview = $mysql->select("select * from _tbl_view_add_logs where AddID='".$d[0]['postadid']."' and ViewedByUserID='".$_SESSION['USER']['userid']."'"); 
   //   $chatroom = $mysql->select("select * from _chat_initiate where adID='".$adID."'  and adPosted='".$d[0]["postedby"]."'  and adViewed='".$_SESSION['USER']['userid']."' ");
      //  <a href="'.path_url.'chat/room/'.md5("j2jsoftwaresolutoins_".$chatroom[0]['ChatID']).'" style="font-size:16px;font-family:Poppins,sans-serif;font-weight:600;color:#3a77ff;text-decoration:none;background-color:#ffffff;border-top:12px solid #3a77ff;border-bottom:12px solid #3a77ff;border-left:36px solid #3a77ff;border-right:36px solid #3a77ff;display:inline-block">CHAT</a>
      if(sizeof($logview)==1){
         $message = '
                    <div style="padding:45px;background:#e5e5e5;margin:20px;border-radius:10px;padding-top:20px;">
                        <div style="text-align:center;padding-bottom:20px;">
                            <img src="https://www.klx.co.in/assets/cms/klx_log.png" style="height:30px;">&nbsp;&nbsp;
                            <img src="https://www.klx.co.in/assets/img/in.png" style="height:24px;border:1px solid #eee;border-radius:3px;">
                        </div>
                        <div style="border:0px solid black;text-align:left;padding:30px;background:white;border-radius:10px;">
                            Hello,
                            <br><br>
                            Your ad is viewed by '.$_SESSION['USER']['personname'].'
                            <br><br>
                            <table>
                                <tr>
                                    <td>
                                        <div style="border:1px solid #ccc;padding:20px;text-align:center;width: 100px;height: 100px;">
                                            <img src="'.base_url.$filename.'" style="width: 100px;height: 100px;"><br><br>
                                            <b><span style="font-size:15px;">AD : '.$d[0]['postadid'].'</span></b><br>
                                        </div><br><br>
                                            Viewed By : <br>
                                            '.$_SESSION['USER']['personname'].'<br>
                                            '.$_SESSION['USER']['mobile'].'<br>
                                            '.$_SESSION['USER']['email'].'<br><br><br>
                                    </td>
                                    <td style="vertical-align:top;padding-left:10px">
                                        <b><span style="font-size:20px;">'.$d[0]['title'].'</span></b><br>
                                        '.substr($d[0]['content'],0,200).'...
                                    </td>
                                </tr>
                            </table>
                            <p style="text-align:center">
                                <a href="'.path_url.'v'.$d[0]['postadid'].'-'.$d[0]['title'].'" style="font-size:16px;font-family:Poppins,sans-serif;font-weight:600;color:#ffffff;text-decoration:none;background-color:#3a77ff;border-top:12px solid #3a77ff;border-bottom:12px solid #3a77ff;border-left:36px solid #3a77ff;border-right:36px solid #3a77ff;display:inline-block">VIEW AD</a>&nbsp;&nbsp;
                            </p>             
                            <br> 
                            Thanks <br>
                            KLX Team
                        </div>
                    </div>';

                    $mparam['MailTo']=$postedByInfo[0]['email'];
                    $mparam['MemberID']=$postedByInfo[0]['userid'];
                    $mparam['Subject']="KLX :) Your ad is viewed by ".$_SESSION['USER']['personname'];
                    $mparam['Message']=$message;
                    MailController::Send($mparam,$mailError);    
      }
      
  }else {
      
      $logview = $mysql->select("select * from _tbl_view_add_logs where AddID='".$d[0]['postadid']."' and ViewedByUserID='0'"); 
      if(sizeof($logview)==1){
      $message = '
                    <div style="padding:45px;background:#e5e5e5;margin:20px;border-radius:10px;padding-top:20px;">
                        <div style="text-align:center;padding-bottom:20px;">
                            <img src="https://www.klx.co.in/assets/cms/klx_log.png" style="height:30px;">&nbsp;&nbsp;
                            <img src="https://www.klx.co.in/assets/img/in.png" style="height:24px;border:1px solid #eee;border-radius:3px;">
                        </div>
                        <div style="border:0px solid black;text-align:left;padding:30px;background:white;border-radius:10px;">
                            Hello,
                            <br><br>
                            Your ad is viewed by unknown person:
                            <br><br>
                            
                            <table>
                                <tr>
                                    <td>
                                        <div style="border:1px solid #ccc;padding:20px;text-align:center;width: 100px;height: 100px;">
                                            <img src="'.base_url.$filename.'" style="width: 100px;height: 100px;"><br><br>
                                            <b><span style="font-size:15px;">AD : '.$d[0]['postadid'].'</span></b>
                                        </div>
                                    </td>
                                    <td style="vertical-align:top;padding-left:10px">
                                        <b><span style="font-size:20px;">'.$d[0]['title'].'</span></b><br>
                                        '.substr($d[0]['content'],0,200).'...
                                    </td>
                                </tr>
                            </table>
                            <p style="text-align:center">
                                <a href="'.path_url.'v'.$d[0]['postadid'].'-'.$d[0]['title'].'" style="font-size:16px;font-family:Poppins,sans-serif;font-weight:600;color:#ffffff;text-decoration:none;background-color:#3a77ff;border-top:12px solid #3a77ff;border-bottom:12px solid #3a77ff;border-left:36px solid #3a77ff;border-right:36px solid #3a77ff;display:inline-block">VIEW AD</a>
                            </p>               
                            <br> 
                            Thanks <br>
                            KLX Team
                        </div>
                    </div>';

                    $mparam['MailTo']=$postedByInfo[0]['email'];
                    $mparam['MemberID']=$postedByInfo[0]['userid'];
                    $mparam['Subject']="KLX :) Your ad is viewed by unknown person";
                    $mparam['Message']=$message;
                    MailController::Send($mparam,$mailError);        
      }
  }
   
?>
    <div class="main-panel" style="width: 100%;height:auto !important">
        <div class="container" style="margin-top:0px;">
            <div class="page-inner">
            <a class="btn btn-outline-primary btn-sm" style="width:50px;" href="<?php echo country_url;?>">Back</a><br><br>
            <?php // include_once("includes/searchform.php");?>
                <div class="page-header">
                 
                    <ul class="breadcrumbs" style="border:none;margin-left:0px;padding-left:0px;">
                            <li class="nav-home">
                                <a href="<?php echo country_url;?>">
                                    <i class="flaticon-home"></i>
                                </a>
                            </li>                                                                 
                            <li class="separator">
                                <i class="flaticon-right-arrow"></i>
                            </li>
                            <li class="nav-item">
                                <a href="<?php echo country_url."sc".$d[0]['categid']."-".$d[0]['categname'];?>"><?php echo $d[0]['categname'];?></a>
                            </li>
                            <li class="separator">
                                <i class="flaticon-right-arrow"></i>
                            </li>                                                                       
                            <li class="nav-item">
                                <a href="<?php echo country_url."viewads/sc".$d[0]['subcateid']."-".$d[0]['subcatename'];?>"><?php echo $d[0]['subcatename'];?></a>
                            </li>
                        </ul>
                </div>           
                <div class="row">                                                     
                    <div class="col-md-12">
                        <div class="card">                                                               
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-md-11">
                                        <h4><?php echo $d[0]['title'];?></h4>
                                    </div>
                                    <div class="col-md-1" style="text-align: right;padding:10px;">
                                        <?php 
                                            $dup = $mysql->select("select * from _jfeatures_likedcontact where userid='".$_SESSION['USER']['userid']."' and adid='".$d[0]['postadid']."'");
                                            if (sizeof($dup)==0) {                                                          
                                        ?>
                                            <span style="float:right;cursor:pointer"  onclick="likead('<?php echo md5($d[0]['postadid']."jEyArAj[at]DeVeLoPeR");?>')"><i class="flaticon-like"></i></span>
                                        <?php }else { ?>
                                             <span style="float:right;color:red;cursor:pointer" onclick="likead('<?php echo md5($d[0]['postadid']."jEyArAj[at]DeVeLoPeR");?>')"><i class="fas fa-heart"></i></span>  
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>                          
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div style="border:1px solid #ccc;padding:20px;text-align:center">
                                        <img src='<?php echo base_url.$filename;?>' style='width:60%'>  <br><br>
                                    
                                        <?php
                                       if ($ad[0]['filepath2']!="") {
                                    ?>
                                      <img class="card-img-top rounded" onclick="onClick(this)" src="<?php echo base_url."assets/".$config['thumb'].$ad[0]['filepath2'];?>" style="height:100px;width:auto">
                                    <?php
                                }
                                
                                 if ($ad[0]['filepath3']!="") {
                                    ?>
                                      <img class="card-img-top rounded" onclick="onClick(this)" src="<?php echo base_url."assets/".$config['thumb'].$ad[0]['filepath3'];?>" style="height:100px;width:auto">
                                    <?php
                                }
                                
                                 if ($ad[0]['filepath4']!="") {
                                    ?>
                                      <img class="card-img-top rounded" onclick="onClick(this)" src="<?php echo base_url."assets/".$config['thumb'].$ad[0]['filepath4'];?>" style="height:100px;width:auto">
                                    <?php
                                }                                                       
                                
                                 if ($ad[0]['filepath5']!="") {
                                    ?>
                                      <img class="card-img-top rounded" onclick="onClick(this)" src="<?php echo base_url."assets/".$config['thumb'].$ad[0]['filepath5'];?>" style="height:100px;width:auto">
                                    <?php
                                }
                                
                                 if ($ad[0]['filepath6']!="") {
                                    ?>
                                      <img class="card-img-top rounded" onclick="onClick(this)" src="<?php echo base_url."assets/".$config['thumb'].$ad[0]['filepath6'];?>" style="height:100px;width:auto">
                                    <?php
                                }
                            ?>
                                        </div>
                                        
                                   
                                    </div>           
                                    <div class="col-md-4">
                                        <div>
                                            <div class="col-md-12">
                                            <?php
                                                                                                                                                                                                                                                   
                                            ?>
                                            <div style="padding-bottom:10px">
                                            <br><Br>
                                            <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo   (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://".$_SERVER[HTTP_HOST].$_SERVER[REQUEST_URI];?>" target="_blank"><img src="https://www.klx.co.in/assets/facebook.png" style="width:32px"></a>
                                            &nbsp;&nbsp;&nbsp;
                                            <a href="https://www.twitter.com/share?text=<?php echo $d[0]['title'];?>&url=<?php echo  (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://".$_SERVER[HTTP_HOST].$_SERVER[REQUEST_URI];?>" target="_blank"> <img src="https://www.klx.co.in/assets/twitter.png"  style="width:32px"></a>
                                            &nbsp;&nbsp;&nbsp;
                                            <a href="https://api.whatsapp.com/send?text=<?php echo  (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://".$_SERVER[HTTP_HOST].$_SERVER[REQUEST_URI];?>" target="_blank"> <img src="https://www.klx.co.in/assets/whatsapp.png"  style="width:32px"></a> 
                                            &nbsp;&nbsp;
                                            
                                            </div>
                                            
                                            </div>
                                            <div class="col-md-12" style="border:1px solid #ccc;padding:20px;padding-bottom:5px;">
                                             <?php
                               if ($d[0]['categid']==5) {
                               ?>
                               <h3 class="mb-0 fw-bold">Salary : ₹ <?php echo $d[0]['SalaryFrom'];?> - ₹ <?php echo $d[0]['salaryTo'];?></h3>
                               <?php    
                               } else {
                        ?>
                            <h3 class="mb-0 fw-bold">₹ <?php echo $d[0]['amount'];?></h3>
                            <?php } ?>
                                           
                                               <br>
                                               <span style='color:#999;font-weight:normall;'>Posted: <?php echo $d[0]["postedon"];?></span>
                                            </div>                 
                                             <div class="col-md-12" style="font-weight:bold;padding-left:0px;padding-top:3px;">
                                               Ad ID: <?php echo $d[0]['postadid'];?>
                                            </div>
                                              <div class="col-md-12" style="border:1px solid #ccc;margin-top:20px;padding:20px;padding-top:10px;padding-bottom:10px;">
                                              <h3 style="margin-bottom:15px">Seller description</h3> 
                                              <div id="xx">
                                              
                                    <?php
                                  //  define('SECONDS_PER_DAY', 86400);
                                  //echo $t; 
                                  $start = strtotime($d[0]['viewedContact']['viewed']);
                                  $end = strtotime(date("Y-m-d"));
                                  $days_between = ceil(abs($start-$end) / 86400);             
                                  if ($days_between<=1) {
                                      $days_between = date("M d, Y H:i",$start); //$d[0]['viewedContact']['viewed']
                                  } else {
                                      $days_between .= " days ago";
                                  }
                                    //date("M d,Y H:i",strtotime($d[0]['viewedContact']['viewed']))
                                      
                                    ?>
                                    <?php if (isset($_SESSION['USER']['userid']) && $_SESSION['USER']['userid']>0) { ?>
                                    
                                    <table>
                                        <tr>
                                            <td style="width:50px">
                                               <img src="https://www.klx.co.in/assets/user.png" style="height:48px"> 
                                            </td>
                                            <td style="line-height: 15px;padding-left:10px;">
                                               <?php
                                                  $posted_user_info = $mysql->select("select * from _jusertable where userid='".$d[0]['postedby']."'");
                                                  echo "<span style='font-size:17px;'>".ucwords($posted_user_info[0]['personname'])."<br></span>";
                                                  echo "<span style='color:#999;font-size:12px;' >Member since ".date("M Y",strtotime($posted_user_info[0]['createdon']))."</span>";
                                                  
                                                  //print_r($posted_user_info);
                                               ?>
                                            </td>
                                        </tr>
                                    </table>
                                     <?php 
            $chatroom = $mysql->select("select * from _chat_initiate where adID='".$adID."'  and adPosted='".$d[0]["postedby"]."'  and adViewed='".$_SESSION['USER']['userid']."' ");
            if (sizeof($chatroom)>0)    {
        ?>
                                        <input type="button" class="btn btn-primary" onclick="Chat('<?php echo md5($adID."jEyArAj[at]DeVeLoPeR");?>')"  style="width:100%;margin-bottom:10px;font-weight:bold;padding:5px;margin-top:10px;"  value="CONTINUE CHAT">
        <?php
            } else {
        ?>
         <input type="button" class="btn btn-outline-primary" onclick="Chat('<?php echo md5($adID."jEyArAj[at]DeVeLoPeR");?>')"  style="width:100%;margin-bottom:10px;font-weight:bold;padding:5px;margin-top:10px;"  value="CHAT WITH SELLER">
        <?php
            }
         ?>
                                         <div id="contactinfo">
                                        <?php
                                              if (sizeof($d[0]['viewedContact'])>0) {
                                                 // ."<br>viewed: ".$days_between
                                            echo  "<div style='border:1px solid #ccc;padding:20px;background:#fcfce5;border-radius:5px'>email: ".$d[0]['viewedContact']['email']
                                                    ."<br>mobile: ".$d[0]['viewedContact']['mobile']
                                                   
                                                    ."</div>";
                                        } else {
                                         ?>
                                        <input type="button" class="btn btn-primary" onclick="requestToViewAdContact('<?php echo md5($adID."jEyArAj[at]DeVeLoPeR");?>')" name="viewContact" style="width:100%;margin-bottom:10px;font-weight:bold;padding:5px;margin-top:5px;"  value="SELLER INFORMATION">
                                        <?php
                                        }
                                         ?>
                                        </div>
                                    <?php } else { ?>
                                        <input type="button" class="btn btn-primary" onclick="requestToViewAdContact(0)" name="viewContact" value="View Contact Information">
                                    <?php } ?>
                                   
                                    </div>
                                              </div>
                                              
                                              <div class="col-md-12" style="border:1px solid #ccc;margin-top:20px;padding:20px;padding-top:10px;padding-bottom:10px;">
                                              <h3 style="margin-bottom:15px">Additional Information</h3> 
                                              
                                              <?php if ($d[0]['brandid']>0) { ?>
                                              <?php $brand = $mysql->select("select * from _jbrandnames where brandid='".$d[0]['brandid']."'"); ?>
                                              <div class="row">
                                                    <div  class="col-4">Brand</div>
                                                    <div  class="col-8">:&nbsp;<?php echo $brand[0]['brandname'] ;?></div>
                                               </div>
                                              <?php } ?>
                                              
                                              <?php if ($d[0]['Model']!="0") { ?>
                                              <?php $modal = $mysql->select("select * from _JModels where ModelID='".$d[0]['Model']."'  order by model"); ?>
                                              <div class="row">
                                                    <div  class="col-4">Model</div>
                                                    <div  class="col-8">:&nbsp;<?php echo $modal[0]['model'];?></div>
                                              </div>
                                              <?php } ?>
                                               <?php if ($d[0]['Year']!="0") { ?>
                                              <div class="row">
                                                    <div  class="col-4">Year</div>
                                                    <div  class="col-8">:&nbsp;<?php echo $d[0]['Year'];?></div>
                                               </div>
                                              <?php } ?>
                                              <?php if ($d[0]['Fuel']!="0") { ?>
                                              <div class="row">
                                                    <div  class="col-4">Fuel</div>
                                                    <div  class="col-8">:&nbsp;<?php echo $d[0]['Fuel'];?></div>
                                               </div>
                                              <?php } ?>
                                              
                                              <?php if ($d[0]['KMDriven']!="0") { ?>
                                              <div class="row">
                                                    <div  class="col-4">KM Driven</div>
                                                    <div  class="col-8">:&nbsp;<?php echo $d[0]['KMDriven'];?></div>
                                              </div>
                                              <?php } ?>
                                                                                   
                                              <?php if ($d[0]['NoofOwners']!="0") { ?>
                                              <div class="row">
                                                <div  class="col-4">Number of Owner</div>
                                                <div  class="col-8">:&nbsp;<?php echo $d[0]['NoofOwners'];?></div>
                                              </div>
                                              <?php } ?>
                                              
                                              <?php if ($d[0]['Transmission']!="0") { ?>
                                              <div class="row">
                                                <div  class="col-4">Transmission</div>
                                                <div  class="col-8">:&nbsp;<?php echo $d[0]['Transmission'];?></div>
                                              </div>
                                              <?php } ?>
                                              
                                              <?php if ($d[0]['Mtype']!="0") { ?>
                                              <div class="row">
                                                <div  class="col-4">Type</div>
                                                <div  class="col-8">:&nbsp;<?php echo $d[0]['Mtype'];?></div>
                                              </div>
                                              <?php } ?>
                                              
                                              <?php if ($d[0]['BedRooms']>0) { ?>
                                              <div class="row">
                                                <div  class="col-4">Bedrooms</div>
                                                <div  class="col-8">:&nbsp;<?php echo $d[0]['BedRooms'];?></div>
                                              </div>
                                              <?php } ?>
                                              
                                              <?php if ($d[0]['BathRooms']>0) { ?>
                                              <div class="row">
                                                <div  class="col-4">Bathrooms</div>
                                                <div  class="col-8">:&nbsp;<?php echo $d[0]['BathRooms'];?></div>
                                              </div>
                                              <?php } ?>
                                              
                                              <?php if (strlen($d[0]['Furnishing'])>2) { ?>
                                              <div class="row">
                                                <div  class="col-4">Furnishing</div>
                                                <div  class="col-8">:&nbsp;<?php echo $d[0]['Furnishing'];?></div>
                                              </div>
                                              <?php } ?>
                                              <?php if (strlen($d[0]['ConstructionStatus'])>2) { ?>
                                              <div class="row">
                                                <div  class="col-4">Construction Status</div>
                                                <div  class="col-8">:&nbsp;<?php echo $d[0]['ConstructionStatus'];?></div>
                                              </div>
                                              <?php } ?>
                                              
                                              <?php if (strlen($d[0]['ListedBy'])>2) { ?>
                                              <div class="row">
                                                <div  class="col-4">ListedBy</div>
                                                <div  class="col-8">:&nbsp;<?php echo $d[0]['ListedBy'];?></div>
                                              </div>
                                              <?php } ?>
                                              
                                              <?php if ($d[0]['PlotArea']!="0") { ?>
                                              <div class="row">
                                                <div  class="col-4">Plot Area</div>
                                                <div  class="col-8">:&nbsp;<?php echo $d[0]['PlotArea'];?></div>
                                              </div>
                                              <?php } ?>
                                              <?php if ($d[0]['SuperBuildUpArea']!="0") { ?>
                                              <div class="row">
                                                <div  class="col-4">Super Build Up Area (ft)</div>
                                                <div  class="col-8">:&nbsp;<?php echo $d[0]['SuperBuildUpArea'];?></div>
                                              </div>
                                              <?php } ?>
                                              
                                              <?php if ($d[0]['CarpetArea']!="0") { ?>
                                              <div class="row">
                                                <div  class="col-4">Carpet Area (ft)</div>
                                                <div  class="col-8">:&nbsp;<?php echo $d[0]['CarpetArea'];?></div>
                                              </div>
                                              <?php } ?>
                                              
                                              <?php if (strlen($d[0]['BachelorsAllowed'])>2) { ?>
                                              <div class="row">
                                                <div  class="col-4">Bachelors Allowed</div>
                                                <div  class="col-8">:&nbsp;<?php echo $d[0]['BachelorsAllowed'];?></div>
                                              </div>
                                              <?php } ?>
                                              
                                              <?php if($d[0]['Maintenance']!="0") { ?>
                                              <div class="row">
                                                <div  class="col-4">Maintenance</div>
                                                <div  class="col-8">:&nbsp;<?php echo $d[0]['Maintenance'];?></div>
                                              </div>
                                              <?php } ?>
                                              <?php if ($d[0]['TotalFloors']>0) { ?>
                                              <div class="row">
                                                <div  class="col-4">Total Floors</div>
                                                <div  class="col-8">:&nbsp;<?php echo $d[0]['TotalFloors'];?></div>
                                              </div>
                                              <?php } ?>
                                              <?php if ($d[0]['FloorNo']>0) { ?>
                                              <div class="row">
                                                <div  class="col-4">Floor No</div>
                                                <div  class="col-8">:&nbsp;<?php echo $d[0]['FloorNo'];?></div>
                                              </div>
                                              <?php } ?>
                                              <?php if ($d[0]['CarParking']>0) { ?>
                                              <div class="row">
                                                <div  class="col-4">Car Parking</div>
                                                <div  class="col-8">:&nbsp;<?php echo $d[0]['CarParking'];?></div>
                                              </div>
                                              <?php } ?>
                                              <?php if($d[0]['Washrooms']!="0") { ?>
                                              <div class="row">
                                                <div  class="col-4">Washrooms</div>
                                                <div  class="col-8">:&nbsp;<?php echo $d[0]['Washrooms'];?></div>
                                              </div>
                                              <?php } ?>
                                              <?php if ($d[0]['Facing']!="0") { ?>
                                              <div class="row">
                                                <div  class="col-4">Facing</div>
                                                <div  class="col-8">:&nbsp;<?php echo $d[0]['Facing'];?></div>
                                              </div>
                                              <?php } ?>
                                              <?php if ($d[0]['MealsIncluded']!="0") { ?>
                                              <div class="row">
                                                <div  class="col-4">Meals Included</div>
                                                <div  class="col-8">:&nbsp;<?php echo $d[0]['MealsIncluded'];?></div>
                                              </div>
                                              <?php } ?>
                                              <?php if ($d[0]['SalaryPeriod']!="0") { ?>
                                              <div class="row">
                                                <div  class="col-4">Salary Period</div>
                                                <div  class="col-8">:&nbsp;<?php echo $d[0]['SalaryPeriod'];?></div>
                                              </div>
                                              <?php } ?>
                                              <?php if ($d[0]['PositionType']!="0") { ?>
                                              <div class="row">
                                                <div  class="col-4">Position Type</div>
                                                <div  class="col-8">:&nbsp;<?php echo $d[0]['PositionType'];?></div>
                                              </div>
                                              <?php } ?>
                                              <?php if ($d[0]['SalaryFrom']!="0") { ?>
                                              <div class="row">
                                                <div  class="col-4">Salary From</div>
                                                <div  class="col-8">:&nbsp;<?php echo $d[0]['SalaryFrom'];?></div>
                                              </div>
                                              <?php } ?>
                                              <?php if ($d[0]['salaryTo']!="0") { ?>
                                              <div class="row">
                                                <div  class="col-4">Salary To</div>
                                                <div  class="col-8">:&nbsp;<?php echo $d[0]['salaryTo'];?></div>
                                              </div>
                                              <?php } ?>
                                               
                                              </div>
                                        </div>
                                        
                                        
                                </div>   
                                
                            </div>
                            <div class="row">
                                <div class="col-md-8">
                                <div style="border:1px solid #ccc;margin-top:20px;padding:20px;">
                                <h2>Description</h2>
                                 <p>
                                 
                                 <?php 
                                    $content = str_replace("\n"," ",$d[0]['content']);
                                 $content = explode(" ",$content);
                                 
                                 
                                  $regex = "((https?|ftp)\:\/\/)?"; // SCHEME 
    $regex .= "([a-z0-9+!*(),;?&=\$_.-]+(\:[a-z0-9+!*(),;?&=\$_.-]+)?@)?"; // User and Pass 
    $regex .= "([a-z0-9-.]*)\.([a-z]{2,3})"; // Host or IP 
    $regex .= "(\:[0-9]{2,5})?"; // Port 
    $regex .= "(\/([a-z0-9+\$_-]\.?)+)*\/?"; // Path 
    $regex .= "(\?[a-z+&\$_.-][a-z0-9;:@&%=+\/\$_.-]*)?"; // GET Query 
    $regex .= "(#[a-z_.-][a-z0-9+\$_.-]*)?"; // Anchor 

      // if(preg_match("/^$regex$/i", $url)) // `i` flag for case-insensitive
      // { 
       //        return true; 
      // } 
       
       
                                 foreach ($content as $c ) {
                                      if(filter_var(trim($c), FILTER_VALIDATE_URL)) {
                                              
                                             echo "<a href='".$c."' target='_blank'>".$c."</a>";
                                      } else {
                                           echo $c;
                                      }
                                      echo " ";
                                 }
                                 
                             
                                 
                                
    
    
                                 
                                 
                                 ?></p>
                                 </div>  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
var ht;
function requestToViewAdContact(id) {
    
    if (id==0) {
         $('#myModal').modal("show");
        return;
    }                        
    
    $.ajax({url:'<?php echo base_url;?>rest.php?action=requestToViewAdContact&postid='+id,success:function(data){
        ht = $('#contactinfo').html();
        $('#contactinfo').html(data);
        
    }});
}

function errorModal(msg) {
    $('#errormsg').html(msg);
     $('#myErrorModal').modal("show");
        return;
}
</script>

 <div class="modal fade " id="myModal">
<div class="modal-dialog">
    <div class="modal-content">

       
      <div class="modal-header" style="border-bottom:none">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

       
      <div class="modal-body" style="text-align: center;">
       You must login <br>to view contact information<br><br><br>
       <a class="btn btn-outline-primary" href="<?php echo path_url;?>login" style="width: 200px;">
                                Login 
                            </a>        <br><br>
                                <a class="btn btn-primary" style="color:#fff;width:200px" href="<?php echo path_url;?>register">
                                Register 
                            </a>
                            <br><br>
        
      </div>

       
       
    </div>
  </div>
  </div>
  
  
   <div class="modal fade " id="myErrorModal">
<div class="modal-dialog">
    <div class="modal-content">

       
      <div class="modal-header" style="border-bottom:none">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

       
      <div class="modal-body" id="errormsg" style="text-align: center;">
       
        
      </div>

       
       <div class="modal-footer"  style="border-top:none">
        
            <button type="button" class="btn btn-primary" data-dismiss="modal">Continue</button>
      
      </div> 
    </div>
  </div>
  </div>
  <script>
 
 //setInterval("sendMessage(0)",10000);
 
    function Chat(id){
        <?php 
            $chatroom = $mysql->select("select * from _chat_initiate where adID='".$adID."'  and adPosted='".$d[0]["postedby"]."'  and adViewed='".$_SESSION['USER']['userid']."' ");
            if (sizeof($chatroom)>0)    {
        ?>
        location.href="https://www.klx.co.in/in/chat/room/<?php echo md5("j2jsoftwaresolutoins_".$chatroom[0]['ChatID']);?>";
        <?php } else { ?>
        location.href="https://www.klx.co.in/in/chat/create/<?php echo $adID;?>";
        <?php }  ?>
    }
  </script>      
 
<?php include_once("footer.php"); ?>