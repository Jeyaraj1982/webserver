<?php
     $CaseDetails = $mysql->select("select * from _tbl_cases_register where md5(concat(CreatedOn,CaseID))='".$_GET['case']."'" );
     $client_data = $mysql->select("select * from _tbl_master_clients  where ClientID='".$CaseDetails[0]['ClientID']."'");
?>
<div class="container-fluid">
    <div class="page-title">
        <div class="row">
            <div class="col-6">
                <h3>
                    Case Details</h3>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-3 box-col-6 pe-0">
            <div class="file-sidebar">
                <div class="card">
                    <div class="card-body">
                        <div  style="text-align:center;margin-bottom: 25px;">
                        <?php if (strlen(trim($client_data[0]['ProfilePhoto']))>0) { ?>
                                <img src="<?php echo $client_data[0]['ProfilePhoto'];?>" class="me-3 rounded-circle" style="max-width: 100%;height:180px;border:1px solid #ccc;margin-right:0px  !important;"> 
                                <?php } else { ?>
                                <img src="assets/app/noimage.jpg" class="me-3 rounded-circle" style="height:100px;border:1px solid #ccc;margin-right:0px !important">                            
                                 <?php } ?>
                                 
                            
                            <br>
                            <h6 class="f-w-600" style="margin-top: 10px;margin-bottom: 0px;"><?php echo  $client_data[0]['ClientName'];?></h6>
                            <p style="color:#777">Case/CNR: <?php echo $CaseDetails[0]['CaseNumber'];?><?php echo $CaseDetails[0]['CNRNumber'];?> </p> 
                        </div>
                        <ul>
                            <li><div class="<?php echo ($_GET['action']=='Cases/view' && (!(isset($_GET['sa'])))) ? 'btn btn-primary' : 'btn btn-light';?>" onclick="location.href='dashboard.php?action=Cases/view&case=<?php echo $_GET['case'];?>'" ><i data-feather="home"></i>Home</div></li>
                            <li><div class="<?php echo $_GET['action']=='Cases/case_information' ? 'btn btn-primary' : 'btn btn-light';?>" onclick="location.href='dashboard.php?action=Cases/case_information&case=<?php echo $_GET['case'];?>'"><i data-feather="layers"></i>Case info</div></li>
                            <li><div class="<?php echo $_GET['action']=='Cases/client_information' ? 'btn btn-primary' : 'btn btn-light';?>"   onclick="location.href='dashboard.php?action=Cases/client_information&case=<?php echo $_GET['case'];?>'"><i data-feather="users"></i>Client info</div></li> 
                            <li><hr></li>
                            <li><div class="<?php echo ($_GET['sa']=='Hiring/list' || $_GET['sa']=='Hiring/add' || $_GET['sa']=='Hiring/edit') ? 'btn btn-primary' : 'btn btn-light';?>" onclick="location.href='dashboard.php?action=Cases/view&sa=Hiring/list&case=<?php echo $_GET['case'];?>'"><i data-feather="calendar"></i>Hiring</div></li>
                            <li><div class="<?php echo ($_GET['sa']=='TimeSheet/list' || $_GET['sa']=='TimeSheet/add' || $_GET['sa']=='TimeSheet/edit') ? 'btn btn-primary' : 'btn btn-light';?>" onclick="location.href='dashboard.php?action=Cases/view&sa=TimeSheet/list&case=<?php echo $_GET['case'];?>'"><i data-feather="clock"></i>Time Sheet</div></li>
                            <li><div class="<?php echo ($_GET['sa']=='IADetails/list' || $_GET['sa']=='IADetails/add' || $_GET['sa']=='IADetails/edit') ? 'btn btn-primary' : 'btn btn-light';?>" onclick="location.href='dashboard.php?action=Cases/view&sa=IADetails/list&case=<?php echo $_GET['case'];?>'"><i data-feather="clock"></i>IA Details</div></li>
                            <li><div class="<?php echo ($_GET['sa']=='Documents/list' || $_GET['sa']=='Documents/add' || $_GET['sa']=='Documents/edit') ? 'btn btn-primary' : 'btn btn-light';?>" onclick="location.href='dashboard.php?action=Cases/view&sa=Documents/list&case=<?php echo $_GET['case'];?>'"><i data-feather="file-text"></i>Documents</div></li>
                            <li><div class="<?php echo ($_GET['sa']=='Notes/list' || $_GET['sa']=='Notes/add' || $_GET['sa']=='Notes/edit') ? 'btn btn-primary' : 'btn btn-light';?>" onclick="location.href='dashboard.php?action=Cases/view&sa=Notes/list&case=<?php echo $_GET['case'];?>'"><i data-feather="check-square"></i>Notes</div></li>
                            <li><div class="<?php echo ($_GET['sa']=='Expenses/list' || $_GET['sa']=='Expenses/add' || $_GET['sa']=='Expenses/edit') ? 'btn btn-primary' : 'btn btn-light';?>" onclick="location.href='dashboard.php?action=Cases/view&sa=Expenses/list&case=<?php echo $_GET['case'];?>'"><i data-feather="file-text"></i>Expenses</div></li>
                            <li><div class="<?php echo ($_GET['sa']=='AmountRecevied/list' || $_GET['sa']=='AmountRecevied/add' || $_GET['sa']=='AmountRecevied/edit') ? 'btn btn-primary' : 'btn btn-light';?>" onclick="location.href='dashboard.php?action=Cases/view&sa=AmountRecevied/list&case=<?php echo $_GET['case'];?>'"><i data-feather="edit-2"></i>Amount Recevied</div></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-9 col-md-12 box-col-12">
            <div class="file-content">