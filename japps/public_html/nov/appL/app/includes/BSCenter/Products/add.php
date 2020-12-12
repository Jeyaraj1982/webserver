   
 <?php 
    function getProuctCode() {
                           global $mysql;
                           $c = $mysql->select("select * from _tbl_products");
                           return "C".str_pad((sizeof($c)+1),5,"0",STR_PAD_LEFT );;
                       }
                       
                       if (isset($_POST['btnsubmit'])) {
                            $error=0;
                            
                            if (strlen(trim($_POST['ProductName']))==0) {
                                $error++;
                                $errormsg = "Please Enter Product Name";
                            }
                            if (strlen(trim($_POST['ProductPrice']))==0) {
                                $error++;
                                $errormsg = "Please Enter Product Price";
                            }
                            if(!($_POST['ProductPrice']>$_POST['OfferPrice'])) {
                                $error++;
                                $errormsg = "Offer Price Must Less than Regular Price";
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
                                  
                               
                               $id = $mysql->insert("_tbl_products",array("ProductCode"      => getProuctCode(),
                                                                          "ProductName"      => $_POST['ProductName'],
                                                                          "ProductShortDesc" => $_POST['ProductShortDesc'],
                                                                          "ProductPrice"     => $_POST['ProductPrice'],
                                                                          "OfferPrice"       => $_POST['OfferPrice'],
                                                                          "ProductImage"     => $filename,
                                                                          "IsActive"         => "1",
                                                                          "StoreID"          => $_SESSION['User']['SupportingCenterAdminID'],
                                                                          "AddedOn"          => date("Y-m-d H:i:s")));
                       ?>
                            <script>
                                $(document).ready(function() {
                                    swal("Product Added successfully", {
                                        icon : "success" 
                                    });
                                });  
                                </script>
                       <?php
                            unset($_POST);
                       } else {
                       ?>
                            <script>
                                $(document).ready(function() {
                                    swal("<?php echo $errormsg;?>", {
                                        icon : "error" 
                                    });
                                }); 
                            </script>
                       <?php
                            }
                       }                                                                                           
                    ?>
<div style="padding:25px">
    <div class="page-header">
        <ul class="breadcrumbs" style="border: none;padding-left: 0px;margin-left: 0px;">
            <li class="nav-home"><a href="dashboard.php"><i class="flaticon-home"></i></a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Products/add">Products</a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Products/add">Add Products</a></li>
        </ul>
    </div> 
    <form action="" method="post" enctype="multipart/form-data">    
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="m-b-0 text-orange "><i class="mdi mdi-account-multiple-plus  p-r-10"></i>Add Products</h4>
                </div>
                    <div class="form-body">
                        <div class="card-body"> 
                            <div class="row">
                                <div class="col-md-6 ">
                                    <div class="form-group user-test" id="user-exists">
                                        <label>Product Name<span style="color:red">*</span></label>
                                        <input type="text" name="ProductName" id="ProductName" value="<?php echo isset($_POST['ProductName']) ? $_POST['ProductName'] : "";?>" class="form-control" placeholder="Product Name" required="required">
                                        <div class="help-block"></div>
                                        <div class="help-block" style="color:red;font-size:12px"><p class="error" id="ErrProductName"><?php echo isset($ErrProductName)? $ErrProductName : "";?></p></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 ">
                                    <div class="form-group user-test" id="user-exists">
                                        <label>Image <span style="color:#888;font-size:11px">(size: 250px X 250px)</span><span style="color:red">*</span></label>
                                        <input type="file" name="image">
                                        <div class="help-block"></div>
                                        <div class="help-block" style="color:red;font-size:12px"><p class="error" id="Errimage"><?php echo isset($Errimage)? $Errimage : "";?></p></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 ">
                                    <div class="form-group user-test" id="user-exists">
                                        <label>Regular Product Price<span style="color:red">*</span></label>
                                        <input type="text" name="ProductPrice" id="ProductPrice" value="<?php echo isset($_POST['ProductPrice']) ? $_POST['ProductPrice'] : "";?>" class="form-control" placeholder="Product Price" required="required">
                                        <div class="help-block"></div>
                                        <div class="help-block" style="color:red;font-size:12px"><p class="error" id="ErrProductPrice"><?php echo isset($ErrProductPrice)? $ErrProductPrice: "";?></p></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 ">
                                    <div class="form-group user-test" id="user-exists">
                                        <label>Wintogether Offer Price<span style="color:red">*</span></label>
                                        <input type="text" name="OfferPrice" id="OfferPrice" value="<?php echo isset($_POST['OfferPrice']) ? $_POST['OfferPrice'] : "";?>" class="form-control" placeholder="Offer Price" required="required">
                                        <div class="help-block"></div>
                                        <div class="help-block" style="color:red;font-size:12px"><p class="error" id="ErrOfferPrice"><?php echo isset($ErrOfferPrice)? $ErrOfferPrice: "";?></p></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 ">
                                    <div class="form-group user-test" id="user-exists">
                                        <label>Short Description<span style="color:red">*</span></label>
                                        <textarea name="ProductShortDesc" id="ProductShortDesc" class="form-control"><?php echo isset($_POST['ProductShortDesc']) ? $_POST['ProductShortDesc'] : "";?></textarea>
                                        <div class="help-block"></div>
                                        <div class="help-block" style="color:red;font-size:12px"><p class="error" id="ErrProductShortDesc"><?php echo isset($ErrProductShortDesc)? $ErrProductShortDesc: "";?></p></div>
                                    </div>
                                </div>
                            </div>
                           
                        </div>
                        <div class="card-action">
                            <div class="row">
                                <div class="col-md-12">
                                    <input class="btn btn-warning" type="submit" name="btnsubmit" value="Save">&nbsp;
                                    <a href="dashboard.php?action=Products/list&filter=all" class="btn btn-warning btn-border">Back</a>
                                </div>                                        
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
   