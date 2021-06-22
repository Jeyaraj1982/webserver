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
    <title><?php echo SITE_TITLE;?></title>
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
    <style>
    
     body{        
        padding-top: 50px;
        padding-bottom: 65px;
    }
    .fixed-header, .fixed-footer{
        width: 100%;
        position: fixed;        
        background:#fff;
        
        color: #fff;
        z-index:1000;
    }
     .fixed-header{
        top: 0;
        border-bottom:1px solid #ddd;
        height:53px;
        padding-top:2px;
       
    }
    .fixed-footer{
        bottom: 0;
        background:#fff;
        box-shadow:inset 0px 14px 14px -8px #f6f6f6;
        border-top:1px solid #ddd;
        padding-top:3px;
        padding-bottom:3px
    } 
    </style>
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
<div class="fixed-header">
    <div class="row">
        <div class="col-5" style="padding-left:20px;color: #888;line-height: 5px;text-transform: uppercase;font-size: 12px;font-weight: bold;">
           <img src="https://hamiec.j2jsoftwaresolutions.com/assets/logo.png" style="height:48px;padding:4px;"> <br>
           
        </div>
        <div class="col-7">
            <div style="color: #666;font-size: 18px;padding-top: 4px;text-align: right;padding-right: 15px;font-weight:bold">
                <?php echo number_format($application->getBalance($_SESSION['User']['MemberID']),2);?>
            </div>
            <div style="padding-right: 15px;text-align:right;color: #999;text-transform: uppercase;font-size: 11px;font-weight: bold;">&nbsp;<?php echo $_SESSION['User']['MemberName'];?></div>
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
                        <div class="card-body" style="padding-top:0px;padding-left: 15px;padding-right: 20px;background:#fff !important;">
                            <div style="padding-top:10px;max-width:800px;margin:0px auto">
                            <?php
                                if (isset($_GET['action'])) {
                                    include_once("includes/".$_GET['action'].".php");
                                } else {    
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
<div class="fixed-footer">
    <div style="max-width:800px;margin:0px auto;text-align:center;overflow: hidden;height:50px;width:max-content;">
        <div style="float:left;padding:6px 15px;font-size:11px;color:#333;border-right:1px solid #e5e5e5;"><a href="dashboard.php" style="color:#333"><img src="assets/home.png" style="height: 28px"><br>Home</a></div>
        <div style="float:left;padding:6px 15px;font-size:11px;color:#333;border-right:1px solid #e5e5e5;"><a href="dashboard.php" style="color:#333"><img src="assets/clipboard.png" style="height: 28px"></a><br>Accounts</div>
        <div style="float:left;padding:6px 15px;font-size:11px;color:#333;border-right:1px solid #e5e5e5;"><a href="dashboard.php" style="color:#333"><img src="assets/site_settings.png" style="height: 28px"></a><br>Settings</div>
        <div style="float:left;padding:6px 15px;font-size:11px;color:#333;border-right:1px solid #e5e5e5;"><a href="dashboard.php" style="color:#333"><img src="assets/wallet.png" style="height: 28px"></a><br>Wallet</div>
        <div style="float:left;padding:6px 15px;font-size:11px;color:#333"><a href="dashboard.php" style="color:#333"><img src="assets/log-out.png" style="height: 28px"></a><br>Logout</div>
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