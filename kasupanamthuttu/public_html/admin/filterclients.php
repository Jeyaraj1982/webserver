

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


<h5 style="text-align: left;font-family: arial;">User report filter By Date</h5> 
<div style="border-bottom:1px solid #D4E3F6;"></div><br> 
 
<?php
    $from =  $_POST['fyy']."-".$_POST['fmm']."-".$_POST['fdd'];
    $to =  $_POST['tyy']."-".$_POST['tmm']."-".$_POST['tdd']; 
    echo "<h5>Report From : ".$from." To ".$to."</h5>";
    switch ($_POST['filter']) {
        case 'new' :
            if ($_SESSION['country']=="Malaysia") {        
            $data = $mysql->select("select * from _clients where isblock=-1 and isactive=0 and (date(postedon)>='".$from."' and date(postedon)<='".$to."') and country='malaysia' order by id desc");
            } else {
            $data = $mysql->select("select * from _clients where isblock=-1 and isactive=0 and (date(postedon)>='".$from."' and date(postedon)<='".$to."') order by id desc");
            }
            break;
        case 'blocked' :
            if ($_SESSION['country']=="Malaysia") {        
                $data = $mysql->select("select * from _clients where isblock=1 and (date(postedon)>='".$from."' and date(postedon)<='".$to."') and country='malaysia' order by id desc"); 
            } else {
            $data = $mysql->select("select * from _clients where isblock=1 and (date(postedon)>='".$from."' and date(postedon)<='".$to."') order by id desc");     
            }
            
            break;
        case 'active':
         if ($_SESSION['country']=="Malaysia") {         
             $data = $mysql->select("select * from _clients where isblock=0 and isactive=1 and (date(postedon)>='".$from."' and date(postedon)<='".$to."') and country='malaysia' order by id desc"); 
         } else {
            $data = $mysql->select("select * from _clients where isblock=0 and isactive=1 and (date(postedon)>='".$from."' and date(postedon)<='".$to."') order by id desc");     
         }
            break;
    }
?>
<table style="font-family:arial;font-size:12px;" width="100%" cellpadding="3" cellspacing="0">
    <tr bgcolor="#f5f5f5" style="font-weight: bold;text-align: center;">
        <td width="150"  style="border:1px solid #ccc;">Client Name</td>
        <td  style="border:1px solid #ccc;">E-mail id</td>
        <td width="80"  style="border:1px solid #ccc;">Phone No</td>
        <td width="120" colspan="2"  style="border:1px solid #ccc;">Registered on</td>
    </tr>
    <?php foreach($data as $d) { ?>
        <tr>
              <td style="border-bottom:1px solid #ccc;"><?php echo ucfirst($d['firstname']);?></td>
              <td style="border-bottom:1px solid #ccc;"><?php echo strtolower($d['emailid']);?></td>
              <td style="border-bottom:1px solid #ccc;text-align: center"><?php echo $d['mobileno'];?></td>
              <td style="border-bottom:1px solid #ccc;text-align: center"><?php echo date("Y-m-d",strtotime($d['postedon']));?></td>
              <td style="padding-top:12px;border-bottom:1px solid #ccc;text-align: center"><form action="editclient" method="post"><input type="hidden" value="<?php echo $d['id'];?>" name="clientid"><input type="image" src="images/more_button.gif" value="..." style="font-family:arial;font-size:8px;border:0px solid #ccc;background:white;color:#222"></form></td>
        </tr>
    <?php } ?>
</table>

</div>
</div>
               </div>
              

   
    </div>
</div>

 