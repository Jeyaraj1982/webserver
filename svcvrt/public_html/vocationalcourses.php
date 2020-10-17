<?php $vocationalCourse=true; ?>
<?php include_once("header.php"); ?>
<style>
td {padding:5px;}
</style>
<div class="w3-row">
    <div class="w3-container w3-threequarter" style="color:#444;text-align:justify">
     <h2>Vocational Courses</h2><br>
        <div style="padding-left:40px">
     <?php include_once("vocatioal-latestnews.php");?>  
     </div>
      
        <?php include_once("vocational-charges.php");?>
 </div>
  <div class="w3-container w3-quarter">
     <?php include_once("latestnews.php");?>
  </div>
  </div>
<?php include_once("footer.php");?>