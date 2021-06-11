<?php include_once("../../config.php"); ?>
<html>    
    <body style="margin:0px;">
        <div style='font-family:arial;font-size:13px;border:1px solid #ccc;background:#ccc;padding:3px;font-weight:bold;color:#444;'>Add Menu Page</div>
        
        <?php 
           
                $obj = new CommonController(); 
                    if (!($obj->isLogin())){
                    echo $obj->printError("Login Session Expired. Please Login Again");
                    exit;
                    }

                if (isset($_POST{"save"})) {
                    
                    if ((strlen(trim($_POST['menuname']))>=3) && ($_POST['pagenameid']>0)) { 
                        if (strlen(trim($_POST['customurl']))>0) {
                            $_POST['pagenameid']=0;
                        }
                        $param=array("menuname"=>$_POST['menuname'],"pagenameid"=>$_POST['pagenameid'],"isHeader"=>$_POST['isHeader'],"target"=>$_POST['target'],"customurl"=>$_POST['customurl']);               
                        echo (MenuItems::addMenu($param)>0) ? $obj->printSuccess("New Menu Added Successfully") : $obj->printError("Error Occured  Adding New Menu");       
                    } else {
                        echo $obj->printError("Error Occured Processing Input Values");    
                    }
               } 
        ?>
        
        <form action="" method="post" style="height: 20px;">
            <table style="margin:10px;width:100%;font-size:12px;font-family:arial;color:#333" cellpadding="3" cellspacing="0" align="center">
                <tr>
                    <td style="width:150px;">&nbsp;Menu Name</td>
                    <td><input type="text" name="menuname" style="width:250px;"></td> 
                </tr>
                <tr>
                    <td>&nbsp;Linked Page To</td>
                    <td>
                        <select style="width:250px;" name="pagenameid" id="pagenameid">
                            <?php foreach(JPages::getPages() as $page) {?>
                            <option value="0">No Page</option>
                            <option value="<?php echo $page['pageid'];?>"><?php echo $page['pagetitle'];?></option>
                            <?php } ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td>&nbsp;Target</td>
                    <td>
                        <select style="width:100px;" name="target" id="target">
                         <option value="0">Self Window</option>
                         <option value="1">New Window</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td style="width:150px;">&nbsp;Custom Page Link</td>
                    <td>http://<input type="text" name="customurl"  style="width:220px;"></td> 
                </tr>
                <tr>
                    <td>&nbsp;Menu Position </td> 
                    <td style="width:1150px;">
                        <select name="isHeader">
                            <option value="1">Header</option>
                            <option value="0">Footer</option>
                        </select>
                    </td> 
                </tr>
                <tr>
                    <td colspan="2"><input type="submit" name="save" value="Save Menu" bgcolor="grey"></td>
                </tr>
            </table>
        </form>
    </body>
</html>