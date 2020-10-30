<?php 
$page="IncomeRange";
include_once("views/Admin/Settings/Masters/settings_header.php");
?>

<div class="col-sm-10 rightwidget">
<form method="post" action="<?php echo GetUrl("Settings/Masters/IncomeRanges/New");?>" onsubmit="">      
    <h4 class="card-title">Masters</h4>
    <h4 class="card-title">Manage Income Range</h4>                  
        <div class="form-group row">
             <div class="col-sm-6">
            <button type="submit" class="btn btn-primary"><i class="mdi mdi-plus"></i>Income Ranges</button>
            <button type="submit" class="btn btn-success dropdown-toggle"  data-toggle="dropdown">Export</button>
                <ul class="dropdown-menu">
                    <li><a href="#">To Excel</a></li>
                    <li><a href="#">To Pdf</a></li>
                    <li><a href="#">To Htm</a></li>
                </ul>
                </div>
                <div class="col-sm-6" style="text-align:right;padding-top:5px;color:skyblue;">
                    <a href="ManageIncomeRanges" ><small>All</small></a>&nbsp;|&nbsp;
                    <a href="ManageActiveIncomeRanges"><small>Active</small></a>&nbsp;|&nbsp;
                    <a href="ManageDeactiveIncomeRanges"><small style="font-weight:bold;text-decoration:underline">Deactive</small></a>
                </div>
                </div>
                <div class="table-responsive">
                    <table id="myTable" class="table table-striped">
                      <thead>
                        <tr>
                          <th>ID</th>  
                          <th>Income Ranges</th>
                          <th></th> 
                        </tr>
                      </thead>
                      <tbody>  
                           <?php $IncomeRanges = $webservice->getData("Admin","GetManageDeactiveIncomeRanges"); ?>
                        <?php foreach($IncomeRanges['data'] as $IncomeRange) { ?>
                                <tr>
                                <td><span class="<?php echo ($IncomeRange['IsActive']==1) ? 'Activedot' : 'Deactivedot';?>"></span>&nbsp;&nbsp;<?php echo $IncomeRange['SoftCode'];?></td>
                                <td><?php echo $IncomeRange['CodeValue'];?></td>
                                <td style="text-align:right"><a href="<?php echo GetUrl("Settings/Masters/IncomeRanges/Manage/Edit/". $IncomeRange['SoftCode'].".html");?>"><span>Edit</span></a>&nbsp;&nbsp;&nbsp;
                                <a href="<?php echo GetUrl("Settings/Masters/IncomeRanges/Manage/View/". $IncomeRange['SoftCode'].".html");?>"><span>View</span></a></td> 
                                </tr>
                        <?php } ?>   
                        </tbody>
                    </table>
                  </div>
</form>
</div>
 <script>
$(document).ready(function(){
    $('#myTable').dataTable();
    setTimeout("DataTableStyleUpdate()",500);
});
</script>
<?php include_once("views/Admin/Settings/Masters/settings_footer.php");?>                    