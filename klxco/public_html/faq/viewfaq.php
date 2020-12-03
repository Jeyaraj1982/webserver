
<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" style="padding-top:10px;padding-bottom:10px">
                            <div class="card-title">
                                List of FAQs
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                 <table class="table table-bordered">
                                        <?php  $obj = new CommonController();  
                                             /*   if (!($obj->isLogin())){
                                                    echo $obj->printError("Login Session Expired. Please Login Again");
                                                    exit;
                                                }     */
                                     
                                         
                                        echo "<table  cellspacing='0' cellspadding='5' style='font-size:13px;font-family:Trebuchet MS;color:#222;width:100%'>";
                                       
                                        foreach (JFaq::getFaq() as $r)
                                        {                ?>
                                        <tr class='mytr'>
                                            <td style="vertical-align: top;padding:10px;">
                                                <b><?php echo $r["faqques"]?></b> 
                                                <br><span style='color:#555'><?php echo strip_tags(substr(strip_tags($r["faqans"]),0,300));?>... </span> 
                                                <div>
                                                    Posted On: <span style="color:#444;font-weight:bold;"><?php echo $r["postedon"]; ?></span>&nbsp;&nbsp; 
                                                    Status: <?php echo ($r["ispublished"])  ? "<span style='color:#08912A;font-weight:bold;'>Published</span>" : "<span style='color:#FF090D;font-weight:bold;'>Un Published</span>"; ?> &nbsp;&nbsp;
                                                </div>
                                        </td>
                                        <td width='160' style='text-align:center;'>
                                            <form action='https://klx.co.in/klxadmin/dashboard.php?action=faq/managefaq' method='post' style='height:0px;'>
                                                <input type='hidden' value='<?php echo $r["faqid"];?>' name='rowid' id='rowid' >
                                                <input style='font-size:11px;' type='submit' name='editbtn' value='Edit'>
                                                <input style='font-size:11px;' type='submit' name='viewbtn' value='View'>
                                                <input style='font-size:11px;' type='submit' name='deletebtn' value='Delete'>
                                            </form>
                                        </td>
                                      </tr>
                                      <tr>
                                        <td colspan='4'><hr style='border:none;border-bottom:1px solid #f1f1f1'></td>
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

