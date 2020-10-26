<?php
     $operatorName = array("DD"=>"Dish TV","DA"=>"Airtel Digital Tv","DT"=>"Tatasky","DS"=>"Sun Direct","DV"=>"Videocon d2h","DB"=>"Big Tv");
?>      
<style>
.errorstring{text-align: right;width:100%;font-size:12px;padding:5px}
</style>
<script>
var Region="";
</script>
<div class="main-panel">
    <div class="container"  style="margin-top:0px !important">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <?php
                        $downOptrs=array();
                        $downOptrsCode=array();
                        foreach(array('DA','DS','DV','DB','DT','DD') as $o) {
                            $temp_sql= $mysql->select("select * from `_tbl_operators` where APIID='0' and OperatorCode='".$o."'");
                            if (sizeof($temp_sql)==1) {
                                $downOptrs[]=$temp_sql[0]['OperatorName'];  
                                $downOptrsCode[]=$temp_sql[0]['OperatorCode'];  
                            }
                        }
                        if (sizeof($downOptrs)>0) {
                    ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <span style="color:red"><b><?php echo implode(",",$downOptrs); ?></b> currently down</span>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12" style="padding: 5px;">
                    <div class="card" style="background: none;">
                        <div class="card-header">
                            <div class="card-title"  style="text-align: center;">DTH Recharge</div>
                        </div>
                        <form method="POST" action="" id="rechargefrom">
                            <div class="card-body" style="padding:0px;background:none;">
                                 <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1" style="padding-left:58px;font-weight:bold"><i class="icon-screen-desktop"></i></span>
                                                    </div>
                                                    <?php 
                                                        if(isset($_GET['dthnumber']))  {
                                                            $dth=$_GET['dthnumber'];
                                                        } else {
                                                            $dth ="";
                                                        }
                                                    ?>
                                                    <input type="number" onblur="getMobileRechargePlan()" class="form-control  btn-sm" id="MobileNumber"  value="<?php echo isset($_POST['MobileNumber']) ? $_POST['MobileNumber'] : $dth;?>" name="MobileNumber" placeholder="DTH Number" style="font-size:16px">
                                                    <div class="input-group-append" id="viewUser">
                                                        <span class="input-group-text" onclick="GetUsersfrDth()" id="basic-addon1" style="border: none;background:#fff;color:#1572E8 "><i class="icon-user"></i></span>
                                                    </div>
                                                </div>
                                                <div class="errorstring" id="ErrMobile"> </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12">                   
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1" style="padding-left:48px;font-weight:bold">INR</span>
                                                    </div>
                                                    <input type="number" class="form-control  btn-sm" id="RechargeAmt" name="RechargeAmt" placeholder="Amount" style="font-size:16px" maxlength="12">
                                                </div>
                                                <div class="errorstring" id="ErrAmount"></div>
                                            </div>
                                        </div>
                                         <div class="row" style="margin-bottom:15px;">
                                            <div class="col-lg-12 col-md-12 col-sm-12">                   
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1" style="font-weight:bold">Operator</span>
                                                    </div>
                                                    <select class="form-control  btn-sm" id="optr" name="optr" placeholder="optr"  style="font-size:14px">
                                                        <option value="DA" <?php echo (in_array("DA",$downOptrsCode) ? " disabled='disabled' style='color:#fff;background:red' " : "");?>>Airtel DTH <?php echo (in_array("DA",$downOptrsCode) ? " (Operator Down)" : "");?></option>
                                                        <option value="DB" <?php echo (in_array("DB",$downOptrsCode) ? " disabled='disabled' style='color:#fff;background:red' " : "");?>>Big TV <?php echo (in_array("DB",$downOptrsCode) ? " (Operator Down)" : "");?></option>
                                                        <option value="DD" <?php echo (in_array("DD",$downOptrsCode) ? " disabled='disabled' style='color:#fff;background:red' " : "");?>>Dish TV <?php echo (in_array("DD",$downOptrsCode) ? " (Operator Down)" : "");?></option>
                                                        <option value="DS" <?php echo (in_array("DS",$downOptrsCode) ? " disabled='disabled' style='color:#fff;background:red' " : "");?>>Sun Direct <?php echo (in_array("DS",$downOptrsCode) ? " (Operator Down)" : "");?></option>
                                                        <option value="DT" <?php echo (in_array("DT",$downOptrsCode) ? " disabled='disabled' style='color:#fff;background:red' " : "");?>>Tata Sky <?php echo (in_array("DT",$downOptrsCode) ? " (Operator Down)" : "");?></option>
                                                        <option value="DV" <?php echo (in_array("DV",$downOptrsCode) ? " disabled='disabled' style='color:#fff;background:red' " : "");?>>Videocon d2h <?php echo (in_array("DV",$downOptrsCode) ? " (Operator Down)" : "");?></option>
                                                    </select>
                                                    <div class="input-group-prepend"  style="border:none" id="viewplan_txt">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>                      
                                        <div class="row" style="margin-top:25px;margin-bottom:10px;">
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <button type="button" class="btn btn-black" onclick="location.href='dashboard.php';" style="background:#6c757d !important;width: 46%;">Back</button>
                                                <button type="button" class="btn btn-danger" onclick="doConfrim()" style="width: 46%;float:right" name="BtnSubmit">Recharge</button>
                                                <!--
                                                <button type="button" class="btn btn-secondary" onclick="GetPlan()" style="width: 46%;float:right"  name="BtnSubmit">View Plans</button>
                                                -->
                                            </div>                                        
                                        </div>
                                        <!--<div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <button type="button" onclick="doRecharge()" class="btn btn-primary  btn-sm" name="BtnSubmit">Recharge</button>
                                            </div>                                        
                                        </div>-->
                                        <div class="row">
                                             <div class="col-lg-12 col-md-12 col-sm-12" id="planDetails" style="padding: 20px; margin: 15px;">
                                                      
                                             </div>
                                        </div>
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

<div class="modal fade" id="confirmModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body" id="confrimation_text"  style="padding:10px;max-height: 80vh;overflow: auto;">
         <h5 class="modal-title" style="text-align: center;width:100%">Recharge Confirmation</h5> <br>
         <div id="xconfrimation_text" style="text-align: center;font-size:15px;"></div>
         <div style="padding:20px;text-align:center">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-warning" onclick="doRecharge()">Confirm</button>
         </div>
      </div>
    </div>
  </div>
</div>

<script>
 var viewplan_html='<span class="input-group-text" onclick="GetPlan()" id="basic-addon1" style="border: none;background:#fff;color:#1572E8 "><i class="icon-arrow-right-circle"></i>&nbsp;Plans</span>';
 var loading = "<div style='padding:80px;text-align:center;color:#aaa'><img src='https://www.saralservices.in/app/assets/loading.gif'  style='width:80px'><br>Processing ...</div>";
 $(document).ready(function(){
    $("#MobileNumber").blur(function(){
            $('#ErrMobile').html("");
            var m = $('#MobileNumber').val().trim();
            if (m.length==0) {
                $('#ErrMobile').html("Please Enter DTH Number");
            } else {
                if (!($('#MobileNumber').val().length>5)) {
                    $('#ErrMobile').html("Invalid DTH Number");
                }
            }
        });
    $("#RechargeAmt").blur(function() {
            $('#ErrAmount').html("");
            var amt = $('#RechargeAmt').val().trim();
            if (amt.length==0) {
                $('#ErrAmount').html("Please enter Amount");
            } else {
                if (!(parseFloat(amt)>=10 )) {
                    $('#ErrAmount').html("Amount must have greater than Rs.10");
                }
            }
        });
});     
 function doConfrim() {
        
        $('#ErrMobile').html(""); 
        $('#ErrAmount').html("");          
        
        if (!($('#MobileNumber').val().length>5)) {
            $('#ErrMobile').html("Invalid DTH Number");
            return false;
        }
        
        var amt = $('#RechargeAmt').val() == "" ? 0 : $('#RechargeAmt').val();
        if (!( parseInt(amt)>=10 && parseInt(amt)<5000)) {
            $('#ErrAmount').html("Invalid amount");
            return false;
        }
        
        var txt = "<span style='font-size:25px;font-weight:bold;'>"+$('#MobileNumber').val()+"</span><br>"  
               + "Rs. <span style='font-size:20px;'>"+$('#RechargeAmt').val()+"</span><br>" 
               + $('#optr option:selected').text(); 
        $('#xconfrimation_text').html(txt);
        $('#confirmModalLong').modal("show");
        
    }

    function getMobileRechargePlan() {
        
        var res = $('#MobileNumber').val().substring(0,1);
        var c=0;
         $('#viewplan_txt').html('');
                 
        if (res=="3") {
            if ($('#MobileNumber').val().length==10) {
               c++;
               $("#optr").val("DA").change();  
            }
        } else if (res=="0") {
           if ($('#MobileNumber').val().length==11) {
               c++;
               $("#optr").val("DD").change();  
            }  
        } else if (res=="2") {
           if ($('#MobileNumber').val().length==12) {
               c++;
               $("#optr").val("DB").change();  
            }  
        } else if (res=="1" || res=="4" || res=="7") {
           
            if ($('#MobileNumber').val().length==11) {
                c++;
                $("#optr").val("DS").change();  
            }
            if (res=="1" && $('#MobileNumber').val().length==10 ){
                c++;
                $("#optr").val("DT").change();  
            }
        } else {
             $("#optr").val("DV").change(); 
        }
        $('#viewplan_txt').html(viewplan_html);
    }                      
    
    function GetPlan() {
        if (!($('#MobileNumber').val().length>=5)) {
                 $('#ErrMobile').html("Invalid dth number");
            return false; 
            }
         $('#planDetails').html(loading);
            $.ajax({url:'webservice.php?action=GetDTHPlan&optr='+$('#optr').val()+'&rand=<?php echo rand(3000,900000);?>',success:function(data){
             $("#planDetails").css({"background":"#fff"});
                $('#planDetails').html(data);
            }});
        
    }
    
function selectAmount(amt,d) {
        //$("#planDetails").css({"background":"none"});
        $('#x'+d).trigger( "click" );
        $("#RechargeAmt").val(amt);  
        $("#RechargeAmt").focus();
        $("#doc_body").scrollTop()
    }
    
    function doRecharge() {
        
        var buttons = "";
        
        $('#ErrMobile').html(""); 
        $('#ErrAmount').html(""); 
        
        
        if (!( parseInt($('#RechargeAmt').val())>=10 && parseInt($('#RechargeAmt').val())<5000)) {
        
            $('#ErrAmount').html("Invalid amount");
            return false;
        }
       
        $("#confrimation_text").html(loading);
        
        $.post( "webservice.php?action=doRecharge",  $( "#rechargefrom" ).serialize(),function( data ) {
            var obj = JSON.parse(data); 
            var html = "";
            if (obj.status=="failure") {
                  buttons = "<div style='text-align:center;padding:10px;'><button type='button' class='btn btn-secondary btn-sm' onclick='location.href=\"dashboard.php\"'>Home</button>&nbsp;&nbsp;<button type='button' class='btn btn-danger btn-sm' onclick='location.href=\"dashboard.php?action=dthrc\"'>Next Recharge</button></div>";
                  html = "<div style='width:100%;padding:10px;background:#fff;text-align:center;color:red'><img src='https://www.saralservices.in/app/assets/accessdenied.png' style='width:128px'><br><br>Transaction failed.<br>"+obj.message;
                 if (parseFloat(obj.balance)>=0) {
                     html += "<br>Balance Amount: "+obj.balance
                 }
                 html += "</div>" +buttons;
                 $('#balance_div').html("Rs. "+obj.balance);
            } else {
                buttons = "<div style='text-align:center;padding:10px;'><button type='button' class='btn btn-secondary btn-sm' onclick='location.href=\"dashboard.php\"'>Home</button>&nbsp;&nbsp;<button type='button' class='btn btn-danger btn-sm' onclick='location.href=\"dashboard.php?action=dthrc\"'>Next Recharge</button>&nbsp;&nbsp;<button type='button' class='btn btn-danger btn-sm' onclick='location.href=\"dashboard.php?action=my_contacts_add_dth&optr=prepaid&id="+obj.txnid+"\"'>Save Contact</button></div>";     
                html = "<div style='width:100%;padding:10px;background:#fff;text-align:center;color:#222'><img src='https://www.saralservices.in/app/assets/tick.jpg' style='width:128px'><br><br>Recharge Success<br>Operator ID: "+obj.operatorid+"<br>Balance Amount: "+obj.balance+"</div>";
                html += "<br>" + buttons;
            }
            
            $.ajax({url:'webservice.php?action=recentDTHRecharges',success:function(resData){
                 $('#recentRecharges').html(resData);
            }});
           // $("#planDetails").html(html);
            $("#confrimation_text").html(html);
            $('#MobileNumber').val("");
            $('#RechargeAmt').val("");
        });
    }
    function GetUsersfrDth() {
         $("#confrimation_text").html(loading);
         $.ajax({url:'webservice.php?action=GetUsersfrDth&rand=<?php echo rand(3000,900000);?>',async:true,crossDomain:true,success:function(data){
            $('#confrimation_text').html(data);
            $('#confirmModalLong').modal("show");
         }});
    } 
    function selectDTHNumber(mob,d) {
        
        $('#x'+d).trigger( "click" );
        $("#MobileNumber").val(mob);  
        $("#MobileNumber").focus();
        $('#confirmModalLong').modal("hide");
        $("#doc_body").scrollTop()
        getMobileRechargePlan();
    }
    <?php if(isset($_GET['dthnumber'])) {   ?>
         $(document).ready(function(){
            getMobileRechargePlan();
         });
     
 <?php } ?>
</script>
  