
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
                                        Enquiries
                                    </div>
                                </div>
                                <div class="col-md-6" style="text-align: right;">
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                 <table class="table table-striped mt-3">
                                        <thead>
                                            <tr>
                                                <th scope="col">Requested On</th>
                                                <th scope="col">Full Name</th>
                                                <th scope="col">Mobile Number</th>
                                                <th scope="col">Package</th>
                                                <th scope="col">Pincode</th>
                                                <th scope="col"></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $enquirys = $mysql->select("select * from _tbl_tour_enquiry where Pincode  IN (select Pincode from _tbl_agent_pincode where isactive='1' and md5(AgentID)='".$_GET['id']."') order by EnquiryID DESC");?>
                                        <?php 
                                         foreach($enquirys as $enquiry){ 
                                              $TourPackages = $mysql->select("select * from _tbl_tours_package where PackageID='".$enquiry['PackageID']."'");        
                                        ?>
                                            <tr>
                                                <td><?php echo date("M,d Y", strtotime($enquiry['CreatedOn']));?></td>
                                                <td><?php echo $enquiry['FullName'];?></td>
                                                <td><?php echo $enquiry['MobileNumber'];?></td>
                                                <td><?php echo $TourPackages[0]['PackageName'];?></td>
                                                <td><?php echo $enquiry['Pincode'];?></td>
                                                <td style="text-align: right"><a href="javascript:void(0)" onclick="ViewEnquiryDetails('<?php echo md5($enquiry['EnquiryID']);?>')">View</a></td>
                                            </tr>
                                        <?php } ?>
                                        <?php if(sizeof($enquirys)==0){ ?>
                                            <tr>
                                                <td colspan="6" style="text-align: center;">No records found</td>
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
<div class="modal fade" id="ConfirmationPopup" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body" id="confrimation_text" style="padding:0px;">
         
         <div id="xconfrimation_text" style="text-align: center;font-size:15px;"></div>  
      </div>                                                                                                                                                                                                                        
    </div>
  </div>
</div>
<script>
var loading = "<div class='modal-body' style='padding:10px;'><div class='form-group row'><div class='col-sm-12' style='text-align:center'><div  style='padding:80px;text-align:center;color:#aaa;text-align:center'><img src='assets/loading.gif'  style='width:80px'><br>Processing ...</div></div></div>";
function ViewEnquiryDetails(EnquiryID) {   
        $("#confrimation_text").html(loading);
        $.ajax({url:'webservice.php?action=ViewEnquiryDetails&EnquiryID='+EnquiryID,success:function(data){
            $("#confrimation_text").html(data);
            $('#ConfirmationPopup').modal("show");
        }});
    }
</script>

