<?php include_once("../../config.php"); ?>
<style>
 .mytr:hover{background:#f1f1f1;cursor:pointer}
</style>

 <body style="margin:0px;">
    <div style='font-family:arial;font-size:13px;border:1px solid #ccc;background:#ccc;padding:3px;font-weight:bold;color:#444;'>View Contact</div>
<?php 
   
            if (!(CommonController::isLogin())){
                echo CommonController::printError("Login Session Expired. Please Login Again");
                exit;
            }

        if(isset($_POST{"viewbtn"})){
             $contact= new JContact();
             $pageContent =$contact->getContact($_POST['rowid']);
       
       ?>
      
       <form action='' method="post">
       <table>
        <tr>
            <td style="width:150px">Contact Title</td>
            <td><?php echo $pageContent[0]['contacttitle'];?></td>
        </tr>
        <tr>
            <td style="width:150px">Contact Mobile</td>
            <td><?php echo $pageContent[0]['contactmobile'];?></td>
        </tr>
        <tr>
            <td style="width:150px">Contact Email</td>
            <td><?php echo $pageContent[0]['contactemail'];?></td>
        </tr>
        
       </table>
       <input type="hidden" name="rowid" value="<?php echo $pageContent[0]['contactid'];?>"> 
       <input type="submit" value="Delete" name="cdeletebtn">
       <input type="button" name="cancelbtn" value="Cancel" bgcolor="grey" onclick="location.href='viewcontact.php'"> 
         </form>
        <?php
       exit;
        }
        
         if(isset($_POST{"cdeletebtn"}))
      {
       $contact = new JContact();
       $menucontent = $contact->deleteContact($_POST['rowid']); 
       ?>
            <script>
                alert("Contact Deleted");
                location.href='viewcontact.php';
            </script>
            <?php
            exit;
      }
       
    if (isset($_POST{"deletebtn"})){
            $contact= new JContact();
            $pageContent =$contact->getContact($_POST['rowid']);
       
       ?>
      
       <form action='' method="post">
       <table>
        <tr>
            <td style="width:150px">Contact Title</td>
            <td><?php echo $pageContent[0]['contacttitle'];?></td>
        </tr>
        <tr>
            <td style="width:150px">Contact Mobile</td>
            <td><?php echo $pageContent[0]['contactmobile'];?></td>
        </tr>
        <tr>
            <td style="width:150px">Contact Email</td>
            <td><?php echo $pageContent[0]['contactemail'];?></td>
        </tr>
        
       </table>
       <input type="hidden" name="rowid" value="<?php echo $pageContent[0]['contactid'];?>"> 
       <input type="submit" value="Delete" name="cdeletebtn">
       <input type="button" name="cancelbtn" value="Cancel" bgcolor="grey" onclick="location.href='viewcontact.php'"> 
         </form>
        <?php
       exit;
      
         }
        
       echo "<table  cellspacing='3' cellspadding='0' width='100%' style='font-size:12px;font-family:arial;'>";
       echo "<tr><td>Title</td><td>Mobile</td><td>Email</td></tr>";
 $result=$mysql->select("select * from _jcontact");
   
    foreach ($result as $r)
    {
    ?>
    <tr class="mytr">
        <td colspan='4' style="border:1px solid #f1f1f1">
            <form action='' method='post' style="height:60;">
                <table cellpadding="5" cellspacing="0" width="100%"> 
                    <tr valign="top">
                        <td style='width:150px;' >
                            <input type="text" value="<?php echo $r["contacttitle"];?>" name="contacttitle">
                        </td>
                        <td style='width:150px;'>
                            <input type="text" value="<?php echo $r["contactmobile"];?>" name="contactmobile">
                        </td>
                        <td style='width:150px;'>
                            <input type="text" value="<?php echo $r["contactemail"];?>" name="contactemail">
                        </td>
                        <td style='width:150px;'>
                            <input type='hidden' value='<?php echo $r["contactid"];?>' name='rowid' id='rowid' >
                            <input type='submit' name='viewbtn' value='View'>
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