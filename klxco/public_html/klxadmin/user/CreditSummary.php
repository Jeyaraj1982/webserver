<?php
$user = $mysql->select("select * from _jusertable where md5(userid)='".$_GET['d']."'");
?>
<div class="main-panel">
    <div class="container">
        <div class="page-inner">                                                       
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Credit Summary</div>
                        </div>
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="Name" class="col-md-3">Person Name</label>
                                <div class="col-md-9">: <?php echo $user[0]['personname'];?></div>
                            </div>
                            <div class="form-group row">
                                <label for="Name" class="col-md-3">Email Address</label>
                                <div class="col-md-9">: <?php echo $user[0]['email'];?></div>
                            </div>
                            <div class="form-group row">
                                <label for="Name" class="col-md-3">Mobile Number</label>
                                <div class="col-md-9">: <?php echo $user[0]['mobile'];?></div>
                            </div>
                            <div class="table-responsive">
                                 <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Particulars</th>    
                                            <th style="text-align: right">Credits</th>    
                                            <th style="text-align: right">Debits</th> 
                                            <th style="text-align: right">Available Balance</th>   
                                        </tr>
                                    </thead>  
                                    <tbody>
                                        <?php     
                                            $obj = new CommonController();
                                            $sql = $mysql->select("select * from _tbl_product_credits where UserID='".$user[0]['userid']."' order by CreditsID desc");
                                            foreach($sql as $user){ 
                                                
                                        ?>
                                            <tr>                                                                                                                                                                           
                                                <td><?php echo $user["Particulars"];?></td>
                                                <td style="text-align: right"><?php echo $user["Credits"];?></td>
                                                <td style="text-align: right"><?php echo $user["Debits"];?></td>
                                                <td style="text-align: right"><?php echo $user["Balance"];?></td>
                                            </tr>
                                        <?php } ?>
                                        <?php if(sizeof($sql)==0){ ?>
                                            <tr>
                                                <td colspan="4" style="text-align: center;">No Summary Found</td>
                                            </tr>
                                        <?php } ?>
                                    </tbody> 
                                 </table>
                            </div>
                        </div>   
                        <div class="card-action">
                            <div class="row">
                                <div class="col-md-12">
                                    <a href="dashboard.php?action=user/usersellproducts" class="btn btn-warning btn-border">Back</a>
                                </div>                                        
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


  
         