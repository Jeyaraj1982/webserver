<h2 style="text-align: left;font-family: arial;">12 District - EarnMoneyTech Amdin Area </h2>     
<div style="border-bottom:1px solid #D4E3F6;"></div><br>  
    <?php
    
                 $registeredClients = $mysql->select("select * from _clients where (lcase(streetname) like '%tiruchirappalli%' or lcase(streetname) like '%pudukkottai%' or lcase(streetname) like '%karur%' or lcase(streetname) like '%perambalur%' or lcase(streetname) like '%ariyalur%' or lcase(streetname) like '%madurai%' or lcase(streetname) like '%virudhunagar%' or lcase(streetname) like '%ramanathapuram%' or lcase(streetname) like '%sivaganga%' or  lcase(streetname) like '%namakkal%' or  lcase(streetname) like '%dharmapuri%' or  lcase(streetname) like '%krishnagiri%') order by id desc");
        $blockedClients = $mysql->select("select * from _clients where  (lcase(streetname) like '%tiruchirappalli%' or lcase(streetname) like '%pudukkottai%' or lcase(streetname) like '%karur%' or lcase(streetname) like '%perambalur%' or lcase(streetname) like '%ariyalur%' or lcase(streetname) like '%madurai%' or lcase(streetname) like '%virudhunagar%' or lcase(streetname) like '%ramanathapuram%' or lcase(streetname) like '%sivaganga%' or  lcase(streetname) like '%namakkal%' or  lcase(streetname) like '%dharmapuri%' or  lcase(streetname) like '%krishnagiri%') and isblock=1   order by id desc");
        $newClients = $mysql->select("select * from _clients where  (lcase(streetname) like '%tiruchirappalli%' or lcase(streetname) like '%pudukkottai%' or lcase(streetname) like '%karur%' or lcase(streetname) like '%perambalur%' or lcase(streetname) like '%ariyalur%' or lcase(streetname) like '%madurai%' or lcase(streetname) like '%virudhunagar%' or lcase(streetname) like '%ramanathapuram%' or lcase(streetname) like '%sivaganga%' or  lcase(streetname) like '%namakkal%' or  lcase(streetname) like '%dharmapuri%' or  lcase(streetname) like '%krishnagiri%') and isblock=-1 and isactive=0 order by id desc");   
        $activeClients = $mysql->select("select * from _clients where  (lcase(streetname) like '%tiruchirappalli%' or lcase(streetname) like '%pudukkottai%' or lcase(streetname) like '%karur%' or lcase(streetname) like '%perambalur%' or lcase(streetname) like '%ariyalur%' or lcase(streetname) like '%madurai%' or lcase(streetname) like '%virudhunagar%' or lcase(streetname) like '%ramanathapuram%' or lcase(streetname) like '%sivaganga%' or  lcase(streetname) like '%namakkal%' or  lcase(streetname) like '%dharmapuri%' or  lcase(streetname) like '%krishnagiri%') and isblock=0 and isactive=1 order by id desc");   

    
  
    ?>
                        
   
             
<div style="border-bottom:1px solid #D4E3F6;"></div> 
<div sytle="font-weight:bold">
Tiruchirappalli, Pudukkottai, Karur, Perambalur, Ariyalur, Madurai, Virudhunagar, Ramanathapuram, Sivaganga, Namakkal, Dharmapuri, Krishnagiri 
</div>
<h3>Client Status</h3>
<table style="font-familly:arial;font-size:12px;" cellpadding="5" cellspacing="0" width="100%" >
 
    <tr>
        <td width="85" style="border:1px solid #d5d5d5;border-right:none;border-bottom:none;background:#f5f5f5;font-weight: bold;">New</td>
        <td width="80" align="right"  style="border:1px solid #d5d5d5;border-right:none;border-bottom:none;" ><?php echo sizeof($newClients);?>&nbsp;</td>
        <td align="center" style="border:1px solid #d5d5d5;border-bottom:none;" ><a href='newclients'>View</a></td>
    </tr>
    <tr>
        <td style="border:1px solid #d5d5d5;border-right:none;;border-bottom:none;background:#f5f5f5;font-weight: bold;">Blocked</td>
        <td align="right" style="border:1px solid #d5d5d5;border-right:none;;border-bottom:none;"><?php echo sizeof($blockedClients);?>&nbsp;</td>
        <td align="center" style="border:1px solid #d5d5d5;border-bottom:none;"><a href='blockedclients'>View</a></td>
    </tr>
    <tr>
        <td style="border:1px solid #d5d5d5;border-right:none;background:#f5f5f5;font-weight: bold;">Active</td>
        <td align="right" style="border:1px solid #d5d5d5;border-right:none;"><?php echo sizeof($activeClients);?>&nbsp;</td>
        <td align="center" style="border:1px solid #d5d5d5;"><a href='activeclients'>View</a></td>
   </tr>    
</table> <br>
<form action="filter" method="post" target="_blank">
<table style="font-familly:arial;font-size:12px;" cellpadding="5" cellspacing="0" width="100%" >
    <tr bgcolor="#f5f5f5" style="font-weight: bold;text-align: center;">
        <td style="border:1px solid #d5d5d5;border-right:none;">Filter Type</td>
        <td style="border:1px solid #d5d5d5;border-right:none;"> From </td>
        <td style="border:1px solid #d5d5d5;border-right:none;"> To </td>
                <td  style="border:1px solid #d5d5d5"> &nbsp; </td>  
    </tr>
    <tr>
        <td  style="border:1px solid #d5d5d5;border-right:none;">
            <select name="filter" style="border:1px solid #D4E3F6;padding:3px;">
                <option value="new">New</option>
                <option value="blocked">Blocked</option>
                <option value="active">Active</option>
            </select>
        </td>
        <td  style="border:1px solid #d5d5d5;border-right:none;">
            
            <select name="fdd" style="border:1px solid #D4E3F6;padding:3px;">
                <?php for($i=1;$i<=31;$i++) { ?>
                    <option value="<?php echo $i;?>" ><?php echo $i;?></option>
                <?php } ?>
            </select>&nbsp;/&nbsp;
            <select name="fmm" style="border:1px solid #D4E3F6;padding:3px;">
                <?php for($i=1;$i<=12;$i++) { ?>
                    <option value="<?php echo $i;?>"><?php echo $i;?></option>
                <?php } ?>
            </select>&nbsp;/&nbsp;
            <select name="fyy" style="border:1px solid #D4E3F6;padding:3px;">
                <?php for($i=2012;$i<=2012;$i++) { ?>
                    <option value="<?php echo $i;?>" ><?php echo $i;?></option>
                <?php } ?>
            </select> 
                            
          </td>
          <td  style="border:1px solid #d5d5d5;border-right:none;">
           
           <select name="tdd" style="border:1px solid #D4E3F6;padding:3px;">
                <?php for($i=1;$i<=31;$i++) { ?>
                    <option value="<?php echo $i;?>" ><?php echo $i;?></option>
                <?php } ?>
            </select>&nbsp;/&nbsp;
            <select name="tmm" style="border:1px solid #D4E3F6;padding:3px;">
                <?php for($i=1;$i<=12;$i++) { ?>
                    <option value="<?php echo $i;?>"><?php echo $i;?></option>
                <?php } ?>
            </select>&nbsp;/&nbsp;
            <select name="tyy" style="border:1px solid #D4E3F6;padding:3px;">
                <?php for($i=2012;$i<=2012;$i++) { ?>
                    <option value="<?php echo $i;?>" ><?php echo $i;?></option>
                <?php } ?>
            </select> 
         </td>
   
         <td  style="border:1px solid #d5d5d5">  
            <input type="submit" value="Go" style="font-size:12px;">
        </td> 
    </tr>
</table>
</form>
<br>
 
                        
<br>      
<div style="border-bottom:1px solid #D4E3F6;"></div>   <br>
