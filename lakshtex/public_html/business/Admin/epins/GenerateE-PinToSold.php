<style>#gencode{display:none}</style>
<?php 
 if (isset($_POST['submitMember'])) {
    
 $member =    $mysql->select("select * from _tbl_member where MemberCode='".$_POST['MemberCode']."'");
 if (sizeof($member)==0) {
       $errorMessage =  "Invalid member code. Please enter valid member code.";
 } else {
     ?>
     <style>#memform{display:none}</style>
     <style>#gencode{display:block}</style>
     <?php
 }
}
 if (isset($_POST['Generate'])) {
   
     $Nopin=$_POST['NumberOfPin'];
     $member =    $mysql->select("select * from _tbl_member where MemberCode='".$_POST['MemberCode']."'"); 
           {
            $package = $mysql->select("select * from `_tbl_epin_package` where `packageid`='".$_POST['Package']."'");
            
             
            
            for($n=0;$n<$Nopin;$n++) {
                $PinCode = strtoupper(md5(SeqMaster::GetNextPinCode()));    
                $Pin = substr($PinCode,0,10);                                                            
                $PinPassword = strtolower(substr($PinCode,11,6));
                
                $Pin = $mysql->insert("_tbl_epins",array("PinCode"         => $Pin,
                                                         "EPinPassword"    => $PinPassword,
                                                         "GeneratedByID"   => $_SESSION['User']['AdminID'],
                                                         "GeneratedByName" => "Admin",
                                                         "IsSold"          => "1",
                                                         "SoldMemberID"    => $member[0]['MemberID'],
                                                         "SoldMemberCode"  => $member[0]['MemberCode'],
                                                         "SoldMemberName"  => $member[0]['MemberName'],
                                                         "SoldOn"          => date("Y-m-d H:i:s"),
                                                         "PinValue"        => $package[0]['PackageValue'],
                                                         "PinPackageName"  => $package[0]['PackageName'],
                                                         "PinPackageID"    => $package[0]['packageid'],
                                                         "GeneratedOn"     => date("Y-m-d H:i:s")));
            }
            if ($Pin>0) {
                ?>     <style>#memform{display:none}</style>
                    <style>#gencode{display:block}</style>
                <?php
                $successmessage = "<div class='success'>
                
              ".$Nopin." epins Generated successfully.
                
                
                </div>";
                ?>
                     <style>
                     #epin_generateform {display:none}
                     </style>
                <?php
                unset($_POST);
            } else {                                                                    
                $errorMessage = "<div class='failure'>Error occured. Couldn't Generate</div>";
            }
        }
 }
                                            
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
                                        Generate and Sold E-Pins
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
                                            <input type="text" name="MemberCode" id="MemberCode" placeholder="MemberCode" class="form-control" value="<?php echo (isset($_POST['MemberCode']) ? $_POST['MemberCode'] : "");?>">
                                            <span class="errorstring" id="ErrCurrentPassword"><?php echo isset($errorMessage)? $errorMessage : "";?></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-12" style="text-align:center;color:green"><?php echo $successMessage ;?></div>
                                    </div>
                                    <div class="form-group row">
                                        <div class="col-sm-12" style="text-align:right"><button class="mb-2 mr-2 btn btn-primary" name="submitMember">Next</button></div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>                                                                                             
                </div>
            </div>
            <div class="row" id="gencode">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <div>
                                <?php echo $member[0]['MemberCode'];?><br>
                                <?php echo $member[0]['MemberName'];?><br>
                            </div>
                            <form method="post">
                                <input type="hidden" name="MemberCode" value="<?php echo $member[0]['MemberCode'];?>">
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <?php echo $successmessage;?><?php echo $errorMessage;?> 
                                    </div>
                                </div>
                                <div id="epin_generateform">
                                    <div class="form-group row" >
                                       <div class="col-sm-3">No of Pin</div>
                                        <div class="col-sm-9">
                                            <select name="NumberOfPin" id="NumberOfPin" class="form-control">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                                <option value="10">10</option>
                                                <option value="11">11</option>
                                                <option value="12">12</option>
                                                <option value="13">13</option>
                                                <option value="14">14</option>
                                                <option value="15">15</option>
                                                <option value="16">16</option>
                                                <option value="17">17</option>
                                                <option value="18">18</option>
                                                <option value="19">19</option>
                                                <option value="20">20</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                       <div class="col-sm-3">Cost of Pin</div>
                                        <div class="col-sm-9">
                                            <div class="input-group">                        
                                            <select name="Package" id="Package" class="form-control">
                                            <?php foreach($mysql->select("select * from _tbl_epin_package") as $package) {?>
                                               <option value="<?php echo $package['packageid'];?>"><?php echo $package['PackageName']." (Rs. ".$package['PackageValue'].")";?></option>
                                            <?php } ?>
                                            </select>
                                            <!--<div class="input-group-prepend"><span class="input-group-text">RS</span></div>
                                            <input  type="text" name="CostOfPin" id="CostOfPin" placeholder="Cost Of Pin" class="form-control" value="<?php echo (isset($_POST['CostOfPin']) ? $_POST['CostOfPin'] : "");?>">
                                            <div class="input-group-append"><span class="input-group-text">.00</span></div>    -->
                                            </div>
                                            <span class="errorstring" id="ErrCostOfPin"><?php echo isset($ErrCostOfPin)? $ErrCostOfPin : "";?></span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                       <div class="col-sm-12"><button class="btn btn-primary" name="Generate">Generate E-Pins</button></div>
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


 