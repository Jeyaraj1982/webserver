<h2>Edit Subcategory</h2>
<div style="padding:20px">
<?php
    if (isset($_POST['updatesubcategoryname'])) {
        $mysql->execute("update _subcategories set maincategoryid='".$_POST['maincategoryid']."',
                                              subcategoryname='".$_POST['subcategoryname']."' where md5(concat(subcategoryid,maincategoryid))='".$_REQUEST['sc']."'");
        echo successMessage("Successfully Added Subcategory");
    }
    $data = $mysql->select("select * from _subcategories where md5(concat(subcategoryid,maincategoryid))='".$_REQUEST['sc']."'");
?>
    <form action="" method="post">
        <table cellpadding="5" cellspacing="0">
            <tr>
                <td>
                     <select name="maincategoryid" style="width:200px;">
                     <?php
                     $lists = $mysql->select("select * from _maincategories order by categoryname");
                     foreach($lists as $l) {
                     ?>
                     <option value="<?php echo $l['maincategoryid'];?>" <?php echo ($l['maincategoryid']==$data[0]['maincategoryid']) ? " selected='selected' " : '';?>><?php echo $l['categoryname'];?></option>
                     <?php } ?>
                     </select>                                         
                </td>
            </tr>
            <tr>
                <td><input type="text" placeholder="Sub Category Name" value="<?php echo $data[0]['subcategoryname'];?>" name="subcategoryname" style="width:200px;"></td>
            </tr>
            <tr>
                <td><input type="submit" class="submitBtn" name="updatesubcategoryname" value="Update Sub Category">
                &nbsp;&nbsp;<a class="listhref" href="dashboard.php?to=list_sc">List SubCategories</a>
                </td>
            </tr>
        </table>
    </form>
</div>