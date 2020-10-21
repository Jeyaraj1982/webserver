<h2>New Product</h2>
<div style="padding:20px"> 
<?php
   
    if (isset($_POST['addproduct'])) {
        $id = $mysql->insert("_products",array(
                                              "maincategoryid"=>$_POST['maincategoryid'],
                                              "subcategoryid"=>$_POST['subcategoryid'],
                                              "productdescription"=>$_POST['productdescription'],
                                              "ispublished"=>'1',
                                              "addedon"=>date("Y-m-d H:i:s"),
                                              "productname"=>$_POST['productname']));
        if ($id>0) {
            echo successMessage("Successfully Added Product");
        } else {
            echo errorMessage("Error Adding New Product. Please contact technical team");
        }
    }
?>
 
<form action="" method="post">
    <table cellpadding="5" cellspacing="0">
        <tr>
            <td>
                 <select name="maincategoryid" style="width:250px;" onchange="location.href=location.href+'&mc='+this.value">
                 <?php
                 $lists = $mysql->select("select * from _maincategories order by categoryname");
                 foreach($lists as $l) {
                 ?>
                 <option value="<?php echo $l['maincategoryid'];?>" <?php echo ($l['maincategoryid']==$_REQUEST['m']) ? ' selected="selected"' : ''; ?> ><?php echo $l['categoryname'];?></option>
                 <?php } ?>
                 </select>                                         
            </td>
            <td>
                 <?php if (isset($_REQUEST['mc'])) { ?>
                 <select name="subcategoryid" style="width:250px;">
                 <?php
                 $lists = $mysql->select("select * from _subcategories where maincategoryid='".$_REQUEST['mc']."' order by subcategoryname");
                 foreach($lists as $l) {
                 ?>
                 <option value="<?php echo $l['subcategoryid'];?>"><?php echo $l['subcategoryname'];?></option>
                 <?php } ?>
                 </select>  
                 <?php }?>
            </td>
        </tr>
        <tr>
            <td>
                 <select name="brandid" style="width:250px;">
                 <?php
                 $lists = $mysql->select("select * from _brandname order by brandname");
                 foreach($lists as $l) {
                 ?>
                 <option value="<?php echo $l['brandid'];?>"><?php echo $l['brandname'];?></option>
                 <?php } ?>
                 </select>                                         
            </td>
            <td> </td>
        </tr>
        <tr>
            <td colspan="2"><input type="text" placeholder="Product Name" name="productname" style="width:513px;"></td>
        </tr>
        <tr>
            <td colspan="2">
                <textarea name="productdescription" style="width: 510px; height: 250px;"></textarea>
            </td>
        </tr>
        <tr>
            <td><input type="submit" class="submitBtn" name="addproduct" value="Add Product"></td>
        </tr>
    </table>
</form>
</div>
<script type="text/javascript" src="http://js.nicedit.com/nicEdit-latest.js"></script>
<script type="text/javascript">
bkLib.onDomLoaded(function() { nicEditors.allTextAreas() });
</script>