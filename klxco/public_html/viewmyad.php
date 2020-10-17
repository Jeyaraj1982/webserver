<?php
    include_once("header.php");
    if (isset($_POST['deleteBtn']) && $_POST['postid']>0) {
         $d = JPostads::getMyAd($_GET['ad'],isset($_SESSION['USER']['userid']) ? $_SESSION['USER']['userid'] : 0);
         $filename = ((strlen(trim($d[0]['filepath1']))>4) && file_exists("assets/".$config['thumb'].$d[0]['filepath1'])) ? "assets/".$config['thumb'].$d[0]['filepath1'] : "";
             
         if ($filename!="") {
                
                   if (copy("/home/klxco/public_html/".$filename,"/home/ztemp_klx/".$d[0]['filepath1'])) 
                   {
                    unlink("/home/klxco/public_html/".$filename);
                    $mysql->insert("_jpostads_deleted",array(
                    "postadid"=>$d[0]['postadid'],
                    "categid"=>$d[0]['categid'],
                    "subcateid"=>$d[0]['subcateid'],
                    "title"=>$d[0]['title'],
                    "content"=>$d[0]['content'],
                    "postedon"=>$d[0]['postedon'],
                    "visitors"=>$d[0]['visitors'],
                    "isactive"=>$d[0]['isactive'],
                    "isdelete"=>$d[0]['isdelete'],
                    "postedby"=>$d[0]['postedby'],
                    "adtype"=>"0",
                    "stateid"=>$d[0]['stateid'],
                    
                    "countryid"=>$d[0]['countryid'],
                    "distcid"=>$d[0]['distcid'],
                    "ispublish"=>$d[0]['ispublish'],
                    "expiredon"=>$d[0]['expiredon'],
                    "filepath1"=>$d[0]['filepath1'],
                    "filepath2"=>$d[0]['filepath2'],
                    "ispaid"=>$d[0]['ispaid'],
                    "location"=>$d[0]['location'],
                    "amount"=>$d[0]['amount'],
                    "isdeleted"=>"1",
                    "deletedon"=>date("Y-m-d H:i:s"),
                    "pposted"=>$d[0]['pposted']));
                              }
           $mysql->execute("delete from _jpostads  where postadid='".$_POST['postid']."'");
           //$mysql->execute("update _jpostads set isdeleted='1', deletedon='".date("Y-m-d H:i:s")."' where postadid='".$_POST['postid']."'");
             echo "<script>location.href='../myads';</script>";
           exit;
         
    } else {
         $mysql->execute("delete from _jpostads  where postadid='".$_POST['postid']."'");
           //$mysql->execute("update _jpostads set isdeleted='1', deletedon='".date("Y-m-d H:i:s")."' where postadid='".$_POST['postid']."'");
             echo "<script>location.href='../myads';</script>";
           exit;
    }
    }
    $d = JPostads::getMyAd($_GET['ad'],isset($_SESSION['USER']['userid']) ? $_SESSION['USER']['userid'] : 0);
    $filename = ((strlen(trim($d[0]['filepath1']))>4) && file_exists("assets/".$config['thumb'].$d[0]['filepath1'])) ? "assets/".$config['thumb'].$d[0]['filepath1'] : "assets/cms/".Jca::getAppSetting('noimage');
?>
<style>
.ulist_active {background:orange;}
.ulist_normal {background:#f1f1f1;}
</style>
<script>
var TotalUser=0;
</script>                                                                                                    
    <div class="main-panel" style="width:100% !important;height:auto !important;">
        <div class="container">
            <div class="page-inner">
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
                    <div class="col-md-6">
                        <div class="card">                                                     
                            <div class="card-header">
                                <h4><?php echo $d[0]['title'];?></h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <img src='<?php echo base_url.$filename;?>' style='height:200px;border:1px solid #ccc;border-bottom:none;'>  <br><br>
                                    
                                        <?php
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
                                <div class="row">
                                    <div class="col-md-12">
                                    <h2>Description</h2>
                                    <p><?php echo $d[0]['content'];?></p>
                                    <p>
                                        Posted: <span style='color:#666;font-weight:normall;'><?php echo $d[0]["postedon"];?></span>&nbsp;&nbsp;<br>
                                        Viewed: <span style='color:#444;font-weight:bold;'>
                                        <?php echo sizeof($mysql->select("select * from  _jusertable where userid in (select userid from  _jrecentlyviewed where adid='".$d[0]['postadid']."' group by userid)"));?>
                                        <?php //echo $d[0]["visitors"];?></span><br>
                                    </p>       
                                    </div>        
                                    <div>
                                      <a class="dropdown-item" href="<?php echo country_url;?>edit/e<?php echo $d[0]['postadid'];?>" draggable="false">Edit</a>
                                      <a class="dropdown-item" href="javascript:void()" class="btn btn-danger" style="background: red;color: #fff;border-radius: 10px;" onclick="deleteAd('<?php echo $d[0]['postadid'];?>');" draggable="false">Delete Ad</a>
                                    </div>  
                                </div>
                            </div>
                        </div>
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
                                              
                                              
                                                <?php if ($d[0]['Model']>0) { ?>
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
                                              <?php if ($d[0]['Transmission']!="0") { ?>
                                              <div class="row">
                                                    <div  class="col-4">Transmission</div>
                                                    <div  class="col-8">:&nbsp;<?php echo $d[0]['Transmission'];?></div>
                                               </div>
                                              <?php } ?>
                                              <?php if ($d[0]['Furnishing']!="0") { ?>
                                              <div class="row">
                                                <div  class="col-4">Furnishing</div>
                                                <div  class="col-8">:&nbsp;<?php echo $d[0]['Furnishing'];?></div>
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
                        <div class="card">                                                     
                            <div class="card-header">
                                <h4>Who Viewed My Ad (Registered Users only)</h4>
                            </div>
                            <div class="card-body">
                            <?php
                                $regViewers = $mysql->select("select * from _jusertable where userid in (select userid from _jrecentlyviewed where adid='".$_GET['ad']."' and userid<>'".$_SESSION['USER']['userid']."'  group by userid)");
                            ?>
                               
                                <?php foreach($regViewers as $rv) {?>
                                
                                 <div class="row">
                                            <div class="col-md-12" style="border-bottom:1px solid #ccc;padding-bottom:5px;">
                                            <?php echo  $rv['personname'];?><br>
                                            <?php echo  $rv['email'];?><br>
                                            <?php echo  $rv['mobile'];?>
                                            </div>
                                         </div>
                                  <?php } ?>
                               
                               
                                
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                    <div class="row">  
                    <div class="col-md-12">
                        <div class="card">                                                     
                            <div class="card-header">
                                <h4>Messages</h4>
                            </div>
                            <div class="card-body" style="padding:20px 6px !important">
                                  <div class="col-md-12">
                                    <?php $cdata = $mysql->select("SELECT * FROM _jusertable WHERE userid<>'".$_SESSION['USER']['userid']."' and userid IN ( SELECT fromuserid FROM _tblmessages WHERE toadid='".$_GET['ad']."' GROUP BY fromuserid)"); ?>
                                        <div class="row">
                                            <div class="col-md-4">
                                                 <div style="height:260px;border:1px solid #ccc">
                                                       <?php $i=1; foreach($cdata as $cd) {?>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                            <div style="border:1px solid #ccc" onclick="chooseUser('<?php echo $cd['userid'];?>','<?php echo $i;?>')" id="div_<?php echo $i;?>" >
                                                                <?php echo $cd['personname'];?>
                                                                </div>
                                                            </div>
                                                        </div>
                                                       <?php $i++; } ?>
                                                 </div>
                                            </div>
                                           <script>
                                           TotalUser=<?php echo $i;?>;
                                           </script> 
                                            <div class="col-md-8">
                                                <div class="row">
                                                 <div class="col-md-12">
                                                 <div  id="clientInfo" style="background:#ddd;padding:5px;">
                                                 
                                                 </div>
                                                    
                                                 </div>
                                                 </div>
                                                 <div class="row">
                                                 <div class="col-md-12">
                                                <div id="chatBox" style="border:1px solid #f1f1f1;background:#f1f1f1;height:200px;overflow:auto;"></div>                                                                                           
                                            </div>
                                                 </div>
                                                 <div class="row">
                                           
                                                
                                               <div class="col-md-12">
                                                <label>Message</label>
                                                 <form id='chatForm' name='chatForm'>
                                                 <input type="hidden" name="adid" id="adid" value="<?php echo $_GET['ad'];?>" id="adid">           
                                                 <input type="hidden" name="cuserid" id="cuserid" value="0">
                                                    <input type="text" class="form-control" style="width: 80%;float:left" id="message" disabled="disabled" name="message">
                                                    <input  type="button" class="btn btn-primary btn-sm" style="margin:5px 7px 5px 6px;" disabled="disabled" onclick="sendMessage(1)" name="msg_send" id="msg_send" value="Send">    
                                                    </form>
                                                </div>
                                                
                                            
                                        </div>
                                            </div>
                                        </div>
                                        </div>
                            </div>
                        </div>
                    </div> 
                    <div class="col-md-12">
                        <div class="card">                                                     
                            <div class="card-header">
                                <h4>Who Viewed My Contact</h4>
                            </div>
                            <div class="card-body">
                                 <?php
                                     $members = $mysql->select("select * from  _jusertable where userid in (select userid from  _jviewedcontact where adid='".$d[0]['postadid']."' and userid<>'".$_SESSION['USER']['userid']."' group by userid)");
                                     foreach($members as $m) {
                                         ?>
                                         <div class="row">
                                            <div class="col-md-12" style="border-bottom:1px solid #ccc;padding-bottom:5px;">
                                            <?php echo  $m['personname'];?><br>
                                            <?php echo  $m['email'];?><br>
                                            <?php echo  $m['mobile'];?>
                                            </div>
                                         </div>
                                         <?php
                                     }
                                 ?>
                            </div>
                        </div>
                    </div><!--                                                  
                    <div class="col-md-12">
                        <div class="card">                                                     
                            <div class="card-header">
                                <h4>Who Viewed My Ad</h4>
                            </div>
                            <div class="card-body">
                                <table class="table">
                                    <thead>
                                    <tr>
                                         <th>Name</th>
                                         <th>Email</th>
                                         <th>Mobile Number</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                 <?php
                                     $members = $mysql->select("select * from  _jusertable where userid in (select userid from  _jviewedcontact where adid='".$d[0]['postadid']."' group by userid)");
                                     foreach($members as $m) {
                                         ?>
                                           <tr>
                                           
                                           <td><?php echo  $m['personname'];?></td>
                                            <td><?php echo  $m['email'];?></td>
                                            <td><?php echo  $m['mobile'];?></td>
                                            </tr>
                                         <?php
                                     }
                                 ?>
                                 </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    -->
                    <div class="col-md-12">
                        <div class="card">                                                     
                            <div class="card-header">
                                <h4>Who liked My Ad</h4>
                            </div>
                            <div class="card-body">
                                                                                                                         
                                 <?php
                                     $members = $mysql->select("select * from  _jusertable where userid in (select userid from  _jfeatures_likedcontact where adid='".$d[0]['postadid']."' and userid<>'".$_SESSION['USER']['userid']."' group by userid)");
                                     foreach($members as $m) {
                                         ?>
                                                                                 <div class="row">
                                            <div class="col-md-12" style="border-bottom:1px solid #ccc;padding-bottom:5px;">
                                            <?php echo  $m['personname'];?><br>
                                            <?php echo  $m['email'];?><br>
                                            <?php echo  $m['mobile'];?>
                                            </div>
                                         </div>

                                         <?php
                                     }
                                 ?>
                                 
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
        function deleteAd(id) {
            $('#postid').val(id);
           $('#myModal').modal("show");   
        }
       </script>
    <div class="modal " id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Confirmation to delete</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
         Are you want to remove this ad?
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <form action="" method="post">
            <input type="hidden" value="" name="postid" id="postid">
            <button type="submit" class="btn btn-danger" name="deleteBtn">Delete</button>
        </form>
      </div>

    </div>
  </div>
</div>
  <script>
 
 setInterval("sendMessage(0)",10000);
 
  </script>
<?php include_once("footer.php"); ?>