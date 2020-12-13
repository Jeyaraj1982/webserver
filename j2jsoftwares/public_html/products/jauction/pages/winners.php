<script>getMenuItems('timeBased');</script>   

<div style="border:1px solid #3093CC;background:#F4FBFF;height:1230px;;">
    <div style="background:#3093CC;color:#fff;font-size:13px;font-weight:bold;font-family:arial;padding:8px;text-transform: capitalize">Winner's</div>
    <div style="margin:10px;">
        <table width="100%" cellspacing="0" cellpadding="5" border="0" align="left" style="font-family:arial;font-size:13px;line-height:24px;text-align:justify;">
        
            <?php  foreach($mysql->select("select * from _tblwinners") as $p) { ?>
            <tr>
                <td colspan="2" style="background: #DEF1FC;font-weight:bold;"><?php echo $p['productname'];?></td>
            </tr>
            <tr>
                <td width="90" valign="top" align="left" bgcolor="#ffffff" align><img src="../couriers/<?php echo $p['photopath'];?>" height="100" width="80"><Br><strong><?php echo $p['test_name'];?></strong></td>
                <td valign="top" bgcolor="#ffffff" align="left">
                    <font color="#333333"><img src="../couriers/<?php echo $p['courierpath'];?>" height="100" width="80"></font>
                    <br>
                    <font color="#333333"><?php echo nl2br($p['testimonials']);?></font>
                </td>
            </tr>
            <tr>
                <td valign="top" align="left">&nbsp;</td>
                <td valign="top" align="left">&nbsp;</td>
            </tr>
            <?php } ?>
        </table>
    </div>
</div>
