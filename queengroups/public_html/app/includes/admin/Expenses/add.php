<?php
    if (isset($_POST['btnsubmit'])) {
        $ErrorCount =0;
            $dupExpenseName = $mysql->select("select * from _queen_expenses where ExpenseName='".$_POST['ExpenseName']."'");
            if(sizeof($dupExpenseName)>0){
                $ErrExpenseName ="Expense Name Already Exist";
                $ErrorCount++;
            }
            if($ErrorCount==0){
                   $random = sizeof($mysql->select("select * from _queen_expenses")) + 1;
                   $ExpenseCode ="EXPNS0000".$random;
               
              $id = $mysql->insert("_queen_expenses",array("ExpenseCode"   	=> $ExpenseCode,
														   "ExpenseName"   	=> $_POST['ExpenseName'],
														   "ExpenseAmount"  => $_POST['ExpenseAmount'],
														   "ExpenseDetails" => $_POST['ExpenseDetails'],
														   "CreatedOn"      => date("Y-m-d H:i:s")));
            if(sizeof($id)>0){ 
                unset($_POST);
                ?>
                <script>
                    $(document).ready(function() {
                        swal("Expense Added Successfully", { 
                            icon:"success",
                            confirm: {value: 'Continue'}
                        }).then((value) => {
                            location.href='dashboard.php?action=Expenses/list&status=All'
                        });
                    });
                    </script>
       <?php     }
       
              } else {     ?>
                <script>
             $(document).ready(function() {
                swal("", "Error add Expense", "warning")
             });
            </script>
           <?php   }
    }
   
?>
<script>
$(document).ready(function () {
    $("#ExpenseName").blur(function () {
        IsNonEmpty("ExpenseName","ErrExpenseName","Please Enter Expense Name");
    });
	
	$("#ExpenseAmount").blur(function () {
        if(IsNonEmpty("ExpenseAmount","ErrExpenseAmount","Please Enter Expense Amount")){
           IsNumeric("ExpenseAmount","ErrExpenseAmount","Please Enter Numerics Character Only");
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
                                    <div class="card-title">Add Expense</div>
                                </div>
                                <form id="exampleValidation" method="POST" action="" enctype="multipart/form-data">
                                   <div class="card-body">
										<div class="form-group form-show-validation row">
                                            <label for="name">Expense Name<span style="color:red">*</span></label>
                                            <input type="text" class="form-control" id="ExpenseName" name="ExpenseName" placeholder="Enter Expense Name" value="<?php echo (isset($_POST['ExpenseName']) ? $_POST['ExpenseName'] :"");?>">
                                            <span class="errorstring" id="ErrExpenseName"><?php echo isset($ErrExpenseName)? $ErrExpenseName : "";?></span>
                                        </div>
										<div class="form-group form-show-validation row">
                                            <label for="name">Expense Amount<span style="color:red">*</span></label>
                                            <input type="text" class="form-control" id="ExpenseAmount" name="ExpenseAmount" placeholder="Enter Expense Amount" value="<?php echo (isset($_POST['ExpenseAmount']) ? $_POST['ExpenseAmount'] :"");?>">
                                            <span class="errorstring" id="ErrExpenseAmount"><?php echo isset($ErrExpenseAmount)? $ErrExpenseAmount : "";?></span>
                                        </div>
										<div class="form-group form-show-validation row">
                                            <label for="name">Expense Details</label>
                                            <textarea class="form-control" id="ExpenseDetails" name="ExpenseDetails" placeholder="Enter Expense Details"><?php echo (isset($_POST['ExpenseDetails']) ? $_POST['ExpenseDetails'] :"");?></textarea>
                                            <span class="errorstring" id="ErrExpenseDetails"><?php echo isset($ErrExpenseDetails)? $ErrExpenseDetails : "";?></span>
                                        </div>
										<div class="form-group">
											<div class="col-lg-4 col-md-9 col-sm-8" style="text-align:center;color: green;"><?php echo $successmessage;?> </div>
										</div>
                                    </div>
                                    <div class="card-action">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <button class="btn btn-warning" type="button" onclick="CallConfirmation()">Add Expense</button>&nbsp;
                                                <button class="btn btn-warning" type="submit" name="btnsubmit" id="btnsubmit" style="display: none;">Add Expense</button>
                                                <a href="dashboard.php?action=Expenses/list&status=All" class="btn btn-warning btn-border">Back</a>
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
        $('#ErrExpenseName').html("");
        $('#ErrExpenseAmount').html("");
        
        IsNonEmpty("ExpenseName","ErrExpenseName","Please Enter Expense Name");
		
		if(IsNonEmpty("ExpenseAmount","ErrExpenseAmount","Please Enter Expense Amount")){
           IsNumeric("ExpenseAmount","ErrExpenseAmount","Please Enter Numerics Character Only");
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
                                +'Are you sure want to add expense?<br>'
                            +'</div>'
                        +'</div>'
                     +'</div>'
                     +'<div class="modal-footer">'
                        +'<button type="button" class="btn btn-outline-success" data-dismiss="modal" >Cancel</button>&nbsp;&nbsp;&nbsp;'
                        +'<button type="button" class="btn btn-success" onclick="AddExpense()" >Yes, Confirm</button>'
                     +'</div>';
                $('#xconfrimation_text').html(txt);                                       
                $('#ConfirmationPopup').modal("show");                                                      
        }else{ 
            return false;
        }
        }
function AddExpense() {
    $( "#btnsubmit" ).trigger( "click" );
}

</script>

