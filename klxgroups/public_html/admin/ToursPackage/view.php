<?php
include_once("header.php");
include_once("LeftMenu.php"); 
$data= $mysql->Select("select * from _tbl_tours_package where md5(PackageID)='".$_GET['id']."'");
$tourtheme =$mysql->select("select * from _tbl_tour_theme where TourThemeID='".$data[0]['TourThemeID']."'");
$tour =$mysql->select("select * from _tbl_tour where TourTypeID='".$data[0]['TourTypeID']."'");
$subtour =$mysql->select("select * from _tbl_sub_tour where SubTourTypeID='".$data[0]['SubTourTypeID']."'");
?>
        <div class="main-panel">
            <div class="container">
                <div class="page-inner">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">View Package Information</div>
                                </div>
                                    <div class="card-body">
                                        <?php if ($data[0]['IsMostPopularTour']==1) { ?>
                                        <div class="form-group form-show-validation row">
                                            <div class="col-lg-12 col-md-12 col-sm-12" style="background:#f1f1f1;border:1px solid #eee;padding:10px;">Added into <b>Most Popular Tour</b></div>
                                        </div>
                                        <?php } ?>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Tour Theme</label>
                                            <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $tourtheme[0]['TourTheme'];?></div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Tour Type Name</label>
                                            <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $tour[0]['TourTypeName'];?></div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Sub Tour Type Name</label>
                                            <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $subtour[0]['SubTourTypeName'];?></div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Package Name</label>
                                            <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $data[0]['PackageName'];?></div>
                                        </div>
                                         <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Short Description</label>
                                            <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $data[0]['ShortDescription'];?></div>
                                        </div>
                                         <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Description</label>
                                            <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $data[0]['Description'];?></div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Package Price</label>
                                            <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $data[0]['PackagePrice'];?></div>
                                        </div>
                                         <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Package Rating</label>
                                            <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $data[0]['PackageRating'];?></div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Joining Place</label>
                                            <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $data[0]['JoiningPlace'];?></div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Leaving Place</label>
                                            <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $data[0]['LeavingPlace'];?></div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Days</label>
                                            <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $data[0]['DaysCount'];?></div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Nights</label>
                                            <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $data[0]['NightsCount'];?></div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Country</label>
                                            <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $data[0]['CountryCount'];?></div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">City</label>
                                            <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $data[0]['CityCount'];?></div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Currency</label>
                                            <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $data[0]['Currency'];?></div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Languages Spoken</label>
                                            <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $data[0]['SpokenLanguage'];?></div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Visa Required</label>
                                            <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $data[0]['VisaRequirements'];?></div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Meal Type</label>
                                            <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $data[0]['MealType'];?></div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Special Meal</label>
                                            <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $data[0]['SpecialMeal'];?></div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Toppings</label>
                                            <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $data[0]['Toppings'];?></div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Bus Available</label>
                                            <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $data[0]['BusAvailable'];?></div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Airline Available</label>
                                            <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $data[0]['AirlineAvailable'];?></div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">IsPublish</label>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <?php if($data[0]['IsPublish']=="1"){ echo "Yes";}else { echo "No";} ?>
                                            </div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Added On</label>
                                            <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $data[0]['AddedOn'];?></div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Package Order</label>
                                            <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $data[0]['PackageOrder'];?></div>
                                        </div>
                                         <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Package Ratings</label>
                                            <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $data[0]['PackageRating'];?></div>
                                        </div>
                                    </div>
                                    <div class="card-action">
                                        <div class="row">
                                            <div class="col-md-12">                                  
                                                <a href="dashboard.php?action=SubTours/viewpackages&id=<?php echo md5($data[0]['SubTourTypeID']);?>" class="btn btn-warning">Back</a>
                                            </div>                                        
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header" style="padding-top:10px;padding-bottom:10px">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="card-title">
                                                Thumbnails 
                                            </div>
                                        </div>      
                                        <div class="col-md-6" style="text-align: right;">
                                        <?php
                                            if (isset($_POST['UploadThumb'])) {
                                                $data= $mysql->Select("select * from _tbl_tours_package where md5(PackageID)='".$_GET['id']."'");
                                                $target_dir = "../uploads/package/";
                                                $image = strtolower(time()."_".$_FILES['file']["name"]);
                                              
                                                if (move_uploaded_file($_FILES['file']["tmp_name"], $target_dir .$image)) {
                                                    $mysql->insert("_tbl_tours_package_images",array("PackageID"=>$data[0]['PackageID'],
                                                                                                     "ImageName"=>$image,
                                                                                                     "ImageOrder"=>sizeof($mysql->select("select * from _tbl_tours_package_images where IsDelete='0' PackageID='".$data[0]['PackageID']."'"))+1,
                                                                                                     "IsDelete"=>"0"));
                                                        }
                                                                
                                                 
                                            }
                                        ?>
                                        <form action="" method="post" enctype="multipart/form-data">
                                            <input type="file" name="file"><br>
                                            Image Size: Width 950px X Height 700px
                                            <button type="submit" name="UploadThumb" class="btn btn-primary btn-xs">Add Thumb</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                    <?php
                                        if (isset($_POST['btnRemove'])) {
                                            $mysql->execute("update _tbl_tours_package_images set IsDelete='1' where ImageID='".$_POST['ImageID']."'");
                                        }
                                        
                                        if (isset($_POST['btnUpdateOrder'])) {
                                            $mysql->execute("update _tbl_tours_package_images set ImageOrder='".$_POST['ImageOrder']."' where ImageID='".$_POST['ImageID']."'");
                                        }
                                        
                                        
                                        $images = $mysql->select("select * from _tbl_tours_package_images where IsDelete='0' and PackageID='".$data[0]['PackageID']."' order by ImageOrder");
                                        
                                        foreach($images  as $image) {
                                    ?>
                                        <div class="col-sm-3">
                                            <img src="https://www.trip78.in/uploads/package/<?php echo $image['ImageName'];?>" style="width:100%">
                                            <?php
                                                list($width, $height) = getimagesize("../uploads/package/".$image['ImageName']);
                                                echo $width."px x ".$height."px";
                                            ?>
                                            <form action="" method="post">
                                                <input type="hidden" name="ImageID" value="<?php echo $image['ImageID'];?>">
                                                <select name="ImageOrder" class="form-control">
                                                    <option value="0">Select Order</option>            
                                                    <?php for($i=1;$i<=sizeof($images);$i++) { ?>
                                                            <option value="<?php echo $i;?>" <?php echo ($i==$image['ImageOrder']) ? " selected='selected' " : "";?> ><?php echo $i;?></option>
                                                            <?php
                                                        }
                                                    ?>
                                                </select>
                                                <br>
                                                <input type="submit" value="Update Order" name="btnUpdateOrder" class="btn btn-primary btn-sm">
                                                <input type="submit" value="Remove Image" name="btnRemove" class="btn btn-danger btn-sm">
                                            </form>
                                        </div>
                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header" style="padding-top:10px;padding-bottom:10px">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="card-title">
                                                Day and Event
                                            </div>
                                        </div>
                                        <div class="col-md-6" style="text-align: right;">
                                            <button type="button" onclick="AddDayandEventDetails('<?php echo md5($data[0]['PackageID']);?>')" class="btn btn-primary btn-xs">Add Day and Event</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" style="border: 1px solid #dee2e6;">
                                        <thead>
                                            <tr>
                                                <th scope="col">Day</th>
                                                <th scope="col">Event Title</th>
                                                <th scope="col">Event Description</th>
                                                <th scope="col"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $DayandEvents = $mysql->select("select * from _tbl_package_day_event where PackageID='".$data[0]['PackageID']."' order by EventDay*1");   ?>
                                        <?php foreach($DayandEvents as $DayandEvent){ ?>
                                            <tr>
                                                <td style="vertical-align:top !important;"><?php echo $DayandEvent['EventDay'];?></td>
                                                <td style="vertical-align:top !important;"><?php echo $DayandEvent['EventTitle'];?></td>
                                                <td style="vertical-align:top !important;">
                                                    <?php
                                                        $l = explode("\n",trim($DayandEvent['EventDescription']));
                                                        if (sizeof($l)==1) {
                                                    ?>
                                                    <p><?php echo $DayandEvent['EventDescription'];?></p>
                                                    <?php } else { ?>
                                                    <ul style="padding-left:10px !important">
                                                        <?php 
                                                            foreach($l as $list) {
                                                                if (trim($list)!="") {
                                                                    echo "<li>".$list."</li>";
                                                                }
                                                            }
                                                        ?>
                                                    </ul>
                                                    <?php } ?>
                                                </td>
                                                <td style="text-align: right">                                                   
                                                    <div class="dropdown dropdown-kanban" style="float: right;">
                                                        <button class="" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border:none;font-size:14px;background:none !important;padding-right:0px;margin-right:0px;cursor:pointer">
                                                            <i class="icon-options-vertical"></i>
                                                        </button>                                                                                                        
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                            <a class="dropdown-item" draggable="false" href="javascript:void(0)" onclick="EditDayandEventDetails('<?php echo md5($DayandEvent['DayandEventID']);?>')">Edit</a>
                                                            <a class="dropdown-item" draggable="false"><span onclick='CallConfirmationDeleteDayEvent(<?php echo $DayandEvent['DayandEventID'];?>)' class='btn btn-danger btn-sm' style='padding: 0px 10px;font-size: 10px;'>Delete</span></a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header" style="padding-top:10px;padding-bottom:10px">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="card-title">
                                                Date and Cost
                                            </div>
                                        </div>
                                        <div class="col-md-6" style="text-align: right;">
                                            <button type="button" onclick="AddDateandCostDetails('<?php echo md5($data[0]['PackageID']);?>')" class="btn btn-primary btn-xs">Add Date and Cost</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" style="border: 1px solid #dee2e6;">
                                        <thead>
                                            <tr>
                                                <th scope="col">Date</th>
                                                <th scope="col">Package Price</th>
                                                <th scope="col">Offer Price</th>
                                                <th scope="col">Save Price</th>
                                                <th scope="col">Enquiry</th>
                                                <th scope="col"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $DateCosts = $mysql->select("select * from _tbl_package_date_cost where PackageID='".$data[0]['PackageID']."' order by DateandCostID");   ?>
                                        <?php foreach($DateCosts as $datecost){ ?>
                                        <?php $Enquiry = $mysql->Select("SELECT COUNT(EnquiryID) AS cnt FROM _tbl_tour_enquiry where PackageDateandCostID='".$datecost['DateandCostID']."'"); ?>
                                            <tr id="EnquiryDetails_<?php echo $datecost['DateandCostID'];?>">
                                                <td><?php echo date("M,d Y", strtotime($datecost['TourDate']));?></td>
                                                <td style="text-align:right"><?php echo "RS ".number_format($datecost['PackagePrice'],2);?></td>
                                                <td style="text-align:right"><?php echo "RS ".number_format($datecost['OfferPrice'],2);?></td>
                                                <td style="text-align:right"><?php echo "RS ".number_format($datecost['SavePrice'],2);?></td>
                                                <td style="text-align: right"><?php echo $Enquiry[0]['cnt'];?></td>
                                                <td style="text-align: right">                                                   
                                                    <div class="dropdown dropdown-kanban" style="float: right;">
                                                        <button class="" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border:none;font-size:14px;background:none !important;padding-right:0px;margin-right:0px;cursor:pointer">
                                                            <i class="icon-options-vertical"></i>
                                                        </button>                                                                                                        
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                            <a class="dropdown-item" draggable="false" href="javascript:void(0)" onclick="EditDateandCostDetails('<?php echo md5($datecost['DateandCostID']);?>')">Edit</a>
                                                            <?php if($Enquiry[0]['cnt']!="0"){  ?>
                                                                <a class="dropdown-item" draggable="false" href="javascript:void(0)" onclick="ViewEnquiryByDate('<?php echo md5($datecost['DateandCostID']);?>','<?php echo $datecost['DateandCostID'];?>')">View Enquiry</a>
                                                            <?php } if($Enquiry[0]['cnt']=="0"){  ?>
                                                                <a class="dropdown-item" draggable="false"><span onclick='CallConfirmationDeleteDateCost(<?php echo $datecost['DateandCostID'];?>)' class='btn btn-danger btn-sm' style='padding: 0px 10px;font-size: 10px;'>Delete</span></a>
                                                            <?php }  ?>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="6">
                                                <div style="height:120px;overflow: auto;">
                                                    <table>
                                                            <tr>
                                                                <th scope="col">Requested</th>
                                                                <th scope="col">Full Name</th>
                                                                <th scope="col">City</th>
                                                                <th scope="col">Mobile Number</th>
                                                                <th scope="col">Date</th>
                                                                <th scope="col">Package Cost</th>
                                                                <th scope="col"></th>
                                                            </tr>
                                                        <?php $Enquiries = $mysql->select("select * from _tbl_tour_enquiry where PackageDateandCostID='".$datecost['DateandCostID']."'");   ?>
                                                        <?php foreach($Enquiries as $Enquiry){ ?>
                                                            <?php $DateCosts = $mysql->select("select * from _tbl_package_date_cost where PackageID='".$Enquiry['PackageID']."' and DateandCostID='".$Enquiry['PackageDateandCostID']."'");   ?>
                                                            <tr>
                                                                <td><?php echo date("M,d Y", strtotime($Enquiry['CreatedOn']));?></td>
                                                                <td><?php echo $Enquiry['FullName'];?></td>                                             
                                                                <td><?php echo $Enquiry['CurrentCity'];?></td>
                                                                <td><?php echo $Enquiry['MobileNumber'];?></td>
                                                                <td><?php echo date("M,d Y", strtotime($DateCosts[0]['TourDate']));?></td>
                                                                <td style="text-align:right"><?php echo number_format($DateCosts[0]['SavePrice'],2);?></td>
                                                                <td><a href="javascript:void(0)"  onclick="ViewEnquiryDetails('<?php echo md5($Enquiry['EnquiryID']);?>')">View</a></td>
                                                            </tr>
                                                        <?php } ?>        
                                                    </table>
                                                </div>
                                                </td>
                                            </tr>
                                            
                                        <?php } ?>
                                        </tbody>
                                    </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header" style="padding-top:10px;padding-bottom:10px">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="card-title">
                                                Enquiry
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" style="border: 1px solid #dee2e6;">
                                        <thead>
                                            <tr>
                                                <th scope="col">Requested</th>
                                                <th scope="col">Full Name</th>
                                                <th scope="col">City</th>                                 
                                                <th scope="col">Mobile Number</th>
                                                <th scope="col">Date</th>
                                                <th scope="col">Package Cost</th>
                                                <th scope="col"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $Enquiries = $mysql->select("select * from _tbl_tour_enquiry where PackageID='".$data[0]['PackageID']."'");   ?>
                                        <?php foreach($Enquiries as $Enquiry){ ?>
                                            <?php $DateCosts = $mysql->select("select * from _tbl_package_date_cost where PackageID='".$Enquiry['PackageID']."' and DateandCostID='".$Enquiry['PackageDateandCostID']."'");   ?>
                                            <tr>
                                                <td><?php echo date("M,d Y", strtotime($Enquiry['CreatedOn']));?></td>
                                                <td><?php echo $Enquiry['FullName'];?></td>
                                                <td><?php echo $Enquiry['CurrentCity'];?></td>
                                                <td><?php echo $Enquiry['MobileNumber'];?></td>
                                                <td><?php echo date("M,d Y", strtotime($DateCosts[0]['TourDate']));?></td>
                                                <td style="text-align:right"><?php echo number_format($DateCosts[0]['SavePrice'],2);?></td>
                                                <td><a href="javascript:void(0)"  onclick="ViewEnquiryDetails('<?php echo md5($Enquiry['EnquiryID']);?>')">View</a></td>
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header" style="padding-top:10px;padding-bottom:10px">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="card-title">
                                                Additional Params
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <form method="post" id="additionparamsFrm">
                                    <input type="hidden" name="PackageID" id="PackageID" value="<?php echo $data[0]['PackageID'];?>">
                                    <?php $additionalParam = $mysql->select("select * from _tbl_additional_params where PackageID='".$data[0]['PackageID']."'");?>
                                        <div class="form-group row">
                                            <div class="col-sm-6">
                                                <div class="form-group form-show-validation row">
                                                    <div class="col-sm-12">
                                                        <label for="name">Terms and conditions</label>
                                                        <textarea rows="6" name="termsandconditions" id="termsandconditions" class="form-control"><?php echo (isset($_POST['termsandconditions']) ? $_POST['termsandconditions'] : $additionalParam[0]['termsandconditions']);?></textarea>
                                                    </div>                                                 
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group form-show-validation row">
                                                    <div class="col-sm-12">
                                                        <label for="name">Charges</label>
                                                        <textarea rows="6" name="Charges" id="Charges" class="form-control"><?php echo (isset($_POST['Charges']) ? $_POST['Charges'] :$additionalParam[0]['charges']);?></textarea>
                                                    </div>
                                                </div>                                                                                                             
                                            </div>
                                        </div>      
                                        <div class="form-group row">
                                            <div class="col-sm-6">
                                                <div class="form-group form-show-validation row">
                                                    <div class="col-sm-12">
                                                        <label for="name">Extra Toppings</label>
                                                        <textarea rows="6" name="ExtraToppings" id="ExtraToppings" class="form-control"><?php echo (isset($_POST['ExtraToppings']) ? $_POST['ExtraToppings'] : $additionalParam[0]['ExtraToppings']);?></textarea>
                                                    </div>                                                 
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group form-show-validation row">
                                                    <div class="col-sm-12">
                                                        <label for="name">Our Speciality</label>
                                                        <textarea rows="6" name="OurSpeciality" id="OurSpeciality" class="form-control"><?php echo (isset($_POST['OurSpeciality']) ? $_POST['OurSpeciality'] :$additionalParam[0]['OurSpeciality']);?></textarea>
                                                    </div>
                                                </div>                                                                                                             
                                            </div>
                                        </div> 
                                        <div class="form-group row">
                                            <div class="col-sm-6">
                                                <div class="form-group form-show-validation row">
                                                    <div class="col-sm-12">
                                                        <label for="name">Reporting & Dropping for Joining & Leaving Guests</label>
                                                        <textarea rows="6" name="DroppingDetails" id="DroppingDetails" class="form-control"><?php echo (isset($_POST['DroppingDetails']) ? $_POST['DroppingDetails'] : $additionalParam[0]['DroppingDetails']);?></textarea>
                                                    </div>                                                 
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group form-show-validation row">
                                                    <div class="col-sm-12">
                                                        <label for="name">Notes</label>
                                                        <textarea rows="6" name="PackagesNotes" id="PackagesNotes" class="form-control"><?php echo (isset($_POST['PackagesNotes']) ? $_POST['PackagesNotes'] :$additionalParam[0]['PackagesNotes']);?></textarea>
                                                    </div>
                                                </div>                                                                                                             
                                            </div>
                                        </div>   
                                        <div class="form-group row">
                                            <div class="col-sm-6">
                                                <div class="form-group form-show-validation row">
                                                    <div class="col-sm-12">
                                                        <label for="name">INCLUSIONS   </label>
                                                        <textarea rows="6" name="inclusions" id="inclusions" class="form-control"><?php echo (isset($_POST['inclusions']) ? $_POST['inclusions'] :$additionalParam[0]['inclusions']);?></textarea>
                                                    </div>
                                                </div>                                                                                                             
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="form-group form-show-validation row">
                                                    <div class="col-sm-12">
                                                        <label for="name">EXCLUSIONS </label>
                                                        <textarea rows="6" name="exclusions" id="exclusions" class="form-control"><?php echo (isset($_POST['exclusions']) ? $_POST['exclusions'] :$additionalParam[0]['exclusions']);?></textarea>
                                                    </div>
                                                </div>                                                                                                             
                                            </div>
                                        </div>  
                                        
                                           
                                                                                          
                                    </form>
                                </div>                                                                                                                                
                                <div class="card-action" style="padding: 10px;">
                                        <div class="row">
                                            <div class="col-md-12" style="text-align: right;">                                  
                                                <button type="button" onclick="AddAdditionalDetails('<?php echo md5($data[0]['PackageID']);?>')" class="btn btn-primary">Submit</button>
                                            </div>                                        
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

<?php include_once("footer.php");?>
<div class="modal fade" id="ConfirmationPopup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content" id="confrimation_text">    
         
    </div>
  </div>
</div>
<script>
 var loading = "<div class='modal-body' style='padding:10px;'><div class='form-group row'><div class='col-sm-12' style='text-align:center'><div  style='padding:80px;text-align:center;color:#aaa;text-align:center'><img src='assets/loading.gif'  style='width:80px'><br>Processing ...</div></div></div>";
 function AddDayandEventDetails(PackageID) {   
        $("#confrimation_text").html(loading);
        $.ajax({url:'webservice.php?action=AddDayandEventDetails&PackageID='+PackageID,success:function(data){
            $("#confrimation_text").html(data);
            $('#ConfirmationPopup').modal("show");
        }});
    }
 function SaveDayandEventDetails() {
         var param = $( "#DayandEventFrom").serialize();
        $("#confrimation_text").html(loading);
        $.post( "webservice.php?action=SubmitDayandEventDetails",param,function(data) {                                       
            var obj = JSON.parse(data); 
            var html = "";                                                                              
            if (obj.status=="failure") {
                html = "<div class='modal-body' style='padding:10px;'><div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='assets/accessdenied.png' style='width:128px;margin:0px auto'><br><br>"+obj.message+"<br></div></div>";                          
                html += "<div style='padding:20px;text-align:center'>" + "<button type='button' class='btn btn-primary' data-dismiss='modal'>Cancel</button></div></div>"; 
            } else {
                html = "<div class='modal-body' style='padding:10px;'><div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='assets/tick.jpg' style='width:128px;margin:0px auto'><br><h5 style='line-height:30px;font-size: 16px;margin-bottom:0px'>"+obj.message+"</h5><br><a href='' class='btn btn-primary'>Continue</button></div></div>";
                html += "</div>"; 
                $('#ConfirmationPopup').modal("show");
            }
            $("#confrimation_text").html(html);
            
        });
    }
    function EditDayandEventDetails(DayandEventID) {   
        $("#confrimation_text").html(loading);
        $.ajax({url:'webservice.php?action=EditDayandEventDetails&DayandEventID='+DayandEventID,success:function(data){
            $("#confrimation_text").html(data);
            $('#ConfirmationPopup').modal("show");
        }});
    }
    
    function UpdateDayandEventDetails() {
        var param = $( "#EditDayandEventFrom").serialize();
        $("#confrimation_text").html(loading);
        $.post( "webservice.php?action=SubmitUpdateDayandEventDetails",param,function(data) {                                       
            var obj = JSON.parse(data); 
            var html = "";                                                                              
            if (obj.status=="failure") {                                                                                                                                                                                                                                                                 
                html = "<div class='modal-body' style='padding:10px;'><div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='assets/accessdenied.png' style='width:128px;margin:0px auto'><br><br>"+obj.message+"<br></div></div>";                          
                html += "<div style='padding:20px;text-align:center'>" + "<button type='button' class='btn btn-primary' data-dismiss='modal'>Cancel</button></div></div>"; 
            } else {
                html = "<div class='modal-body' style='padding:10px;'><div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='assets/tick.jpg' style='width:128px;margin:0px auto'><br><h5 style='line-height:30px;font-size: 16px;margin-bottom:0px'>"+obj.message+"</h5><br><a href='' class='btn btn-primary'>Continue</button></div></div>";
                html += "</div>"; 
                $('#ConfirmationPopup').modal("show");
            }
            $("#confrimation_text").html(html);
            
        });
    }
 function AddDateandCostDetails(PackageID) {   
        $("#confrimation_text").html(loading);
        $.ajax({url:'webservice.php?action=AddDateandCostDetails&PackageID='+PackageID,success:function(data){
            $("#confrimation_text").html(data);
            $('#ConfirmationPopup').modal("show");
        }});
    }
 function SaveDateandCostDetails() {
         var param = $( "#DateandCostFrom").serialize();
        $("#confrimation_text").html(loading);
        $.post( "webservice.php?action=SubmitDateandCostDetails",param,function(data) {                                       
            var obj = JSON.parse(data); 
            var html = "";                                                                              
            if (obj.status=="failure") {
                html = "<div class='modal-body' style='padding:10px;'><div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='assets/accessdenied.png' style='width:128px;margin:0px auto'><br><br>"+obj.message+"<br></div></div>";                          
                html += "<div style='padding:20px;text-align:center'>" + "<button type='button' class='gradient-button' data-dismiss='modal'>Cancel</button></div></div>"; 
            } else {
                html = "<div class='modal-body' style='padding:10px;'><div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='assets/tick.jpg' style='width:128px;margin:0px auto'><br><h5 style='line-height:30px;font-size: 16px;margin-bottom:0px'>"+obj.message+"</h5><br><a href='' class='btn btn-primary'>Continue</button></div></div>";
                html += "</div>"; 
                $('#ConfirmationPopup').modal("show");
            }
            $("#confrimation_text").html(html);
            
        });
    }
 
 function EditDateandCostDetails(DateandCostID) {   
        $("#confrimation_text").html(loading);
        $.ajax({url:'webservice.php?action=EditDateandCostDetails&DateandCostID='+DateandCostID,success:function(data){
            $("#confrimation_text").html(data);
            $('#ConfirmationPopup').modal("show");
        }});
    }
    
    function UpdateDateandCostDetails() {
        var param = $( "#EditDateandCostFrom").serialize();
        $("#confrimation_text").html(loading);
        $.post( "webservice.php?action=SubmitUpdateDateandCostDetails",param,function(data) {                                       
            var obj = JSON.parse(data); 
            var html = "";                                                                              
            if (obj.status=="failure") {                                                                                                                                                                                                                                                                 
                html = "<div class='modal-body' style='padding:10px;'><div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='assets/accessdenied.png' style='width:128px;margin:0px auto'><br><br>"+obj.message+"<br></div></div>";                          
                html += "<div style='padding:20px;text-align:center'>" + "<button type='button' class='gradient-button' data-dismiss='modal'>Cancel</button></div></div>"; 
            } else {
                html = "<div class='modal-body' style='padding:10px;'><div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='assets/tick.jpg' style='width:128px;margin:0px auto'><br><h5 style='line-height:30px;font-size: 16px;margin-bottom:0px'>"+obj.message+"</h5><br><a href='' class='btn btn-primary'>Continue</button></div></div>";
                html += "</div>"; 
                $('#ConfirmationPopup').modal("show");
            }
            $("#confrimation_text").html(html);
            
        });
    }
    function ViewEnquiryDetails(EnquiryID) {   
        $("#confrimation_text").html(loading);
        $.ajax({url:'webservice.php?action=ViewEnquiryDetails&EnquiryID='+EnquiryID,success:function(data){
            $("#confrimation_text").html(data);
            $('#ConfirmationPopup').modal("show");
        }});
    }
    function ViewEnquiryByDate(DateandCostID,rowid) {   
        $("#EnquiryDetails").html(loading);
        $.ajax({url:'webservice.php?action=ViewEnquiryByDate&DateandCostID='+DateandCostID+'&rowid='+rowid,success:function(data){
            $("#EnquiryDetails_"+rowid).last().after(data);
        }});                                                               
    }                                                                                                             
     
     function CallConfirmationDeleteDateCost(DateandCostID){
        var txt = '<form action="" method="POST" id="DateandCostFrm'+DateandCostID+'">'
                        +'<input type="hidden" value="'+DateandCostID+'" id="DateandCostID" Name="DateandCostID">'
                        +'<div class="form-group row">'
                        +'<div class="col-sm-12" style="text-align:center">'
                            +'CONFIRMATION'
                        +'</div>'
                   +'</div>'
                   +'<div class="form-group row">'
                        +'<div class="col-sm-12" style="text-align:left">'
                        +'Are you sure want to delete date and cost?'
                        +'</div>'
                    +'</div>'
                    +'<div style="padding:20px;text-align:center">'
                        +'<button type="button" class="btn btn-outline-danger" data-dismiss="modal" >Cancel</button>&nbsp;&nbsp;&nbsp;'
                        +'<button type="button" class="btn btn-success" onclick="DeleteDateandCost(\''+DateandCostID+'\')" >Yes, Confirm</button>'
                     +'</div></form>';  
            $('#confrimation_text').html(txt);                                       
            $('#ConfirmationPopup').modal("show");
    } 
    function DeleteDateandCost(DateandCostID) {
     var param = $( "#DateandCostFrm"+DateandCostID).serialize();
    $("#confrimation_text").html(loading);
    $.post( "webservice.php?action=DeleteDateandCost",param,function(data) {
        var obj = JSON.parse(data); 
        var html = "";                                                                              
        if (obj.status=="failure") {
            html = "<div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='assets/accessdenied.png' style='width:128px'><br><br>"+obj.message+"<br></div></div>";
            html += "<div style='padding:20px;text-align:center'>" + "<button type='button' class='btn btn-outline-danger' data-dismiss='modal'>Cancel</button></div>"; 
        } else {
            html = "<div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='assets/tick.jpg' style='width:128px'><br><br>"+obj.message+"<br></div></div>";
            html += "<div style='padding:20px;text-align:center'>" + "<a href='' class='btn btn-outline-danger'>Continue</a></div>"; 
            $('#ConfirmationPopup').modal("show");
        }                                                                                                 
        $("#confrimation_text").html(html);
        
    });
}
function CallConfirmationDeleteDayEvent(DayandEventID){
        var txt = '<form action="" method="POST" id="DayandEventDeleteFrm'+DayandEventID+'">'
                        +'<input type="hidden" value="'+DayandEventID+'" id="DayandEventID" Name="DayandEventID">'
                        +'<div class="form-group row">'
                        +'<div class="col-sm-12" style="text-align:center">'
                            +'CONFIRMATION'
                        +'</div>'
                   +'</div>'
                   +'<div class="form-group row">'
                        +'<div class="col-sm-12" style="text-align:left">'
                        +'Are you sure want to delete day and event?'
                        +'</div>'
                    +'</div>'
                    +'<div style="padding:20px;text-align:center">'
                        +'<button type="button" class="btn btn-outline-danger" data-dismiss="modal" >Cancel</button>&nbsp;&nbsp;&nbsp;'
                        +'<button type="button" class="btn btn-success" onclick="DeleteDayandEvent(\''+DayandEventID+'\')" >Yes, Confirm</button>'
                     +'</div></form>';  
            $('#confrimation_text').html(txt);                                       
            $('#ConfirmationPopup').modal("show");
    } 
    function DeleteDayandEvent(DayandEventID) {
     var param = $( "#DayandEventDeleteFrm"+DayandEventID).serialize();
    $("#confrimation_text").html(loading);
    $.post( "webservice.php?action=DeleteDayandEvent",param,function(data) {
        var obj = JSON.parse(data); 
        var html = "";                                                                              
        if (obj.status=="failure") {
            html = "<div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='assets/accessdenied.png' style='width:128px'><br><br>"+obj.message+"<br></div></div>";
            html += "<div style='padding:20px;text-align:center'>" + "<button type='button' class='btn btn-outline-danger' data-dismiss='modal'>Cancel</button></div>"; 
        } else {
            html = "<div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='assets/tick.jpg' style='width:128px'><br><br>"+obj.message+"<br></div></div>";
            html += "<div style='padding:20px;text-align:center'>" + "<a href='' class='btn btn-outline-danger'>Continue</a></div>"; 
            $('#ConfirmationPopup').modal("show");
        }                                                                                                 
        $("#confrimation_text").html(html);
        
    });
} 
function AddAdditionalDetails() {
         var param = $( "#additionparamsFrm").serialize();
        $("#confrimation_text").html(loading);
        $.post( "webservice.php?action=SubmitAdditionalDetails",param,function(data) {                                       
            var obj = JSON.parse(data); 
            var html = "";                                                                              
            if (obj.status=="failure") {                                                                                                                                                                                                                                                                                        
                html = "<div class='modal-body' style='padding:10px;'><div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='assets/accessdenied.png' style='width:128px;margin:0px auto'><br><br>"+obj.message+"<br></div></div>";                          
                html += "<div style='padding:20px;text-align:center'>" + "<button type='button' class='gradient-button' data-dismiss='modal'>Cancel</button></div></div>"; 
            } else {
                html = "<div class='modal-body' style='padding:10px;'><div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='assets/tick.jpg' style='width:128px;margin:0px auto'><br><h5 style='line-height:30px;font-size: 16px;margin-bottom:0px'>"+obj.message+"</h5><br><a data-dismiss='modal' class='btn btn-primary' style='color:white'>Continue</button></div></div>";
                html += "</div>"; 
                $('#ConfirmationPopup').modal("show");
            }
            $("#confrimation_text").html(html);
            
        });
    }
 
 </script>