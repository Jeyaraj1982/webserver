<?php include_once("../../config.php"); ?>
<body style="margin:0px;">
 <div style='border:1px solid #ccc;background:#ccc;padding:3px;font-weight:bold;color:#444;font-family:arial;font-size:12px;'>Manage Map</div>
 <style>
 .mytr:hover{background:#f1f1f1;cursor:pointer}
 </style>
<?php  


     
        if(isset($_POST{"cdeletebtn"}))
      {
       $contactus = new JMap();
       echo $contactus->deleteMap($_POST['rowid']); 
         ?>
            <script>
                alert("Contact Deleted");
                location.href='managemap.php';
            </script>
            <?php
      }
       
    if (isset($_POST{"deletebtn"}))
         {
             $contactus= new JMap();
             echo $contactus->viewMap($_POST['rowid']);
             exit;
           
         }
       
    if (isset($_POST{"updatebtn"}))
         {
            $contactus= new JMap();
            echo $contactus->updateMap($_POST['mapcoding'],$_POST['rowid']);
            ?>
            <script>
                alert("Updated Successfully");
                location.href='managemap.php';
            </script>
            <?php
            exit;
         }
          echo "<table  cellspacing='3' cellspadding='0' width='100%'>";
          echo "<tr><td>MapCoding</td></tr>";

    $result=$mysql->select("select * from _jmap");
   
    foreach ($result as $r)
    {
    ?>
    <tr class="mytr">
        <td colspan='5' style="border:1px solid #f1f1f1">
            <form action='' method='post'  >
                <table cellpadding="3" cellspacing="0" width="100%" style="font-size:12px;font-family:arial;color:#444"> 
                    <tr>
                        <td>
                        
                       <br><b>Description</b><br>
                            <textarea name="mapcoding" style="height:80px;width:300px;"><?php echo $r["mapcoding"];?></textarea>
                        </td>
                        <td>
                            <input type='hidden' value='<?php echo $r["contid"];?>' name='rowid' id='rowid' >
                            <input type='submit' name='updatebtn' value='Update'>
                            <input type='submit' name='deletebtn' value='Delete'>
                        </td>
                    </tr>
                </table>
            </form>
        </td>
    </tr>
    <?php
        
    
    }

?>
</body>