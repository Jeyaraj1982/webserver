 <?php include_once("pages/pj/header.php");?>
 <?php
      $data = $mysql->select("select * from _clients where id=".$_SESSION['PJUSER']['id']);
    $rusers = $mysql->select("select * from _clients where isactive=1 and referringby=".$data[0]['id']);
?>
<table>
    <tr>
        <td width="760">
        <h3 style="text-align:left;font-family:arial;color:rgb(38,74,148);" >MY PAGE</h3>  
            <table cellpadding="5" cellspacing="5" width="100%" style="font-size:12px;font-family:arial;">
                <tr>
                    <td>Account ID</td>
                    <td>:</td>
                    <td><?php echo $_SESSION['PJUSER']['id'];?></td>
                </tr>
                <tr>
                    <td>Person Name</td>
                    <td>:</td>
                    <td><?php echo $_SESSION['PJUSER']['firstname'];?></td>
                </tr>
                <tr>
                    <td>E-Mail ID</td>
                    <td>:</td>
                    <td><?php echo $_SESSION['PJUSER']['emailid'];?></td>
                </tr>  
                <tr>
                    <td>Mobile No</td>
                    <td>:</td>
                    <td><?php echo $_SESSION['PJUSER']['mobileno'];?></td>
                </tr>
                <tr>
                    <td>My Link</td>
                    <td>:</td>
                    <td>http://www.dealmaass.in/u/<?php echo $_SESSION['PJUSER']['userlink'];?></td>
                </tr>  
                    <tr>
        <td>Registered Users</td>
         <td>:</td>   
        <td><?php echo sizeof($rusers);?></td>
    </tr>
    
        <tr>
        <td>Visitors</td>
        <td>:</td> 
        <td>
        <?php
        $visitors_count = $mysql->select("select * from _visitor where  userid='".$data[0]['id']."'))");
        //sizeof($d);
        echo sizeof($visitors_count);
?>
 
        
        </td>
    </tr>
     <tr>
        <td valign="top">Available Amount</td>
        <td valign="top">:</td>    
        <td valign="top">
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
                               
</table>

                                                 
<br><div style="border-bottom:1px solid #D4E3F6;"></div>


</td>
<td valign="top">
           <?php include("pages/pj/rightside.php");?>
</td>
</tr>
</table>