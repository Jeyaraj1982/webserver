<div style="padding:10px;border:1px solid #eee;background:#fff">
    <div class="heading1">
        <span>Member Information</span>
    </div>
    <Br>
    <?php
        $member = $mysql->select("select * from _tbl_Members where MemberCode='".$_GET['MemberCode']."'");
    ?>
    <table style="width:100%">
        <tr><td>
    <table cellspacing="0" cellpadding="6" style="width:100%">
         <tr>
            <td style="width:100px;">Member Code</td>
            <td>
                <?php echo $member[0]['MemberCode'];?>
            </td>
        </tr>
        <tr>
            <td style="width:100px;">Plan</td>
            <td>
                <?php echo $member[0]['PlanString'];?>
            </td>
        </tr>
        <tr>
            <td style="width:100px;">First Name</td>
            <td>
                <?php echo $member[0]['FirstName'];?>
            </td>
        </tr>
        <tr>
            <td>Last Name</td>
            <td>
                <?php echo $member[0]['LastName'];?>
            </td>
        </tr>
        <tr>
            <td>Nick Name</td>
            <td>
                <?php echo $member[0]['NickName'];?>
            </td>
        </tr>
        <tr>
            <td>Date of Birth</td>
            <td>
                <?php echo putDate($member[0]['DateOfBirth']);?>
            </td>
        </tr>  
        <tr>
            <td>Mobile Number</td>
            <td>
                <?php echo $member[0]['MobileNumber'];?>
            </td>
        </tr> 
        <tr>
            <td>Email ID</td>
            <td>
                <?php echo $member[0]['EmailID'];?>
            </td>
        </tr>
        <tr>
            <td>Sex</td>
            <td>
                <?php echo $member[0]['Sex'];?>
            </td>
        </tr>
        <tr>
            <td>Login Name</td>
            <td>
                <?php echo $member[0]['MemberUserName'];?>
            </td>
        </tr>  
        <tr>
            <td>&nbsp;</td>
        </tr>
   
    </table>
    </td>
     <td style="vertical-align:top">
           
            <div style="padding:10px;border:1px solid #eee;background:#fff">
 <div class="heading1"><span>Login History</span></div>
 <Br>
<?php $loginEntries = $mysql->select("select * from _tbl_Members_LoginHistory where MemberID='".$member[0]['MemberID']."' order by MemberLoginID desc limit 0,5"); ?>
<table class= "listTable" style="width:100%" cellspacing="0">
    <tr style="background:#eee">
        <th style="text-align: center;padding:5px;width:150px">Date</th>
        <th style="text-align: left;width:120px;">IP address</th>
        <th style="text-align: left;width:120px">Country</th>
        <th style="text-align: left;">City</th>
    </tr>
    <?php if (sizeof($loginEntries)==0) { ?>
    <tr class="logip">
        <td colspan="4" style="text-align:center">No records found</td>
    </tr>
    <?php } else { ?>
        <?php foreach($loginEntries as $entry) {?>
        <tr class="logip">
            <td style="text-align: center;"><?php echo putDateTime($entry['LoginDateTime']);?></td>
            <td style="text-align: left;"><?php echo $entry['IPAddress'];?></td>
            <td style="text-align: left;"><?php echo $entry['CountryName'];?></td>
            <td style="text-align: left;"><?php echo $entry['CityName'];?></td>
        </tr>
        <?php } ?>
    <?php } ?>
</table>
<?php if (sizeof($loginEntries)>0) { ?>
<a class="hlink" href="">More ...</a>
<?php } ?>
</div> 
            <br>
             <div style="padding:10px;border:1px solid #eee;background:#fff">
<div class="heading1"><span>List of Members</span></div>
<Br>
<?php $loginEntries = $mysql->select("select * from _tbl_Members where  ReferedBy='".$member[0]['MemberID']."' order by MemberID desc limit 0,5"); ?>
  <table class= "listTable" style="width:100%" cellspacing="0">
<tbody><tr style="background:#eee">
    <th style="text-align: center;padding:5px;width:150px">Member Code</th>
    <th style="text-align: left;width:120px;">First Name</th>
    <th style="text-align: left;width:120px">Last Name</th>
    <th style="text-align: left;">Created On</th>
</tr>
<?php if (sizeof($loginEntries)==0) { ?>
    <tr class="logip">
        <td colspan="4" style="text-align:center">No records found</td>
    </tr>
<?php } else { ?>
<?php foreach($loginEntries as $entry) {?>
<tr class="logip">
    <td style="text-align: center;"><?php echo $entry['MemberCode'];?></td>
    <td style="text-align: left;"><?php echo $entry['FirstName'];?></td>
    <td style="text-align: left;"><?php echo $entry['LastName'];?></td>
    <td style="text-align: left;"><?php echo putDateTime($entry['CreatedOn']);?></td>
</tr>
<?php } ?>
<?php } ?>
</tbody>
</table>
 </div> 
 
           
            </td>
        </tr>
    </table>
</div>
<script>
  $( function() {
    $( "#datepicker" ).datepicker({
    dateFormat: "yy-mm-dd",
    
    });
    
  } );
  //yearRange: "<?php echo $Config['DOB_YEAR_START'].":".$Config['DOB_YEAR_END'];?>"
  //$( ".selector" ).datepicker( "setDate", "<?php echo $Config['DOB_YEAR_END']."-12-31";?>");
  </script> 
  
   