<h2 style="text-align: left;font-family: arial;">My Home</h2>
<div style="border-bottom:1px solid #D4E3F6;"></div><br>

<?php
    $data = $mysql->select("select * from _clients where id=".$_SESSION['user']['id']);
    $rusers = $mysql->select("select * from _clients where isactive=1 and referringby=".$data[0]['id']);
 
    
?>
<h3>Welcome <?php echo $data[0]['firstname']." ".$data[0]['lastname'];?></h3>
<table cellpadding="5" cellspacing="5" style="font-family: arial;font-size:12px;" width="100%">
    <tr>
        <td width="100">Name</td>
        <td>&nbsp;:&nbsp;</td> 
        <td><?php echo $data[0]['firstname'];?></td>
    </tr>
    <tr>
        <td>Account No</td>
        <td>&nbsp;:&nbsp;</td> 
        <td><?php echo $data[0]['id'];?></td>
    </tr>
    <tr>
        <td>Visitors</td>
        <td>&nbsp;:&nbsp;</td> 
        <td>
        
          
            <?php
            $visitors_count = $mysql->select("select * from _visitor where  userid='".$data[0]['id']."'))");
        
        echo sizeof($visitors_count);
?>
            <?php //echo $data[0]['visitors']; ?>
            
            
            
        </td>
    </tr>
    <tr>
        <td>My Link</td>
        <td>&nbsp;:&nbsp;</td> 
        <td>http://www.earnmoneytech.com/<?php echo $data[0]['userlink'];?></td>
    </tr>    
    <tr>
        <td>Registered Users</td>
        <td>&nbsp;:&nbsp;</td> 
        <td><?php echo sizeof($rusers);?></td>
    </tr>
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
                    <td align="right" style="border:1px solid #ccc;border-right:none;border-top: none;"><?php echo getCurrency($data[0]['country']);?>&nbsp;<?php echo number_format($Amount[0]['cr'],2);?></td>
                    <td align="right" style="border:1px solid #ccc;border-right:none;border-top: none;"><?php echo getCurrency($data[0]['country']);?>&nbsp;<?php echo number_format($Amount[0]['dr'],2);?></td>
                    <td align="right" style="border:1px solid #ccc;border-top: none;"><?php echo getCurrency($data[0]['country']);?>&nbsp;<?php echo number_format(($Amount[0]['cr']-$Amount[0]['dr']),2);?></td> 
                </tr>
                <tr>
                    <td align="center" style="border:1px solid #ccc;border-right:none;border-top: none;"><a href="earning" style="color:#333">Details</a></td>
                    <td align="center" style="border:1px solid #ccc;border-right:none;border-top: none;"><a href="withdrawal" style="color:#333">Details</a></td>
                    <td align="center" style="border:1px solid #ccc;border-top: none;">&nbsp;</td>
                </tr>
            </table>
        </td>
    </tr>
    
</table>
<br><div style="border-bottom:1px solid #D4E3F6;"></div>

<?php
           
       function getCurrency($country) {
            
           switch($country) {
               case 'dubai' : return "AED"; break;
               case 'india' : return "RS"; break;
               case 'malaysia' :   return "MYR"; break;
               case 'singapore' : return "SGD"; break;
              
           }
           
       }
?>