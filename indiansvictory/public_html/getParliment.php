<?php 

include_once("php/classes/mysql.php"); 
$mysql= new MySql();

$data = $mysql->select("select * from _parliment where stateid='".$_REQUEST['state']."' order by parlimentname");
$state = $mysql->select("select * from _statenames where id=".$_REQUEST['state']);
       $count=0;                 
 

?>   
<table cellpadding="5" cellspacing="0" width="100%"  style="font-family:arial;font-size:12px" >
    <tr>
        <td><b>State Name : </b><?php echo $state[0]['statenames'];?></td>
        <td align="right"><a href="javascript:void(0)" onclick="javascript:$('#mapresult').html(temp);">View Map</a></td>
    </tr>
</table>
<table cellpadding="3" cellspacing="0" style="font-family:arial;font-size:12px;width:100%"   align="left">
    <tr style="background: #ccc;font-weight:bold;color:#333;">
        <td width="50">Sl No</td>
        <td>Parliment Zones</td>
    </tr>
</table>
<div style="clear:both;height:507px;overflow:auto;background:white;border-top:1px solid #ccc">

<table cellpadding="3" cellspacing="0" style="font-family:arial;font-size:12px;width:100%"   align="left">
   
    <?php foreach($data as $d) { $count++;?>
        <tr>
            <td width="50" style="border:1px solid #f1f1f1;text-align:right"><?php echo $count; ?>.&nbsp;</td>
            <td style="border:1px solid #f1f1f1"><?php echo $d['parlimentname'];?></td>
        </tr>
    <?php } ?>
</table>
</div>