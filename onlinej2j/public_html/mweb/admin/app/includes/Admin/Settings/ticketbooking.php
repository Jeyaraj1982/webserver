<div style="padding:25px">
    <div class="page-header">
        <ul class="breadcrumbs" style="border: none;padding-left: 0px;margin-left: 0px;">
            <li class="nav-home"><a href="dashboard.php"><i class="flaticon-home"></i></a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Setttings/EnrollmentPackage">Settings</a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Setttings/EnrollmentPackage">Ticket Booking Services</a></li>
        </ul>
    </div>
    <div class="row">
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-4 col-xlg-3 col-md-5">
            <div class="card">
                <div class="card-body">
                    <div class="row  mb15">
                        <div class="col-md-12 col-xs-12 b-r">
                            <a href="dashboard.php?action=Settings/prepaidmobileoperators">Prepaid Mobile Operators</a>
                        </div>
                    </div>
                    <div class="row mb15">
                        <div class="col-md-12 col-xs-12 b-r">
                            <a href="dashboard.php?action=Settings/dthoperators">DTH Opoerators</a>
                        </div>
                    </div>
                    <div class="row mb15">
                        <div class="col-md-12 col-xs-12 b-r">
                            <a href="dashboard.php?action=Settings/landlinebillpayment">Landline Operators</a>
                        </div>
                    </div>
                    <div class="row mb15">
                        <div class="col-md-12 col-xs-12 b-r">
                            <a href="dashboard.php?action=Settings/postpaidoperators">Postpaid Operators</a>
                        </div>
                    </div>
                    <div class="row mb15">
                        <div class="col-md-12 col-xs-12 b-r">
                            <a href="dashboard.php?action=Settings/eboperators">Electricity Operators</a>
                        </div>
                    </div>
                    <div class="row mb15">
                        <div class="col-md-12 col-xs-12 b-r">
                            <a href="dashboard.php?action=Settings/eboperators">Electricity Operators</a>
                        </div>
                    </div>
                    <div class="row mb15">
                        <div class="col-md-12 col-xs-12 b-r">
                            <a href="dashboard.php?action=Settings/insuranceproviders">Insurance Operators</a>
                        </div>
                    </div> 
                    <div class="row mb15">
                        <div class="col-md-12 col-xs-12 b-r">
                            <a href="dashboard.php?action=Settings/moneytransferservice">Money Transfer Services</a>
                        </div>
                    </div> 
                    <div class="row mb15">
                        <div class="col-md-12 col-xs-12 b-r">
                            <a href="dashboard.php?action=Settings/ticketbooking">Ticket Booking</a>
                        </div>
                    </div>                   
                </div>
            </div>
        </div>
        <div class="col-lg-8 col-xlg-9 col-md-7">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title text-orange"><i class="ti-user"></i>&nbsp;&nbsp; Ticket Booking Services</h4>
                    <div class="row">
                        <?php $Members =$mysql->select("select * from `_tbl_operators` where OperatorType='8'"); ?>
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-lg-12 col-xlg-12 col-md-12">
                                    <div class="card2">
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table v-middle" style="border: 1px solid; border-color: #e1e1e1;">
                                                    <thead>
                                                        <tr>
                                                            <th></th>
                                                            <th class="border-top-0"><b>Operator</b></th>
                                                           <!-- <th class="border-top-0"><b>LapuCode</b></th>-->
                                                            <th class="border-top-0"><b>Cashback</b></th>
                                                            <th class="border-top-0"><b>Charge</b></th>
                                                            <th class="border-top-0"><b>&nbsp;</b></th>
                                                            
                                                        </tr>
                                                    </thead>
                                                    <tbody>     
                                                    <?php foreach ($Members as $Member){ ?>
                                                        <tr>
                                                            <td>
                                                            <div class="avatar avatar-online">
                                                    <img style="border:1px solid #ccc;" src="../../assets/img/<?php echo $Member['IconFile'];?>" alt="..." class="avatar-img rounded-circle">
                                                </div>
                                                            </td>
                                                            <td><?php echo $Member['OperatorName'];?></td>
                                                            <!--<td style="text-align: center"><?php echo $Member['OperatorLAPUCode'];?></td>-->
                                                            <td style="text-align: center"><?php echo $Member['IsCashback'];?></td>
                                                            <td style="text-align: center"><?php echo $Member['IsChargeable'];?></td>
                                                             <td style="text-align: right;">
                                                            <a href="dashboard.php?action=Settings/editoperator&operator=<?php echo $Member['OperatorRefID'];?>">Edit</a>
                                                            </td>
                                                        </tr>
                                                    <?php }?>    
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
            </div>
        </div>
    </div>            
</div>
<?php include_once("footer.php"); ?>