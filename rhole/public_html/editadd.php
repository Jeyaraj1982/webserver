<?php
    include_once("header.php");
    $obj = new CommonController();
    
    $pageContent =JPostads::getMyAd($_GET['ad'],$_SESSION['USER']['userid']);
    
?>
<style>
#div_1,#div_2,#div_3,#div_4,#div_5,#div_6{
    margin-left:15px;border:1px solid #ccc;text-align: center;height: 96px;width: 96px;float:left;margin-right:10px;margin-bottom:10px;
}
 #div_1:hover,#div_2:hover,#div_3:hover,#div_4:hover,#div_5:hover,#div_6:hover {
    border:1px solid #306dc5; 
 }
 
</style>
<script>
    function getSubcategory(categoryID) {
        $.ajax({url:'<?php echo base_url;?>webservice.php?action=getSubcategory&categoryID='+categoryID,success:function(data){
            $('#_subcategory').html(data);
        }});
    }
    function getStateNames(CountryID) {
        $.ajax({url:'<?php echo base_url;?>webservice.php?action=getStateNames&countryid='+CountryID,success:function(data){
            $('#div_statenames').html(data);
            $('#district').html('<option value="0" selected="selected">Select District Name</option>');
        }});
    }
    function getDistrict(stateID) {
        $.ajax({url:'<?php echo base_url;?>webservice.php?action=getDistrict&stateID='+stateID,success:function(data){
            $('#div_districtnames').html(data);
             $('#city').html('<option value="0" selected="selected">Select City Name</option>');
        }});
    }
    function getCityName(districtID) {
        $.ajax({url:'<?php echo base_url;?>webservice.php?action=getcityname&districtID='+districtID,success:function(data){
            $('#div_citynames').html(data);
        }});
    }
</script>
<script>
$(document).ready(function(){
        
        $("#title").blur(function() {
            $('#Errtitle').html("");   
            var title = $('#title').val().trim();
            if (title.length==0) {
                $('#Errtitle').html("Please Enter Title"); 
            } 
        });
        
        $("#content").blur(function(){
            $('#Errcontent').html("");
            var m = $('#content').val().trim();
            if (m.length==0) {
                $('#Errcontent').html("Please Enter Description");
            }
        });
        $("#image1").blur(function(){
            $('#Errimage1').html("");
            $('#div_1').css({"border": "1px solid #ccc"});
            var m = $('#image1').val().trim();
            if (m=="") {
                $('#Errimage1').html("Please Upload Image");
                $('#div_1').css({"border": "1px solid red"});
            }
        });
        
       $("#countryid").blur(function(){     
           $('#Errcountryid').html("");   
        var cnt = $('#countryid').val().trim();
            if (cnt==0) {
                $('#Errcountryid').html("Please Select Country");
            }
        });
        $("#state").blur(function(){   
         $('#Errstate').html("");  
        var st = $('#state').val().trim();
            if (st==0) {
                $('#Errstate').html("Please Select State");
            }
        });
        $("#district").blur(function(){    
            $('#Errdistrict').html("");  
        var ds = $('#district').val().trim();
            if (ds==0) {
                $('#Errdistrict').html("Please Select District");
            }
        });
        $("#city").blur(function(){  
        $('#Errcity').html("");    
        var cty = $('#city').val().trim();
            if (cty==0) {
                $('#Errcity').html("Please Select City");
            }
        });
        $("#location").blur(function(){   
        $('#Errlocation').html("");     
        var loc = $('#location').val().trim();
            if (loc.length==0) {
                $('#Errlocation').html("Please Enter Location");
            } 
        });
        <?php if($pageContent[0]['subcateid']!="77") {?>
        $("#amount").blur(function(){    
        var amt = $('#amount').val().trim();
        $('#Erramount').html("");
        if (amt.length==0) {
                $('#Erramount').html("Please enter Amount");
            } else {
                if (!(parseFloat(amt)>=10 && parseFloat(amt)<=1000000)) {
                    $('#Erramount').html("Amount must have Rs.10 to  Rs.1000000");
                }
            }   
        });
        <?php } ?>
        <?php if($pageContent[0]['subcateid']=="20" || $pageContent[0]['subcateid']=="21" || $pageContent[0]['subcateid']=="4" || $pageContent[0]['subcateid']=="22") {?>
        $("#SuperBuildUpArea").blur(function(){     
           $('#ErrSuperBuildUpArea').html("");   
        var cnt = $('#SuperBuildUpArea').val().trim();
            if (cnt==0) {
                $('#ErrSuperBuildUpArea').html("Please Enter Super Build Up Area");
            }
        });
        $("#CarpetArea").blur(function(){     
           $('#ErrCarpetArea').html("");   
        var cnt = $('#CarpetArea').val().trim();
            if (cnt==0) {
                $('#ErrCarpetArea').html("Please Enter Carpet Area");
            }
        });
        <?php } ?>
        <?php if($pageContent[0]['subcateid']=="96") {?>
        $("#Brand").blur(function(){     
           $('#ErrBrand').html("");   
        var cnt = $('#Brand').val().trim();
            if (cnt==0) {
                $('#ErrBrand').html("Please Select Brand Name");
            }
        });
        <?php } ?>
        <?php if($pageContent[0]['subcateid']=="24") {?>
        $("#PlotArea").blur(function(){     
           $('#ErrPlotArea').html("");   
        var cnt = $('#PlotArea').val().trim();
            if (cnt==0) {
                $('#ErrPlotArea').html("Please Select Plot Area");
            }
        });
        <?php } ?>
        <?php if($pageContent[0]['subcateid']=="60" || $pageContent[0]['subcateid']=="61") { ?>
        $("#Brand").blur(function(){     
           $('#ErrBrand').html("");   
        var cnt = $('#Brand').val().trim();
            if (cnt==0) {
                $('#ErrBrand').html("Please Select Brand Name");
            }
        });
        $("#Year").blur(function() {
            $('#ErrYear').html("");   
            var title = $('#Year').val().trim();
            if (title.length==0) {
                $('#ErrYear').html("Please Enter Year"); 
            } 
        });
        $("#KMDriven").blur(function() {
            $('#ErrKMDriven').html("");   
            var KMDriven = $('#KMDriven').val().trim();
            if (KMDriven.length==0) {
                $('#ErrKMDriven').html("Please Enter KMDriven"); 
            } 
        });
        <?php } ?>
        <?php if($pageContent[0]['subcateid']=="62" || $pageContent[0]['subcateid']=="65" || $pageContent[0]['subcateid']=="66") { ?>
        
        $("#Year").blur(function() {
            $('#ErrYear').html("");   
            var title = $('#Year').val().trim();
            if (title.length==0) {
                $('#ErrYear').html("Please Enter Year"); 
            } 
        });
        $("#KMDriven").blur(function() {
            $('#ErrKMDriven').html("");   
            var KMDriven = $('#KMDriven').val().trim();
            if (KMDriven.length==0) {
                $('#ErrKMDriven').html("Please Enter KMDriven"); 
            } 
        });
        <?php } ?>
        
        
    });
    
    function dovalidation() {
       $('#Errtitle').html("");   
       $('#Errcontent').html("");
       $('#Errimage1').html("");
       $('#Errcountryid').html("");
       $('#Errstate').html("");
       $('#Errdistrict').html("");
       $('#Errcity').html("");
       $('#Errlocation').html("");
       $('#ErrBrand').html("");
       $('#ErrBrand').html("");
       $('#ErrYear').html("");
       $('#ErrKMDriven').html("");
       $('#Erramount').html("");
       $('#ErrSuperBuildUpArea').html("");
       $('#ErrCarpetArea').html("");
       $('#ErrPlotArea').html("");
       
       error=0;
       
       var title = $('#title').val().trim();
       if (title.length==0) {
            $('#Errtitle').html("Please Enter Title"); 
            error++;
        } 
        var m = $('#content').val().trim();
            if (m.length==0) {
                $('#Errcontent').html("Please Enter Description");
                error++;
            }
        var im = $('#image1').val().trim();
            if (im=="") {
                $('#Errimage1').html("Please Upload Image");
                $('#div_1').css({"border": "1px solid red"});
                error++;
            }
        var cnt = $('#countryid').val().trim();
            if (cnt==0) {
                $('#Errcountryid').html("Please Select Country");
                error++;
            }
        var st = $('#state').val().trim();
            if (st==0) {
                $('#Errstate').html("Please Select State");
                error++;
            }
        var ds = $('#district').val().trim();
            if (ds==0) {
                $('#Errdistrict').html("Please Select District");
                error++;
            }
        var cty = $('#city').val().trim();
            if (cty==0) {
                $('#Errcity').html("Please Select City");
                error++;
            }
        var loc = $('#location').val().trim();
            if (loc.length==0) {
                $('#Errlocation').html("Please Enter Location");
                error++;
            } 
        <?php if($pageContent[0]['subcateid']<>"77") {?>
            $("#amount").blur(function(){    
        var amt = $('#amount').val().trim();
        $('#Erramount').html("");
        if (amt.length==0) {
                $('#Erramount').html("Please enter Amount");
            } else {
                if (!(parseFloat(amt)>=10 && parseFloat(amt)<=1000000)) {
                    $('#Erramount').html("Amount must have Rs.10 to  Rs.1000000");
                }
            }   
        });       
        <?php } ?>
        <?php if($pageContent[0]['subcateid']=="96") {?>
            var Brand = $('#Brand').val().trim();
           if (Brand==0) {
                $('#ErrBrand').html("Please Enter Brand Name"); 
                error++;
            }        
        <?php } ?>
        <?php if($pageContent[0]['subcateid']=="24") {?>
            var Brand = $('#PlotArea').val().trim();
           if (Brand==0) {
                $('#ErrPlotArea').html("Please Enter Plot Area"); 
                error++;
            }        
        <?php } ?>
        <?php  if($pageContent[0]['subcateid']=="60" || $pageContent[0]['subcateid']=="61") { ?>
                var Brand = $('#Brand').val().trim();
                   if (Brand==0) {
                        $('#ErrBrand').html("Please Enter Brand Name"); 
                        error++;
                    }
                   var Year = $('#Year').val().trim();
                   if (Year.length==0) {
                        $('#ErrYear').html("Please Enter Year"); 
                        error++;
                    }
                    var KMDriven = $('#KMDriven').val().trim();
                       if (KMDriven.length==0) {
                            $('#ErrKMDriven').html("Please Enter KM Driven"); 
                            error++;
                        }
        <?php } ?>
        <?php  if($pageContent[0]['subcateid']=="62" || $pageContent[0]['subcateid']=="65" || $pageContent[0]['subcateid']=="66") { ?>
               
                   var Year = $('#Year').val().trim();
                   if (Year.length==0) {
                        $('#ErrYear').html("Please Enter Year"); 
                        error++;
                    }
                    var KMDriven = $('#KMDriven').val().trim();
                       if (KMDriven.length==0) {
                            $('#ErrKMDriven').html("Please Enter KM Driven"); 
                            error++;
                        }
        <?php } ?>
        <?php if($pageContent[0]['subcateid']=="20" || $pageContent[0]['subcateid']=="21" || $pageContent[0]['subcateid']=="4" || $pageContent[0]['subcateid']=="22") {?>
        var cnt = $('#SuperBuildUpArea').val().trim();
            if (cnt==0) {
                $('#ErrSuperBuildUpArea').html("Please Enter Super Build Up Area");
                 error++;
            }
        var cnt = $('#CarpetArea').val().trim();
            if (cnt==0) {
                $('#ErrCarpetArea').html("Please Enter Carpet Area");
                 error++;
            }
        <?php } ?>
       if (error>0) {
            return false;
        }
    }
</script> 
<style>.mobilemenu {display:none}
 .errorstring{width:100%;font-size:12px;color:red}
</style>
<?php if (!($_SESSION['USER']['userid']>0)) { ?>
<script>
    alert("Your login expired.please login again");
    location.href='<?php echo AppUrl;?>';
</script>
<?php } ?>
<?php
    $slsubcategory = $mysql->select("select * from _jsubcategory where subcateid='".$pageContent[0]['subcateid']."'");
    $slcategory = $mysql->select("select * from _jcategory where categid='".$slsubcategory[0]['categid']."'");
    if(isset($_POST["save"])) {
        $errorMessage= "";
        $errorMessage1= "";
        if ($obj->isEmptyField($_POST['uploadimage1'])) {
            echo $obj->printError("Please upload image");
        }
        if ($obj->isEmptyField($_POST['title'])) {
            echo $obj->printError("Title Shouldn't be blank");
        }
        if ($obj->isEmptyField($_POST['content'])) {
            echo $obj->printError("Description Shouldn't be blank");
        }
        if($pageContent[0]['subcateid']!=77){
            if ($obj->isEmptyField($_POST['amount'])) {
                echo $obj->printError("Amount Shouldn't be blank");
            }
        }
        
             if($pageContent[0]['subcateid']=="2" || $pageContent[0]['subcateid']=="96" || $pageContent[0]['subcateid']=="61" ){
                 $brandid = $_POST['Brand'];
             }else {
                 $brandid= "0";
             }
            if($pageContent[0]['subcateid']=="96" || $pageContent[0]['subcateid']=="61"){
                $postedadid = $mysql->execute("update _jpostads set `title`     ='".$_POST['title']."', 
                                                                    `content`   ='".str_replace("'","\\'",$_POST['content'])."',
                                                                    `amount`    ='".$_POST['amount']."',
                                                                    `location`  ='".$_POST['location']."',
                                                                    `filepath1` ='".trim($_POST['uploadimage1'])."',
                                                                    `filepath2` ='".trim($_POST['uploadimage2'])."',
                                                                    `filepath3` ='".trim($_POST['uploadimage3'])."',
                                                                    `filepath4` ='".trim($_POST['uploadimage4'])."',
                                                                    `filepath5` ='".trim($_POST['uploadimage5'])."',
                                                                    `filepath6` ='".trim($_POST['uploadimage6'])."' where postadid='".$_GET['ad']."'");    
            }
            if($pageContent[0]['subcateid']=="60"){
                $postedadid = $mysql->execute("update _jpostads set `brandid`     ='".$_POST['title']."', 
                                                                    `Year`        ='".$_POST['Year']."', 
                                                                    `Fuel`        ='".$_POST['Fuel']."', 
                                                                    `Transmission`='".$_POST['Transmission']."', 
                                                                    `KMDriven`    ='".$_POST['KMDriven']."', 
                                                                    `NoofOwners`  ='".$_POST['NoofOwners']."', 
                                                                    `title`       ='".$_POST['title']."', 
                                                                    `content`     ='".str_replace("'","\\'",$_POST['content'])."',
                                                                    `amount`      ='".$_POST['amount']."',
                                                                    `location`    ='".$_POST['location']."',
                                                                    `filepath1`   ='".trim($_POST['uploadimage1'])."',
                                                                    `filepath2`   ='".trim($_POST['uploadimage2'])."',
                                                                    `filepath3`   ='".trim($_POST['uploadimage3'])."',
                                                                    `filepath4`   ='".trim($_POST['uploadimage4'])."',
                                                                    `filepath5`   ='".trim($_POST['uploadimage5'])."',
                                                                    `filepath6`   ='".trim($_POST['uploadimage6'])."' where postadid='".$_GET['ad']."'");    
            }
            
          
            if (sizeof($postedadid)>0) {
                echo $obj->printSuccess("Updated Successfully"); 
            } else {
                echo $obj->printError("Error Updating ads".$errorMessage."-".$errorMessage1);   
            }
        }  
        $pageContent =JPostads::getMyAd($_GET['ad'],$_SESSION['USER']['userid']);
    
?>
<form action="" method="post"  enctype="multipart/form-data" onsubmit="return dovalidation();">
    <div class="main-panel" style="width: 100%;height:auto !important">
        <div class="container" style="margin-top:0px">
            <div class="page-inner" >
                <h3 style="text-align:center;margin-top:10px">Edit Post123</h3>
                <?php if($pageContent[0]['subcateid']!=0){?>
                <div class="card" style="box-shadow:none;border: 1px solid #e5e5e5;margin-bottom:15px ;">
                    <div class="card-body d" style="padding-top: 10px;padding-bottom: 0px;">
                        <div class="row mb-2">
                            <div class="col-12">
                                <h4 style="font-weight:bold;font-size:13px;text-transform:uppercase;float:left">Selected Category</h4><br>
                                <div style="clear: both;"><?php echo $slcategory[0]['categname'];?>&nbsp;/&nbsp;<?php echo $slsubcategory[0]['subcatename'];?></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card" style="box-shadow:none;border: 1px solid #e5e5e5;margin-bottom:15px ;">
                    <div class="card-body d">            
                            <?php 
                                if($pageContent[0]['categid']=="1"){ 
                                    include_once("includes/editpost_automobiles.php");
                                }
                                if($pageContent[0]['categid']=="2"){ 
                                    include_once("includes/editpost_mobiles.php");
                                }
                                if($pageContent[0]['categid']=="3"){ 
                                    include_once("includes/editpost_electronics.php");
                                }
                                if($pageContent[0]['categid']=="4"){ 
                                    include_once("includes/editpost_realestate.php");
                                }
                                if($pageContent[0]['categid']=="5"){ 
                                    include_once("includes/editpost_jobs.php");
                                }
                                if($pageContent[0]['categid']=="6"){ 
                                    include_once("includes/editpost_fashion.php");
                                }
                                if($pageContent[0]['categid']=="8"){ 
                                    include_once("includes/adpost_services.php");
                                }
                                if($pageContent[0]['categid']=="13"){ 
                                    include_once("includes/editpost_pet.php");
                                } 
                                if($pageContent[0]['categid']=="14"){ 
                                    include_once("includes/editpost_furniture.php");
                                }
                                if($pageContent[0]['categid']=="15"){ 
                                    include_once("includes/editpost_books.php");
                                }
                                
                            ?>
                    </div>
                </div>
                <div class="card" style="box-shadow:none;border: 1px solid #e5e5e5;margin-bottom:15px ;">
                    <div class="card-body d">
                        <div class="row mb-2">
                            <div class="col-sm-12">
                                <label >Published To</label>
                                <?php $countryname=JPostads::getCountryNames($pageContent[0]['countryid']) ;?>
                                <input type="text" disabled="disabled" class="form-control" value="<?php echo $countryname[0]['countryname']; ?>">
                            </div>
                        </div>                                     
                        <div class="row mb-2">
                            <div class="col-sm-12">
                                <label>State Name</label>
                                <?php $statename=JPostads::getStateNames($pageContent[0]['stateid']) ;?>
                                <input type="text" disabled="disabled" class="form-control" value="<?php echo $statename[0]['statenames']; ?>">
                            </div>
                        </div>
                        <div class="row mb-2"> 
                            <div class="col-sm-12">
                                <label>District Name</label>
                                <?php $districtname=JPostads::getDistrict($pageContent[0]['distcid']) ;?>
                                <input type="text" disabled="disabled" class="form-control" value="<?php echo $districtname[0]['districtname']; ?>">
                            </div>
                        </div>
                        <div class="row mb-2"> 
                            <div class="col-sm-12">                                                                 
                                <label>City Name</label>
                                <?php $cityname=JPostads::getCity($pageContent[0]['cityid']) ;?>
                                <input type="text" disabled="disabled" class="form-control" value="<?php echo $cityname[0]['cityname']; ?>">
                            </div>
                        </div>
                        <div class="row mb-2">
                            <div class="col-sm-12">
                                <label>Locality<span style="color: red;">*</span></label>
                                <input type="text" name="location" id="location" class="form-control" value="<?php echo $pageContent[0]['location']; ?>">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="">
                    <div class="">
                        <div class="row mb-2">
                            <div class="col-sm-12">
                                <input type="submit" name="save" value="Update" class="btn btn-primary">
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            </div>
        </div>
    </div>
</form>  
 
<string name="image_chooser">File Chooser</string>
<script>
    var loadingGif="<img src='<?php echo AppUrl;?>/assets/loading.gif' style='width:96px'>";
    function uploadimage(imgid){                                                                                       
        $('#image'+imgid).trigger("click");
    }
    /*Start Image 1 Process */
    function image1_close() {
        $('#uploadimage1').val("");
        $('#div_1').html('<img onclick="uploadimage(\'1\')" id="src_image1" src="<?php echo AppUrl;?>/assets/add-image.png" style="width: 64px;margin-top: 20px;opacity: 0.3;cursor: pointer;">');  
        $('#div_1').css({"border":"1px solid red"});
        $('#Errimage1').html("Please Upload Image");
    }
    
    function image1_onchage() {
        $('#div_1').html(loadingGif);
        var fd = new FormData(); 
        var files = $('#image1')[0].files[0]; 
        fd.append('file', files); 
        $.ajax({
            url: '<?php echo AppUrl;?>/upload.php', 
            type: 'post', 
            data: fd, 
            contentType: false, 
            processData: false, 
            success: function(response){
        
                if (response!="error") {
                    $('#uploadimage1').val(response);
                        $('#div_1').html("<div><img src='<?php echo AppUrl;?>/<?php echo "assets/".$config['thumb'];?>"+response.trim()+"' style='width: 64px;margin-top: 5px;'><br><span onclick='image1_close()' class='btn btn-danger btn-sm' style='padding: 0px 10px;font-size: 10px;'>Delete</span></div>");
                        $('#div_1').css({"border":"1px solid #ccc"});
                        $('#Errimage1').html("");
                    } else {
                        alert("error");
                    }
                }, 
            }); 
    }
    /*End of Image 1 Process */
    
    /*Start Image 2 Process */
    function image2_close() {
        $('#uploadimage2').val("");
        $('#div_2').html('<img onclick="uploadimage(\'2\')" id="src_image2" src="<?php echo AppUrl;?>/assets/add-image.png" style="width: 64px;margin-top: 20px;opacity: 0.3;cursor: pointer;">');  
    }
    
    function image2_onchage() {
        $('#div_2').html(loadingGif);
        var fd = new FormData(); 
        var files = $('#image2')[0].files[0]; 
        fd.append('file', files); 
        $.ajax({
            url: '<?php echo AppUrl;?>/upload.php', 
            type: 'post', 
            data: fd, 
            contentType: false, 
            processData: false, 
            success: function(response){ 
                if (response!="error") {
                    $('#uploadimage2').val(response);
                        $('#div_2').html("<div><img src='<?php echo AppUrl;?>/<?php echo "assets/".$config['thumb'];?>"+response.trim()+"' style='width: 64px;margin-top: 5px;'><br><span onclick='image2_close()' class='btn btn-danger btn-sm' style='padding: 0px 10px;font-size: 10px;'>Delete</span></div>");
                    } else {
                        alert("error");
                    }
                }, 
            }); 
    }
    /*End of Image 2 Process */
    
    /*Start Image 3 Process */
    function image3_close() {
        $('#uploadimage3').val("");
        $('#div_3').html('<img onclick="uploadimage(\'3\')" id="src_image3" src="<?php echo AppUrl;?>/assets/add-image.png" style="width: 64px;margin-top: 20px;opacity: 0.3;cursor: pointer;">');  
    }
    
    function image3_onchage() {
        $('#div_3').html(loadingGif);
        var fd = new FormData(); 
        var files = $('#image3')[0].files[0]; 
        fd.append('file', files); 
        $.ajax({
            url: '<?php echo AppUrl;?>/upload.php', 
            type: 'post', 
            data: fd, 
            contentType: false, 
            processData: false, 
            success: function(response){ 
                if (response!="error") {
                    $('#uploadimage3').val(response);
                        $('#div_3').html("<div><img src='<?php echo AppUrl;?>/<?php echo "assets/".$config['thumb'];?>"+response.trim()+"' style='width: 64px;margin-top: 5px;'><br><span onclick='image3_close()' class='btn btn-danger btn-sm' style='padding: 0px 10px;font-size: 10px;'>Delete</span></div>");
                    } else {
                        alert("error");
                    }
                }, 
            }); 
    }
    /*End of Image 3 Process */
    
    /*Start Image 4 Process */
    function image4_close() {
        $('#uploadimage4').val("");
        $('#div_4').html('<img onclick="uploadimage(\'4\')" id="src_image4" src="<?php echo AppUrl;?>/assets/add-image.png" style="width: 64px;margin-top: 20px;opacity: 0.3;cursor: pointer;">');  
    }
    
    function image4_onchage() {
        $('#div_4').html(loadingGif);
        var fd = new FormData(); 
        var files = $('#image4')[0].files[0]; 
        fd.append('file', files); 
        $.ajax({
            url: '<?php echo AppUrl;?>/upload.php', 
            type: 'post', 
            data: fd, 
            contentType: false, 
            processData: false, 
            success: function(response){ 
                if (response!="error") {
                    $('#uploadimage4').val(response);
                        $('#div_4').html("<div><img src='<?php echo AppUrl;?>/<?php echo "assets/".$config['thumb'];?>"+response.trim()+"' style='width: 64px;margin-top: 5px;'><br><span onclick='image4_close()' class='btn btn-danger btn-sm' style='padding: 0px 10px;font-size: 10px;'>Delete</span></div>");
                    } else {
                        alert("error");
                    }
                }, 
            }); 
    }
    /*End of Image 4 Process */
    
    /*Start Image 5 Process */
    function image5_close() {
        $('#uploadimage5').val("");
        $('#div_5').html('<img onclick="uploadimage(\'5\')" id="src_image5" src="<?php echo AppUrl;?>/assets/add-image.png" style="width: 64px;margin-top: 20px;opacity: 0.3;cursor: pointer;">');  
    }
    
    function image5_onchage() {
        $('#div_5').html(loadingGif);
        var fd = new FormData(); 
        var files = $('#image5')[0].files[0]; 
        fd.append('file', files); 
        $.ajax({
            url: '<?php echo AppUrl;?>/upload.php', 
            type: 'post', 
            data: fd, 
            contentType: false, 
            processData: false, 
            success: function(response){ 
                if (response!="error") {
                    $('#uploadimage5').val(response);
                        $('#div_5').html("<div><img src='<?php echo AppUrl;?>/<?php echo "assets/".$config['thumb'];?>"+response.trim()+"' style='width: 64px;margin-top: 5px;'><br><span onclick='image5_close()' class='btn btn-danger btn-sm' style='padding: 0px 10px;font-size: 10px;'>Delete</span></div>");
                    } else {
                        alert("error");
                    }
                }, 
            }); 
    }
    /*End of Image 5 Process */       
    
    /*Start Image 6 Process */
    function image6_close() {
        $('#uploadimage6').val("");
        $('#div_6').html('<img onclick="uploadimage(\'6\')" id="src_image6" src="<?php echo AppUrl;?>/assets/add-image.png" style="width: 64px;margin-top: 20px;opacity: 0.3;cursor: pointer;">');  
    }
    
    function image6_onchage() {
        $('#div_6').html(loadingGif);
        var fd = new FormData(); 
        var files = $('#image6')[0].files[0]; 
        fd.append('file', files); 
        $.ajax({
            url: '<?php echo AppUrl;?>/upload.php', 
            type: 'post', 
            data: fd, 
            contentType: false, 
            processData: false, 
            success: function(response){ 
                if (response!="error") {
                    $('#uploadimage6').val(response);
                        $('#div_6').html("<div><img src='<?php echo AppUrl;?>/<?php echo "assets/".$config['thumb'];?>"+response.trim()+"' style='width: 64px;margin-top: 5px;'><br><span onclick='image6_close()' class='btn btn-danger btn-sm' style='padding: 0px 10px;font-size: 10px;'>Delete</span></div>");
                    } else {
                        alert("error");
                    }
                }, 
            }); 
    }
    /*End of Image 6 Process */
    </script>          
<?php include_once("footer.php"); ?>