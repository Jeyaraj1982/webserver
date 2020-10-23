 <?php 
    if($_GET['status']=="All"){ 
        $Users = $mysql->select("select * from _tbl_sales_admin where IsAdmin='0' order by AdminID Desc");
        $title="All Users";
    }if($_GET['status']=="Active"){
        $Users = $mysql->select("select * from _tbl_sales_admin where IsAdmin='0' and IsActive='1' order by AdminID Desc");
        $title="Active Users";
    }if($_GET['status']=="Blocked"){
        $Users = $mysql->select("select * from _tbl_sales_admin where IsAdmin='0' and IsActive='0' order by AdminID Desc");
        $title="Disable Users";
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
                                        Manage Users <br>
                                    <span style="font-size: 15px"><?php echo $title;?></span>
                                    </div>
                                </div>
                                <div class="col-md-6" style="text-align: right;">
                                    <a href="dashboard.php?action=Users/add" class="btn btn-primary btn-xs">Add User</a><br>
                                    <a href="dashboard.php?action=Users/list&status=All" <?php if($_GET['status']=="All"){ ?> style="font-size:bold;text-decoration:underline;"<?php } ?>>All Users</a>&nbsp;|&nbsp;
                                    <a href="dashboard.php?action=Users/list&status=Active" <?php if($_GET['status']=="Active"){ ?> style="font-size:bold;text-decoration:underline;"<?php } ?>>Active Users</a>&nbsp;|&nbsp;
                                    <a href="dashboard.php?action=Users/list&status=Blocked" <?php if($_GET['status']=="Blocked"){ ?> style="font-size:bold;text-decoration:underline;"<?php } ?>>Deactive Users</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                 <table class="table table-striped mt-3">
                                        <thead>
                                            <tr>
                                                <th scope="col">User Code</th>
                                                <th scope="col">User Name</th>
                                                <th scope="col">Created On</th>
                                                <th scope="col"> </th>                                                  
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach($Users as $User){ ?>
                                            <tr>
                                                <td><?php echo $User['AdminCode'];?></td>
                                                <td><?php echo $User['UserName'];?></td>
                                                <td><?php echo $User['CreatedOn'];?></td>
                                                <td style="text-align: right">
                                                    <div class="dropdown dropdown-kanban" style="float: right;">
                                                        <button class="" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border:none;font-size:14px;background:none !important;padding-right:0px;margin-right:0px;cursor:pointer">
                                                            <i class="icon-options-vertical"></i>
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                            <a class="dropdown-item" href="dashboard.php?action=Users/edit&id=<?php echo md5($User['AdminID']);?>" draggable="false">Edit</a>
                                                            <a class="dropdown-item" href="dashboard.php?action=Users/view&id=<?php echo md5($User['AdminID']);?>" draggable="false">View</a>
                                                            <a class="dropdown-item" draggable="false"><span onclick='CallConfirmation(<?php echo $User['AdminID'];?>)' class='btn btn-danger btn-sm' style='padding: 0px 10px;font-size: 10px;'>Delete</span></a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php } if(sizeof($User)=="0"){ ?>
                                            <tr>
                                                <td style="text-align: center;" colspan="7">No Users found</td>
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
    <div class="modal-content">
      <div class="modal-body" id="confrimation_text" style="padding:10px;">
         
         <div id="xconfrimation_text" style="text-align: center;font-size:15px;"></div>  
      </div>
    </div>
  </div>
</div>
<script>
   var loading = "<div style='padding:80px;text-align:center;color:#aaa'><img src='http://japps.online/tour/admin/assets/loading.gif'  style='width:80px'><br>Processing ...</div>";
 
 function CallConfirmation(UserUserID){
    var txt = '<form action="" method="POST" id="UserFrm_'+UserID+'">'
                    +'<input type="hidden" value="'+UserID+'" id="UserID" Name="UserID">'
                    +'<div class="form-group row">'
                    +'<div class="col-sm-12" style="text-align:center">'
                        +'CONFIRMATION'
                    +'</div>'
               +'</div>'
               +'<div class="form-group row">'
                    +'<div class="col-sm-12" style="text-align:left">'
                    +'Are you sure want to delete User?'
                    +'</div>'
                +'</div>'
                +'<div style="padding:20px;text-align:center">'
                    +'<button type="button" class="btn btn-outline-danger" data-dismiss="modal" >Cancel</button>&nbsp;&nbsp;&nbsp;'
                    +'<button type="button" class="btn btn-success" onclick="DeleteUser(\''+UserID+'\')" >Yes, Confirm</button>'
                 +'</div></form>';  
        $('#xconfrimation_text').html(txt);                                       
        $('#ConfirmationPopup').modal("show");
}                                                                                                 
 
 function DeleteUser(Userid) {
     var param = $( "#UserFrm_"+Userid).serialize();
    $("#confrimation_text").html(loading);
    $.post( "http://masflowers.in/admin/webservice.php?action=DeleteUser",param,function(data) {
        var obj = JSON.parse(data); 
        var html = "";                                                                              
        if (obj.status=="failure") {
            html = "<div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='http://japps.online/tour/admin/assets/accessdenied.png' style='width:128px'><br><br>"+obj.message+"<br></div></div>";
            html += "<div style='padding:20px;text-align:center'>" + "<button type='button' class='btn btn-outline-success' data-dismiss='modal'>Cancel</button></div>"; 
        } else {
            html = "<div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='http://japps.online/tour/admin/assets/tick.jpg' style='width:128px'><br><br>"+obj.message+"<br></div></div>";
            html += "<div style='padding:20px;text-align:center'>" + "<a href='dashboard.php?action=Users/list&status=All' class='btn btn-outline-success'>Continue</a></div>"; 
            $('#ConfirmationPopup').modal("show");
        }
        $("#confrimation_text").html(html);
        
    });
}
</script>
