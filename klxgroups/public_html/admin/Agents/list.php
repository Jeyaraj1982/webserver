<?php 
    if($_GET['status']=="All"){ 
        $agents = $mysql->select("select * from _tbl_tour_agents order by AgentID desc");
        $title ="All Agent";
    }
    if($_GET['status']=="Active"){ 
        $agents = $mysql->select("select * from _tbl_tour_agents where IsActive='1' order by AgentID desc");    
        $title ="Active Agent";
    }
    if($_GET['status']=="Deactive"){ 
        $agents = $mysql->select("select * from _tbl_tour_agents where IsActive='0' order by AgentID desc");
        $title ="Deactive Agent";
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
                                <div class="col-md-6">
                                    <div class="card-title">
                                        Manage Agents
                                    </div>
                                    <span><?php echo $title;?></span>
                                </div>
                                <div class="col-md-6" style="text-align: right;">
                                    <a href="dashboard.php?action=Agents/list&status=All" <?php if($_GET['status']=="All"){ ?>style="text-decoration:underline;font-weight:bold"<?php } ?>>All</a>&nbsp;|&nbsp;
                                    <a href="dashboard.php?action=Agents/list&status=Active" <?php if($_GET['status']=="Active"){ ?>style="text-decoration:underline;font-weight:bold"<?php } ?>>Active</a>&nbsp;|&nbsp;
                                    <a href="dashboard.php?action=Agents/list&status=Deactive" <?php if($_GET['status']=="Deactive"){ ?>style="text-decoration:underline;font-weight:bold"<?php } ?>>Deactive</a>&nbsp;&nbsp;
                                    <a href="dashboard.php?action=Agents/add" class="btn btn-primary btn-xs">Add Agent</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="alert alert-primary" role="alert" style="background: #F3F8FF;margin-bottom:0px">
                              <b>Agent Login Url</b> <br> https://www.trip78.in/agentlogin.php                       
                            </div>
                            <div class="table-responsive">
                                 <table class="table table-striped mt-3">
                                        <thead>
                                            <tr>
                                                <th scope="col">Agent Name</th>
                                                <th scope="col">Login Name</th>
                                                <th scope="col">State Name</th>
                                                <th scope="col">District Name</th>
                                                <th scope="col" style="text-align: right;">Pincode</th>
                                                <th scope="col" style="text-align: right;">Enquiries</th>
                                                <th scope="col"> </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach($agents as $agent){ ?>
                                            <tr>
                                                <td><?php echo $agent['AgentName'];?></td>
                                                <td><?php echo $agent['LoginName'];?></td>
                                                <td><?php echo $agent['StateName'];?></td>
                                                <td><?php echo $agent['DistrictName'];?></td>
                                                <td style="text-align: right;"><?php $pincode = $mysql->Select("SELECT COUNT(PincodeID) AS cnt FROM _tbl_agent_pincode where AgentID='".$agent['AgentID']."'"); echo $pincode[0]['cnt'];?></td>
                                                <td style="text-align: right;"><?php $enquirys = $mysql->select("select * from _tbl_tour_enquiry where Pincode IN (select Pincode from _tbl_agent_pincode where AgentID='".$agent['AgentID']."') order by EnquiryID DESC"); echo sizeof($enquirys);?></td>
                                                <td style="text-align: right">                                                   
                                                    <div class="dropdown dropdown-kanban" style="float: right;">
                                                        <button class="" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border:none;font-size:14px;background:none !important;padding-right:0px;margin-right:0px;cursor:pointer">
                                                            <i class="icon-options-vertical"></i>
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                            <a class="dropdown-item" href="dashboard.php?action=Agents/edit&id=<?php echo md5($agent['AgentID']);?>" draggable="false">Edit</a>
                                                            <a class="dropdown-item" href="dashboard.php?action=Agents/view&id=<?php echo md5($agent['AgentID']);?>" draggable="false">View</a>
                                                            <a class="dropdown-item" href="dashboard.php?action=Agents/viewenquires&id=<?php echo md5($agent['AgentID']);?>" draggable="false">View Enquires</a>
                                                            <?php if($pincode[0]['cnt']=="0"){ ?><a class="dropdown-item" draggable="false"><span onclick='CallConfirmation(<?php echo $agent['AgentID'];?>)' class='btn btn-danger btn-sm' style='padding: 0px 10px;font-size: 10px;'>Delete</span></a><?php } ?>
                                                        </div>
                                                    </div>                 
                                                </td>
                                            </tr>
                                        <?php } ?>
                                        <?php if (sizeof($agents)==0){?>
                                               <tr>
                                                <td colspan="7" style="text-align:center">No records found
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
<div class="modal fade" id="ConfirmationPopup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content" id="confrimation_text">    
         
    </div>
  </div>
</div>
<script>
   var loading = "<div style='padding:80px;text-align:center;color:#aaa'><img src='assets/loading.gif'  style='width:80px'><br>Processing ...</div>";
 
 function CallConfirmation(AgentID){
       
            var txt = '<form action="" method="POST" id="DeleteAgentFrm'+AgentID+'">'
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
                                +'Are you sure want to delete agent?<br>'
                            +'</div>'
                        +'</div>'
                     +'</div>'
                     +'<div class="modal-footer">'
                        +'<button type="button" class="btn btn-outline-danger" data-dismiss="modal" >Cancel</button>&nbsp;&nbsp;&nbsp;'
                        +'<button type="button" class="btn btn-danger" onclick="DeleteAgent(\''+AgentID+'\')" >Yes, Confirm</button>'
                     +'</div>'
                +'</form>';  
        $('#confrimation_text').html(txt);                                       
            $('#ConfirmationPopup').modal("show");
    } 
    function DeleteAgent(AgentID) {
     var param = $( "#DeleteAgentFrm"+AgentID).serialize();
    $("#confrimation_text").html(loading);
    $.post( "webservice.php?action=DeleteAgent",param,function(data) {
        var obj = JSON.parse(data); 
        var html = "";                                                                              
        if (obj.status=="failure") {
            html = "<div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='assets/accessdenied.png' style='width:128px'><br><br>"+obj.message+"<br></div></div>";
            html += "<div style='padding:20px;text-align:center'>" + "<button type='button' class='btn btn-outline-danger' data-dismiss='modal'>Cancel</button></div>"; 
        } else {
            html = "<div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='assets/tick.jpg' style='width:128px'><br><br>"+obj.message+"<br></div></div>";
            html += "<div style='padding:20px;text-align:center'>" + "<a href='' class='btn btn-outline-danger'>Continue</a></div>"; 
            $('#ConfirmationPopup').modal("show");
        }                                                                                                 
        $("#confrimation_text").html(html);
        
    });
}
</script>

