<?php $i=1; ?>
<?php
        $obj = new CommonController();
        
        $country = $mysql->select("select *   from _jcountrynames where countryid='".$_GET['countryid']."'");
        $statename = $mysql->select("select *   from _jstatenames where countryid='".$_GET['countryid']."' and stateid='".$_GET['stateid']."' order by statenames");
        $districtname = $mysql->select("select * from _jdistrictnames where countryid='".$_GET['countryid']."' and stateid='".$_GET['stateid']."' and distcid='".$_GET['distcid']."' order by districtname");
       
        if ($_POST['SaveBtn']) {
            $mysql->insert("_jcitynames",array("countryid"      => $_POST['countryid'],
                                               "countryname"    => $country[0]['countryname'],
                                               "stateid"        => $_POST['stateid'],
                                               "statename"      => $statename[0]['statenames'],
                                               "distcid"        => $_POST['distcid'],
                                               "districtname"   => $districtname[0]['districtname'],
                                               "cityname"       => $_POST['cityname']));
            echo  $obj->printSuccess("City Name added successfully");
        }
        $i=1;
         $data = $mysql->select("select * from _jcitynames where countryid='".$_GET['countryid']."' and stateid='".$_GET['stateid']."' and distcid='".$_GET['distcid']."' order by cityname");
    ?>
<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" style="padding-top:10px;padding-bottom:10px">
                            <div class="card-title">
                                List of Disrict Names (<?php echo $country[0]['countryname'];?>) - (<?php echo $statename[0]['statenames'];?>) - (<?php echo $districtname[0]['districtname'];?>)
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <td style="padding-left:10px;text-align:left;width:50px">No</td>
                                            <td style="padding-left:10px;text-align:left;">City Names</td>
                                            <td style="padding-left:10px;text-align:left;width:120px">Posts</td>
                                            <td style="padding-left:10px;text-align:left;width:140px"></td>
                                        </tr>
                                    </thead>  
                                    <tbody>
                                        <tr>
                                            <td colspan="4" style="background:#ccc;">
                                                <form action="" method="post" id="CityFrm">
                                                    <input type="hidden" name="countryid" value="<?php echo $_GET['countryid'];?>">
                                                    <input type="hidden" name="stateid" value="<?php echo $_GET['stateid'];?>">
                                                    <input type="hidden" name="distcid" value="<?php echo $_GET['distcid'];?>">
                                                    <div class="row">
                                                        <div class="col-9">
                                                            <input type="text" placeholder="Enter City Name" required name="cityname" class="form-control">
                                                        </div>
                                                        <div class="col-3">
                                                            <input type="submit" value="Add" name="SaveBtn" class="btn btn-primary">
                                                        </div>
                                                    </div>
                                                </form>
                                            </td>
                                        </tr>  
                                        <?php 
                                            foreach($data as $d) {
                                                $posts = $mysql->select("select count(*) as cnt from _jpostads where cityid='".$d['citynameid']."'");
                                        ?>                             
                                        <tr>
                                            <td style="padding-left:10px;text-align:left"><?php echo $i;?></td>
                                            <td style="padding-left:10px;text-align:left"><?php echo $d['cityname'];?></td>
                                            <td style="padding-right:10px;text-align:right;"><?php echo $posts[0]['cnt'];?></td>
                                            <td style="padding-right:5px !important;padding-left:5px !important;text-align:right;">
                                                <a href="javascript:void(0)" class="btn btn-info btn-sm" onclick="ConfirmationEditCity('<?php echo $d['citynameid'];?>','<?php echo $d['cityname'];?>')">Edit</a>&nbsp;&nbsp;
                                                <?php if ($posts[0]['cnt']>0) { ?>
                                                    <a href="javascript:void(0)" disabled="disabled" class="btn btn-danger btn-sm">Delete</a>
                                                <?php } else { ?>
                                                    <a href="javascript:void(0)" class="btn btn-danger btn-sm" onclick="ConfirmationDeleteCity('<?php echo $d['citynameid'];?>','<?php echo $d['cityname'];?>')">Delete</a>
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

function ConfirmationEditCity(citynameid,cityname){
    var txt = '<form action="" method="POST" id="CityFrm_'+citynameid+'"><div class="form-group row">'
                    +'<div class="col-sm-12" style="text-align:center">'
                        +'CONFIRMATION'
                    +'</div>'
               +'</div>'
               +'<div class="form-group row">'
                    +'<div class="col-sm-12" style="text-align:left">'
                    +'Are you sure want to change city name?'
                    +'</div>'
                +'</div>'
                +'<div class="form-group row" >'
                    +'<div class="col-sm-3">'
                        +'City Name'
                    +'</div>'
                    +'<div class="col-sm-9" style="text-align:left">'
                        +'<input type="hidden" name="citynameid" id="citynameid" value="'+citynameid+'" class="form-control">'
                        +'<input type="text" name="cityname" id="city" value="'+cityname+'" class="form-control">'
                        +'<div id="Errcity" class="ErrorString" style="color:red;font-size:12px"></div>'
                    +'</div>'
                +'</div>'
                +'<div style="padding:20px;text-align:center">'
                    +'<button type="button" class="btn btn-outline-danger" data-dismiss="modal" >Cancel</button>&nbsp;&nbsp;&nbsp;'
                    +'<button type="button" class="btn btn-success" onclick="doUpdateCityName(\''+citynameid+'\')" >Yes, Confirm to Update</button>'
                 +'</div></form>';  
        $('#xconfrimation_text').html(txt);                                       
        $('#ConfirmationPopup').modal("show");
}

function ConfirmationDeleteCity(citynameid,cityname){
    var txt = '<form action="" method="POST" id="CityFrm_'+citynameid+'"><div class="form-group row">'
                    +'<div class="col-sm-12" style="text-align:center">'
                        +'CONFIRMATION'
                    +'</div>'
               +'</div>'
               +'<div class="form-group row">'
                    +'<div class="col-sm-12" style="text-align:left">'
                    +'Are you sure want to remove city name?'
                    +'</div>'
                +'</div>'
                +'<div class="form-group row" >'
                    +'<div class="col-sm-12" style="text-align:left">'
                        +'<input type="hidden" name="citynameid" id="citynameid" value="'+citynameid+'" class="form-control">'
                        +'<input type="text" disabled=disabled name="cityname" id="city" value="'+cityname+'" class="form-control">'
                    +'</div>'
                +'</div>'
                +'<div style="padding:20px;text-align:center">'
                    +'<button type="button" class="btn btn-outline-danger" data-dismiss="modal" >Cancel</button>&nbsp;&nbsp;&nbsp;'
                    +'<button type="button" class="btn btn-success" onclick="doDeleteCityName(\''+citynameid+'\')" >Yes, Confirm to Remove</button>'
                 +'</div></form>';  
        $('#xconfrimation_text').html(txt);                                       
        $('#ConfirmationPopup').modal("show");
}
 
 function doUpdateCityName(citynameid) {
    $('#Errcity').html(""); 
    var ErrorCount=0; 
    
    var city = $('#city').val().trim();
        if (city.length==0) {
            $('#Errcity').html("Please Enter City");   
            ErrorCount++;      
        } else {
            if (!(is_AlphaNumeric(city))) {
                $('#Errcity').html("Please Enter Alpha Numeric Characters Only");
            ErrorCount++; 
            }
        }
    if(ErrorCount==0){
        var param = $( "#CityFrm_"+citynameid ).serialize();
        $("#confrimation_text").html(loading);
        
        $.post( "<?php echo AppUrl;?>/webservice.php?action=UpdateCityName",  param,function( data ) {
            var obj = JSON.parse(data); 
            var html = "";
            if (obj.status=="failure") {
                html = "<div style='width:100%;padding:10px;background:#fff;text-align:center;color:red'><img src='admin/assets/accessdenied.png' style='width:128px'><br><br>Transaction failed.<br>"+obj.message;
                
            } else { 
                var buttons = "<div style='text-align:center;padding:10px;'><button type='button' class='btn btn-primary' onclick='location.href=\"dashboard.php\"'>Home</button>&nbsp;&nbsp;<a href='dashboard.php?action=country/managecitynames&countryid="+obj.countryid+"&stateid="+obj.stateid+"&distcid="+obj.distcid+"' class='btn btn-success'>Continue</a></div>";
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

function doDeleteCityName(citynameid) {
    var param = $( "#CityFrm_"+citynameid).serialize();
    $("#confrimation_text").html(loading);
    $.post( "<?php echo AppUrl;?>/webservice.php?action=deleteCityName",param,function(data) {
        var obj = JSON.parse(data); 
        if (obj.status=="failure") {
            html = "<div style='width:100%;padding:10px;background:#fff;text-align:center;color:red'><img src=<?php echo AppUrl;?>/admin/assets/accessdenied.png' style='width:128px'><br><br>Transaction failed.<br>"+obj.message;
        } else { 
            html = "<div style='width:100%;padding:10px;background:#fff;text-align:center;color:#222'><img src='<?php echo AppUrl;?>/admin/assets/tick.jpg' style='width:128px'><br><br>"+obj.message+"</div>";
            html += "<br>" + "<div style='text-align:center;padding:10px;'><button type='button' class='btn btn-primary' onclick='location.href=\"dashboard.php\"'>Home</button>&nbsp;&nbsp;<a href='dashboard.php?action=country/managecitynames&countryid="+obj.countryid+"&stateid="+obj.stateid+"&distcid="+obj.distcid+"' class='btn btn-success'>Continue</a></div>";
            $('#ConfirmationPopup').modal("show");
        }
        $("#confrimation_text").html(html);
    });
}
</script>


