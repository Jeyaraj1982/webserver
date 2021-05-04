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
                                        Manage Seeking Staffs
                                    </div>
                                </div>
                              
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                 <table class="table table-striped mt-3">
                                        <thead>
                                            <tr>
                                                <th scope="col">Employer Name</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">RequiredPosition</th>
                                                <th scope="col">RequiredNumbers</th>
                                                <th scope="col">Submitted On</th>
                                                <th scope="col"> </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                            $Sliders = $mysql->select("select * from _tbl_seeking_staffs order by SeekingStaffID desc"); 
                                            foreach($Sliders as $Slider){ 
                                        ?>
                                            <tr>
                                                <td><?php echo $Slider['EmployerName'];?></td>
                                                <td><?php echo $Slider['Email'];?></td>
                                                <td><?php echo $Slider['RequiredPosition'];?></td>
                                                <td><?php echo $Slider['RequiredNumbers'];?></td>
                                                <td><?php echo date("d M Y ,H:i",strtotime($Slider['SubmittedOn']));?></td>
                                                <td style="text-align: right">                                                   
                                                    <a href="dashboard.php?action=SeekingStaff/view&id=<?php echo $Slider['SeekingStaffID'];?>">View</a>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                          <?php  if(sizeof($Sliders)=="0"){ ?>
                                            <tr>
                                                <td style="text-align: center;" colspan="3">No Records found</td>
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
 
 function CallConfirmation(JobID){
    var text = '<form method="POST" id="DeleteSliderFrm'+JobID+'">'
                    +'<input type="hidden" value="'+JobID+'" id="JobID" Name="JobID">'
                     +'<div class="modal-header" style="padding-bottom:5px">'
                        +'<h4 class="heading"><strong>Confirmation</strong> </h4>'
                        +'<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:white">'
                            +'<span aria-hidden="true" style="color:black">&times;</span>'
                        +'</button>'
                     +'</div>'
                     +'<div class="modal-body">'
                        +'<div class="form-group row">'                                                            
                            +'<div class="col-sm-12">'
                                +'Are you sure want to delete?<br>'
                            +'</div>'
                        +'</div>'
                     +'</div>'
                     +'<div class="modal-footer">'
                        +'<button type="button" class="btn btn-outline-danger" data-dismiss="modal" >Cancel</button>&nbsp;&nbsp;&nbsp;'
                        +'<button type="button" class="btn btn-danger" onclick="DeleteJob(\''+JobID+'\')" >Yes, Confirm</button>'
                     +'</div>'
                +'</form>';  
        $('#xconfrimation_text').html(text);                                       
        $('#ConfirmationPopup').modal("show");
}                                                                                                 
 
 function DeleteJob(JobID) {
     var param = $( "#DeleteSliderFrm"+JobID).serialize();
    $("#confrimation_text").html(loading);
    $.post( "../webservice.php?action=DeleteJob",param,function(data) {                 
        var obj = JSON.parse(data); 
        var html = "";                                                                              
        if (obj.status=="failure") {
            html = "<div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='assets/accessdenied.png' style='width:128px'><br><br>"+obj.message+"<br></div></div>";
            html += "<div style='padding:20px;text-align:center'>" + "<button type='button' class='btn btn-outline-success' data-dismiss='modal'>Cancel</button></div>"; 
        }if (obj.status=="Success") {
            html = "<div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='assets/tick.jpg' style='width:128px'><br><br>"+obj.message+"<br></div></div>";
            html += "<div style='padding:20px;text-align:center'>" + "<a href='dashboard.php?action=JobOffer/list&status=All' class='btn btn-outline-success'>Continue</a></div>"; 
        }
        $("#xconfrimation_text").html(html);
        
    });
}
</script>

 