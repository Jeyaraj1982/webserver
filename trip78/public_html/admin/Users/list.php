<?php 
    if($_GET['status']=="All"){ 
        $users = $mysql->select("select * from _tbl_users order by UserID desc");
        $title ="All Users";
    }
    if($_GET['status']=="Active"){ 
        $users = $mysql->select("select * from _tbl_users where IsActive='1' order by UserID desc");    
        $title ="Active Users";
    }
    if($_GET['status']=="Deactive"){ 
        $users = $mysql->select("select * from _tbl_users where IsActive='0' order by UserID desc");
        $title ="Deactive Users";
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
                                        Manage UserID
                                    </div>
                                    <span><?php echo $title;?></span>
                                </div>
                                <div class="col-md-6" style="text-align: right;">
                                    <a href="dashboard.php?action=Users/list&status=All" <?php if($_GET['status']=="All"){ ?>style="text-decoration:underline;font-weight:bold"<?php } ?>>All</a>&nbsp;|&nbsp;
                                    <a href="dashboard.php?action=Users/list&status=Active" <?php if($_GET['status']=="Active"){ ?>style="text-decoration:underline;font-weight:bold"<?php } ?>>Active</a>&nbsp;|&nbsp;
                                    <a href="dashboard.php?action=Users/list&status=Deactive" <?php if($_GET['status']=="Deactive"){ ?>style="text-decoration:underline;font-weight:bold"<?php } ?>>Deactive</a>&nbsp;&nbsp;
                                    <a href="dashboard.php?action=Users/add" class="btn btn-primary btn-xs">Add User</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="alert alert-primary" role="alert" style="background: #F3F8FF;margin-bottom:0px">
                              <b>User Login Url</b> <br> https://www.trip78.in/login.php                       
                            </div>
                            <div class="table-responsive">
                                 <table class="table table-striped mt-3">
                                        <thead>
                                            <tr>
                                                <th scope="col">User Name</th>
                                                <th scope="col">Mobile Number</th>
                                                <th scope="col">Email ID</th>
                                                <th scope="col">PinCode</th>
                                                <th scope="col"> </th>
                                            </tr>
                                        </thead>                    
                                        <tbody>
                                        <?php foreach($users as $user){ ?>
                                            <tr>
                                                <td><?php echo $user['UserName'];?></td>
                                                <td><?php echo $user['MobileNumber'];?></td>
                                                <td><?php echo $user['EmailID'];?></td>
                                                <td><?php echo $user['PinCode'];?></td>
                                                <td style="text-align: right">                                                   
                                                    <div class="dropdown dropdown-kanban" style="float: right;">
                                                        <button class="" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border:none;font-size:14px;background:none !important;padding-right:0px;margin-right:0px;cursor:pointer">
                                                            <i class="icon-options-vertical"></i>
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                            <a class="dropdown-item" href="dashboard.php?action=Users/edit&id=<?php echo md5($user['UserID']);?>" draggable="false">Edit</a>
                                                            <a class="dropdown-item" href="dashboard.php?action=Users/view&id=<?php echo md5($user['UserID']);?>" draggable="false">View</a>
                                                            <!--<?php if($pincode[0]['cnt']=="0"){ ?><a class="dropdown-item" draggable="false"><span onclick='CallConfirmation(<?php echo $agent['AgentID'];?>)' class='btn btn-danger btn-sm' style='padding: 0px 10px;font-size: 10px;'>Delete</span></a><?php } ?>-->
                                                        </div>
                                                    </div>                 
                                                </td>
                                            </tr>
                                        <?php } ?>
                                        <?php if (sizeof($users)==0){?>
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

