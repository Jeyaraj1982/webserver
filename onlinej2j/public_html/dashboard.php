<?php 
    include_once("mweb/header.php");
    if (isset($_GET['view'])) {
        include_once("mweb/".$_GET['view'].".php");
    } else {
?>
        <nav id="navbar" class="navbar fixed-top navbar-expand-xl navbar-header navbar-mobile" style="padding:5px 0px;">
            <div class="navbar-container container">
                 
                <div class="navbar-brand" style="padding-left:10px;color:#fff;width:100%;padding-top:15px;padding-bottom:0px;">
                <table style="width:100% !important;">
                    <tr>
                        <td style="font-size:16px !important;color:#206eea"><?php echo $_SESSION['User']['MemberName'];?></td>
                        <td style="width:70px;text-align:right">
                        <a href="<?php echo SITE_URL;?>/dashboard.php?view=settings"><img src="<?php echo SITE_URL;?>/assets/settings.png" style="width:22px;margin-top:-5px"></a>
                        <!--<img src="<?php echo SITE_URL;?>assets/logout.png" style="width:22px;margin-top:-5px">-->
                        </td>
                    </tr>
                </table>
                </div>
            </div>
        </nav>

<div id="contact" class="contact-section" style="padding:70px 0 !important">
    <div class="container contact-section-container" style="padding-left:0px;padding-right:0px;">
	    <div class="col-lg-12 col-md-12">
            <p class="section-subtitle" style="text-align: center;"> </p>
                <div class="row">
                <!--
                <div class="col-md-12">
                        <h3 style="margin-bottom:10px;">Wallet&nbsp;&nbsp;<a href='' class="theme-btn readmore-btn" style="padding: 1px 6px;font-size: 9px;font-weight: normal;">Add Fund</a></h3>
                    </div>
                    <div class="col-md-12">
                        <div class="card">
                        <div class="card-body" style="padding-left:10px;padding-right:5px;padding-top:10px;padding-bottom:10px">
                            <table style="width: 99%;">
                                <tr>
                                    <td style="width:50%;line-height:17px"> 0.00 <br><span style="font-size:12px;;color:#999">Recharges</span>
                                    </td>
                                    <td style="width:50%;text-align:right;border-left:1px solid #ddd;line-height:17px"> 0.00 <br><span style="font-size:12px;color:#999">Money Transfer</span></td>
                                </tr>
                            </table>
                            
                        </div>
                        </div>
                    </div>
                  -->  
                    <div class="col-md-12">
                        <h3 style="margin-bottom:10px;">Prepaid Mobile Recharges</h3>
                    </div>
                    <div class="col-md-12">
                        <div class="card" style="border:none">
                            <div class="card-body" style="padding-left:10px;padding-right:5px;padding-top:10px;padding-bottom:10px">
                                <a href="<?php echo SITE_URL;?>/dashboard.php?view=mobilerecharge&operator=RA"><img src='https://tksdonlineservice.in/assets/img/logo_airtel.png' style="border-radius:50%;width:48px;margin-right:10px"></a>
                                <a href="<?php echo SITE_URL;?>/dashboard.php?view=mobilerecharge&operator=RB"><img src='https://tksdonlineservice.in/assets/img/logo_bsnl.png' style="border-radius:50%;width:48px;background:#bdbec2;padding:5px;margin-right:10px"></a>
                                <a href="<?php echo SITE_URL;?>/dashboard.php?view=mobilerecharge&operator=RJ"><img src='https://static.mobikwik.com/appdata/operator_icons/op142.png' style="border-radius:50%;width:48px;margin-right:10px"></a>
                                <a href="<?php echo SITE_URL;?>/dashboard.php?view=mobilerecharge&operator=VI"><img src='https://tksdonlineservice.in/assets/img/logo_vodaidea.png' style="border-radius:50%;width:48px;border: 2px Solid red;padding: 2px;"></a>
                            </div>
                        </div>
                    </div>
                  
                                     
                  <div class="col-md-12">
                        <h3 style="margin-bottom:10px;margin-top:30px;">DTH Recharges</h3>
                    </div>
                    <div class="col-md-12">
                        <div class="card" style="border:none">
                            <div class="card-body" style="padding-left:10px;padding-right:5px;padding-top:10px;padding-bottom:10px">
                                <img src='https://tksdonlineservice.in/assets/img/logo_airteldth.png' style="border-radius:50%;width:48px;margin-right:10px;border:2px solid #ccc">
                                <img src='https://tksdonlineservice.in/assets/img/logo_dishtv.png' style="border-radius:50%;width:48px;border:2px solid #ccc;margin-right:10px">
                                <img src='https://tksdonlineservice.in/assets/img/logo_tatasky.png' style="border-radius:50%;width:48px;margin-right:10px;border:2px solid #ccc;padding:5px">
                                <img src='https://tksdonlineservice.in/assets/img/logo_sundirect.png' style="border-radius:50%;width:48px;border: 2px Solid #ccc;padding: 2px;margin-right:10px;">
                                <img src='https://tksdonlineservice.in/assets/img/logo_videocond2h.png' style="border-radius:50%;width:48px;border: 2px Solid #ccc;padding: 2px;">
                            </div>
                        </div>
                    </div>
                      </div>  
                </div>    
	    </div>
          
         
    </div>
</div>
<script type='text/javascript'>
function validIndianMobileNumber(number) {
    if ( (parseInt(number)>=6000000000) && (parseInt(number)<=9999999999)) {
        return true;
    }
    return false;
}
    function movePasswordBox(e) {
        
        $("#ErrorMobileNumber").html("&nbsp;");
        if(e.keyCode === 13){
            e.preventDefault();
            if (!(validIndianMobileNumber($('#MobileNumber').val()))) {
                $("#ErrorMobileNumber").html("&nbsp;Please enter valid mobile number");  
                return false;
            }
            $('#Password').focus();
        }
    }
    
    
    
    

    function RetailerLogin() {
        
        $("#ErrorPassword").html("&nbsp;");
        $("#ErrorMobileNumber").html("&nbsp;");
        
        $("#login_result").html("&nbsp;");
        
        if (!(validIndianMobileNumber($('#MobileNumber').val()))) {
             $("#ErrorMobileNumber").html("Please enter valid mobile number");
             return false;
        }
        
        if ($('#Password').val().length<6) {
             $("#ErrorPassword").html("Please enter valid password");
             return false;
        }
        
        
        
        $("#btnsubmit").html("<img src='"+SITE_URL+"/assets/loading_white.gif'> Processing ...");
        
        var param = $("#retailer_loginfrm").serialize();
        $.post( SITE_URL+"/webservice.php?action=RetailerLogin",param,function(data) { 
            var obj = JSON.parse(data); 
            var html = "";
            
            if (obj.status=="failure") {
               $("#login_result").html(obj.message);
               $("#btnsubmit").html("Login");
               refreshCaptcha();
               $('#captcha_code').val("");
            } else {
                var resultData = obj.data; 
                location.href= resultData.url;
            }  
        });
    }
</script>  
<?php } ?>
<?php include_once("mweb/footer.php"); ?>