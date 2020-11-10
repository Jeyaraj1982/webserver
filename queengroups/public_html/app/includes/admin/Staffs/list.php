 <?php 
    if($_GET['status']=="All"){ 
        $Staffs = $mysql->select("select * from _queen_staffs order by StaffID desc");
        $title="All Staffs";
    }if($_GET['status']=="Active"){
        $Staffs = $mysql->select("select * from _queen_staffs where IsActive='1' order by StaffID desc");
        $title="Active Staffs";
    }if($_GET['status']=="Deactive"){
        $Staffs = $mysql->select("select * from _queen_staffs where IsActive='0' order by StaffID desc");
        $title="Blocked Staffs";
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
                                        Manage Staffs
                                    <br>
                                    <span style="font-size: 15px"><?php echo $title;?></span>  </div>
                                </div>
                                <div class="col-md-8" style="text-align: right;">
                                    <a href="dashboard.php?action=Staffs/add" class="btn btn-primary btn-xs">Add Staff</a><br>
                                    <a href="dashboard.php?action=Staffs/list&status=All" <?php if($_GET['status']=="All"){ ?> style="font-size:bold;text-decoration:underline;"<?php } ?>>All</a>&nbsp;|&nbsp;
                                    <a href="dashboard.php?action=Staffs/list&status=Active" <?php if($_GET['status']=="Active"){ ?> style="font-size:bold;text-decoration:underline;"<?php } ?>>Active</a>&nbsp;|&nbsp;
                                    <a href="dashboard.php?action=Staffs/list&status=Deactive" <?php if($_GET['status']=="Deactive"){ ?> style="font-size:bold;text-decoration:underline;"<?php } ?>>Blocked</a>
                                </div>
                            </div>
                        </div>                                       
                        <div class="card-body">                                                                                                                                             
                            <div class="table-responsive">
                                 <table class="table table-striped mt-3">
                                        <thead>
                                            <tr>
                                                <th scope="col">Staff Code</th>
                                                <th scope="col">Staff Name</th>
                                                <th scope="col">Login Name</th>
                                                <th scope="col">Created On</th>
                                                <?php if($_GET['status']=="All"){ ?><th scope="col">Status</th><?php } ?>
                                                <th scope="col"> </th>
                                            </tr>                            
                                        </thead>
                                        <tbody>
                                        
                                        <?php foreach($Staffs as $Staff){ ?>
                                       <tr>
                                                <td><?php echo $Staff['StaffCode'];?></td>
                                                <td><?php echo $Staff['StaffName'];?></td>
                                                <td><?php echo $Staff['LoginName'];?></td>
                                                <td><?php echo date("d M, Y, H:i",strtotime($Staff['CreatedOn']));?></td>
                                                <?php if($_GET['status']=="All"){ ?><td><?php if($Staff['IsActive']=="1") { echo "Active"; } else { echo "Blocked";}?></td><?php } ?>
                                                <td style="text-align: right">                                                   
                                                        <div class="dropdown dropdown-kanban" style="float: right;">
                                                            <button class="" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border:none;font-size:14px;background:none !important;padding-right:0px;margin-right:0px;cursor:pointer">
                                                                <i class="icon-options-vertical"></i>
                                                            </button>
                                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                                <a class="dropdown-item" href="dashboard.php?action=Staffs/edit&id=<?php echo md5($Staff['StaffID']);?>" draggable="false">Edit</a>
                                                                <a class="dropdown-item" href="dashboard.php?action=Staffs/view&id=<?php echo md5($Staff['StaffID']);?>" draggable="false">View</a>
                                                                <a class="dropdown-item" draggable="false"><span onclick='CallConfirmation(<?php echo $Staff['StaffID'];?>)' class='btn btn-danger btn-sm' style='padding: 0px 10px;font-size: 10px;'>Delete</span></a>
                                                            </div>
                                                        </div>
                                                    </td>
                                            </tr>
                                        <?php } if(sizeof($Staffs)=="0"){ ?>
                                            <tr>
                                                <td style="text-align: center;" colspan="5">No Staffs found</td>
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
 
 function CallConfirmation(StaffID){
    var text = '<form action="" method="POST" id="StaffFrm_'+StaffID+'">'
                    +'<input type="hidden" value="'+StaffID+'" id="StaffID" Name="StaffID">'
                     +'<div class="modal-header" style="padding-bottom:5px">'
                        +'<h4 class="heading"><strong>Confirmation</strong> </h4>'
                        +'<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:white">'
                            +'<span aria-hidden="true" style="color:black">&times;</span>'
                        +'</button>'
                     +'</div>'
                     +'<div class="modal-body">'
                        +'<div class="form-group row">'                                                            
                            +'<div class="col-sm-12">'
                                +'Are you sure want to delete staff?<br>'
                            +'</div>'
                        +'</div>'
                     +'</div>'
                     +'<div class="modal-footer">'
                        +'<button type="button" class="btn btn-outline-danger" data-dismiss="modal" >Cancel</button>&nbsp;&nbsp;&nbsp;'
                        +'<button type="button" class="btn btn-danger" onclick="DeleteStaff(\''+StaffID+'\')" >Yes, Confirm</button>'
                     +'</div>'
                +'</form>';  
        $('#xconfrimation_text').html(text);                                       
        $('#ConfirmationPopup').modal("show");
}                                                                                                 
 
 function DeleteStaff(StaffID) {
     var param = $( "#StaffFrm_"+StaffID).serialize();
    $("#confrimation_text").html(loading);
    $.post( "webservice.php?action=DeleteStaff",param,function(data) {                 
        var obj = JSON.parse(data); 
        var html = "";                                                                              
        if (obj.status=="failure") {
            html = "<div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='../assets/accessdenied.png' style='width:128px'><br>Couldn't be Deleted<br>"+obj.message+"<br></div></div>";
            html += "<div style='padding:20px;text-align:center'>" + "<button type='button' class='btn btn-outline-success' data-dismiss='modal'>Cancel</button></div>"; 
        }if (obj.status=="Success") {
            html = "<div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='../assets/tick.jpg' style='width:128px'><br><br>"+obj.message+"<br></div></div>";
            html += "<div style='padding:20px;text-align:center'>" + "<a href='dashboard.php?action=Staffs/list&status=All' class='btn btn-outline-success'>Continue</a></div>"; 
        }
        $("#xconfrimation_text").html(html);
        
    });
}
</script>