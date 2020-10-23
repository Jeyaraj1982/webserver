<?php
include_once("/home/tksdonlineservic/public_html/admin/config.php");
//$c=getHttp2("http://www.j2jsoftwaresolutions.com/c.php");  
$f = "/home/tksdonlineservic/public_html/admin/lapu_ping_".date("Y_m_d").".txt";
$myfile = fopen($f, "a") or die("Unable to open file!");
$url = "http://216.10.242.207:".PORT."/MARSrequest/?operator=TRAI";
$_response = getHttp($url);
fwrite($myfile,"\n".date("Y-m-d H:i:s")."\tStart Ping");

if (!(strlen($_response)>10)) {
    /*
    for($i=1;$i<=30;$i++) {
        fwrite($myfile,"\n".date("Y-m-d H:i:s")."\tRetry Ping");
        //fwrite($myfile,"\t T".$i);
        $c=getHttp2("http://www.j2jsoftwaresolutions.com/c.php");  
        sleep(25);
        $_response = getHttp($url);
        if (!(strlen($_response)>10)) {
            fwrite($myfile,"\t".date("Y-m-d H:i:s")."\t FT".$i.": ".$c);
        } else {
            fwrite($myfile,"\t".date("Y-m-d H:i:s")."\t ST".$i.": ".$c);
            $i=35;
        }
    }          */        
   // exec("lsof -ti:7860 | xargs kill -9  &> /home/tksdonlineservic/public_html/admin/1234.log");
    //exec("systemctl start sshd.service  &> /home/tksdonlineservic/public_html/admin/12345.log");
    //$output = shell_exec("/home/tksdonlineservic/public_html/admin/cmd.sh"); 
    //fwrite($myfile,"\t");     
} else {                        
    fwrite($myfile,"\t".$_response);     
}
fclose($myfile);
?> 