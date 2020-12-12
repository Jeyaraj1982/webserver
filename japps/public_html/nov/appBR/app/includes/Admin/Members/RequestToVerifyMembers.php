<?php
    $Members =$mysql->select("select * from `_tbl_Members` where `ProfileInfoSubmit`='1' ||  `KycSubmit`='1' || `BankInfoSubmit`='1'");
    $title = "Request To Verify Members";
    $error = "No members found";
?>
<div style="padding:25px">
    <div class="page-header">
        <ul class="breadcrumbs" style="border: none;padding-left: 0px;margin-left: 0px;">
            <li class="nav-home"><a href="dashboard.php"><i class="flaticon-home"></i></a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Members/RequestToVerifyMembers">Members</a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Members/RequestToVerifyMembers">Manage Request to verify Members</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Manage Request to verify Members</h4>
                    <span><?php echo $title;?></span>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="basic-datatables" class="display table table-striped table-hover" >
                            <thead>
                                <tr>
                                    <th><label>Member ID</label></th>
                                    <th><label>Member Name</label></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (sizeof($Members)==0) { ?>
                                <tr>
                                    <td colspan="4" style="text-align:center;"><?php echo $error;?></td>
                                </tr>
                                <?php } ?>
                                <?php foreach ($Members as $Member){ ?>
                                <tr>
                                    <td><?php  echo $Member['MemberCode'];?></td>
                                    <td><?php  echo $Member['MemberName'];?></td>
                                    <td style="text-align:right;">
                                        <a href="dashboard.php?action=Members/ViewRequestToVerifyMember&MCode=<?php echo $Member['MemberCode'];?>">View Members</a>
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
 