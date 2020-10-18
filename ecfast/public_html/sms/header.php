<?php
    
   include_once("config.php");
  
   
     $live = "/";
     $live = "/";
?>
<html>
    <head>
          <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title><?php echo $_SERVER['HTTP_HOST'];?> :: Bulk SMS | Bulk Mail Services</title>
        <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script> 
        <link rel="stylesheet" type="text/css" media="all" href="css/style.css?rand=<?php echo time();?>" />
        <script src="https://cdn.datatables.net/1.10.8/js/jquery.dataTables.min.js"></script> 
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.8/css/jquery.dataTables.min.css">
        <link rel="stylesheet" type="text/css" media="all" href="css/jsDatePick_ltr.min.css" />
        <script type="text/javascript" src="js/jsDatePick.min.1.3.js"></script>   
    </head>
    <body>
        <?php 
          if (!(str_replace("/","",$_SERVER['REQUEST_URI'])=='index.php')) { ?>
        <table cellpadding='5' cellspacing='0' align='center' width="980">
        <tr>
            <td><div style="text-align:right;"><img src="images/_logo.png" style="height:50px;"></div> </td>
        </tr>
        <?php if ($_SESSION['user']['id']>0) {?>
            <tr style="background:orange;text-align:center;font-family:arial;font-size:12px">
            <td>
                <table cellpadding="5" cellspacing="5">
                <?php if ($_SESSION['user']['isuser']==1) { ?>
              
              <tr>
                        <td <?php echo (str_replace($live,"",$_SERVER['REQUEST_URI'])=='dashboard.php')  ? ' style="background:brown" ' : '';?> ><a class="hmenus" href="dashboard.php">Home</a></td>
                        <td <?php echo (str_replace($live,"",$_SERVER['REQUEST_URI'])=='sendsms.php')  ? ' style="background:brown" ' : '';?> ><a class="hmenu" href="sendsms.php">Send SMS</a></td>
                        <td <?php echo (str_replace($live,"",$_SERVER['REQUEST_URI'])=='smsreport.php')  ? ' style="background:brown" ' : '';?> ><a class="hmenu" href="smsreport.php">SMS Reports</a></td>
                        <td <?php echo (str_replace($live,"",$_SERVER['REQUEST_URI'])=='apidetails.php')  ? ' style="background:brown" ' : '';?> ><a class="hmenu" href="apidetails.php">API Details</a></td>
                        <td <?php echo (str_replace($live,"",$_SERVER['REQUEST_URI'])=='accounts.php')  ? ' style="background:brown" ' : '';?> ><a class="hmenu" href="accounts.php">My Accounts</a></td>
                        <td <?php echo (str_replace($live,"",$_SERVER['REQUEST_URI'])=='myprofile.php')  ? ' style="background:brown" ' : '';?> ><a class="hmenu" href="myprofile.php">My Profile</a></td>
                        <td><a class="hmenu" href="dashboard.php?do=logout">Logout</a></td>
                    </tr>
                    
   
                
                <?php } elseif ($_SESSION['user']['isreseller']==1) {  //admin Menu?>
                
                 
                    <tr>
                        <td <?php echo (str_replace($live,"",$_SERVER['REQUEST_URI'])=='dashboard.php')  ? ' style="background:brown" ' : '';?> > <a class="hmenus" href="dashboard.php">Home</a></td>
                        <td <?php echo (str_replace($live,"",$_SERVER['REQUEST_URI'])=='accounts.php')  ? ' style="background:brown" ' : '';?> ><a class="hmenu" href="accounts.php">My Accounts</a></td>
                        <td <?php echo (str_replace($live,"",$_SERVER['REQUEST_URI'])=='transfercredits.php')  ? ' style="background:brown" ' : '';?> ><a class="hmenu" href="transfercredits.php">Transfer Credits</a></td>
                        <td <?php echo (str_replace($live,"",$_SERVER['REQUEST_URI'])=='createuser.php')  ? ' style="background:brown" ' : '';?> ><a class="hmenu" href="createuser.php">User</a></td>
                        <td <?php echo ( (str_replace($live,"",$_SERVER['REQUEST_URI'])=='userlist.php') )  ? ' style="background:brown" ' : '';?> ><a class="hmenu" href="userlist.php">User List</a></td>
                        <td <?php echo (str_replace($live,"",$_SERVER['REQUEST_URI'])=='myprofile.php')  ? ' style="background:brown" ' : '';?> ><a class="hmenu" href="myprofile.php">My Profile</a></td>
                        <td><a class="hmenu" href="dashboard.php?do=logout">Logout</a></td>
                    </tr>
             
 
                      <?php } ?>
 
                
                </table>
            </td>
        </tr>
        <?php } ?>
        <tr>
            <td style="padding:20px;">
<?php } ?>