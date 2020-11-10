<?php
$data= $mysql->Select("select * from _tbl_products where md5(ProductID)='".$_GET['id']."'");
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
                                <form id="exampleValidation" method="POST" action="" onsubmit="return SubmitProduct();" id="addProduct" enctype="multipart/form-data">
                                    <div class="card-body">
                                       <div class="form-group row">
                                            <div class="col-sm-4" style="text-align: center;">
                                                <div style="border: 1px solid #e6e6e6;padding: 25px;">
                                                    <img src='../uploads/<?php echo $data[0]['ProductImage'];?>' style='width: 64px;margin-top: 5px;'>
                                                </div>
                                            </div>
                                            <div class="col-sm-8">
                                                <div class="form-group form-show-validation row">
                                                    <div class="col-sm-12" style="padding-left:0px"><h4><?php echo $data[0]['ProductName'];?></h4></div>
                                                </div> 
                                                <div class="form-group form-show-validation row">
                                                    <div class="col-sm-12" style="padding-left:0px"><?php echo $data[0]['ShortDescription'];?></div>
                                                </div>
												<div class="form-group form-show-validation row">
                                                    <div class="col-sm-6" style="padding-left: 0px;">
                                                        <label for="name">Category Name</label>
                                                        <div><?php echo $data[0]['CategoryName'];?></div>    
                                                    </div>
                                                    <div class="col-sm-6" style="padding-left: 0px;padding-right: 0px;">
                                                        <label for="name">Sub CategoryName</label> 
                                                        <div><?php echo $data[0]['SubCategoryName'];?></div> 
                                                    </div>
                                               </div>
                                               <div class="form-group form-show-validation row">
                                                    <div class="col-sm-6" style="padding-left: 0px;">
                                                        <label for="name">Brand Name</label>
                                                        <div><?php echo $data[0]['BrandName'];?></div>    
                                                    </div>
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
                                                        <label for="name">Stock Available</label>
                                                        <div><?php echo $data[0]['StockAvailable'];?></div> 
                                                    </div>  
                                                    <div class="col-sm-6" style="padding-left: 0px;">
                                                        <label for="name">Is Active</label>
                                                        <div><?php if($data[0]['IsActive']=="1") { echo "Yes"; } else { echo "No";}?></div> 
                                                    </div>  
                                               </div>
                                               <div class="form-group form-show-validation row">
                                                    <div class="col-sm-6" style="padding-left: 0px;">
                                                        <label for="name">Ratings</label>
                                                        <div><?php echo PrintStar($data[0]['Ratings']);?></div> 
                                                    </div>  
                                                    <div class="col-sm-6" style="padding-left: 0px;">
                                                        <label for="name">Is New</label>
                                                        <div><?php if($data[0]['IsNew']=="1") { echo "Yes"; } else { echo "No";}?></div> 
                                                    </div>  
                                               </div>  
                                            </div>
                                       </div> 
                                       <div class="form-group form-show-validation row">
                                            <label for="name">Age Group</label>
                                            <div class="col-sm-12">
                                                <?php 
                                                     if($data[0]['AgeGroup']!=""){
                                                     $agegrps = explode(",", $data[0]['AgeGroup']);
                                                     foreach($agegrps as $agegrp){
                                                         echo "<div style='border:1px solid #cacaca;padding:10px;float:left;border-radius:5px;margin-right:10px;margin-bottom:10px'>".$agegrp."</div>";
                                                     }
                                                     }
                                                ?>
                                                </div> 
                                       </div>
                                       <div class="form-group form-show-validation row">
                                            <label for="name">Brand Size</label>
                                            <div class="col-sm-12">
                                                <?php 
                                                    if($data[0]['BrandSize']!=""){
                                                     $BrandSizes = explode(",", $data[0]['BrandSize']);
                                                     foreach($BrandSizes as $BrandSize){
                                                         echo "<div style='border:1px solid #cacaca;padding:10px;float:left;border-radius:5px;margin-right:10px;margin-bottom:10px'>".$BrandSize."</div>";
                                                     }
                                                     }
                                                ?>
                                       </div>
                                       <div class="form-group form-show-validation row">
                                            <label for="name">Detail Description</label>
                                            <div class="col-sm-12"><?php echo $data[0]['DetailDescription'];?></div> 
                                       </div>
                                         <div class="form-group form-show-validation row">
                                            <div class="col-sm-12">
                                                 <div style="padding:10px;height:250px" id="total_div">
                                                 <?php $additionals= $mysql->select("select * from _tbl_product_additional_image where ProductID='".$data[0]['ProductID']."'");
                                                       foreach($additionals as $additional){ ?> 
                                                            <div id="div_<?php echo $additional['ProductImageID'];?>" style="float: left;margin-right:10px;margin-bottom:10px;height:90px;width:70px;text-align: center;border:1px solid #ccc;">
                                                                <div>
                                                                    <img src='<?php echo "../uploads/".$additional['ProductImage'];?>' style='width: 60px;height:80px;;margin-top: 5px;'>
                                                                </div>
                                                            </div>     
                                                       <?php } ?>    
                                                 </div> 
                                            </div>               
                                        </div>
                                    </div>
                                </div>
                                <div class="card-action">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <a href="dashboard.php?action=Products/list&status=All" class="btn btn-warning btn-border">Back</a>
                                        </div>                                        
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
