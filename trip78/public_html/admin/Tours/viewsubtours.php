<?php 
    $tours = $mysql->select("select * from _tbl_sub_tour where md5(TourTypeID)='".$_GET['id']."' order by SubTourTypeID desc");
    $t= $mysql->Select("select * from _tbl_tour where TourTypeID='".$tours[0]['TourTypeID']."'");
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
                                        Manage Sub Tour Type ( <?php echo $t[0]['TourTypeName'];?> )
                                    </div>
                                </div>
                                <div class="col-md-6" style="text-align: right;">
                                    <a href="dashboard.php?action=SubTours/add" class="btn btn-primary btn-xs">Add Sub Tour</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                 <table class="table table-striped mt-3">
                                        <thead>
                                            <tr>
                                                <th scope="col"></th>
                                                <th scope="col">Sub Tour Name</th>
                                                <th scope="col" style="text-align: right">Active Packages</th>                           
                                                <th scope="col" style="text-align: right">Deactive Packages</th>                           
                                                <th scope="col"> </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach($tours as $tour){  ?>
                                        <?php $packages= $mysql->Select("SELECT COUNT(PackageID) AS cnt FROM _tbl_tours_package where SubTourTypeID='".$tour['SubTourTypeID']."' and IsPublish='1'"); ?>
                                        <?php $dpackages= $mysql->Select("SELECT COUNT(PackageID) AS cnt FROM _tbl_tours_package where SubTourTypeID='".$tour['SubTourTypeID']."' and IsPublish='0'"); ?>
                                            <tr>
                                                <td style="width:50px"><img src="../<?php echo "uploads/".$tour['Image'];?>" style='width: 50px;height:50px;margin-top: 5px;'></td>
                                                <td><?php echo $tour['SubTourTypeName'];?></td>
                                                <td style="text-align: right"><?php echo $packages[0]['cnt'];?></td>
                                                <td style="text-align: right"><?php echo $dpackages[0]['cnt'];?></td>
                                                <td style="text-align: right">                                                   
                                                    <div class="dropdown dropdown-kanban" style="float: right;">
                                                        <button class="" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border:none;font-size:14px;background:none !important;padding-right:0px;margin-right:0px;cursor:pointer">
                                                            <i class="icon-options-vertical"></i>
                                                        </button>                                                                                                        
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                            <a class="dropdown-item" href="dashboard.php?action=SubTours/edit&id=<?php echo md5($tour['SubTourTypeID']);?>" draggable="false">Edit</a>
                                                            <a class="dropdown-item" href="dashboard.php?action=SubTours/view&id=<?php echo md5($tour['SubTourTypeID']);?>" draggable="false">View</a>
                                                            <a class="dropdown-item" href="dashboard.php?action=SubTours/viewpackages&id=<?php echo md5($tour['SubTourTypeID']);?>" draggable="false">View Packages</a>
                                                            <?php if($packages[0]['cnt']=="0"){ ?><a class="dropdown-item" draggable="false"><span onclick='CallConfirmation(<?php echo $tour['SubTourTypeID'];?>)' class='btn btn-danger btn-sm' style='padding: 0px 10px;font-size: 10px;'>Delete</span></a><?php } ?>
                                                        </div>
                                                    </div>
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
    <div class="modal-content">
      <div class="modal-body" id="confrimation_text" style="padding:10px;">
         
         <div id="xconfrimation_text" style="text-align: center;font-size:15px;"></div>  
      </div>
    </div>
  </div>
</div>
<script>
   var loading = "<div style='padding:80px;text-align:center;color:#aaa'><img src='assets/loading.gif'  style='width:80px'><br>Processing ...</div>";
 
 function CallConfirmation(SubTourID){
    var txt = '<form action="" method="POST" id="TourFrm_'+SubTourID+'">'
                    +'<input type="hidden" value="'+SubTourID+'" id="SubTourTypeID" Name="SubTourTypeID">'
                    +'<div class="form-group row">'
                    +'<div class="col-sm-12" style="text-align:center">'
                        +'CONFIRMATION'
                    +'</div>'
               +'</div>'
               +'<div class="form-group row">'
                    +'<div class="col-sm-12" style="text-align:left">'
                    +'Are you sure want to delete sub tour type?'
                    +'</div>'
                +'</div>'                             
                +'<div style="padding:20px;text-align:center">'
                    +'<button type="button" class="btn btn-outline-danger" data-dismiss="modal" >Cancel</button>&nbsp;&nbsp;&nbsp;'
                    +'<button type="button" class="btn btn-success" onclick="DeleteSubTourType(\''+SubTourID+'\')" >Yes, Confirm</button>'
                 +'</div></form>';  
        $('#xconfrimation_text').html(txt);                                       
        $('#ConfirmationPopup').modal("show");
}                                                                                                 
 
 function DeleteSubTourType(SubTourID) {
     var param = $( "#TourFrm_"+SubTourID).serialize();
    $("#confrimation_text").html(loading);
    $.post( "webservice.php?action=DeleteSubTourType",param,function(data) {
        var obj = JSON.parse(data); 
        var html = "";                                                                              
        if (obj.status=="failure") {
            html = "<div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='assets/accessdenied.png' style='width:128px'><br><br>"+obj.message+"<br></div></div>";
            html += "<div style='padding:20px;text-align:center'>" + "<button type='button' class='btn btn-outline-danger' data-dismiss='modal'>Cancel</button></div>"; 
        } else {
            html = "<div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='assets/tick.jpg' style='width:128px'><br><br>"+obj.message+"<br></div></div>";
            html += "<div style='padding:20px;text-align:center'>" + "<a href='dashboard.php?action=Tours/viewsubtours&id="+id+"' class='btn btn-outline-danger'>Continue</a></div>"; 
            $('#ConfirmationPopup').modal("show");
        }
        $("#confrimation_text").html(html);
        
    });
}
</script>
