<h2>Edit Brand Name</h2>
<div style="padding:20px">
<?php
    if (isset($_POST['editBrandname'])) {
        $id = $mysql->execute("update _brandname set brandname='".$_POST['brandname']."' where md5(brandid)='".$_REQUEST['bid']."'");
        echo successMessage("Successfully Updated");
    }
    $brandname = $mysql->select("select * from _brandname where md5(brandid)='".$_REQUEST['bid']."'");
?>
    <form action="" method="post">
        <table cellpadding="5" cellspacing="0">
            <tr>
                <td><input type="text" placeholder="Enter Brand Name" name="brandname" value="<?php echo $brandname[0]['brandname'];?>" style="width:200px;"></td>
            </tr>
            <tr>
                <td><input type="submit" class="submitBtn" name="editBrandname" value="Edit Brand Name">
                &nbsp;&nbsp;<a class="listhref" href="dashboard.php?to=list_brands">List Brands</a>
                </td>
            </tr>
        </table>
    </form>
</div>
