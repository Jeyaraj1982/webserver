<h2>District Wise</h2>

<table cellpadding="5" cellspacing="0" width="100%" style="font-size:12px;font-family:arial;"> 
    <tr bgcolor="#888" style="color:#f1f1f1;font-weight:bold">
        <td>District Name</td>
        <td>Total User</td>
        <td>&nbsp;</td>
         <td>&nbsp;</td> 
          <td>&nbsp;</td> 
    </tr>
    <?php $dn = $mysql->select("select * from _districtnames order by districtname"); 
        
        
        foreach($dn as $district ){
            $tempData = $mysql->select("select * from _clients where LOWER(trim(streetname)) like '%".strtolower(trim($district['districtname']))."%'");
            
            if (sizeof($tempData)>0) {
                ?>
                  <tr>
                    <td><?php echo $district['districtname']; ?></td>
                    <td><?php echo sizeof($tempData); ?></td>
                    <td>
                        <form action="newclients" method="post">
                            <input type='hidden' value="<?php echo trim($district['districtname']);?>" name='distName'>
                            <?php
        if ($_SESSION['country']=="Malaysia") {
        
        $cdata = $mysql->select("select * from _clients where isblock=-1 and isactive=0 and country='malaysia' order by id desc");     
        
    } else {
        $cdata = $mysql->select("select * from _clients where isblock=-1 and isactive=0 and LOWER(trim(streetname)) like '%".strtolower(trim($district['districtname']))."%' order by id desc");     
    }

?>
                            <input type='submit' value="New Clients (<?php echo sizeof($cdata);?>)">
                        </form>
                    </td>
                    <td>
                        <form action="activeclients" method="post">
                            <input type='hidden' value="<?php echo trim($district['districtname']);?>" name='distName'>
                            <?php
         if ($_SESSION['country']=="Malaysia") {     
         $cdata = $mysql->select("select * from _clients where isblock=0 and isactive=1 and country='malaysia'   order by id desc"); 
     } else {
$cdata = $mysql->select("select * from _clients where isblock=0 and isactive=1 and LOWER(trim(streetname))like '%".strtolower(trim($district['districtname']))."%'  order by id desc");          
     }
?>
                            <input type='submit' value="Active Clients (<?php echo sizeof($cdata);?>)">
                        </form>
                    </td>
                    <td>
                        <form action="blockedclients" method="post">
                            <input type='hidden' value="<?php echo trim($district['districtname']);?>" name='distName'>
                            <?php
         if ($_SESSION['country']=="Malaysia") {      
         $cdata = $mysql->select("select * from _clients where isblock=1 and country='malaysia' order by id desc"); 
     } else {
 $cdata = $mysql->select("select * from _clients where isblock=1 and LOWER(trim(streetname))like '%".strtolower(trim($district['districtname']))."%'  order by id desc");         
     }
 
?>
                            <input type='submit' value="Blocked Clients (<?php echo sizeof($cdata);?>)"> 
                        </form>
                    </td>
                  </tr>
                <?php
            }
        }
    
    ?>
    
</table>