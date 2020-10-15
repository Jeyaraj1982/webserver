 <div style="padding:25px">
    <div class="page-header">
        <ul class="breadcrumbs" style="border: none;padding-left: 0px;margin-left: 0px;">
            <li class="nav-home"><a href="dashboard.php"><i class="flaticon-home"></i></a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=EPins/Generate">Category</a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=EPins/Generate">Add Category</a></li>
        </ul>
    </div>
           <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Create Category</div>
                </div>
                <div class="card-body">
                    <?php
                       function getCategoryCode() {
                           global $mysql;
                           $c = $mysql->select("select * from _tbl_shopping_categories");
                           return "C".str_pad((sizeof($c)+1),4,"0",STR_PAD_LEFT );;
                       }
                       
                       if (isset($_POST['btnGenerate'])) {
                            $error=0;
                            
                            if (strlen(trim($_POST['CategoryName']))==0) {
                                $error++;
                                $errormsg = "Please Enter Category Name";
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
                                  
                                  
                               
                                $id = $mysql->insert("_tbl_shopping_categories",array("CategoryCode"  => getCategoryCode(),
                                                                                      "CategoryName"  => $_POST['CategoryName'],
                                                                                      "Description"   => $_POST['Description'],
                                                                                      "CategoryImage" => $filename,
                                                                                      "IsActive"      => "1",
                                                                                      "AddedOn"       => date("Y-m-d H:i:s")));
                                                                                      ?>
                                                                                             <script>
                                                 //title: "Good job!",
                                                 swal({
  
  text: "Category added successfully",
  icon: "succes",
  button: "Ok!",
});
                                                 </script>
                                                                                      <?php
                                                                                      unset($_POST);
                                        } else {
                                            ?>
                                                 <script>
                                                 //title: "Good job!",
                                                 swal({
  
  text: "<?php echo $errormsg;?>",
  icon: "error",
  button: "Ok!",
});
                                                 </script>
                                            <?php
                                        }
                                    }                                                                                           
                                ?>
                                <form action="" method="post" id="generatepin" enctype="multipart/form-data">
                                    <div class="tablesaw-bar tablesaw-mode-stack"></div> 
                                     
                          
                                     <div class="form-actions">
                                        <div class="form-group user-test" id="user-exists">
                                            <label>Category Name</label>
                                            <input type="text" name="CategoryName" id="CategoryName" value="<?php echo isset($_POST['CategoryName']) ? $_POST['CategoryName'] : "";?>" class="form-control" placeholder="Category Name" required="required">
                                            <div class="help-block" id="payamt" style="display:block"></div>
                                            <div class="help-block" style="color:red" style="display:block"></div>
                                            
                                            <div class="help-block"><p class="error" id="username-exists"></p></div>
                                        </div>
                                    </div>
                                      <div class="form-actions">
                                        <div class="form-group user-test" id="user-exists">
                                            <label>Image <span style="color:#888;font-size:11px">(size: 250px X 250px)</span></label>
                                            <div>
                                                <input type="file" name="image">
                                            </div>
                                            <div class="help-block" style="color:red" style="display:block"></div>
                                            <div class="help-block"><p class="error" id="username-exists"></p></div>
                                        </div>
                                    </div>
                                      <div class="form-actions">
                                        <div class="form-group user-test" id="user-exists">
                                            <label>Description</label>
                                            <input type="text" name="Description" id="Description" value="<?php echo isset($_POST['Description']) ? $_POST['Description'] : "";?>" class="form-control" placeholder="Description" required="required">
                                            <div class="help-block" id="payamt" style="display:block"></div>
                                            <div class="help-block" style="color:red" style="display:block"></div>
                                            
                                            <div class="help-block"><p class="error" id="username-exists"></p></div>
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <div class="text-right">
                                            <a href="dashboard.php?action=Products/ManageCategories">List Of Categories</a>&nbsp;
                                            <a href="dashboard.php?action=Products/ManageCategories" class="btn btn-danger">Cancel</a>&nbsp;
                                            <button type="submit" class="btn btn-primary block-default" name="btnGenerate">Create Category</button>
                                        </div>
                                    </div>
                                   
                                </form>
                           
                 
                 </div>
                        </div>
                    </div>
                </div>
            </div>
            
                
