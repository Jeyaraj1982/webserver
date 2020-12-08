<?php
include_once("../config.php");
include_once("header.php");
include_once("LeftMenu.php"); 
if (isset($_GET['action'])) {
         include_once($_GET['action'].".php");
     } else {?>

<div class="main-panel full-height">
            <div class="container">
                <br><br><br>
                <div class="panel-header">
                    <div class="page-inner border-bottom pb-0 mb-3">
                        <div class="d-flex align-items-left flex-column">
                            <h2 class="pb-2 fw-bold">Dashboard</h2>
                        </div>
                    </div>
                </div>
                <div class="page-inner">
                    <div class="row">
                        <div class="col-sm-4 col-md-4">
                            <div class="card card-stats card-round">
                                <div class="card-body ">
                                    <div class="row">
                                        <div class="col-12 col-stats">
                                            <div class="numbers">
                                                <p class="card-category">Users</p>
                                                <h4 class="card-title">
                                                <?php
                                                   echo sizeof($mysql->select("select userid from _jusertable where isadmin='0'"));
                                                ?>
                                                </h4>
                                                <a href="dashboard.php?action=user/listuser&f=a">View</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 col-md-4">
                            <div class="card card-stats card-round">
                                <div class="card-body ">
                                    <div class="row">
                                        <div class="col-12 col-stats">
                                            <div class="numbers">
                                                <p class="card-category">Today Registered Users</p>
                                                <h4 class="card-title">
                                                <?php
                                                   echo sizeof($mysql->select("select userid from _jusertable where isadmin='0' and DATE(createdon)=DATE('".date("Y-m-d")."')"));
                                                ?>
                                                </h4>
                                                <a href="dashboard.php?action=user/listuser&f=a">View</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                         
                    </div>
                    <div class="row">
                        <div class="col-sm-4 col-md-4">
                            <div class="card card-stats card-round">
                                <div class="card-body">
                                    <div class="row">
                                       <div class="col-12 col-stats">
                                            <div class="numbers">
                                                <p class="card-category">Payment Collections</p>
                                                <h4 class="card-title">
                                                  <?php $amount = $mysql->select("select SUM(TxnAmount) as amount FROM _tblPayments where TxnStatus='Success'"); ?>
                                                  <?php echo number_format($amount[0]['amount'],2); ?>
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 col-md-4">
                            <div class="card card-stats card-round">
                                <div class="card-body ">
                                    <div class="row">
                                        <div class="col-12 col-stats">
                                            <div class="numbers">
                                                <p class="card-category">Franchisee</p>
                                                <h4 class="card-title">
                                                <?php echo sizeof($mysql->select("select userid from _tbl_franchisee where IsActive='1'")); ?>
                                                </h4>
                                                <a href="<?php echo AppUrl;?>/admin/dashboard.php?action=franchisee/list&f=a">View</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4 col-md-4">
                            <div class="card card-stats card-round">
                                <div class="card-body ">
                                    <div class="row">
                                        <div class="col-12 col-stats">
                                            <div class="numbers">
                                                <p class="card-category">Franchisee Withdrawal Request</p>
                                                <h4 class="card-title">
                                                <?php echo sizeof($mysql->select("select RequestID from _tbl_withdrawal_request where Status='0'")); ?>
                                                </h4>
                                                <a href="<?php echo AppUrl;?>/admin/dashboard.php?action=Requests/FranchiseeWithdrawalRequests&filter=Requested">View</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4 col-md-4">
                            <div class="card card-stats card-round">
                                <div class="card-body ">
                                    <div class="row">
                                        <div class="col-12 col-stats">
                                            <div class="numbers">
                                                <p class="card-category">Package Upgrade</p>
                                                <h4 class="card-title">                                        
                                                <?php echo sizeof($mysql->select("select featureadid from _tbl_featured where ispublish='1'")); ?>
                                                </h4>
                                                <a href="<?php echo AppUrl;?>/admin/dashboard.php?action=upgradepackage/list&f=a">View</a>
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
                                <div class="card-header">
                                    <ul class="nav nav-pills nav-secondary nav-pills-no-bd" id="pills-tab-without-border" role="tablist">
                                        <li class="nav-item submenu">
                                            <a class="nav-link active show" id="pills-home-tab-nobd" data-toggle="pill" href="#pills-members" role="tab" aria-controls="pills-members" aria-selected="true">Recent Registers</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="card-body">
                                    <div class="tab-content mt-2 mb-3" id="pills-without-border-tabContent">
                                        <div class="tab-pane fade active show" id="pills-members" role="tabpanel" aria-labelledby="pills-home-tab-nobd">
                                            <div class="table-responsive">
                                                <table id="myTable" class="table table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>Created</th>
                                                            <th>User Name</th>                                                                                           
                                                            <th>Mobile Number</th> 
                                                            <th>Email</th> 
                                                            <th></th>
                                                        </tr>
                                                    </thead>                                                                         
                                                    <tbody>
                                                    <?php
                                                        $sql= $mysql->select("select * from `_jusertable` order by `userid` desc limit 0,5");
                                                        foreach($sql as $member){ 
                                                       ?>
                                                        <tr>
                                                            <td><?php echo date("d M, Y H:i",strtotime($member['createdon']));?></td>
                                                            <td><?php echo $member['personname'];?></td>  
                                                            <td><table><tr><td><?php if($member['ismobileverified']=="1"){?><span style="color: green"><i class="fas fa-check"></i></span><?php  }?></td><td><?php echo $member["mobile"];?></td></tr></table></td>
                                                            <td><?php echo $member['email'];?></td>
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
                   <div class="row">
                         <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <ul class="nav nav-pills nav-secondary nav-pills-no-bd" id="pills-tab-without-border" role="tablist">
                                        <li class="nav-item submenu">
                                            <a class="nav-link active show" id="pills-home-tab-nobd" data-toggle="pill" href="#pills-posts" role="tab" aria-controls="pills-members" aria-selected="true">Recent Posts</a>
                                        </li>                                                                                           
                                    </ul>
                                </div>
                                <div class="card-body">
                                    <div class="tab-content mt-2 mb-3" id="pills-without-border-tabContent">
                                        <div class="tab-pane fade active show" id="pills-posts" role="tabpanel" aria-labelledby="pills-home-tab-nobd">
                                            <div class="table-responsive">
                                                <table id="myTable" class="table table-striped">
                                                    <tbody>
                                                    <?php
                                                        $sql= " order by `postadid` desc limit 0,5";
                                                        $totalads =        JPostads::getPostads(0,$sql);
                                                        foreach ($totalads as $r){ 
                                                            $cate = $mysql->select("select * from _jcategory where  categid='".$r['categid']."'");
                                                            $subc = $mysql->select("select * from _jsubcategory where  subcateid='".$r['subcateid']."'");
                                                            $country = $mysql->select("select * from _jcountrynames where  countryid='".$r['countryid']."'");
                                                            $district = $mysql->select("select * from _jdistrictnames where  distcid='".$r['distcid']."'");
                                                            $state = $mysql->select("select * from _jstatenames where  stateid='".$r['stateid']."'");
                                                            $city = $mysql->select("select * from _jcitynames where  citynameid='".$r['cityid']."'");
                                                            $user = $mysql->select("select * from _jusertable where  userid='".$r['postedby']."'");
                                                       ?>
                                                        <tr class='mytr'>
                                                           <td style='padding: 10px !important;width:70px'>
                                                                <img src="../../assets/<?php echo $config['thumb'].$r["filepath1"];?>"  style="height:70px;width:70px;"></img>
                                                            </td>
                                                            <td style="vertical-align: top;padding: 10px !important;">
                                                                <b><?php echo $r["title"]?></b>:
                                                                <br><span style='color:#555'><?php echo strip_tags(substr(strip_tags($r["content"]),0,300));?>... </span>
                                                                <div style="padding:3px;padding-left:0px;">
                                                                    Posted On: <span style="color:#444;font-weight:bold;"><?php echo $r["postedon"]; ?></span>&nbsp;&nbsp;
                                                                    Status:                         
                                                                    <?php if ($r["isactive"]) {?>
                                                                        <span style='color:#08912A;font-weight:bold;'>Active</span> 
                                                                    <?php } else { ?>
                                                                        <span style='color:#FF090D;font-weight:bold;'>In Active</span> 
                                                                    <?php } ?>
                                                                </div>
                                                                <?php echo $cate[0]["categname"];?> / <?php echo $subc[0]["subcatename"];?><br>
                                                                <?php echo $country[0]["countryname"];?> / <?php echo $state[0]["statenames"];?> / <?php echo $district[0]["districtname"];?> / <?php echo $city[0]["cityname"];?>
                                                            </td>
                                                            <td style="vertical-align: top;padding: 10px !important;">
                                                                <b><?php echo $user[0]["personname"]?></b>:
                                                                <div style="padding:3px;padding-left:0px;">
                                                                    Email: <span style="color:#444;"><?php echo $user[0]["email"]; ?></span>&nbsp;&nbsp;
                                                                    Mobile:<span style="color:#444;"><?php echo $user[0]["mobile"]; ?></span>                         
                                                                </div>
                                                            </td>
                                                            <td width='160' style='text-align:center;'>
                                                                <a href="<?php echo AppUrl;?>/admin/dashboard.php?action=postad/view&rowid=<?php echo  $r["postadid"];?>&btn=viewbtn">View</a>
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
                        </div>
                   </div>
                    
                     
                    </div>
                </div>
            </div>
  <div class="modal fade right" id="ConfirmationPopup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static" style="top: 0px !important;">
  <div class="modal-dialog modal-side modal-bottom-right modal-notify modal-danger" role="document" >
    <div class="modal-content" >
    <div id="xconfrimation_text"></div>
    </div>
  </div>
</div>
<script>
   var loading = "<div style='padding:80px;text-align:center;color:#aaa'><img src='http://japps.online/tour/admin/assets/loading.gif'  style='width:80px'><br>Processing ...</div>";
 
 function CallConfirmation(ResumeID){
    var text = '<form action="" method="POST" id="DeleteResumeFrm'+ResumeID+'">'
                    +'<input type="hidden" value="'+ResumeID+'" id="ResumeID" Name="ResumeID">'
                     +'<div class="modal-header" style="padding-bottom:5px">'
                        +'<h4 class="heading"><strong>Confirmation</strong> </h4>'
                        +'<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:white">'
                            +'<span aria-hidden="true" style="color:black">&times;</span>'
                        +'</button>'
                     +'</div>'
                     +'<div class="modal-body">'
                        +'<div class="form-group row">'                                                            
                            +'<div class="col-sm-12">'
                                +'Are you sure want to delete resume?<br>'
                            +'</div>'
                        +'</div>'
                     +'</div>'
                     +'<div class="modal-footer">'
                        +'<button type="button" class="btn btn-outline-danger" data-dismiss="modal" >Cancel</button>&nbsp;&nbsp;&nbsp;'
                        +'<button type="button" class="btn btn-danger" onclick="DeleteResume(\''+ResumeID+'\')" >Yes, Confirm</button>'
                     +'</div>'
                +'</form>';  
        $('#xconfrimation_text').html(text);                                       
        $('#ConfirmationPopup').modal("show");
}                                                                                                 
 
 function DeleteResume(ResumeID) {
     var param = $( "#DeleteResumeFrm"+ResumeID).serialize();
    $("#confrimation_text").html(loading);
    $.post( "../digital_webservice.php?action=DeleteResume",param,function(data) {                 
        var obj = JSON.parse(data); 
        var html = "";                                                                              
        if (obj.status=="failure") {
            html = "<div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='assets/accessdenied.png' style='width:128px'><br><br>"+obj.message+"<br></div></div>";
            html += "<div style='padding:20px;text-align:center'>" + "<button type='button' class='btn btn-outline-success' data-dismiss='modal'>Cancel</button></div>"; 
        }if (obj.status=="Success") {
            html = "<div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='assets/tick.jpg' style='width:128px'><br><br>"+obj.message+"<br></div></div>";
            html += "<div style='padding:20px;text-align:center'>" + "<a href='dashboard.php' class='btn btn-outline-success'>Continue</a></div>"; 
        }
        $("#xconfrimation_text").html(html);
        
    });
}
function CallConfirmationDeleteCard(ResumeID){
    var text = '<form action="" method="POST" id="DeleteCardFrm'+ResumeID+'">'
                    +'<input type="hidden" value="'+ResumeID+'" id="ResumeID" Name="ResumeID">'
                     +'<div class="modal-header" style="padding-bottom:5px">'
                        +'<h4 class="heading"><strong>Confirmation</strong> </h4>'
                        +'<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:white">'
                            +'<span aria-hidden="true" style="color:black">&times;</span>'
                        +'</button>'
                     +'</div>'
                     +'<div class="modal-body">'
                        +'<div class="form-group row">'                                                            
                            +'<div class="col-sm-12">'
                                +'Are you sure want to delete card?<br>'
                            +'</div>'
                        +'</div>'
                     +'</div>'
                     +'<div class="modal-footer">'
                        +'<button type="button" class="btn btn-outline-danger" data-dismiss="modal" >Cancel</button>&nbsp;&nbsp;&nbsp;'
                        +'<button type="button" class="btn btn-danger" onclick="DeleteCard(\''+ResumeID+'\')" >Yes, Confirm</button>'
                     +'</div>'
                +'</form>';  
        $('#xconfrimation_text').html(text);                                       
        $('#ConfirmationPopup').modal("show");
}                                                                                                 
 
 function DeleteCard(ResumeID) {
     var param = $( "#DeleteCardFrm"+ResumeID).serialize();
    $("#confrimation_text").html(loading);
    $.post( "../digital_webservice.php?action=DeleteCard",param,function(data) {                 
        var obj = JSON.parse(data); 
        var html = "";                                                                              
        if (obj.status=="failure") {
            html = "<div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='assets/accessdenied.png' style='width:128px'><br><br>"+obj.message+"<br></div></div>";
            html += "<div style='padding:20px;text-align:center'>" + "<button type='button' class='btn btn-outline-success' data-dismiss='modal'>Cancel</button></div>"; 
        }if (obj.status=="Success") {
            html = "<div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='assets/tick.jpg' style='width:128px'><br><br>"+obj.message+"<br></div></div>";
            html += "<div style='padding:20px;text-align:center'>" + "<a href='dashboard.php' class='btn btn-outline-success'>Continue</a></div>"; 
        }
        $("#xconfrimation_text").html(html);
        
    });
}
</script>   
<?php } ?>
<?php include_once("footer.php");?>