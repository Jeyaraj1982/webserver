<h2>New Brand Name</h2>
<div style="padding:20px">
<?php
    if (isset($_POST['addBrandname'])) {
        if ($mysql->insert("_brandname",array("brandname"=>$_POST['brandname'],"addedon"=>date("Y-m-d H:i:s")))>0) {
            echo successMessage("Successfully Added Brand Name");
        } else {
            echo errorMessage("Error Adding Brand Name. Please contact technical team");
        }
    }
?>
<form action="" method="post">
    <table cellpadding="5" cellspacing="0">
        <tr>
            <td><input type="text" placeholder="Enter Brand Name" name="brandname" style="width:200px;"></td>
        </tr>
        <tr>
            <td><input type="submit" class="submitBtn" name="addBrandname" value="Add Brand Name">
            &nbsp;&nbsp;<a class="listhref" href="dashboard.php?to=list_brands">List Brands</a>
            </td>
        </tr>
    </table>
</form>
</div>