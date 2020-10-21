<h2>New Subcategory</h2>
<div style="padding:20px">
<?php
    if (isset($_POST['addsubcategoryname'])) {
        $id = $mysql->insert("_subcategories",array("maincategoryid"=>$_POST['maincategoryid'],
                                              "subcategoryname"=>$_POST['subcategoryname']));
        if ($id>0) {
            echo successMessage("Successfully Added Subcategory");
        } else {
            echo errorMessage("Error Adding Subcategory. Please contact technical team");
        }
    }
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
                     <option value="<?php echo $l['maincategoryid'];?>"><?php echo $l['categoryname'];?></option>
                     <?php } ?>
                     </select>                                         
                </td>
            </tr>
            <tr>
                <td><input type="text" placeholder="Sub Category Name" name="subcategoryname" style="width:200px;"></td>
            </tr>
            <tr>
                <td><input type="submit" class="submitBtn" name="addsubcategoryname" value="Add Sub Category">
                &nbsp;&nbsp;<a class="listhref" href="dashboard.php?to=list_sc">List SubCategories</a>
                </td>
            </tr>
        </table>
    </form>
</div>