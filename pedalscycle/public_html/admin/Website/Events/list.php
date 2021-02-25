
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
                                        Manage Sliders
                                    </div>
                                </div>                                                    
                                <div class="col-md-6" style="text-align: right;">
                                    <a href="dashboard.php?action=Website/Sliders/add" class="btn btn-primary btn-xs">Add Slider</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                 <table class="table table-striped mt-3">
                                        <thead>
                                            <tr>
                                                <th scope="col">Slider</th>
                                                <th scope="col"> </th>
                                                <th scope="col"> </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $sliders = $mysql->select("select * from _tbl_sliders where IsActive='1'");?>
                                        <?php foreach($sliders as $slider){ ?>
                                            <tr>
                                                <td><img src="<?php echo "../assets/sliders/".$slider['SliderImage'];?>" style='height:100px;margin-top: 5px;'></td>
                                                <td>
                                                    <?php
                                                        echo $slider['SliderTitle']."<br>";
                                                        echo $slider['SliderDescription']."<br>";
                                                        echo $slider['ButtonName']."<br>";
                                                        echo $slider['ButtonLink']."<br>";
                                                    ?>
                                                   <div>
                                                    <a href="dashboard.php?action=Website/Sliders/edit&slider=<?php echo $slider['SliderID'];?>" class="btn btn-primary btn-sm"  style='padding: 0px 10px;font-size: 10px;'>Edit</a>
                                                   </div>
                                                </td>
                                                <td style="text-align: right"><span onclick='CallConfirmation(<?php echo $slider['SliderID'];?>)' class='btn btn-danger btn-sm' style='padding: 0px 10px;font-size: 10px;'>Delete</span></td>
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
 
 function CallConfirmation(SliderID){
    var txt = '<form action="" method="POST" id="SliderFrm_'+SliderID+'">'
                    +'<input type="hidden" value="'+SliderID+'" id="SliderID" Name="SliderID">'
                    +'<div class="form-group row">'
                    +'<div class="col-sm-12" style="text-align:center">'
                        +'CONFIRMATION'
                    +'</div>'
               +'</div>'
               +'<div class="form-group row">'
                    +'<div class="col-sm-12" style="text-align:left">'
                    +'Are you sure want to delete slider?'
                    +'</div>'
                +'</div>'
                +'<div style="padding:20px;text-align:center">'
                    +'<button type="button" class="btn btn-outline-danger" data-dismiss="modal" >Cancel</button>&nbsp;&nbsp;&nbsp;'
                    +'<button type="button" class="btn btn-success" onclick="DeleteSlider(\''+SliderID+'\')" >Yes, Confirm</button>'
                 +'</div></form>';  
        $('#xconfrimation_text').html(txt);                                       
        $('#ConfirmationPopup').modal("show");
}                                                                                                 
 
 function DeleteSlider(SliderID) {
     var param = $( "#SliderFrm_"+SliderID).serialize();          
    $("#confrimation_text").html(loading);
    $.post( "webservice.php?action=DeleteSlider",param,function(data) {
        var obj = JSON.parse(data); 
        var html = "";                                                                              
        if (obj.status=="failure") {
            html = "<div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='assets/accessdenied.png' style='width:128px'><br><br>"+obj.message+"<br></div></div>";
            html += "<div style='padding:20px;text-align:center'>" + "<button type='button' class='btn btn-outline-danger' data-dismiss='modal'>Cancel</button></div>"; 
        } else {
            html = "<div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='assets/tick.jpg' style='width:128px'><br><br>"+obj.message+"<br></div></div>";
            html += "<div style='padding:20px;text-align:center'>" + "<a href='dashboard.php?action=Website/Sliders/list' class='btn btn-outline-danger'>Continue</a></div>"; 
            $('#ConfirmationPopup').modal("show");
        }
        $("#confrimation_text").html(html);
        
    });
}
</script>

