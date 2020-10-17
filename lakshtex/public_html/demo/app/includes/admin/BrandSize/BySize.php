 <?php 
    if($_GET['status']=="All"){ 
        $Brands = $mysql->select("select * from _tbl_brand_size ");
    }if($_GET['status']=="Active"){
        $Brands = $mysql->select("select * from _tbl_brand_size where IsActive='1'");
    }if($_GET['status']=="Disable"){
        $Brands = $mysql->select("select * from _tbl_brand_size where IsActive='0'");
    }
?>
<div class="main-panel">                                                                                                                                                                      
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" style="padding-top:10px;padding-bottom:10px">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="card-title">
                                        Manage Brands Size
                                    <br>
                                    <span style="font-size: 15px"><?php echo $title;?></span>  </div>
                                </div>
                                <div class="col-md-8" style="text-align: right;">
                                    <a href="dashboard.php?action=BrandSize/BySize&status=All" <?php if($_GET['status']=="All"){ ?> style="font-size:bold;text-decoration:underline;"<?php } ?>>All</a>&nbsp;|&nbsp;
                                    <a href="dashboard.php?action=BrandSize/BySize&status=Active" <?php if($_GET['status']=="Active"){ ?> style="font-size:bold;text-decoration:underline;"<?php } ?>>Active</a>&nbsp;|&nbsp;
                                    <a href="dashboard.php?action=BrandSize/BySize&status=Disable" <?php if($_GET['status']=="Disable"){ ?> style="font-size:bold;text-decoration:underline;"<?php } ?>>Disable</a>
                                </div>
                            </div>
                        </div>                                       
                        <div class="card-body">                                                                                                                                             
                            <div class="table-responsive">
                                 <table class="table table-striped mt-3">
                                        <thead>
                                            <tr>
                                                <th scope="col">Brand Size</th>
                                                <th scope="col" style="text-align: right;">Products</th>
                                                <th scope="col"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        
                                        <?php foreach($Brands as $Brand){ ?>
                                        <?php $pc = $mysql->select("select COUNT(ProductID) AS cnt from _tbl_products where BrandSize LIKE '%".$Brand['Label']."%'");
                                          ?>
                                            <tr>
                                                <td><?php echo $Brand['Label'];?></td>
                                                <td style="text-align: right;"><?php echo $pc[0]['cnt'];?></td>
                                                <td style="text-align: right"> 
                                                    <?php if($pc[0]['cnt']>0){ ?>                                                  
                                                        <div class="dropdown dropdown-kanban" style="float: right;">
                                                            <button class="" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border:none;font-size:14px;background:none !important;padding-right:0px;margin-right:0px;cursor:pointer">
                                                                <i class="icon-options-vertical"></i>
                                                            </button>
                                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                                <a class="dropdown-item" href="dashboard.php?action=BrandSize/viewproducts&fr=bs&id=<?php echo md5($Brand['SizeID']);?>&status=All" draggable="false">View Products</a>
                                                            </div>
                                                        </div>
                                                    <?php } ?>
                                                </td>
                                            </tr>
                                        <?php } if(sizeof($Brands)=="0"){ ?>
                                            <tr>
                                                <td colspan="3" style="text-align: center;" >No Brand Size found</td>
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
