<?php
                                        
 if (isset($_POST['updateBtn'])) {
     
     $DateofBirth = $_POST['Year']."-".$_POST['Month']."-".$_POST['Date'];
     $mysql->execute("update _tbl_member set `MemberSurname`='".$_POST['SurName']."',  
                                             `Sex`='".$_POST['Sex']."',  
                                             `MemberMobileNumber`='".$_POST['MemberMobileNumber']."', 
                                             `EmailID`='".$_POST['EmailID']."',  
                                             `AddressLine1`='".$_POST['AddressLine1']."', 
                                             `AddressLine2`='".$_POST['AddressLine2']."', 
                                             `DateofBirth`='".$DateofBirth."', 
                                             `City`='".$_POST['City']."',  
                                             `State`='".$_POST['State']."', 
                                             `PinCode`='".$_POST['PinCode']."' where `MemberID`='".$_SESSION['User']['MemberID']."'");
                                             
     echo "Updated successfully";
 ?>
     <Script>
          setTimeout(function(){
          location.href='MyProfile.php';
          },1000);
          </script>
     <?php
     exit;
 }
 //SurName 
 $myprofile = $mysql->select("Select * from _tbl_member where MemberID='".$_SESSION['User']['MemberID']."'");
 ?>
<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" style="padding-top:10px;padding-bottom:10px">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card-title">
                                        Edit My Profile
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="" method="post">
                            <div>
                                <div class="form-group row">
                                    <div class="col-sm-3">Member ID</div>
                                    <div class="col-sm-9">
                                        <input type="text" disabled='disabled' style="background:#fff;border:1px solid #fff" class="form-control" value="<?php echo $myprofile[0]['MemberCode'];?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-3">Member Name</div>
                                    <div class="col-sm-9">
                                        <input type="text"  disabled='disabled' style="background:#fff;border:1px solid #fff" class="form-control" value="<?php echo $myprofile[0]['MemberName'];?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-3">Sur Name</div>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="SurName" value="<?php echo $myprofile[0]['MemberSurname'];?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-3">Date of Birth</div>
                                    <div class="col-sm-9">
                                        <table>
                                            <tr>
                                                <td>
                                                <?php 
                                                    $date = date("d",strtotime($myprofile[0]['DateofBirth']));
                                                    $month = date("m",strtotime($myprofile[0]['DateofBirth']));
                                                    $year = date("Y",strtotime($myprofile[0]['DateofBirth']));
                                                ?>
                                                    <select name="Date"  class="form-control" >
                                                        <option value="01" <?php echo ($date==1) ? " selected='selected' " : "";?> >01</option>
                                                        <option value="02" <?php echo ($date==2) ? " selected='selected' " : "";?> >02</option>
                                                        <option value="03" <?php echo ($date==3) ? " selected='selected' " : "";?> >03</option>
                                                        <option value="04" <?php echo ($date==4) ? " selected='selected' " : "";?> >04</option>
                                                        <option value="05" <?php echo ($date==5) ? " selected='selected' " : "";?> >05</option>
                                                        <option value="06" <?php echo ($date==6) ? " selected='selected' " : "";?> >06</option>
                                                        <option value="07" <?php echo ($date==7) ? " selected='selected' " : "";?> >07</option>
                                                        <option value="08" <?php echo ($date==8) ? " selected='selected' " : "";?> >08</option>
                                                        <option value="09" <?php echo ($date==9) ? " selected='selected' " : "";?> >09</option>
                                                        <option value="10" <?php echo ($date==10) ? " selected='selected' " : "";?> >10</option>
                                                        <option value="11" <?php echo ($date==11) ? " selected='selected' " : "";?> >11</option>
                                                        <option value="12" <?php echo ($date==12) ? " selected='selected' " : "";?> >12</option>
                                                        <option value="13" <?php echo ($date==13) ? " selected='selected' " : "";?> >13</option>
                                                        <option value="14" <?php echo ($date==14) ? " selected='selected' " : "";?> >14</option>
                                                        <option value="15" <?php echo ($date==15) ? " selected='selected' " : "";?> >15</option>
                                                        <option value="16" <?php echo ($date==16) ? " selected='selected' " : "";?> >16</option>
                                                        <option value="17" <?php echo ($date==17) ? " selected='selected' " : "";?> >17</option>
                                                        <option value="18" <?php echo ($date==18) ? " selected='selected' " : "";?> >18</option>
                                                        <option value="19" <?php echo ($date==19) ? " selected='selected' " : "";?> >19</option>
                                                        <option value="20" <?php echo ($date==20) ? " selected='selected' " : "";?> >20</option>
                                                        <option value="21" <?php echo ($date==21) ? " selected='selected' " : "";?> >21</option>
                                                        <option value="22" <?php echo ($date==22) ? " selected='selected' " : "";?> >22</option>
                                                        <option value="23" <?php echo ($date==23) ? " selected='selected' " : "";?> >23</option>
                                                        <option value="24" <?php echo ($date==24) ? " selected='selected' " : "";?> >24</option>
                                                        <option value="25" <?php echo ($date==25) ? " selected='selected' " : "";?> >25</option>
                                                        <option value="26" <?php echo ($date==26) ? " selected='selected' " : "";?> >26</option>
                                                        <option value="27" <?php echo ($date==27) ? " selected='selected' " : "";?> >27</option>
                                                        <option value="28" <?php echo ($date==28) ? " selected='selected' " : "";?> >28</option>
                                                        <option value="29" <?php echo ($date==29) ? " selected='selected' " : "";?> >29</option>
                                                        <option value="30" <?php echo ($date==30) ? " selected='selected' " : "";?> >30</option>
                                                        <option value="31" <?php echo ($date==31) ? " selected='selected' " : "";?> >31</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <select name="Month"  class="form-control" >
                                                        <option value="01" <?php echo ($month==1) ? " selected='selected' " : "";?> >Jan</option>
                                                        <option value="02" <?php echo ($month==2) ? " selected='selected' " : "";?>>Feb</option>
                                                        <option value="03" <?php echo ($month==3) ? " selected='selected' " : "";?>>Mar</option>
                                                        <option value="04" <?php echo ($month==4) ? " selected='selected' " : "";?>>Apr</option>
                                                        <option value="05" <?php echo ($month==5) ? " selected='selected' " : "";?>>May</option>
                                                        <option value="06" <?php echo ($month==6) ? " selected='selected' " : "";?>>Jun</option>
                                                        <option value="07" <?php echo ($month==7) ? " selected='selected' " : "";?>>Jly</option>
                                                        <option value="08" <?php echo ($month==8) ? " selected='selected' " : "";?>>Aug</option>
                                                        <option value="09" <?php echo ($month==9) ? " selected='selected' " : "";?>>Sep</option>
                                                        <option value="10" <?php echo ($month==10) ? " selected='selected' " : "";?>>Oct</option>
                                                        <option value="11" <?php echo ($month==11) ? " selected='selected' " : "";?>>Nov</option>
                                                        <option value="12" <?php echo ($month==12) ? " selected='selected' " : "";?>>Dec</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <select name="Year"  class="form-control" >
                                                        <?php for($i=date("Y")-18;$i>date("Y")-80;$i--) { ?>
                                                        <option value="<?php echo $i;?>" <?php echo ($year==$i) ? " selected='selected' " : "";?>><?php echo $i;?></option>
                                                        <?php } ?>
                                                    </select>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-3">Sex</div>                 
                                    <div class="col-sm-9">
                                        <select name="Sex"  class="form-control" >
                                            <option value="Male" <?php echo ($myprofile[0]['Sex']=="Male" ? " selected='selected' " : "");?>>Male</option>
                                            <option value="Female" <?php echo ($myprofile[0]['Sex']=="Female" ? " selected='selected' " : "");?>>Female</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-3">Mobile Number</div>              
                                    <div class="col-sm-9">
                                        <input type="text" name="MemberMobileNumber"  class="form-control" value="<?php echo $myprofile[0]['MemberMobileNumber'];?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-3">Email ID</div>                     
                                    <div class="col-sm-9">
                                        <input type="text" name="EmailID"  class="form-control" value="<?php echo $myprofile[0]['EmailID'];?>">
                                    </div>
                                </div>
                                <div class="form-group row">                                 
                                    <div class="col-sm-3">Address Line 1</div>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="AddressLine1" value="<?php echo $_SESSION['User']['AddressLine1'];?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-sm-3">Address Line 2</div>                 
                                    <div class="col-sm-9">
                                        <input type="text"  class="form-control" name="AddressLine2" value="<?php echo $myprofile[0]['AddressLine2'];?>">
                                    </div>
                                </div>
                                 <div class="form-group row">
                                    <div class="col-sm-3">City Name</div>                    
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="City" value="<?php echo $myprofile[0]['City'];?>">
                                    </div>
                                </div>
                                  <div class="form-group row">
                                    <div class="col-sm-3">State Name</div>    
                                    <div class="col-sm-9">
                                        <input type="text"  class="form-control" name="State" value="<?php echo $myprofile[0]['State'];?>">
                                    </div>
                                </div>
                                  <div class="form-group row">
                                    <div class="col-sm-3">Pin Code</div>
                                    <div class="col-sm-9">
                                        <input type="text"   class="form-control" name="PinCode" value="<?php echo $myprofile[0]['PinCode'];?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                   <div class="col-sm-12"><button type="submit" class="btn btn-primary" name="updateBtn">Update Profile</button></div>
                                </div>
                            </div>
                            </form>
                        </div>
                    </div>                                                                                             
                </div>
            </div>
        </div>
    </div>
</div>
 