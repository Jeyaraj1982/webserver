<?php include_once("header.php");?>
<?php
 if (isset($_POST['Generate'])) {
   
     $Nopin=$_POST['NumberOfPin'];
     
     if (!($Nopin>= 10 && $Nopin<= 100)){
             $ErrNumberOfPin="Please enter number of epin";    
             $ErrorCount++;
        } 
        if ($ErrorCount==0) {
        $errorMessage="<div class='failure'>Your withdrawable Balance is too low to generate epin. Your withdrawable balance Rs. 0.00</div>";    
             $ErrorCount++;
             }
        
        if ($ErrorCount==0)   {
            $package = $mysql->select("select * from _tbl_epin_package where PackageID='".$_POST['Package']."'");
            
            for($n=0;$n<$Nopin;$n++) {
                $PinCode = strtoupper(md5(SeqMaster::GetNextPinCode()));    
                $Pin = substr($PinCode,0,10);                                                            
                $PinPassword = strtolower(substr($PinCode,11,6));
                
                $Pin = $mysql->insert("_tbl_epins",array("PinCode"         => $Pin,
                                                         "EPinPassword"    => $PinPassword,
                                                         "GeneratedByID"   => $_SESSION['User']['MemberID'],
                                                         "GeneratedByName" => $_SESSION['User']['MemberName'],
                                                         "CreatedByCode"   => $_SESSION['User']['MemberCode'],
                                                         "PinValue"        => $package[0]['PackageValue'],
                                                         "PinPackageName"  => $package[0]['PackageName'],
                                                         "PinPackageID"    => $package[0]['PackageID'],
                                                         "GeneratedOn"     => date("Y-m-d H:i:s")));
            }
            if ($Pin>0) {
                $successmessage = "<div class='success'>
                
                Generated successfully
                
                
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
<script>
    $(document).ready(function () {
  $("#NumberOfPin").keypress(function (e) {
     if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
        $("#ErrNumberOfPin").html("Digits Only").fadeIn().fadeIn("fast");
               return false;
    }
   });
   });
</script>
       <div class="app-main__outer">
                <div class="app-main__inner">
                    <div class="app-page-title">
                        <div class="page-title-wrapper">
                            <div class="page-title-heading">
                                <div class="page-title-icon">
                                    <i class="pe-7s-display1 icon-gradient bg-premium-dark">
                                    </i>                                                         
                                </div>
                                <div>Generate E-Pin </div>
                            </div>
                           </div>
                    </div>        
                    <div class="tab-content">
                        <div class="tab-pane tabs-animation fade active show" id="tab-content-1" role="tabpanel">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="main-card mb-3 card">
                                        <div class="card-body"> 
                                            <div>
                                            <form method="post">
                                            <div class="form-group row">
                                                <div class="col-sm-12">
                                                    <?php echo $successmessage;?><?php echo $errorMessage;?> 
                                                </div>
                                            </div>
                                            <div id="epin_generateform">
                                                <div class="form-group row" >
                                                   <div class="col-sm-3">No of Pin</div>
                                                    <div class="col-sm-9">
                                                        <input  type="text" name="NumberOfPin" id="NumberOfPin" placeholder="Number Of Pin" class="form-control" value="<?php echo (isset($_POST['NumberOfPin']) ? $_POST['NumberOfPin'] : "");?>">
                                                        <span class="errorstring" id="ErrNumberOfPin"><?php echo isset($ErrNumberOfPin)? $ErrNumberOfPin : "";?></span>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                   <div class="col-sm-3">Cost of Pin</div>
                                                    <div class="col-sm-9">
                                                        <div class="input-group">                        
                                                        <select name="Package" class="form-control">
                                                        <?php foreach($mysql->select("select * from _tbl_epin_package") as $package) {?>
                                                           <option value="<?php echo $package['PackageID'];?>"><?php echo $package['PackageName']." (Rs. ".$package['PackageValue'].")";?></option>
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
                                                   <div class="col-sm-12"><button class="mb-2 mr-2 btn btn-gradient-primary" name="Generate">Generate E-Pins</button></div>
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
                </div>
 <?php include_once("footer.php");?>