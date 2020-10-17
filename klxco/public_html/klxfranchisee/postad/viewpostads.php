<?php
     {
    $fromdate = isset($_POST['fdate']) ? $_POST['fdate'] : date("Y-m-d");
    $todate = isset($_POST['tdate']) ? $_POST['tdate'] : date("Y-m-d");
   // $fromdate=date("Y-m-d");
    if (isset($_POST['fdate'])) {
        //$fromdate=$_POST['fy']."-".$_POST['fm']."-".$_POST['fd'];  
    }
   // $todate=date("Y-m-d");
    if (isset($_POST['tdate'])) {
      //  $todate=$_POST['ty']."-".$_POST['tm']."-".$_POST['td'];  
    }
     
  //  $tads     = $mysql->select("select * from _jpostads where distcid='".$_SESSION['FRANCHISEE']['DistrictID']."' and (date(postedon)>=date('".$fromdate."') and date(postedon)<=date('".$todate."') )  order by postadid desc");
 //   $totalads = $mysql->select("select * from _jpostads where distcid='".$_SESSION['FRANCHISEE']['DistrictID']."' ");

  $sql = " where (date(postedon)>=date('".$fromdate."') and date(postedon)<=date('".$todate."') )  order by postadid desc ";
   
    
   
   $totalads =        JPostads::getPostads(0,$sql)
     
 ?>
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
                        <form action="" method="post">
                            <div class="row">
                                <div class="col-sm-2">
                                    <div class="form-group form-group-default">
                                        <label>From Date</label>
                                        <input type="text" class="form-control" id="fdate" name="fdate" value="<?php echo $fromdate;?>" placeholder="From Date">
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="form-group form-group-default">
                                        <label>To Date</label>
                                        <input type="text" class="form-control" id="tdate" name="tdate" value="<?php echo  $todate;?>" placeholder="To Date">
                                    </div>
                                </div>
                                <div class="col-sm-2">
                                    <input type="submit" value="View" class="btn btn-primary">
                                </div>
                            </div>
                        </form>
                        <form action="" method="post"> 
                            <input type="hidden" name="fdate" value="<?php echo $fromdate;?>">
                            <input type="hidden" name="tdate" value="<?php echo  $todate;?>">
                  <br>
                            <?php
                    if (sizeof($totalads)>0) {
                        echo sizeof($totalads) . " ads found";
                    }
                ?>      
                        </form>
                            <div class="table-responsive">
                                <table  cellspacing='0' cellspadding='5' style='font-size:13px;font-family:arial;color:#222;width:100%'>
                                    <?php foreach ($totalads as $r) { ?>
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
                                            <a href="dashboard.php?action=postad/view&rowid=<?php echo  $r["postadid"];?>&btn=viewbtn">View</a>
                                         </td>
                                    </tr>
                                    <tr>
                                        <td colspan='3'><hr style='border:none;border-bottom:1px solid #f1f1f1'></td>
                                    </tr>
                                    <?php }?>
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
$(document).ready(function(){ 
    $('#fdate').datetimepicker({format: 'YYYY-MM-DD'});
    $('#tdate').datetimepicker({format: 'YYYY-MM-DD'});
});
</script>
<?php } ?>