<div class="line">
    <div class="row">
        <div class="col-sm-12">
            <h3>My Documents</h3>
        </div>
        <div class="col-sm-12">       
        User Name:&nbsp;<?php echo $_SESSION['DocUser']['UserName'];?><Br>
        Mobile Number:&nbsp;<?php echo $_SESSION['DocUser']['MobileNumber'];?><Br>
        Email ID:&nbsp;<?php echo $_SESSION['DocUser']['EmailID'];?><Br>
        <br><br>
             <?php $products = $mysql->select("select * from _tbl_documents where DocID in (select DocID from _tbl_documents_sold where UserID='".$_SESSION['DocUser']['UserID']."' order by DocReqID)"); 
             ?>
                    <table cellpadding="3" cellspacing="4" border="1" style="font-size:12px;font-family:arial;" width="100%">
                        <tr style="background:#666;font-weight:bold;text-align: center;color:#FFFFFF">
                            <td style="border:1px solid #f1f1f1;padding-left:5px;padding-right:5px;width:120px">Document</td>
                            <td style="border:1px solid #f1f1f1;padding-left:5px;padding-right:5px;width:120px">Description</td>
                        </tr>
                        <?php foreach($products as $p ) { ?>
                        <tr style="background: <?php echo $bgcolor;?>">
                            <td style="padding-left:5px;padding-right:5px;text-align:center">
                                <img src="assets/documents/<?php echo $p['Photopath'];?>" style="width:100px;margin:0px auto">
                                <br>Rs.<?php echo number_format($p['Price'],2);?>
                            </td>
                            <td style="text-align:left;padding-left:5px;padding-right:5px;vertical-align:top;">
                                <b><?php echo $p['DocumentName'];?></b><br>
                                <?php echo $p['Description'];?> <br><br>
                                Purchased:<br>
                                <?php echo $p['RequestedOn'];?> <br><br>
                                Download Link:<br>
                                <a href="https://www.kasupanamthuttu.com/assets/documents/<?php echo $p['Attachment']; ?>"><?php echo "https://www.kasupanamthuttu.com/assets/documents".$p['Attachment']; ?></a><br>
                            </td>
                              
                        </tr>        
                        <?php } ?>
                </table>
        </div>
    </div>
</div>