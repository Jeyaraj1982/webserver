<h2>List Brand Names</h2>
<div style="margin:20px;">
<?php
    if (isset($_REQUEST['bid'])) {
        $products = $mysql->select("select count(*) as countproducts from _products where md5(brandid)='".$_REQUEST['bid']."'");
        $productcount = isset($products[0]['countproducts']) ?   $products[0]['countproducts'] : 0;
        if ($productcount>0) {
            echo errorMessage("Couldn't Be Remove This Brand Name. Product Has been assigned."); 
        } else {
            $id = $mysql->execute("delete from _brandname where md5(brandid)='".$_REQUEST['bid']."'");
            echo successMessage("Successfully Deleted");
        }    
    }
?>
    <table style="width:100%;" cellpadding="3" cellspacing="0">
        <tr style="background:#f1f1f1;">
            <td style="border:1px solid #ccc;border-right:none;text-align:center;font-weight:bold;">Brand Name</td>
            <td style="width:100px;border:1px solid #ccc;width:100px;text-align:center;font-weight:bold;">Products</td>
            <td style="width:100px;border:1px solid #ccc;width:100px;text-align:center;font-weight:bold;">&nbsp;</td>
        </tr>
    </table>
    <div style="height:500px;overflow:auto">
        <table style="width:98%;" cellpadding="3" cellspacing="0">
            <tr>
                <td colspan="3">&nbsp;</td>
            </tr>
            <?php
                $lists = $mysql->select("select * from _brandname order by brandname"); //maincategoryid
                foreach($lists as $sl) {
            ?>
            <tr>
                <td style="color:#444"><?php echo $sl['brandname'];?></td>
                <td width="100" style="text-align: right;color:#444">
                <?php
                    $products = $mysql->select("select count(*) as countproducts from _products where brandid=".$sl['brandid']);
                    $productcount = isset($products[0]['countproducts']) ?   $products[0]['countproducts'] : 0;
                    echo $productcount;
                ?>
                </td>
                
                <td width="100" style="text-align: right;color:#444">
                <a class="delete" href="dashboard.php?to=edit_brand&bid=<?php echo md5($sl['brandid']);?>">Edit</a>&nbsp;
                <?php if ($productcount==0) {?>
                <a class="delete" href="dashboard.php?to=list_brands&bid=<?php echo md5($sl['brandid']);?>">Delete</a>
                <?php } else {?>
                <span class="deletedisable">Delete</span>
                <?php } ?>
                &nbsp;</td>
            </tr>
            <?php }?>
        </table>
    </div> 
</div>               