<script>getMenuItems('mypage');</script>  
    <h3 style="color:#EA0E83;font-family:arial;border-bottom:1px solid #EA0E83;padding-bottom:5px;margin-bottom:10px;">My Invoices</h3> <br>  
<table align="center" style="font-size:12px;font-family:arial;border:1px solid #ccc" cellpadding="5" cellspacing="0" width="98%" > 
     <tr style="background:url(images/bar_menu.gif);font-weight:bold;text-align: center;color:#FFFFFF;">  
        <td width="80"> Invoice No</td>
        <td width="120"> Date</td>
        <td>Invoice Amount</td>
        <td> Payment Status</td>
        <td> Payment Transaction ID </td>
        <td>&nbsp;</td>
    </tr>
<?php foreach($mysql->select("select * from _tbl_invoice where userid='".$_SESSION['USER']['userid']."' order by invoiceid desc") as $invoices) { ?>
             <tr>
                <td style="border-right:1px solid #ccc;text-align: center;"><?php echo $invoices['invoiceid'];?></td>
                <td style="border-right:1px solid #ccc;text-align: center;"><?php echo $invoices['invoicedate'];?></td>
                <td style="border-right:1px solid #ccc;text-align: right;"><?php echo number_format($invoices['invoiceamount'],2);?></td>
                <td style="border-right:1px solid #ccc;text-align: center;"><?php echo ($invoices['paymentstatus']==0) ? "Success" : "Failed";?></td>
                <td style="text-align: center;"><?php echo $invoices['transactionid'];?></td>
                <td>
                    <form action="p/viewInvoice" method="post" target="_self">
                        <input type="hidden" value="<?php echo $invoices['invoiceid'];?>" name="invoiceid" id="invoiceid">
                        <input type="submit" value=" View Invoice "  style="border:none;background:url(images/bar_menu.gif);color:#ffffff;font-weight:bold;font-family: arial;padding:2px 10px;font-size:11px">
                    </form>
                </td>
             </tr>
        
        <?php
        
        
    }
    
?>
</table>