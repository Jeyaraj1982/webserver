<?php


use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Dotenv\Dotenv;

require __DIR__ . '/vendor/autoload.php';
require __DIR__ . '/assets/assets.php';

$_SERVER['BASE_URL']="https://nmskamarajpolytechnic.com/";
defined('DS') or define('DS', DIRECTORY_SEPARATOR);
defined('ROOT_PATH') or define('ROOT_PATH', __DIR__);



use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
    require __DIR__.'/lib/mail/src/Exception.php';
    require __DIR__.'/lib/mail/src/PHPMailer.php';
    require __DIR__.'/lib/mail/src/SMTP.php';
    $mail    = new PHPMailer;
    function reInitMail() {
        global $mail;
        $mail    = new PHPMailer;
    } 
                    
    include_once(__DIR__."/webadmin/mysql.php");
    $mysql =   new MySql();
    
    include_once(__DIR__."/includes/mailcontroller.php");
    $firstcourse = $mysql->select("select * from _tbl_courses");
   // print_r($firstcourse);

if (!isset($_SERVER['APP_ENV'])) {
    if (!class_exists(Dotenv::class)) {
        throw new \RuntimeException('APP_ENV environment variable is not defined. You need to define environment variables for configuration or add "symfony/dotenv" as a Composer dependency to load variables from a .env file.');
    }
    (new Dotenv())->load(__DIR__ . '/.env');
}

$request = Request::createFromGlobals();
(new System\ABA($request))->run();

