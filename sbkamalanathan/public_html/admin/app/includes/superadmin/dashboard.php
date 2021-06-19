<style>
.calendar {
    display: flex;
    flex-flow: column;
}
.calendar .header .month-year {
    font-size: 20px;
    font-weight: bold;
    color: #636e73;
    padding: 10px 20px;
}
.calendar .days {
    display: flex;
    flex-flow: wrap;
}
.calendar .days .day_name {
    width: calc(100% / 7);
    border-right: 1px solid #2c7aca;
    padding: 20px;
    text-transform: uppercase;
    font-size: 12px;
    font-weight: bold;
    color: #818589;
    color: #fff;
    background-color: #448cd6;
}
.calendar .days .day_name:nth-child(7) {
    border: none;
}
.calendar .days .day_num {
    display: flex;
    flex-flow: column;
    width: calc(100% / 7);
    border-right: 1px solid #e6e9ea;
    border-bottom: 1px solid #e6e9ea;
    padding: 15px;
    font-weight: bold;
    color: #7c878d;
    cursor: pointer;
    min-height: 100px;
}
.calendar .days .day_num span {
    display: inline-flex;
    width: 30px;
    font-size: 14px;
}
.calendar .days .day_num .event {
    margin-top: 10px;
    font-weight: 500;
    font-size: 14px;
    padding: 3px 6px;
    border-radius: 4px;
    background-color: #f7c30d;
    color: #fff;
    word-wrap: break-word;
}
.calendar .days .day_num .event.green {
    background-color: #51ce57;
}
.calendar .days .day_num .event.blue {
    background-color: #518fce;
}
.calendar .days .day_num .event.red {
    background-color: #ce5151;
}
.calendar .days .day_num:nth-child(7n+1) {
    border-left: 1px solid #e6e9ea;
}
.calendar .days .day_num:hover {
    background-color: #fdfdfd;
}
.calendar .days .day_num.ignore {
    background-color: #fdfdfd;
    color: #ced2d4;
    cursor: inherit;
}
.calendar .days .day_num.selected {
    background-color: #f1f2f3;
    cursor: inherit;
}

   -moz-osx-font-smoothing: grayscale;
}
 
.navtop {
    background-color: #3b4656;
    height: 60px;
    width: 100%;
    border: 0;
}
.navtop div {
    display: flex;
    margin: 0 auto;
    width: 100%;
    height: 100%;
}
.navtop div h1, .navtop div a {
    display: inline-flex;
    align-items: center;
}
.navtop div h1 {
    flex: 1;
    font-size: 24px;
    padding: 0;
    margin: 0;
    color: #ebedee;
    font-weight: normal;
}
.navtop div a {
    padding: 0 20px;
    text-decoration: none;
    color: #c4c8cc;
    font-weight: bold;
}
.navtop div a i {
    padding: 2px 8px 0 0;
}
.navtop div a:hover {
    color: #ebedee;
}
.content {
    width: 100%;
    margin: 0 auto;
}
.content h2 {
    margin: 0;
    padding: 25px 0;
    font-size: 22px;
    border-bottom: 1px solid #ebebeb;
    color: #666666;
}
</style>
 <div class="container-fluid">
            <div class="page-title">
              <div class="row">
                <div class="col-6">
                  <h3>Welcome <span style="color:#7366ff"><?php echo $DisplayName;?></span>
                  </h3>
                </div>
                <div class="col-6" style="text-align: right;">
                  <?php
                      if (isset($lastlogin) && sizeof($lastlogin)>1) {
                          echo "<div style='font-size:14px;color:#666;font-weight:normal;padding-top:5px'>last visited: ".date("M d, Y H:i",strtotime($lastlogin[1]['LoginDateTime']))."<br>IP: ".$lastlogin[1]['IPAddress']." </div>";
                      }
                  ?>
                   
                </div>
              </div>
            </div>
          </div>
          <!-- Container-fluid starts-->
          <div class="container-fluid">
          
          
            <div class="row">
              <div class="col-sm-6 col-xl-3 col-lg-6">
                <div class="card o-hidden">
                  <div class="bg-primary b-r-4 card-body" style="cursor:pointer;padding:10px 20px;" onclick="location.href='dashboard.php?action=Cases/list';">
                    <div class="media static-top-widget">
                      <div class="media-body" style="padding-left:0px;">
                        <?php $cases = $mysql->select("select * from _tbl_cases_register where IsActive='1'"); ?>
                        <h4 class="mb-0 counter" style="font-size:45px"><?php echo sizeof($cases);?></h4><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-database icon-bg"><ellipse cx="12" cy="5" rx="9" ry="3"></ellipse><path d="M21 12c0 1.66-4 3-9 3s-9-1.34-9-3"></path><path d="M3 5v14c0 1.66 4 3 9 3s9-1.34 9-3V5"></path></svg>
                        <span class="m-0" style="font-weight:bold;">Cases</span>  
                      </div>
                    </div>
                    <div style="padding:10px 0px;">Running: <?php echo sizeof($cases);?>&nbsp;&nbsp;|&nbsp;&nbsp;Closed: 0</div>
                    <div style="text-align:center;border-top: 1px solid #ccc;padding-top: 7px;">View All</div>
                  </div>
                </div>
              </div>                                            
              <div class="col-sm-6 col-xl-3 col-lg-6">
                <div class="card o-hidden">
                  <div class="bg-secondary b-r-4 card-body" style="cursor:pointer;padding:10px 20px;" onclick="location.href='dashboard.php?action=Advocates/list';">
                    <div class="media static-top-widget">
                      <?php $advocates = $mysql->select("select * from _tbl_master_advocates where IsActive='1'"); ?>
                      <div class="media-body" style="padding-left:0px;">
                        <h4 class="mb-0 counter" style="font-size:45px"><?php echo sizeof($advocates);?></h4><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-bag icon-bg"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"></path><line x1="3" y1="6" x2="21" y2="6"></line><path d="M16 10a4 4 0 0 1-8 0"></path></svg>
                        <span class="m-0" style="font-weight:bold;">Advocates</span>
                      </div>
                    </div>
                    <div style="padding:10px 0px;">Active: <?php echo sizeof($advocates);?>&nbsp;&nbsp;|&nbsp;&nbsp;Left: 0</div>
                    <div style="text-align:center;border-top: 1px solid #ccc;padding-top: 7px;">View All</div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-xl-3 col-lg-6">
                <div class="card o-hidden">
                  <div class="bg-info b-r-4 card-body" style="cursor:pointer;padding:10px 20px;" onclick="location.href='dashboard.php?action=Clients/list';">
                    <div class="media static-top-widget">
                      <?php 
                        $clients = $mysql->select("select * from _tbl_master_clients where IsActive='1'"); 
                        $male_clients = $mysql->select("select * from _tbl_master_clients where Gender='Male' and IsActive='1'"); 
                        $female_clients = $mysql->select("select * from _tbl_master_clients where Gender='Female' and IsActive='1'"); 
                      ?>   
                      <div class="media-body" style="padding-left:0px;">
                        <h4 class="mb-0 counter" style="font-size:45px"><?php echo sizeof($clients);?></h4><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-circle icon-bg"><path d="M21 11.5a8.38 8.38 0 0 1-.9 3.8 8.5 8.5 0 0 1-7.6 4.7 8.38 8.38 0 0 1-3.8-.9L3 21l1.9-5.7a8.38 8.38 0 0 1-.9-3.8 8.5 8.5 0 0 1 4.7-7.6 8.38 8.38 0 0 1 3.8-.9h.5a8.48 8.48 0 0 1 8 8v.5z"></path></svg>
                        <span class="m-0" style="font-weight:bold;">Clients</span>
                      </div>
                    </div>
                    <div style="padding:10px 0px;">Male: <?php echo sizeof($male_clients);?>&nbsp;&nbsp;|&nbsp;&nbsp;Female: <?php echo sizeof($female_clients);?></div>
                    <div style="text-align:center;border-top: 1px solid #ccc;padding-top: 7px;">View All</div>
                  </div>
                </div>
              </div>
              <div class="col-sm-6 col-xl-3 col-lg-6">
                <div class="card o-hidden">
                  <div class="bg-primary b-r-4 card-body" style="cursor:pointer;padding:10px 20px;" onclick="location.href='dashboard.php?action=Staffs/list';">
                    <div class="media static-top-widget">
                     <?php 
                        $staffs = $mysql->select("select * from _tbl_master_staffs"); 
                        $staffs_active = $mysql->select("select * from _tbl_master_staffs where   IsActive='1'"); 
                        $staffs_deactivated = $mysql->select("select * from _tbl_master_staffs where   IsActive='0'"); 
                      ?>
                      <div class="media-body" style="padding-left:0px;">
                        <h4 class="mb-0 counter"  style="font-size:45px"><?php echo sizeof($staffs);?></h4><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-user-plus icon-bg"><path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="8.5" cy="7" r="4"></circle><line x1="20" y1="8" x2="20" y2="14"></line><line x1="23" y1="11" x2="17" y2="11"></line></svg>
                        <span class="m-0" style="font-weight:bold;">Staffs</span>
                      </div>
                    </div>
                    <div style="padding:10px 0px;">Active: <?php echo sizeof($staffs_active);?>&nbsp;&nbsp;|&nbsp;&nbsp;Deactivated: <?php echo sizeof($staffs_deactivated);?></div>
                    <div style="text-align:center;border-top: 1px solid #ccc;padding-top: 7px;">View All</div>
                  </div>
                </div>
              </div>
              
              
              
              
               
              <div class="col-xl-6 xl-100 box-col-12">
                <div class="card" style="padding:10px;">
                  <div class="row">
                    <div class="col-sm-3">
                      <div class="media">
                        <div class="media-body details ps-3" style="padding: 10px !important;border-radius: 10px;">
                            <span class="mb-1">Today Expenses</span>
                          <h5 class="mb-0 counter">
                          0.00
                          </h5>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <div class="media">
                        
                        <div class="media-body details ps-3" style="padding: 10px !important;border-radius: 10px;">
                        <span class="mb-1">Today Recevied </span>
                          <h5 class="mb-0 counter">0.00</h5>
                        </div>
                      </div>
                    </div>
                    <div class="col-sm-3">
                      <div class="media border-after-xs">
                        <div class="media-body details ps-3" style="padding: 10px !important;border-radius: 10px;">
                        <span class="mb-1">Disk Size</span>
                        <h5 class="mb-0 counter"><?php echo intval((folderSize(SERVER_PHYSICAL_PATH)/1024)/1024);?><span style="font-size:12px;color:#666"> MB</span></h5>
                        </div>
                      </div>
                    </div>
                     <div class="col-sm-3">
                      <div class="media border-after-xs">
                        <div class="media-body details ps-3" style="background: #a6ffac;padding: 10px !important;border-radius: 10px;">
                        <span class="mb-1">Today Hiring</span>
                        <h5 class="mb-0 counter">
                        <?php
                          $d=$mysql->select("SELECT * FROM _tbl_cases_hirings where date(NextHiringDate)=date('".date("Y-m-d")."')");
                          echo sizeof($d);
                          ?>
                        </h5>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
             
              
              <div class="col-xl-9 xl-100 chart_data_left box-col-12">
                <div class="card">
                  <div class="card-body p-0">
                    <div class="row m-0 chart-main">
                    <?php
                        $court_case_statistics = $mysql->select("SELECT _tbl_master_courts.courtName,_tbl_cases_register.CourtID, COUNT(*) AS Counts
                                                                  FROM  _tbl_cases_register
                                                                  JOIN _tbl_master_courts ON _tbl_cases_register.CourtID = _tbl_master_courts.CourtID
                                                                  GROUP BY _tbl_cases_register.CourtID");
                        foreach($court_case_statistics as $court_case_statistic) {
                    ?>
                      <div class="col-xl-3 col-md-6 col-sm-6 p-0 box-col-6" style="margin-bottom:0px;padding-bottom:0px;">
                        <div class="media align-items-center" style="padding:25px 20px !important;padding-right:0px;border-bottom:1px solid #ecf3fa">
                          <div class="media-body">
                            <div>
                              <h4><?php echo $court_case_statistic['Counts'];?></h4>
                              <span style="font-size:13px !important"><?php echo $court_case_statistic['courtName'];?></span>
                            </div>
                          </div>
                        </div>
                      </div>
                    <?php } ?>
                       
                       
                       
                    </div>
                  </div>
                </div>
              </div>
              
              
                  <div class="col-xl-6 xl-100 box-col-12">
                <div class="card" style="padding:10px">
                  <div class="row">
                  <?php
                      $priority = $mysql->select("select * from _tbl_master_priorities where IsActive='1'");
                      foreach($priority as $p) {
                  ?>
                  
                    <div class="col-sm-3">
                      <div class="media" >
                        <div class="media-body details" style="border-radius:10px;padding:15px 30px;background:<?php echo $p['PriorityColor'];?>">
                        <span class="mb-1"><?php echo $p['PriorityName'];?></span>
                          <h5 class="mb-0 counter">
                            <?php
                                echo sizeof($mysql->select("select * from _tbl_cases_register where PriorityID='".$p['PriorityID']."' and IsActive='1'"))
                            ?>
                          </h5>
                        </div>
                      </div>
                    </div>
                <?php } ?>      
                     
                     
                  </div>
                </div>
              </div>
             
              
              <div class="col-xl-6 xl-100 box-col-12">
                <div class="card">
                  <div class="card-body" style="padding:10px 0px">
                 <?php
              $date = "2021-06-18";
$calendar = new Calendar();

$casehiring = $mysql->select("SELECT date(NextHiringDate) as NextHiringDate, COUNT(*) as cnt FROM _tbl_cases_hirings where (month(NextHiringDate)='".date("m",strtotime($date))."' and  year(NextHiringDate)='".date("Y",strtotime($date))."') GROUP BY DATE(NextHiringDate)");

foreach($casehiring as $s) {
    $string = '<span style="cursor:pointer;width:100%" data="'.$s['NextHiringDate'].'" onclick="getCalandarHirings($(this));">Hirings: '.$s['cnt'].'</span>';
 $calendar->add_event($string, $s['NextHiringDate'], 1, 'green');   
}
//$calendar->add_event('Birthday', '2021-02-03', 1, 'green');
//$calendar->add_event('Doctors', '2021-02-04', 1, 'red');
//$calendar->add_event('Holiday', '2021-02-16', 7);
?>
  
                   <div class="content home">
            <?php echo $calendar?>
        </div>
        
                  </div>
                  </div>
                  
                </div>
         
               
          
               
               
               
               
               
               
             
               
               
            </div>
          
          
          
            <div class="row second-chart-list third-news-update">
             
               
              
               
               
              <div class="col-xl-4 xl-50 news box-col-6" style="display: none;">
                <div class="card">
                  <div class="card-header">
                    <div class="header-top">
                      <h5 class="m-0">News & Update</h5>
                      <div class="card-header-right-icon">
                        <select class="button btn btn-primary">
                          <option>Today</option>
                          <option>Tomorrow</option>
                          <option>Yesterday</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="card-body p-0">
                    <div class="news-update">
                      <h6>36% off For pixel lights Couslations Types.</h6><span>Lorem Ipsum is simply dummy...</span>
                    </div>
                    <div class="news-update">
                      <h6>We are produce new product this</h6><span> Lorem Ipsum is simply text of the printing... </span>
                    </div>
                    <div class="news-update">
                      <h6>50% off For COVID Couslations Types.</h6><span>Lorem Ipsum is simply dummy...</span>
                    </div>
                  </div>
                  <div class="card-footer">
                    <div class="bottom-btn"><a href="#">More...</a></div>
                  </div>
                </div>
              </div>
              <div class="col-xl-4 xl-50 appointment-sec box-col-6">
                <div class="row"> 
                  <div class="col-xl-12 appointment">
                    <div class="card">
                      <div class="card-header card-no-border">
                        <div class="header-top">
                          <h5 class="m-0">Recently added cases</h5>
                          <div class="card-header-right-icon">
                             
                          </div>
                        </div>
                      </div>
                      <div class="card-body pt-0">
                        <div class="appointment-table table-responsive">
                          <table class="table table-bordernone">
                            <tbody>
                            <?php
                                $cases = $mysql->select("select * from _tbl_cases_register where IsActive='1' order by CaseID desc limit 0,5");
                            ?>
                            <?php
                                foreach($cases as $case) {
                                    $pirority = $mysql->select("Select * from _tbl_master_priorities where PriorityID='".$case['PriorityID']."'");
                                    $client = $mysql->select("select * from _tbl_master_clients where ClientID='".$case['ClientID']."'");
                            ?>
                             <?php if (strlen(trim($client_data[0]['ProfilePhoto']))>0) { 
                                 $path = $client_data[0]['ProfilePhoto'];
                                
                             } else {
                                  $path = "assets/app/noimage.jpg";
                                                                   } ?>
                              <tr>
                                <td><img class="img-fluid img-40 rounded-circle mb-3" style="border:1px solid #ccc" src="<?php echo $path;?>" alt="Image description">
                                  <!--<div class="status-circle bg-primary"></div>-->
                                </td>
                                <td class="img-content-box">
                                    <span class="d-block" style="font-size:20px;"><?php echo $case['ClientName'];?></span>
                                    <span class="font-roboto">
                                        <?php echo $case['CourtName'];?><br>
                                       <span style="color:#999">Case/CNR: <?php echo $case['CaseNumber'];?> <?php echo $case['CNRNumber'];?></span><br>
                                       <span style="color:<?php echo $pirority[0]['PriorityColor'];?>">Priority: <?php echo $case['PriorityName'];?></span>
                                    </span>
                                </td>
                                
                                <td class="text-end">
                                  <!--<div class="button btn btn-primary">Done<i class="fa fa-check-circle ms-2"></i></div>-->
                                  <a href="dashboard.php?action=Cases/view&case=<?php echo md5($case['CreatedOn'].$case['CaseID']);?>">View</a>
                                </td>
                              </tr>
                             <?php } ?> 
                            </tbody>
                          </table>
                        </div>
                      </div>
                       <div class="card-footer" style="padding:15px">
                    <div class="bottom-btn"><a href="dashboard.php?action=Cases/list">More...</a></div>
                  </div>
                    </div>
                  </div>
                   
                </div>
              </div>
               
               
               
               
            </div>
          </div>


<div class="modal fade" id="calander_popup" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
        <div class="modal-content" id="content_getCalandarHirings">
            <div class="modal-header">
                <h5 class="modal-title">Confirmation</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Are you want to <b style="color:red">delete</b> client type</p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-outline-danger" type="button" data-bs-dismiss="modal">Close</button>
                <button class="btn btn-danger" type="button" onclick="$('#isDelete').val('1');formSubmit('CreateBtn');">Yes, Continue</button>
            </div>
        </div>
    </div>
</div> 
<script>
function getCalandarHirings(d) {
    var param = d.attr("data");
    $('#content_getCalandarHirings').html("loading..."); 
    $('#calander_popup').modal('show') ;
    $.ajax({url:'webservice.php?action=getCalandarHirings&param='+d.attr("data"),success:function(data){
       $('#content_getCalandarHirings').html(data); 
    }})
}
</script>          