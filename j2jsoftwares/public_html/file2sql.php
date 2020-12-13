 <?php
$file = fopen("file2sql-1.txt","r");

while(! feof($file))
  {
  echo fgets($file). "<br />";
  }

fclose($file);
?>  