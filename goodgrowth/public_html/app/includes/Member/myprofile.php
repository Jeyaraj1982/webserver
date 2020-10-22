 <div style="padding:10px;border:1px solid #eee;background:#fff"><div class="heading1"><span>General Information</span></div>
 <Br>
 <?php
    if (isset($_POST['ChangeNickNameBtn'])) {
        if (strlen(trim($_POST['NickName']))>0) {
            $mysql->execute("update _tbl_Members set NickName='".$_POST['NickName']."' where MemberID='".$userData['MemberID']."'");
             echo SuccessMsg("Nick name successfully updated"); 
             unset($_POST);
        } else {
             echo ErrorMsg("Nick Name must have morethan 6 characters"); 
        }
    }
    $userData = $mysql->select("select * from  _tbl_Members where MemberID='".$userData['MemberID']."'");
    $userData = $userData[0];
 ?><form action="" method="post">
 <table cellspacing="0" cellpadding="6" style="width:100%">
    <tr>
        <td style="width:150px">First Name</td>
        <td><?php echo $userData['FirstName'];?></td>
    </tr>
    <tr>
        <td>Last Name</td>
        <td><?php echo $userData['LastName'];?></td>
    </tr>
     <tr>
        <td style="padding-bottom:0px;padding-top:0px">Nick Name</td>
        <td style="padding-bottom:0px;padding-top:0px;padding-left:3px">
            <input type="text" placeholder="Nick Name" name="NickName" style="background:#fff" value="<?php echo isset($_POST['NickName']) ? $_POST['NickName'] : $userData['NickName'];?>">
        </td>
    </tr>
     <tr>
        <td>Date of Birth</td>
        <td><?php echo putDate($userData['DateOfBirth']);?></td>
    </tr>
    <tr>
        <td>&nbsp;</td>
    </tr>
    <tr>
        <td colspan="2"><input type="submit" class="SubmitBtn" name="ChangeNickNameBtn" value="Save General Information"></td>
    </tr>
 </table>
    </form>
 </div> 
 
 <Br><Br>
 <div style="padding:10px;border:1px solid #eee;background:#fff">
 <div class="heading1"><span>Address Information</span></div>
 <Br>
 <table class="tbl0">
    <tbody>
    <tr>
        <td style="width:80px">Address</td>
        <td>:&nbsp;<?php echo $userData['Address'];?></td>
    </tr>
    <tr>
        <td>City</td>
        <td>:&nbsp;<?php echo $userData['CityName'];?></td>
    </tr>
    <tr>
        <td>District</td>
        <td>:&nbsp;<?php echo $userData['DistrictName'];?></td>
    </tr>
    <tr>
        <td>Region</td>
        <td>:&nbsp;<?php echo $userData['StateName'];?></td>
    </tr>    
    <tr>
        <td>Country</td>
        <td>:&nbsp;<?php echo $userData['CountryName'];?></td>
    </tr>
    <tr>
        <td>Postal Code</td>
        <td>:&nbsp;<?php echo $userData['PinCode'];?></td>
    </tr>
</tbody></table>
 </div>
 <br><br>
  <div style="padding:10px;border:1px solid #eee;background:#fff">
 <div class="heading1"><span>Sponsor's Information</span></div>
 <Br>
 <?php
 $sponsor = $mysql->select("select * from _tbl_Members where MemberID='".$userData['ReferedBy']."'");
 ?>
 <table style="" cellpadding="5" cellspacing="0">
        <tr>
            <td style="width:90px">
                <img style="height:90px;width:90px">
            </td>
            <td style="width:400px;vertical-align:top">
            <table cellpadding="5" cellspacing="0">
        <tr>
            <td>Sponsor ID</td>
            <td>:&nbsp;<?php echo $sponsor[0]['MemberCode'];?></td>
        </tr>
        <tr>
            <td>Name</td>
            <td>:&nbsp;<?php echo $sponsor[0]['FirstName']." ".$sponsor[0]['LastName'];?></td>
        </tr>
        <tr>
            <td>Nick Name</td>
            <td>:&nbsp;<?php echo $sponsor[0]['NickName'];?></td>
        </tr>
    </table>
            </td>
        </tr>
    </table>
 </div>
 <br><br><Br>