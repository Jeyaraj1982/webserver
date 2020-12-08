 <?php $i=1; ?>
<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" style="padding-top:10px;padding-bottom:10px">
                            <div class="card-title">
                                List of Modal Names
                                <?php
                                      $category = $mysql->select("select * from _jcategory where categid='".$_GET['categid']."'  ");
                                      $subcategory = $mysql->select("select * from _jsubcategory where subcateid='".$_GET['subcateid']."'  ");
                                      $brand = $mysql->select("select * from _jbrandnames where subcateid='".$_GET['subcateid']."' ");
                                      echo "<div style='font-size:12px;color:#555'>".$category[0]['categname']. " / ". $subcategory[0]['subcatename'] ." / ".$brand[0]['brandname']."</div>";
                                ?>
                            </div>                  
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                            <?php
                                 if (isset($_POST['btnBrand'])) {
                $mysql->insert("_JModels",array("categid"=>$_GET['categid'],
                                                    "subcateid"=>$_GET['subcateid'],
                                                    "brandid"=>$_GET['brandid'],
                                                    "model"=>$_POST['model']));
                echo "<div class='alert alert-success' role='alert' style='border-right:1px solid #31CE36;border-top:1px solid #31CE36;border-bottom:1px solid #31CE36'>Saved Model Name</div>";
        }
        if (isset($_POST['BtnDelete'])) {
            $mysql->execute("delete from _JModels where ModelID='".$_POST['dModelID']."'");
          
             echo "<div class='alert alert-danger' role='alert' style='border-right:1px solid #F25961;border-top:1px solid #F25961;border-bottom:1px solid #F25961'>Deleted Model Name</div>";
        }
                            ?>
                                 <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <td style="padding-left:10px;text-align:left;width:50px">No</td>
                                            <td style="padding-left:10px;text-align:left;">Modal Names</td>
                                           <!-- <td style="padding-right:10px;text-align:right">State Names</td>
                                            <td style="padding-right:10px;text-align:right">District Names</td>
                                            <td style="padding-right:10px;text-align:right">City Names</td> -->
                                              <td style="padding-left:10px;text-align:left;width:50px">Ads</td>
                                              <td style="padding-left:10px;text-align:left;width:140px"></td>
                                        </tr>
                                    </thead>  
                                    <tbody>
                                     <tr>
                                      <td colspan="4" style="background:#ccc;">
                                                <form action="" method="post">
                                                    <div class="row">
                                                       
                                                        <div class="col-8">
                                                        <input class="form-control" type="text" name="model" value="" placeholder="Enter Model Name">
                                                        </div>
                                                          <div class="col-4">
                                                         <input class="btn btn-primary" type="submit" value="Save Model Name" name="btnBrand">
                                                        </div>
                                                    </div>
                                                
                                                
                                               
                                                </form>
                                            </td>
                                      </tr>
                                        <?php                                                                                                                                                                                               
                                            $data = $mysql->select("select * from _JModels where brandid='".$_GET['brandid']."'  order by model");
                                            foreach($data as $d) {
                                              //  $statenames = $mysql->select("select count(*) as cnt from _jstatenames where countryid='".$d['countryid']."'");
                                              //  $districtnames = $mysql->select("select count(*) as cnt from _jdistrictnames where countryid='".$d['countryid']."'");
                                              //  $citynames = $mysql->select("select count(*) as cnt from _jcitynames where countryid='".$d['countryid']."'");
                                              $posts = sizeof($mysql->select("select * from _jpostads where Model='".$d['ModelID']."'"));
                                        ?>
                                        <tr>
                                            <td style="padding-left:10px;text-align:left"><?php echo $i;?></td>
                                            <td style="padding-left:10px;text-align:left"><?php echo $d['model'];?></td>
                                            <td style="padding-left:10px;text-align:left"><?php echo $posts?></td>
                                            <!--<td style="padding-left:10px;text-align:left"><a class="leftMenu" href="<?php echo AppUrl;?>/admin/dashboard.php?action=category/managemodelnames&brandid=<?php echo $d['brandid'];?>&subcateid=<?php echo $d['subcateid'];?>&categid=<?php echo $d['categid'];?>"><?php echo $d['model'];?></a></td>-->
                                         <!--   <td style="padding-right:10px;text-align:right"><?php echo $statenames[0]['cnt'];?></td>
                                            <td style="padding-right:10px;text-align:right"><?php echo $districtnames[0]['cnt'];?></td>
                                            <td style="padding-right:10px;text-align:right"><?php echo $citynames[0]['cnt'];?></td>-->
                                             <td style="padding-right:5px !important;padding-left:5px !important;text-align:right;"><a href="javascript:void(0)" class="btn btn-info btn-sm" onclick="ConfirmationEditModelName('<?php echo $d['ModelID'];?>','<?php echo $d['model'];?>')">Edit</a>&nbsp;&nbsp;
                                            <?php if ($posts==0) { ?>
                                            <a href="javascript:void(0)" class="btn btn-danger btn-sm" onclick="ConfirmationDeleteModelName('<?php echo $d['ModelID'];?>','<?php echo $d['model'];?>')">Delete</a>
                                           <!-- <form action="" method="post">
                                                <input type="hidden" name="dModelID" value="<?php echo $d['ModelID'];?>">
                                                <input class="btn btn-danger btn-sm" type="submit" value="Delete" name="BtnDelete">
                                                </form>    -->
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
var loading = "<div style='padding:80px;text-align:center;color:#aaa'><img src='<?php echo AppUrl;?>/admin/assets/loading.gif'  style='width:80px'><br>Processing ...</div>";
     
                                                
function ConfirmationEditModelName(modelid, modelname){
    var txt = '<form action="" method="POST" id="ModelFrm_'+modelid+'"><div class="form-group row">'
                    +'<div class="col-sm-12" style="text-align:center">'
                        +'CONFIRMATION'
                    +'</div>'
               +'</div>'
               +'<div class="form-group row">'
                    +'<div class="col-sm-12" style="text-align:left">'
                    +'Are you sure want to change model name?'
                    +'</div>'
                +'</div>'
                +'<div class="form-group row" >'
                    +'<div class="col-sm-3">'
                        +'Model Name'
                    +'</div>'
                    +'<div class="col-sm-9" style="text-align:left">'
                        +'<input type="hidden" name="subcateid" id="subcateid" value="<?php echo $_GET['subcateid'];?>"  >'
                        +'<input type="hidden" name="categid" id="categid" value="<?php echo $_GET['categid'];?>"  >'
                        +'<input type="hidden" name="brandid" id="brandid" value="<?php echo $_GET['brandid'];?>"  >'
                        +'<input type="hidden" name="modelid" id="modelid" value="'+modelid+'"  >'
                        +'<input type="text" name="ModelName" id="model_new" value="'+modelname+'" class="form-control">'
                        +'<div id="Errmodelname" class="ErrorString" style="color:red;font-size:12px"></div>'
                    +'</div>'
                +'</div>'
                +'<div style="padding:20px;text-align:center">'
                    +'<button type="button" class="btn btn-outline-danger" data-dismiss="modal" >Cancel</button>&nbsp;&nbsp;&nbsp;'
                    +'<button type="button" class="btn btn-success" onclick="doUpdate(\''+modelid+'\')" >Yes, Confirm to Update</button>'
                 +'</div></form>';  
        $('#xconfrimation_text').html(txt);                                       
        $('#ConfirmationPopup').modal("show");
}

 function doUpdate(modelid) {
    $('#Errmodelname').html(""); 
    var ErrorCount=0; 
    
    var model = $('#model_new').val().trim();
        if (model.length==0) {
            $('#Errmodelname').html("Please Enter Model Name");   
            ErrorCount++;      
        } 
    if(ErrorCount==0){
     
 
        var param = $( "#ModelFrm_"+modelid ).serialize();                                                  
        $("#confrimation_text").html(loading);
        
        $.post( "<?php echo AppUrl;?>/webservice.php?action=UpdateModelName",  param,function( data ) {
            var obj = JSON.parse(data); 
            var html = "";
            if (obj.status=="failure") {
                html = "<div style='width:100%;padding:10px;background:#fff;text-align:center;color:red'><img src='<?php echo AppUrl;?>/admin/assets/accessdenied.png' style='width:128px'><br><br>Updation failed.<br>"+obj.message;
                
            } else { 
                 var buttons = "<div style='text-align:center;padding:10px;'><button type='button' class='btn btn-primary' onclick='location.href=\"dashboard.php\"'>Home</button>&nbsp;&nbsp;<a href='dashboard.php?action=category/managemodelnames&brandid="+obj.brandid+"&subcateid="+obj.subcateid+"&categid="+obj.categid+"' class='btn btn-success'>Continue</a></div>";
                html = "<div style='width:100%;padding:10px;background:#fff;text-align:center;color:#222'><img src='<?php echo AppUrl;?>/admin/assets/tick.jpg' style='width:128px'><br><br>"+obj.message+"</div>";
                html += "<br>" + buttons;
                $('#ConfirmationPopup').modal("show");
            }
            $("#confrimation_text").html(html);
                                                                                                                    
        });
    }else {
        return false;   
    }
}
function ConfirmationDeleteModelName(modelid, modelname){
    var txt = '<form action="" method="POST" id="ModelFrm_'+modelid+'"><div class="form-group row">'
                    +'<div class="col-sm-12" style="text-align:center">'
                        +'CONFIRMATION'
                    +'</div>'
               +'</div>'
               +'<div class="form-group row">'
                    +'<div class="col-sm-12" style="text-align:left">'
                    +'Are you sure want to delete model name?'
                    +'</div>'
                +'</div>'
                +'<div class="form-group row" >'
                    +'<div class="col-sm-12" style="text-align:left">'
                        +'<input type="hidden" name="subcateid" id="subcateid" value="<?php echo $_GET['subcateid'];?>"  >'
                        +'<input type="hidden" name="categid" id="categid" value="<?php echo $_GET['categid'];?>"  >'
                        +'<input type="hidden" name="brandid" id="brandid" value="<?php echo $_GET['brandid'];?>"  >'
                        +'<input type="hidden" name="modelid" id="modelid" value="'+modelid+'"  >'
                        +'<input type="text" disabled=disabled name="ModelName" id="model_new" value="'+modelname+'" class="form-control">'
                        +'<div id="Errmodel" class="ErrorString" style="color:red;font-size:12px"></div>'
                    +'</div>'
                +'</div>'
                +'<div style="padding:20px;text-align:center">'
                    +'<button type="button" class="btn btn-outline-danger" data-dismiss="modal" >Cancel</button>&nbsp;&nbsp;&nbsp;'
                    +'<button type="button" class="btn btn-success" onclick="doDelete(\''+modelid+'\')" >Yes, Confirm to delete</button>'
                 +'</div></form>';  
        $('#xconfrimation_text').html(txt);                                       
        $('#ConfirmationPopup').modal("show");
}
 function doDelete(modelid) {
        var param = $( "#ModelFrm_"+modelid ).serialize();
        $("#confrimation_text").html(loading);
        
        $.post( "<?php echo AppUrl;?>/webservice.php?action=deleteModelName",  param,function( data ) {
            var obj = JSON.parse(data); 
            var html = "";
            if (obj.status=="failure") {
                html = "<div style='width:100%;padding:10px;background:#fff;text-align:center;color:red'><img src='<?php echo AppUrl;?>/admin/assets/accessdenied.png' style='width:128px'><br><br>Transaction failed.<br>"+obj.message;
                
            } else { 
                 var buttons = "<div style='text-align:center;padding:10px;'><button type='button' class='btn btn-primary' onclick='location.href=\"dashboard.php\"'>Home</button>&nbsp;&nbsp;<a href='dashboard.php?action=category/managemodelnames&brandid="+obj.brandid+"&subcateid="+obj.subcateid+"&categid="+obj.categid+"' class='btn btn-success'>Continue</a></div>";
                html = "<div style='width:100%;padding:10px;background:#fff;text-align:center;color:#222'><img src='<?php echo AppUrl;?>/admin/assets/tick.jpg' style='width:128px'><br><br>"+obj.message+"</div>";
                html += "<br>" + buttons;
                $('#ConfirmationPopup').modal("show");
            }
            $("#confrimation_text").html(html);
            
        });
     
}
</script>
