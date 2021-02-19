<?php
include_once("header.php");
include_once("LeftMenu.php"); 
if (isset($_GET['action'])) {
         include_once($_GET['action'].".php");
     } else { ?>
<br><br>
<style>
.circles-text{line-height:69px !important;}
</style>
<div class="main-panel full-height">
            <div class="container">
                <div class="panel-header">
                    <div class="page-inner border-bottom pb-0 mb-3">
                        <div class="d-flex align-items-left flex-column">
                            <h2 class="pb-2 fw-bold">Dashboard</h2>
                            <div class="nav-scroller d-flex">
                                <div class="nav nav-line nav-color-info d-flex align-items-center justify-contents-center">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>    
                <div class="page-inner">
                
                 <?php
                    $enq = $mysql->select("select * from _tbl_tour_enquiry where date(CreatedOn)=date('".date("Y-m-d")."')");
                    
                    if (sizeof($enq)>0) {
                ?>
                 <div class="row">
                        <div class="col-md-12">
                        
                  <div class="alert alert-primary" role="alert">
  Today you have recevied <?php echo (sizeof($enq));?> enquires. click to  <a href="dashboard.php?action=Enquiry/list&date=<?php echo date("Y-m-d");?>" class="alert-link" style="font-weight:normal;color:blue">view </a>. 
</div>   

                        </div>
                    </div> 
<?php } ?>
                                                     
                    <div class="row">
                      <div class="col-sm-6 col-md-3">
                      <div class="card card-stats card-round" style="cursor: pointer;">
                                <div class="card-body">
                          <h5><b>Disk Usage</b></h5>
                        <div id="circles-1"></div>
                        </div>
                        </div>
                                          
                        </div>
                    <?php $Tours = $mysql->select("select * from _tbl_tour where IsPublish='1'");?>
                    <?php foreach($Tours as $Tour) { ?>
                    <?php $SubTours = $mysql->select("select * from _tbl_sub_tour where IsPublish='1' and TourTypeID='".$Tour['TourTypeID']."'");?> 
                    <?php $ActiveToursPackages = $mysql->select("select * from _tbl_tours_package where IsPublish='1' and SubTourTypeID='".$SubTours[0]['SubTourTypeID']."'");?> 
                    <?php $Enquiry = $mysql->select("select * from _tbl_tour_enquiry where PackageID='".$ActiveToursPackages[0]['PackageID']."'");?> 
                   
                        <div class="col-sm-6 col-md-3">
                            <div class="card card-stats card-round" style="cursor: pointer;">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between">
                                        <div>
                                            <h5><b><?php echo $Tour['TourTypeName'];?></b></h5>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-between mt-2">
                                        <p class="text-muted mb-0">Active Packages :</p>
                                        <p class="text-muted mb-0"><?php echo sizeof($ActiveToursPackages);?></p>
                                    </div>
                                    <div class="d-flex justify-content-between mt-2">
                                        <p class="text-muted mb-0">Total Enquiry :</p>
                                        <p class="text-muted mb-0"><?php echo sizeof($Enquiry);?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    </div>
                </div>
<?php } ?>
<script>
<?php
 function folderSize($dir){
$count_size = 0;
$count = 0;
$dir_array = scandir($dir);
  foreach($dir_array as $key=>$filename){
    if($filename!=".." && $filename!="."){
       if(is_dir($dir."/".$filename)){
          $new_foldersize = foldersize($dir."/".$filename);
          $count_size = $count_size+ $new_foldersize;
        }else if(is_file($dir."/".$filename)){
          $count_size = $count_size + filesize($dir."/".$filename);
          $count++;
        }
   }
 }
return $count_size;
}

function sizeFormat($bytes){ 
$kb = 1024;
$mb = $kb * 1024;
$gb = $mb * 1024;
$tb = $gb * 1024;

if (($bytes >= 0) && ($bytes < $kb)) {
return $bytes . ' B';

} elseif (($bytes >= $kb) && ($bytes < $mb)) {
return ceil($bytes / $kb) . ' KB';

} elseif (($bytes >= $mb) && ($bytes < $gb)) {
return ceil($bytes / $mb) . ' MB';

} elseif (($bytes >= $gb) && ($bytes < $tb)) {
return ceil($bytes / $gb) . ' GB';

} elseif ($bytes >= $tb) {
return ceil($bytes / $tb) . ' TB';
} else {
return $bytes . ' B';
}
}

$disksize = folderSize("/home/trip78/public_html/");
$disksize = intval(($disksize/1024)/1024);
$disk_allowed = 1330;
?>
setTimeout(function() {
    Circles.create({
            id:'circles-1',
            radius:40,
            value:<?php echo $disksize;?>,
            maxValue:<?php echo $disk_allowed;?>,
            width:7,
            text: '<span style=font-size:13px><?php echo $disksize.'MB';?></span>',
            colors:['#f1f1f1', '#FF9E27'],
            duration:40,
            wrpClass:'circles-wrp',
            textClass:'circles-text',
            styleWrapper:true,
            styleText:true
        })

},1500);
</script>
<?php include_once("footer.php");?>