
<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" style="padding-top:10px;padding-bottom:10px">
                            <div class="card-title">
                               View Subscriber
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                 <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <td class="mytdhead" style="width:200px">Subscriber Name</td>
                                            <td class="mytdhead" style="width:180px">Subscriber Mobile Number</td>
                                            <td class="mytdhead" style="width:210px">Subscriber Email Address</td>
                                            <td class="mytdhead" style="width:180px">Others</td>
                                            <td class="mytdhead" style="width:110px">Posted On</td>
                                            <td class="mytdhead">&nbsp;</td>  
                                        </tr>
                                    </thead>  
                                    <tbody>
                                        <?php $obj = new CommonController();   foreach(JSubscriber::getSubscriber() as $r) { ?>
                                        <tr>
                                           <td class="mytd"><?php echo $r["subscribname"];?></td> 
                                               <td class="mytd"><?php echo $r["subscribmob"];?></td>
                                               <td class="mytd"><?php echo $r["subscribemail"];?></td>
                                               <td class="mytd"><?php echo $r["others"];?></td>  
                                               <td class="mytd"><?php echo $r["postedon"];?></td>
                                               <td class="mytd"><form action='<?php echo AppUrl;?>/admin/dashboard.php?action=subscribers/managesubscriber' method='post'>
                                                <input type='hidden' value='<?php echo $r["subscribid"]?>' name='rowid' id='rowid'>
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

