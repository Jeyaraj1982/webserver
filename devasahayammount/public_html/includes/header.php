<!DOCTYPE html>
    <html lang="en">
    <head>
        <title><?php echo JFrame::getAppSetting('sitetitle');?></title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.1/themes/smoothness/jquery-ui.css">
        <script src="//code.jquery.com/jquery-1.10.2.js"></script>
       <!-- <script src="//code.jquery.com/ui/1.11.1/jquery-ui.js"></script>
        <!--<link rel="stylesheet" href="/resources/demos/style.css">-->
        <link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Droid+Sans' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" type="text/css" media="all" href="assets/css/jsDatePick_ltr.min.css" />
        <!--<script type="text/javascript" src="assets/js/jsDatePick.min.1.3.js"></script> -->
        <script type="text/javascript" src="assets/js/jsDatePick.jquery.full.1.3.js"></script> 
        <script src="assets/js/jquery-ui.js"></script>
        <link rel="stylesheet" href="assets/css/jquery-ui.css">      
        <!--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
        <script type="text/javascript" src="/js/fancybox-1.3.4/jquery.easing-1.3.pack.js"></script>
        <script type="text/javascript" src="/js/fancybox-1.3.4/jquery.mousewheel-3.0.4.pack.js"></script>
        <script type="text/javascript" src="/js/fancybox-1.3.4/jquery.fancybox-1.3.4.js"></script>
        <link rel="stylesheet" type="text/css" href="/js/fancybox-1.3.4/jquery.fancybox-1.3.4.css" media="screen" />-->
        <!--<link rel="stylesheet" type="text/css" href="/css/style.css" media="screen" />
        <script type="text/javascript" src="/js/web.js?m=20100203"></script>-->
        <style >
            .jTitle {font-family:Oswald;font-size:18px;border-bottom:3px solid #222;color:#222;margin-bottom:5px;}
            .jContent {font-family:'Droid Sans';font-size:13px;color:#444444}
            .jContent_title {line-height:30px;margin-bottom:5px;font-size:15px;color:#047D9B;font-family:'Droid Sans';font-weight:Bold;border-bottom:2px solid #FCFCFC;width:auto}
            .jContent_title:hover {cursor:pointer;border-bottom:2px solid #047D9B;font-size:15px;color:#047D9B;font-family:'Droid Sans';font-weight:Bold;}
            .jMore {text-align:right;margin:5px;margin-right:10px;font-family:'Droid Sans';font-size:12px;color:#C42121}
            .ui-datepicker {font-size:9pt;font-family:Verdana; background-color:yellow;}
            .datepicker{color:blue;text-decoration: none;font-size:inherit;font-size:12px;position: relative; top: 1px;}
            .margtop20 {margin-top: 20px !important;}
            .menu {color:white;font-family:arial;font-size:12px;text-decoration: none;font-weight:bold}
            .body {margin:4px;margin-bottom:0px;margin-left:0px;margin-right:0px}
            .title{color:#6F7F05;margin-top:20px;padding-bottom:15px;margin-bottom:30px;border-bottom:1px solid #AFC719;font-size:24px;font-family:arial;font-weight:bold}
            .content{color:#222;font-family:arial;font-size:13px;line-height:20px;text-align: justify;padding:10px;}
            .table{font-size:12px;font-family:arial;text-align: justify;}
            .textBox {background-color:#FFFFFF;border: 2px solid #ebebeb;border-radius: 4px;color: #999;display: block;font-size: 14px;height: 34px;line-height: 1.42857;padding: 6px 0 6px 12px;transition: border-color 0.15s ease-in-out 0s, box-shadow 0.15s ease-in-out 0s;vertical-align: middle;width: 45%;}
            .sub_Menu {text-transform: uppercase;color:#<?php echo JFrame::getAppSetting('menufontcolor');?>;cursor: pointer; float: left; font-family: '<?php echo JFrame::getAppSetting('menufont');?>';font-size:<?php echo JFrame::getAppSetting('menufontsize');?>px;padding: 5px 8px;text-align: left;text-decoration:none;}
            .sub_Menu:hover{color:#<?php echo JFrame::getAppSetting('headerhover');?>;font-family:'<?php echo JFrame::getAppSetting('menufont');?>';font-size:'<?php echo JFrame::getAppSetting('menufontsize');?>px';text-decoration: underline;}                                              
            .rmenu {font-size:13px;font-family:'comic sans ms';text-decoration:none;color:#333;}
            .rmenu:hover {font-size:13px;font-family:'comic sans ms';text-decoration:underline;color:#222;}
            .Jfooter {text-transform: uppercase;color:<?php echo JFrame::getAppSetting('footerfontcolor');?>;cursor: pointer; float: left; font-family:'<?php echo JFrame::getAppSetting('footerfont');?>';font-size:<?php echo JFrame::getAppSetting('footerfontsize');?>;padding: 5px 15px;text-align: left;text-decoration:none;}
            .Jfooter:hover{color:<?php echo JFrame::getAppSetting('footerhover');?>;font-family:'<?php echo JFrame::getAppSetting('footerfont');?>';font-size:'<?php echo JFrame::getAppSetting('footerfontsize');?>';text-decoration: underline;}
           
        </style>
        <style>


.myButton {
    -moz-box-shadow: 0px 10px 14px -7px #3e7327;
    -webkit-box-shadow: 0px 10px 14px -7px #3e7327;
    box-shadow: 0px 10px 14px -7px #3e7327;
    background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #77b55a), color-stop(1, #72b352));
    background:-moz-linear-gradient(top, #77b55a 5%, #72b352 100%);
    background:-webkit-linear-gradient(top, #77b55a 5%, #72b352 100%);
    background:-o-linear-gradient(top, #77b55a 5%, #72b352 100%);
    background:-ms-linear-gradient(top, #77b55a 5%, #72b352 100%);
    background:linear-gradient(to bottom, #77b55a 5%, #72b352 100%);
    filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#77b55a', endColorstr='#72b352',GradientType=0);
    background-color:#77b55a;
    -moz-border-radius:4px;
    -webkit-border-radius:4px;
    border-radius:4px;
    border:1px solid #4b8f29;
    display:inline-block;
    cursor:pointer;
    color:#ffffff;
    font-family:arial;
    font-size:13px;
    font-weight:bold;
    padding:6px 12px;
    text-decoration:none;
    text-shadow:0px 1px 0px #5b8a3c;
}
.myButton:hover {
    background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #72b352), color-stop(1, #77b55a));
    background:-moz-linear-gradient(top, #72b352 5%, #77b55a 100%);
    background:-webkit-linear-gradient(top, #72b352 5%, #77b55a 100%);
    background:-o-linear-gradient(top, #72b352 5%, #77b55a 100%);
    background:-ms-linear-gradient(top, #72b352 5%, #77b55a 100%);
    background:linear-gradient(to bottom, #72b352 5%, #77b55a 100%);
    filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#72b352', endColorstr='#77b55a',GradientType=0);
    background-color:#72b352;
}
.myButton:active {
    position:relative;
    top:1px;
}

</style>
    <script>
            $(function() {$( "#datepicker" ).datepicker({showOn: 'button',buttonImage:'http://theonlytutorials.com/demo/x_office_calendar.png',width:20,height:20,buttonImageOnly: true,changeMonth: true,changeYear: true,showAnim: 'slideDown',duration: 'fast',dateFormat: 'dd-mm-yy'}); });
            
             
                                       function getMasses(mass,rdiv) {
                                            $('#m_'+rdiv).html("Requesting.....");    
                                           $.ajax({url:'webservice.php?div='+rdiv+'&mdate='+mass,success:function(data){
                                            $('#m_'+rdiv).html(data)   ;
                                           }});
                                       }
                                 
        </script>
    </head>  
    <body style="background:url('assets/cms/<?php echo JFrame::getAppSetting('backgroundimage');?>') <?php echo JFrame::getAppSetting('sitebgposition');?>;background-color:<?php echo JFrame::getAppSetting('backgroundcolor');?>;margin:0px;">
        <table align="center" cellpadding="0" cellspacing="0"style="width:1024px; border:0px solid #ccc;border-top:none;">
            <tr>
                <td style="text-align:center;padding:5px;padding-bottom:0px;">
                    <img src='assets/cms/<?php echo JFrame::getAppSetting('logo');?>?r=2' style="margin-bottom: -5px;" >
                </td>
            </tr>
            <tr>
                <td id="subMenu" style="height:30px;clear:both;background:url('assets/cms/<?php echo JFrame::getAppSetting('menubackgroundimage');?>');background-color:<?php echo JFrame::getAppSetting('menubgcolor');?>;padding: 5px 5px 5px 10px;">
                    <a class="sub_Menu" href='index.php'>Home</a>
                    <?php foreach(MenuItems::getHeaderMenuItems() as $m) { ?>
                    <?php 
                        $pageurl = ($m['pageid']>0) ? "index.php?page=".$m['pageid'] : "http://".$m['customurl'] ;
                        $target  = ($m['target']>0) ? " target='_blank' " : "";
                        ?>
                        <a class="sub_Menu" href='<?php echo $pageurl;?>' <?php echo $target; ?> ><?php echo $m['menuname'];?></a>
                    <?php } ?>
                       <!-- <a class="sub_Menu" href='http://devasahayammountshrine.com/downloads.php?downloads=9' <?php echo $target; ?> >NEWS LETTERS</a>-->
                </td>
            </tr>
            <tr>
                <td>
                    <style type="text/css">
                        ul.bjqs{position:relative; list-style:none;padding:0;margin:0;overflow:hidden; display:none;}
                        li.bjqs-slide{position:absolute; display:none;}
                        ul.bjqs-controls{list-style:none;margin:0;padding:0;z-index:9999;}
                        ul.bjqs-controls.v-centered li a{position:absolute;}
                        ul.bjqs-controls.v-centered li.bjqs-next a{right:0;}
                        ul.bjqs-controls.v-centered li.bjqs-prev a{left:0;}
                        ol.bjqs-markers{list-style: none; padding: 0; margin: 0; width:100%;display:none;}
                        ol.bjqs-markers.h-centered{text-align: center;}
                        ol.bjqs-markers li{display:inline;}
                        ol.bjqs-markers li a{display:inline-block;}
                        p.bjqs-caption{display:block;width:96%;margin:0;padding:2%;position:absolute;bottom:0;}
                        #container{max-width:620px;margin:0 auto;padding-bottom:80px;}
                        #banner-fade, #banner-slide{margin-bottom:0px;}
                        ul.bjqs-controls.v-centered li a{display:block;padding:10px;background:#fff;font-family:Trebuchet MS;font-size:13px;color:#000;text-decoration: none;}
                        ul.bjqs-controls.v-centered li a:hover{background:#000;color:#fff;}
                        ol.bjqs-markers li a{padding:5px 10px;background:#000;color:#fff;margin:5px;text-decoration: none;}
                        ol.bjqs-markers li.active-marker a, ol.bjqs-markers li a:hover{background: #999;}
                        p.bjqs-caption{background: rgba(255,255,255,0.5);}
                    </style>
                    <script src="assets/js/bjqs-1.3.min.js"></script>
                    <div id="banner-fade">
                        <ul class="bjqs">
                            <?php foreach(JSlider::getActiveSliders() as $sliderimage) {?>
                            <li><img src='assets/cms/<?php echo $sliderimage['filepath'];?>'></li>
                            <?php } ?>
                        </ul>
                    </div>
                    <script class="secret-source">jQuery(document).ready(function($) {$('#banner-fade').bjqs({heigh:350,width:1024,responsive:true});});</script>
                </td>
            </tr> 

            <tr>
                <td>
<div style="background:#fff;text-align:center;padding:10px;font-size:14px;">

                    <table cellpadding="0" cellspacing="0" width="100%">
                        <tr>
                            <?php
                                if (JFrame::getAppSetting('layout')==2) {
                                    include_once("includes/side.php");
                                }
                            ?>
                            <td valign="top" style="background:#fff;padding:10px;">
