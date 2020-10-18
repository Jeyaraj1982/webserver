<?php include_once("header.php");?>
<?php 
$batchdetails = $mysql->select("select * from _tblbatch  where userid=".$_SESSION['user']['id']." order by batchid desc");
?>
    <table style="margin-bottom:15px;margin-top:5px;width:100%" cellpadding="3" cellspacing="0">
        <tr style="font-weight:bold;">    
            <td style="border:1px solid #D0DDEA;background:#ECF1F6;padding-left:10px;padding-right:10px;width:60px">Batch ID</td>
            <td style="border:1px solid #D0DDEA;background:#ECF1F6;padding-left:10px;padding-right:10px;width:100px">Date Time</td>
            <td style="border:1px solid #D0DDEA;background:#ECF1F6;padding-left:10px;padding-right:10px;">Batch Name</td>
            <td style="border:1px solid #D0DDEA;background:#ECF1F6;padding-left:10px;padding-right:10px;width:60px">Total Records</td>
            <td style="border:1px solid #D0DDEA;background:#ECF1F6;padding-left:10px;padding-right:10px;width:60px">Valid Records</td>
            <td style="border:1px solid #D0DDEA;background:#ECF1F6;padding-left:10px;padding-right:10px;width:60px">Sent SMS</td>
            <td style="border:1px solid #D0DDEA;background:#ECF1F6;padding-left:10px;padding-right:10px;width:60px">Message Count</td>
            <td style="border:1px solid #D0DDEA;background:#ECF1F6;padding-left:10px;padding-right:10px;width:100px">Started On</td>
            <td style="border:1px solid #D0DDEA;background:#ECF1F6;padding-left:10px;padding-right:10px;width:100px">Ended</td>
            <td style="border:1px solid #D0DDEA;background:#ECF1F6;padding-left:10px;padding-right:10px;">&nbsp;</td>
        </tr>
        <?php foreach($batchdetails as $b) {?>
        <tr>
            <td style="border:1px solid #D0DDEA;border-top:none;text-align:right"><?php echo $b['batchid']; ?></td>
            <td style="border:1px solid #D0DDEA;border-top:none;text-align:left"><?php echo $b['addedon']; ?></td>
            <td style="border:1px solid #D0DDEA;border-top:none;text-align:left"><?php echo $b['batchname']; ?></td>
            <td style="border:1px solid #D0DDEA;border-top:none;text-align:right"><?php echo $b['totalrecords']; ?></td>
            <td style="border:1px solid #D0DDEA;border-top:none;text-align:right"><?php echo $b['validrecords']; ?></td>
            <td style="border:1px solid #D0DDEA;border-top:none;text-align:right"><?php echo $b['messagesent']; ?></td>
            <td style="border:1px solid #D0DDEA;border-top:none;text-align:right"><?php echo $b['totalsmscount']; ?></td>
            <td style="border:1px solid #D0DDEA;border-top:none;"><?php echo $b['started']; ?></td>
            <td style="border:1px solid #D0DDEA;border-top:none;"><?php echo $b['ended']; ?></td>
            <td style="border:1px solid #D0DDEA;border-top:none;text-align:right"><a href='batch.php?id=<?php echo $b['batchid'];?>'>View</a>
        </tr>
        <?php } ?>
    </table>
<?php include_once("footer.php");?>