<?php 
  $obj = new CommonController();
      
            if (isset($_POST{"updatebtn"})) {
              $id =  $mysql->execute("update _jusertable set personname='".$_POST['personname']."',
                                                        email     ='".$_POST['email']."',
                                                        pwd     ='".$_POST['pwd']."',
                                                        mobile     ='".$_POST['mobile']."' where userid='".$_GET['d']."'");
            // $user= new JUsertable();
            //     echo $user->updateUser($_POST['personname'],$_POST['email'],$_POST['pwd'],$_POST['dob'],$_POST['mobile'],$_POST['state'],$_POST['district'],$_GET['d']);
             
             if(sizeof($id)>0) {
             ?>
                <script>                  
                    alert("Updated Successfully");
                    location.href='<?php echo AppUrl;?>/admin/dashboard.php?action=user/Edit&d='.$_GET['d'];
                </script>
            <?php
         }   }
$user = new JUsertable();
$pageContent = $user->getUser($_GET['d']);
?>
<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" style="padding-top:10px;padding-bottom:10px">
                            <div class="card-title">
                                Edit User
                            </div>
                        </div>
                        <form action="" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="rowid" value="<?php echo $pageContent[0]['userid'];?>">
                            <div class="card-body">
                                <div class="form-group row">
                                    <label for="Name" class="col-md-3 text-right">Person Name</label>
                                    <div class="col-md-3"><input type="text" name="personname" size="40" style="width:250px;" value="<?php echo $pageContent[0]['personname'];?>" class="form-control"></div>
                                </div>
                                <div class="form-group row">
                                    <label for="Name" class="col-md-3 text-right">Email Address</label>
                                    <div class="col-md-3"><input type="text" name="email" size="40" style="width:250px;" value="<?php echo $pageContent[0]['email'];?>" class="form-control"></div>
                                </div>
                                <div class="form-group row">
                                    <label for="Name" class="col-md-3 text-right">Mobile Number</label>
                                    <div class="col-md-3"><input type="text" name="mobile" size="40" style="width:250px;" value="<?php echo $pageContent[0]['mobile'];?>" class="form-control"></div>
                                </div> 
                                <div class="form-group row">
                                    <label for="Name" class="col-md-3 text-right">Password</label>
                                    <div class="col-md-3"><input type="text" name="pwd" size="40" style="width:250px;" value="<?php echo $pageContent[0]['pwd'];?>" class="form-control"></div>
                                </div>
                                <div class="form-group row">
                                    <label for="Name" class="col-md-3 text-right">IsActive</label>
                                    <div class="col-md-3"><select name="isactive" class="form-control">
                                    <option value='1' <?php echo ($pageContent[0]['isactive']==1) ? "selected='selected'" : "";?>>Active</option>
                                    <option value='0' <?php echo ($pageContent[0]['isactive']==0) ? "selected='selected'" : "";?>>In Active</option>
                                    </select></div>
                                </div>
                            </div>
                            <div class="card-action">
                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="submit" class="btn btn-success" name="updatebtn">Update</button>
                                        <button type="button" class="btn btn-warning" name="cancelbtn"  onclick="location.href='<?php echo AppUrl;?>/admin/dashboard.php?action=user/listuser&f=a'">Cancel</button>
                                    </div>                                        
                                </div>
                            </div>
                        </form>
                    </div>                                                                                             
                </div>
            </div>
        </div>
    </div>
</div>

