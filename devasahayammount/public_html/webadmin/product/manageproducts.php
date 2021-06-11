<?php include_once("../../config.php"); ?>
<body style="margin:0px;">
  <div style='font-family:arial;font-size:13px;border:1px solid #ccc;background:#ccc;padding:3px;font-weight:bold;color:#444;'>Manage Products</div>
 <style>
 .mytr:hover{background:#f1f1f1;cursor:pointer}
 </style>
<?php
        if (!(CommonController::isLogin())){
        echo CommonController::printError("Login Session Expired. Please Login Again");
        exit;
    }
     if(isset($_POST{"viewbtn"})){
        $product= new JProduct();
        $pageContent =$product->getProduct($_POST['rowid']);
       
       ?>
      
       <form action='' method="post">
       <table>
       
        <tr>
            <td style="width:150px">Item Name</td>
            <td><?php echo $pageContent[0]['itemname'];?></td>
        </tr>
        <tr>
            <td style="width:150px">Item Description</td>
            <td><?php echo $pageContent[0]['itemdesc'];?></td>
        </tr>
        <tr>
            <td style="width:150px">Item Price</td>
            <td><?php echo $pageContent[0]['itemprice'];?></td>
        </tr>
        <tr>
            <td style="width:150px">Is Published</td>
            <td><?php echo $pageContent[0]['ispublished'];?></td>
        </tr>
       </table>
       <input type="hidden" name="rowid" value="<?php echo $pageContent[0]['productid'];?>"> 
       <input type="submit" value="Delete" name="cdeletebtn">
       <input type="button" name="cancelbtn" value="Cancel" bgcolor="grey" onclick="location.href='manageproducts.php'"> 
         </form>
        <?php
       exit;
        }
        if(isset($_POST{"cdeletebtn"})){
            $product= new JProduct();
            echo $product->deleteProduct($_POST['rowid']); 
         ?>
            <script>
                alert("Products Deleted");
                location.href='manageproducts.php';
            </script>
        <?php
      }
       if (isset($_POST{"deletebtn"})){
             $product= new JProduct();
             $pageContent =$product->getProduct($_POST['rowid']);
       
       
       ?>
      
       <form action='' method="post">
       <table>
       
        <tr>
            <td style="width:150px">Item Name</td>
            <td><?php echo $pageContent[0]['itemname'];?></td>
        </tr>
        <tr>
            <td style="width:150px">Item Description</td>
            <td><?php echo $pageContent[0]['itemdesc'];?></td>
        </tr>
        <tr>
            <td style="width:150px">Item Price</td>
            <td><?php echo $pageContent[0]['itemprice'];?></td>
        </tr>
        <tr>
            <td style="width:150px">Is Published</td>
            <td><?php echo $pageContent[0]['ispublished'];?></td>
        </tr>
       </table>
       <input type="hidden" name="rowid" value="<?php echo $pageContent[0]['productid'];?>"> 
       <input type="submit" value="Delete" name="cdeletebtn">
       <input type="button" name="cancelbtn" value="Cancel" bgcolor="grey" onclick="location.href='manageproducts.php'"> 
         </form>
        <?php
       exit;
      }
       if(isset($_POST{"updatebtn"})){
            $product= new JProduct();                                      
            echo $product->updateProduct($_POST['itemname'],$_POST['itemdescription'],$_POST['itemprice'],$_POST['ispublished'],$_POST['rowid']);
            ?>
            <script>
                alert("Updated Successfully");
                location.href='manageproducts.php';
            </script>
            <?php
            exit;
         }
          echo "<table  cellspacing='3' cellspadding='0' width='100%' style='font-size:12px;font-family:arial;'>";
          echo "<tr><td>Item Name</td><td>Item Description</td><td>Item price</td><td>Is Published</td></tr>";

    $result=$mysql->select("select * from _jproduct");
   
    foreach ($result as $r)
    {
    ?>
    <tr class="mytr">
        <td colspan='5' style="border:1px solid #f1f1f1">
            <form action='' method='post'  >
                <table cellpadding="3" cellspacing="0" width="100%" style="font-size:12px;font-family:arial;color:#444"> 
                    <tr valign="top">
                        <td style='width:150px;' >
                            <input type="text" value="<?php echo $r["itemname"];?>" name="itemname">
                        </td>
                        <td style='width:150px;'>
                            <input type="text" value="<?php echo $r["itemdesc"];?>" name="itemdescription">
                        </td>
                        <td style='width:150px;'>
                            <input type="text" value="<?php echo $r["itemprice"];?>" name="itemprice">
                        </td>
                        <td style='width:150px;'> 
                            <select name="ispublished">
                                <option value='1' <?php echo ($r["ispublished"]) ? 'selected="selected"' : '';?>>Yes</option>
                                <option value='0' <?php echo ($r["ispublished"]!=1) ? 'selected="selected"' : '';?>>No</option>
                            </select>
                        </td>
                        <td style='width:150px;'>
                            <input type='hidden' value='<?php echo $r["productid"];?>' name='rowid' id='rowid' >
                            <input type='submit' name='viewbtn' value='View'>
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