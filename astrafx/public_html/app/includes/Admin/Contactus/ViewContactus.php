<?php
    $Contacts =$mysql->select("select * from `_tbl_contact_us` ORDER BY `CreatedOn` DESC");
    $title = "All Contacts";                               
    $error = "No contacts found";
?>
<div style="padding:25px">
    <div class="page-header">
        <ul class="breadcrumbs" style="border: none;padding-left: 0px;margin-left: 0px;">
            <li class="nav-home"><a href="dashboard.php"><i class="flaticon-home"></i></a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Contactus/ViewContactus">Contacts</a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Contactus/ViewContactus">Manage Contacts</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Manage Contacts</h4>
                    <span><?php echo $title;?></span>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="basic-datatables" class="display table table-striped table-hover" >
                            <thead>
                                <tr>
                                    <th><label>Name</label></th>
                                    <th><label>Email ID</label></th>
                                    <th><label>Subject</label></th>
                                    <th><label>Created On</label></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (sizeof($Contacts)==0) { ?>
                                <tr>
                                    <td colspan="4" style="text-align:center;"><?php echo $error;?></td>
                                </tr>
                                <?php } ?>
                                <?php foreach ($Contacts as $Contact){ ?>
                                <tr>
                                    <td><?php  echo $Contact['ContactName'];?></td>
                                    <td><?php  echo $Contact['EmailID'];?></td>
                                    <td><?php  echo $Contact['Subject'];?></td>
                                    <td><?php  echo $Contact['CreatedOn'];?></td>
                                    <td style="text-align:right;">
                                        <a href="dashboard.php?action=Contactus/ViewContact&Cid=<?php echo $Contact['ContactID'];?>">View Contact</a>
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
 