<script src="./../../assets/js/jquery-1.7.2.js"></script>
<link rel="stylesheet" href="./../../assets/css/demo.css"> 
<body style="margin:0px;">   
<?php 
include_once("../../config.php");

    $obj = new CommonController();  
            if (!($obj->isLogin())){
                echo $obj->printError("Login Session Expired. Please Login Again");
                exit;
            }
     
      if (isset($_POST{"viewbtn"})){
           
      $pageContent = JSubscriber::getSubscriber($_POST['rowid']);
       ?> 
      <div class="titleBar">View Subscriber</div>
       <table  style="width:100%;font-size:12px;font-family:'Trebuchet MS';color:#333" cellpadding="3" cellspacing="0" align="center">
        <tr>
            <td style="width:150px">Subscriber Name</td> 
            <td><?php echo $pageContent[0]['subscribname'];?></td>
        </tr>
        <tr>
            <td>Subscriber Mobile Number</td> 
            <td><?php echo $pageContent[0]['subscribmob'];?></td>
        </tr>
        <tr>
            <td>Subscriber Email Address</td> 
            <td><?php echo $pageContent[0]['subscribemail'];?></td>
        </tr>
        <tr>
            <td>Others</td> 
            <td><?php echo $pageContent[0]['others'];?></td>
        </tr>
        <tr>
            <td>PostedOn</td>
            <td><?php echo $pageContent[0]['postedon'];?></td>
        </tr>
       </table>
                <form action='managesubscriber.php' method='post' style='height:0px;'>
                    <input type='hidden' value='<?php echo $pageContent[0]['subscribid'];?>' name='rowid' id='rowid' >
                    <input style='font-size:11px;' type='submit' name='editbtn' value='Edit'>
                    <input style='font-size:11px;' type="button" name="cancelbtn" value="Cancel" bgcolor="grey" onclick="location.href='viewsubscriber.php'"> 
                </form>     
       <?php
       exit;
      }
      if(isset($_POST{"cdeletebtn"})){
          
       $pageContent = JSubscriber::getSubscriber($_POST['rowid']); 
       echo CommonController::printSuccess("Deleted Successfully");
       echo "<script>setTimeout(\"window.open('viewsubscriber.php','rpanel')\",1500);</script>"; 
      }
      
      if (isset($_POST{"deletebtn"})){
          
       $pageContent = JSubscriber::getSubscriber($_POST['rowid']);
       ?>
      <div class="titleBar">Delete Subscriber</div>
       <form action='' method="post" >
       <table  style="width:100%;font-size:12px;font-family:'Trebuchet MS';color:#333" cellpadding="3" cellspacing="0" align="center">
         <tr>
            <td style="width:150px">Subscriber Name</td> 
            <td><?php echo $pageContent[0]['subscribname'];?></td>
        </tr>
         <tr>
            <td>Subscriber Mobile Number</td> 
            <td><?php echo $pageContent[0]['subscribmob'];?></td>
        </tr>
         <tr>
            <td>Subscriber Email Address</td> 
            <td><?php echo $pageContent[0]['subscribemail'];?></td>
        </tr>
         <tr>
            <td>Others</td> 
            <td><?php echo $pageContent[0]['others'];?></td>
        </tr>
        <tr>
            <td>PostedOn</td>
            <td><?php echo $pageContent[0]['postedon'];?></td>
        </tr>
       </table>
       <input type="hidden" name="rowid" value="<?php echo $pageContent[0]['subscribid'];?>"> 
       <input type="submit" value="Delete" name="cdeletebtn">
       <input type="button" name="cancelbtn" value="Cancel" bgcolor="grey" onclick="location.href='viewsubscriber.php'"> 
       </form>
       <?php } ?>
</body>
