
<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" style="padding-top:10px;padding-bottom:10px">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card-title">
                                        My Bank Account Information
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body"> 
                        <?php $bankInformation = $mysql->select("Select * from _tbl_member_banknames where MemberID='".$_SESSION['User']['MemberID']."'  order by BankID desc limit 0,1"); ?>
                        <?php if(sizeof($bankInformation)>0){?>
                            <div>
                                <div class="form-group row">
                                    <div class="col-sm-3">A/c holder Name</div>
                                    <div class="col-sm-9">
                                        <input type="text" disabled='disabled' style="background:#fff;border:1px solid #fff" class="form-control" value="<?php echo $bankInformation[0]['AccountHolderName'];?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-3">Account Number</div>
                                    <div class="col-sm-9">
                                        <input type="text" disabled='disabled' style="background:#fff;border:1px solid #fff" class="form-control" value="<?php echo $bankInformation[0]['AccountNumber'];?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-3">A/c Type</div>
                                    <div class="col-sm-9">
                                        <input type="text" disabled='disabled' style="background:#fff;border:1px solid #fff" class="form-control" value="<?php echo $bankInformation[0]['AccountType'];?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-3">IFS Code</div>
                                    <div class="col-sm-9">
                                        <input type="text" disabled='disabled' style="background:#fff;border:1px solid #fff" class="form-control" value="<?php echo $bankInformation[0]['IFSCode'];?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-3">Last Updated</div>
                                    <div class="col-sm-9">
                                        <input type="text" disabled='disabled' style="background:#fff;border:1px solid #fff" class="form-control" value="<?php echo $bankInformation[0]['Added'];?>">
                                    </div>
                                </div>     
                            </div> 
                        <?php } else {?>
                             <div class="form-group row" style="text-align:center;">
                                <div class="col-sm-12"><a class="mb-2 mr-2 btn btn-gradient-primary" href="Dashboard.php?action=AddMyBankAccountInformation">Add My Bank Account Information</a></div>
                             </div>
                         <?php } ?>
                        </div>
                    </div>                                                                                             
                </div>
            </div>
        </div>
    </div>
</div>
 