<?php
$data=$mysql->select("select * from _tbl_services where md5(ServiceID)='".$_GET['id']."'");  
    if (isset($_POST['btnsubmit'])) {
        $ErrorCount =0;
           
           
            if($ErrorCount==0){
                     
                     $mysql->execute("update _tbl_services set 
                                                `ServiceTitle` ='".$_POST['ServiceTitle']."',
                                                `ServiceDescription` ='".$_POST['ServiceDescription']."',
                                                `ServiceOrder` ='".$_POST['ServiceOrder']."' 
                                                              where ServiceID='".$data[0]['ServiceID']."'");                                   
             ?>
            <script>
                  $(document).ready(function() {
                        swal("updated successfully", {
                            icon : "success" 
                        });
                     });
                </script> 
       <?php     }
        
    }                     
                
  $data=$mysql->select("select * from _tbl_services where md5(ServiceID)='".$_GET['id']."'");   
?>
<script>
$(document).ready(function () {
    $("#ServiceTitle").blur(function () {
        if(IsNonEmpty("ServiceTitle","ErrServiceTitle","Please Enter Service Name")){
            
        }
    });
});

</script>
      
        <div class="main-panel">
            <div class="container">
                <div class="page-inner">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">Edit Service</div>
                                </div>
                                <form id="exampleValidation" method="POST" action="" onsubmit="return SubmitBrand();" id="addBrand" enctype="multipart/form-data">
                                   <div class="card-body">
                                       <div class="form-group form-show-validation row">
                                            <label for="name">Service Title<span style="color:red">*</span></label>
                                            <input type="text" class="form-control" id="ServiceTitle" name="ServiceTitle" placeholder="Enter Service Name" value="<?php echo (isset($_POST['ServiceTitle']) ? $_POST['ServiceTitle'] : $data[0]['ServiceTitle']);?>">
                                            <span class="errorstring" id="ErrServiceTitlee"><?php echo isset($ErrServiceTitle)? $ErrServiceTitle : "";?></span>
                                        </div> 
                                        <div class="form-group form-show-validation row">
                                            <label for="name">Service Description<span style="color:red">*</span></label>
                                            <input type="text" class="form-control" id="ServiceDescription" name="ServiceDescription" placeholder="Enter Description" value="<?php echo (isset($_POST['ServiceDescription']) ? $_POST['ServiceDescription'] : $data[0]['ServiceDescription']);?>">
                                            <span class="errorstring" id="ErrServiceDescription"><?php echo isset($ErrServiceDescription)? $ErrServiceDescription : "";?></span>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name">Service Order<span style="color:red">*</span></label>
                                            <input type="text" class="form-control" id="ServiceOrder" name="ServiceOrder" placeholder="Enter ORder" value="<?php echo (isset($_POST['ServiceOrder']) ? $_POST['ServiceOrder'] : $data[0]['ServiceOrder']);?>">
                                            <span class="errorstring" id="ErrServiceOrder"><?php echo isset($ErrServiceOrder)? $ErrServiceOrder : "";?></span>
                                        </div>
                                        <div class="form-group">
                                        <div class="col-lg-4 col-md-9 col-sm-8" style="text-align:center;color: green;"><?php echo $successmessage;?> </div>
                                    </div>
                                    </div>
                                    <div class="card-action">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <button class="btn btn-warning" type="button" onclick="CallConfirmation()">Update Service</button>&nbsp;
                                                <button class="btn btn-warning" type="submit" name="btnsubmit" id="btnsubmit" style="display: none;">Update Service</button>
                                                <a href="dashboard.php?action=Services/list&status=All" class="btn btn-warning btn-border">Back</a>
                                            </div>                                        
                                        </div>
                                    </div>
                                </form>
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

function CallConfirmation(){
    ErrorCount=0;    
        $('#ErrServiceTitle').html("");
        
        if(IsNonEmpty("ServiceTitle","ErrServiceTitle","Please Enter Service Name")){
           
        }
        
        if(ErrorCount==0) {
          
            var txt= '<div class="modal-header" style="padding-bottom:5px">'
                         +'<h4 class="heading"><strong>Confirmation</strong> </h4>'
                         +'<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:white">'
                            +'<span aria-hidden="true" style="color:black">&times;</span>'
                         +'</button>'
                     +'</div>'
                     +'<div class="modal-body">'
                        +'<div class="form-group row">'                                                            
                            +'<div class="col-sm-12">'
                                +'Are you sure want to update Service?<br>'
                              
                            +'</div>'
                        +'</div>'
                     +'</div>'
                     +'<div class="modal-footer">'
                        +'<button type="button" class="btn btn-outline-success" data-dismiss="modal" >Cancel</button>&nbsp;&nbsp;&nbsp;'
                        +'<button type="button" class="btn btn-success" onclick="UpdateBrand()" >Yes, Confirm</button>'
                     +'</div>';
                $('#xconfrimation_text').html(txt);                                       
                $('#ConfirmationPopup').modal("show");                                                      
        }else{
            return false;
        }
        }
function UpdateBrand() {
    $( "#btnsubmit" ).trigger( "click" );
}

</script>

