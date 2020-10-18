<div style="padding:25px">
    <div class="page-header">
        <ul class="breadcrumbs" style="border: none;padding-left: 0px;margin-left: 0px;">
            <li class="nav-home"><a href="dashboard.php"><i class="flaticon-home"></i></a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=EPins/Generate">Category</a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=EPins/Generate">Add Sub Category</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Create Sub Category</div>
                </div>
                <div class="card-body">
                    <?php
                       function getSubCategoryCode() {
                           global $mysql;
                           $c = $mysql->select("select * from _tbl_shopping_subcategories");
                           return "SC".str_pad((sizeof($c)+1),4,"0",STR_PAD_LEFT );;
                       }     
                        
                       
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
                                       $filename = $filename;
                                   } else {
                                        $filename = "";
                                   }
                               } else {
                                   $filename = "";
                               }
                               $data = $mysql->select("select * from _tbl_shopping_categories where CategoryCode='".$_POST['CategoryCode']."'");            
                               $id = $mysql->insert("_tbl_shopping_subcategories",array("CategoryCode"     => $data[0]['CategoryCode'],
                                                                                        "CategoryName"     => $data[0]['CategoryName'],
                                                                                        "SubCategoryCode"  => getSubCategoryCode(),
                                                                                        "SubCategoryName"  => $_POST['SubCategoryName'],
                                                                                        "Description"      => $_POST['Description'],
                                                                                        "SubCategoryImage" => $filename,
                                                                                        "IsActive"         => "1",
                                                                                        "AddedOn"          => date("Y-m-d H:i:s")));
                                
                               unset($_POST);
                               echo '<script>swal({text: "SubCategory added successfully",icon: "succes",button: "Ok!"});</script>';
                           } else { 
                               echo '<script>swal({text: "'.$errormsg.'",icon: "error",button: "Ok!"});</script>';
                           }
                       }                                                                                           
                    ?>
                    <form action="" method="post" id="generatepin" enctype="multipart/form-data">
                        <div class="tablesaw-bar tablesaw-mode-stack"></div> 
                        <div class="form-actions">
                            <div class="form-group user-test" id="user-exists">
                                <label>Main Category</label>
                                <select name="CategoryCode" id="CategoryCode"  class="form-control">
                                <?php
                                        $packages = $mysql->select("select * from _tbl_shopping_categories ");
                                        foreach($packages as $p) {
                                ?>
                                <option value="<?php echo $p['CategoryCode'];?>" <?php echo (isset($_POST['CategoryCode']) && $_POST['CategoryCode']==$p['CategoryCode']) ? ' selected="selected" ':"";?>><?php echo $p['CategoryName'];?></option>
                                <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-actions">
                            <div class="form-group user-test" id="user-exists">
                                <label>Sub Category Name</label>
                                <input type="text" name="SubCategoryName" id="SubCategoryName" value="<?php echo isset($_POST['SubCategoryName']) ? $_POST['SubCategoryName'] : "";?>" class="form-control" placeholder="Sub Category Name" required="required">
                                <div class="help-block" style="color:red" style="display:block"></div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <div class="form-group user-test" id="user-exists">
                                <label>Image <span style="color:#888;font-size:11px">(size: 250px X 250px)</span></label>
                                <div><input type="file" name="image"></div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <div class="form-group user-test" id="user-exists">
                                <label>Description</label>
                                <input type="text" name="Description" id="Description" value="<?php echo isset($_POST['Description']) ? $_POST['Description'] : "";?>" class="form-control" placeholder="Description" required="required">
                                <div class="help-block" style="color:red" style="display:block"></div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <div class="text-right">
                                <a href="dashboard.php?action=Products/ManageSubCategories">List Of Sub Categories</a>&nbsp;
                                <a href="dashboard.php?action=Products/ManageCategories" class="btn btn-danger">Cancel</a>&nbsp;
                                <button type="submit" class="btn btn-primary block-default" name="btnGenerate">Create Sub Category</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
            
                
