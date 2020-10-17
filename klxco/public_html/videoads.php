<?php 
include_once("header.php"); 
$data = $mysql->select("select * from Ads_Video order by VideoAdID Desc");
?>
<div class="main-panel" style="width:100% !important;height:auto !important;">
    <div class="container" style="margin-top:0px;">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-success" role="alert" style="background: #D4EDDA;">
                        30 seconds video ad Rs 1200 per month to advertise on this website which is viewed by millions of people
                    </div>
                </div>
            </div>
            <a class="btn btn-outline-primary btn-sm" style="width:50px;" href="<?php echo country_url;?>">Back</a><br><br>                    
            <div class="row">                                                     
                <div class="col-md-6">
                    <div class="card">                                                     
                        <div class="card-header">
                            <h4>Video Ads</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <?php foreach($data as $r){ ?>                                      
                                <div class="col-sm-4" style="padding-left:0px;padding-right:0px;">
                                    <video width="100%"  controls poster="images/aaranjudefault.jpg">
                                        <source src="https://www.klx.co.in/assets/videoads/<?php echo $r["FileName"];?>" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                                </div>                      
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include_once("footer.php"); ?>