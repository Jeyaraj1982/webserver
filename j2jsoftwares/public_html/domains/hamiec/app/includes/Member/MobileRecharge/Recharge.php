 <style>
.errorstring{text-align: right;width:100%;font-size:12px;padding:5px}
</style>
<?php
    $operatorName = array("RA"=>"Airtel","RB"=>"BSNL","RJ"=>"JIO","RV"=>"Vodafone","RI"=>"IDEA");
    $txn = $mysql->select("select * from _tbl_transactions where operatorcode in ('RA','RB','RJ','RV','RI') and MemberID='".$_SESSION['User']['MemberID']."' order by txnid desc limit 0,10");
?>
<script>
var Region="";
</script>
<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
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
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <span style="color:red"><b><?php echo implode(",",$downOptrs); ?></b> currently down</span>
                    </div>
                    <?php } ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Mobile Recharge</div>
                        </div>
                        <form method="POST" action="" id="rechargefrom">
                            <div class="card-body">
                                 <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text btn-sm" id="basic-addon1">+91</span>
                                                    </div>
                                                    <?php 
                                                        if(isset($_GET['mobilenumber']))  {
                                                            $mob=$_GET['mobilenumber'];
                                                        } else {
                                                            $mob ="";
                                                        }
                                                    ?>
                                                    <input type="number" onblur="getMobileRechargePlan()" class="form-control  btn-sm" id="MobileNumber" name="MobileNumber"  value="<?php echo isset($_POST['MobileNumber']) ? $_POST['MobileNumber'] : $mob;?>"  placeholder="Mobile Number" style="font-size:16px" maxlength="10">
                                                    <div class="input-group-append" id="viewUser">
                                                        <span class="input-group-text btn-sm" onclick="GetUsers()" id="basic-addon1"><i class="icon-user"></i></span>
                                                    </div>
                                                </div>
                                                <div class="errorstring" id="ErrMobile"></div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12">                   
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text  btn-sm" id="basic-addon1">INR</span>
                                                    </div>
                                                    <input type="number" class="form-control  btn-sm" id="RechargeAmt" name="RechargeAmt" placeholder="Amount" style="font-size:16px">
                                                </div>
                                                <div class="errorstring" id="ErrAmount"><?php echo isset($ErrName)? $ErrName : "";?></div>
                                            </div>
                                        </div>
                                         <div class="row" style="margin-bottom:15px;">
                                            <div class="col-lg-12 col-md-12 col-sm-12">                   
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text  btn-sm" id="basic-addon1">Operator</span>
                                                    </div>
                                                    <select class="form-control btn-sm" id="optr" name="optr" placeholder="optr" onchange="GetPlan()" style="font-size:16px">
                                                        <option value="RA" <?php echo (in_array("RA",$downOptrsCode) ? " disabled='disabled' style='color:#fff;background:red' " : "");?> >Airtel <?php echo (in_array("RA",$downOptrsCode) ? " (Operator Down)" : "");?></option>
                                                        <option value="RB" <?php echo (in_array("RB",$downOptrsCode) ? " disabled='disabled' style='color:#fff;background:red' " : "");?> >BSNL <?php echo (in_array("RB",$downOptrsCode) ? " (Operator Down)" : "");?></option>
                                                        <option value="RI" <?php echo (in_array("RI",$downOptrsCode) ? " disabled='disabled' style='color:#fff;background:red' " : "");?> >Idea <?php echo (in_array("RI",$downOptrsCode) ? " (Operator Down)" : "");?></option>
                                                        <option value="RJ" <?php echo (in_array("RJ",$downOptrsCode) ? " disabled='disabled' style='color:#fff;background:red' " : "");?> >Jio <?php echo (in_array("RJ",$downOptrsCode) ? " (Operator Down)" : "");?></option>
                                                        <option value="RV" <?php echo (in_array("RV",$downOptrsCode) ? " disabled='disabled' style='color:#fff;background:red' " : "");?> >Vodafone <?php echo (in_array("RV",$downOptrsCode) ? " (Operator Down)" : "");?></option>
                                                    </select>
                                                </div>
                                                <div class="errorstring" id="ErrName"><?php echo isset($ErrName)? $ErrName : "";?></div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <button type="button" class="btn btn-primary   btn-sm" onclick="doConfrim()" name="BtnSubmit">Recharge</button>
                                            </div>                                        
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-7">
                <div class="card" style="margin-bottom:5px;">
                <div class="card-body" id="planDetails">
                    <div style="padding:100px 95px;color:#ccc;text-align: center;font-size: 26px;">
                        Enter the mobile number to view recharge plans
                    </div> 
                </div>
                </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="card">
                        <div class="card-header">
                             <div class="card-title">Recent Transactions</div>
                        </div>
                    <div class="card-body" id="recentRecharges">
                            <div class="table-responsive">
                                <table id="myTable" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Txn ID</th>
                                            <th>Txn Date</th>
                                            <th>Number</th>                                                                                           
                                            <th>Operator</th>                                                                                           
                                            <th>Amount</th>                                                                                           
                                            <th>Status</th>                                                                                           
                                            <th>Operator ID</th>                                                                                           
                                        </tr>
                                    </thead>                                                                         
                                    <tbody>
                                    <?php foreach($txn as $t){ ?>
                                        <tr>
                                            <td><?php echo $t['txnid'];?></td>
                                            <td><?php echo $t['txndate'];?></td>
                                            <td><?php echo $t['rcnumber'];?></td>
                                            <td><?php echo $operatorName[$t['operatorcode']];?></td>
                                            <td style="text-align: right"><?php echo  number_format($t['rcamount'],2);?></td>
                                            <td><?php 
                                            if ($t['TxnStatus']=="failure") {
                                                echo "<span style='background:red;color:#fff;padding:3px 10px;border-radius:5px' title='".$t['msg']."'>Failure</span>";
                                            } elseif ($t['TxnStatus']=="success") {
                                                echo "<span style='background:green;color:#fff;padding:3px 10px;border-radius:5px'>Success</span>";
                                            } else {
                                               echo "<span style='background:Orange;color:#fff;padding:3px 10px;border-radius:5px'>Pending</span>"; 
                                            }
                                              ?></td>
                                            <td style="text-align: right"><?php echo strlen($t['OperatorNumber'])>3 ? $t['OperatorNumber'] : "";?></td>
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
<div class="modal fade" id="confirmModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
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
    var loading = "<div style='padding:80px;text-align:center;color:#aaa'><img src='assets/loading.gif'  style='width:80px'><br>Processing ...</div>";
    
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
         $('#confirmModalLong').modal("hide");
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
       
        $("#planDetails").html(loading);
        
        $.post( "webservice.php?action=doRecharge",  $( "#rechargefrom" ).serialize(),function( data ) {
            var obj = JSON.parse(data); 
            var html = "";
            if (obj.status=="failure") {
                 html = "<div style='text-align:center;'><img src='assets/accessdenied.png' style='width:128px'><br><br>Transaction failed.<br>"+obj.message;
                 if (parseFloat(obj.balance)>=0) {
                     html += "<br>Balance Amount: "+obj.balance;
                 }
                 html += "</div>";
            } else {
                html = "<div style='text-align:center;'><img src='assets/tick.jpg' style='width:128px'><br><br>Recharge Success<br>Operator ID: "+obj.operatorid+"<br>Balance Amount: "+obj.balance;
                html += "<br><a href='dashboard.php?action=Settings/AddContacts_Prepaid&optr=prepaid&id="+obj.txnid+"' class='btn btn-primary   btn-sm'>Add Contact</a></div>";
            }
            
            $.ajax({url:'webservice.php?action=recentMobileRecharges',success:function(resData){
                 $('#recentRecharges').html(resData);
            }});
            $("#planDetails").html(html);
            $('#MobileNumber').val("");
            $('#RechargeAmt').val("");
        });
    }

    function getMobileRechargePlan() {
        $('#ErrMobile').html(""); 
        $('#ErrAmount').html(""); 
        if ($('#MobileNumber').val().length==10) {
            $("#planDetails").html(loading);
            $.ajax({url:'webservice.php?action=getMobileRechargePlan&number='+$('#MobileNumber').val()+'&rand=<?php echo rand(3000,900000);?>',success:function(data){
                $('#planDetails').html(data);
            }});
        } else {
             $('#ErrMobile').html("Invalid Mobile Number");
        }
    } 
    
    function GetPlan() {
        $( "#planDetails" ).html(loading);
        $.ajax({url:'webservice.php?action=GetMobileOperatorPlan&optr='+$('#optr').val()+'&Region='+Region+'&mobileno='+$('#MobileNumber').val()+'&rand=<?php echo rand(3000,900000);?>',success:function(data){
            $('#planDetails').html(data);
        }});
    }
    
    function selectAmount(amt) {
        $("#RechargeAmt").val(amt);
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
          