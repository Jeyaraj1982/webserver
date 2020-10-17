
<?php
include_once("header.php");
include_once("LeftMenu.php");            

        ?><script>
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
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">Application Form </div>
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
                                                    <td colspan="6" style="text-align: center;">No datas Found</td>
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
                                    <div class="card-title">Admission Form</div>
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
                        </div>
                                                                
                    </div>
                </div>
            </div>
<script>

</script>
<?php include_once("footer.php");?>