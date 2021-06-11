<?php include_once("../../config.php"); ?>
<body style="margin:0px;">
  <div style='font-family:arial;font-size:13px;border:1px solid #ccc;background:#ccc;padding:3px;font-weight:bold;color:#444;'>Manage Contact</div>
 <style>
 .mytr:hover{background:#f1f1f1;cursor:pointer}
 </style>
<?php 
    
        
        $obj = new CommonController();
            
        if (!($obj->isLogin())){
            echo $obj->printError("Login Session Expired. Please Login Again");
            exit;
        } 
        
        if(isset($_POST{"cdeletebtn"})){
             echo JContactus::deleteContactus($_POST['rowid']); 
             echo CommonController::printSuccess("Deleted Successfully");
             echo "<script>setTimeout(\"window.open('managecontact.php','rpanel')\",1500);</script>";
         }
       
    if(isset($_POST{"deletebtn"})){
        
            $pageContent =JContactus::getContactus($_POST['rowid']);
       ?>
       <form action='' method="post">
       <table  style="margin:10px;width:100%;font-size:12px;font-family:arial;color:#333" cellpadding="3" cellspacing="0" align="center">
        <tr>
            <td style="width:150px">Person Name</td>
            <td><?php echo $pageContent[0]['personname'];?></td>
        </tr>
        <tr>
            <td style="width:150px">Mobile No.</td>
            <td><?php echo $pageContent[0]['contmob'];?></td>
        </tr>
        <tr>
            <td style="width:150px">Email Id</td>
            <td><?php echo $pageContent[0]['contemail'];?></td>
        </tr>
        <tr>
            <td style="width:150px">Subject</td>
            <td><?php echo $pageContent[0]['subject'];?></td>
        </tr>
        <tr>
            <td style="width:150px">Content</td>
            <td><?php echo $pageContent[0]['content'];?></td>
        </tr>
        <tr>
            <td style="width:150px">Convenient Time</td>
            <td><?php echo $pageContent[0]['convtime'];?></td>
        </tr>
       </table>
       <input type="hidden" name="rowid" value="<?php echo $pageContent[0]['contid'];?>"> 
       <input type="submit" value="Delete" name="cdeletebtn">
       <input type="button" name="cancelbtn" value="Cancel" bgcolor="grey" onclick="location.href='managecontact.php'"> 
         </form>
        <?php
       exit;
           
         }
       
    if (isset($_POST{"updatebtn"})){
        
            $param=array("contactid"=>$_POST['rowid'],"mobileno"=>$_POST['mobileno'],"email"=>$_POST['email'],"personname"=>$_POST['personname'],"subject"=>$_POST['subject'],"content"=>$_POST['content'],"convtime"=>$_POST['convtime']);
             JContactus::updateContactus($param,$_POST['rowid']);
             echo CommonController::printSuccess("Updated Successfully");
             echo "<script>setTimeout(\"window.open('managecontact.php','rpanel')\",1500);</script>";
         }
          echo "<table  cellspacing='3' cellspadding='0' width='100%' style='font-size:12px;font-family:arial;'>";
          echo "<tr><td>PersonName</td><td>Mobile</td><td>Email</td><td>Subject</td><td>Content</td><td>Convenient Time</td></tr>";
   
    foreach (JContactus::getContactus() as $r)
    {
    ?>
         <form action='' method='post'> 
                    <tr class="mytr">
                        <td>
                            <input type="text" value="<?php echo $r["personname"];?>" name="personname">
                        </td>
                        <td>
                            <input type="text" value="<?php echo $r["contmob"];?>" name="mobileno">
                        </td>
                        <td>
                            <input type="text" value="<?php echo $r["contemail"];?>" name="email">
                        </td>
                        <td>
                            <input type="text" value="<?php echo $r["subject"];?>" name="subject">
                        </td>
                        <td>
                            <input type="text" value="<?php echo $r["content"];?>" name="content">
                        </td>
                        <td>
                            <input type="text" value="<?php echo $r["convtime"];?>" name="convtime">
                        </td>
                        
                        <td>
                            <input type='hidden' value='<?php echo $r["contid"];?>' name='rowid' id='rowid' >
                            <input type='submit' name='updatebtn' value='Update'>
                            <input type='submit' name='deletebtn' value='Delete'>
                        </td>
                    </tr>
            </form>
    <?php }?>
</body>