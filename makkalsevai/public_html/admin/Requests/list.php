 <?php 
  
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
                                        Manage Requests
                                    <br>
                                    <span style="font-size: 15px"><?php echo $title;?></span>  </div>
                                </div>
                                <!--
                                <div class="col-md-8" style="text-align: right;">
                                    <a href="dashboard.php?action=Brands/add" class="btn btn-primary btn-xs">Add Brand</a><br>
                                    <a href="dashboard.php?action=Brands/list&status=All" <?php if($_GET['status']=="All"){ ?> style="font-size:bold;text-decoration:underline;"<?php } ?>>All Brands</a>&nbsp;|&nbsp;
                                    <a href="dashboard.php?action=Brands/list&status=Active" <?php if($_GET['status']=="Active"){ ?> style="font-size:bold;text-decoration:underline;"<?php } ?>>Active Brands</a>&nbsp;|&nbsp;
                                    <a href="dashboard.php?action=Brands/list&status=Disable" <?php if($_GET['status']=="Disable"){ ?> style="font-size:bold;text-decoration:underline;"<?php } ?>>Disable Brands</a>
                                </div>
                                -->
                            </div>
                        </div>                                       
                        <div class="card-body">                                                                                                                                             
                            <div class="table-responsive">
                                 <table class="table table-striped mt-3">
                                        <thead>
                                            <tr>
                                                <th scope="col">Requested On</th>
                                                <th scope="col">Service Name</th>
                                                <th scope="col">Customer Name</th>
                                                <th scope="col">Mobile Number</th>
                                            </tr>                            
                                        </thead>
                                        <tbody>
                                        
                                        <?php
                                            $Requests =  $mysql->select("select * from _tbl_servicerequests order by ServiceRequestID desc");
                                        ?>
                                        <?php foreach($Requests as $Brand){ ?>
                                            <tr>
                                                <td><?php echo $Brand['RequestedOn'];?></td>
                                                <td><?php echo $Brand['ServiceTitle'];?></td>
                                                <td><?php echo $Brand['CustomerName'];?></td>
                                                <td><?php echo $Brand['CustomerMobileNumber'];?></td>
                                               
                                            </tr>
                                        <?php } if(sizeof($Brands)=="0"){ ?>
                                            <tr>
                                                <td style="text-align: center;" colspan="4">No Service found</td>
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
 
 