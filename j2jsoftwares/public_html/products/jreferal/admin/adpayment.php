<h2 style="text-align: left;font-family: arial;">Make Payment</h2>   
<div style="border-bottom:1px solid #D4E3F6;"></div><br>  
<?php
    if ((isset($_REQUEST['acno']))) {
        $isTrue = 0;   
         $isTrue += validate($_POST['acno']);    
          $isTrue += validate($_POST['amount']);    
           $isTrue += validate($_POST['requestid']);    
            $isTrue += validate($_POST['title']); 
            $isTrue += validate($_POST['description']);  
            
            $description = "Account Id: ".$_POST['acno']."<br>Amount : Rs.".$_POST['amount']."<br>Request ID : ".$_POST['requestid']."<br>Payment Mode : ".$_POST['paymentmode']."<br>Payment Description : ".$_POST['description'];
             if ($isTrue==0) {    
                 
                 $array = array("id"=>'Null',
                     "clientid"=>$_POST['acno'],
                     "date"=>date("Y-m-d H:i:s"),
                     "particulars"=>$_POST['title'],
                     "cramount"=>($_POST['ptype']=='cr') ? $_POST['amount'] : 0,
                     "dramount"=> ($_POST['ptype']=='dr') ? $_POST['amount'] : 0,
                     "description"=>$description
                 );
                 
                  $recordId = $mysql->insert("_clients_account",$array); 
                  

                  echo "<div style='padding:10px;text-align:left;margin:10px;font-family:arial;font-size:13px;line-height: 20px;text-align:justify;border:1px solid #ccc;'>Payment details successfully updated</div>";
                  echo "<style>#amountwindow {display:none}</style>";   
                  
                                   ?>
                 <br>                  
                 <div><?php echo $description; ?></div>  <br>
                    <table cellpadding="5" cellspacing="0" style="font-family: arial;font-size:12px;"  width="100%">
                <tr>
                    <td style="text-align:center;font-weight:normal;border:1px solid #ccc;border-right:none">Total Earning</td>
                    <td style="text-align:center;font-weight:normal;border:1px solid #ccc;border-right:none">Total Withdrawal</td>
                    <td style="text-align:center;font-weight:normal;border:1px solid #ccc;">Available</td>
                </tr>
                <?php
                    //_clients_account
                    $Amount = $mysql->select("select sum(cramount) as cr,  sum(dramount) as dr  from _clients_account where clientid=".$_POST['acno']);
                    
                    
                    ?>
                <tr>
                    <td align="right" style="border:1px solid #ccc;border-right:none;border-top: none;"><?php echo number_format($Amount[0]['cr'],2);?></td>
                    <td align="right" style="border:1px solid #ccc;border-right:none;border-top: none;"><?php echo number_format($Amount[0]['dr'],2);?></td>
                    <td align="right" style="border:1px solid #ccc;border-top: none;"><?php echo number_format(($Amount[0]['cr']-$Amount[0]['dr']),2);?></td> 
                </tr>
                <tr>
                    <td align="center" style="border:1px solid #ccc;border-right:none;border-top: none;">
                    <form action="earning" method="post" target="_blank">
                        <input type="hidden" value="<?php echo $_POST['acno'];?>" name="acno">
                        <input type="submit" value="Details">
                    </form>
                     
                    <td align="center" style="border:1px solid #ccc;border-right:none;border-top: none;">
                                        <form action="withdrawal" method="post" target="_blank">
                        <input type="hidden" value="<?php echo $_POST['acno'];?>" name="acno">
                        <input type="submit" value="Details">
                    </form>
                    
                   
                    <td align="center" style="border:1px solid #ccc;border-top: none;">&nbsp;</td>
                </tr>
            </table>
            <br>
            
                 <?php      
                  
                  
             } else {
                 echo "<div style='color:red'>All Fields are required</div>";    
             }
                  
    }
?>
<div id="amountwindow">
<form action="" method="post">
<table  style="font-family:arial;font-size:12px;" cellpadding="5" cellspacing="0" width="450px"> 
    <tr>
        <td width="160">Member Account Number</td>
        <td><input type="text" name="acno" value="<?php echo $_POST['acno'];?>" style="width: 100%;border:1px solid #DEEBFC;padding:2px"></td>
    </tr>
    <tr>
        <td>Amount</td>
        <td><input type="text" name="amount" value="<?php echo $_POST['amount'];?>" style="width: 100%;border:1px solid #DEEBFC;padding:2px"></td>
    </tr>
    <tr>
        <td>Request ID</td>
        <td><input type="text" name="requestid" value="<?php echo $_POST['requestid'];?>" style="width: 100%;border:1px solid #DEEBFC;padding:2px"></td>
    </tr>
    <tr>
        <td>Subject</td>
        <td><input type="text" name="title" value="<?php echo $_POST['title'];?>" style="width: 100%;border:1px solid #DEEBFC;padding:2px"></td>
    </tr>
    
    <tr bgcolor="#f5f5f5" style="font-weight:bold;">
        <td colspan="2">Payment Details</td>
    </tr>
    <tr>
        <td>Payment Mode</td>
        <td>
            <select name="paymentmode" style="border:1px solid #DEEBFC;padding:2px">>
                <option value="banktransfer">Bank Transfer</option>
                <option value="bankdeposit">Bank Deposit</option>
                <option value="directcash">Direct Cash</option>
                <option value="westernunion">Western Union</option>
                <option value="cheque">Cheque</option>
                <option value="demonddraft">Demand Draft</option>
            </select>
        </td>
    </tr>
    <tr>
        <td>Payment Type</td>
        <td><select name="ptype">
                <option value="cr">Cr</option>
                <option value="dr">Dr</option>
            </select></td>
    </tr>
    <tr>
        <td valign="top">Details</td>
        <td valign="top"><textarea style="width:100%;height:80px;border:1px solid #DEEBFC;padding:2px" name="description"></textarea></td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td><input type="submit" value="Make Payment"></td>
    </tr>

</table>
</form>
</div>
<br><div style="border-bottom:1px solid #D4E3F6;"></div><br>   