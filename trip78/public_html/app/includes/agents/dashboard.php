<br><br><br><div class="main-panel full-height">
    <div class="container">
        <div class="panel-header">
            <div class="page-inner border-bottom pb-0 mb-3">
                <div class="d-flex align-items-left flex-column">
                    <h2 class="pb-2 fw-bold">Dashboard</h2>
                    <div class="nav-scroller d-flex">
                        <div class="nav nav-line nav-color-info d-flex align-items-center justify-contents-center">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="page-inner">
            <div class="row">
                <div class="col-sm-6 col-md-3">
                    <div class="card card-stats card-round">
                        <div class="card-body ">
                        
                         <?php
                    $enq = $mysql->select("select * from _tbl_tour_enquiry where  date(CreatedOn)=date('".date("Y-m-d")."') and Pincode IN (select Pincode from _tbl_agent_pincode where AgentID='".$_SESSION['User']['AgentID']."') order by EnquiryID DESC");
                    if (sizeof($enq)>0) {
                ?>
                 <div class="row">
                        <div class="col-md-12">
                        
                  <div class="alert alert-primary" role="alert">
  Today you have recevied <?php echo (sizeof($enq));?> enquires. click to  <a href="dashboard.php?action=ListEnquiries&date=<?php echo date("Y-m-d");?>" class="alert-link" style="font-weight:normal;color:blue">view </a>. 
</div>   

                        </div>
                    </div> 
<?php } ?>
                 
                 
                            <div class="row">
                                <div class="col-5">
                                    <div class="icon-big text-center">
                                        <i class="flaticon-chart-pie text-warning"></i>
                                    </div>
                                </div>
                                <?php $enquirys = $mysql->select("select * from _tbl_tour_enquiry where Pincode IN (select Pincode from _tbl_agent_pincode where AgentID='".$_SESSION['User']['AgentID']."') order by EnquiryID DESC");?>
                                <div class="col-7 col-stats" onclick="location.href='dashboard.php?action=ListEnquiries';">
                                    <div class="numbers">                            
                                        <p class="card-category">Enquiries</p>
                                        <h4 class="card-title"><?php echo sizeof($enquirys);?></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
