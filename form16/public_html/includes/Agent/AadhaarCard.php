<?php
if (isset($_POST['btnsubmits'])) {
                    
                    $target_dir = "uploads/";
                    if (!is_dir('uploads/AadhaarCard/'.$_SESSION['User']['MemberCode'].'/')) {
                        mkdir('uploads/AadhaarCard/'.$_SESSION['User']['MemberCode'].'/', 0777, true);
                    }
                    $err=0;
                    $_POST['AadhaarCard']= "";
                    $acceptable = array('image/jpeg',
                                        'image/jpg',
                                        'image/png'
                                    );
                     
                  if(($_FILES['AadhaarCard']['size'] >= 5000000) || ($_FILES["AadhaarCard"]["size"] == 0)) {
                    $err++;
                           echo "Please upload file. File must be less than 5 megabytes.";
                    }
                            
                    if((!in_array($_FILES['AadhaarCard']['type'], $acceptable)) && (!empty($_FILES["AadhaarCard"]["type"]))) {
                        $err++;
                           echo "Invalid file type. Only JPG,PNG,JPEG types are accepted.";
                    }

                    
                    if (isset($_FILES["AadhaarCard"]["name"]) && strlen(trim($_FILES["AadhaarCard"]["name"]))>0 ) {
                        $AadhaarCard = time().$_FILES["AadhaarCard"]["name"];
                        if (!(move_uploaded_file($_FILES["AadhaarCard"]["tmp_name"], 'uploads/AadhaarCard/'.$_SESSION['User']['MemberCode'].'/' . $AadhaarCard))) {
                           $err++;
                           echo "Sorry, there was an error uploading your file.";
                        }
                    }
                    
                    if ($err==0) {
                        $_POST['AadhaarCard']= $AadhaarCard;
                        $id = $mysql->insert("_tbl_Attachments",array("MemberID"       => $_SESSION['User']['MemberID'],
                                                                      "MemberCode"     => $_SESSION['User']['MemberCode'],
                                                                      "AttachmentType" => "AadhaarCard",
                                                                      "AttachmentFile" => $_POST['AadhaarCard'],                          
                                                                      "AttachedOn"     => date("Y-m-d H:i:s"))); 
                    } else {
                        $sql= $mysql->select("select * from `_tbl_Attachments` where  `MemberCode`='".$_SESSION['User']['MemberCode']."' and `AttachmentType`='AadhaarCard' order by AttachmentID Desc");
                    }
                } else {
                     $sql= $mysql->select("select * from `_tbl_Attachments` where  `MemberCode`='".$_SESSION['User']['MemberCode']."' and `AttachmentType`='AadhaarCard' order by AttachmentID Desc");
                     
                }
                $sql= $mysql->select("select * from `_tbl_Attachments` where  `MemberCode`='".$_SESSION['User']['MemberCode']."' and `AttachmentType`='AadhaarCard' order by AttachmentID Desc");

?>

<script>
$(document).ready(function () {
  $("#AadhaarCard").change(function() {
            if ($("#AadhaarCard").val()=="") {
                $("#ErrAadhaarCard").html("Please select AadhaarCard"); 
                ErrorCount++; 
            }else{
                $("#ErrAadhaarCard").html("");  
            }
    });
});
   
 function SubmitAccount() { 
                         ErrorCount=0;       
                         $('#ErrAadhaarCard').html("");            
                         
                      if ($("#AadhaarCard").val()=="") {
                            $("#ErrAadhaarCard").html("Please select AadhaarCard");  
                            ErrorCount++;
                        }else{
                            $("#ErrAadhaarCard").html("");  
                        }
                       
                        return (ErrorCount==0) ? true : false;
                 }
</script>

                                   
        <div class="main-panel">
            <div class="container">
                <div class="page-inner">
                    <div class="page-header">
                        <h4 class="page-title">Documnt</h4>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">Document </div>                                                              
                                </div>
                                <?php if(sizeof($sql)==0 || $sql[0]['IsVerified']==2){  ?> 
                                <form id="exampleValidation" action="" method="post" onsubmit="return SubmitAccount();" enctype="multipart/form-data">
                                    <div class="card-body">
                                        <div class="form-group form-show-validation row">
                                            <label for="BankName" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Attachment  <span class="required-label">*</span></label>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <input type="file" class="form-control" id="AadhaarCard" name="AadhaarCard" value="<?php echo (isset($_POST['AadhaarCard']) ? $_POST['AadhaarCard'] :"");?>">
                                                <span class="errorstring" id="ErrAadhaarCard"><?php echo isset($ErrAadhaarCard)? $ErrAadhaarCard : "";?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-action">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <input class="btn btn-success" type="submit" value="Submit" name="btnsubmits" id="btnsubmits">
                                            </div>                                        
                                        </div>
                                    </div>
                                </form>
                                <?php } if(sizeof($sql)>0) {
                                  $Document =  $mysql->select("select * from `_tbl_Attachments` where  `MemberCode`='".$_SESSION['User']['MemberCode']."' and `AttachmentType`='AadhaarCard' order by AttachmentID Desc");
                                    foreach($Document as $Doc){
                                ?>
                                    <div class="form-group form-show-validation row">
                                        <div class="col-md-4">
                                            <div class="card card-post card-round">
                                                <img class="card-img-top" src="uploads/AadhaarCard/<?php echo $Doc['MemberCode'];?>/<?php echo $Doc['AttachmentFile'];?>" alt="Card image cap" style="height:200px;">
                                            <div >
                                                <div class="form-group row">
                                                    <div class="col-sm-5">Submitted On</div>
                                                    <div class="col-sm-7"><p class="date text-muted"><?php echo $Doc['AttachedOn'];?></p></div>
                                                </div>
                                                <?php if($Doc['IsVerified']==0) {?>
                                                <div class="form-group row">
                                                    <div class="col-sm-12"><p class="date text-muted">Verification Pending</p></div>
                                                </div>    
                                                <?php } ?>
                                                <?php if($Doc['IsVerified']==1) {?>
                                                <div class="form-group row">
                                                    <div class="col-sm-5">Approved On</div>
                                                    <div class="col-sm-7"><p class="date text-muted"><?php echo $Doc['Verifiedon'];?></p></div>
                                                </div> 
                                                <?php } ?>
                                                <?php if($Doc['IsVerified']==2) {?>
                                                <div class="form-group row">
                                                    <div class="col-sm-5">Rejected On</div>
                                                    <div class="col-sm-7"><p class="date text-muted"><?php echo $Doc['Verifiedon'];?></p></div>
                                                </div> 
                                                <?php } ?>                                                                                  
                                            </div>
                                            </div>
                                        </div>
                                    </div><br>
                                <?php } }?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
        </div>
      