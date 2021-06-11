<?php include_once("../../config.php"); ?>
<style>
 .mytr:hover{background:#f1f1f1;cursor:pointer}
 </style>
<body style="margin:0px;">
  <div style='font-family:arial;font-size:13px;border:1px solid #ccc;background:#ccc;padding:3px;font-weight:bold;color:#444;'>Edit Menu Page</div>
<?php 
    
        
             if (!($obj->isLogin())){
                    echo $obj->printError("Login Session Expired. Please Login Again");
                    exit;
             } 
             if(isset($_POST{"cdeletebtn"})) {
                 MenuItems::deleteMenu($_POST['rowid']);
                 echo CommonController::printSuccess("deleted Successfully");
                 echo "<script>setTimeout(\"window.open('editmenuitem.php','rpanel')\",1500);</script>";  
             }
       
            if (isset($_POST{"deletebtn"})){
                $pageContent = MenuItems::getMenu($_POST['rowid']);
       
       ?>
       <form action='' method="post">
       <table style="margin:10px;width:100%;font-size:12px;font-family:arial;color:#333" cellpadding="3" cellspacing="0" align="center">
       <tr> 
            <td style="width:150px">Menu Name</td>
            <td><?php echo $pageContent[0]['menuname'];?></td>
        </tr>
        <tr>
            <td>Linked Page To</td>
            <td><?php echo $pageContent[0]['pageid'];?></td> 
        </tr>
        <tr> 
            <td>Menu Position</td>
            <td><?php echo $pageContent[0]['isheader'];?></td>
        </tr>
        <tr> 
           <td> 
                <select name="target">
                    <option value='1' <?php echo ($pageContent[0]["target"]) ? 'selected="selected"' : '';?>>New Page</option>
                    <option value='0' <?php echo ($pageContent[0]["target"]!=1) ? 'selected="selected"' : '';?>>Self</option>
                </select>
            </td>
        </tr>
        <tr> 
            <td>Custom Page Link</td>
            <td><?php echo $pageContent[0]['customurl'];?></td>
        </tr>
       </table>
       <input type="hidden" name="rowid" value="<?php echo $pageContent[0]['menuid'];?>"> 
       <input type="submit" value="Delete" name="cdeletebtn">
       <input type="button" name="cancelbtn" value="Cancel" bgcolor="grey" onclick="location.href='editmenuitem.php'"> 
      </form>
       <?php
       exit;  
        }
        
    if (isset($_POST{"updatebtn"})){
            $param=array("menuid"=>$_POST['rowid'],"menuname"=>$_POST['menuname'],"pagenameid"=>$_POST['pagenameid'],"isHeader"=>$_POST['isHeader'],"orderf"=>$_POST['orderf'],"target"=>$_POST['target'],"customurl"=>$_POST['customurl']);
             MenuItems::updateMenu($param,$_POST['rowid']);
             echo CommonController::printSuccess("Updated Successfully");
             echo "<script>setTimeout(\"window.open('editmenuitem.php','rpanel')\",1500);</script>"; 
         }
         
          echo "<table  cellspacing='3' cellspadding='0' width='100%'>";
          echo "<tr><td>Menu Name</td><td>Page Title</td><td>Menu Order</td><td>Target Page</td><td>Custom Page Link</td><td>Order Status</td></tr>";

  $result=$mysql->select("select * from _jmenu order by orderf");
   
    foreach ($result as $r)
    {
    ?>
            <form action='' method='post' style="height: 15px;"> 
                    <tr class="mytr">
                        <td style='width:150px;'>
                            <input type="text" value="<?php echo $r["menuname"];?>" name="menuname">
                        </td>
                        <td style='width:150px;'>
                            <select style="width:250px;" name="pagenameid" id="pagenameid">
                                <?php foreach(JPages::getPages() as $page) {?>
                                <option value="<?php echo $page['pageid'];?>" <?php echo($page['pageid']==$r['pageid']) ? 'selected="selected"':'';?> ><?php echo $page['pagetitle'];?>             </option>
                                <?php } ?>
                            </select>
                        </td>
                        <td> 
                            <select name="isHeader">
                                <option value='1' <?php echo ($r["isheader"]) ? 'selected="selected"' : '';?>>Header</option>
                                <option value='0' <?php echo ($r["isheader"]!=1) ? 'selected="selected"' : '';?>>Footer</option>
                            </select>
                        </td>
                        <td> 
                            <select name="target">
                                <option value='1' <?php echo ($r["target"]) ? 'selected="selected"' : '';?>>Self</option>
                                <option value='0' <?php echo ($r["target"]!=1) ? 'selected="selected"' : '';?>>Newpage</option>
                            </select>
                        </td>
                        <td style='width:150px;'>
                            <input type="text" value="<?php echo $r["customurl"];?>" name="customurl">
                        </td>
                        <td style='width:100px;'> 
                            <select name="orderf">
                                <?php for($i=0;$i<=sizeof($result)+1;$i++) {?>
                                    <option value='<?php echo $i;?>' <?php echo ($i==$r["orderf"]) ? 'selected="selected"' : '';?>><?php echo $i;?></option>
                                <?php } ?>
                            </select>
                        </td>
                        <td>
                            <input type='hidden' value='<?php echo $r["menuid"];?>' name='rowid' id='rowid' >
                            <input type='submit' name='updatebtn' value='Update'>
                            <input type='submit' name='deletebtn' value='Delete'>
                        </td>
                    </tr>
            </form>
    <?php }
?>
</body>