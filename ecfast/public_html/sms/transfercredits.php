<?php 
    include_once("header.php");
    
    if(isset($_POST['isadd'])) { 
        
        if ($_POST['credits']>0 && $_POST['credits']<checkCredits($_SESSION['user']['id']) ){
        
        $ins_array = array("userid"     =>$_SESSION['user']['id'],
                           "credits"    =>"0",
                           "debits"    =>$_POST['credits'],
                           "transferfrom"    =>$_POST['username'],
                           "creditsfor"    =>"Mobile SMS",
                           "availablebalance"    =>checkCredits($_SESSION['user']['id'])-$_POST['credits'],
                           "dateoftransfer"    =>date("Y-m-d H:i:s"),
                           "particulars"=>"SMS Credits Transfer");
            $id=$mysql->insert("_smscredits",$ins_array);
            
         
       
               $ins_array = array("userid"     =>$_POST['username'],
                           "credits"    =>$_POST['credits'],
                           "debits"    =>"0",
                           "transferfrom"    =>$_SESSION['user']['id'],
                           "creditsfor"    =>"Mobile SMS",
                           "availablebalance"    =>checkCredits($_POST['username'])+$_POST['credits'],
                           "dateoftransfer"    =>date("Y-m-d H:i:s"),
                           "particulars"=>"SMS Credits Transfer");
         
            $id=$mysql->insert("_smscredits",$ins_array);    
            
         
               
               echo "Successfully Added";
       } else {
           echo "Not enough credits to share.";
       }
        
    }

$user = $mysql->select("select * from _user where userunder=".$_SESSION['user']['id']);    
?>

<form method="post" name="transfercreditsfrm" id="transfercreditsfrm">
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
        <td>Credits</td>
        <td><input type="text" name="credits" id="credits" autocomplete="off" placeholder="Enter your Credits" style="width:200px;border:1px solid #ccc;padding:5px;"></td>
    </tr>
    <tr>
        <td>&nbsp;</td>
        <td align="right"><input type="submit" value="Tranfer Credits" name="addbtn" id="addbtn" class="myButton"></td>
    </tr>
</table>
</form>