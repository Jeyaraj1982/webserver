<?php include_once("header.php"); ?>
<div>
<?php
      $batchdetails = $mysql->select("select * from _tblbatch  where userid=".$_SESSION['user']['id']." and batchid=".$_REQUEST['id']);
      if (sizeof($batchdetails)>0) {
    $records = $mysql->select("select * from _tblbatchdetails where batchid=".$_REQUEST['id']);
?>
                             <table style="margin-bottom:15px;margin-top:5px;" cellpadding="3" cellspacing="0">
                                <tr style="font-weight:bold;text-align: center;">    
                                    <td style="border:1px solid #D0DDEA;background:#ECF1F6;padding-left:10px;padding-right:10px;">Batch ID</td>
                                    <td style="border:1px solid #D0DDEA;background:#ECF1F6;padding-left:10px;padding-right:10px;">Batch Name</td>
                                    <td style="border:1px solid #D0DDEA;background:#ECF1F6;padding-left:10px;padding-right:10px;">Total Records</td>
                                    <td style="border:1px solid #D0DDEA;background:#ECF1F6;padding-left:10px;padding-right:10px;">Valid Records</td>
                                    <td style="border:1px solid #D0DDEA;background:#ECF1F6;padding-left:10px;padding-right:10px;">Message Count</td>
                                    <td style="border:1px solid #D0DDEA;background:#ECF1F6;padding-left:10px;padding-right:10px;">Added on</td>
                                    <td style="border:1px solid #D0DDEA;background:#ECF1F6;padding-left:10px;padding-right:10px;">Started On</td>
                                    <td style="border:1px solid #D0DDEA;background:#ECF1F6;padding-left:10px;padding-right:10px;">Lastupdated On</td>
                                    <td style="border:1px solid #D0DDEA;background:#ECF1F6;padding-left:10px;padding-right:10px;">Used Credits</td>
                                </tr>
                                <tr>
                                    <td style="border:1px solid #D0DDEA;border-top:none;text-align:right"><?php echo $batchdetails[0]['batchid']; ?></td>
                                    <td style="border:1px solid #D0DDEA;border-top:none;text-align:left"><?php echo $batchdetails[0]['batchname']; ?></td>
                                    <td style="border:1px solid #D0DDEA;border-top:none;text-align:right"><?php echo $batchdetails[0]['totalrecords']; ?></td>
                                    <td style="border:1px solid #D0DDEA;border-top:none;text-align:right"><?php echo $batchdetails[0]['validrecords']; ?></td>
                                    <td style="border:1px solid #D0DDEA;border-top:none;text-align:right"><?php echo $batchdetails[0]['totalsmscount']; ?></td>
                                    <td style="border:1px solid #D0DDEA;border-top:none;text-align:right"><?php echo $batchdetails[0]['addedon']; ?></td>
                                    <td style="border:1px solid #D0DDEA;border-top:none;text-align:right"><?php echo $batchdetails[0]['started']; ?></td>
                                    <td style="border:1px solid #D0DDEA;border-top:none;text-align:right"><?php echo $batchdetails[0]['ended']; ?></td>
                                    <td style="border:1px solid #D0DDEA;border-top:none;text-align:right"><?php echo $batchdetails[0]['messagesent']; ?></td>
                                </tr>
                             </table>
                             <div style="height:300px;width:100%;overflow:auto;">
                             <input type="hidden" name="batch" value="<?php echo $batchid;?>">
                                <table style="font-size:11px;width:100%;border:1px solid #DEEAF2;border-bottom:none;" cellspacing="0">
                                    <tr style="text-align:center;font-weight:bold;color:#333">
                                        <td style="padding:4px;background:url(images/trbackground.png);width:30px;border-bottom:1px solid #9EB6CE;border-right:1px solid #9EB6CE;">&nbsp;</td>
                                        <td style="padding:4px;background:url(images/trbackground.png);width:80px;border-bottom:1px solid #9EB6CE;border-right:1px solid #9EB6CE;">A</td>
                                        <td style="padding:4px;background:url(images/trbackground.png);border-bottom:1px solid #9EB6CE;border-right:1px solid #9EB6CE;">B</td>
                                        <td style="padding:4px;background:url(images/trbackground.png);width:50px;border-bottom:1px solid #9EB6CE;border-right:1px solid #9EB6CE;">C</td>
                                        <td style="padding:4px;background:url(images/trbackground.png);width:50px;border-bottom:1px solid #9EB6CE;border-right:1px solid #9EB6CE;">D</td>
                                        <td style="padding:4px;background:url(images/trbackground.png);width:150px;border-bottom:1px solid #9EB6CE;">Status</td>
                                    </tr>
                                    
                                    <?php 
                                    $rcount =0;
                                    
                                    foreach($records as $r) { 
                                        $rcount++;
                                        $bg="";
                                        if ($r['isvalidnumber']==0) {
                                            $bg="background:#FFEDE8;";
                                        }
                                        
                                        if ($r['isvalidmessage']==0) {
                                            $bg=";background:#FFEDE8;";
                                        }
                                        
                                        if ($r['isvalidtoexec']==0) {
                                            $bg=";background:#FFEDE8;";
                                        }
                                        ?>
                                    <tr>
                                        <td style="font-size:11px;padding:3px;background:#E4ECF7;color:#333;text-align:right;border-bottom:1px solid #D0E1ED;border-right:1px solid #D0E1ED;"><?php echo $rcount;?></td>
                                        <td style="font-size:11px;padding:3px;background:#fff;color:#333;text-align:left;padding-right:3px;border-bottom:1px solid #D0E1ED;border-right:1px solid #D0E1ED;<?php echo $bg;?>"><?php echo $r['mnumber'];?></td>
                                        <td style="font-size:11px;padding:3px;background:#fff;color:#333;text-align:left;padding-right:3px;border-bottom:1px solid #D0E1ED;border-right:1px solid #D0E1ED;<?php echo $bg;?>"><?php echo $r['message'];?></td>
                                        <td style="font-size:11px;padding:3px;background:#fff;color:#333;text-align:left;padding-right:3px;border-bottom:1px solid #D0E1ED;border-right:1px solid #D0E1ED;<?php echo $bg;?>"><?php echo $r['mtype'];?></td>
                                        <td style="font-size:11px;padding:3px;background:#fff;color:#333;text-align:left;padding-right:3px;border-bottom:1px solid #D0E1ED;border-right:1px solid #D0E1ED;<?php echo $bg;?>"><?php echo $r['senderid'];?></td>
                                        <td style="font-size:11px;padding:3px;background:#fff;color:#333;text-align:left;padding-right:3px;border-bottom:1px solid #D0E1ED;<?php echo $bg;?>"><?php echo $r['smsstatus'];?></td>
                                    </tr>
                                    <?php } ?>
                                </table>                   
                             </div>
                             <?php } else { ?>
                                Invalid Access
                             <?php } ?>
</div>
<?php include_once("footer.php"); ?>