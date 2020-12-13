<h2 style="text-align: left;font-family: arial;">New Users</h2>  
<?php $data = $mysql->select("select * from _clients where isblock=-1 and isactive=0 order by id desc"); ?>
<table style="font-family:arial;font-size:12px;" width="100%" cellpadding="3" cellspacing="0">
    <tr bgcolor="#f5f5f5" style="font-weight: bold;text-align: center;">
        <td width="150"  style="border:1px solid #ccc;">Client Name</td>
        <td  style="border:1px solid #ccc;">E-mail id</td>
        <td width="80"  style="border:1px solid #ccc;">Phone No</td>
        <td width="120" colspan="2"  style="border:1px solid #ccc;">Registered on</td>
    </tr>
    <?php foreach($data as $d) { ?>
    <?php
    $c = $mysql->select("select * from _comments where clientid=".$d['id']);
    if (($c[0]['status'])=="Donot Contact") {
?>
        <tr>
              <td style="border-bottom:1px solid #ccc;"><?php echo ucfirst($d['firstname']);?></td>
              <td style="border-bottom:1px solid #ccc;"><?php echo strtolower($d['emailid']);?></td>
              <td style="border-bottom:1px solid #ccc;text-align: center"><?php echo $d['mobileno'];?></td>
              <td style="border-bottom:1px solid #ccc;text-align: center"><?php echo date("Y-m-d",strtotime($d['postedon']));?></td>
              <td style="padding-top:12px;border-bottom:1px solid #ccc;text-align: center"><form action="editclient" method="post"><input type="hidden" value="<?php echo $d['id'];?>" name="clientid"><input type="image" src="images/more_button.gif" value="..." style="font-family:arial;font-size:8px;border:0px solid #ccc;background:white;color:#222"></form></td>
        </tr>
        <?php } ?>
    <?php } ?>
</table>