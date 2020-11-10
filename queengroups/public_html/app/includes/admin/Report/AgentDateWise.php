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
     //  if (isset($_POST['viewTransaction'])) { 
            $Orders = $mysql->select("SELECT * FROM _queen_orders where AgentID='".$_POST['Agent']."' and (date(OrderOn)>=date('".$fromDate."') and date(OrderOn)<=date('".$toDate."') ) order by OrderID desc");
           // echo "<script>location.href='dashboard.php?action=AgentwiseOrders';</script>";
    //   }
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
                                        Manage Orders<br>
                                        <span style="font-size:13px">Agent - Date Wise</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="dashboard.php?action=Report/AgentWiseOrders" method="post" onsubmit="return validation();">
                                <div class="form-group row">
                                     <div class="col-sm-6" style="padding-left: 0px;">
                                        <label class="col-sm-12" style="padding-left: 0px;">Select Agent</label>  
                                        <input type="hidden" id="Agent" name="Agent" value="<?php echo (isset($_POST['Agent']) ? $_POST['Agent'] :"");?>">
                                        <input type="text" autocomplete="off" id="AgentDetails" name="AgentDetails" class="form-control input-lg" placeholder="Enter Agent Details Here" style="height:auto !important;">
                                        <span class="errorstring" id="ErrAgent"><?php echo isset($ErrAgent)? $ErrAgent : "";?></span>
                                    </div>
                                    <div class="col-sm-6">
                                        <div id="div_agentdetails">
                                                                                                     
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
                                      <!--
                                      <div class="input-group">
                                        <input type="text" class="form-control success" id="From" name="From" value="<?php echo isset($_POST['From']) ? $_POST['From'] : date("Y-m-d");?>" required="" aria-invalid="false">
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-calendar-check"></i>
                                            </span>
                                        </div>
                                      </div>
                                      -->
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
                                    <div class="col-sm-2"><label class="col-sm-1"> &nbsp;</label><button type="submit" name="viewTransaction" class="btn btn-primary" style="padding-top: 8px;padding-bottom: 8px;">View Orders</button></div>
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
        $("#AgentDetails").on('focus', function () {
            $(this).autocomplete('search', $(this).val() == '' ? " " : $(this).val());    
        });
});
function validation(){
    ErrorCount=0; 
    var Agent = $('#Agent').val().trim();
       if (Agent=="") {
            $('#ErrAgent').html("Please Enter Agent Details");                                                    
            ErrorCount++;                                                                                      
        }
   if(ErrorCount==0){
       return true;
   }else{
       return false;
   }
}
$(document).ready(function(){  
    $("#AgentDetails").autocomplete({
        source: "webservice.php?action=GetAgentInfo",
            focus: function( event, ui ) {
            return false;
        },
        select: function( event, ui ) {
            SelectAgent(ui.item);                                                   
        }
    }).data( "ui-autocomplete" )._renderItem = function( ul, item ) {
        var inner_html = '<div onclick="SelectAgent('+ item +')">' + item.AgentName + '</div>';
        return $( "<li></li>" )
                .data( "item.autocomplete", item )
                .append(inner_html)
                .appendTo( ul );
    };
})
function SelectAgent(obj) {
    
        var htmlRows = '<div class="form-group row">';
                htmlRows += '<div class="col-sm-6">';
                    htmlRows += obj.AgentName;
                    htmlRows += '<br>';
                    htmlRows += obj.SurName;
                    htmlRows += '<br>';
                    htmlRows += obj.MobileNumber;
                    htmlRows += '<br>';
                
        $("#div_agentdetails").html(htmlRows); 
        $("#Agent").val(obj.AgentID);
        $("#ErrAgent").html(""); 
        
}
</script> 