<script>
    function SubmitSearch() {
        
        $('#ErrMemberDetails').html("");
                                            
        ErrorCount=0;
        
        if(IsNonEmpty("MemberDetails","ErrMemberDetails","Please Enter Valid Name or Mobile Number or Email")){
           IsSearch("MemberDetails","ErrMemberDetails","Please Enter more than 3 characters") 
        }
        
        if (ErrorCount==0) {
            return true;
        } else{
            return false;
        }
    }
</script>
<div class="main-panel full-height">
            <div class="container">
                <div class="panel-header">
                    <div class="page-inner border-bottom pb-0 mb-3">
                        <div class="d-flex align-items-left flex-column">
                            <h2 class="pb-2 fw-bold">Dashboard</h2>
                            <div class="nav-scroller d-flex">
                                <div class="nav nav-line nav-color-info d-flex align-items-center justify-contents-center">
                                   <!-- <a class="nav-link" href="dashboard.php?action=ManageForm16&Status=Submitted">New Jobs<span class="badge badge-info ml-2">
                                    <?php echo sizeof($mysql->select("select * from `_tbl_form_16` where InProccess='0'"));  ?>
                                    </span></a>
                                    <a class="nav-link" href="dashboard.php?action=ManageForm16&Status=InProccessed">Processing Jobs
                                    <span class="badge badge-warning ml-2">
                                    <?php echo sizeof($mysql->select("select * from `_tbl_form_16` where    IsApproved='1' and Completed='0'"));  ?>
                                    </span
                                    </a>
                                    <a class="nav-link" href="dashboard.php?action=ManageForm16&Status=Rejected">Cancelled Jobs<span class="badge badge-danger ml-2">
                                     <?php echo sizeof($mysql->select("select * from `_tbl_form_16` where    IsRejected='1' and Completed='0'"));  ?>
                                    </span></a> -->
                                      <form method="POST" action="dashboard.php?action=SearchMember" id="frms" onsubmit="return SubmitSearch();"> 
                                    <div class="form-group form-show-validation row">
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="MemberDetails" placeholder="Member Search" name="MemberDetails" value="<?php echo isset($_POST['MemberDetails']) ? $_POST['MemberDetails'] : '';?>" >
                                        <small style="color:#737373; font-size:X-smaller;" >eg: member's name or mobile number or email</small>  <br>
                                        <span class="errorstring" id="ErrMemberDetails"><?php echo isset($ErrMemberDetails)? $ErrMemberDetails : "";?></span>
                                     
                                </div>
                                    <div class="col-sm-2">
                                    <button type="submit" class="btn btn-warning" name="BtnSearch" id="BtnSearch">Search Member</button>
                                    </div>
                            </div>
                                </form>
                                </div>
                                 
                            </div>
                        </div>
                    </div>
                </div>
                <div class="page-inner">
                    <div class="row">
                        <div class="col-sm-6 col-md-3">
                            <div class="card card-stats card-round">
                                <div class="card-body ">
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="icon-big text-center">
                                                <i class="flaticon-user text-warning"></i>
                                            </div>
                                        </div>
                                        <div class="col-9 col-stats">
                                            <div class="numbers">
                                                <p class="card-category">Members</p>
                                                <h4 class="card-title">
                                                <?php
                                                   echo sizeof($mysql->select("select MemberID from _tbl_Members"));
                                                ?>
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="card card-stats card-round">
                                <div class="card-body ">
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="icon-big text-center">
                                                <i class="flaticon-network text-warning"></i>
                                            </div>
                                        </div>
                                        <div class="col-9 col-stats">
                                            <div class="numbers">
                                                <p class="card-category">Partners</p>
                                                <h4 class="card-title">
                                                <?php
                                                   echo sizeof($mysql->select("select AgentID from _tbl_Agents"));
                                                ?>
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="card card-stats card-round">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="icon-big text-center">
                                                <i class="flaticon-file-1 text-warning"></i>
                                            </div>
                                        </div>
                                        <div class="col-9 col-stats">
                                            <div class="numbers">
                                                <p class="card-category">Staffs</p>
                                                <h4 class="card-title">
                                                  <?php echo sizeof($mysql->select("SELECT * FROM _tbl_Admin WHERE IsAdmin='0'")); ?>
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="card card-stats card-round">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="icon-big text-center">
                                                <i class="flaticon-coins text-warning"></i>
                                            </div>
                                        </div>
                                        <div class="col-7 col-stats">
                                            <div class="numbers">
                                                <p class="card-category">Orders</p>
                                                <h4 class="card-title">
                                                <?php echo sizeof($mysql->select("select OrderID from _tbl_orders")); ?>
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-sm col-md">
                            <div class="card card-stats card-round">
                                <div class="card-body ">
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="icon-big text-center">
                                                <i class="flaticon-user text-warning"></i>
                                            </div>
                                        </div>
                                        <div class="col-9 col-stats">
                                            <div class="numbers">
                                                <p class="card-category">Submitted</p>
                                                <h4 class="card-title">
                                                <?php
                                                   echo sizeof($mysql->select("select * from `_tbl_form_16` where InProccess='0'"));
                                                ?>
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm col-m">
                            <div class="card card-stats card-round">
                                <div class="card-body ">
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="icon-big text-center">
                                                <i class="flaticon-network text-warning"></i>
                                            </div>
                                        </div>
                                        <div class="col-9 col-stats">
                                            <div class="numbers">
                                                <p class="card-category">Accepted</p>
                                                <h4 class="card-title">
                                                <?php
                                                   echo sizeof($mysql->select("select * from `_tbl_form_16` where InProccess='1'"));
                                                ?>
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm col-md">
                            <div class="card card-stats card-round">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="icon-big text-center">
                                                <i class="flaticon-file-1 text-warning"></i>
                                            </div>
                                        </div>
                                        <div class="col-9 col-stats">
                                            <div class="numbers">
                                                <p class="card-category">Inprocess</p>
                                                <h4 class="card-title">
                                                <?php
                                                     
                                                      echo sizeof($mysql->select("select * from `_tbl_form_16` where IsApproved='1' and Completed='0'"));
                                                    
                                                ?>
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm col-md">
                            <div class="card card-stats card-round">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="icon-big text-center">
                                                <i class="flaticon-coins text-warning"></i>
                                            </div>
                                        </div>
                                        <div class="col-8 col-stats">
                                            <div class="numbers">
                                                <p class="card-category">Completed</p>
                                                <h4 class="card-title">
                                                <?php echo sizeof($mysql->select("select id from _tbl_form_16 where Completed='1'"));?>
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm col-md">
                            <div class="card card-stats card-round">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-4">
                                            <div class="icon-big text-center">
                                                <i class="flaticon-coins text-warning"></i>
                                            </div>
                                        </div>
                                        <div class="col-8 col-stats">
                                            <div class="numbers">
                                                <p class="card-category">Rejected</p>
                                                <h4 class="card-title">
                                                <?php echo sizeof($mysql->select("select id from _tbl_form_16 where IsRejected='1' and Completed='0'"));?>
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    
                    
                    <div class="row">
                         
                        <div class="col-sm col-m">
                            <div class="card card-stats card-round">
                                <div class="card-body ">
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="icon-big text-center">
                                                <i class="flaticon-network text-warning"></i>
                                            </div>
                                        </div>
                                        <div class="col-9 col-stats">
                                            <div class="numbers">
                                                <p class="card-category">PG Success Txns</p>
                                                <h4 class="card-title">
                                                <?php
                                                   $d = $mysql->select("select sum(Amount) as amt from `_tbl_payments` where IsSuccess='1'");
                                                   echo number_format((isset($d[0]['amt'])? $d[0]['amt'] : 0),2)
                                                ?>
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm col-md">
                            <div class="card card-stats card-round">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="icon-big text-center">
                                                <i class="flaticon-file-1 text-warning"></i>
                                            </div>
                                        </div>
                                        <div class="col-9 col-stats">
                                            <div class="numbers">
                                                <p class="card-category">Member Wallet</p>
                                                <h4 class="card-title">
                                                <?php
                                                    $partners = $mysql->select("select * from _tbl_Members");
                                                    $val = 0;
                                                    foreach($partners as $p) {
                                                        $val += MemberWalletBalance($p['MemberID']);
                                                    }
                                                    echo number_format($val,2);
                                                ?>
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm col-md">
                            <div class="card card-stats card-round">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="icon-big text-center">
                                                <i class="flaticon-coins text-warning"></i>
                                            </div>
                                        </div>
                                        <div class="col-9 col-stats">
                                            <div class="numbers">
                                                <p class="card-category">Parter's Wallet</p>
                                                <h4 class="card-title">
                                                <?php
                                                    $partners = $mysql->select("select * from _tbl_Agents");
                                                    $val = 0;
                                                    foreach($partners as $p) {
                                                        $val += AgentWalletBalance($p['AgentID']);
                                                    }
                                                    echo number_format($val,2);
                                                ?>
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm col-md">
                            <div class="card card-stats card-round">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="icon-big text-center">
                                                <i class="flaticon-coins text-warning"></i>
                                            </div>
                                        </div>
                                        <div class="col-9 col-stats">
                                            <div class="numbers">
                                                <p class="card-category">Become a Partner</p>
                                                <h4 class="card-title">
                                                <?php echo sizeof($mysql->select("select * from _tbl_partner_join_requests order by PartnerReqID desc"));?>
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-8">
                            <div class="card">
                               
                             
                            </div>
                        </div>
                        <div class="col-md-4">
                            
                             <div class="card card-warning bg-warning-gradient">
                                <div class="card-body">
                                    <h4 class="mb-1 fw-bold">Tasks Progress</h4>
                                    <div id="task-complete" class="chart-circle mt-4 mb-3"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    
                    
                    
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">Financial Year</div>
                                </div>
                                <div class="card-body pb-0">
                                    
                                    <?php
                                        $financialyears = $mysql->select("select * from _tblFinancialYears order by YearOrder desc");
                                        foreach($financialyears as $fy) {
                                            $f = $mysql->select("select count(*) as cnt from _tbl_form_16 where FinancialYearID='".$fy['FinancialYearID']."'");
                                    ?>
                                
                                    <div class="d-flex">
                                        <div class="flex-1 pt-1 ml-2">
                                            <h6 class="fw-bold mb-1"><?php echo $fy['FinancialYear'];?></h6>
                                            <small class="text-muted">
                                            <?php
                                                $submitted= $mysql->select("select count(*) as cnt from `_tbl_form_16` where FinancialYearID='".$fy['FinancialYearID']."' and InProccess='0'"); 
                                                $accepted = $mysql->select("select count(*) as cnt from `_tbl_form_16` where FinancialYearID='".$fy['FinancialYearID']."' and InProccess='1'");
                                                $inprocess = $mysql->select("select count(*) as cnt from `_tbl_form_16` where FinancialYearID='".$fy['FinancialYearID']."' and IsApproved='1' and Completed='0'");  
                                                $completed =  $mysql->select("select count(*) as cnt from `_tbl_form_16` where FinancialYearID='".$fy['FinancialYearID']."' and Completed='1'");  
                                                $rejected = $mysql->select("select count(*) as cnt from `_tbl_form_16` where  FinancialYearID='".$fy['FinancialYearID']."' andIsRejected='1' and Completed='0'");  
                                                
                                                echo "<span style=''><b>S:</b> ".(isset($submitted[0]['cnt']) ? $submitted[0]['cnt']: "0")."</span>&nbsp;&nbsp; 
                                                      <span style='color:#1572EA'><b>A:</b> ".(isset($accepted[0]['cnt']) ? $accepted[0]['cnt']: "0")."</span>&nbsp;&nbsp; 
                                                      <span style='color:orange'><b>P:</b> ".(isset($inprocess[0]['cnt']) ? $inprocess[0]['cnt']: "0")."</span>&nbsp;&nbsp; 
                                                      <span style='color:green'><b>C:</b> ".(isset($completed[0]['cnt']) ? $completed[0]['cnt']: "0")."</span>&nbsp;&nbsp; 
                                                      <span style='color:#F3545D'><b>R:</b> ".(isset($rejected[0]['cnt']) ? $rejected[0]['cnt']: "0")."</span>";
                                            ?>
                                            
                                            
                                           
                                            
                                            </small>
                                        </div>
                                        <div class="d-flex ml-auto align-items-center">
                                            <h3 class="text-info fw-bold" style="font-size:29px"><?php echo isset($f[0]['cnt']) ? $f[0]['cnt'] : 0;?></h3>
                                        </div>
                                    </div>
                                    <div class="separator-dashed"></div>
                                    
                                    <?php } ?>
                                     
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">Staff Wise Pending</div>
                                </div>
                               <div class="card-body pb-0">
                                   
                                    
                                    
                                      
                                    <?php
                                        $financialyears = $mysql->select("select * from _tbl_Admin where IsAdmin='0' order by AdminID desc");
                                        foreach($financialyears as $fy) {
                                            
                                             $forms = $mysql->select("select FormID from _tbl_AssignedForms where StaffCode='".$fy['AdminCode']."' group by FormID");
                                           // $f = $mysql->select("select count(*) as cnt from _tbl_form_16 where FinancialYearID='".$fy['FinancialYearID']."'");
                                    ?>
                                       <div class="d-flex">
                                        <div class="flex-1 pt-1 ml-2">
                                            <h6 class="fw-bold mb-1">
                                            <a href="dashboard.php?action=Staffs/AssignedJobs&ACode=<?php echo $fy['AdminCode'];?>&Status=All"><?php echo $fy['AdminName'];?></a></h6>
                                            <small class="text-muted">
                                            <?php
                                               // $submitted= $mysql->select("select count(*) as cnt from `_tbl_form_16` where FinancialYearID='".$fy['FinancialYearID']."' and InProccess='0'"); 
                                                //$accepted = $mysql->select("select count(*) as cnt from `_tbl_form_16` where FinancialYearID='".$fy['FinancialYearID']."' and InProccess='1'");
                                               // $inprocess = $mysql->select("select count(*) as cnt from `_tbl_form_16` where FinancialYearID='".$fy['FinancialYearID']."' and IsApproved='1' and Completed='0'");  
                                               // $completed =  $mysql->select("select count(*) as cnt from `_tbl_form_16` where FinancialYearID='".$fy['FinancialYearID']."' and Completed='1'");  
                                               // $rejected = $mysql->select("select count(*) as cnt from `_tbl_form_16` where  FinancialYearID='".$fy['FinancialYearID']."' andIsRejected='1' and Completed='0'");  
                                                
                                                
                                                $inprocess = $mysql->select("select count(*) as cnt from `_tbl_form_16` where id in (SELECT FormID FROM _tbl_AssignedForms WHERE StaffCode='".$fy['AdminCode']."' GROUP BY FormID) and IsApproved='1' and Completed='0'");  
                                            ?>
                                           Assigned: <?php echo sizeof($forms)  ;?>
                                            
                                           
                                            
                                            </small>
                                        </div>
                                        <div class="d-flex ml-auto align-items-center">
                                            <h3 class="text-info fw-bold" style="font-size:29px"><?php echo isset($inprocess[0]['cnt']) ? $inprocess[0]['cnt'] : 0;?></h3>
                                        </div>
                                    </div>
                                     <div class="separator-dashed"></div>
                                        
                                    <?php } ?>
                                       
                                    
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card card-warning bg-warning-gradient">
                                <div class="card-body">
                                    <h4 class="mt-3 b-b1 pb-2 mb-4 fw-bold">Active user right now</h4>
                                    <h1 class="mb-4 fw-bold">17</h1>
                                    <h4 class="mt-3 b-b1 pb-2 mb-5 fw-bold">Page view per minutes</h4>
                                    <div id="activeUsersChart"><canvas style="display: inline-block; width: 294px; height: 100px; vertical-align: top;" width="294" height="100"></canvas></div>
                                    <h4 class="mt-5 pb-3 mb-0 fw-bold">Top active pages</h4>
                                    <ul class="list-unstyled">
                                        <li class="d-flex justify-content-between pb-1 pt-1"><small>/product/readypro/index.html</small> <span>7</span></li>
                                        <li class="d-flex justify-content-between pb-1 pt-1"><small>/product/atlantis/demo.html</small> <span>10</span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                   <div class="row">
                         <div class="col-md-12">
                            <div class="card">
                          
                                <div class="card-body">
                                    <ul class="nav nav-pills nav-secondary nav-pills-no-bd" id="pills-tab-without-border" role="tablist">
                                        <li class="nav-item submenu">
                                            <a class="nav-link active show" id="pills-home-tab-nobd" data-toggle="pill" href="#pills-members" role="tab" aria-controls="pills-members" aria-selected="true">Recent Members</a>
                                        </li>
                                        <li class="nav-item submenu">
                                            <a class="nav-link " id="pills-profile-tab-nobd" data-toggle="pill" href="#pills-payments" role="tab" aria-controls="pills-payments" aria-selected="false">Recent Payments</a>
                                        </li>
                                        <li class="nav-item submenu">
                                            <a class="nav-link" id="pills-contact-tab-nobd" data-toggle="pill" href="#pills-mobilesms" role="tab" aria-controls="pills-mobilesms" aria-selected="false">Recently sent Mobile SMS</a>
                                        </li>
                                         <li class="nav-item submenu">
                                            <a class="nav-link" id="pills-contact-tab-nobd" data-toggle="pill" href="#pills-emails" role="tab" aria-controls="pills-emails" aria-selected="false">Recently sent emails</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content mt-2 mb-3" id="pills-without-border-tabContent">
                                        <div class="tab-pane fade active show" id="pills-members" role="tabpanel" aria-labelledby="pills-home-tab-nobd">
                                          
         <div class="table-responsive">
                                <table id="myTable" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Created</th>
                                            <th>Member Name</th>                                                                                           
                                            <th>Mobile Number</th> 
                                            <th>Created By</th> 
                                            <th>No of Forms</th>
                                            <th></th>
                                        </tr>
                                    </thead>                                                                         
                                    <tbody>
                                    <?php
                                    $sql= $mysql->select("select * from `_tbl_Members` order by `MemberID` desc limit 0,5");
                                    foreach($sql as $member){ 
                                        $form = $mysql->select("SELECT COUNT(id) AS cnt FROM _tbl_form_16 where FormByID='".$member['MemberID']."'");?>
                                        <tr>
                                            <td><span class="<?php echo ($member['IsActive']==1) ? 'Activedot' : 'Deactivedot';?>"></span>&nbsp;&nbsp;&nbsp;<?php echo date("d M, Y H:i",strtotime($member['CreatedOn']));?></td>
                                            <td><?php echo $member['MemberName'];?></td>
                                            <td><?php echo $member['MobileNumber'];?><?php if($member['IsMobileNumberVerified']==1){ ?> <img src="../assets/icon_verified.png"><?php } else {?> <img class="imageGrey" src="../assets/icon_verified.png"><?php } ?></td>
                                            <td><?php if($member['IsCustomer']==0){
                                                      echo "Member";
                                                      }if($member['IsCustomer']==1){
                                                      echo "Partner";
                                                      }
                                                      if($member['IsCustomer']==2){
                                                         echo "Staff";
                                                      }
                                                      if($member['IsCustomer']==3){
                                                         echo "Admin";
                                                      }  ?></td>                                                          
                                            
                                                                                                 
                                            <td style="text-align: right"><?php echo $form[0]['cnt'];?></td>
                                            <td>
                                                <div class="dropdown dropdown-kanban" style="float: right;">
                                                    <button class="" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border:none;font-size:14px;background:none !important;padding-right:0px;margin-right:0px;cursor:pointer">
                                                        <i class="icon-options-vertical"></i>
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <a class="dropdown-item" href="dashboard.php?action=EditMember&MCode=<?php echo $member['MemberCode'];?>" draggable="false">Edit</a>
                                                        <a class="dropdown-item" href="dashboard.php?action=ViewMember&MCode=<?php echo $member['MemberCode'];?>" draggable="false">View</a>
                                                        <a class="dropdown-item" href="dashboard.php?action=CreateMemberForm16&MCode=<?php echo $member['MemberCode'];?>" draggable="false">Create Form</a>
                                                        <a class="dropdown-item" href="dashboard.php?action=ManageForm16ByMember&MCode=<?php echo $member['MemberCode'];?>&Status=All" draggable="false">View Forms</a>
                                                        <a class="dropdown-item" href="dashboard.php?action=MemberSMSLog&MCode=<?php echo $member['MemberCode'];?>" draggable="false">SMS Log</a>
                                                        <a class="dropdown-item" href="dashboard.php?action=MemberEmailLog&MCode=<?php echo $member['MemberCode'];?>" draggable="false">Email Log</a>
                                                        <a class="dropdown-item" href="dashboard.php?action=MemberLoginLog&MCode=<?php echo $member['MemberCode'];?>&Status=All" draggable="false">Login Log</a>
                                                        <a class="dropdown-item" href="dashboard.php?action=MemberOrders&MCode=<?php echo $member['MemberCode'];?>&Status=All" draggable="false">Orders</a>
                                                        <a class="dropdown-item" href="dashboard.php?action=MemberInvoices&MCode=<?php echo $member['MemberCode'];?>&Status=All" draggable="false">Invoices</a>
                                                        <a class="dropdown-item" href="dashboard.php?action=MemberPayments&MCode=<?php echo $member['MemberCode'];?>&Status=All" draggable="false">Payments</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            </div>
                                       
                                      <div class="tab-pane fade " id="pills-payments" role="tabpanel" aria-labelledby="pills-profile-tab-nobd">
                                            <div class="table-responsive">
                                <table id="myTable" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Payment Date</th>
                                            <th>Order Number</th>
                                            <th>Member Code</th> 
                                            <th>Status</th>
                                            <th></th>
                                        </tr>
                                    </thead>                                                                         
                                    <tbody>
                                    <?php 
                                     $sql= $mysql->select("select * from `_tbl_payments`     order by `PaymentID` desc limit 0,5 ");
                                     foreach($sql as $order){ ?>
                                        <tr>
                                            <td><?php echo date("d M, Y H:i",strtotime($order['PaymentDate']));?></td>
                                            <td><?php echo $order['OrderNumber'];?></td>
                                            <td><?php echo $order['MemberCode'];?></td>
                                            <td><?php if($order['IsSuccess']==1){ echo "Success";}else { echo "Failure";}?></td>
                                            <td>
                                                <div class="dropdown dropdown-kanban" style="float: right;">
                                                    <button class="" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border:none;font-size:14px;background:none !important;padding-right:0px;margin-right:0px;cursor:pointer">
                                                        <i class="icon-options-vertical"></i>
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <a class="dropdown-item" href="dashboard.php?action=Accounts/ViewPayments&Code=<?php echo $order['PaymentID'];?>" draggable="false">View</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    </tbody> 
                                </table>
                            </div>   
                                        </div> 
                                        
                                         
                                        <div class="tab-pane fade" id="pills-mobilesms" role="tabpanel" aria-labelledby="pills-contact-tab-nobd">
                                           <div class="table-responsive">
                                <table id="myTable" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>SMS To</th>
                                            <th>Message</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php 
       $sql= $mysql->select("select * from `_tbl_Log_MobileSMS` order by `SMSID` desc limit 0,5 ");
?>
                                    <?php  foreach($sql as $log){ ?>
                                        <tr>
                                            <td><?php echo date("d M, Y H:i",strtotime($log['MessagedOn']));?></td>
                                            <td><?php echo $log['SmsTo'];?></td>
                                            <td><?php echo $log['Message'];?></td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                                        </div>
                                           
                                 
                                        <div class="tab-pane fade" id="pills-emails" role="tabpanel" aria-labelledby="pills-contact-tab-nobd">
                                           <div class="table-responsive">
                                <table id="myTable" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Email To</th>
                                            <th>Subject</th>   
                                            <th>Status</th>
                                            <th>Attachment</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php  
                                     $sql= $mysql->select("select * from `_tbl_logs_email` order by `EmailLogID` desc limit 0,5");
                                    foreach($sql as $log){ ?>
                                        <tr>
                                            <td><?php echo date("d M, Y H:i",strtotime($log['EmailRequestedOn']));?></td>
                                            <td><?php echo $log['EmailTo'];?></td>
                                            <td><?php echo $log['EmailSubject'];?></td>
                                            <td><?php if($log['IsSuccess']==1) { echo "Success"; } else { echo "Failure"; }?></td>
                                               <td><?php if($log['IsAttachment']==1) { echo "attached";
                                               ?>
                                               <a href="<?php echo $log['AttachmentFile'];?>"><i class="fas fa-cloud-download-alt"></i></a>
                                               <?php
                                               }  ?></td>
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
                   </div>
                   <!--  
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">Top Products</div>
                                </div>
                                <div class="card-body pb-0">
                                    <div class="d-flex">
                                        <div class="avatar">
                                            <img src="../assets/img/logoproduct.svg" alt="..." class="avatar-img rounded-circle">
                                        </div>
                                        <div class="flex-1 pt-1 ml-2">
                                            <h6 class="fw-bold mb-1">CSS</h6>
                                            <small class="text-muted">Cascading Style Sheets</small>
                                        </div>
                                        <div class="d-flex ml-auto align-items-center">
                                            <h3 class="text-info fw-bold">+$17</h3>
                                        </div>
                                    </div>
                                    <div class="separator-dashed"></div>
                                    <div class="d-flex">
                                        <div class="avatar">
                                            <img src="../assets/img/logoproduct.svg" alt="..." class="avatar-img rounded-circle">
                                        </div>
                                        <div class="flex-1 pt-1 ml-2">
                                            <h6 class="fw-bold mb-1">J.CO Donuts</h6>
                                            <small class="text-muted">The Best Donuts</small>
                                        </div>
                                        <div class="d-flex ml-auto align-items-center">
                                            <h3 class="text-info fw-bold">+$300</h3>
                                        </div>
                                    </div>
                                    <div class="separator-dashed"></div>
                                    <div class="d-flex">
                                        <div class="avatar">
                                            <img src="../assets/img/logoproduct3.svg" alt="..." class="avatar-img rounded-circle">
                                        </div>
                                        <div class="flex-1 pt-1 ml-2">
                                            <h6 class="fw-bold mb-1">Ready Pro</h6>
                                            <small class="text-muted">Bootstrap 4 Admin Dashboard</small>
                                        </div>
                                        <div class="d-flex ml-auto align-items-center">
                                            <h3 class="text-info fw-bold">+$350</h3>
                                        </div>
                                    </div>
                                    <div class="separator-dashed"></div>
                                    <div class="pull-in"><div style="position: absolute; inset: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;" class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div></div><div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;"><div style="position:absolute;width:200%;height:200%;left:0; top:0"></div></div></div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-title fw-mediumbold">Suggested People</div>
                                    <div class="card-list">
                                        <div class="item-list">
                                            <div class="avatar">
                                                <img src="../assets/img/jm_denis.jpg" alt="..." class="avatar-img rounded-circle">
                                            </div>
                                            <div class="info-user ml-3">
                                                <div class="username">Jimmy Denis</div>
                                                <div class="status">Graphic Designer</div>
                                            </div>
                                            <button class="btn btn-icon btn-primary btn-round btn-xs">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                        <div class="item-list">
                                            <div class="avatar">
                                                <img src="../assets/img/chadengle.jpg" alt="..." class="avatar-img rounded-circle">
                                            </div>
                                            <div class="info-user ml-3">
                                                <div class="username">Chad</div>
                                                <div class="status">CEO Zeleaf</div>
                                            </div>
                                            <button class="btn btn-icon btn-primary btn-round btn-xs">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                        <div class="item-list">
                                            <div class="avatar">
                                                <img src="../assets/img/talha.jpg" alt="..." class="avatar-img rounded-circle">
                                            </div>
                                            <div class="info-user ml-3">
                                                <div class="username">Talha</div>
                                                <div class="status">Front End Designer</div>
                                            </div>
                                            <button class="btn btn-icon btn-primary btn-round btn-xs">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                        <div class="item-list">
                                            <div class="avatar">
                                                <img src="../assets/img/mlane.jpg" alt="..." class="avatar-img rounded-circle">
                                            </div>
                                            <div class="info-user ml-3">
                                                <div class="username">John Doe</div>
                                                <div class="status">Back End Developer</div>
                                            </div>
                                            <button class="btn btn-icon btn-primary btn-round btn-xs">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                        <div class="item-list">
                                            <div class="avatar">
                                                <img src="../assets/img/talha.jpg" alt="..." class="avatar-img rounded-circle">
                                            </div>
                                            <div class="info-user ml-3">
                                                <div class="username">Talha</div>
                                                <div class="status">Front End Designer</div>
                                            </div>
                                            <button class="btn btn-icon btn-primary btn-round btn-xs">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                        <div class="item-list">
                                            <div class="avatar">
                                                <img src="../assets/img/jm_denis.jpg" alt="..." class="avatar-img rounded-circle">
                                            </div>
                                            <div class="info-user ml-3">
                                                <div class="username">Jimmy Denis</div>
                                                <div class="status">Graphic Designer</div>
                                            </div>
                                            <button class="btn btn-icon btn-primary btn-round btn-xs">
                                                <i class="fa fa-plus"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card card-primary bg-primary-gradient">
                                <div class="card-body">
                                    <h4 class="mt-3 b-b1 pb-2 mb-4 fw-bold">Active user right now</h4>
                                    <h1 class="mb-4 fw-bold">17</h1>
                                    <h4 class="mt-3 b-b1 pb-2 mb-5 fw-bold">Page view per minutes</h4>
                                    <div id="activeUsersChart"> </div>
                                    <h4 class="mt-5 pb-3 mb-0 fw-bold">Top active pages</h4>
                                    <ul class="list-unstyled">
                                        <li class="d-flex justify-content-between pb-1 pt-1"><small>/product/readypro/index.html</small> <span>7</span></li>
                                        <li class="d-flex justify-content-between pb-1 pt-1"><small>/product/atlantis/demo.html</small> <span>10</span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">Feed Activity</div>
                                </div>
                                <div class="card-body">
                                    <ol class="activity-feed">
                                        <li class="feed-item feed-item-secondary">
                                            <time class="date" datetime="9-25">Sep 25</time>
                                            <span class="text">Responded to need <a href="#">"Volunteer opportunity"</a></span>
                                        </li>
                                        <li class="feed-item feed-item-success">
                                            <time class="date" datetime="9-24">Sep 24</time>
                                            <span class="text">Added an interest <a href="#">"Volunteer Activities"</a></span>
                                        </li>
                                        <li class="feed-item feed-item-info">
                                            <time class="date" datetime="9-23">Sep 23</time>
                                            <span class="text">Joined the group <a href="single-group.php">"Boardsmanship Forum"</a></span>
                                        </li>
                                        <li class="feed-item feed-item-warning">
                                            <time class="date" datetime="9-21">Sep 21</time>
                                            <span class="text">Responded to need <a href="#">"In-Kind Opportunity"</a></span>
                                        </li>
                                        <li class="feed-item feed-item-danger">
                                            <time class="date" datetime="9-18">Sep 18</time>
                                            <span class="text">Created need <a href="#">"Volunteer Opportunity"</a></span>
                                        </li>
                                        <li class="feed-item">
                                            <time class="date" datetime="9-17">Sep 17</time>
                                            <span class="text">Attending the event <a href="single-event.php">"Some New Event"</a></span>
                                        </li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-head-row">
                                        <div class="card-title">Support Tickets</div>
                                        <div class="card-tools">
                                            <ul class="nav nav-pills nav-secondary nav-pills-no-bd nav-sm" id="pills-tab" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link" id="pills-today" data-toggle="pill" href="#pills-today" role="tab" aria-selected="true">Today</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link active" id="pills-week" data-toggle="pill" href="#pills-week" role="tab" aria-selected="false">Week</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="pills-month" data-toggle="pill" href="#pills-month" role="tab" aria-selected="false">Month</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="d-flex">
                                        <div class="avatar avatar-online">
                                            <span class="avatar-title rounded-circle border border-white bg-info">J</span>
                                        </div>
                                        <div class="flex-1 ml-3 pt-1">
                                            <h6 class="text-uppercase fw-bold mb-1">Joko Subianto <span class="text-warning pl-3">pending</span></h6>
                                            <span class="text-muted">I am facing some trouble with my viewport. When i start my</span>
                                        </div>
                                        <div class="float-right pt-1">
                                            <small class="text-muted">8:40 PM</small>
                                        </div>
                                    </div>
                                    <div class="separator-dashed"></div>
                                    <div class="d-flex">
                                        <div class="avatar avatar-offline">
                                            <span class="avatar-title rounded-circle border border-white bg-secondary">P</span>
                                        </div>
                                        <div class="flex-1 ml-3 pt-1">
                                            <h6 class="text-uppercase fw-bold mb-1">Prabowo Widodo <span class="text-success pl-3">open</span></h6>
                                            <span class="text-muted">I have some query regarding the license issue.</span>
                                        </div>
                                        <div class="float-right pt-1">
                                            <small class="text-muted">1 Day Ago</small>
                                        </div>
                                    </div>
                                    <div class="separator-dashed"></div>
                                    <div class="d-flex">
                                        <div class="avatar avatar-away">
                                            <span class="avatar-title rounded-circle border border-white bg-danger">L</span>
                                        </div>
                                        <div class="flex-1 ml-3 pt-1">
                                            <h6 class="text-uppercase fw-bold mb-1">Lee Chong Wei <span class="text-muted pl-3">closed</span></h6>
                                            <span class="text-muted">Is there any update plan for RTL version near future?</span>
                                        </div>
                                        <div class="float-right pt-1">
                                            <small class="text-muted">2 Days Ago</small>
                                        </div>
                                    </div>
                                    <div class="separator-dashed"></div>
                                    <div class="d-flex">
                                        <div class="avatar avatar-offline">
                                            <span class="avatar-title rounded-circle border border-white bg-secondary">P</span>
                                        </div>
                                        <div class="flex-1 ml-3 pt-1">
                                            <h6 class="text-uppercase fw-bold mb-1">Peter Parker <span class="text-success pl-3">open</span></h6>
                                            <span class="text-muted">I have some query regarding the license issue.</span>
                                        </div>
                                        <div class="float-right pt-1">
                                            <small class="text-muted">2 Day Ago</small>
                                        </div>
                                    </div>
                                    <div class="separator-dashed"></div>
                                    <div class="d-flex">
                                        <div class="avatar avatar-away">
                                            <span class="avatar-title rounded-circle border border-white bg-danger">L</span>
                                        </div>
                                        <div class="flex-1 ml-3 pt-1">
                                            <h6 class="text-uppercase fw-bold mb-1">Logan Paul <span class="text-muted pl-3">closed</span></h6>
                                            <span class="text-muted">Is there any update plan for RTL version near future?</span>
                                        </div>
                                        <div class="float-right pt-1">
                                            <small class="text-muted">2 Days Ago</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        -->       
                    </div>
                </div>
            </div>
             
        </div>
<script>
<?php
    $tjob = $mysql->select("select * from _tbl_form_16");
    $cjob = $mysql->select("select * from _tbl_form_16 where Completed='1'");
    $percentage = 100;
    if (sizeof($tjob)>0 && sizeof($cjob)>0) {
        
        $percentage =  intval((sizeof($cjob)/sizeof($tjob))*100);   
    }
    
     
?>
        $( document ).ready(function() {
  
Circles.create({
    id:           'task-complete',
    radius:       50,
    value:        <?php echo $percentage;?>,
    maxValue:     100,
    width:        5,
    text:         function(value){return value + '%';},
    colors:       ['#36a3f7', '#fff'],
    duration:     400,
    wrpClass:     'circles-wrp',
    textClass:    'circles-text',
    styleWrapper: true,
    styleText:    true
})
});

</script>