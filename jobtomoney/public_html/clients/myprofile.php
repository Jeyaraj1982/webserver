
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
                     <h5>My Profile</h5>
                     <div style="border-bottom:1px solid #D4E3F6;"></div><br>
                       <?php
    $data = $mysql->select("select * from _clients where id=".$_SESSION['user']['id']);
?>
    <table cellpadding='5' cellspacing='5' style='font-size:12px;'>
        <tr><td>First Name </td><td>:</td><td><?php echo $data[0]['firstname'];?></td></tr>
        <tr><td>Email Id</td><td>:</td><td><?php echo $data[0]['emailid']; ?></td></tr>
        <tr><td>Date Of Birth</td><td>:</td><td><?php echo $data[0]['dateofbirth']; ?></td></tr>
        <tr><td>Sex</td><td>:</td><td><?php echo $data[0]['sex']; ?></td></tr>
        <tr><td>Street Name</td><td>:</td><td><?php echo $data[0]['streetname']; ?></td></tr>
        <tr><td>City</td><td>:</td><td><?php echo $data[0]['city']; ?></td></tr>
        <tr><td>State</td><td>:</td><td><?php echo $data[0]['state']; ?></td></tr>
        <tr><td>Country</td><td>:</td><td><?php echo $data[0]['country']; ?></td></tr>
        <tr><td>Plan</td><td>:</td><td><?php echo $data[0]['plan']; ?></td></tr>
        <tr><td>Mobile No</td><td>:</td><td><?php echo $data[0]['mobileno']; ?></td></tr>
    </table>
             
                  </div>
               </div>
              

   
    </div>
</div>

 