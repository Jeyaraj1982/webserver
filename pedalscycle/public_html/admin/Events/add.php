
<script>
    $(document).ready(function () {
        $("#ProductName").blur(function () {
            //IsNonEmpty("ProductName","ErrProductName","Please Enter Product Name");
        });
        $("#ProductPrice").blur(function () {
            if(IsNonEmpty("ProductPrice","ErrProductPrice","Please Enter Product Price")){
                
            }
        });
    });
    
    function SubmitProduct() {
        ErrorCount=0;    
        $('#ErrProductName').html("");
        $('#ErrProductPrice').html("");
        
        if(IsNonEmpty("ProductName","ErrProductName","Please Enter Product Name")){
           //IsAlphaNumeric("ProductName","ErrProductName","Please Enter Alpha Numerics Character"); 
        }
        
        if(IsNonEmpty("ProductPrice","ErrProductPrice","Please Enter Product Price")){
           //IsNumeric("PackagePrice","ErrPackagePrice","Please Enter Numerics Character"); 
        }
        return (ErrorCount==0) ? true : false;
    }
</script>
    <div class="main-panel">
        <div class="container">                                                                  
            <div class="page-inner">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-title">Add Event</div>
                            </div>
                            <?php
                                if (isset($_POST['btnsubmit'])) {
                                    $ErrorCount =0;
                                    
                                    $duppackage = $mysql->select("select * from _tbl_events where EventTitle='".$_POST['EventTitle']."' ");
                                    if(sizeof($duppackage)>0){
                                         echo errorMessage("EventTitle already exists");
                                         $ErrorCount++;
                                    }
                                        
                                    if($ErrorCount==0) {
                                        
                                        $id = $mysql->insert("_tbl_events",array("EventTitle"    => $_POST['EventTitle'],
                                                                                 "EventDate"     => $_POST['Y']."-".$_POST['M']."-".$_POST['D'],
                                                                                 "StartingPoint" => $_POST['StartingPoint'],
                                                                                 "EndingPoint"   => $_POST['EndingPoint'],
                                                                                 "Routes"        => $_POST['Routes'],
                                                                                 "Description"   => $_POST['Description'],
                                                                                 "AddedOn"       => date("Y-m-d H:i:s")));
                                        if(sizeof($id)>0){
                                            unset($_POST);
                                            echo successMessage('Event Added Successfully');
                                        } else {
                                            echo errorMessage("Error Adding Event"); 
                                        }                                                                                    
                                    }                                                                                    
                                }
                            $month = array("","JAN","FEB","MAR","APR","MAY","JUN","JLY","AUG","SEP","OCT","NOV","DEC");
                            ?>
                            <form id="exampleValidation" method="POST" action="" onsubmit="return SubmitProduct();" id="addProduct" enctype="multipart/form-data">
                                <div class="card-body">
                                
                                 <div class="form-group form-show-validation row">
                                        <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Event Date<span class="required-label">*</span></label>
                                        <div class="col-lg-3 col-md-9 col-sm-8">
                                            <select class="form-control" name="D" id="D">
                                            <?php for($i=1;$i<=31;$i++) { ?>
                                                <option value="<?php echo $i;?>"><?php echo $i;?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col-lg-3 col-md-9 col-sm-8">
                                            <select class="form-control" name="M" id="M">
                                                <?php for($i=1;$i<=12;$i++) { ?>
                                                <option value="<?php echo $i;?>"><?php echo $month[$i];?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col-lg-3 col-md-9 col-sm-8">
                                            <select class="form-control" name="Y" id="Y">
                                                <?php for($i=2021;$i<=date("Y")+1;$i++) { ?>
                                                <option value="<?php echo $i;?>"><?php echo $i;?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="form-group form-show-validation row">
                                        <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Event Title<span class="required-label">*</span></label>
                                        <div class="col-lg-9 col-md-9 col-sm-8">
                                            <input type="text" class="form-control" id="EventTitle" name="EventTitle" placeholder="Enter Event Title" value="<?php echo (isset($_POST['EventTitle']) ? $_POST['EventTitle'] :"");?>">
                                            <span class="errorstring" id="ErrEventTitle"><?php echo isset($ErrEventTitle)? $ErrEventTitle : "";?></span>
                                        </div>
                                     
                                        
                                    </div>
                                    
                                    
                                     <div class="form-group form-show-validation row">
                                     
                                     <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Starting Point<span class="required-label">*</span></label>
                                        <div class="col-lg-3 col-md-9 col-sm-8">
                                            <input type="text" class="form-control" id="StartingPoint" name="StartingPoint" placeholder="Enter Starting Point" value="<?php echo (isset($_POST['StartingPoint']) ? $_POST['StartingPoint'] :"");?>">
                                            <span class="errorstring" id="ErrStartingPoint"><?php echo isset($ErrStartingPoint)? $ErrStartingPoint : "";?></span>
                                        </div>
                                        
                                        <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Ending Point<span class="required-label">*</span></label>
                                        <div class="col-lg-3 col-md-9 col-sm-8">
                                            <input type="text" class="form-control" id="EndingPoint" name="EndingPoint" placeholder="Enter Ending Point" value="<?php echo (isset($_POST['EndingPoint']) ? $_POST['EndingPoint'] :"");?>">
                                            <span class="errorstring" id="ErrEndingPoint"><?php echo isset($ErrEndingPoint)? $ErrEndingPoint : "";?></span>
                                        </div>
                                    </div>
                                    
                                    
                                     <div class="form-group form-show-validation row">
                                        <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Routes<span class="required-label">*</span></label>
                                        <div class="col-lg-9 col-md-9 col-sm-8">
                                            <input type="text" class="form-control" id="Routes" name="Routes" placeholder="Enter Routes" value="<?php echo (isset($_POST['Routes']) ? $_POST['Routes'] :"");?>">
                                            <span class="errorstring" id="ErrRoutes"><?php echo isset($ErrRoutes)? $ErrRoutes : "";?></span>
                                        </div>
                                    </div>
                                    
                                       <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Description<span class="required-label">*</span></label>
                                            <div class="col-lg-9 col-md-9 col-sm-8">
                                                <textarea name="Description" style="height: 200px !important" id="Description" class="form-control"><?php echo (isset($_POST['Description']) ? $_POST['Description'] :$data[0]['Description']);?></textarea>
                                            </div>
                                        </div>     
                                    
                                </div>
                                <div class="card-action">       
                                    <div class="row">                                       
                                        <div class="col-md-12">
                                            <input class="btn btn-warning" type="submit" name="btnsubmit" value="Add Event">&nbsp;
                                            <a href="dashboard.php?action=Events/list" class="btn btn-warning btn-border">Back</a>
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
    <?php include_once("footer.php");?>