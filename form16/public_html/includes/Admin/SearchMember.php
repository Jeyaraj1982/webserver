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
                                <h3 class="page-title" style="margin-bottom:0px">Search Member</h3>    
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group form-show-validation row">
                                <label for="MemberDetails" class="col-sm-2 text-left" style="font-weight:normal">Member Details<span class="required-label">*</span></label>
                                <div class="col-sm-5">
                                    <input type="text" class="form-control" id="MemberDetails" placeholder="Jhon Peter" name="MemberDetails" value="<?php echo isset($_POST['MemberDetails']) ? $_POST['MemberDetails'] : '';?>" >
                                    <small style="color:#737373; font-size:X-smaller;" >eg: member's name or mobile number or email</small>  <br>
                                    <span class="errorstring" id="ErrMemberDetails"><?php echo isset($ErrMemberDetails)? $ErrMemberDetails : "";?></span>
                                </div>
                            </div>
                        </div>  
                        <div class="row">
                            <div class="col-md-12"> 
                                <div class="card-action">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <button type="submit" class="btn btn-warning" name="BtnSearch" id="BtnSearch">Search Member</button>
                                        </div>                                        
                                    </div>                                                                             
                                </div>
                            </div>                                                                                             
                        </div>
                    </div>        
                </div> 
            </div>
            </form>
            <?php if(isset($_POST['MemberDetails'])>0){ ?>
            <div class="row">
                <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">
                       <h4 class="page-title">Search Result</h4>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="myTable" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>Created</th>
                                    <th>Member Name</th>                                                                                           
                                    <th>Mobile Number</th>
                                    <th>Created By</th> 
                                    <th>Created By Name</th> 
                                    <th>No of Forms</th>
                                    <th></th>
                                </tr>
                            </thead>                                                                         
                            <tbody>
                            <?php 
                             $Members = array();
                             if (isset($_POST['MemberDetails'])) {     
                             $sql = $mysql->select("select * from _tbl_Members where  MemberCode like '%".$_POST['MemberDetails']."%' or MemberName like '%".$_POST['MemberDetails']."%' or MobileNumber like '%".$_POST['MemberDetails']."%' or EmailID like '%".$_POST['MemberDetails']."%'");
                             foreach($sql as $member){ 
                            ?>
                            <?php $form = $mysql->select("SELECT COUNT(id) AS cnt FROM _tbl_form_16 where FormByID='".$member['MemberID']."'");?>
                                <tr>
                                    <td><span class="<?php echo ($member['IsActive']==1) ? 'Activedot' : 'Deactivedot';?>"></span>&nbsp;&nbsp;&nbsp;<?php echo date("d M, Y H:i",strtotime($member['CreatedOn']));?></td>
                                    <td><?php echo $member['MemberName'];?></td>
                                    <td><?php echo $member['MobileNumber'];?><?php if($member['IsMobileNumberVerified']==1){ ?> <img src="../assets/icon_verified.png"><?php } else {?> <img class="imageGrey" src="../assets/icon_verified.png"><?php } ?></td>
                                    <td><?php if($member['IsCustomer']==0){
                                                      echo "Member";
                                                      }if($member['IsCustomer']==1){
                                                      echo "Agent";
                                                      }
                                                      if($member['IsCustomer']==2){
                                                         echo "Staff";
                                                      }
                                                      if($member['IsCustomer']==3){
                                                         echo "Admin";
                                                      }  ?></td>                                                          
                                            <td>
                                            <?php if($member['IsCustomer']==0){
                                                      echo $member['MemberName'];
                                                      }
                                                      if($member['IsCustomer']==1){
                                                      $agent= $mysql->select("select * from  _tbl_Agents where AgentID='".$member['AgentID']."'");
                                                      echo $agent[0]['AgentName'];
                                                      }
                                                      if($member['IsCustomer']==2 || $member['IsCustomer']==3){
                                                          $admin= $mysql->select("select * from  _tbl_Admin where AdminID='".$member['StaffID']."'");
                                                          echo $admin[0]['AdminName'];
                                                      }
                                                      ?></td>   
                                    <td><?php echo $form[0]['cnt'];?></td>
                                    <td>
                                        <div class="dropdown dropdown-kanban" style="float: right;">
                                            <button class="" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border:none;font-size:14px;background:none !important;padding-right:0px;margin-right:0px;cursor:pointer">
                                                <i class="icon-options-vertical"></i>
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" href="dashboard.php?action=EditMember&MCode=<?php echo $member['MemberCode'];?>" draggable="false">Edit</a>
                                                <a class="dropdown-item" href="dashboard.php?action=ViewMember&MCode=<?php echo $member['MemberCode'];?>" draggable="false">View</a>
                                                <a class="dropdown-item" href="dashboard.php?action=ManageForm16ByMember&MCode=<?php echo $member['MemberCode'];?>&Status=All" draggable="false">View Forms</a>
                                                <?php  if($member['IsCustomer']==2){ ?>
                                                <a class="dropdown-item" href="dashboard.php?action=ViewMemberCreatedByStaff&MCode=<?php echo $member['MemberCode'];?>" draggable="false">View Staff</a>
                                                <?php } ?>
                                                <?php  if($member['IsCustomer']==1){ ?>
                                                <a class="dropdown-item" href="dashboard.php?action=ViewMemberCreatedByAgent&MCode=<?php echo $member['MemberCode'];?>" draggable="false">View Agent</a>
                                                <?php } ?>                                                                                            
                                            </div>
                                        </div>
                                    </td>                                                                                             
                                </tr>
                            <?php } }?>
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