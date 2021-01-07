<?php 
include_once("header.php"); 
$data = $mysql->select("select * from Ads_Others order by OtherAdID Desc");
?>
<div class="main-panel" style="width:100% !important;height:auto !important;margin-top:0px;">
    <div class="container" style="margin-top:0px;">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                 <div style="background:yellow;text-align;center;padding:15px;font-size:20px;text-align: center;font-weight: bold;">Become A Klx Dealer<br>and Earn monthly 1 lakhs </div>
                  <div style="text-align:center;font-size:18px;font-weight:bold;padding-top:10px;">Contact: +91-9791330770</div>
                  <br><br>
                 
                    <div class="alert alert-success" role="alert" style="background: #D4EDDA;display:none">
                        <!--The photo advertisement on this website, which is viewed by millions of people, is only Rs. 250 per month-->
                       
                        <!--
                        The photo advertisement on this website, which is viewed by millions of people is only Rs 500 per month with free digital visiting  card
                        -->
                    </div>
                </div>
            </div>
            <a class="btn btn-outline-primary btn-sm" style="width:50px;" href="<?php echo country_url;?>">Back</a><br><br>          
            <div class="row">                                                     
                <div class="col-md-6">
                    <div class="card">                                                     
                        <div class="card-header">
                            <h4>Business Offer</h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <?php foreach($data as $r) { ?>
                                <div class="col-sm-4" style="padding-left:0px;padding-right:0px;">
                                    <img src="https://www.klx.co.in/assets/otherads/<?php echo $r["FileName"];?>" style="width:100%">
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