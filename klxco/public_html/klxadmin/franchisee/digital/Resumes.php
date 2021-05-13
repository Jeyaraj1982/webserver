<?php $data= $mysql->select("select * from _tbl_franchisee where FranchiseeID='".$_GET['id']."'");?>
<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">Franchisee Information</div>
                        </div>
                        <div class="card-body">
                            <div class="form-group form-show-validation row" style="padding:0px">
                                <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Name</label>
                                <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $data[0]['FranchiseeName'];?></div>
                            </div>
                            <div class="form-group form-show-validation row" style="padding:0px">
                                <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Mobile Number</label>
                                <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $data[0]['MobileNumber'];?></div>
                            </div>
                            <div class="form-group form-show-validation row" style="padding:0px">
                                <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">IsActive</label>
                                <div class="col-lg-4 col-md-9 col-sm-8">
                                    <?php if($data[0]['IsActive']=="1") { echo "Yes"; } else { echo "No"; } ?>
                                </div>
                            </div>
                        </div>                                                                        
                        <div class="card-action">
                            <div class="row">
                                <div class="col-md-12">
                                    <a href="dashboard.php?action=franchisee/digital/List&filter=all" class="btn btn-warning btn-border">Back</a>
                                </div>                                        
                            </div>
                        </div>
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
                                        Manage Resumes
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                 <table class="table table-striped mt-3">
                                        <thead>
                                            <tr>
                                                <th scope="col"></th>
                                                <th scope="col" style="padding-left:0px !important">Name</th>
                                                <th scope="col">Created On</th>
                                                <th scope="col" style="text-align: right;padding-right:0px !important">Viewed</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $resumes = $mysql->select("select * from _tbl_resume_general_info where CreatedByID='".$data[0]['FranchiseeID']."' and IsDelete='0' order by ResumeID desc");?>
                                        <?php foreach($resumes as $resume){ ?>
                                            <tr>
                                                <td style="padding-right:0px !important;padding-left:0px !important"><img src="<?php echo "../share/uploads/".$resume['ProfilePhoto'];?>" style='width: 50px;height:50px;margin-top: 5px;'></td>
                                                <td style="padding-right:0px !important;padding-left:0px !important"><?php echo $resume['ResumeName'];?></td>
                                                <td style="padding-right:0px !important;padding-left:0px !important"><?php echo date("M-d-Y H:i",strtotime($resume['CreatedOn']));?></td>
                                                <td  style="padding-right:0px !important;padding-left:0px !important;text-align:right">
                                                    <?php echo sizeof($mysql->select("select * from resume_visitor_log where ResumeID='".$resume['ResumeID']."'"));?>
                                                <td>  
                                                <td  style="padding-right:10px !important;padding-left:0px !important;text-align: right;">
                                                    <div class="dropdown dropdown-kanban" style="float: right;">
                                                    <button class="" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border:none;font-size:14px;background:none !important;padding-right:0px;margin-right:0px;cursor:pointer">
                                                        <i class="icon-options-vertical"></i>
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <a class="dropdown-item" href="dashboard.php?action=digitalresume/updateresume&id=<?php echo $resume['ResumeID'];?>" draggable="false">Edit</a>
                                                        <a class="dropdown-item" href="dashboard.php?action=digitalresume/viewresume&id=<?php echo $resume['ResumeID'];?>&fr=frlist" draggable="false">View</a>
                                                        <a class="dropdown-item" draggable="false"><span onclick='CallConfirmation(<?php echo $resume['ResumeID'];?>)' class='btn btn-danger btn-sm' style='padding: 0px 10px;font-size: 10px;'>Delete</span></a>
                                                    </div>
                                                </div>     
                                                </td>
                                            </tr>
                                        <?php } ?>
                                        <?php if(sizeof($resumes)==0){ ?>
                                            <tr>
                                                <td colspan="6" style="text-align: center;">No Resumes Found</td>
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
            html += "<div style='padding:20px;text-align:center'>" + "<a href='dashboard.php?action=digitalresume/ResumeList' class='btn btn-outline-success'>Continue</a></div>"; 
        }
        $("#xconfrimation_text").html(html);
        
    });
}
</script>

