
<?php $action = explode("/",$_GET['cp']); ?>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <ul class="nav nav-pills nav-secondary" id="pills-tab" role="tablist" style="margin:0px auto;background:#fff">
                <li class="nav-item submenu">
                    <a class="nav-link <?php echo $action[1]=="Package" ? 'active show ' : '';?>" id="pills-home-tab" href="dashboard.php?action=Members/ViewMember&cp=Packages/Package&MCode=<?php echo $_GET['MCode'];?>" role="tab" >Package</a>
                </li>
                <li class="nav-item submenu">
                    <a class="nav-link <?php echo $action[1]=="PackageDetails" ? 'active show ' : '';?>" id="pills-contact-tab"   href="dashboard.php?action=Members/ViewMember&cp=Packages/PackageDetails&MCode=<?php echo $_GET['MCode'];?>">PackageDetails</a>
                </li>
            </ul> 
        </div>
    </div>
</div>

<!--<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Packages</h4>
            </div>
            <div class="card-body">
                <form action="" method="post">
                    <div class="form-group row">
                        <div class="col-sm-3">
                            <label>From</label>
                            <div class="input-group">
                                <input type="text" class="form-control success" id="From" name="From" value="<?php echo isset($_POST['From']) ? $_POST['From'] : date("Y-m-d");?>" required="" aria-invalid="false"><label id="From-error" class="error" for="From"></label>
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="fa fa-calendar-check"></i>
                                    </span>
                                </div>
                            </div>    
                        </div>
                        <div class="col-sm-3">
                            <label class="col-sm-1">To</label>
                            <div class="input-group">
                                <input type="text" class="form-control success" id="To" name="To" value="<?php echo isset($_POST['To']) ? $_POST['To'] : date("Y-m-d");?>" required="" aria-invalid="false"><label id="To-error" class="error" for="To"></label>
                                <div class="input-group-append">
                                    <span class="input-group-text">
                                        <i class="fa fa-calendar-check"></i>
                                    </span>
                                </div>
                            </div>    
                        </div>
                        <div class="col-sm-2"><label class="col-sm-1"> &nbsp;</label><button type="submit" name="viewTransaction" class="btn btn-primary">View transactions</button></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>     -->
<?php //if(strlen($_POST['From'])!=0 && strlen($_POST['To'])!=0) {?>   
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Packages</h4>
            </div>    
            <div class="card-body">
                <div class="table-responsive">
                    <table id="basic-datatables" class="display table table-striped table-hover" >
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Package Name</th>
                                <th style="text-align: right;">Package Cost</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php 
                            $packageinfo = $mysql->select("select * from _tbl_Members_Packages where MemberID='".$data[0]['MemberID']."'");
                            ?>
                           
                            <?php if(sizeof($packageinfo)=="0"){?>
                            <tr>
                                <td colspan="5" style="text-align: center;">No records found</td>
                            </tr>
                            <?php }?> 
                            <?php foreach($packageinfo as $info) {?>
                              <tr>
                                <td><?php echo date("M d, Y",strtotime($packageinfo[0]['PackageActivatedOn']));?></td>
                                <td><?php echo $packageinfo[0]['PackageName'];?></td>
                                <td style="text-align: right">$<?php echo $packageinfo[0]['PackageCost'];?></td>
                             </tr>
                             <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php //} ?>

<script>
$('#From').datetimepicker({
        format: 'YYYY-MM-DD'
    });
    $('#To').datetimepicker({
        format: 'YYYY-MM-DD'
    });

</script>