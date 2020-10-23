<?php 

 $Requests  = $mysql->select("SELECT * FROM _tbl_member where MemberName like '%".$_POST['MemberCode']."%' or MobileNumber like '%".$_POST['MemberCode']."%'");
  ?>
<div style="padding:25px">
    <div class="page-header">
        <ul class="breadcrumbs" style="border: none;padding-left: 0px;margin-left: 0px;">
            <li class="nav-home"><a href="dashboard.php"><i class="flaticon-home"></i></a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Distributors/List">Wallet</a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Distributors/List">Refill Users</a></li>
        </ul>
    </div>
    
    <div class="row">
        <div class="col-lg-12 col-xlg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-header">
                        <h4 class="card-title">Manage Users</h4>
                        <span><?php echo $title;?></span>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="basic-datatables" class="display table table-striped table-hover" >
                                <thead>
                                    <tr>
                                        <th><b>User Name</b></th>
                                        <th><b>Mobile Number</b></th>
                                        <th><b>Distributor</b></th>
                                        <th><b>Status</b></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($Requests as $Request){ ?>
                                    <tr>
                                        <td><?php echo $Request['MemberName'];?></td>
                                        <td style="text-align: center"><?php echo $Request['MobileNumber'];?></td>
                                        <td style="text-align: left"><?php echo $Request['MapedToName'];?></td>
                                       
                                        <td style="text-align: center"><?php echo $Request['IsActive']==1 ? "Active" : "Deactive";?></td>
                                        <td style="text-align: center">
                                         <a href="dashboard.php?action=Wallets/Refill_now&Member=<?php echo $Request['MemberID'];?>"  class="btn btn-primary  btn-xs" >Refill</a>
                                        </td>
                                    </tr>
                                    <?php }?>  
                                    <?php if(sizeof($Requests)=="0"){?>
                                    <tr>
                                        <td colspan="6" style="text-align: center;">No Datas Found</td>
                                    </tr>
                             <?php }?>  
                            </tbody>
                        </table>
                        <a href="dashboard.php?action=Wallets/Refill" class="btn btn-outline-primary" >Back</a>
                    </div>
                    </div>                               
                </div>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#basic-datatables').DataTable({});
    });
</script> 