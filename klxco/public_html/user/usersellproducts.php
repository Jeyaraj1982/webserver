<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" style="padding-top:10px;padding-bottom:10px">
                            <div class="card-title">
                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        List of Sell Product Users  
                                    </div>
                                    <div class="col-sm-6" style="text-align:right;padding-top:5px;color:skyblue;">
                                        <button type="button" class="btn btn-primary btn-sm" onclick="location.href='dashboard.php?action=user/addusersellproduct'">Add</button>
                                    </div> 
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                 <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>User ID</th>    
                                            <th>Person Name</th>    
                                            <th>Mobile Number</th> 
                                            <th style="text-align: right">Available Credits</th>   
                                            <th style="text-align: right">No of Products</th>   
                                            <th></th>   
                                        </tr>
                                    </thead>  
                                    <tbody>
                                        <?php     
                                            $obj = new CommonController();
                                            $sql = $mysql->select("select * from _jusertable where AllowtoSellProduct='1'");
                                            foreach($sql as $user){ 
                                                
                                        ?>
                                            <tr>                                                                                                                                                                           
                                                <td><?php echo $user["userid"];?></td>
                                                <td><?php echo $user["personname"];?></td>
                                                <td><?php echo $user["mobile"];?></td>
                                                <td style="text-align: right"><?php echo $app::getTotalBalanceUserCredits($user['userid']);?></td>
                                                <td style="text-align: right"><?php echo sizeof($mysql->select("select * from _tbl_products where IsAdmin='0' and UserID='".$user['userid']."'"));?></td>
                                                <td>
                                                    <div class="dropdown dropdown-kanban" style="float: right;">
                                                        <button class="" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border:none;font-size:14px;background:none !important;padding-right:0px;margin-right:0px;cursor:pointer">
                                                            <i class="icon-options-vertical"></i>
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                            <a class="dropdown-item" href="dashboard.php?action=user/AddCredits&d=<?php echo md5($user['userid']);?>" draggable="false">Add Credits</a>
                                                            <a class="dropdown-item" href="dashboard.php?action=user/DebitCredits&d=<?php echo md5($user['userid']);?>" draggable="false">Debit Credits</a>
                                                            <a class="dropdown-item" href="dashboard.php?action=user/CreditSummary&d=<?php echo md5($user['userid']);?>&status=All" draggable="false">View Credit Summary</a>
                                                            <a class="dropdown-item" href="dashboard.php?action=user/ViewProducts&d=<?php echo md5($user['userid']);?>&status=All" draggable="false">View Products</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                        <?php if(sizeof($sql)==0){ ?>
                                            <tr>
                                                <td colspan="5" style="text-align: center;">No User Found</td>
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

