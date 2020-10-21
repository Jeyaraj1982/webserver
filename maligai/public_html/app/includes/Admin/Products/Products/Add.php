 <div style="padding:25px">
    <div class="page-header">
        <ul class="breadcrumbs" style="border: none;padding-left: 0px;margin-left: 0px;">
            <li class="nav-home"><a href="dashboard.php"><i class="flaticon-home"></i></a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=EPins/Generate">Products</a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=EPins/Generate">Add Product</a></li>
        </ul>
    </div>
           <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Create Product</div>
                </div>
                <div class="card-body">
                    <?php
                       function getProuctCode() {
                           global $mysql;
                           $c = $mysql->select("select * from _tbl_shopping_products");
                           return "C".str_pad((sizeof($c)+1),5,"0",STR_PAD_LEFT );;
                       }
                       
                       if (isset($_POST['btnGenerate'])) {
                            $error=0;
                            
                            
                            
                            if (strlen(trim($_POST['ProductName']))==0) {
                                $error++;
                                $errormsg = "Please Enter Product Name";
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
                                  
                               $subCategories = $mysql->select("select * from _tbl_shopping_subcategories where SubCategoryCode='".$_POST['SubCategoryCode']."'");    
                               
                               
                                $id = $mysql->insert("_tbl_shopping_products",array("CategoryCode"     => $subCategories[0]['CategoryCode'],
                                                                                      "CategoryName"     => $subCategories[0]['CategoryName'],
                                                                                      "CategoryCode"     => $subCategories[0]['CategoryCode'],
                                                                                      "SubCategoryCode"  => $subCategories[0]['SubCategoryCode'],
                                                                                      "SubCategoryName"  => $subCategories[0]['SubCategoryName'] ,
                                                                                      "ProductCode"      => getProuctCode(),
                                                                                      "ProductName"      => $_POST['ProductName'],
                                                                                      "ProductShortDesc" => $_POST['ProductShortDesc'],
                                                                                      "ProductLongDesc"  => $_POST['ProductLongDesc'],
                                                                                      "ProductMRP"       => $_POST['ProductMRP'],
                                                                                      "ProductPrice"     => $_POST['ProductPrice'],
                                                                                      "ProductBV"        => $_POST['ProductBV'],
                                                                                      "ProductImage"     => $filename,
                                                                                      "IsActive"         => "1",
                                                                                      "AddedOn"          => date("Y-m-d H:i:s")));
                                echo $mysql->error;
                                                                                      ?>
                                                                                             <script>
                                                 //title: "Good job!",
                                                 swal({
  
  text: "Product added successfully",
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
                                            <label>Product Name</label>
                                            <input type="text" name="ProductName" id="ProductName" value="<?php echo isset($_POST['ProductName']) ? $_POST['ProductName'] : "";?>" class="form-control" placeholder="Product Name" required="required">
                                            <div class="help-block" id="payamt" style="display:block"></div>
                                            <div class="help-block" style="color:red" style="display:block"></div>
                                            
                                            <div class="help-block"><p class="error" id="username-exists"></p></div>
                                        </div>
                                    </div>
                                    
                                      <div class="row">
                                <div class="col-md-6 ">
                                    <div class="form-group user-test" id="user-exists">
                                         <label>Category</label>
                                         <select name="SubCategoryCode" class="form-control">
                                         <?php
                                               $category_data = $mysql->select("select * from _tbl_shopping_categories where IsActive='1'");  
                                               foreach($category_data as $category) {
                                                      $subCategories = $mysql->select("select * from _tbl_shopping_subcategories where CategoryCode='".$category['CategoryCode']."'");
                                                      if (sizeof($subCategories)>0) {
                                                   ?>
                                                    <optgroup label="<?php echo $category['CategoryName'];?>">
                                                    <?php foreach($subCategories as $scategory) {
                                                        ?>
                                                        <option value="<?php echo $scategory['SubCategoryCode'];?>"><?php echo $scategory['SubCategoryName'];?></option>
                                                        <?php
                                                    } ?>
                                                   <?php
                                               }
                                               }
                                         ?>
                                       </select>      
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                       
                                    </div>
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
                                    
                                      <div class="row">
                                <div class="col-md-6 ">
                                    <div class="form-group user-test" id="user-exists">
                                         <label>MRP</label>
                                            <input type="text" name="ProductMRP" id="ProductMRP" value="<?php echo isset($_POST['ProductMRP']) ? $_POST['ProductMRP'] : "";?>" class="form-control" placeholder="ProductMRP" required="required">
                                            <div class="help-block" id="payamt" style="display:block"></div>
                                            <div class="help-block" style="color:red" style="display:block"></div>
                                            
                                            <div class="help-block"><p class="error" id="username-exists"></p></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Sale Price</label>
                                            <input type="text" name="ProductPrice" id="ProductPrice" value="<?php echo isset($_POST['ProductPrice']) ? $_POST['ProductPrice'] : "";?>" class="form-control" placeholder="ProductPrice" required="required">
                                            <div class="help-block" id="payamt" style="display:block"></div>
                                            <div class="help-block" style="color:red" style="display:block"></div>
                                            
                                            <div class="help-block"><p class="error" id="username-exists"></p></div>
                                    </div>
                                </div>
                            </div>
                            
                            
                                <div class="row">
                                <div class="col-md-6 ">
                                    <div class="form-group user-test" id="user-exists">
                                         <label>Product BV</label>
                                            <input type="text" name="ProductBV" id="ProductBV" value="<?php echo isset($_POST['ProductBV']) ? $_POST['ProductBV'] : "";?>" class="form-control" placeholder="ProductBV" required="required">
                                            <div class="help-block" id="payamt" style="display:block"></div>
                                            <div class="help-block" style="color:red" style="display:block"></div>
                                            <div class="help-block"><p class="error" id="username-exists"></p></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                       
                                    </div>
                                </div>
                            </div>
                                     
                                    
                                      <div class="form-actions">
                                        <div class="form-group user-test" id="user-exists">
                                            <label>Description</label>
                                            <input type="text" name="ProductShortDesc" id="ProductShortDesc" value="<?php echo isset($_POST['ProductShortDesc']) ? $_POST['ProductShortDesc'] : "";?>" class="form-control" placeholder="Description" required="required">
                                            <div class="help-block" id="payamt" style="display:block"></div>
                                            <div class="help-block" style="color:red" style="display:block"></div>
                                            
                                            <div class="help-block"><p class="error" id="username-exists"></p></div>
                                        </div>
                                    </div>
                                                                          <div class="form-actions">
                                        <div class="form-group user-test" id="user-exists">
                                            <label>Detailed Description</label>
                                            <textarea  name="ProductLongDesc" id="ProductLongDesc"  class="form-control" placeholder="ProductLongDesc" required="required"><?php echo isset($_POST['ProductLongDesc']) ? $_POST['ProductLongDesc'] : "";?> </textarea>
                                            <div class="help-block" id="payamt" style="display:block"></div>
                                            <div class="help-block" style="color:red" style="display:block"></div>
                                            
                                            <div class="help-block"><p class="error" id="username-exists"></p></div>
                                        </div>
                                    </div>
                                    <div class="form-actions">
                                        <div class="text-right">
                                            <a href="dashboard.php?action=Products/ManageProducts">List Of Products</a>&nbsp;
                                            <a href="dashboard.php?action=Products/ManageProducts" class="btn btn-danger">Cancel</a>&nbsp;
                                            <button type="submit" class="btn btn-primary block-default" name="btnGenerate">Create Products</button>
                                        </div>
                                    </div>
                                   
                                </form>
                           
                 
                 </div>
                        </div>
                    </div>
                </div>
            </div>
            
                
