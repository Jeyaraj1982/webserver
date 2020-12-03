<?php
$fromdate = isset($_POST['fdate']) ? $_POST['fdate'] : date("Y-m-d");
$todate = isset($_POST['tdate']) ? $_POST['tdate'] : date("Y-m-d");
 if (isset($_POST['deleted']))       {
        
        if (sizeof($_POST['IDS'])>0) {
            foreach($_POST['IDS'] as $k=>$v) {
                
                       $d = $mysql->select("select * from _jpostads  where postadid='".$k."'");
         $filename = ((strlen(trim($d[0]['filepath1']))>4) && file_exists("/home/klxco/public_html/assets/".$config['thumb'].$d[0]['filepath1'])) ? "assets/".$config['thumb'].$d[0]['filepath1'] : "";
              
         if ($filename!="") {
             
                
                   if (copy("/home/klxco/public_html/".$filename,"/home/ztemp_klx/".$d[0]['filepath1'])) 
                   {
                    unlink("/home/klxco/public_html/".$filename);
                    $mysql->insert("_jpostads_deleted",array(
                    "postadid"=>$d[0]['postadid'],
                    "categid"=>$d[0]['categid'],
                    "subcateid"=>$d[0]['subcateid'],
                    "title"=>$d[0]['title'],
                    "content"=>$d[0]['content'],
                    "postedon"=>$d[0]['postedon'],
                    "visitors"=>$d[0]['visitors'],
                    "isactive"=>$d[0]['isactive'],
                    "isdelete"=>$d[0]['isdelete'],
                    "postedby"=>$d[0]['postedby'],
                    "adtype"=>"0",
                    "stateid"=>$d[0]['stateid'],
                    
                    "countryid"=>$d[0]['countryid'],
                    "distcid"=>$d[0]['distcid'],
                    "ispublish"=>$d[0]['ispublish'],
                    "expiredon"=>$d[0]['expiredon'],
                    "filepath1"=>$d[0]['filepath1'],
                    "filepath2"=>$d[0]['filepath2'],
                    "ispaid"=>$d[0]['ispaid'],
                    "location"=>$d[0]['location'],
                    "amount"=>$d[0]['amount'],
                    "isdeleted"=>"1",
                    "deletedon"=>date("Y-m-d H:i:s"),
                    "pposted"=>$d[0]['pposted']));
                    $mysql->execute("delete from _jpostads  where postadid='".$k."'");
                              }
           
            }
              $mysql->execute("delete from _jpostads  where postadid='".$k."'");
        }
    }
 }
 
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
     <?php
         if (sizeof($totalads)>0) {
     ?>                        
<input type="submit" name="deleted" value="Delete Selected Ads">
<?php } ?>
                        <br>
                            <?php
                    if (sizeof($totalads)>0) {
                        echo sizeof($totalads) . " ads found";
                    }
                ?>      
                        </form>
                            <div class="table-responsive">
                                 <?php 
                                 /*   $obj = new CommonController();  
                                            if (!($obj->isLogin())){
                                                echo $obj->printError("Login Session Expired. Please Login Again");
                                                exit;
                                            }   */
                                    
                                    echo "<table  cellspacing='0' cellspadding='5' style='font-size:13px;font-family:arial;color:#222;width:100%'>";
                                   
                                  
                                   // foreach (JPostads::getPostads(0," order by postadid desc limit 0,50") as $r)
                                    foreach ($totalads as $r)
                                    {   
                                 ?>
                                     <tr class='mytr'>
                                        <td>
                    <input type="checkbox" name="IDS[<?php echo  $r["postadid"];?>]">
                </td>
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
                    <a href="https://klx.co.in/klxadmin/dashboard.php?action=postad/edit&rowid=<?php echo  $r["postadid"];?>">Edit</a>&nbsp;
                    <a href="https://klx.co.in/klxadmin/dashboard.php?action=postad/view&rowid=<?php echo  $r["postadid"];?>&btn=viewbtn">View</a>
                   <!-- <a href="managepostads.php?rowid=<?php echo  $r["postadid"];?>&btn=deletebtn">Delete</a>
                    <form action='managepostads.php' method='post' style='height:0px;'>
                        <input type='hidden' value='<?php echo $r["postadid"];?>' name='rowid' id='rowid' >
                        <input style='font-size:11px;' type='submit' name='editbtn' value='Edit'>
                        <input style='font-size:11px;' type='submit' name='viewbtn' value='View'>
                        <input style='font-size:11px;' type='submit' name='deletebtn' value='Delete'>
                    </form>-->
                 </td>
                                        </tr>                                                     
                                          <tr>
                                            <td colspan='3'><hr style='border:none;border-bottom:1px solid #f1f1f1'></td>
                                          </tr>
                                              <?php       
                                              }
                                         echo"</table>"                                          
                                    ?>
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


