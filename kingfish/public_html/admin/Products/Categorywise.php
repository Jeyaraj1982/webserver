
<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" style="padding-top:10px;padding-bottom:10px">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card-title">
                                        Products Category Wise
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                 <table class="table table-striped mt-3">
                                        <thead>
                                            <tr>
                                                <th scope="col">Category</th>
                                                <th scope="col">Products</th>
                                                <th scope="col"> </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $categories = $mysql->select("select * from _tbl_product_categories order by CategoryID Desc");?>
                                        <?php 
                                            foreach($categories as $category){
                                            $product= $mysql->Select("SELECT COUNT(ProductID) AS cnt FROM _tbl_products where CategoryID='".$category['CategoryID']."'");
                                        ?>
                                            <tr>                                                      
                                                <td><?php echo $category['CategoryName'];?></td>
                                                <td><?php echo $product[0]['cnt'];?></td>
                                                <td style="text-align: right"><a href="dashboard.php?action=Products/viewproducts&id=<?php echo md5($category['CategoryID']);?>">View Products</a></td>
                                            </tr>
                                        <?php } ?>
                                        
                                        </tbody>
                                    </table>
                            </div>
                        </div>
                    </div>                                                                                             
                </div>
            </div>
        </div>
    </div>
</div>


