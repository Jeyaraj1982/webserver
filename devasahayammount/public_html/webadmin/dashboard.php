<?php 
      include_once("../config.php");
      
      if (isset($_REQUEST['logout'])) {
        unset($_SESSION); 
        session_destroy();
        $_SESSION=array();
        sleep(2);
        echo "<script>location.href='./';</script>";
    }
      $obj = new CommonController();  
            if (!($obj->isLogin())){
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
<link rel="stylesheet" type="text/css" media="all" href="../assets/css/jsDatePick_ltr.min.css" />
<script src="../assets/js/jquery-ui.js"></script>
<link rel="stylesheet" href="../assets/css/jquery-ui.css">      
<script type="text/javascript" src="../assets/js/jsDatePick.min.1.3.js"></script> 
<style>
.leftMenu {color:#444444;text-decoration: none;}
.leftMenu:hover {color:#000000;text-decoration: underline;}
</style>
    <script type="text/javascript">
        window.onload = function(){
        new JsDatePick({
            useMode:2,
            target:"filteron",
            dateFormat:"%Y-%m-%d",
            yearsRange:[2013,2020]
        });
          };  
  </script> 

<body style="margin:0px;">

<table cellpadding="5" cellspacing="0" style="font-family:arial;font-size:13px;color:#222;width:100%">
    <tr>
        <td colspan="2" style="text-align:right;background:#f1f1f1;font-weight:bold;padding:15px;border-bottom:1px solid #ccc;">Administration Area V.14.0001
        <div style="text-transform: uppercase;margin-top:5px;font-weight:normal;font-size:12px;">
        [ <?php echo $_SESSION['USER']['personname'];?> ] [ <a style="text-decoration:none;color:#222;" href="?logout=true">Logout</a> ]
        </div>
        <div>
            <a href="changepwd.php" target="rpanel">Change Password</a>
        </div>
        </td> 
    </tr>
    <tr>
        <td style="vertical-align:top;width:230px;background:#f9f9f9;border-right:1px solid #ccc;padding:0px !important">
         <div id="css3-animated-example">
        
        <h3>Pages</h3>
        
        <div>
          <div class="content" style="padding-left:20px;line-height:20px;">
            <a class="leftMenu" href="pages/homepage.php" target="rpanel">HomePage</a> <br>
            <a class="leftMenu" href="pages/addnewpage.php" target="rpanel">Add New Page</a> <br>
            <a class="leftMenu" href="pages/viewpages.php" target="rpanel">Manage Pages</a> 
          </div>
        </div>
        
        <h3>Menu</h3>
        <div>
          <div class="content" style="padding-left:20px;line-height:20px;margin-top:5px">
                <a class="leftMenu" href="menu/addmenuitem.php" target="rpanel">Add Menu Page</a> <br>
                <a class="leftMenu" href="menu/editmenuitem.php" target="rpanel">Manage Menu Pages</a> 
          </div>
        </div>
        
       <h3>News</h3>
        <div>
          <div class="content" style="padding-left:20px;line-height:20px;margin-top:5px">
                <a class="leftMenu" href="news/addnewnews.php" target="rpanel">Add New News</a> <br>
                <a class="leftMenu" href="news/viewnews_s.php" target="rpanel">Manage News</a> 
          </div>
        </div>
        
        <h3>Events</h3>
        <div>
          <div class="content" style="padding-left:20px;line-height:20px;margin-top:5px">
                <a class="leftMenu" href="events/addnewevents.php" target="rpanel">Add New Events</a> <br>
                <a class="leftMenu" href="events/viewevents.php" target="rpanel">Manage Events</a> 
          </div>
        </div>
        
        <h3>Slider</h3>
        <div>
          <div class="content" style="padding-left:20px;line-height:20px;margin-top:5px">
                <a class="leftMenu" href="slider/addslider.php" target="rpanel">Add Slider</a> <br>
                <a class="leftMenu" href="slider/manageslider.php" target="rpanel">Manage Slider</a> 
          </div>
        </div>
        
       <h3>Photo Gallery</h3>
        <div>
          <div class="content" style="padding-left:20px;line-height:20px;margin-top:5px">
                <a class="leftMenu" href="photogallery/addphotos.php" target="rpanel">Add Photos</a> <br>
                <a class="leftMenu" href="photogallery/managephotos.php" target="rpanel">Manage Photos</a> <br>
                <a class="leftMenu" href="photogallery/addgroups.php" target="rpanel">Add Groups</a> <br>
                <a class="leftMenu" href="photogallery/managegroups.php" target="rpanel">Manage Groups</a> 
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
        
      <h3>Site Settings</h3>
        <div>
          <div class="content" style="padding-left:20px;line-height:20px;margin-top:5px">
                <a class="leftMenu" href="sitesettings/editsitesettings.php" target="rpanel">Edit SiteSettings</a> 
          </div>
        </div>
        
        <h3>Search Engine Option(SEO)</h3>
        <div>
          <div class="content" style="padding-left:20px;line-height:20px;margin-top:5px">
                <a class="leftMenu" href="seo/seosettings.php" target="rpanel">SEO</a> 
          </div>
        </div>
        
        <h3>Musics</h3>
        <div>
          <div class="content" style="padding-left:20px;line-height:20px;margin-top:5px">
                <a class="leftMenu" href="musics/addmusics.php" target="rpanel">Add Musics</a> <br>
                <a class="leftMenu" href="musics/managemusics.php" target="rpanel">Manage Musics</a> <br>
                <a class="leftMenu" href="musics/addalbum.php" target="rpanel">Add Albums</a> <br>
                <a class="leftMenu" href="musics/managealbum.php" target="rpanel">Manage Albums</a>  
          </div>
        </div>
        
        <h3>Downloads</h3>
        <div>
          <div class="content" style="padding-left:20px;line-height:20px;margin-top:5px">
                <a class="leftMenu" href="downloads/adddownloads.php" target="rpanel">Add Downloads</a> <br>
                <a class="leftMenu" href="downloads/managedownloads.php" target="rpanel">Manage Downloads</a> <br>
                <a class="leftMenu" href="downloads/daddalbum.php" target="rpanel">Add Albums</a> <br>
                <a class="leftMenu" href="downloads/dmanagealbum.php" target="rpanel">Manage Albums</a>  
          </div>
        </div>
     <h3>Videos</h3>
        <div>
          <div class="content" style="padding-left:20px;line-height:20px;margin-top:5px">
                <a class="leftMenu" href="videos/addvideos.php" target="rpanel">Add Videos</a> <br>
                <a class="leftMenu" href="videos/viewvideos.php" target="rpanel">Manage Videos</a> 
          </div>
        </div>
        
     <h3>FAQ</h3>
        <div>
          <div class="content" style="padding-left:20px;line-height:20px;margin-top:5px">
                <a class="leftMenu" href="faq/addfaq.php" target="rpanel">Add Faq</a> <br>
                <a class="leftMenu" href="faq/managefaq.php" target="rpanel">Manage Faq</a> 
          </div>
        </div>
        
     <h3>Subscribers</h3>
        <div>
          <div class="content" style="padding-left:20px;line-height:20px;margin-top:5px">
              <a class="leftMenu" href="subscribers/addsubscribers.php" target="rpanel">Add Subscribers</a> <br>
              <a class="leftMenu" href="subscribers/managesubscribers.php" target="rpanel">Manage Subscribers</a>  
          </div>
        </div>
        
     <h3>Product</h3>
        <div>
          <div class="content" style="padding-left:20px;line-height:20px;margin-top:5px">
                <a class="leftMenu" href="product/addproducts.php" target="rpanel">Add Product</a> <br>
                <a class="leftMenu" href="product/manageproducts.php" target="rpanel">Manage Product</a> <br>
                <a class="leftMenu" href="product/addsubproducts.php" target="rpanel">Add ProductSubCategory</a> <br>
                <a class="leftMenu" href="product/managesubproducts.php" target="rpanel">Manage ProductSubCategory</a> <br>
                <a class="leftMenu" href="product/addmainproducts.php" target="rpanel">Add ProductMainCategory</a> <br>
                <a class="leftMenu" href="product/managemainproducts.php" target="rpanel">Manage ProductMainCategory</a>  
          </div>
        </div>
        
     <h3>Contact Us</h3>
        <div>
          <div class="content" style="padding-left:20px;line-height:20px;margin-top:5px">
               <a class="leftMenu" href="contactus/addcontact.php" target="rpanel">Add Contact</a> <br>
               <a class="leftMenu" href="contactus/managecontact.php" target="rpanel">Manage Contact</a>
          </div>
        </div>
        
    <h3>Customize</h3>
        <div>
          <div class="content" style="padding-left:20px;line-height:20px;margin-top:5px">
                <a class="leftMenu" href="customize/addcustomize.php" target="rpanel">Add Customize</a> <br>
                <a class="leftMenu" href="customize/managecustomize.php" target="rpanel">Manage Customize</a> 
          </div>
        </div> 
        
    <h3>User Manage</h3>
        <div>
          <div class="content" style="padding-left:20px;line-height:20px;margin-top:5px">
              <a class="leftMenu" href="usermanage/adduser.php" target="rpanel">Add Users</a> <br>
              <a class="leftMenu" href="usermanage/viewuser.php" target="rpanel">Manage Users</a>
          </div>
        </div>
    <h3>Readings</h3>
        <div>
          <div class="content" style="padding-left:20px;line-height:20px;margin-top:5px">
              <a class="leftMenu" href="readings/addreadings.php" target="rpanel">Add Readings And Reflexions</a></br>
              <a class="leftMenu" href="readings/viewreadings.php" target="rpanel">Manage Readings</a></br> 
              <a class="leftMenu" href="readings/viewreflexions.php" target="rpanel">Manage Reflexions</a> 
          </div>
        </div>
        
     <h3>Prayer Request</h3>
        <div>
          <div class="content" style="padding-left:20px;line-height:20px;margin-top:5px">
              <a class="leftMenu" href="prayer/addprayer.php" target="rpanel">Add PrayerRequest</a></br>
              <a class="leftMenu" href="prayer/viewprayer.php" target="rpanel">Manage PrayerRequest</a></br> 
          </div>
        </div>
   
   
       <h3>MassBooking & donation</h3>
        <div>
          <div class="content" style="padding-left:20px;line-height:20px;margin-top:5px">
              <a class="leftMenu" href="viewqry.php?view=masstodaypref" target="rpanel">MassBooking (Today preferred) </a></br>
              <hr style="border:none;border-bottom:1px solid #666">   
              <a class="leftMenu" href="viewqry.php?view=massall" target="rpanel">MassBooking (ALL) </a></br>
              <a class="leftMenu" href="viewqry.php?view=masssuccess" target="rpanel">MassBooking (SUCCESS) </a></br>
              <a class="leftMenu" href="viewqry.php?view=massreq" target="rpanel">MassBooking (PENDING)</a></br>  
              <hr style="border:none;border-bottom:1px solid #666">
              <a class="leftMenu" href="viewqry.php?view=donateall" target="rpanel">Donation (ALL)</a></br>   
              <a class="leftMenu" href="viewqry.php?view=donatesuccess" target="rpanel">Donation (SUCCESS)</a></br>
              <a class="leftMenu" href="viewqry.php?view=donatereq" target="rpanel">Donation (PENDING)</a>  
              <hr style="border:none;border-bottom:1px solid #666">
              <form action="viewqry.php?view=filter" target="rpanel" method="post" style="height:600px">
              <input type="text" name="filteron" id="filteron">
              <select name="ftype" id="ftype">
                <option value="Mass Booking">Mass Booking</option>
                <option value="Donate"> Donate </option>
                <option value="Mass Booking and Donation">Mass Booking & Donation </option>
              </select>
              <input type="submit" value="View Data">
              </form>
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
