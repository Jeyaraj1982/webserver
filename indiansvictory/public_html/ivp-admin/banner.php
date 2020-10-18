<?php
if (isset($_REQUEST['delete'])) {
unlink("../profile/banner/".base64_decode($_REQUEST['delete']));
echo "<div style='text-align:center;color:red;font-weight:bold;font-size:20px'>Successfully Deleted</div>";
}
?>
 <h2>IVP MEMBERS</h2>

<table cellpadding=5 border=1>
<?php
$files = scandir("../profile/banner");
//print_r($files);
foreach($files as $f) {
 if ( ($f!="..") && ($f!=".") ) {  ?>

<tr>
	<td>
<?php 
echo "<img src='../profile/banner/".$f."' style='border:1px solid #f1f1f1;background:#222;margin:3px;padding:2px;' width=200>";
?>
</td>
<td><a href="banner.php?delete=<?php echo base64_encode($f); ?>">Delete</td>

<?php
}}
?>
 </table>