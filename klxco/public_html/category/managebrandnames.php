 <?php $i=1; ?>
<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" style="padding-top:10px;padding-bottom:10px">
                            <div class="card-title">
                                List of Brand Names
                                <?php
                                      $category = $mysql->select("select * from _jcategory where categid='".$_GET['categid']."'");
                                      $subcategory = $mysql->select("select * from _jsubcategory where subcateid='".$_GET['subcateid']."'");
                                      echo "<div style='font-size:12px;color:#555'>".$category[0]['categname']. " / ". $subcategory[0]['subcatename']."</div>";
                                ?>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                            <?php
                                 if (isset($_POST['btnBrand'])) {
                $mysql->insert("_jbrandnames",array("categid"=>$_GET['categid'],
                                                    "subcateid"=>$_GET['subcateid'],
                                                    "brandname"=>$_POST['brandname']));
                echo "<div class='alert alert-success' role='alert' style='border-right:1px solid #31CE36;border-top:1px solid #31CE36;border-bottom:1px solid #31CE36'>Saved Brand Name</div>";
        }
        if (isset($_POST['BtnDelete'])) {
            $mysql->execute("delete from _jbrandnames where brandid='".$_POST['dbrandid']."'");
             echo "<div class='alert alert-danger' role='alert' style='border-right:1px solid #F25961;border-top:1px solid #F25961;border-bottom:1px solid #F25961'>Deleted Brand Name</div>";
        }
                            ?>
                                 <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <td style="padding-left:10px;text-align:left;width:50px">No</td>
                                            <td style="padding-left:10px;text-align:left;">Brand Names</td>
                                            <td style="padding-right:10px;text-align:right">Model Names</td>
                                           <!-- <td style="padding-right:10px;text-align:right">District Names</td>
                                            <td style="padding-right:10px;text-align:right">City Names</td> -->
                                            <td style="padding-left:10px;text-align:left;width:140px"></td>
                                            
                                        </tr>
                                    </thead>  
                                    <tbody>
                                        <tr>
                                            <td colspan="3" style="background:#ccc;">
                                                <form action="" method="post">
                                                    <div class="row">
                                                       
                                                        <div class="col-8">
                                                        <input class="form-control" required type="text" name="brandname" value="" placeholder="Enter Brand Name">
                                                        </div>
                                                          <div class="col-4">
                                                         <input class="btn btn-primary" name="btnBrand" type="submit" value="Save Brand Name">
                                                        </div>
                                                    </div>
                                                
                                                
                                               
                                                </form>
                                            </td>
                                        </tr>
                                        <?php
                                            $data = $mysql->select("select * from _jbrandnames where subcateid='".$_GET['subcateid']."'  order by brandname");
                                            foreach($data as $d) {
                                              //  $statenames = $mysql->select("select count(*) as cnt from _jstatenames where countryid='".$d['countryid']."'");
                                              //  $districtnames = $mysql->select("select count(*) as cnt from _jdistrictnames where countryid='".$d['countryid']."'");
                                              //  $citynames = $mysql->select("select count(*) as cnt from _jcitynames where countryid='".$d['countryid']."'");
                                                $models = sizeof($mysql->select("select * from _JModels where brandid='".$d['brandid']."'  order by model"));
                                        ?>
                                        <tr>
                                            <td style="padding-left:10px;text-align:left"><?php echo $i;?></td>
                                            <td style="padding-left:10px;text-align:left"><a class="leftMenu" href="https://klx.co.in/klxadmin/dashboard.php?action=category/managemodelnames&brandid=<?php echo $d['brandid'];?>&subcateid=<?php echo $d['subcateid'];?>&categid=<?php echo $d['categid'];?>"><?php echo $d['brandname'];?></a></td>
                                            <td style="padding-right:10px;text-align:right"><?php echo $models;?></td>
                                           <!-- <td style="padding-right:10px;text-align:right"><?php echo $districtnames[0]['cnt'];?></td>
                                            <td style="padding-right:10px;text-align:right"><?php echo $citynames[0]['cnt'];?></td>-->
                                            <!--<td  style="padding-right:5px !important;padding-left:5px !important;text-align:right;"><a href="javascript:void(0)" class="btn btn-info btn-sm" onclick="ConfirmationEditBrandName('<?php echo $d['brandid'];?>','<?php echo $d['brandname'];?>')">Edit</a>&nbsp;&nbsp;
                                            <?php if ($models==0) { ?>
                                            
                                            <?php } else { ?>
                                                <input class="btn btn-danger btn-sm" disabled="disabled" type="button" value="Delete">
                                            <?php } ?>
                                            
                                            </td>-->
                                            <td style="padding-right:5px !important;padding-left:5px !important;text-align:right;">
                                                <a href="javascript:void(0)" class="btn btn-info btn-sm" onclick="ConfirmationEditBrandName('<?php echo $d['brandid'];?>','<?php echo $d['brandname'];?>')">Edit</a>&nbsp;&nbsp;
                                                <?php if ($models==0) { ?>
                                                    <a href="javascript:void(0)" class="btn btn-danger btn-sm" onclick="ConfirmationDeleteBrandName('<?php echo $d['brandid'];?>','<?php echo $d['brandname'];?>')">Delete</a>
                                                <?php } else { ?>
                                                    <a href="javascript:void(0)" disabled="disabled" class="btn btn-danger btn-sm">Delete</a> 
                                                <?php } ?>
                                            </td>
                                        </tr>
                                       <?php $i++; } ?>               
                                    </tbody> 
                                 </table>                                                                
                            </div>
                        </div>
                    </div>                                                                                             
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="ConfirmationPopup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body" id="confrimation_text" style="padding:10px;">
         
         <div id="xconfrimation_text" style="text-align: center;font-size:15px;"></div>  
      </div>
    </div>
  </div>
</div>
<script>
function is_AlphaNumeric(acname) {
    
        if (acname.length==0) {
            return false;
        }
       // var reg = /[a-zA-Z]|\d|\s|\./
        var reg = /^[a-zA-Z\s\.]+$/
        if (acname.match(reg)) {
            return true
        }
        return false;
    }
</script>
<script> 
var loading = "<div style='padding:80px;text-align:center;color:#aaa'><img src='https://klx.co.in/klxadmin/assets/loading.gif'  style='width:80px'><br>Processing ...</div>";
     
                                                
function ConfirmationEditBrandName(brandid, brandname){
    var txt = '<form action="" method="POST" id="BrandFrm_'+brandid+'"><div class="form-group row">'
                    +'<div class="col-sm-12" style="text-align:center">'
                        +'CONFIRMATION'
                    +'</div>'
               +'</div>'
               +'<div class="form-group row">'
                    +'<div class="col-sm-12" style="text-align:left">'
                    +'Are you sure want to change brand name?'
                    +'</div>'
                +'</div>'
                +'<div class="form-group row" >'
                    +'<div class="col-sm-3">'
                        +'Brand Name'
                    +'</div>'
                    +'<div class="col-sm-9" style="text-align:left">'
                        +'<input type="hidden" name="subcateid" id="subcateid" value="<?php echo $_GET['subcateid'];?>"  >'
                        +'<input type="hidden" name="categid" id="categid" value="<?php echo $_GET['categid'];?>"  >'
                        +'<input type="hidden" name="brandid" id="brandid" value="'+brandid+'"  >'
                        +'<input type="text" name="BrandName" id="brand_new" value="'+brandname+'" class="form-control">'
                        +'<div id="Errbrandname" class="ErrorString" style="color:red;font-size:12px"></div>'
                    +'</div>'
                +'</div>'
                +'<div style="padding:20px;text-align:center">'
                    +'<button type="button" class="btn btn-outline-danger" data-dismiss="modal" >Cancel</button>&nbsp;&nbsp;&nbsp;'
                    +'<button type="button" class="btn btn-success" onclick="doUpdate(\''+brandid+'\')" >Yes, Confirm to Update</button>'
                 +'</div></form>';  
        $('#xconfrimation_text').html(txt);                                       
        $('#ConfirmationPopup').modal("show");
}

 function doUpdate(brandid) {
    $('#Errbrandname').html(""); 
    var ErrorCount=0; 
    
    var brand = $('#brand_new').val().trim();
        if (brand.length==0) {
            $('#Errbrandname').html("Please Enter Brand Name");   
            ErrorCount++;      
        } else {
            if (!(is_AlphaNumeric(brand))) {
                $('#Errbrandname').html("Please Enter Alpha Numeric Characters Only");
            ErrorCount++; 
            }
        }
    if(ErrorCount==0){
     
 
        var param = $( "#BrandFrm_"+brandid ).serialize();                                                  
        $("#confrimation_text").html(loading);
        
        $.post( "https://klx.co.in/webservice.php?action=UpdateBrandName",  param,function( data ) {
            var obj = JSON.parse(data); 
            var html = "";
            if (obj.status=="failure") {
                html = "<div style='width:100%;padding:10px;background:#fff;text-align:center;color:red'><img src='https://klx.co.in/klxadmin/assets/accessdenied.png' style='width:128px'><br><br>Updation failed.<br>"+obj.message;
                
            } else { 
                 var buttons = "<div style='text-align:center;padding:10px;'><button type='button' class='btn btn-primary' onclick='location.href=\"dashboard.php\"'>Home</button>&nbsp;&nbsp;<a href='dashboard.php?action=category/managebrandnames&subcateid="+obj.subcateid+"&categid="+obj.categid+"' class='btn btn-success'>Continue</a></div>";
                html = "<div style='width:100%;padding:10px;background:#fff;text-align:center;color:#222'><img src='https://klx.co.in/klxadmin/assets/tick.jpg' style='width:128px'><br><br>"+obj.message+"</div>";
                html += "<br>" + buttons;
                $('#ConfirmationPopup').modal("show");
            }
            $("#confrimation_text").html(html);
            
        });
    }else {
        return false;   
    }
}
function ConfirmationDeleteBrandName(brandid, brandname){
    var txt = '<form action="" method="POST" id="BrandFrm_'+brandid+'"><div class="form-group row">'
                    +'<div class="col-sm-12" style="text-align:center">'
                        +'CONFIRMATION'
                    +'</div>'
               +'</div>'
               +'<div class="form-group row">'
                    +'<div class="col-sm-12" style="text-align:left">'
                    +'Are you sure want to delete brand name?'
                    +'</div>'
                +'</div>'
                +'<div class="form-group row" >'
                    +'<div class="col-sm-12" style="text-align:left">'
                        +'<input type="hidden" name="subcateid" id="subcateid" value="<?php echo $_GET['subcateid'];?>"  >'
                        +'<input type="hidden" name="categid" id="categid" value="<?php echo $_GET['categid'];?>"  >'
                        +'<input type="hidden" name="brandid" id="brandid" value="'+brandid+'"  >'
                        +'<input type="text" disabled="disabled" name="BrandName" id="brand_new" value="'+brandname+'" class="form-control">'
                        +'<div id="Errmodel" class="ErrorString" style="color:red;font-size:12px"></div>'
                    +'</div>'
                +'</div>'
                +'<div style="padding:20px;text-align:center">'
                    +'<button type="button" class="btn btn-outline-danger" data-dismiss="modal" >Cancel</button>&nbsp;&nbsp;&nbsp;'
                    +'<button type="button" class="btn btn-success" onclick="doDelete(\''+brandid+'\')" >Yes, Confirm to delete</button>'
                 +'</div></form>';  
        $('#xconfrimation_text').html(txt);                                       
        $('#ConfirmationPopup').modal("show");
}
 function doDelete(brandid) {
        var param = $( "#BrandFrm_"+brandid ).serialize();
        $("#confrimation_text").html(loading);
        
        $.post( "https://klx.co.in/webservice.php?action=deleteBrandName",  param,function( data ) {
            var obj = JSON.parse(data); 
            var html = "";
            if (obj.status=="failure") {
                html = "<div style='width:100%;padding:10px;background:#fff;text-align:center;color:red'><img src='https://klx.co.in/klxadmin/assets/accessdenied.png' style='width:128px'><br><br>Transaction failed.<br>"+obj.message;
                
            } else { 
                 var buttons = "<div style='text-align:center;padding:10px;'><button type='button' class='btn btn-primary' onclick='location.href=\"dashboard.php\"'>Home</button>&nbsp;&nbsp;<a href='dashboard.php?action=category/managebrandnames&subcateid="+obj.subcateid+"&categid="+obj.categid+"' class='btn btn-success'>Continue</a></div>";
                html = "<div style='width:100%;padding:10px;background:#fff;text-align:center;color:#222'><img src='https://klx.co.in/klxadmin/assets/tick.jpg' style='width:128px'><br><br>"+obj.message+"</div>";
                html += "<br>" + buttons;
                $('#ConfirmationPopup').modal("show");
            }
            $("#confrimation_text").html(html);
            
        });
     
}
</script>
