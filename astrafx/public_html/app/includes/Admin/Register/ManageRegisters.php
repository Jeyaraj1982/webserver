<?php
    $Registers =$mysql->select("select * from `_tbl_register` ORDER BY `CreatedOn` DESC");
    $title = "All Register Enquiries";                               
    $error = "No registers enquiries found";
?>
<div style="padding:25px">
    <div class="page-header">
        <ul class="breadcrumbs" style="border: none;padding-left: 0px;margin-left: 0px;">
            <li class="nav-home"><a href="dashboard.php"><i class="flaticon-home"></i></a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Register/ManageRegisters">Register Enquiries</a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Register/ManageRegisters">Manage Register Enquiries</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Manage Register Enquiries</h4>
                    <span><?php echo $title;?></span>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="basic-datatables" class="display table table-striped table-hover" >
                            <thead>
                                <tr>
                                    <th><label>Created On</label></th>
                                    <th><label>Name</label></th>
                                    <th><label>Email ID</label></th>
                                    <th><label>Mobile Number</label></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (sizeof($Registers)==0) { ?>
                                <tr>
                                    <td colspan="4" style="text-align:center;"><?php echo $error;?></td>
                                </tr>
                                <?php } ?>
                                <?php foreach ($Registers as $Register){ ?>
                                <tr>
                                    <td><?php  echo $Register['CreatedOn'];?></td>
                                    <td><?php  echo $Register['Name'];?></td>
                                    <td><?php  echo $Register['EmailID'];?></td>
                                    <td><?php  echo $Register['MobileNumber'];?></td>
                                    <td style="text-align:right;">
                                        <a href="dashboard.php?action=Register/ViewRegisterEnquiry&Rid=<?php echo $Register['RegID'];?>">View Enquiry</a>
                                    </td>
                                </tr>
                                <?php }?> 
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
 