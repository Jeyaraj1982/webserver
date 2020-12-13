<h2 style="text-align: left;font-family: arial;">Active Clients</h2>  
<?php // $data = $mysql->select("select * from _clients where isblock=0 and isactive=1 order by id desc"); ?>

<?php 
if (isset($_POST['distName'])) {
    $distName = strtolower(trim(trim(str_replace("\n","",$_POST['distName']))));
    $data = $mysql->select("select * from _clients where LOWER(trim(streetname)) like '%".$distName."%' and isblock=0 and isactive=1 order by id desc");
} else {
     if ($_SESSION['country']=="Malaysia") {     
         $data = $mysql->select("select * from _clients where isblock=0 and isactive=1 and country='malaysia'  order by id desc"); 
     } else {
$data = $mysql->select("select * from _clients where isblock=0 and isactive=1 order by id desc");          
     }

}

if ( $_SESSION['user']['role']=="erode" ) {
    $data = $mysql->select("select * from _clients where lcase(streetname) like '%erode%' and isblock=0 and isactive=1 order by id desc"); 
}

if ( $_SESSION['user']['role']=="12district" ) {
    $data = $mysql->select("select * from _clients where (lcase(streetname) like '%tiruchirappalli%' or lcase(streetname) like '%pudukkottai%' or lcase(streetname) like '%karur%' or lcase(streetname) like '%perambalur%' or lcase(streetname) like '%ariyalur%' or lcase(streetname) like '%madurai%' or lcase(streetname) like '%virudhunagar%' or lcase(streetname) like '%ramanathapuram%' or lcase(streetname) like '%sivaganga%' or  lcase(streetname) like '%namakkal%' or  lcase(streetname) like '%dharmapuri%' or  lcase(streetname) like '%krishnagiri%') and isblock=0 and isactive=1 order by id desc"); 
}


?>



<table style="font-family:arial;font-size:12px;" width="100%" cellpadding="3" cellspacing="0">
    <tr bgcolor="#f5f5f5" style="font-weight: bold;text-align: center;">
        <td width="150"  style="border:1px solid #ccc;">Client Name</td>
        <td  style="border:1px solid #ccc;">E-mail id</td>
        <td width="80"  style="border:1px solid #ccc;">Phone No</td>
        <td width="120" colspan="2"  style="border:1px solid #ccc;">Registered on</td>
    </tr>
    <?php foreach($data as $d) { ?>
        <tr>
              <td style="border-bottom:1px solid #ccc;"><?php echo ucfirst($d['firstname']);?></td>
              <td style="border-bottom:1px solid #ccc;"><?php echo strtolower($d['emailid']);?></td>
              <td style="border-bottom:1px solid #ccc;text-align: center"><?php echo $d['mobileno'];?></td>
              <td style="border-bottom:1px solid #ccc;text-align: center"><?php echo date("Y-m-d",strtotime($d['postedon']));?></td>
              <td style="padding-top:12px;border-bottom:1px solid #ccc;text-align: center"><form action="editclient" method="post"><input type="hidden" value="<?php echo $d['id'];?>" name="clientid"><input type="image" src="images/more_button.gif" value="..." style="font-family:arial;font-size:8px;border:0px solid #ccc;background:white;color:#222"></form></td>
        </tr>
    <?php } ?>
</table>