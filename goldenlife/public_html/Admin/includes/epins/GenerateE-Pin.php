
    <div class="app-main__outer">
        <div class="app-main__inner">
            <div class="app-page-title">
                <div class="page-title-wrapper">
                    <div class="page-title-heading">
                       
                        <div>Generate   E-Pins</div>
                    </div>
                </div>
            </div>                             
        
        <?php
 

 if (isset($_POST['Generate'])) {
   
     $Nopin=$_POST['NumberOfPin'];
     
           {
            $package = $mysql->select("select * from `_tbl_epin_package` where `packageid`='".$_POST['Package']."'");
            
             
            
            for($n=0;$n<$Nopin;$n++) {
                $PinCode = strtoupper(md5(SeqMaster::GetNextPinCode()));    
                $Pin = substr($PinCode,0,10);                                                            
                $PinPassword = strtolower(substr($PinCode,11,6));
                
                $Pin = $mysql->insert("_tbl_epins",array("PinCode"         => $Pin,
                                                         "EPinPassword"    => $PinPassword,
                                                         "GeneratedByID"   => "0",
                                                         "GeneratedByName" => "0",
                                                         "IsSold"          => "0",
                                                         "SoldMemberID"    => "0",
                                                         "SoldMemberCode"  => "0",
                                                         "SoldMemberName"  => "0",
                                                         "PinValue"        => $package[0]['PackageValue'],
                                                         "PinPackageName"  => $package[0]['PackageName'],
                                                         "PinPackageID"    => $package[0]['packageid'],
                                                         "GeneratedOn"     => date("Y-m-d H:i:s")));
            }
            if ($Pin>0) {
                 echo "<div class='alert alert-success fade show' role='alert'><button type='button' class='close' aria-label='Close' data-dismiss='alert'><span aria-hidden='true'>x</span></button>Successfully created</div>";
            } else {                                                                    
                 echo "<div class='alert alert-danger fade show' role='alert'><button type='button' class='close' aria-label='Close' data-dismiss='alert'><span aria-hidden='true'>x</span></button>Error: Couldn't able to create</div>";
            }
        }
 }
?>
            <div class="tab-content" id="gencode">
                        <div class="tab-pane tabs-animation fade active show" id="tab-content-1" role="tabpanel">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="main-card mb-3 card">
                                        <div class="card-body"> 
                                        
                                        
                                           
                                            
                                            <form method="post">
                                               
                                        
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
 