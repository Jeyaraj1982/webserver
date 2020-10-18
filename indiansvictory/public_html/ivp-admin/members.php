 
<?php
include_once("../php/classes/mysql.php");
    $mysql = new MySql();
 if (isset($_REQUEST['delete'])) {
$mysql->execute("delete from _members where md5(id)='".$_REQUEST['delete']."'");
echo "<script>alert('Successfully Deleted');</script>";
}
$data = $mysql->select("select * from  _members  order by id desc");
 
 
?>
<table cellspacing='0' cellpadding='5' width='100% '  border='1' style='font-size:12px;font-family:arial'> 
<tr style='font-weight:bold;text-align:center;background:#f1f1f1'>
<td>Membership ID</td>
<td>Person Name</td>
<td>Father Name </td>
<td>Age</td>
<td>Sex</td>
<td>Postel Address</td>
<td>State Name</td>
<td>District Name</td>
<td>Panchayt Name</td>
<td>Mobile No</td>
<td>Email Id</td>
<td>About Me</td>
<td>Joined On</td>
</tr>

 

<?php foreach($data as $d) {  ?>

<tr>
	<td><?php echo $d['id'];?>&nbsp;</td>
	<td><?php echo $d['personname'];?>&nbsp;</td>
	<td><?php echo $d['fname'];?>&nbsp;</td>
	<td><?php echo $d['age'];?>&nbsp;</td>
	<td><?php echo $d['sex'];?>&nbsp;</td>
	<td><?php echo $d['posteladdress'];?>&nbsp;</td>
	<td><?php echo $d['statename'];?>&nbsp;</td>
	<td><?php echo $d['dname'];?>&nbsp;</td>
	<td><?php echo $d['pname'];?>&nbsp;</td>
	<td><?php echo $d['mobileno'];?>&nbsp;</td>
	<td><?php echo $d['emailid'];?>&nbsp;</td>
	<td><?php echo $d['aboutme'];?>&nbsp;</td>
	<td><?php echo $d['joinedon'];?>&nbsp;</td>
	<td><a href='members.php?delete=<?php echo md5($d['id']);?>'>Delete</a></td>
</tr>
<?php } ?>


</table>