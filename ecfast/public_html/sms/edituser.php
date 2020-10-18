<?php 
  include_once("header.php");
  
  if(isset($_POST['updatebtn'])) {
      
      $data = $mysql->select("select * from _user where id<>".$_POST['id']." and  phonenumber='".$_POST['mobilenumber']."'");
      
      $username = $mysql->select("select * from _user where id<>".$_POST['id']." and  username='".$_POST['username']."'");
      $email = $mysql->select("select * from _user where id<>".$_POST['id']." and  emailid='".$_POST['emailid']."'");
      
      if(sizeof($data)==0) {
        if(sizeof($email)==0) {
          if(sizeof($username)==0) {
            $mysql->execute("update _user set personname='".$_POST['personname']."',
                                        phonenumber ='".$_POST['mobilenumber']."',
                                        emailid ='".$_POST['emailid']."',
                                        username ='".$_POST['username']."',
                                        password ='".$_POST['password']."',
                                        loginpassword ='".$_POST['loginpassword']."',
                                        isenableapi='".(($_POST['check1']=="on") ? "1" : "0")."',
                                        isenablepanel='".(($_POST['check2']=="on") ? "1" : "0")."',
                                        isactive='".(($_POST['check3']=="on") ? "1" : "0")."'
                                        where id=".$_REQUEST['id']);
                                        
              echo "Successfully Updated";                 
              }else{
              echo "<span style='color:red;'>User Name is Already Exits</span>";
              }
              }else{
              echo "<span style='color:red;'>Email ID is Already Exits</span>";
              }
              }else{
              echo "<span style='color:red;'>Mobile Number ".$_POST['mobilenumber']." is Already Exits</span>";
              }
          }               
  
  $user = $mysql->select("select * from _user where id=".$_REQUEST['id']);
  $senderids = $mysql->select("select * from _senderid where userid=".$user[0]['id']);
?>

<form method="post" name="edituserfrm" id="edituserfrm">
<input type="hidden" value="1" name="isadd" id="isadd">
<input type="hidden" value="<?php echo $_REQUEST['id']; ?>" name="id" id="id">
<table cellpadding="5" cellspacing="0" style="font-family:arial;font-size:13px;color:#555;">
    <tr>
        <td>Person Name</td>
        <td><input type="text" name="personname" id="personname" autocomplete="off" value="<?php echo $user[0]['personname']; ?>" style="width:200px;border:1px solid #ccc;padding:5px;"></td>
    </tr>
    <tr>
        <td>Mobile Number</td>
        <td><input type="text" name="mobilenumber" id="mobilenumber" autocomplete="off" value="<?php echo $user[0]['phonenumber']; ?>" style="width:200px;border:1px solid #ccc;padding:5px;"></td>
    </tr>
    <tr>
        <td>Email ID</td>
        <td><input type="text" name="emailid" id="emailid" autocomplete="off" value="<?php echo $user[0]['emailid']; ?>" style="width:200px;border:1px solid #ccc;padding:5px;"></td>
    </tr>
       <tr>
        <td>Login Password</td>
        <td><input type="text" name="loginpassword" id="loginpassword" autocomplete="off" value="<?php echo $user[0]['loginpassword']; ?>" style="width:200px;border:1px solid #ccc;padding:5px;"></td>
    </tr>
    <tr>
        <td>API User Name</td>
        <td><input type="text" name="username" id="username" autocomplete="off" value="<?php echo $user[0]['username']; ?>" style="width:200px;border:1px solid #ccc;padding:5px;"></td>
    </tr>
    <tr>
        <td>API Password</td>
        <td><input type="text" name="password" id="password" autocomplete="off" value="<?php echo $user[0]['password']; ?>" style="width:200px;border:1px solid #ccc;padding:5px;"></td>
    </tr>
    <tr>
        <td></td>
        <td>
            <?php if($user[0]['isenableapi'] == 1) {?>
            <input type="checkbox" name="check1" id="check1"  checked="checked" >&nbsp;API&nbsp;&nbsp;&nbsp;&nbsp;
            <?php }else{ ?>
            <input type="checkbox" name="check1" id="check1">&nbsp;API&nbsp;&nbsp;&nbsp;&nbsp;
            <?php } ?>
            
            <?php if($user[0]['isenablepanel'] == 1) { ?>
            <input type="checkbox" name="check2" id="check2"   checked="checked">&nbsp;Panel&nbsp;&nbsp;&nbsp;&nbsp;
            <?php }else{ ?>
            <input type="checkbox" name="check2" id="check2">&nbsp;Panel&nbsp;&nbsp;&nbsp;&nbsp;
            <?php } ?>
            <?php if($user[0]['isactive'] == 1) { ?>
            <input type="checkbox" name="check3" id="check3"   checked="checked">&nbsp;Is Active
            <?php }else{ ?>
            <input type="checkbox" name="check3" id="check3">&nbsp;Is Active
            <?php } ?>
        </td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td align="right"><input type="submit" value="Update" name="updatebtn" id="updatebtn" class="myButton"></td>
    </tr>
    <tr>
        <td></td>
        <td><div id="edituser_result"></div></td>
    </tr>
</table>
</form>

<table cellpadding="5" cellspacing="0" border="1" style="font-family:arial;font-size:13px;color:#555;">
        <tr>
            <td>Sender's ID</td>
            <td>Created On</td>
        </tr>
        <?php foreach($senderids as $id){ ?>
        <?php if($id['isapproved'] ==0)  { ?>
        <tr>
            <td><?php echo "<span style='color:red;'>".$id['senderid'];"</span>" ?></td>
            <td><?php echo $id['addedon']; ?></td>
        </tr>
        <?php }else{ ?>
        <tr>
            <td><?php echo $id['senderid']; ?></td>
            <td><?php echo $id['addedon']; ?></td>
        </tr>
        <?php } ?>
        <?php } ?>
    
</table>
