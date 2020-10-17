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
             echo "<script>location.href='myads';</script>";
           exit;
         
    } else {
         $mysql->execute("delete from _jpostads  where postadid='".$_POST['postid']."'");
           //$mysql->execute("update _jpostads set isdeleted='1', deletedon='".date("Y-m-d H:i:s")."' where postadid='".$_POST['postid']."'");
             echo "<script>location.href='myads';</script>";
           exit;
    }
    }
    
    $ads = JPostads::getMyActiveads($_SESSION['USER']['userid']);
?>
<div class="main-panel"  style="width: 100%;height:auto !important">
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
                        <a href="<?php echo country_url;?>" >Home</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo country_url;?>mypage" >Dashboard</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo country_url;?>myactiveads" >My Active Ads</a>
                    </li>
                </ul>
            </div>
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">My Active Ads</h4>
                </div>
                <div class="card-body">
                    <div class="row row-projects">
                            <?php foreach ($ads as $ad) {
                                    $filename = ((strlen(trim($ad['filepath1']))>4) && file_exists("assets/".$config['thumb'].$ad['filepath1'])) ? "assets/".$config['thumb'].$ad['filepath1'] : "assets/cms/".Jca::getAppSetting('noimage');
                            ?>
                        <div class="col-sm-6 col-lg-3">
                            <div class="card adbox">
                              
                                <div class="p-2 text-center">
                                    <img class="card-img-top rounded adImage" src="<?php echo base_url;?><?php echo $filename;?>" alt="Product 7">
                                    <?php if ($ad['isdeleted']==1) {?>
                                    <div>
                                        <a class="btn btn-danger  btn-sm" style="padding:2px 5px">deleted</a>
                                    </div>
                                
                                 <?php } else {
                                    ?>
                                        <div style="padding-top:10px;"> 
                                        <a class="btn btn-success  btn-sm" style="padding:2px 5px">active</a>
                                    
                                 
                                  &nbsp;&nbsp;
                                 <?php
                                        $isActivated = $mysql->select("select * from  _tbl_featured where adid='".$ad['postadid']."' and date(enddate)>=date('".date("Y-m-d")."')");
                                        if (sizeof($isActivated)>0) {
                                            echo "<br><br><span style='color:#888'>Feature Ad Expire ".date("M d, Y",strtotime($isActivated[0]['enddate']))."</span>";
                                        } else {
                                    ?>
                                    <a href="<?php echo country_url;?>moreresponse/a<?php echo $ad['postadid'];?>" class="btn btn-warning  btn-sm" style="padding:2px 5px">Response Faster</a> 
                                    <?php } 
                                    
                                      ?>
                                       </div>
                                         <?php
                                    
                                } ?>
                                </div>
                                <div class="card-body pt-2">
                                
                                    <h3 class="mb-0 fw-bold">₹ <?php echo $ad['amount'];?>
                                    <?php if ($ad['isdeleted']!=1) {?>
                                       <div class="dropdown dropdown-kanban" style="float: right;">
                                        <button class="" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border:none;font-size:14px;background:#fff;padding-right:0px;margin-right:0px;">
                                            <i class="icon-options-vertical"></i>
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="<?php echo country_url;?>edit/e<?php echo $ad['postadid'];?>" draggable="false">Edit</a>
                                            <a class="dropdown-item" href="<?php echo country_url;?>view/m<?php echo $ad['postadid'];?>" draggable="false">View</a>
                                            <a class="dropdown-item" href="javascript:deleteAd('<?php echo $ad['postadid'];?>')" draggable="false">Delete</a>
                                            <!--
                                            <a class="dropdown-item" href="myadedit.php?ad=<?php echo $ad['postadid'];?>" draggable="false">Edit</a>
                                          
                                            <a class="dropdown-item" href="viewmyad.php?ad=<?php echo $ad['postadid'];?>" draggable="false">View</a>
                                            
                                            <a class="dropdown-item" href="viewmyad.php?ad=<?php echo $ad['postadid'];?>" draggable="false">Trash</a>-->
                                        </div>
                                    </div>
                                    <?php } ?>
                                    
                                    </h3>
                                    <p class="text-muted small mb-3" style="height:60px !important"><?php echo substr($ad['title'],0,60);?> <?php echo strlen($ad['title'])>60 ? "..." : "";?></p>
                                    <p class="text-muted small m-0" style="font-size:11px;"><?php echo $ad['location'];?>
                                    <span style="float: right;"><?php echo date("M d",strtotime($ad['postedon']));?></span>
                                    </p>
                                    <!--<div class="avatar-group">
                                        <div class="avatar avatar-sm">
                                            <img src="../assets/img/jm_denis.jpg" alt="..." class="avatar-img rounded-circle border border-white">
                                        </div>
                                        <div class="avatar avatar-sm">
                                            <img src="../assets/img/chadengle.jpg" alt="..." class="avatar-img rounded-circle border border-white">
                                        </div>
                                        <div class="avatar avatar-sm">
                                            <img src="../assets/img/mlane.jpg" alt="..." class="avatar-img rounded-circle border border-white">
                                        </div>
                                        <div class="avatar avatar-sm">
                                            <img src="../assets/img/talha.jpg" alt="..." class="avatar-img rounded-circle border border-white">
                                        </div>
                                        <div class="avatar avatar-sm">
                                            <span class="avatar-title rounded-circle border border-white bg-success">+</span>
                                        </div>
                                    </div>
                                    -->
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>  
    </div> 
</div>
         <?php if (isset($_GET['del'])) {?>
  <script>
       setTimeout(function(){$('#myModal').modal("show");},1000);
       </script>
       <?php } ?>
    <div class="modal " id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header" style="border-bottom:none">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body" style="text-align: center;">
       Your post deleted.
      </div>

      <!-- Modal footer -->
      <div class="modal-footer"  style="border-top:none">
        
            <button type="button" class="btn btn-primary" data-dismiss="modal">Continue</button>
      
      </div>

    </div>
  </div>
</div>
   <script>
        function deleteAd(id) {
            $('#postid').val(id);
           $('#myModalx').modal("show");   
        }
       </script>
    <div class="modal " id="myModalx">
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
<?php include_once("footer.php"); ?>