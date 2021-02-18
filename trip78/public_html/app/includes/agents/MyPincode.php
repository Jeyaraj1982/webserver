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
                                        My Pincode
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" style="border: 1px solid #dee2e6;">
                                <thead>
                                    <tr>
                                        <th scope="col">Pincode</th>
                                        <th scope="col" style="text-align: right;">Enquiry</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $Pincodes = $mysql->select("select * from _tbl_agent_pincode where AgentID='".$_SESSION['User']['AgentID']."' order by Pincode");   ?>
                                <?php foreach($Pincodes as $Pincode){ ?>        
                                    <tr>
                                        <td><?php echo $Pincode['Pincode'];?></td>
                                        <td style="text-align: right;"><?php $Enquiry = $mysql->Select("SELECT COUNT(EnquiryID) AS cnt FROM _tbl_tour_enquiry where Pincode='".$Pincode['Pincode']."'"); echo $Enquiry[0]['cnt'];?></td>
                                        <td style="text-align: right">                                                   
                                            <div class="dropdown dropdown-kanban" style="float: right;">
                                                <button class="" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border:none;font-size:14px;background:none !important;padding-right:0px;margin-right:0px;cursor:pointer">
                                                    <i class="icon-options-vertical"></i>
                                                </button>                                                                                                        
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton"> 
                                                    <a class="dropdown-item" draggable="false" href="dashboard.php?action=ListEnquiries&pc=<?php echo $Pincode['Pincode'];?>">View Enquiries</a> 
                                                </div>                                              
                                            </div>
                                        </td>
                                    </tr>
                                <?php } ?>
                                <?php if(sizeof($Pincodes)==0){ ?>
                                    <tr>
                                        <td colspan="3" style="text-align: center;">No records found</td>
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
