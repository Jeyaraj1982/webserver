    <div style="padding:10px;border:1px solid #eee;background:#fff">
        <div class="heading1">
            <span>Member Information</span>
        </div>
        <Br>
        <?php 
        if (isset($_POST['updateBtn'])) {
            $member = $mysql->select("select * from _tbl_Members where MemberCode='".$_GET['MemberCode']."'"); 
            if ($member[0]['IsActive']==1) {
                $mysql->execute("update _tbl_Members set IsActive='0' where MemberCode='".$_GET['MemberCode']."'"); 
                echo "Member Deactivated";
            }
            if ($member[0]['IsActive']==0) {
                $mysql->execute("update _tbl_Members set IsActive='1' where MemberCode='".$_GET['MemberCode']."'"); 
                echo "Member Activated";
            }
        }
        
        $member = $mysql->select("select * from _tbl_Members where MemberCode='".$_GET['MemberCode']."'"); ?>
        <table style="width:100%">
            <tr>
                <td style="vertical-align:top">
                    <table cellspacing="0" cellpadding="6" style="width:100%">
                        <tr>
                            <td style="width:100px;">Member Code</td>
                            <td><?php echo $member[0]['MemberCode'];?></td>
                        </tr>
                        <tr>
                            <td style="width:100px;">Plan</td>
                            <td><?php echo $member[0]['PlanString'];?></td>
                        </tr>
                        <tr>
                            <td style="width:100px;">First Name</td>
                            <td><?php echo $member[0]['FirstName'];?></td>
                        </tr>
                        <tr>
                            <td>Last Name</td>
                            <td><?php echo $member[0]['LastName'];?></td>
                        </tr>
                        <tr>
                            <td>Nick Name</td>
                            <td><?php echo $member[0]['NickName'];?></td>
                        </tr>
                        <tr>
                            <td>Date of Birth</td>
                            <td><?php echo putDate($member[0]['DateOfBirth']);?></td>
                        </tr>  
                        <tr>
                            <td>Mobile Number</td>
                            <td><?php echo $member[0]['MobileNumber'];?></td>
                        </tr> 
                        <tr>
                            <td>Email ID</td>
                            <td><?php echo $member[0]['EmailID'];?></td>
                        </tr>
                        <tr>
                            <td>Sex</td>
                            <td><?php echo $member[0]['Sex'];?></td>
                        </tr>
                        <tr>
                            <td>Login Name</td>
                            <td><?php echo $member[0]['MemberUserName'];?></td>
                        </tr>  
                        
                             <tr>
                            <td>Login Password</td>
                            <td><?php echo $member[0]['MemberPassword'];?></td>
                        </tr>  
                          <tr>
                            <td>Status</td>
                            <td>
                            <form action="" method="post">
                            <?php echo $member[0]['IsActive']==1 ? 'Active' : 'Deactivated';?>
                            <input type="submit" class="SubmitBtn" name="updateBtn" value="<?php echo $member[0]['IsActive']==1 ? 'Deactive' : 'Active';?>" style="padding:4px 20px !important">
                            </form>
                            </td>
                        </tr> 
                        <tr>
                            <td>&nbsp;</td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <form action="dashboard.php" method="Get" >
                                    <select name="action">
                                        <option value="MEditMember">Edit Member</option>
                                        <option value="MChangePassword">Change Password</option>
                                    </select>
                                    <input type="hidden" name="MemberCode" value="<?php echo $_GET['MemberCode'];?>">
                                    <input type="submit" class="SubmitBtn"  value="Go" style="padding:4px 20px !important">
                                </form>
                            </td>
                        </tr>
                        
                    </table>
                    
                    
                   
                    <div class="heading1">
            <span> View Plan Tree</span>
        </div>
        <Br>
                    <table style="width:100%;" cellpadding="5" cellspacing="0">
                        <tr>
                            <td>G3</td>
                            <td></td>
                            <td style="width:120px;"><a href="dashboard.php?action=Members/Tree_G3&Member=<?php echo $_GET['MemberCode'];?>">View Tree</a></td>
                        </tr>
                        <tr>
                            <td>GOLDWAY</td>
                            <td><?php
                                         echo $member[0]['GoodwayCompleted']=="1" ? "Completed":"";
                                     ?></td>
                            <td><a href="dashboard.php?action=Members/Tree_GOLDWAY&Member=<?php echo $_GET['MemberCode'];?>">View Tree</a></td>
                        </tr>
                        <tr>
                            <td>MYGOLD</td>
                            <td>
                            <?php
                                         echo $member[0]['MyGoldCompleted']=="1" ? "Completed":"";
                                     ?>
                            </td>
                            <td><a href="dashboard.php?action=Members/Tree_MYGOLD&Member=<?php echo $_GET['MemberCode'];?>">View Tree</a></td>
                        </tr>
                          <tr>
                            <td>SUPERGOLD</td>
                            <td>
                            <?php
                                         echo $member[0]['SuperGoldCompleted']=="1" ? "Completed":"";
                                     ?>
                            </td>
                            <td><a href="dashboard.php?action=Members/Tree_SUPERGOLD&Member=<?php echo $_GET['MemberCode'];?>">View Tree</a></td>
                        </tr>

                          <tr>
                            <td>GOLDEAGLE</td>
                            <td>
                             <?php
                                         echo $member[0]['GoldEagleCompleted']=="1" ? "Completed":"";
                                     ?>
                            </td>
                            <td><a href="dashboard.php?action=Members/Tree_GOLDEAGLE&Member=<?php echo $_GET['MemberCode'];?>">View Tree</a></td>
                        </tr>

                          <tr>
                            <td>GOLDFINISH</td>
                            <td>
                             <?php
                                         echo $member[0]['GoldFinishCompleted']=="1" ? "Completed":"";
                                     ?>
                            </td>
                            <td><a href="dashboard.php?action=Members/Tree_GOLDFINISH&Member=<?php echo $_GET['MemberCode'];?>">View Tree</a></td>
                        </tr>
                    </table>
                </td>
                <td style="vertical-align:top">
                    <div style="padding:10px;border:1px solid #eee;background:#fff">
                        <div class="heading1"><span>Login History</span></div>
                        <Br>
                        <?php $loginEntries = $mysql->select("select * from _tbl_Members_LoginHistory where MemberID='".$member[0]['MemberID']."' order by MemberLoginID desc limit 0,5"); ?>
                        <table class= "listTable" style="width:100%" cellspacing="0">
                            <tr style="background:#eee">
                                <th style="text-align: center;padding:5px;width:150px">Date</th>
                                <th style="text-align: left;width:120px;">IP address</th>
                                <th style="text-align: left;width:120px">Country</th>
                                <th style="text-align: left;">City</th>
                            </tr>
                            <?php if (sizeof($loginEntries)==0) { ?>
                            <tr class="logip">
                                <td colspan="4" style="text-align:center">No records found</td>
                            </tr>
                            <?php } else { ?>
                                <?php foreach($loginEntries as $entry) {?>
                                <tr class="logip">
                                    <td style="text-align: center;"><?php echo putDateTime($entry['LoginDateTime']);?></td>
                                    <td style="text-align: left;"><?php echo $entry['IPAddress'];?></td>
                                    <td style="text-align: left;"><?php echo $entry['CountryName'];?></td>
                                    <td style="text-align: left;"><?php echo $entry['CityName'];?></td>
                                </tr>
                                <?php } ?>
                            <?php } ?>
                        </table>
                        <?php if (sizeof($loginEntries)>0) { ?>
                            <a class="hlink" href="">More ...</a>
                        <?php } ?>
                    </div> 
                    <br>
                    <div style="padding:10px;border:1px solid #eee;background:#fff">
                        <div class="heading1"><span>List of Members</span></div>
                        <Br>
                        <?php $loginEntries = $mysql->select("select * from _tbl_Members where  ReferedBy='".$member[0]['MemberID']."' order by MemberID desc limit 0,5"); ?>
                        <table class= "listTable" style="width:100%" cellspacing="0">
                            <tr style="background:#eee">
                                <th style="text-align: center;padding:5px;width:150px">Member Code</th>
                                <th style="text-align: left;width:120px;">First Name</th>
                                <th style="text-align: left;width:120px">Last Name</th>
                                <th style="text-align: left;">Created On</th>
                            </tr>
                            <?php if (sizeof($loginEntries)==0) { ?>
                                <tr class="logip">
                                    <td colspan="4" style="text-align:center">No records found</td>
                                </tr>
                            <?php } else { ?>
                                <?php foreach($loginEntries as $entry) {?>
                                    <tr class="logip">
                                        <td style="text-align: center;"><?php echo $entry['MemberCode'];?></td>
                                        <td style="text-align: left;"><?php echo $entry['FirstName'];?></td>
                                        <td style="text-align: left;"><?php echo $entry['LastName'];?></td>
                                        <td style="text-align: left;"><?php echo putDateTime($entry['CreatedOn']);?></td>
                                    </tr>
                                <?php } ?>
                            <?php } ?>
                        </table>
                    </div> 
                    <br>
                    <div style="padding:10px;border:1px solid #eee;background:#fff">
                        <div class="heading1"><span>Document Verification Requests</span></div>
                        <Br>
                        <div>
                        <?php   
                        
                          if (isset($_POST['IDProofDeleteBtn'])) {
                                $mysql->execute("delete from _tbl_Member_Attachment where AttachmentID='".$_POST['AttachmentID']."'"); 
                                //$smstxt= "Dear ".trim($member[0]['FirstName']).", Your ID Proof Verification Request has been processed. Your ID Proof has been valid  -Thanks GoodGrowth";
                                //file_get_contents("http://onlinej2j.com/sms.php?Text=".base64_encode($smstxt)."&MobileNumber=".trim($member[0]['MobileNumber']));
                                echo SuccessMsg("Deleted Successfully");       
                            }
                            if (isset($_POST['IDProofApproveBtn'])) {
                                $mysql->execute("update _tbl_Member_Attachment set IsApproved='1' , ApprovedOn='".date("Y-m-d H:i:s")."' where AttachmentID='".$_POST['AttachmentID']."'"); 
                                $smstxt= "Dear ".trim($member[0]['FirstName']).", Your ID Proof Verification Request has been processed. Your ID Proof has been valid  -Thanks GoodGrowth";
                                file_get_contents("http://onlinej2j.com/sms.php?Text=".base64_encode($smstxt)."&MobileNumber=".trim($member[0]['MobileNumber']));
                                echo SuccessMsg("Document Successfully Verified");       
                            }
                            if (isset($_POST['IDProofRejectBtn'])) {
                                $mysql->execute("update _tbl_Member_Attachment set IsRejected='1' , RejectedOn='".date("Y-m-d H:i:s")."' where AttachmentID='".$_POST['AttachmentID']."'"); 
                                $smstxt= "Dear ".trim($member[0]['FirstName']).", Your ID Proof Verification Request has been processed. Your ID Proof has been invalid. Please re-send verification   -Thanks GoodGrowth";
                                file_get_contents("http://onlinej2j.com/sms.php?Text=".base64_encode($smstxt)."&MobileNumber=".trim($member[0]['MobileNumber']));
                                echo SuccessMsg("Document Successfully Rejected");       
                            }
                            $idproof = $mysql->select("select * from _tbl_Member_Attachment where AttachmentType='IDPROOF' and IsApproved='0' and IsRejected='0' and MemberID='".$member[0]['MemberID']."'");
                            if (sizeof($idproof)==0) {     
                                $idproof = $mysql->select("select * from _tbl_Member_Attachment where AttachmentType='IDPROOF' and IsApproved='1' and IsRejected='0' and MemberID='".$member[0]['MemberID']."'");                           
                        ?>
                        <table style="width:100%">
                            <tr>
                                <td style="vertical-align:top;width:200px;">
                                    <table class="tbl0">
                                        <tr>
                                            <td><img src="assets/uploads/<?php echo $idproof[0]['Attachment'];?>" style="height:100px;"></td>
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
                                        <tr>
                                            <td class="in"><input type="submit" name="IDProofDeleteBtn" value="Remove">&nbsp;</td>
                                        </tr>
                                        <?php } ?> 
                                    </table>
                                </td>
                            </tr>
                        </table>
                        <?php } else { ?>
                        <table style="width:100%">
                            <tr>
                                <td style="vertical-align:top;width:200px;">
                                    <table class="tbl0">
                                        <tr>
                                            <td><img src="assets/uploads/<?php echo $idproof[0]['Attachment'];?>" style="height:100px;"></td>
                                        </tr>
                                    </table>
                                </td>
                                <td style="vertical-align:top">
                                    <form action="" method="post">
                                        <input type="hidden" name="AttachmentID" value="<?php echo $idproof[0]['AttachmentID'];?>">
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
                                            <tr>
                                                <td colspan="2">
                                                    <input type="submit" name="IDProofApproveBtn" value="Approve">&nbsp;
                                                    <input type="submit" name="IDProofRejectBtn" value="Reject">&nbsp;
                                                </td>
                                            </tr>
                                        </table>
                                    </form>
                                </td>
                            </tr>
                        </table>
                        <?php } ?>
                    </div>
                    
                        <hr style="border:none;border-bottom:1px solid #d5d5d5">
                        
                        <div>
                        <?php
              if (isset($_POST['AddressProofDeleteBtn'])) {
                                $mysql->execute("delete from _tbl_Member_Attachment where AttachmentID='".$_POST['AttachmentID']."'"); 
                                //$smstxt= "Dear ".trim($member[0]['FirstName']).", Your ID Proof Verification Request has been processed. Your ID Proof has been valid  -Thanks GoodGrowth";
                                //file_get_contents("http://onlinej2j.com/sms.php?Text=".base64_encode($smstxt)."&MobileNumber=".trim($member[0]['MobileNumber']));
                                echo SuccessMsg("Deleted Successfully");       
                            }
    
                            if (isset($_POST['AddressProofApproveBtn'])) {
                                $mysql->execute("update _tbl_Member_Attachment set IsApproved='1' , ApprovedOn='".date("Y-m-d H:i:s")."' where AttachmentID='".$_POST['AttachmentID']."'"); 
                                $smstxt= "Dear ".trim($member[0]['FirstName']).", Your Address Proof Verification Request has been processed. Your Address Proof has been valid.   -Thanks GoodGrowth";
                                file_get_contents("http://onlinej2j.com/sms.php?Text=".base64_encode($smstxt)."&MobileNumber=".trim($member[0]['MobileNumber']));
                                echo SuccessMsg("Document Successfully Verified");       
                            }
    
                            if (isset($_POST['AddressProofRejectBtn'])) {
                                $mysql->execute("update _tbl_Member_Attachment set IsRejected='1' , RejectedOn='".date("Y-m-d H:i:s")."' where AttachmentID='".$_POST['AttachmentID']."'"); 
                                $smstxt= "Dear ".trim($member[0]['FirstName']).", Your Address Proof Verification Request has been processed. Your Address Proof has been invalid. Please re-send verification   -Thanks GoodGrowth";
                                file_get_contents("http://onlinej2j.com/sms.php?Text=".base64_encode($smstxt)."&MobileNumber=".trim($member[0]['MobileNumber']));
                                echo SuccessMsg("Document Successfully Rejected");       
                            }
                   
                            $idproof = $mysql->select("select * from _tbl_Member_Attachment where AttachmentType='ADDRESSPROOF' and IsApproved='0' and IsRejected='0' and MemberID='".$member[0]['MemberID']."'");                        
                     
                            if (sizeof($idproof)==0) {        
                                $idproof = $mysql->select("select * from _tbl_Member_Attachment where AttachmentType='ADDRESSPROOF' and IsApproved='1' and IsRejected='0' and MemberID='".$member[0]['MemberID']."'");                        
                            ?>
                            <table style="width:100%">
                                <tr>
                                    <td style="vertical-align:top;width:200px;">
                                        <table class="tbl0">
                                            <tr>
                                                <td><img src="assets/uploads/<?php echo $idproof[0]['Attachment'];?>" style="height:100px"></td>
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
                                            <tr>
                                            <td class="in"><input type="submit" name="AddressProofDeleteBtn" value="Remove">&nbsp;</td>
                                        </tr>
                                        
                                            <?php } ?> 
                                        </table>
                                    </td>
                                </tr>
                            </table>
                            <?php } else { ?>
                            <table style="width:100%">
                                <tr>
                                    <td style="vertical-align:top;width:200px;">
                                        <table class="tbl0">
                                            <tr>
                                                <td><img src="assets/uploads/<?php echo $idproof[0]['Attachment'];?>" style="height:100px"></td>
                                            </tr>
                                        </table>
                                    </td>
                                    <td style="vertical-align:top">
                                        <form action="" method="post">
                                            <input type="hidden" value="<?php echo $idproof[0]['AttachmentID'];?>" name="AttachmentID">
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
                                                <tr>
                                                    <td colspan="2">
                                                        <input type="submit" name="AddressProofApproveBtn" value="Approve">&nbsp;
                                                        <input type="submit" name="AddressProofRejectBtn" value="Reject">&nbsp;
                                                    </td>
                                                </tr>
                                            </table>
                                        </form>
                                    </td>
                                </tr>
                            </table>
                            <?php } ?>
                     </div>
                    </div>
                    <br><br>
                </td>
            </tr>
        </table>
    </div>
<br><br>   