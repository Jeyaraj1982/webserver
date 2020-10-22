<?php include_once("header.php");?>
<?php $page="UploadCertificate"; ?>
<div class="col-sm-8">
<h4>Upload Certificate</h4>
<?php 
                if (isset($_POST['Upload'])) {
        
                    $target_dir = "uploads/";
                    $err=0;
                    $_POST['File']= "";
                    $acceptable = array('image/jpeg','image/jpg','image/png');
                    if(($_FILES['File']['size'] >= 5000000)) {
                     //   $err++;
                      //  echo "File must be less than 5 megabytes.";
                    }
                    
                    if((!in_array($_FILES['File']['type'], $acceptable)) && (!empty($_FILES["File"]["type"]))) {
                       // $err++;
                      //  echo "Invalid file type. Only JPG,PNG,JPEG types are accepted.";
                    }
                    
                    if (isset($_FILES["File"]["name"]) && strlen(trim($_FILES["File"]["name"]))>0 ) {
                        $Certificate = time().$_FILES["File"]["name"];
                        print_r($_FILES['file']['error']);
                        //if (!(move_uploaded_file($_FILES["File"]["tmp_name"], $target_dir . $Certificate))) {
                          //  $err++;
//                            echo "Sorry, there was an error uploading your file.";
                        //}
                    }
                    if ($err==0) {
                        $_POST['File']= $Certificate;
                          $dob = $_POST['year']."-".$_POST['month']."-".$_POST['date'];
                          $id=$mysql->insert("_tbl_upload_certificates",array("Name"            => $_POST['Name'],
                                                                              "RegisterNumber"  => $_POST['RegisterNumber'],
                                                                              "DateOfBirth"     => $dob,
                                                                              "FileName"        => $Certificate,   
                                                                              "AddedOn"         => date("Y-m-d H:i:s")));
                                                                   
                               unset($_POST);
                               echo $sql."success";
                    } 
                } 
            ?>
<form method="post" action="" enctype="multipart/form-data" >
  <div class="form-group row">
    <div class="col-sm-2">Name</div>
    <div class="col-sm-9"><input type="text" class="form-control" name="Name" id="Name"></div>
  </div>
  <div class="form-group row">
    <div class="col-sm-2">Reg No</div>
    <div class="col-sm-9"><input type="text" class="form-control" name="RegisterNumber" id="RegisterNumber"></div>
  </div>
  <div class="form-group row">
    <div class="col-sm-2">Date of Birth</div>
    <div class="col-sm-9">
        <div class="col-sm-4" style="max-width:80px !important;padding:0px !important;">
            <select class="selectpicker form-control" data-live-search="true" id="date" name="date" style="width:70px">
                <option value="0">Day</option>
                <?php for($i=1;$i<=31;$i++) {?>
                <option value="<?php echo $i; ?>" <?php echo ($_POST[ 'date']==$i) ? " selected='selected' " : "";?>><?php echo $i;?></option>
                <?php } ?>
            </select>
        </div>
        <div class="col-sm-4" style="max-width:105px !important;padding:0px !important;margin-right:6px;margin-left:6px;">        
            <select class="selectpicker form-control" data-live-search="true" id="month" name="month" style="width:80px">
                <option value="0">Month</option>
                <?php foreach($_Month as $key=>$value) {?>
                <option value="<?php echo $key+1; ?>" <?php echo ($_POST[ 'month']==$key+1) ? " selected='selected' " : "";?>><?php echo $value;?></option>
                <?php } ?>
            </select>
        </div>
        <div class="col-sm-4" style="max-width:120px !important;padding:0px !important;">
            <select class="selectpicker form-control" data-live-search="true" id="year" name="year" style="width:70px">
                <option value="0">Year</option>
                <?php for($i=$_DOB_Year_Start;$i>=$_DOB_Year_End;$i--) {?>
                <option value="<?php echo $i; ?>" <?php echo ($_POST['year']==$i) ? " selected='selected' " : "";?>><?php echo $i;?></option>                             
                <?php } ?>
            </select>
        </div>
    </div>
  </div>
  <div class="form-group row">
    <div class="col-sm-2">File</div>
    <div class="col-sm-9"><input type="file" name="File" id="File"></div>
  </div>
  <div class="form-group row">
    <div class="col-sm-12" style="text-align:center">
        <button class="btn btn-primary" class="form-control"  name="Upload" type="submit">Save</button>
    </div>
  </div>
</form>
</div>
</body>
</html>
