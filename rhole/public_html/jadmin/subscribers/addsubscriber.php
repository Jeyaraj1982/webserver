<?php
include_once("../../config.php");
    
    $obj = new CommonController();
            
        if (!($obj->isLogin())){
            echo $obj->printError("Login Session Expired. Please Login Again");
            exit;
        }  
        
   if (isset($_POST{"save"})) {
       
       $param=array("subscribname"=>$_POST['subscribername'],"subscribemail"=>$_POST['subscriberemail'],"subscribmobile"=>$_POST['subscribermobile'],"others"=>$_POST['others']);
       
       if ($obj->isEmptyField($_POST['subscribername'])) {
        echo $obj->printError("SubscriberName Shouldn't be blank");
        }
        if ($obj->isEmptyField($_POST['subscriberemail'])) {
        echo $obj->printError("Subscriber Email Address Shouldn't be blank");
        } 
        if ($obj->isEmptyField($_POST['subscribermobile'])) {
        echo $obj->printError("Subscriber Mobile Number Shouldn't be blank");
        } 

        if ($obj->err==0) {
            echo (JSubscriber::addSubscriber($param)>0) ? $obj->printSuccess("Subscriber added successfully") : $obj->printError("Error adding Subscriber");
        }    
}
?>
<script src="./../../assets/js/jquery-1.7.2.js"></script>
<link rel="stylesheet" href="./../../assets/css/demo.css">
<body style="margin:0px;">
<style>
table {font-family:'Trebuchet MS';font-size:13px;color:#222;width:100%}
textarea {font-family:'Trebuchet MS';font-size:13px;color:#222;width:100%}
</style>
<div class="titleBar">Add Subscribers</div> 
    <form action="" method="post">
        <table cellpadding="5" cellspacing="0" align="center">
                <tr>
                     <td style="width:150px;">Name</td>
                     <td><input type="text" name="subscribername" style="width:250px;"></td> 
               </tr>
               <tr>
                     <td>Email Id</td>
                     <td><input type="text" name="subscriberemail" style="width:250px;"></td>  
               </tr>
              <tr>
                     <td>Mobile No.</td>
                     <td><input type="text" name="subscribermobile" maxlength="10" style="width:250px;"></td>  
              </tr>
              <tr>
                     <td>Others</td>
                     <td><input type="text" name="others" style="width:250px;"></td>  
              </tr>
               <tr>
                    <td align="left"><input type="submit" name="save" value="Save" bgcolor="grey">
                    <input type="button" name="cancel" value="Cancel" bgcolor="grey" onclick="location.href='viewsubscriber.php'"></td>
               </tr> 
        </table>
    </form>
    <script>$('#success').hide(3000);</script>
</body>