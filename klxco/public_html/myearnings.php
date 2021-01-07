<?php include_once("header.php"); ?>
<div class="main-panel"  style="width: 100%;height:auto !important">
    <div class="container"> 
        <div class="page-inner">
        <a class="btn btn-outline-primary btn-sm" style="width:50px;" href="<?php echo country_url;?>">Back</a><br><br>
            <div class="page-header">
                <ul class="breadcrumbs" style="border:none;margin-left:0px;padding-left:0px;">
                    <li class="nav-home">
                        <a href="<?php echo country_url;?>">
                            <i class="flaticon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo country_url;?>" >Home</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo country_url;?>mypage" >Dashboard</a>
                    </li>
                    <li class="separator">
                        <i class="flaticon-right-arrow"></i>
                    </li>
                    <li class="nav-item">
                        <a href="<?php echo country_url;?>myearnings" >My Earnings</a>
                    </li>
                </ul>
            </div>
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">My Earnings</h4>
                </div>
                <div class="card-body">
                    <div class="row row-projects">
                      <div class="table-responsive">
                                 <table class="table table-striped mt-3">
                                        <thead>
                                            <tr>
                                                <th scope="col">Txn Date</th>
                                                <th scope="col">Particulars</th>
                                                <th scope="col" style="text-align: right;">Credits</th>                                   
                                                <th scope="col" style="text-align: right;">Debits</th>                                   
                                                <th scope="col" style="text-align: right;">Balance</th>                                   
                                            </tr>
                                        </thead>
                                        <tbody>
                                        
                                        <?php 
                                        $products = $mysql->select("select * from _tbl_share_products_earning where UserID='".$_SESSION['USER']['userid']."' order by EarningID desc");
                                        foreach($products as $product){ 
                                             
                                            ?>
                                            <tr>
                                                <td><?php echo $product['TxnDate'];?></td>
                                                <td><?php echo $product['Particular'];?></td>
                                                <td style="text-align:right"><?php echo number_format($product['Credits'],2);?></td>
                                                <td style="text-align:right"><?php echo number_format($product['Debits'],2);?></td>
                                                <td style="text-align:right"><?php echo number_format($product['Balance'],2);?></td>
                                            </tr>
                                        <?php } if(sizeof($products)=="0"){ ?>
                                            <tr>
                                                <td style="text-align: center;" colspan="5">No Products found</td>
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

          
<?php include_once("footer.php"); ?>