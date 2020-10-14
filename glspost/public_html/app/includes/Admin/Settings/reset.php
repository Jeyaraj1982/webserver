<?php

define("DbHost","localhost");
define("DbName","happylif_application");
define("DbUser","happylif_user");
define("DbPassword","mysqluser@123");
 $dbhost = 'localhost:3036';
   $dbuser = 'root';
   $dbpass = 'rootpassword';
   $id = $dbname ."_". time(); 
   $backup_file = $id. '.gz';
   $command = "mysqldump --opt -h ".DbHost." -u ".DbUser." -p ".DbPassword." ". " ".DbName." | gzip > ".$backup_file;
   
   system($command);
   echo "application rest process completed. Backup ID: ".$id;

?>