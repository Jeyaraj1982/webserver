<div style="padding:10px;border:1px solid #eee;background:#fff">
    <div class="heading1"><span>Manage Members</span></div>
    <Br>
    <?php $VerificationEntries = $mysql->select("select * from _tbl_Members where MemberID in (select MemberID from _tbl_Member_Attachment where AttachmentType='IDPROOF' and IsApproved='0' and IsRejected='0') and ReferedBy>0 order by MemberID desc"); ?>
    <table class= "listTable" style="width:100%" cellspacing="0">
        <tr style="background:#eee">
            <th style="text-align: center;padding:5px;width:150px">Member Code</th>
            <th style="text-align: left;width:120px;">First Name</th>
            <th style="text-align: left;width:120px">Last Name</th>
            <th style="text-align: left;">Nick Name</th>
            <th style="text-align: left;">Mobile Number</th>
            <th style="text-align: left;">Created On</th>
            <th style="text-align: left;width:50px">&nbsp;</th>
        </tr>
        <?php foreach($VerificationEntries as $entry) {?>
        <tr class="logip">
            <td style="text-align: center;"><?php echo $entry['MemberCode'];?></td>
            <td style="text-align: left;"><?php echo $entry['FirstName'];?></td>
            <td style="text-align: left;"><?php echo $entry['LastName'];?></td>
            <td style="text-align: left;"><?php echo $entry['NickName'];?></td>
            <td style="text-align: left;"><?php echo $entry['MobileNumber'];?></td>
            <td style="text-align: left;"><?php echo putDateTime($entry['CreatedOn']);?></td>
            <td style="text-align: left;"><a class="hlink" href="dashboard.php?action=MemberView&MemberCode=<?php echo $entry['MemberCode']; ?>">View</a></td>
        </tr>
        <?php } ?>
        <?php if (sizeof($VerificationEntries)==0) { ?>
                <tr>
                    <td style="text-align:center" colspan="7">No records found.</td>
                </tr>
            <?php
        }
        ?>
</tbody>
</table>
 </div> 

