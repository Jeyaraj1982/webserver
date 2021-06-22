<?php
$sh = "lsof -ti:7860 | xargs kill -9  &> 123.log";
$sh = "./cmd.sh";
//$output = shell_exec($sh); 
$output = shell_exec($sh); 
//exec($sh,$output,$ret); 
echo "<pre>".$output."</pre>"; 
echo "<pre>".$ret."</pre>"; 
echo "refreshed<br>";
echo "PORT: ".PORT."<br>";
?>