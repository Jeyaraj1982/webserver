<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.css" rel="stylesheet" type="text/css" media="all"/>
<style>
.ui-state-active h4,
.ui-state-active h4:visited {
  /*  color: #26004d ;  */
  color:black;
}

.ui-menu-item{
    height: 40px;
    border: 1px solid #ececf9;
    color:black;
}                                                                                       
.ui-widget-content .ui-state-active {
    background-color: orange !important;                                                                             
    border: none !important;
}
.list_item_container {
    width:740px;
    height: 80px;
    float: left;
    margin-left: 20px;
}
.ui-widget-content .ui-state-active .list_item_container {
    background-color: green;
}

.label{
    width: 85%;
    float:right;
    white-space: nowrap;
    overflow: hidden;
    color:black;
    color: rgb(124,77,255);
    text-align: left;
}
input:focus{
    background-color: yellow;
}

</style>
<?php 

     $FromD = isset($_POST['FromD']) ? $_POST['FromD'] : date("d");
     $FromM = isset($_POST['FromM']) ? $_POST['FromM'] : date("m");
     $FromY = isset($_POST['FromY']) ? $_POST['FromY'] : date("Y");
     
     $ToD = isset($_POST['ToD']) ? $_POST['ToD'] : date("d");
     $ToM = isset($_POST['ToM']) ? $_POST['ToM'] : date("m");
     $ToY = isset($_POST['ToY']) ? $_POST['ToY'] : date("Y");
     
     
        $fromDate = $FromY."-".$FromM."-".$FromD;
        $toDate = $ToY."-".$ToM."-".$ToD;
    
?>
 
<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" style="padding-top:10px;padding-bottom:10px">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card-title">
                                        Expenses<br>
                                        <span style="font-size:13px">Expense Type - Date Wise</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="dashboard.php?action=Report/TypeWiseExpenses" method="post" onsubmit="return validation();">
                                <div class="form-group row">
                                     <div class="col-sm-6" style="padding-left: 0px;">
                                        <label class="col-sm-12" style="padding-left: 0px;">Select Expense Type</label>  
                                        <input type="hidden" id="ExpenseType" name="ExpenseType" value="<?php echo (isset($_POST['ExpenseType']) ? $_POST['ExpenseType'] :"");?>">
                                        <input type="text" autocomplete="off" id="ExpenseTypeDetails" name="ExpenseTypeDetails" class="form-control input-lg" placeholder="Enter Expense Type Details Here" style="height:auto !important;">
                                        <span class="errorstring" id="ErrExpenseType"><?php echo isset($ErrExpenseType)? $ErrExpenseType : "";?></span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        <div id="div_ExpenseTypedetails">
                                                                                                     
                                        </div>    
                                    </div> 
                                </div>
                                <div class="form-group row">
                                     <div class="col-sm-6" style="padding-left: 0px;">
                                        <label class="col-sm-12" style="padding-left: 0px;">Select Staff</label>  
                                        <input type="hidden" id="AllStaffs" name="AllStaffs" value="0">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="AllStaff" name="AllStaff" onclick="StaffSelect()">
                                            <label class="custom-control-label" for="AllStaff" style="font-weight: normal;">All Staffs</label>
                                        </div>
                                        <div id="slectstaff">
                                            
                                            <input type="hidden" id="Staff" name="Staff" value="<?php echo (isset($_POST['Staff']) ? $_POST['Staff'] :"");?>">
                                            <input type="text" autocomplete="off" id="StaffDetails" name="StaffDetails" class="form-control input-lg" placeholder="Enter Staff Details Here" style="height:auto !important;">
                                            <span class="errorstring" id="ErrStaff"><?php echo isset($ErrStaff)? $ErrStaff : "";?></span>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div id="div_Staffdetails">
                                                                                                     
                                        </div>    
                                    </div> 
                                </div>
                                
                                <div class="form-group row">                  
                                    <div class="col-sm-5">
                                        <label>From</label>
                                      <div class="form-group row" style="padding: 0px;">
                                        <div class="col-sm-3" style="padding-right: 0px;">
                                            <select required="" name="FromD" id="date" class="form-control" style="border:1px solid #ccc">
                                                <?php for($i=1;$i<=31;$i++) {?>
                                                <option value="<?php echo $i;?>" <?php echo (isset($_POST[ 'FromD'])) ? (($_POST[ 'FromD']==$i) ? " selected='selected' " : "") : (($FromD==$i) ? " selected='selected' " : "");?> ><?php echo $i;?></option>
                                                <?php } ?>                       
                                            </select>
                                        </div>
                                        <div class="col-sm-5" style="padding-right: 0px;padding-left: 0px;">
                                            <select required="" style="border:1px solid #ccc" class="form-control" name="FromM" id="FromM" aria-invalid="true" data-validation-required-message="Please select birth month">
                                                <option value="1"  <?php echo (isset($_POST[ 'FromM'])) ? (($_POST[ 'FromM']==1) ? " selected='selected' " : "") : (($FromM==1) ? " selected='selected' " : "");?>>January</option>
                                                <option value="2"  <?php echo (isset($_POST[ 'FromM'])) ? (($_POST[ 'FromM']==2) ? " selected='selected' " : "") : (($FromM==2) ? " selected='selected' " : "");?>>February</option>
                                                <option value="3"  <?php echo (isset($_POST[ 'FromM'])) ? (($_POST[ 'FromM']==3) ? " selected='selected' " : "") : (($FromM==3) ? " selected='selected' " : "");?>>March</option>
                                                <option value="4"  <?php echo (isset($_POST[ 'FromM'])) ? (($_POST[ 'FromM']==4) ? " selected='selected' " : "") : (($FromM==4) ? " selected='selected' " : "");?>>April</option>
                                                <option value="5"  <?php echo (isset($_POST[ 'FromM'])) ? (($_POST[ 'FromM']==5) ? " selected='selected' " : "") : (($FromM==5) ? " selected='selected' " : "");?>>May</option>
                                                <option value="6"  <?php echo (isset($_POST[ 'FromM'])) ? (($_POST[ 'FromM']==6) ? " selected='selected' " : "") : (($FromM==6) ? " selected='selected' " : "");?>>June</option>
                                                <option value="7"  <?php echo (isset($_POST[ 'FromM'])) ? (($_POST[ 'FromM']==7) ? " selected='selected' " : "") : (($FromM==7) ? " selected='selected' " : "");?>>July</option>
                                                <option value="8"  <?php echo (isset($_POST[ 'FromM'])) ? (($_POST[ 'FromM']==8) ? " selected='selected' " : "") : (($FromM==8) ? " selected='selected' " : "");?>>August</option>
                                                <option value="9"  <?php echo (isset($_POST[ 'FromM'])) ? (($_POST[ 'FromM']==9) ? " selected='selected' " : "") : (($FromM==9) ? " selected='selected' " : "");?>>September</option>
                                                <option value="10" <?php echo (isset($_POST[ 'FromM'])) ? (($_POST[ 'FromM']==10) ? " selected='selected' " : "") : (($FromM==10) ? " selected='selected' " : "");?>>October</option>
                                                <option value="11" <?php echo (isset($_POST[ 'FromM'])) ? (($_POST[ 'FromM']==11) ? " selected='selected' " : "") : (($FromM==11) ? " selected='selected' " : "");?>>November</option>
                                                <option value="12" <?php echo (isset($_POST[ 'FromM'])) ? (($_POST[ 'FromM']==12) ? " selected='selected' " : "") : (($FromM==12) ? " selected='selected' " : "");?>>December</option>
                                            </select> 
                                        </div>
                                        <div class="col-sm-4" style="padding-right: 0px;padding-left: 0px;">
                                            <select required="" style="border:1px solid #ccc" class="form-control" name="FromY" id="FromY" aria-invalid="true" data-validation-required-message="Please select birth year">
                                                <?php for($i=date("Y");$i<=date("Y");$i++) {?>
                                                <option value="<?php echo $i;?>" <?php echo (isset($_POST[ 'FromY'])) ? (($_POST[ 'FromY']==$i) ? " selected='selected' " : "") : (($FromY==$i) ? " selected='selected' " : "");?> ><?php echo $i;?></option>
                                                <?php } ?>                       
                                            </select>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="col-sm-5">
                                        <label class="col-sm-1">To</label>
                                        <div class="form-group row" style="padding: 0px;">
                                                <div class="col-sm-3" style="padding-right: 0px;">
                                                    <select required="" name="ToD" id="ToD" class="form-control" style="border:1px solid #ccc">
                                                        <?php for($i=1;$i<=31;$i++) {?>
                                                        <option value="<?php echo $i;?>" <?php echo (isset($_POST[ 'ToD'])) ? (($_POST[ 'ToD']==$i) ? " selected='selected' " : "") : (($ToD==$i) ? " selected='selected' " : "");?> ><?php echo $i;?></option>
                                                        <?php } ?>                       
                                                    </select>
                                                </div>
                                                <div class="col-sm-5" style="padding-right: 0px;padding-left: 0px;">
                                                    <select required="" style="border:1px solid #ccc;" class="form-control" name="ToM" id="ToM" aria-invalid="true" data-validation-required-message="Please select birth month">
                                                         <option value="1"  <?php echo (isset($_POST[ 'ToM'])) ? (($_POST[ 'ToM']==1) ? " selected='selected' " : "") : (($ToM==1) ? " selected='selected' " : "");?>>January</option>
                                                <option value="2"  <?php echo (isset($_POST[ 'ToM'])) ? (($_POST[ 'ToM']==2) ? " selected='selected' " : "") : (($ToM==2) ? " selected='selected' " : "");?>>February</option>
                                                <option value="3"  <?php echo (isset($_POST[ 'ToM'])) ? (($_POST[ 'ToM']==3) ? " selected='selected' " : "") : (($ToM==3) ? " selected='selected' " : "");?>>March</option>
                                                <option value="4"  <?php echo (isset($_POST[ 'ToM'])) ? (($_POST[ 'ToM']==4) ? " selected='selected' " : "") : (($ToM==4) ? " selected='selected' " : "");?>>April</option>
                                                <option value="5"  <?php echo (isset($_POST[ 'ToM'])) ? (($_POST[ 'ToM']==5) ? " selected='selected' " : "") : (($ToM==5) ? " selected='selected' " : "");?>>May</option>
                                                <option value="6"  <?php echo (isset($_POST[ 'ToM'])) ? (($_POST[ 'ToM']==6) ? " selected='selected' " : "") : (($ToM==6) ? " selected='selected' " : "");?>>June</option>
                                                <option value="7"  <?php echo (isset($_POST[ 'ToM'])) ? (($_POST[ 'ToM']==7) ? " selected='selected' " : "") : (($ToM==7) ? " selected='selected' " : "");?>>July</option>
                                                <option value="8"  <?php echo (isset($_POST[ 'ToM'])) ? (($_POST[ 'ToM']==8) ? " selected='selected' " : "") : (($ToM==8) ? " selected='selected' " : "");?>>August</option>
                                                <option value="9"  <?php echo (isset($_POST[ 'ToM'])) ? (($_POST[ 'ToM']==9) ? " selected='selected' " : "") : (($ToM==9) ? " selected='selected' " : "");?>>September</option>
                                                <option value="10" <?php echo (isset($_POST[ 'ToM'])) ? (($_POST[ 'ToM']==10) ? " selected='selected' " : "") : (($ToM==10) ? " selected='selected' " : "");?>>October</option>
                                                <option value="11" <?php echo (isset($_POST[ 'ToM'])) ? (($_POST[ 'ToM']==11) ? " selected='selected' " : "") : (($ToM==11) ? " selected='selected' " : "");?>>November</option>
                                                <option value="12" <?php echo (isset($_POST[ 'ToM'])) ? (($_POST[ 'ToM']==12) ? " selected='selected' " : "") : (($ToM==12) ? " selected='selected' " : "");?>>December</option>
                                                    </select> 
                                                </div>
                                                <div class="col-sm-4" style="padding-right: 0px;padding-left: 0px;">
                                                    <select style="border:1px solid #ccc" required="" class="form-control" name="ToY" id="ToY" aria-invalid="true" data-validation-required-message="Please select birth year">
                                                        <?php for($i=date("Y");$i<=date("Y");$i++) {?>
                                                        <option value="<?php echo $i;?>" <?php echo (isset($_POST[ 'ToY'])) ? (($_POST[ 'ToY']==$i) ? " selected='selected' " : "") : (($ToY==$i) ? " selected='selected' " : "");?> ><?php echo $i;?></option>
                                                        <?php } ?>                       
                                                    </select>
                                                </div>           
                                            </div>
                                        <!--<div class="input-group">
                                            <input type="text" class="form-control success" id="To" name="To" value="<?php echo isset($_POST['To']) ? $_POST['To'] : date("Y-m-d");?>" required="" aria-invalid="false">
                                            <div class="input-group-append">
                                                <span class="input-group-text">
                                                    <i class="fa fa-calendar-check"></i>
                                                </span>
                                            </div>
                                        </div>    -->
                                    </div>
                                    <div class="col-sm-2"><label class="col-sm-1"> &nbsp;</label><button type="submit" name="viewTransaction" class="btn btn-primary" style="padding-top: 8px;padding-bottom: 8px;">View Expenses</button></div>
                                </div>
                            </form>
                            
                        </div>                                                                                                                                            
                    </div>                                                                                             
                </div>
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function() {
$('#fdate').datetimepicker({
            format: 'YYYY-MM-DD',
        });
        
        $('#tdate').datetimepicker({
            format: 'YYYY-MM-DD',
        });
        $("#ExpenseTypeDetails").on('focus', function () {
            $(this).autocomplete('search', $(this).val() == '' ? " " : $(this).val());    
        });
        $("#StaffDetails").on('focus', function () {
            $(this).autocomplete('search', $(this).val() == '' ? " " : $(this).val());    
        });
});
function validation(){
    ErrorCount=0; 
    var ExpenseType = $('#ExpenseType').val().trim();
       if (ExpenseType=="") {
            $('#ErrExpenseType').html("Please Enter Expense Type Details");                                                    
            ErrorCount++;                                                                                      
        }
    if($('#AllStaffs').val()=="0"){
	    var Staff = $('#Staff').val().trim();
           if (Staff=="") {
                $('#ErrStaff').html("Please Enter Staff Details");                                                    
                ErrorCount++;                                                                                      
            }
    }
   if(ErrorCount==0){
       return true;
   }else{
       return false;
   }
}
$(document).ready(function(){  
    $("#ExpenseTypeDetails").autocomplete({
        source: "webservice.php?action=GetExpenseTypeInfo",
            focus: function( event, ui ) {
            return false;
        },
        select: function( event, ui ) {
            SelectExpenseType(ui.item);                                                   
        }
    }).data( "ui-autocomplete" )._renderItem = function( ul, item ) {
        var inner_html = '<div onclick="SelectExpenseType('+ item +')">' + item.ExpenseType + '</div>';
        return $( "<li></li>" )
                .data( "item.autocomplete", item )
                .append(inner_html)
                .appendTo( ul );
    };
	
	$("#StaffDetails").autocomplete({
        source: "webservice.php?action=GetStaffInfo",
            focus: function( event, ui ) {
            return false;
        },
        select: function( event, ui ) {
            SelectStaff(ui.item);                                                   
        }
    }).data( "ui-autocomplete" )._renderItem = function( ul, item ) {
        var inner_html = '<div onclick="SelectStaff('+ item +')">' + item.StaffName + '</div>';
        return $( "<li></li>" )
                .data( "item.autocomplete", item )
                .append(inner_html)
                .appendTo( ul );
    };
})
function SelectExpenseType(obj) {
    
        $("#div_ExpenseTypedetails").html( obj.ExpenseType); 
        $("#ExpenseType").val(obj.ExpenseTypeID);
        $("#ErrExpenseType").html(""); 
        
}
function SelectStaff(obj) {
    
        var htmlRows = '<div class="form-group row">';
                htmlRows += '<div class="col-sm-6">';
                    htmlRows += obj.StaffName;
                    htmlRows += '<br>';
                    htmlRows += obj.SurName;
                    htmlRows += '<br>';
                    
        $("#div_Staffdetails").html(htmlRows); 
        $("#Staff").val(obj.StaffID);
        $("#ErrStaff").html(""); 
        
}
function StaffSelect(){
    if (!$("#AllStaff").is(":checked")) {
        $('#AllStaffs').val("0");
        $('#slectstaff').show();
    }else {
        $('#AllStaffs').val("1");
        $('#slectstaff').hide();
    }
}
</script> 