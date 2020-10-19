<?php $Requests  = $mysqldb->select("select * from _tbl_member_bank_details where MemberID='".$_SESSION['User']['MemberID']."'"); ?>
<div class="page-wrapper"> 
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-6 align-self-center">
                <h4 class="page-title">Withdraw Requests</h4>
                <div class="d-flex align-items-center">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Manage Bank Accounts</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-xlg-12 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table v-middle" style="border: 1px solid; border-color: #e1e1e1;">
                                <thead>
                                    <tr>
                                        <th class="border-top-0"><b>Account Name</b></th>
                                        <th class="border-top-0"><b>Account Number</b></th>
                                        <th class="border-top-0"><b>Bank Name</b></th>
                                        <th class="border-top-0"><b>IFS Code</b></th>
                                        <th class="border-top-0"><b>Saved</b></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($Requests as $Request){ ?>
                                    <tr>
                                        <td><?php echo $Request['AccountName'];?></td>
                                        <td><?php echo $Request['AccountNumber'];?></td>
                                        <td><?php echo $Request['BankName'];?></td>
                                        <td><?php echo $Request['IFSCode'];?></td>
                                        <td><?php echo $Request['CreatedOn'];?></td>
                                    </tr>
                                    <?php }?>  
                                    <?php if(sizeof($Requests)=="0"){?>
                                    <tr>
                                        <td colspan="5" style="text-align: center;">No Datas Found</td>
                                    </tr>
                                    <?php }?>  
                                </tbody>
                            </table>
                            <a href="dashboard.php?action=Withdraw/AddBank">back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>
 
<?php include_once("footer.php"); ?>