<?php  include_once("header.php"); ?>
<style>
#star{color:red}
</style>
 
<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-display1 icon-gradient bg-premium-dark">
                        </i>
                    </div>
                    <br> 
                    <div style="text-align:center">
                        <div class="h5 modal-title" style="text-align: left;">
                            <h4 class="mt-2" style="margin-bottom: 1.5rem;font-weight: normal;margin-top: .5rem !important;opacity: .6;text-align:left">
                            <div>Product ID Generation</div><span style="font-size: 1.1rem;">Genearte Sub IDs</span></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>          
        <div class="tab-content">
            <div class="tab-pane tabs-animation fade active show" id="tab-content-1" role="tabpanel">
                <div class="row">
                    <div class="col-sm-2"></div>
                    <div class="col-md-8">
                        <div class="main-card mb-3 card" style="border:0px">
                            <div class="card-body">
                                <?php
                                      if (isset($_POST['btnSellProducts'])) {
                                          $error=0;
                                          $member = $mysql->select("select * from _tbl_member where MemberCode='".$_POST['MemberCode']."'");
                                          if (sizeof($member)!=1) {
                                              $error++;
                                              $errorMessage = "<span style='color:red'>Invalid Member Code</span>";
                                          }
                                          
                                          if ($error==0) {
                                               $products = $mysql->select("select * from  `_tbl_products` where ProductID='".$_POST['ProuctID']."'");
                                                for($i=1;$i<=$_POST['Qty'];$i++) {
                                              $mysql->insert("_tbl_points",array("MemberID"=>$member[0]['MemberID'], 
                                                                                 "MemberCode"=>$member[0]['MemberCode'],
                                                                                 "ProductCode"=>$products[0]['ProductCode'],
                                                                                 "Points"=>$products[0]['Points'],
                                                                                 "Credits"=>$products[0]['Credits'],
                                                                                 "UpdatedOn"=>date("Y-m-d H:i:"),
                                                                                 "IsConverted"=>"0",
                                                                                 "ConvertedOn"=>"0000-00-00 00:00:00",
                                              ));
                                                }
                                              $successmessage = "<span style='color:green'>Added successfully</span>";
                                          }
                                          
                                          
                                      }
                                ?>
                                <div class="form-group row">
                                <div class="col-sm-12"><?php echo $errorMessage;?><?php echo $successmessage?></div>
                                </div>
                                <form method="post" id="createform">
                                    <div>
                                         <div class="form-group row">
                                            <div class="col-sm-3">Member ID<span id="star">*</span></div>
                                         </div>
                                         <div class="form-group row">
                                            <div class="col-sm-9"><input type="text" name="MemberCode" id="MemberCode" placeholder="Member Code" class="form-control" value="<?php echo (isset($_POST['MemberCode']) ? $_POST['MemberCode'] : "");?>"></div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-3">Products<span id="star">*</span></div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-9">
                                               <select name="ProuctID" class="form-control">
                                                   <?php $products = $mysql->select("select * from  `_tbl_products` order by ProductID");?>
                                                   <?php foreach ($products as $product){ ?>
                                                   <option value="<?php echo $product['ProductCode'];?>"><?php echo $product['ProductName'];?> (Credits: <?php echo $product['Credits'];?>) (Points: <?php echo $product['Points'];?>)</option>
                                                   <?php }?>     
                                               </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-3">Qty<span id="star">*</span></div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-9">
                                                <select name="Qty" class="form-control">
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
                                                    <option value="6">6</option>
                                                    <option value="7">7</option>
                                                    <option value="8">8</option>
                                                    <option value="9">9</option>
                                                    <option value="10">10</option>
                                                </select>
                                            </div>
                                        </div>
                                        
                                        <div class="form-group row">
                                            <div class="col-sm-12" style="text-align:center;color:green"><?php echo $successMessage ;?></div>
                                        </div>  
                                        <div class="form-group row">
                                            <div class="col-sm-12" style="text-align:right;"><button type="submit" class="btn btn-primary" name="btnSellProducts">Sell Product</button></div>
                                        </div>
                                   </form> 
                            </div>
                        </div>                                                                                          
                    </div>
                </div>
                <div class="col-sm-2"></div>
            </div>
        </div>
    </div>
</div>
 <?php include_once("footer.php");?>             