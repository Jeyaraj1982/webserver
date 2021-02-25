<?php 
    if($_GET['status']=="All"){ 
        $SubCategorys = $mysql->select("select * from _tbl_sub_category order by SubCategoryID desc");
        $title ="All Sub Category";
    }if($_GET['status']=="Active"){
        $SubCategorys = $mysql->select("select * from _tbl_sub_category where IsActive='1' order by SubCategoryID desc");
        $title ="Active Sub Category";
    }if($_GET['status']=="Disable"){
       $SubCategorys = $mysql->select("select * from _tbl_sub_category where IsActive='0' order by SubCategoryID desc");
       $title ="Disable Sub Category";
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
                                        Manage Sub Category<br>
                                        <span style="font-size: 15px"><?php echo $title;?></span>
                                    </div>
                                </div>
                                <div class="col-md-8" style="text-align: right;">
                                    <a href="dashboard.php?action=SubCategory/add" class="btn btn-primary btn-xs">Add Sub Category</a><br>
                                    <a href="dashboard.php?action=SubCategory/list&status=All" <?php if($_GET['status']=="All"){ ?> style="font-size:bold;text-decoration:underline;"<?php } ?>>All</a>&nbsp;|&nbsp;
                                    <a href="dashboard.php?action=SubCategory/list&status=Active" <?php if($_GET['status']=="Active"){ ?> style="font-size:bold;text-decoration:underline;"<?php } ?>>Active</a>&nbsp;|&nbsp;
                                    <a href="dashboard.php?action=SubCategory/list&status=Disable" <?php if($_GET['status']=="Disable"){ ?> style="font-size:bold;text-decoration:underline;"<?php } ?>>Disable</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                 <table class="table table-striped mt-3">
                                        <thead>
                                            <tr>
                                                <th scope="col"></th>
                                                <th scope="col">Category Name</th>
                                                <th scope="col">Sub Category Name</th>
                                                <th scope="col" style="text-align: right;">Products</th>
                                                <th scope="col"> </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach($SubCategorys as $SubCategory){ ?>
                                        <?php $pc= $mysql->Select("SELECT COUNT(ProductID) AS cnt FROM _tbl_products where CategoryID='".$SubCategory['CategoryID']."' and SubCategoryID='".$SubCategory['SubCategoryID']."'"); ?>
                                            <tr>
                                                <td><img src="<?php echo "../uploads/".$SubCategory['Image'];?>" style='width: 50px;height:50px;margin-top: 5px;'></td>
                                                <td><?php echo $SubCategory['CategoryName'];?></td>
                                                <td><?php echo $SubCategory['SubCategoryName'];?></td>
                                                <td style="text-align: right"><?php echo $pc[0]['cnt'];?></td>                                                   
                                                <td style="text-align: right">                                                   
                                                    <div class="dropdown dropdown-kanban" style="float: right;">
                                                        <button class="" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border:none;font-size:14px;background:none !important;padding-right:0px;margin-right:0px;cursor:pointer">
                                                            <i class="icon-options-vertical"></i>
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                            <a class="dropdown-item" href="dashboard.php?action=SubCategory/edit&id=<?php echo md5($SubCategory['SubCategoryID']);?>" draggable="false">Edit</a>
                                                            <a class="dropdown-item" href="dashboard.php?action=SubCategory/view&id=<?php echo md5($SubCategory['SubCategoryID']);?>" draggable="false">View</a>
                                                            <a class="dropdown-item" href="dashboard.php?action=Products/add&id=<?php echo md5($SubCategory['CategoryID']);?>&sid=<?php echo md5($SubCategory['SubCategoryID']);?>&fr=sc" draggable="false">Add Product</a>
                                                            <?php if($pc[0]['cnt']>0){ ?><a class="dropdown-item" href="dashboard.php?action=SubCategory/viewproducts&fr=sc&id=<?php echo md5($SubCategory['SubCategoryID']);?>&status=All" draggable="false">View Products</a><?php } ?>
                                                            <?php if($pc[0]['cnt']=="0"){ ?><a class="dropdown-item" draggable="false"><span onclick='CallConfirmation(<?php echo $SubCategory['SubCategoryID'];?>)' class='btn btn-danger btn-sm' style='padding: 0px 10px;font-size: 10px;'>Delete</span></a><?php } ?>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                          <?php  if(sizeof($SubCategorys)=="0"){ ?>
                                            <tr>
                                                <td style="text-align: center;" colspan="4">No Sub Categories found</td>
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
 
 function CallConfirmation(SubCategoryID){
    var text = '<form action="" method="POST" id="DeleteSubCategoryFrm'+SubCategoryID+'">'
                    +'<input type="hidden" value="'+SubCategoryID+'" id="SubCategoryID" Name="SubCategoryID">'
                     +'<div class="modal-header" style="padding-bottom:5px">'
                        +'<h4 class="heading"><strong>Confirmation</strong> </h4>'
                        +'<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:white">'
                            +'<span aria-hidden="true" style="color:black">&times;</span>'
                        +'</button>'
                     +'</div>'
                     +'<div class="modal-body">'
                        +'<div class="form-group row">'                                                            
                            +'<div class="col-sm-12">'
                                +'Are you sure want to delete sub category?<br>'
                            +'</div>'
                        +'</div>'
                     +'</div>'
                     +'<div class="modal-footer">'
                        +'<button type="button" class="btn btn-outline-danger" data-dismiss="modal" >Cancel</button>&nbsp;&nbsp;&nbsp;'
                        +'<button type="button" class="btn btn-danger" onclick="DeleteSubCategory(\''+SubCategoryID+'\')" >Yes, Confirm</button>'
                     +'</div>'
                +'</form>';  
        $('#xconfrimation_text').html(text);                                       
        $('#ConfirmationPopup').modal("show");
}                                                                                                 
 
 function DeleteSubCategory(SubCategoryID) {
     var param = $( "#DeleteSubCategoryFrm"+SubCategoryID).serialize();
    $("#confrimation_text").html(loading);
    $.post( "../webservice.php?action=DeleteSubCategory",param,function(data) {                 
        var obj = JSON.parse(data); 
        var html = "";                                                                              
        if (obj.status=="failure") {
            html = "<div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='assets/accessdenied.png' style='width:128px'><br><br>"+obj.message+"<br></div></div>";
            html += "<div style='padding:20px;text-align:center'>" + "<button type='button' class='btn btn-outline-success' data-dismiss='modal'>Cancel</button></div>"; 
        }if (obj.status=="Success") {
            html = "<div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='assets/tick.jpg' style='width:128px'><br><br>"+obj.message+"<br></div></div>";
            html += "<div style='padding:20px;text-align:center'>" + "<a href='dashboard.php?action=SubCategory/list&status=All' class='btn btn-outline-success'>Continue</a></div>"; 
        }
        $("#xconfrimation_text").html(html);
        
    });
}
</script>

 