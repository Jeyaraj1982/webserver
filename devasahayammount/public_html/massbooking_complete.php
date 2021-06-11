
<?php error_reporting(0);
include_once("config.php");
include_once("includes/header.php");
?>
 <div class="jTitle">Mass Booking </div>
<br> 

<?php
if (isset($_POST['t'])) {
 echo $_POST['t'];   
}
include_once("includes/footer.php");
?>
