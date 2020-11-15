<?php
$data= $mysql->Select("select * from _tbl_products where md5(ProductID)='".$_GET['id']."'");
 $q = $mysql->select("select * from _tbl_share_products_link where ProductID='".$data[0]['ProductID']."'");
?>

        <div class="main-panel">
            <div class="container">
                <div class="page-inner">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">View Product</div>
                                </div>
                                    <div class="card-body">
                                       <div class="form-group row">
                                            <div class="col-sm-4" style="text-align: center;">
                                                <div style="border: 1px solid #e6e6e6;padding: 25px;">
                                                    <img src='../assets/products/<?php echo $data[0]['ProductImage'];?>' style='width: 64px;margin-top: 5px;'>
                                                </div>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="form-group form-show-validation row">
                                                    <div class="col-sm-12" style="padding-left:0px"><h4><?php echo $data[0]['ProductName'];?></h4></div>
                                                </div> 
                                                <div class="form-group form-show-validation row">
                                                    <div class="col-sm-6" style="padding-left: 0px;">
                                                        <label for="name">MRP (Rs)</label>
                                                        <div><?php echo number_format($data[0]['ProductPrice'],2);?></div>    
                                                    </div>
                                                    <div class="col-sm-6" style="padding-left: 0px;padding-right: 0px;">
                                                        <label for="name">Selling Price (Rs)</label>
                                                        <div><?php echo number_format($data[0]['SellingPrice'],2);?></div> 
                                                    </div>
                                               </div> 
                                               <div class="form-group form-show-validation row">
                                                    <div class="col-sm-6" style="padding-left: 0px;">
                                                        <label for="name">Referal Income</label>
                                                        <div><?php echo $data[0]['ReferalIncome'];?></div> 
                                                    </div>  
                                                    <div class="col-sm-6" style="padding-left: 0px;">
                                                        <label for="name">Is Active</label>
                                                        <div><?php if($data[0]['IsActive']=="1") { echo "Yes"; } else { echo "No";}?></div> 
                                                    </div>  
                                               </div> 
                                               <div class="form-group form-show-validation row">
                                                    <label for="name">Description</label>
                                                    <div class="col-sm-12" style="padding-left:0px"><?php echo $data[0]['Description'];?></div>
                                                </div>
                                                <div class="form-group form-show-validation row">
                                                    <label for="name">Created On</label>
                                                    <div class="col-sm-12" style="padding-left:0px"><?php echo date("d M,Y H:i",strtotime($data[0]['CreatedOn']));?></div>
                                                </div> 
                                            </div>
                                       </div> 
                                    </div>
                                    <div class="card-action">
                                        <div class="row">
                                            <div class="col-md-12">
                                            <?php if($_GET['fr']="u"){ ?>
                                                <a href="dashboard.php?action=user/usersellproducts" class="btn btn-warning btn-border">Back</a>
                                            <?php } else { ?>
                                                <a href="dashboard.php?action=Products/list&status=All" class="btn btn-warning btn-border">Back</a>
                                            <?php } ?>
                                            </div>                                        
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
            
             <div class="main-panel">
            <div class="container">
            
<div class="page-inner">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">View Links</div>
                                </div>
                                    <div class="card-body">
                                       <div class="table-responsive">
                                 <table class="table table-striped mt-3">
                                        <thead>
                                            <tr>
                                                <th scope="col">User id</th>
                                                <th scope="col">User Name</th>
                                                <th scope="col">Link</th>                                   
                                                <th scope="col" style="text-align: right;">Created</th>                                   
                                            </tr>
                                        </thead>
                                        <tbody>
                                        
                                        <?php foreach($q as $qs){ 
                                              $qc = $mysql->select("select * from _jusertable where CustomerID='".$product['userid']."'");
                                            ?>
                                            <tr>
                                                <td><?php echo $qs['UserID'];?></td>
                                                <td><?php echo $qc[0]['personname'];?></td>
                                                <td>https://www.klx.co.in/pp_<?php echo $qs['Link'];?></td>
                                                <td><?php echo $qs['CreatedOn'];?></td>
                                                
                                            </tr>
                                        <?php } if(sizeof($products)=="0"){ ?>
                                            <tr>
                                                <td style="text-align: center;" colspan="4">No Links found</td>
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