
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
                                        Hotel Names
                                    </div>
                                </div>
                                <div class="col-md-6" style="text-align: right;">
                                    <a href="dashboard.php?action=Hotel/Hotels/AddHotel" class="btn btn-primary btn-xs">Add Hotel</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                 <table class="table table-striped mt-3">
                                        <thead>
                                            <tr>
                                                <th scope="col"></th>
                                                <th scope="col">Hotel Name</th>
                                                <th scope="col">Place</th>
                                                <th scope="col" style="text-align: right">Packages</th>    
                                                <th scope="col"> </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $tours = $mysql->select("select * from _tbl_hotels where IsActive='1' order by HotelID desc");?>
                                        <?php foreach($tours as $tour){
                                            $place= $mysql->Select("select * from _tbl_hotel_citynames where HotelCityNameID='".$tour['HotelCityNameID']."'");
                                            $packages= $mysql->Select("select * from _tbl_hotels_packages where  IsActive='1' and HotelID='".$tour['HotelID']."'");
                                            ?>
                                       
                                            <tr>
                                                <td><img src="../<?php echo "../assets/hotel/".$tour['HotelThumb'];?>" style='width: 50px;height:50px;margin-top: 5px;'></td>
                                                <td><?php echo $tour['HotelName'];?></td>
                                                <td style="text-align: Left"><?php echo $place[0]['CityName'];?></td>
                                                <td style="text-align: right"><?php echo sizeof($packages);?></td>
                                                
                                                <td style="text-align: right">                                                   
                                                    <div class="dropdown dropdown-kanban" style="float: right;">
                                                        <button class="" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border:none;font-size:14px;background:none !important;padding-right:0px;margin-right:0px;cursor:pointer">
                                                            <i class="icon-options-vertical"></i>
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                            <a class="dropdown-item" href="dashboard.php?action=Hotel/Hotels/EditHotel&Hotel=<?php echo md5($tour['HotelID']);?>" draggable="false">Edit</a>
                                                            <a class="dropdown-item" href="dashboard.php?action=Hotel/Hotels/ViewHotel&Hotel=<?php echo md5($tour['HotelID']);?>" draggable="false">View</a>
                                                            <a class="dropdown-item" href="dashboard.php?action=Hotel/Hotels/viewpackages&Hotel=<?php echo md5($tour['HotelID']);?>" draggable="false">View Packages</a>
                                                            <!--<?php if(sizeof($packages)==0){ ?><a class="dropdown-item" draggable="false"><span onclick='CallConfirmation(<?php echo $tour['SubTourTypeID'];?>)' class='btn btn-danger btn-sm' style='padding: 0px 10px;font-size: 10px;'>Delete</span></a><?php } ?>-->
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
            html += "<div style='padding:20px;text-align:center'>" + "<a href='' class='btn btn-outline-danger'>Continue</a></div>"; 
            $('#ConfirmationPopup').modal("show");
        }
        $("#confrimation_text").html(html);
        
    });
}
</script>
