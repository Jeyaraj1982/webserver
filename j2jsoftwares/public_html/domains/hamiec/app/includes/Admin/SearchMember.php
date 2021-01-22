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
<div class="main-panel">
    <div class="container">
        <div class="page-inner">
           
            <form method="POST" action="" id="frms" onsubmit="return SubmitSearch();">
                <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">
                                <h3 class="page-title" style="margin-bottom:0px">Search User</h3>    
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group form-show-validation row">
                                <label for="MemberDetails" class="col-sm-2 text-left" style="font-weight:normal">User Details<span class="required-label">*</span></label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="MemberDetails" placeholder="Jhon Peter" name="MemberDetails" value="<?php echo isset($_POST['MemberDetails']) ? $_POST['MemberDetails'] : '';?>" >
                                    <small style="color:#737373; font-size:X-smaller;" >eg: retailer's name or mobile number or email</small>  <br>
                                    <span class="errorstring" id="ErrMemberDetails"><?php echo isset($ErrMemberDetails)? $ErrMemberDetails : "";?></span>
                                </div>
                            </div>
                        </div>  
                        <div class="row">
                            <div class="col-md-12"> 
                                <div class="card-action">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-warning" name="BtnSearch" id="BtnSearch">Search User</button>
                                        </div>                                        
                                    </div>                                                                             
                                </div>
                            </div>                                                                                             
                        </div>
                    </div>        
                </div> 
            </div>
            </form>
            <?php if(isset($_POST['MemberDetails'])>0){
              $sql= $mysql->select("select * from `_tbl_Members` where  MemberID>1 
              
             and ( MemberName like '%".$_POST['MemberDetails']."%' or 
              MobileNumber like '%".$_POST['MemberDetails']."%' or 
              EmailID like '%".$_POST['MemberDetails']."%')
              
                order by `MemberID` desc ");
        
            
             ?>
             <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" style="padding-top:10px;padding-bottom:10px">
                            <div class="card-title">
                                <?php echo $title; ?>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="myTable" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Created</th>
                                            <th>Name</th>                                                                                           
                                            <th>Role</th>                                                                                           
                                            <th>Mobile Number</th> 
                                           
                                            <th>Balance</th>
                                            <th></th>
                                        </tr>
                                    </thead>                                                                         
                                    <tbody>
                                    <?php  foreach($sql as $member){ ?>
                                    
                                        <tr>
                                            <td><span class="<?php echo ($member['IsActive']==1) ? 'Activedot' : 'Deactivedot';?>"></span>&nbsp;&nbsp;&nbsp;<?php echo date("d M, Y H:i",strtotime($member['CreatedOn']));?></td>
                                            <td><?php echo $member['MemberName'];?></td>
                                            <td><?php 
                                             if ($member['IsDealer']==1) {
                                                 echo "Dealer";
                                             } else {
                                                 echo "Member"; 
                                             }
                                             
                                             
                                             ?></td>
                                            <td><?php echo $member['MobileNumber'];?></td>
                                         
                                            <td style="text-align: right"><?php echo  number_format($app->getBalance($member['MemberID']),2);?></td>
                                            <td>
                                                <div class="dropdown dropdown-kanban" style="float: right;">
                                                    <button class="" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border:none;font-size:14px;background:none !important;padding-right:0px;margin-right:0px;cursor:pointer">
                                                        <i class="icon-options-vertical"></i>
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <a class="dropdown-item" href="dashboard.php?action=Dealers/Edit&d=<?php echo md5("J!".$member['MemberID']);?>" draggable="false">Edit</a>
                                                        <a class="dropdown-item" href="dashboard.php?action=Dealers/View&d=<?php echo md5("J!".$member['MemberID']);?>" draggable="false">View</a>
                                                        <a class="dropdown-item" href="dashboard.php?action=Dealers/SMSLog&d=<?php echo md5("J!".$member['MemberID']);?>" draggable="false">SMS Log</a>
                                                        <a class="dropdown-item" href="dashboard.php?action=Dealers/EmailLog&d=<?php echo md5("J!".$member['MemberID']);?>" draggable="false">Email Log</a>
                                                        <a class="dropdown-item" href="dashboard.php?action=Dealers/LoginLog&d=<?php echo md5("J!".$member['MemberID']);?>&Status=All" draggable="false">Login Log</a>
                                                        <a class="dropdown-item" href="dashboard.php?action=Retailers/Create&d=<?php echo md5("J!".$member['MemberID']);?>&Status=All" draggable="false">Create Retailer</a>
                                                        <a class="dropdown-item" href="dashboard.php?action=Retailers/Manage&d=<?php echo md5("J!".$member['MemberID']);?>&Status=All" draggable="false">View Retailers</a>
                                                        <a class="dropdown-item" href="dashboard.php?action=Dealers/Transactions&d=<?php echo md5("J!".$member['MemberID']);?>&Status=All" draggable="false">Account Summary</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>                                                                                             
                </div>
            </div>
            <?php } ?>
        </div>
    </div>     
</div>