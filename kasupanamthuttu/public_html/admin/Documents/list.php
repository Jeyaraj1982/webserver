<div class="line">
    <div class="margin">
        <div class="s-12 m-6 l-3 margin-bottom">
            <div class="box">
                <?php include_once("rightmenu.php"); ?>
            </div>
        </div>
        <div class="s-12 m-6 l-9 margin-bottom">
            <div class="box">
                <h5 style="text-align: left;font-family: arial;">Offers List </h5> 
                    <?php $products = $mysql->select("select * from _tbl_documents order by DocID desc"); ?>
                    <table cellpadding="3" cellspacing="4" border="1" style="font-size:12px;font-family:arial;" width="100%">
                        <tr style="background:#666;font-weight:bold;text-align: center;color:#FFFFFF">
                            <td style="border:1px solid #f1f1f1;padding-left:5px;padding-right:5px;width:120px">Document</td>
                            <td style="border:1px solid #f1f1f1;padding-left:5px;padding-right:5px;width:120px">Description</td>
                            <td style="border:1px solid #f1f1f1;padding-left:5px;padding-right:5px;width:120px">Sold</td>
                            <td width="100"></td>
                        </tr>
                        <?php foreach($products as $p ) { ?>
                        <tr style="background: <?php echo $bgcolor;?>">
                            <td style="padding-left:5px;padding-right:5px;text-align:center">
                                <img src="assets/documents/<?php echo $p['Photopath'];?>" style="width:100px;margin:0px auto">
                                <br>Rs.<?php echo number_format($p['Price'],2);?>
                            </td>
                            <td style="text-align:left;padding-left:5px;padding-right:5px;vertical-align:top;">
                                <b><?php echo $p['DocumentName'];?></b><br>
                                <?php echo $p['Description'];?>
                            </td>
                            <td style="vertical-align:top;text-align:right">
                                <?php echo sizeof($mysql->select("select * from _tbl_documents_sold where DocID='".$p['DocID']."'")); ?>
                            </td>
                            <td style="vertical-align:top;text-align:right">
                                <a href='Doc_Edit?item=<?php echo md5($p['DocID']);?>'  style="color:#444444">Edit</a>
                            </td>  
                        </tr>        
                        <?php } ?>
                </table>
            </div>
        </div>
    </div>
</div>