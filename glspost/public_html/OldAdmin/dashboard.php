<?php include_once("header.php");?>    
<?php
    if (isset($_GET['action'])) {
        include_once("includes/".$_GET['action'].".php");
    } else {
?>
<div class="app-main__outer">
                <div class="app-main__inner">
                    <div class="app-page-title">
                        <div class="page-title-wrapper">
                            <div class="page-title-heading">
                                <div class="page-title-icon">
                                    <i class="pe-7s-car icon-gradient bg-mean-fruit">
                                    </i>
                                </div>
                                <div>Analytics Dashboard
                                    <div class="page-title-subheading"></div>
                                </div>
                            </div>
                                </div>
                    </div>           
                    <div class="tabs-animation">
                        <div class="mb-3 card">       
                            <div class="card-header-tab card-header">
                                <div class="card-header-title font-size-lg text-capitalize font-weight-normal">
                                    <i class="header-icon lnr-charts icon-gradient bg-happy-green"> </i>
                                    Short Summary
                                </div>
                            </div>
                            <div class="no-gutters row">
                                <div class="col-sm-6 col-md-4 col-xl-4">
                                    <div class="card no-shadow rm-border bg-transparent widget-chart text-left">
                                        <div class="icon-wrapper rounded-circle">
                                            <div class="icon-wrapper-bg opacity-10 bg-warning"></div>
                                            <i class="lnr-laptop-phone text-dark opacity-8"></i></div>
                                        <div class="widget-chart-content">
                                            <div class="widget-subheading">E-Pin (5H Series)</div>
                                            <div class="widget-numbers"><?php echo  sizeof($mysql->select("select * from  _tbl_epins where PinPackageID='2' ")); ?></div>
                                            <div class="widget-description opacity-8 text-focus">
                                                <div class="d-inline text-danger pr-1">
                                                    <span class="pl-1"><?php echo  sizeof($mysql->select("select * from  _tbl_epins where PinPackageID='2' and IsSold='1' ")); ?></span>
                                                </div>  
                                                Sold,
                                                <div class="d-inline text-danger pr-1">
                                                    <span class="pl-1"><?php echo  sizeof($mysql->select("select * from  _tbl_epins where PinPackageID='2' and IsUsed='1' ")); ?></span>
                                                </div>  
                                                Used
                                            </div>
                                        </div>
                                    </div>
                                    <div class="divider m-0 d-md-none d-sm-block"></div>
                                </div>
                                
                                <div class="col-sm-6 col-md-4 col-xl-4">
                                    <div class="card no-shadow rm-border bg-transparent widget-chart text-left">
                                        <div class="icon-wrapper rounded-circle">
                                            <div class="icon-wrapper-bg opacity-10 bg-warning"></div>
                                            <i class="lnr-laptop-phone text-dark opacity-8"></i></div>
                                        <div class="widget-chart-content">
                                            <div class="widget-subheading">E-Pin (1H Series)</div>
                                            <div class="widget-numbers"><?php echo  sizeof($mysql->select("select * from  _tbl_epins where PinPackageID='3'")); ?></div>
                                            <div class="widget-description opacity-8 text-focus">
                                                <div class="d-inline text-danger pr-1">
                                                    <span class="pl-1"><?php echo  sizeof($mysql->select("select * from  _tbl_epins where PinPackageID='3' and IsSold='1' ")); ?></span>
                                                </div>  
                                                Sold,
                                                <div class="d-inline text-danger pr-1">
                                                    <span class="pl-1"><?php echo  sizeof($mysql->select("select * from  _tbl_epins where PinPackageID='3' and IsUsed='1' ")); ?></span>
                                                </div>  
                                                Used
                                            </div>
                                        </div>
                                    </div>
                                    <div class="divider m-0 d-md-none d-sm-block"></div>
                                </div>
                                
                                <div class="col-sm-6 col-md-4 col-xl-4">
                                    <div class="card no-shadow rm-border bg-transparent widget-chart text-left">
                                        <div class="icon-wrapper rounded-circle">
                                            <div class="icon-wrapper-bg opacity-9 bg-danger"></div>
                                            <i class="lnr-graduation-hat text-white"></i></div>
                                        <div class="widget-chart-content">
                                            <div class="widget-subheading">Total Payout</div>
                                            <div class="widget-numbers"><span>0.00</span></div>
                                            <div class="widget-description opacity-8 text-focus">
                                                Payout Requests
                                                <span class="text-info pl-1">
                                                    <span class="pl-1">0</span>
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="divider m-0 d-md-none d-sm-block"></div>
                                </div>
                                <div class="col-sm-12 col-md-4 col-xl-4">
                                    <div class="card no-shadow rm-border bg-transparent widget-chart text-left">
                                        <div class="icon-wrapper rounded-circle">
                                            <div class="icon-wrapper-bg opacity-9 bg-success"></div>
                                            <i class="lnr-apartment text-white"></i></div>
                                        <div class="widget-chart-content">
                                            <div class="widget-subheading">Total Members</div>
                                            <div class="widget-numbers text-success"><span><?php echo  sizeof($mysql->select("select * from  _tbl_member")); ?></span></div>
                                      <br>
                                      <a href="ListOfMembers.php">view Member</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>  
                         
                         
                        <div class="row" style="display: none;">
                            <div class="col-md-6 col-xl-3">
                                <div class="card mb-3 widget-chart widget-chart2 text-left card-btm-border card-shadow-success border-success">
                                    <div class="widget-chat-wrapper-outer">
                                        <div class="widget-chart-content pt-3 pl-3 pb-1">
                                            <div class="widget-chart-flex">
                                                <div class="widget-numbers">
                                                    <div class="widget-chart-flex">
                                                        <div class="fsize-4">
                                                            <small class="opacity-5">$</small>
                                                            <span>874</span></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <h6 class="widget-subheading mb-0 opacity-5">sales last month</h6></div>
                                        <div class="no-gutters widget-chart-wrapper mt-3 mb-3 pl-2 he-auto row">
                                            <div class="col-md-9">
                                                <div id="dashboard-sparklines-1"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-3">
                                <div class="card mb-3 widget-chart widget-chart2 text-left card-btm-border card-shadow-primary border-primary">
                                    <div class="widget-chat-wrapper-outer">
                                        <div class="widget-chart-content pt-3 pl-3 pb-1">
                                            <div class="widget-chart-flex">
                                                <div class="widget-numbers">
                                                    <div class="widget-chart-flex">
                                                        <div class="fsize-4">
                                                            <small class="opacity-5">$</small>
                                                            <span>1283</span></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <h6 class="widget-subheading mb-0 opacity-5">sales Income</h6></div>
                                        <div class="no-gutters widget-chart-wrapper mt-3 mb-3 pl-2 he-auto row">
                                            <div class="col-md-9">
                                                <div id="dashboard-sparklines-2"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-3">
                                <div class="card mb-3 widget-chart widget-chart2 text-left card-btm-border card-shadow-warning border-warning">
                                    <div class="widget-chat-wrapper-outer">
                                        <div class="widget-chart-content pt-3 pl-3 pb-1">
                                            <div class="widget-chart-flex">
                                                <div class="widget-numbers">
                                                    <div class="widget-chart-flex">
                                                        <div class="fsize-4">
                                                            <small class="opacity-5">$</small>
                                                            <span>1286</span></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <h6 class="widget-subheading mb-0 opacity-5">last month sales</h6></div>
                                        <div class="no-gutters widget-chart-wrapper mt-3 mb-3 pl-2 he-auto row">
                                            <div class="col-md-9">
                                                <div id="dashboard-sparklines-3"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-xl-3">
                                <div class="card mb-3 widget-chart widget-chart2 text-left card-btm-border card-shadow-danger border-danger">
                                    <div class="widget-chat-wrapper-outer">
                                        <div class="widget-chart-content pt-3 pl-3 pb-1">
                                            <div class="widget-chart-flex">
                                                <div class="widget-numbers">
                                                    <div class="widget-chart-flex">
                                                        <div class="fsize-4">
                                                            <small class="opacity-5">$</small>
                                                            <span>564</span></div>
                                                    </div>
                                                </div>
                                            </div>
                                            <h6 class="widget-subheading mb-0 opacity-5">total revenue</h6></div>
                                        <div class="no-gutters widget-chart-wrapper mt-3 mb-3 pl-2 he-auto row">
                                            <div class="col-md-9">
                                                <div id="dashboard-sparklines-4"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-3">
                            <div class="card-header-tab card-header">
                                <div class="card-header-title font-size-lg text-capitalize font-weight-normal"><i class="header-icon lnr-laptop-phone mr-3 text-muted opacity-6"> </i>Recent Members</div>
                                <div class="btn-actions-pane-right actions-icon-btn">
                                    <div class="btn-group dropdown">
                                        <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn-icon btn-icon-only btn btn-link"><i class="pe-7s-menu btn-icon-wrapper"></i></button>
                                        <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu-right rm-pointers dropdown-menu-shadow dropdown-menu-hover-link dropdown-menu"><h6 tabindex="-1" class="dropdown-header">Header</h6>
                                            <button type="button" tabindex="0" class="dropdown-item"><i class="dropdown-icon lnr-inbox"> </i><span>Menus</span></button>
                                            <button type="button" tabindex="0" class="dropdown-item"><i class="dropdown-icon lnr-file-empty"> </i><span>Settings</span></button>
                                            <button type="button" tabindex="0" class="dropdown-item"><i class="dropdown-icon lnr-book"> </i><span>Actions</span></button>
                                            <div tabindex="-1" class="dropdown-divider"></div>
                                            <div class="p-3 text-right">
                                                <button class="mr-2 btn-shadow btn-sm btn btn-link">View Details</button>
                                                <button class="mr-2 btn-shadow btn-sm btn btn-primary">Action</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                
                                      <table style="width: 100%;" class="table table-hover table-striped table-bordered">
                                                    <thead>
                                                    <tr>
                                                        <th>Member Code</th>
                                                        <th>Member Name</th>
                                                        <th>Created On</th>
                                                        <th>Mobile Number</th>
                                                        <th></th>                            
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <?php $Members = $mysql->select("select * from _tbl_member order by MemberID Desc limit 0,10");?>
                                                    <?php foreach($Members as $Member){?>
                                                    <tr>
                                                        <td><?php echo $Member['MemberCode'];?></td>
                                                        <td><?php echo $Member['MemberName'];?></td>
                                                        <td><?php echo $Member['CreatedOn'];?></td>
                                                        <td><?php echo $Member['MemberMobileNumber'];?></td>
                                                        <td><a href="EditMember.php?code=<?php echo $Member['MemberCode'];?>">Edit</a>&nbsp;&nbsp;<a href="ViewMember.php?code=<?php echo $Member['MemberCode'];?>">View</a></td>
                                                    </tr>
                                                    <?php }?>
                                                    </tbody>
                                                </table>
                               
                            </div>
                        </div>
                        <div class="row" style="display: none;">
                            <div class="col-sm-12 col-lg-6">
                                <div class="card-hover-shadow-2x mb-3 card">
                                    <div class="card-header-tab card-header">
                                        <div class="card-header-title font-size-lg text-capitalize font-weight-normal"><i class="header-icon lnr-database icon-gradient bg-malibu-beach"> </i>Tasks List</div>
                                        <div class="btn-actions-pane-right text-capitalize actions-icon-btn">
                                            <div class="btn-group dropdown">
                                                <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn-icon btn-icon-only btn btn-link"><i class="pe-7s-menu btn-icon-wrapper"></i></button>
                                                <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu-right rm-pointers dropdown-menu-shadow dropdown-menu-hover-link dropdown-menu"><h6 tabindex="-1" class="dropdown-header">Header</h6>
                                                    <button type="button" tabindex="0" class="dropdown-item"><i class="dropdown-icon lnr-inbox"> </i><span>Menus</span></button>
                                                    <button type="button" tabindex="0" class="dropdown-item"><i class="dropdown-icon lnr-file-empty"> </i><span>Settings</span></button>
                                                    <button type="button" tabindex="0" class="dropdown-item"><i class="dropdown-icon lnr-book"> </i><span>Actions</span></button>
                                                    <div tabindex="-1" class="dropdown-divider"></div>
                                                    <div class="p-3 text-right">
                                                        <button class="mr-2 btn-shadow btn-sm btn btn-link">View Details</button>
                                                        <button class="mr-2 btn-shadow btn-sm btn btn-primary">Action</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="scroll-area-lg">
                                        <div class="scrollbar-container">
                                            <div class="p-2">
                                                <ul class="todo-list-wrapper list-group list-group-flush">
                                                    <li class="list-group-item">
                                                        <div class="todo-indicator bg-warning"></div>
                                                        <div class="widget-content p-0">
                                                            <div class="widget-content-wrapper">
                                                                <div class="widget-content-left mr-2">
                                                                    <div class="custom-checkbox custom-control"><input type="checkbox" id="exampleCustomCheckbox12" class="custom-control-input"><label class="custom-control-label"
                                                                                                                                                                                                        for="exampleCustomCheckbox12">&nbsp;</label>
                                                                    </div>
                                                                </div>
                                                                <div class="widget-content-left">
                                                                    <div class="widget-heading">Wash the car
                                                                        <div class="badge badge-danger ml-2">Rejected</div>
                                                                    </div>
                                                                    <div class="widget-subheading"><i>Written by Bob</i></div>
                                                                </div>
                                                                <div class="widget-content-right widget-content-actions">
                                                                    <button class="border-0 btn-transition btn btn-outline-success">
                                                                        <i class="fa fa-check"></i>
                                                                    </button>
                                                                    <button class="border-0 btn-transition btn btn-outline-danger">
                                                                        <i class="fa fa-trash-alt"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <div class="todo-indicator bg-focus"></div>
                                                        <div class="widget-content p-0">
                                                            <div class="widget-content-wrapper">
                                                                <div class="widget-content-left mr-2">
                                                                    <div class="custom-checkbox custom-control"><input type="checkbox" id="exampleCustomCheckbox1" class="custom-control-input"><label class="custom-control-label"
                                                                                                                                                                                                       for="exampleCustomCheckbox1">&nbsp;</label>
                                                                    </div>
                                                                </div>
                                                                <div class="widget-content-left">
                                                                    <div class="widget-heading">Task with dropdown menu</div>
                                                                    <div class="widget-subheading">
                                                                        <div>By Johnny
                                                                            <div class="badge badge-pill badge-info ml-2">NEW</div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="widget-content-right widget-content-actions">
                                                                    <div class="d-inline-block dropdown">
                                                                        <button type="button" data-toggle="dropdown" aria-haspopup="true" data-toggle="dropdown" aria-expanded="false" class="border-0 btn-transition btn btn-link">
                                                                            <i class="fa fa-ellipsis-h"></i>
                                                                        </button>
                                                                        <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right"><h6 tabindex="-1" class="dropdown-header">Header</h6>
                                                                            <button type="button" disabled="" tabindex="-1" class="disabled dropdown-item">Action</button>
                                                                            <button type="button" tabindex="0" class="dropdown-item">Another Action</button>
                                                                            <div tabindex="-1" class="dropdown-divider"></div>
                                                                            <button type="button" tabindex="0" class="dropdown-item">Another Action</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <div class="todo-indicator bg-primary"></div>
                                                        <div class="widget-content p-0">
                                                            <div class="widget-content-wrapper">
                                                                <div class="widget-content-left mr-2">
                                                                    <div class="custom-checkbox custom-control"><input type="checkbox" id="exampleCustomCheckbox4" class="custom-control-input"><label class="custom-control-label"
                                                                                                                                                                                                       for="exampleCustomCheckbox4">&nbsp;</label>
                                                                    </div>
                                                                </div>
                                                                <div class="widget-content-left flex2">
                                                                    <div class="widget-heading">Badge on the right task</div>
                                                                    <div class="widget-subheading">This task has show on hover actions!</div>
                                                                </div>
                                                                <div class="widget-content-right widget-content-actions">
                                                                    <button class="border-0 btn-transition btn btn-outline-success">
                                                                        <i class="fa fa-check"></i>
                                                                    </button>
                                                                </div>
                                                                <div class="widget-content-right ml-3">
                                                                    <div class="badge badge-pill badge-success">Latest Task</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <div class="todo-indicator bg-info"></div>
                                                        <div class="widget-content p-0">
                                                            <div class="widget-content-wrapper">
                                                                <div class="widget-content-left mr-2">
                                                                    <div class="custom-checkbox custom-control"><input type="checkbox" id="exampleCustomCheckbox2" class="custom-control-input"><label class="custom-control-label"
                                                                                                                                                                                                       for="exampleCustomCheckbox2">&nbsp;</label>
                                                                    </div>
                                                                </div>
                                                                <div class="widget-content-left mr-3">
                                                                    <div class="widget-content-left">
                                                                        <img width="42" class="rounded" src="assets/images/avatars/1.jpg" alt="">
                                                                    </div>
                                                                </div>
                                                                <div class="widget-content-left">
                                                                    <div class="widget-heading">Go grocery shopping</div>
                                                                    <div class="widget-subheading">A short description for this todo item</div>
                                                                </div>
                                                                <div class="widget-content-right widget-content-actions">
                                                                    <button class="border-0 btn-transition btn btn-outline-success">
                                                                        <i class="fa fa-check"></i>
                                                                    </button>
                                                                    <button class="border-0 btn-transition btn btn-outline-danger">
                                                                        <i class="fa fa-trash-alt"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <div class="todo-indicator bg-success"></div>
                                                        <div class="widget-content p-0">
                                                            <div class="widget-content-wrapper">
                                                                <div class="widget-content-left mr-2">
                                                                    <div class="custom-checkbox custom-control"><input type="checkbox" id="exampleCustomCheckbox3" class="custom-control-input"><label class="custom-control-label"
                                                                                                                                                                                                       for="exampleCustomCheckbox3">&nbsp;</label>
                                                                    </div>
                                                                </div>
                                                                <div class="widget-content-left flex2">
                                                                    <div class="widget-heading">Development Task</div>
                                                                    <div class="widget-subheading">Finish React ToDo List App</div>
                                                                </div>
                                                                <div class="widget-content-right">
                                                                    <div class="badge badge-warning mr-2">69</div>
                                                                </div>
                                                                <div class="widget-content-right">
                                                                    <button class="border-0 btn-transition btn btn-outline-success">
                                                                        <i class="fa fa-check"></i>
                                                                    </button>
                                                                    <button class="border-0 btn-transition btn btn-outline-danger">
                                                                        <i class="fa fa-trash-alt"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <div class="todo-indicator bg-warning"></div>
                                                        <div class="widget-content p-0">
                                                            <div class="widget-content-wrapper">
                                                                <div class="widget-content-left mr-2">
                                                                    <div class="custom-checkbox custom-control"><input type="checkbox" id="exampleCustomCheckbox12" class="custom-control-input"><label class="custom-control-label"
                                                                                                                                                                                                        for="exampleCustomCheckbox12">&nbsp;</label>
                                                                    </div>
                                                                </div>
                                                                <div class="widget-content-left">
                                                                    <div class="widget-heading">Wash the car
                                                                        <div class="badge badge-danger ml-2">Rejected</div>
                                                                    </div>
                                                                    <div class="widget-subheading"><i>Written by Bob</i></div>
                                                                </div>
                                                                <div class="widget-content-right widget-content-actions">
                                                                    <button class="border-0 btn-transition btn btn-outline-success">
                                                                        <i class="fa fa-check"></i>
                                                                    </button>
                                                                    <button class="border-0 btn-transition btn btn-outline-danger">
                                                                        <i class="fa fa-trash-alt"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <div class="todo-indicator bg-focus"></div>
                                                        <div class="widget-content p-0">
                                                            <div class="widget-content-wrapper">
                                                                <div class="widget-content-left mr-2">
                                                                    <div class="custom-checkbox custom-control"><input type="checkbox" id="exampleCustomCheckbox1" class="custom-control-input"><label class="custom-control-label"
                                                                                                                                                                                                       for="exampleCustomCheckbox1">&nbsp;</label>
                                                                    </div>
                                                                </div>
                                                                <div class="widget-content-left">
                                                                    <div class="widget-heading">Task with dropdown menu</div>
                                                                    <div class="widget-subheading">
                                                                        <div>By Johnny
                                                                            <div class="badge badge-pill badge-info ml-2">NEW</div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="widget-content-right widget-content-actions">
                                                                    <div class="d-inline-block dropdown">
                                                                        <button type="button" data-toggle="dropdown" aria-haspopup="true" data-toggle="dropdown" aria-expanded="false" class="border-0 btn-transition btn btn-link">
                                                                            <i class="fa fa-ellipsis-h"></i>
                                                                        </button>
                                                                        <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right"><h6 tabindex="-1" class="dropdown-header">Header</h6>
                                                                            <button type="button" disabled="" tabindex="-1" class="disabled dropdown-item">Action</button>
                                                                            <button type="button" tabindex="0" class="dropdown-item">Another Action</button>
                                                                            <div tabindex="-1" class="dropdown-divider"></div>
                                                                            <button type="button" tabindex="0" class="dropdown-item">Another Action</button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <div class="todo-indicator bg-primary"></div>
                                                        <div class="widget-content p-0">
                                                            <div class="widget-content-wrapper">
                                                                <div class="widget-content-left mr-2">
                                                                    <div class="custom-checkbox custom-control"><input type="checkbox" id="exampleCustomCheckbox4" class="custom-control-input"><label class="custom-control-label"
                                                                                                                                                                                                       for="exampleCustomCheckbox4">&nbsp;</label>
                                                                    </div>
                                                                </div>
                                                                <div class="widget-content-left flex2">
                                                                    <div class="widget-heading">Badge on the right task</div>
                                                                    <div class="widget-subheading">This task has show on hover actions!</div>
                                                                </div>
                                                                <div class="widget-content-right widget-content-actions">
                                                                    <button class="border-0 btn-transition btn btn-outline-success">
                                                                        <i class="fa fa-check"></i>
                                                                    </button>
                                                                </div>
                                                                <div class="widget-content-right ml-3">
                                                                    <div class="badge badge-pill badge-success">Latest Task</div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <div class="todo-indicator bg-info"></div>
                                                        <div class="widget-content p-0">
                                                            <div class="widget-content-wrapper">
                                                                <div class="widget-content-left mr-2">
                                                                    <div class="custom-checkbox custom-control"><input type="checkbox" id="exampleCustomCheckbox2" class="custom-control-input"><label class="custom-control-label"
                                                                                                                                                                                                       for="exampleCustomCheckbox2">&nbsp;</label>
                                                                    </div>
                                                                </div>
                                                                <div class="widget-content-left mr-3">
                                                                    <div class="widget-content-left">
                                                                        <img width="42" class="rounded" src="assets/images/avatars/1.jpg" alt="">
                                                                    </div>
                                                                </div>
                                                                <div class="widget-content-left">
                                                                    <div class="widget-heading">Go grocery shopping</div>
                                                                    <div class="widget-subheading">A short description for this todo item</div>
                                                                </div>
                                                                <div class="widget-content-right widget-content-actions">
                                                                    <button class="border-0 btn-transition btn btn-outline-success">
                                                                        <i class="fa fa-check"></i>
                                                                    </button>
                                                                    <button class="border-0 btn-transition btn btn-outline-danger">
                                                                        <i class="fa fa-trash-alt"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <div class="todo-indicator bg-success"></div>
                                                        <div class="widget-content p-0">
                                                            <div class="widget-content-wrapper">
                                                                <div class="widget-content-left mr-2">
                                                                    <div class="custom-checkbox custom-control"><input type="checkbox" id="exampleCustomCheckbox3" class="custom-control-input"><label class="custom-control-label"
                                                                                                                                                                                                       for="exampleCustomCheckbox3">&nbsp;</label>
                                                                    </div>
                                                                </div>
                                                                <div class="widget-content-left flex2">
                                                                    <div class="widget-heading">Development Task</div>
                                                                    <div class="widget-subheading">Finish React ToDo List App</div>
                                                                </div>
                                                                <div class="widget-content-right">
                                                                    <div class="badge badge-warning mr-2">69</div>
                                                                </div>
                                                                <div class="widget-content-right">
                                                                    <button class="border-0 btn-transition btn btn-outline-success">
                                                                        <i class="fa fa-check"></i>
                                                                    </button>
                                                                    <button class="border-0 btn-transition btn btn-outline-danger">
                                                                        <i class="fa fa-trash-alt"></i>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-block text-right card-footer">
                                        <button class="mr-2 btn btn-link btn-sm">Cancel</button>
                                        <button class="btn btn-primary">Add Task</button>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 col-lg-6">
                                <div class="card-hover-shadow-2x mb-3 card">
                                    <div class="card-header-tab card-header">
                                        <div class="card-header-title font-size-lg text-capitalize font-weight-normal"><i class="header-icon lnr-printer icon-gradient bg-ripe-malin"> </i>Chat Box</div>
                                        <div class="btn-actions-pane-right text-capitalize actions-icon-btn">
                                            <div class="btn-group dropdown">
                                                <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn-icon btn-icon-only btn btn-link"><i class="pe-7s-menu btn-icon-wrapper"></i></button>
                                                <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu-right rm-pointers dropdown-menu-shadow dropdown-menu-hover-link dropdown-menu"><h6 tabindex="-1" class="dropdown-header">Header</h6>
                                                    <button type="button" tabindex="0" class="dropdown-item"><i class="dropdown-icon lnr-inbox"> </i><span>Menus</span></button>
                                                    <button type="button" tabindex="0" class="dropdown-item"><i class="dropdown-icon lnr-file-empty"> </i><span>Settings</span></button>
                                                    <button type="button" tabindex="0" class="dropdown-item"><i class="dropdown-icon lnr-book"> </i><span>Actions</span></button>
                                                    <div tabindex="-1" class="dropdown-divider"></div>
                                                    <div class="p-3 text-right">
                                                        <button class="mr-2 btn-shadow btn-sm btn btn-link">View Details</button>
                                                        <button class="mr-2 btn-shadow btn-sm btn btn-primary">Action</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="scroll-area-lg">
                                        <div class="scrollbar-container">
                                            <div class="p-2">
                                                <div class="chat-wrapper p-1">
                                                    <div class="chat-box-wrapper">
                                                        <div>
                                                            <div class="avatar-icon-wrapper mr-1">
                                                                <div class="badge badge-bottom btn-shine badge-success badge-dot badge-dot-lg"></div>
                                                                <div class="avatar-icon avatar-icon-lg rounded">
                                                                    <img src="assets/images/avatars/2.jpg" alt="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <div class="chat-box">But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system.</div>
                                                            <small class="opacity-6">
                                                                <i class="fa fa-calendar-alt mr-1"></i>
                                                                11:01 AM | Yesterday
                                                            </small>
                                                        </div>
                                                    </div>
                                                    <div class="float-right">
                                                        <div class="chat-box-wrapper chat-box-wrapper-right">
                                                            <div>
                                                                <div class="chat-box">Expound the actual teachings of the great explorer of the truth, the master-builder of human happiness.</div>
                                                                <small class="opacity-6">
                                                                    <i class="fa fa-calendar-alt mr-1"></i>
                                                                    11:01 AM | Yesterday
                                                                </small>
                                                            </div>
                                                            <div>
                                                                <div class="avatar-icon-wrapper ml-1">
                                                                    <div class="badge badge-bottom btn-shine badge-success badge-dot badge-dot-lg"></div>
                                                                    <div class="avatar-icon avatar-icon-lg rounded">
                                                                        <img src="assets/images/avatars/3.jpg" alt="">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="chat-box-wrapper">
                                                        <div>
                                                            <div class="avatar-icon-wrapper mr-1">
                                                                <div class="badge badge-bottom btn-shine badge-success badge-dot badge-dot-lg"></div>
                                                                <div class="avatar-icon avatar-icon-lg rounded">
                                                                    <img src="assets/images/avatars/2.jpg" alt="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div>
                                                            <div class="chat-box">But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system.</div>
                                                            <small class="opacity-6">
                                                                <i class="fa fa-calendar-alt mr-1"></i>
                                                                11:01 AM | Yesterday
                                                            </small>
                                                        </div>
                                                    </div>
                                                    <div class="float-right">
                                                        <div class="chat-box-wrapper chat-box-wrapper-right">
                                                            <div>
                                                                <div class="chat-box">Denouncing pleasure and praising pain was born and I will give you a complete account.</div>
                                                                <small class="opacity-6">
                                                                    <i class="fa fa-calendar-alt mr-1"></i>
                                                                    11:01 AM | Yesterday
                                                                </small>
                                                            </div>
                                                            <div>
                                                                <div class="avatar-icon-wrapper ml-1">
                                                                    <div class="badge badge-bottom btn-shine badge-success badge-dot badge-dot-lg"></div>
                                                                    <div class="avatar-icon avatar-icon-lg rounded">
                                                                        <img src="assets/images/avatars/2.jpg" alt="">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="float-right">
                                                        <div class="chat-box-wrapper chat-box-wrapper-right">
                                                            <div>
                                                                <div class="chat-box">The master-builder of human happiness.</div>
                                                                <small class="opacity-6">
                                                                    <i class="fa fa-calendar-alt mr-1"></i>
                                                                    11:01 AM | Yesterday
                                                                </small>
                                                            </div>
                                                            <div>
                                                                <div class="avatar-icon-wrapper ml-1">
                                                                    <div class="badge badge-bottom btn-shine badge-success badge-dot badge-dot-lg"></div>
                                                                    <div class="avatar-icon avatar-icon-lg rounded">
                                                                        <img src="assets/images/avatars/2.jpg" alt="">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <input placeholder="Write here and hit enter to send..." type="text" class="form-control-sm form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card no-shadow bg-transparent no-border rm-borders mb-3" style="display: none;">
                            <div class="card">
                                <div class="no-gutters row">
                                    <div class="col-md-12 col-lg-4">
                                        <ul class="list-group list-group-flush">
                                            <li class="bg-transparent list-group-item">
                                                <div class="widget-content p-0">
                                                    <div class="widget-content-outer">
                                                        <div class="widget-content-wrapper">
                                                            <div class="widget-content-left">
                                                                <div class="widget-heading">Total Orders</div>
                                                                <div class="widget-subheading">Last year expenses</div>
                                                            </div>
                                                            <div class="widget-content-right">
                                                                <div class="widget-numbers text-success">1896</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="bg-transparent list-group-item">
                                                <div class="widget-content p-0">
                                                    <div class="widget-content-outer">
                                                        <div class="widget-content-wrapper">
                                                            <div class="widget-content-left">
                                                                <div class="widget-heading">Clients</div>
                                                                <div class="widget-subheading">Total Clients Profit</div>
                                                            </div>
                                                            <div class="widget-content-right">
                                                                <div class="widget-numbers text-primary">$12.6k</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-md-12 col-lg-4">
                                        <ul class="list-group list-group-flush">
                                            <li class="bg-transparent list-group-item">
                                                <div class="widget-content p-0">
                                                    <div class="widget-content-outer">
                                                        <div class="widget-content-wrapper">
                                                            <div class="widget-content-left">
                                                                <div class="widget-heading">Followers</div>
                                                                <div class="widget-subheading">People Interested</div>
                                                            </div>
                                                            <div class="widget-content-right">
                                                                <div class="widget-numbers text-danger">45,9%</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="bg-transparent list-group-item">
                                                <div class="widget-content p-0">
                                                    <div class="widget-content-outer">
                                                        <div class="widget-content-wrapper">
                                                            <div class="widget-content-left">
                                                                <div class="widget-heading">Products Sold</div>
                                                                <div class="widget-subheading">Total revenue streams</div>
                                                            </div>
                                                            <div class="widget-content-right">
                                                                <div class="widget-numbers text-warning">$3M</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="col-md-12 col-lg-4">
                                        <ul class="list-group list-group-flush">
                                            <li class="bg-transparent list-group-item">
                                                <div class="widget-content p-0">
                                                    <div class="widget-content-outer">
                                                        <div class="widget-content-wrapper">
                                                            <div class="widget-content-left">
                                                                <div class="widget-heading">Total Orders</div>
                                                                <div class="widget-subheading">Last year expenses</div>
                                                            </div>
                                                            <div class="widget-content-right">
                                                                <div class="widget-numbers text-success">1896</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="bg-transparent list-group-item">
                                                <div class="widget-content p-0">
                                                    <div class="widget-content-outer">
                                                        <div class="widget-content-wrapper">
                                                            <div class="widget-content-left">
                                                                <div class="widget-heading">Clients</div>
                                                                <div class="widget-subheading">Total Clients Profit</div>
                                                            </div>
                                                            <div class="widget-content-right">
                                                                <div class="widget-numbers text-primary">$12.6k</div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>  
</div>
<?php } ?>
                
 <?php include_once("footer.php");?>