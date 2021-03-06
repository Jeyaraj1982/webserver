<?php
    if (isset($_POST['btnsubmit'])) {
        $ErrorCount =0;
            $dupExpenseTypeCode = $mysql->select("select * from _queen_expensetype where ExpenseTypeCode='".$_POST['ExpenseTypeCode']."'");
            if(sizeof($dupExpenseTypeCode)>0){
                $ErrExpenseTypeCode ="Expense Type Code Already Exist";
                $ErrorCount++;
            }
            $dupExpenseType = $mysql->select("select * from _queen_expensetype where ExpenseType='".$_POST['ExpenseType']."'");
            if(sizeof($dupExpenseType)>0){
                $ErrExpenseType ="Expense Type Already Exist";
                $ErrorCount++;
            }
            if($ErrorCount==0){
                 
              $id = $mysql->insert("_queen_expensetype",array("ExpenseTypeCode"  => $_POST['ExpenseTypeCode'],
                                                              "ExpenseType"      => $_POST['ExpenseType'],
														      "Description"   	 => str_replace("'","\\'",$_POST['Description']),
														      "CreatedOn"        => date("Y-m-d H:i:s")));
            if(sizeof($id)>0){ 
                unset($_POST);
                ?>
                <script>
                    $(document).ready(function() {
                        swal("Expense Type Added Successfully", { 
                            icon:"success",
                            confirm: {value: 'Continue'}
                        }).then((value) => {
                            location.href='dashboard.php?action=ExpenseType/list&status=All'
                        });
                    });
                    </script>
       <?php     }
       
              } else {     ?>
                <script>
             $(document).ready(function() {
                swal("", "Error add Expense Type", "warning")
             });
            </script>
           <?php   }
    }
   
?>
<script>
$(document).ready(function () {
    $("#ExpenseTypeCode").blur(function () {
        if(IsNonEmpty("ExpenseTypeCode","ErrExpenseTypeCode","Please Enter Expense Type Code")){
            IsAlphaNumeric("ExpenseTypeCode","ErrExpenseTypeCode","Please Enter Alpha Numerice Characters Only");
        }
    });
    $("#ExpenseType").blur(function () {
        if(IsNonEmpty("ExpenseType","ErrExpenseType","Please Enter Expense Type")){
            IsAlphaNumeric("ExpenseType","ErrExpenseType","Please Enter Alpha Numerice Characters Only");
        }
    });
});

</script>
      <div class="main-panel">
            <div class="container">
                <div class="page-inner">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">Add Expense Type</div>
                                </div>
                                <form id="exampleValidation" method="POST" action="" enctype="multipart/form-data">
                                   <div class="card-body">
										<div class="form-group form-show-validation row">
                                            <label for="Type">Expense Type Code<span style="color:red">*</span></label>
                                            <input type="text" class="form-control" id="ExpenseTypeCode" Name="ExpenseTypeCode" placeholder="Enter Expense Type Code" value="<?php echo (isset($_POST['ExpenseTypeCode']) ? $_POST['ExpenseTypeCode'] :"");?>">
                                            <span class="errorstring" id="ErrExpenseTypeCode"><?php echo isset($ErrExpenseTypeCode)? $ErrExpenseTypeCode : "";?></span>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="Type">Expense Type<span style="color:red">*</span></label>
                                            <input type="text" class="form-control" id="ExpenseType" Name="ExpenseType" placeholder="Enter Expense Type" value="<?php echo (isset($_POST['ExpenseType']) ? $_POST['ExpenseType'] :"");?>">
                                            <span class="errorstring" id="ErrExpenseType"><?php echo isset($ErrExpenseType)? $ErrExpenseType : "";?></span>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="Type">Description</label>
                                            <textarea class="form-control" id="Description" Name="Description" placeholder="Enter Description"><?php echo (isset($_POST['Description']) ? $_POST['Description'] :"");?></textarea>
                                            <span class="errorstring" id="ErrDescription"><?php echo isset($ErrDescription)? $ErrDescription : "";?></span>
                                        </div>
										<div class="form-group">
											<div class="col-lg-4 col-md-9 col-sm-8" style="text-align:center;color: green;"><?php echo $successmessage;?> </div>
										</div>
                                    </div>
                                    <div class="card-action">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <button class="btn btn-warning" type="button" onclick="CallConfirmation()">Add Expense Type</button>&nbsp;
                                                <button class="btn btn-warning" type="submit" name="btnsubmit" id="btnsubmit" style="display: none;">Add Expense Type</button>
                                                <a href="dashboard.php?action=ExpenseType/list&status=All" class="btn btn-warning btn-border">Back</a>
                                            </div>                                        
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

 <div class="modal fade right" id="ConfirmationPopup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static" style="top: 0px !important;">
  <div class="modal-dialog modal-side modal-bottom-right modal-notify modal-danger" role="document" >
    <div class="modal-content" >
    <div id="xconfrimation_text"></div>
    </div>
  </div>
</div>
<script>

function CallConfirmation(){
    ErrorCount=0;    
        $('#ErrExpenseTypeCode').html("");
        $('#ErrExpenseType').html("");
        
        if(IsNonEmpty("ExpenseTypeCode","ErrExpenseTypeCode","Please Enter Expense Type Code")){
            IsAlphaNumeric("ExpenseTypeCode","ErrExpenseTypeCode","Please Enter Alpha Numerice Characters Only");
        }
        if(IsNonEmpty("ExpenseType","ErrExpenseType","Please Enter Expense Type")){
            IsAlphaNumeric("ExpenseType","ErrExpenseType","Please Enter Alpha Numerice Characters Only");
        }
		
        if(ErrorCount==0) {
            var txt= '<div class="modal-header" style="padding-bottom:5px">'
                         +'<h4 class="heading"><strong>Confirmation</strong> </h4>'
                         +'<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:white">'
                            +'<span aria-hidden="true" style="color:black">&times;</span>'
                         +'</button>'
                     +'</div>'
                     +'<div class="modal-body">'
                        +'<div class="form-group row">'                                                            
                            +'<div class="col-sm-12">'
                                +'Are you sure want to add expense type?<br>'
                            +'</div>'
                        +'</div>'
                     +'</div>'
                     +'<div class="modal-footer">'
                        +'<button type="button" class="btn btn-outline-success" data-dismiss="modal" >Cancel</button>&nbsp;&nbsp;&nbsp;'
                        +'<button type="button" class="btn btn-success" onclick="AddExpenseType()" >Yes, Confirm</button>'
                     +'</div>';
                $('#xconfrimation_text').html(txt);                                       
                $('#ConfirmationPopup').modal("show");                                                      
        }else{ 
            return false;
        }
        }
function AddExpenseType() {
    $( "#btnsubmit" ).trigger( "click" );
}

</script>

