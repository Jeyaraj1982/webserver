<div class="line">
    <div class="margin">
        <div class="s-12 m-6 l-3 margin-bottom">
            <div class="box">
                <?php include_once("rightmenu.php"); ?>
            </div>
        </div>
        <div class="s-12 m-6 l-9 margin-bottom">
            <div class="box">
                <h5 style="text-align: left;font-family: arial;">Franchisees</h5> 
                    <?php $products = $mysql->select("select * from _admins order by AssignedDistrict"); ?>
                    <table cellpadding="3" cellspacing="4" border="1" style="font-size:12px;font-family:arial;" width="100%">
                        <tr style="background:#666;font-weight:bold;text-align: center;color:#FFFFFF">
                            <td style="border:1px solid #f1f1f1;padding-left:5px;padding-right:5px;width:120px">Franchisee Name</td>
                            <td style="border:1px solid #f1f1f1;padding-left:5px;padding-right:5px;">State</td>
                            <td style="border:1px solid #f1f1f1;padding-left:5px;padding-right:5px;">District</td>
                            <td style="border:1px solid #f1f1f1;padding-left:5px;padding-right:5px;">User Name</td>
                            <td style="border:1px solid #f1f1f1;padding-left:5px;padding-right:5px;">Password</td>
                            <td style="border:1px solid #f1f1f1;padding-left:5px;padding-right:5px;">Status</td>
                            <td width="100"></td>
                        </tr>
                        <?php foreach($products as $p ) { ?>
                        <tr style="background: <?php echo $bgcolor;?>">
                            <td style="text-align:left;"><?php echo $p['AdminName'];?></td>
                            <td style="text-align:left;"><?php echo $p['AssignedState'];?></td>
                            <td style="text-align:left;"><?php echo $p['AssignedDistrict'];?></td>
                            <td style="text-align:left;"><?php echo $p['Username'];?></td>
                            <td style="text-align:left;"><?php echo $p['UserPassword'];?></td>
                            <td style="text-align:left;"><?php echo $p['IsActive']==1 ? "Active" : "Disabled";?></td>
                            <td style="text-align:right;color:blue;">
                                <a href='Franchisee_Edit?item=<?php echo md5($p['AdminID']);?>'  style="color:#444444">Edit</a>
                            </td>  
                        </tr>        
                        <?php } ?>
                </table>
            </div>
        </div>
    </div>
</div>