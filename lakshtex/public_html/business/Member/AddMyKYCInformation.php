<?php $IDTypes = $mysql->select("select * from _tbl_kyc_types where TypeID NOT IN (select IDTypeID from _tbl_member_kycinformation where MemberID='".$_SESSION['User']['MemberID']."')");?>

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
                                        My KYC Information
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                        <?php if(sizeof($IDTypes)==0) {?>
                            <div class="form-group row" style="text-align:center;">
                               <div class="col-sm-12"><a href="Dashboard.php?action=MyKYCInformation">View Kyc Information</a></div>
                            </div> 
                        <?php }else{ ?>
                                <?php
                                 if (isset($_POST['updateBtn'])) {
                                     $ErrorCount = 0;
                                     
                                     $target_dir = "../uploads/";
                                     $file =  $_FILES["KycFile"]["name"];
                                     $target_file = $target_dir .$file;

                                     if (move_uploaded_file($_FILES["KycFile"]["tmp_name"], $target_file)) {
                                        $KycType = $mysql->select("select * from _tbl_kyc_types where TypeID='".$_POST['KycType']."'"); 
                                        $mysql->insert("_tbl_member_kycinformation",array("MemberID"          => $_SESSION['User']['MemberID'],
                                                                                          "MemberCode"        => $_SESSION['User']['MemberCode'],
                                                                                          "IDTypeID"          => $_POST['KycType'],
                                                                                          "IDType"            => $KycType[0]['Type'],
                                                                                          "IDNumber"          => $_POST['KycNumber'],
                                                                                          "IDThumb"           => $file,
                                                                                          "AddedOn"           => date("Y-m-d H:i:s")));
                                     ?>
                                     <script>
                                        $(document).ready(function() {
                                            swal("Added successfully", { 
                                                icon:"success",
                                                confirm: {value: 'Continue'}
                                            }).then((value) => {
                                                location.href='Dashboard.php?action=MyKYCInformation'
                                            });
                                        });
                                     </script>
                                     <?php
                                     } else{  ?>
                                     <script>
                                        $(document).ready(function() {
                                            swal("Sorry, there was an error uploading your file.", {
                                                icon : "error" 
                                            });
                                         });
                                    </script>    
                                     <?php }
                                 }                                    
                                ?> 
                                <form action="" method="post" onsubmit="return submitkyc()" enctype="multipart/form-data">
                                    <div>
                                        <div class="form-group row">
                                            <div class="col-sm-3">ID Type<span id="star">*</span></div>
                                            <div class="col-sm-9">
                                                <select name="KycType" id="KycType" class="form-control">
                                                    <option value="0" <?php echo ($_POST['KycType']=="0") ? " selected='selected' " : "";?>>Please Select ID Type</option>                             
                                                    <?php foreach($IDTypes as $IDType){ ?>
                                                        <option value="<?php echo $IDType['TypeID'];?>" <?php echo ($_POST['KycType']==$IDType['TypeID']) ? " selected='selected' " : "";?>><?php echo $IDType['Type'];?></option>                             
                                                    <?php } ?>
                                                </select>
                                                <span class="errorstring" id="ErrKycType"><?php echo isset($ErrKycType)? $ErrKycType : "";?></span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-3">ID Number<span id="star">*</span></div>
                                            <div class="col-sm-9">
                                                <input type="text" name="KycNumber" id="KycNumber" class="form-control" value="<?php echo isset($_POST['KycNumber']) ? $_POST['KycNumber'] : '';?>">
                                                <span class="errorstring" id="ErrKycNumber"><?php echo isset($ErrKycNumber)? $ErrKycNumber : "";?></span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-sm-3">ID Thumb<span id="star">*</span></div>
                                            <div class="col-sm-9">
                                                <input type="file" name="KycFile" class="form-control" id="KycFile">
                                                <span class="errorstring" id="ErrKycFile"><?php echo isset($ErrKycFile)? $ErrKycFile : "";?></span>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                           <div class="col-sm-12">
                                                <a href="Dashboard.php?action=MyKYCInformation" class="btn btn-outline-primary" type="submit">Back</a>&nbsp;&nbsp;
                                                <button class="btn btn-primary" type="submit" name="updateBtn">Add KYC Information</button>
                                           </div>
                                        </div>
                                    </div>
                                </form>
                        <?php } ?>
                        </div>
                    </div>                                                                                             
                </div>
            </div>
        </div>
    </div>
</div>
<script>
  $(document).ready(function () {
        $("#KycType").blur(function () {
            $('#ErrKycType').html("");
            if($("#KycType").val()=="0"){
               $('#ErrKycType').html("Please Select ID Type"); 
            }
        });
        $("#KycNumber").blur(function () {
            if(IsNonEmpty("KycNumber", "ErrKycNumber", "Please Enter ID Number")){
                IsAlphaNumeric("KycNumber", "ErrKycNumber", "Please Enter Alpha Numerics Characters Only");
            }
        });
        $("#KycFile").blur(function () {
            $('#ErrKycFile').html(""); 
            if($("#KycFile").val()==""){
               $('#ErrKycFile').html("Please Select ID Thumb"); 
            }
        });
  });
  function submitkyc(){
      ErrorCount=0;
        $('#ErrKycType').html("");
        $('#ErrKycNumber').html("");
        $('#ErrKycFile').html("");
       
        if($("#KycType").val()=="0"){
           $('#ErrKycType').html("Please Select ID Type"); 
           ErrorCount++; 
        }
        if(IsNonEmpty("KycNumber", "ErrKycNumber", "Please Enter ID Number")){
            IsAlphaNumeric("KycNumber", "ErrKycNumber", "Please Enter Alpha Numerics Characters Only");
        }
        if($("#KycFile").val()==""){
           $('#ErrKycFile').html("Please Select ID Thumb"); 
           ErrorCount++; 
        }
        
        return (ErrorCount==0) ? true : false;
  }
 </script> 
