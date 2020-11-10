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
        
            $orderitem = $mysql->select("select * from _queen_order_item  where ServiceCode='".$_POST['Service']."'");
           
            $Order = $mysql->select("SELECT * FROM _queen_orders where OrderID='".$orderitem[0]['OrderID']."' and (date(OrderOn)>=date('".$fromDate."') and date(OrderOn)<=date('".$toDate."') ) order by OrderID desc");

            
            $Orders = $mysql->select("SELECT * FROM _queen_orders
                                              LEFT JOIN _queen_order_item ON _queen_order_item.ServiceCode = '".$_POST['Service']."'");
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
                                        <span style="font-size:13px">Service Wise</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="" method="post" onsubmit="return validation();">
                                <div class="form-group row">
                                     <div class="col-sm-6" style="padding-left: 0px;">
                                        <label class="col-sm-12" style="padding-left: 0px;">Select Service</label>  
                                        <input type="hidden" id="Service" name="Service" value="<?php echo (isset($_POST['Service']) ? $_POST['Service'] :"");?>">
                                        <input type="text" autocomplete="off" id="ServiceDetails" name="ServiceDetails" class="form-control input-lg" placeholder="Enter Service Details Here" style="height:auto !important;">
                                        <span class="errorstring" id="ErrService"><?php echo isset($ErrService)? $ErrService : "";?></span>
                                    </div>
                                    <div class="col-sm-6">
                                        <div id="div_Servicedetails">
                                                                                                     
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
                            <div class="table-responsive">
                                 <table class="table table-striped mt-3">
                                        <thead>
                                            <tr>
                                                <th>Order ID.</th>
                                                <th>Date</th>
                                                <th>Service Name</th>
                                                <th>Sur Name</th>
                                                <th style="text-align:right">Order Value</th>
                                                <th>Status</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        
                                        <?php foreach($Orders as $Order){
                                        $OrderDate = date("d M, Y, H:i", strtotime($Order["OrderOn"]));
                                        $Agent = $mysql->select("select * from _queen_agent where AgentID='".$Order['AgentID']."'");
                                         ?>
                                            <tr>
                                                <td><?php echo $Order["OrderCode"];?></td>
                                                <td><?php echo $OrderDate;?></td>
                                                <td><?php echo $Order["AgentName"];?></td>
                                                <td><?php echo $Agent[0]["SurName"];?></td>
                                                <td style="text-align:right"><?php echo number_format($Order["OrderTotal"],2);?></td>
                                                <td><?php if($Order['IsPaid']=="1"){ echo "<span style='color:green'>Paid</span>"; } else { echo "<span style='color:red'>Unpaid</span>";} ?></td>
                                                <td style="text-align: right">                                                   
                                                    <div class="dropdown dropdown-kanban" style="float: right;">
                                                        <button class="" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border:none;font-size:14px;background:none !important;padding-right:0px;margin-right:0px;cursor:pointer">
                                                            <i class="icon-options-vertical"></i>
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                            <a class="dropdown-item" href="dashboard.php?action=Orders/view&id=<?php echo md5($Order["OrderID"]);?>" draggable="false">View</a>
                                                            <!--<a class="dropdown-item" draggable="false"><span onclick='CallConfirmation(<?php echo $Order["OrderID"];?>)' class='btn btn-danger btn-sm' style='padding: 0px 10px;font-size: 10px;'>Delete</span></a>-->
                                                        </div>
                                                    </div>
                                                </td>                                                                                                                                                                           
                                            </tr>
                                        <?php } ?>
                                        <?php if(sizeof($Orders)=="0"){ ?>
                                            <tr>
                                                <td colspan="8" style="text-align: center;">No Orders Found</td>
                                            </tr>
                                        <?php } ?>
                                        </tbody>
                                    </table>
                            </div>
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
    $("#ServiceDetails").on('focus', function () {
        $(this).autocomplete('search', $(this).val() == '' ? " " : $(this).val());    
    });
});
function validation(){
    ErrorCount=0; 
    var Service = $('#Service').val().trim();
       if (Service=="") {
            $('#ErrService').html("Please Enter Service Details");                                                    
            ErrorCount++;                                                                                      
        }
    if(ErrorCount==0) {
        return true;
    }else {
        return false;
    }
}
    
$(document).ready(function(){  
    $("#ServiceDetails").autocomplete({
        source: "webservice.php?action=GetServiceDetails",
            focus: function( event, ui ) {
            return false;
        },
        select: function( event, ui ) {
            SelectService(ui.item);                                                   
        }
    }).data( "ui-autocomplete" )._renderItem = function( ul, item ) {
        var inner_html = '<div onclick="SelectService('+ item +')">' + item.ServiceName + '</div>';
        return $( "<li></li>" )
                .data( "item.autocomplete", item )
                .append(inner_html)
                .appendTo( ul );
    };
})
function SelectService(obj) {
    
        var htmlRows = '<div class="form-group row">';
                htmlRows += '<div class="col-sm-6">';
                    htmlRows += obj.ServiceName;
                    htmlRows += '<br>';
                    htmlRows += 'Fees : <i class="fas fa-rupee-sign"></i>&nbsp;'+obj.FeeAmount;
                    htmlRows += '<br>';
                    htmlRows += 'Charges : <i class="fas fa-rupee-sign"></i>&nbsp;'+obj.ServiceCharge;
                    htmlRows += '<br>';
                
        $("#div_Servicedetails").html(htmlRows); 
        $("#Service").val(obj.ServiceCode);
        $("#ErrService").html(""); 
        
}
</script> 