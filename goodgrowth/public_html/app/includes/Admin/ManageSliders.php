 <div style="padding:10px;border:1px solid #eee;background:#fff">
 <div class="heading1"><span>Manage Sliders</span></div>
 <Br>

 <div style="padding-top:10px;">
 <a href="dashboard.php?action=ManageSliders&area=All" style="color:#333">All</a> | 
 <a href="dashboard.php?action=ManageSliders&area=Index" style="color:#333">Index</a> | 
 <a href="dashboard.php?action=ManageSliders&area=Health" style="color:#333">Health</a> | 
 <a href="dashboard.php?action=ManageSliders&area=Wealth" style="color:#333">Wealth</a> | 
 <a href="dashboard.php?action=ManageSliders&area=Entertainment"  style="color:#333">Entertainment</a> <br>
 <h3 style="color:green">
 <?php
 if (!(isset($_GET['area']))) {
     $_GET['area']="All";
 }
 
 if ($_GET['area']=="All") {
    $Entries = $mysql->select("select * from _tbl_Web_Sliders order By SliderOrder"); 
    echo "All Silders";
 }
 if ($_GET['area']=="Index") {
    $Entries = $mysql->select("select * from _tbl_Web_Sliders Where PublishArea='Index' order By SliderOrder"); 
    echo "Index Page Sliders";
 }
 
 if ($_GET['area']=="Health") {
    $Entries = $mysql->select("select * from _tbl_Web_Sliders Where PublishArea='Health' order By SliderOrder"); 
    echo "Health Page Sliders";
 }
 
 if ($_GET['area']=="Wealth") {
    $Entries = $mysql->select("select * from _tbl_Web_Sliders Where PublishArea='Wealth' order By SliderOrder"); 
    echo "Wealth Page Silders";
 } 
 
 if ($_GET['area']=="Entertainment") {
    $Entries = $mysql->select("select * from _tbl_Web_Sliders Where PublishArea='Entertainment' order By SliderOrder"); 
    echo "Entertainment Page Silders";
 }
 
 
    
 ?>
 </h3>
 </div>
  <div class="LMenu" style="text-align:right;padding-top:0px">
    <a href="dashboard.php?action=AddSlider">+ Add Slider</a>
 </div>
  <table class= "listTable" style="width:100%" cellspacing="0">
<tbody><tr style="background:#eee">
    <th style="text-align: center;padding:5px;width:150px">Created On</th>
    <th style="text-align: left">SliderFileName</th>
    <th style="text-align: left;width:150px">SliderOrder</th>
    <th style="text-align: left;width:100px;">IsPublish</th>
    <th style="text-align: left;width:100px;">PublishArea</th>
    <th style="text-align: left;width:50px;"> </th>
</tr>
<?php foreach($Entries as $entry) {?>
<tr class="logip">
    <td style="text-align: center;"><?php echo putDateTime($entry['CreatedOn']);?></td>
    <td style="text-align: left;">
    <?php 
    $path="";
        if ($entry['PublishArea']=="Index") {
            $path = "../images/main-slider/".$entry['SliderFileName'];
        } 
        if ($entry['PublishArea']=="Health") {
            $path = "../images/main-slider/".$entry['SliderFileName'];
        }
         if ($entry['PublishArea']=="Wealth") {
            $path = "../images/wealth/".$entry['SliderFileName'];
        } 
        
        if ($entry['PublishArea']=="Entertainment") {
            $path = "../images/entertainment/slider/".$entry['SliderFileName'];
        }
    ?> 
    <img src="<?php echo $path;?>" style="height:60px">   
    </td>
    <td style="text-align: left;"><?php echo $entry['SliderOrder'];?></td>
    <td style="text-align: left;"><?php echo $entry['IsPublish']=="1" ? "Published" : "Not Publish";?></td>
    <td style="text-align: left;"><?php echo $entry['PublishArea'];?></td>
    <td style="text-align: left;"><a href="dashboard.php?action=EditSlider&ID=<?php echo $entry['ID'];?>">Edit</a></td>
</tr>
<?php } ?>
</tbody>
</table>
 </div> 
 