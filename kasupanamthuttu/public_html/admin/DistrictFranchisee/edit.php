<div class="line">
    <div class="margin">
        <div class="s-12 m-6 l-3 margin-bottom">
            <div class="box">
                <?php include_once("rightmenu.php"); ?>
            </div>
        </div>
        <div class="s-12 m-6 l-9 margin-bottom">
            <div class="box">
                <h5 style="text-align: left;font-family: arial;">Edit Franchisee</h5> 
                <?php
                    if (isset($_POST['isSubmit'])) {
                        $sql = "update _admins set  
                         AdminName='".$_POST['AdminName']."', 
                         Username='".$_POST['Username']."', 
                         UserPassword='".$_POST['UserPassword']."', 
                         IsActive='".$_POST['IsActive']."' 
                        
                                  
                        
                         where md5(AdminID)='".$_REQUEST['item']."'"; 
                        $mysql->execute($sql);
                        echo "Successfully Updated";
                    }
                    $item =  $mysql->select("select * from _admins where md5(AdminID)='".$_REQUEST['item']."'");
                    $item = $item[0];
                ?>
                <form action="Franchisee_Edit?item=<?php echo $_REQUEST['item']; ?>" method="post"   enctype="multipart/form-data">
                     <table  style="font-size:12px;font-family:arial;" cellpadding="5" cellspacing="0">
                      <tr>
                            <td>State Name</td>
                            <td> <input type="text" class="form-control" value="<?php echo $item['AssignedState'];?>" disabled="disabled"></td>                                      
                        </tr> 
                        <tr>
                            <td>District Name</td>
                            <td> <input type="text" class="form-control" value="<?php echo $item['AssignedDistrict'];?>" disabled="disabled"></td>                                      
                        </tr>                                                               
                        <tr>
                            <td>Franchisee Name</td>
                            <td><input type="text" class="form-control" value="<?php echo $item['AdminName'];?>" name="AdminName"></td>
                        </tr>
                        <tr>
                            <td>Login Name</td>
                            <td><input type="text" name="Username" value="<?php echo $item['Username'];?>"  class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Password</td>
                            <td><input type="text" name="UserPassword"  value="<?php echo $item['UserPassword'];?>" class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Is Active</td>
                            <td>
                                <select name="IsActive" class="form-control">
                                    <option value="1" <?php echo $item['IsActive']==1 ? " selected='selected' " : "";?> >Active</option>
                                    <option value="0" <?php echo $item['IsActive']==0 ? " selected='selected' " : "";?> >Disable(d)</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="submit" value="Update Franchisee" name="isSubmit" class="btn btn-primary"></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>