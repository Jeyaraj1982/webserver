<h2>List Products</h2>

<div style="margin:20px;">

<table style="width:100%;" cellpadding="3" cellspacing="0">
    <tr style="background:#f1f1f1;">
        <td style="border:1px solid #ccc;border-right:none;text-align:center;font-weight:bold;" width="10"></td>
        <td style="border:1px solid #ccc;border-right:none;border-left:none;text-align:center;font-weight:bold;">Prodcut Name</td>
        <td style="border:1px solid #ccc;border-right:none;width:200px;border-left:none;text-align:center;font-weight:bold;">Main Category</td>
        <td style="border:1px solid #ccc;border-right:none;width:200px;border-left:none;text-align:center;font-weight:bold;">Subcategory Name</td>
        <td style="border:1px solid #ccc;border-left:none;width:50px;text-align:center;font-weight:bold;">&nbsp;</td>
    </tr>
</table>
<div style="height:500px;overflow:auto">   
<table style="width:98%;" cellpadding="3" cellspacing="0">
    <tr>
        <td colspan="4">&nbsp;</td>
    </tr>
<?php
    $lists = $mysql->select("select * from _products as p , _subcategories as s, _maincategories as m where p.subcategoryid=s.subcategoryid and s.maincategoryid = m.maincategoryid order by p.productname"); 
    foreach($lists as $l) {
?>
    <tr>
        <td width="10"><img src="images/<?php echo ($l['ispublished']==1) ? 'icon-publish.gif' : 'icon-unpublish.png';?>"></td>
        <td><?php echo $l['productname'];?></td>
        <td width="200" style=";border-left:1px solid #ccc">&nbsp;&nbsp;<?php echo $l['categoryname'];?></td>
        <td width="200" style="border-right:1px solid #ccc;border-left:1px solid #ccc">&nbsp;&nbsp;<?php echo $l['subcategoryname'];?></td>
        <td width="50" style="text-align: right;color:#444">
        <a class="delete" href="dashboard.php?to=edit_product&pid=<?php echo md5($l['subcategoryid'].$l['productid']);?>&mc=<?php echo $l['maincategoryid'];?>">Edit</a>&nbsp;
        &nbsp;</td>
    </tr>
    <?php }?>
 
</table>
</div> 