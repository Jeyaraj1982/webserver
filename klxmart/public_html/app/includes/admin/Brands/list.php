 <?php 
    if($_GET['status']=="All"){ 
        $Brands = $mysql->select("select * from _tbl_brands order by BrandName");
        $title="All Brands";
    }if($_GET['status']=="Active"){
        $Brands = $mysql->select("select * from _tbl_brands where IsActive='1' order by BrandName");
        $title="Active Brands";
    }if($_GET['status']=="Disable"){
        $Brands = $mysql->select("select * from _tbl_brands where IsActive='0' order by BrandName");
        $title="Disable Brands";
    }
?>
<div class="main-panel">                                                                                                                                                                      
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" style="padding-top:10px;padding-bottom:10px">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="card-title">
                                        Manage Brands
                                    <br>
                                    <span style="font-size: 15px"><?php echo $title;?></span>  </div>
                                </div>
                                <div class="col-md-8" style="text-align: right;">
                                    <a href="dashboard.php?action=Brands/add" class="btn btn-primary btn-xs">Add Brand</a><br>
                                    <a href="dashboard.php?action=Brands/list&status=All" <?php if($_GET['status']=="All"){ ?> style="font-size:bold;text-decoration:underline;"<?php } ?>>All Brands</a>&nbsp;|&nbsp;
                                    <a href="dashboard.php?action=Brands/list&status=Active" <?php if($_GET['status']=="Active"){ ?> style="font-size:bold;text-decoration:underline;"<?php } ?>>Active Brands</a>&nbsp;|&nbsp;
                                    <a href="dashboard.php?action=Brands/list&status=Disable" <?php if($_GET['status']=="Disable"){ ?> style="font-size:bold;text-decoration:underline;"<?php } ?>>Disable Brands</a>
                                </div>
                            </div>
                        </div>                                       
                        <div class="card-body">                                                                                                                                             
                            <div class="table-responsive">
                                 <table class="table table-striped mt-3">
                                        <thead>
                                            <tr>
                                                <th scope="col">Brands Name</th>
                                                <th scope="col" style="text-align: right;">Products</th>
                                                <th scope="col"> </th>
                                            </tr>                            
                                        </thead>
                                        <tbody>
                                        
                                        <?php foreach($Brands as $Brand){ ?>
                                        <?php $pc= $mysql->Select("SELECT COUNT(ProductID) AS cnt FROM _tbl_products where BrandID='".$Brand['BrandID']."'"); ?>
                                            <tr>
                                                <td><?php echo $Brand['BrandName'];?></td>
                                                <td style="text-align: right"><?php echo $pc[0]['cnt'];?></td>                                                   
                                                <td style="text-align: right">                                                   
                                                        <div class="dropdown dropdown-kanban" style="float: right;">
                                                            <button class="" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border:none;font-size:14px;background:none !important;padding-right:0px;margin-right:0px;cursor:pointer">
                                                                <i class="icon-options-vertical"></i>
                                                            </button>
                                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                                <a class="dropdown-item" href="dashboard.php?action=Brands/edit&id=<?php echo md5($Brand['BrandID']);?>" draggable="false">Edit</a>
                                                                <?php if($pc[0]['cnt']>0){ ?><a class="dropdown-item" href="dashboard.php?action=Brands/viewproducts&fr=br&id=<?php echo md5($Brand['BrandID']);?>&status=All" draggable="false">View Products</a><?php } ?>
                                                                <?php if($pc[0]['cnt']=="0"){ ?><a class="dropdown-item" draggable="false"><span onclick='CallConfirmation(<?php echo $Brand['BrandID'];?>)' class='btn btn-danger btn-sm' style='padding: 0px 10px;font-size: 10px;'>Delete</span></a><?php } ?>
                                                            </div>
                                                        </div>
                                                    </td>
                                            </tr>
                                        <?php } if(sizeof($Brands)=="0"){ ?>
                                            <tr>
                                                <td style="text-align: center;" colspan="3">No Brands found</td>
                                            </tr>
                                        <?php } ?>
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
<div class="modal fade right" id="ConfirmationPopup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-keyboard="false" data-backdrop="static" style="top: 0px !important;">
  <div class="modal-dialog modal-side modal-bottom-right modal-notify modal-danger" role="document" >
    <div class="modal-content" >
    <div id="xconfrimation_text"></div>
    </div>
  </div>
</div>
<script>
   var loading = "<div style='padding:80px;text-align:center;color:#aaa'><img src='assets/loading.gif'  style='width:80px'><br>Processing ...</div>";
 
 function CallConfirmation(BrandID){
    var text = '<form action="" method="POST" id="BrandFrm_'+BrandID+'">'
                    +'<input type="hidden" value="'+BrandID+'" id="BrandID" Name="BrandID">'
                     +'<div class="modal-header" style="padding-bottom:5px">'
                        +'<h4 class="heading"><strong>Confirmation</strong> </h4>'
                        +'<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:white">'
                            +'<span aria-hidden="true" style="color:black">&times;</span>'
                        +'</button>'
                     +'</div>'
                     +'<div class="modal-body">'
                        +'<div class="form-group row">'                                                            
                            +'<div class="col-sm-12">'
                                +'Are you sure want to delete brand?<br>'
                            +'</div>'
                        +'</div>'
                     +'</div>'
                     +'<div class="modal-footer">'
                        +'<button type="button" class="btn btn-outline-danger" data-dismiss="modal" >Cancel</button>&nbsp;&nbsp;&nbsp;'
                        +'<button type="button" class="btn btn-danger" onclick="DeleteBrand(\''+BrandID+'\')" >Yes, Confirm</button>'
                     +'</div>'
                +'</form>';  
        $('#xconfrimation_text').html(text);                                       
        $('#ConfirmationPopup').modal("show");
}                                                                                                 
 
 function DeleteBrand(BrandID) {
     var param = $( "#BrandFrm_"+BrandID).serialize();
    $("#confrimation_text").html(loading);
    $.post( "../webservice.php?action=DeleteBrand",param,function(data) {                 
        var obj = JSON.parse(data); 
        var html = "";                                                                              
        if (obj.status=="failure") {
            html = "<div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='assets/accessdenied.png' style='width:128px'><br><br>"+obj.message+"<br></div></div>";
            html += "<div style='padding:20px;text-align:center'>" + "<button type='button' class='btn btn-outline-success' data-dismiss='modal'>Cancel</button></div>"; 
        }if (obj.status=="Success") {
            html = "<div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='assets/tick.jpg' style='width:128px'><br><br>"+obj.message+"<br></div></div>";
            html += "<div style='padding:20px;text-align:center'>" + "<a href='dashboard.php?action=Brands/list&status=All' class='btn btn-outline-success'>Continue</a></div>"; 
        }
        $("#xconfrimation_text").html(html);
        
    });
}
</script>