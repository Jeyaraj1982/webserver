 <?php 
  $sql= $mysql->select("select * from `_tbl_Members` where  md5(Concat('J!',`MemberID`))='".$_GET['d']."'");
 $dealer = $mysql->select("select * from _tbl_Members Where MemberID!='".$sql[0]['MapedTo']."' and IsDealer='1'");
 if(sizeof($dealer)==0){
 ?>
 <div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            Dealer Not availbale
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
 </div>
 <?php } else { ?>
 
        <div class="main-panel">
            <div class="container">
                <div class="page-inner">
                  
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">Move To Other Dealer</div>
                                </div>
                                <form method="POST" id="frmmoveDealer">
                                 <input type="hidden" value="<?php echo $sql[0]['MemberID'];?>" name="MemberID">
                                    <div class="card-body">
                                    <h5>Retailer Information</h5>
                                        <div class="form-group form-show-validation row">
                                            <label for="Name" class="col-md-2 text-left" style="font-weight:normal">Retailer Name</label>
                                            <label for="Name" class="col-md-2 text-left" style="font-weight:normal"><?php echo $sql[0]['MemberName'];?></label>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="Name" class="col-md-2 text-left" style="font-weight:normal">Mobile Number </label>
                                            <label for="Name" class="col-md-2 text-left" style="font-weight:normal"><?php echo $sql[0]['MobileNumber'];?></label>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="Name" class="col-md-2 text-left" style="font-weight:normal">Email ID </label>
                                            <label for="Name" class="col-md-2 text-left" style="font-weight:normal"><?php echo $sql[0]['EmailID'];?></label>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="Name" class="col-md-2 text-left" style="font-weight:normal">Current Dealer Name</label>
                                            <label for="Name" class="col-md-2 text-left" style="font-weight:normal"><?php echo $sql[0]['MapedToName'];?></label>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="Name" class="col-md-2 text-left" style="font-weight:normal">Move To Dealer <span class="required-label">*</span></label>
                                            <div class="col-md-3">
                                                <select class="form-control" id="OtherDealer" name="OtherDealer">
                                                    <?php 
                                                        $dealer = $mysql->select("select * from _tbl_Members Where MemberID!='".$sql[0]['MapedTo']."' and IsDealer='1'");
                                                        foreach($dealer as $d){ 
                                                    ?>
                                                    <option value="<?php echo $d['MemberID'];?>" <?php echo $_POST[ 'OtherDealer']==$d['MemberID'] ? " selected='selected' " : "" ;?>><?php echo $d['MemberName'];?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                       
                                    </div>
                                    <div class="card-action">
                                        <div class="row">
                                            <div class="col-md-12" style="text-align: right;">
                                            
                                                <a href="dashboard.php?action=Retailers/View&d=<?php echo $_GET['d'];?>" class="btn btn-outline-danger">Cancel</a>
                                                <button type="button" class="btn btn-warning" onclick="beforesubmit();" name="BtnSubmit">Move</button>
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
  <div class="modal fade" id="ConfirmationPopup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body" id="confrimation_text" style="padding:10px;">
         <h5 class="modal-title" style="text-align: center;width:100%">Confirmation</h5> <br>
         <div id="xconfrimation_text" style="text-align: center;font-size:15px;"></div>
          <div style="padding:20px;text-align:center">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-warning" onclick="doConfrim()" name="submitRequest" >Confirm</button>
         </div>
      </div>
    </div>
  </div>
</div>       
<script>
var loading = "<div style='padding:80px;text-align:center;color:#aaa'><img src='https://www.saralservices.in/app/assets/loading.gif'  style='width:80px'><br>Processing ...</div>";
function beforesubmit(){
     
     var txt = 'Are you sure want to move ?'
     $('#xconfrimation_text').html(txt);     
     $('#ConfirmationPopup').modal("show");
    
}

function doConfrim() {
    $("#confrimation_text").html(loading);
    var buttons = "<div style='text-align:center;padding:10px;'><button type='button' class='btn btn-danger btn-sm' onclick='location.href=\"dashboard.php?action=Retailers/List\"'>Continue</button></div>";
    var cbuttons = "<div style='text-align:center;padding:10px;'><button type='button' class='btn btn-danger btn-sm' data-dismiss='modal'>Continue</button></div>";
    $("#confrimation_text").html(loading);
    
    $.post( "webservice.php?action=MoveOtherDealer",  $( "#frmmoveDealer" ).serialize(),function( data ) {
        var obj = JSON.parse(data); 
        var html = "";
        if (obj.status=="failure") {
            html = "<div style='width:100%;padding:10px;background:#fff;text-align:center;color:red'><img src='https://www.saralservices.in/app/assets/accessdenied.png' style='width:128px'><br><br>Move failed.<br>"+obj.message;
            html += "</div>" +cbuttons;
        } else {
            html = "<div style='width:100%;padding:10px;background:#fff;text-align:center;color:#222'><img src='https://www.saralservices.in/app/assets/tick.jpg' style='width:128px'><br><br>Moved Successfully</div>";
            html += "<br>" + buttons;
        }
        $("#confrimation_text").html(html);
    });
}
</script>
 <?php } ?>        
  