<?php include_once("../../config.php");

    if (!(CommonController::isLogin())){
            echo CommonController::printError("Login Session Expired. Please Login Again");
            exit;
        }


   if (isset($_POST{"save"})) {
        
      if(CommonController::isEmptyField($_POST['subscribername']) || CommonController::isEmptyField($_POST['subscriberemail'])||CommonController::isEmptyField($_POST['subscribermobile'])) {
               echo CommonController::printError ("All Fields are Required"); 
        } 
         
      else if(JSubscriber::addSubscriber($_POST['subscribername'],$_POST['subscriberemail'],$_POST['subscribermobile'],$_POST['others'])>0){
                echo  CommonController::printSuccess("Subscriber added successfully");        
        } else {
                echo CommonController::printError("Error Adding Subscriber"); 
        }      
}
?>
<body style="margin:0px;">
<div style='font-family:arial;font-size:13px;border:1px solid #ccc;background:#ccc;padding:3px;font-weight:bold;color:#444;'>Add Subscribers</div>
    <form action="" method="post" style="height: 20px;" enctype="multipart/form-data">
        <table  style="margin:10px;width:100%;font-size:12px;font-family:arial;color:#333" cellpadding="3" cellspacing="0" align="center">
                <tr>
                     <td style="width:150px;">Name</td>
                     <td><input type="text" name="subscribername" style="width:250px;"><br></td> 
               </tr>
               <tr>
                     <td style="width:150px;">Email Id</td>
                     <td><input type="text" name="subscriberemail" style="width:250px;"><br></td>  
               </tr>
              <tr>
                     <td style="width:150px;">Mobile No.</td>
                     <td><input type="text" name="subscribermobile" style="width:250px;"><br></td>  
              </tr>
              <tr>
                     <td style="width:150px;">Others</td>
                     <td><input type="text" name="others" style="width:250px;"><br></td>  
              </tr>
               <tr>
                    <td align="left"><input type="submit" name="save" value="Save" bgcolor="grey">
                    <input type="button" name="cancel" value="Cancel" bgcolor="grey" onclick="location.href='managesubscribers.php'"></td>
               </tr> 
        </table>
    </form>
</body>