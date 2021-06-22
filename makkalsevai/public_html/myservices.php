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
                   
                   
 
        <div class="row">
            <div class="col-xl-8 col-lg-8">

                <!-- Section Headline -->
                <div class="section-headline margin-top-20 margin-bottom-15">
                    <h4>My Requested Service</h4>
                </div>
                
                <?php
                            $services = $mysql->select("select * from _tbl_servicerequests where CustomerID='".$_SESSION['User']['CustomerID']."' order by ServiceRequestID");
                   foreach($services as $service)  {
                ?>
                
                <div class="blog-post">
                    <div class="blog-post-content" style="padding:10px">
                        <h3 style="font-size:15px"><?php echo $service['ServiceTitle'];?></h3>
                        <p style="font-size:12px;line-height:15px;">Requested on: <?php echo $service['RequestedOn'];?></p>
                    </div>
                </div>
                
                <?php } ?>     

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



<?php foreach($services as $service)  { ?>
<div id="small-dialog-<?php echo $service['ServiceID'];?>" class="zoom-anim-dialog mfp-hide dialog-with-tabs">
    <div class="sign-in-form">
        <div class="popup-tabs-container">
            <div class="popup-tab-content" id="tab">
                <div class="welcome-text">
                    <h3 style="font-size:14px">நீங்கள் <br><b style="color:orange"><?php echo $service['ServiceTitle'];?></b>  -சேவையை    தேர்வு செய்துள்ளீர்கள்</h3>
                </div>
                <form method="post" action="">
                   <input type="hidden" value="<?php echo $service['ServiceID'];?>" name="ServiceID">
                   <button class="button margin-top-35 full-width button-sliding-icon ripple-effect" type="submit"  name="BtnSubmitRequest">உறுதி செய்  <i class="icon-material-outline-arrow-right-alt"></i></button>
                </form>
            </div>
        </div>
    </div>
</div>

<?php } ?>



<?php include_once("footer.php");?>