<?php
include_once("conf.php");

function validate_email($email)
{
//by Femi Hasani [www.vision.to]
if(!preg_match ("/^[\w\.-]{1,}\@([\da-zA-Z-]{1,}\.){1,}[\da-zA-Z-]+$/", $email))
return false;

//list($prefix, $domain) = split("@",$email);

$data = explode("@",$email);
$prefix = $data[0];
$domain = $data[1];
      try {  
        if(function_exists("getmxrr") && getmxrr($domain, $mxhosts))
        {
        return true;
        }
        elseif (@fsockopen($domain, 25, $errno, $errstr, 5))
        {
        return true;
        }
        else
        {
        return false;
        }
      }  catch (Exception $e){
        return false;
    } 

}
 
if (isset($_REQUEST['delete'])) {

$mysql->execute("delete from _emails where md5(id)='".$_REQUEST['delete']."'");
echo "<div style='text-align:center;color:red;font-weight:bold;font-size:20px'>Successfully Deleted</div>";
}   


if ((isset($_POST['emailid'])) && (strlen($_POST['emailid'])>0)) {
include_once("mysql.php");
$mysql = new MySql();
$data = $mysql->select("select * from _emails where emails like '%".$_POST['emailid']."%'");
if (sizeof($data)>0) {
echo "<div style='color:red'>This Email id Alreay Exists</div>";
} else {
$ins = array("emails"=>trim($_POST['emailid']));

if (validate_email(trim($_POST['emailid']))) {

$id = $mysql->insert("_emails",$ins);
echo "<div>Total Email id : ".sizeof($mysql->select("select * from _emails "))."</div>";
echo "<div style='color:blue'>".$id." - Successfully added ".$_POST['emailid'],"</div>";
} else {
echo "<div style='color:red'>Invalid Email Id/Address</div>";

}
}

}
?>

<form action="" method="POST">
<table>
    <tr>
        <td>Enter Email Id </td>
        <td><input type='text' name='emailid'></td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td><input type='submit' value='Add Email'></td>
    </tr>
</table>
</form> 
<table cellpadding="3" border="1">
	<tr>
		<td>Slno</td>
		<td>Email Id </td>
		<td>Actions</td>
	</tr>
	<?php 
	$count = 0;
	foreach($mysql->select("select * from _emails ") as $e) { 
	$count++;
	?>
	<tr>
		<td><?php echo $count;?></td>
		<td><?php echo $e['emails'];?></td>
		<td><a href="newemail.php?delete=<?php echo md5($e['id']); ?>">Delete</td>
	</tr>
 
	<?php } ?>
</table>