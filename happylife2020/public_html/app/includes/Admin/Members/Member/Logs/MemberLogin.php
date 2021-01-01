<?php $Requests  = $mysql->select("SELECT _tbl_members_login_logs.*, _tbl_Members.MemberCode, _tbl_Members.MemberName FROM _tbl_members_login_logs LEFT JOIN _tbl_Members
ON _tbl_members_login_logs.MemberID=_tbl_Members.MemberID where _tbl_members_login_logs.MemberID='".$data[0]['MemberID']."' order by _tbl_members_login_logs.LoginID Desc"); ?>
 
     
    <div class="row">
        <div class="col-lg-12 col-xlg-12 col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-header">
                        <h4 class="card-title">Member Login Logs</h4>
                    </div>
                    <div class="card-body">         
                         <div class="table-responsive">
                            <table id="basic-datatables" class="display table table-striped table-hover" >
                                <thead>
                                    <tr>
                                        <th><b>Logged</b></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($Requests as $Request){ ?>
                                    <tr>
                                        <td><?php echo $Request['LoginOn'];?></td>
                                        <td><?php echo $Request['IsSuccess']==1 ? "Success" : "Failed";?></td>
                                        <td></td>
                                    </tr>
                                    <?php }?>  
                                    <?php if(sizeof($Requests)=="5"){?>
                                    <tr>
                                        <td colspan="8" style="text-align: center;">No Datas Found</td>
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
 
 

<script>
    $(document).ready(function() {$('#basic-datatables').DataTable();});
</script>