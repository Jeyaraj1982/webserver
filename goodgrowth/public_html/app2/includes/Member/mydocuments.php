<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">  
<div class="content">
        <div class="hpanel">
            <div class="panel-heading hbuilt">
               Verification of your account
            </div>
            <div class="panel-body list">
                <p>We care about the safety of our client's funds and personal data. Therefore, GoodGrowth clients have to pass a mandatory verification process.</p>
                <p>This requirement is in compliance with the international e-commerce legislation. You cannot fully manage your account without passing the verification process.</p>
                <p>To ensure the safety of your funds and personal data and to identify the owner of the account, we kindly ask all customers to pass the verification process by providing all the necessary documents personally.</p>
                <p>Our client's personal data will not be disclosed to third parties in compliance with GoodGrowth's terms of Privacy Policy and Service Agreement.</p>
                <p>Thank you for your understanding.</p>
            </div>
        </div>
        <div class="hpanel">
            <div class="panel-heading hbuilt">
               1. Proof of Identity - Confirm your physical identity.
            </div>
            <div class="panel-body list">
            <?php
                if (isset($_POST['IDProofBtn'])) {
                       $target_dir = "assets/uploads/";
                       $filename = time()."_". basename($_FILES["fileToUpload"]["name"]);
                       $target_file = $target_dir .$filename;
                    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                        $mysql->insert("_tbl_Member_Attachment",array("Attachment"=>$filename,
                                                                      "MemberID"=>$userData['MemberID'],
                                                                      "AttachmentType"=>"IDPROOF",
                                                                      "AttachmentTypeName"=>$_POST['AttachmentTypeName'],
                                                                      "DocumentNumber"=>$_POST['DocumentNumber'],
                                                                      "DateOfIssue"=>$_POST['DateOfIssue'],
                                                                      "CountryOfIssue"=>$_POST['CountryOfIssue'],
                                                                      "SubmittedOn"=>date("Y-m-d H:i:s"),
                                                                      "ApprovedOn"=>"0000-00-00 00:00:00",
                                                                      "RejectedOn"=>"0000-00-00 00:00:00",
                                                                      "IsApproved"=>"0",
                                                                      "IsRejected"=>"0"));
                        echo SuccessMsg("Your Request has successfully submitted");                    
                } else {
                   echo ErrorMsg("Your request couldn't be submit. Please try again");  
                }
                
                }
            $idproof = $mysql->select("select * from _tbl_Member_Attachment where AttachmentType='IDPROOF' and IsApproved='0' and IsRejected='0' and MemberID='".$userData['MemberID']."'");
            if (sizeof($idproof)==0) {     
                
               $idproof = $mysql->select("select * from _tbl_Member_Attachment where AttachmentType='IDPROOF' and IsApproved='1' and IsRejected='0' and MemberID='".$userData['MemberID']."'");
               if (sizeof($idproof)>0) {
                  ?>
               <div class="form-group row">
                    <label class="col-sm-2 control-label"><img src="assets/uploads/<?php echo $idproof[0]['Attachment'];?>" style="width:200px"></label>
                    <div class="col-sm-10">
                        <div class="form-group row">
                            <label class="col-sm-2 control-label">Document Type</label>
                            <div class="col-sm-10"><?php echo $idproof[0]['AttachmentType'];?></div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 control-label">Document Number</label>
                            <div class="col-sm-10"><?php echo $idproof[0]['DocumentNumber'];?></div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 control-label">Issue Date</label>
                            <div class="col-sm-10"><?php echo putDate($idproof[0]['DateOfIssue']);?></div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 control-label">Country of Issue</label>
                            <div class="col-sm-10"><?php echo $idproof[0]['DateOfIssue'];?></div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 control-label">Submitted</label>
                            <div class="col-sm-10"><?php echo putDate($idproof[0]['SubmittedOn']);?></div>
                        </div>
                        <?php if ($idproof[0]['IsApproved']==1) {?>
                        <div class="form-group row">
                            <label class="col-sm-2 control-label">Approved</label>
                            <div class="col-sm-10"><?php echo putDate($idproof[0]['ApprovedOn']);?></div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
                <?php  } else {  ?>
                <form action="" method="Post" enctype="multipart/form-data">
                        <div class="form-group row">
                            <label class="col-sm-2 control-label">File</label>
                            <div class="col-sm-4"><input type="file" name="fileToUpload"></div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 control-label">Document Type</label>
                            <div class="col-sm-4">
                                <select name="AttachmentType" class="form-control" class="valid">
                                    <option value="Passport">Passport</option>
                                    <option value="Identity Card">Identity Card</option>
                                    <option value="Driver License">Driver License</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 control-label">Document Number</label>
                            <div class="col-sm-4"><input type="text" class="form-control" placeholder="Document Number" style="min-width:149px !important;" name="DocumentNumber"></div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 control-label">Issue Date</label>
                            <div class="col-sm-4"><input type="text" class="form-control" id="datepicker1"  placeholder="Issue Date" name="DateOfIssue" style="min-width:149px !important;" ></div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 control-label">Country of Issue</label>
                            <div class="col-sm-4">
                                <select name="CountryOfIssue" class="form-control">
                                    <option value="AF">India</option>
                                </select>
                            </div>
                        </div>
                        <input type="submit" class="btn btn-outline btn-success" name="IDProofBtn" value="Send documents for verification ">
                    </form>
                 <?php }  } else { ?>  
                 <div class="form-group row">
                    <label class="col-sm-2 control-label"><img src="assets/uploads/<?php echo $idproof[0]['Attachment'];?>" style="width:200px"></label>
                    <div class="col-sm-10">
                        <div class="form-group row">
                            <label class="col-sm-2 control-label">Document Type</label>
                            <div class="col-sm-10"><?php echo $idproof[0]['AttachmentType'];?></div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 control-label">Document Number</label>
                            <div class="col-sm-10"><?php echo $idproof[0]['DocumentNumber'];?></div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 control-label">Issue Date</label>
                            <div class="col-sm-10"><?php echo putDate($idproof[0]['DateOfIssue']);?></div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 control-label">Country of Issue</label>
                            <div class="col-sm-10"><?php echo $idproof[0]['DateOfIssue'];?></div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 control-label">Submitted</label>
                            <div class="col-sm-10"><?php echo putDate($idproof[0]['SubmittedOn']);?></div>
                        </div>
                        <?php if ($idproof[0]['IsApproved']==1) {?>
                        <div class="form-group row">
                            <label class="col-sm-2 control-label">Approved</label>
                            <div class="col-sm-10"><?php echo putDate($idproof[0]['ApprovedOn']);?></div>
                        </div>
                        <?php } ?>
                    </div>
                </div> 
                 <?php } ?>
            </div>
        </div>
         <div class="hpanel">
            <div class="panel-heading hbuilt">
               2. Proof of Address - Confirm the identity of your residential address.
            </div>
            <div class="panel-body list">
                 <?php
                        if (isset($_POST['AddressProofBtn'])) {
                               $target_dir = "assets/uploads/";
                               $filename = time()."_". basename($_FILES["fileToUpload"]["name"]);
                               $target_file = $target_dir .$filename;
                            if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                                $mysql->insert("_tbl_Member_Attachment",array("Attachment"=>$filename,
                                                                              "MemberID"=>$userData['MemberID'],
                                                                              "AttachmentType"=>"ADDRESSPROOF",
                                                                              "AttachmentTypeName"=>$_POST['AttachmentTypeName'],
                                                                              "DocumentNumber"=>$_POST['DocumentNumber'],
                                                                              "DateOfIssue"=>$_POST['DateOfIssue'],
                                                                              "CountryOfIssue"=>$_POST['CountryOfIssue'],
                                                                              "SubmittedOn"=>date("Y-m-d H:i:s"),
                                                                              "ApprovedOn"=>"0000-00-00 00:00:00",
                                                                              "RejectedOn"=>"0000-00-00 00:00:00",
                                                                              "IsApproved"=>"0",
                                                                              "IsRejected"=>"0"));
                                echo SuccessMsg("Your Request has successfully submitted");                    
                        } else {
                           echo ErrorMsg("Your request couldn't be submit. Please try again");  
                        }
                        
                        }
                    $idproof = $mysql->select("select * from _tbl_Member_Attachment where AttachmentType='ADDRESSPROOF' and IsApproved='0' and IsRejected='0' and MemberID='".$userData['MemberID']."'");
                    if (sizeof($idproof)==0) {        
                        $idproof = $mysql->select("select * from _tbl_Member_Attachment where AttachmentType='ADDRESSPROOF' and IsApproved='1' and IsRejected='0' and MemberID='".$userData['MemberID']."'");
                        if (sizeof($idproof)>0) {
                 ?>
                 <div class="form-group row">
                    <label class="col-sm-2 control-label"><img src="assets/uploads/<?php echo $idproof[0]['Attachment'];?>" style="width:200px"></label>
                    <div class="col-sm-10">
                        <div class="form-group row">
                            <label class="col-sm-2 control-label">Document Type</label>
                            <div class="col-sm-10"><?php echo $idproof[0]['AttachmentType'];?></div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 control-label">Document Number</label>
                            <div class="col-sm-10"><?php echo $idproof[0]['DocumentNumber'];?></div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 control-label">Issue Date</label>
                            <div class="col-sm-10"><?php echo putDate($idproof[0]['DateOfIssue']);?></div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 control-label">Country of Issue</label>
                            <div class="col-sm-10"><?php echo $idproof[0]['DateOfIssue'];?></div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 control-label">Submitted</label>
                            <div class="col-sm-10"><?php echo putDate($idproof[0]['SubmittedOn']);?></div>
                        </div>
                        <?php if ($idproof[0]['IsApproved']==1) {?>
                        <div class="form-group row">
                            <label class="col-sm-2 control-label">Approved</label>
                            <div class="col-sm-10"><?php echo putDate($idproof[0]['ApprovedOn']);?></div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
                <?php } else {  ?>
                <form action="" method="Post" enctype="multipart/form-data">
                        <div class="form-group row">
                            <label class="col-sm-2 control-label">File</label>
                            <div class="col-sm-4"><input type="file" name="fileToUpload"></div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 control-label">Document Type</label>
                            <div class="col-sm-4">
                                <select name="AttachmentType" class="form-control" class="valid">
                                    <option value="Bank statement">Bank statement</option>
                                    <option value="Credit Card statement">Credit Card statement</option>
                                    <option value="Electricity bill">Electricity bill</option>
                                    <option value="Gas bill">Gas bill</option>
                                    <option value="Internet bill">Internet bill</option>
                                    <option value="Landline phone bill">Landline phone bill</option>
                                    <option value="Rent agreement">Rent agreement</option>
                                    <option value="Utility bill">Utility bill</option>
                                    <option value="Other">Other</option> 
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 control-label">Document Number</label>
                            <div class="col-sm-4"><input type="text" class="form-control" placeholder="Document Number" style="min-width:149px !important;" name="DocumentNumber"></div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 control-label">Issue Date</label>
                            <div class="col-sm-4"><input type="text" class="form-control" id="datepicker2"  placeholder="Issue Date" name="DateOfIssue" style="min-width:149px !important;" ></div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 control-label">Country of Issue</label>
                            <div class="col-sm-4">
                                <select name="CountryOfIssue" class="form-control">
                                    <option value="AF">India</option>
                                </select>
                            </div>
                        </div>
                        <input type="submit" class="btn btn-outline btn-success" name="AddressProofBtn" value="Send documents for verification ">
                    </form>
                 <?php }  } else { ?>
                 <div class="form-group row">
                    <label class="col-sm-2 control-label"><img src="assets/uploads/<?php echo $idproof[0]['Attachment'];?>" style="width:200px"></label>
                    <div class="col-sm-10">
                        <div class="form-group row">
                            <label class="col-sm-2 control-label">Document Type</label>
                            <div class="col-sm-10"><?php echo $idproof[0]['AttachmentType'];?></div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 control-label">Document Number</label>
                            <div class="col-sm-10"><?php echo $idproof[0]['DocumentNumber'];?></div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 control-label">Issue Date</label>
                            <div class="col-sm-10"><?php echo putDate($idproof[0]['DateOfIssue']);?></div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 control-label">Country of Issue</label>
                            <div class="col-sm-10"><?php echo $idproof[0]['DateOfIssue'];?></div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 control-label">Submitted</label>
                            <div class="col-sm-10"><?php echo putDate($idproof[0]['SubmittedOn']);?></div>
                        </div>
                        <?php if ($idproof[0]['IsApproved']==1) {?>
                        <div class="form-group row">
                            <label class="col-sm-2 control-label">Approved</label>
                            <div class="col-sm-10"><?php echo putDate($idproof[0]['ApprovedOn']);?></div>
                        </div>
                        <?php } ?>
                    </div>
                </div>
                <?php } ?> 
            </div>
         </div>
</div>
   <script>
   $(document).ready(function() {
   
    $( "#datepicker1" ).datepicker({
    dateFormat: "yy-mm-dd",
    });
    $( "#datepicker2" ).datepicker({
    dateFormat: "yy-mm-dd",
    });
});
 
  //yearRange: "<?php echo $Config['DOB_YEAR_START'].":".$Config['DOB_YEAR_END'];?>"
  //$( ".selector" ).datepicker( "setDate", "<?php echo $Config['DOB_YEAR_END']."-12-31";?>");
  </script>     