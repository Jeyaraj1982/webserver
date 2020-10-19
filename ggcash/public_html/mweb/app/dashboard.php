<?php 
    include_once("header.php");
    if (isset($_POST['btnConfrimUpdate'])) {                        
        $mysqldb->execute("update _tbl_Members set IsClub='1', ClubID='".$_POST['MemberCode']."', ClubUpdated='".date("Y-m-d H:i:s")."' where MemberID='".$_SESSION['User']['MemberID']."'");
        $_SESSION['User']['IsClub']=1;
        $_SESSION['User']['ClubID']=$_POST['MemberCode'];
        $_SESSION['User']['ClubUpdated']=date("Y-m-d H:i:s");
        
        $successmessage="Successfully updated club member information";
    }
    if (isset($_GET['action'])) {
        include_once("../../app/modules/".$_GET['action'].".php");
    } else {
        
?>
      <div class="page-wrapper">
        <div class="page-breadcrumb">
            <div class="row">
                <div class="col-9 align-self-center">
                    <h4 class="page-title">Dashboard</h4>
                    <div class="d-flex align-items-center">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="dashboard.php">Home</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
            
        <div class="container-fluid">
           <div class="row">
  <div class="col-md-12">
    <div class="card">
    <div class="card-body border-top">
                                <div class="row m-b-0">
                                    <!-- col -->
                                    <div class="col-lg-12">
                                        <div class="d-flex align-items-center">
                                            <!--div class="m-r-20 border-right p-l-30"><img src="https://gcchub.org/panel/assets/img/badge/0.png" class="club-img"></div>-->
                                              <?php if (isset($_SESSION['User']['IsClub']) && strlen($_SESSION['User']['ClubID'])==0) { ?>
                                            <form action="" method="post">
                                            <div class="row">
                                                  <div class="col-lg-2">
                                                    <div class="m-r-20 border-right p-l-30"><img src="https://gcchub.org/panel/assets/img/badge/0.png" style="width:40px;"></div>
                                                  </div>
                                                <div class="col-lg-5">
                                                    <input type="text" class="form-control" name="MemberCode" placeholder="Enter Your Goodgrowth Member Code" required>    
                                                </div>
                                                <div class="col-lg-5">
                                                <button type="submit" class="btn btn-primary block-default" name="btnUpdateClub">Update Club Member</button>
                                                </div>
                                            </div>
                                            </form>
                                            <?php } else { ?>
                                            Club Member Code: <?php echo  $_SESSION['User']['ClubID']; ?><br>
                                            Updated on: <?php echo $_SESSION['User']['ClubUpdated'];?>
                                            <?php } ?>
                                           <!-- <div class="col-sm-10"><span>Current Club</span>
                                                <div class="mobile_hide">
                                                <h3 class="font-medium m-b-0">DECIDERS <span class="text-danger">Club</span></h3>
                                            </div>
                                            <div class="desktop_hide">
                                                <h4 class="font-medium m-b-0">DECIDERS <span class="text-danger">Club</span></h4>
                                            </div> 
                                            </div> -->
                                        </div>
                                    </div>
                                    <!-- col -->
                                    
                                </div>
                            </div>
                        </div>
    
  </div>
</div>


            <div class="row">
                <div class="col-sm-12 col-md-3">
                    <div class="card card-hover">
                        <div class="card-body" style="border-left:3px solid #1EA185">
                            <div class="d-flex no-block align-items-center" >
                                <div>
                                    <span class="text-orange display-6"><i class="mdi mdi-bank text-primary"></i></span>
                                </div>
                                <div class="ml-auto">                                                       
                                    <h5 class="font-normal text-right">E-Pin Wallet Balance</h5>
                                    <h3 class="text-bg text-right" style="margin-bottom:0px;"><?php echo number_format(getEpinWalletBalance($_SESSION['User']['MemberID']),2);?> </h3>
                                    <a href="dashboard.php?action=Wallets/addCashToEpin" style="font-size:11px;float:right" >Add Cash To E-Pin Wallet </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-sm-12 col-md-2">
                    <div class="card card-hover">
                        <div class="card-body" style="border-left:3px solid #6D9225">
                            <div class="d-flex no-block align-items-center">
                                <div>
                                    <span class="text-orange display-6"></span>
                                </div>
                                <div class="ml-auto">
                                    <h5 class="font-normal text-right">GGCash Wallet</h5>
                                    <h3 class="text-bg text-right" style="margin-bottom:0px;"><?php echo number_format(getGGCashWalletBalance($_SESSION['User']['MemberID']),2);?> </h3>
                                    <a href="dashboard.php?action=Accounts/payoutsummary" style="font-size:11px;float:right" >View History</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-sm-12 col-md-2">
                    <div class="card card-hover">
                        <div class="card-body" style="border-left:3px solid Orange">
                            <div class="d-flex no-block align-items-center">
                                <div>
                                    <span class="text-orange display-6"></span>
                                </div>
                                <div class="ml-auto">
                                    <h5 class="font-normal text-right">Utility Wallet Balance</h5>
                                    <h3 class="text-bg text-right" style="margin-bottom:0px;"><?php echo number_format(getUtilityhWalletBalance($_SESSION['User']['MemberID']),2);?> </h3>
                                    <a href="dashboard.php?action=Wallets/addCashToUtility" style="font-size:11px;float:right" >Add Cash To Utility Wallet </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-sm-12 col-md-2">
                    <div class="card card-hover">
                        <div class="card-body" style="border-left:3px solid Orange">
                            <div class="d-flex no-block align-items-center">
                                <div>
                                    <span class="text-orange display-6"></span>
                                </div>
                                <div class="ml-auto">
                                    <h5 class="font-normal text-right">Level Completed</h5>
                                    <h3 class="text-bg text-right" style="margin-bottom:0px;">
                                    
                                    <?php
                                    $lvl = $mysql->select("select * from _tbl_daily where MemberCode='".$_SESSION['User']['MemberCode']."'");
                                    echo sizeof($lvl);
                                    ?> 
                                    
                                    </h3>
                                    <a href="dashboard.php?action=Wallets/addCashToUtility" style="font-size:11px;float:right" >View </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-sm-12 col-md-3">
                    <div class="card border-left border-warning bg-warning text-bg bg-image bg-overlay-warning p-0" style="border-left:3px solid brown !important">
                        <div class="card-body text-bg p-15" style="padding: 12px;">
                            <div class="d-flex flex-row">
                                <div class="display-6 align-self-center"><i class="mdi mdi-account-multiple-plus"></i></div>
                                <div class="p-10 m-r-40 align-self-center">
                                    <h4  id="left_count"><?php  
                                    
                                   $leftCount = $memberTree->getTotalLeftCount($_SESSION['User']['MemberCode']);
                                   if ($memberTree->error==0) {
                                       echo $memberTree->member_count;
                                   } else {
                                       echo "Error";
                                   }
                                   
                                    //getTotalLeftCount($_SESSION['User']['MemberCode']);
                                    ?></h4>
                                    <h6 class="m-b-0 font-normal">Left</h6>
                                </div>
                                <div class="display-6 m-l-40 ml-auto align-self-center"><i class="mdi mdi-account-multiple-plus"></i></div>
                                <div class="p-10 align-self-center">
                                    <h4 id="right_count"><?php 
                                    
                                     $rightCount = $memberTree->getTotalRightCount($_SESSION['User']['MemberCode']);
                                   if ($memberTree->error==0) {
                                       echo $memberTree->member_count;
                                   } else {
                                       echo "Error";
                                   }
                                    //echo getTotalRightCount($_SESSION['User']['MemberCode']);
                                    ?></h4>
                                    <h6 class="m-b-5 font-normal">Right</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 

            </div>
            
            <div class="row">
                
                <div class="col-sm-12 col-lg-12">
                <div class="card">
<div class="card-body">
<!-- title -->
<div class="d-md-flex align-items-center">
<div>
<h4 class="card-title">History</h4>
<h5 class="card-subtitle">History as you Like</h5>
</div>
</div>
<!-- title -->
<ul class="nav nav-pills custom-pills m-t-40" id="pills-tab2" role="tablist">
<li class="nav-item text-center width-33">
<a class="nav-link active" id="pills-home-tab2" data-toggle="pill" href="#test11" role="tab" aria-selected="false">Withdrawal History</a>
</li>
<li class="nav-item text-center width-33">
<a class="nav-link" id="pills-profile-tab2" data-toggle="pill" href="#test12" role="tab" aria-selected="true">Wallet Requests</a>
</li>
<li class="nav-item text-center width-33">
<a class="nav-link" id="pills-profile-tab3" data-toggle="pill" href="#test13" role="tab" aria-selected="true">Login History</a>
</li>
</ul>
<div class="tab-content m-t-20" id="pills-tabContent2">
<div class="tab-pane fade active show" id="test11" role="tabpanel" aria-labelledby="pills-home-tab2">
<div class="table-responsive">
    <table class="table v-middle" style="border: 1px solid; border-color: #e1e1e1;">
        <thead>
            <tr>
                <th class="border-top-0"><b>Txn Date</b></th>
                <th class="border-top-0"><b>Amount</b></th>
                <th class="border-top-0"><b>Bank Name</b></th>
                <th class="border-top-0"><b>Account Name</b></th>
                <th class="border-top-0"><b>Account Number</b></th>
                <th class="border-top-0"><b>IFSCode</b></th>
                <th class="border-top-0"><b>Status</b></th>
                <th class="border-top-0"><b>Status On</b></th>
            </tr>
        </thead>
        <tbody>
            <?php $Requests  = $mysqldb->select("SELECT *
                        FROM _tbl_member_withdraw_request
                        LEFT  JOIN _tbl_Members  
                        ON _tbl_member_withdraw_request.MemberID=_tbl_Members.MemberID where _tbl_member_withdraw_request.MemberID='".$_SESSION['User']['MemberID']."'" ); ?>
             
            <?php foreach ($Requests as $Request){ ?>
                <tr>
                    <td><?php echo $Request['RequestedOn'];?></td>
                    <td><?php echo  number_format($Request['Amount'],2);?></td>
                    <td><?php echo $Request['MemberName'];?></td>
                    <td><?php echo $Request['BankName'];?></td>
                    <td><?php echo $Request['AccountName'];?></td>
                    <td><?php echo $Request['AccountNumber'];?></td>
                    <td><?php echo $Request['IFSCode'];?></td>
                    <td>
                        <?php if($Request['IsApproved']=="0" && $Request['IsRejected']=="0"){  
                                echo "Pending";   }
                              if($Request['IsApproved']=="1" && $Request['IsRejected']=="0"){
                                echo  "Accepted";}
                              if($Request['IsApproved']=="0" && $Request['IsRejected']=="1"){
                                echo  "Rejected";} 
                        ?>
                    </td>
                    <td>
                        <?php if($Request['IsApproved']=="1" && $Request['IsRejected']=="0"){
                                echo $Request['IsApprovedOn'];}
                              if($Request['IsApproved']=="0" && $Request['IsRejected']=="1"){
                                echo  $Request['IsRejectedOn'];} 
                        ?>
                    </td>
                    <td><a href="ViewWithDrawRequests.php?code=<?php echo $Request['RequestID'];?>">View</a></td>
                </tr>
             <?php }?>  
            <?php 
                    $Requestcount=$mysqldb->select("select count(RequestID) as count FROM _tbl_member_withdraw_request where MemberID='".$_SESSION['User']['MemberID']."'");
                        if($Requestcount[0]['count']>5){
                    ?>
                     <tr>    
                        <td colspan="9" style="text-align: center;"><a href="WithDrawRequests.php">View More</a></td>
                    </tr>
                 <?php }?>  
                 <?php if($Requestcount[0]['count']=="0"){?>
                        <tr>
                            <td colspan="9" style="text-align: center;">No Requests Found</td>
                        </tr>
                 <?php }?>
        </tbody>
    </table>
</div>
</div>
<div class="tab-pane fade " id="test12" role="tabpanel" aria-labelledby="pills-profile-tab2">
<div class="table-responsive">
                                    <table class="table v-middle" style="border: 1px solid; border-color: #e1e1e1;">
                                        <thead>
                                            <tr>
                                                <th class="border-top-0"><b>Txn Date</b></th>
                                                <th class="border-top-0"><b>Amount</b></th>
                                                <th class="border-top-0"><b>Bank Name</b></th>
                                                <th class="border-top-0"><b>Account Number</b></th>
                                                <th class="border-top-0"><b>IFSCode</b></th>
                                                <th class="border-top-0"><b>Mode</b></th>
                                                <th class="border-top-0"><b>Transaction ID</b></th>
                                                <th class="border-top-0"><b>Status</b></th>
                                                <th class="border-top-0"><b>Status On</b></th>
                                                <th class="border-top-0"><b></b></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $Requests  = $mysqldb->select("SELECT *
                                                                            FROM _tbl_wallet_request
                                                                            LEFT  JOIN _tbl_Members  
                                                                            ON _tbl_wallet_request.MemberID=_tbl_Members.MemberID where _tbl_wallet_request.MemberID='".$_SESSION['User']['MemberID']."' order by _tbl_wallet_request.RequestID DESC LIMIT 0,5"); ?>
                                          <?php foreach ($Requests as $Request){ ?>
                                            <tr>
                                               <td><?php echo $Request['TransferDate'];?></td>
                                                <td><?php echo number_format($Request['Amount'],2);?></td>
                                                <td><?php echo $Request['BankName'];?></td>
                                                <td><?php echo $Request['AccountNumber'];?></td>
                                                <td><?php echo $Request['IFSCode'];?></td>
                                                <td><?php echo $Request['Mode'];?></td>
                                                <td><?php echo $Request['TransactionNumber'];?></td>
                                                 <td>
                                                    <?php if($Request['IsApproved']=="0" && $Request['IsRejected']=="0"){ ?>
                                                        <?php echo "Verification Pending";?>
                                                    <?php }?>
                                                    <?php if($Request['IsApproved']=="1" && $Request['IsRejected']=="0"){ ?>
                                                        <?php echo "Approved";?>
                                                    <?php }?>
                                                    <?php if($Request['IsApproved']=="0" && $Request['IsRejected']=="1"){ ?>
                                                        <?php echo "Rejected";?>
                                                     <?php }?>
                                                </td>
                                                <td>
                                                    <?php if($Request['IsApproved']=="1" && $Request['IsRejected']=="0"){ ?>
                                                        <?php echo $Request['IsApprovedOn'];?>
                                                    <?php }?>
                                                    <?php if($Request['IsApproved']=="0" && $Request['IsRejected']=="1"){ ?>
                                                        <?php echo $Request['IsRejectedOn'];?>
                                                     <?php }?>
                                                </td>
                                                <td><a href="ViewMyWalletRequest.php?code=<?php echo $Request['RequestID'];?>">View</a></td>
                                            </tr>
                                         <?php }?> 
                                         <?php 
                                            $Requestcount=$mysqldb->select("select count(RequestID) as count FROM _tbl_wallet_request where MemberID='".$_SESSION['User']['MemberID']."'");
                                                if($Requestcount[0]['count']>5){
                                            ?>
                                             <tr>    
                                                <td colspan="10" style="text-align: center;"><a href="MyWalletRequests.php">View More</a></td>
                                            </tr>
                                         <?php }?>  
                                         <?php if($Requestcount[0]['count']=="0"){?>
                                                <tr>
                                                    <td colspan="10" style="text-align: center;">No Requests Found</td>
                                                </tr>
                                         <?php }?> 
                                        </tbody>
                                    </table>
                                </div>
</div>
<div class="tab-pane fade show" id="test13" role="tabpanel" aria-labelledby="pills-profile-tab3">
<div class="table-responsive">
                                    <table class="table v-middle" style="border: 1px solid; border-color: #e1e1e1;">
                                        <thead>
                                            <tr>
                                                <th class="border-top-0"><b>Login On</b></th>
                                                <th class="border-top-0"><b>Status</b></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $Logs  = $mysqldb->select("SELECT * FROM _tbl_members_login_logs where MemberID='".$_SESSION['User']['MemberID']."' order by LoginID DESC LIMIT 0,5"); 
                                         ?>
                                          <?php foreach ($Logs as $Log){ ?>
                                            <tr>
                                                <td><?php echo $Log['LoginOn'];?></td>
                                                <td><?php if($Log['IsSuccess']=="1"){ ?>
                                                        <?php echo "Success";?>
                                                    <?php }?>
                                                    <?php if($Log['IsSuccess']=="0"){ ?>
                                                        <?php echo "Falied";?>
                                                     <?php }?>
                                                </td>
                                            </tr>
                                         <?php }?> 
                                         <?php 
                                            $Requestcount=$mysqldb->select("select count(LoginID) as count FROM _tbl_members_login_logs where MemberID='".$_SESSION['User']['MemberID']."'");
                                            ?>
                                         <?php if($Requestcount[0]['count']=="0"){?>
                                                <tr>
                                                    <td colspan="2" style="text-align: center;">No Datas Found</td>
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
</div>
<script type="text/javascript">
window.onload=function(){
  var js_array = ["01","02","03","04","05","06","07","08","09","10","11","12","13","14","15","16","17","18","19","20","21","22","23","24","25","26","27","28","29","30","31"];
  var bonus_array = [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0];
  var average_array = [0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0,0];
  var month_year = $("#month_year").val();
  var average_bonus = 50;
  showGraph(js_array,bonus_array,average_array,month_year,average_bonus);
}; 

</script>

<a class="btn" id="open-mod" alt="default" data-toggle="modal" data-target="#responsive-modal" data-backdrop="static" data-keyboard="false" class="model_img img-fluid" style="display: none !important; font-size: 0px;">&nbsp;</a>
                                <div id="responsive-modal"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" class="modal" style="display: none;">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h3>One of your staking <span class="text-danger">not having transaction id</span></h3>
    
                                                <button type="button" class="close text-danger" data-dismiss="modal" aria-hidden="true">Close</button>
                                            </div>
                                                                                    </div>
                                    </div>
                                </div>


<style type="text/css">
@media (max-width: 39.9375em){
.text-right {
    text-align: right !important; 
}
}
</style>            </div>
            
<?php } ?>

<?php
    if (isset($_POST['btnUpdateClub'])) {
    $data = file_get_contents("http://goodgrowth.in/app/api.php?action=getMemberInfo&MemberCode=".$_POST['MemberCode']."&MobileNumber=".$_SESSION['User']['MobileNumber']);
    $data = json_decode($data,true);
          
          $club = $mysqldb->select("select * from  _tbl_Members where ClubID='".$_POST['MemberCode']."'");
          
            ?>
            <div id="myModal" class="modal fade" role="dialog">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Confirmation To Update Club Member</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <?php if (sizeof($club)>0) {  ?>
                                <div class="modal-body">
        <p>You have entered Goodgrwoth Member Code already mapped to another</p>
        <p>Please contact administrator</p>
      </div>
      
      
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
                        <?php } else if (sizeof($data)>0) { ?>
        
        
      <div class="modal-body">
        <p>Member Code : <?php echo $data[0]['MemberCode'];?></p>
        <p>Member Name : <?php echo $data[0]['FirstName'];?></p>
      </div>
      
      <form action="" method="post">
        <input type="hidden" value="<?php echo $data[0]['MemberCode'];?>" name="MemberCode">
      <div class="modal-footer">
        <button type="submit" name="btnConfrimUpdate" class="btn btn-primary">Confirm</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
      </form>
      
      <?php }  else {?>
       <div class="modal-body">
        <p>You have entered Goodgrwoth Member Code not associated with your register mobile number</p>
        <p>Please contact administrator</p>
      </div>
      
      
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
      <?php } ?>
    </div>

  </div>
</div>
<script>
$( document ).ready(function() {
       $("#myModal").modal('show');
   });
</script>
        <?php
    }
?>

<?php
    if (isset($successmessage)) {
    
            ?>
          <div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
      
      <h4 class="modal-title">Updated Club Member</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        
      </div>
      <div class="modal-body">
        <p><?php echo $successmessage;?></p>
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<script>
$( document ).ready(function() {
       $("#myModal").modal('show');
   });
</script>
        <?php
    }
?>
         <?php include_once("footer.php"); ?>



 
