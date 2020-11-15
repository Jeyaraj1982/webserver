<?php
session_start();

if ($_REQUEST['action']=="logout") {
    $_SESSION['user']['userid']=0;
    unset($_SESSION);
     ?>
         <script>
            alert("logout completed");
            location.href="index.php";
         </script>
     <?php
}
if ($_SESSION['user']['userid']>0) {
    
} else {
    /*?>
         <script>
            alert("Session Expired");
            location.href="index.php";
         </script>
    <?php   */
}
    include_once("mysql.php");
    $mysql = new MySql();
?>
<meta charset="utf-8">
<style type="text/css">                            
body {margin:0px}
table,tr,td,div,body,a,p,span {font-size:12px;font-family:arial;color:#333}
.success {background:blue;color:#fff;padding:5px;font-weight:bold;}
.active {background:#e5e5e5;font-weight:bold;text-decoration: none;}
</style>
                           
<body>
<table style="width: 100%;height:100%;" cellpadding="5" cellspacing="0">
    <tr>
        <td style="vertical-align:top;width:160px;background:#f6f6f6;border-right:3px solid #e5e5e5;padding:0px">
        <div onclick="window.open('dashboard.php','_self')" style="cursor:pointer;margin:0px auto;height:122px;width:100px;background:url('logo.png')"></div>
            <table cellpadding="5" cellspacing="0" style="width: 100%;">
                <tr>
                    <td style="padding-left:10px;" <?php echo ($_REQUEST['action']=="gallery") ? 'class=active' :'';?> ><a <?php echo ($_REQUEST['action']=="gallery") ? 'class=active' :'';?> href="dashboard.php?action=gallery">Gallery</a></td> 
                </tr>
                <tr>
                    <td style="padding-left:10px;" <?php echo ($_REQUEST['action']=="registeredenquiry") ? 'class=active' :'';?> ><a <?php echo ($_REQUEST['action']=="registeredenquiry") ? 'class=active' :'';?> href="dashboard.php?action=registeredenquiry">Registered Enquiry</a></td> 
                </tr>
                <tr>
                    <td style="padding-left:10px;" <?php echo ($_REQUEST['action']=="alumni") ? 'class=active' :'';?> ><a <?php echo ($_REQUEST['action']=="alumni") ? 'class=active' :'';?> href="dashboard.php?action=alumni">Alumni Users</a></td> 
                </tr> 
                  <tr>
                    <td style="padding-left:10px;" <?php echo ($_REQUEST['action']=="contacts") ? 'class=active' :'';?> ><a <?php echo ($_REQUEST['action']=="contacts") ? 'class=active' :'';?> href="dashboard.php?action=contacts">Request Contacts</a></td> 
                </tr> 
                <tr>
                  <td style="padding-left:10px;" <?php echo ($_REQUEST['action']=="news" || $_REQUEST['action']=="newslist" || $_REQUEST['action']=="newsdetails") ? 'class=active' :'';?> ><a <?php echo ($_REQUEST['action']=="news"  || $_REQUEST['action']=="newslist" || $_REQUEST['action']=="newsdetails") ? 'class=active' :'';?> href="dashboard.php?action=news">News & Events</a></td> 
                </tr>  
                
                   <tr>
                  <td style="padding-left:10px;" <?php echo ($_REQUEST['action']=="news" || $_REQUEST['action']=="newslist" || $_REQUEST['action']=="newsdetails") ? 'class=active' :'';?> ><a <?php echo ($_REQUEST['action']=="news"  || $_REQUEST['action']=="newslist" || $_REQUEST['action']=="newsdetails") ? 'class=active' :'';?> href="dashboard.php?action=pages">Pages</a></td> 
                </tr>
                
                     <tr>
                  <td style="padding-left:10px;" <?php echo ($_REQUEST['action']=="news" || $_REQUEST['action']=="newslist" || $_REQUEST['action']=="newsdetails") ? 'class=active' :'';?> ><a <?php echo ($_REQUEST['action']=="news"  || $_REQUEST['action']=="newslist" || $_REQUEST['action']=="newsdetails") ? 'class=active' :'';?> href="dashboard.php?action=slides">Slides</a></td>   
                </tr><tr>
                  <td>&nbsp;</td> 
                </tr>  
                
                  <tr>
                  <td style="padding-left:10px;" <?php echo ($_REQUEST['action']=="changepwd") ? 'class=active' :'';?> ><a <?php echo ($_REQUEST['action']=="changepwd") ? 'class=active' :'';?> href="dashboard.php?action=changepwd">Change Password</a></td> 
                </tr>  
                  <tr>
                  <td style="padding-left:10px;"> <a href="dashboard.php?action=logout">Logout</a></td> 
                </tr>             
            </table>
        </td>
        <td style="vertical-align:top;">
        <?php
            if (isset($_REQUEST['action'])) {
                include_once($_REQUEST['action'].".php");
            }
        ?>
        </td>
    </tr>
</table>
</body>

 