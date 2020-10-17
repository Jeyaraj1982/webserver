<?php 
      include_once("../config.php");
      
      if (isset($_REQUEST['logout'])) {
        unset($_SESSION); 
        session_destroy();
        $_SESSION=array();
        sleep(2);
        echo "<script>location.href='./';</script>";
    }
      if (!(CommonController::isLogin())){
        echo CommonController::printError("Login Session Expired. Please Login Again");
        exit;
    }
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
        <td colspan="2" style="text-align:right;background:#f1f1f1;font-weight:bold;padding:0px;border-bottom:1px solid #ccc;">Administration Area V.14.0001
           <table>
            <tr>
               <td style="width:1130px;">
                    <div style="text-align:left"> 
                     <img src='../assets/cms/<?php echo Jca::getAppSetting('logo');?>' style="height:80px;">
                    </div>
               </td>
               <td>
                    <div style="text-transform: uppercase;margin-top:5px;font-weight:normal;font-size:12px;">
                    [ <?php echo $_SESSION['USER']['personname'];?> ] [ <a style="text-decoration:none;color:#222;" href="?logout=true">Logout</a> ]
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
                                                               
        <h3>Post New Ad</h3>
        <div>
          <div class="content" style="padding-left:20px;line-height:20px;margin-top:5px">
                <a class="leftMenu" href="postad/viewpostads.php" target="rpanel">Manage Post Ads</a><br>
                <a class="leftMenu" href="postad/todaypostads.php?view=today" target="rpanel">Today Post Ads</a><br>
                <a class="leftMenu" href="postad/filterbydate.php" target="rpanel">Filter by Date</a><br>
                <a class="leftMenu" href="postad/listuser.php" target="rpanel">List of User</a>  
          </div>
        </div>
    
    <h3>Feature Ads</h3>                                    
        <div>
          <div class="content" style="padding-left:20px;line-height:20px;margin-top:5px">
                <a class="leftMenu" href="featured/add.php" target="rpanel">Add Feature Ads</a><br>
               <!-- <a class="leftMenu" href="featured/list.php" target="rpanel">All Feature Ads</a><br>-->
                <a class="leftMenu" href="featured/list.php?f=a" target="rpanel">Active Feature Ads</a><br>
                <a class="leftMenu" href="featured/list.php?f=e" target="rpanel">Expired Feature Ads</a><br>
                <a class="leftMenu" href="featured/list.php?f=d" target="rpanel">Deteled Feature Ads</a><br>
          </div>
        </div>
        
    <h3>Franchisee</h3>                                    
        <div>                                                                                         
          <div class="content" style="padding-left:20px;line-height:20px;margin-top:5px">
                <a class="leftMenu" href="franchisee/add.php" target="rpanel">Add Franchisee</a><br>
                <a class="leftMenu" href="franchisee/list.php?f=a" target="rpanel">Manage Franchisee</a><br>
          </div>
        </div>
        
        
        <h3>Ads Package Upgrade</h3>                                    
        <div>
          <div class="content" style="padding-left:20px;line-height:20px;margin-top:5px">
                <a class="leftMenu" href="upgradepackage/add.php" target="rpanel">Add Package</a><br>
                <a class="leftMenu" href="upgradepackage/list.php?f=a" target="rpanel">User Packages</a><br>
                 
          </div>
        </div>
            
      <h3>Site Settings</h3>
        <div>
          <div class="content" style="padding-left:20px;line-height:20px;margin-top:5px">
                <a class="leftMenu" href="sitesettings/editsitesettings.php" target="rpanel">Edit SiteSettings</a><br> 
                 <a class="leftMenu" href="country/managecountrynames.php" target="rpanel">Manage Locations</a><br> 
                 <!--<a class="leftMenu" href="country/managestatenames.php" target="rpanel">Manage Statenames</a><br> 
                 <a class="leftMenu" href="country/managedistrictnames.php" target="rpanel">Manage District Names</a><br> 
                 <a class="leftMenu" href="country/managecitynames.php" target="rpanel">Manage City Names</a> <br>-->
          </div>
        </div>
        
      <h3>Success Stories</h3>
        <div>
          <div class="content" style="padding-left:20px;line-height:20px;margin-top:5px">
                <a class="leftMenu" href="successstories/addstories.php" target="rpanel">Add Success Stories</a><br>
                <a class="leftMenu" href="successstories/viewstories.php" target="rpanel">Manage Success Stories</a> 
          </div>
        </div>
        
       <h3>Testimonials</h3>
        <div>
          <div class="content" style="padding-left:20px;line-height:20px;margin-top:5px">
                <a class="leftMenu" href="testimonials/addtestimonials.php" target="rpanel">Add Testimonials</a> <br>
                <a class="leftMenu" href="testimonials/viewtestimonials.php" target="rpanel">Manage Testimonials</a>
          </div>
        </div>
        
     <h3>FAQ</h3>
        <div>
          <div class="content" style="padding-left:20px;line-height:20px;margin-top:5px">
                <a class="leftMenu" href="faq/addfaq.php" target="rpanel">Add Faq</a> <br>
                <a class="leftMenu" href="faq/viewfaq.php" target="rpanel">Manage Faq</a> 
          </div>
        </div>
        
     <h3>Subscribers</h3>
        <div>
          <div class="content" style="padding-left:20px;line-height:20px;margin-top:5px">
              <a class="leftMenu" href="subscribers/addsubscriber.php" target="rpanel">Add Subscribers</a> <br>
              <a class="leftMenu" href="subscribers/viewsubscriber.php" target="rpanel">View Subscribers</a>  
          </div>
        </div>
        
     <h3>Contact Us</h3>
        <div>
          <div class="content" style="padding-left:20px;line-height:20px;margin-top:5px">
               <a class="leftMenu" href="contactus/addcontact.php" target="rpanel">Add Contact</a> <br>
               <a class="leftMenu" href="contactus/viewcontact.php" target="rpanel">Manage Contact</a>
          </div>
        </div>
             
    <h3>User Manage</h3>
        <div>
          <div class="content" style="padding-left:20px;line-height:20px;margin-top:5px">
              <a class="leftMenu" href="usertable/adduser.php" target="rpanel">Add Users</a> <br>
              <a class="leftMenu" href="usertable/viewuser.php" target="rpanel">Manage Users</a><br>
              <a class="leftMenu" href="usertable/listusers.php" target="rpanel">List Users</a>
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
