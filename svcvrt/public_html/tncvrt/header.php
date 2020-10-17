<?php include_once("config.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
 <style>
  .linkactive{color:red  !important;cursor:pointer;background:#5983e8;}
  .linkactive:hover{background:#5983e8;color:#333}
  .linkactive a{color:#fff !important;font-weight: bold;} 
 </style>
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#"></a>
    </div>
    <ul class="nav navbar-nav">
      <li class="navbarlink <?php // echo ($page=="UploadCertificate") ? 'linkactive':'';?>">   
        <a href="uploadcertificate.php"><span>Upload Certificate</span></a>
      </li>
      <li class="navbarlink <?php// echo ($page=="ViewCertificates") ? 'linkactive':'';?>">   
        <a href="viewcertificates.php"><span>View Certificates</span></a>
      </li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
    </ul>
  </div>
</nav>