     <?php $data = $mysql->select("select * from _clients where id=".$_POST['clientid']); ?>     
<form action="updateclient" method="post">
<?php
$isvisible=true;
if ( $_SESSION['user']['role']=="erode" ) {
    $isvisible = false;
}

if ( $_SESSION['user']['role']=="12district" ) {
    $isvisible = false;
}

if ($_SESSION['user']['role']=="staff") {
    $isvisible = false;
}

if ($isvisible) {
?>
    <table cellpadding="0" cellspacing="0" width="100%">
        <tr>
            <td><h2 style="text-align: left;font-family: arial;">Edit Client</h2>     </td>
            <td align="right">
                <input type="submit" value="Update" name="update">&nbsp;&nbsp;
                <?php if($data[0]['isactive']==1){?>
                <input type="submit" value="Active" disabled="disabled">&nbsp;&nbsp;
                <?php } else {?>
                <input type="submit" value="Active" name="active">&nbsp;&nbsp;
                <?php } ?>
                
               <?php if($data[0]['isblock']==1){?>    
                <input type="submit" value="UnBlock" name="unblock">&nbsp;&nbsp;
                <?php } else {?>
                 <input type="submit" value="Block" name="block">&nbsp;&nbsp;
                <?php } ?>
            </td>
        </tr>
    </table>
 <?php } ?>    
              
    <div style="border-bottom:1px solid #D4E3F6;"></div><br>
        <input type="hidden" name="clientid" value="<?php echo $_POST['clientid'];?>">
        <table cellpadding='5' cellspacing='5' style='font-size:12px;' width="100%">
            <tr><td>Account No</td><td>:</td><td><?php echo $data[0]['id'];?></td></tr>
            <tr><td width="100">First Name </td><td>:</td><td><input name="firstname" type="text" value="<?php echo $data[0]['firstname'];?>" style="width: 100%;padding:2px;border:1px solid  #D4E3F6;"></td></tr>
            <tr><td>Last Name </td><td>:</td><td><input  name="lastname"type="text" value="<?php echo $data[0]['lastname']; ?>" style="width: 100%;padding:2px;border:1px solid  #D4E3F6;"></td></tr>
            <tr><td>Email Id</td><td>:</td><td><?php echo $data[0]['emailid']; ?></td></tr>
            <tr><td>Date Of Birth</td><td>:</td><td><input type="text" name="dateofbirth" value="<?php echo $data[0]['dateofbirth']; ?>" style="width: 100%;padding:2px;border:1px solid  #D4E3F6;"></td></tr>
            <tr><td>Sex</td><td>:</td><td>
            
 
                <select name="sex" style="padding:2px;border:1px solid  #D4E3F6;">
                    <option value="male" <?php echo (($data[0]['sex']=='male') ? 'selected=selected' : '');?>>Male</option>
                    <option value="female" <?php echo (($data[0]['sex']=='female') ? 'selected=selected' : '');?>>FeMale</option>
                </select>
            
            </td></tr>
            <tr><td>Door No</td><td>:</td><td><input type="text" value="<?php echo $data[0]['doorno']; ?>" style="width: 100%;padding:2px;border:1px solid  #D4E3F6;"></td></tr>
            <tr><td>Building Name</td><td>:</td><td><input type="text" value="<?php echo $data[0]['buildingname']; ?>" style="width: 100%;padding:2px;border:1px solid  #D4E3F6;"></td></tr>
            <tr><td>Street Name</td><td>:</td><td><input type="text" value="<?php echo $data[0]['streetname']; ?>" style="width: 100%;padding:2px;border:1px solid  #D4E3F6;"></td></tr>
            <tr><td>City</td><td>:</td><td><input type="text" value="<?php echo $data[0]['city']; ?>" style="width: 100%;padding:2px;border:1px solid  #D4E3F6;"></td></tr>
            <tr><td>State</td><td>:</td><td><input type="text" value="<?php echo $data[0]['state']; ?>" style="width: 100%;padding:2px;border:1px solid  #D4E3F6;"></td></tr>
            <tr><td>Pincode</td><td>:</td><td><input type="text" value="<?php echo $data[0]['pincode']; ?>" style="width: 100%;padding:2px;border:1px solid  #D4E3F6;"></td></tr>
            <tr><td>Plan</td><td>:</td><td>
                                           <select name="plan" style="padding:2px;border:1px solid  #D4E3F6;width: 50;">
                    <option value="1" <?php echo (($data[0]['plan']=='1') ? 'selected=selected' : '');?>>1</option>
                    <option value="2" <?php echo (($data[0]['plan']=='2') ? 'selected=selected' : '');?>>2</option>
                    <option value="3" <?php echo (($data[0]['plan']=='3') ? 'selected=selected' : '');?>>3</option>  
                    <option value="4" <?php echo (($data[0]['plan']=='4') ? 'selected=selected' : '');?>>4</option>  
                    <option value="5" <?php echo (($data[0]['plan']=='5') ? 'selected=selected' : '');?>>5</option>  
                </select>
            
            </td></tr>
            <tr><td>Mobile No</td><td>:</td><td><input type="text" name="mobileno" value="<?php echo $data[0]['mobileno']; ?>" style="width: 100%;padding:2px;border:1px solid  #D4E3F6;"></td></tr>
            <tr><td>Referring</td><td>:</td><td><?php echo $data[0]['referringby']; ?></td></tr>
            <tr><td>Password</td><td>:</td><td><input type="text" name="password" value="<?php echo $data[0]['password']; ?>" style="width: 100%;padding:2px;border:1px solid  #D4E3F6;"></td></tr>
            <tr><td>Userlink</td><td>:</td><td>http://www.earnmoneytech.com/<?php echo $data[0]['userlink']; ?></td></tr>
            <tr><td>Activation On</td><td>:</td><td><?php echo $data[0]['activatedon']; ?></td></tr> 
            <tr><td>Country</td><td>:</td><td><?php echo $data[0]['country']; ?></td></tr> 
            <tr><td>Registered user</td><td>:</td><td>
            <?php
     $rusers = $mysql->select("select * from _clients where isactive=1 and referringby=".$data[0]['id']);    
     echo sizeof($rusers);
?>
            </td></tr> 
            </table>
                    
             <?php if ($_SESSION['user']['role']!="staff") { ?>   
        <div style="border:1px solid #ccc;height:300px;overflow:auto">
          <?php $data = $mysql->select("select * from _clients where referringby=".$_POST['clientid']." order by postedon desc "); ?> 
          <table style="font-size:12px;font-family:arial;" cellpadding="5" width="100%" cellspacing="0">
            <tr bgcolor='#ccc' style="font-weight:bold;text-align:center">
                <td>Date</td>
                <td>Name</td>
                <td>Place</td>
                <td>Phone No</td>
                <td>Email id</td>
            </tr>      
            <?php foreach($data as $d) {?>
                <tr bgcolor="<?php echo ($d['isactive']==1) ? "#CFFFCD" : "white";?>">
                    <td><?php echo $d['postedon'];?></td>
                    <td><?php echo $d['firstname'];?></td>
                    <td><?php echo $d['city'];?></td>
                    <td><?php echo $d['mobileno'];?></td>
                    <td><?php echo $d['emailid'];?></td>
                </tr>
            <?php } ?>
          </table>            
        
        </div>
    <br><div style="border-bottom:1px solid #D4E3F6;"></div>
    <?php
    if ($_SESSION['user']['role']=="admin") {
        if (isset($_POST['forid'])){
           
            $forid=$_POST['forid'];
        $sql= "delete from _visitor where id in (";
        foreach($forid as $f) {
            $sql.=$f.",";
        }
        $sql = substr($sql,0,strlen($sql)-1);
        $sql .= ")";
        
       
       echo  "<div style='border:1px solid #e5e5e5;margin:10px;padding;10px;color:red;font-weight:bold;font-family:arial;font-size:12px;'>".$mysql->execute($sql)." records deleted successfully</div>";
        
    }
    }
?>
    <?php $data = $mysql->select("select * from _visitor where userid=".$_POST['clientid']." order by viewon desc "); ?> 
        <h4>Visitor's History [<?php echo sizeof($data);?>]</h4>
     <div style="border:1px solid #ccc;height:300px;overflow:auto">
     <?php  if ($_SESSION['user']['role']=="admin") {  ?>
          <form action="" method="post">
            <input type='hidden' value="<?php echo $_POST['clientid'];?>" name="clientid">
            <input type="submit" value="Delete">
            <?php } ?>
          <table style="font-size:12px;font-family:arial;" width="100%" cellpadding="5" cellspacing="0">
            <tr bgcolor='#ccc' style="font-weight:bold;text-align:center">
                <td>&nbsp;</td>
                <td>Date Time</td>
                <td>Browser</td>                 
                <td>IP Address</td>
                <td>Contry Name</td>
                <td>Region Name</td>
                <td>City Name</td>
                <td>Latitude</td>
                <td>Longitude</td>
            </tr>      
            
            <?php foreach($data as $d) {?>
                <tr>
                    <td>
                    <?php  if ($_SESSION['user']['role']=="admin") {  ?>
                    <input type='checkbox' name='forid[]' value="<?php echo $d['id'];?>"> 
                    <?php } else { ?>
                               &nbsp;
                    <?php }  ?>
                    </td>
                    <td><?php echo $d['viewon'];?></td>
                    <td><?php echo $d['browser'];?></td> 
                    <td><?php echo $d['ip'];?></td>
                    <td><?php echo $d['country'];?></td>
                    <td><?php echo $d['regionname'];?></td>
                    <td><?php echo $d['cityname'];?></td>
                    <td><?php echo $d['latitude'];?></td> 
                    <td><?php echo $d['longitude'];?></td> 
                </tr>
            <?php } ?>
          </table>            
        </form>
        </div>
        <?php } ?>
<form action="updateclient" method="post">
        <h2>Consulting Details</h2>
        <?php if ($userdata[0]['isactive']!=1) {?>
        <table cellpadding="10" cellspacing="0" bgcolor="#f1f1f1" style="font-family:arial">
            <tr>
                <td>Reason :
                <textarea cols="71" rows="3" name="reason"></textarea>
                </td>
                <td><select name="status">
                    <option value='Contact Later'>Contact Later</option>
                    <option value="Donot Contact">Don't Contact</option>
                    </select> <Br>
                          <input type="submit" name="addComment" value="Add Comment">
                </td>
            </tr>
        </table>
        <?php } ?>
        <br>
            <div style="border:1px solid #ccc;height:300px;overflow:auto">
          <?php $data = $mysql->select("select * from _comments where clientid=".$_POST['clientid']." order by postedon desc "); ?> 
          <table style="font-size:12px;font-family:arial;" cellpadding="5" width="100%" cellspacing="0">
            <tr bgcolor='#ccc' style="font-weight:bold;text-align:center">
                <td width="120">Date</td>
                <td>Reason</td>
                <td width="80">Is Posible</td>
                <td width="80">Stored By</td>
            </tr>      
            <?php foreach($data as $d) {?>
                <tr bgcolor="<?php echo ($d['isactive']==1) ? "#CFFFCD" : "white";?>">
                    <td><?php echo $d['postedon'];?></td>
                    <td><?php echo $d['reason'];?></td>
                    <td><?php echo $d['status'];?></td>
                    <td><?php echo $d['postedby'];?></td>  
                </tr>
            <?php } ?>
          </table>            
        
        </div>
    <br><div style="border-bottom:1px solid #D4E3F6;"></div>

</form>