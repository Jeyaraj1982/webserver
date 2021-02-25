<?php
include_once("header.php");
include_once("LeftMenu.php"); 
    $month = array("","JAN","FEB","MAR","APR","MAY","JUN","JLY","AUG","SEP","OCT","NOV","DEC");
$data= $mysql->Select("select * from _tbl_events where md5(EventID)='".$_GET['id']."'");
    
?>
<script>
function getSubTourTypes(TourTypeID,SubTourTypeID) {
        $.ajax({url:'webservice.php?action=getSubTourTypes&TourTypeID='+TourTypeID+'&SubTourTypeID='+SubTourTypeID,success:function(data){
            $('#div_subtourtype').html(data);
            $('#ErrSubTourType').html('');
        }});
    }
$(document).ready(function () {
    $("#TourTheme").blur(function () {
       var TourTheme = $('#TourTheme').val().trim();
        if (TourTheme=="0") {
            $('#ErrTourTheme').html("Please Select Tour Theme");   
        }else{
            $('#ErrTourTheme').html("");
        }
    });
    $("#TourType").blur(function () {
       var TourType = $('#TourType').val().trim();
        if (TourType=="0") {
            $('#ErrTourType').html("Please Select TourType");   
        }else{
            $('#ErrTourType').html("");
        }
    });
    $("#SubTourType").blur(function () {
       var SubTourType = $('#SubTourType').val().trim();
        if (SubTourType=="0") {
            $('#ErrSubTourType').html("Please Select Sub Tour Type");   
        }else{
            $('#ErrSubTourType').html("");
        }
    });
    $("#PackageName").blur(function () {
        if(IsNonEmpty("PackageName","ErrPackageName","Please Enter Package Name")){
           IsAlphaNumeric("SubPackageName","ErrPackageName","Please Enter Alpha Numerics Character"); 
        }
    });
    $("#PackagePrice").blur(function () {
        if(IsNonEmpty("PackagePrice","ErrPackagePrice","Please Enter Package Price")){
          // IsNumeric("PackagePrice","ErrPackagePrice","Please Enter Numerics Character"); 
        }
    });
    
});
function SubmitProduct() {
        ErrorCount=0;    
        $('#ErrTourTheme').html("");
        $('#ErrTourType').html("");
        $('#ErrSubTourType').html("");
        $('#ErrPackageName').html("");
        $('#ErrPackagePrice').html("");
        
         var TourTheme = $('#TourTheme').val().trim();
        if (TourTheme=="0") {
            $('#ErrTourTheme').html("Please Select Tour Theme");   
            ErrorCount++;      
        }else{
            $('#ErrTourTheme').html("");
        }
        var TourType = $('#TourType').val().trim();
        if (TourType=="0") {
            $('#ErrTourType').html("Please Select TourType");   
            ErrorCount++;      
        }else{
            $('#ErrTourType').html("");
        }
        var SubTourType = $('#SubTourType').val().trim();
        if (SubTourType=="0") {
            $('#ErrSubTourType').html("Please Select Sub Tour Type");
            ErrorCount++;    
        }else{
            $('#ErrSubTourType').html("");
        }
        
        if(IsNonEmpty("PackageName","ErrPackageName","Please Enter Package Name")){
           IsAlphaNumeric("SubPackageName","ErrPackageName","Please Enter Alpha Numerics Character"); 
        }
        if(IsNonEmpty("PackagePrice","ErrPackagePrice","Please Enter Package Price")){
         //  IsNumeric("PackagePrice","ErrPackagePrice","Please Enter Numerics Character"); 
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
                                    <div class="card-title">Edit Event</div>
                                </div>
                                <form id="exampleValidation" method="POST" action="" onsubmit="return SubmitProduct();" id="addProduct" enctype="multipart/form-data">
                                    <div class="card-body">
                                    <?php
                                        if (isset($_POST['btnsubmit'])) {
        $ErrorCount =0;
            
            $dupevents = $mysql->select("select * from _tbl_events where EventTitle='".$_POST['EventTitle']."' and EventID<>'".$data[0]['EventID']."'");
            if(sizeof($dupEvents)>0){
               
            }
            
            if($ErrorCount==0){
                
                
                  
            
              
              
               $Description = str_replace("'","\'",$_POST['Description']);
               $Description = str_replace('"','\"',$Description);
               
       
                                                    
               $mysql->execute("update _tbl_events set `EventTitle`     ='".$_POST['EventTitle']."',
                                                        `EventDate`     ='".$_POST['Y']."-".$_POST['M']."-".$_POST['D']."',
                                                        `StartingPoint`       ='".$_POST['StartingPoint']."',
                                                        `EndingPoint`       ='".$_POST['EndingPoint']."',
                                                        `Routes`       ='".$_POST['Routes']."',
                                                        `Description`      ='".$Description."',
                                                        `IsPublish`        ='".$_POST['IsPublish']."' where EventID='".$data[0]['EventID']."'");
               
                        echo successMessage("Event Updated Successfully");
                     } else {
                        echo errorMessage("Error update event"); 
                     }
            }
        $data= $mysql->Select("select * from _tbl_events where md5(EventID)='".$_GET['id']."'");
                                    ?>
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Package Name<span class="required-label">*</span></label>
                                            <div class="col-lg-9 col-md-9 col-sm-8">
                                                <input type="text" class="form-control" id="EventTitle" name="EventTitle" placeholder="Enter Event Title" value="<?php echo (isset($_POST['EventTitle']) ? $_POST['EventTitle'] : $data[0]['EventTitle']);?>">
                                                <span class="errorstring" id="ErrEventTitle"><?php echo isset($ErrEventTitle)? $ErrProdcutName : "";?></span>
                                            </div>
                                        </div> 
                                     
                                     <div class="form-group form-show-validation row">
                                        <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Event Date<span class="required-label">*</span></label>
                                        <div class="col-lg-3 col-md-9 col-sm-8">
                                            <select class="form-control" name="D" id="D">
                                            <?php for($i=1;$i<=31;$i++) { ?>
                                                <option value="<?php echo $i;?>"  <?php echo date("d",strtotime($data[0]['EventDate']))==$i ? ' selected="selected" ' : ''; ?> ><?php echo $i;?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col-lg-3 col-md-9 col-sm-8">
                                            <select class="form-control" name="M" id="M"  >
                                                <?php for($i=1;$i<=12;$i++) { ?>
                                                <option value="<?php echo $i;?>" <?php echo date("m",strtotime($data[0]['EventDate']))==$i ? ' selected="selected" ' : ''; ?>><?php echo $month[$i];?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                        <div class="col-lg-3 col-md-9 col-sm-8">
                                            <select class="form-control" name="Y" id="Y">
                                                <?php for($i=2021;$i<=date("Y")+1;$i++) { ?>
                                                <option value="<?php echo $i;?>" <?php echo date("Y",strtotime($data[0]['EventDate']))==$i ? ' selected="selected" ' : ''; ?> ><?php echo $i;?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>    
                                       
                                       
                                          <div class="form-group form-show-validation row">
                                     
                                     <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Starting Point<span class="required-label">*</span></label>
                                        <div class="col-lg-3 col-md-9 col-sm-8">
                                            <input type="text" class="form-control" id="StartingPoint" name="StartingPoint" placeholder="Enter Starting Point" value="<?php echo (isset($_POST['StartingPoint']) ? $_POST['StartingPoint'] :$data[0]['StartingPoint']);?>">
                                            <span class="errorstring" id="ErrStartingPoint"><?php echo isset($ErrStartingPoint)? $ErrStartingPoint : "";?></span>
                                        </div>
                                        
                                        <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Ending Point<span class="required-label">*</span></label>
                                        <div class="col-lg-3 col-md-9 col-sm-8">
                                            <input type="text" class="form-control" id="EndingPoint" name="EndingPoint" placeholder="Enter Ending Point" value="<?php echo (isset($_POST['EndingPoint']) ? $_POST['EndingPoint'] :$data[0]['EndingPoint']);?>">
                                            <span class="errorstring" id="ErrEndingPoint"><?php echo isset($ErrEndingPoint)? $ErrEndingPoint : "";?></span>
                                        </div>
                                    </div>
                                    
                                    
                                     <div class="form-group form-show-validation row">
                                        <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Routes<span class="required-label">*</span></label>
                                        <div class="col-lg-9 col-md-9 col-sm-8">
                                            <input type="text" class="form-control" id="Routes" name="Routes" placeholder="Enter Routes" value="<?php echo (isset($_POST['Routes']) ? $_POST['Routes'] :$data[0]['Routes']);?>">
                                            <span class="errorstring" id="ErrRoutes"><?php echo isset($ErrRoutes)? $ErrRoutes : "";?></span>
                                        </div>
                                    </div>
                                    
                                       <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Description<span class="required-label">*</span></label>
                                            <div class="col-lg-9 col-md-9 col-sm-8">
                                                <textarea name="Description" style="height: 200px !important" id="Description" class="form-control"><?php echo (isset($_POST['Description']) ? $_POST['Description'] :$data[0]['Description']);?></textarea>
                                            </div>
                                        </div>   
                                       
                                       
                                       
                                       
                                       
                                       
                                       
                                       
                                       
                                       
                                       
                                       
                                       
                                       
                                       
                                       
                                             
                                        
                                        <div class="form-group form-show-validation row">
                                            <label for="name" class="col-lg-3 col-md-3 col-sm-4 mt-sm-2 text-left">Is publish<span class="required-label">*</span></label>
                                            <div class="col-lg-3 col-md-9 col-sm-8">
                                                <select class="form-control" name="IsPublish" id="IsPublish">
                                                    <option value="1" <?php echo (isset($_POST[ 'IsPublish'])) ? (($_POST[ 'IsPublish']=="1") ? " selected='selected' " : "") : (($data[0]['IsPublish']=="1") ? " selected='selected' " : "");?>>Yes</option>
                                                    <option value="0" <?php echo (isset($_POST[ 'IsPublish'])) ? (($_POST[ 'IsPublish']=="0") ? " selected='selected' " : "") : (($data[0]['IsPublish']=="0") ? " selected='selected' " : "");?>>No</option>
                                                </select>                                                                                                       
                                            </div>
                                            
                                        </div>
                                    </div>
                                    <div class="card-action">
                                        <div class="row">                                       
                                            <div class="col-md-12">
                                                <input class="btn btn-warning" type="submit" name="btnsubmit" value="Update Event">&nbsp;
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
 <script>
 $(document).ready(function(){
            getSubTourTypes('<?php echo $data[0]['TourTypeID'] ;?>','<?php echo $data[0]['SubTourTypeID'];?>');
         });
 </script>
        <?php include_once("footer.php");?>