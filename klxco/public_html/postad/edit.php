<?php
       $obj = new CommonController();
       if (isset($_POST['unpublishbtn'])) {
                    $mysql->execute("update _jpostads set ispublish=2 where postadid=".$_POST['rowid']);
                    echo $obj->printSuccess("Post Ad UnPublished Successfully");
                    $_POST{"editbtn"}="editbtn";
               }
               
               if (isset($_POST['cdeletebtn'])) {
                 //   $mysql->execute("update _jpostads set isdeleted=1,deletedon='".date("Y-m-d H:i:s")."' where postadid=".$_POST['rowid']);
                    
                    echo $obj->printSuccess("Deleted Successfully");
                   $_POST{"editbtn"}="editbtn"; 
                   
                   
                       $d = $mysql->select("select * from _jpostads  where postadid='".$_POST['rowid']."'");
         $filename = ((strlen(trim($d[0]['filepath1']))>4) && file_exists("/home/klxco/public_html/assets/".$config['thumb'].$d[0]['filepath1'])) ? "assets/".$config['thumb'].$d[0]['filepath1'] : "";
              
         if ($filename!="") {
             
                
                   if (copy("/home/klxco/public_html/".$filename,"/home/ztemp_klx/".$d[0]['filepath1'])) 
                   {
                    unlink("/home/klxco/public_html/".$filename);
                    $mysql->insert("_jpostads_deleted",array(
                    "postadid"=>$d[0]['postadid'],
                    "categid"=>$d[0]['categid'],
                    "subcateid"=>$d[0]['subcateid'],
                    "title"=>$d[0]['title'],
                    "content"=>$d[0]['content'],
                    "postedon"=>$d[0]['postedon'],
                    "visitors"=>$d[0]['visitors'],
                    "isactive"=>$d[0]['isactive'],
                    "isdelete"=>$d[0]['isdelete'],
                    "postedby"=>$d[0]['postedby'],
                    "adtype"=>"0",
                    "stateid"=>$d[0]['stateid'],
                    
                    "countryid"=>$d[0]['countryid'],
                    "distcid"=>$d[0]['distcid'],
                    "ispublish"=>$d[0]['ispublish'],
                    "expiredon"=>$d[0]['expiredon'],
                    "filepath1"=>$d[0]['filepath1'],
                    "filepath2"=>$d[0]['filepath2'],
                    "ispaid"=>$d[0]['ispaid'],
                    "amount"=>$d[0]['amount'],
                    "isdeleted"=>"1",
                    "deletedon"=>date("Y-m-d H:i:s"),
                    "pposted"=>$d[0]['pposted']));
                    $mysql->execute("delete from _jpostads  where postadid='".$_POST['rowid']."'");
                              }
           
                   
                   
                   
                   
                   
                   
               }
               }
    $pageContent =JPostads::getPostad($_GET['rowid']);
    
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
  
    function getModel(brandid,ModelID) {
        $.ajax({url:'<?php echo base_url;?>webservice.php?action=getModel&brandid='+brandid+'&ModelID='+ModelID,success:function(data){
            $('#div_Model').html(data);
        }});
    }
    
     function getBrand(typeid,brandid) {
        $.ajax({url:'<?php echo base_url;?>webservice.php?action=getBrand&typeid='+typeid+'&brandid='+brandid,success:function(data){
            $('#div_Brand').html(data);
        }});
    }
  
    function getVarient(modelid) {
        $.ajax({url:'<?php echo base_url;?>webservice.php?action=getVarient&modelid='+modelid,success:function(data){
            $('#div_Varient').html(data);
        }});
    }
</script>
<script>
function is_Numeric(acname) {
    
        if (acname.length==0) {
            return false;
        }         
        var reg = /^[0-9]*$/i
        if (acname.match(reg)) {
            return true
        }
        return false;
    }
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
       
        $("#uploadimage1").blur(function(){     
           $('#Errimage1').html("");   
            var im = $('#uploadimage1').val().trim();
                if (im.length==0) {
                    $('#Errimage1').html("Please Upload Image");
                }
        });
        
        <?php if($pageContent[0]['subcateid']=="60" || $pageContent[0]['subcateid']=="61") { ?>
        $("#Brand").blur(function(){     
           $('#ErrBrand').html("");   
        var cnt = $('#Brand').val().trim();
            if (cnt==0) {
                $('#ErrBrand').html("Please Select Brand Name");
            }
        });
        $("#Model").blur(function(){     
           $('#ErrModel').html("");   
        var Model = $('#Model').val().trim();
            if (Model==0) {
                $('#ErrModel').html("Please Select Model");
            }else {
                $('#ErrModel').html("");    
            }
        });
      /*  $("#Varient").blur(function(){     
           $('#ErrVarient').html("");   
        var Varient = $('#Varient').val().trim();
            if (Varient==0) {
                $('#ErrVarient').html("Please Select Varient");
            }
        }); */
        
        
        $("#KMDriven").blur(function() {
            $('#ErrKMDriven').html("");   
            var KMDriven = $('#KMDriven').val().trim();
            if (KMDriven.length==0) {
                $('#ErrKMDriven').html("Please Enter KMDriven"); 
            } else {
                if (!(is_Numeric(KMDriven))) {
                    $('#ErrKMDriven').html("Please Enter Numeric Characters Only");
                }
            } 
            });
        <?php } ?>
        <?php if($pageContent[0]['categid']!="5"){ ?>
        $("#amount").blur(function(){    
        var amt = $('#amount').val().trim();
        $('#Erramount').html("");
        if (amt.length==0) {
                $('#Erramount').html("Please enter Amount");
            } else {
                if (!(parseFloat(amt)>=1)) {
                    $('#Erramount').html("Amount must have Rs.1");
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
        <?php if($pageContent[0]['subcateid']=="62" || $pageContent[0]['subcateid']=="65" || $pageContent[0]['subcateid']=="66") { ?>
        $("#KMDriven").blur(function() {
            $('#ErrKMDriven').html("");   
            var KMDriven = $('#KMDriven').val().trim();
            if (KMDriven.length==0) {
                $('#ErrKMDriven').html("Please Enter KMDriven"); 
            } 
        });                                                                                          
        <?php } ?>
        <?php if($pageContent[0]['categid']=="5"){?>
            $("#SalaryFrom").blur(function() {
                $('#ErrSalaryFrom').html("");   
                var SalaryFrom = $('#SalaryFrom').val().trim();
                if (SalaryFrom.length==0) {
                    $('#ErrSalaryFrom').html("Please Enter Salary From"); 
                } 
            }); 
            $("#SalaryTo").blur(function() {
                $('#ErrSalaryTo').html("");   
                var SalaryFrom = $('#SalaryFrom').val().trim();
                var SalaryTo = $('#SalaryTo').val().trim();
                if (SalaryTo.length==0) {
                    $('#ErrSalaryTo').html("Please Enter Salary To"); 
                }else {
                    if(SalaryFrom > SalaryTo){
                        $('#ErrSalaryTo').html("Please Enter Salary To Greater Than Salary From");    
                    }
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
       
       $('#ErrBrand').html("");
       $('#ErrModel').html("");
       $('#ErrVariant').html("");
       $('#ErrKMDriven').html("");
       
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
        var im = $('#uploadimage1').val().trim();
            if (im.length==0) {
                $('#Errimage1').html("Please Upload Image");
                error++;
            }
        <?php  if($pageContent[0]['subcateid']=="60" || $pageContent[0]['subcateid']=="61") { ?>
                var Brand = $('#Brand').val().trim();
                   if (Brand==0) {
                        $('#ErrBrand').html("Please Select Brand Name"); 
                        error++;
                    }
                var Model = $('#Model').val().trim();
                   if (Model==0) {
                        $('#ErrModel').html("Please Select Model"); 
                        error++;
                    }
              /*  var Varient = $('#Varient').val().trim();
                   if (Varient==0) {
                        $('#ErrVarient').html("Please Select Varient"); 
                        error++;
                    } */
                    var KMDriven = $('#KMDriven').val().trim();
                       if (KMDriven.length==0) {
                            $('#ErrKMDriven').html("Please Enter KM Driven"); 
                            error++;
                        } else {
                            if (!(is_Numeric(KMDriven))) {
                                $('#ErrKMDriven').html("Please Enter Numeric Characters Only");
                                error++;
                            }
                        } 
        <?php } ?>
        <?php if($pageContent[0]['categid']!="5") {?>
        var amt = $('#amount').val().trim();   
        $('#Erramount').html("");
        if (amt.length==0) {
                $('#Erramount').html("Please enter Amount");
                error++;
            } else {
                if (!(parseFloat(amt)>=1)) {
                    $('#Erramount').html("Amount must have greater than Rs.1");
                    error++;
                }
            }   
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
        <?php  if($pageContent[0]['subcateid']=="62" || $pageContent[0]['subcateid']=="65" || $pageContent[0]['subcateid']=="66") { ?>
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
        <?php if($pageContent[0]['categid']=="5"){?>
                var SalaryFrom = $('#SalaryFrom').val().trim();
                if (SalaryFrom.length==0) {
                    $('#ErrSalaryFrom').html("Please Enter Salary From"); 
                    error++;
                } 
                
                var SalaryFrom = $('#SalaryFrom').val().trim();
                var SalaryTo = $('#SalaryTo').val().trim();
                if (SalaryTo.length==0) {
                    $('#ErrSalaryTo').html("Please Enter Salary To"); 
                    error++;
                }else {
                    if(SalaryFrom > SalaryTo){
                        $('#ErrSalaryTo').html("Please Enter Salary To Greater Than Salary From");  
                        error++;  
                    }
                } 
        <?php } ?>
       
       if (error>0) {
            return false;
        }
    }
</script> 
<style>.mobilemenu {display:none}
 .errorstring{width:100%;font-size:12px;color:red}
.card .card-footer, .card-light .card-footer{
     border-top: 1px solid #fff;
 }
</style>

<?php
    $slsubcategory = $mysql->select("select * from _jsubcategory where subcateid='".$pageContent[0]['subcateid']."'");
    $slcategory = $mysql->select("select * from _jcategory where categid='".$slsubcategory[0]['categid']."'");
    if(isset($_POST["save"])) {
             if($pageContent[0]['subcateid']=="2" || $pageContent[0]['subcateid']=="96" || $pageContent[0]['subcateid']=="61" ){
                 $brandid = $_POST['Brand'];
             }else {
                 $brandid= "0";
             }
            if($pageContent[0]['subcateid']=="96"){                   
                $postedadid = $mysql->execute("update _jpostads set `title`     ='".$_POST['title']."', 
                                                                    `content`   ='".str_replace("'","\\'",$_POST['content'])."',
                                                                    `amount`    ='".$_POST['amount']."',
                                                                    `filepath1` ='".trim($_POST['uploadimage1'])."',
                                                                    `filepath2` ='".trim($_POST['uploadimage2'])."',
                                                                    `filepath3` ='".trim($_POST['uploadimage3'])."',
                                                                    `filepath4` ='".trim($_POST['uploadimage4'])."',
                                                                    `filepath5` ='".trim($_POST['uploadimage5'])."',
                                                                    `filepath6` ='".trim($_POST['uploadimage6'])."' where postadid='".$_GET['rowid']."'");    
            }
            if($pageContent[0]['subcateid']=="60"){
                $postedadid = $mysql->execute("update _jpostads set `brandid`     ='".$_POST['Brand']."',              
                                                                    `Model`       ='".$_POST['Model']."',
                                                                    `Year`        ='".$_POST['Year']."', 
                                                                    `Fuel`        ='".$_POST['Fuel']."', 
                                                                    `Transmission`='".$_POST['Transmission']."', 
                                                                    `KMDriven`    ='".$_POST['KMDriven']."', 
                                                                    `NoofOwners`  ='".$_POST['NoofOwners']."', 
                                                                    `title`       ='".$_POST['title']."', 
                                                                    `content`     ='".str_replace("'","\\'",$_POST['content'])."',
                                                                    `amount`      ='".$_POST['amount']."',
                                                                    `filepath1`   ='".trim($_POST['uploadimage1'])."',
                                                                    `filepath2`   ='".trim($_POST['uploadimage2'])."',
                                                                    `filepath3`   ='".trim($_POST['uploadimage3'])."',
                                                                    `filepath4`   ='".trim($_POST['uploadimage4'])."',
                                                                    `filepath5`   ='".trim($_POST['uploadimage5'])."',
                                                                    `filepath6`   ='".trim($_POST['uploadimage6'])."' where postadid='".$_GET['rowid']."'");    
            }
            if($pageContent[0]['subcateid']=="62"){
                $postedadid = $mysql->execute("update _jpostads set `Mtype`     ='".$_POST['MType']."', 
                                                                    `brandid`     ='".$_POST['Brand']."', 
                                                                    `Year`        ='".$_POST['Year']."', 
                                                                    `KMDriven`    ='".$_POST['KMDriven']."',
                                                                    `title`       ='".$_POST['title']."', 
                                                                    `content`     ='".str_replace("'","\\'",$_POST['content'])."',
                                                                    `amount`      ='".$_POST['amount']."',
                                                                    `filepath1`   ='".trim($_POST['uploadimage1'])."',
                                                                    `filepath2`   ='".trim($_POST['uploadimage2'])."',
                                                                    `filepath3`   ='".trim($_POST['uploadimage3'])."',
                                                                    `filepath4`   ='".trim($_POST['uploadimage4'])."',
                                                                    `filepath5`   ='".trim($_POST['uploadimage5'])."',
                                                                    `filepath6`   ='".trim($_POST['uploadimage6'])."' where postadid='".$_GET['rowid']."'");    
            }if($pageContent[0]['subcateid']=="66" || $pageContent[0]['subcateid']=="65" || $pageContent[0]['subcateid']=="61"){
                $postedadid = $mysql->execute("update _jpostads set `brandid`     ='".$_POST['Brand']."', 
                                                                    `Model`       ='".$_POST['Model']."', 
                                                                    `Year`        ='".$_POST['Year']."',                      
                                                                    `KMDriven`    ='".$_POST['KMDriven']."', 
                                                                    `title`       ='".$_POST['title']."',
                                                                    `content`     ='".str_replace("'","\\'",$_POST['content'])."',
                                                                    `amount`      ='".$_POST['amount']."',
                                                                    `filepath1`   ='".trim($_POST['uploadimage1'])."',
                                                                    `filepath2`   ='".trim($_POST['uploadimage2'])."',
                                                                    `filepath3`   ='".trim($_POST['uploadimage3'])."',
                                                                    `filepath4`   ='".trim($_POST['uploadimage4'])."',
                                                                    `filepath5`   ='".trim($_POST['uploadimage5'])."',
                                                                    `filepath6`   ='".trim($_POST['uploadimage6'])."' where postadid='".$_GET['rowid']."'");    
            }if($pageContent[0]['subcateid']=="63" || $pageContent[0]['subcateid']=="14" || $pageContent[0]['subcateid']=="89"){
                $postedadid = $mysql->execute("update _jpostads set `Mtype`       ='".$_POST['MType']."',
                                                                    `title`       ='".$_POST['title']."',
                                                                    `content`     ='".str_replace("'","\\'",$_POST['content'])."',
                                                                    `amount`      ='".$_POST['amount']."',
                                                                    `filepath1`   ='".trim($_POST['uploadimage1'])."',
                                                                    `filepath2`   ='".trim($_POST['uploadimage2'])."',
                                                                    `filepath3`   ='".trim($_POST['uploadimage3'])."',
                                                                    `filepath4`   ='".trim($_POST['uploadimage4'])."',
                                                                    `filepath5`   ='".trim($_POST['uploadimage5'])."',
                                                                    `filepath6`   ='".trim($_POST['uploadimage6'])."' where postadid='".$_GET['rowid']."'");    
            }
            if($pageContent[0]['subcateid']=="2"){
                $postedadid = $mysql->execute("update _jpostads set `brandid`     ='".$_POST['Brand']."',
                                                                    `Model`       ='".$_POST['Model']."',
                                                                    `title`       ='".$_POST['title']."',
                                                                    `content`     ='".str_replace("'","\\'",$_POST['content'])."',
                                                                    `amount`      ='".$_POST['amount']."',
                                                                    `filepath1`   ='".trim($_POST['uploadimage1'])."',
                                                                    `filepath2`   ='".trim($_POST['uploadimage2'])."',
                                                                    `filepath3`   ='".trim($_POST['uploadimage3'])."',
                                                                    `filepath4`   ='".trim($_POST['uploadimage4'])."',
                                                                    `filepath5`   ='".trim($_POST['uploadimage5'])."',
                                                                    `filepath6`   ='".trim($_POST['uploadimage6'])."' where postadid='".$_GET['rowid']."'");    
            }
            if($pageContent[0]['categid']=="3" || $pageContent[0]['categid']=="6" || $pageContent[0]['categid']=="7" || $pageContent[0]['categid']=="8" || $pageContent[0]['categid']=="12" || $pageContent[0]['categid']=="13" || $pageContent[0]['categid']=="14" || $pageContent[0]['categid']=="15"){
                $postedadid = $mysql->execute("update _jpostads set `title`       ='".$_POST['title']."',
                                                                    `content`     ='".str_replace("'","\\'",$_POST['content'])."',
                                                                    `amount`      ='".$_POST['amount']."',
                                                                    `filepath1`   ='".trim($_POST['uploadimage1'])."',
                                                                    `filepath2`   ='".trim($_POST['uploadimage2'])."',
                                                                    `filepath3`   ='".trim($_POST['uploadimage3'])."',
                                                                    `filepath4`   ='".trim($_POST['uploadimage4'])."',                                                                        
                                                                    `filepath5`   ='".trim($_POST['uploadimage5'])."',
                                                                    `filepath6`   ='".trim($_POST['uploadimage6'])."' where postadid='".$_GET['rowid']."'");    
            }if($pageContent[0]['subcateid']=="20"){
                $postedadid = $mysql->execute("update _jpostads set `Mtype`             ='".$_POST['MType']."',
                                                                    `BedRooms`          ='".$_POST['BedRooms']."',
                                                                    `BathRooms`         ='".$_POST['BathRooms']."',
                                                                    `Furnishing`        ='".$_POST['Furnishing']."',
                                                                    `ConstructionStatus`='".$_POST['ConstructionStatus']."',
                                                                    `ListedBy`          ='".$_POST['ListedBy']."',
                                                                    `SuperBuildUpArea`  ='".$_POST['SuperBuildUpArea']."',
                                                                    `CarpetArea`        ='".$_POST['CarpetArea']."',
                                                                    `BachelorsAllowed`  ='".$_POST['BachelorsAllowed']."',
                                                                    `Maintenance`       ='".$_POST['Maintenance']."',
                                                                    `TotalFloors`       ='".$_POST['TotalFloors']."',
                                                                    `FloorNo`           ='".$_POST['FloorNo']."',
                                                                    `CarParking`        ='".$_POST['CarParking']."',
                                                                    `Facing`            ='".$_POST['Facing']."',
                                                                    `Washrooms`         ='".$_POST['Washrooms']."',
                                                                    `title`             ='".$_POST['title']."',
                                                                    `content`           ='".str_replace("'","\\'",$_POST['content'])."',
                                                                    `amount`            ='".$_POST['amount']."',
                                                                    `filepath1`         ='".trim($_POST['uploadimage1'])."',
                                                                    `filepath2`         ='".trim($_POST['uploadimage2'])."',
                                                                    `filepath3`         ='".trim($_POST['uploadimage3'])."',
                                                                    `filepath4`         ='".trim($_POST['uploadimage4'])."',
                                                                    `filepath5`         ='".trim($_POST['uploadimage5'])."',
                                                                    `filepath6`         ='".trim($_POST['uploadimage6'])."' where postadid='".$_GET['rowid']."'");    
            }if($pageContent[0]['subcateid']=="21"){
                $postedadid = $mysql->execute("update _jpostads set `Furnishing`        ='".$_POST['Furnishing']."',   
                                                                    `ListedBy`          ='".$_POST['ListedBy']."',
                                                                    `SuperBuildUpArea`  ='".$_POST['SuperBuildUpArea']."',
                                                                    `CarpetArea`        ='".$_POST['CarpetArea']."',
                                                                    `Maintenance`       ='".$_POST['Maintenance']."',
                                                                    `CarParking`        ='".$_POST['CarParking']."',
                                                                    `Washrooms`         ='".$_POST['Washrooms']."',
                                                                    `title`             ='".$_POST['title']."',
                                                                    `content`           ='".str_replace("'","\\'",$_POST['content'])."',
                                                                    `amount`            ='".$_POST['amount']."',
                                                                    `filepath1`         ='".trim($_POST['uploadimage1'])."',
                                                                    `filepath2`         ='".trim($_POST['uploadimage2'])."',
                                                                    `filepath3`         ='".trim($_POST['uploadimage3'])."',
                                                                    `filepath4`         ='".trim($_POST['uploadimage4'])."',
                                                                    `filepath5`         ='".trim($_POST['uploadimage5'])."',
                                                                    `filepath6`         ='".trim($_POST['uploadimage6'])."' where postadid='".$_GET['rowid']."'");    
            }
            if($pageContent[0]['subcateid']=="4"){
                $postedadid = $mysql->execute("update _jpostads set `Mtype`             ='".$_POST['MType']."',
                                                                    `BedRooms`          ='".$_POST['BedRooms']."',
                                                                    `BathRooms`         ='".$_POST['BathRooms']."',
                                                                    `Furnishing`        ='".$_POST['Furnishing']."',
                                                                    `ConstructionStatus`='".$_POST['ConstructionStatus']."',
                                                                    `ListedBy`          ='".$_POST['ListedBy']."',
                                                                    `SuperBuildUpArea`  ='".$_POST['SuperBuildUpArea']."',
                                                                    `CarpetArea`        ='".$_POST['CarpetArea']."',
                                                                    `Maintenance`       ='".$_POST['Maintenance']."',
                                                                    `TotalFloors`       ='".$_POST['TotalFloors']."',
                                                                    `FloorNo`           ='".$_POST['FloorNo']."',                       
                                                                    `CarParking`        ='".$_POST['CarParking']."',
                                                                    `Facing`            ='".$_POST['Facing']."',
                                                                    `title`             ='".$_POST['title']."',
                                                                    `content`           ='".str_replace("'","\\'",$_POST['content'])."',
                                                                    `amount`            ='".$_POST['amount']."',
                                                                    `filepath1`         ='".trim($_POST['uploadimage1'])."',
                                                                    `filepath2`         ='".trim($_POST['uploadimage2'])."',
                                                                    `filepath3`         ='".trim($_POST['uploadimage3'])."',
                                                                    `filepath4`         ='".trim($_POST['uploadimage4'])."',
                                                                    `filepath5`         ='".trim($_POST['uploadimage5'])."',
                                                                    `filepath6`         ='".trim($_POST['uploadimage6'])."' where postadid='".$_GET['rowid']."'");    
            } if($pageContent[0]['subcateid']=="22"){
                $postedadid = $mysql->execute("update _jpostads set `Furnishing`        ='".$_POST['Furnishing']."',
                                                                    `ConstructionStatus`='".$_POST['ConstructionStatus']."',
                                                                    `ListedBy`          ='".$_POST['ListedBy']."',
                                                                    `SuperBuildUpArea`  ='".$_POST['SuperBuildUpArea']."',
                                                                    `CarpetArea`        ='".$_POST['CarpetArea']."',
                                                                    `Maintenance`       ='".$_POST['Maintenance']."',
                                                                    `CarParking`        ='".$_POST['CarParking']."',
                                                                    `Washrooms`         ='".$_POST['Washrooms']."',
                                                                    `title`             ='".$_POST['title']."',
                                                                    `content`           ='".str_replace("'","\\'",$_POST['content'])."',
                                                                    `amount`            ='".$_POST['amount']."',
                                                                    `filepath1`         ='".trim($_POST['uploadimage1'])."',
                                                                    `filepath2`         ='".trim($_POST['uploadimage2'])."',
                                                                    `filepath3`         ='".trim($_POST['uploadimage3'])."',
                                                                    `filepath4`         ='".trim($_POST['uploadimage4'])."',
                                                                    `filepath5`         ='".trim($_POST['uploadimage5'])."',
                                                                    `filepath6`         ='".trim($_POST['uploadimage6'])."' where postadid='".$_GET['rowid']."'");    
            }if($pageContent[0]['subcateid']=="24"){
                $postedadid = $mysql->execute("update _jpostads set `Mtype`             ='".$_POST['MType']."',
                                                                    `ListedBy`          ='".$_POST['ListedBy']."',
                                                                    `PlotArea`          ='".$_POST['PlotArea']."',
                                                                    `Facing`            ='".$_POST['Facing']."',
                                                                    `title`             ='".$_POST['title']."',
                                                                    `content`           ='".str_replace("'","\\'",$_POST['content'])."',
                                                                    `amount`            ='".$_POST['amount']."',
                                                                    `filepath1`         ='".trim($_POST['uploadimage1'])."',
                                                                    `filepath2`         ='".trim($_POST['uploadimage2'])."',
                                                                    `filepath3`         ='".trim($_POST['uploadimage3'])."',
                                                                    `filepath4`         ='".trim($_POST['uploadimage4'])."',
                                                                    `filepath5`         ='".trim($_POST['uploadimage5'])."',
                                                                    `filepath6`         ='".trim($_POST['uploadimage6'])."' where postadid='".$_GET['rowid']."'");    
            }if($pageContent[0]['subcateid']=="23"){
                $postedadid = $mysql->execute("update _jpostads set `Mtype`             ='".$_POST['MType']."',
                                                                    `Furnishing`        ='".$_POST['Furnishing']."',
                                                                    `ListedBy`          ='".$_POST['ListedBy']."',
                                                                    `CarParking`        ='".$_POST['CarParking']."',
                                                                    `MealsIncluded`     ='".$_POST['MealsIncluded']."',
                                                                    `title`             ='".$_POST['title']."',
                                                                    `content`           ='".str_replace("'","\\'",$_POST['content'])."',
                                                                    `amount`            ='".$_POST['amount']."',
                                                                    `filepath1`         ='".trim($_POST['uploadimage1'])."',
                                                                    `filepath2`         ='".trim($_POST['uploadimage2'])."',
                                                                    `filepath3`         ='".trim($_POST['uploadimage3'])."',
                                                                    `filepath4`         ='".trim($_POST['uploadimage4'])."',
                                                                    `filepath5`         ='".trim($_POST['uploadimage5'])."',
                                                                    `filepath6`         ='".trim($_POST['uploadimage6'])."' where postadid='".$_GET['rowid']."'");    
            }if($pageContent[0]['categid']=="5"){                                                                                   
                $postedadid = $mysql->execute("update _jpostads set `SalaryPeriod`             ='".$_POST['SalaryPeriod']."',
                                                                    `PositionType`        ='".$_POST['PositionType']."',
                                                                    `SalaryFrom`        ='".$_POST['SalaryFrom']."',
                                                                    `salaryTo`          ='".$_POST['SalaryTo']."',
                                                                    `title`             ='".$_POST['title']."',
                                                                    `content`           ='".str_replace("'","\\'",$_POST['content'])."',
                                                                    `amount`            ='".$_POST['amount']."',
                                                                    `filepath1`         ='".trim($_POST['uploadimage1'])."',
                                                                    `filepath2`         ='".trim($_POST['uploadimage2'])."',
                                                                    `filepath3`         ='".trim($_POST['uploadimage3'])."',                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
                                                                    `filepath4`         ='".trim($_POST['uploadimage4'])."',
                                                                    `filepath5`         ='".trim($_POST['uploadimage5'])."',
                                                                    `filepath6`         ='".trim($_POST['uploadimage6'])."' where postadid='".$_GET['rowid']."'");    
            }
            
                                                                                                                    
          
            if (sizeof($postedadid)>0) {                                                                           
                $msg = "Updated Successfully"; 
            } else {                                                                                        
                echo $obj->printError("Error Updating ads".$errorMessage."-".$errorMessage1);   
            }
        }  
        $pageContent =JPostads::getPostad($_GET['rowid']);
    
?>
<form action="" method="post"  enctype="multipart/form-data" onsubmit="return dovalidation();">
  <div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                    <?php if(isset($msg)){ echo $obj->printSuccess($msg); }?> 
                        <div class="card-header">
                            <div class="card-title">Edit Post</div>
                        </div>
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
                                        if($pageContent[0]['categid']=="7"){ 
                                                include_once("includes/editpost_educationandlearning.php");
                                            }
                                        if($pageContent[0]['categid']=="8"){ 
                                            include_once("includes/editpost_services.php");
                                        }
                                        if($pageContent[0]['categid']=="12"){ 
                                            include_once("includes/editpost_entertainment.php");
                                        }if($pageContent[0]['categid']=="13"){ 
                                            include_once("includes/editpost_pet.php");
                                        } 
                                        if($pageContent[0]['categid']=="14"){ 
                                            include_once("includes/editpost_furniture.php");
                                        }
                                        if($pageContent[0]['categid']=="15"){ 
                                            include_once("includes/editpost_books.php");
                                        }
                                        
                                    ?>
                                    <div class="row mb-2">
            <div class="col-sm-12">
                <label>Attachement<span style="color: red;">*</span></label>
            </div>
        </div>

        <input type="hidden" name="uploadimage1" id="uploadimage1" value="<?php echo $pageContent[0]['filepath1'];?>">
        <input type="hidden" name="uploadimage2" id="uploadimage2" value="<?php echo $pageContent[0]['filepath2'];?>">
        <input type="hidden" name="uploadimage3" id="uploadimage3" value="<?php echo $pageContent[0]['filepath3'];?>">
        <input type="hidden" name="uploadimage4" id="uploadimage4" value="<?php echo $pageContent[0]['filepath4'];?>">
        <input type="hidden" name="uploadimage5" id="uploadimage5" value="<?php echo $pageContent[0]['filepath5'];?>">
        <input type="hidden" name="uploadimage6" id="uploadimage6" value="<?php echo $pageContent[0]['filepath6'];?>">


        <input type="file" onchange="image1_onchage()" name="image1" id="image1" style="display: none;"> 
        <input type="file" onchange="image2_onchage()" name="image2" id="image2" style="display: none;">
        <input type="file" onchange="image3_onchage()" name="image3" id="image3" style="display: none;">
        <input type="file" onchange="image4_onchage()" name="image4" id="image4" style="display: none;">
        <input type="file" onchange="image5_onchage()" name="image5" id="image5" style="display: none;">
        <input type="file" onchange="image6_onchage()" name="image6" id="image6" style="display: none;">
                                                                                                                               
        <div class="row mb-2">
            <div id="div_1">
                <?php if(strlen($pageContent[0]['filepath1'])>1) { ?>
                    <img src="https://www.klx.co.in/<?php echo "assets/".$config['thumb'].$pageContent[0]['filepath1'];?>" style='width: 64px;height:64px;margin-top: 5px;'><br><span onclick='image1_close()' class='btn btn-danger btn-sm' style='padding: 0px 10px;font-size: 10px;'>Delete</span>
                <?php }else { ?>
                    <img id="src_image1" onclick="uploadimage('1')" src="https://www.klx.co.in/assets/add-image.png" style="width: 64px;margin-top: 20px;opacity: 0.3;cursor: pointer;">
                <?php } ?>
            </div> 
            <div  id="div_2">
                <?php if(strlen($pageContent[0]['filepath2'])>1) { ?>
                    <img src="https://www.klx.co.in/<?php echo "assets/".$config['thumb'].$pageContent[0]['filepath2'];?>" style='width: 64px;height:64px;margin-top: 5px;'><br><span onclick='image2_close()' class='btn btn-danger btn-sm' style='padding: 0px 10px;font-size: 10px;'>Delete</span>
                <?php }else { ?>
                    <img id="src_image2" onclick="uploadimage('2')" src="https://www.klx.co.in/assets/add-image.png" style="width: 64px;margin-top: 20px;opacity: 0.3;cursor: pointer;">
                <?php } ?>
            </div>
            <div  id="div_3">
               <?php if(strlen($pageContent[0]['filepath3'])>1) { ?>
                    <img src="https://www.klx.co.in/<?php echo "assets/".$config['thumb'].$pageContent[0]['filepath3'];?>" style='width: 64px;height:64px;margin-top: 5px;'><br><span onclick='image3_close()' class='btn btn-danger btn-sm' style='padding: 0px 10px;font-size: 10px;'>Delete</span>
                <?php }else { ?>
                    <img id="src_image3" onclick="uploadimage('3')" src="https://www.klx.co.in/assets/add-image.png" style="width: 64px;margin-top: 20px;opacity: 0.3;cursor: pointer;">
                <?php } ?>
            </div>
            <div  id="div_4">
                <?php if(strlen($pageContent[0]['filepath4'])>1) { ?>
                    <img src="https://www.klx.co.in/<?php echo "assets/".$config['thumb'].$pageContent[0]['filepath4'];?>" style='width: 64px;height:64px;margin-top: 5px;'><br><span onclick='image4_close()' class='btn btn-danger btn-sm' style='padding: 0px 10px;font-size: 10px;'>Delete</span>
                <?php }else { ?>
                    <img id="src_image4" onclick="uploadimage('4')" src="https://www.klx.co.in/assets/add-image.png" style="width: 64px;margin-top: 20px;opacity: 0.3;cursor: pointer;">
                <?php } ?>
            </div>
            <div  id="div_5">
                <?php if(strlen($pageContent[0]['filepath5'])>1) { ?>
                    <img src="https://www.klx.co.in/<?php echo "assets/".$config['thumb'].$pageContent[0]['filepath5'];?>" style='width: 64px;height:64px;margin-top: 5px;'><br><span onclick='image5_close()' class='btn btn-danger btn-sm' style='padding: 0px 10px;font-size: 10px;'>Delete</span>
                <?php }else { ?>
                    <img id="src_image5" onclick="uploadimage('5')" src="https://www.klx.co.in/assets/add-image.png" style="width: 64px;margin-top: 20px;opacity: 0.3;cursor: pointer;">
                <?php } ?>
            </div>
            <div  id="div_6">
                <?php if(strlen($pageContent[0]['filepath6'])>1) { ?>
                    <img src="https://www.klx.co.in/<?php echo "assets/".$config['thumb'].$pageContent[0]['filepath6'];?>" style='width: 64px;height:64px;margin-top: 5px;'><br><span onclick='image6_close()' class='btn btn-danger btn-sm' style='padding: 0px 10px;font-size: 10px;'>Delete</span>
                <?php }else { ?>
                    <img id="src_image6" onclick="uploadimage('6')" src="https://www.klx.co.in/assets/add-image.png" style="width: 64px;margin-top: 20px;opacity: 0.3;cursor: pointer;">
                <?php } ?>
            </div> 
              
        </div>
         <div class="errorstring" id="Errimage1"><?php echo isset($Errimage1)? $Errimage1 : "";?></div>
        <img src='https://www.klx.co.in/assets/loading.gif' style='width:0px'>
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
                            </div>
                        </div>
                        <div class="card-footer" style="border-top:1px solid #fff;">
                            <div class="">
                                <div class="row mb-2">
                                    <div class="col-sm-12">
                                        <button type="submit" class="btn btn-success" name="save">Update</button>
                                            <button type="submit" class="btn btn-warning" name="unpublishbtn">UnPublish</button>
                                            <button type="submit" class="btn btn-danger" name="deletebtn">Delete</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    </div>
               </div>
            </div>
        </div>
    </div>
    </div>
</form>  
 
<string name="image_chooser">File Chooser</string>
<script>
    var loadingGif="<img src='https://www.klx.co.in/assets/loading.gif' style='width:96px'>";
    function uploadimage(imgid){                                                                                       
        $('#image'+imgid).trigger("click");
    }
    /*Start Image 1 Process */
    function image1_close() {
        $('#uploadimage1').val("");
        $('#div_1').html('<img onclick="uploadimage(\'1\')" id="src_image1" src="https://www.klx.co.in/assets/add-image.png" style="width: 64px;margin-top: 20px;opacity: 0.3;cursor: pointer;">');  
        $('#div_1').css({"border":"1px solid red"});
        $('#Errimage1').html("Please Upload Image");
    }
    
    function image1_onchage() {
        $('#div_1').html(loadingGif);
        var fd = new FormData(); 
        var files = $('#image1')[0].files[0]; 
        fd.append('file', files);                                                         
        $.ajax({
            url: 'https://www.klx.co.in/upload.php', 
            type: 'post', 
            data: fd, 
            contentType: false, 
            processData: false, 
            success: function(response){
        
                if (response!="error") {
                    $('#uploadimage1').val(response);
                        $('#div_1').html("<div><img src='https://www.klx.co.in/<?php echo "assets/".$config['thumb'];?>"+response.trim()+"' style='height: 64px;width: 64px;margin-top: 5px;'><br><span onclick='image1_close()' class='btn btn-danger btn-sm' style='padding: 0px 10px;font-size: 10px;'>Delete</span></div>");
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
        $('#div_2').html('<img onclick="uploadimage(\'2\')" id="src_image2" src="https://www.klx.co.in/assets/add-image.png" style="width: 64px;margin-top: 20px;opacity: 0.3;cursor: pointer;">');  
    }
    
    function image2_onchage() {
        $('#div_2').html(loadingGif);
        var fd = new FormData(); 
        var files = $('#image2')[0].files[0]; 
        fd.append('file', files); 
        $.ajax({
            url: 'https://www.klx.co.in/upload.php', 
            type: 'post', 
            data: fd, 
            contentType: false, 
            processData: false, 
            success: function(response){ 
                if (response!="error") {
                    $('#uploadimage2').val(response);
                        $('#div_2').html("<div><img src='https://www.klx.co.in/<?php echo "assets/".$config['thumb'];?>"+response.trim()+"' style='width: 64px;height: 64px;margin-top: 5px;'><br><span onclick='image2_close()' class='btn btn-danger btn-sm' style='padding: 0px 10px;font-size: 10px;'>Delete</span></div>");
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
        $('#div_3').html('<img onclick="uploadimage(\'3\')" id="src_image3" src="https://www.klx.co.in/assets/add-image.png" style="width: 64px;margin-top: 20px;opacity: 0.3;cursor: pointer;">');  
    }
    
    function image3_onchage() {
        $('#div_3').html(loadingGif);
        var fd = new FormData(); 
        var files = $('#image3')[0].files[0]; 
        fd.append('file', files); 
        $.ajax({
            url: 'https://www.klx.co.in/upload.php', 
            type: 'post', 
            data: fd, 
            contentType: false, 
            processData: false, 
            success: function(response){ 
                if (response!="error") {
                    $('#uploadimage3').val(response);
                        $('#div_3').html("<div><img src='https://www.klx.co.in/<?php echo "assets/".$config['thumb'];?>"+response.trim()+"' style='height:64px;width: 64px;margin-top: 5px;'><br><span onclick='image3_close()' class='btn btn-danger btn-sm' style='padding: 0px 10px;font-size: 10px;'>Delete</span></div>");
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
        $('#div_4').html('<img onclick="uploadimage(\'4\')" id="src_image4" src="https://www.klx.co.in/assets/add-image.png" style="width: 64px;margin-top: 20px;opacity: 0.3;cursor: pointer;">');  
    }
    
    function image4_onchage() {
        $('#div_4').html(loadingGif);
        var fd = new FormData(); 
        var files = $('#image4')[0].files[0]; 
        fd.append('file', files); 
        $.ajax({
            url: 'https://www.klx.co.in/upload.php', 
            type: 'post', 
            data: fd, 
            contentType: false, 
            processData: false, 
            success: function(response){ 
                if (response!="error") {
                    $('#uploadimage4').val(response);
                        $('#div_4').html("<div><img src='https://www.klx.co.in/<?php echo "assets/".$config['thumb'];?>"+response.trim()+"' style='width: 64px;height: 64px;margin-top: 5px;'><br><span onclick='image4_close()' class='btn btn-danger btn-sm' style='padding: 0px 10px;font-size: 10px;'>Delete</span></div>");
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
        $('#div_5').html('<img onclick="uploadimage(\'5\')" id="src_image5" src="https://www.klx.co.in/assets/add-image.png" style="width: 64px;margin-top: 20px;opacity: 0.3;cursor: pointer;">');  
    }
    
    function image5_onchage() {
        $('#div_5').html(loadingGif);
        var fd = new FormData(); 
        var files = $('#image5')[0].files[0]; 
        fd.append('file', files); 
        $.ajax({
            url: 'https://www.klx.co.in/upload.php', 
            type: 'post', 
            data: fd, 
            contentType: false, 
            processData: false, 
            success: function(response){ 
                if (response!="error") {
                    $('#uploadimage5').val(response);
                        $('#div_5').html("<div><img src='https://www.klx.co.in/<?php echo "assets/".$config['thumb'];?>"+response.trim()+"' style='width: 64px;height: 64px;margin-top: 5px;'><br><span onclick='image5_close()' class='btn btn-danger btn-sm' style='padding: 0px 10px;font-size: 10px;'>Delete</span></div>");
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
        $('#div_6').html('<img onclick="uploadimage(\'6\')" id="src_image6" src="https://www.klx.co.in/assets/add-image.png" style="width: 64px;margin-top: 20px;opacity: 0.3;cursor: pointer;">');  
    }
    
    function image6_onchage() {
        $('#div_6').html(loadingGif);
        var fd = new FormData(); 
        var files = $('#image6')[0].files[0]; 
        fd.append('file', files); 
        $.ajax({
            url: 'https://www.klx.co.in/upload.php', 
            type: 'post', 
            data: fd, 
            contentType: false, 
            processData: false, 
            success: function(response){ 
                if (response!="error") {
                    $('#uploadimage6').val(response);
                        $('#div_6').html("<div><img src='https://www.klx.co.in/<?php echo "assets/".$config['thumb'];?>"+response.trim()+"' style='height: 64px;width: 64px;margin-top: 5px;'><br><span onclick='image6_close()' class='btn btn-danger btn-sm' style='padding: 0px 10px;font-size: 10px;'>Delete</span></div>");
                    } else {
                        alert("error");
                    }
                }, 
            }); 
    }
    /*End of Image 6 Process */
    </script>  
     <script type="text/javascript">
    <?php if($pageContent[0]['categid']!="5") {?>
         var amount = document.querySelector('#amount'), preAmount = amount.value;
        amount.addEventListener('input', function(){
            if(isNaN(Number(amount.value))){
                amount.value = preAmount;
                return;
            }

            var numberAfterDecimal = amount.value.split(".")[1];
            if(numberAfterDecimal && numberAfterDecimal.length > 3){
                amount.value = Number(amount.value).toFixed(3);;
            }
            preAmount = amount.value;
        })
    <?php } ?>
    <?php if($pageContent[0]['subcateid']=="60" || $pageContent[0]['subcateid']=="61"|| $pageContent[0]['subcateid']=="62" || $pageContent[0]['subcateid']=="65" || $pageContent[0]['subcateid']=="66" ) { ?>
        var km = document.querySelector('#KMDriven'), preAmount = km.value;
        km.addEventListener('input', function(){
            if(isNaN(Number(km.value))){
                km.value = preAmount;
                return;
            }

            var numberAfterDecimal = km.value.split(".")[1];
            if(numberAfterDecimal && numberAfterDecimal.length > 3){
                km.value = Number(km.value).toFixed(3);;
            }
            preAmount = km.value;
        })
    <?php }?> 
    </script>        
<?php include_once("footer.php"); ?>