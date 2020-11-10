<?php 
     $fromDate = isset($_POST['fdate']) ? $_POST['fdate'] : date("Y-m-d");
     $toDate = isset($_POST['tdate']) ? $_POST['tdate'] : date("Y-m-d");
		$Reports = $mysql->select("SELECT * FROM _queen_staffs where date(CreatedOn)>=date('".$fromDate."') and date(CreatedOn)<=date('".$toDate."') order by StaffID desc");
        
?>
<div class="main-panel">
    <div class="container">
        <div class="page-inner">
           
            <div class="row"> 
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" style="padding-top:10px;padding-bottom:10px">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="card-title">
                                        Report<br>
										<span style="font-size:15px"><?php echo "Staff Wise";?></span> 
                                    </div>
                                </div> 
                            </div>
                        </div>
                        <div class="card-body">
                        <form action="" method="post">
                                <div class="row">                                                              
                                    <div class="col-sm-2">
                                        <div class="form-group form-group-default">          
                                            <label>From Date</label>
                                            <input type="text" class="form-control" id="fdate" name="fdate" value="<?php echo $fromDate;?>" placeholder="From Date">
                                        </div>
                                    </div>
                                    <div class="col-sm-2">
                                        <div class="form-group form-group-default">
                                            <label>To Date</label>
                                            <input type="text" class="form-control" id="tdate" name="tdate" value="<?php echo  $toDate;?>" placeholder="To Date">
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <input type="submit" value="View" class="btn btn-primary" name="viewinvoice">
                                    </div>
                                </div>
                            </form>
                            <div class="table-responsive">
                                 <table class="table table-striped mt-3">
                                        <thead>
                                            <tr>
												<th scope="col">Staff Code</th>
                                                <th scope="col">Staff Name</th>
                                                <th scope="col">Login Name</th>
                                                <th scope="col">Created On</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        
                                        <?php foreach($Reports as $Report){ ?>
                                            <tr>
												<td><?php echo $Report['StaffCode'];?></td>
                                                <td><?php echo $Report['StaffName'];?></td>
                                                <td><?php echo $Report['LoginName'];?></td>
												<td><?php echo date("d M, Y, H:i",strtotime($Report['CreatedOn']));?></td>	
                                            </tr>
                                        <?php } ?>
                                        <?php if(sizeof($Reports)=="0"){ ?>
                                            <tr>
                                                <td colspan="4" style="text-align: center;">No Report Found</td>
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
$(document).ready(function() {
$('#fdate').datetimepicker({
            format: 'YYYY-MM-DD',
        });
        
        $('#tdate').datetimepicker({
            format: 'YYYY-MM-DD',
        });

});
</script>