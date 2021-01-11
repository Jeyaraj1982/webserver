<?php

include_once("header.php");
if (! (isset($_SESSION['User']['AdminID']))) {
        ?>
        <script>
        location.href='../index.php';
        </script>
        <?php
    }

include_once("LeftMenu.php"); 

if (isset($_GET['action'])) {
         include_once($_GET['action'].".php");
     } else { ?>
<br><br>
<div class="main-panel full-height">
            <div class="container"  style="margin-top: 30px;">
                <div class="page-inner">
                    <div class="row">
                        <div class="col-sm-6 col-md-4">
                            <div class="card card-stats card-round">
                                <div class="card-body ">
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="icon-big text-center">
                                                <i class="flaticon-chart-pie text-warning"></i>
                                            </div>
                                        </div>
                                        <div class="col-8 col-stats">
                                            <div class="numbers">
                                                <p class="card-category">Total Members</p>
                                                <h4 class="card-title"><?php echo  sizeof($mysql->select("select * from  _tbl_member")); ?></h4>
                                                <p><a href="dashboard.php?action=members/allmembers">view Member</a></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header" style="padding-top:10px;padding-bottom:10px">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="card-title">
                                                Recent Members
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                         <table class="table table-striped mt-3">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Member Code</th>
                                                        <th scope="col">Member Name</th>
                                                        <th scope="col">Created On</th>
                                                        <th scope="col">Mobile Number</th>
                                                        <th scope="col"></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <?php $Members = $mysql->select("select * from _tbl_member order by MemberID Desc limit 0,10");?>
                                                    <?php foreach($Members as $Member){?>
                                                    <tr>
                                                        <td><?php echo $Member['MemberCode'];?></td>
                                                        <td><?php echo $Member['MemberName'];?></td>
                                                        <td><?php echo $Member['CreatedOn'];?></td>
                                                        <td><?php echo $Member['MemberMobileNumber'];?></td>
                                                        <td><a href="dashboard.php?action=EditMember&code=<?php echo $Member['MemberCode'];?>">Edit</a>&nbsp;&nbsp;<a href="dashboard.php?action=ViewMember&code=<?php echo $Member['MemberCode'];?>">View</a></td>
                                                    </tr>
                                                <?php } ?>
                                                <?php if(sizeof($Members)==0){ ?>
                                                    <tr>
                                                        <td colspan="5" style="text-align: center;">No Members Found</td>
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

<?php } ?>
<?php include_once("footer.php");?>