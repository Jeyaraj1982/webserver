 <?php include_once("header.php");?>
             <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-9 align-self-center">
                        <h4 class="page-title">Request</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Request</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="col-3 align-self-center">
                        <div class="d-flex no-block justify-content-end align-items-center">
                            <div class="m-r-10 display-6 text-primary">
                                <i class="ti-user"></i>
                            </div>
                            <div class=""><small></small>
                                <h4 class="text-primary m-b-0 font-medium"><?php echo $_SESSION['User']['MemberName'];?></h4></div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="container-fluid">
                <div class="row">
                            <!-- Column -->
                            <div class="col-sm-12 col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex flex-row">
                                            <div class="align-self-center text-primary display-6"><i class="ti-wallet"></i></div>
                                            <div class="m-l-10 align-self-center">
                                                
                                            </div>
                                            <div class="ml-auto align-self-center text-right">
                                                <h4 class="m-b-10">Base Balance</h4>                                           
                                                <h4 class="font-medium m-b-0">
                                                <?php
                                                $mysqldb   = new MySqldatabase("localhost","ggcash_user","ggcash_user","ggcash_database");
                                                $bal = $mysqldb->select("select sum(Credits-Debits) as bal from _tbl_wallet_transactions where MemberID='".$_SESSION['User']['MemberID']."'");
                                                if (isset($bal[0]['bal'])) {
                                                    echo numbe_format($bal[0]['bal'],2);
                                                }   else {
                                                    echo "0.00";
                                                }
                                                ?>
                                                 
                                                
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Column -->
                            <!-- Column -->
                            <div class="col-sm-12 col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex flex-row">
                                            <div class="align-self-center text-success display-6"><i class="mdi mdi-calendar-check"></i></div>
                                            <div class="m-l-10 align-self-center">
                                                <span class="text-muted"></span>
                                            </div>
                                            <div class="ml-auto align-self-center text-right">
                                                <h4 class="m-b-10">Base Date</h4>
                                                <h4 class="font-medium m-b-0">Not set</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Column -->
                            <!-- Column -->
                            <div class="col-sm-12 col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex flex-row">
                                            <div class="align-self-center text-warning display-6"><i class="ti-wallet"></i></div>
                                            <div class="m-l-10 align-self-center">
                                                <span class="text-muted"><b>Actual</b>&nbsp;&nbsp;0.00 </span>
                                            </div>
                                            <div class="ml-auto align-self-center text-right">
                                                <h4 class="m-b-10">Withdrawal Limit</h4>
                                                <h4 class="font-medium m-b-0">  0.00 </h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Column -->
                            <!-- Column -->
                            <div class="col-sm-12 col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="d-flex flex-row">
                                            <div class="align-self-center text-danger display-6"><i class="mdi mdi-calendar-range"></i></div>
                                            <div class="m-l-10 align-self-center">
                                                
                                                <span class="text-muted"></span>
                                            </div>
                                            <div class="ml-auto align-self-center text-right">
                                                <h4 class="m-b-10">Next Reset Date</h4>
                                                <h4 class="font-medium m-b-0">Not set</h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Column -->
                        </div>
                                        
              <div class="row">
                    <div class="col-12">
                        <div class="card">
                          <div class="card-header bg-light-green">
                                        <h4 class="m-b-0 text-orange"><i class="mdi mdi-briefcase-download"></i>&nbsp;Enter Withdraw Details</h4>
                                      </div>
                            
                            <div class="card-body">
                                
                                    
                                            <div class="row">
                                            <div class="col-12">
                                                <div class="form-body row ">
                                        <form method="post" class="validation-wizard wizard-circle m-t-40 wizard clearfix" action="" role="application" novalidate>
                                            <div class="col-sm-12 row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                <h5>Available </h5>
                                                <div class="controls">
                                                    <input type="text" name="balance" id="balance" class="form-control" value=" 0.00" readonly required=""> <div class="help-block"></div></div>
                                                
                                            </div>
                                            </div>
                                            <div class="col-md-6">
                                    <div class="form-group">
                                    <h5>Withdraw Amount <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                                                                <input type="number" name="amount" id="amount" oncopy="return false" onpaste="return false" class="form-control" required data-validation-required-message="Please enter withdraw amount" onchange="return checkAmount(this.value);">
                                                                            <div class="help-block"></div></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 row">
                                            <div class="col-md-6">
                                    <div class="form-group">
                                    <h5>Choose Coin <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <select name="choose_coin" id="choose_coin" class="form-control" onchange="return ChooseCoin(this.value);" required>
                                                    <option value="">-- Select --</option>
                                                    <option value="BTC">Bitcoin</option>
                                                    <option value="BNB">Binance Coin</option>
                                                    <option value="BCH">Bitcoin Cash</option>
                                                    <option value="BSV">Bitcoin SV</option>
                                                    <option value="BDX">Beldex</option>
                                                    <option value="ADA">Cardano</option>
                                                    <option value="LINK">Chainlink</option>
                                                    <option value="ATOM">Cosmos</option>
                                                    <option value="DASH">Dash</option>
                                                    <option value="EOS">EOS</option>
                                                    <option value="ETH">Ethereum</option>
                                                    <option value="MIOTA">IOTA</option>
                                                    <option value="LTC">Litecoin</option>
                                                    <option value="ETH">Monero</option>
                                                    <option value="NEO">NEO</option>
                                                    <option value="XLM">Stellar</option>
                                                    <option value="USDT">Tether</option>
                                                    <option value="XTZ">Tezos</option>
                                                    <option value="TRX">TRON</option>
                                                    <option value="XRP">XRP</option>
                                                </select>
                                        <div class="help-block"></div></div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                    <div class="form-group">
                                    <h5>Wallet Address <span class="text-danger">*</span></h5>
                                    <div class="controls">
                                        <input type="text" name="btc_addr" id="btc_addr" placeholder="Wallet Address" value="" class="form-control" maxlength="300" required onchange="return checkAddress(this.value);" data-validation-required-message="Please enter Wallet Address"> <div class="help-block"></div></div>
                                        <span id="address_text" class="error_addr text-danger font-medium"></span>
                                    
                                </div>
                            </div>
                        </div>
                                    <div class="form-group float-right col-sm-12 m-b-0 text-right" id="withdraw">
                                        <button type="submit" class="btn btn-primary waves-effect waves-light block-default" >Withdraw</button>
                                        <a href=""><button class="btn btn-danger btn-cons" type="reset">Cancel</button></a>
                                    </div>
                                    </form>
                                </div>
                                
                                
                            </div>
                            </div>
                                    
                                
                                
                                <div class="col-12 p-t-30"><hr></div>
                                <div class="col-lg-12 col-md-12 col-sm-6">
                                        <h4 class="box-title m-t-30">Instructions :</h4>
                                        <ul class="list-unstyled">
                                            <li style="color:red;"><i class="fa fa-check text-success m-r-10 font-bold error"></i><b>NOTE: Use your wallet address only. Other address will not be acceptable</b></li>
        <li style="color:red;"><i class="fa fa-check text-success m-r-10 font-bold"></i>NOTE: If you entered irrelevant/wrong Wallet Address, company will not responsible for any occurrence</li>
                <li><i class="fa fa-check text-success m-r-10"></i>Once you select the correct value for withdrawal, you can see a submit button above these instructions</li>
        <li><i class="fa fa-check text-success m-r-10"></i>On clicking the submit button, you will receive an OTP in your email address</li>
        <li><i class="fa fa-check text-success m-r-10"></i>You can't copy the OTP and paste it here. You will have to enter it manually</li>
        <li><i class="fa fa-check text-success m-r-10"></i>If you have entered incorrrect OTP, Don't worry, you have another chance</li>
        <li><i class="fa fa-check text-success m-r-10"></i>If you have entered exact OTP, your withdrawal will be in queue and processed automatically</li>
                                        </ul>
                                    </div>

                                    </div>  
                                </div>
                            
                                </div>
                            </div>
                            

                            
                        
 <script>
$(document).ready(function() {
    $('#amount').keypress(function(event) {
      if ((event.which != 46 || $(this).val().indexOf('.') == -1) && (event.which < 48 || event.which > 57)) {
        event.preventDefault();
      }
    });
});
$(document).ready(function(){
$("#btc_addr").keyup(function(e) {
    $('.error_addr').hide();
    });
});
var cur_bal="218.729";
var min_wd_amt="100";  
cur_bal=parseInt(cur_bal);
min_wd_amt=parseInt(min_wd_amt);

function checkAmount(val){
val=parseInt(val);
if(val<min_wd_amt){
alert("Invalid withdraw Amount. Minimum "+min_wd_amt+" .");
document.getElementById('withdraw').style.display='none';
}else if(val>cur_bal){
alert("Invalid withdraw Amount. Exceeding your available withdrawal limit.");
document.getElementById('withdraw').style.display='none';
}else{
$('.min-amount').hide();
document.getElementById('withdraw').style.display='block';    
}

}
function checkAddress(address){   
var baseURL = 'https://gcchub.org/';
if(address == ''){
      alert(' Address cannot be empty');
      return false;
    } else {
        $.ajax({
            type: 'POST',
            url: baseURL+'panel/Wdl/CheckAddress',
            data:{"address":address},
            dataType: 'json',
            success: function(data){
              if(data != ''){
                $("#address_text").html(data);
                $("#address_text").show();
                document.getElementById('withdraw').style.display='none';
              } else if(data == ''){
                document.getElementById('withdraw').style.display='block';
              }
            }
        });   
        return false; 
    }
    return true;

}
function ChooseCoin(coin){
    if(coin != 'BDX'){
        alert('This feature is currently unavailable.');
    }

} 
    
</script>
<style type="text/css">
@media (max-width: 39.9375em){
.text-right {
    text-align: right!important;
}
}
</style>                           </div>
            


            


         <?php include_once("footer.php"); ?>



 
