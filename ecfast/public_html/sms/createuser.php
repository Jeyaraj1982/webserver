<?php 
  include_once("header.php");
  
  if(isset($_POST['addbtn'])){
      
      $data = $mysql->select("select * from _user where phonenumber='".$_POST['mobilenumber']."'");
      $username = $mysql->select("select * from _user where username='".$_POST['username']."'");
      $email = $mysql->select("select * from _user where emailid='".$_POST['emailid']."'");
   
      if(sizeof($data)==0) {
        if(sizeof($email)==0) {
          if(sizeof($username)==0) {
      $ins_array=array("personname" =>$_POST['personname'],
                       "phonenumber" =>$_POST['mobilenumber'],
                       "emailid" =>$_POST['emailid'],
                       "username" =>$_POST['username'],
                       "password" =>$_POST['password'],
                       "createdon"=>date("Y-m-d H:i:s"),
                       "userunder" =>$_SESSION['user']['id'],
                       "isenableapi"=>(($_POST['check1']=="on") ? "1" : "0"),
                       "isenablepanel"=>(($_POST['check2']=="on") ? "1" : "0"),
                       "isactive"=>"1",
                       "isuser" =>"1",
                       "isreseller" =>"0");
                       
      $id=$mysql->insert("_user",$ins_array);
      if($id>0){
          echo  "Successfully Added";
      }else{
          echo "Error Adding Data";
          }
      }else{
          echo "<span style='color:red;'>User Name is Already Exits</span>";
      }
      }else{
          echo "<span style='color:red;'>Email ID is Already Exits</span>";
      }
      }else{
          echo "<span style='color:red;'>Mobile Number is Already Exits</span>";
      }
      }
  
?>

<form method="post" name="userfrm" id="userfrm">
<input type="hidden" value="1" name="isadd" id="isadd">
<table cellpadding="5" cellspacing="0" style="font-family:arial;font-size:13px;color:#555;">
    <tr>
        <td>Person Name</td>
        <td><input type="text" name="personname" id="personname" autocomplete="off" placeholder="Enter Person Name" style="width:200px;border:1px solid #ccc;padding:5px;"></td>
    </tr>
    <tr>
        <td>Mobile Number</td>
        <td><input type="text" name="mobilenumber" id="mobilenumber" autocomplete="off" placeholder="Enter Mobile Number" style="width:200px;border:1px solid #ccc;padding:5px;"></td>
    </tr>
    <tr>
        <td>Email ID</td>
        <td><input type="text" name="emailid" id="emailid" autocomplete="off" placeholder="Enter Email ID" style="width:200px;border:1px solid #ccc;padding:5px;"></td>
    </tr>
    <tr>
        <td>User Name</td>
        <td><input type="text" name="username" id="username" autocomplete="off" placeholder="Enter User Name" style="width:200px;border:1px solid #ccc;padding:5px;"></td>
    </tr>
    <tr>
        <td>Password</td>
        <td><input type="password" name="password" id="password" autocomplete="off" placeholder="Enter Password" style="width:200px;border:1px solid #ccc;padding:5px;"></td>
    </tr>
    <tr>
        <td></td>
        <td>
            <input type="checkbox" name="check1" id="check1">&nbsp;API&nbsp;&nbsp;&nbsp;&nbsp;
            <input type="checkbox" name="check2" id="check2">&nbsp;Panel
        </td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td align="right"><input type="submit" value="Add" name="addbtn" id="addbtn" class="myButton"></td>
    </tr>
    <tr>
        <td></td>
        <td><div id="user_result"></div></td>
    </tr>
</table>
</form>
