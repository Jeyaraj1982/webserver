<?php
    $d = JPostads::getPostad($_GET['rowid']);
    $t = "";
    foreach(explode(" ",$d[0]['title']) as $x) {
        if (trim($x)!="") {
            $x = str_replace(array(","),"",trim($x));
           $t.=trim($x); 
        }
        $t.="-";
    }
   $t .= $d[0]['postadid']; 
   $postedByInfo = $mysql->select("select * from _jusertable where userid='".$d[0]['postedby']."'");
   
   $ad = $d;
?>
<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="row">                                                     
                    <div class="col-md-12">
                        <div class="card">                                                     
                            <div class="card-header">
                                <h4><?php echo $d[0]['title'];?></h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-8">
                                        <div style="border:1px solid #ccc;padding:20px;text-align:center">
                                        <img src='<?php echo AppUrl;?>/<?php echo "assets/".$config['thumb'].$ad[0]['filepath1'];?>' style='width:60%'>  <br><br>
                                    
                                        <?php
                                       if ($ad[0]['filepath2']!="") {
                                    ?>
                                      <img class="card-img-top rounded" src="<?php echo base_url."assets/".$config['thumb'].$ad[0]['filepath2'];?>" style="height:100px;width:auto">
                                    <?php
                                }
                                
                                 if ($ad[0]['filepath3']!="") {
                                    ?>
                                      <img class="card-img-top rounded" src="<?php echo base_url."assets/".$config['thumb'].$ad[0]['filepath3'];?>" style="height:100px;width:auto">
                                    <?php
                                }
                                
                                 if ($ad[0]['filepath4']!="") {
                                    ?>
                                      <img class="card-img-top rounded" src="<?php echo base_url."assets/".$config['thumb'].$ad[0]['filepath4'];?>" style="height:100px;width:auto">
                                    <?php
                                }
                                
                                 if ($ad[0]['filepath5']!="") {
                                    ?>
                                      <img class="card-img-top rounded" src="<?php echo base_url."assets/".$config['thumb'].$ad[0]['filepath5'];?>" style="height:100px;width:auto">
                                    <?php
                                }
                                
                                 if ($ad[0]['filepath6']!="") {
                                    ?>
                                      <img class="card-img-top rounded" src="<?php echo base_url."assets/".$config['thumb'].$ad['filepath6'];?>" style="height:100px;width:auto">
                                    <?php
                                }
                            ?>
                                        </div>
                                    </div>           
                                    <div class="col-md-4">
                                        <div>
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
                                              <h3 style="margin-bottom:15px">Additional Information</h3> 
                                              
                                              <?php if ($d[0]['brandid']>0) { ?>
                                              <?php $brand = $mysql->select("select * from _jbrandnames where brandid='".$d[0]['brandid']."'"); ?>
                                              <div class="row">
                                                    <div  class="col-4">Brand</div>
                                                    <div  class="col-8">:&nbsp;<?php echo $brand[0]['brandname'] ;?></div>
                                               </div>
                                              <?php } ?>
                                              
                                              <?php if ($d[0]['Model']>0) { ?>
                                              <?php $modal = $mysql->select("select * from _JModels where ModelID='".$d[0]['Model']."'  order by model"); ?>
                                              <div class="row">
                                                    <div  class="col-4">Model</div>
                                                    <div  class="col-8">:&nbsp;<?php echo $modal[0]['model'];?></div>
                                              </div>
                                              <?php } ?>
                                              
                                              <?php if ($d[0]['Fuel']>0) { ?>
                                              <div class="row">
                                                    <div  class="col-4">Fuel</div>
                                                    <div  class="col-8">:&nbsp;<?php echo $d[0]['Fuel'];?></div>
                                               </div>
                                              <?php } ?>
                                              
                                              
                                              <?php if ($d[0]['Year']>0) { ?>
                                              <div class="row">
                                                    <div  class="col-4">Year</div>
                                                    <div  class="col-8">:&nbsp;<?php echo $d[0]['Year'];?></div>
                                               </div>
                                              <?php } ?>
                                              
                                              <?php if ($d[0]['KMDriven']>0) { ?>
                                              <div class="row">
                                                    <div  class="col-4">KM Driven</div>
                                                    <div  class="col-8">:&nbsp;<?php echo $d[0]['KMDriven'];?></div>
                                              </div>
                                              <?php } ?>
                                                                                   
                                              <?php if ($d[0]['NoofOwners']>0) { ?>
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