<div style="padding:25px">
    <div class="page-header">
        <ul class="breadcrumbs" style="border: none;padding-left: 0px;margin-left: 0px;">
            <li class="nav-home"><a href="dashboard.php"><i class="flaticon-home"></i></a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=EPins/Generate">Sub Category</a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=EPins/Generate">Edit Sub Category</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Edit Category</div>
                </div>
                <div class="card-body">
                    <?php
                        if (isset($_POST['btnGenerate'])) {
                            
                            $error=0;
                            
                            if (strlen(trim($_POST['SubCategoryName']))==0) {
                                $error++;
                                $errormsg = "Please Enter Sub Category Name";
                            }
                            
                            if ($error==0) {
                                
                                $filename = strtolower(time().$_FILES['image']['name']);
                                if (isset($_FILES['image']['name'])) {
                                    if (move_uploaded_file($_FILES['image']['tmp_name'],"assets/products/".$filename))     {
                                        $mysql->execute("update _tbl_shopping_subcategories set SubCategoryImage='".$filename."'  where SubCategoryCode='".$_GET['code']."'");
                                    }
                                }
                                //CategoryCode
                                 $data = $mysql->select("select * from _tbl_shopping_categories where CategoryCode='".$_POST['CategoryCode']."'"); 
                                  
                                $mysql->execute("update _tbl_shopping_subcategories set 
                                        CategoryCode     ='". $data[0]['CategoryCode']."',
                                        CategoryName     ='". $data[0]['CategoryName']."',
                                        `SubCategoryName`='".$_POST['SubCategoryName']."', 
                                        `Description`='".$_POST['Description']."',`IsActive`='".$_POST['IsActive']."' where `SubCategoryCode`='".$_GET['code']."'");
                                unset($_POST);
                                echo '<script>swal({text: "Sub Category updated successfully",  icon: "succes",  button: "Ok!"});</script>';
                                
                            } else {
                                echo '<script>swal({text: "'.$errormsg.'",icon: "error",button: "Ok!"});</script>';
                            }
                        }
                        $data = $mysql->select("select * from _tbl_shopping_subcategories where SubCategoryCode='".$_GET['code']."'");
                    ?>
                    <form action="" method="post" id="generatepin" enctype="multipart/form-data">
                        <div class="tablesaw-bar tablesaw-mode-stack"></div> 
                        <div class="form-actions">
                            <div class="form-group user-test" id="user-exists">
                                <label>Sub Category Code</label>
                                <input type="text"   value="<?php echo $data[0]['SubCategoryCode'];?>" class="form-control"  disabled="disabled">
                            </div>
                        </div>
                        <div class="form-actions">
                            <div class="form-group user-test" id="user-exists">
                                <label>Sub Category Name</label>
                                <input type="text" name="SubCategoryName" id="SubCategoryName" value="<?php echo isset($_POST['SubCategoryName']) ? $_POST['SubCategoryName'] : $data[0]['SubCategoryName'];?>" class="form-control" placeholder="Category Name" required="required">
                                <div class="help-block" style="color:red" style="display:block"></div>
                           </div>
                        </div>
                        <div class="form-actions">
                            <div class="form-group user-test" id="user-exists">
                                <label>Main Category</label>
                                <select name="CategoryCode" id="CategoryCode"  class="form-control">
                                <?php
                                        $packages = $mysql->select("select * from _tbl_shopping_categories ");
                                        foreach($packages as $p) {
                                ?>
                                <option value="<?php echo $p['CategoryCode'];?>" <?php echo ($data[0]['CategoryCode']==$p['CategoryCode']) ? ' selected="selected" ':"";?>><?php echo $p['CategoryName'];?></option>
                                <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-actions">
                            <div class="form-group user-test" id="user-exists">
                                <label>Image <span style="color:#888;font-size:11px">(size: 250px X 250px)</span></label>
                                <div>
                                    <img src="assets/products/<?php echo $data[0]['SubCategoryImage'];?>" style="height:250px;"><br>
                                    <input type="file" name="image">
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <div class="form-group user-test" id="user-exists">
                                <label>Description</label>
                                <input type="text" name="Description" id="Description" value="<?php echo isset($_POST['Description']) ? $_POST['Description'] : $data[0]['Description'];?>" class="form-control" placeholder="Description" required="required">
                                <div class="help-block" id="payamt" style="display:block"></div>
                                <div class="help-block" style="color:red" style="display:block"></div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <div class="form-group user-test" id="user-exists">
                                <label>Is Active</label>
                                <select name="IsActive">
                                    <option value="1" <?php echo ($data[0]['IsActive']==1) ? " selected='selected' " : "";?> >Active </option>
                                    <option value="0" <?php echo ($data[0]['IsActive']==0) ? " selected='selected' " : "";?> >Deactive</option>
                                </select>
                                <div class="help-block" id="payamt" style="display:block"></div>
                                <div class="help-block" style="color:red" style="display:block"></div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <div class="text-right">
                                <a href="dashboard.php?action=Products/ManageCategories">List Of Categories</a>&nbsp;
                                <a href="dashboard.php?action=Products/ManageCategories" class="btn btn-danger">Cancel</a>&nbsp;
                                <button type="submit" class="btn btn-primary block-default" name="btnGenerate">Update Category</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>