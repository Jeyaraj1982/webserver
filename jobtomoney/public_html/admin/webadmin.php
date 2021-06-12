

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
    
         if ($_SESSION['country']=="Malaysia") {        
             
        $registeredClients = $mysql->select("select * from _clients where country='malaysia'   order by id desc");
        $blockedClients = $mysql->select("select * from _clients where isblock=1 and country='malaysia'     order by id desc");
        $newClients = $mysql->select("select * from _clients where isblock=-1 and isactive=0  and country='malaysia'  order by id desc");   
        $activeClients = $mysql->select("select * from _clients where isblock=0 and isactive=1 and country='malaysia'   order by id desc");   
        $visa = $mysql->select("select * from _visa order by id desc");   
        $frachise = $mysql->select("select * from _franchise order by id desc");
        
             
         } else {
        $registeredClients = $mysql->select("select * from _clients order by id desc");
        $blockedClients = $mysql->select("select * from _clients where isblock=1   order by id desc");
        $newClients = $mysql->select("select * from _clients where isblock=-1 and isactive=0 order by id desc");   
        $activeClients = $mysql->select("select * from _clients where isblock=0 and isactive=1 order by id desc");   
        $visa = $mysql->select("select * from _visa order by id desc");   
        $frachise = $mysql->select("select * from _franchise order by id desc");
        
             
         }
    
  
    ?>
   <!-- <table style="font-family:arial;font-size:12px;" cellpadding="5" cellspacing="0">
        <tr>
            <td>Franchise</td>
            <td><?php echo sizeof($frachise);?></td>
            <td><a href="lfranchise">View</a></td>
        </tr>
  
    </table> -->
    
    

   
    
     <h5  style="color:orange">AD POSTING</h5>
    <table style="font-family:arial;font-size:12px;font-weight:bold;" cellpadding="5" cellspacing="0" width="100%">  
        <tr>
            <td align="center" width="20%"> 
                <form action="editclient" method="post" target="_blank">
                    Account ID<br><input maxlength="8" type="text" name="clientid" style="width:88px;border:1px solid #D4E3F6;padding:3px;margin-top: 5px;"><br><input type="submit" value="View Account" style="font-size:11px;margin-top: 5px;">
                </form>
            </td>
            <td align="center"  width="20%"> 
                <form action="earning" method="post" target="_blank">
                   Account ID<br><input maxlength="8" type="text" name="acno" style="width:88px;border:1px solid #D4E3F6;padding:3px;margin-top: 5px;"><br><input type="submit" value="Earning Details" style="font-size:11px;margin-top: 5px;">
                </form>
            </td>
            <td align="center"  width="20%">  
                <form action="withdrawal" method="post" target="_blank">
                   Account ID<br><input maxlength="8" type="text" name="acno" style="width:88px;border:1px solid #D4E3F6;padding:3px;margin-top: 5px;"><br><input type="submit" value="Debit Details" style="font-size:11px;margin-top: 5px;">
                </form>
            </td> 
            <td align="center"> 
                <form action="editrequest" method="post" target="_blank">
                    Request ID : <input maxlength="8" type="text" name="id" style="width:88px;border:1px solid #D4E3F6;padding:3px;margin-top: 5px;"><br><input type="submit" value="View Request" style="font-size:11px;margin-top: 5px;">
                </form>
            </td> 
                       <td align="center"  width="20%">           
                <form action="disableaccount" method="post" target="_blank">
                    Account ID : <input maxlength="8" type="text" name="acno" style="width:98px;border:1px solid #D4E3F6;padding:3px;margin-top: 5px;"><br><input type="submit" value="Disable Account" style="font-size:11px;margin-top: 5px;">
                </form>
            </td> 
        </tr>
    </table>
    
<div style="border-bottom:1px solid #D4E3F6;"></div> 
<h5>Client Status</h5>
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
        <td align="center" style="border:1px solid #d5d5d5;">
           <table style="width:100%">
            <tr>
                <td style="width:50%">
                    <a href='activeclients?f=all' style="color:blue">View All</a>&nbsp;<span style="color:#fff;background:Red;padding:5px 10px;"><?php echo sizeof($mysql->select("select * from _clients where isblock=0 and isactive=1 order by id desc"));?></span><br>
                </td>
                <td>
                    <a href='activeclients?f=emailjob' style="color:blue">View email jobs&nbsp;<span style="color:#fff;background:Red;padding:5px 10px;"><?php echo sizeof($mysql->select("select * from _clients where isblock=0 and isactive=1 and emailjob_enabled='1' order by id desc"));?></span></a><br>
                </td>
            </tr>
            <tr>
                <td>
                    <a href='activeclients?f=adposting' style="color:blue">View adposting&nbsp;<span style="color:#fff;background:Red;padding:5px 10px;"><?php echo sizeof($mysql->select("select * from _clients where isblock=0 and isactive=1 and adposting_enabled='1' order by id desc"));?></span></a><br>
                </td>
                <td>
                <a href='activeclients?f=smsjob' style="color:blue">View sms send jobs</a>&nbsp;<span style="color:#fff;background:Red;padding:5px 10px;"><?php echo sizeof($mysql->select("select * from _clients where isblock=0 and isactive=1 and smsjob_enabled='1' order by id desc"));?></span>
                </td>
            </tr>
           </table>
        
        
        
        
        
        
        </td>
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
                <?php for($i=2010;$i<=2020;$i++) { ?>
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
                <?php for($i=2020;$i<=2020;$i++) { ?>
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
 
    

<div style="border-bottom:1px solid #D4E3F6;"></div>  
<h3>Requests</h3>

 <table width="100%" cellpadding="3" cellspacing="0" style="font-family: arial;font-size:12px;">
    <tr bgcolor="#f5f5f5"  style="font-weight: bold;text-align: center;">
        <td width="60" style="border: 1px solid #ccc;">ID</td>
        <td width="120" style="border:1px solid #ccc">Date</td>
        <td width="180" style="border:1px solid #ccc">Request Title</td>
        <td style="border:1px solid #ccc">Description</td>
        <td width="30" style="border:1px solid #ccc">&nbsp;</td>
         
    </tr>
    <tr>
        <td colspan="5">&nbsp;</td>
    </tr>
    
    <tr bgcolor="#f5f5f5">
        <td colspan="5"  style="font-weight: bold;border:1px solid #ccc">Open Request(s)</td>
    </tr>
    
 <?php
    $data = $mysql->select("select * from _servicerequest where requeststats='open' order by id desc");
    
?>
<?php
    foreach($data as $d) {
        ?>
       <tr>
        <td valign="top"><?php echo $d['id'];?></td>
        <td valign="top"><?php echo $d['postedon'];?></td> 
        <td valign="top"><div><?php echo $d['requesttitle'];?></div></td>
        <td valign="top"><div><?php echo $d['description'];?></div></td>  
        <td><form action="editrequest" method="post"><input type="hidden" value="<?php echo $d['id'];?>" name="id"><input type="submit" value="..."></form></td>
       </tr> 
        <?php
    }
?>
<?php
    if (sizeof($data)==0) {
        ?>
        <tr >
        <td colspan="5" align="center">No Records Found</td>
    </tr>
        <?php
    }
?>
<tr bgcolor="#f5f5f5">
 <td colspan="5" style="font-weight: bold;border:1px solid #ccc">Closed Request(s)</td>
  </tr> 
<?php
    $data = $mysql->select("select * from _servicerequest where requeststats='closed'  order by id desc limit 0,15");
?>


<?php
    foreach($data as $d) {
        ?>
       <tr>
        <td valign="top"><?php echo $d['id'];?></td>
        <td valign="top"><?php echo $d['postedon'];?></td> 
        <td valign="top"><div><?php echo $d['requesttitle'];?></div></td>
        <td valign="top"><div><?php echo $d['description'];?></div></td>  
         <td><form action="editrequest" method="post"><input type="hidden" value="<?php echo $d['id'];?>" name="id"><input type="submit" value="..."></form></td>
       </tr> 
        <?php
    }
?>
<?php
    if (sizeof($data)==0) {
        ?>
        <tr >
        <td colspan="5" align="center">No Records Found</td>
    </tr>
        <?php
    }
?>
</table>
 
</div>
</div>
               </div>
              

   
    </div>
</div>

 
