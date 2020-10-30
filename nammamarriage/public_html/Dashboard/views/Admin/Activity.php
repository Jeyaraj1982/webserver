<form method="post" action="#" onsubmit="">      
    <div class="col-lg-12 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Login Log</h4>
                <div class="table-responsive">
                    <table id="myTable" class="table table-striped">
                      <thead>  
                        <tr> 
                        <th>Date</th>
                        <th>Member ID</th>
                        <th>Activity</th>
                        </tr>  
                    </thead>
                    <tbody> 
                    <?php $response = $webservice->getData("Admin","GetActivityHistory"); ?>  
                        <?php foreach($response['data'] as $log) { ?>
                        <tr>
                            <td><?php echo putDateTime($log['ActivityOn']);?></td>
                            <td><?php echo $log['MemberID'];?></td>
                            <td><?php echo $log['ActivityString'];?></td>
                        </tr>
                        <?php } ?>
                      </tbody>                        
                     </table>
                  </div>
                </div>
              </div>
            </div>
        </form>   
        
 <script>
$(document).ready(function(){
    $('#myTable').dataTable();
    setTimeout("DataTableStyleUpdate()",500);
});
</script>
