<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" style="padding-top:10px;padding-bottom:10px">
                            <div class="card-title">
                                List of PostAds
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <?php 
                                    $obj = new CommonController();  
                                  /*  if (!($obj->isLogin())){
                                       // echo $obj->printError("Login Session Expired. Please Login Again");
                                       // exit;
                                    }   */
                                    $count = 0;                     
                                    $page = (isset($_REQUEST['page']) && $_REQUEST['page']>0) ? $_REQUEST['page'] : 1;
                                    $rsperpage = 20;  

                                    switch($_REQUEST['view']) {
                                        
                                        case 'today'    : 
                                                            $sql    = " where date(postedon)=date('".date("Y-m-d")."') ";
                                                            $rows   = sizeof(JPostads::getPostads(0,$sql));
                                                            $result = JPostads::getPostads(0, $sql." order by postadid desc limit ".($page-1)*$rsperpage.", ".$rsperpage);
                                                            break;
                                        case 'filterdate':
                                                            $sql    = " where (date(postedon)>=date('".$_REQUEST['fromdate']."') and date(postedon)<=date('".$_REQUEST['todate']."'))";
                                                            $rows   = sizeof(JPostads::getPostads(0,$sql)); 
                                                            $result = JPostads::getPostads($_SESSION['USER']['userid'], $sql." limit ".($page-1)*$rsperpage.", ".$rsperpage);   
                                                            break;
                                    }     ?>
                                         
                               <table>                              
                               <?php foreach ($result as $r){   ?> 
                                <tr class='mytr'>
                                    <td style='padding:5px;width:70px'>
                                        <img src="../../assets/<?php echo $config['thumb'].$r["filepath1"];?>"  style="height:70px;width:70px;"></img>
                                    </td>
                                    <td style="vertical-align: top;padding:10px;">
                                        <b><?php echo $r["title"]?></b>:
                                        <br><span style='color:#555'><?php echo strip_tags(substr(strip_tags($r["content"]),0,300));?>... </span>
                                        <div style="padding:3px;padding-left:0px;">
                                            Posted On: <span style="color:#444;font-weight:bold;"><?php echo $r["postedon"]; ?></span>&nbsp;&nbsp;
                                            Status: 
                                            <?php if ($r["isactive"]) {?>
                                                <span style='color:#08912A;font-weight:bold;'>Active</span> 
                                            <?php } else { ?>
                                                <span style='color:#FF090D;font-weight:bold;'>In Active</span> 
                                            <?php } ?>
                                        </div>
                                    </td>
                                    <td width='160' style='text-align:center;'>
                                        <form action='<?php echo AppUrl;?>/admin/dashboard.php?action=postad/managepostads' method='post' style='height:0px;'>
                                            <input type='hidden' value='<?php echo $r["postadid"];?>' name='rowid' id='rowid' >
                                            <a href="<?php echo AppUrl;?>/admin/dashboard.php?action=postad/edit&rowid=<?php echo  $r["postadid"];?>">Edit</a>
                                            <a href="<?php echo AppUrl;?>/admin/dashboard.php?action=postad/view&rowid=<?php echo  $r["postadid"];?>">view</a>
                                         <!--   <input style='font-size:11px;' type='submit' name='editbtn' value='Edit'>
                                            <input style='font-size:11px;' type='submit' name='viewbtn' value='View'>-->
                                            <input style='font-size:11px;' type='submit' name='deletebtn' value='Delete'>
                                        </form>
                                     </td>
                                </tr>
                                  <tr>
                                    <td colspan='3'><hr style='border:none;border-bottom:1px solid #f1f1f1'></td>
                                  </tr>
                                <?php  }?>
                            </table>    
                            </div>
                        </div>
                    </div>                                                                                             
                </div>
            </div>
        </div>
    </div>
</div>
<script>$(document).ready(function(){ 
//{$('#myTable').DataTable({ "order": [[ 0, "desc" ]]});

$('#fdate').datetimepicker({                                                                                   
            format: 'YYYY-MM-DD', 
        });
        
        $('#tdate').datetimepicker({
            format: 'YYYY-MM-DD',
        });
});</script>


