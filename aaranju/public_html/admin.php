<?php
session_start();
if (isset($_POST['offline'])) {
                    $file = fopen("param.php","w");
                     fwrite($file,"<?php  define('ONLINE','0'); ?>");
                    fclose($file);   
            }
            if (isset($_POST['online'])) {
                    $file = fopen("param.php","w");
                     fwrite($file,"<?php  define('ONLINE','1'); ?>");
                    fclose($file);
            }

    if (isset($_POST['loginBtn'])) {
        if ($_POST['uname']=="admin" && $_POST['upass']=="selvaraj") {
           
            echo "done";
          $_SESSION['UID']=2;  
        } else {
            $error = "login failed.";
        }
    }
include_once("config.php");

    if (isset($_POST['updatetxn'])) {
          $mysql->execute("update _transactions set transid='".$_POST['transid']."',txn_mode='_offline_".date("Y-m-d H:i:s")."' where rctxtid='".$_POST['rctxtid']."'");
          echo "Successfully updated";
    }
    if ($_SESSION['UID']>0) {             
        ?>
        <div>
            <form action="" method="post">
            <?php if (ONLINE) {?>
                Online Mode  
                <input type="submit" value="Go Offline" name="offline">
            <?php } else {?>
              Off Mode  
                <input type="submit" value="Go Online" name="online">
            <?php } ?>
            </form>
        </div>
        <table style="font-size:30px;" border="1">
        <?php
        
        $txns = $mysql->select("select * from _transactions where txn_mode='offline'");
        foreach($txns as $t) {
           ?>
            <tr>
                <td><?php echo $t['optrcode'];?></td>
                <td><?php echo $t['rcnumber'];?></td>
                <td><?php echo $t['rcamount'];?></td>
                <td>
                    <form action="" method="post">
                        <input type="hidden" value="<?php echo $t['rctxtid'];?>" name="rctxtid">
                        <input type="text" value="<?php echo $t['transid'];?>" name="transid">
                        <input type="submit" value="updatetxn" name="updatetxn" onclick="updateI()">
                        <a href="<?php echo $t['requestedurl'];?>" target="frame_<?php echo $t['rctxtid'];?>">call vasantham</a>
                    </form>
                </td>
                <td>
                    <iframe style="margin:0px" style="height:30px;width:500px;background:#ccc" name="frame_<?php echo $t['rctxtid'];?>">
                    
                    </iframe>
                </td>
            </tr>
           <?php 
        }
        ?>
        </table>
        
        <script language="javascript">
        var i=0;
        function updateI() {
            i=1;
        }
        
setInterval(function() {
    if (i==0) {
   window.location.reload(1);
    }
}, 10000);
</script>

        <?php
    } else {
?>
<form action="" method="post">
<input type="text" name="uname">
<input type="text" name="upass">
<input type="submit" value="Login" name="loginBtn">
</form>
<?php } ?>
