
<?php
    if (isset($_POST['btnsubmit'])) {
        $ErrorCount =0;
            
            if($ErrorCount==0){
                   
              $ExpTypes = $mysql->select("select * from _queen_expensetype where ExpenseTypeID='".$_POST['ExpenseType']."'"); 
              $Created = $_POST['frmYear']."-".$_POST['frmMonth']."-".$_POST['frmDay'];
              $id = $mysql->insert("_queen_expenses",array("ExpenseTypeID"     => $ExpTypes[0]['ExpenseTypeID'],
                                                           "ExpenseTypeCode"   => $ExpTypes[0]['ExpenseTypeCode'],
                                                           "ExpenseType"       => $ExpTypes[0]['ExpenseType'],
                                                           "ShortDescription"  => $_POST['ShortDescription'],
                                                           "ExpenseAmount"     => $_POST['ExpenseAmount'],
														   "PaymentMode"       => $_POST['PaymentMode'],
                                                           "ExpenseDetails"    => $_POST['ExpenseDetails'],
														   "StaffID"           => $_SESSION['User']['StaffID'],
														   "CreatedOn"         => $Created));
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
    $("#ShortDescription").blur(function () {
        IsNonEmpty("ShortDescription","ErrShortDescription","Please Enter Expense Name");
    });
    $("#ExpenseType").blur(function () {
        $("#ErrExpenseType").html("");  
        if($("#ExpenseType").val()=="0"){
           $("#ErrExpenseType").html("Please Select Expense Type"); 
        }
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
                                   <div class="row">
                                        <div class="col-sm-4">
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <select name="frmDay" class="form-control">
                                                        <option value="01">01</option>
                                                        <option value="02">02</option>
                                                        <option value="03">03</option>
                                                        <option value="04">04</option>
                                                        <option value="05">05</option>
                                                        <option value="06">06</option>
                                                        <option value="07">07</option>
                                                        <option value="08">08</option>
                                                        <option value="09">09</option>
                                                        <option value="10">10</option>
                                                        <option value="11">11</option>
                                                        <option value="12">12</option>
                                                        <option value="13">13</option>
                                                        <option value="14">14</option>
                                                        <option value="15">15</option>
                                                        <option value="16">16</option>
                                                        <option value="17">17</option>
                                                        <option value="18">18</option>
                                                        <option value="19">19</option>
                                                        <option value="20">20</option>
                                                        <option value="21">21</option>
                                                        <option value="22">22</option>
                                                        <option value="23">23</option>
                                                        <option value="24">24</option>
                                                        <option value="25">25</option>
                                                        <option value="26">26</option>
                                                        <option value="27">27</option>
                                                        <option value="28">28</option>
                                                        <option value="29">29</option>
                                                        <option value="30">30</option>
                                                        <option value="31">31</option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-4">
                                                    <select name="frmMonth" class="form-control"> 
                                                         <option value="1">Jan</option>
                                                        <option value="2">Feb</option>
                                                        <option value="3">Mar</option>
                                                        <option value="4">Apr</option>
                                                        <option value="5">May</option>
                                                        <option value="6">Jun</option>
                                                        <option value="7">Jly</option>
                                                        <option value="8">Aug</option>
                                                        <option value="9">Sep</option>
                                                        <option value="10">Oct</option>
                                                        <option value="11">Nov</option>
                                                        <option value="12">Dec</option>
                                                    </select>
                                                </div>
                                                <div class="col-sm-4">
                                                    <select name="frmYear" class="form-control"> 
                                                        <option value="2020">2020</option>
                                                        <option value="2021" selected='selected'>2021</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
										<div class="form-group form-show-validation row">
                                            <label for="name">Expense Type</label>
                                            <select class="form-control" name="ExpenseType" id="ExpenseType">
                                                <option value="0" <?php echo ($_POST['ExpenseType']=="0") ? " selected='selected' " : "";?>>Select Expense Type</option>
                                                <?php $ExpenseTypes = $mysql->select("select * from _queen_expensetype where IsActive='1'");?>
                                                <?php foreach($ExpenseTypes as $ExpenseType){ ?>
                                                <option value="<?php echo $ExpenseType['ExpenseTypeID'];?>" <?php echo ($_POST['ExpenseType']==$ExpenseType['ExpenseTypeID']) ? " selected='selected' " : "";?>><?php echo $ExpenseType['ExpenseType'];?></option>
                                                <?php } ?>
                                            </select>
                                            <span class="errorstring" id="ErrExpenseType"><?php echo isset($ErrExpenseType)? $ErrExpenseType : "";?></span>                                                                                                       
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name">Short Description<span style="color:red">*</span></label>
                                            <input type="text" class="form-control" id="ShortDescription" name="ShortDescription" placeholder="Enter Expense Name" value="<?php echo (isset($_POST['ShortDescription']) ? $_POST['ShortDescription'] :"");?>">
                                            <span class="errorstring" id="ErrShortDescription"><?php echo isset($ErrShortDescription)? $ErrShortDescription : "";?></span>
                                        </div>
										<div class="form-group form-show-validation row">
                                            <label for="name">Expense Amount<span style="color:red">*</span></label>
                                            <input type="text" class="form-control" id="ExpenseAmount" name="ExpenseAmount" placeholder="Enter Expense Amount" value="<?php echo (isset($_POST['ExpenseAmount']) ? $_POST['ExpenseAmount'] :"");?>">
                                            <span class="errorstring" id="ErrExpenseAmount"><?php echo isset($ErrExpenseAmount)? $ErrExpenseAmount : "";?></span>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name">Payment Mode</label>
                                            <select class="form-control" name="PaymentMode" id="PaymentMode">
                                                <option value="Cash" <?php echo ($_POST['PaymentMode']=="Cash") ? " selected='selected' " : "";?>>Cash</option>
                                                <option value="Bank Transfer" <?php echo ($_POST['PaymentMode']=="Bank Transfer") ? " selected='selected' " : "";?>>Bank Transfer</option>
                                                <option value="Cheque" <?php echo ($_POST['PaymentMode']=="Cheque") ? " selected='selected' " : "";?>>Cheque</option>
                                                <option value="DD" <?php echo ($_POST['PaymentMode']=="DD") ? " selected='selected' " : "";?>>DD</option>
                                            </select>
                                            <span class="errorstring" id="ErrExpenseType"><?php echo isset($ErrPaymentMode)? $ErrPaymentMode : "";?></span>                                                                                                       
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
        $('#ErrExpenseType').html("");
        $('#ErrShortDescription').html("");
        $('#ErrExpenseAmount').html("");
        
        IsNonEmpty("ShortDescription","ErrShortDescription","Please Enter Expense Name");
		if($("#ExpenseType").val()=="0"){
           $("#ErrExpenseType").html("Please Select Expense Type"); 
           ErrorCount++;
        }
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

