<?php
include_once("header.php");
        
        $data = $mysql->select("select * from _senderid where senderid='".$_POST['senderid']."'");

      if(isset($_POST['isadd'])){
        
        if(sizeof($data)==0){  
          if(strlen($_POST['senderid'])>=6) {
             if(ctype_alpha($_POST['senderid'])) {
          $ins_array = array("userid" =>$_POST['username'],
                             "senderid" =>$_POST['senderid'],
                             "addedon" =>date("Y-m-d H:i:s"));
            $sid = $mysql->insert("_senderid",$ins_array);
           if($sid>0){
               echo "Successfully Added";
           }else{
               echo "Error Adding Data";
           }
          }else{
              echo "<span style='color:red;'>Enter Sender's ID only Alphabets</span>";
          }
          }else{
              echo "<span style='color:red;'>Enter Sender's ID is maximum 6 Cahracters</span>";
          } 
      }else{
          echo "<span style='color:red;'>Sender's ID is Already Exits</span>";
      }
      }  

$user = $mysql->select("select * from _user where userunder=".$_SESSION['user']['id']);    
?>

<form method="post" name="sendersfrm" id="sendersfrm">
<input type="hidden" value="1" name="isadd" id="isadd">
<table cellpadding="5" cellspacing="0" style="font-family:arial;font-size:13px;color:#555;">
    <tr>
        <td>User</td>
        <td>
            <select name="username" id="username"  style="width:200px;border:1px solid #ccc;padding:5px;">
               <?php foreach($user as $u) { ?>
               <option value="<?php echo $u['id']; ?>"><?php echo $u['username']; ?></option>
               <?php } ?>
            </select>
        </td>
    </tr>
    <tr>
        <td>Sender's ID</td>
        <td><input type="text" name="senderid" id="senderid" autocomplete="off" placeholder="Enter your Sender's ID" style="width:200px;border:1px solid #ccc;padding:5px;"></td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td align="right"><input type="submit" value="Send Approve" name="addbtn" id="addbtn" class="myButton"></td>
    </tr>
</table>
</form>