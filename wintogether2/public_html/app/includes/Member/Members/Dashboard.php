<style>
.form-control{display: block;width: 100%;padding: .375rem .75rem;font-size: 1rem;line-height: 1.5;color: #495057;background-color: #fff;background-clip: padding-box;border: 1px solid #ced4da;border-radius: .25rem;transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;} 
#btnLogin[type="submit"] {background: #E91E63;border: 0;border-radius: 3px;padding: 10px 30px;color: #fff;transition: 0.4s;cursor: pointer;}                                         
#btnLogin[type="submit"]:hover {background: #081e5b;}
.errorstring{color:red;font-size:11px;}
.container_c ul{list-style: none;margin: 0;  padding: 0;    overflow: auto;}
.container_c ul li{color: #333;display: block;position: relative;float: left;height: 80px;}
.container_c ul li input[type=radio]{position: absolute;visibility: hidden;}
.container_c ul li label{display: block;position: relative;font-weight: 300;font-size: 1.35em;padding: 16px 25px 25px 80px;margin: 10px auto;height: 30px;z-index: 9;cursor: pointer;-webkit-transition: all 0.25s linear;font-weight:bold;}
.container_c ul li:hover label{color: #666;}
.container_c ul li .check{display: block;position: absolute;border: 5px solid #AAAAAA;border-radius: 100%;height: 25px;width: 25px;top: 30px; left: 20px;z-index: 5;transition: border .25s linear;-webkit-transition: border .25s linear;}
.container_c ul li:hover .check {border: 5px solid #8db8ef;}
.container_c ul li .check::before {display: block;position: absolute;content: '';border-radius: 100%;height:9px;width:9px;top: 3px;left: 3px;margin: auto;transition: background 0.25s linear;-webkit-transition: background 0.25s linear;}
input[type=radio]:checked ~ .check {border: 5px solid #1269db;}
input[type=radio]:checked ~ .check::before{background: #1269db;}
input[type=radio]:checked ~ label{color:#1269db;}
.download{color:#333;}
.download:hover{color:#1269db;}
</style>
<script>
function DoNext() {
    var radioValue = $("input[name='selector']:checked").val();
    if(radioValue==1){
        location.href="dashboard.php?action=Members/CreateMember";
    }
    if(radioValue==2){
        location.href="dashboard.php?action=Members/CreateMember&s=1";
    }
}
</script>
<div style="padding:25px">
    <div class="page-header">
        <ul class="breadcrumbs" style="border: none;padding-left: 0px;margin-left: 0px;">
            <li class="nav-home"><a href="dashboard.php"><i class="flaticon-home"></i></a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Members/CreateMember">Members</a></li>
            <li class="separator"><i class="flaticon-right-arrow"></i></li>
            <li class="nav-item"><a href="dashboard.php?action=Members/CreateMember">Create Member</a></li>
        </ul>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <div class="card-title">Create Member</div>
                </div>
                <div class="card-body">
                    <div class="form-group row"> 
                        <div class="col-sm-2"></div>
                        <div class="col-sm-8" style="margin-top: 5%;">
                            <div class="container" style="padding-bottom: 35px;"> 
                                <div class="container_c">
                                    <ul>
                                        <li>
                                            <input type="radio" checked="checked" value="1" id="f-option" name="selector">
                                            <label for="f-option" style="font-size: 20px !important;line-height: 22px;padding-top: 18px;">Direct Downline<br>
                                            <span style="color:#666;font-size:14px;font-weight:normal">I want to create member to my direct downline</span>
                                            </label>
                                            <div class="check"></div>
                                        </li>
                                        <li>
                                            <input type="radio" id="f-option1" value="2" name="selector">
                                            <label for="f-option1" style="font-size: 20px !important;line-height: 22px;padding-top: 18px;">Using SponsorID<br>
                                            <span style="color:#666;font-size:14px;font-weight:normal">I want to create member to under specified Sponsor ID</span>
                                            </label>
                                            <div class="check"></div>
                                        </li>
                                    </ul>
                                </div>
                                <br><br>
                                <div class="form-group row">
                                    <div class="col-sm-12">
                                        <button type="button" class="btn btn-primary" onclick="DoNext()" id="btnLogin" name="btnRegister">Continue</button>
                                    </div>
                                </div>
                            </div>                                                                                                                         
                        </div>
                        <div class="col-sm-2"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>