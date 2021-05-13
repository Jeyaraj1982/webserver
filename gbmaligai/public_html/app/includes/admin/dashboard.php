<?php
/*include_once("header.php");
include_once("LeftMenu.php"); 
if (isset($_GET['action'])) {
         include_once($_GET['action'].".php");
     } else { */?>
<br><br><br>
<div class="main-panel full-height">
    <div class="container">
        <div class="panel-header">
            <div class="page-inner border-bottom pb-0 mb-3">
                <div class="d-flex align-items-left flex-column">
                    <h2 class="pb-2 fw-bold">Dashboard</h2>
                    <div class="nav-scroller d-flex">
                        <div class="nav nav-line nav-color-info d-flex align-items-center justify-contents-center">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-inner">

            <div class="row">
                <div class="col-sm-12">
                    <h3>Orders</h3>
                </div>
                <div class="col-sm-6 col-md-2">
                    <div class="card card-stats card-round" onclick="location.href='dashboard.php?action=Order/list&status=new'" style="cursor: pointer;">
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-12 col-stats">
                                    <div class="numbers">
                                        <p class="card-category">
                                         <?php
                                            $unRead = $mysql->select("select * from _tbl_orders where OrderStatus='1' and OrderID not in (select OrderID from _tbl_orders_viewlogs where StatusCode='1' and AdminID='".$_SESSION['User']['AdminID']."') ");
                                            echo  (sizeof($unRead)>0) ? "New&nbsp;<span class='NotifyIcon'>".sizeof($unRead)."</span>" : "New";
                                         ?>
                                        </p>
                                        <h3 class="card-title"><?php echo sizeof($mysql->select("select * from _tbl_orders where OrderStatus='1'")); ?></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-2">
                    <div class="card card-stats card-round" onclick="location.href='dashboard.php?action=Order/list&status=confirm'" style="cursor: pointer;">
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-12 col-stats">
                                    <div class="numbers">
                                        <p class="card-category">
                                        <?php
                                            $unRead = $mysql->select("select * from _tbl_orders where OrderStatus='3' and OrderID not in (select OrderID from _tbl_orders_viewlogs where StatusCode='3' and AdminID='".$_SESSION['User']['AdminID']."') ");
                                            echo  (sizeof($unRead)>0) ? "Confirm&nbsp;<span class='NotifyIcon'>".sizeof($unRead)."</span>" : "Confirm";
                                         ?>
                                        </p>
                                        <h3 class="card-title"><?php echo sizeof($mysql->select("select * from _tbl_orders where OrderStatus='3'")); ?></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-2">
                    <div class="card card-stats card-round" onclick="location.href='dashboard.php?action=Order/list&status=processing'" style="cursor: pointer;">
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-12 col-stats">
                                    <div class="numbers">
                                        <p class="card-category">
                                        <?php
                                            $unRead = $mysql->select("select * from _tbl_orders where OrderStatus='4' and OrderID not in (select OrderID from _tbl_orders_viewlogs where StatusCode='4' and AdminID='".$_SESSION['User']['AdminID']."') ");
                                            echo  (sizeof($unRead)>0) ? "Processing&nbsp;<span class='NotifyIcon'>".sizeof($unRead)."</span>" : "Processing";
                                         ?>
                                        </p>
                                        <h3 class="card-title"><?php echo sizeof($mysql->select("select * from _tbl_orders where OrderStatus='4'")); ?></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-2">
                    <div class="card card-stats card-round" onclick="location.href='dashboard.php?action=Order/list&status=dispatched'" style="cursor: pointer;">
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-12 col-stats">
                                    <div class="numbers">
                                        <p class="card-category">
                                          <?php
                                            $unRead = $mysql->select("select * from _tbl_orders where OrderStatus='5' and OrderID not in (select OrderID from _tbl_orders_viewlogs where StatusCode='5' and AdminID='".$_SESSION['User']['AdminID']."') ");
                                            echo  (sizeof($unRead)>0) ? "Dispatched&nbsp;<span class='NotifyIcon'>".sizeof($unRead)."</span>" : "Dispatched";
                                         ?>
                                        </p>
                                        <h3 class="card-title"><?php echo sizeof($mysql->select("select * from _tbl_orders where OrderStatus='5'")); ?></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-2">
                    <div class="card card-stats card-round" onclick="location.href='dashboard.php?action=Order/list&status=delivered'" style="cursor: pointer;">
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-12 col-stats">
                                    <div class="numbers">
                                        <p class="card-category">
                                         <?php
                                            $unRead = $mysql->select("select * from _tbl_orders where OrderStatus='6' and OrderID not in (select OrderID from _tbl_orders_viewlogs where StatusCode='6' and AdminID='".$_SESSION['User']['AdminID']."') ");
                                            echo  (sizeof($unRead)>0) ? "Delivered&nbsp;<span class='NotifyIcon'>".sizeof($unRead)."</span>" : "Delivered";
                                         ?>
                                        </p>
                                        <h3 class="card-title"><?php echo sizeof($mysql->select("select * from _tbl_orders where OrderStatus='6'")); ?></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-2">
                        <div class="card card-stats card-round" onclick="location.href='dashboard.php?action=Order/list&status=paid'" style="cursor: pointer;">
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-12 col-stats">
                                        <div class="numbers">
                                            <p class="card-category">
                                                                                     <?php
                                            $unRead = $mysql->select("select * from _tbl_orders where OrderStatus='6'  and IsPaid='1' and OrderID not in (select OrderID from _tbl_orders_viewlogs where StatusCode='6' and AdminID='".$_SESSION['User']['AdminID']."') ");
                                            echo  (sizeof($unRead)>0) ? "Paid Orders&nbsp;<span class='NotifyIcon'>".sizeof($unRead)."</span>" : "Paid Orders";
                                         ?>

                                            </p>
                                            <h3 class="card-title"><?php echo sizeof($mysql->select("select * from _tbl_orders where OrderStatus='6' and IsPaid='1'")); ?></h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <div class="col-sm-6 col-md-2">
                    <div class="card card-stats card-round" onclick="location.href='dashboard.php?action=Order/list&status=cancel'" style="cursor: pointer;">
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-12 col-stats">
                                    <div class="numbers">
                                        <p class="card-category">
                                        
                                                                                     <?php
                                            $unRead = $mysql->select("select * from _tbl_orders where OrderStatus='2'    and OrderID not in (select OrderID from _tbl_orders_viewlogs where StatusCode='2' and AdminID='".$_SESSION['User']['AdminID']."') ");
                                            echo  (sizeof($unRead)>0) ? "Cancelled&nbsp;<span class='NotifyIcon'>".sizeof($unRead)."</span>" : "Cancelled";
                                         ?>
                                        </p>
                                        <h3 class="card-title"><?php echo sizeof($mysql->select("select * from _tbl_orders where OrderStatus='2'")); ?></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-3">
                    <div class="card card-stats card-round" onclick="location.href='dashboard.php?action=Order/list&status=undelivered'" style="cursor: pointer;">
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-12 col-stats">
                                    <div class="numbers">
                                        <p class="card-category">
                                        
                                                                                     <?php
                                            $unRead = $mysql->select("select * from _tbl_orders where OrderStatus='7' and OrderID not in (select OrderID from _tbl_orders_viewlogs where StatusCode='7' and AdminID='".$_SESSION['User']['AdminID']."') ");
                                            //echo "select * from _tbl_orders where OrderStatus='7' and OrderID not in (select OrderID from _tbl_orders_viewlogs where StatusCode='7' and AdminID='".$_SESSION['User']['AdminID']."') ";
                                            echo  (sizeof($unRead)>0) ? "Deliver Failed&nbsp;<span class='NotifyIcon'>".sizeof($unRead)."</span>" : "Deliver Failed";
                                         ?>
                                        </p>
                                        <h3 class="card-title"><?php echo sizeof($mysql->select("select * from _tbl_orders where OrderStatus='7'")); ?></h3>
                                    </div>
                                </div>
                            </div>
                        </div>                                      
                    </div>
                </div> 
            </div>
            
            <div class="row">
                <div class="col-sm-12">
                <h3>Statistics</h3>
                </div>
                <div class="col-sm-6 col-md-2">                                         
                    <div class="card card-stats card-round" onclick="location.href='dashboard.php?action=Customer/list&status=All'" style="cursor: pointer;">
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-7 col-stats">
                                    <div class="numbers">
                                        <p class="card-category">
                                         <?php
                                            $unRead = $mysql->select("select * from _tbl_customer where CustomerID not in (select CustomerID from _tbl_customers_viewlogs where   AdminID='".$_SESSION['User']['AdminID']."') ");
                                            echo  (sizeof($unRead)>0) ? "Customersd&nbsp;<span class='NotifyIcon'>".sizeof($unRead)."</span>" : "Customers";
                                         ?>
                                        </p>
                                        <h3 class="card-title"><?php echo sizeof($mysql->select("select * from _tbl_customer")); ?></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-md-2">                                         
                    <div class="card card-stats card-round" onclick="location.href='dashboard.php?action=Products/list&status=All'" style="cursor: pointer;">
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-7 col-stats">
                                    <div class="numbers">
                                        <p class="card-category">Products</p>
                                        <h3 class="card-title"><?php echo sizeof($mysql->select("select * from _tbl_products where IsActive='1'")); ?></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
<?php
 function folderSize($dir){
$count_size = 0;
$count = 0;
$dir_array = scandir($dir);
  foreach($dir_array as $key=>$filename){
    if($filename!=".." && $filename!="."){
       if(is_dir($dir."/".$filename)){
          $new_foldersize = foldersize($dir."/".$filename);
          $count_size = $count_size+ $new_foldersize;
        }else if(is_file($dir."/".$filename)){
          $count_size = $count_size + filesize($dir."/".$filename);
          $count++;
        }
   }
 }
return $count_size;
}

function sizeFormat($bytes){ 
$kb = 1024;
$mb = $kb * 1024;
$gb = $mb * 1024;
$tb = $gb * 1024;

if (($bytes >= 0) && ($bytes < $kb)) {
return $bytes . ' B';

} elseif (($bytes >= $kb) && ($bytes < $mb)) {
return ceil($bytes / $kb) . ' KB';

} elseif (($bytes >= $mb) && ($bytes < $gb)) {
return ceil($bytes / $mb) . ' MB';

} elseif (($bytes >= $gb) && ($bytes < $tb)) {
return ceil($bytes / $gb) . ' GB';

} elseif ($bytes >= $tb) {
return ceil($bytes / $tb) . ' TB';
} else {
return $bytes . ' B';
}
}

$disksize = folderSize(SERVER_PATH);
$disksize = intval(($disksize/1024)/1024);
$disk_allowed = 1330;
?>                
                <div class="col-sm-6 col-md-2">                                         
                    <div class="card card-stats card-round" style="cursor: pointer;">
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-12 col-stats">
                                    <div class="numbers">
                                        <p class="card-category">Disk Used</p>
                                        <h3 class="card-title"><?php echo $disksize ."&nbsp;<span style='font-size:12px'>MB</span>"; ?></h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
            
            <div class="row">
                  
                
                 <div class="col-sm-6 col-md-4">
                    <div class="card card-stats card-round" onclick="location.href='dashboard.php?action=Withdrawals/Requests&status=requests'" style="cursor: pointer;">
                        <div class="card-body ">
                            <div class="row">
                                <div class="col-5">
                                    <div class="icon-big text-center">
                                        <i class="flaticon-analytics text-warning"></i>
                                    </div>
                                </div> 
                                <div class="col-7 col-stats">
                                    <div class="numbers">
                                        <p class="card-category">
                                        
                                         <?php
                                            $unRead = $mysql->select("select * from _tbl_withdrawrequests where WithdrawID not in (select WithdrawID from _tbl_withdrawrequests_viewlogs where   AdminID='".$_SESSION['User']['AdminID']."') ");
                                            echo  (sizeof($unRead)>0) ? "Withdrawal Requests&nbsp;<span class='NotifyIcon'>".sizeof($unRead)."</span>" : "Withdrawal Requests";
                                         ?>
                                        </p>
                                        </p>
                                        <h3 class="card-title"><?php echo sizeof($mysql->select("select * from _tbl_withdrawrequests where IsProcessed='0'")); ?></h3>
                                    </div>
                                </div>
                            </div>
                        </div>                                       
                    </div>
                </div> 
            </div>
            <div class="row">
                 <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <ul class="nav nav-pills nav-secondary nav-pills-no-bd" id="pills-tab-without-border" role="tablist">
                                <li class="nav-item submenu">
                                    <a class="nav-link active show" id="pills-home-tab-nobd" data-toggle="pill" href="#pills-members" role="tab" aria-controls="pills-members" aria-selected="true">Recent Orders</a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <div class="tab-content mt-2 mb-3" id="pills-without-border-tabContent">
                                <div class="tab-pane fade active show" id="pills-members" role="tabpanel" aria-labelledby="pills-home-tab-nobd">
                                    <div class="table-responsive">
                                        <table id="myTable" class="table table-striped">
                                            <thead>
                                            <tr>
                                                <th>Order No.</th>
                                                <th>Create Date</th>
                                                <th>Customer Name</th>
                                                <th style="text-align:right">Order Total ( <i class="fas fa-rupee-sign"></i> )</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        
                                        <?php 
                                        $invoiceList = $mysql->select("SELECT * FROM invoice_order where OrderStatus='1' order by OrderID desc limit 0,5");
                                        foreach($invoiceList as $invoiceDetails){
                                        $invoiceDate = date("d/M/Y, H:i:s", strtotime($invoiceDetails["OrderDate"]));
                                         ?>
                                            <tr>
                                                <td><?php echo $invoiceDetails["OrderCode"];?></td>
                                                <td><?php echo $invoiceDate;?></td>
                                                <td><?php echo $invoiceDetails["CustomerName"];?></td>
                                                <td style="text-align:right"><?php echo $invoiceDetails["OrderTotal"];?></td>
                                                <td style="text-align: right">                                                   
                                                    <div class="dropdown dropdown-kanban" style="float: right;">
                                                        <button class="" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border:none;font-size:14px;background:none !important;padding-right:0px;margin-right:0px;cursor:pointer">
                                                            <i class="icon-options-vertical"></i>
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                            <a class="dropdown-item" href="dashboard.php?action=Order/view&id=<?php echo $invoiceDetails["OrderCode"];?>" draggable="false">View</a>
                                                        </div>
                                                    </div>
                                                </td>                                                                                                                                                                           
                                            </tr>
                                        <?php } ?>
                                        <?php if(sizeof($invoiceList)=="0"){ ?>
                                            <tr>
                                                <td colspan="5" style="text-align: center;">No Orders Found</td>
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
           
           <div class="row">
                 <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <ul class="nav nav-pills nav-secondary nav-pills-no-bd" id="pills-tab-without-border" role="tablist">
                                <li class="nav-item submenu">
                                    <a class="nav-link active show" id="pills-home-tab-nobd" data-toggle="pill" href="#pills-members" role="tab" aria-controls="pills-members" aria-selected="true">Recent Product</a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-body">
                            <h3>Total Products : <?php echo sizeof($mysql->select("SELECT ProductID FROM _tbl_products"));?></h3>
                            <div class="tab-content mt-2 mb-3" id="pills-without-border-tabContent">
                                <div class="tab-pane fade active show" id="pills-members" role="tabpanel" aria-labelledby="pills-home-tab-nobd">
                                    <div class="table-responsive">
                                        <table id="myTable" class="table table-striped">
                                            <thead>
                                                <tr>
                                                   <th scope="col"> </th>
                                                <th scope="col">Product Code</th>
                                                <th scope="col">Product Name</th>
                                                <th scope="col"> </th>
                                                </tr>
                                            </thead>                                                                         
                                            <tbody>
                                            <?php
                                                $products = $mysql->select("SELECT * FROM _tbl_products WHERE IsActive='1'  order by ProductID Desc limit 0,5");
                                               ?>                                                                                                   
                                                <?php foreach($products as $product){ 
                                                     $img = $mysql->select("select * from _tbl_products_images where ProductID='".$product['ProductID']."' and ImageOrder=1 and IsDelete='0'");
                                                    ?> 
                                                <tr>
                                                 <td>
                                                    <?php if (sizeof($img)>0) {?>
                                                      <img src="../uploads/products/<?php echo $product['ProductID'];?>/<?php echo $img[0]['ImageName'];?>" style="height:75px;text-align:center;margin:5px">  
                                                    <?php } else { ?>
                                                    <img src="../assets/noimages.png" style="height:75px;text-align:center;margin:5px">
                                                    <?php } ?>
                                                </td>
                                                <td><?php echo $product['ProductCode'];?></td>
                                                    <td><?php echo $product['ProductName'];?></td>
                                                    <td style="text-align: right">                                                   
                                                        <div class="dropdown dropdown-kanban" style="float: right;">
                                                            <button class="" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border:none;font-size:14px;background:none !important;padding-right:0px;margin-right:0px;cursor:pointer">
                                                                <i class="icon-options-vertical"></i>
                                                            </button>
                                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                                <a class="dropdown-item" href="dashboard.php?action=Products/edit&id=<?php echo md5($product['ProductID']);?>" draggable="false">Edit</a>
                                                                <a class="dropdown-item" href="dashboard.php?action=Products/view&id=<?php echo md5($product['ProductID']);?>" draggable="false">View</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <?php } ?>
                                                <?php if(sizeof($products)=="0"){ ?>
                                                    <tr>
                                                        <td style="text-align: center;" colspan="4">No Products found</td>
                                                    </tr>
                                                <?php } else {?>
                                                     <tr>
                                                        <td colspan="4" style=""><a href="dashboard.php?action=Products/list&status=All">List all products</a></td>
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
    </div>
</div>
<?php //} ?>
<?php //include_once("footer.php");?> 