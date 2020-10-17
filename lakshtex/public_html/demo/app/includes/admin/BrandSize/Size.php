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
                                            </tr>
                                        </thead>
                                        <tbody>
                                        
                                        <?php foreach($Brands as $Brand){ ?>
                                            <tr>
                                                <td><?php echo $Brand['Label'];?></td>
                                            </tr>
                                        <?php } if(sizeof($Brands)=="0"){ ?>
                                            <tr>
                                                <td style="text-align: center;" >No Brand Size found</td>
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
