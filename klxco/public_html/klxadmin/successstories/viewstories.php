
<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" style="padding-top:10px;padding-bottom:10px">
                            <div class="card-title">
                                List of Stories
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                 <table class="table table-bordered">
                                 <?php 
                                    $obj = new CommonController();
    
                                     /*/   if (!($obj->isLogin())){
                                            echo $obj->printError("Login Session Expired. Please Login Again");
                                            exit;
                                        }     */

                                   
                                    foreach (JSuccessStory::getStory(0," storyid>0 order by storyid desc") as $r)
                                    {
                                 ?>
                                        <tr class='mytr'>
                                             <td style='padding:5px;width:70px'>
                                                    <img src="../../assets/<?php echo $config['thumb'].$r["filepath"];?>"  style="height:70px;width:70px;"></img>
                                             </td>
                                            <td style="vertical-align: top;padding:10px;">
                                                <b><?php echo $r["storytitle"]?></b>:
                                                <br><span style='color:#555'><?php echo strip_tags(substr(strip_tags($r["storydesc"]),0,300));?>... </span>
                                                <div style="padding:3px;padding-left:0px;">
                                                Posted On: <span style="color:#444;font-weight:bold;"><?php echo $r["postedon"]; ?></span>&nbsp;&nbsp;
                                                Last Modified: <span style="color:#444;font-weight:bold;"><?php echo $r["lastmodified"];?></span>&nbsp;&nbsp;
                                                Status: 
                                                <?php if ($r["ispublish"]) {?>
                                                    <span style='color:#08912A;font-weight:bold;'>Published</span> 
                                                <?php } else { ?>
                                                    <span style='color:#FF090D;font-weight:bold;'>Un Published</span> 
                                                <?php } ?>
                                                </div>
                                            </td>
                                            <td width='160' style='text-align:center;'>
                                                <form action='https://klx.co.in/klxadmin/dashboard.php?action=successstories/managestories.php' method='post' style='height:0px;'>
                                                    <input type='hidden' value='<?php echo $r["storyid"];?>' name='rowid' id='rowid' >
                                                    <input style='font-size:11px;' type='submit' name='editbtn' value='Edit'>
                                                    <input style='font-size:11px;' type='submit' name='viewbtn' value='View'>
                                                    <input style='font-size:11px;' type='submit' name='deletebtn' value='Delete'>
                                                </form>
                                            </td>
                                      </tr>
                                      <tr>
                                        <td colspan='2'><hr style='border:none;border-bottom:1px solid #f1f1f1'></td>
                                      </tr>
                                        <?php } ?>
                                 </table>
                            </div>
                        </div>
                    </div>                                                                                             
                </div>
            </div>
        </div>
    </div>
</div>

