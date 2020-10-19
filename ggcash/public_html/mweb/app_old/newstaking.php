<?php include_once("header.php");?>
   <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-9 align-self-center">
                        <h4 class="page-title"> Staking</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page"> Staking</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <div class="col-3 align-self-center">
                        <div class="d-flex no-block justify-content-end align-items-center">
                            <div class="m-r-10 display-6 text-primary">
                                <i class="ti-user"></i>
                            </div>
                            <div class=""><small> </small>
                                <h4 class="text-primary m-b-0 font-medium"><?php echo $_SESSION['User']['MemberName'];?></h4></div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="container-fluid">
                <div class="col-12">
  <div class="card">
      <div class="card-body wizard-content">
        <h4 class="card-title text-orange"><i class="ti-settings"></i>&nbsp;&nbsp;  Staking</h4>
          <h6 class="card-subtitle">Start earning by submitting a staking</h6>
          
          <div class="row p-t-20">
                            <div class="col-lg-3 col-md-6">
                                <div class="card border-left border-primary bg-primary text-bg bg-image bg-overlay-primary p-10">
                                    <div class="card-body p-0">
                                        <div class="d-flex no-block align-items-center p-b-10">
                                            <div>
                                                <span class="text-orange display-6"><i class="display-7 mdi mdi-bank text-primary"></i></span>
                                            </div>
                                            <div class="ml-auto">
                                                <p class="text-right">Available Balance</p>
                                                <h3 class="text-bg text-right">0.00 </h3>
                                            </div>
                                            
                                                
                                        </div>
                                        <div class="progress">
                                                    <div class="progress-bar bg-primary " role="progressbar" style="width: 100%; height: 3px;" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="card border-left border-success bg-success text-bg bg-image bg-overlay-success p-10">
                                    <div class="card-body p-0">
                                        <div class="d-flex no-block align-items-center p-b-10">
                                            <div>
                                                <span class="text-orange display-6"><i class="display-6 mdi mdi-etsy text-success"></i></span>
                                            </div>
                                            <div class="ml-auto">
                                                <p class="text-right">Earning Balance</p>
                                                <h3 class="text-bg text-right">0.00 </h3>
                                            </div>
                                            
                                                
                                        </div>
                                        <div class="progress">
                                                    <div class="progress-bar bg-success " role="progressbar" style="width: 100%; height: 3px;" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="card border-left border-warning bg-success text-bg bg-image bg-overlay-warning p-10">
                                    <div class="card-body p-0">
                                        <div class="d-flex no-block align-items-center p-b-10">
                                            <div>
                                                <span class="text-orange display-6"><i class="mdi mdi-format-bold text-warning"></i></span>
                                            </div>
                                            <div class="ml-auto">
                                                <p class="text-right">Bonus Balance</p>
                                                <h3 class="text-bg text-right">0.00 </h3>
                                            </div>
                                            
                                                
                                        </div>
                                        <div class="progress">
                                                    <div class="progress-bar bg-warning " role="progressbar" style="width: 100%; height: 3px;" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="card border-left border-danger bg-success text-bg bg-image bg-overlay-danger p-10">
                                    <div class="card-body p-0">
                                        <div class="d-flex no-block align-items-center p-b-10">
                                            <div>
                                                <span class="text-danger display-6"><i class="mdi mdi-format-section"></i></span>
                                            </div>
                                            <div class="ml-auto">
                                                <p class="text-right">Staking Balance</p>
                                                <h3 class="text-bg text-right">0.00 </h3>
                                            </div>
                                            
                                                
                                        </div>
                                        <div class="progress">
                                                    <div class="progress-bar bg-danger " role="progressbar" style="width: 100%; height: 3px;" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                    </div>
                                </div>
                            </div>
                        </div>
        <div class="row">
          <div class="col-12">
            <div class="form-body">
          <form action="" class="validation-wizard wizard-circle m-t-40 wizard clearfix error" role="application" id="steps-uid-7" novalidate="novalidate" method="post">
            <div class="steps clearfix">
              <ul role="tablist">
                <li role="tab" class="first current done" aria-disabled="false" aria-selected="true"><a id="steps-uid-7-t-0" href="#steps-uid-7-h-0" aria-controls="steps-uid-7-p-0"><span class="current-info audible">current step: </span><span class="step">1</span> 1. Choose Package, Staking Mode & Payment Option</a></li>
                <li role="tab" class="disabled mobile_hide" aria-disabled="true"><a id="steps-uid-7-t-1" href="#steps-uid-7-h-1" aria-controls="steps-uid-7-p-1"><span class="step">2</span> 2. Scan QR</a></li>
                <li role="tab" class="disabled mobile_hide" aria-disabled="true"><a id="steps-uid-7-t-2" aria-controls="steps-uid-7-p-2"><span class="step">3</span> 3. Input Tranaction ID</a></li>
              </ul>

              <div class="card-body">
              <div class="row">
                <label for="com1" class="col-sm-2  control-label text-white p-b-30" ><span id="pointer">Choose Package</span></label>
                                              <div class="col-lg-3 col-sm-12 col-xs-12">
                                                <div class="form-group row error">
                                                    
                                                    <div class="col-md-12">
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" id="customRadio1" name="vol" value="1000" class="custom-control-input" required  aria-invalid="true" data-validation-required-message="Select any one Staking Volume">
                                                            <label class="custom-control-label" for="customRadio1">1,000  <i class="m-l-15 mdi mdi-shopping"></i></label>
                                                            <div class="help-block"></div>
                                                        </div>
                                            
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-sm-12 col-xs-12">
                                                <div class="form-group row">
                                                    
                                                    <div class="col-md-12">
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" id="customRadio2" name="vol" value="2000" class="custom-control-input" required>
                                                            <label class="custom-control-label" for="customRadio2">2,000  <i class="m-l-15 mdi mdi-shopping"></i></label>
                                                        </div>
                                            
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-sm-12 col-xs-12">
                                                <div class="form-group row">
                                                    
                                                    <div class="col-md-12">
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" id="customRadio3" name="vol" value="5000" class="custom-control-input" required>
                                                            <label class="custom-control-label" for="customRadio3">5,000  <i class="m-l-15 mdi mdi-shopping"></i></label>
                                                        </div>
                                            
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 p-t-15 p-b-20 mobile_hide"><hr></div>
                                            <label for="com1" class="col-sm-2 text-left control-label ">&nbsp;</label>
                                              <div class="col-lg-3 col-sm-12 col-xs-12">
                                                <div class="form-group row">
                                                    
                                                    <div class="col-md-12">
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" id="customRadio4" name="vol" value="10000" class="custom-control-input" required>
                                                            <label class="custom-control-label" for="customRadio4">10,000  <i class="m-l-15 mdi mdi-shopping"></i></label>
                                                        </div>
                                            
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-sm-12 col-xs-12">
                                                <div class="form-group row">
                                                    
                                                    <div class="col-md-12">
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" id="customRadio5" name="vol" value="20000" class="custom-control-input" required>
                                                            <label class="custom-control-label" for="customRadio5">20,000  <i class="m-l-15 mdi mdi-shopping"></i></label>
                                                        </div>
                                            
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-sm-12 col-xs-12">
                                                <div class="form-group row">
                                                    
                                                    <div class="col-md-12">
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" id="customRadio6" name="vol" value="50000" class="custom-control-input" required>
                                                            <label class="custom-control-label" for="customRadio6">50,000  <i class="m-l-15 mdi mdi-shopping"></i></label>
                                                        </div>
                                            
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 p-t-15 p-b-20 mobile_hide"><hr></div>
                                            <label for="com1" class="col-sm-2 text-left control-label ">&nbsp;</label>
                                              <div class="col-lg-3 col-sm-12 col-xs-12">
                                                <div class="form-group row">
                                                    
                                                    <div class="col-md-12">
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" id="customRadio7" name="vol" value="100000" class="custom-control-input" required>
                                                            <label class="custom-control-label" for="customRadio7">100,000  <i class="m-l-15 mdi mdi-shopping"></i></label>
                                                        </div>
                                            
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-sm-12 col-xs-12">
                                                <div class="form-group row">
                                                    
                                                    <div class="col-md-12">
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" id="customRadio8" name="vol" value="200000" class="custom-control-input" required>
                                                            <label class="custom-control-label" for="customRadio8">200,000  <i class="m-l-15 mdi mdi-shopping"></i></label>
                                                        </div>
                                            
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-sm-12 col-xs-12">
                                                <div class="form-group row">
                                                    
                                                    <div class="col-md-12">
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" id="customRadio9" name="vol" value="500000" class="custom-control-input"  required >
                                                            <label class="custom-control-label" for="customRadio9">500,000  <i class="m-l-15 mdi mdi-shopping"></i></label>
                                                        </div>
                                                        
                                                    </div>

                                                </div>
                                            </div>
                                            
                                            <div class="col-12 p-t-15 p-b-20"><hr></div>
                                            <label for="com1" class="col-sm-2  control-label text-white p-b-30" ><span id="pointer">Staking Mode</span></label>
                                              <div class="col-lg-3 col-sm-12 col-xs-12">
                                                <div class="form-group row">
                                                    
                                                    <div class="col-md-12">
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" id="customRadio10" name="roimode" value="Fixed" class="custom-control-input" required data-validation-required-message="Select any one of the Staking Mode">
                                                            <label class="custom-control-label" for="customRadio10">Fixed <i class="m-l-15 mdi mdi-network-question" data-toggle="tooltip" data-placement="right" title="" data-original-title="Double your Crypto in 12 months"></i></label>
                                                            <div class="help-block"></div>
                                                        </div>
                                            
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-3 col-sm-12 col-xs-12">
                                                <div class="form-group row">
                                                    
                                                    <div class="col-md-12">
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" id="customRadio11" name="roimode" value="Regular" class="custom-control-input" required data-validation-required-message="This field is required">
                                                            <label class="custom-control-label" for="customRadio11">Regular <i class="m-l-15 mdi mdi-network-question" data-toggle="tooltip" data-placement="right" title="" data-original-title="Earn 10% every month for 18 months"></i></label>
                                                        </div>
                                            
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 p-t-15 p-b-20"><hr></div>
                                            <label for="com1" class="col-sm-2  control-label text-white p-b-20" ><span id="pointer">Payment Option</span></label>
                                              <div class="col-sm-10 col-xs-12">
                                                <div class="form-group row">
                                                    
                                                    <div class="col-md-12">
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" id="customRadio12" value="EXCHG" name="payment_option" class="custom-control-input" required   >
                                                            <label class="custom-control-label" for="customRadio12">100% Exchange/Wallet <i class="m-l-15 mdi mdi-information" data-toggle="tooltip" data-placement="right" title="" data-original-title="100% of the staking volume can be brought in from the Exchange or wallet."></i></label>
                                                        </div>
                                            
                                                    </div>
                                                </div>
                                            </div>
                                            <label for="com1" class="col-sm-2 text-center control-label mobile_hide p-b-20">&nbsp;</label>
                                              <div class="col-sm-10 col-xs-12">
                                                <div class="form-group row">
                                                    <div class="col-md-12">
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" id="customRadio13" value="AVBL" name="payment_option" required class="custom-control-input" >
                                                            <label class="custom-control-label" for="customRadio13">100% Available Balance (Retopup) <i class="m-l-15 mdi mdi-information" data-toggle="tooltip" data-placement="right" title="" data-original-title="100% of the staking volume will be deducted from your Available Balance."></i></label>
                                                        </div>
                                            
                                                    </div>
                                                </div>
                                            </div>
                                            <label for="com1" class="col-sm-2 text-center control-label mobile_hide p-b-20">&nbsp;</label>
                                              <div class="col-sm-10 col-xs-12">
                                                <div class="form-group row">
                                                    <div class="col-md-12">
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" id="customRadio14" value="EXGCC" name="payment_option" required class="custom-control-input"  disabled >
                                                            <label class="custom-control-label" for="customRadio14">50% Exchange/Wallet, 25% Staking Balance & 25% Earning Balance <i class="m-l-15 mdi mdi-information" data-toggle="tooltip" data-placement="right" title="" data-original-title="50% of the staking volume can be brought in from Exchange/Wallet & 25% will be deducted from your Staking Balance and Earning Balance."></i></label>
                                                        </div>
                                            
                                                    </div>
                                                </div>
                                            </div>
                                            <label for="com1" class="col-sm-2 text-center control-label mobile_hide p-b-20">&nbsp;</label>
                                              <div class="col-sm-10 col-xs-12">
                                                <div class="form-group row">
                                                    <div class="col-md-12">
                                                        <div class="custom-control custom-radio">
                                                            <input type="radio" id="customRadio15" value="EXBCE" name="payment_option" required class="custom-control-input" data-validation-required-message="Select any one Payment Option"  disabled >
                                                            <label class="custom-control-label" for="customRadio15">50% Exchange/Wallet, 25% Bonus Balance & 25% Earning Balance <i class="m-l-15 mdi mdi-information" data-toggle="tooltip" data-placement="right" title="" data-original-title="50% of the staking volume can be brought in from Exchange/Wallet & 25% will be deducted from your Earning Balance and Bonus Balance."></i></label>
                                                            <div class="help-block"></div>
                                                        </div>
                                            
                                                    </div>
                                                </div>
                                            </div>
                                                                                                                                                                                <div class="col-12">
                                            <div class="form-actions">
                                        <div class="text-right">
                                            <button type="submit" class="btn btn-primary block-default">Submit Staking</button>
                                        </div>
                                    </div>
                                  </div>
                              
            </div>
          </div>
            </div>
          </form>
          <div class="validation-wizard wizard-circle wizard desktop_hide">
            <div class="steps">
              <ul role="tablist">
                <li role="tab" class="disabled" aria-disabled="true"><a id="steps-uid-7-t-1" href="#steps-uid-7-h-1" aria-controls="steps-uid-7-p-1"><span class="step">2</span> 2. Scan QR</a></li>

                <li role="tab" class="disabled" aria-disabled="true"><a id="steps-uid-7-t-2" href="javascript:void(0);" aria-controls="steps-uid-7-p-2"><span class="step">3</span> 3. Input Tranaction ID</a></li>
              </ul>
            </div>
            </div>
        </div>
        </div>
      </div>
      </div>
  </div>
</div>
<script src="https://gcchub.org/panel/assets/libs/block-ui/jquery.blockUI.js"></script>
<script src="https://gcchub.org/panel/assets/extra-libs/block-ui/block-ui.js"></script>
<a class="btn" id="open-mod" alt="default" data-toggle="modal" data-target="#tooltipmodals" data-backdrop="static" data-keyboard="false" class="model_img img-fluid" style="display: none !important; font-size: 0px;">&nbsp;</a>


<a class="btn" id="choose-coin" alt="default" data-toggle="modal" data-target="#chooseCoinModal" data-backdrop="static" data-keyboard="false" class="model_img img-fluid" style="display: none !important; font-size: 0px;">&nbsp;</a>
                                <div id="chooseCoinModal" class="modal fade show" tabindex="-1" role="dialog" aria-labelledby="tooltipmodel" aria-modal="true" style="padding-right: 17px; display: none;">
                                    <form action="https://gcchub.org/panel/User/NewStaking" method="post" novalidate="novalidate">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h3>Select <span class="text-danger">coin</span> to proceed further</h3>
                                            </div>
                                            <div class="modal-body p-b-0">
                                                <h5>Choose Coin</h5>
                                                <select name="choose_coin" id="choose_coin" class="form-control" required onchange="return ChooseCoin(this.value);">
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
                                                <p class="coin-error text-center p-t-10" id="coin-error" style="color: #f00; font-weight: 600;"></p>
                                               <div class="col-sm-12"><hr></div>
                                            </div>



                                            <div class="modal-footer border-top-0 m-t-0">
                                                
                                                <div class="col-sm-12 col-md-6 float-left">
                                                    <a href="dashbaord.php"><button type="button" class="btn btn-danger waves-effect float-left"><i class="ti ti-home"></i>&nbsp; Go to Dashboard</button></a>
                                                </div>
                                                <div class="col-sm-12 col-md-6 float-right">
                                                    <div class="text-right">
                                            <button type="submit" class="btn btn-primary block-default">Confirm Coin</button>
                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    </form>
                                </div>
<style type="text/css">
    #tooltipmodals{
        display: block !important;
    }
</style>
<script type="text/javascript">
 
function ChooseCoin(coin){
    if(coin == ''){
        $('#coin-error').show();
        $("#coin-error").html("Please select any one coin to proceed further");
        return false;
    } else if(coin != 'BDX'){
        $('#coin-error').show();
        $("#coin-error").html("This feature is currently unavailable.");
        return false;
    } else if(coin == 'BDX'){
        $('#coin-error').hide();
    }

} 
</script>
                                            </div>
            


         <?php include_once("footer.php"); ?>



 
