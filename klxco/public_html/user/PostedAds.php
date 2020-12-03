<?php 
  $obj = new CommonController();
      
         
$user = new JUsertable();
$pageContent = $user->getUser($_GET['d']);
?>
<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" style="padding-top:10px;padding-bottom:10px">
                            <div class="card-title">
                                Posted Ads
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="form-group row">
                                <label for="Name" class="col-md-3 text-right">Person Name</label>
                                <div class="col-md-3"><?php echo $pageContent[0]['personname'];?></div>
                            </div>
                            <div class="form-group row">
                                <label for="Name" class="col-md-3 text-right">Email Address</label>
                                <div class="col-md-3"><?php echo $pageContent[0]['email'];?></div>
                            </div>
                            <div class="form-group row">
                                <label for="Name" class="col-md-3 text-right">Mobile Number</label>
                                <div class="col-md-3"><?php echo $pageContent[0]['mobile'];?></div>
                            </div>
                            <br><br>
                            <h4>Posted Ads</h4>
                            <div class="table-responsive">
                                <table id="myTable" class="table table-striped">
                                    <tbody>
                                    <?php
                                        $sql= " order by `postadid` desc limit 0,5";
                                        $totalads =        JPostads::getPostads($pageContent[0]['userid'],$sql);
                                        foreach ($totalads as $r){ 
                                       ?>
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
                                                <a href="https://klx.co.in/klxadmin/dashboard.php?action=postad/managepostads&rowid=<?php echo  $r["postadid"];?>&btn=editbtn">Edit</a>&nbsp;
                                                <a href="https://klx.co.in/klxadmin/dashboard.php?action=postad/managepostads&rowid=<?php echo  $r["postadid"];?>&btn=viewbtn">View</a>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                     <?php if(sizeof($totalads)==0) { ?>
                                          <tr><td>No Ads Found</td></tr>  
                                            
                                       <?php }   ?>
                                    </tbody>
                                </table>                                                
                            </div>
                        </div>
                        <div class="card-action">
                            <div class="row">
                                <div class="col-md-12">
                                    <button type="button" class="btn btn-warning" name="cancelbtn"  onclick="location.href='https://klx.co.in/klxadmin/dashboard.php?action=user/listuser&f=a'">Cancel</button>
                                </div>                                        
                            </div>
                        </div>
                    </div>                                                                                             
                </div>
            </div>
        </div>
    </div>
</div>

