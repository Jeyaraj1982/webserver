

 <div class="line">
            <div class="margin">
             <div class="s-12 m-6 l-3 margin-bottom">
                  <div class="box">
                    <?php
                        include_once("rightmenu.php");
                    ?>
                  </div>
               </div>
               <div class="s-12 m-6 l-9 margin-bottom">
                  <div class="box">
            

<h5 style="text-align: left;font-family: arial;">Admin Area</h5> 
<div style="border-bottom:1px solid #D4E3F6;"></div><br> 
  
    <?php
    
       $registeredClients = $mysql->select("select * from _clients where trim(streetname)='".trim($_SESSION['user']['AssignedDistrict'])."' order by id desc");
        $blockedClients = $mysql->select("select * from _clients where isblock=1 and trim(streetname)='".trim($_SESSION['user']['AssignedDistrict'])."'   order by id desc");
        $newClients = $mysql->select("select * from _clients where isblock=-1 and isactive=0 and trim(streetname)='".trim($_SESSION['user']['AssignedDistrict'])."'  order by id desc");   
        $activeClients = $mysql->select("select * from _clients where isblock=0 and isactive=1 and trim(streetname)='".trim($_SESSION['user']['AssignedDistrict'])."'  order by id desc");   
       
        
        
  
    ?>
   <!-- <table style="font-family:arial;font-size:12px;" cellpadding="5" cellspacing="0">
        <tr>
            <td>Franchise</td>
            <td><?php echo sizeof($frachise);?></td>
            <td><a href="lfranchise">View</a></td>
        </tr>
  
    </table> -->
    
 
     
    
<div style="border-bottom:1px solid #D4E3F6;"></div> 
<h5>Client Status</h5>
<table style="font-familly:arial;font-size:12px;" cellpadding="5" cellspacing="0" width="100%" >
                    
    <tr>
        <td width="85" style="border:1px solid #d5d5d5;border-right:none;border-bottom:none;background:#f5f5f5;font-weight: bold;">New</td>
        <td width="80" align="right"  style="border:1px solid #d5d5d5;border-right:none;border-bottom:none;" ><?php echo sizeof($newClients);?>&nbsp;</td>
        <td align="center" style="border:1px solid #d5d5d5;border-bottom:none;" ><a href='fnewclients'>View</a></td>
    </tr>
    <tr>
        <td style="border:1px solid #d5d5d5;border-right:none;;border-bottom:none;background:#f5f5f5;font-weight: bold;">Blocked</td>
        <td align="right" style="border:1px solid #d5d5d5;border-right:none;;border-bottom:none;"><?php echo sizeof($blockedClients);?>&nbsp;</td>
        <td align="center" style="border:1px solid #d5d5d5;border-bottom:none;"><a href='fblockedclients'>View</a></td>
    </tr>                                        
    <tr>
        <td style="border:1px solid #d5d5d5;border-right:none;background:#f5f5f5;font-weight: bold;">Active</td>
        <td align="right" style="border:1px solid #d5d5d5;border-right:none;"><?php echo sizeof($activeClients);?>&nbsp;</td>
        <td align="center" style="border:1px solid #d5d5d5;">
           <table style="width:100%">
            <tr>
                                        <td style="width:50%">
                                            <a href='factiveclients?f=all' style="color:blue">View All</a>&nbsp;<span style="color:#fff;background:Red;padding:5px 10px;"><?php echo sizeof($mysql->select("select * from _clients where isblock=0 and isactive=1 and  trim(streetname)='".trim($_SESSION['user']['AssignedDistrict'])."' order by id desc"));?></span><br>
                                        </td>
                                        <td>
                                            <a href='factiveclients?f=emailjob' style="color:blue">View email jobs&nbsp;<span style="color:#fff;background:Red;padding:5px 10px;"><?php echo sizeof($mysql->select("select * from _clients where isblock=0 and isactive=1 and emailjob_enabled='1' and  trim(streetname)='".trim($_SESSION['user']['AssignedDistrict'])."' order by id desc"));?></span></a><br>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href='factiveclients?f=adposting' style="color:blue">View adposting&nbsp;<span style="color:#fff;background:Red;padding:5px 10px;"><?php echo sizeof($mysql->select("select * from _clients where isblock=0 and isactive=1 and adposting_enabled='1' and  trim(streetname)='".trim($_SESSION['user']['AssignedDistrict'])."' order by id desc"));?></span></a><br>
                                        </td>
                                        <td>
                                            <a href='factiveclients?f=smsjob' style="color:blue">View sms send jobs</a>&nbsp;<span style="color:#fff;background:Red;padding:5px 10px;"><?php echo sizeof($mysql->select("select * from _clients where isblock=0 and isactive=1 and smsjob_enabled='1' and  trim(streetname)='".trim($_SESSION['user']['AssignedDistrict'])."' order by id desc"));?></span>
                                        </td>
                                    </tr>
           </table>
        
        
        
        
        
        
        </td>
   </tr>    
</table> <br>
 
<br>
 
    

   
  

  
 
</div>
</div>
               </div>
              

   
    </div>
</div>

 
