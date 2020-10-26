<html>
<body bgcolor="lightblue">

<?php
$con = mysql_connect("localhost","thefinish","a37cnfHvzacT");
if (!$con)
  {
  die('Could not connect: ' . mysql_error());
  }



mysql_select_db("thefinish_db", $con);

$sql="INSERT INTO contact(name,phone,email,message)
VALUES
('$_POST[name]','$_POST[phone]','$_POST[email]','$_POST[message]')";


echo "<table align=center>
<tr>
</td>
<br><br><br>
</td>
</tr>

<tr>
<td>
உங்கள் தகவல்கள் பதிவு செய்யப்பட்டன. தேவன் உங்களை ஆசீர்வதிப்பாராக!
</td>
</tr>

<tr>
<td align=center>
<a href='index.html'><img src='image/back.gif'></img></a>
</td>
</tr>
</table>";



if (!mysql_query($sql,$con))
  {
  die('Error: ' . mysql_error());
  }



mysql_close($con);
?>
</body>
</html>