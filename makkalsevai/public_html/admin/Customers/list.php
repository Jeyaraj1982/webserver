 <?php 
 
    $Brands = $mysql->select("select * from _tbl_customers order by CustomerID desc");
     $title="Customers";
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
                                        Manage Brands
                                    <br>
                                    <span style="font-size: 15px"><?php echo $title;?></span>  </div>
                                </div>
                                 
                            </div>
                        </div>                                       
                        <div class="card-body">                                                                                                                                             
                            <div class="table-responsive">
                                 <table class="table table-striped mt-3">
                                        <thead>
                                            <tr>
                                                <th scope="col">Registered</th>
                                                <th scope="col">Customer Name</th>
                                                <th scope="col">Mobile Number</th>
                                                <th scope="col">Password</th>
                                                
                                                
                                            </tr>                            
                                        </thead>
                                        <tbody>
                                        
                                        <?php foreach($Brands as $Brand){ ?>
                                      
                                            <tr>
                                                <td><?php echo $Brand['CreatedOn'];?></td>
                                                <td><?php echo $Brand['CustomerName'];?></td>
                                                <td><?php echo $Brand['MobileNumber'];?></td>
                                                <td><?php echo $Brand['Password'];?></td>
                                                
                                                                                           
                                                 
                                            </tr>
                                        <?php } if(sizeof($Brands)=="0"){ ?>
                                            <tr>
                                                <td style="text-align: center;" colspan="3">No Customer</td>
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
 
 