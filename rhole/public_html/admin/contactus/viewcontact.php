
<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" style="padding-top:10px;padding-bottom:10px">
                            <div class="card-title">
                                View Contact
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                 <table class="table table-bordered">
                                        <tr>
                                            <td class="mytdhead" style="width:200px">Name</td>
                                            <td class="mytdhead" style="width:180px">Mobile Number</td>
                                            <td class="mytdhead" style="width:210px">Email Address</td>
                                            <td class="mytdhead" style="width:180px">Subject</td>
                                            <td class="mytdhead" style="width:110px">Posted On</td>
                                            <td class="mytdhead">&nbsp;</td>
                                        </tr>
                                        <?php  $obj = new CommonController();  
                                        foreach(JContactus::getContactus() as $r)
                                        {                ?>
                                        <tr>
                                            <td class="mytd"><?php echo $r["personname"];?></td> 
                                               <td class="mytd"><?php echo $r["contmob"];?></td>
                                               <td class="mytd"><?php echo $r["contemail"];?></td>
                                               <td class="mytd"><?php echo $r["subject"];?></td>  
                                               <td class="mytd"><?php echo $r["postedon"];?></td>
                                               <td class="mytd"><form action='<?php echo AppUrl;?>/admin/dashboard.php?action=contactus/managecontact' method='post'>
                                                <input type='hidden' value='<?php echo $r["contid"]?>' name='rowid' id='rowid'>
                                                <input style='font-size:11px;' type='submit' name='viewbtn' value='View'> 
                                                <input style='font-size:11px;' type='submit' name='deletebtn' value='Delete'></form>
                                               </td>
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

