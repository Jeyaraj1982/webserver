<?php
  include_once("apiconfig.php");
 

    if (isset($_POST['addstore'])) {
        
        $productimage = "";
     
        if ($_FILES["file"]["error"] > 0) {
            
            echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
  
        } else {
    
            
            $filename = time()."_".$_FILES["file"]["name"];
            $filename = strtolower(str_replace(" ","",$filename));
            
            if (move_uploaded_file($_FILES["file"]["tmp_name"],"assets/stores/".$filename )) {
                
                $id = $mysql->insert("astores",array("storename"=>$_POST['storename'],
                                                       "storeaddress"=>str_replace("'","\'",$_POST['storeaddress']),
                                                       "addedon"=>date("Y-m-d H:i:s"),
                                                       "isavailable"=>"1",
                                                       "latitude"=>$_POST['latitude'],
                                                       "longitude"=>$_POST['longitude'],
                                                       "storeimage"=>$filename));
                if ($id>0)  {
                    echo "Store Details Added Successfully";
                } else {
                    echo "error adding Store";
                }
            
            } else {
                echo "Error";
            }
        }
    }
    
?>

<form action="" method="post"  enctype="multipart/form-data">
<table>
    <tr>
        <td>Store Name</td>
        <td><input type="text" name="storename" style="width:500px;"></td>
    </tr>  <tr>
        
    <tr>
        <td>Store Address</td>
        <td><textarea style="width:500px;height:200px;" name="storeaddress"></textarea></td>
    </tr>
    <td> Latitude</td>
        <td><input type="text" name="latitude" style="width:500px;"></td>
    </tr>  <td> Longitude</td>
        <td><input type="text" name="longitude" style="width:500px;"></td>
    </tr>
     <tr>
      <td>Store Image</td>  
    <td><input type="file" name="file" id="file" /></td>
</tr>
    <tr>
        <td colspan="2"><input type="submit" value="Add Store" name="addstore"</td>
    </tr>
</table>
</form> 
