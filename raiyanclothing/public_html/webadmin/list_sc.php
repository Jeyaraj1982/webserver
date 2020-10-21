<h2>List All Subcategory</h2>

<div style="margin:20px;">
<?php
    if (isset($_REQUEST['sc'])) {
        $mysql->execute("delete from _subcategories where md5(concat(subcategoryid,maincategoryid))='".$_REQUEST['sc']."'");
        echo successMessage("Successfully Deleted");
    }
?>
<table style="width:100%;" cellpadding="3" cellspacing="0">
    <tr style="background:#f1f1f1;">
        <td style="border:1px solid #ccc;border-right:none;width:100px;text-align:center;font-weight:bold;">Main Category</td>
        <td style="border:1px solid #ccc;border-right:none;border-left:none;text-align:center;font-weight:bold;">Subcategory Name</td>
        <td style="border:1px solid #ccc;width:100px;text-align:center;font-weight:bold;">Products</td>
        <td style="border:1px solid #ccc;width:100px;text-align:center;font-weight:bold;">&nbsp;</td>
    </tr>
</table>
<div style="height:500px;overflow:auto">   
<table style="width:98%;" cellpadding="3" cellspacing="0">
    <tr>
        <td colspan="4">&nbsp;</td>
    </tr>
<?php
    $lists = $mysql->select("select * from _maincategories order by categoryname"); //maincategoryid
    foreach($lists as $l) {
?>
    <tr>
        <td colspan="4" style="background:#fcfcfc;border-top:1px solid #f1f1f1;border-bottom:1px solid #f1f1f1;color:#F32847;font-weight:bold;"><?php echo $l['categoryname'];?></td>
    </tr>
    <?php
    $slists = $mysql->select("select * from _subcategories where maincategoryid=".$l['maincategoryid']."  order by subcategoryname");
    foreach($slists as $sl) {
    ?>
    <tr>
        <td width="100"></td>
        <td style="color:#444"><?php echo $sl['subcategoryname'];?></td>
        <td width="100" style="text-align: right;color:#444">
        <?php
            $products = $mysql->select("select count(*) as countproducts from _products where subcategoryid=".$sl['subcategoryid']);
            $productcount = isset($products[0]['countproducts']) ?   $products[0]['countproducts'] : 0;
            echo $productcount;
        ?>
        </td>
        <td width="100" style="text-align: right;color:#444">
        <a class="delete" href="dashboard.php?to=edit_sc&sc=<?php echo md5($sl['subcategoryid'].$sl['maincategoryid']);?>">Edit</a>&nbsp;
        <?php if ($productcount==0) {?>
        <a class="delete" href="dashboard.php?to=list_sc&sc=<?php echo md5($sl['subcategoryid'].$sl['maincategoryid']);?>">Delete</a>
        <?php } else {?>
        <span class="deletedisable">Delete</span>
        <?php } ?>
        &nbsp;</td>
    </tr>
    <?php }?>
<?php } ?> 
</table>
</div> 
</div>               