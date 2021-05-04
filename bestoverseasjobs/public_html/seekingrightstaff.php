<?php include_once("header.php"); ?>

 <section class="ls about s-pt-25">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-lg-6" data-animation="slideInLeft">
                            <div class="heading-about" style="margin-top:0px">
                                
                                <h4>
                                    <font color="#0e691a">Seeking wright Staff?</font>
                                </h4>
                                 
                                <?php
                                    if (isset($_POST['submitBtn'])) {
                                        $mysql->insert("_tbl_seeking_staffs",array("EmployerName"=>$_POST['EmployerName'],
                                                                                   "Email"=>$_POST['Email'],
                                                                                   "RequiredPosition"=>$_POST['RequiredPosition'],
                                                                                   "RequiredNumbers"=>$_POST['RequiredNumbers'],
                                                                                   "Message"=>$_POST['Message'],
                                                                                   "SubmittedOn"=>date("Y-m-d H:i:s")));
                                        ?>
                                        <div style="padding:10px;color:green;font-weight:bold;margin-bottom:50px">
                                            Your request has been submitted.
                                        </div>
                                        <?php
                                        unset($_POST);
                                    }
                                ?>
                                <form action="" method="post">
                                 <div class="form-group">
                                    <label for="email">Employer Name:</label>
                                    <input type="text" class="form-control" name="EmployerName">
                                 </div>
                                 <div class="form-group">
                                    <label for="email">Email:</label>
                                    <input type="text" class="form-control" name="Email">
                                 </div>
                                 <div class="form-group">
                                    <label for="email">Required Position:</label>
                                    <input type="text" class="form-control" name="RequiredPosition">
                                 </div>
                                 <div class="form-group">
                                    <label for="email">Required Numbers:</label>
                                    <input type="text" class="form-control" name="RequiredNumbers">
                                 </div>
                                 <div class="form-group">
                                    <label for="email">Message:</label>
                                    <textarea cols="" rows="" name="Message"></textarea>
                                 </div>
                                 <div class="form-group">
                                    <button type="submit" name="submitBtn" class="btn btn-default">Submit</button>
                                 </div>
                                </form> 
                                <br><bR><Br>                       
                            </div>
                            
                        </div>
                        
                    </div>
                </div>
            </section>
<?php include_once("footer.php"); ?>