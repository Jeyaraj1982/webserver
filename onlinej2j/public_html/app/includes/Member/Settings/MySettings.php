<?php
     $mem = $mysql->select("select * from _tbl_Members where MemberID='".$_SESSION['User']['MemberID']."'");
    if (isset($_POST['submitRequest'])) {
        $region =$mysql->select("select * from _tbl_region where Region='".$_POST['region']."'");
        $mysql->execute("update _tbl_Members set RegionID   ='".$region[0]['RegionID']."',
                                                 Region     ='".$_POST['region']."',
                                                 TNEBRegion ='".$_POST['tnebregion']."'
                                                 where MemberID='".$_SESSION['User']['MemberID']."'");
        $result['status']="success";
    }
    if ($result['status']=="success") {
           ?>
            <script>
            jQuery(document).ready(function() {
               swal("Updated!", "Settings updated", {
                            icon : "success",
                            buttons: {                    
                                confirm: {
                                    className : 'btn btn-warning'
                                }
                            },
                        });
            });                                
                   
                 
        </script>
           <?php
        } 
?>
              
        <div class="main-panel">
            <div class="container">
                <div class="page-inner">
                    
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">My Settings</div>
                                </div>
                                <form id="exampleValidation" method="POST" action="">
                                    <div class="card-body">
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">My Default Region</label>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
                                                <select name="region" id="region" class="form-control">
                                                    <?php $regs = $mysql->select("select * from _tbl_region where IsActive='1'");?>
                                                    <?php foreach($regs as $reg){ ?>
                                                        <option value="<?php echo $reg['Region'];?>" <?php echo (isset($_POST[ 'region'])) ? (($_POST[ 'region']==$reg[ 'Region']) ? " selected='selected' " : "") : (($mem[0][ 'Region']==$reg[ 'Region']) ? " selected='selected' " : "");?>><?php echo $reg['Region'];?></option>
                                                    <?php } ?>         
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">My Default TNEB Region</label>
                                            <div class="col-lg-4 col-md-9 col-sm-8">
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
                                        </div>
                                    </div>
                                    <div class="card-action">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <input class="btn btn-warning" type="submit" name="submitRequest" value="Save">
                                            </div>                                        
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            