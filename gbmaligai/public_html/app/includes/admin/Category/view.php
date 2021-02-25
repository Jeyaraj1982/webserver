<?php
$data= $mysql->Select("select * from _tbl_category where md5(CategoryID)='".$_GET['id']."'");
?>

<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">View Category</div>
                        </div>
                            <div class="card-body">
                               <div class="form-group row">
                                    <div class="col-sm-3" style="text-align: center;">
                                        <div style="border: 1px solid #e6e6e6;padding: 25px;">
                                            <img src='../uploads/<?php echo $data[0]['Image'];?>' style='width: 64px;margin-top: 5px;'>
                                        </div>
                                    </div>
                                    <div class="col-sm-9">
                                        <div class="form-group form-show-validation row">
                                            <label for="name">Category Name</label>
                                            <div class="col-sm-12"><?php echo $data[0]['CategoryName'];?></div> 
                                        </div>
                                        <div class="form-group form-show-validation row">
                                            <label for="name">Description</label>
                                            <div class="col-sm-12"><?php echo $data[0]['Description'];?></div>
                                        </div>  
                                       <div class="form-group form-show-validation row">
                                            <label for="name">Is Active</label>
                                            <div class="col-sm-12"><?php if($data[0]['IsActive']=="1") { echo "Yes"; } else { echo "No";}?></div> 
                                       </div>
                                       <div class="form-group form-show-validation row">
                                            <label for="name">Created On</label>
                                            <div class="col-sm-12"><?php echo date("d M Y, H:i", strtotime($data[0]['AddedOn']));?></div> 
                                        </div>  
                                    </div>
                               </div> 
                            </div>
                            <div class="card-action">
                                <div class="row">
                                    <div class="col-md-12">
                                        <a href="dashboard.php?action=Category/list&status=All" class="btn btn-warning btn-border">Back</a>
                                    </div>                                        
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
