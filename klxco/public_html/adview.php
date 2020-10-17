<?php
    include_once("header.php");
    $q = explode("-",$_GET['a']);
  
    $adID = $_GET['ad'];
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
   $ad = $d;
   
?>
    <div class="main-panel" style="width: 100%;height:auto !important">
        <div class="container">
            <div class="page-inner">
            <?php include_once("includes/searchform.php");?>
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
                                <h4><?php echo $d[0]['title'];?>
                                 
                                </h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div style="border:1px solid #ccc;padding:20px;text-align:center">
                                        <img src='<?php echo base_url.$filename;?>' style='width:60%'>    <br><br>
                                         
                                        <?php
                                $image2 = $filename = ((strlen(trim($ad['filepath2']))>4) && file_exists("assets/".$config['thumb'].$ad['filepath2'])) ? "./../../../assets/".$config['thumb'].$ad['filepath2'] : "";
                                $image3 = $filename = ((strlen(trim($ad['filepath3']))>4) && file_exists("assets/".$config['thumb'].$ad['filepath3'])) ? "./../../../assets/".$config['thumb'].$ad['filepath3'] : "";
                                $image4 = $filename = ((strlen(trim($ad['filepath4']))>4) && file_exists("assets/".$config['thumb'].$ad['filepath4'])) ? "./../../../assets/".$config['thumb'].$ad['filepath4'] : "";
                                $image5 = $filename = ((strlen(trim($ad['filepath5']))>4) && file_exists("assets/".$config['thumb'].$ad['filepath5'])) ? "./../../../assets/".$config['thumb'].$ad['filepath5'] : "";
                                $image6 = $filename = ((strlen(trim($ad['filepath6']))>4) && file_exists("assets/".$config['thumb'].$ad['filepath6'])) ? "./../../../assets/".$config['thumb'].$ad['filepath6'] : "";
                                       if ($d[0]['filepath2']!="") {
                                    ?>
                                      <img class="card-img-top rounded" onclick="onClick(this)" src="<?php echo base_url."assets/".$config['thumb'].$d[0]['filepath2'];?>" style="height:100px;width:auto">
                                    <?php
                                }
                                
                                 if ($d[0]['filepath3']!="") {
                                    ?>
                                      <img class="card-img-top rounded" onclick="onClick(this)" src="<?php echo base_url."assets/".$config['thumb'].$d[0]['filepath3'];?>" style="height:100px;width:auto">
                                    <?php
                                }
                                
                                 if ($d[0]['filepath4']!="") {
                                    ?>
                                      <img class="card-img-top rounded" onclick="onClick(this)" src="<?php echo base_url."assets/".$config['thumb'].$d[0]['filepath4'];?>" style="height:100px;width:auto">
                                    <?php
                                }                                                       
                                
                                 if ($d[0]['filepath5']!="") {
                                    ?>
                                      <img class="card-img-top rounded" onclick="onClick(this)" src="<?php echo base_url."assets/".$config['thumb'].$d[0]['filepath5'];?>" style="height:100px;width:auto">
                                    <?php
                                }
                                
                                 if ($d[0]['filepath6']!="") {
                                    ?>
                                      <img class="card-img-top rounded" onclick="onClick(this)" src="<?php echo base_url."assets/".$config['thumb'].$d[0]['filepath6'];?>" style="height:100px;width:auto">
                                    <?php
                                }
                            ?>
                                        </div>
                                    </div>           
                                    <div class="col-md-4">
                                        <div>
                                            <div class="col-md-12" style="border:1px solid #ccc;padding:20px;padding-bottom:5px;">
                                               <?php
                                                       if ($ad[0]['categid']==5) {
                                                       ?>
                                                       <h3 class="mb-0 fw-bold">Salary : ₹ <?php echo $ad[0]['SalaryFrom'];?> - ₹ <?php echo $ad[0]['salaryTo'];?></h3>         
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
                                              <h3>Seller description</h3>
                                              <div id="contactinfo">
                                              
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
                                        if (sizeof($d[0]['viewedContact'])>0) {
                                            
                                            echo  "<div style='border:1px solid #ccc;padding:20px;background:#fcfce5;border-radius:5px'>email: ".$d[0]['viewedContact']['email']
                                                    ."<br>mobile: ".$d[0]['viewedContact']['mobile']
                                                    ."<br>viewed: ".$days_between
                                                    ."</div>";
                                        } else {
                                    ?>
                                    <?php if (isset($_SESSION['USER']['userid']) && $_SESSION['USER']['userid']>0) { ?>
                                    
                                        <input type="button" class="btn btn-primary" onclick="requestToViewAdContact('<?php echo md5($adID."jEyArAj[at]DeVeLoPeR");?>')" name="viewContact" value="View Contact Information">
                                    
                                    <?php } else { ?>
                                        <input type="button" class="btn btn-primary" onclick="requestToViewAdContact(0)" name="viewContact" value="View Contact Information">
                                    <?php } ?>
                                    <?php } ?>
                                    </div>
                                              </div>
                                        </div>
                                        <br><br>
                                       <div class="col-md-12"  style="border:1px solid #ccc;padding:20px;padding-bottom:5px;"   >
                                        <h3>Chat with Seller</h3>
                                       <?php if (isset($_SESSION['USER']['userid']) && $_SESSION['USER']['userid']>0) { ?>
                                    
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div id="chatBox" style="border:1px solid #f1f1f1;background:#f1f1f1;height:200px;overflow:auto;;"></div>                                                                                           
                                            </div>
                                        </div>
                                        <div class="row">
                                           
                                                
                                               <div class="col-md-12">
                                                <label>Message</label>
                                                 <form id='chatForm' name='chatForm'>
                                                 <input type="hidden" name="adid" id="adid" value="<?php echo $adID;?>" id="adid">
                                                    <input type="text" class="form-control" style="width: 80%;float:left" id="message" name="message">
                                                    <input  type="button" class="btn btn-primary btn-sm" style="margin:5px 7px 5px 6px;" onclick="sendMessage(1)" name="viewContact" value="Send">    
                                                    </form>
                                                </div>
                                                
                                            
                                        </div>
                                        </div>
                                       <br><br>
                                       <div class="col-md-12" style="border:1px solid #ccc;margin-top:20px;padding:20px;padding-top:10px;padding-bottom:10px;">
                                              <h3 style="margin-bottom:15px">Additional Information</h3> 
                                             
                                            
                                            
                                              <?php if ($d[0]['brandid']>0) { ?>
                                              <?php
                                                $brand = $mysql->select("select * from _jbrandnames where brandid='".$d[0]['brandid']."'");
                                              ?>
                                              <div class="row">
                                                    <div  class="col-4">Brand</div>
                                                    <div  class="col-8">:&nbsp;<?php echo $brand[0]['brandname'] ;?></div>
                                               </div>
                                              <?php } ?>
                                              
                                              
                                                <?php if ($d[0]['Model']!="0") { ?>
                                                <?php
                                                      $modal = $mysql->select("select * from _JModels where ModelID='".$d[0]['Model']."'  order by model");
                                                ?>
                                              <div class="row">
                                                    <div  class="col-4">Model</div>
                                                    <div  class="col-8">:&nbsp;<?php echo $modal[0]['model'];?></div>
                                               </div>
                                              <?php } ?>
                                              
                                              
                                              
                                               <?php if ($d[0]['Fuel']!="0") { ?>
                                              <div class="row">
                                                    <div  class="col-4">Fuel</div>
                                                    <div  class="col-8">:&nbsp;<?php echo $d[0]['Fuel'];?></div>
                                               </div>
                                              <?php } ?>
                                              
                                              
                                              <?php if ($d[0]['Year']!="0") { ?>
                                              <div class="row">
                                                    <div  class="col-4">Year</div>
                                                    <div  class="col-8">:&nbsp;<?php echo $d[0]['Year'];?></div>
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
                                              
                                              <?php if ($d[0]['Furnishing']!="0") { ?>
                                              <div class="row">
                                                <div  class="col-4">Furnishing</div>
                                                <div  class="col-8">:&nbsp;<?php echo $d[0]['Furnishing'];?></div>
                                              </div>
                                              <?php } ?>
                                              <?php if ($d[0]['ConstructionStatus']!="0") { ?>
                                              <div class="row">
                                                <div  class="col-4">Construction Status</div>
                                                <div  class="col-8">:&nbsp;<?php echo $d[0]['ConstructionStatus'];?></div>
                                              </div>
                                              <?php } ?>
                                              
                                              <?php if ($d[0]['ListedBy']!="0") { ?>
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
                                              
                                              <?php if ($d[0]['BachelorsAllowed']!="0") { ?>
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
                                    
                                    <?php } else { ?>
                                        <input type="button" class="btn btn-primary" onclick="requestToViewAdContact(0)" name="viewContact" value="Send Message">
                                    <?php } ?>
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
                                 
                                // print_r($content);
                                 if(filter_var('https://www.kasupanamthuttu.com/register', FILTER_VALIDATE_URL)) {
   // echo "Y";
    } else {
      //  echo "D" ;
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
 
 setInterval("sendMessage(0)",10000);
 
  </script>
<?php include_once("footer.php"); ?>