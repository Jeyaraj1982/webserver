<?php include_once("../../config.php"); ?>
<body style="margin:0px;">
  <div style='font-family:arial;font-size:13px;border:1px solid #ccc;background:#ccc;padding:3px;font-weight:bold;color:#444;'>Edit Slider</div>
 <style>
 .mytr:hover{background:#f1f1f1;cursor:pointer}
 </style>
<?php 
  
        $obj = new CommonController(); 
            if (!($obj->isLogin())){
                echo $obj->printError("Login Session Expired. Please Login Again");
                exit;
            }
         
        if(isset($_POST{"cdeletebtn"})) {
            $slider = new JSlider();
            echo $slider->deleteSlider($_POST['rowid']); 
         ?>
            <script>
                alert("Slider Deleted");
                location.href='manageslider.php';
            </script>
        <?php
      }
       
    if (isset($_POST{"deletebtn"})){
             $slider= new JSlider();
             $pageContent =$slider->getSliders($_POST['rowid']);
       
       ?>
      
       <form action='' method="post">
       <table style="margin:10px;width:100%;font-size:12px;font-family:arial;color:#333" cellpadding="3" cellspacing="0" align="center" >
         <tr>
            <td style="width:150px">Slider Title</td>
            <td><?php echo $pageContent[0]['slidertitle'];?></td>
        </tr>
        <tr>
            <td style="width:150px">Slider Description</td>
            <td><?php echo $pageContent[0]['sliderdescription'];?></td>
        </tr>
        <tr>
            <td>Slider File Upload</td>
           <td><img src="../../assets/cms/<?php echo $pageContent[0]["filepath"];?>" height="120"></td> 
        </tr>
        <tr>
            <td style="width:150px">Is Published</td>  
            <td> <?php if ($pageContent[0]["ispublished"]==1) {?>
                    <span style='color:#08912A;font-weight:bold;'>Published</span> 
                <?php } else { ?>
                    <span style='color:#FF090D;font-weight:bold;'>Un Published</span> 
                <?php } ?>
            </td>
        </tr>
       </table>
       <input type="hidden" name="rowid" value="<?php echo $pageContent[0]['sliderid'];?>"> 
       <input type="submit" value="Delete" name="cdeletebtn">
       <input type="button" name="cancelbtn" value="Cancel" bgcolor="grey" onclick="location.href='manageslider.php'"> 
     </form>
        <?php
       exit;
           
         }
       
    if (isset($_POST{"updatebtn"})){
            $slider= new JSlider();
            $param = array("sliderid"=>$_POST['rowid'],"slidertitle"=>$_POST['slidertitle'],"sliderdescription"=>$_POST['sliderdescription'],"ispublished"=>$_POST['ispublished']);
            echo $slider->updateSlider($param,$_POST['rowid']);
            ?>
            <script>
                alert("Updated Successfully");
                location.href='manageslider.php';
            </script>
            <?php
            exit;
         }
          echo "<table  cellspacing='3' cellspadding='0' width='100%' style='font-size:12px;font-family:arial;' >";
          echo "<tr><td>Slider Name</td><td>File Name</td><td>Is Published </td></tr>";

   
    foreach (JSlider::getSliders() as $r) {
    ?>
    <form action='' method='post'  >
        <tr class="mytr">
            <td>
                <b>Title:</b>&nbsp;<input type="text" value="<?php echo $r["slidertitle"];?>" name="slidertitle" style="width:260px !important">
                <br><b>Slider Description</b><br>
                <textarea name="sliderdescription" style="height:80px;width:300px;"><?php echo $r["sliderdescription"];?></textarea>
            </td>
            <td style='width:350px;'>
                <img src="../../assets/cms/<?php echo $r["filepath"];?>" height="120">
            </td>
            <td style='width:150px;'> 
                <select name="ispublished">
                    <option value='1' <?php echo ($r["ispublished"]) ? 'selected="selected"' : '';?>>Yes</option>
                    <option value='0' <?php echo ($r["ispublished"]!=1) ? 'selected="selected"' : '';?>>No</option>
                </select>
            </td>
            <td>
                <input type='hidden' value='<?php echo $r["sliderid"];?>' name='rowid' id='rowid' >
                <input type='submit' name='updatebtn' value='Update'>
                <input type='submit' name='deletebtn' value='Delete'>
            </td>
        </tr>
    </form>
    <?php } ?> 
</body>