 <?php 
    if($_GET['status']=="All"){ 
        $Customers = $mysql->select("select * from _queen_agent where IsAgent='0' order by AgentID desc");
        $title="All Customers";
    }if($_GET['status']=="Active"){
        $Customers = $mysql->select("select * from _queen_agent where IsAgent='0' and IsActive='1' order by AgentID desc");
        $title="Active Customers";
    }if($_GET['status']=="Deactive"){
        $Customers = $mysql->select("select * from _queen_agent where IsAgent='0' and IsActive='0' order by AgentID desc");
        $title="Deactivated Customers";
    }
?>
<div class="main-panel">                                                                                                                                                                      
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" style="padding-top:10px;padding-bottom:10px">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="card-title">
                                        Manage Customers
                                    <br>
                                    <span style="font-size: 15px"><?php echo $title;?></span>  </div>
                                </div>
                                <div class="col-md-8" style="text-align: right;">
                                    <a href="dashboard.php?action=Customer/add" class="btn btn-primary btn-xs">Add Customer</a><br>
                                    <a href="dashboard.php?action=Customer/list&status=All" <?php if($_GET['status']=="All"){ ?> style="font-size:bold;text-decoration:underline;"<?php } ?>>All</a>&nbsp;|&nbsp;
                                    <a href="dashboard.php?action=Customer/list&status=Active" <?php if($_GET['status']=="Active"){ ?> style="font-size:bold;text-decoration:underline;"<?php } ?>>Active</a>&nbsp;|&nbsp;
                                    <a href="dashboard.php?action=Customer/list&status=Deactive" <?php if($_GET['status']=="Deactive"){ ?> style="font-size:bold;text-decoration:underline;"<?php } ?>>Deactivated</a>
                                </div>
                            </div>
                        </div>                                       
                        <div class="card-body">                                                                                                                                             
                            <div class="table-responsive">
                                 <table class="table table-striped mt-3">
                                        <thead>
                                            <tr>
                                                <th scope="col">Customer Code</th>
                                                <th scope="col">Customer Name</th>
                                                <th scope="col">Mobile Number</th>
                                                <?php if($_GET['status']=="All"){ ?><th scope="col">Status</th><?php } ?>
												<th scope="col">Created On</th>
												<th scope="col" style="text-align:right">We Have</th>
												<th scope="col" style="text-align:right">Payable</th>
                                            </tr>                                                                                                                                               
                                        </thead>
                                        <tbody>
                                        
                                        <?php foreach($Customers as $Customer){ ?>
                                       <tr>
                                                <td><?php echo $Customer['AgentCode'];?></td>
                                                <td><?php echo $Customer['AgentName'];?></td>
                                                <td><?php echo $Customer['MobileNumber'];?><br><span style="font-size: 11px;color: #55576A;"><?php echo $Customer['AlternativeMobileNumber'];?></span></td>
                                                <?php if($_GET['status']=="All"){ ?><td><?php if($Customer['IsActive']=="1") { echo "Active"; } else { echo "Deactivated";}?></td><?php } ?>
                                                <td><?php echo date("M d, Y",strtotime($Customer['CreatedOn']));?></td>
												<td style="text-align:right">
													<?php if(getTotalBalanceWallet($Customer['AgentID'])>0){
																echo number_format(getTotalBalanceWallet($Customer['AgentID']),2);
													}else{
														echo "0.00";
													}
													?> 
												</td>
												<td style="text-align:right">
													<?php if(getTotalBalanceWallet($Customer['AgentID'])<0){
																$payable = (getTotalBalanceWallet($Customer['AgentID']) * (-1)); 
                                                                echo number_format($payable,2);
													}else{
														echo "0.00";
													}
													?> 
												</td>
												<td style="text-align: right">                                                   
                                                        <div class="dropdown dropdown-kanban" style="float: right;">
                                                            <button class="" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border:none;font-size:14px;background:none !important;padding-right:0px;margin-right:0px;cursor:pointer">
                                                                <i class="icon-options-vertical"></i>
                                                            </button>
                                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                                <a class="dropdown-item" href="dashboard.php?action=Customer/Transactions&id=<?php echo md5($Customer['AgentID']);?>" draggable="false">View Transactions</a>
                                                                <a class="dropdown-item" href="dashboard.php?action=Customer/Orders&id=<?php echo md5($Customer['AgentID']);?>" draggable="false">View Orders</a>
																<a class="dropdown-item" href="dashboard.php?action=Customer/edit&id=<?php echo md5($Customer['AgentID']);?>" draggable="false">Edit</a>
                                                                <a class="dropdown-item" href="dashboard.php?action=Customer/view&id=<?php echo md5($Customer['AgentID']);?>" draggable="false">View</a>
																<a class="dropdown-item" draggable="false"><span onclick='CallConfirmation(<?php echo $Customer['AgentID'];?>)' class='btn btn-danger btn-sm' style='padding: 0px 10px;font-size: 10px;'>Delete</span></a>
															</div>
                                                        </div>
                                                    </td>
                                            </tr>  
                                        <?php } if(sizeof($Customers)=="0"){ ?>
                                            <tr>
												<?php if($_GET['status']=="All"){ ?>
                                                <td style="text-align: center;" colspan="5">No Customers found</td>
												<?php } else { ?>
												<td style="text-align: center;" colspan="4">No Customers found</td>
												<?php } ?>
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
<div class="modal fade right" id="ConfirmationPopup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static" style="top: 0px !important;">
  <div class="modal-dialog modal-side modal-bottom-right modal-notify modal-danger" role="document" >
    <div class="modal-content" >
    <div id="xconfrimation_text"></div>
    </div>
  </div>
</div>
<script>
   var loading = "<div style='padding:80px;text-align:center;color:#aaa'><img src='assets/loading.gif'  style='width:80px'><br>Processing ...</div>";
 
 function CallConfirmation(AgentID){
    var text = '<form action="" method="POST" id="AgentFrm_'+AgentID+'">'
                    +'<input type="hidden" value="'+AgentID+'" id="AgentID" Name="AgentID">'
                     +'<div class="modal-header" style="padding-bottom:5px">'
                        +'<h4 class="heading"><strong>Confirmation</strong> </h4>'
                        +'<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:white">'
                            +'<span aria-hidden="true" style="color:black">&times;</span>'
                        +'</button>'
                     +'</div>'
                     +'<div class="modal-body">'
                        +'<div class="form-group row">'                                                            
                            +'<div class="col-sm-12">'
                                +'Are you sure want to delete customer?<br>'
                            +'</div>'
                        +'</div>'
                     +'</div>'
                     +'<div class="modal-footer">'
                        +'<button type="button" class="btn btn-outline-danger" data-dismiss="modal" >Cancel</button>&nbsp;&nbsp;&nbsp;'
                        +'<button type="button" class="btn btn-danger" onclick="DeleteAgent(\''+AgentID+'\')" >Yes, Confirm</button>'
                     +'</div>'
                +'</form>';  
        $('#xconfrimation_text').html(text);                                       
        $('#ConfirmationPopup').modal("show");
}                                                                                                 
 
 function DeleteAgent(AgentID) {
     var param = $( "#AgentFrm_"+AgentID).serialize();
    $("#confrimation_text").html(loading);
    $.post( "webservice.php?action=DeleteAgent",param,function(data) {                 
        var obj = JSON.parse(data); 
        var html = "";                                                                              
        if (obj.status=="failure") {
            html = "<div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='../assets/accessdenied.png' style='width:128px'><br><br>"+obj.message+"<br></div></div>";
            html += "<div style='padding:20px;text-align:center'>" + "<button type='button' class='btn btn-outline-success' data-dismiss='modal'>Cancel</button></div>"; 
        }if (obj.status=="Success") {
            html = "<div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='../assets/tick.jpg' style='width:128px'><br><br>"+obj.message+"<br></div></div>";
            html += "<div style='padding:20px;text-align:center'>" + "<a href='dashboard.php?action=Customer/list&status=All' class='btn btn-outline-success'>Continue</a></div>"; 
        }
        $("#xconfrimation_text").html(html);
        
    });
}
</script>