<?php
$data = $mysql->select("select * from _tbl_tour_agents where md5(AgentID)='".$_GET['id']."'");
?>
<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">View Agent</div>
                        </div>
                        <form id="exampleValidation" method="POST" action="" >
                            <div class="card-body">
                                <div class="form-group form-show-validation row">
                                    <label for="name" class="col-md-3 text-left">Agent Name</label>
                                    <div class="col-md-9"><?php echo $data[0]['AgentName'];?></div>
                                </div>
                                <div class="form-group form-show-validation row">
                                    <label for="name" class="col-md-3 text-left">Mobile Number</label>
                                    <div class="col-md-9">+91-<?php echo $data[0]['MobileNumber'];?></div>
                                </div>
                                <div class="form-group form-show-validation row">
                                    <label for="name" class="col-md-3 text-left">Email ID</label>
                                    <div class="col-md-9"><?php echo $data[0]['EmailID'];?></div>
                                </div>
                                <div class="form-group form-show-validation row">
                                    <label for="name" class="col-md-3 text-left">Address Line1</label>
                                    <div class="col-md-9"><?php echo $data[0]['AddressLine1'];?></div>
                                </div>
                                <div class="form-group form-show-validation row">
                                    <label for="name" class="col-md-3 text-left">Address Line2</label>
                                    <div class="col-md-9"><?php echo $data[0]['AddressLine2'];?></div>
                                </div>
                                <div class="form-group form-show-validation row">
                                    <label for="name" class="col-md-3 text-left">City Name</label>
                                    <div class="col-md-9"><?php echo $data[0]['CityName'];?></div>
                                </div>
                                <div class="form-group form-show-validation row">
                                    <label for="name" class="col-md-3 text-left">Country Name</label>
                                    <div class="col-md-9"><?php echo $data[0]['CountryName'];?></div>
                                </div>
                                <div class="form-group form-show-validation row">
                                    <label for="name" class="col-md-3 text-left">State Name</label>
                                    <div class="col-md-9"><?php echo $data[0]['StateName'];?></div>
                                </div>
                                <div class="form-group form-show-validation row">
                                    <label for="name" class="col-md-3 text-left">District Name</label>
                                    <div class="col-md-9"><?php echo $data[0]['DistrictName'];?></div>
                                </div>
                                <div class="form-group form-show-validation row">
                                    <label for="name" class="col-md-3 text-left">Login Name</label>
                                    <div class="col-md-9"><?php echo $data[0]['LoginName'];?></div>
                                </div>
                                <div class="form-group form-show-validation row">
                                    <label for="name" class="col-md-3 text-left">Login Password</label>
                                    <div class="col-md-9"><?php echo $data[0]['LoginPassword'];?></div>
                                </div>
                            </div>
                            <div class="card-action">
                                <div class="row">
                                    <div class="col-md-12">
                                        <a href="dashboard.php?action=Agents/list&status=All" class="btn btn-warning btn-border">Back</a>
                                    </div>                                        
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header" style="padding-top:10px;padding-bottom:10px">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="card-title">
                                                Pincode
                                            </div>
                                        </div>
                                        <div class="col-md-6" style="text-align: right;">
                                            <button type="button" onclick="AddAgentPincode('<?php echo md5($data[0]['AgentID']);?>')" class="btn btn-primary btn-xs">Add Pincode</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" style="border: 1px solid #dee2e6;">
                                        <thead>
                                            <tr>
                                                <th scope="col">Pincode</th>
                                                <th scope="col"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $Pincodes = $mysql->select("select * from _tbl_agent_pincode where isactive='1' and  AgentID='".$data[0]['AgentID']."' order by Pincode");   ?>
                                        <?php foreach($Pincodes as $Pincode){ ?>
                                            <tr>
                                                <td><?php echo $Pincode['Pincode'];?></td>
                                                <td style="text-align: right">                                                   
                                                    <div class="dropdown dropdown-kanban" style="float: right;">
                                                        <button class="" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border:none;font-size:14px;background:none !important;padding-right:0px;margin-right:0px;cursor:pointer">
                                                            <i class="icon-options-vertical"></i>
                                                        </button>                                                                                                        
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                            <a class="dropdown-item" draggable="false" href="javascript:void(0)" onclick="EditAgentPincode('<?php echo md5($Pincode['PincodeID']);?>')">Edit</a>
                                                            <a class="dropdown-item" draggable="false"><span onclick='CallConfirmationDeleteAgentpincode(<?php echo $Pincode['PincodeID'];?>)' class='btn btn-danger btn-sm' style='padding: 0px 10px;font-size: 10px;'>Delete</span></a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                        <?php if(sizeof($Pincodes)==0){ ?>
                                            <tr>
                                                <td colspan="2" style="text-align: center;">No records found</td>
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
 var loading = "<div class='modal-body' style='padding:10px;'><div class='form-group row'><div class='col-sm-12' style='text-align:center'><div  style='padding:80px;text-align:center;color:#aaa;text-align:center'><img src='assets/loading.gif'  style='width:80px'><br>Processing ...</div></div></div>";
 function AddAgentPincode(AgentID) {   
        $("#confrimation_text").html(loading);
        $.ajax({url:'webservice.php?action=AddAgentPincode&AgentID='+AgentID,success:function(data){
            $("#confrimation_text").html(data);
            $('#ConfirmationPopup').modal("show");
        }});
    }
 function SaveAgentPincode() {
         var param = $( "#AgentPincodeFrom").serialize();
        $("#confrimation_text").html(loading);
        $.post( "webservice.php?action=SubmitAgentPincode",param,function(data) {                                       
            var obj = JSON.parse(data); 
            var html = "";                                                                              
            if (obj.status=="failure") {
                html = "<div class='modal-body' style='padding:10px;'><div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='assets/accessdenied.png' style='width:128px;margin:0px auto'><br><br>"+obj.message+"<br></div></div>";                          
                html += "<div style='padding:20px;text-align:center'>" + "<button type='button' class='btn btn-primary' data-dismiss='modal'>Cancel</button></div></div>"; 
            } else {
                html = "<div class='modal-body' style='padding:10px;'><div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='assets/tick.jpg' style='width:128px;margin:0px auto'><br><h5 style='line-height:30px;font-size: 16px;margin-bottom:0px'>"+obj.message+"</h5><br><a href='' class='btn btn-primary'>Continue</button></div></div>";
                html += "</div>"; 
                $('#ConfirmationPopup').modal("show");
            }
            $("#confrimation_text").html(html);
            
        });
    }
 function EditAgentPincode(PincodeID) {   
        $("#confrimation_text").html(loading);
        $.ajax({url:'webservice.php?action=EditAgentPincode&PincodeID='+PincodeID,success:function(data){
            $("#confrimation_text").html(data);
            $('#ConfirmationPopup').modal("show");
        }});
    }
 function UpdateAgentPincode() {
        var param = $( "#EditAgentPincodeFrom").serialize();
        $("#confrimation_text").html(loading);
        $.post( "webservice.php?action=SubmitUpdateAgentPincode",param,function(data) {                                       
            var obj = JSON.parse(data); 
            var html = "";                                                                              
            if (obj.status=="failure") {                                                                                                                                                                                                                                                                 
                html = "<div class='modal-body' style='padding:10px;'><div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='assets/accessdenied.png' style='width:128px;margin:0px auto'><br><br>"+obj.message+"<br></div></div>";                          
                html += "<div style='padding:20px;text-align:center'>" + "<button type='button' class='btn btn-primary' data-dismiss='modal'>Cancel</button></div></div>"; 
            } else {
                html = "<div class='modal-body' style='padding:10px;'><div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='assets/tick.jpg' style='width:128px;margin:0px auto'><br><h5 style='line-height:30px;font-size: 16px;margin-bottom:0px'>"+obj.message+"</h5><br><a href='' class='btn btn-primary'>Continue</button></div></div>";
                html += "</div>"; 
                $('#ConfirmationPopup').modal("show");
            }
            $("#confrimation_text").html(html);
            
        });
    }
    function CallConfirmationDeleteAgentpincode(PincodeID){
       
            var txt = '<form action="" method="POST" id="DeletePincodeFrm'+PincodeID+'">'
                    +'<input type="hidden" value="'+PincodeID+'" id="PincodeID" Name="PincodeID">'
                     +'<div class="modal-header" style="padding-bottom:5px">'
                        +'<h4 class="heading"><strong>Confirmation</strong> </h4>'
                        +'<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:white">'
                            +'<span aria-hidden="true" style="color:black">&times;</span>'
                        +'</button>'
                     +'</div>'
                     +'<div class="modal-body">'
                        +'<div class="form-group row">'                                                            
                            +'<div class="col-sm-12">'
                                +'Are you sure want to delete pincode?<br>'
                            +'</div>'
                        +'</div>'
                     +'</div>'
                     +'<div class="modal-footer">'
                        +'<button type="button" class="btn btn-outline-danger" data-dismiss="modal" >Cancel</button>&nbsp;&nbsp;&nbsp;'
                        +'<button type="button" class="btn btn-danger" onclick="DeleteAgentPincode(\''+PincodeID+'\')" >Yes, Confirm</button>'
                     +'</div>'
                +'</form>';  
        $('#confrimation_text').html(txt);                                       
            $('#ConfirmationPopup').modal("show");
    } 
    function DeleteAgentPincode(PincodeID) {
     var param = $( "#DeletePincodeFrm"+PincodeID).serialize();
    $("#confrimation_text").html(loading);
    $.post( "webservice.php?action=DeleteAgentPincode",param,function(data) {
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