<h2 style="text-align: left;font-family: arial;">My Profile</h2>  
<div style="border-bottom:1px solid #D4E3F6;"></div><br>
<?php
    $data = $mysql->select("select * from _clients where id=".$_SESSION['user']['id']);
?>
    <table cellpadding='5' cellspacing='5' style='font-size:12px;'>
        <tr><td>First Name </td><td>:</td><td><?php echo $data[0]['firstname'];?></td></tr>
        <tr><td>Last Name </td><td>:</td><td><?php echo $data[0]['lastname']; ?></td></tr>
        <tr><td>Email Id</td><td>:</td><td><?php echo $data[0]['emailid']; ?></td></tr>
        <tr><td>Date Of Birth</td><td>:</td><td><?php echo $data[0]['dateofbirth']; ?></td></tr>
        <tr><td>Sex</td><td>:</td><td><?php echo $data[0]['sex']; ?></td></tr>
        <tr><td>Door No</td><td>:</td><td><?php echo $data[0]['doorno']; ?></td></tr>
        <tr><td>Building Name</td><td>:</td><td><?php echo $data[0]['buildingname']; ?></td></tr>
        <tr><td>Street Name</td><td>:</td><td><?php echo $data[0]['streetname']; ?></td></tr>
        <tr><td>City</td><td>:</td><td><?php echo $data[0]['city']; ?></td></tr>
        <tr><td>State</td><td>:</td><td><?php echo $data[0]['state']; ?></td></tr>
        <tr><td>Country</td><td>:</td><td><?php echo $data[0]['country']; ?></td></tr>
        <tr><td>Pincode</td><td>:</td><td><?php echo $data[0]['pincode']; ?></td></tr>
        <tr><td>Plan</td><td>:</td><td><?php echo $data[0]['plan']; ?></td></tr>
        <tr><td>Mobile No</td><td>:</td><td><?php echo $data[0]['mobileno']; ?></td></tr>
        <tr><td>Referring</td><td>:</td><td><?php echo $data[0]['refferedby']; ?></td></tr>
    </table>
    <br>
<div style="border-bottom:1px solid #D4E3F6;"></div>
 