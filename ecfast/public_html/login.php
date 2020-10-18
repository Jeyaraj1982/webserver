<!DOCTYPE html>
<html>
<head>
    <title>Login </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="shortcut icon" href="img/logo1.ico"/>

    <link type="text/css" rel="stylesheet" href="css/components.css"/>
    <link type="text/css" rel="stylesheet" href="css/custom.css"/>
    <link type="text/css" rel="stylesheet" href="css/pages/login.css"/>
	
	<script src="https://use.fontawesome.com/6ca70c64ef.js"></script>
</head>
<body>
	<div class="container"><div class="row">  <div class="col-lg-12  col-md-12  " ><img src="images/logo.png">
        </div> </div> </div>
<div class="container wow fadeInDown">
    <div class="row">
        <div class="col-lg-7  col-md-6  col-sm-6 sms-image " style="margin: 3% 0;"><img src="images/1.png">
        </div>
		
		  <div class="col-lg-1 " >  </div>
		
		
		
		
        <div class="col-lg-4  col-md-6  col-sm-6  login_top_bottom">
            <div class="row">
                <div class="col-lg-12  col-md-12 col-sm-12">
                    <div class="login_logo login_border_radius1">
                        <h3 class="text-xs-center" style="color:#fff;padding-top:10px">
                             IMAX SMS <br/>
                                Log In</span>
                        </h3>
                    </div>
                    <div class="bg-white login_content login_border_radius">
                        <form action="index.html" id="login_validator" method="post" class="login_validator">
                            <div class="form-group">
                                <label for="email" class="form-control-label"> E-mail</label>
                                <div class="input-group">
                                    <span class="input-group-addon input_email"><i
                                            class="fa fa-envelope text-primary"></i></span>
                                    <input type="text" class="form-control  form-control-md" id="email" name="username" placeholder="Registered Email-ID">
                                </div>
                            </div>
                            <!--</h3>-->
                            <div class="form-group">
                                <label for="password" class="form-control-label">Password</label>
                                <div class="input-group">
                                    <span class="input-group-addon addon_password"><i
                                            class="fa fa-lock text-primary"></i></span>
                                    <input type="password" class="form-control form-control-md" id="password"   name="password" placeholder="Web Login Password">
                                </div>
                            </div>
							     <div class="form-group">
                                <label for="password" class="form-control-label">Role</label>
                                <div class="input-group">
                                    <select name="role" style="width:100%">
			        <option value="User">User</option>
			        <option value="Reseller">Reseller</option>
                 </select>
                                   
                                </div>
                            </div>
							
							 <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <input type="submit" value="Log In" class="btn btn-primary btn-block login_button">
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-xs-6">
                                    <label class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input form-control">
                                        <span class="custom-control-indicator"></span>
                                        <a class="custom-control-description">Keep me logged in</a>
                                    </label>
                                </div>
                                <div class="col-xs-6 text-xs-right forgot_pwd">
                                    <a href="forgot_password.html" class="custom-control-description forgottxt_clr">Forgot password?</a>
                                </div>
                            </div>
                        </div>
        
                        <div class="form-group">
                            <label class="form-control-label">Don't you have an Account? </label>
                            <a href='register.html'><b>Sign Up</b></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- global js -->


<script type="text/javascript" src="js/bootstrap.min.js"></script>


</body>

</html>