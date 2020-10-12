<?php
$data=$mysql->select("select * from _tbl_card_general_info where ResumeID='".$_GET['id']."'");
?>
<script>
function CoppyCardUrl() {
  var copyText = document.getElementById("CardUrl");
  copyText.select();
  copyText.setSelectionRange(0, 99999)
  document.execCommand("copy");
  document.getElementById("ErrCopyCardUrl").innerHTML = "Copied !";
}
</script>
<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Card Information</div>    <br>
                                <div class="form-group form-show-validation row" style="padding: 0px;">
                                     <div class="col-lg-6 col-md-6 col-sm-6">
                                     <label>Visiting Card Url</label>
                                        <div class="input-group">
                                          <input type="text" class="form-control" readonly="readonly" id="CardUrl" value="https://www.digitalmaking.in/c-<?php echo $data[0]['Url'];?>">
                                          <div class="input-group-append">
                                            <span class="input-group-text" id="basic-addon2" onclick="CoppyCardUrl()"><i class="fas fa-copy"></i></span>
                                          </div>
                                        </div>
                                        <span id="ErrCopyCardUrl" style="font-size: 12px;"></span>
                                     </div>
                                     <div class="col-lg-6 col-md-6 col-sm-6" style="text-align: right;">
                                        <label>Viewed</label>
                                        <div style="font-size: 24px;"><?php echo sizeof($mysql->select("select * from _tbl_card_general_info where ResumeID='".$data[0]['ResumeID']."'"));?></div>                                        
                                     </div>
                                </div>
                            </div>
                        <form id="exampleValidation" method="POST" action="" enctype="multipart/form-data">
                            <div class="card-body">
                                <div class="form-group form-show-validation row">
                                    <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Name</label>
                                    <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $data[0]['ResumeName'];?></div>
                                </div>
                                <div class="form-group form-show-validation row">
                                    <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Proffession</label>
                                    <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $data[0]['Proffession'];?></div>
                                </div>
                                <div class="form-group form-show-validation row">
                                    <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Mobile Number</label>
                                    <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $data[0]['MobileNumber'];?></div>
                                </div>
                                <div class="form-group form-show-validation row">
                                    <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Whatsapp Number</label>
                                    <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $data[0]['WhatsappNumber'];?></div>
                                </div>
                                <div class="form-group form-show-validation row">
                                    <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Landline Number</label>
                                    <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $data[0]['LandlineNumber'];?></div>
                                </div>
                                <div class="form-group form-show-validation row">
                                    <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Email ID</label>
                                    <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $data[0]['EmailID'];?></div>
                                </div>
                                <div class="form-group form-show-validation row">
                                    <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Website</label>
                                    <div class="col-lg-4 col-md-9 col-sm-8"><?php echo "https://".$data[0]['Website'];?></div>
                                </div>
                                <div class="form-group form-show-validation row">
                                    <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Address Line1</label>
                                    <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $data[0]['AddressLine1'];?></div>
                                </div>
                                <?php if($data[0]['AddressLine2']!=""){ ?>
                                <div class="form-group form-show-validation row">
                                    <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Address Line2</label>
                                    <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $data[0]['AddressLine2'];?></div>
                                </div>
                                <?php } ?>
                                <?php if($data[0]['AddressLine3']!=""){ ?>
                                <div class="form-group form-show-validation row">
                                    <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Address Line3</label>
                                    <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $data[0]['AddressLine3'];?></div>
                                </div>
                                <?php } ?>
                                <div class="form-group form-show-validation row">
                                    <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Facebook Url</label>
                                    <div class="col-lg-4 col-md-9 col-sm-8"><?php echo "https://twitter.com/".$data[0]['FaceBook'];?></div>
                                </div>
                                <div class="form-group form-show-validation row">
                                    <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Twitter Url</label>
                                    <div class="col-lg-4 col-md-9 col-sm-8"><?php echo "https://facebook.com/".$data[0]['Twitter'];?></div>
                                </div>
                                <div class="form-group form-show-validation row">
                                    <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Instagram Url</label>
                                    <div class="col-lg-4 col-md-9 col-sm-8"><?php echo "https://instagram.com/".$data[0]['Instagram'];?></div>
                                </div>
                                <div class="form-group form-show-validation row">
                                    <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">LinkedIn Url</label>
                                    <div class="col-lg-4 col-md-9 col-sm-8"><?php echo "https://linkedin.com/".$data[0]['LinkedIn'];?></div>
                                </div>
                                <div class="form-group form-show-validation row">
                                    <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Profile Photo</label>
                                    <div class="col-lg-4 col-md-9 col-sm-8">
                                                <img src="../<?php echo "uploads/".$data[0]['ProfilePhoto'];?>" style='width: 64px;height:64px;margin-top: 5px;'>
                                    </div>
                                </div>
                            </div>                                                                        
                            <div class="card-action">
                                <div class="row">
                                    <div class="col-md-12">
                                        <?php if($_GET['fr']=="frlist"){ ?>
                                            <a href="dashboard.php?action=Franchisee/Cards&id=<?php echo $data[0]['CreatedByID'];?>"  class="btn btn-warning btn-border">Back</a>
                                        <?php }else { ?>
                                            <a href="dashboard.php?action=Cards/list" class="btn btn-warning btn-border">Back</a>
                                        <?php } ?>
                                    </div> 
                                                                           
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>