<?php $data= $mysql->select("select * from _tbl_business_supporting_center where SupportingCenterAdminID='".$_GET['id']."'");?>
  <style>
* {
  box-sizing: border-box;
}

.fa {
  font-size: 25px;
}

.checked {
  color: orange;
}

/* Three column layout */
.side {
  float: left;
  width: 15%;
  margin-top:10px;
}

.middle {
  margin-top:10px;
  float: left;
  width: 70%;
}

/* Place text to the right */
.right {
  text-align: right;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* The bar container */
.bar-container {
  width: 100%;
  background-color: #f1f1f1;
  text-align: center;
  color: white;
}

/* Individual bars */
.bar-5 {width: 60%; height: 18px; background-color: #4CAF50;}
.bar-4 {width: 30%; height: 18px; background-color: #2196F3;}
.bar-3 {width: 10%; height: 18px; background-color: #00bcd4;}
.bar-2 {width: 4%; height: 18px; background-color: #ff9800;}
.bar-1 {width: 15%; height: 18px; background-color: #f44336;}

/* Responsive layout - make the columns stack on top of each other instead of next to each other */
@media (max-width: 400px) {
  .side, .middle {
    width: 100%;
  }
  .right {
    display: none;
  }
}
</style>

  <div style="padding:25px">
    <div class="page-header">
        <ul class="breadcrumbs" style="border: none;padding-left: 0px;margin-left: 0px;">
            <li class="nav-home"><a href="dashboard.php"><i class="flaticon-home"></i></a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=SupportingCenter/ViewRatings">Ratings</a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=SupportingCenter/ViewRatings">View Ratings</a></li>
        </ul>
    </div> 
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Supporting Center Information</div>
                </div>
                <div class="card-body">
                    <div class="row" style="margin-right: 0px;margin-left: 0px;">
                        <div class="col-md-6">
                            <div class="form-group form-show-validation row" style="padding:0px">
                                <label for="name" class="col-sm-4 text-left">Store Name</label>
                                <div class="col-sm-8"><?php echo $data[0]['SupportingCenterName'];?></div>
                            </div>
                            <div class="form-group form-show-validation row" style="padding:0px">
                                <label for="name" class="col-sm-4 text-left">State Name</label>
                                <div class="col-sm-8"><?php echo $data[0]['State'];?></div>
                            </div>
                            <div class="form-group form-show-validation row" style="padding:0px">
                                <label for="name" class="col-sm-4 text-left">District Name</label>
                                <div class="col-lg-4 col-md-9 col-sm-8"><?php echo $data[0]['District'];?></div>
                            </div>
                            <div class="form-group form-show-validation row" style="padding:0px">
                                <label for="name" class="col-sm-4 text-left">IsActive</label>
                                <div class="col-sm-8">
                                    <?php if($data[0]['IsActive']=="1") { echo "Yes"; } else { echo "No"; } ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <span class="heading">User Rating</span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star checked"></span>
                            <span class="fa fa-star"></span>
                            <p>4.1 average based on 254 reviews.</p>
                            <hr style="border:3px solid #f1f1f1">
                            <div class="row">
                              <div class="side">
                                <div>5 star</div>
                              </div>
                              <div class="middle">
                                <div class="bar-container">
                                  <div class="bar-5"></div>
                                </div>
                              </div>
                              <div class="side right">
                                <div>150</div>
                              </div>
                              <div class="side">
                                <div>4 star</div>
                              </div>
                              <div class="middle">
                                <div class="bar-container">
                                  <div class="bar-4"></div>
                                </div>
                              </div>
                              <div class="side right">
                                <div>63</div>
                              </div>
                              <div class="side">
                                <div>3 star</div>
                              </div>
                              <div class="middle">
                                <div class="bar-container">
                                  <div class="bar-3"></div>
                                </div>
                              </div>
                              <div class="side right">
                                <div>15</div>
                              </div>
                              <div class="side">
                                <div>2 star</div>
                              </div>
                              <div class="middle">
                                <div class="bar-container">
                                  <div class="bar-2"></div>
                                </div>
                              </div>
                              <div class="side right">
                                <div>6</div>
                              </div>
                              <div class="side">
                                <div>1 star</div>
                              </div>
                              <div class="middle">
                                <div class="bar-container">
                                  <div class="bar-1"></div>
                                </div>
                              </div>
                              <div class="side right">
                                <div>20</div>
                              </div>
                            </div>
                        </div>
                    </div>
                </div>                                                                        
                <div class="card-action">
                    <div class="row">
                        <div class="col-md-12">
                            <a href="dashboard.php?action=SupportingCenter/ManageBusinessSupporting&filter=all" class="btn btn-warning btn-border">Back</a>
                        </div>                                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" style="padding-top:10px;padding-bottom:10px">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card-title">
                                Ratings
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                         <table class="table table-striped mt-3">
                                <thead>
                                    <tr>
                                        <th scope="col">Member ID</th>
                                        <th scope="col">Feedback</th>
                                        <th scope="col">Rating</th>
                                        <th scope="col">Feedback On</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php $feedbacks = $mysql->select("select * from _tbl_store_feedback where StoreID='".$_GET['id']."' order by FeedBackID desc");?>
                                <?php foreach($feedbacks as $feedback){ ?>
                                    <tr>
                                        <td><?php echo $feedback['MemberCode'];?></td>
                                        <td><?php echo $feedback['FeedBack'];?></td>
                                        <td><?php echo PrintStar($feedback['Ratings']);?></td>
                                        <td><?php echo date("M-d-Y H:i",strtotime($feedback['FeedBackOn']));?></td>
                                    </tr>
                                <?php } ?>                                    
                                <?php if(sizeof($feedbacks)==0){ ?>
                                    <tr>
                                        <td colspan="4" style="text-align: center;">No Ratings Found</td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                    </div>
                </div>
            </div>                                                                                             
        </div>
    </div> 
     
 