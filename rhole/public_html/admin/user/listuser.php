<div class="main-panel">
    <div class="container">
        <div class="page-inner">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" style="padding-top:10px;padding-bottom:10px">
                            <div class="card-title">
                                <div class="form-group row">
                                    <div class="col-sm-6">
                                        List of Users
                                    </div>
                                    <div class="col-sm-6" style="text-align:right;padding-top:5px;color:skyblue;">
                                        <a href="<?php echo AppUrl;?>/admin/dashboard.php?action=user/listuser&f=a"><?php if($_GET['f']=="a") { ?><small style="font-weight:bold;text-decoration:underline;"><?php } else{ ?><small><?php } ?>All</small></a>&nbsp;|&nbsp;
                                        <a href="<?php echo AppUrl;?>/admin/dashboard.php?action=user/listuser&f=Verified"><?php if($_GET['f']=="Verified") { ?><small style="font-weight:bold;text-decoration:underline;"><?php } else{ ?><small><?php } ?>Verified</small></a>&nbsp;|&nbsp;
                                        <a href="<?php echo AppUrl;?>/admin/dashboard.php?action=user/listuser&f=Nonverified"><?php if($_GET['f']=="Nonverified") { ?><small style="font-weight:bold;text-decoration:underline;"><?php } else{ ?><small><?php } ?>Non-Verified</small></a>&nbsp;|&nbsp;
                                        <a href="<?php echo AppUrl;?>/admin/dashboard.php?action=user/listuser&f=AdPosted"><?php if($_GET['f']=="AdPosted") { ?><small style="font-weight:bold;text-decoration:underline;"><?php } else{ ?><small><?php } ?>Ad Posted</small></a>&nbsp;|&nbsp;
                                    </div> 
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                 <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>User ID</th>    
                                            <th>Person Name</th>    
                                            <th>Email Address</th>    
                                            <th>Mobile Number</th>    
                                            <th>Posted On</th>    
                                            <th></th>    
                                        </tr>
                                    </thead>  
                                    <tbody>
                                        <?php     
                                            if($_GET['f']=="a"){
                                                $sql = JUsertable::getUser();   
                                            }if($_GET['f']=="Verified"){
                                                $sql = JUsertable::getVerifiedUser();
                                            }if($_GET['f']=="Nonverified"){
                                                $sql = JUsertable::getNonVerifiedUser();
                                            }if($_GET['f']=="AdPosted"){    
                                                $sql = $mysql->select("SELECT postedby FROM _jpostads WHERE postedby>0 GROUP BY postedby");
                                            }   
                                        ?>
                                        <?php foreach($sql as $r){ ?>
                                        <?php $user = $mysql->select("select * from _jusertable where userid='".$r['postedby']."'");  ?>
                                            <?php if($_GET['f']=="AdPosted"){?>
                                            <tr>                                                                         
                                            <td><?php echo $user[0]["userid"];?></td>
                                            <td><?php echo $user[0]["personname"];?></td>
                                            <td><?php echo $user[0]["email"];?></td> 
                                            <td><table><tr><td><?php if($user[0]['ismobileverified']=="1"){?><span style="color: green"><i class="fas fa-check"></i></span><?php  }?></td><td><?php echo $user[0]["mobile"];?></td></tr></table></td> 
                                            <td><?php echo $user[0]["createdon"];?></td>
                                            <td>
                                                <div class="dropdown dropdown-kanban" style="float: right;">
                                                    <button class="" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border:none;font-size:14px;background:none !important;padding-right:0px;margin-right:0px;cursor:pointer">
                                                        <i class="icon-options-vertical"></i>
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <a class="dropdown-item" href="<?php echo AppUrl;?>/admin/dashboard.php?action=user/Edit&d=<?php echo $user[0]['userid'];?>" draggable="false">Edit</a>
                                                        <a class="dropdown-item" href="<?php echo AppUrl;?>/admin/dashboard.php?action=user/View&d=<?php echo $user[0]['userid'];?>" draggable="false">View</a>
                                                        <a class="dropdown-item" href="<?php echo AppUrl;?>/admin/dashboard.php?action=user/PostedAds&d=<?php echo $user[0]['userid'];?>" draggable="false">Posted Ads</a>
                                                        <a class="dropdown-item" href="<?php echo AppUrl;?>/admin/dashboard.php?action=user/Payments&d=<?php echo $user[0]['userid'];?>" draggable="false">Payments</a>
                                                        <a class="dropdown-item" href="<?php echo AppUrl;?>/admin/dashboard.php?action=upgradepackage/add&d=<?php echo $user[0]['userid'];?>" draggable="false">Add Package</a>
                                                        <a class="dropdown-item" href="<?php echo AppUrl;?>/admin/dashboard.php?action=user/subscribedpackages&f=a&d=<?php echo $user[0]['userid'];?>" draggable="false">Subscribed Packages</a>
                                                        <a class="dropdown-item" href="<?php echo AppUrl;?>/admin/dashboard.php?action=user/smslog&d=<?php echo $user[0]['userid'];?>" draggable="false">Sms Log</a>
                                                        <a class="dropdown-item" href="<?php echo AppUrl;?>/admin/dashboard.php?action=user/emaillog&d=<?php echo $user[0]['userid'];?>" draggable="false">Email Log</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php } else { ?>
                                        <tr>                                                                                                                                                                           
                                            <td><?php echo $r["userid"];?></td>
                                            <td><?php echo $r["personname"];?></td>
                                            <td><?php echo $r["email"];?></td> 
                                            <td><table><tr><td><?php if($r['ismobileverified']=="1"){?><span style="color: green"><i class="fas fa-check"></i></span><?php  }?></td><td><?php echo $r["mobile"];?></td></tr></table></td> 
                                            <td><?php echo $r["createdon"];?></td>
                                            <td>
                                                <div class="dropdown dropdown-kanban" style="float: right;">
                                                    <button class="" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border:none;font-size:14px;background:none !important;padding-right:0px;margin-right:0px;cursor:pointer">
                                                        <i class="icon-options-vertical"></i>
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        <a class="dropdown-item" href="<?php echo AppUrl;?>/admin/dashboard.php?action=user/Edit&d=<?php echo $r['userid'];?>" draggable="false">Edit</a>
                                                        <a class="dropdown-item" href="<?php echo AppUrl;?>/admin/dashboard.php?action=user/View&d=<?php echo $r['userid'];?>" draggable="false">View</a>
                                                        <a class="dropdown-item" href="<?php echo AppUrl;?>/admin/dashboard.php?action=user/PostedAds&d=<?php echo $r['userid'];?>" draggable="false">Posted Ads</a>
                                                        <a class="dropdown-item" href="<?php echo AppUrl;?>/admin/dashboard.php?action=user/Payments&d=<?php echo $r['userid'];?>" draggable="false">Payments</a>
                                                        <a class="dropdown-item" href="<?php echo AppUrl;?>/admin/dashboard.php?action=upgradepackage/add&d=<?php echo $r['userid'];?>" draggable="false">Add Package</a>
                                                        <a class="dropdown-item" href="<?php echo AppUrl;?>/admin/dashboard.php?action=user/subscribedpackages&f=a&d=<?php echo $r['userid'];?>" draggable="false">Subscribed Packages</a>
                                                        <a class="dropdown-item" href="<?php echo AppUrl;?>/admin/dashboard.php?action=user/smslog&d=<?php echo $r['userid'];?>" draggable="false">Sms Log</a>
                                                        <a class="dropdown-item" href="<?php echo AppUrl;?>/admin/dashboard.php?action=user/emaillog&d=<?php echo $r['userid'];?>" draggable="false">Email Log</a>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                        <?php } ?>
                                    </tbody> 
                                 </table>
                            </div>
                            <?php for($i=1;$i<=intval($rows/$rsperpage);$i++) {?>
                                <a href="<?php echo AppUrl;?>/admin/dashboard.php?action=postad/todaypostads&view=<?php echo $i;?>"><?php echo $i;?></a>
                            <?php } ?>
                        </div>
                    </div>                                                                                             
                </div>
            </div>
        </div>
    </div>
</div>

