<?php include_once("header.php"); ?>
 <section class="ls about s-pt-25">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-lg-6" data-animation="slideInLeft">
                            <div class="heading-about" style="margin-top:0px">
                                
                                <h4>
                                    <font color="#0e691a">Looking for jobs?</font>
                                </h4>
                                 
                                <?php
                                    if (isset($_POST['submitBtn'])) {
                                        $file="";
                                             $target_dir = "uploads/";
                $file =  time()."_".$_FILES["uploadimage1"]["name"];
                $target_file = $target_dir .$file;

              if (move_uploaded_file($_FILES["uploadimage1"]["tmp_name"], $target_file)) {
                                        $mysql->insert("_tbl_lookingfor_jobs",array("CandidateName"=>$_POST['CandidateName'],
                                                                                   "TelNumber"=>$_POST['TelNumber'],
                                                                                   "Email"=>$_POST['Email'],
                                                                                   "JobPosition1"=>$_POST['JobPosition1'],
                                                                                   "JobPosition2"=>$_POST['JobPosition2'],
                                                                                   "InterestedCountry1"=>$_POST['InterestedCountry1'],
                                                                                   "InterestedCountry2"=>$_POST['InterestedCountry2'],
                                                                                   "CVFile"=>$file,
                                                                                   "SubmittedOn"=>date("Y-m-d H:i:s")));
                                        ?>
                                        <div style="padding:10px;color:green;font-weight:bold;margin-bottom:50px">
                                            Your request has been submitted.
                                        </div>
                                        <?php
                                        unset($_POST);
              } else {
                  ?>
                    <div style="padding:10px;color:red;font-weight:bold;margin-bottom:50px">
                                           Bio Data Upload Error.Please Resubmit form.
                                        </div>
                  <?php
              }
                                    }
                                ?>
                                <form action="" method="post" enctype="multipart/form-data">
                                 <div class="form-group">
                                    <label for="email">Name:</label>
                                    <input type="text" class="form-control" name="CandidateName">
                                 </div>
                                  <div class="form-group">
                                    <label for="email">Tel Number:</label>
                                    <input type="text" class="form-control" name="TelNumber">
                                 </div>
                                 <div class="form-group">
                                    <label for="email">Email:</label>
                                    <input type="text" class="form-control" name="Email">
                                 </div>
                                 <div class="form-group">
                                    <label for="email">Job / Position 1:</label>
                                    <input type="text" class="form-control" name="JobPosition1">
                                 </div>
                                 <div class="form-group">
                                    <label for="email">Job / Position 2:</label>
                                    <input type="text" class="form-control" name="JobPosition2">
                                 </div>
                                  <div class="form-group">
                                    <label for="email">Interested Country 1:</label>
                                    <input type="text" class="form-control" name="InterestedCountry1">
                                 </div>
                                 <div class="form-group">
                                    <label for="email">Interested Country 2:</label>
                                    <input type="text" class="form-control" name="InterestedCountry2">
                                 </div>
                                 <div class="form-group">
                                    <label for="email">CV/Bio Data Upload:</label>
                                    <input type="file" class="form-control" name="uploadimage1">
                                 </div>
                                 <div class="form-group">
                                    <button type="submit" name="submitBtn" class="btn btn-default">Submit</button>
                                 </div>
                                </form>                        
                            </div>
                          <br><bR><Br>  
                        </div>
                        
                    </div>
                </div>
            </section>
<?php include_once("footer.php"); ?>