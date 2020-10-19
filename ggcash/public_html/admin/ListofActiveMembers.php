<?php include_once("header.php");?>
<?php
 $mysqldb   = new MySqldatabase("localhost","ggcash_user","ggcash_user","ggcash_database");
  $Members =$mysqldb->select("select * from _tbl_Members where IsActive='1'");
  ?>
  <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-6 align-self-center">
                        <h4 class="page-title">List of members</h4>
                        <div class="d-flex align-items-center">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Members</li>
                                </ol>
                            </nav>
                        </div>
                        
                    </div>
                    <div class="col-6" style="text-align:right">
                        <h4 class="page-title"><a href="ListofMembers.php" ><small>All</small></a>&nbsp;|&nbsp;
                                <a href="ListofActiveMembers.php"><small style="font-weight:bold;text-decoration:underline">Active</small></a>&nbsp;|&nbsp;
                                <a href="ListofDeactiveMembers.php"><small>Deactive</small></a> </h4>
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
                                                <th class="border-top-0"><b>Member Name</b></th>
                                                <th class="border-top-0"><b>Member Email</b></th>
                                                <th class="border-top-0"><b>Member Mobile Number</b></th>
                                                <th class="border-top-0"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          <?php foreach ($Members as $Member){ ?>
                                            <tr>
                                                <td><span class="<?php echo ($Member['IsActive']==1) ? 'Activedot' : 'Deactivedot';?>"></span>&nbsp;&nbsp;&nbsp;<?php echo $Member['MemberName'];?></td>
                                                <td><?php echo $Member['MemberEmail'];?></td>
                                                <td><?php echo $Member['MobileNumber'];?></td>
                                                <td><a href="EditMember.php?code=<?php echo $Member['MemberID'];?>">Edit</a>&nbsp;&nbsp;&nbsp;
                                                <a href="ViewMember.php?code=<?php echo $Member['MemberID'];?>">View</a></td>
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


         <?php include_once("footer.php"); ?>



 
 