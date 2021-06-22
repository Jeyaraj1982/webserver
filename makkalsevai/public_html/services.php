<?php
    include_once("header.php");
?>     

<div class="container">
       <?php if (isset($_SESSION['User']['CustomerID']) && $_SESSION['User']['CustomerID']>0) {?>
       <div class="row">                                               
    <div class="col-12" style="padding-top:10px;padding-bottom: 10px;background: #fff7ca;">
                    Dear <b><?php echo $_SESSION['User']['CustomerName'];?></b>,
                    
                    &nbsp;&nbsp;
                    <span style="float:right">
                    <a href="myservices.php">My Requests</a>&nbsp;&nbsp;|&nbsp;&nbsp;
                    <a href="index.php?action=logout">Logout</a>
                    </span>
                    
       
        </div>
</div> 
                   <?php } ?>
                   
                   
                   <?php
                       if (isset($_POST['ServiceID'])) {
                           
                            $seviceString = "";
                            $serviceid = sizeof($_POST['ServiceID'])>1 ? "0" : $_POST['ServiceID'];
                           foreach($_POST['ServiceID'] as $k=>$v) {
                             $service = $mysql->select("select * from _tbl_services where ServiceID='".$k."'");  
                             $seviceString .= "<br>".$service[0]['ServiceTitle'];
                           }
                             
                             
                           $mysql->insert("_tbl_servicerequests",array("RequestedOn"=>date("Y-m-d H:i:s"),
                                                                       "ServiceID"=>$serviceid,
                                                                       "ServiceTitle"=>$seviceString,
                                                                       "CustomerID"=>$_SESSION['User']['CustomerID'],
                                                                       "CustomerName"=>$_SESSION['User']['CustomerName'],
                                                                       "CustomerMobileNumber"=>$_SESSION['User']['MobileNumber']));
                                
                            ?>
                            <div class="row">                                               
    <div class="col-12" style="padding-top:10px;padding-bottom: 10px;background:lime;">
                Your request has submitted, we will call back soon.
                    
                    
       
        </div>
</div>
                            <?php
                       }
                   ?>
        <div class="row">
            <div class="col-xl-8 col-lg-8">
           <form action="" method="post" id="myfrom" name="myfrom">
                <!-- Section Headline -->
                <div class="section-headline margin-top-20 margin-bottom-15">
                    <h4>Services</h4>
                </div>
                
                <?php
                            $services = $mysql->select("select * from _tbl_services where IsActive='1' order by ServiceOrder");
                   foreach($services as $service)  {
                ?>
                
                <div class="checkbox">
                <input type="checkbox" id="two-step-<?php echo $service['ServiceID'];?>" name="ServiceID[<?php echo $service['ServiceID'];?>]" value="" >
                <label for="two-step-<?php echo $service['ServiceID'];?>"><span class="checkbox-icon"></span> <?php echo $service['ServiceTitle'];?></label>
            </div>
               
                
             
                <?php } ?>     

             <br><br>   
               
                        <?php if (isset($_SESSION['User']['CustomerID']) && $_SESSION['User']['CustomerID']>0) { ?>
                            <a href="#small-dialog" class="apply-now-button popup-with-zoom-anim" style="font-size:12px;">சேவை தேவைப்படுகிறது<i class="icon-material-outline-arrow-right-alt"></i></a> 
                        <?php } else { ?>
                            <a href="#login-register" class="apply-now-button popup-with-zoom-anim"  style="font-size:12px;">சேவை தேவைப்படுகிறது<i class="icon-material-outline-arrow-right-alt"></i></a> 
                        <?php } ?>
             
              </form>    
            </div>

          
             

        </div>
    </div> 
    
    <div id="login-register" class="zoom-anim-dialog mfp-hide dialog-with-tabs">

    <!--Tabs -->
    <div class="sign-in-form">
        <div class="popup-tabs-container">
            <div class="popup-tab-content" id="tab">
              <div class="welcome-text">
                    <h3> </h3>
                </div>
            
            <div class="popup-tab-content" id="tab">
               
                <button class="button margin-top-35 full-width button-sliding-icon ripple-effect" onclick="location.href='login.php'" type="button" form="apply-now-form">Login <i class="icon-material-outline-arrow-right-alt"></i></button>
                <button class="button margin-top-35 full-width button-sliding-icon ripple-effect"  onclick="location.href='register.php'" type="button" form="apply-now-form">Register <i class="icon-material-outline-arrow-right-alt"></i></button>

            </div>
            </div>
        </div>
    </div>
</div>


<div id="small-dialog" class="zoom-anim-dialog mfp-hide dialog-with-tabs">
    <div class="sign-in-form">
        <div class="popup-tabs-container">
            <div class="popup-tab-content" id="tab">
                <div class="welcome-text">
                   <!-- <h3 style="font-size:14px">நீங்கள் <br><b style="color:orange"><?php echo $service['ServiceTitle'];?></b>  -சேவையை    தேர்வு செய்துள்ளீர்கள்</h3>-->
                </div>
                
                   
                   <button class="button margin-top-35 full-width button-sliding-icon ripple-effect" type="button" onclick="$('#myfrom').submit()"  name="BtnSubmitRequest">உறுதி செய்  <i class="icon-material-outline-arrow-right-alt"></i></button>
                
            </div>
        </div>
    </div>
</div>

           


<?php include_once("footer.php");?>