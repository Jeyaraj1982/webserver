<?php 
include_once("../../config.php");
    
    $obj = new CommonController();
    
    if (!($obj->isLogin())){
        echo $obj->printError("Login Session Expired. Please Login Again");
        exit;
    }  
  
    if (isset($_POST{"save"})) {
        
        $param = array("date"       => $_POST['datepicker'],
                       "title"      => $_POST['title'],
                       "details"     => str_replace("'","\\'",$_POST['details']),
                       "title_t"      => $_POST['title_t'],
                       "details_t"     => str_replace("'","\\'",$_POST['details_t']
                       ));
        
        if ($obj->isEmptyField($_POST['title'])) {
            echo $obj->printError("Title Shouldn't be blank");
        }       
        if ($obj->err==0) {
            echo (JReading::addReading($param)>0) ? $obj->printSuccess("Readings added successfully") : $obj->printError("Error adding Readings"); 
        }
    }
?>
<body style="margin:0px;">
    <div style='font-family:arial;font-size:13px;border:1px solid #ccc;background:#ccc;padding:3px;font-weight:bold;color:#444;'>Add Prayer</div>
    <form action="" method="post" style="height: 20px;" enctype="multipart/form-data">
        <table cellpadding="5" cellspacing="0" align="center" style="font-family:arial;font-size:12px;color:#222;width:100%">
            <tr>
                <td>Prayer/Witness</td>
                <td><select name="prayer" style="width:250px;"><option value="0">Prayer Request</option><option value="1">Witnesses</option></select></td>
            </tr>
            <tr>
                <td style="width:150px">Request For</td> 
                <td><input type="text" name="request" style="width:250px;"></td> 
            </tr>
            <tr>
                 <td>Description</td> 
                <td><textarea name="desc" style="height: 150px;width:250px;"></textarea></td>
            </tr>
            <tr>
                <td>Name</td> 
                <td><input type="text" name="title_t" style="width:250px;"></td> 
            </tr>
            <tr>
                <td>Phone Number</td> 
                <td><input type="text" name="title_t" style="width:250px;"></td> 
            </tr>
            <tr>
                <td>Email Address</td> 
                <td><input type="text" name="title_t" style="width:250px;"></td> 
            </tr>
            <tr>
                <td>Postal Address</td> 
                <td><textarea name="address" style="height:150px;width:250px;"></textarea></td>
            </tr>            
            <tr>
                <td></td>
                <td>
                   <input type="submit" name="save" value="Save" bgcolor="grey">
                </td>
            </tr>
        </table>
    </form>
</body>
