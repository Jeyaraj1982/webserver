<?php include_once("config.php");?>
<?php
    if (!(isset($_SESSION['User']['logged']) && $_SESSION['User']['logged']>0)) {
          echo "<script>alert('login session expired');location.href='index.php';</script>";
          exit;
    }
    
function DisplayErrorMessage($message) {
    $message = str_replace("'","\'",$message);
    $message = str_replace('"','\"',$message);
     $return ='
        <div class="row">
                <div class="col-12">
                <div class="card">
              <div class="alert alert-danger outline alert-dismissible fade show" role="alert" style="margin-bottom: 0px;">
                      <p style="white-space:normal !important;max-width:100%;"><b> Error found! </b> '.$message.'.</p>
                      <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    </div>
              </div>
              </div>';
        return $return;
    
}

function DisplaySuccessMessage($message) {
     $message = str_replace("'","\'",$message);
    $message = str_replace('"','\"',$message);
     $return = ' <div class="row">
                <div class="col-12">
                <div class="card">
              <div class="alert alert-success outline alert-dismissible fade show" role="alert" style="margin-bottom: 0px;">
                      <p style="white-space:normal !important;max-width:100%;"><b> Well done! </b> '.$message.'..</p>
                      <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    </div>
              </div>
              </div>';
                 return $return;
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="nexifysoftware.com">
    <link rel="icon" href="assets/images/favicon.png" type="image/x-icon">
    <link rel="shortcut icon" href="assets/images/favicon.png" type="image/x-icon">
    <title><?php echo SITE_TITLE;?></title>
    <script src="assets/js/jquery-3.5.1.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,500,500i,700,700i,900&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="assets/css/fontawesome.css">
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/icofont.css">
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/themify.css">
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/flag-icon.css">
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/feather-icon.css">
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/scrollbar.css">
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/animate.css">
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/chartist.css">
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/date-picker.css">
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/datatables.css">
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/date-picker.css">
    <!-- Plugins css Ends-->
    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/bootstrap.css">
    <!-- App css-->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link id="color" rel="stylesheet" href="assets/css/color-1.css" media="screen">
    <!-- Responsive css-->
    <link rel="stylesheet" type="text/css" href="assets/css/responsive.css">
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/jsgrid.css">
  </head>
  <body onload="startTime()">
    <!-- tap on top starts-->
    <div class="tap-top"><i data-feather="chevrons-up"></i></div>
    <!-- tap on tap ends-->
    <!-- page-wrapper Start-->
    <div class="page-wrapper compact-wrapper" id="pageWrapper">
      <!-- Page Header Start-->
      <div class="page-header">
        <div class="header-wrapper row m-0">
          <form class="form-inline search-full col" action="#" method="get">
            <div class="form-group w-100">
              <div class="Typeahead Typeahead--twitterUsers">
                <div class="u-posRelative">
                  <input class="demo-input Typeahead-input form-control-plaintext w-100" type="text" placeholder="Search Cuba .." name="q" title="" autofocus>
                  <div class="spinner-border Typeahead-spinner" role="status"><span class="sr-only">Loading...</span></div><i class="close-search" data-feather="x"></i>
                </div>
                <div class="Typeahead-menu"></div>
              </div>
            </div>
          </form>
          <div class="header-logo-wrapper col-auto p-0">
            <div class="logo-wrapper"><a href="dashboard.php"><img class="img-fluid" src="assets/images/logo/logo.png" alt=""></a></div>
            <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="align-center"></i></div>
          </div>
          <div class="left-header col horizontal-wrapper ps-0">
          <ul class="horizontal-menu">
               
              <li class="level-menu outside"><a class="nav-link" href="javascript:void(0)"><span>Case Data</span></a>
                <ul class="header-level-menu menu-to-be-close">
                  <li><a href="dashboard.php?action=Dashboard/CaseForm&redirect=AddHirings" data-original-title="" title=""><span>Add Hiring</span></a></li>
                  <li><a href="dashboard.php?action=Dashboard/CaseForm&redirect=AddDocuments" data-original-title="" title=""><span>Attach Document</span></a></li>
                  <li><a href="dashboard.php?action=Dashboard/CaseForm&redirect=AddNotes" data-original-title="" title=""><span>Add Notes</span></a></li>
                  <li><a href="dashboard.php?action=Dashboard/CaseForm&redirect=AddExpenses" data-original-title="" title=""><span>Add Expenses</span></a></li>
                  <li><a href="dashboard.php?action=Dashboard/CaseForm&redirect=AddPayments" data-original-title="" title=""><span>Add Recevied Payment</span></a></li>
                  <li><a href="dashboard.php?action=Dashboard/CaseForm&redirect=AddTimeSheet" data-original-title="" title=""><span>Add TimeSheet</span></a></li>
                </ul>
              </li>
            </ul>
          </div>
          
          <?php
        $profileImage = "assets/images/dashboard/profile.jpg";
                if ($_SESSION['User']['role']=="superadmin")  {
                         $DisplayName =  $_SESSION['User']['AdminName'];
                        $portal = "Super Admin Area";
                        $lastlogin = $mysql->select("select * from _tbl_logs_logins where AdminID='".$_SESSION['User']['AdminID']."' order by LoginID desc limit 0,2 ");
                    }
                    
                    if ($_SESSION['User']['role']=="advocate")  {
                         $DisplayName =  $_SESSION['User']['AdvocateName'];
                        $portal = "Advocate Area";
                        $lastlogin = $mysql->select("select * from _tbl_logs_logins where AdvocateID='".$_SESSION['User']['AdvocateID']."' order by LoginID desc limit 0,2 ");
                    }
                    
                    if ($_SESSION['User']['role']=="staff")  {
                        $DisplayName =  $_SESSION['User']['StaffName'];
                        $portal = "Staff Area";
                        if (strlen(trim($data[0]['ProfilePhoto']))>0) {
                            $profileImage = $data[0]['ProfilePhoto'];
                        } 
                       $lastlogin = $mysql->select("select * from _tbl_logs_logins where StaffID='".$_SESSION['User']['StaffID']."' order by LoginID desc limit 0,2 ");
                    }
          ?>
          <div class="nav-right col-8 pull-right right-header p-0">
            <ul class="nav-menus">
              <!--
             <li class="language-nav">
                <div class="translate_wrapper">
                  <div class="current_lang">
                    <div class="lang"><i class="flag-icon flag-icon-us"></i><span class="lang-txt">EN                               </span></div>
                  </div>
                  <div class="more_lang">
                    <div class="lang selected" data-value="en"><i class="flag-icon flag-icon-us"></i><span class="lang-txt">English<span> (US)</span></span></div>
                    <div class="lang" data-value="de"><i class="flag-icon flag-icon-de"></i><span class="lang-txt">Deutsch</span></div>
                    <div class="lang" data-value="es"><i class="flag-icon flag-icon-es"></i><span class="lang-txt">Español</span></div>
                    <div class="lang" data-value="fr"><i class="flag-icon flag-icon-fr"></i><span class="lang-txt">Français</span></div>
                    <div class="lang" data-value="pt"><i class="flag-icon flag-icon-pt"></i><span class="lang-txt">Português<span> (BR)</span></span></div>
                    <div class="lang" data-value="cn"><i class="flag-icon flag-icon-cn"></i><span class="lang-txt">简体中文</span></div>
                    <div class="lang" data-value="ae"><i class="flag-icon flag-icon-ae"></i><span class="lang-txt">لعربية <span> (ae)</span></span></div>
                  </div>
                </div>
              </li>
              -->
              <li><span class="header-search"><i data-feather="search"></i></span></li>
              <!--
              <li class="onhover-dropdown">
                <div class="notification-box"><i data-feather="bell"> </i><span class="badge rounded-pill badge-secondary">4                                </span></div>
                <ul class="notification-dropdown onhover-show-div">
                  <li><i data-feather="bell"></i>
                    <h6 class="f-18 mb-0">Notitications</h6>
                  </li>
                  <li>
                    <p><i class="fa fa-circle-o me-3 font-primary"> </i>Delivery processing <span class="pull-right">10 min.</span></p>
                  </li>
                  <li>
                    <p><i class="fa fa-circle-o me-3 font-success"></i>Order Complete<span class="pull-right">1 hr</span></p>
                  </li>
                  <li>
                    <p><i class="fa fa-circle-o me-3 font-info"></i>Tickets Generated<span class="pull-right">3 hr</span></p>
                  </li>
                  <li>
                    <p><i class="fa fa-circle-o me-3 font-danger"></i>Delivery Complete<span class="pull-right">6 hr</span></p>
                  </li>
                  <li><a class="btn btn-primary" href="#">Check all notification</a></li>
                </ul>
              </li>
             
              <li class="onhover-dropdown">
                <div class="notification-box"><i data-feather="star"></i></div>
                <div class="onhover-show-div bookmark-flip">
                  <div class="flip-card">
                    <div class="flip-card-inner">
                      <div class="front">
                        <ul class="droplet-dropdown bookmark-dropdown">
                          <li class="gradient-primary"><i data-feather="star"></i>
                            <h6 class="f-18 mb-0">Bookmark</h6>
                          </li>
                          <li>
                            <div class="row">
                              <div class="col-4 text-center"><i data-feather="file-text"></i></div>
                              <div class="col-4 text-center"><i data-feather="activity"></i></div>
                              <div class="col-4 text-center"><i data-feather="users"></i></div>
                              <div class="col-4 text-center"><i data-feather="clipboard"></i></div>
                              <div class="col-4 text-center"><i data-feather="anchor"></i></div>
                              <div class="col-4 text-center"><i data-feather="settings"></i></div>
                            </div>
                          </li>
                          <li class="text-center">
                            <button class="flip-btn" id="flip-btn">Add New Bookmark</button>
                          </li>
                        </ul>
                      </div>
                      <div class="back">
                        <ul>
                          <li>
                            <div class="droplet-dropdown bookmark-dropdown flip-back-content">
                              <input type="text" placeholder="search...">
                            </div>
                          </li>
                          <li>
                            <button class="d-block flip-back" id="flip-back">Back</button>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </li>
               -->
              <li>
                <div class="mode"><i class="fa fa-moon-o"></i></div>
              </li>
              <!--
              <li class="cart-nav onhover-dropdown">
                <div class="cart-box"><i data-feather="shopping-cart"></i><span class="badge rounded-pill badge-primary">2</span></div>
                <ul class="cart-dropdown onhover-show-div">
                  <li>
                    <h6 class="mb-0 f-20">Shoping Bag</h6><i data-feather="shopping-cart"></i>
                  </li>
                  <li class="mt-0">
                    <div class="media"><img class="img-fluid rounded-circle me-3 img-60" src="../assets/images/ecommerce/01.jpg" alt="">
                      <div class="media-body"><span>V-Neck Shawl Collar Woman's Solid T-Shirt</span>
                        <p>Yellow(#fcb102)</p>
                        <div class="qty-box">
                          <div class="input-group"><span class="input-group-prepend">
                              <button class="btn quantity-left-minus" type="button" data-type="minus" data-field=""><i data-feather="minus"></i></button></span>
                            <input class="form-control input-number" type="text" name="quantity" value="1"><span class="input-group-prepend">
                              <button class="btn quantity-right-plus" type="button" data-type="plus" data-field=""><i data-feather="plus"></i></button></span>
                          </div>
                        </div>
                        <h6 class="text-end text-muted">$299.00</h6>
                      </div>
                      <div class="close-circle"><a href="#"><i data-feather="x"></i></a></div>
                    </div>
                  </li>
                  <li class="mt-0">
                    <div class="media"><img class="img-fluid rounded-circle me-3 img-60" src="../assets/images/ecommerce/03.jpg" alt="">
                      <div class="media-body"><span>V-Neck Shawl Collar Woman's Solid T-Shirt</span>
                        <p>Yellow(#fcb102)</p>
                        <div class="qty-box">
                          <div class="input-group"><span class="input-group-prepend">
                              <button class="btn quantity-left-minus" type="button" data-type="minus" data-field=""><i data-feather="minus"></i></button></span>
                            <input class="form-control input-number" type="text" name="quantity" value="1"><span class="input-group-prepend">
                              <button class="btn quantity-right-plus" type="button" data-type="plus" data-field=""><i data-feather="plus"></i></button></span>
                          </div>
                        </div>
                        <h6 class="text-end text-muted">$299.00</h6>
                      </div>
                      <div class="close-circle"><a href="#"><i data-feather="x"></i></a></div>
                    </div>
                  </li>
                  <li>
                    <div class="total">
                      <h6 class="mb-2 mt-0 text-muted">Order Total : <span class="f-right f-20">$598.00</span></h6>
                    </div>
                  </li>
                  <li><a class="btn btn-block w-100 mb-2 btn-primary view-cart" href="cart.html">Go to shoping bag</a><a class="btn btn-block w-100 btn-secondary view-cart" href="checkout.html">Checkout</a></li>
                </ul>
              </li>
              
              <li class="onhover-dropdown"><i data-feather="message-square"></i>
                <ul class="chat-dropdown onhover-show-div">
                  <li><i data-feather="message-square"></i>
                    <h6 class="f-18 mb-0">Message Box                                    </h6>
                  </li>
                  <li>
                    <div class="media"><img class="img-fluid rounded-circle me-3" src="../assets/images/user/1.jpg" alt="">
                      <div class="status-circle online"></div>
                      <div class="media-body"><span>Erica Hughes</span>
                        <p>Lorem Ipsum is simply dummy...</p>
                      </div>
                      <p class="f-12 font-success">58 mins ago</p>
                    </div>
                  </li>
                  <li>
                    <div class="media"><img class="img-fluid rounded-circle me-3" src="../assets/images/user/2.jpg" alt="">
                      <div class="status-circle online"></div>
                      <div class="media-body"><span>Kori Thomas</span>
                        <p>Lorem Ipsum is simply dummy...</p>
                      </div>
                      <p class="f-12 font-success">1 hr ago</p>
                    </div>
                  </li>
                  <li>
                    <div class="media"><img class="img-fluid rounded-circle me-3" src="../assets/images/user/4.jpg" alt="">
                      <div class="status-circle offline"></div>
                      <div class="media-body"><span>Ain Chavez</span>
                        <p>Lorem Ipsum is simply dummy...</p>
                      </div>
                      <p class="f-12 font-danger">32 mins ago</p>
                    </div>
                  </li>
                  <li class="text-center"> <a class="btn btn-primary" href="#">View All     </a></li>
                </ul>
              </li>
              -->
              <li class="profile-nav onhover-dropdown p-0 me-0">
                <div class="media profile-media"><img class="b-r-10" src="<?php echo $profileImage;?>" alt="" style="height:37px;width:37px;">
                  <div class="media-body"><span>
                    <?php
                  
                    echo $DisplayName;
                  ?>
                  </span>
                    <p class="mb-0 font-roboto"><?php echo $portal;?> <i class="middle fa fa-angle-down"></i></p>
                  </div>
                </div>
                <ul class="profile-dropdown onhover-show-div">
                  <li><a href="dashboard.php?action=MyProfile"><i data-feather="user"></i><span>My Profile </span></a></li>
                  <li><a href="dashboard.php?action=logout"><i data-feather="log-out"> </i><span>Log out</span></a></li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </div>
      <div class="page-body-wrapper">
        <div class="sidebar-wrapper">
          <div>
            <div class="logo-wrapper" style="padding:15px;"><a href="index.php">
            <img class="img-fluid for-light" src="assets/app/<?php echo $_SETTINGS['DashboardLogo'];?>" style="heigt:50px" alt="">
            <img class="img-fluid for-dark" src="assets/app/<?php echo $_SETTINGS['DashboardLogo'];?>"  style="heigt:50px;background:#fff"  alt=""></a>
              <div class="back-btn"><i class="fa fa-angle-left"></i></div>
              <div class="toggle-sidebar"><i class="status_toggle middle sidebar-toggle" data-feather="grid"> </i></div>
            </div>
            <div class="logo-icon-wrapper"><a href="index.php"><img class="img-fluid" src="assets/images/logo/logo-icon.png" alt=""></a></div>
            <?php include_once("app/includes/".$_SESSION['User']['role']."/leftmenu.php"); ?>
          </div>
        </div>
        <div class="page-body">
            <?php 
                if (isset($_GET['action'])) {
                    include_once("app/includes/".$_SESSION['User']['role']."/".$_GET['action'].".php");
                } else {
                    include_once("app/includes/".$_SESSION['User']['role']."/dashboard.php");
                }
            ?>
        </div>
        <footer class="footer">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-6 footer-copyright text-left">
                <p class="mb-0">Designed By: nexifysoftware.com</p>
              </div>
              <div class="col-md-6 footer-copyright text-right">
                <p class="mb-0" style="text-align:right">Licence To: <?php echo $_SETTINGS['LicenceTo'];?></p>
              </div>
            </div>
          </div>
        </footer>
      </div>
    </div>
    
    
    <div class="modal fade" id="attachmentDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenter" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <form action="" method="post">
                <input type="hidden" value="" name="DeleteFileID" id="DeleteFileID">
                <input type="hidden" value="" name="DeleteFileName" id="DeleteFileName">
            <div class="modal-header">
                <h5 class="modal-title">Confirmation</h5>
                <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Are you want to <b style="color:red">delete</b> bellow file?</p>
                <div id="FileName"></div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-outline-danger" type="button" data-bs-dismiss="modal">Close</button>
                <button class="btn btn-danger" type="submit" name="RemoveFile">Yes, Continue</button>
            </div>
            </form>
        </div>
    </div>
</div>

    <script src="assets/js/bootstrap/bootstrap.bundle.min.js"></script>
    
    <script src="assets/js/icons/feather-icon/feather.min.js"></script>
    <script src="assets/js/icons/feather-icon/feather-icon.js"></script>
    <script src="assets/js/scrollbar/simplebar.js"></script>
    <script src="assets/js/scrollbar/custom.js"></script>
    <script src="assets/js/config.js"></script>
    <script src="assets/js/sidebar-menu.js"></script>
    <script src="assets/js/chart/chartist/chartist.js"></script>
    <script src="assets/js/chart/chartist/chartist-plugin-tooltip.js"></script>
    <script src="assets/js/chart/knob/knob.min.js"></script>
    <script src="assets/js/chart/knob/knob-chart.js"></script>
    <script src="assets/js/chart/apex-chart/apex-chart.js"></script>
    <script src="assets/js/chart/apex-chart/stock-prices.js"></script>
    <script src="assets/js/notify/bootstrap-notify.min.js"></script>
    <script src="assets/js/dashboard/default.js"></script>
    <script src="assets/js/notify/index.js"></script>
    <script src="assets/js/datepicker/date-picker/datepicker.js"></script>
    <script src="assets/js/datepicker/date-picker/datepicker.en.js"></script>
    <script src="assets/js/datepicker/date-picker/datepicker.custom.js"></script>
    <script src="assets/js/typeahead/handlebars.js"></script>
    <script src="assets/js/typeahead/typeahead.bundle.js"></script>
    <script src="assets/js/typeahead/typeahead.custom.js"></script>
    <script src="assets/js/typeahead-search/handlebars.js"></script>
    <script src="assets/js/typeahead-search/typeahead-custom.js"></script>
    <script src="assets/js/tooltip-init.js"></script>
    <script src="assets/js/datatable/datatables/jquery.dataTables.min.js"></script>
    <script src="assets/js/datatable/datatables/datatable.custom.js"></script>
   
    <script src="assets/js/script.js"></script>
    
  
    <script src="assets/js/xbootstrap-autocomplete.js"></script>
    
    <script>
    !(function (s) {
    var i = {};
    function o(t) {
        if (i[t]) return i[t].exports;
        var e = (i[t] = { i: t, l: !1, exports: {} });
        return s[t].call(e.exports, e, e.exports, o), (e.l = !0), e.exports;
    }
    (o.m = s),
        (o.c = i),
        (o.d = function (t, e, s) {
            o.o(t, e) || Object.defineProperty(t, e, { enumerable: !0, get: s });
        }),
        (o.r = function (t) {
            "undefined" != typeof Symbol && Symbol.toStringTag && Object.defineProperty(t, Symbol.toStringTag, { value: "Module" }), Object.defineProperty(t, "__esModule", { value: !0 });
        }),
        (o.t = function (e, t) {
            if ((1 & t && (e = o(e)), 8 & t)) return e;
            if (4 & t && "object" == typeof e && e && e.__esModule) return e;
            var s = Object.create(null);
            if ((o.r(s), Object.defineProperty(s, "default", { enumerable: !0, value: e }), 2 & t && "string" != typeof e))
                for (var i in e)
                    o.d(
                        s,
                        i,
                        function (t) {
                            return e[t];
                        }.bind(null, i)
                    );
            return s;
        }),
        (o.n = function (t) {
            var e =
                t && t.__esModule
                    ? function () {
                          return t.default;
                      }
                    : function () {
                          return t;
                      };
            return o.d(e, "a", e), e;
        }),
        (o.o = function (t, e) {
            return Object.prototype.hasOwnProperty.call(t, e);
        }),
        (o.p = ""),
        o((o.s = 0));
})([
    function (t, e, s) {
        "use strict";
        s.r(e),
            s.d(e, "AutoComplete", function () {
                return h;
            });
        var i,
            o,
            n,
            e =
                ((i = function (t, e) {
                    return (i =
                        Object.setPrototypeOf ||
                        ({ __proto__: [] } instanceof Array &&
                            function (t, e) {
                                t.__proto__ = e;
                            }) ||
                        function (t, e) {
                            for (var s in e) Object.prototype.hasOwnProperty.call(e, s) && (t[s] = e[s]);
                        })(t, e);
                }),
                function (t, e) {
                    function s() {
                        this.constructor = t;
                    }
                    i(t, e), (t.prototype = null === e ? Object.create(e) : ((s.prototype = e.prototype), new s()));
                }),
            r =
                ((p.prototype.getDefaults = function () {
                    return {};
                }),
                (p.prototype.getResults = function (t, e, s) {
                    return this.results;
                }),
                (p.prototype.search = function (t, e) {
                    e(this.getResults());
                }),
                e(f, (o = p)),
                (f.prototype.getDefaults = function () {
                    return { url: "", method: "get", queryKey: "q", extraData: {}, timeout: void 0, requestThrottling: 500 };
                }),
                (f.prototype.search = function (t, e) {
                    var s = this;
                    null != this.jqXHR && this.jqXHR.abort();
                    var i = {};
                    (i[this._settings.queryKey] = t),
                        $.extend(i, this._settings.extraData),
                        this.requestTID && window.clearTimeout(this.requestTID),
                        (this.requestTID = window.setTimeout(function () {
                            (s.jqXHR = $.ajax(s._settings.url, { method: s._settings.method, data: i, timeout: s._settings.timeout })),
                                s.jqXHR.done(function (t) {
                                    e(t);
                                }),
                                s.jqXHR.fail(function (t) {
                                    var e;
                                    null === (e = s._settings) || void 0 === e || e.fail(t);
                                }),
                                s.jqXHR.always(function () {
                                    s.jqXHR = null;
                                });
                        }, this._settings.requestThrottling));
                }),
                f),
            l =
                ((c.prototype.init = function () {
                    var e = this,
                        t = $.extend({}, this._$el.position(), { height: this._$el[0].offsetHeight });
                    (this._dd = $("<ul />")),
                        this._dd.addClass("bootstrap-autocomplete dropdown-menu"),
                        this._dd.insertAfter(this._$el),
                        this._dd.css({ top: t.top + this._$el.outerHeight(), left: t.left, width: this._$el.outerWidth() }),
                        this._dd.on("click", "li", function (t) {
                            t = $(t.currentTarget).data("item");
                            e.itemSelectedLaunchEvent(t);
                        }),
                        this._dd.on("keyup", function (t) {
                            if (e.shown) return 27 === t.which && (e.hide(), e._$el.focus()), !1;
                        }),
                        this._dd.on("mouseenter", function (t) {
                            e.ddMouseover = !0;
                        }),
                        this._dd.on("mouseleave", function (t) {
                            e.ddMouseover = !1;
                        }),
                        this._dd.on("mouseenter", "li", function (t) {
                            e.haveResults && ($(t.currentTarget).closest("ul").find("li.active").removeClass("active"), $(t.currentTarget).addClass("active"), (e.mouseover = !0));
                        }),
                        this._dd.on("mouseleave", "li", function (t) {
                            e.mouseover = !1;
                        }),
                        (this.initialized = !0);
                }),
                (c.prototype.checkInitialized = function () {
                    this.initialized || this.init();
                }),
                Object.defineProperty(c.prototype, "isMouseOver", {
                    get: function () {
                        return this.mouseover;
                    },
                    enumerable: !1,
                    configurable: !0,
                }),
                Object.defineProperty(c.prototype, "isDdMouseOver", {
                    get: function () {
                        return this.ddMouseover;
                    },
                    enumerable: !1,
                    configurable: !0,
                }),
                Object.defineProperty(c.prototype, "haveResults", {
                    get: function () {
                        return 0 < this.items.length;
                    },
                    enumerable: !1,
                    configurable: !0,
                }),
                (c.prototype.focusNextItem = function (t) {
                    var e, s;
                    this.haveResults && ((e = this._dd.find("li.active")), 0 === (s = t ? e.prev() : e.next()).length && (s = t ? this._dd.find("li").last() : this._dd.find("li").first()), e.removeClass("active"), s.addClass("active"));
                }),
                (c.prototype.focusPreviousItem = function () {
                    this.focusNextItem(!0);
                }),
                (c.prototype.selectFocusItem = function () {
                    this._dd.find("li.active").trigger("click");
                }),
                Object.defineProperty(c.prototype, "isItemFocused", {
                    get: function () {
                        return !!(this.isShown() && 0 < this._dd.find("li.active").length);
                    },
                    enumerable: !1,
                    configurable: !0,
                }),
                (c.prototype.show = function () {
                    this.shown || (this._dd.dropdown().show(), (this.shown = !0));
                }),
                (c.prototype.isShown = function () {
                    return this.shown;
                }),
                (c.prototype.hide = function () {
                    this.shown && (this._dd.dropdown().hide(), (this.shown = !1));
                }),
                (c.prototype.updateItems = function (t, e) {
                    (this.items = t), (this.searchText = e), this.refreshItemList();
                }),
                (c.prototype.showMatchedText = function (t, e) {
                    var s = t.toLowerCase().indexOf(e.toLowerCase());
                    if (-1 < s) {
                        e = s + e.length;
                        return t.slice(0, s) + "<b>" + t.slice(s, e) + "</b>" + t.slice(e);
                    }
                    return t;
                }),
                (c.prototype.refreshItemList = function () {
                    var o = this;
                    this.checkInitialized(), this._dd.empty();
                    var t,
                        n = [];
                    0 < this.items.length
                        ? this.items.forEach(function (t) {
                              var e,
                                  s = o.formatItem(t);
                              "string" == typeof s && (s = { text: s }), (i = o.showMatchedText(s.text, o.searchText)), (e = void 0 !== s.html ? s.html : i);
                              var i = s.disabled,
                                  s = $("<li >");
                              s.append($("<a>").attr("href", "#!").html(e)).data("item", t), i && s.addClass("disabled"), n.push(s);
                          })
                        : ((t = $("<li >")).append($("<a>").attr("href", "#!").html(this.noResultsText)).addClass("disabled"), n.push(t)),
                        this._dd.append(n);
                }),
                (c.prototype.itemSelectedLaunchEvent = function (t) {
                    this._$el.trigger("autocomplete.select", t);
                }),
                c),
            a =
                ((u.prototype.getElPos = function () {
                    return $.extend({}, this._$el.position(), { height: this._$el[0].offsetHeight });
                }),
                (u.prototype.init = function () {
                    var s = this,
                        t = this.getElPos();
                    (this._dd = $("<div />")),
                        this._dd.addClass("bootstrap-autocomplete dropdown-menu"),
                        this._dd.insertAfter(this._$el),
                        this._dd.css({ top: t.top + this._$el.outerHeight(), left: t.left, width: this._$el.outerWidth() }),
                        this._dd.on("click", ".dropdown-item", function (t) {
                            var e = $(t.currentTarget).data("item");
                            s.itemSelectedLaunchEvent(e), t.preventDefault();
                        }),
                        this._dd.on("keyup", function (t) {
                            if (s.shown) return 27 === t.which && (s.hide(), s._$el.focus()), !1;
                        }),
                        this._dd.on("mouseenter", function (t) {
                            s.ddMouseover = !0;
                        }),
                        this._dd.on("mouseleave", function (t) {
                            s.ddMouseover = !1;
                        }),
                        this._dd.on("mouseenter", ".dropdown-item", function (t) {
                            s.haveResults && ($(t.currentTarget).closest("div").find(".dropdown-item.active").removeClass("active"), $(t.currentTarget).addClass("active"), (s.mouseover = !0));
                        }),
                        this._dd.on("mouseleave", ".dropdown-item", function (t) {
                            s.mouseover = !1;
                        }),
                        (this.initialized = !0);
                }),
                (u.prototype.checkInitialized = function () {
                    this.initialized || this.init();
                }),
                Object.defineProperty(u.prototype, "isMouseOver", {
                    get: function () {
                        return this.mouseover;
                    },
                    enumerable: !1,
                    configurable: !0,
                }),
                Object.defineProperty(u.prototype, "isDdMouseOver", {
                    get: function () {
                        return this.ddMouseover;
                    },
                    enumerable: !1,
                    configurable: !0,
                }),
                Object.defineProperty(u.prototype, "haveResults", {
                    get: function () {
                        return 0 < this.items.length;
                    },
                    enumerable: !1,
                    configurable: !0,
                }),
                (u.prototype.focusNextItem = function (t) {
                    var e, s;
                    this.haveResults &&
                        ((e = this._dd.find(".dropdown-item.active")),
                        0 === (s = t ? e.prev() : e.next()).length && (s = t ? this._dd.find(".dropdown-item").last() : this._dd.find(".dropdown-item").first()),
                        e.removeClass("active"),
                        s.addClass("active"));
                }),
                (u.prototype.focusPreviousItem = function () {
                    this.focusNextItem(!0);
                }),
                (u.prototype.selectFocusItem = function () {
                    this._dd.find(".dropdown-item.active").trigger("click");
                }),
                Object.defineProperty(u.prototype, "isItemFocused", {
                    get: function () {
                        return !!(this._dd && this.isShown() && 0 < this._dd.find(".dropdown-item.active").length);
                    },
                    enumerable: !1,
                    configurable: !0,
                }),
                (u.prototype.show = function () {
                    this.shown || (this.getElPos(), this._dd.addClass("show"), (this.shown = !0), this._$el.trigger("autocomplete.dd.shown"));
                }),
                (u.prototype.isShown = function () {
                    return this.shown;
                }),
                (u.prototype.hide = function () {
                    this.shown && (this._dd.removeClass("show"), (this.shown = !1), this._$el.trigger("autocomplete.dd.hidden"));
                }),
                (u.prototype.updateItems = function (t, e) {
                    (this.items = t), (this.searchText = e), this.refreshItemList();
                }),
                (u.prototype.showMatchedText = function (t, e) {
                    var s = t.toLowerCase().indexOf(e.toLowerCase());
                    if (-1 < s) {
                        e = s + e.length;
                        return t.slice(0, s) + "<b>" + t.slice(s, e) + "</b>" + t.slice(e);
                    }
                    return t;
                }),
                (u.prototype.refreshItemList = function () {
                    var o = this;
                    this.checkInitialized(), this._dd.empty();
                    var t,
                        n = [];
                    0 < this.items.length
                        ? (this.items.forEach(function (t) {
                              var e,
                                  s = o.formatItem(t);
                              "string" == typeof s && (s = { text: s }), (i = o.showMatchedText(s.text, o.searchText)), (e = void 0 !== s.html ? s.html : i);
                              var i = s.disabled,
                                  s = $("<a >");
                              s.addClass("dropdown-item").css({ overflow: "hidden", "text-overflow": "ellipsis" }).html(e).data("item", t), i && s.addClass("disabled"), n.push(s);
                          }),
                          this._dd.append(n),
                          this.show())
                        : "" === this.noResultsText
                        ? this.hide()
                        : ((t = $("<a >")).addClass("dropdown-item disabled").html(this.noResultsText), n.push(t), this._dd.append(n), this.show());
                }),
                (u.prototype.itemSelectedLaunchEvent = function (t) {
                    this._$el.trigger("autocomplete.select", t);
                }),
                u),
            h =
                ((d.prototype.manageInlineDataAttributes = function () {
                    var t = this.getSettings();
                    this._$el.data("url") && (t.resolverSettings.url = this._$el.data("url")),
                        this._$el.data("default-value") && (this._defaultValue = this._$el.data("default-value")),
                        this._$el.data("default-text") && (this._defaultText = this._$el.data("default-text")),
                        void 0 !== this._$el.data("noresults-text") && (t.noResultsText = this._$el.data("noresults-text"));
                }),
                (d.prototype.getSettings = function () {
                    return this._settings;
                }),
                (d.prototype.getBootstrapVersion = function () {
                    var t =
                        "auto" === this._settings.bootstrapVersion
                            ? $.fn.button.Constructor.VERSION.split(".").map(parseInt)
                            : "4" === this._settings.bootstrapVersion
                            ? [4]
                            : "3" === this._settings.bootstrapVersion
                            ? [3]
                            : (console.error("INVALID value for 'bootstrapVersion' settings property: " + this._settings.bootstrapVersion + " defaulting to 4"), [4]);
                    return t;
                }),
                (d.prototype.convertSelectToText = function () {
                    var t = $("<input>");
                    t.attr("type", "hidden"), t.attr("name", this._$el.attr("name")), this._defaultValue && t.val(this._defaultValue), (this._selectHiddenField = t).insertAfter(this._$el);
                    var e = $("<input>");
                    e.attr("type", "search"),
                        e.attr("name", this._$el.attr("name") + "_text"),
                        e.attr("id", this._$el.attr("id")),
                        e.attr("disabled", this._$el.attr("disabled")),
                        e.attr("placeholder", this._$el.attr("placeholder")),
                        e.attr("autocomplete", "off"),
                        e.addClass(this._$el.attr("class")),
                        this._defaultText && e.val(this._defaultText);
                    t = this._$el.attr("required");
                    t && e.attr("required", t), e.data(d.NAME, this), this._$el.replaceWith(e), (this._$el = e), (this._el = e.get(0));
                }),
                (d.prototype.init = function () {
                    this.bindDefaultEventListeners(),
                        "ajax" === this._settings.resolver && (this.resolver = new r(this._settings.resolverSettings)),
                        4 === this.getBootstrapVersion()[0]
                            ? (this._dd = new a(this._$el, this._settings.formatResult, this._settings.autoSelect, this._settings.noResultsText))
                            : (this._dd = new l(this._$el, this._settings.formatResult, this._settings.autoSelect, this._settings.noResultsText));
                }),
                (d.prototype.bindDefaultEventListeners = function () {
                    var s = this;
                    this._$el.on("keydown", function (t) {
                        switch (t.which) {
                            case 9:
                                s._dd.isItemFocused ? s._dd.selectFocusItem() : s._selectedItem || ("" !== s._$el.val() && s._$el.trigger("autocomplete.freevalue", s._$el.val())), s._dd.hide();
                                break;
                            case 13:
                                s._dd.isItemFocused ? s._dd.selectFocusItem() : s._selectedItem || ("" !== s._$el.val() && s._$el.trigger("autocomplete.freevalue", s._$el.val())),
                                    s._dd.hide(),
                                    s._settings.preventEnter && t.preventDefault();
                                break;
                            case 40:
                                s._dd.focusNextItem();
                                break;
                            case 38:
                                s._dd.focusPreviousItem();
                        }
                    }),
                        this._$el.on("keyup", function (t) {
                            switch (t.which) {
                                case 16:
                                case 17:
                                case 18:
                                case 39:
                                case 37:
                                case 36:
                                case 35:
                                    break;
                                case 13:
                                case 27:
                                    s._dd.hide();
                                    break;
                                case 40:
                                case 38:
                                    break;
                                default:
                                    s._selectedItem = null;
                                    var e = s._$el.val();
                                    s.handlerTyped(e);
                            }
                        }),
                        this._$el.on("blur", function (t) {
                            !s._dd.isMouseOver && s._dd.isDdMouseOver && s._dd.isShown()
                                ? (setTimeout(function () {
                                      s._$el.focus();
                                  }),
                                  s._$el.focus())
                                : s._dd.isMouseOver ||
                                  (s._isSelectElement
                                      ? s._dd.isItemFocused
                                          ? s._dd.selectFocusItem()
                                          : ((null !== s._selectedItem && "" !== s._$el.val()) ||
                                                ("" !== s._$el.val() && null !== s._defaultValue ? (s._$el.val(s._defaultText), s._selectHiddenField.val(s._defaultValue)) : (s._$el.val(""), s._selectHiddenField.val("")),
                                                (s._selectedItem = null)),
                                            s._$el.trigger("autocomplete.select", s._selectedItem))
                                      : null === s._selectedItem && s._$el.trigger("autocomplete.freevalue", s._$el.val()),
                                  s._dd.hide());
                        }),
                        this._$el.on("autocomplete.select", function (t, e) {
                            (s._selectedItem = e), s.itemSelectedDefaultHandler(e);
                        }),
                        this._$el.on("paste", function (t) {
                            setTimeout(function () {
                                s._$el.trigger("keyup", t);
                            }, 0);
                        });
                }),
                (d.prototype.handlerTyped = function (t) {
                    (null !== this._settings.events.typed && !(t = this._settings.events.typed(t, this._$el))) || (t.length >= this._settings.minLength ? ((this._searchText = t), this.handlerPreSearch()) : this._dd.hide());
                }),
                (d.prototype.handlerPreSearch = function () {
                    if (null !== this._settings.events.searchPre) {
                        var t = this._settings.events.searchPre(this._searchText, this._$el);
                        if (!t) return;
                        this._searchText = t;
                    }
                    this.handlerDoSearch();
                }),
                (d.prototype.handlerDoSearch = function () {
                    var e = this;
                    null !== this._settings.events.search
                        ? this._settings.events.search(
                              this._searchText,
                              function (t) {
                                  e.postSearchCallback(t);
                              },
                              this._$el
                          )
                        : this.resolver &&
                          this.resolver.search(this._searchText, function (t) {
                              e.postSearchCallback(t);
                          });
                }),
                (d.prototype.postSearchCallback = function (t) {
                    (this._settings.events.searchPost && "boolean" == typeof (t = this._settings.events.searchPost(t, this._$el)) && !t) || this.handlerStartShow(t);
                }),
                (d.prototype.handlerStartShow = function (t) {
                    this._dd.updateItems(t, this._searchText);
                }),
                (d.prototype.itemSelectedDefaultHandler = function (t) {
                    var e;
                    null != t
                        ? ("string" == typeof (e = this._settings.formatResult(t)) && (e = { text: e }), this._$el.val(e.text), this._isSelectElement && this._selectHiddenField.val(e.value))
                        : (this._$el.val(""), this._isSelectElement && this._selectHiddenField.val("")),
                        (this._selectedItem = t),
                        this._dd.hide();
                }),
                (d.prototype.defaultFormatResult = function (t) {
                    return "string" == typeof t ? { text: t } : t.text ? t : { text: t.toString() };
                }),
                (d.prototype.manageAPI = function (t, e) {
                    "set" === t ? this.itemSelectedDefaultHandler(e) : "clear" === t ? this.itemSelectedDefaultHandler(null) : "show" === t ? this._$el.trigger("keyup") : "updateResolver" === t && (this.resolver = new r(e));
                }),
                (d.NAME = "autoComplete"),
                d);
        function d(t, e) {
            (this._selectedItem = null),
                (this._defaultValue = null),
                (this._defaultText = null),
                (this._isSelectElement = !1),
                (this._settings = {
                    resolver: "ajax",
                    resolverSettings: {},
                    minLength: 3,
                    valueKey: "value",
                    formatResult: this.defaultFormatResult,
                    autoSelect: !0,
                    noResultsText: "No results",
                    bootstrapVersion: "auto",
                    preventEnter: !1,
                    events: { typed: null, searchPre: null, search: null, searchPost: null, select: null, focus: null },
                }),
                (this._el = t),
                (this._$el = $(this._el)),
                this._$el.is("select") && (this._isSelectElement = !0),
                this.manageInlineDataAttributes(),
                "object" == typeof e && (this._settings = $.extend(!0, {}, this.getSettings(), e)),
                this._isSelectElement && this.convertSelectToText(),
                this.init();
        }
        function u(t, e, s, i) {
            (this.initialized = !1), (this.shown = !1), (this.items = []), (this.ddMouseover = !1), (this._$el = t), (this.formatItem = e), (this.autoSelect = s), (this.noResultsText = i);
        }
        function c(t, e, s, i) {
            (this.initialized = !1), (this.shown = !1), (this.items = []), (this.ddMouseover = !1), (this._$el = t), (this.formatItem = e), (this.autoSelect = s), (this.noResultsText = i);
        }
        function f(t) {
            return o.call(this, t) || this;
        }
        function p(t) {
            this._settings = $.extend(!0, {}, this.getDefaults(), t);
        }
        (n = jQuery),
            window,
            document,
            (n.fn[h.NAME] = function (e, s) {
                return this.each(function () {
                    var t;
                    (t = n(this).data(h.NAME)) || ((t = new h(this, e)), n(this).data(h.NAME, t)), t.manageAPI(e, s);
                });
            });
    },
]);

    
    </script>
    
     
  
    <script>
     function isNumberKey(evt){
        var charCode = (evt.which) ? evt.which : event.keyCode
        if (charCode > 31 && (charCode < 48 || charCode > 57))
            return false;
        return true;
    }
    
        var submit=0;
        function formSubmit(frmBtn) {
            submit++;
           $( "#"+frmBtn ).trigger( "click" );
        }
        
        function formvalidation(frm) {
               
            if (submit>0) {
                return true;
            }
           
            var error=0;
            if (frm=="create_admin") {
                
                $('#ErrAdminName').html("");
                $('#ErrEmail').html("");
                $('#ErrAdminMobileNumber').html("");
                $('#ErrLoginPassword').html("");
                
                if ($('#AdminName').val().length==0) {
                    $('#ErrAdminName').html("Please enter Administrator's Name");
                    error++;
                }
                if ($('#Email').val().length==0) {
                    $('#ErrEmail').html("Please enter Email");
                    error++;
                }
                if ($('#AdminMobileNumber').val().length==0) {
                    $('#ErrAdminMobileNumber').html("Please enter Mobile Number");
                    error++;
                }
                if ($('#LoginPassword').val().length==0) {
                    $('#ErrLoginPassword').html("Please enter Login Password");
                    error++;
                }
                
                if (error==0) {
                    $('#exampleModalCenter').modal('show');    
                }
                return false;
                return (error==0) ? true : false;
            }
            
            if (frm=="create_placename") {
                
                $('#ErrStateNameID').html("");
                $('#ErrDistrictNameID').html("");
                  
                if ($('#StateNameID').val()==0) {
                    $('#ErrStateNameID').html("Please select State Name");
                    error++;
                } else {
                    if ($('#DistrictNameID').val()==0) {
                        $('#ErrDistrictNameID').html("Please Select District Name");
                        error++;
                    }
                }
                
                $('#ErrPlaceName').html("");
                if ($('#PlaceName').val().length==0) {
                    $('#ErrPlaceName').html("Please enter Place Name");
                    error++;
                }
                if (error==0) {
                    $('#exampleModalCenter').modal('show');    
                }
                return false;
                return (error==0) ? true : false;
            }
            
            
             if (frm=="create_districtcourttype") {
                
                $('#ErrDistrictCourtTypeName').html("");
                if ($('#DistrictCourtTypeName').val().length==0) {
                    $('#ErrDistrictCourtTypeName').html("Please enter District Court Type Name");
                    error++;
                }
                if (error==0) {
                    $('#exampleModalCenter').modal('show');    
                }
                return false;
                return (error==0) ? true : false;
            }
            
            
            
            
            
            
            if (frm=="create_court") {
                
                $('#ErrCourtName').html("");
                if ($('#CourtName').val().length==0) {
                    $('#ErrCourtName').html("Please enter Court Name");
                    error++;
                }
                if (error==0) {
                    $('#exampleModalCenter').modal('show');    
                }
                return false;
                return (error==0) ? true : false;
            }
            
            if (frm=="create_casetype") {
                
                $('#ErrCaseTypeName').html("");
                if ($('#CaseTypeName').val().length==0) {
                    $('#ErrCaseTypeName').html("Please enter CaseType Name");
                    error++;
                }
                if (error==0) {
                    $('#exampleModalCenter').modal('show');    
                }
                return false;
                return (error==0) ? true : false;
            }
            
            
              if (frm=="create_advocate") {
                
                $('#ErrAdvocateName').html("");
                if ($('#AdvocateName').val().length==0) {
                    $('#ErrAdvocateName').html("Please enter Advocate's Name");
                    error++;
                }
                if (error==0) {
                    $('#exampleModalCenter').modal('show');    
                }
                return false;
                return (error==0) ? true : false;
            }
            
              if (frm=="create_staff") {
                
                $('#ErrStaffName').html("");
                if ($('#StaffName').val().length==0) {
                    $('#ErrStaffName').html("Please enter Staff's Name");
                    error++;
                }
                if (error==0) {
                    $('#exampleModalCenter').modal('show');    
                }
                return false;
                return (error==0) ? true : false;
            }
            
              if (frm=="create_client") {
                
                $('#ErrClientName').html("");
                if ($('#ClientName').val().length==0) {      
                    $('#ErrClientName').html("Please enter Client's Name");
                    error++;
                }                                                  
                if (error==0) {
                    $('#exampleModalCenter').modal('show');    
                }
                return false;
                return (error==0) ? true : false;
            } 
            
            if (frm=="create_changepassword") {
                
                $('#ErrCurrentPassword').html("");
                if ($('#CurrentPassword').val().length==0) {      
                    $('#ErrCurrentPassword').html("Please enter current password");
                    error++;
                }
                
                $('#ErrNewPassword').html("");
                if ($('#NewPassword').val().length==0) {      
                    $('#ErrNewPassword').html("Please enter new password");
                    error++;
                }
                
                $('#ErrConfirmNewPassword').html("");
                if ($('#ConfirmNewPassword').val().length==0) {      
                    $('#ErrConfirmNewPassword').html("Please enter confrim new password");
                    error++;
                }
                
                if ($('#ConfirmNewPassword').val().length>0 && $('#NewPassword').val().length>0) {
                    if ($('#ConfirmNewPassword').val()!=$('#NewPassword').val()) {      
                        $('#ErrConfirmNewPassword').html("Password not match New & confrim new password");
                        error++;
                    }
                }
                                                                  
                if (error==0) {
                    $('#exampleModalCenter').modal('show');    
                }
                return false;
                return (error==0) ? true : false;
            }
            
            
                 if (frm=="create_clienttypename") {
                
                $('#ErrClientTypeName').html("");
                if ($('#ClientTypeName').val().length==0) {      
                    $('#ErrClientTypeName').html("Please enter Client's Type");
                    error++;
                }                                                  
                if (error==0) {
                    $('#exampleModalCenter').modal('show');    
                }
                return false;
                return (error==0) ? true : false;
            } 

            if (frm=="create_statename") {
                
                $('#ErrStateName').html("");
                if ($('#StateName').val().length==0) {      
                    $('#ErrStateName').html("Please enter State Name");
                    error++;
                }                                                  
                if (error==0) {
                    $('#exampleModalCenter').modal('show');    
                }
                return false;
                return (error==0) ? true : false;
            } 
             if (frm=="create_districtname") {
                
                $('#ErrDistricteName').html("");
                if ($('#DistrictName').val().length==0) {      
                    $('#ErrDistrictName').html("Please enter District Name");
                    error++;
                }  
                
                $('#ErrStateName').html("");
                if ($('#StateNameID').val()=="0") {      
                    $('#ErrStateName').html("Please select State Name");
                    error++;
                }                                                  
                if (error==0) {
                    $('#exampleModalCenter').modal('show');    
                }
                return false;
                return (error==0) ? true : false;
            } 
            
             if (frm=="create_nationality") {
                
                $('#ErrNationalityName').html("");
                if ($('#NationalityName').val().length==0) {      
                    $('#ErrNationalityName').html("Please enter Nationality Name");
                    error++;
                }  
                
                                                               
                if (error==0) {
                    $('#exampleModalCenter').modal('show');    
                }
                return false;
                return (error==0) ? true : false;
            }   
             if (frm=="create_religionname") {
                
                $('#ErrReligionName').html("");
                if ($('#ReligionName').val().length==0) {      
                    $('#ErrReligionName').html("Please enter Religion Name");
                    error++;
                }  
                
                                                               
                if (error==0) {
                    $('#exampleModalCenter').modal('show');    
                }
                return false;
                return (error==0) ? true : false;
            } 
              if (frm=="create_subadvocate") {
                
                $('#ErrAdvocatenName').html("");
                if ($('#AdvocateName').val().length==0) {      
                    $('#ErrAdvocateName').html("Please enter Advocate Name");
                    error++;
                }  
                
                                                               
                if (error==0) {
                    $('#exampleModalCenter').modal('show');    
                }
                return false;
                return (error==0) ? true : false;
            } 
            
             if (frm=="create_case_amountreceved") {
                
                $('#ErrAmount').html("");
                if ($('#Amount').val().length==0) {      
                    $('#ErrAmount').html("Please enter Amount");
                    error++;
                }  
                
                                                               
                if (error==0) {
                    $('#exampleModalCenter').modal('show');    
                }
                return false;
                return (error==0) ? true : false;
            } 
            
            
             if (frm=="create_case_hiring") {
                
                $('#ErrCaseAttendDate').html("");
                if ($('#CaseAttendDate').val().length==0) {      
                    $('#ErrCaseAttendDate').html("Please select Case Attend Date");
                    error++;
                }  
                
                                                               
                if (error==0) {
                    $('#exampleModalCenter').modal('show');    
                }
                return false;
                return (error==0) ? true : false;
            } 
                 if (frm=="create_priorityname") {
                
                $('#ErrPriorityColor').html("");
                if ($('#PriorityColor').val().length==0) {      
                    $('#ErrPriorityColor').html("Please enter Priority Color");
                    error++;
                }  
                 $('#ErrPriorityName').html("");
                if ($('#PriorityName').val().length==0) {      
                    $('#ErrPriorityName').html("Please enter Priority Name");
                    error++;
                }  
                
                                                               
                if (error==0) {
                    $('#exampleModalCenter').modal('show');    
                }
                return false;
                return (error==0) ? true : false;
            } 
            
               if (frm=="case_new_customer_search") {
                
                $('#ErrClientID').html("");
                if (selectedID==0) {      
                    $('#ErrClientID').html("Please enter client");
                    error++;
                }  
                $('#selectedClientID').val(selectedID);
                return (error==0) ? true : false;
            } 
             
             
                if (frm=="create_case_timesheet") {
                
                $('#ErrEventTime').html("");
                if ($('#EventTime').val().length==0) {      
                    $('#ErrEventTime').html("Please select date");
                    error++;
                }  
                
                $('#ErrSpentHours').html("");
                if ($('#SpentHours').val().length==0) {      
                    $('#ErrSpentHours').html("Please enter Hour<br>");
                    error++;
                }  
                
                $('#ErrSpentMins').html("");
                if ($('#SpentMins').val().length==0) {      
                    $('#ErrSpentMins').html("Please enter Minutes");
                    error++;
                }
                                                               
                if (error==0) {
                    $('#exampleModalCenter').modal('show');    
                }
                return false;
                return (error==0) ? true : false;
            } 
            
            
            if (frm=="create_case") {
                
                $('#ErrCourtID').html("");
                if ($('#CourtID').val()=="0") {      
                    $('#ErrCourtID').html("Please select Court");
                    error++;
                } 
                
                $('#ErrCaseTypeID').html("");
                if ($('#CaseTypeID').val()=="0") {      
                    $('#ErrCaseTypeID').html("Please select case");
                    error++;
                } 
                
                $('#ErrPriorityID').html("");
                if ($('#PriorityID').val()=="0") {      
                    $('#ErrPriorityID').html("Please select priority");
                    error++;
                }
                
                $('#ErrAppearingModelID').html("");
                if ($('#AppearingModelID').val()=="0") {      
                    $('#ErrAppearingModelID').html("Please select Appearing Model");
                    error++;
                }
                
                $('#ErrCNRNumber').html("");
               // if ($('#CNRNumber').val().length==0) {    
                 //   $('#ErrCNRNumber').html("Please enter CNR Number");
                 //   error++;
               // }  
                
                $('#ErrTitle').html("");
                if ($('#Title').val().length==0) {    
                    $('#ErrTitle').html("Please enter Title");
                    error++;
                } 
                
                $('#ErrAdvocateID').html("");
                if ($('.advocate_checked:checked').length == 0 ) {
                    $('#ErrAdvocateID').html("Please select your advocate");
                    error++;
                }
                
                                                               
                if (error==0) {
                    $('#exampleModalCenter').modal('show');    
                }
                return false;
                return (error==0) ? true : false;
            } 
            
            
            
            
            
            
            return false;
        }
   
                      // $(function () {
                      //  $('.basicAutoSelect').autoComplete();
             //   $('.basicAutoSelect').on('autocomplete.select', function (evt, item) {
                 //   console.log('select', item);
                //    $('.basicAutoSelectSelected').html(item?JSON.stringify(item):'null');

             //   });   //  });
                
                
                
                
                
                
                
                
                
        
                          
                                function getDistrictNames() {
                                    if ($('#StateNameID').val()=="0") {
                                        $('#district_nodata').show();
                                        $('#district_withdata').hide();
                                    } else {
                                        $.ajax({url:'webservice.php?action=getDistrictNames&StateNameID='+$('#StateNameID').val()+"&DistrctNameID=<?php echo isset($_POST['DistrictNameID']) ? $_POST['DistrctNameID'] : $data[0]['DistrictNameID'];?>",success:function(data){
                                              $('#district_nodata').hide();
                                              $('#district_withdata').show();
                                              $('#district_withdata').html(data);
                                        }});
                                    }
                                }
                                
                                setTimeout(getDistrictNames(),2000);
                            </script>
    </body>
</html>