<form method="post" action="" onsubmit="">      
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
            <div class="form-group row">
                <div class="col-sm-6">
                     <h4 class="card-title">Profile Requested</h4>
                </div>
                <div class="col-sm-6" style="text-align:right">
                    <a href="<?php echo GetUrl("Profiles/Requested");?>"><img src="<?php echo SiteUrl?>assets/images/listicon.svg" style="width:30px"></a>&nbsp;&nbsp;
                    <a href="<?php echo GetUrl("Profiles/RequestedProfileDisplay");?>"><img src="<?php echo SiteUrl?>assets/images/rectangleListicon.svg" style="width:30px"></a>
                </div>
            </div>
                <div class="table-responsive">
                    <table id="myTable" class="table table-striped">
                      <thead>
                        <tr>
                          <th>Requested On</th>
                          <th>Member Code</th>
                          <th>Member Name</th>
                          <th>Profile Code</th> 
                          <th>Profile Name</th> 
                          <th>Status</th> 
                          <th></th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php 
                         $response = $webservice->getData("Admin","GetProfilesRequestVerify");
                         if (sizeof($response['data'])>0) {
                         ?>
                         <?php foreach($response['data']as $P) { 
                            $Profile = $P['ProfileInfo'];
                            ?>
                        <tr>
                           <td><?php echo putDateTime($Profile['RequestVerifyOn']);?></td>
                           <td><?php echo $P['Members']['MemberCode'];?></td>
                           <td><?php echo $P['Members']['MemberName'];?></td>
                           <td><?php echo $Profile['ProfileCode'];?></td>
                           <td><?php echo $Profile['ProfileName'];?></td>
                           <td>Submitted To Verify</td>
                           <td><a href="<?php echo GetUrl("Profiles/DATViewRequestProfile/". $Profile['ProfileCode'].".htm");?>"><span>View</span></a></td>
                      </tr>
                      <?php } }?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
        </form>
 <script>
$(document).ready(function(){
    $('#myTable').dataTable();
    setTimeout("DataTableStyleUpdate()",500);
});
</script>           