<?php 
      include_once("../config.php");
      
      if (isset($_REQUEST['logout'])) {
        unset($_SESSION); 
        session_destroy();
        $_SESSION=array();
        sleep(2);
        echo "<script>location.href='./';</script>";
    }  
    // echo "aa";
  //    if (!(CommonController::isLogin())){
   //     echo "bb";  
   //     echo CommonController::printError("Login Session Expired. Please Login Again");
  //      exit;
  //  }
 //   echo "cc";
?>
<script src="../assets/js/jquery-1.7.2.js"></script>
<script src="../assets/js/json2.js"></script>
<script src="../assets/js/jquery.collapse.js"></script>
<script src="../assets/js/jquery.collapse_storage.js"></script>
<script src="../assets/js/jquery.collapse_cookie_storage.js"></script>
<link rel="stylesheet" href="../assets/css/demo.css">
<style>
.leftMenu {color:#444444;text-decoration: none;}
.leftMenu:hover {color:#000000;text-decoration: underline;}
</style>
<body style="margin:0px;">

<table cellpadding="5" cellspacing="0" style="font-family:'Trebuchet MS';font-size:13px;color:#222;width:100%">
    <tr>
        <td colspan="2" style="text-align:right;background:#f1f1f1;font-weight:bold;padding:0px;border-bottom:1px solid #ccc;">
           <table style="width:100%;">
            <tr>
               <td>
                    <div style="text-align:left"> 
                     <img src='../assets/cms/<?php echo Jca::getAppSetting('logo');?>' style="height:48px;">
                    </div>
               </td>
               <td style="width:200px;text-align:right;padding:10px;">
                    <div style="text-transform: uppercase;margin-top:5px;font-weight:normal;font-size:12px;">
                    Franchisee Area V.14.0001<br>
                    [ <?php echo $_SESSION['USER']['FranchiseeName'];?> ] [ <a style="text-decoration:none;color:#222;" href="?logout=true">Logout</a> ]
                    </div>
                    <div>
                        <a href="changepwd.php" target="rpanel">Change Password</a>
                    </div>
               </td>
            </tr>
           </table>            
        </td> 
    </tr>
    <tr>
        <td style="vertical-align:top;width:200px;background:#f9f9f9;border-right:1px solid #ccc;padding:0px !important">
             <div class="content" style="padding-left:30px;line-height:20px;margin-top:5px;margin-bottom:5px;">
                <a class="leftMenu" href="" target="rpanel">Home</a> <br>
             </div>
         <div id="css3-animated-example">
            <div class="content" style="padding-left:20px;line-height:20px;margin-top:5px">
                <h3>Posted Ads</h3>
                <div class="content" style="padding-left:20px;line-height:20px;margin-top:5px">
                    <a class="leftMenu" href="postad/viewpostads.php" target="rpanel">Manage Post Ads</a><br>
                </div>
            </div>
            <div class="content" style="padding-left:20px;line-height:20px;margin-top:5px">
                <h3>Active Users</h3>
                <div class="content" style="padding-left:20px;line-height:20px;margin-top:5px">
                    <a class="leftMenu" href="postad/listuser.php" target="rpanel">List of User</a>
                </div>  
            </div>
            <div class="content" style="padding-left:20px;line-height:20px;margin-top:5px">
                <h3>Feature Ads</h3>    
                <div class="content" style="padding-left:20px;line-height:20px;margin-top:5px">
                    <a class="leftMenu" href="featured/list.php?f=a" target="rpanel">Active Feature Ads</a><br>
                </div>
            </div>
            
            <div class="content" style="padding-left:20px;line-height:20px;margin-top:5px">
                <h3>Packag</h3>    
                <div class="content" style="padding-left:20px;line-height:20px;margin-top:5px">
                    <a class="leftMenu" href="upgradepackage/list.php?f=a" target="rpanel">Active Packages</a><br>
                </div>
            </div>
               
      
                
        </div>
         </div>
    <script>
        new jQueryCollapse($("#css3-animated-example"), {
          show: function() {
            this.slideDown(150);
          },
          hide: function() {
            this.slideUp(150);
          },
        });
  </script>
   
        </td>
        <td style="vertical-align:top;padding:0px">
             <iframe src="" name="rpanel" style="height:800px;width:100%;border:none;"></iframe>
        </td>
    </tr>
</table>

</body>
