 <div style="padding:10px;border:1px solid #eee;background:#fff">
    <div class="heading1">
        <span>Verification of your account</span>
    </div>
    <Br>
    We care about the safety of our client's funds and personal data. Therefore, GoodGrowth clients have to pass a mandatory verification process.<Br><Br>
    This requirement is in compliance with the international e-commerce legislation. You cannot fully manage your account without passing the verification process.<br><Br>
    To ensure the safety of your funds and personal data and to identify the owner of the account, we kindly ask all customers to pass the verification process by providing all the necessary documents personally.<br><Br>
    Our client's personal data will not be disclosed to third parties in compliance with GoodGrowth's terms of Privacy Policy and Service Agreement.<Br><Br>
    Thank you for your understanding. 
 </div> 
 <br>
  <div style="padding:10px;border:1px solid #eee;background:#fff">
    <div class="heading1">
        <span>1. Proof of Identity - Confirm your physical identity.</span>
    </div>
    <Br> 
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
      <table style="width:100%">
            <tr>
                <td style="vertical-align:top;width:200px;">
                       <table class="tbl0">
                            <tr>
                                <td><img src="assets/uploads/<?php echo $idproof[0]['Attachment'];?>" style="width:200px"></td>
                             </tr>
                       </table>
                </td>
                <td style="vertical-align:top">
                    <table>
                        <tr>
                            <th style="text-align:left" >Document Type</th>
                            <td class="in">&nbsp;<?php echo $idproof[0]['AttachmentType'];?></td>
                        </tr>
                        <tr>
                            <th style="text-align:left">Document Number</th>
                            <td class="in">:&nbsp;<?php echo $idproof[0]['DocumentNumber'];?></td>
                        </tr>
                        <tr>
                            <th style="text-align:left">Issue Date</th>
                            <td class="in">&nbsp;<?php echo putDate($idproof[0]['DateOfIssue']);?></td>
                        </tr>
                        <tr>
                            <th style="text-align:left">Country of Issue</th>
                            <td class="in">&nbsp;<?php echo $idproof[0]['CountryOfIssue'];?></td>
                        </tr>
                        <tr>
                            <th style="text-align:left">Submitted</th>
                            <td class="in">&nbsp;<?php echo putDate($idproof[0]['SubmittedOn']);?></td>
                        </tr>
                        <?php if ($idproof[0]['IsApproved']==1) {?>
                        <tr>
                            <th style="text-align:left">Approved</th>
                            <td class="in">&nbsp;<?php echo putDate($idproof[0]['ApprovedOn']);?></td>
                        </tr>
                        <?php } ?>
                    </table>
                </td>
            </tr>
        </table>
      <?php 
   } else {
   
    ?>
    <form action="" method="Post" enctype="multipart/form-data">
        <table class="tbl0">
            <tr>
                <th style="width:140px;text-align:left">File</th>
                <td><input type="file" name="fileToUpload"><br><em></em></td>
            </tr>
            <tr>
                <th style="text-align:left" >Document Type</th>
                <td class="in">
                    <select name="AttachmentType" style="width:149px;" class="valid">
                        <option value="Passport">Passport</option>
                        <option value="Identity Card">Identity Card</option>
                        <option value="Driver License">Driver License</option>
                        <option value="Other">Other</option>
                    </select>
                </td>
            </tr>
            <tr>
                <th style="text-align:left">Document Number</th>
                <td class="in"><input type="text" placeholder="Document Number" style="min-width:149px !important;" name="DocumentNumber"></td>
            </tr>
            <tr>
                <th style="text-align:left">Issue Date</th>
                <td class="in"><input type="text" id="datepicker1"  placeholder="Issue Date" name="DateOfIssue" style="min-width:149px !important;" > </td>
            </tr>
            <tr>
                <th style="text-align:left">Country of Issue</th>
                <td class="in">
                    <select name="CountryOfIssue">
                        <option value="AF">India</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><input type="submit" class="SubmitBtn" name="IDProofBtn" value="Send documents for verification "></td>
                <td></td>
            </tr>
        </table>
   </form>
   <?php }  } else { ?>
        <table style="width:100%">
            <tr>
                <td style="vertical-align:top;width:200px;">
                       <table class="tbl0">
                            <tr>
                                <td><img src="assets/uploads/<?php echo $idproof[0]['Attachment'];?>" style="width:200px"></td>
                             </tr>
                       </table>
                </td>
                <td style="vertical-align:top">
                    <table>
                        <tr>
                            <th style="text-align:left" >Document Type</th>
                            <td class="in">&nbsp;<?php echo $idproof[0]['AttachmentType'];?></td>
                        </tr>
                        <tr>
                            <th style="text-align:left">Document Number</th>
                            <td class="in">:&nbsp;<?php echo $idproof[0]['DocumentNumber'];?></td>
                        </tr>
                        <tr>
                            <th style="text-align:left">Issue Date</th>
                            <td class="in">&nbsp;<?php echo putDate($idproof[0]['DateOfIssue']);?></td>
                        </tr>
                        <tr>
                            <th style="text-align:left">Country of Issue</th>
                            <td class="in">&nbsp;<?php echo $idproof[0]['CountryOfIssue'];?></td>
                        </tr>
                        <tr>
                            <th style="text-align:left">Submitted</th>
                            <td class="in">&nbsp;<?php echo putDate($idproof[0]['SubmittedOn']);?></td>
                        </tr>
                        <?php if ($idproof[0]['IsApproved']==1) {?>
                        <tr>
                            <th style="text-align:left">Approved</th>
                            <td class="in">&nbsp;<?php echo putDate($idproof[0]['ApprovedOn']);?></td>
                        </tr>
                        <?php } ?>
                    </table>
                </td>
            </tr>
        </table>
   <?php } ?>
 </div> 
 
  <br>
  <div style="padding:10px;border:1px solid #eee;background:#fff">
    <div class="heading1">
        <span>2. Proof of Address - Confirm the identity of your residential address.</span>
    </div>
 <Br>
 
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
      <table style="width:100%">
            <tr>
                <td style="vertical-align:top;width:200px;">
                       <table class="tbl0">
                            <tr>
                                <td><img src="assets/uploads/<?php echo $idproof[0]['Attachment'];?>" style="width:200px"></td>
                             </tr>
                       </table>
                </td>
                <td style="vertical-align:top">
                    <table>
                        <tr>
                            <th style="text-align:left" >Document Type</th>
                            <td class="in">&nbsp;<?php echo $idproof[0]['AttachmentType'];?></td>
                        </tr>
                        <tr>
                            <th style="text-align:left">Document Number</th>
                            <td class="in">:&nbsp;<?php echo $idproof[0]['DocumentNumber'];?></td>
                        </tr>
                        <tr>
                            <th style="text-align:left">Issue Date</th>
                            <td class="in">&nbsp;<?php echo putDate($idproof[0]['DateOfIssue']);?></td>
                        </tr>
                        <tr>
                            <th style="text-align:left">Country of Issue</th>
                            <td class="in">&nbsp;<?php echo $idproof[0]['CountryOfIssue'];?></td>
                        </tr>
                        <tr>
                            <th style="text-align:left">Submitted</th>
                            <td class="in">&nbsp;<?php echo putDate($idproof[0]['SubmittedOn']);?></td>
                        </tr>
                        <?php if ($idproof[0]['IsApproved']==1) {?>
                        <tr>
                            <th style="text-align:left">Approved</th>
                            <td class="in">&nbsp;<?php echo putDate($idproof[0]['ApprovedOn']);?></td>
                        </tr>
                        <?php } ?>
                    </table>
                </td>
            </tr>
        </table>
      <?php  
    } else {
    ?>
    
    <form action="" method="Post" enctype="multipart/form-data">
        <table class="tbl0">
            <tr>
                <th style="width:140px;text-align:left">File</th>
                <td><input type="file" name="fileToUpload"><br><em></em></td>
            </tr>
            <tr>
                <th style="text-align:left" >Document Type</th>
                <td class="in">
                    <select name="AttachmentType" style="width:149px;" class="valid">
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
                </td>
            </tr>
            <tr>
                <th style="text-align:left">Document Number</th>
                <td class="in"><input type="text" placeholder="Document Number" style="min-width:149px !important;" name="DocumentNumber"></td>
            </tr>
            <tr>
                <th style="text-align:left">Issue Date</th>
                <td class="in"><input type="text" id="datepicker1"  placeholder="Issue Date" name="DateOfIssue" style="min-width:149px !important;" > </td>
            </tr>
            <tr>
                <th style="text-align:left">Country of Issue</th>
                <td class="in">
                    <select name="CountryOfIssue">
                        <option value="AF">India</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><input type="submit" class="SubmitBtn" name="AddressProofBtn" value="Send documents for verification"></td>
                <td></td>
            </tr>
        </table>
   </form>
   <?php } } else { ?>
        <table style="width:100%">
            <tr>
                <td style="vertical-align:top;width:200px;">
                       <table class="tbl0">
                            <tr>
                                <td><img src="assets/uploads/<?php echo $idproof[0]['Attachment'];?>" style="width:200px"></td>
                             </tr>
                       </table>
                </td>
                <td style="vertical-align:top">
                    <table>
                        <tr>
                            <th style="text-align:left" >Document Type</th>
                            <td class="in">&nbsp;<?php echo $idproof[0]['AttachmentType'];?></td>
                        </tr>
                        <tr>
                            <th style="text-align:left">Document Number</th>
                            <td class="in">:&nbsp;<?php echo $idproof[0]['DocumentNumber'];?></td>
                        </tr>
                        <tr>
                            <th style="text-align:left">Issue Date</th>
                            <td class="in">&nbsp;<?php echo putDate($idproof[0]['DateOfIssue']);?></td>
                        </tr>
                        <tr>
                            <th style="text-align:left">Country of Issue</th>
                            <td class="in">&nbsp;<?php echo $idproof[0]['CountryOfIssue'];?></td>
                        </tr>
                        <tr>
                            <th style="text-align:left">Submitted</th>
                            <td class="in">&nbsp;<?php echo putDate($idproof[0]['SubmittedOn']);?></td>
                        </tr>
                        <?php if ($idproof[0]['IsApproved']==1) {?>
                        <tr>
                            <th style="text-align:left">Approved</th>
                            <td class="in">&nbsp;<?php echo putDate($idproof[0]['ApprovedOn']);?></td>
                        </tr>
                        <?php } ?>
                    </table>
                </td>
            </tr>
        </table>
   <?php } ?>
 </div>  
    
 <Br> <Br>
  <script>
  $( function() {
    $( "#datepicker2" ).datepicker({
    dateFormat: "yy-mm-dd",
    
    });
    $( "#datepicker1" ).datepicker({
    dateFormat: "yy-mm-dd",
    
    });
  } );
  //yearRange: "<?php echo $Config['DOB_YEAR_START'].":".$Config['DOB_YEAR_END'];?>"
  //$( ".selector" ).datepicker( "setDate", "<?php echo $Config['DOB_YEAR_END']."-12-31";?>");
  </script>
  