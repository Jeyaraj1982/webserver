<?php

                          
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Dotenv\Dotenv;

require __DIR__ . '/vendor/autoload.php';

 session_start();
date_default_timezone_set("Asia/Kolkata");

    
defined('DS') or define('DS', DIRECTORY_SEPARATOR);
defined('ROOT_PATH') or define('ROOT_PATH', __DIR__);


if (!isset($_SERVER['APP_ENV'])) {
    if (!class_exists(Dotenv::class)) {
        throw new \RuntimeException('APP_ENV environment variable is not defined. You need to define environment variables for configuration or add "symfony/dotenv" as a Composer dependency to load variables from a .env file.');
    }
    (new Dotenv())->load(__DIR__ . '/.env');
} 

defined('BASE_URL') or define('BASE_URL',$_ENV['BASE_URL']);

 
     if (isset($_GET['action']) && $_GET['action']=="logout") {
        session_destroy();
        $_SESSION['User']=array();
        ?>
         <script>
                 location.href='../index.php';
                 </script>
        <?php
    }
    


$request = Request::createFromGlobals();
(new System\ABA($request))->run();

