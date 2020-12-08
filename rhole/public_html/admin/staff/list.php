<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" style="padding-top:10px;padding-bottom:10px">
                            <div class="card-title">
                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        List of Staffs
                                    </div>
                                    <div class="col-sm-6" style="text-align:right;padding-top:5px;color:skyblue;">
                                       
                                       <button type="button" class="btn btn-primary btn-sm" onclick="location.href='<?php echo AppUrl;?>/admin/dashboard.php?action=staff/add'">Add</button>
                                    </div> 
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                 <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Staff ID</th>    
                                            <th>Staff Name</th>    
                                            <th>Email Address</th>    
                                            <th>Mobile Number</th>    
                                            <th>Craeted On</th>    
                                            <th></th>    
                                        </tr>
                                    </thead>  
                                    <tbody>
                                         <?php $staffs = $mysql->select("select * from _jusertable where isstaff='1' order by userid desc");  ?>
                                        <?php foreach($staffs as $staff){ ?>
                                            <tr>                                                                         
                                                <td><?php echo $staff["userid"];?></td>
                                                <td><?php echo $staff["personname"];?></td>
                                                <td><?php echo $staff["email"];?></td> 
                                                <td><?php echo $staff["mobile"];?></td> 
                                                <td><?php echo $staff["createdon"];?></td>
                                                <td>
                                                    <div class="dropdown dropdown-kanban" style="float: right;">
                                                        <button class="" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border:none;font-size:14px;background:none !important;padding-right:0px;margin-right:0px;cursor:pointer">
                                                            <i class="icon-options-vertical"></i>
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                            <a class="dropdown-item" href="<?php echo AppUrl;?>/admin/dashboard.php?action=staff/Edit&d=<?php echo $staff['userid'];?>" draggable="false">Edit</a>
                                                            <a class="dropdown-item" href="<?php echo AppUrl;?>/admin/dashboard.php?action=staff/View&d=<?php echo $staff['userid'];?>" draggable="false">View</a>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                        <?php if(sizeof($staffs)==0){ ?>
                                            <tr>
                                                <td colspan="6" style="text-align: center;">No Staffs Found</td>
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

