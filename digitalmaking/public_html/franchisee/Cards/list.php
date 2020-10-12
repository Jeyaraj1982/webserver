
<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" style="padding-top:10px;padding-bottom:10px">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card-title">
                                        Manage Cards
                                    </div>
                                </div>
                                <div class="col-md-6" style="text-align: right;">
                                    <a href="dashboard.php?action=Cards/create" class="btn btn-primary btn-xs">Add Card</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                 <table class="table table-striped mt-3">
                                        <thead>
                                            <tr>
                                                <th scope="col"></th>
                                                <th scope="col" style="padding-left:0px !important">Name</th>
                                                <th scope="col">Created On</th>
                                                <th scope="col" style="text-align: right;padding-right:0px !important">Viewed</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $Cards = $mysql->select("select * from _tbl_card_general_info where IsDelete='0' and CreatedBy='Franchisee' and CreatedByID='".$_SESSION['User']['FranchiseeID']."' order by ResumeID desc");?>
                                        <?php foreach($Cards as $Card){ ?>
                                            <tr>
                                                <td style="padding-right:0px !important;padding-left:0px !important"><img src="<?php echo "../uploads/".$Card['ProfilePhoto'];?>" style='width: 50px;height:50px;margin-top: 5px;'></td>
                                                <td style="padding-right:0px !important;padding-left:0px !important"><?php echo $Card['ResumeName'];?></td>
                                                <td style="padding-right:0px !important;padding-left:0px !important"><?php echo date("M-d-Y H:i",strtotime($Card['CreatedOn']));?></td>
                                                <td style="padding-right:0px !important;padding-left:0px !important;text-align: right;"><?php echo sizeof($mysql->select("select * from resume_card_visitor_log where ResumeID='".$Card['ResumeID']."'"));?><td>  
                                                <td style="padding-right:10px !important;padding-left:0px !important;text-align: right;">
                                                    <div class="dropdown dropdown-kanban" style="float: right;">
                                                    <button class="" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border:none;font-size:14px;background:none !important;padding-right:0px;margin-right:0px;cursor:pointer">
                                                        <i class="icon-options-vertical"></i>
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <a class="dropdown-item" href="dashboard.php?action=Cards/edit&id=<?php echo $Card['ResumeID'];?>" draggable="false">Edit</a>
                                                        <a class="dropdown-item" href="dashboard.php?action=Cards/view&id=<?php echo $Card['ResumeID'];?>" draggable="false">View</a>
                                                    </div>
                                                </div>     
                                                </td>
                                            </tr>
                                        <?php } ?>
                                        <?php if(sizeof($Cards)==0){ ?>
                                            <tr>
                                                <td colspan="5" style="text-align: center;">No Cards Found</td>
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


