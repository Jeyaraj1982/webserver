<div class="line">
    <div class="margin">
        <div class="s-12 m-6 l-3 margin-bottom">
            <div class="box">
                <?php include_once("rightmenu.php"); ?>
            </div>
        </div>
        <div class="s-12 m-6 l-9 margin-bottom">
            <div class="box">
                <h5 style="text-align: left;font-family: arial;">Top Earners </h5> 
                    <?php $products = $mysql->select("select * from _tbl_topEarners order by id desc"); ?>
                    <table cellpadding="3" cellspacing="4" border="1" style="font-size:12px;font-family:arial;" width="100%">
                        <tr style="background:#666;font-weight:bold;text-align: center;color:#FFFFFF">
                            <td style="border:1px solid #f1f1f1;padding-left:5px;padding-right:5px;width:120px">Name</td>
                            <td style="border:1px solid #f1f1f1;padding-left:5px;padding-right:5px;">Description</td>
                            <td width="100"></td>
                        </tr>
                        <?php foreach($products as $p ) { ?>
                        <tr style="background: <?php echo $bgcolor;?>">
                            <td style="padding-left:5px;padding-right:5px;text-align:center"><img src="assets/topearners/<?php echo $p['photopath'];?>" style="width:100px"><br><?php echo $p['test_name'];?></td>
                            <td style="text-align:left;padding-left:5px;padding-right:5px;">
                                <?php echo $p['personname'];?><br>
                                <?php echo $p['description'];?>
                            </td>
                            <td style="">
                                <a href='topearners_edit?item=<?php echo md5($p['id']);?>'  style="color:#444444">Edit</a>
                            </td>  
                        </tr>        
                        <?php } ?>
                </table>
            </div>
        </div>
    </div>
</div>