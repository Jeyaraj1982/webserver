<?php
    $path = "http://www.leroyalgroup.in";
   //   $path = "http://localhost/leroyalgroup-in/httpdocs";
?>     
            <?php function menu($selected,$path) { ?>  
                <div style="text-align: left;"> 
                    <div id="menucontainer">
                        <div id="menunav">
                            <ul>
                                <li><a href="<?php echo $path;?>/index.php" title="css website navigation menus" <?php echo ($selected=='home') ? 'class="current"' : '';?>><span>Home</span></a></li>
                                <li><a href="<?php echo $path;?>/properties" title="css website navigation menus" <?php echo (strpos($_SERVER['SCRIPT_NAME'],"properties")) ? "class='current'" : '';?>><span>Properties</span></a></li>
                                <li><a href="<?php echo $path;?>/industerials" title="css website navigation menus" <?php echo (strpos($_SERVER['SCRIPT_NAME'],"industerials")) ? "class='current'" : '';?>><span>Industries</span></a></li>
                                <li><a href="<?php echo $path;?>/serviceappartments" title="css website navigation menus" <?php echo (strpos($_SERVER['SCRIPT_NAME'],"serviceappartments")) ? "class='current'" : '';?>><span>Service Appartments</span></a></li>
                                <li><a href="<?php echo $path;?>/constructions" title="css website navigation menus" <?php echo (strpos($_SERVER['SCRIPT_NAME'],"constructions")) ? "class='current'" : '';?>><span>Constructions</span></a></li>
                            </ul>               
                        </div>
                    </div>
                </div>
            <?php } ?>
<html>
    <head>
        <title>Le Royal Groups : Properties | Industerials | Service Appartments | Constructions </title>
        <style>
            .shadow2{box-shadow: 3px 3px 4px #818181;-webkit-box-shadow: 3px 3px 4px #818181;-moz-box-shadow: 3px 3px 4px #818181;filter: progid:DXImageTransform.Microsoft.dropShadow(color=#818181, offX=3, offY=3, positive=true);width: 250px;height:190px;padding-bottom:2px;}
            .shadow3 {border:1px solid #ccc;padding:4px;margin:2px;background:white;width: 350px;height:228px;padding-bottom:2px;}
            .subTitle{padding-top:10px;padding-bottom: 15px;border-bottom:1px solid #ccc;font-size:32px;color:#444;font-weight:normal;font-family:Calibri;margin-bottom:10px;}
            .titleContent{padding-top:10px;text-align:justify;line-height: 20px;font-size:14px;color:#444;font-family:arial;font-size:14px;;line-height:21px;color:#555}
            div {font-size:12px;font-family:Arial;}
        </style>
        <script type="text/javascript" src="<?php echo $path; ?>/jquery.js"></script>
        <script type="text/javascript" src="<?php echo $path; ?>/cal.js"></script>
        <script type="text/javascript">
            jQuery(document).ready(function () {
                $('input.one').simpleDatepicker();
                $('input.two').simpleDatepicker({ startdate: 2008, enddate: 2012 });
                $('input.three').simpleDatepicker({ chosendate: '02/18/2010', startdate: '02/15/2012', enddate: '12/31/2012' });
                $('input.four').simpleDatepicker({ x: 45, y: 3 });
            });
            function onmouseouverdiv(div) {$('#'+div).addClass('shadow2');}
            function onmouseoutdiv(div) {$('#'+div).removeClass('shadow2');$('#'+div).addClass('shadow3');}
        </script>
        <link rel="stylesheet" href="<?php echo $path; ?>/menu_style.css" type="text/css" />  
        <style>
        /* Menu Style */
                  #nav, #nav ul{
margin:0;
padding:0;
list-style-type:none;
list-style-position:outside;
position:relative;
line-height:1.5em; 
}

#nav a{
display:block;
padding:0px 5px;
border:1px solid #333;
color:#fff;
text-decoration:none;
background-color:#333;
}

#nav a:hover{
background-color:#fff;
color:#333;
}


#nav li{
float:left;
position:relative;
  line-height:30px;
 
}

  

#nav ul {
position:absolute;
display:none;
width:12em;
top:1.5em;
background:#333;
    top:32px;
 

}

#nav li ul a{
width:12em;
height:auto;
float:left;
}

#nav ul ul{
top:auto;

}    

#nav li ul ul {
left:12em;
margin:0px 0 0 10px;
}

#nav li:hover ul ul, #nav li:hover ul ul ul, #nav li:hover ul ul ul ul{
display:none;
}
#nav li:hover ul, #nav li li:hover ul, #nav li li li:hover ul, #nav li li li li:hover ul{
display:block;
}
        
        </style>
    </head>
    <body bgcolor="#f1f1f1">
    <center>
        <div style="width:980px;margin:0px auto;border:1px solid #ccc;border-radius:5px;background:white">
            <div style="font-size:40px;text-align: left;font-family:arial;padding:10px;margin:10px;"> 
                <table style="width:950px">
                    <tr>
                        <td><div style="font-size:40px;text-align: left;font-family:arial;"><a href="<?php echo $path;?>" ><img border=0 src="<?php echo $path;?>/images/logo.png" alt="Le Royal Groups"></a>   </div></td>
                        <td width="30%" valign="top">
                            <div style="text-align: right;font-family:arial;font-size:12px;">
                                <a href="<?php echo $path;?>/aboutus.php" style="color:#222;text-decoration:none;">About Us</a> | 
                                <a href="<?php echo $path;?>/contactus.php" style="color:#222;text-decoration:none;">Contact Us</a>
                            </div> 
                        </td>
                    </tr>
                </table>
            </div>