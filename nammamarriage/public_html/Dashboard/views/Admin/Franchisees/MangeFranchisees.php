<?php 
    $response = $webservice->getData("Admin","GetManageFranchisee");
    if (sizeof($response['data'])==0) {
?>
<div class="form-group row">
     <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <div style="text-align: center;padding-top:calc( (100vh - 105px)/2 - 130px) !important;padding-bottom:calc( (100vh - 105px)/2 - 130px) !important;">
                    <div style="">
                    <img src="<?php echo ImagePath ?>/icons/franchisee_icon.png" style="width:128px;">
                    </div><br>
                    Franchisee Not Found <br><a href="<?php echo GetUrl("Franchisees/Create");?>">click here to create franchisee</a>
                </div>
            </div>
        </div>
    </div>
    </div>
<?php } else {?>
<form method="post" action="<?php echo GetUrl("Franchisees/Create");?>" onsubmit="">      
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Franchisees</h4>
                <h4 class="card-title">Manage Franchisees</h4>
                <div class="form-group row">
                <div class="col-sm-6">
                <button type="submit" class="btn btn-primary "><i class="mdi mdi-plus"></i>New Franchisee</button>
                <button type="submit" class="btn btn-success dropdown-toggle"  data-toggle="dropdown">Export</button>
                <ul class="dropdown-menu">
                    <li><a href="#">To Excel</a></li>
                    <li><a href="#">To Pdf</a></li>
                    <li><a href="#">To Htm</a></li>
                </ul></div>
                <div class="col-sm-6" style="text-align:right;padding-top:5px;color:skyblue;">
                    <a href="MangeFranchisees" ><small style="font-weight:bold;text-decoration:underline">All</small></a>&nbsp;|&nbsp;
                    <a href="ManageActiveFranchisees"><small>Active</small></a>&nbsp;|&nbsp;
                    <a href="ManageDeactiveFranchisees"><small>Deactive</small></a>
                </div>
                </div>
                <br><br>
                <div class="table-responsive">
                    <table id="myTable" class="table table-striped">
                      <thead>  
                        <tr> 
                        <th>Franchisee Names</th>  
                        <th>State Name</th>
                        <th>District Name</th>
                        <th>Plan Name</th>
                        <th>Created</th>
                        <th></th>
                        </tr>  
                    </thead>
                     <tbody>  
                        <?php foreach($response['data'] as $Franchisee) { ?>
                                <tr>
                                <td><span class="<?php echo ($Franchisee['IsActive']==1) ? 'Activedot' : 'Deactivedot';?>"></span>&nbsp;&nbsp;&nbsp;<?php echo $Franchisee['FranchiseName'];?><?php if($Franchisee['IsAdmin']==1) {?>&nbsp;<button class="btn btn-primary" style="padding: 0px 4px;font-size: 12px;background: orange;border: orange">Default</button><?php } ?></td>
                                <td><?php echo $Franchisee['StateName'];?></td>
                                <td><?php echo $Franchisee['DistrictName'];?></td>
                                <td><?php echo $Franchisee['Plan'];?></td>
                                <td><?php echo putDateTime($Franchisee['CreatedOn']);?></td>
                                <td>
								<a href="javascript:void(0)" onclick="ConfirmationfrEdit('<?php echo $Franchisee['FranchiseeCode'];?>')"><span>Edit</span></a>&nbsp;&nbsp;&nbsp;
								<a href="<?php echo GetUrl("Franchisees/View/". $Franchisee['FranchiseeCode'].".html");?>"><span>View</span></a>&nbsp;&nbsp;&nbsp;
                                <a href="<?php echo GetUrl("Franchisees/Wallet/RefillTransfer/". $Franchisee['FranchiseeCode'].".html");?>"><span>Refill</span></a>&nbsp;&nbsp;&nbsp;
                                <a href="<?php echo GetUrl("Franchisees/Report/". $Franchisee['FranchiseeCode'].".html");?>"><span>Report</span></a>
                                </td>
                                </tr>
                        <?php } ?>            
                      </tbody>                        
                     </table>
                  </div>
                </div>
              </div>
            </div>
        </form>   
		<div class="modal" id="PubplishNow" data-backdrop="static" >
            <div class="modal-dialog" >
                <div class="modal-content" id="Publish_body"  style="max-height: 300px;min-height: 300px;" >
            
                </div>
            </div>
        </div>
 <script>
 function ConfirmationfrEdit(FranchiseeID) {
	$('#PubplishNow').modal('show'); 
      var content = '<div class="modal-header">'
						+ '<h4 class="modal-title">Confirmation for Edit</h4>'
						+ '<button type="button" class="close" data-dismiss="modal" aria-label="Close" style="padding-top:5px;"><span aria-hidden="true"></span></button>'
					+ '</div>'
					+ '<div class="modal-body">'
						+'<div class="col-sm-12">Are you sure want to Edit</div>'
					+ '</div>' 
					+ '<div class="modal-footer">'
						+ '<button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>&nbsp;&nbsp;'
						+ '<a href="'+AppUrl+'Franchisees/Edit/'+FranchiseeID+'.html" class="btn btn-primary" name="Create" class="btn btn-primary" style="font-family:roboto;color:white">Yes</a>'
					+ '</div>';
            $('#Publish_body').html(content);
	 
     }
 
$(document).ready(function(){
    $('#myTable').dataTable();
    setTimeout("DataTableStyleUpdate()",500);
});
</script>
<?php } ?>