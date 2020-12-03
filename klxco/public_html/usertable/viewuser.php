
<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" style="padding-top:10px;padding-bottom:10px">
                            <div class="card-title">
                                List of Users
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                 <table>
                                        <?php  $obj = new CommonController();  
                                        foreach (JUsertable::getUser() as $r)
                                        {                ?>
                                        <tr class='mytr'>
            <td style='padding:5px'>
                <b>Person Name:<?php echo $r["personname"];?></b><br>
                <br>Email:<b><?php echo $r["email"];?></b> &nbsp;&nbsp;
                Password:<b><?php echo $r["pwd"];?></b>   
                <br><div style="padding:3px;padding-left:0px;">
                Created On: <span style="color:#444;font-weight:bold;"><?php echo $r["createdon"]; ?></span>&nbsp;&nbsp;
                Status: 
                <?php if ($r["isactive"]) {?>
                    <span style='color:#08912A;font-weight:bold;'>Active</span> 
                <?php } else { ?>
                    <span style='color:#FF090D;font-weight:bold;'>In Active</span> 
                <?php } ?>
                </div>
            </td>
            <td width='160' style='text-align:center;'>
                <form action='https://klx.co.in/klxadmin/dashboard.php?action=usertable/manageuser' method='post' style='height:0px;'>
                    <input type='hidden' value='<?php echo $r["userid"];?>' name='rowid' id='rowid' >
                    <input style='font-size:11px;' type='submit' name='editbtn' value='Edit'>
                    <input style='font-size:11px;' type='submit' name='viewbtn' value='View'>
                </form>
            </td>
          </tr>
          <tr>
            <td colspan='2'><hr style='border:none;border-bottom:1px solid #f1f1f1'></td>
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

 