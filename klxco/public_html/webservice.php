<?php
include_once("config.php");
    
     
    echo $_REQUEST['action']();
    
    function getSubcategory($maincategory="") {
        
        global $mysql;
        $categoryID = ($maincategory!="") ? $maincategory : $_REQUEST['categoryID'];
        
        $html = '<select  name="subcategory" required id="subcategory" class="form-control">';
        $subCategories = JPostads::getSubcategories($categoryID);
        if (isset($_GET['f']) && $_GET['f']==1) {
            $html .= "<option value='0'>All SubCategories (".sizeof($subCategories).")</option>";
        }
            foreach($subCategories as $r) {
                if (isset($_GET['sCategoryID'])) {
                    $html .= '<option value="'.$r['subcateid'].'"    '.(($_GET['sCategoryID']==$r['subcateid']) ? ' selected=selected ':'').'              >'.$r['subcatename'].'</option>';
                } else {
                    $html .= '<option value="'.$r['subcateid'].'">'.$r['subcatename'].'</option>';    
                }
                                          
            }
        $html .='</select>';
        $total_ads_incurrent_category = $mysql->select("Select * from _jpostads where postedby='".$_SESSION['USER']['userid']."' and categid='".$categoryID."'");                 
        if (sizeof($total_ads_incurrent_category)<4){
            $category_info = "<script>$('#form_data').show();document.getElementById('category_info').innerHTML=\"<div style='padding:10px;padding-left:0px;color:#4263eb;font-size:12px'>In this category, You have left ".(4-sizeof($total_ads_incurrent_category))." free ads. or   <a href='https://www.klx.co.in/in/upgrade/c0' class='btn btn-primary btn-sm' style='padding:3px 8px;float-right'>Upgrade Package</a></div>\";</script>";
        } else {
            $usr_packages = $mysql->select("select * from _tbl_user_packages where UserID='".$_SESSION['USER']['userid']."' and CategoryID='".$categoryID."'");
            
            if (sizeof($usr_packages)==0) {
                $category_info = "<script>$('#form_data').hide();document.getElementById('category_info').innerHTML=\"<div style='padding:10px;padding-left:0px;color:#4263eb;font-size:12px'>In this category, You have reached your free limits. You wait for expire posted ads or  <a href='https://www.klx.co.in/in/upgrade/c0' class='btn btn-primary btn-sm' style='padding:3px 8px;float-right'>Upgrade Package</a></div>\";</script>";    
            } else {
                //$usr_packages = $mysql->select("select * from _tbl_user_packages where UserID='".$_SESSION['USER']['userid']."' and CategoryID='".$categoryID."' and RemainingAds>0 AND IsExpired=0");
                $usr_packages = $mysql->select("select * from _tbl_user_packages where UserID='".$_SESSION['USER']['userid']."' and CategoryID='".$categoryID."' and PostedAds<=NumberOfAds and date('".date("Y-m-d")."')<=date(PackageTo)");
                if (sizeof($usr_packages)==0) {
                    $category_info = "<script>$('#form_data').hide();document.getElementById('category_info').innerHTML=\"<div style='padding:10px;padding-left:0px;color:#4263eb;font-size:12px'>In this category, Your package(s) may be expired. You wait for expire posted  ads or  <a href='https://www.klx.co.in/in/upgrade/c0' class='btn btn-primary btn-sm' style='padding:3px 8px;float-right'>Upgrade Package</a></div>\";</script>";    
                }   else {
                    $adspackage = $mysql->select("select * from _tbl_adsPackage where AdPackageID='".$usr_packages[0]['PackageID']."'");
                    $category_info = "<script>$('#form_data').show();document.getElementById('category_info').innerHTML=\"<div style='padding:10px;padding-left:0px;color:#4263eb;font-size:12px'>In this category, You have left ".$usr_packages[0]['RemainingAds']." ads [Package:".$adspackage[0]['PackageTitle']."]</div>\";</script>";    
                }
            }
        }
        
        if($categoryID==0) {
            $category_info = "<script>$('#form_data').hide();document.getElementById('category_info').innerHTML='';</script>";
        }
        
            return $category_info.$html;
    }
    function getAdtype() {
        
        global $mysql;
        $categoryID = $_REQUEST['categoryID'];
        
        $html = '<select class="form-control"  name="adtype" id="adtype">';
            foreach(JPostads::getAdtypes($categoryID) as $r) {
                $html .= '<option value="'.$r['typeid'].'">'.$r['typename'].'</option>';
            }
        $html .='</select>';
            return $html;
    }
    
     function getBrand() {
            
            global $mysql;
            $dNames = JPostads::getBrandNames($_REQUEST['typeid']);
            $html = '<select class="form-control" name="Brand" id="Brand" style="width:100%" >';
            if (isset($_GET['f']) && $_GET['f']==1) {
                $html .= "<option value='0'>All Models (".sizeof($dNames).")</option>";
            }
            if($_GET['typeid']==0){                                                       
                $html .= '<option value="0" selected="selected">Select Model</option>';   
                $html .='</select>';
            return $html;  
            }else { 
            if (sizeof($dNames)>0) {
                foreach($dNames as $r) {
                    if (isset($_GET['brandid'])) {
                        $html .= '<option value="'.$r['brandid'].'"   '.(($_GET['brandid']==$r['brandid']) ? ' selected=selected ':'').'>'.$r['brandname'].'</option>';
                    } else {
                        $html .= '<option value="'.$r['brandid'].'">'.$r['brandname'].'</option>';    
                    }
                    
                }
            } else {
               
               $html .= '<option value="0" selected="selected">Select Brand</option>';  
            }
            $html .='</select>';                                                                         
            return $html;
            }                                
        }   
        
    function getModel() {
            
            global $mysql;
            $dNames = JPostads::getModels($_REQUEST['brandid']);
            $html = '<select class="form-control" name="Model" id="Model" style="width:100%" onchange="getVarient($(this).val())">';
            if (isset($_GET['f']) && $_GET['f']==1) {
                $html .= "<option value='0'>All Models (".sizeof($dNames).")</option>";
            }
            if($_GET['brandid']==0){
                $html .= '<option value="0" selected="selected">Select Model</option>';   
                $html .='</select>';
            return $html;  
            }else { 
            if (sizeof($dNames)>0) {
                foreach($dNames as $r) {
                    if (isset($_GET['ModelID'])) {
                        $html .= '<option value="'.$r['ModelID'].'"   '.(($_GET['ModelID']==$r['ModelID']) ? ' selected=selected ':'').'>'.$r['model'].'</option>';
                    } else {
                        $html .= '<option value="'.$r['ModelID'].'">'.$r['model'].'</option>';    
                    }
                    
                }
            } else {
                return  '<input type="text" name="Model" id="Model"  class="form-control" >';
               $html .= '<option value="0" selected="selected">Select Model</option>';  
            }
            $html .='</select>';                                                                         
            return $html;
            }
        }      
        function getVarient() {
            
            global $mysql;
            $dNames = JPostads::getVariants($_REQUEST['modelid']);
            $html = '<select class="form-control" name="Varient" id="Varient" style="width:100%">';
            if (isset($_GET['f']) && $_GET['f']==1) {
                $html .= "<option value='0'>All Varient (".sizeof($dNames).")</option>";
            }
             if($_GET['modelid']==0){
                $html .= '<option value="0" selected="selected">Select Varient</option>';   
                $html .='</select>';
            return $html;  
            }else {
            if (sizeof($dNames)>0) {
                foreach($dNames as $r) {
                    if (isset($_GET['VarID'])) {
                        $html .= '<option value="'.$r['VarID'].'"   '.(($_GET['VarID']==$r['VarID']) ? ' selected=selected ':'').'>'.$r['variant'].'</option>';
                    } else {
                        $html .= '<option value="'.$r['VarID'].'">'.$r['variant'].'</option>';    
                    }
                    
                }
            } else {
                
               $html .= '<option value="0" selected="selected">Select Variant</option>';  
            }
            $html .='</select>';                                                                         
            return $html;
        }
        }
    function getcityname() {
            
            global $mysql;
            $dNames = JPostads::getCityNames($_REQUEST['districtID']);
            $html = '<select class="form-control" name="city" id="city" style="width:100%">';
            if (isset($_GET['f']) && $_GET['f']==1) {
                $html .= "<option value='0'>All city (".sizeof($dNames).")</option>";
            }
            $html.='<option value="0" selected="selected">Select City Name</option>';
            if (sizeof($dNames)>0) {
                foreach($dNames as $r) {
                    if (isset($_GET['cityID'])) {
                        $html .= '<option value="'.$r['citynameid'].'"   '.(($_GET['cityID']==$r['cityid']) ? ' selected=selected ':'').'>'.$r['cityname'].'</option>';
                    } else {
                        $html .= '<option value="'.$r['citynameid'].'">'.$r['cityname'].'</option>';    
                    }
                    
                }
            } else {
                $s = $mysql->select("select * from _jcitynames where distcid='".$_REQUEST['districtID']."'");
               $html .= '<option value="0" selected="selected">Select City Name</option>';  
            }
            $html .='</select>';
            return $html;
        }
    function getDistrict() {
            
            global $mysql;
            $dNames = JPostads::getDistricts($_REQUEST['stateID']);
            $html = '<select class="form-control" name="district" id="district"  onchange="getCityName($(this).val())" style="width:100%">';
            if (isset($_GET['f']) && $_GET['f']==1) {
                $html .= "<option value='0'>All Districts (".sizeof($dNames).")</option>";
            }
            $html.='<option value="0" selected="selected">Select District Name</option>';
            if (sizeof($dNames)>0) {
                foreach($dNames as $r) {
                    if (isset($_GET['distID'])) {
                        $html .= '<option value="'.$r['distcid'].'"   '.(($_GET['distID']==$r['distcid']) ? ' selected=selected ':'').'             >'.$r['districtname'].'</option>';
                    } else {
                        $html .= '<option value="'.$r['distcid'].'">'.$r['districtname'].'</option>';    
                    }
                    
                }
            } else {
                $s = $mysql->select("select * from _jstatenames where stateid='".$_REQUEST['stateID']."'");
              // $html .= '<option value="0" selected="selected">'.$s[0]['statenames'].'</option>';  
               $html .= '<option value="0" selected="selected">Select District Name</option>';  
            }
            $html .='</select>';
            return $html;
        }
    function getStateNames() {
            
            global $mysql;
            $statnames = JPostads::getStateNamesByCountry($_REQUEST['countryid']);
            $stateID   = 0;
            $html = '<select class="form-control" name="state" id="state" onchange="getDistrict($(this).val())" style="width:100%">';
            $html.='<option value="0" selected="selected">Select State Name</option>';
            
            if (sizeof($statnames)>0) {
                foreach($statnames as $r) {
                  //  if ($stateID == 0) {
                  //      $stateID = $r['stateid'];                        
                   // }
                    if(isset($_REQUEST['stateid'])){
                       $html .= '<option value="'.$r['stateid'].'" '.(($_REQUEST['stateid']== $r['stateid']) ? "selected='selected'" : "").'>'.$r['statenames'].'</option>';
                    }else {
                    $html .= '<option value="'.$r['stateid'].'">'.$r['statenames'].'</option>';
                    }
                }
            } else {
                $html .= '<option value="0" selected="selected">Select State Name</option>'; 
            }
            $html .= '</select>';
            if(!(isset($_REQUEST['stateid']))){
            $html .= '<script>getDistrict("'.$stateID.'");</script>';
            }
            return $html;
            
        }
    function addFav() {
         
        global $mysql;

        if($_SESSION['USER']['userid']>0){
               $viewbyuserid=$_SESSION['USER']['userid'];
           } else {
               $viewbyuserid="0";
           }                                                             
        
        if($_SESSION['USER']['userid']>0){
            
                $param=array("userid"=>$_SESSION['USER']['userid'],"adid"=>$_REQUEST['postId']);
                if (JFavorites::addFavorites($param)>0)  {
                    
                    $AddInfo = $mysql->select("select * from _jpostads where postadid='".$_REQUEST['postId']."'");
                                                                                                                                             
                    $viewlog = $mysql->insert("_tbl_favourite_add_logs",array("AddID"           => $_REQUEST['postId'],
                                                                              "AddByUserID"     => $AddInfo[0]['postedby'],
                                                                              "ViewedOn"        => date("Y-m-d H:i:s"),
                                                                              "LikedByUserID"   => $viewbyuserid));  
                                                                              
                    $postedByInfo = $mysql->select("select * from _jusertable where userid='".$AddInfo[0]['postedby']."'");
                    $logview = $mysql->select("select * from _tbl_favourite_add_logs where AddID='".$_REQUEST['postadid']."' and LikedByUserID='".$_SESSION['USER']['userid']."'");                                                           
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
                                    Your ad is liked by '.$_SESSION['USER']['personname'].'
                                    <br><br>
                                    <table>
                                        <tr>
                                            <td>
                                                <div style="border:1px solid #ccc;padding:20px;text-align:center;width: 100px;height: 100px;">
                                                    <img src="'.base_url.$filename.'" style="width: 100px;height: 100px;"><br><br>
                                                    <b><span style="font-size:15px;">AD : '.$d[0]['postadid'].'</span></b><br>
                                                </div><br><br>
                                                    Liked By : <br>
                                                    '.$_SESSION['USER']['personname'].'<br>
                                                    '.$_SESSION['USER']['mobile'].'<br>
                                                    '.$_SESSION['USER']['email'].'<br><br><br>
                                            </td>
                                            <td style="vertical-align:top;padding-left:10px">
                                                <b><span style="font-size:20px;">'.$AddInfo[0]['title'].'</span></b><br>
                                                '.substr($AddInfo[0]['content'],0,200).'...
                                            </td>
                                        </tr>
                                    </table>
                                    <p style="text-align:center">
                                        <a href="'.path_url.'v'.$AddInfo[0]['postadid'].'-'.$AddInfo[0]['title'].'" style="font-size:16px;font-family:Poppins,sans-serif;font-weight:600;color:#ffffff;text-decoration:none;background-color:#3a77ff;border-top:12px solid #3a77ff;border-bottom:12px solid #3a77ff;border-left:36px solid #3a77ff;border-right:36px solid #3a77ff;display:inline-block">VIEW AD</a>&nbsp;&nbsp;
                                    </p>             
                                    <br> 
                                    Thanks <br>
                                    KLX Team
                                </div>
                            </div>';

                            $mparam['MailTo']=$postedByInfo[0]['email'];
                            $mparam['MemberID']=$postedByInfo[0]['userid'];
                            $mparam['Subject']="KLX :) Your ad is Liked by ".$_SESSION['USER']['personname'];
                            $mparam['Message']=$message;
                            MailController::Send($mparam,$mailError);    
                        
                    }
                    
                    $return = "<script>alert('Ad added to your favourite');</script>";
                    if ($_REQUEST['rurl']==1) { 
                           $return .="<a class='a' href='javascript:void(0);' style='color:red;font-weight:bold;' onclick=\"removeFav('".$_REQUEST['postId']."');\" >Remove</a>";
                    } else {  
                           $return .="<a class='a' href='myfavorites.php' style='color:green;font-weight:bold;' >Added to your Favorites</a>&nbsp;&nbsp;
                            <a class='a' href='javascript:void(0);' style='color:red;font-weight:bold;' onclick=\"removeFav('".$_REQUEST['postId']."');\" >Remove</a>";
                    }
                    return $return;
                } else {
                    return "<script>alert('Error: Adding ad to your favourite');</script><a class='a' href='javascript:void(0);' onclick=\"addFav('".$_REQUEST['postId']."');\" >Add To Favorites</a>";    
                }
        }else{
            return "<script>alert('Error: Please Login to add to your favourite');</script><a class='a' href='javascript:void(0);' onclick=\"addFav('".$_REQUEST['postId']."');\" >Add To Favorites</a>";    
        } 
        
    }
    
    function removeFav() {
        
        global $mysql;

         if ($_REQUEST['rurl']==1) {
            $param=array("userid"=>$_SESSION['USER']['userid'],"postadid"=>$_REQUEST['postId']);
                if (JFavorites::deleteFavorites($param)>0);{
                    return "<script>alert('Ad Removed from your favourite');\$('#adcontainer_".$_REQUEST['postId']."').hide(500);</script>";  
                }
         } else {
             return "<script>alert('Ad Removed from your favourite');</script><a class='a' href='javascript:void(0);' onclick=\"addFav('".$_REQUEST['postId']."');\" >Add To Favorites</a>";    
         }
    }
    
    function getRecentAds() {
    $i=0; 
    $ads = JPostads::getPostad(0," and p.ispublish=1 and p.postadid > ".$_REQUEST['adid']." order by p.postadid desc limit 0,10");
    if (sizeof($ads)>0) {
        foreach($ads as $postad){
            if ($i==0) {
                $result .= "<script> adid='".$postad['postadid']."'; </script>";
            }
            $i++;
            $result .= CommonController::displayAd($postad);
        }
    }
    
    return $result;
    
    }
    
    function sendMessage() {
        global $mysql;
        $touserid = $mysql->select("select * from _jpostads where postadid='".$_POST['adid']."'");
        $chatRoom = $mysql->select("select * from _chat_initiate where md5(concat('j2jsoftwaresolutoins_',ChatID))='".$_POST['chatRoom']."'");
        if ($_GET['x']==1) {
                if (strlen(trim($_POST['message']))!=0) {
                    
                   
                    $mysql->insert("_tblmessages",array(
                                "chatroomid"   => $chatRoom[0]['ChatID'],
                                "adpostedid"   => $chatRoom[0]['adPosted'],
                                "adviewedid"   => $chatRoom[0]['adViewed'],
                                "fromuserid"   => $_SESSION['USER']['userid'],
                                "touserid"     => isset($_POST['cuserid']) ? $_POST['cuserid'] : $touserid[0]['postedby'],
                                "toadid"       => $_POST['adid'],
                                "message"      => $_POST['message'],
                                "sentby"       => $_SESSION['USER']['userid'], 
                                "messagedon"   => date("Y-m-d H:i:s")));
                    
                     
                }
        }                                                  
        
        //if (isset($_POST['cuserid'])) {
         //   $data = $mysql->select("select * from _tblmessages where (fromuserid='".$_SESSION['USER']['userid']."' and touserid='".$_POST['cuserid']."') or (touserid='".$_SESSION['USER']['userid']."' and fromuserid='".$_POST['cuserid']."' ) and toadid='".$_POST['adid']."'");
        //} else {
           //  $data = $mysql->select("select * from _tblmessages where (fromuserid='".$_SESSION['USER']['userid']."' or touserid='".$_SESSION['USER']['userid']."') and toadid='".$_POST['adid']."'");    
       // }
        $data = $mysql->select("select * from _tblmessages where chatroomid='".$chatRoom[0]['ChatID']."'");
        $t = "";
        foreach($data as $d) {                   
            
            if ($d['sentby']==$_SESSION['USER']['userid']) {    
              //  if (strlen(trim($d['message']))>0) {
                $t .= "<div style='width:100%;clear:both;text-align:right'>
                            <span style='font-size:11px;clear:both;border:1px solid #ccc;border-radius:5px;background:#ccc;padding:5px;margin:10px;max-width:70%;display:inline-block;'>".$d['message']."</span>
                      </div>";    
             //   }
            } else {
              //  if (strlen(trim($d['message']))>0) {
                $t .= "<div style='width:100%;clear:both'>
                    <span style='font-size:11px;clear:both;border:1px solid #fff;border-radius:5px;background:#fff;padding:5px;margin:10px;max-width:70%;display:inline-block;'>".$d['message']."</span>
                    
                    </div>";
              //  }
            }
                                                   
        }
        $udata = "";
        if (isset($_POST['cuserid'])) {
            $u  = $mysql->select("select * from _jusertable where userid='".$_POST['cuserid']."'");
            $des = "<table><tr><td><i class=flaticon-user-1 style=font-size:32px></i></td><td style=line-height:13px;padding-left:5px;>".$u[0]['personname']."<br><span style=font-size:11px;color:#666>".$u[0]['email']."<br>".$u[0]['mobile']."</span></td></tr></table>";
            $udata = "<script>$('#clientInfo').html('".$des."');</script>";
        }
       
        return $t.$udata;               
    }
    
    function moreads() {
            global $config,$mysql;
            
            $d = isset($_GET['d']) ? $_GET['d'] : 0;
            $s = isset($_GET['s']) ? $_GET['s'] : 0;
            $ads = JPostads::getAds(1,$d,$_GET['cnt']*24,24,$s);    
            
            if (true) 
            {
    ?>
                <?php foreach ($ads as $ad) { 
                    
                    if ($ad['featured']=='1') {
                            $style = "style='border:3px solid yellow'";
                            $p = "<div style='background:yellow;color:#222;padding:2px;text-decoration:none;font-weight:bold;'>TOP AD</div>";
                        } else {
                            $style = " ";
                            $p = "";
                        }
                    ?>
                <div class="col col-lg-3 ">           
                  <div class="card adbox<?php echo $append;?>" <?php echo $style;?>>
                        <div style="text-align: right;padding:10px;">
                            <?php 
                            $dup = $mysql->select("select * from _jfeatures_likedcontact where userid='".$_SESSION['USER']['userid']."' and adid='".$ad['postadid']."'");
                            if (sizeof($dup)==0) {                                                          
                        ?>
                            <span style="float:right"  onclick="likead('<?php echo md5($ad['postadid']."jEyArAj[at]DeVeLoPeR");?>')"><i class="flaticon-like"></i></span>
                        <?php }else { ?>
                             <span style="float:right;color:red" onclick="likead('<?php echo md5($ad['postadid']."jEyArAj[at]DeVeLoPeR");?>')"><i class="fas fa-heart"></i></span>  
                        <?php } ?>
                            
                        </div>  
                        <a href="<?php echo path_url."v".$ad['postadid']."-".parseTextToURL($ad['title']);?>">
                        <div>
                        <?php echo $p; ?>
                        <div class="p-2" style="text-align: center" onclick="viewad('<?php echo $ad['postadid']."-".parseTextToURL($ad['title']);?>')">
                            <img class="card-img-top rounded adImage" src="<?php echo base_url;?><?php echo ((strlen(trim($ad['filepath1']))>4) && file_exists("assets/".$config['thumb'].$ad['filepath1'])) ? "assets/".$config['thumb'].$ad['filepath1'] : "assets/cms/".Jca::getAppSetting('noimage');?>" alt="Product 7" >
                        </div>
                        <div class="card-body pt-2">
                            <h3 class="mb-0 fw-bold">₹ <?php echo $ad['amount'];?>
                            
                            </h3>
                            <div  onclick="viewad('<?php echo $ad['postadid'];?>')">
                                <p class="text-muted small mb-3 description_level1" style="height:60px !important"><?php echo  substr($ad['title'],0,60);?> <?php echo strlen($ad['title'])>60 ? "..." : "";?></p>
                                <p class="text-muted small m-0" style="font-size:11px;">
                                     <?php
                                    $city = JPostads::getCity($ad['cityid']);
                                    $districtname = JPostads::getDistrict($ad['distcid']);
                                     echo $districtname[0]['districtname']. " / ".$city[0]['cityname'];
                                     ?>
                                    <p class="postedon"><?php echo date("M d",strtotime($ad['postedon']));?></p>
                                </p>
                            </div>
                        </div>
                        </div>
                        </a>
                    </div>
                  </div>
                <?php } ?>
                
    <?php } else {?>
        <script>$('#loadmore').hide();</script>
    <?php } ?>
        <?php
    }
    
    
    function getUpgradePackages() {
        global $mysql;
        $uPackages = $mysql->select("select * from _tbl_adsPackage where Categories like '%-".$_GET['categoryID']."-%'");
        ?>
        <form action="https://www.klx.co.in/pay_upgrade_instamajo.php" method="post">
            <input type="hidden" value="<?php echo $_GET['categoryID'];?>" name="CategoryID">
            <div class="row">
                <?php foreach($uPackages as $u) { ?>
                <div class="col-sm-12" style="margin-bottom:10px;">
                    <div style="border:1px solid #82d6e5;padding:0px;padding-right:0px;padding-left:0px" onclick="$('#submitbtn').val('Pay Rs. <?php echo $u['SellingPrice'];?>');$('#submitbtn').show(100)">
                        <div>
                            <div class="custom-control custom-radio" style="background:#edfcff;margin-right:0px;padding-top:5px;padding-bottom:7px;width:100%">
                                <input type="radio" class="custom-control-input"  id="Plan_<?php echo $u['AdPackageID'];?>" name="Plan" value="<?php echo $u['AdPackageID'];?>">
                                <label class="custom-control-label" for="Plan_<?php echo $u['AdPackageID'];?>" ><b style="font-size:17px;"><?php echo $u['PackageTitle'];?></b></label>
                                <!--<span style="color:#999;font-size:12px">Reach upto 10 times more buyers</span></label>-->
                            </div> 
                            <div style="border-top:1px solid #ccc;text-align:center;padding:10px;">
                                <span style="font-weight:bold">INR <?php echo $u['SellingPrice'];?></span>
                                <?php if ($u['SellingPrice']!=$u['PackageCost']) {?>
                                    <br><span style="color:#888"><strike>INR <?php echo $u['PackageCost'];?></strike></span>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php } ?>
                <div class="col-sm-12" style="margin-top:10px">
                    <input type="submit" value="" id="submitbtn" name="submitbtn" class="btn btn-primary" style="width:100%;display:none">
                </div>
            </div>
        </form>
        <?php
    }
    
     function jgetUpgradePackages() {
        global $mysql;
        $uPackages = $mysql->select("select * from _tbl_adsPackage where Categories like '%-".$_GET['categoryID']."-%'");
        ?>
           <select   name="packageid" id="packageid"  >
        <?php foreach($uPackages as $u) { ?>
        
                               <option value="<?php echo $u['AdPackageID'];?>"><?php echo $u['PackageTitle'];?> - INR <?php echo $u['SellingPrice'];?>   (Package CostINR <?php echo $u['PackageCost'];?>)</option>
                <?php } ?>
          </select>     
         
        <?php
    }
    
     function jgetUserInfo() {
        global $mysql;
        $uPackages = $mysql->select("select * from _jusertable where userid ='".$_GET['userID']."'");
        ?>
        Name:<?php echo $uPackages[0]['personname'];?><br>
        Email:<?php echo $uPackages[0]['email'];?><br>
        Phone Number:<?php echo $uPackages[0]['mobile'];?><br>
         
        <?php
    }
    function FranchiseeWalletRequest() {
    global $mysql,$app;
    
    $id = $mysql->insert("_tbl_wallet_request",array("FranchiseeID"       => $_SESSION['FRANCHISEE']['userid'],
                                                         "TransferTo"     =>$_POST['TransferTo'],
                                                         "Amount"         =>$_POST['Amount'],
                                                         "TransferMode"   =>$_POST['Mode'],
                                                         "TxnDate"        =>$_POST['TxnDate'],
                                                         "Remarks"        =>$_POST['Remarks']));   
    $mem = $mysql->select("select * from _tbl_franchisee where MemberID='".$_SESSION['USER']['userid']."'");
    if(sizeof($id)>0){
        $result = array();
        $result['status']="Success";
        $result['message']="Wallet Request Sent."; 
        $message = "Dear ".$mem[0]['FranchiseeName'].", Your account wallet request has been sent";   
      
         // MobileSMS::sendSMS($mem[0]['MobileNumber'],$message,$id);  
          $mparam['MailTo']=$mem[0]['EmailID'];
          $mparam['MemberID']=$id;
          $mparam['Subject']="Wallet Request Sent";
          $mparam['Message']=$message;
          MailController::Send($mparam,$mailError);
         
        return json_encode($result);
    } else {
       $result = array();
        $result['status']="failure";
        $result['message']="Wallet Request Sent failed.";  
        return json_encode($result); 
    }
} 
    
    function ApproveFranchiseeWithdrawalRequest() {
    
    global $mysql,$app,$application;  
         
      $id = $mysql->insert("_tbl_accounts",array("FranchiseeID" => $_POST['FranchiseeID'],
                                                 "TxnDate"      =>date("Y-m-d H:i:s"),
                                                 "Particulars"  => "Approve Withdrawal Request",
                                                 "TxnValue"     => $_POST['Amount'],
                                                 "Credit"       => "0",
                                                 "Debit"        => $_POST['Amount'],
                                                 "Balance"      => $balance,
                                                 "TxnID"        => $_POST['RequestID']));
      $balance = $application->getBalance($_POST['FranchiseeID']);
             $mysql->execute("update _tbl_accounts set Balance='".$balance."' where AccountID='".$id."'");
             $mysql->execute("update _tbl_withdrawal_request set Status='1', ApprovedOn='".date("Y-m-d H:i:s")."' where RequestID='".$_POST['RequestID']."'");
             $mem = $mysql->select("select * from _tbl_franchisee where userid='".$_POST['FranchiseeID']."'");
      if(sizeof($id)>0){
            $message = "Dear ".$mem[0]['FranchiseeName'].", Your withdrawal request has been approved. Your wallet has debitted Rs. ".$_POST['Amount']."  Wallet Balance Rs.".number_format($app->getBalance($_POST['FranchiseeID']),2);
                         // MobileSMS::sendSMS($mem[0]['MobileNumber'],$message,$id);  
                          $mparam['MailTo']=$mem[0]['EmailID'];
                          $mparam['MemberID']=$mem[0]['userid'];
                          $mparam['Subject']="Withdrawal Request Approved";
                          $mparam['Message']=$message;
                          MailController::Send($mparam,$mailError);
          
          
        $result = array();
        $result['status']="Success";
        $result['message']="Approved.";  
        return json_encode($result);
    } else {
        $result = array();
        $result['status']="failure";
        $result['message']="Failed.";  
        return json_encode($result);
    }
    
}
function RejectFranchiseeWithdrawalRequest() {
    
    global $mysql,$app;
   
      $id=$mysql->execute("update _tbl_withdrawal_request set Status='2', RejectedOn='".date("Y-m-d H:i:s")."' where RequestID='".$_POST['RequestID']."'");
      $mem = $mysql->select("select * from _tbl_franchisee where userid='".$_POST['FranchiseeID']."'");
      if(sizeof($id)>0){
         $message = "Dear ".$mem[0]['FranchiseeName'].", Your withdrawal request has been rejected";
                        //  MobileSMS::sendSMS($mem[0]['MobileNumber'],$message,$id);  
                          $mparam['MailTo']=$mem[0]['EmailID'];
                          $mparam['MemberID']=$mem[0]['userid'];
                          $mparam['Subject']="Withdrawal Request Rejected";
                          $mparam['Message']=$message;
                          MailController::Send($mparam,$mailError);
          
        $result = array();
        $result['status']="Success";
        $result['message']="Rejected.";  
        return json_encode($result);
    } else {
        $result = array();
        $result['status']="failure";
        $result['message']="Rejection Failed.";  
        return json_encode($result);
    }
    
} 

function UpdateCountryName() {
    
    global $mysql,$app;
   
      $id=$mysql->execute("update _jcountrynames set countryname='".$_POST['CountryName']."' where countryid='".$_POST['CountryID']."'");
      if(sizeof($id)>0){
        $result = array();
        $result['status']="Success";
        $result['message']="Country Name updated.";  
        return json_encode($result);
    } else {
        $result = array();
        $result['status']="failure";
        $result['message']="Operator currently unavailable. please try later.";  
        return json_encode($result);
    }
    
} 

function UpdateStateName() {
    
    global $mysql,$app;
   
      $id=$mysql->execute("update _jstatenames set statenames='".$_POST['StateName']."' where stateid='".$_POST['StateID']."'");
      if(sizeof($id)>0){
        $result = array();
        $result['status']="Success";
        $result['message']="State Name updated.";  
        $result['countryid']=$_POST['CountryID'];  
        return json_encode($result);
    } else {
        $result = array();
        $result['status']="failure";
        $result['message']="Operator currently unavailable. please try later.";  
        return json_encode($result);
    }
} 


/* City name, District Name  : need to be check its not blank, duplicate */

/* Verified by Jeyaraj Aug 03, 2020 */
function UpdateDistrictName() {
    global $mysql,$app;
    $id=$mysql->execute("update _jdistrictnames set districtname='".$_POST['DistName']."' where distcid='".$_POST['distcid']."'");
    $data = $mysql->execute("select * from  _jdistrictnames where distcid='".$_POST['distcid']."'");
    $result = array();
    $result['countryid'] = $data[0]['countryid'];  
    $result['stateid']   = $data[0]['stateid'];  
    if($id>0){
        $result['status']  = "success";
        $result['message'] = "District Name updated.";  
    } else {
        $result['status']  = "failure";
        $result['message'] = "Unable to update. please try later.";  
    }
    return json_encode($result);
}

/* Verified by Jeyaraj Aug 03, 2020 */
function deleteDistrictName() {
    global $mysql,$app;
    $data = $mysql->select("select * from _jcitynames where distcid='".$d['distcid']."'");
    $district =$mysql->execute("select * from  _jdistrictnames where distcid='".$_POST['distcid']."'");
    $result = array();
    $result['countryid'] = $district[0]['countryid'];  
    $result['stateid']   = $district[0]['stateid'];  
    if (sizeof($data)>0) {
        $result['status']  = "failure";
        $result['message'] = "Unable to delete. ".sizeof($data)." citynames available";  
   } else {
        $mysql->execute("delete from _jdistrictnames where distcid='".$_POST['distcid']."'");
        $result['status']  = "success";
        $result['message'] = "District Name deleted.";  
    }  
    return json_encode($result);
}

/* Verified by Jeyaraj Aug 03, 2020 */
function UpdateCityName() {
    global $mysql,$app;
    $id=$mysql->execute("update _jcitynames set cityname='".$_POST['cityname']."' where citynameid='".$_POST['citynameid']."'");
    $data=$mysql->select("select * from  _jcitynames  where citynameid='".$_POST['citynameid']."'");
    $result = array();
    $result['countryid'] = $data[0]['countryid'];  
    $result['stateid']   = $data[0]['stateid'];  
    $result['distcid']   = $data[0]['distcid'];  
    if($id>0){
        $result['status']  = "success";
        $result['message'] = "City Name updated.";  
    } else {
        $result['status']  = "failure";
        $result['message'] = "Operator currently unavailable. please try later.";  
    }
    return json_encode($result);
} 

/* Verified by Jeyaraj Aug 03, 2020 */
function deleteCityName() {
    global $mysql,$app;
    $data = $mysql->select("select * from _jpostads where cityid='".$_POST['citynameid']."'");
    $city=$mysql->select("select * from  _jcitynames  where citynameid='".$_POST['citynameid']."'");
    $result = array();
    $result['countryid'] = $city[0]['countryid'];  
    $result['stateid']   = $city[0]['stateid'];  
    $result['distcid']   = $city[0]['distcid']; 
   if (sizeof($data)>0) {
        $result['status']  = "failure";
        $result['message'] = "Unable to delete. ".sizeof($data)." ads available";  
    } else {
        $mysql->execute("delete from _jcitynames where citynameid='".$_POST['citynameid']."'");
        $result['status']  = "success";
        $result['message'] = "City Name deleted.";  
    }  
    return json_encode($result);
}

function UpdateBrandName() {
    global $mysql,$app;
    $id=$mysql->execute("update _jbrandnames set brandname='".$_POST['BrandName']."' where brandid='".$_POST['brandid']."'");
    $result = array();
    $result['subcateid'] = $_POST['subcateid'];  
    $result['categid']   = $_POST['categid'];  
    if($id>0){
        $result['status']  = "success";
        $result['message'] = "Brand Name updated.";  
    } else {
        $result['status']  = "failure";
        $result['message'] = "Unable to update. please try later.";  
    }
    return json_encode($result);
}
function deleteBrandName() {
    global $mysql,$app;
    $data = $mysql->select("select * from _jbrandnames where brandid='".$d['brandid']."'");
    $brand =$mysql->select("select * from  _jbrandnames where brandid='".$_POST['brandid']."'");
    $result = array();
    $result['categid'] = $_POST['categid'];  
    $result['subcateid']   = $_POST['subcateid'];  
    if (sizeof($data)>0) {
        $result['status']  = "failure";
        $result['message'] = "Unable to delete. ".sizeof($data)." brandnames available";  
   } else {
        $mysql->execute("delete from _jbrandnames where brandid='".$_POST['brandid']."'");
        $result['status']  = "success";
        $result['message'] = "Brand Name deleted.";  
    }  
    return json_encode($result);
}
function UpdateModelName() {
    global $mysql,$app;
    $id=$mysql->execute("update _JModels set model='".$_POST['ModelName']."' where ModelID='".$_POST['modelid']."'");
    $result = array();
    $result['subcateid'] = $_POST['subcateid'];  
    $result['categid']   = $_POST['categid'];  
    $result['brandid']   = $_POST['brandid'];  
    if($id>0){
        $result['status']  = "success";
        $result['message'] = "Model Name updated.";  
    } else {
        $result['status']  = "failure";
        $result['message'] = "Unable to update. please try later.";  
    }
    return json_encode($result);
} 
function deleteModelName() {
    global $mysql,$app;
    $data = $mysql->select("select * from _JModels where ModelID='".$d['modelid']."'");
    $model =$mysql->select("select * from  _JModels where ModelID='".$_POST['modelid']."'");
    $result = array();
    $result['categid'] = $_POST['categid'];  
    $result['subcateid']   = $_POST['subcateid'];  
    $result['brandid']   = $_POST['brandid'];  
    if (sizeof($data)>0) {
        $result['status']  = "failure";
        $result['message'] = "Unable to delete. ".sizeof($data)." modelnames available";  
   } else {
        $mysql->execute("delete from _JModels where ModelID='".$_POST['modelid']."'");
        $result['status']  = "success";
        $result['message'] = "Model Name deleted.";  
    }  
    return json_encode($result);
}



    function doPostAd() {
        global $mysql,$app;
        $obj = new CommonController();
        if(isset($_POST["dosave"]) && $_POST['dosave']=="1") {
            $slsubcategory = $mysql->select("select * from _jsubcategory where subcateid='".$_POST['subc']."'");
            $slcategory = $mysql->select("select * from _jcategory where categid='".$slsubcategory[0]['categid']."'");
            $errorMessage= "";
            $errorMessage1= "";
            $packagetxt = "";
            $total_free_ads_incurrent_category = $mysql->select("Select * from _jpostads where AdPackageID='0' and UserPackageID='0' and postedby='".$_SESSION['USER']['userid']."' and categid='".$slsubcategory[0]['categid']."'");                 
            $adType="free";
            if(!($_SESSION['USER']['isstaff'])==1){
            
            if (sizeof($total_free_ads_incurrent_category)<4) {
                $adType="free";
            } else {
                $availableads = $mysql->select("select * from _tbl_user_packages where UserID='".$_SESSION['USER']['userid']."' and CategoryID='".$slsubcategory[0]['categid']."' and PostedAds<=NumberOfAds and date('".date("Y-m-d")."')<=date(PackageTo)");
                if (sizeof($availableads)>0) {
                    $adType="paid";
                } else {
                    return json_encode(array("status"=>"failure","message"=>'Your free limit has completed, Upgrade package and continue to post ads.<a href="https://www.klx.co.in/in/upgrade/c0" class="btn btn-primary btn-sm">View Packages</a>'));
                }
            }
            }
            $param=array("categid"      => $slcategory[0]['categid'],
                         "subcategory"  => $slsubcategory[0]['subcateid'],
                         "title"        => $_POST['title'],
                         "content"      => str_replace("'","\\'",$_POST['content']),
                         "amount"       => $_POST['amount'],
                         "countryid"    => $_POST['countryid'],
                         "state"        => $_POST['state'],
                         "district"     => $_POST['district'],
                         "city"         => $_POST['city'],
                         "location"     => $_POST['location'],
                         "pposted" =>     $_SESSION['USER']['userid'],
                         "postedby"     => $_SESSION['USER']['userid']);
            
            $brandname      = isset($_POST['Brand'])? $_POST['Brand'] : "0";
            $PositionType   = isset($_POST['PositionType'])? $_POST['PositionType'] : "0";
            $salaryPeriod   = isset($_POST['SalaryPeriod'])? $_POST['SalaryPeriod'] : "0";
            $salaryFrom     = isset($_POST['SalaryFrom'])? $_POST['SalaryFrom'] : "0";
            $salaryTo       = isset($_POST['SalaryTo'])? $_POST['SalaryTo'] : "0";
            $Year           = isset($_POST['Year'])? $_POST['Year'] : "0";
            $Fuel           = isset($_POST['Fuel'])? $_POST['Fuel'] : "0";
            $Transmission   = isset($_POST['Transmission'])? $_POST['Transmission'] : "0";
            $KMDriven       = isset($_POST['KMDriven'])? $_POST['KMDriven'] : "0";
            $NoofOwners     = isset($_POST['NoofOwners'])? $_POST['NoofOwners'] : "0";
            $mtype          = isset($_POST['MType'])? $_POST['MType'] : "0";
            $BedRooms       = isset($_POST['BedRooms'])? $_POST['BedRooms'] : "0";
            $BathRooms      = isset($_POST['BathRooms'])? $_POST['BathRooms'] : "0";
            $Furnishing     = isset($_POST['Furnishing'])? $_POST['Furnishing'] : "0";
            $ListedBy       = isset($_POST['ListedBy'])? $_POST['ListedBy'] : "0";
            $SuperBuildUpArea = isset($_POST['SuperBuildUpArea'])? $_POST['SuperBuildUpArea'] : "0";
            $CarpetArea       = isset($_POST['CarpetArea'])? $_POST['CarpetArea'] : "0";
            $BachelorsAllowed = isset($_POST['BachelorsAllowed'])? $_POST['BachelorsAllowed'] : "0";
            $Maintenance      = isset($_POST['Maintenance'])? $_POST['Maintenance'] : "0";
            $TotalFloors      = isset($_POST['TotalFloors'])? $_POST['TotalFloors'] : "0";
            $FloorNo          = isset($_POST['FloorNo'])? $_POST['FloorNo'] : "0";
            $CarParking       = isset($_POST['CarParking'])? $_POST['CarParking'] : "0";
            $Facing           = isset($_POST['Facing'])? $_POST['Facing'] : "0";
            $ProjectName      = isset($_POST['ProjectName'])? $_POST['ProjectName'] : "0";
            $ConstructionStatus = isset($_POST['ConstructionStatus'])? $_POST['ConstructionStatus'] : "0";
            $Washrooms          = isset($_POST['Washrooms'])? $_POST['Washrooms'] : "0";
            $PlotArea           = isset($_POST['PlotArea'])? $_POST['PlotArea'] : "0";
            $MealsIncluded      = isset($_POST['MealsIncluded'])? $_POST['MealsIncluded'] : "0";
            $Varient            = isset($_POST['Varient'])? $_POST['Varient'] : "0";
            $Model              = isset($_POST['Model'])? $_POST['Model'] : "0";
            $brandid            = ($_GET['subc']=="2" || $_GET['subc']=="96" || $_GET['subc']=="61" ) ? $_POST['Brand'] : "0";
            
            if($_SESSION['USER']['isstaff']==1){
                $CustomerName= isset($_POST['CustomerName'])? $_POST['CustomerName'] : "0";
                $CustomerMobileNumber= isset($_POST['CustomerMobileNumber'])? $_POST['CustomerMobileNumber'] : "0";
                $CustomerEmailID= isset($_POST['CustomerEmailID'])? $_POST['CustomerEmailID'] : "0";    
                
            }else {
                $CustomerName=$_SESSION['USER']['personname'];
                $CustomerMobileNumber= $_SESSION['USER']['mobile'];
                $CustomerEmailID= $_SESSION['USER']['email'];  
            }
            
             
            
            if (isset($_POST['Model'])) {
                if (intval($_POST['Model'])>0) {
                    $Model = $_POST['Model'];  
                } else {
                    $Model = $mysql->insert("_JModels",array("brandid"=>$brandid,"model"=>$_POST['model'],"iscustom"=>'1'));  
                }
            }
             
            if ($obj->err==0) { 
                if ($_SESSION['USER']['isadmin']==1) {
                    $user_param['personname']="";
                    $user_param['email']="";
                    $user_param['pwd']="!x!y!z!";
                    $user_param['mobile']=$_POST['uMobileNumber'];
                    $param['postedby']=JUsertable::addUser($user_param);
                }
                $title = str_replace("'","\\'",$_POST['title']);
                $title = str_replace('"','\\"',$title);
                
                $content = str_replace("'","\\'",$_POST['content']);
                $content = str_replace('"','\\"',$content);
                //$postedadid = JPostads::addPostads($param);  
                $postedadid = $mysql->insert("_jpostads",array("categid"      => $slcategory[0]['categid'],
                                                               "subcateid"    => $slsubcategory[0]['subcateid'],
                                                               "title"        => $title,
                                                               "content"      => $content,
                                                               "amount"       => $_POST['amount'],
                                                               "countryid"    => $_POST['countryid'],
                                                               "stateid"      => $_POST['state'],
                                                               "distcid"      => $_POST['district'],
                                                               "cityid"       => $_POST['city'],
                                                               "filepath1"    => trim($_POST['uploadimage1']),
                                                               "filepath2"    => trim($_POST['uploadimage2']),
                                                               "filepath3"    => trim($_POST['uploadimage3']),
                                                               "filepath4"    => trim($_POST['uploadimage4']),           
                                                               "filepath5"    => trim($_POST['uploadimage5']),
                                                               "filepath6"    => trim($_POST['uploadimage6']),
                                                               "brandid"      => $brandname,
                                                               "Mtype"        => $mtype,
                                                               "PositionType" => $PositionType,
                                                               "SalaryPeriod" => $salaryPeriod,
                                                               "SalaryFrom"   => $salaryFrom,
                                                               "SalaryTo"     => $salaryTo,
                                                               "Year"         => $Year,
                                                               "Fuel"         => $Fuel,
                                                               "Transmission" => $Transmission,
                                                               "KMDriven"     => $KMDriven,
                                                               "NoofOwners"   => $NoofOwners,
                                                               "BedRooms"     => $BedRooms,
                                                               "BathRooms"        => $BathRooms,
                                                               "Furnishing"       => $Furnishing,
                                                               "ListedBy"         => $ListedBy,
                                                               "SuperBuildUpArea" => $SuperBuildUpArea,
                                                               "CarpetArea"       => $CarpetArea,
                                                               "BachelorsAllowed" => $BachelorsAllowed,
                                                               "Maintenance"      => $Maintenance,
                                                               "TotalFloors"      => $TotalFloors,
                                                               "FloorNo"          => $FloorNo,
                                                               "CarParking"       => $CarParking,
                                                               "Facing"           => $Facing,
                                                               "ProjectName"         => $ProjectName,
                                                               "ConstructionStatus"  => $ConstructionStatus,
                                                               "Washrooms"           => $Washrooms,
                                                               "PlotArea"            => $PlotArea,
                                                               "MealsIncluded"       => $MealsIncluded,
                                                               "Model"               => $Model,
                                                               "Variant"             => $Varient,
                                                               "CustomerName"          => $CustomerName,
                                                               "CustomerMobileNumber"  => $CustomerMobileNumber,
                                                               "CustomerEmailID"       => $CustomerEmailID,
                                                               "postedon"            => date("Y-m-d H:i:s"),
                                                               "postedby"            => $param['postedby']));  
                                                               
                if($_SESSION['USER']['isstaff']==1){  
                    $adType="free";
                    MobileSMS::sendSMS($_POST['CustomerMobileNumber'],"Your Ad Posted on Klx.co.in Your klx ad link ".path_url."v".$postedadid."-".$title." You can post more your ads this website, its totally free",$_SESSION['USER']['userid']); 
                }
                 
               if ($adType!="free") {
                $availableads = $mysql->select("select * from _tbl_user_packages where UserID='".$_SESSION['USER']['userid']."' and CategoryID='".$slsubcategory[0]['categid']."' and PostedAds<=NumberOfAds and date('".date("Y-m-d")."')<=date(PackageTo)");
                if (sizeof($availableads)>0) {
                   // $postedadid = JPostads::addPostads($param); 
                    $mysql->execute("update _jpostads set AdPackageID='".$availableads[0]['PackageID']."',UserPackageID='".$availableads[0]['UserPackageID']."',ispaid='1' where postadid='".$postedadid."'");
                    $adspack = $mysql->select("select * from _tbl_adsPackage where AdPackageID='".$availableads[0]['UserPackageID']."'"); 
                    $mysql->execute("update _tbl_user_packages set RemainingAds='".($availableads[0]['RemainingAds']-1)."',PostedAds='".($availableads[0]['PostedAds']+1)."' where UserPackageID='".$availableads[0]['UserPackageID']."'")  ;
                    $packagetxt =  "<br>". ($availableads[0]['RemainingAds']-1) ."  units left in package ".  $adspack[0]['PacakgeTitle'].". Please use the package  before ". date("Y-m-d H:i:s",strtotime($availableads[0]['PackageTo'])) ;
                } else {
                    $packagetxt = "<br>Error adding Postads may credits unavailable"; 
                     //return json_encode(array("status"=>"failure","message"=>'Error adding Postads may credits unavailable'));
                }    
            }
  
            if ($postedadid>0) {
                
                $message = '
                    <div style="padding:45px;background:#e5e5e5;margin:20px;border-radius:10px;padding-top:20px;padding-bottom:10px;">
                        <div style="text-align:center;padding-bottom:20px;">
                            <img src="https://www.klx.co.in/assets/cms/klx_log.png" style="height:30px;">&nbsp;&nbsp;
                            <img src="https://www.klx.co.in/assets/img/in.png" style="height:24px;border:1px solid #eee;border-radius:3px;">
                        </div>
                        <div style="border:0px solid black;text-align:left;padding:30px;background:white;border-radius:10px;">
                            Hello,
                            <br><br>
                            Your ad is live, share it with friends to sell faster:
                            <br><br>
                            <p style="text-align:center">
                                <a href="'.path_url.'v'.$postedadid.'-'.$_POST['title'].'" style="font-size:16px;font-family:Poppins,sans-serif;font-weight:600;color:#ffffff;text-decoration:none;background-color:#3a77ff;border-top:12px solid #3a77ff;border-bottom:12px solid #3a77ff;border-left:36px solid #3a77ff;border-right:36px solid #3a77ff;display:inline-block">VIEW AD</a>
                            </p>               
                            <br> 
                            Thanks <br>
                            KLX Team
                        </div>
                        <p style="color:#888;padding:10px;text-align:center">Please do not reply this email. Replies to this message are routed to an unmonitored mailbox. For more information visit our help page or contact us here.</p>
                    </div>';

                    $mparam['MailTo']=$_SESSION['USER']['email'];
                    $mparam['MemberID']=$_SESSION['USER']['userid'];
                    $mparam['Subject']="KLX :) Your ad is now live!";                                        
                    $mparam['Message']=$message;
                    MailController::Send($mparam,$mailError);       
                   return json_encode(array("status"=>"success","message"=>'Add Posted successfully.'.$packagetxt));
            } else {
                return json_encode(array("status"=>"failure","qry"=>$qry,"message"=>'Error adding Postads.'.$packagetxt));
            }
        }  
    }
}
function getIFSCode() {
    //tlO260h88nC24pU651g5d5yxn
    //https://ifsc.firstatom.org/key/tlO260h88nC24pU651g5d5yxn/ifsc/{ifsc_code}
     
     
     $ch = curl_init();  
 
    curl_setopt($ch,CURLOPT_URL,"https://api.techm.co.in/api/v1/ifsc/".$_GET['IFSCode']);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_HEADER, false); 
    $output=curl_exec($ch);
    curl_close($ch);
    
    global $mysql;
     
         $mysql->insert("_tbl_ifsc_log",array("UserID"     => $_SESSION['FRANCHISEE']['userid'],
                                              "IFSCode"    => $_GET['IFSCode'],
                                              "OutPut"     => $output,
                                              "TxnOn"      =>date("Y-m-d H:i:s")));
     
    return $output;
    
}
function savemybankdetails() {
    
    global $mysql,$app;
    
   // if (!(strlen(trim($_POST['BankName']))>0)) {
       // $result = array();
        //$result['status']="failure";      
        //$result['message']="Please Enter Bank Name";  
        //return json_encode($result);
   // }
    if (!(strlen(trim($_POST['AccountName']))>0)) {
        $result = array();
        $result['status']="failure";
        $result['message']="Please Enter Account Name";  
        return json_encode($result);
    }
    if (!(strlen(trim($_POST['AccountNumber']))>0)) {
        $result = array();
        $result['status']="failure";
        $result['message']="Please Enter Account Number";  
        return json_encode($result);
    }
    if (!(strlen(trim($_POST['IFSCode']))>0)) {
        $result = array();
        $result['status']="failure";
        $result['message']="Please Enter IFS Code";  
        return json_encode($result);
    }
    $data = $mysql->select("select * from `tbl_admin_bank_details` where  `BankName`='".$_POST['BankName']."'");
   // if (sizeof($data)>0) {
   //     $result = array();
   //     $result['status']="failure";
    //    $result['message']="Bank Name Already Exist";  
    //    return json_encode($result);
   // }
    $data = $mysql->select("select * from `tbl_admin_bank_details` where  `AccountNumber`='".$_POST['AccountNumber']."'");
    if (sizeof($data)>0) {
        $result = array();
        $result['status']="failure";
        $result['message']="Account Number Already Exist";  
        return json_encode($result);
    }
   
      $id=$mysql->insert("_tbl_franchisee_bank_details",array("CreatedOn"     => date("Y-m-d H:i:s"),
                                                              "FranchiseeID"  => $_POST['FranchiseeID'],
                                                              "BankName"      => $_POST['BankName'],
                                                              "BranchName"    => $_POST['BranchName'],
                                                              "City"          => $_POST['City'],
                                                              "District"      => $_POST['District'],
                                                              "State"         => $_POST['State'],
                                                              "AccountName"   => $_POST['AccountName'],
                                                              "AccountNumber" => $_POST['AccountNumber'],
                                                              "IFSCode"       => $_POST['IFSCode'])); 
      $qry = $mysql->qry;
      if(sizeof($id)>0){
        $result = array();
        $result['status']="Success";
        $result['qry']=$qry;
        $result['message']="Bank Details Added Successfully.";  
        return json_encode($result);
    } else {
        $result = array();
        $result['status']="failure";
        $result['message']="Failed";  
        return json_encode($result);
    }
    
}
function FranchiseeWithdrawalRequest() {
    
    global $mysql,$app;
    $id = $mysql->insert("_tbl_withdrawal_request",array("FranchiseeID"   => $_SESSION['FRANCHISEE']['userid'],
                                                         "TxnOn"          => date("Y-m-d H:i:s"),
                                                         "Amount"         => $_POST['Amount'],
                                                         "Remarks"        => $_POST['Remarks']));   
    $mem = $mysql->select("select * from _tbl_franchisee where MemberID='".$_SESSION['USER']['userid']."'");
    $result = array();

    if(sizeof($id)>0){
        $result['status']="Success";
        $result['message']="Withdrawal Request Sent."; 
        $message = "Dear ".$mem[0]['FranchiseeName'].", Your withdrawal request has been sent";   
        // MobileSMS::sendSMS($mem[0]['MobileNumber'],$message,$id);  
        $mparam['MailTo']=$mem[0]['EmailID'];
        $mparam['MemberID']=$id;
        $mparam['Subject']="Withdrawal Request Sent";
        $mparam['Message']=$message;
        MailController::Send($mparam,$mailError);
    } else {
        $result['status']="failure";
        $result['message']="Withdrawal Request Sent failed.";  
    }
    return json_encode($result); 
} 
function DeleteProduct() {
    
    global $mysql;
    
      $id=$mysql->execute("DELETE FROM _tbl_products where ProductID='".$_POST['ProductID']."'");
     
        $result = array();
        $result['status']="Success";
        $result['message']="Product Deleted.";  
        return json_encode($result);
    
    }
function DeleteUserProduct() {
    
    global $mysql;
    
      $id= $mysql->execute("update _tbl_products set IsDeleted='1' where ProductID='".$_POST['ProductID']."'");
     
        $result = array();
        $result['status']="Success";
        $result['message']="Product Deleted.";  
        return json_encode($result);
    
    }    
?>