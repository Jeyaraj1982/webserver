<?php
    if (isset($_POST['submitBtn'])) {
        $error=0;
        
        if ($_POST['MRP']=="") {
            $error++;
            $errormsg = "Please Enter Price";
        }
        if ($_POST['ProductName']=="") {
            $error++;
            $errormsg = "Please Enter Product Name";
        }
        if (!($_POST['MRP']*1>=0)) {
            $error++;
            $errormsg = "Amount must have greater than Rs.1";
        }
        if ($_POST['Points']=="") {
            $error++;
            $errormsg = "Please Enter Points";
        }
        $ProductName = $mysql->select("select * from _tbl_Members_Products where ProductName='".$_POST['ProductName']."'");
        if(sizeof($ProductName)>0){
           $error++;
            $errormsg = "Product Name Already Exists"; 
        }
        if ($error==0) {
            $id=$mysql->insert("_tbl_Members_Products",array("ProductName" => $_POST['ProductName'],                    
                                                             "MRP"         => $_POST['MRP'],                    
                                                             "DPrice"      => $_POST['DPrice'],
                                                             "Points"      => $_POST['Points']));
            ?>
            <script>
                swal("Product Added Successfully", {
                    icon:"success",
                    confirm: {value: 'Continue'}
                }).then((value) => {
                    location.href='dashboard.php?action=Products/List'
                });
            </script>
        <?php } else { ?>
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
            <li class="nav-item"><a href="dashboard.php?action=Products/New">Products</a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Products/New">Create Product</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
        <div class="card">
        <div class="card-header">
                    <div class="card-title">Create Product</div>
                </div>
            <div class="card-body">
                <form method="post" action="">
                   
                    <div class="row mb15">
                        <div class="col-md-12 col-xs-6 b-r">
                            <strong>Product Name</strong>
                            <br>
                            <input type="text" name="ProductName" id="ProductName" class="form-control" value="<?php echo isset($_POST['ProductName']) ? $_POST['ProductName'] : "";?>">
                        </div>
                    </div>
                    <div class="row mb15"> 
                        <div class="col-md-12 col-xs-6 b-r"> 
                            <strong>Price</strong>
                            <br>
                            <input type="text" name="MRP" id="MRP"  class="form-control" value="<?php echo isset($_POST['MRP']) ? $_POST['MRP'] : "";?>" >
                        </div>
                    </div>
                    <div class="row mb15"> 
                        <div class="col-md-12 col-xs-6 b-r"> 
                            <strong>Discount Price</strong>
                            <br>
                            <input type="text" name="DPrice" id="DPrice"  class="form-control" value="<?php echo isset($_POST['DPrice']) ? $_POST['DPrice'] : "";?>" >
                        </div>
                    </div>
                    <div class="row mb15"> 
                        <div class="col-md-12 col-xs-6 b-r"> 
                            <strong>Points</strong>
                            <br>
                            <input type="number" name="Points" id="Points"  class="form-control" value="<?php echo isset($_POST['Points']) ? $_POST['Points'] : "";?>" >
                        </div>
                    </div>          
                    <div class="row mb15">
                        <div class="col-md-4 col-xs-6 b-r">
                            <button type="submit" name="submitBtn" id="submitBtn" class="btn btn-purple" >Submit</button>&nbsp;&nbsp;
                            <button type="button" onclick="location.href='dashboard.php?action=Products/List'" class="btn btn-outline-purple" >Cancel</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        </div>
    </div>            
</div>
<?php include_once("footer.php"); ?>