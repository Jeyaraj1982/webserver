
<?php
include_once("header.php");
include_once("LeftMenu.php"); 
if (isset($_GET['action'])) {
         include_once($_GET['action'].".php");
     } else { ?>
<script>
    function SubmitSearch() {
        
        $('#ErrMemberDetails').html("");
                                            
        ErrorCount=0;
        
        if(IsNonEmpty("MemberDetails","ErrMemberDetails","Please Enter Valid Name or Mobile Number or Email")){
           IsSearch("MemberDetails","ErrMemberDetails","Please Enter more than 3 characters") 
        }
        
        if (ErrorCount==0) {
            return true;                                                                       
        } else{
            return false;
        }
    }
</script>
<div class="main-panel full-height">
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
                    
                        <div class="col-sm-6 col-md-4">
                            <div class="card card-stats card-round">
                                <div class="card-body ">
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="icon-big text-center">
                                                <i class="flaticon-coins text-success"></i>
                                            </div>
                                        </div>
                                        <div class="col-7 col-stats">
                                            <div class="numbers">
                                                <p class="card-category">Collected Payments</p>
                                                <h4 class="card-title">
                                                Rs. <?php
                            $p = $mysql->select("Select sum(TxnAmount) as amt from _tblPayments where TxnStatus='Success'");
                            echo $p[0]['amt'];
                        ?>
                                                </h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                       <!-- <div class="col-sm-6 col-md-3">
                            <div class="card card-stats card-round">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="icon-big text-center">
                                                <i class="flaticon-error text-danger"></i>
                                            </div>
                                        </div>
                                        <div class="col-7 col-stats">
                                            <div class="numbers">
                                                <p class="card-category"> </p>
                                                <h4 class="card-title"> </h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-3">
                            <div class="card card-stats card-round">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="icon-big text-center">
                                                <i class="flaticon-twitter text-primary"></i>
                                            </div>
                                        </div>
                                        <div class="col-7 col-stats">
                                            <div class="numbers">
                                                <p class="card-category"> </p>
                                                <h4 class="card-title"> </h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                    </div>
                    
                    
                 
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">Application Form First Year</div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Course Name</th>
                                                    <th>Applied</th>
                                                    <th>Paid</th>
                                                    <th>Accepted</th>
                                                    <th>Rejected</th>
                                                    <th>Waiting</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>AutoMobile Engineering </td>
                                                    <td style="text-align: right">
                                                        <?php 
                                                        $sql = $mysql->select("SELECT * FROM admission_firstyear WHERE Status='1' and FirstCourseID='6'");
                                                        if(sizeof($sql)>0){ ?> 
                                                            <a href="FirstYear.php?filter=Applied&course=6"><?php echo sizeof($sql);?></a>
                                                        <?php } else { echo "0";} ?>
                                                        
                                                    </td>
                                                    <td style="text-align: right">
                                                        <?php 
                                                        $sql = $mysql->select("SELECT * FROM admission_firstyear WHERE IsPaid='1' and FirstCourseID='6'");
                                                        if(sizeof($sql)>0){ ?> 
                                                            <a href="FirstYear.php?filter=Paid&course=6"><?php echo sizeof($sql);?></a>
                                                        <?php } else { echo "0";} ?>
                                                        
                                                    </td>
                                                    <td style="text-align: right">
                                                    <?php 
                                                        $sql = $mysql->select("SELECT * FROM admission_firstyear WHERE Status='2' and FirstCourseID='6'");
                                                        if(sizeof($sql)>0){ ?> 
                                                            <a href="FirstYear.php?filter=Approved&course=6"><?php echo sizeof($sql);?></a>
                                                        <?php } else { echo "0";}  ?>
                                                    </td>
                                                    <td style="text-align: right">
                                                    <?php 
                                                        $sql = $mysql->select("SELECT * FROM admission_firstyear WHERE Status='3' and FirstCourseID='6'");
                                                        if(sizeof($sql)>0){ ?> 
                                                            <a href="FirstYear.php?filter=Rejected"><?php echo sizeof($sql);?></a>
                                                        <?php } else { echo "0";}  ?>
                                                    </td>
                                                    <td style="text-align: right">
                                                    <?php 
                                                        $sql = $mysql->select("SELECT * FROM admission_firstyear WHERE Status='4' and FirstCourseID='6'");
                                                        if(sizeof($sql)>0){ ?> 
                                                            <a href="FirstYear.php?filter=Waiting&course=6"><?php echo sizeof($sql);?></a>
                                                        <?php } else { echo "0";}  ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Civil Engineering</td>
                                                    <td style="text-align: right">
                                                    <?php 
                                                        $sql = $mysql->select("SELECT * FROM admission_firstyear WHERE Status='1' and FirstCourseID='5'");
                                                        if(sizeof($sql)>0){ ?> 
                                                            <a href="FirstYear.php?filter=Applied&course=5"><?php echo sizeof($sql);?></a>
                                                        <?php } else { echo "0";}  ?>
                                                    </td>
                                                    <td style="text-align: right">
                                                        <?php 
                                                        $sql = $mysql->select("SELECT * FROM admission_firstyear WHERE IsPaid='1' and FirstCourseID='5'");
                                                        if(sizeof($sql)>0){ ?> 
                                                            <a href="FirstYear.php?filter=Paid&course=5"><?php echo sizeof($sql);?></a>
                                                        <?php } else { echo "0";} ?>
                                                        
                                                    </td>
                                                    <td style="text-align: right">
                                                    <?php 
                                                        $sql = $mysql->select("SELECT * FROM admission_firstyear WHERE Status='2' and FirstCourseID='5'");
                                                        if(sizeof($sql)>0){ ?> 
                                                            <a href="FirstYear.php?filter=Approved&course=5"><?php echo sizeof($sql);?></a>
                                                        <?php } else { echo "0";}  ?>
                                                    </td>
                                                    <td style="text-align: right">
                                                    <?php 
                                                        $sql = $mysql->select("SELECT * FROM admission_firstyear WHERE Status='3' and FirstCourseID='5'");
                                                        if(sizeof($sql)>0){ ?> 
                                                            <a href="FirstYear.php?filter=Rejected&course=5"><?php echo sizeof($sql);?></a>
                                                        <?php } else { echo "0";}  ?>
                                                    </td>
                                                    <td style="text-align: right">
                                                    <?php 
                                                        $sql = $mysql->select("SELECT * FROM admission_firstyear WHERE Status='4' and FirstCourseID='6'");
                                                        if(sizeof($sql)>0){ ?> 
                                                            <a href="FirstYear.php?filter=Waiting&course=5"><?php echo sizeof($sql);?></a>
                                                        <?php } else { echo "0";}  ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Computer Science Engineering</td>
                                                    <td style="text-align: right">
                                                    <?php 
                                                        $sql = $mysql->select("SELECT * FROM admission_firstyear WHERE Status='1' and FirstCourseID='4'");
                                                        if(sizeof($sql)>0){ ?> 
                                                            <a href="FirstYear.php?filter=Applied&course=4"><?php echo sizeof($sql);?></a>
                                                        <?php } else { echo "0";}  ?>
                                                    </td>
                                                    <td style="text-align: right">
                                                        <?php 
                                                        $sql = $mysql->select("SELECT * FROM admission_firstyear WHERE IsPaid='1' and FirstCourseID='4'");
                                                        if(sizeof($sql)>0){ ?> 
                                                            <a href="FirstYear.php?filter=Paid&course=4"><?php echo sizeof($sql);?></a>
                                                        <?php } else { echo "0";} ?>
                                                        
                                                    </td>
                                                    <td style="text-align: right">
                                                    <?php 
                                                        $sql = $mysql->select("SELECT * FROM admission_firstyear WHERE Status='2' and FirstCourseID='4'");
                                                        if(sizeof($sql)>0){ ?> 
                                                            <a href="FirstYear.php?filter=Approved&course=4"><?php echo sizeof($sql);?></a>
                                                        <?php } else { echo "0";}  ?>
                                                    </td>
                                                    <td style="text-align: right">
                                                    <?php 
                                                        $sql = $mysql->select("SELECT * FROM admission_firstyear WHERE Status='3' and FirstCourseID='4'");
                                                        if(sizeof($sql)>0){ ?> 
                                                            <a href="FirstYear.php?filter=Rejected&course=4"><?php echo sizeof($sql);?></a>
                                                        <?php } else { echo "0";}  ?>
                                                    </td>
                                                    <td style="text-align: right">
                                                    <?php 
                                                        $sql = $mysql->select("SELECT * FROM admission_firstyear WHERE Status='4' and FirstCourseID='4'");
                                                        if(sizeof($sql)>0){ ?> 
                                                            <a href="FirstYear.php?filter=Waiting&course=4"><?php echo sizeof($sql);?></a>
                                                        <?php } else { echo "0";}  ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Electrical and Electronics Engineering</td>
                                                    <td style="text-align: right">
                                                    <?php 
                                                        $sql = $mysql->select("SELECT * FROM admission_firstyear WHERE Status='1' and FirstCourseID='2'");
                                                        if(sizeof($sql)>0){ ?> 
                                                            <a href="FirstYear.php?filter=Applied&course=2"><?php echo sizeof($sql);?></a>
                                                        <?php } else { echo "0";}  ?>
                                                    </td>
                                                    <td style="text-align: right">
                                                        <?php 
                                                        $sql = $mysql->select("SELECT * FROM admission_firstyear WHERE IsPaid='1' and FirstCourseID='2'");
                                                        if(sizeof($sql)>0){ ?> 
                                                            <a href="FirstYear.php?filter=Paid&course=2"><?php echo sizeof($sql);?></a>
                                                        <?php } else { echo "0";} ?>
                                                        
                                                    </td>
                                                    <td style="text-align: right">
                                                    <?php 
                                                        $sql = $mysql->select("SELECT * FROM admission_firstyear WHERE Status='2' and FirstCourseID='2'");
                                                        if(sizeof($sql)>0){ ?> 
                                                            <a href="FirstYear.php?filter=Approved&course=2"><?php echo sizeof($sql);?></a>
                                                        <?php } else { echo "0";}  ?>
                                                    </td>
                                                    <td style="text-align: right">
                                                    <?php 
                                                        $sql = $mysql->select("SELECT * FROM admission_firstyear WHERE Status='3' and FirstCourseID='2'");
                                                        if(sizeof($sql)>0){ ?> 
                                                            <a href="FirstYear.php?filter=Rejected&course=2"><?php echo sizeof($sql);?></a>
                                                        <?php } else { echo "0";}  ?>
                                                    </td>
                                                    <td style="text-align: right">
                                                    <?php 
                                                        $sql = $mysql->select("SELECT * FROM admission_firstyear WHERE Status='4' and FirstCourseID='2'");
                                                        if(sizeof($sql)>0){ ?> 
                                                            <a href="FirstYear.php?filter=Waiting&course=2"><?php echo sizeof($sql);?></a>
                                                        <?php } else { echo "0";}  ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Electronics and Communication Engineering</td>
                                                    <td style="text-align: right">
                                                    <?php 
                                                        $sql = $mysql->select("SELECT * FROM admission_firstyear WHERE Status='1' and FirstCourseID='1'");
                                                        if(sizeof($sql)>0){ ?> 
                                                            <a href="FirstYear.php?filter=Applied&course=1"><?php echo sizeof($sql);?></a>
                                                        <?php } else { echo "0";}  ?>
                                                    </td>
                                                    <td style="text-align: right">
                                                        <?php 
                                                        $sql = $mysql->select("SELECT * FROM admission_firstyear WHERE IsPaid='1' and FirstCourseID='1'");
                                                        if(sizeof($sql)>0){ ?> 
                                                            <a href="FirstYear.php?filter=Paid&course=1"><?php echo sizeof($sql);?></a>
                                                        <?php } else { echo "0";} ?>
                                                        
                                                    </td>
                                                    <td style="text-align: right">
                                                    <?php 
                                                        $sql = $mysql->select("SELECT * FROM admission_firstyear WHERE Status='2' and FirstCourseID='1'");
                                                        if(sizeof($sql)>0){ ?> 
                                                            <a href="FirstYear.php?filter=Approved&course=1"><?php echo sizeof($sql);?></a>
                                                        <?php } else { echo "0";}  ?>
                                                    </td>
                                                    <td style="text-align: right">
                                                    <?php 
                                                        $sql = $mysql->select("SELECT * FROM admission_firstyear WHERE Status='3' and FirstCourseID='1'");
                                                        if(sizeof($sql)>0){ ?> 
                                                            <a href="FirstYear.php?filter=Rejected&course=1"><?php echo sizeof($sql);?></a>
                                                        <?php } else { echo "0";}  ?>
                                                    </td>
                                                    <td style="text-align: right">
                                                    <?php 
                                                        $sql = $mysql->select("SELECT * FROM admission_firstyear WHERE Status='4' and FirstCourseID='1'");
                                                        if(sizeof($sql)>0){ ?> 
                                                            <a href="FirstYear.php?filter=Waiting&course=1"><?php echo sizeof($sql);?></a>
                                                        <?php } else { echo "0";}  ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Mechanical Engineering</td>
                                                    <td style="text-align: right">
                                                    <?php 
                                                        $sql = $mysql->select("SELECT * FROM admission_firstyear WHERE Status='1' and FirstCourseID='3'");
                                                        if(sizeof($sql)>0){ ?> 
                                                            <a href="FirstYear.php?filter=Applied&course=3"><?php echo sizeof($sql);?></a>
                                                        <?php } else { echo "0";}  ?>
                                                    </td>
                                                    <td style="text-align: right">                         
                                                        <?php 
                                                        $sql = $mysql->select("SELECT * FROM admission_firstyear WHERE IsPaid='1' and FirstCourseID='3'");
                                                        if(sizeof($sql)>0){ ?> 
                                                            <a href="FirstYear.php?filter=Paid&course=3"><?php echo sizeof($sql);?></a>
                                                        <?php } else { echo "0";} ?>
                                                        
                                                    </td>
                                                    <td style="text-align: right">
                                                    <?php 
                                                        $sql = $mysql->select("SELECT * FROM admission_firstyear WHERE Status='2' and FirstCourseID='3'");
                                                        if(sizeof($sql)>0){ ?> 
                                                            <a href="FirstYear.php?filter=Approved&course=3"><?php echo sizeof($sql);?></a>
                                                        <?php } else { echo "0";}  ?>
                                                    </td>
                                                    <td style="text-align: right">
                                                    <?php 
                                                        $sql = $mysql->select("SELECT * FROM admission_firstyear WHERE Status='3' and FirstCourseID='3'");
                                                        if(sizeof($sql)>0){ ?> 
                                                            <a href="FirstYear.php?filter=Rejected&course=3"><?php echo sizeof($sql);?></a>
                                                        <?php } else { echo "0";}  ?>
                                                    </td>
                                                    <td style="text-align: right">
                                                    <?php 
                                                        $sql = $mysql->select("SELECT * FROM admission_firstyear WHERE Status='4' and FirstCourseID='3'");
                                                        if(sizeof($sql)>0){ ?> 
                                                            <a href="FirstYear.php?filter=Waiting&course=3"><?php echo sizeof($sql);?></a>
                                                        <?php } else { echo "0";}  ?>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    
                                </div>                                                                                          
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">Application Form Second Year</div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>Course Name</th>
                                                    <th>Applied</th>
                                                    <th>Paid</th>
                                                    <th>Accepted</th>
                                                    <th>Rejected</th>
                                                    <th>Waiting</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>AutoMobile Engineering </td>
                                                    <td style="text-align: right">
                                                        <?php 
                                                        $sql = $mysql->select("SELECT * FROM admission_secondyear WHERE Status='1' and FirstCourseID='6'");
                                                        if(sizeof($sql)>0){ ?> 
                                                            <a href="SecondYear.php?filter=Applied&course=6"><?php echo sizeof($sql);?></a>
                                                        <?php } else { echo "0";} ?>
                                                        
                                                    </td>
                                                    <td style="text-align: right">
                                                        <?php 
                                                        $sql = $mysql->select("SELECT * FROM admission_secondyear WHERE IsPaid='1' and FirstCourseID='6'");
                                                        if(sizeof($sql)>0){ ?> 
                                                            <a href="FirstYear.php?filter=Paid&course=6"><?php echo sizeof($sql);?></a>
                                                        <?php } else { echo "0";} ?>
                                                        
                                                    </td>
                                                    <td style="text-align: right">
                                                    <?php 
                                                        $sql = $mysql->select("SELECT * FROM admission_secondyear WHERE Status='2' and FirstCourseID='6'");
                                                        if(sizeof($sql)>0){ ?> 
                                                            <a href="SecondYear.php?filter=Approved&course=6"><?php echo sizeof($sql);?></a>
                                                        <?php } else { echo "0";}  ?>
                                                    </td>
                                                    <td style="text-align: right">
                                                    <?php 
                                                        $sql = $mysql->select("SELECT * FROM admission_secondyear WHERE Status='3' and FirstCourseID='6'");
                                                        if(sizeof($sql)>0){ ?> 
                                                            <a href="SecondYear.php?filter=Rejected&course=6"><?php echo sizeof($sql);?></a>
                                                        <?php } else { echo "0";}  ?>
                                                    </td>
                                                    <td style="text-align: right">
                                                    <?php 
                                                        $sql = $mysql->select("SELECT * FROM admission_secondyear WHERE Status='4' and FirstCourseID='6'");
                                                        if(sizeof($sql)>0){ ?> 
                                                            <a href="SecondYear.php?filter=Waiting&course=6"><?php echo sizeof($sql);?></a>
                                                        <?php } else { echo "0";}  ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Civil Engineering</td>
                                                    <td style="text-align: right">
                                                    <?php 
                                                        $sql = $mysql->select("SELECT * FROM admission_secondyear WHERE Status='1' and FirstCourseID='5'");
                                                        if(sizeof($sql)>0){ ?> 
                                                            <a href="SecondYear.php?filter=Applied&course=5"><?php echo sizeof($sql);?></a>
                                                        <?php } else { echo "0";}  ?>
                                                    </td>
                                                    <td style="text-align: right">
                                                        <?php 
                                                        $sql = $mysql->select("SELECT * FROM admission_secondyear WHERE IsPaid='1' and FirstCourseID='5'");
                                                        if(sizeof($sql)>0){ ?> 
                                                            <a href="FirstYear.php?filter=Paid&course=5"><?php echo sizeof($sql);?></a>
                                                        <?php } else { echo "0";} ?>
                                                        
                                                    </td>
                                                    <td style="text-align: right">
                                                    <?php 
                                                        $sql = $mysql->select("SELECT * FROM admission_secondyear WHERE Status='2' and FirstCourseID='5'");
                                                        if(sizeof($sql)>0){ ?> 
                                                            <a href="SecondYear.php?filter=Approved&course=5"><?php echo sizeof($sql);?></a>
                                                        <?php } else { echo "0";}  ?>
                                                    </td>
                                                    <td style="text-align: right">
                                                    <?php 
                                                        $sql = $mysql->select("SELECT * FROM admission_secondyear WHERE Status='3' and FirstCourseID='5'");
                                                        if(sizeof($sql)>0){ ?> 
                                                            <a href="SecondYear.php?filter=Rejected&course=5"><?php echo sizeof($sql);?></a>
                                                        <?php } else { echo "0";}  ?>
                                                    </td>
                                                    <td style="text-align: right">
                                                    <?php 
                                                        $sql = $mysql->select("SELECT * FROM admission_secondyear WHERE Status='4' and FirstCourseID='6'");
                                                        if(sizeof($sql)>0){ ?> 
                                                            <a href="SecondYear.php?filter=Waiting&course=5"><?php echo sizeof($sql);?></a>
                                                        <?php } else { echo "0";}  ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Computer Science Engineering</td>
                                                    <td style="text-align: right">
                                                    <?php 
                                                        $sql = $mysql->select("SELECT * FROM admission_secondyear WHERE Status='1' and FirstCourseID='4'");
                                                        if(sizeof($sql)>0){ ?> 
                                                            <a href="SecondYear.php?filter=Applied&course=4"><?php echo sizeof($sql);?></a>
                                                        <?php } else { echo "0";}  ?>
                                                    </td>
                                                    <td style="text-align: right">
                                                        <?php 
                                                        $sql = $mysql->select("SELECT * FROM admission_secondyear WHERE IsPaid='1' and FirstCourseID='4'");
                                                        if(sizeof($sql)>0){ ?> 
                                                            <a href="FirstYear.php?filter=Paid&course=4"><?php echo sizeof($sql);?></a>
                                                        <?php } else { echo "0";} ?>
                                                        
                                                    </td>
                                                    <td style="text-align: right">
                                                    <?php 
                                                        $sql = $mysql->select("SELECT * FROM admission_secondyear WHERE Status='2' and FirstCourseID='4'");
                                                        if(sizeof($sql)>0){ ?> 
                                                            <a href="SecondYear.php?filter=Approved&course=4"><?php echo sizeof($sql);?></a>
                                                        <?php } else { echo "0";}  ?>
                                                    </td>
                                                    <td style="text-align: right">
                                                    <?php 
                                                        $sql = $mysql->select("SELECT * FROM admission_secondyear WHERE Status='3' and FirstCourseID='4'");
                                                        if(sizeof($sql)>0){ ?> 
                                                            <a href="SecondYear.php?filter=Rejected&course=4"><?php echo sizeof($sql);?></a>
                                                        <?php } else { echo "0";}  ?>
                                                    </td>
                                                    <td style="text-align: right">
                                                    <?php 
                                                        $sql = $mysql->select("SELECT * FROM admission_secondyear WHERE Status='4' and FirstCourseID='4'");
                                                        if(sizeof($sql)>0){ ?> 
                                                            <a href="SecondYear.php?filter=Waiting&course=4"><?php echo sizeof($sql);?></a>
                                                        <?php } else { echo "0";}  ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Electrical and Electronics Engineering</td>
                                                    <td style="text-align: right">
                                                    <?php 
                                                        $sql = $mysql->select("SELECT * FROM admission_secondyear WHERE Status='1' and FirstCourseID='2'");
                                                        if(sizeof($sql)>0){ ?> 
                                                            <a href="SecondYear.php?filter=Applied&course=2"><?php echo sizeof($sql);?></a>
                                                        <?php } else { echo "0";}  ?>
                                                    </td>
                                                    <td style="text-align: right">
                                                        <?php 
                                                        $sql = $mysql->select("SELECT * FROM admission_secondyear WHERE IsPaid='1' and FirstCourseID='2'");
                                                        if(sizeof($sql)>0){ ?> 
                                                            <a href="FirstYear.php?filter=Paid&course=2"><?php echo sizeof($sql);?></a>
                                                        <?php } else { echo "0";} ?>
                                                        
                                                    </td>
                                                    <td style="text-align: right">
                                                    <?php 
                                                        $sql = $mysql->select("SELECT * FROM admission_secondyear WHERE Status='2' and FirstCourseID='2'");
                                                        if(sizeof($sql)>0){ ?> 
                                                            <a href="SecondYear.php?filter=Approved&course=2"><?php echo sizeof($sql);?></a>
                                                        <?php } else { echo "0";}  ?>
                                                    </td>
                                                    <td style="text-align: right">
                                                    <?php 
                                                        $sql = $mysql->select("SELECT * FROM admission_secondyear WHERE Status='3' and FirstCourseID='2'");
                                                        if(sizeof($sql)>0){ ?> 
                                                            <a href="SecondYear.php?filter=Rejected&course=2"><?php echo sizeof($sql);?></a>
                                                        <?php } else { echo "0";}  ?>
                                                    </td>
                                                    <td style="text-align: right">
                                                    <?php 
                                                        $sql = $mysql->select("SELECT * FROM admission_secondyear WHERE Status='4' and FirstCourseID='2'");
                                                        if(sizeof($sql)>0){ ?> 
                                                            <a href="SecondYear.php?filter=Waiting&course=2"><?php echo sizeof($sql);?></a>
                                                        <?php } else { echo "0";}  ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Electronics and Communication Engineering</td>
                                                    <td style="text-align: right">
                                                    <?php 
                                                        $sql = $mysql->select("SELECT * FROM admission_secondyear WHERE Status='1' and FirstCourseID='1'");
                                                        if(sizeof($sql)>0){ ?> 
                                                            <a href="SecondYear.php?filter=Applied&course=1"><?php echo sizeof($sql);?></a>
                                                        <?php } else { echo "0";}  ?>
                                                    </td>
                                                    <td style="text-align: right">
                                                        <?php 
                                                        $sql = $mysql->select("SELECT * FROM admission_secondyear WHERE IsPaid='1' and FirstCourseID='1'");
                                                        if(sizeof($sql)>0){ ?> 
                                                            <a href="FirstYear.php?filter=Paid&course=1"><?php echo sizeof($sql);?></a>
                                                        <?php } else { echo "0";} ?>
                                                        
                                                    </td>
                                                    <td style="text-align: right">
                                                    <?php 
                                                        $sql = $mysql->select("SELECT * FROM admission_secondyear WHERE Status='2' and FirstCourseID='1'");
                                                        if(sizeof($sql)>0){ ?> 
                                                            <a href="SecondYear.php?filter=Approved&course=1"><?php echo sizeof($sql);?></a>
                                                        <?php } else { echo "0";}  ?>
                                                    </td>
                                                    <td style="text-align: right">
                                                    <?php 
                                                        $sql = $mysql->select("SELECT * FROM admission_secondyear WHERE Status='3' and FirstCourseID='1'");
                                                        if(sizeof($sql)>0){ ?> 
                                                            <a href="SecondYear.php?filter=Rejected&course=1"><?php echo sizeof($sql);?></a>
                                                        <?php } else { echo "0";}  ?>
                                                    </td>
                                                    <td style="text-align: right">
                                                    <?php 
                                                        $sql = $mysql->select("SELECT * FROM admission_secondyear WHERE Status='4' and FirstCourseID='1'");
                                                        if(sizeof($sql)>0){ ?> 
                                                            <a href="SecondYear.php?filter=Waiting&course=1"><?php echo sizeof($sql);?></a>
                                                        <?php } else { echo "0";}  ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td>Mechanical Engineering</td>
                                                    <td style="text-align: right">
                                                    <?php 
                                                        $sql = $mysql->select("SELECT * FROM admission_secondyear WHERE Status='1' and FirstCourseID='3'");
                                                        if(sizeof($sql)>0){ ?> 
                                                            <a href="SecondYear.php?filter=Applied&course=3"><?php echo sizeof($sql);?></a>
                                                        <?php } else { echo "0";}  ?>
                                                    </td>
                                                    <td style="text-align: right">
                                                        <?php 
                                                        $sql = $mysql->select("SELECT * FROM admission_secondyear WHERE IsPaid='1' and FirstCourseID='3'");
                                                        if(sizeof($sql)>0){ ?> 
                                                            <a href="FirstYear.php?filter=Paid&course=3"><?php echo sizeof($sql);?></a>
                                                        <?php } else { echo "0";} ?>
                                                        
                                                    </td>
                                                    <td style="text-align: right">
                                                    <?php 
                                                        $sql = $mysql->select("SELECT * FROM admission_secondyear WHERE Status='2' and FirstCourseID='3'");
                                                        if(sizeof($sql)>0){ ?>
                                                            <a href="SecondYear.php?filter=Approved&course=3"><?php echo sizeof($sql);?></a>
                                                        <?php } else { echo "0";}  ?>
                                                    </td>
                                                    <td style="text-align: right">
                                                    <?php 
                                                        $sql = $mysql->select("SELECT * FROM admission_secondyear WHERE Status='3' and FirstCourseID='3'");
                                                        if(sizeof($sql)>0){ ?> 
                                                            <a href="SecondYear.php?filter=Rejected&course=3"><?php echo sizeof($sql);?></a>
                                                        <?php } else { echo "0";}  ?>
                                                    </td>
                                                    <td style="text-align: right">
                                                    <?php 
                                                        $sql = $mysql->select("SELECT * FROM admission_secondyear WHERE Status='4' and FirstCourseID='3'");
                                                        if(sizeof($sql)>0){ ?> 
                                                            <a href="SecondYear.php?filter=Waiting&course=3"><?php echo sizeof($sql);?></a>
                                                        <?php } else { echo "0";}  ?>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    
                                </div>                                                                                          
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">First Year</div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th> Name</th>
                                                    <th>Course</th>
                                                    <th>Marks</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $firstyears = $mysql->select("SELECT * FROM admission_firstyear order by AdmissionID DESC limit 0,5");?>
                                                <?php foreach($firstyears as $firstyear){?>
                                                <tr>                           
                                                    <td><?php echo $firstyear['CandidiateName'];?> </td>
                                                    <td><?php echo $firstyear['FirstCourse'];?></td> 
                                                    <td><?php echo $firstyear['SubjectTotal'];?></td> 
                                                </tr>
                                                <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                </div>
                            </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">Second Year</div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th> Name</th>
                                                    <th>Course</th>
                                                    <th>Marks</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php $firstyears = $mysql->select("SELECT * FROM admission_secondyear order by AdmissionID DESC limit 0,5");?>
                                                <?php foreach($firstyears as $firstyear){?>
                                                <tr>
                                                    <td><?php echo $firstyear['CandidiateName'];?> </td>
                                                    <td><?php echo $firstyear['FirstCourse'];?></td> 
                                                    <td><?php echo $firstyear['SubjectTotal'];?></td> 
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
<?php } ?>
<?php include_once("footer.php");?>