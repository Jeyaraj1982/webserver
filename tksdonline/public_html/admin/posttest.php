<?php
include_once("config.php");
$sh = "lsof -ti:7860 | xargs kill -9";
//exec($sh,$output,$ret); 
echo "<pre>".$output."</pre>"; 
echo "<pre>".$ret."</pre>"; 
echo "PORT: ".PORT."<br>";
 
for($i=1;$i<500;$i++) {
 $url = "http://216.10.242.207:".PORT."/MARSrequest/?operator=TRAI";
 //$url = "http://127.0.0.1:".PORT."/MARSrequest/index.htm?operator=TRAI";
        $_response = getHttp($url);
        echo "<br> - ".date("Y-m-d H:i:s")." ====";
        echo $_response;
        sleep(0.5);
        
}
?>