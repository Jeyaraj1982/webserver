<h2 style="text-align: left;font-family: arial;">Keju Staff Area </h2>     
<div style="border-bottom:1px solid #D4E3F6;"></div><br>  
    <?php
    
  
        $registeredClients = $mysql->select("select * from _clients order by id desc");
        $blockedClients = $mysql->select("select * from _clients where isblock=1   order by id desc");
        $newClients = $mysql->select("select * from _clients where isblock=-1 and isactive=0 order by id desc");   
        $activeClients = $mysql->select("select * from _clients where isblock=0 and isactive=1 order by id desc");   
        $visa = $mysql->select("select * from _visa order by id desc");   
        $frachise = $mysql->select("select * from _franchise order by id desc");
        
        $nc_later_count = 0;
        $nc_dlater_count = 0;
         foreach($newClients as $nc) {
             $nc_c = $mysql->select("select * from _comments where clientid=".$nc['id']);
             if ($nc_c[0]['status']=='Contact Later') {
                 $nc_later_count++;
             } 
             
             if ($nc_c[0]['status']=='Donot Contact') {
                 $nc_dlater_count++;
             }

             
             
         }
  
    ?>
                   
    

   
    
     <h4  style="color:orange">AD POSTING</h4>
    
    
 
<h3>Client Status</h3>
<table style="font-familly:arial;font-size:12px;" cellpadding="5" cellspacing="0" width="100%" >
 
    <tr>
        <td width="85" style="border:1px solid #d5d5d5;border-right:none;border-bottom:none;background:#f5f5f5;font-weight: bold;">New</td>
        <td width="80" align="right"  style="border:1px solid #d5d5d5;border-right:none;border-bottom:none;" ><?php echo sizeof($newClients);?>&nbsp;</td>
        <td align="center" style="border:1px solid #d5d5d5;border-bottom:none;" ><a href='newclients'>View</a></td>
    </tr>
        <tr>
        <td width="85" style="border:1px solid #d5d5d5;border-right:none;border-bottom:none;background:#f5f5f5;font-weight: bold;">Concat Later</td>
        <td width="80" align="right"  style="border:1px solid #d5d5d5;border-right:none;border-bottom:none;" ><?php echo $nc_later_count;?>&nbsp;</td>
        <td align="center" style="border:1px solid #d5d5d5;border-bottom:none;" ><a href='contactlater'>View</a></td>
    </tr>                              
 
         <tr>
        <td width="85" style="border:1px solid #d5d5d5;border-right:none;border-bottom:none;background:#f5f5f5;font-weight: bold;">Don't Concat</td>
        <td width="80" align="right"  style="border:1px solid #d5d5d5;border-right:none;border-bottom:none;" ><?php echo $nc_dlater_count;?>&nbsp;</td>
        <td align="center" style="border:1px solid #d5d5d5;border-bottom:none;" ><a href='donotcontact'>View</a></td>
    </tr>                                    
    
    <tr>
        <td style="border:1px solid #d5d5d5;border-right:none;background:#f5f5f5;font-weight: bold;">Blocked</td>
        <td align="right" style="border:1px solid #d5d5d5;border-right:none;"><?php echo sizeof($blockedClients);?>&nbsp;</td>
        <td align="center" style="border:1px solid #d5d5d5;"><a href='blockedclients'>View</a></td>
   </tr>    
</table> <br>
  <br>
 
    
                         
<br>      
<div style="border-bottom:1px solid #D4E3F6;"></div>   <br>
