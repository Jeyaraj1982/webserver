<?php
       include_once("header.php"); 
 ?> 
  <h3>My Profile</h3>
  <?php
      if (isset($_POST['updateBtn'])) {
          $mysql->execute("update _user set password='".$_POST['apipassword']."', loginpassword='".$_POST['loginpassword']."' where id=".$_SESSION['user']['id']);
          echo "<span style='color:blue;'>Successfully updated</span>";
      }
      $us = $mysql->select("select * from _user where id=".$_SESSION['user']['id']);
  ?>
  <form action="" method="post">
  <table>
    <tr>
        <td colspan="2" style="padding-top:10px;padding-bottom:10px">
            <div style="border-bottom:1px solid #999;padding-bottom:5px;font-weight:Bold;font-size:13px">API Details</div>
        </td>
    </tr>
    <tr>
        <td>API User Name</td>
        <td><input type="text" readonly="readonly" value="<?php echo $us[0]['username'];?>" style="background:#f1f1f1;"></td>
    </tr>
    <tr>
        <td>API Password</td>
        <td><input type="text" name="apipassword" value="<?php echo $us[0]['password'];?>"></td>
    </tr>
    <tr>
        <td colspan="2" style="padding-top:10px;padding-bottom:10px">
            <div style="border-bottom:1px solid #999;padding-bottom:5px;font-weight:Bold;font-size:13px">Profile Details</div>
        </td>
    </tr>
    <tr>
        <td>Name</td>
        <td><input type="text" readonly="readonly" value="<?php echo $us[0]['personname'];?>" style="background:#f1f1f1;"></td>
    </tr>
    <tr>
        <td>Mobile Number</td>
        <td><input type="text" readonly="readonly" value="<?php echo $us[0]['phonenumber'];?>" style="background:#f1f1f1;"></td>
    </tr>
    <tr>
        <td>Email ID</td>
        <td><input type="text" readonly="readonly" value="<?php echo $us[0]['emailid'];?>" style="background:#f1f1f1;"></td>
    </tr>
    <tr>
        <td>Date of Created</td>
        <td><input type="text" readonly="readonly" value="<?php echo $us[0]['createdon'];?>" style="background:#f1f1f1;"></td>
    </tr>
    <tr>
        <td>Web Login Password</td>
        <td><input type="text" name="loginpassword" value="<?php echo $us[0]['loginpassword'];?>"></td>
    </tr>
    <tr>
        <td colspan="2" style="padding-top:10px;padding-bottom:10px"><input type="submit" value="Update Profile" class="myButton" name="updateBtn"></td>
    </tr>
  </table>
  </form>
 <?php
       include_once("footer.php"); 
 ?>