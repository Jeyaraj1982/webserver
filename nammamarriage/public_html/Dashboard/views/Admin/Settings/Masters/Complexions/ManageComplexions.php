<?php 
$page="ManageComplexions";
include_once("views/Admin/Settings/Masters/settings_header.php");
?>
<div class="col-sm-10 rightwidget">
<form method="post" action="<?php echo GetUrl("Settings/Masters/Complexions/New");?>" onsubmit=""> 
<div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
               <h4 class="card-title">Masters</h4>
               <h4 class="card-title">Manage Complexions</h4>
               <button type="submit" class="btn btn-primary"><i class="mdi mdi-plus"></i>Complexions</button>
               <button type="submit" class="btn btn-success dropdown-toggle"  data-toggle="dropdown">Export</button>
                <ul class="dropdown-menu">
                    <li><a href="#">To Excel</a></li>
                    <li><a href="#">To Pdf</a></li>
                    <li><a href="#">To Htm</a></li>
                </ul>
                <br><br>
                <div class="table-responsive">
                    <table id="myTable" class="table table-striped">
                      <thead>
                        <tr>
                          <th>ID</th>  
                          <th>Complexion Names</th>
                          <th></th> 
                        </tr>
                      </thead>
                      <tbody>  
                          <?php $BloodGroups = $webservice->getData("Admin","GetMastersManageDetails"); ?>
                        <?php foreach($BloodGroups['data']['Complexion'] as $ComplexionName) { ?>
                                <tr>
                                <td><span class="<?php echo ($ComplexionName['IsActive']==1) ? 'Activedot' : 'Deactivedot';?>"></span>&nbsp;&nbsp;<?php echo $ComplexionName['SoftCode'];?></td>
                                <td><?php echo $ComplexionName['CodeValue'];?></td>
                                <td style="text-align:right"><a href="<?php echo GetUrl("Settings/Masters/Complexions/Manage/Edit/". $ComplexionName['SoftCode'].".html");?>">Edit</a>&nbsp;&nbsp;&nbsp;
                                <a href="<?php echo GetUrl("Settings/Masters/Complexions/Manage/View/". $ComplexionName['SoftCode'].".html");?>">View</a></td> 
                                </tr>
                        <?php } ?>   
                            </tbody>
                    </table>
                  </div>
                </div>
              </div>
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