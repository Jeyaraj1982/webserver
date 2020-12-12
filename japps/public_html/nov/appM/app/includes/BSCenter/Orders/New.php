 <?php 
 if(!(isset($_POST['date']))){
     $_POST['date']=date("d");
 }
 if(!(isset($_POST['month']))){
     $_POST['month']=date("m");
 }
 if(!(isset($_POST['year']))){
     $_POST['year']=date("Y");
 }
 if(isset($_POST['submitBtn'])){
        
        $error=0;
        
        $Member = $mysql->select("select * from _tbl_Members where MemberCode='".$_POST['MemberID']."'");
        if(sizeof($Member)==0){
          $error++;
          $ErrMemberID = "Invalid Member ID";  
        }
        if($error==0){        
            $InvoiceDate = $_POST['year']."-".$_POST['month']."-".$_POST['date'];
        $id = $mysql->insert("_tbl_orders",array("StoreID"       => $_POST['StoreID'],
                                                 "MemberID"      => $Member[0]['MemberID'],
                                                 "MemberCode"    => $Member[0]['MemberCode'],
                                                 "MemberName"    => $Member[0]['MemberName'],
                                                 "InvoiceNumber" => $_POST['InvoiceNumber'],
                                                 "InvoiceAmount" => $_POST['InvoiceAmount'],
                                                 "InvoiceDate"   => $InvoiceDate,
                                                 "StoreID"       => $_POST['StoreID'],
                                                 "OrderOn"       => date("Y-m-d H:i:s")));
              $feedback = $mysql->select("select * from _tbl_store_feedback where StoreID='".$_POST['StoreID']."' and MemberID='".$Member[0]['MemberID']."'");
              if(sizeof($feedback)==0){
                  $IsFirst ="1";
                  $mysql->insert("_tbl_store_feedback",array("StoreID"     => $_POST['StoreID'],
                                                             "MemberID"    => $Member[0]['MemberID'],
                                                             "MemberCode"  => $Member[0]['MemberCode'],
                                                             "IsFirst"     => $IsFirst));
              }
        
        if(sizeof($id)>0){     ?>
            <script>
                $(document).ready(function() {
                    swal("Order Created successfully", {
                        icon : "success" 
                    });
                });  
            </script>
        <?php
            unset($_POST);
       }   
        }
        }
      ?>
<script>
$(document).ready(function(){
     $("#MemberID").blur(function() {   
        $('#MemberDetails').html("");  
        if(IsNonEmpty("MemberID","ErrMemberID","Please Enter Member ID")){
            IsAlphaNumeric("MemberID","ErrMemberID","Please Enter Alpha Numerics Character"); 
        }
     });
     $("#InvoiceAmount").blur(function() {   
         if(IsNonEmpty("InvoiceAmount","ErrInvoiceAmount","Please Enter Invoice Amount")){
            IsNumeric("InvoiceAmount","ErrInvoiceAmount","Please Enter Numerics Character"); 
         } 
     });
     $("#InvoiceNumber").blur(function() {   
         if(IsNonEmpty("InvoiceNumber","ErrInvoiceNumber","Please Enter Invoice Number")){
            IsAlphaNumeric("InvoiceNumber","ErrInvoiceNumber","Please Enter Alpha Numerics Character"); 
         }
     }); 
     
});
function checkValidation(){
    $('#ErrMemberID').html(""); 
    $('#ErrInvoiceAmount').html(""); 
     ErrorCount=0; 
     if(IsNonEmpty("MemberID","ErrMemberID","Please Enter Member ID")){
        IsAlphaNumeric("MemberID","ErrMemberID","Please Enter Alpha Numerics Character"); 
     }
     if(IsNonEmpty("InvoiceAmount","ErrInvoiceAmount","Please Enter Invoice Amount")){
        IsNumeric("InvoiceAmount","ErrInvoiceAmount","Please Enter Numerics Character"); 
     } 
     if(IsNonEmpty("InvoiceNumber","ErrInvoiceNumber","Please Enter Invoice Number")){
        IsAlphaNumeric("InvoiceNumber","ErrInvoiceNumber","Please Enter Alpha Numerics Character"); 
     }  
   
    if(ErrorCount==0) {
         var text = '<div class="modal-header" style="padding-bottom:5px">'
                        +'<h4 class="heading"><strong>Confirmation</strong> </h4>'
                        +'<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:white">'
                            +'<span aria-hidden="true" style="color:black">&times;</span>'
                        +'</button>'
                     +'</div>'
                     +'<div class="modal-body">'
                        +'<div class="form-group row">'                                                            
                            +'<div class="col-sm-12">'
                                +'Are you sure want to confirm order?<br>'
                            +'</div>'
                        +'</div>'
                     +'</div>'
                     +'<div class="modal-footer">'
                        +'<button type="button" class="btn btn-outline-success" data-dismiss="modal" >Cancel</button>&nbsp;&nbsp;&nbsp;'
                        +'<button type="button" class="btn btn-success" onclick="ConfirmOrder()" >Yes, Confirm</button>'
                     +'</div>'
                +'</form>';  
        $('#xconfrimation_text').html(text);                                       
        $('#ConfirmationPopup').modal("show");
        return true;
    }else{
            return false;
        }
    
}
function ConfirmOrder(){
   $("#submitBtn" ).trigger( "click" ); 
}
function getMemberDetails(MemberCode) {
        $.ajax({url:'webservice.php?action=getMemberDetails&MemberCode='+MemberCode,success:function(data){
            $('#MemberDetails').html(data);
        }});
    }
</script>
  <div style="padding:25px">
    <div class="page-header">
        <ul class="breadcrumbs" style="border: none;padding-left: 0px;margin-left: 0px;">
            <li class="nav-home"><a href="dashboard.php"><i class="flaticon-home"></i></a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Orders/New">Orders</a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Orders/New">New Order</a></li>
        </ul>
    </div> 
    <form action="" method="post">    
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="m-b-0 text-orange "><i class="mdi mdi-account-multiple-plus  p-r-10"></i>New Order</h4>
                    <input type="hidden" name="StoreID" id="StoreID" value="<?php echo $_SESSION['User']['SupportingCenterAdminID'];?>">
                </div>
                <div class="card-body">
                    <div class="form-body">
                        <div class="row">
                            <div class="col-md-6 ">
                                <div class="form-group user-test" id="user-exists">
                                    <label>Member Code<span style="color:red">*</span></label>
                                    <input onchange="getMemberDetails($(this).val())" name="MemberID" id="MemberID" placeholder="Member Code" value="<?php echo isset($_POST['MemberID']) ? $_POST['MemberID'] : "";?>" class="form-control" type="text">
                                    <div class="help-block" style="color:red;font-size:12px"><p class="error" id="ErrMemberID"><?php echo isset($ErrMemberID)? $ErrMemberID : "";?></p></div>
                                    <div id="MemberDetails"></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 ">
                                <div class="form-group user-test" id="user-exists">
                                    <label>Invoice Number<span style="color:red">*</span></label>
                                    <input name="InvoiceNumber" id="InvoiceNumber" placeholder="Invoice Number" value="<?php echo isset($_POST['InvoiceNumber']) ? $_POST['InvoiceNumber'] : "";?>" class="form-control" type="text">
                                    <div class="help-block" style="color:red;font-size:12px"><p class="error" id="ErrInvoiceNumber"></p></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 ">
                                <div class="form-group user-test" id="user-exists">
                                    <label>Invoice Amount<span style="color:red">*</span></label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1">INR</span>
                                        </div>
                                        <input name="InvoiceAmount" id="InvoiceAmount" placeholder="Invoice Amount" value="<?php echo isset($_POST['InvoiceAmount']) ? $_POST['InvoiceAmount'] : "";?>" class="form-control" type="text">
                                    </div>
                                    <div class="help-block" style="color:red;font-size:12px"><p class="error" id="ErrInvoiceAmount"></p></div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group user-test" id="user-exists">
                                    <label>Invoice Date<span style="color:red">*</span></label>
                                    <div class="form-group row" style="padding: 0px;">
                                        <div class="col-sm-3">
                                            <select required="" name="date" id="date" class="form-control" style="width: 83px;">
                                                <?php for($i=1;$i<=31;$i++) { ?>
                                                <option value="<?php echo $i;?>" <?php echo ($_POST['date']==$i) ? " selected='selected' " : "";?> ><?php echo $i;?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col-sm-5" >
                                        <?php $month_array = array("","JAN","FEB","MAR","APR","MAY","JUN","JLY","AUG","SEP","OCT","NOV","DEC"); ?>
                                            <select name="month" class="form-control"  style="padding-left:5px;text-align:center;width:140px">
                                                <?php for($i=1;$i<=12;$i++) { ?>
                                                <option value="<?php echo $i;?>" <?php echo ($_POST['month']==$i) ? " selected='selected' " : "";?> ><?php echo $month_array[$i];?></option>
                                                <?php } ?>
                                            </select>
                                        </div>                                                                    
                                        <div class="col-md-4">
                                            <select name="year"  class="form-control" style="padding-left:5px;text-align:center">
                                                <?php for($i=date("Y");$i<=date("Y");$i++) { ?>
                                                <option value="<?php echo $i;?>" <?php echo ($_POST['year']==$i) ? " selected='selected' " : "";?> ><?php echo $i;?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="help-block" style="color:red;font-size:12px"><p class="error"></p></div>
                                </div>
                            </div>
                        </div>
                        <div class="row"> 
                            <div class="col-md-6"> 
                                 <button type="button" onclick="location.href='dashboard.php?action=Orders/list&filter=all'"  class="btn btn-outline-primary waves-effect waves-light">Cancel</button>
                                 <button type="submit" name="submitBtn" id="submitBtn" style="display:none"class="btn btn-primary waves-effect waves-light">Verify</button>
                                 <button type="button" onclick="checkValidation()" class="btn btn-primary waves-effect waves-light">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>
  </div>  
<div class="modal fade right" id="ConfirmationPopup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static" style="top: 0px !important;">
  <div class="modal-dialog modal-side modal-bottom-right modal-notify modal-danger" role="document" >
    <div class="modal-content" >
    <div id="xconfrimation_text"></div>
    </div>
  </div>
</div>