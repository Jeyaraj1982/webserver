<?php include_once("admin/config.php"); ?>
<!DOCTYPE html>
<?php
    if ($_SESSION['User']['MemberID']>0) {
    } else {
        echo "<script>location.href='index.php';</script>";
    }
?>
<html class="loading" lang="en" data-textdirection="ltr">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>TKSD Online Service</title>
    <link rel="stylesheet" type="text/css" href="assets/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap-extended.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/colors.min.css?v=2.0.1">
    <link rel="stylesheet" type="text/css" href="assets/css/components.min.css?v=2.0.1">
    <link rel="stylesheet" type="text/css" href="assets/css/style.css?v=2.0.1">
    <script src="assets/js/plugin/webfont/webfont.min.js"></script>     
    <?php if($_GET['action']=="busticketbooking"){ ?>
        <script src="admin/assets/js/jquery-min.js"></script> 
        <script src="assets/js/jquery-ui.js"></script>   
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"> 
    <?php } ?>     
    
    <script>
        WebFont.load({
            google: {"families":["Lato:300,400,700,900"]},
            custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['assets/css/fonts.min.css']},
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>
    <style>
.errorstring{text-align: right;width:100%;font-size:12px;padding:5px;color:red}
</style>
    <style>        
    input[type=number] {-moz-appearance:textfield;}
    </style>   
    <script>
    function do_markascredit() {
        if($('#markascredit').prop("checked") == true){
            $('#credit_nickname').show();
            $('#credit_nickname').attr("required","");
            $('#CrAmount').show();
            $('#CrAmount').attr("required","");
             $('#credit_nickname').val($('#MemberCode option:selected').text());
        } else if($('#markascredit').prop("checked") == false) {
            $('#credit_nickname').hide();
            $('#credit_nickname').removeAttr("required");
            $('#CrAmount').hide();
            $('#CrAmount').removeAttr("required");
             $('#credit_nickname').val("");
        }
    }
    </script> 
  </head>
  <body class="vertical-layout vertical-menu-modern 1-column  navbar-sticky footer-static bg-full-screen-image  blank-page blank-page" data-open="click" data-menu="vertical-menu-modern" data-col="1-column" style="background-image:none;background:#fff !important;">
      <div id="overlay_body" style="z-index:100000;background:rgb(200,200,200,0.5);position:absolute;height:100%;width:100%;text-align:center;">
        <img src="assets/img/loader.gif" style="margin-top:35vh"><br>Loading...
    </div>
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body">
        <div style="text-align: center;padding:25%">
            <img src="assets/img/loader.gif"><br>
            Loading ...
        </div>
      </div>
    </div>
  </div>
</div>
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="content-wrapper">         
        <div class="row">
            <div class="col-12">                                      
                <div class="card" style="box-shadow:none">
                    <div class="card-content">
                        <div class="card-body" style="padding-top: 15px;padding-left: 15px;padding-right: 20px;background:#fff !important;">
                            
                            <div class="row" style="position:fixed;top:0px;width:100%;background:#fff !important;z-index:20;padding-top:16px">
                                <div class="col-2" style="padding-right:6px;padding-left:6px;">
                                    <a href="dashboard.php" class="btn btn-success mb-1" style="width:100%;padding-left:15px"><i class="bx bx-home"></i></a>
                                </div>
                                <div class="col-8" style="padding-right:0px;padding-left:0px;text-align:center;">
                                      <img src="assets/img/title.jpg" style="width:100%">
                                </div>
                                <div class="col-2" style="padding-right:6px;padding-left:6px;">
                                    <a href="dashboard.php?action=logout" class="btn btn-success mb-1" style="width:100%;padding-left:15px"><i class="bx bx-power-off"></i></a>
                                </div>
                            </div>
                           
                            <div class="row" style="margin-bottom:20px;background:#ebffee;position:fixed;top:62px;width:100%;z-index:20">
                                <div class="col-8" style="padding-right:6px;padding-top: 8px;border-top: 1px dashed green;;border-bottom: 1px dashed green;">
                                    <?php if($_SESSION['User']['IsAPI']==1 ){ ?>
                                        <h6 style="padding-bottom:10px;margin-bottom:0px;color:#016237;text-transform: uppercase;float:right">API Panel</h6> 
                                    <?php } ?>
                                    <h6 style="padding-bottom:0px;margin-bottom:8px;color:#016237;font-size:15px;font-weight:bold;;text-transform: uppercase;"><?php echo $_SESSION['User']['MemberName']; ?></h6>
                                </div>
                                <div class="col-4" style="text-align: right;padding-top: 8px;border-top: 1px dashed green;;border-bottom: 1px dashed green;padding-left:0px">
                                    <h6 style="padding-bottom:0px;margin-bottom:8px;color:#016237;font-size:15px;font-weight:bold;text-transform: uppercase;"><?php echo number_format($application->getBalance($_SESSION['User']['MemberID']),2);?></h6>
                                </div>
                            </div>
                            
                          
                          
                            
                             
                            <?php
                                if (isset($_GET['action'])) {
                                    ?>
                                    <div style="margin-top:100px">
                                    <?php
                                    include_once("includes/".$_GET['action'].".php");
                                } else {
                                    ?>
                                     <div style="margin-top:200px">
                                      <div class="row" style="border-bottom:1px solid #eee;position:fixed;top:98px;width:100%;background:#fff !important;z-index:20">
                                <div class="col-12" style="padding-right:0px;padding-left:0px">
                                    <div style="background:#f1ffbe;padding: 10px;color: green;font-size:13px;text-align:center;padding-bottom:5px;padding-top:7px">
                                      <?php
                                      $u = $mysql->select("select * from _tbl_member where MemberID='".$_SESSION['User']['MemberID']."'");
                                 if (!($u[0]['DepositAmount']*1>0))
                                 {
                            ?>
                                      <marquee>  Get 15% profit on  every month 1st from your deposit amount </marquee>
                              <?php } else {?>      
                                        Deposited Amount
                                        <b style="font-size:15px"><?php echo number_format($u[0]['DepositAmount'],0); ?></b>
                                        <?php } ?>
                                    </div>
                                </div>
                                    
                            </div>

                            <?php
                                $commission = $mysql->select("select * from _temp_settings where param='msr_interet'");
                                $msrAmount = $mysql->select("select * from _temp_settings where param='msr_amt'");
                                $tSale = $mysql->select("select sum(rcamount) as dbt from _tbl_transactions where TxnStatus='success' and (month(txndate)='".date("m")."' and year(txndate)='".date("Y")."') and memberid='".$_SESSION['User']['MemberID']."' ");          
                            ?>
                    
                            <div class="row" style="border-bottom:1px solid #eee;position:fixed;top:130px;width:100%;padding-top:8px;padding-bottom:10px;background:#fff !important;z-index:20">
                                <div class="col-4" style="padding-right:6px;padding-left:6px">
                                    <div style="background:#f1ffbe;border-radius:10px;padding: 10px;color: green;font-size:13px;text-align:center">
                                        Sales Target<br>
                                        <b style="font-size:15px"><?php echo number_format($msrAmount[0]['paramvalue'],0); ?></b>
                                    </div>
                                </div>
                                <div class="col-4" style="padding-right:6px;padding-left:6px">
                                    <div style="background:#ebffe1;border-radius:10px;padding: 10px;color: green;font-size:13px;text-align:center">
                                        You Achieved<br>
                                        <b style="font-size:15px"><?php echo number_format($tSale[0]['dbt'],0); ?></b>
                                    </div>
                                </div>
                                <div class="col-4"  style="padding-right:6px;padding-left:6px;text-align: right;">
                                    <div style="background:#fff5e3;border-radius:10px;padding: 10px;color: #bf7f0a;font-size:13px;text-align:center">
                                        Your Incentive<br>
                                        <?php if ($tSale[0]['dbt']>=$msrAmount[0]['paramvalue']) { ?>
                                            <b style="font-size:15px"><?php echo number_format(($tSale[0]['dbt']*$commission[0]['paramvalue']/100),2);?></b>
                                        <?php } else {?>
                                            <b style="font-size:15px"><?php echo number_format(0,2);?></b>
                                        <?php } ?>
                                    </div>
                                </div>      
                            </div>
                                    <?php
                                    include_once("includes/dashboard.php");
                                }
                            ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>                
   
    <?php if($_GET['action']!="busticketbooking"){ ?>     
    <script src="admin/assets/js/jquery-min.js"></script>
    <?php } ?>
    <script src="https://malsup.github.io/jquery.blockUI.js"></script>
    <script src="admin/assets/js/bootstrap.min.js"></script>
    <script src="admin/assets/js/popper.min.js"></script>
    <script type="text/javascript"> 
        function doValidate(e) {
            if(document.getElementById('MobileNumber').value.length>=10 && e.keyCode!=8) {
                return false;   
            } else {
                var key = e.which || e.keyCode;
                if (!e.shiftKey && !e.altKey && !e.ctrlKey &&
                    key >= 48 && key <= 57 ||
                    key >= 96 && key <= 105 ||
                    key == 190 || key == 188 || key == 109 || key == 110 ||
                    key == 8 || key == 9 || key == 13 ||
                    key == 35 || key == 36 ||
                    key == 37 || key == 39 ||
                    key == 46 || key == 45)
                    return true;
                return false;
            }
        }
        $( document ).ready(function() {
        $('#overlay_body').hide();   
        });
        
        
        
        
</script>   
</body>
</html>