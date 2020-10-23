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
    input[type=number] {-moz-appearance:textfield;}
    </style>
    <script>
    function do_markascredit() {
        if($('#markascredit').prop("checked") == true){
            $('#credit_nickname').show();
            $('#credit_nickname').attr("required","");
            $('#CrAmount').show();
            $('#CrAmount').attr("required","");
        } else if($('#markascredit').prop("checked") == false) {
            $('#credit_nickname').hide();
            $('#credit_nickname').removeAttr("required");
            $('#CrAmount').hide();
            $('#CrAmount').removeAttr("required");
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
                <div class="card">
                    <div class="card-header" style="text-align: center;">
                        <img src="assets/img/title.jpg" style="width:80%">
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-3" style="padding-right:6px;padding-left:6px;">
                                    <a href="dashboard.php" class="btn btn-success mb-1" style="width:100%"><i class="bx bx-home"></i></a>
                                </div>
                                <div class="col-6" style="padding-right:6px;padding-left:6px;text-align:center">
                     
                                </div>
                                <div class="col-3" style="padding-right:6px;padding-left:6px;">
                                    <a href="dashboard.php?action=logout" class="btn btn-success mb-1" style="width:100%"><i class="bx bx-power-off"></i></a>
                                </div>
                            </div>
                            <?php if (!(isset($_GET['action']))) { ?>
                            <div class="row">
                                <div class="col-12" style="padding-right:6px;padding-left:6px;text-align:center;padding-bottom:20px;">
                                    <?php if($_SESSION[User]['IsAPI']=="1"){ ?><h6 style="padding-bottom:0px;margin-bottom:0px;color:#016237;text-transform: uppercase;float:right">API Panel</h6> <?php } ?>
                                    <h6 style="padding-bottom:0px;margin-bottom:0px;color:#016237;font-size:22px;text-transform: uppercase;text-align:center"><?php echo $_SESSION['User']['MemberName']; ?></h6>
                                    <label>Rs. <?php echo number_format($application->getBalance($_SESSION['User']['MemberID']),2);?></label>
                                </div>
                            </div>
                            <?php } ?>
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
    <script src="admin/assets/js/jquery-min.js"></script>
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