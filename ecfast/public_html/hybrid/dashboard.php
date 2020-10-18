<?php
 include_once("config.php");
    
    if ( $_SESSION['USER']['userid']>0) {
        
    } else {
        echo "<script>alert('Login Session May Be Expired. Please Login Again');location.href='index.php';</script>";
    }
    
    function successMessage($string) {
        echo "<div style='margin-top:5px;margin-bottom:5px;padding:5px;border:1px solid #ccc;background:#FFFECC;color:#555;padding-left:10px;'><img src='images/tick-octagon.png' align='absmiddle'>&nbsp;".$string."</div>";
    }
?>
<title>LAPU SYSTEM [HYBRID MODULE]</title>
<style>
.topmenu {color:#fff;font-size:13px;font-family:'Trebuchet MS';font-weight:Bold;text-decoration: none;}
.topmenu:hover{text-decoration:underline;}
.content {padding:5px;margin:5px;font-size:13px;font-family:'Trebuchet MS';}
h2{font-size:18px;font-family:'Trebuchet MS';border-bottom:1px solid #333;}
div,span {font-size:13px;font-family:'Trebuchet MS';}
</style>
<body style="margin:0px">
<table style="width:100%" cellpadding="3" cellspacing="0">
    <tr>
        <td style="background:#03AA03;padding:10px;font-size:13px;font-family:'Trebuchet MS';color:#fff">
            <a class="topmenu" href="dashboard.php?action=liveTransaction">Live Transaction</a> | 
            <a class="topmenu" href="dashboard.php?action=operatorWise">Operator Wise</a> | 
            <?php if ($_SESSION['USER']['isreseller']==1) {?>
            <a class="topmenu" href="dashboard.php?action=manageUser">Manage User</a> | 
            <a class="topmenu" href="dashboard.php?action=transferCredits">Transfer Credits</a> | 
            <a class="topmenu" href="dashboard.php?action=userTransaction">User Transaction</a> | 
           
            <?php } ?>
           <?php
                if ($_SESSION['USER']['isunder']==9) {
                    ?>
                     <a class="topmenu" href="dashboard.php?action=walletUpdate">Update Wallet</a> | 
                    <?php
                }
            ?> 
           
            <a class="topmenu" href="logout.php">Logout</a>
        </td>
       <!-- <td id="balance" style="width: 260;font-size:13px;font-family:'Trebuchet MS';border:3px solid #03AA03;text-align:right;padding-right:10px;">
        Available Balance Rs. <?php echo number_format(getVirtualBalance($_SESSION['USER']['userid']),2);?></td>-->
    </tr>
    <tr>
        <td style="vertical-align: top;" colspan="2">
        <div class="content">
            <?php                            
                include_once("files/".(isset($_REQUEST['action']) ? $_REQUEST['action'] : "liveTransaction").".php");
            ?>
            </div>
        </td>
    </tr>
</table> 

        
        
        
<script>
    document.getElementById("balance").innerHTML = "Available <?php echo ($_SESSION['USER']['balance']==0) ? 'Virutal ' : '';?>Balance Rs. <?php echo number_format(getVirtualBalance($_SESSION['USER']['userid']),2);?>";
</script>
</body>
