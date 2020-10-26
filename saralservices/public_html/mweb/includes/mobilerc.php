<style>
.errorstring{text-align: right;width:100%;font-size:12px;padding:5px}
</style>
<?php $operatorName = array("RA"=>"Airtel","RB"=>"BSNL","RJ"=>"JIO","RV"=>"Vodafone","RI"=>"IDEA"); ?>
<script>
var Region="";
</script>
<div class="main-panel">
    <div class="container" style="margin-top:0px !important">
        <div class="page-inner">
            <?php
                $downOptrs=array();
                $downOptrsCode=array();
                foreach(array('RA','RB','RJ','RV','RI') as $o) {
                    $temp_sql= $mysql->select("select * from `_tbl_operators` where APIID='0' and OperatorCode='".$o."'");
                    if (sizeof($temp_sql)==1) {
                        $downOptrs[]=$temp_sql[0]['OperatorName'];  
                        $downOptrsCode[]=$temp_sql[0]['OperatorCode'];  
                    }
                }
                if (sizeof($downOptrs)>0) {
            ?>
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <span style="color:red"><b><?php echo implode(",",$downOptrs); ?></b> currently down</span>
                    </div>
                </div>
            </div> 
            <?php } ?>
            <div class="row">
                <div class="col-md-12" style="padding: 5px;">
                    <div class="card" style="background: none;">
                        <div class="card-header">
                            <div class="card-title" style="text-align: center;">Mobile Recharge</div>
                        </div>
                        <form method="POST" action="" id="rechargefrom">
                            <div class="card-body" style="padding:0px;background:none;">
                                 <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1" style="padding-left:48px;font-weight:bold">+91</span>
                                                    </div>
                                                    <?php 
                                                        if(isset($_GET['mobilenumber']))  {
                                                            $mob=$_GET['mobilenumber'];
                                                        } else {
                                                            $mob ="";
                                                        }
                                                    ?>
                                                    <input type="number" onblur="getMobileRechargePlan()" class="form-control  btn-sm" value="<?php echo isset($_POST['MobileNumber']) ? $_POST['MobileNumber'] : $mob;?>" id="MobileNumber" name="MobileNumber" placeholder="Mobile Number" style="font-size:16px" maxlength="10">
                                                    <div class="input-group-append" id="viewUser">
                                                        <span class="input-group-text" onclick="GetUsers()" id="basic-addon1" style="border: none;background:#fff;color:#1572E8 "><i class="icon-user"></i></span>
                                                    </div>
                                                </div>
                                                <div class="errorstring" id="ErrMobile"></div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12">                   
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1" style="padding-left:48px;font-weight:bold">INR</span>
                                                    </div>
                                                    <input type="number" class="form-control  btn-sm" id="RechargeAmt" name="RechargeAmt" placeholder="Amount" style="font-size:16px">
                                                </div>
                                                <div class="errorstring" id="ErrAmount"><?php echo isset($ErrName)? $ErrName : "";?></div>
                                            </div>
                                        </div>
                                         <div class="row" style="margin-bottom:5px;">
                                            <div class="col-lg-12 col-md-12 col-sm-12">                   
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" id="basic-addon1" style="font-weight:bold">Operator</span>
                                                    </div>
                                                    <select class="form-control btn-sm" id="optr" name="optr" placeholder="optr" style="font-size:15px;border:none;color:#666;padding-bottom:8px;padding-top:8px">
                                                        <option value="RA" <?php echo (in_array("RA",$downOptrsCode) ? " disabled='disabled' style='color:#fff;background:red' " : "");?> >Airtel <?php echo (in_array("RA",$downOptrsCode) ? " (Operator Down)" : "");?></option>
                                                        <option value="RB" <?php echo (in_array("RB",$downOptrsCode) ? " disabled='disabled' style='color:#fff;background:red' " : "");?> >BSNL <?php echo (in_array("RB",$downOptrsCode) ? " (Operator Down)" : "");?></option>
                                                        <option value="RI" <?php echo (in_array("RI",$downOptrsCode) ? " disabled='disabled' style='color:#fff;background:red' " : "");?> >Idea <?php echo (in_array("RI",$downOptrsCode) ? " (Operator Down)" : "");?></option>
                                                        <option value="RJ" <?php echo (in_array("RJ",$downOptrsCode) ? " disabled='disabled' style='color:#fff;background:red' " : "");?> >Jio <?php echo (in_array("RJ",$downOptrsCode) ? " (Operator Down)" : "");?></option>
                                                        <option value="RV" <?php echo (in_array("RV",$downOptrsCode) ? " disabled='disabled' style='color:#fff;background:red' " : "");?> >Vodafone <?php echo (in_array("RV",$downOptrsCode) ? " (Operator Down)" : "");?></option>
                                                    </select>
                                                      <div class="input-group-prepend"  style="border:none" id="viewplan_txt">
                                                    </div>
                                                </div>
                                                <div class="errorstring" id="ErrName"><?php echo isset($ErrName)? $ErrName : "";?></div>
                                            </div>
                                        </div>
                                        <div class="row" style="margin-bottom:10px;">
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <button type="button" class="btn btn-black" onclick="location.href='dashboard.php';" style="background:#6c757d !important;width: 46%;">Back</button>
                                                <button type="button" class="btn btn-danger" onclick="doConfrim()" style="width: 46%;float:right" name="BtnSubmit">Recharge</button>
                                            </div>                                        
                                        </div>
                                        <div class="row">
                                             <div class="col-lg-12 col-md-12 col-sm-12" id="planDetails" style="padding:20px;margin:15px"></div>
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
<div class="modal fade" id="confirmModalLong" tabindex="-1" role="dialog" data-keyboard="false" data-backdrop="static" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body" id="confrimation_text" style="padding:10px;max-height: 80vh;overflow: auto;">
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

$(document).ready(function(){
        
        $("#MobileNumber").blur(function(){
            $('#ErrMobile').html("");
            var m = $('#MobileNumber').val().trim();
            if (m.length==0) {
                $('#ErrMobile').html("Please Enter Mobile Number");
            } else {
                if (!($('#MobileNumber').val().length==10 && parseInt($('#MobileNumber').val())>6000000000 && parseInt($('#MobileNumber').val())<9999999999)) {
                    $('#ErrMobile').html("Invalid Mobile Number");
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


    var loading = "<div style='padding:80px;text-align:center;color:#aaa'><img src='https://www.saralservices.in/app/assets/loading.gif'  style='width:80px'><br>Processing ...</div>";
    var viewplan_html='<span class="input-group-text" onclick="GetPlan()" id="basic-addon1" style="border: none;background:#fff;color:#1572E8 "><i class="icon-arrow-right-circle"></i>&nbsp;Plans</span>';
    function doConfrim() {
        
        $('#ErrMobile').html(""); 
        $('#ErrAmount').html(""); 
        
        if (!($('#MobileNumber').val().length==10 && parseInt($('#MobileNumber').val())>6000000000 && parseInt($('#MobileNumber').val())<9999999999)) {
            $('#ErrMobile').html("Invalid Mobile Number");
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
    function doRecharge() {
        
        $("#confrimation_text").html(loading);
        var buttons = "";
        $.post( "webservice.php?action=doRecharge",  $( "#rechargefrom" ).serialize(),function( data ) {
            var obj = JSON.parse(data); 
            var html = "";
            
            
            if (obj.status=="failure") {
                 html = "<div style='width:100%;padding:10px;background:#fff;text-align:center;color:red'><img src='https://www.saralservices.in/app/assets/accessdenied.png' style='width:128px'><br><br>Transaction failed.<br>"+obj.message;
                 if (parseFloat(obj.balance)>=0) {
                     html += "<br>Balance Amount: "+obj.balance
                 }
                 buttons = "<div style='text-align:center;padding:10px;'><button type='button' class='btn btn-secondary btn-sm' onclick='location.href=\"dashboard.php\"'>Home</button>&nbsp;&nbsp;<button type='button' class='btn btn-danger btn-sm' onclick='location.href=\"dashboard.php?action=mobilerc\"'>Next Recharge</button></div>";
                 html += "</div>" + buttons;
                 $('#balance_div').html("Rs. "+obj.balance);
            } else {
                html = "<div style='width:100%;padding:10px;background:#fff;text-align:center;color:#222'><img src='https://www.saralservices.in/app/assets/tick.jpg' style='width:128px'><br><br>Recharge Success<br>Saral ID: "+obj.txnid+"<br>Operator ID: "+obj.operatorid+"<br>Balance Amount: "+obj.balance+"</div>";
                buttons = "<div style='text-align:center;padding:10px;'><button type='button' class='btn btn-secondary btn-sm' onclick='location.href=\"dashboard.php\"'>Home</button>&nbsp;&nbsp;<button type='button' class='btn btn-danger btn-sm' onclick='location.href=\"dashboard.php?action=mobilerc\"'>Next Recharge</button>&nbsp;&nbsp;<button type='button' class='btn btn-danger btn-sm' onclick='location.href=\"dashboard.php?action=my_contacts_add_prepaid&optr=prepaid&id="+obj.txnid+"\"'>Save Contact</button></div>";    
                html += "<br>" + buttons;
                                
                $('#balance_div').html("Rs. "+obj.balance);
            }
                                                           
            $.ajax({url:'https://www.saralservices.in/app/webservice.php?action=recentMobileRecharges',async:true,crossDomain:true,success:function(resData){
                 $('#recentRecharges').html(resData);
            }});
            $("#confrimation_text").html(html);
            $('#MobileNumber').val("");
            $('#RechargeAmt').val("");
        });
    }

    function getMobileRechargePlan() {
        $("#planDetails").css({"background":"none"});
        $('#viewplan_txt').html('');
        $('#ErrMobile').html(""); 
        $('#ErrAmount').html(""); 
        if ($('#MobileNumber').val().length==10) {
            $("#planDetails").html(loading);
            $.ajax({url:'webservice.php?action=getMobileRechargePlan&number='+$('#MobileNumber').val()+'&rand=<?php echo rand(3000,900000);?>',async:true,crossDomain:true,success:function(data){
                $('#planDetails').html(data);
                $('#viewplan_txt').html(viewplan_html);
            }});
        } else {
            $('#ErrMobile').html("Invalid Mobile Number");
        }
    } 
    
    function GetPlan() {
        $('#ErrMobile').html(""); 
        if (!($('#MobileNumber').val().length==10 && parseInt($('#MobileNumber').val())>6000000000 && parseInt($('#MobileNumber').val())<9999999999)) {
            $('#ErrMobile').html("Invalid Mobile Number");
            return false;
        }
        
        $("#planDetails").html(loading);
        $.ajax({url:'webservice.php?action=GetMobileOperatorPlan&optr='+$('#optr').val()+'&Region='+Region+'&mobileno='+$('#MobileNumber').val()+'&rand=<?php echo rand(3000,900000);?>',async:true,crossDomain:true,success:function(data){
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
    
    
    function GetUsers() {
         $("#confrimation_text").html(loading);
         $.ajax({url:'webservice.php?action=GetUsers&rand=<?php echo rand(3000,900000);?>',async:true,crossDomain:true,success:function(data){
            $('#confrimation_text').html(data);
            $('#confirmModalLong').modal("show");
         }});
    } 
    function selectMobileNumber(mob,d) {
        $('#x'+d).trigger( "click" );
        $("#MobileNumber").val(mob);  
        $("#MobileNumber").focus();
        $('#confirmModalLong').modal("hide");
        $("#doc_body").scrollTop()
    }
     <?php if(isset($_GET['mobilenumber'])) {   ?>
         $(document).ready(function(){
            getMobileRechargePlan();
         });
     
 <?php } ?>
</script> 