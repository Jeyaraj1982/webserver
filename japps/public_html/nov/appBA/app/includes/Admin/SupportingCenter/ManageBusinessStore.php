<?php 
if($_GET['filter']=="all"){
   $stores = $mysql->select("select * from _tbl_store_types order by StoreTypeID desc"); 
}if($_GET['filter']=="active"){
   $stores = $mysql->select("select * from _tbl_store_types where IsActive='1' order by StoreTypeID desc"); 
}if($_GET['filter']=="deactive"){
   $stores = $mysql->select("select * from _tbl_store_types where IsActive='0' order by StoreTypeID desc"); 
}
?>
<div style="padding:25px">
    <div class="page-header">
        <ul class="breadcrumbs" style="border: none;padding-left: 0px;margin-left: 0px;">
            <li class="nav-home"><a href="dashboard.php"><i class="flaticon-home"></i></a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=SupportingCenter/ManageBusinessStore">Business Supporting Center</a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=SupportingCenter/ManageBusinessStore">Manage Business Store Type</a></li>
        </ul>
    </div>
    <div class="row" style="margin-bottom:10px;">
        <div class="col-md-12" style="text-align: right;">
            <a href="dashboard.php?action=SupportingCenter/NewStore" style="color:orange" ><small>New</small></a>&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="dashboard.php?action=SupportingCenter/ManageBusinessStore&filter=active" ><small>Active</small></a>&nbsp;|&nbsp;
            <a href="dashboard.php?action=SupportingCenter/ManageBusinessStore&filter=deactive"><small>Deactive</small></a>&nbsp;|&nbsp;
            <a href="dashboard.php?action=SupportingCenter/ManageBusinessStore&filter=all"><small>All</small></a> 
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12 col-xlg-12 col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Manage Business Store Type</h4>
                    <span><?php echo $title;?></span>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped mt-3">
                            <thead>
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col">Store Type Name</th>
                                    <th scope="col" style="text-align: right;">No of Stores</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                            
                            <?php foreach($stores as $store){ ?>
                                <tr>
                                    <td><img src="assets/stores/<?php echo $store['StoreTypeImage'];?>" style="height:100px;width: 100px;"></td>
                                    <td><?php echo $store['StoreTypeName'];?></td>
                                    <td style="text-align: right;"><?php echo sizeof($mysql->select("select * from _tbl_business_supporting_center where StoreTypeID='".$store['StoreTypeID']."'"));?></td>
                                    <td style="text-align: right;">
                                        <div class="dropdown dropdown-kanban" style="float: right;">
                                        <button class="" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border:none;font-size:14px;background:none !important;padding-right:0px;margin-right:0px;cursor:pointer">
                                            <i class="icon-options-vertical"></i>
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="dashboard.php?action=SupportingCenter/EditStore&id=<?php echo $store['StoreTypeID'];?>" draggable="false">Edit</a>
                                            <a class="dropdown-item" href="dashboard.php?action=SupportingCenter/ViewStores&id=<?php echo $store['StoreTypeID'];?>" draggable="false">View Stores</a>
                                            <a class="dropdown-item" draggable="false"><span onclick='CallConfirmation(<?php echo $store['StoreTypeID'];?>)' class='btn btn-danger btn-sm' style='padding: 0px 10px;font-size: 10px;'>Delete</span></a>
                                        </div>
                                    </div>     
                                    </td>
                                </tr>
                            <?php } ?>                                                      
                            <?php if(sizeof($stores)==0){ ?>
                                <tr>
                                    <td colspan="3" style="text-align: center;">No Store Types Found</td>
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
<div class="modal fade right" id="ConfirmationPopup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static" style="top: 0px !important;">
  <div class="modal-dialog modal-side modal-bottom-right modal-notify modal-danger" role="document" >
    <div class="modal-content" >
    <div id="xconfrimation_text"></div>
    </div>
  </div>
</div>
<script>
 function CallConfirmation(StoreTypeID){
    var text = '<form action="" method="POST" id="DeleteStoreFrm'+StoreTypeID+'">'
                    +'<input type="hidden" value="'+StoreTypeID+'" id="StoreTypeID" Name="StoreTypeID">'
                     +'<div class="modal-header" style="padding-bottom:5px">'
                        +'<h4 class="heading"><strong>Confirmation</strong> </h4>'
                        +'<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:white">'
                            +'<span aria-hidden="true" style="color:black">&times;</span>'
                        +'</button>'
                     +'</div>'
                     +'<div class="modal-body">'
                        +'<div class="form-group row">'                                                            
                            +'<div class="col-sm-12">'
                                +'Are you sure want to delete store?<br>'
                            +'</div>'
                        +'</div>'
                     +'</div>'
                     +'<div class="modal-footer">'
                        +'<button type="button" class="btn btn-outline-danger" data-dismiss="modal" >Cancel</button>&nbsp;&nbsp;&nbsp;'
                        +'<button type="button" class="btn btn-danger" onclick="DeleteStore(\''+StoreTypeID+'\')" >Yes, Confirm</button>'
                     +'</div>'
                +'</form>';  
        $('#xconfrimation_text').html(text);                                       
        $('#ConfirmationPopup').modal("show");
}                                                                                                 
 
 function DeleteStore(StoreTypeID) {
     var param = $( "#DeleteStoreFrm"+StoreTypeID).serialize();
    //$("#confrimation_text").html(loading);
    $.post( "webservice.php?action=DeleteStore",param,function(data) {                 
        var obj = JSON.parse(data); 
        var html = "";                                                                              
        if (obj.status=="failure") {
            html = "<div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='assets/imge/accessdenied.png' style='width:128px'><br><br>"+obj.message+"<br></div></div>";
            html += "<div style='padding:20px;text-align:center'>" + "<button type='button' class='btn btn-outline-success' data-dismiss='modal'>Cancel</button></div>"; 
        }if (obj.status=="Success") {
            html = "<div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='assets/img/tick.jpg' style='width:128px'><br><br>"+obj.message+"<br></div></div>";
            html += "<div style='padding:20px;text-align:center'>" + "<a href='dashboard.php?action=SupportingCenter/ManageBusinessStore&filter=all' class='btn btn-outline-success'>Continue</a></div>"; 
        }
        $("#xconfrimation_text").html(html);
        
    });
}
</script>
