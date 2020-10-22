<div style="padding:10px;border:1px solid #eee;background:#fff">
<div class="heading1"><span>Planwise Manage Members</span></div>
<Br>
<table class= "listTable" style="width:100%" cellspacing="0">
    <tbody>
        <tr style="background:#eee">
            <th style="text-align: center;padding:5px;width:70px">Member Code</th>
            <th style="text-align: left;width:130px">First Name</th>
            <th style="text-align: left;width:130px">Last Name</th>
            <th style="text-align: left;width:120px;">Nick Name</th>
            <th style="text-align: left;width:80px;">Mobile Number</th>
            <th style="text-align: left;width:90px;">Created On</th>
            <th style="text-align: left;width:50px">&nbsp;</th>
        </tr>
        <tr>
            <td colspan="7">
                <div class="heading1"><span>G3</span></div>
            </td>
        </tr>
        <?php $loginEntries = $mysql->select("select * from _tbl_Members where ReferedBy>0 and G3Completed='1' order by MemberID desc"); ?>
        <?php foreach($loginEntries as $entry) {?>
        <tr class="logip">
            <td style="text-align: center;"><?php echo $entry['MemberCode'];?></td>
            <td style="text-align: left;"><?php echo $entry['FirstName'];?></td>
            <td style="text-align: left;"><?php echo $entry['LastName'];?></td>
            <td style="text-align: left;"><?php echo $entry['NickName'];?></td>
            <td style="text-align: left;"><?php echo $entry['MobileNumber'];?></td>
            <td style="text-align: left;"><?php echo putDateTime($entry['CreatedOn']);?></td>
            <td style="text-align: left;"><a class="hlink" href="dashboard.php?action=MemberView&MemberCode=<?php echo $entry['MemberCode']; ?>">View</a></td>
        </tr>
        <?php } ?>
        <?php if (sizeof($loginEntries)==0) { ?>
        <tr>
            <td colspan="7" style="text-align: center;">No Records found</td>
        </tr>
        <?php } ?>
        <tr>
            <td colspan="7">
                <div class="heading1"><span>GoldWay</span></div>
            </td>
        </tr>
        <?php $loginEntries = $mysql->select("select * from _tbl_Members where ReferedBy>0 and GoodwayCompleted='1' order by MemberID desc");  ?>
        <?php foreach($loginEntries as $entry) {?>
        <tr class="logip">
            <td style="text-align: center;"><?php echo $entry['MemberCode'];?></td>
            <td style="text-align: left;"><?php echo $entry['FirstName'];?></td>
            <td style="text-align: left;"><?php echo $entry['LastName'];?></td>
            <td style="text-align: left;"><?php echo $entry['NickName'];?></td>
            <td style="text-align: left;"><?php echo $entry['MobileNumber'];?></td>
            <td style="text-align: left;"><?php echo putDateTime($entry['CreatedOn']);?></td>
            <td style="text-align: left;"><a class="hlink" href="dashboard.php?action=MemberView&MemberCode=<?php echo $entry['MemberCode']; ?>">View</a></td>
        </tr>
        <?php } ?>
        <?php if (sizeof($loginEntries)==0) { ?>
        <tr>
            <td colspan="7" style="text-align: center;">No Records found</td>
        </tr>
        <?php } ?>
        <tr>
            <td colspan="7">
                <div class="heading1"><span>MYGOLD</span></div>
            </td>
        </tr> 
        <tr>
            <td colspan="7" style="text-align: center;">No Records found</td>
        </tr>
        
        <tr>
            <td colspan="7">
                <div class="heading1"><span>SUPER GOLD</span></div>
            </td>
        </tr> 
        <tr>
            <td colspan="7" style="text-align: center;">No Records found</td>
        </tr>
        
        <tr>
            <td colspan="7">
                <div class="heading1"><span>GOLDEAGLE</span></div>
            </td>
        </tr> 
        <tr>
            <td colspan="7" style="text-align: center;">No Records found</td>
        </tr>
        
        <tr>
            <td colspan="7">
                <div class="heading1"><span>GOLDFINISH</span></div>
            </td>
        </tr> 
        <tr>
            <td colspan="7" style="text-align: center;">No Records found</td>
        </tr>
        
</tbody>
</table>
 </div> 

