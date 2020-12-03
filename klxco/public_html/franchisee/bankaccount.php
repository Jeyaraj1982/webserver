<?php  $data = $mysql->select("select * from _tbl_franchisee where userid='".$_GET['frid']."'");  ?>
<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" style="padding-top:10px;padding-bottom:10px">
                            <div class="card-title">
                                View Franchisee
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="Name" class="col-md-3 text-right">Franchisee Name</label>
                                <div class="col-md-3"><?php echo $data[0]['FranchiseeName'];?></div>
                            </div>
                            <div class="form-group row">
                                <label for="Name" class="col-md-3 text-right">Email ID</label>
                                <div class="col-md-3"><?php echo $data[0]['EmailID'];?></div>
                            </div>
                            <div class="form-group row">
                                <label for="Name" class="col-md-3 text-right">IsActive</label>
                                <div class="col-md-3"><?php if($data[0]['IsActive']==1){ echo "Active" ;}else { "Deactive";};?></div>
                            </div>
                            <div class="form-group row">
                                <label for="Name" class="col-md-3 text-right">Created On</label>
                                <div class="col-md-3"><?php echo $data[0]['CreatedOn'];?></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<?php
    $bankdetails = $mysql->select("select * from _tbl_franchisee_bank_details where FranchiseeID='".$_GET['frid']."'");
?> 

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" style="padding-top:10px;padding-bottom:10px">
                            <div class="card-title">
                                Bank Account Details
                            </div>
                        </div>
                        <?php if(sizeof($bankdetails)!=0) { ?>
                        <div class="card-body">
                            <div class="form-group row">
                                <label class="col-md-3 text-right">Bank Name</label>
                                <div class="col-md-7"><?php echo $bankdetails[0]['BankName'];?></div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 text-right">Branch Name</label>
                                <div class="col-md-7"><?php echo $bankdetails[0]['BranchName'];?></div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 text-right">City</label>
                                <div class="col-md-7"><?php echo $bankdetails[0]['City'];?></div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 text-right">District</label>
                                <div class="col-md-7"><?php echo $bankdetails[0]['District'];?></div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 text-right">District</label>
                                <div class="col-md-7"><?php echo $bankdetails[0]['State'];?></div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 text-right">Account Holder Name</label>
                                <div class="col-md-7"><?php echo $bankdetails[0]['AccountName'];?></div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 text-right">Account Number</label>
                                <div class="col-md-7"><?php echo $bankdetails[0]['AccountNumber'];?></div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-3 text-right">IFSCode</label>
                                <div class="col-md-7"><?php echo $bankdetails[0]['IFSCode'];?></div>
                            </div>
                        </div>  
                        <div class="card-action">
                            <div class="row">
                                <div class="col-md-12">
                                    <a href="https://klx.co.in/klxadmin/dashboard.php?action=franchisee/list&f=a">Back</a> 
                                </div>                                        
                            </div>
                        </div> 
                        <?php } else {   ?>
                         <div class="card-body" style="text-align: center;">
                            Bank Details Not Updated   
                         </div>
                            
                        <?php } ?>
                    </div>                                                                                             
                </div>
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function() {$('#myTable').DataTable({ "order": [[ 0, "desc" ]]});

$('#fdate').datetimepicker({
            format: 'YYYY-MM-DD',
        });
        
        $('#tdate').datetimepicker({
            format: 'YYYY-MM-DD',
        });

});

</script>