<?php include_once("config.php"); 
if($_SESSION['USER']['isstaff']==0){
    if (isset($_SESSION['USER']['userid']) && $_SESSION['USER']['userid']>0) {
       /* if (strlen(trim($_SESSION['USER']['mobile']))<10) {
            echo "<script>location.href='https://www.klx.co.in/in/updatemobile';</script>";
        }  else { */
            if ($_SESSION['USER']['isemailverified']==0) {
                echo "<script>location.href='https://www.klx.co.in/in/emailverification';</script>";
            }else { 
                if ($_SESSION['USER']['stateid']==0 || $_SESSION['USER']['districtid']==0 ){
                    echo "<script>location.href='https://www.klx.co.in/in/updatelocation';</script>";
                }
            }
           // }
      //  }
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
     <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>klx.co.in</title>
    <meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
    <?php if (isset($share) && $share==true) {?>
    <meta data-react-helmet="true" property="og:site_name"   content="Klx Classified" />
    <meta data-react-helmet="true" property="og:title"       content="<?php echo $d[0]['title'];?>" />
    <meta data-react-helmet="true" property="og:description" content="<?php echo strip_tags($d[0]['content']);?>" />
    <meta data-react-helmet="true" property="og:url"         content="<?php echo  $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://".$_SERVER[HTTP_HOST].$_SERVER[REQUEST_URI];?>" />
    <meta data-react-helmet="true" property="og:type"        content="website" />
    <meta data-react-helmet="true" property="og:image"     content="<?php echo base_url.$filename;?>" />
    <meta data-react-helmet="true" name="description" content="<?php echo strip_tags($d[0]['content']);?>"/>
    <?php } else {?>
    
     <meta data-react-helmet="true" property="og:site_name"   content="Klx Classified" />
    <meta data-react-helmet="true" property="og:title"       content="Klx Classified" />
    <meta data-react-helmet="true" property="og:description" content="Klx classifed" />
    <meta data-react-helmet="true" property="og:url"         content="https://www.klx.co.in" />
    <meta data-react-helmet="true" property="og:type"        content="website" />
    <meta data-react-helmet="true" property="og:image"     content="https://www.klx.co.in/assets/img/klx_co_in.jpg" />
    <meta data-react-helmet="true" name="description" content="Klx Classifieds "/> 
    <?php } ?>
    <link rel="icon" href="<?php echo base_url;?>assets/img/icon.ico" type="image/x-icon"/>
                                          
     
    <script src="<?php echo base_url;?>assets/js/webfont.min.js"></script>
    <script src="<?php echo base_url;?>assets/js/jquery.3.2.1.min.js"></script>
    <script src="<?php echo base_url;?>assets/js/app.js"></script>
    <script src="<?php echo base_url;?>assets/js/validationkmdriven.js?rand=<?php echo rand(30,3000);?>"></script>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <script>
        WebFont.load({
            google: {"families":["Lato:300,400,700,900"]},
            custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['<?php echo base_url;?>assets/css/fonts.min.css']},
            active: function() {
                sessionStorage.fonts = true;
            }
        });
    </script>
<style>
    .cursor-hand{cursor:pointer;}
    .cursor-hand p{color:#333}
    .cursor-hand:hover {background:#f1f1f1}
     .errorstring{width:100%;font-size:12px;color:red}  
</style>
<script>
    function goUrl(url) {
        location.href='<?php echo path_url;?>'+url;
    } 
        function viewad(id) {
            location.href='<?php echo path_url;?>v'+id;
        } 
        function viewads(id) {
            location.href='viewads.php?a='+id;
        }  
        
        function ListSubCategories(id) {
            //location.href='subcategory.php?a='+id;
            location.href='<?php echo country_url;?>sc'+id;
        }
         function viewads_subcategory(id) {
            location.href='<?php echo country_url;?>viewads/sc'+id;
        }
        
        
        function likead(adid) {
            $.ajax({url:'webservice.php?action=addFav&postId='+adid,success:function(result){
                     $('#d').html(result);
            }});
        }
        
       </script>
       <div id="d"></div>
    <!-- CSS Files -->
    <link rel="stylesheet" href="<?php echo base_url;?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo base_url;?>assets/css/atlantis.css">

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="<?php echo base_url;?>assets/css/demo.css">
    
   
<style>

.adImage {height:200px;margin:0px auto;width:auto;max-width:100%;}
.adbox{border:2px solid #fff;height:410px !important;cursor:pointer;min-width:160px}
.adbox:hover{border:2px solid #ccc}

.adboxf{border:2px solid #fff;height:450px !important;cursor:pointer;min-width:160px}     
.adboxf:hover{border:2px solid #ccc}

                                                
 .postedon {float: right;}
    .mobilemenu {display: none;}
    @media all and (max-width: 768px){
        
        .mobilemenu {display: block;}
        .adImage {height:100px;margin:0px auto;width:auto;max-width:100%;}
        /*.adbox{border:2px solid #fff;height:300px !important;cursor:pointer;width:150px}*/
        .description_level1 {font-size:12px;line-height:14px;}
         .postedon{float:left;font-size:11px;}
         .col-lg-3 {padding-left:5px;padding-right:5px;}
    }                     
 
    
    

    </style>
    
    
</head>
<body>
    <div class="wrapper">                                  
        <div class="main-header">
            <!-- Logo Header -->
            <div class="logo-header" data-background-color="white">
                <a href="<?php echo base_url;?>index.php" class="logo" style="left:10px !important;transform:none">
                    <img src="<?php echo base_url;?>assets/cms/klx_log.png" alt="klx" class="navbar-brand" style="height:30px;">
                    <img src="<?php echo base_url;?>assets/img/<?php echo $_SESSION['country'];?>.png" alt="klx" class="navbar-brand" style="height:24px;border:1px solid #eee;border-radius:3px;">
                </a>
                <button class="topbar more" style="width:190px;text-align:right">
                    <?php if ($_SESSION['USER']['userid']>0) { ?>
                    <table style="float: right;">
                        <tr>
                            <td> 
                            <a class="btn btn-primary btn-sm" href="<?php echo country_url;?>freeadpost" style="padding:5px 10px !important;margin-right:12px;margin-top: -10px;border:1px solid red">
                                Post Free Ad
                            </a> </td>
                    
                    <td style="line-height: 10px !important;text-align: center;width:40px"> 
                        <a href="<?php echo country_url;?>chats" style="text-decoration:none;">
                             <i class="flaticon-chat-4" style="font-size:28px"></i>
                        </a>
                        <br><span style="font-size:10px">Chat</span>
                    </td>
                    <td style="line-height: 10px !important;text-align: center;width:40px">
                        <a class="profile-pic" data-toggle="dropdown" href="javascript:void(0)" aria-expanded="false">
                            <div class="avatar-sm" style="height: 18px;width:auto;">
                            <i class="flaticon-user-1" style="font-size:28px"></i>
                        </div>
                    </a>
                    <br>
                    <span style="font-size:10px">Profile</span>  
                    <ul class="dropdown-menu dropdown-user animated fadeIn" style="margin-top:30px;width:150px; overflow: hidden; ">
                        <div class="dropdown-user-scroll scrollbar-outer">
                            <li>          
                                <div class="user-box">
                                    <div class="u-text">
                                        <h4><?php echo $_SESSION['USER']['personname'];?></h4>
                                    </div>
                                </div>
                            </li>                              
                            <li>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?php echo country_url;?>mypage" style="line-height:15px;">My Page</a>  
                                <a class="dropdown-item" href="<?php echo country_url;?>myads" style="line-height:15px;">My Ads</a>  
                                <a class="dropdown-item" href="<?php echo country_url;?>chats" style="line-height:15px;">Chat With Seller</a>  
                                <a class="dropdown-item" href="<?php echo country_url;?>myprofile" style="line-height:15px;">My Profile</a>
                                <a class="dropdown-item" href="<?php echo country_url;?>changepassword" style="line-height:15px;">Change Password</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?php echo base_url;?>index.php?action=logout" style="line-height:15px;">Logout</a>
                            </li> 
                        </div>
                    </ul></td>
                        </tr>
                    </table>
                    <!--
                    <a class="btn btn-primary btn-sm" href="<?php echo country_url;?>freeadpost" style="padding:5px 10px !important;margin-right:12px;margin-top: -10px;border:1px solid red">
                        Post Free Ad
                    </a> 
                    <a href="<?php echo country_url;?>chats" style="text-decoration:none;line-height:10px;border:1px solid red">
                         <i class="flaticon-chat-4" style="font-size:28px"></i>
                         <br><span style="font-size:10px">Chat</span>
                    </a>&nbsp;&nbsp;
                    <a class="profile-pic" data-toggle="dropdown" href="javascript:void(0)" aria-expanded="false" style="float:right">
                        <div class="avatar-sm" style="height: 50px;width:auto;">
                             
                            <i class="flaticon-user-1" style="font-size:28px"></i>
                        </div>
                    </a>  
                    <ul class="dropdown-menu dropdown-user animated fadeIn" style="width:150px; overflow: hidden; ">
                        <div class="dropdown-user-scroll scrollbar-outer">
                            <li>          
                                <div class="user-box">
                                    <div class="u-text">
                                        <h4><?php echo $_SESSION['USER']['personname'];?></h4>
                                    </div>
                                </div>
                            </li>                              
                            <li>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?php echo country_url;?>mypage" style="line-height:15px;">My Page</a>  
                                <a class="dropdown-item" href="<?php echo country_url;?>myads" style="line-height:15px;">My Ads</a>  
                                <a class="dropdown-item" href="<?php echo country_url;?>chats" style="line-height:15px;">Chat With Seller</a>  
                                <a class="dropdown-item" href="<?php echo country_url;?>myprofile" style="line-height:15px;">My Profile</a>
                                <a class="dropdown-item" href="<?php echo country_url;?>changepassword" style="line-height:15px;">Change Password</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="<?php echo base_url;?>index.php?action=logout" style="line-height:15px;">Logout</a>
                            </li> 
                        </div>
                    </ul>     
                    -->     
                    <?php } else { ?>
                    <a class="btn btn-outline-primary" style="border:none;font-weight:bold !important;font-size:15px;" href="<?php echo country_url;?>login">Login</a>
                    <a class="btn btn-primary" style="color:#fff" href="<?php echo country_url;?>register">Sell</a>
                    <?php } ?>
                </button>       
            </div>
            <!-- End Logo Header -->

            <!-- Navbar Header -->  
            <nav class="navbar navbar-header navbar-expand-lg" data-background-color="white">
                
                <div class="container-fluid">
                     
                    <ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
                         
                        <li class="nav-item dropdown hidden-caret">
                     
                            <a class="btn btn-primary" href="<?php echo country_url;?>freeadpost">
                                 Post Free Ad
                            </a>    
                            </li>
                        <?php
                            if ($_SESSION['USER']['userid']>0) {
                        ?>
                           <li class="nav-item dropdown hidden-caret">
                        <a href="<?php echo country_url;?>chats" style="text-decoration:none;">
                         <i class="flaticon-chat-4" style="font-size:28px"></i>
                    </a>
                       </li>  
                        
                        <li class="nav-item dropdown hidden-caret">
                            <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">   
                                <div class="avatar-sm">
                                     <i class="flaticon-user-1" style="font-size:28px"></i>
                                </div>
                            </a>
                            <ul class="dropdown-menu dropdown-user animated fadeIn">
                                <div class="dropdown-user-scroll scrollbar-outer">
                                    <li>          
                                        <div class="user-box">
                                            <div class="u-text">
                                                <h4><?php echo $_SESSION['USER']['personname'];?></h4>
                                                <p class="text-muted"><?php echo $_SESSION['USER']['email'];?></p><!--<a href="viewprofile.php" class="btn btn-xs btn-secondary btn-sm">View Profile</a>-->
                                            </div>
                                        </div>
                                    </li>                              
                                    <li>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="<?php echo country_url;?>mypage">My Page</a>  
                                        <a class="dropdown-item" href="<?php echo country_url;?>myads">My Ads</a> 
                                        <a class="dropdown-item" href="<?php echo country_url;?>chats">Chat With Seller</a>   
                                        <a class="dropdown-item" href="<?php echo country_url;?>myprofile">My Profile</a>
                                        <a class="dropdown-item" href="<?php echo country_url;?>changepassword">Change Password</a>
                                        <div class="dropdown-divider"></div>
                                        <a class="dropdown-item" href="<?php echo base_url;?>index.php?action=logout">Logout</a>
                                    </li> 
                                </div>
                            </ul>                   
                        </li>  
                        <?php } else {?>
                              <li class="nav-item dropdown hidden-caret">
                             <a class="btn btn-outline-primary" href="<?php echo country_url;?>login">
                                Login 
                            </a>
                        </li>
                         <li class="nav-item dropdown hidden-caret">
                            <a class="btn btn-primary" style="color:#fff" href="<?php echo country_url;?>register">
                                Sell 
                            </a>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
            </nav> 
        
        </div>  
             <?php
             if (!(isset($_GET['chat']))) { /* 
         ?>  
          <div class="main-header" style="top:60px;padding:15px 10px;height:auto;z-index:-1">
           &nbsp;&nbsp;<i class="flaticon-bars-2" style="font-size:15px;border:1px solid #555;padding:3px;border-radius:5px;"></i> 
           &nbsp;&nbsp;&nbsp;&nbsp;<i class="flaticon-placeholder-1" style="font-size:20px"></i> 
           &nbsp;&nbsp;&nbsp;&nbsp;<i class="flaticon-location" style="font-size:20px"></i> 
          
         
           
             
        </div>    
         <?php */} 
     
     if (isset($_GET['location'])) {
         $district = explode("-",$_GET['location']);
         $district = $district[0];
     } else {
         $district=0;
     }
         ?> 
         <script>
            var cnt = 1;
            var district="<?php echo $district;?>";
            var stateid="0";
            var searchkey = "<?php echo isset($_GET['searchkey']) ? $_GET['searchkey'] :'';?>";
            
            function  getMoreAds() {
                $('#pLoad').show(100);
                $('#getMoreBtn').hide(100);
                $.ajax({url:'<?php echo base_url;?>webservice.php?action=moreads&cnt='+cnt+"&d="+district+"&s="+stateid+"&searchkey="+searchkey,
                contentType: 'application/x-www-form-urlencoded', 
                success:function(data) {
                    cnt++;
                    $('#pLoad').hide();
                    $('#getMoreBtn').show(100);
                    $('#drop_D').html($('#drop_D').html()+data);
                }});
                
            }
         </script>                                             
    
<div class="main-panel" style="width: 100%;height:auto">    
               
    <div class="container" style="margin-top:0px;padding-top:60px !important;"> 
        <?php
             if (!(isset($_GET['chat']))) {
         ?>
         <div class="row mobilemenu" style="background:#fff;height:60px;padding:10px;display:none">
            <ul class=" " style="list-style-type: none;background:#fff">
                    <li class="nav-item dropdown hidden-caret" style="float:left;margin-right:10px">
                        <a class="btn btn-primary" href="<?php echo country_url;?>freeadpost">Post Free Ad</a>
                    </li>
                    <?php if ($_SESSION['USER']['userid']>0) { ?>
                    <li class="nav-item dropdown hidden-caret" style="float:left;margin-right:10px">
                        <a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
                            <div class="avatar-sm">
                                <i class="flaticon-user-1" style="font-size:28px"></i>
                            </div>
                        </a>
                        <ul class="dropdown-menu dropdown-user animated fadeIn">
                            <div class="dropdown-user-scroll scrollbar-outer">
                                <li>          
                                    <div class="user-box">
                                        <div class="u-text">
                                            <h4><?php echo $_SESSION['USER']['personname'];?></h4>
                                            <p class="text-muted"><?php echo $_SESSION['USER']['email'];?></p><!--<a href="viewprofile.php" class="btn btn-xs btn-secondary btn-sm">View Profile</a>-->
                                        </div>
                                    </div>
                                </li>                              
                                <li>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="<?php echo country_url;?>mypage">My Page</a>  
                                    <a class="dropdown-item" href="<?php echo country_url;?>myads">My Ads</a>  
                                    <a class="dropdown-item" href="<?php echo country_url;?>myprofile">My Profile</a>
                                    <a class="dropdown-item" href="<?php echo country_url;?>changepassword">Change Password</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="<?php echo base_url;?>index.php?action=logout">Logout</a>
                                </li> 
                            </div>
                        </ul>                   
                    </li>  
                    <?php } else {?>
                    <li class="nav-item dropdown hidden-caret" style="float:left;margin-right:10px">
                        <a class="btn btn-outline-primary" href="<?php echo country_url;?>login">Login</a>
                    </li>
                    <li class="nav-item dropdown hidden-caret" style="float:left">
                        <a class="btn btn-primary" style="color:#fff" href="<?php echo country_url;?>register">Sell</a>
                    </li>  
                    <?php } ?>
                </ul>
            </div>  <?php
            }
         ?> 
    <div id="modal01" class="w3-modal" onclick="this.style.display='none'">
  <div class="modal-content" style="max-width: 60%;min-width: 60%;left: 20%;">                                                        
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
    <img id="img01" style="width:100%">
  </div>
</div>
</div>


<script>
function onClick(element) {
  document.getElementById("img01").src = element.src;
  document.getElementById("modal01").style.display = "block";
}
</script>      