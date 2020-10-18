<!-- http://www.indiastudychannel.com/India/states/Index.aspx -->
<h2 style="color: #6AA0FA">&nbsp;&nbsp;IVP - Membership Form</h2> <br>
<?php 
if (isset($_POST['submitbtn']) && ($_POST['submitbtn']=="Join To IndiansVictoryParty")) {
  
    $data = array("id"=>"Null",
          "personname"=>$_POST['personname'],
           "fname"=>$_POST['fname'],
           "age"=>$_POST['age'],
           "sex"=>$_POST['sex'],
           "postaladdress"=>$_POST['postaladdress'],
           "statename"=>$_POST['statename'],
           "dname"=>$_POST['dname'],
           "pname"=>$_POST['pname'],
           "mobileno"=>$_POST['mobileno'],
           "emailid"=>$_POST['emailid'],
           "aboutme"=>$_POST['aboutme'],
           "joinedon"=>date("Y-m-d H:i:s"));

           if ($mysql->insert("_members",$data)>1) {
    
               mail("Jeyaraj_123@yahoo.com","IVP - MEMBERS",implode("<br>",$data),"From : ivp@indiansvictoryparty.com");
           //    mail("Shalinmedicals","IVP - MEMBERS",implode("<br>",$data),"From : ivp@indiansvictoryparty.com");
               mail($_POST['emailid'],"Thanks For Registered with Us",implode("<br>",$data),"From : ivp@indiansvictoryparty.com");
               echo "Thakns For Registered with Us. We will contact very soon.<br>Thanks<br>IVP Team";
               echo "<style>.regForm{display:none}</style>";
           }
           
                                                      
    
}

?>
<div id='regForm' class="regForm">
<form action="" method="post">
<table style="font-family:arial;font-size:12px;" cellpadding="5" cellspacing="5" width="100%">
<tr>
    <td width="200">Name</td>
    <td><input type='text' style="width: 420px;" name="personname"></td>
</tr>
<tr>
    <td>Father / Husband Name</td>
    <td><input type='text' style="width: 420px;" name='fname'></td>
</tr>
<tr>
    <td>Age</td>
    <td><input type='text' style="width: 50px;" maxlength="2" name="age">
      &nbsp;&nbsp;&nbsp;&nbsp;Sex&nbsp;&nbsp;&nbsp;&nbsp;
        <select name='sex'>
            <option>Male</option>
            <option>Female</option>
        </select>
    </td>
</tr>
<tr>
    <td valign="top">Communication Address</td>
    <td><textarea style="height:100px;width: 420px;" name='postaladdress'></textarea></td>
</tr>
<tr>
    <td>State Name</td>
    <?php
    $sname = $mysql->select("Select * from _statenames order by statenames")
?>
    <td>
    <select name='statename'>
        <option value="" style="width:390px;">Select State Name</option>
        <?php foreach($sname as $s) { ?>
            <option value='<?php $s['id'];?>'><?php echo $s['statenames'];?></option>
        <?php } ?>
        
    </select>
    </td>
</tr>
<tr>
    <td>District Name</td>
    <td><input type='text' style="width: 420px;" name='dname'></td>
</tr>
<tr>
    <td>Panchayat Name</td>
    <td><input type='text' style="width: 420px;" name='pname'></td>
</tr>
<tr>
    <td>Mobile No</td>
    <td><input type='text' style="width: 420px;" name='mobileno'></td>
</tr>
<tr>
    <td>E-Mail Address</td>
    <td><input type='text' style="width: 420px;" name='emailid'></td>
</tr>
<tr>
    <td valign="top">About Me</td>
    <td><textarea style="height:100px;width: 420px;" name="aboutme"></textarea></td>        
</tr>
<tr>
    <td>&nbsp;</td>
    <td><input type='submit' value="Join To IndiansVictoryParty" name='submitbtn'></td>
</tr>










</table>
<br><br>
</form>
</div>