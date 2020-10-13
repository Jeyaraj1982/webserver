<?php
    include_once("../header.php");
    menu('serviceappartment',$path);
?>
<div >
<table style="background:#383636;color:#EAF3F8;text-align:left;font-family:Arial;font-size:12px;font-weight:bold" cellpadding="5" width="100%">
    <tr>
        <td width="80" align="center"><a href="ourappartments.php" style="color:white;text-decoration: none;">About Us</a></td>
        <td width="80"  align="center"><a href="traiff.php"  style="color:white;text-decoration: none;">Guest House </a></td>
        <td width="150"  align="center"><a href="facilities.php" style="color:white;text-decoration: none;">Service Appartments</a></td>
        <td width="80"  align="center"><a href="facilities.php" style="color:white;text-decoration: none;">Hostel</a></td>
        <td width="80"  align="center"><a href="facilities.php" style="color:white;text-decoration: none;">Booking</a></td>
        <td width="80"  align="center"><a href="facilities.php" style="color:white;text-decoration: none;">Contact Us</a></td>



        <td></td>
    </tr>
</table>
</div>
<style>
table {font-size:12px;font-family:arial;}
</style>
 
 <?php
    $room[1]=array("Saligramam","Raja Street","Ground","1040");
$room[2]=array("Saligramam","Raja Street","First","1040");
$room[3]=array("Saligramam","Raja Street","Second","1060");
$room[4]=array("Saligramam","Munusamy Street","Ground","520");
$room[5]=array("Saligramam","Munusamy Street","Ground","520");
$room[6]=array("Saligramam","Sethupillai Street","First","980");

$room[7]=array("Porur","Madanandapuram","First","600");
$room[8]=array("Porur","SMadanandapuram","Second","600");
$room[9]=array("Porur","Madanandapuram","Second","730");
$room[10]=array("Porur","Madanandapuram","second","780");

$room[11]=array("K.K.Nagar","East Vanniyar Street","Ground","1000");
$room[12]=array("K.K.Nagar","East Vanniyar Street","Ground","1000");
$room[13]=array("K.K.Nagar","East Vanniyar Street","Ground","1100");

$room[14]=array("Kattuppakkam","","Ground","530");
$room[15]=array("Kattuppakkam","","First","530");
$room[16]=array("Kattuppakkam","","First","520");


$room[17]=array("Thiruvanmiyur","","Ground","950");
$room[18]=array("Thiruvanmiyur","","First","1100");
 
?>
<table width="98%" cellpadding="5" cellspacing="0" style="margin-top:8px">
  
<tr>
    <td colspan="2">
        <table cellpadding="5">
            <tr>
                <td>Location</td>
                <td>:&nbsp;<?php echo $room[$_REQUEST['room']][0].(isset($room[$_REQUEST['room']][1])? $room[$_REQUEST['room']][1] : '');?></td>
            </tr>
            <tr>
                <td>Floor</td>
                <td>:&nbsp;<?php echo $room[$_REQUEST['room']][2];?></td>
            </tr>
            <tr>
                <td>Sq.feet</td>
                <td>:&nbsp;<?php echo $room[$_REQUEST['room']][3];?></td>
            </tr>
            <tr>
                <td>Your Name </td>
                <td>:&nbsp;<input type="text" name="username"></td>
            </tr>
            <tr>
                <td>E-Mail Id</td>
                <td>:&nbsp;<input type="text" name="emailid"></td>
            </tr>
            <tr>
                <td>Mobile No</td>
                <td>:&nbsp;<input type="text" name="mobilenumber"></td>
            </tr>
            
            
            
            
            
        </table>

  
</td>
</tr>
</table>


<?php
    include_once("../footer.php");
?>