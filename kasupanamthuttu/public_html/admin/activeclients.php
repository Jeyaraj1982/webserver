

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


<h5 style="text-align: left;font-family: arial;">Active Clients</h5> 
<div style="border-bottom:1px solid #D4E3F6;"></div><br> 


<?php // $data = $mysql->select("select * from _clients where isblock=0 and isactive=1 order by id desc"); ?>

<?php 
if ($_GET['f']=="all") {
 $data = $mysql->select("select * from _clients where isblock=0 and isactive=1 order by id desc");          
 $title = "All Users"   ;
} elseif ($_GET['f']=="emailjob") {
$data = $mysql->select("select * from _clients where isblock=0 and isactive=1 and emailjob_enabled='1' order by id desc");          
$title = "Email Job Users"   ;
} elseif ($_GET['f']=="adposting") {
$data = $mysql->select("select * from _clients where isblock=0 and isactive=1 and adposting_enabled='1' order by id desc");          
$title = "AdPosting Job Users"   ;
} elseif ($_GET['f']=="smsjob") {
$data = $mysql->select("select * from _clients where isblock=0 and isactive=1 and smsjob_enabled='1' order by id desc");          
$title = "SMS Job Users"   ;
} else {
 $data = $mysql->select("select * from _clients where isblock=0 and isactive=1 order by id desc");          
 $title = "All Users"   ;
}
?>


  <h3><?php echo $title;?></h3>
<table style="font-family:arial;font-size:12px;" width="100%" cellpadding="3" cellspacing="0">
    <tr bgcolor="#f5f5f5" style="font-weight: bold;text-align: center;">
        <td width="150"  style="border:1px solid #ccc;">Client ID</td>
        <td width="150"  style="border:1px solid #ccc;">Client Name</td>
        <td  style="border:1px solid #ccc;">E-mail id</td>
        <td width="80" style="border:1px solid #ccc;">Phone No</td>
        <td width="120" style="border:1px solid #ccc;">Registered on</td>
        <td width="50" style="border:1px solid #ccc;"></td>
    </tr>
    <?php foreach($data as $d) { ?>
        <tr>
            <td style="border-bottom:1px solid #ccc;"><?php echo $d['id'];?></td>
              <td style="border-bottom:1px solid #ccc;"><?php echo ucfirst($d['firstname']);?></td>
              <td style="border-bottom:1px solid #ccc;"><?php echo strtolower($d['emailid']);?></td>
              <td style="border-bottom:1px solid #ccc;text-align: center"><?php echo $d['mobileno'];?></td>
              <td style="border-bottom:1px solid #ccc;text-align: center"><?php echo date("Y-m-d",strtotime($d['postedon']));?></td>
              <td style="padding-top:12px;border-bottom:1px solid #ccc;text-align: center">
                <form action="editclient" method="post"><input type="hidden" value="<?php echo $d['id'];?>" name="clientid"><input class="btn btn-success btn-sm" value="..." type="submit"></form>
              </td>
        </tr>
    <?php } ?>
</table>

</div>
</div>
               </div>
              

   
    </div>
</div>

 