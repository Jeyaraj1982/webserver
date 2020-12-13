<h2 style="text-align: left;font-family: arial;">New Widthdrawal Request</h2>
<div style="border-bottom:1px solid #D4E3F6;"></div><br>

<?php
    if (isset($_POST['amount'])) {
        
        if ($_POST['amount']<=$_POST['availablebalance']) {
         
            if ($_POST['amount']<=0)    {
            echo "<div style='border:1px solid #ccc;padding:10px;font-family:arial;font-size:12px;'>Withdrawal amount should be greaterhan zero.</div><br><br>";    
            } else {
                
                $array = array("id"=>'Null',
                   "clientid"=>$_SESSION['user']['id'],
                   "requesttitle"=>"Withdrawal Rs.".number_format($_POST['amount'],2),
                   "description"=>"Payment withdrawal Rs.".number_format($_POST['amount'],2),
                   "postedon"=>date("Y-m-d H:i:s"),
                   "requeststats"=>'open',
                   "requestclosedon"=>"0000-00-00 00:00:00"
                );
                 $recordId = $mysql->insert("_servicerequest",$array); 
                  $headers  = "From: info@earnmoneytech.com\r\n";
                 $headers .= "Content-type: text/html\r\n";
                 $t="Payment Request<br>Account Number : ".$_SESSION['user']['id']."<br>Amount : Rs.".number_format($_POST['amount'],2)."<br>Service Request No : ".$recordId;
                 mail("jeyaraj_123@yahoo.com","Payment Request : ",$t,$headers);  
                 mail("info@earnmoneyinfotech.com","Payment Request : ",$t,$headers);
                    
                  echo  "<div style='border:1px solid #ccc;padding:10px;font-family:arial;font-size:12px;'>Withdrawal Request has been sent to Administrator.</div><br><br>";    
            }
            
        } else {
            echo "<div style='border:1px solid #ccc;padding:10px;font-family:arial;font-size:12px;'>Withdrawal amount should be lessthan or equal to available balamce.</div><br><br>";
        }
        
    }
?>
     
<?php
    $data = $mysql->select("select * from _clients where id=".$_SESSION['user']['id']);
?>
<form action="" method="post">
<table cellpadding="5" cellspacing="5" style="font-family: arial;font-size:12px;" width="100%">
    <tr>
        <td valign="top">Available Amount</td>
        <td valign="top">&nbsp;:&nbsp;</td> 
        <td colspan="2" valign="top">
            <table cellpadding="5" cellspacing="0" style="font-family: arial;font-size:12px;"  width="100%">
                <tr>
                    <td style="text-align:center;font-weight:normal;border:1px solid #ccc;border-right:none">Total Earning</td>
                    <td style="text-align:center;font-weight:normal;border:1px solid #ccc;border-right:none">Total Withdrawal</td>
                    <td style="text-align:center;font-weight:normal;border:1px solid #ccc;">Available</td>
                </tr>
                <?php
                    //_clients_account
                    $Amount = $mysql->select("select sum(cramount) as cr,  sum(dramount) as dr  from _clients_account where clientid=".$_SESSION['user']['id']);
                    
                    
                    ?>
                <tr>
                    <td align="right" style="border:1px solid #ccc;border-right:none;border-top: none;"><?php echo number_format($Amount[0]['cr'],2);?></td>
                    <td align="right" style="border:1px solid #ccc;border-right:none;border-top: none;"><?php echo number_format($Amount[0]['dr'],2);?></td>
                    <td align="right" style="border:1px solid #ccc;border-top: none;"><?php echo number_format(($Amount[0]['cr']-$Amount[0]['dr']),2);?></td> 
                </tr>
                <tr>
                    <td align="center" style="border:1px solid #ccc;border-right:none;border-top: none;"><a href="earning" style="color:#333">Details</a></td>
                    <td align="center" style="border:1px solid #ccc;border-right:none;border-top: none;"><a href="withdrawal" style="color:#333">Details</a></td>
                    <td align="center" style="border:1px solid #ccc;border-top: none;">&nbsp;</td>
                </tr>
            </table>
        </td>
    </tr>
    <tr>
                <td valign="top">Widthdrawal Request</td>
        <td valign="top">&nbsp;:&nbsp;</td> 
        <td colspan="2" valign="top">
             <input type="hidden" name="availablebalance" value="<?php echo ($Amount[0]['cr']-$Amount[0]['dr']);?>">
            <table cellpadding="0" cellspacing="0" style="font-family: arial;font-size:12px;"  width="100%">
               <tr>
                <td>Rs.</td>
                <td><input type="text" name="amount" style="border: 1px solid #D4E3F6;"></td>
                <td><input type="submit" value="Send Request"></td>
                </tr>
                <tr>
                    <td colspan="2">Maximum available Rs.<?php echo number_format(($Amount[0]['cr']-$Amount[0]['dr']),2);?> </td>
                </tr>
            </table>
        
        </td>
    </tr>
    
</table>
<br><div style="border-bottom:1px solid #D4E3F6;"></div>
</form>