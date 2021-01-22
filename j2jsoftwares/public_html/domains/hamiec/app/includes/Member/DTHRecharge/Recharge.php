 <style>
.errorstring{text-align: right;width:100%;font-size:12px;padding:5px}
</style>
<?php
     $operatorName = array("DD"=>"Dish TV","DA"=>"Airtel Digital Tv","DT"=>"Tatasky","DS"=>"Sun Direct","DV"=>"Videocon d2h","DB"=>"Big Tv");
     $txn = $mysql->select("select * from _tbl_transactions where operatorcode in ('DA','DS','DV','DB','DT','DD') and MemberID='".$_SESSION['User']['MemberID']."' order by txnid desc limit 0,10");
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
                <div class="col-md-5">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">DTH Recharge</div>
                        </div>
                        <form method="POST" action="" id="rechargefrom">
                            <div class="card-body">
                                 <div class="row">
                                    <div class="col-md-12">
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text " id="basic-addon1"><i class="icon-screen-desktop"></i></span>
                                                    </div>
                                                    <?php 
                                                        if(isset($_GET['dthnumber']))  {
                                                            $dth=$_GET['dthnumber'];
                                                        } else {
                                                            $dth ="";
                                                        }
                                                    ?>
                                                    <input type="number" onblur="getMobileRechargePlan()" value="<?php echo isset($_POST['MobileNumber']) ? $_POST['MobileNumber'] : $dth;?>"  class="form-control  btn-sm" id="MobileNumber" name="MobileNumber" placeholder="DTH Number" style="font-size:16px">
                                                    <div class="input-group-append" id="viewUser">
                                                        <span class="input-group-text" onclick="GetUsersfrDth()" id="basic-addon1"><i class="icon-user"></i></span>
                                                    </div>
                                                </div>
                                                <div class="errorstring" id="ErrMobile"> </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12">                   
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text  btn-sm" id="basic-addon1">INR</span>
                                                    </div>
                                                    <input type="number" class="form-control  btn-sm" id="RechargeAmt" name="RechargeAmt" placeholder="Amount" style="font-size:16px" maxlength="12">
                                                </div>
                                                <div class="errorstring" id="ErrAmount"></div>
                                            </div>
                                        </div>
                                         <div class="row" style="margin-bottom:15px;">
                                            <div class="col-lg-12 col-md-12 col-sm-12">                   
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text  btn-sm" id="basic-addon1">Operator</span>
                                                    </div>
                                                    <select class="form-control  btn-sm" id="optr" name="optr" placeholder="optr" onchange="GetPlan()" style="font-size:16px">
                                                        <option value="DA" <?php echo (in_array("DA",$downOptrsCode) ? " disabled='disabled' style='color:#fff;background:red' " : "");?>>Airtel DTH <?php echo (in_array("DA",$downOptrsCode) ? " (Operator Down)" : "");?></option>
                                                        <option value="DB" <?php echo (in_array("DB",$downOptrsCode) ? " disabled='disabled' style='color:#fff;background:red' " : "");?>>Big TV <?php echo (in_array("DB",$downOptrsCode) ? " (Operator Down)" : "");?></option>
                                                        <option value="DD" <?php echo (in_array("DD",$downOptrsCode) ? " disabled='disabled' style='color:#fff;background:red' " : "");?>>Dish TV <?php echo (in_array("DD",$downOptrsCode) ? " (Operator Down)" : "");?></option>
                                                        <option value="DS" <?php echo (in_array("DS",$downOptrsCode) ? " disabled='disabled' style='color:#fff;background:red' " : "");?>>Sun Direct <?php echo (in_array("DS",$downOptrsCode) ? " (Operator Down)" : "");?></option>
                                                        <option value="DT" <?php echo (in_array("DT",$downOptrsCode) ? " disabled='disabled' style='color:#fff;background:red' " : "");?>>Tata Sky <?php echo (in_array("DT",$downOptrsCode) ? " (Operator Down)" : "");?></option>
                                                        <option value="DV" <?php echo (in_array("DV",$downOptrsCode) ? " disabled='disabled' style='color:#fff;background:red' " : "");?>>Videocon d2h <?php echo (in_array("DV",$downOptrsCode) ? " (Operator Down)" : "");?></option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                <button type="button" onclick="doConfrim()" class="btn btn-primary  btn-sm" name="BtnSubmit">Recharge</button>
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
                    <div style="padding:100px 95px;color:#ccc;text-align: center;font-size: 22px;">
                        Enter the dth number to view recharge plans and customer information
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
      <div class="modal-body" id="confrimation_text" style="padding:10px;">
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
var loading = "<div style='padding:80px;text-align:center;color:#aaa'><img src='assets/loading.gif'  style='width:80px'><br>Processing ...</div>";
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
                if (!(parseFloat(amt)>=10 && parseInt(amt)<5000)) {
                    $('#ErrAmount').html("Invalid Amount");
                }
            }
        });
});
    function getMobileRechargePlan() {
        
        var res = $('#MobileNumber').val().substring(0,1);
        var c=0;
                
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
    }                      
    
    function GetPlan() {
         $('#planDetails').html(loading);
            $.ajax({url:'webservice.php?action=GetDTHPlan&optr='+$('#optr').val()+'&rand=<?php echo rand(3000,900000);?>',success:function(data){
                $('#planDetails').html(data);
            }});
        
    }
    function selectAmount(amt) {
        $("#RechargeAmt").val(amt);
    }
    
    
    
    var viewplan_html='<span class="input-group-text" onclick="GetPlan()" id="basic-addon1" style="border: none;background:#fff;color:#1572E8 "><i class="icon-arrow-right-circle"></i>&nbsp;Plans</span>';
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
  
    function doRecharge() {
        $('#confirmModalLong').modal("hide");
        $('#ErrMobile').html(""); 
        $('#ErrAmount').html(""); 
        
        
        if (!( parseInt($('#RechargeAmt').val())>=10 && parseInt($('#RechargeAmt').val())<5000)) {
        
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
                html += "<br><a href='dashboard.php?action=Settings/AddContacts_DTH&optr=dth&id="+obj.txnid+"' class='btn btn-primary   btn-sm'>Add Contact</a></div>";
            }
            
            $.ajax({url:'webservice.php?action=recentDTHRecharges',success:function(resData){
                 $('#recentRecharges').html(resData);
            }});
            $("#planDetails").html(html);
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
</script>
          