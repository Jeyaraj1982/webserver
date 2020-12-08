<?php
         $obj = new CommonController();
        $country = $mysql->select("select *   from _jcountrynames where countryid='".$_GET['countryid']."'");
        $statename = $mysql->select("select *   from _jstatenames where countryid='".$_GET['countryid']."' and stateid='".$_GET['stateid']."' order by statenames");


        if ($_POST['SaveBtn']) {
            
            $mysql->insert("_jdistrictnames",array("countryid"      => $_POST['countryid'],
                                                   "countryname"    => $country[0]['countryname'],
                                                   "stateid"        => $_POST['stateid'],
                                                   "statename"      => $statename[0]['statenames'],
                                                   "districtname"   => $_POST['districtname']));
            echo  $obj->printSuccess("District Name added successfully");
        }
        $i=1;
        $country = $mysql->select("select *   from _jcountrynames where countryid='".$_GET['countryid']."'");
        $statename = $mysql->select("select *   from _jstatenames where countryid='".$_GET['countryid']."' and stateid='".$_GET['stateid']."' order by statenames");
        $data = $mysql->select("select * from _jdistrictnames where countryid='".$_GET['countryid']."' and stateid='".$_GET['stateid']."' order by districtname");
    ?>    
<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" style="padding-top:10px;padding-bottom:10px">
                            <div class="card-title">
                                List of Disrict Names  (<?php echo $country[0]['countryname'];?>) - (<?php echo $statename[0]['statenames'];?>)
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                        
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <td style="padding-left:10px;text-align:left;width:50px">No</td>
                                                    <td style="padding-left:10px;text-align:left;">District Names</td>
                                                    <td style="padding-right:10px;text-align:right;width:120px">Cities</td>
                                                    <td style="padding-right:10px;text-align:right;width:140px"></td>
                                                </tr>
                                            </thead>  
                                                <tr>
                <td colspan="4" style="background:#ccc;">
                  <form action="" method="post">
                                    <input type="hidden" name="countryid" value="<?php echo $_GET['countryid'];?>">
                                    <input type="hidden" name="stateid" value="<?php echo $_GET['stateid'];?>">
                <div class="row">
                    <div class="col-6">
                    <input type="text" name="districtname" class="form-control">
                    </div>
                     <div class="col-6">
                      <input type="submit" value="Save District Name" name="SaveBtn" class="btn btn-primary">
                     </div>
                </div>
                  </form>    
                   
                </td>
            </tr>
            
                                            <tbody>
                                                <?php
                                                    foreach($data as $d) {
                                                        $citynames = $mysql->select("select count(*) as cnt from _jcitynames where distcid='".$d['distcid']."'");
                                                ?>
                                                <tr>
                                                  
                                                            <td style="padding-left:10px;text-align:left;"><?php echo $i;?></td>
                                                        <td style="padding-left:10px;text-align:left"><a class="leftMenu" href="<?php echo AppUrl;?>/admin/dashboard.php?action=country/managecitynames&countryid=<?php echo $country[0]['countryid'];?>&stateid=<?php echo $statename[0]['stateid'];?>&distcid=<?php echo $d['distcid'];?>" target="rpanel"><?php echo $d['districtname'];?></a></td>
                                                        <td style="padding-right:10px;text-align:right;"><?php echo $citynames[0]['cnt'];?></td>
                                                        <td style="padding-right:5px !important;padding-left:5px !important;text-align:right;">
                                                            <a href="javascript:void(0)" class="btn btn-info btn-sm" onclick="ConfirmationEditDistrictName('<?php echo $d['distcid'];?>','<?php echo $d['districtname'];?>')">Edit</a>&nbsp;&nbsp;
                                                            <?php if ($citynames[0]['cnt']>0) { ?>
                                                            <a href="javascript:void(0)" disabled="disabled" class="btn btn-danger btn-sm">Delete</a>
                                                            <?php } else { ?>
                                                            <a href="javascript:void(0)" class="btn btn-danger btn-sm" onclick="ConfirmationDeleteDistrictName('<?php echo $d['distcid'];?>','<?php echo $d['districtname'];?>')">Delete</a>
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
 var loading = "<div style='padding:80px;text-align:center;color:#aaa'><img src='<?php echo AppUrl;?>/admin/assets/loading.gif'  style='width:80px'><br>Processing ...</div>";
     
                                                
function ConfirmationEditDistrictName(distid, distname){
    var txt = '<form action="" method="POST" id="DistrictFrm_'+distid+'"><div class="form-group row">'
                    +'<div class="col-sm-12" style="text-align:center">'
                        +'CONFIRMATION'
                    +'</div>'
               +'</div>'
               +'<div class="form-group row">'
                    +'<div class="col-sm-12" style="text-align:left">'
                    +'Are you sure want to change district name?'
                    +'</div>'
                +'</div>'
                +'<div class="form-group row" >'
                    +'<div class="col-sm-3">'
                        +'District Name'
                    +'</div>'
                    +'<div class="col-sm-9" style="text-align:left">'
                        +'<input type="hidden" name="CountryID" id="CountryID" value="<?php echo $country[0]['countryid'];?>"  >'
                        +'<input type="hidden" name="StateID" id="StateID" value="<?php echo $statename[0]['stateid'];?>"  >'
                        +'<input type="hidden" name="distcid" id="distcid" value="'+distid+'"  >'
                        +'<input type="text" name="DistName" id="dist_new" value="'+distname+'" class="form-control">'
                        +'<div id="Errdistrict" class="ErrorString" style="color:red;font-size:12px"></div>'
                    +'</div>'
                +'</div>'
                +'<div style="padding:20px;text-align:center">'
                    +'<button type="button" class="btn btn-outline-danger" data-dismiss="modal" >Cancel</button>&nbsp;&nbsp;&nbsp;'
                    +'<button type="button" class="btn btn-success" onclick="doUpdate(\''+distid+'\')" >Yes, Confirm to Update</button>'
                 +'</div></form>';  
        $('#xconfrimation_text').html(txt);                                       
        $('#ConfirmationPopup').modal("show");
}

function ConfirmationDeleteDistrictName(distid, distname){
    var txt = '<form action="" method="POST" id="DistrictFrm_'+distid+'"><div class="form-group row">'
                    +'<div class="col-sm-12" style="text-align:center">'
                        +'CONFIRMATION'
                    +'</div>'
               +'</div>'
               +'<div class="form-group row">'
                    +'<div class="col-sm-12" style="text-align:left">'
                    +'Are you sure want to delete district name?'
                    +'</div>'
                +'</div>'
                +'<div class="form-group row" >'
                    +'<div class="col-sm-12" style="text-align:left">'
                        +'<input type="hidden" name="distcid" id="distcid" value="'+distid+'"  >'
                        +'<input type="text" disabled=disabled name="DistName" id="dist_new" value="'+distname+'" class="form-control">'
                        +'<div id="Errdistrict" class="ErrorString" style="color:red;font-size:12px"></div>'
                    +'</div>'
                +'</div>'
                +'<div style="padding:20px;text-align:center">'
                    +'<button type="button" class="btn btn-outline-danger" data-dismiss="modal" >Cancel</button>&nbsp;&nbsp;&nbsp;'
                    +'<button type="button" class="btn btn-success" onclick="doDelete(\''+distid+'\')" >Yes, Confirm to delete</button>'
                 +'</div></form>';  
        $('#xconfrimation_text').html(txt);                                       
        $('#ConfirmationPopup').modal("show");
}
 
 
 
 function doUpdate(distid) {
    $('#Errdistrict').html(""); 
    var ErrorCount=0; 
    
    var district = $('#dist_new').val().trim();
        if (district.length==0) {
            $('#Errdistrict').html("Please Enter District");   
            ErrorCount++;      
        } else {
            if (!(is_AlphaNumeric(district))) {
                $('#Errdistrict').html("Please Enter Alpha Numeric Characters Only");
            ErrorCount++; 
            }
        }
    if(ErrorCount==0){
     
 
        var param = $( "#DistrictFrm_"+distid ).serialize();
        $("#confrimation_text").html(loading);
        
        $.post( "<?php echo AppUrl;?>/webservice.php?action=UpdateDistrictName",  param,function( data ) {
            var obj = JSON.parse(data); 
            var html = "";
            if (obj.status=="failure") {
                html = "<div style='width:100%;padding:10px;background:#fff;text-align:center;color:red'><img src='<?php echo AppUrl;?>/admin/assets/accessdenied.png' style='width:128px'><br><br>Transaction failed.<br>"+obj.message;
                
            } else { 
                 var buttons = "<div style='text-align:center;padding:10px;'><button type='button' class='btn btn-primary' onclick='location.href=\"dashboard.php\"'>Home</button>&nbsp;&nbsp;<a href='dashboard.php?action=country/managedistrictnames&countryid="+obj.countryid+"&stateid="+obj.stateid+"' class='btn btn-success'>Continue</a></div>";
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

 function doDelete(distid) {
        var param = $( "#DistrictFrm_"+distid ).serialize();
        $("#confrimation_text").html(loading);
        
        $.post( "<?php echo AppUrl;?>/webservice.php?action=deleteDistrictName",  param,function( data ) {
            var obj = JSON.parse(data); 
            var html = "";
            if (obj.status=="failure") {
                html = "<div style='width:100%;padding:10px;background:#fff;text-align:center;color:red'><img src='<?php echo AppUrl;?>/admin/assets/accessdenied.png' style='width:128px'><br><br>Transaction failed.<br>"+obj.message;
                
            } else { 
                 var buttons = "<div style='text-align:center;padding:10px;'><button type='button' class='btn btn-primary' onclick='location.href=\"dashboard.php\"'>Home</button>&nbsp;&nbsp;<a href='dashboard.php?action=country/managedistrictnames&countryid="+obj.countryid+"&stateid="+obj.stateid+"' class='btn btn-success'>Continue</a></div>";
                html = "<div style='width:100%;padding:10px;background:#fff;text-align:center;color:#222'><img src='<?php echo AppUrl;?>/admin/assets/tick.jpg' style='width:128px'><br><br>"+obj.message+"</div>";
                html += "<br>" + buttons;
                $('#ConfirmationPopup').modal("show");
            }
            $("#confrimation_text").html(html);
            
        });
     
}
</script>
