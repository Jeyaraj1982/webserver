 <?php
    if (isset($_POST['btnsubmit'])) {
       
                
                    $target_dir = "../contacts/";
                    $file =  $_FILES["uploadimage1"]["name"];
                    $target_file = $target_dir .$file;
                   
                  if (move_uploaded_file($_FILES["uploadimage1"]["tmp_name"], $target_file)) {
                       $id = $mysql->insert("_tbl_Contacts",array("ReferneceName" => $_POST['ReferneceName'],
                                                                  "ContactImage"  => $file,
                                                                  "CreatedOn"     => date("Y-m-d H:i:s")));
                     if($id>0){
                      ?>
                     <script>
                     $(document).ready(function () {
                         SuccessPopup('<?php echo $id;?>');
                     });
                     </script>
                 <?php       unset($_POST);
                        $successmessage ="<span style='color: green;'>Created Successfully</span>";
                     }
                  }else {
                        $successmessage ="<span style='color: red;'>Error Create Card</span>";
                  }
        
        } 
    
?>
 
              
        <div class="main-panel">
            <div class="container">
                <div class="page-inner">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">New Contact</div>
                                </div>
                                <form id="exampleValidation" method="POST" action=""  id="addProduct" enctype="multipart/form-data">
                                    <div class="card-body">
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-sm-3 text-left">Reference<span class="required-label">*</span></label>
                                            <div class="col-sm-9">
                                                <input type="text" required="required" class="form-control" id="ReferneceName" name="ReferneceName" placeholder="Enter Your Name" value="<?php echo (isset($_POST['Name']) ? $_POST['Name'] :"");?>">
                                                <span class="errorstring" id="ErrName"><?php echo isset($ErrName)? $ErrName : "";?></span>
                                            </div>
                                        </div>
                                    
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-sm-3 text-left">Image<span class="required-label">*</span></label>
                                            <div class="col-sm-9">
                                                <input type="file" name="uploadimage1" class="form-control" id="uploadimage1" accept=".jpg,.jpeg,.png,.gif,.pdf,.doc,.docx,.ppt,.pptx,.odt,.avi,.ogg,.m4a,.mov,.mp3,.mp4,.mpg,.wav,.wmv" >
                                                <div class="errorstring" id="Errimage1"><?php echo isset($Errimage1)? $Errimage1 : "";?></div>
                                            </div>
                                        </div>
                                         
                                    </div>
                                                                                                       
                                    <div class="card-action">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <input class="btn btn-warning" type="submit" name="btnsubmit" value="Save">&nbsp;
                                                <a href="dashboard.php?action=Contacts/list" class="btn btn-warning btn-border">Back</a>
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
    function SuccessPopup(ResumeID){
        html = "<div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='assets/tick.jpg' style='width:128px'><br><br>Concat Added<br></div></div>";
            html += "<div style='padding:20px;text-align:center'>" + "<a href='dashboard.php?action=Contacts/List' class='btn btn-outline-success'>Continue</a></div>"; 
        
        $("#xconfrimation_text").html(html);
        $('#ConfirmationPopup').modal("show");
        
    }
</script>