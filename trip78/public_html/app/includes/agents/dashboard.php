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
                            <div class="row">
                                <div class="col-5">
                                    <div class="icon-big text-center">
                                        <i class="flaticon-chart-pie text-warning"></i>
                                    </div>
                                </div>
                                <?php $enquirys = $mysql->select("select * from _tbl_tour_enquiry where Pincode IN (select Pincode from _tbl_agent_pincode where AgentID='".$_SESSION['User']['AgentID']."') order by EnquiryID DESC");?>
                                <div class="col-7 col-stats">
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
