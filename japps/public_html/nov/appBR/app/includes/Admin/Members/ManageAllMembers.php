<div style="padding:25px">
    <div class="page-header">
        <ul class="breadcrumbs" style="border: none;padding-left: 0px;margin-left: 0px;">
            <li class="nav-home"><a href="dashboard.php"><i class="flaticon-home"></i></a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Members/ManageAllMembers">Members</a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Members/ManageAllMembers">Manage All Members</a></li>
        </ul>
    </div>
    
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Members</h4>
                    <span><?php echo $title;?></span>
                </div>
                    <div class="card-body">
                        <form action="" method="post">
                            <div class="form-group row">
                                <div class="col-sm-3">
                                    <label>From</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control success" id="From" name="From" value="<?php echo isset($_POST['From']) ? $_POST['From'] : date("Y-m-d");?>" required="" aria-invalid="false"><label id="From-error" class="error" for="From"></label>
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-calendar-check"></i>
                                            </span>
                                        </div>
                                    </div>    
                                </div>
                                <div class="col-sm-3">
                                    <label class="col-sm-1">To</label>
                                    <div class="input-group">
                                        <input type="text" class="form-control success" id="To" name="To" value="<?php echo isset($_POST['To']) ? $_POST['To'] : date("Y-m-d");?>" required="" aria-invalid="false"><label id="To-error" class="error" for="To"></label>
                                        <div class="input-group-append">
                                            <span class="input-group-text">
                                                <i class="fa fa-calendar-check"></i>
                                            </span>
                                        </div>
                                    </div>    
                                </div>
                                <div class="col-sm-2"><label class="col-sm-1"> &nbsp;</label><button type="submit" name="viewTransaction" class="btn btn-primary">View Members</button></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</div>

 <?php if(strlen($_POST['From'])!=0 && strlen($_POST['To'])!=0) {?>   
<?php
    $Members =$mysql->select("select * from `_tbl_Members` where Date(`CreatedOn`)>=Date('".$_POST['From']."') and Date(`CreatedOn`)<=Date('".$_POST['To']."') order by MemberID Desc");
    $title = "All Members";
    $error = "No members found";
?>

<div style="padding:25px">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="basic-datatables" class="display table table-striped table-hover" style="width:2000px">
                            <thead>
                                <tr>
                                    <th style="width:140px !important"><label>Joined</label></th>
                                    <th style="width:100px !important"><label>Member ID</label></th>
                                    <th><label>Member Name</label></th>
                                    <th style="width:160px !important"><label>Package Name</label></th>
                                    <th style="width:130px !important"><label>Sponser ID</label></th>
                                    <th style="width:130px !important"><label>Upline ID</label></th>
                                    <th style="width:130px !important"><label>Left Count</label></th>
                                    <th style="width:140px !important"><label>Right Count</label></th>
                                    <th style="width:130px !important"><label>Left Carry</label></th>
                                    <th style="width:130px !important"><label>Right Carry</label></th>
                                    <th style="width:155px !important;"><label>Wallet Balance</label></th>
                                    <th style="width:150px !important"><label>A/C Closed On</label></th>
                                    <th style="width:155px !important"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php if (sizeof($Members)==0) { ?>
                                <tr>
                                    <td colspan="13" style="text-align:center;"><?php echo $error;?></td>
                                </tr>
                                <?php } ?>
                                <?php foreach ($Members as $Member){ ?>
                                <tr>
                                    <td><?php echo date("M d, Y",strtotime($Member['CreatedOn']));?></td>
                                    <td><?php  echo $Member['MemberCode'];?></td>
                                    <td><?php  echo $Member['MemberName'];?></td>
                                    <td><?php  echo $Member['CurrentPackageName'];?></td>
                                    <td><?php  echo $Member['SponsorCode'];?></td>
                                    <td><?php  echo $Member['UplineCode'];?></td>
                                    <td><?php  echo $Member[''];?></td>
                                    <td><?php  echo $Member[''];?></td>
                                    <td><?php  echo $Member[''];?></td>
                                    <td><?php  echo $Member[''];?></td>
                                    <td style="text-align:right"><?php  echo number_format(getEarningWalletBalance($Member['MemberID']),2);?></td>
                                    <td><?php  //echo date("M d, Y",strtotime($Member['']));?></td>
                                    <td style="text-align:right;">
                                        <a href="dashboard.php?action=Members/ViewMember&MCode=<?php echo $Member['MemberCode'];?>">View Members</a>
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
 <?php } ?>
 <script>
    $('#From').datetimepicker({
            format: 'YYYY-MM-DD'
        });
        $('#To').datetimepicker({
            format: 'YYYY-MM-DD'
        });

    </script>