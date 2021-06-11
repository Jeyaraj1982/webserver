<?php 
    if($_GET['status']=="All"){ 
        $Categorys = $mysql->select("select * from _tbl_category order by ListOrder");
        $title ="All Category";
    }if($_GET['status']=="Active"){
        $Categorys = $mysql->select("select * from _tbl_category where IsActive='1' order by ListOrder");
        $title ="Active Category";
    }if($_GET['status']=="Disable"){
       $Categorys = $mysql->select("select * from _tbl_category where IsActive='0' order by ListOrder");
       $title ="Disable Category";
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
                                        Manage Category<br>
                                        <span style="font-size: 15px"><?php echo $title;?></span>
                                    </div>
                                </div>
                                <div class="col-md-8" style="text-align: right;">
                                    <a href="dashboard.php?action=Category/add" class="btn btn-primary btn-xs">Add Category</a><br>
                                    <a href="dashboard.php?action=Category/list&status=All" <?php if($_GET['status']=="All"){ ?> style="font-size:bold;text-decoration:underline;"<?php } ?>>All</a>&nbsp;|&nbsp;
                                    <a href="dashboard.php?action=Category/list&status=Active" <?php if($_GET['status']=="Active"){ ?> style="font-size:bold;text-decoration:underline;"<?php } ?>>Active</a>&nbsp;|&nbsp;
                                    <a href="dashboard.php?action=Category/list&status=Disable" <?php if($_GET['status']=="Disable"){ ?> style="font-size:bold;text-decoration:underline;"<?php } ?>>Disable</a>
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
                                                <th scope="col" style="text-align: right">Sub Categories</th>
                                                <th scope="col" style="text-align: right">Products</th>
                                                <th scope="col" style="text-align: right">Display Order</th>
                                                <th scope="col"> </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach($Categorys as $Category){ ?>
                                            <?php $sc= $mysql->Select("SELECT COUNT(SubCategoryID) AS cnt FROM _tbl_sub_category where CategoryID='".$Category['CategoryID']."'"); ?>
                                            <?php $pc= $mysql->Select("SELECT COUNT(ProductID) AS cnt FROM _tbl_products where CategoryID='".$Category['CategoryID']."'"); ?>
                                            <tr>
                                                <td><img src="<?php echo "../uploads/".$Category['Image'];?>" style='width: 50px;height:50px;margin-top: 5px;'></td>
                                                <td><?php echo $Category['CategoryName'];?></td>
                                                <td style="text-align: right"><?php echo $sc[0]['cnt'];?></td>
                                                <td style="text-align: right"><?php echo $pc[0]['cnt'];?></td>
                                                <td style="text-align: right"><?php echo $Category['ListOrder'];?></td>
                                                <td style="text-align: right">                                                   
                                                    <div class="dropdown dropdown-kanban" style="float: right;">
                                                        <button class="" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border:none;font-size:14px;background:none !important;padding-right:0px;margin-right:0px;cursor:pointer">
                                                            <i class="icon-options-vertical"></i>
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                            <a class="dropdown-item" href="dashboard.php?action=Category/edit&id=<?php echo md5($Category['CategoryID']);?>" draggable="false">Edit</a>
                                                            <a class="dropdown-item" href="dashboard.php?action=Category/view&id=<?php echo md5($Category['CategoryID']);?>" draggable="false">View</a>
                                                            <a class="dropdown-item" href="dashboard.php?action=SubCategory/add&id=<?php echo md5($Category['CategoryID']);?>&fr=c" draggable="false">Add Sub Category</a>
                                                            <?php if($sc[0]['cnt']>0){ ?><a class="dropdown-item" href="dashboard.php?action=Category/viewsubcategory&fr=c&id=<?php echo md5($Category['CategoryID']);?>&status=All" draggable="false">View Sub Categories</a><?php } ?>
                                                            <?php if($sc[0]['cnt']=="0"){ ?><a class="dropdown-item" draggable="false"><span onclick='CallConfirmation(<?php echo $Category['CategoryID'];?>)' class='btn btn-danger btn-sm' style='padding: 0px 10px;font-size: 10px;'>Delete</span></a><?php } ?>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                          <?php  if(sizeof($Categorys)=="0"){ ?>
                                            <tr>
                                                <td style="text-align: center;" colspan="6">No Categories found</td>
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
 
 function CallConfirmation(CategoryID){
    var text = '<form action="" method="POST" id="DeleteCategoryFrm'+CategoryID+'">'
                    +'<input type="hidden" value="'+CategoryID+'" id="CategoryID" Name="CategoryID">'
                     +'<div class="modal-header" style="padding-bottom:5px">'
                        +'<h4 class="heading"><strong>Confirmation</strong> </h4>'
                        +'<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color:white">'
                            +'<span aria-hidden="true" style="color:black">&times;</span>'
                        +'</button>'
                     +'</div>'
                     +'<div class="modal-body">'
                        +'<div class="form-group row">'                                                            
                            +'<div class="col-sm-12">'
                                +'Are you sure want to delete category?<br>'
                            +'</div>'
                        +'</div>'
                     +'</div>'
                     +'<div class="modal-footer">'
                        +'<button type="button" class="btn btn-outline-danger" data-dismiss="modal" >Cancel</button>&nbsp;&nbsp;&nbsp;'
                        +'<button type="button" class="btn btn-danger" onclick="DeleteCategory(\''+CategoryID+'\')" >Yes, Confirm</button>'
                     +'</div>'
                +'</form>';  
        $('#xconfrimation_text').html(text);                                       
        $('#ConfirmationPopup').modal("show");
}                                                                                                 
 
 function DeleteCategory(CategoryID) {
     var param = $( "#DeleteCategoryFrm"+CategoryID).serialize();
    $("#confrimation_text").html(loading);
    $.post( "../webservice.php?action=DeleteCategory",param,function(data) {                 
        var obj = JSON.parse(data); 
        var html = "";                                                                              
        if (obj.status=="failure") {
            html = "<div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='assets/accessdenied.png' style='width:128px'><br><br>"+obj.message+"<br></div></div>";
            html += "<div style='padding:20px;text-align:center'>" + "<button type='button' class='btn btn-outline-success' data-dismiss='modal'>Cancel</button></div>"; 
        }if (obj.status=="Success") {
            html = "<div class='form-group row'><div class='col-sm-12' style='text-align:center'><img src='assets/tick.jpg' style='width:128px'><br><br>"+obj.message+"<br></div></div>";
            html += "<div style='padding:20px;text-align:center'>" + "<a href='dashboard.php?action=Category/list&status=All' class='btn btn-outline-success'>Continue</a></div>"; 
        }
        $("#xconfrimation_text").html(html);
        
    });
}
</script>

 