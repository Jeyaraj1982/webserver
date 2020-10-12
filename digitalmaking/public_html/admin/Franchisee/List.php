
<?php 
    if($_GET['filter']=="all"){
        $franchisees = $mysql->select("select * from _tbl_franchisee order by FranchiseeID desc");
    }
    if($_GET['filter']=="active"){
        $franchisees = $mysql->select("select * from _tbl_franchisee where IsActive='1' order by FranchiseeID desc");
    }
    if($_GET['filter']=="deactive"){
        $franchisees = $mysql->select("select * from _tbl_franchisee where IsActive='0' order by FranchiseeID desc");
    }
    
?>
<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="row" style="margin-bottom:10px;">
                        <div class="col-md-12" style="text-align: right;">
                            <a href="dashboard.php?action=Franchisee/List&filter=all" <?php if($_GET['filter']=="all"){ ?>style="text-decoration: underline;font-weight:bold;"<?php } ?>><small>All</small></a>&nbsp;|&nbsp; 
                            <a href="dashboard.php?action=Franchisee/List&filter=active" <?php if($_GET['filter']=="active"){ ?>style="text-decoration: underline;font-weight:bold;"<?php } ?>><small>Active</small></a>&nbsp;|&nbsp;
                            <a href="dashboard.php?action=Franchisee/List&filter=deactive" <?php if($_GET['filter']=="deactive"){ ?>style="text-decoration: underline;font-weight:bold;"<?php } ?>><small>Deactive</small></a>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" style="padding-top:10px;padding-bottom:10px">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card-title">
                                        Manage Franchisee
                                    </div>
                                </div>
                                <div class="col-md-6" style="text-align: right;">
                                    <a href="dashboard.php?action=Franchisee/create" class="btn btn-primary btn-xs">Add Franchisee</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                 <table class="table table-striped mt-3">
                                        <thead>
                                            <tr>
                                                <th scope="col">Name</th>
                                                <th scope="col">Mobile Number</th>
                                                <th scope="col" style="text-align: right">Cards</th>
                                                <th scope="col" style="text-align: right">Resume</th> 
                                                <th scope="col" style="text-align: right">Available Credits</th>
                                                <th scope="col">Created On</th>
                                                <?php if($_GET['filter']=="all"){ ?>  
                                                <th scope="col">Status</th>
                                                <?php } ?>
                                                <th scope="col"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        
                                        <?php foreach($franchisees as $franchisee){ ?>
                                            <tr>
                                                <td><?php echo $franchisee['FranchiseeName'];?></td>
                                                <td><?php echo $franchisee['MobileNumber'];?></td>
                                                <td style="text-align: right"><?php echo sizeof($mysql->select("select * from _tbl_card_general_info where CreatedByID='".$franchisee['FranchiseeID']."'"));?></td>
                                                <td style="text-align: right"><?php echo sizeof($mysql->select("select * from _tbl_resume_general_info where CreatedByID='".$franchisee['FranchiseeID']."'"));?></td>
                                                <td style="text-align: right"><?php echo getTotalBalanceCredits($franchisee['FranchiseeID']);?></td>
                                                <td><?php echo date("M-d-Y H:i",strtotime($franchisee['CreatedOn']));?></td>
                                                <?php if($_GET['filter']=="all"){ ?><td><?php if($franchisee['IsActive']=="1"){ echo "Active";}else { echo "<span style='color:red'>Deactivated</span>";}?></td><?php } ?> 
                                                <td style="text-align: right;">
                                                    <div class="dropdown dropdown-kanban" style="float: right;">
                                                    <button class="" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border:none;font-size:14px;background:none !important;padding-right:0px;margin-right:0px;cursor:pointer">
                                                        <i class="icon-options-vertical"></i>
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <a class="dropdown-item" href="dashboard.php?action=Franchisee/edit&id=<?php echo $franchisee['FranchiseeID'];?>" draggable="false">Edit</a>
                                                        <a class="dropdown-item" href="dashboard.php?action=Franchisee/view&id=<?php echo $franchisee['FranchiseeID'];?>" draggable="false">View</a>
                                                        <a class="dropdown-item" href="dashboard.php?action=Franchisee/Resumes&id=<?php echo $franchisee['FranchiseeID'];?>" draggable="false">View Resumes</a>
                                                        <a class="dropdown-item" href="dashboard.php?action=Franchisee/Cards&id=<?php echo $franchisee['FranchiseeID'];?>" draggable="false">View Cards</a>
                                                        <a class="dropdown-item" href="dashboard.php?action=Franchisee/AccountSummary&id=<?php echo $franchisee['FranchiseeID'];?>" draggable="false">Account Summary</a>
                                                    </div>
                                                </div>     
                                                </td>
                                            </tr>
                                        <?php } ?>                                                      
                                        <?php if(sizeof($franchisees)==0){ ?>
                                            <tr>
                                                <td colspan="4" style="text-align: center;">No franchisees Found</td>
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
</div>


