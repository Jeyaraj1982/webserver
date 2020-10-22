
 <?php
    if (isset($_POST['ChangeNickNameBtn'])) {
        if (strlen(trim($_POST['NickName']))>0) {
            $mysql->execute("update _tbl_Members set NickName='".$_POST['NickName']."' where MemberID='".$userData['MemberID']."'");
             echo SuccessMsg("Nick name successfully updated"); 
             unset($_POST);
        } else {
             echo ErrorMsg("Nick Name must have morethan 6 characters"); 
        }
    }
    $user_Data = $mysql->select("select * from  _tbl_Members where MemberID='".$userData['MemberID']."'");
    //print_r($user_Data);
    // $userData = $user_Data[0];
 ?>
 
<div class="content">
    <div class="hpanel">
        <div class="row">
            <div class="col-lg-12">
                <div class="hpanel">
                    <div class="panel-heading hbuilt">
                       General Information
                    </div>
                    <div class="panel-body list">
                    <form action="" method="post">
                        <div class="form-group row">
                            <label class="col-sm-2 control-label">First Name</label>
                            <div class="col-sm-10"><?php echo $user_Data[0]['FirstName'];?></div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 control-label">Last Name</label>
                            <div class="col-sm-10"><?php echo $user_Data[0]['LastName'];?></div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 control-label">Nick Name</label>
                            <div class="col-sm-4"><input type="text" class="form-control" placeholder="Nick Name" name="NickName" style="background:#fff" value="<?php echo isset($_POST['NickName']) ? $_POST['NickName'] : $userData['NickName'];?>"></div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 control-label">Date of Birth</label>
                            <div class="col-sm-10"><?php echo putDate($user_Data[0]['DateOfBirth']);?></div>
                        </div> 
                        <input type="submit" class="btn btn-outline btn-success" name="ChangeNickNameBtn" value="Save General Information"> 
                    </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="hpanel">
                    <div class="panel-heading hbuilt">
                       Address Information
                    </div>
                    <div class="panel-body list">
                        <div class="form-group row">
                            <label class="col-sm-2 control-label">Address</label>
                            <div class="col-sm-10"><?php echo $user_Data[0]['Address'];?></div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 control-label">City</label>
                            <div class="col-sm-10"><?php echo $user_Data[0]['CityName'];?></div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 control-label">District</label>
                            <div class="col-sm-10"><?php echo $user_Data[0]['DistrictName'];?></div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 control-label">Region</label>
                            <div class="col-sm-10"><?php echo $user_Data[0]['StateName'];?></div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 control-label">Country</label>
                            <div class="col-sm-10"><?php echo $user_Data[0]['CountryName'];?></div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 control-label">Postal Code</label>
                            <div class="col-sm-10"><?php echo $user_Data[0]['PinCode'];?></div>
                        </div> 
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="hpanel">
                    <div class="panel-heading hbuilt">
                       Sponsor's Information
                    </div>          
                    <?php
                         $sponsor = $mysql->select("select * from _tbl_Members where MemberID='".$user_Data[0]['ReferedBy']."'");
                    ?>
                    <div class="panel-body list">
                        <div class="form-group row">
                            <label class="col-sm-2 control-label"><img style="height:90px;width:90px"></label>
                            <div class="col-sm-10">
                                <div class="form-group row">
                                    <label class="col-sm-2 control-label">Sponsor ID</label>
                                    <div class="col-sm-10"><?php echo $sponsor[0]['MemberCode'];?></div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 control-label">Name</label>
                                    <div class="col-sm-10"><?php echo $sponsor[0]['FirstName']." ".$sponsor[0]['LastName'];?></div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 control-label">Nick Name</label>
                                    <div class="col-sm-10"><?php echo $sponsor[0]['NickName'];?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>       
        </div>     
    </div>