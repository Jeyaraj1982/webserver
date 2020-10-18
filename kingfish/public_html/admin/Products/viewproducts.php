<?php
include_once("header.php");
include_once("LeftMenu.php"); 
$data= $mysql->Select("select * from _tbl_products where md5(ProductID)='".$_GET['id']."'");
$category= $mysql->Select("select * from _tbl_product_categories where md5(CategoryID)='".$_GET['id']."'");
?>
        <div class="main-panel">
            <div class="container">
                <div class="page-inner">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">Products (<?php echo $category[0]['CategoryName'];?>)</div>
                                </div>
                                    <div class="card-body">
                                        <div class="table-responsive">
                                            <table class="table table-striped mt-3">
                                                <thead>
                                                    <tr>
                                                        <th scope="col"></th>
                                                        <th scope="col">Category</th>
                                                        <th scope="col">Product Name</th>
                                                        <th scope="col">Price</th>
                                                        <th scope="col">Added On</th>
                                                        <th scope="col"> </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php $products = $mysql->select("select * from _tbl_products where CategoryID='".$category[0]['CategoryID']."' order by ProductID Desc");?>
                                                <?php foreach($products as $product){
                                                    $category= $mysql->Select("select * from _tbl_product_categories where CategoryID='".$product['CategoryID']."'");
                                                ?>
                                                    <tr>
                                                        <td><img src="https://kingfish.in/uploads/<?php echo $product['filepath1'];?>" style='width: 50px;height:50px;margin-top: 5px;'></td>
                                                        <td><?php echo $category[0]['CategoryName'];?></td>
                                                        <td><?php echo $product['ProductName'];?></td>
                                                        <td><?php echo $product['ProductPrice'];?></td>
                                                        <td><?php echo $product['AddedOn'];?></td>                                                                                                                                                                                                                                                       
                                                        <td style="text-align: right"><a href="dashboard.php?action=Products/edit&f=2&id=<?php echo md5($product['ProductID']);?>">Edit</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="dashboard.php?action=Products/view&f=2&id=<?php echo md5($product['ProductID']);?>">View</a>&nbsp;&nbsp;|&nbsp;&nbsp;<span onclick='CallConfirmation(<?php echo $product['ProductID'];?>)' class='btn btn-danger btn-sm' style='padding: 0px 10px;font-size: 10px;'>Delete</span></td>
                                                    </tr>
                                                <?php } ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="card-action">
                                        <div class="row">
                                            <div class="col-md-12">                                  
                                                <a href="https://kingfish.in/admin/dashboard.php?action=Products/Categorywise" class="btn btn-warning">Back</a>
                                            </div>                                        
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <?php include_once("footer.php");?>