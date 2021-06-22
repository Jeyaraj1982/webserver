 <style>
.errorstring{text-align: right;width:100%;font-size:12px;padding:5px}
</style>
<div style="padding:0px;text-align:center;margin-bottom:20px;">
    <h5>My Settings</h5>
</div>
 <?php 
        $mem = $mysql->select("select * from _tbl_member where MemberID='".$_SESSION['User']['MemberID']."'");
        
        if (isset($_POST['submitRequest'])) { 
    
        $region =$mysql->select("select * from _tbl_region where Region='".$_POST['region']."'");
        
        $mysql->execute("update _tbl_member set RegionID   ='".$region[0]['RegionID']."',
                                                 Region     ='".$_POST['region']."',
                                                 TNEBRegion ='".$_POST['tnebregion']."'
                                                 where MemberID='".$_SESSION['User']['MemberID']."'");
        $result['status']="success";
}
         if ($result['status']=="success") {
    ?>
     <script>
     $(document).ready(function(){
         $('#ConfirmationPopup').modal("show");
     });
     </script>
     <?php } ?>
        <div class="row">
            <form action="" method="post" style="width: 80%;margin: 0px auto;">
                <div class="form-group">
                    <label class="text-bold-600" for="exampleInputEmail1">My Default Region</label>
                    <select name="region" id="region" class="form-control">
                    <?php $regs = $mysql->select("select * from _tbl_region where IsActive='1'");?>
                        <?php foreach($regs as $reg){ ?>
                            <option value="<?php echo $reg['Region'];?>" <?php echo (isset($_POST[ 'region'])) ? (($_POST[ 'region']==$reg[ 'Region']) ? " selected='selected' " : "") : (($mem[0][ 'Region']==$reg[ 'Region']) ? " selected='selected' " : "");?>><?php echo $reg['Region'];?></option>
                        <?php } ?>         
                    </select>
                </div>
                <div class="form-group">
                    <label class="text-bold-600" for="exampleInputEmail1">My Default TNEB Region</label>
                    <select name="tnebregion" id="tnebregion" class="form-control">
                       <option value="1" <?php echo (isset($_POST[ 'tnebregion'])) ? (($_POST[ 'tnebregion']== "1") ? " selected='selected' " : "") : (($mem[0][ 'TNEBRegion']== "1") ? " selected='selected' " : "");?>>01-Chennai-North</option>
                       <option value="2" <?php echo (isset($_POST[ 'tnebregion'])) ? (($_POST[ 'tnebregion']== "2") ? " selected='selected' " : "") : (($mem[0][ 'TNEBRegion']== "2") ? " selected='selected' " : "");?>>02-Viluppuram</option>
                       <option value="3" <?php echo (isset($_POST[ 'tnebregion'])) ? (($_POST[ 'tnebregion']== "3") ? " selected='selected' " : "") : (($mem[0][ 'TNEBRegion']== "3") ? " selected='selected' " : "");?>>03-Coimbatore</option>
                       <option value="4" <?php echo (isset($_POST[ 'tnebregion'])) ? (($_POST[ 'tnebregion']== "4") ? " selected='selected' " : "") : (($mem[0][ 'TNEBRegion']== "4") ? " selected='selected' " : "");?>>04-Erode</option>
                       <option value="5" <?php echo (isset($_POST[ 'tnebregion'])) ? (($_POST[ 'tnebregion']== "5") ? " selected='selected' " : "") : (($mem[0][ 'TNEBRegion']== "5") ? " selected='selected' " : "");?>>05-Madurai</option>
                       <option value="6" <?php echo (isset($_POST[ 'tnebregion'])) ? (($_POST[ 'tnebregion']== "6") ? " selected='selected' " : "") : (($mem[0][ 'TNEBRegion']== "6") ? " selected='selected' " : "");?>>06-Trichy</option>
                       <option value="7" <?php echo (isset($_POST[ 'tnebregion'])) ? (($_POST[ 'tnebregion']== "7") ? " selected='selected' " : "") : (($mem[0][ 'TNEBRegion']== "7") ? " selected='selected' " : "");?>>07-Tirunelvel</option>
                       <option value="8" <?php echo (isset($_POST[ 'tnebregion'])) ? (($_POST[ 'tnebregion']== "8") ? " selected='selected' " : "") : (($mem[0][ 'TNEBRegion']== "8") ? " selected='selected' " : "");?>>08-Vellore</option>
                       <option value="9" <?php echo (isset($_POST[ 'tnebregion'])) ? (($_POST[ 'tnebregion']== "9") ? " selected='selected' " : "") : (($mem[0][ 'TNEBRegion']== "9") ? " selected='selected' " : "");?>>09-chennai-South</option>
                    </select>
                </div>
                <button type="submit" name="submitRequest" id="submitRequest" class="btn btn-success  glow w-100 position-relative">Save<i id="icon-arrow" class="bx bx-right-arrow-alt" style="float: right;"></i></button><br><br>
                <a href="dashboard.php?action=settings" class="btn btn-outline-success glow w-100 position-relative">Back<i id="icon-arrow" class="bx bx-left-arrow-alt" style="float: left;"></i></a>
                <br><br>
            </form>         
        </div>
        <div class="modal fade" id="ConfirmationPopup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body" id="confrimation_text" style="padding:10px;">
         <h5 class="modal-title" style="text-align: center;width:100%">My Settings</h5> <br>
         <div id="xconfrimation_text" style="text-align: center;font-size:15px;"><?php echo  $result['status'];?></div>
          <div style="padding:20px;text-align:center">
            <button type="button" class="btn btn-warning" onclick="location.href='dashboard.php?action=settings'">Continue</button>
         </div>
      </div>
    </div>
  </div>
</div> 
   