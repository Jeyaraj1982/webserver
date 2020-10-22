<?php include_once("header.php");?>
<?php $page="UploadCertificate"; ?>
<?php $Certificate =$mysql->select("select * from `_tbl_upload_certificates` where `StudentID`='".$_GET['id']."'"); ?>
<div class="col-sm-8">
<h4>View Certificate</h4>
  <div class="form-group row">
    <div class="col-sm-2">Register No</div>
    <div class="col-sm-9"><?php echo $Certificate[0]['RegisterNumbeer'];?></div>
  </div>
  <div class="form-group row">
    <div class="col-sm-2">Name</div>
    <div class="col-sm-9"><?php echo $Certificate[0]['Name'];?></div>
  </div>
  <div class="form-group row">
    <div class="col-sm-2">Date of Birth</div>
    <div class="col-sm-9"><?php echo $Certificate[0]['DateOfBirth'];?></div>
  </div>
  <div class="form-group row">
    <div class="col-sm-2">File</div>
    <div class="col-sm-9"><a target="_blank" href="uploads/<?php echo $Certificate[0]['FileName'];?>">Click To Download</a></div>
  </div>
 </div>
 