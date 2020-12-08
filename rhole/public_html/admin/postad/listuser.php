<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" style="padding-top:10px;padding-bottom:10px">
                            <div class="card-title">
                                List of PostAds
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                 <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>User ID</th>    
                                            <th>Person Name</th>    
                                            <th>Email Address</th>    
                                            <th>Mobile Number</th>    
                                            <th>Date of Birth</th>    
                                            <th>Password</th>    
                                            <th>Posted On</th>    
                                        </tr>
                                    </thead>  
                                    <tbody>
                                        <?php foreach(JUsertable::getUser() as $r){ ?>
                                        <tr>
                                            <td><?php echo $r["userid"];?></td>
                                            <td><?php echo $r["personname"];?></td>
                                            <td><?php echo $r["email"];?></td> 
                                            <td><?php echo $r["mobile"];?></td> 
                                            <td><?php echo $r["dob"];?></td> 
                                            <td><?php echo $r["pwd"];?></td> 
                                            <td><?php echo $r["createdon"];?></td>
                                        </tr>
                                        <?php } ?>
                                    </tbody> 
                                 </table>
                            </div>
                            <?php for($i=1;$i<=intval($rows/$rsperpage);$i++) {?>
        <a href="<?php echo AppUrl;?>/admin/dashboard.php?action=postad/todaypostads&view=<?php echo $i;?>"><?php echo $i;?></a>
    <?php } ?>
                        </div>
                    </div>                                                                                             
                </div>
            </div>
        </div>
    </div>
</div>

