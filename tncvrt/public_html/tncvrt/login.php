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
<div class="form-group">
<div class="col-sm-3"></div>
<div class="col-sm-6">
<div style="margin-top: 200px;">
       <?php include_once("config.php"); ?>
                            <?php
                                if (isset($_POST['submitBtn'])) {
                                    if (LoginName==$_POST['emailAddress'] && LoginPassword==$_POST['loginPassword']) {
                                            echo "<script>location.href='dashboard.php'</script>";   
                                    }   else {
                                          echo "<span style='color:red;text-align:center'>login failed</span>";
                                        }   
                                }
                            ?>
      <h4 style="text-align:center;">Login</h4>
      <form method="post" action="">
          <div class="form-group row">
            <div class="col-sm-3">Email Address</div>
            <div class="col-sm-9"><input type="text" class="form-control" name= "emailAddress" id="emailAddress" required placeholder="Enter Your Email"></div>
          </div>
          <div class="form-group row">
            <div class="col-sm-3">Password</div>
            <div class="col-sm-9"><input type="password" class="form-control" name= "loginPassword" id="loginPassword" required placeholder="Enter Password"></div>
          </div>
          <div class="form-group row">
            <div class="col-sm-12" style="text-align:center">
                <button class="btn btn-primary" class="form-control"  name="submitBtn" type="submit">Sign In</button>
            </div>
          </div>
        </form>
</div>
<div class="col-sm-3"></div>
</body>
</html>