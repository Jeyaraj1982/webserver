<?php
if (isset($_REQUEST['delete'])) {
unlink("../profile/facebook/".base64_decode($_REQUEST['delete']));
echo "<div style='text-align:center;color:red;font-weight:bold;font-size:20px'>Successfully Deleted</div>";
}
?>
 <h2>IVP MEMBERS</h2>

<table cellpadding=5 border=1>
<?php
$files = scandir("../profile/facebook");
//print_r($files);
foreach($files as $f) {
 if ( ($f!="..") && ($f!=".") ) {  ?>

<tr>
	<td>
<?php 
echo "<img src='../profile/facebook/".$f."' style='border:1px solid #f1f1f1;background:#222;margin:3px;padding:2px;'>";
?>
</td>
<td><a href="facebook.php?delete=<?php echo base64_encode($f); ?>">Delete</td>

<?php
}}
?>
 </table>