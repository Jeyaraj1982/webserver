<?php
$data = $mysqldb->select("select * from _BonusCardRegistration where IsActivated='1' and md5(concat('JJ',BonusCardRegID))='".$_GET['code']."'");

 

if (isset($_POST['ReGenerate'])) {
    $xdata = $mysqldb->select("select * from _BonusCardRegistration where  md5(concat('JJ',BonusCardRegID))='".$_GET['code']."'");
    generateBonusCard($xdata[0]['BonusCardRegID']);
}         
$data = $mysqldb->select("select * from _BonusCardRegistration where md5(concat('JJ',BonusCardRegID))='".$_GET['code']."'");
?>
<div class="page-wrapper">
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-6 align-self-center">
                <h4 class="page-title">Bonus Card Information</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Bonus Card</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
    <?php
        if (isset($_POST['ReGenerate'])) {
    ?>
        <div class="row" style="margin-bottom:10px;">
              <div class="col-lg-12 col-xlg-12 col-md-12">
                   <div class="success alert-success alert-dismissible fade show" role="alert" style="padding:20px;">
  <strong>Regenerated!</strong> &nbsp;Your coupon has regenerated.
  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
              </div>
        </div>
        <?php } ?>
        <div class="row">
            <div class="col-lg-7 col-xlg-7 col-md-7">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">     
                                <label for="fullName">NAME OF THE APPLICANT (Mr/Mrs/Others)</label>
                                <input type="text" class="form-control" disabled="disabled" value="<?php echo $data[0]['ApplicantName'];?>">
                            </div>
                        </div>
                        <div class="row" style="margin-top:10px;">
                            <div class="col-sm-6">
                                <label for="EntryDate">Entry Date</label>
                                <input type="text" class="form-control" disabled="disabled" value="<?php echo $data[0]['EntryDate'];?>">
                            </div>
                            <div class="col-sm-6">
                                <label>Due Date</label><br>                       
                                <input type="text" class="form-control" disabled="disabled" value="<?php echo $data[0]['DueDate'];?>">
                            </div>
                        </div>
                        <div class="row" style="margin-top:10px;">                          
                            <div class="col-sm-6">
                                <label for="Days">Bonus Card Number</label>
                                <input type="text" class="form-control" disabled="disabled" value="<?php echo $data[0]['BonusCardNumber'];?>">
                            </div>
                            <div class="col-sm-6">
                                <label for="Days">Days</label>
                                <input type="text" class="form-control" disabled="disabled" value="<?php echo $data[0]['Days'];?>">
                            </div>
                        </div>
                         <div class="row" style="margin-top:10px;">
                            <div class="col-sm-6">
                                <label for="Town">Gold Grams</label>
                                <input type="text" class="form-control" disabled="disabled" value="<?php echo $data[0]['GoldGrams'];?>">
                            </div>
                            <div class="col-sm-6">
                                <label for="PinCode">Amount</label>
                                <input type="text" class="form-control" disabled="disabled" value="<?php echo $data[0]['Amount'];?>">
                            </div>
                        </div>
                        <div class="row" style="margin-top:10px;">
                            <div class="col-sm-6">
                                <label for="District">Scheme</label>
                                <input type="text" class="form-control" disabled="disabled" value="<?php echo $data[0]['Scheme'];?>">
                            </div>           
                            <div class="col-sm-6">
                                <label for="Remarks">Remarks</label>
                                <input type="text" class="form-control" disabled="disabled" value="<?php echo $data[0]['Remarks'];?>">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-xlg-5 col-md-5">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12"  style="margin-top:10px;">     
                                <label for="fullName">Created On</label>
                                <input type="text" class="form-control" disabled="disabled" value="<?php echo $data[0]['RequestedOn'];?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12"  style="margin-top:10px;">     
                                <label for="fullName">QRCode</label>
                                <input type="text" class="form-control" disabled="disabled" value="<?php echo $data[0]['QrCode'];?>">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12"  style="margin-top:10px;">     
                                <label for="fullName">Binary Code</label>
                                <input type="text" class="form-control" disabled="disabled" value="<?php echo $data[0]['BonusCardNumber'];?>">
                            </div>
                        </div>
                         
                         <div class="row">
                            <div class="col-sm-12"  style="margin-top:10px;">     
                            <label for="fullName">Bonus Card</label>  
                         <img src="assets/bonus_cards/<?php echo $data[0]['FileName'];?>" style="width: 100%;">
                         <br>  <br>
                         <form action="" method="post">
                          <input type="submit" value="Re-Generate" name="ReGenerate" class="btn btn-primary"> 
                          <a href="download.php?file=bonus_cards/<?php echo $data[0]['FileName'];?>" target="_blank" class="btn btn-secondary">Download</a>
                          <input type="button" disabled="disabled" value="Send To Whatsapp">&nbsp;
                          </form>
                            </div>
                        </div>
                          
                      
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>    


<!-- The Modal -->
<div class="modal" id="myModalApproved">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header" style="border:none">
        <h4 class="modal-title"></h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body" style="border:none;text-align:center;padding:20px;">
      <img src="assets/tick.png"><br><br>
        Application Approved successfully.
      </div>

      <!-- Modal footer -->
      <div class="modal-footer"  style="border:none">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

<!-- The Modal -->
<div class="modal" id="myModalRejected">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header" style="border:none">
        <h4 class="modal-title"></h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body" style="border:none;text-align:center;padding:20px;">
      <img src="assets/tick.png"><br><br>
        Application <span style="color:red">Rejected</span> successfully.
      </div>

      <!-- Modal footer -->
      <div class="modal-footer"  style="border:none">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

<!-- The Modal -->
<div class="modal" id="myModalAlreadyProcessed">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header" style="border:none">
        <h4 class="modal-title"></h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body" style="border:none;text-align:center;padding:20px;">
      <img src="assets/info.png"><br><br>
        Failed, Application already processed.
      </div>

      <!-- Modal footer -->
      <div class="modal-footer"  style="border:none">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>
 