<div class="line">
    <div class="margin">
        <div class="s-12 m-6 l-3 margin-bottom">
            <div class="box">
                <?php include_once("rightmenu.php"); ?>
            </div>
        </div>
        <div class="s-12 m-6 l-9 margin-bottom">
            <div class="box">
                <h5 style="text-align: left;font-family: arial;">Franchisee</h5> 
                <?php
                    if (isset($_POST['isSubmit'])) {
                        $mysql->insert("_admins",array("AdminName"    => $_POST['AdminName'], 
                                                       "Username"     => $_POST['Username'], 
                                                       "UserPassword" => $_POST['UserPassword'], 
                                                       "role"         => 'fadmin', 
                                                       "IsActive"     => '1', 
                                                       "AssignedState" => $_POST['AssignedState'], 
                                                       "AssignedDistrict" => $_POST['AssignedDistrict'], 
                                                       "CreatedOn"    => date("Y-m-d H:i:s")));
                        echo "<div style='color:green'>Successfully Added</div>";     
                    }
                ?>
                <form action="" method="post" enctype="multipart/form-data">
                    <table  style="font-size:12px;font-family:arial;" cellpadding="5" cellspacing="0">
                     <!--   <tr>
                            <td>District Name</td>
                            <td>
                                <div id='dis_name'>
                                    <?php $districtnames = $mysql->select("select * from _districtnames where stateid=31 order by districtname"); ?>
                                    <select class="form-control" name="AssignedDistrict">
                                    <?php foreach($districtnames as $dname) {?>
                                    <option value="<?php echo $dname['districtname'];?>"><?php echo $dname['districtname'];?></option>
                                    <?php } ?>
                                    </select>  
                                </div>
                            </td>
                        </tr> -->
                             <tr>
                        <td>State Name</td>
                        <td>
                        <?php  $statenames=$mysql->select("select * from _statenames order by statenames"); ?>
                            <select id='state' name="AssignedState" class="form-control" onchange="$('#dis_name').html($('#_s'+$(this).val()).html())">
                            <option value="">Select State Name</option>
                            <?php foreach($statenames as $statename) { ?>
                                    <option value="<?php echo $statename['id'];?>"   <?php echo (($statename['id']==$_POST['statename'])  ? "selected=selected" : ""); ?> ><?php echo $statename['statenames'];?></option>
                            <?php } ?>
                            </select>  
                            
                         
                        </td>
                    </tr>
                    <tr>
                        <td>District Name</td>
                        <td><div id='dis_name'>
                            <select name="AssignedDistrict" class="form-control">
                            <option value="">Select District Name</option>
                            </select>  
                            </div>
                            
                               <?php
                                if (isset($_POST['statename'])) {
                                    ?>
                                         <script>
                                         $('#dis_name').html($('#_s31').html());
                                         </script>
                                    <?php
                                }
?>

                        </td>
                    </tr>               
                        <tr>
                            <td>Franchisee Name</td>
                            <td><input type="text" class="form-control" name="AdminName"></td>
                        </tr>
                        <tr>
                            <td>Login Name</td>
                            <td><input type="text" name="Username"  class="form-control"></td>
                        </tr>
                        <tr>
                            <td>Password</td>
                            <td><input type="text" name="UserPassword"  class="form-control"></td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="submit" value="Create Franchisee" name="isSubmit" class="btn btn-primary"></td>
                        </tr>
                    </table>
                </form>
            </div>
        </div>
    </div>
</div>
<?php
    
    $sn = $mysql->select("select * from _statenames order by statenames");
    foreach($sn as $s) {
        echo "<div id='_s".$s['id']."' style='display:none'>";
        
        $dn = $mysql->select("select * from _districtnames where stateid=".$s['id']);
        
         echo "<select id='streetname' class='form-control' name='AssignedDistrict' style='border:1px solid #D4E3F6;padding:3px;width: 400px'>";
         
         if (sizeof($dn)>0) {
            foreach($dn as $d) {     ?>
              <option value="<?php echo trim(str_replace("\n","",$d['districtname']));?>"  <?php echo (($d['id']==$_POST['districtname']) ? "selected=selected" : ""); ?> ><?php echo $d['districtname'];?></option>
                <?php
            }
         } else {
             echo "<option value='-1'>None</option>";
         }
         
         echo "</select>";
        
        
        echo "</div>";
    }
    
?>