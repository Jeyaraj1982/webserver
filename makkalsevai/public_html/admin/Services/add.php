<?php
    if (isset($_POST['btnsubmit'])) {
        
              $id = $mysql->insert("_tbl_services",array("ServiceTitle"          => $_POST['ServiceTitle'],
                                                         "ServiceDescription"          => $_POST['ServiceDescription'],
                                                         "IsActive"              => "1"));
            if(sizeof($id)>0){
                unset($_POST);
                    $link="Services/list&status=All";
                ?>
                <script>
                 $(document).ready(function() {
                    successpopup('<?php echo $link;?>');
                 }); 
            </script>
       <?php     
       
              } else {     ?>
                <script>
             $(document).ready(function() {
                swal("", "Error Add Service", "warning")
             });
            </script>
           <?php   }
                                         
                
    }
    
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
                                    <div class="card-title">Add Service</div>
                                </div>
                                <form id="exampleValidation" method="POST" action="" onsubmit="return SubmitBrand();" id="addBrand" enctype="multipart/form-data">
                                   <div class="card-body">
                                       <div class="form-group form-show-validation row">
                                            <label for="name">Service Title<span style="color:red">*</span></label>
                                            <input type="text" class="form-control" id="ServiceTitle" name="ServiceTitle" placeholder="Enter Service Name" value="<?php echo (isset($_POST['ServiceTitle']) ? $_POST['ServiceTitle'] :"");?>">
                                            <span class="errorstring" id="ErrServiceTitlee"><?php echo isset($ErrServiceTitle)? $ErrServiceTitle : "";?></span>
                                        </div> 
                                         <div class="form-group form-show-validation row">
                                            <label for="name">Service Description<span style="color:red">*</span></label>
                                            <input type="text" class="form-control" id="ServiceDescription" name="ServiceDescription" placeholder="Enter Description" value="<?php echo (isset($_POST['ServiceDescription']) ? $_POST['ServiceDescription'] :"");?>">
                                            <span class="errorstring" id="ErrServiceDescription"><?php echo isset($ErrServiceDescription)? $ErrServiceDescription : "";?></span>
                                        </div>
                                        <div class="form-group">
                                        <div class="col-lg-4 col-md-9 col-sm-8" style="text-align:center;color: green;"><?php echo $successmessage;?> </div>
                                    </div>
                                    </div>
                                    <div class="card-action">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <button class="btn btn-warning" type="button" onclick="CallConfirmation()">Add Service</button>&nbsp;
                                                <button class="btn btn-warning" type="submit" name="btnsubmit" id="btnsubmit" style="display: none;">Add Brand</button>
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
        
        if(IsNonEmpty("ServiceTitle","ErrBServiceTitle","Please Enter Service Name")){
           
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
                                +'Are you sure want to add Service?<br>'
                            +'</div>'
                        +'</div>'
                     +'</div>'
                     +'<div class="modal-footer">'
                        +'<button type="button" class="btn btn-outline-success" data-dismiss="modal" >Cancel</button>&nbsp;&nbsp;&nbsp;'
                        +'<button type="button" class="btn btn-success" onclick="AddBrand()" >Yes, Confirm</button>'
                     +'</div>';
                $('#xconfrimation_text').html(txt);                                       
                $('#ConfirmationPopup').modal("show");                                                      
        }else{
            return false;
        }
        }
function AddBrand() {
    $( "#btnsubmit" ).trigger( "click" );
}
function successpopup(link){
    var txt = '<div class="form-group row">'
                    +'<div class="col-sm-12" style="text-align:center">'
                        +'<img src="assets/tick.jpg" style="width:30%"><br><span>Service Added Successfully</span>'
                    +'</div>'
               +'</div>'
                +'<div style="padding:20px;text-align:center">'
                    +'<button type="button" class="btn btn-outline-success" onclick="location.href=\'dashboard.php?action='+link+'\'" >Countinue</button>'
                 +'</div>';  
        $('#xconfrimation_text').html(txt);                                       
        $('#ConfirmationPopup').modal("show");
}
</script>

