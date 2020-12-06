<?php
                                                                                          include_once("config.php");
                                                                                          
                                                                                      ?> <link href="https://fonts.googleapis.com/css?family=Titillium+Web" rel="stylesheet"> 
<style>
    span, div, td, tr, p, ul, li, a {font-family:'Titillium Web'}
    a {color:#D83908;text-decoration: none;}
    a:hover {text-decoration:underline;}
</style>
  <script src="assets/jquery.min.js" type="text/javascript"></script>

   <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
   <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
 
   <style>
input[type="submit"] {-moz-box-shadow:inset 0px 1px 0px 0px #cf866c;-webkit-box-shadow:inset 0px 1px 0px 0px #cf866c;box-shadow:inset 0px 1px 0px 0px #cf866c;background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #d0451b), color-stop(1, #bc3315));background:-moz-linear-gradient(top, #d0451b 5%, #bc3315 100%);background:-webkit-linear-gradient(top, #d0451b 5%, #bc3315 100%);background:-o-linear-gradient(top, #d0451b 5%, #bc3315 100%);background:-ms-linear-gradient(top, #d0451b 5%, #bc3315 100%);background:linear-gradient(to bottom, #d0451b 5%, #bc3315 100%);filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#d0451b', endColorstr='#bc3315',GradientType=0);background-color:#d0451b;-moz-border-radius:3px;-webkit-border-radius:3px;border-radius:3px;border:1px solid #942911;display:inline-block;cursor:pointer;color:#ffffff;font-family:Arial;font-size:12px;padding:2px 24px 3px;text-decoration:none;text-shadow:0px 1px 0px #854629;}
input[type="submit"]:hover {background:-webkit-gradient(linear, left top, left bottom, color-stop(0.05, #bc3315), color-stop(1, #d0451b));background:-moz-linear-gradient(top, #bc3315 5%, #d0451b 100%);background:-webkit-linear-gradient(top, #bc3315 5%, #d0451b 100%);background:-o-linear-gradient(top, #bc3315 5%, #d0451b 100%);background:-ms-linear-gradient(top, #bc3315 5%, #d0451b 100%);background:linear-gradient(to bottom, #bc3315 5%, #d0451b 100%);filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#bc3315', endColorstr='#d0451b',GradientType=0);background-color:#bc3315;}
input[type="submit"]:active {position:relative;top:1px;}  

   input[type="text"] {width:250px;padding:2px;border:1px solid #ccc}
   input[type="password"] {width:250px;padding:2px;border:1px solid #ccc}
   textarea {padding:2px;border:1px solid #ccc}
   select {width:250px;padding:2px;border:1px solid #ccc}
   
   .drop_menu {
    background:#FE4102;
    padding:0;
    margin:0;
    list-style-type:none;
    height:43px;
}
.drop_menu li { float:left; }
.drop_menu li a {
    padding:9px 20px;
    display:block;
    color:#fff;
    text-decoration:none;
    
}

/* Submenu */
.drop_menu ul {
    position:absolute;
    left:-9999px;
    top:-9999px;
    list-style-type:none;
}
.drop_menu li:hover { position:relative; background:#F79679; }
.drop_menu li:hover ul {
    left:0px;
    top:43px;
    background:#F79679;
    padding:0px;
}

.drop_menu li:hover ul li a {
    padding:5px;
    display:block;
    width:168px;
    text-indent:15px;
    background-color:#F79679;
}
.drop_menu li:hover ul li a:hover { background:#EA3802; }
  p {margin:0px;}
   </style><div>