
<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" style="padding-top:10px;padding-bottom:10px">
                            <div class="card-title">
                                List of User
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                 <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <td>Username</td>
                                            <td>email id</td>
                                            <td>Phone No</td>
                                            <td>Posted on</td> 
                                        </tr>
                                    </thead>  
                                    <tbody>
                                        <?php 
                                            if (!(CommonController::isLogin())){
                                                echo CommonController::printError("Login Session Expired. Please Login Again");
                                                exit;
                                            } 
                                            foreach (JUsertable::getUser() as $r){     
                                                
                                        ?>
                                        <tr>
                                           <td><?php echo $r["personname"];?></td>
                                            <td><?php echo $r["email"];?></td>
                                            <td><?php echo $r["mobile"]; ?></td>
                                            <td><?php echo $r["createdon"]; ?></td>
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

