
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
                                        Manage Resumes
                                    </div>
                                </div>
                                <div class="col-md-6" style="text-align: right;">
                                    <a href="dashboard.php?action=CreateResume" class="btn btn-primary btn-xs">Add Resume</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                 <table class="table table-striped mt-3">
                                        <thead>
                                            <tr>
                                                <th scope="col"></th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Mobile Number</th>
                                                <th scope="col">Email ID</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $resumes = $mysql->select("select * from _tbl_resume_general_info order by ResumeID desc");?>
                                        <?php foreach($resumes as $resume){ ?>
                                            <tr>
                                                <td><img src="<?php echo "../uploads/".$resume['ProfilePhoto'];?>" style='width: 50px;height:50px;margin-top: 5px;'></td>
                                                <td><?php echo $resume['ResumeName'];?></td>
                                                <td><?php echo $resume['MobileNumber'];?></td>
                                                <td><?php echo $resume['EmailID'];?></td>
                                                <td style="text-align: right">
                                                <a href="dashboard.php?action=updateresume&id=<?php echo $resume['ResumeID'];?>">Edit</a>&nbsp;&nbsp;|&nbsp;&nbsp;<a href="dashboard.php?action=viewresume&id=<?php echo $resume['ResumeID'];?>">View</a>&nbsp;&nbsp;|<span onclick='CallConfirmation(<?php echo $resume['ResumeID'];?>)' class='btn btn-danger btn-sm' style='padding: 0px 10px;font-size: 10px;'>Delete</span>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                        <?php if(sizeof($resumes)==0){ ?>
                                            <tr>
                                                <td colspan="5" style="text-align: center;">No Resumes Found</td>
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
   var loading = "<div style='padding:80px;text-align:center;color:#aaa'><img src='http://japps.online/tour/admin/assets/loading.gif'  style='width:80px'><br>Processing ...</div>";
 
 function CallConfirmation(ResumeID){
    var text = '<form action="" method="POST" id="DeleteResumeFrm'+ResumeID+'">'
                    +'<input type="hidden" value="'+ResumeID+'" id="ResumeID" Name="ResumeID">'
                     +'<div class="modal-header" style="padding-bottom:5px">'
                        +'<h4 class="heading"><strong>Confirmation</strong> </h4>'
                        +'<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:white">'
                            +'<span aria-hidden="true" style="color:black">&times;</span>'
                        +'</button>'
                     +'</div>'
                     +'<div class="modal-body">'
                        +'<div class="form-group row">'                                                            
                            +'<div class="col-sm-12">'
                                +'Are you sure want to delete resume?<br>'
                            +'</div>'
                        +'</div>'
                     +'</div>'
                     +'<div class="modal-footer">'
                        +'<button type="button" class="btn btn-outline-danger" data-dismiss="modal" >Cancel</button>&nbsp;&nbsp;&nbsp;'
                        +'<button type="button" class="btn btn-danger" onclick="DeleteResume(\''+ResumeID+'\')" >Yes, Confirm</button>'
                     +'</div>'
                +'</form>';  
        $('#xconfrimation_text').html(text);                                       
        $('#ConfirmationPopup').modal("show");
}                                                                                                 
 
 function DeleteResume(ResumeID) {
     var param = $( "#DeleteResumeFrm"+ResumeID).serialize();
    $("#confrimation_text").html(loading);
    $.post( "../webservice.php?action=DeleteResume",param,function(data) {                 
        var obj = JSON.parse(data); 
        var html = "";                                                                              
        if (obj.status=="failure") {
            html = "<div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='assets/accessdenied.png' style='width:128px'><br><br>"+obj.message+"<br></div></div>";
            html += "<div style='padding:20px;text-align:center'>" + "<button type='button' class='btn btn-outline-success' data-dismiss='modal'>Cancel</button></div>"; 
        }if (obj.status=="Success") {
            html = "<div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='assets/tick.jpg' style='width:128px'><br><br>"+obj.message+"<br></div></div>";
            html += "<div style='padding:20px;text-align:center'>" + "<a href='dashboard.php?action=ResumeList' class='btn btn-outline-success'>Continue</a></div>"; 
        }
        $("#xconfrimation_text").html(html);
        
    });
}
</script>

