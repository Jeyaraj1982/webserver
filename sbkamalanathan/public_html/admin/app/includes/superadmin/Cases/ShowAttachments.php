     <?php
         if (isset($_POST['RemoveFile'])) {
             $mysql->execute("update _tbl_cases_attachments set IsActive='2' where md5(concat(AttachedOn,AttachmentID))='".$_POST['DeleteFileID']."'");
             echo DisplaySuccessMessage($_POST['DeleteFileName']." has deleted");
         }
     ?>
<?php
    $attachments = $mysql->select("select * from _tbl_cases_attachments where IsActive='1' and AttachmentFor='".$AttachmentFor."' and RecordID='".$RecordID."' and CaseID='".$CaseID."'");
    
    if (sizeof($attachments)>0) {
        ?>
         <div class="table-responsive"  style="overflow:hidden" >
                        <table class="table table-striped" id="basic-8" style="border: 1px solid #dadada;width: 99.5% !important;">
                        <tbody>
        <?php
        foreach($attachments as $attachment) {
        ?>
            <tr>
                <td style="font-size:12px;color:#555"><?php echo $attachment['FileName'];?></td>
                <td style="text-align: right;width:200px">
                    
                    <a target="_blank" href="<?php echo $attachment['AttachmentFile'];?>" style="font-size:12px">[Download]</a>&nbsp;
                    <a  href="javascript:void(0)" onclick="confirmFileDelete('<?php echo md5($attachment['AttachedOn'].$attachment['AttachmentID']);?>','<?php echo $attachment['FileName'];?>')" style="font-size:12px;color:Red">[Delete]</a>
                    
                </td>
            </tr>
        <?php } ?>
        </tbody>
        </table>
    </div>
    <?php } ?>  

    
    
<!-- Tooltips and popovers modal--> 
<script>
function confirmFileDelete(fileid,filename) {
    $('#DeleteFileID').val(fileid);
    $('#DeleteFileName').val(filename);
    $('#FileName').html(filename);
   $('#attachmentDelete').modal('show') ;
}
</script>