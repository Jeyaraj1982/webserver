 <?php
  $sql= $mysql->select("select * from `_tbl_member` where md5(concat('j!j',MemberID))='".$_GET['d']."'");
  $dealer = $mysql->select("select * from _tbl_member Where MemberID!='".$sql[0]['MapedTo']."' and IsDistributor='1'");
 ?>
  <div style="padding:25px">
    <div class="page-header">
        <ul class="breadcrumbs" style="border: none;padding-left: 0px;margin-left: 0px;">
            <li class="nav-home"><a href="dashboard.php"><i class="flaticon-home"></i></a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=ApiUsers/MoveTo">Users</a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=ApiUsers/MoveTo">Move To</a></li>
        </ul>
    </div> 
                                                                                                               
    <?php  if(sizeof($dealer)==0){ ?> 
        <div class="row">
            <div class="col-md-12 ">
                <div class="card">
                    <div class="card-body">
                       Distributor Not availbale <?php echo "select * from _tbl_member Where MemberID!='".$sql[0]['MapedTo']."' and IsDistributor='1'";?>
                    </div>
                </div>
            </div>
        </div>
    <?php } else { ?>                                                                            
    <form action="" class="validation-wizard clearfix" role="application" id="frmmoveDealer" method="post"> 
    <input type="hidden" name="MemberID" value="<?php echo $sql[0]['MemberID'];?>">
        <div class="row">
            <div class="col-md-12 ">
                <div class="card">
                    <div class="card-header">
                        <h4 class="m-b-0 text-orange "><i class="mdi mdi-account-multiple-plus  p-r-10"></i>Agent Details</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-body">
                            <div class="row">
                                <div class="col-md-6 ">
                                    <div class="form-group user-test" id="user-exists">
                                        <label for="Name" class="col-md-4 text-left" style="font-weight:normal">Agent Name</label>
                                        <label for="Name" class="col-md-8 text-left" style="font-weight:normal"><?php echo $sql[0]['MemberName'];?></label>
                                    </div>
                                </div>                       
                            </div>
                            <div class="row">
                                <div class="col-md-6 ">
                                    <div class="form-group user-test" id="user-exists">
                                        <label for="Name" class="col-md-4 text-left" style="font-weight:normal">Mobile Number </label>
                                        <label for="Name" class="col-md-8 text-left" style="font-weight:normal"><?php echo $sql[0]['MobileNumber'];?></label>
                                    </div>
                                </div>                       
                            </div> 
                            <div class="row">
                                <div class="col-md-6 ">
                                    <div class="form-group user-test" id="user-exists">
                                        <label for="Name" class="col-md-4 text-left" style="font-weight:normal">Email ID </label>
                                        <label for="Name" class="col-md-8 text-left" style="font-weight:normal"><?php echo $sql[0]['EmailID'];?></label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 ">
                                    <div class="form-group user-test" id="user-exists">
                                        <label for="Name" class="col-md-4 text-left" style="font-weight:normal">Current Distributor Name</label>
                                        <label for="Name" class="col-md-8 text-left" style="font-weight:normal"><?php echo $sql[0]['MapedToName'];?></label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Move To Distributor<span style="color:red">*</span></label>
                                        <select class="form-control" id="OtherDealer" name="OtherDealer">
                                            <?php 
                                                $dealer = $mysql->select("select * from _tbl_member Where MemberID!='".$sql[0]['MapedTo']."' and IsDistributor='1'");
                                                foreach($dealer as $d){ 
                                            ?>
                                            <option value="<?php echo $d['MemberID'];?>" <?php echo $_POST[ 'OtherDealer']==$d['MemberID'] ? " selected='selected' " : "" ;?>><?php echo $d['MemberName'];?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            
                        <div class="col-12 p-b-20"><hr></div>
                         
                        <div class="card-body"><div class="form-group m-b-0 text-right">
                            <a href="dashboard.php?action=ApiUsers/View&d=<?php echo $_GET['d'];?>" class="btn btn-outline-primary waves-effect waves-light">Cancel</a>
                            <button type="button" class="btn btn-primary waves-effect waves-light" onclick="beforesubmit();" name="BtnSubmit">Move</button>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </form>
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
    var buttons = "<div style='text-align:center;padding:10px;'><button type='button' class='btn btn-danger btn-sm' onclick='location.href=\"dashboard.php?action=ApiUsers/List\"'>Continue</button></div>";
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