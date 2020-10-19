<?php

namespace App\Controller;

use System\BaseController;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

/**
 * Description of PageController
 *
 * @author gift
 */
class PageController extends BaseController {

    public $action;

    public function __construct($action) {
        parent::__construct();
        $this->action = $action;
    }

    public function action404() {
        $this->render('404');
    }

    public function actionHome() {
        $this->tags->title($this->params['index']['title']);
        $this->tags->meta('keywords', $this->params['index']['keywords']);
        $this->tags->meta('description', $this->params['index']['description']);
        $this->render('home');
    }

    public function actionAboutus() {
        $this->tags->title($this->params['about-us']['title']);
        $this->tags->meta('keywords', $this->params['about-us']['keywords']);
        $this->tags->meta('description', $this->params['about-us']['description']);
        $this->render('about-us');
    }

    public function actionSupport() {
        $this->tags->title($this->params['support']['title']);
        $this->tags->meta('keywords', $this->params['support']['keywords']);
        $this->tags->meta('description', $this->params['support']['description']);
        $this->render('support');
    }

    public function actionContactus() {
        $this->tags->title($this->params['contact-us']['title']);
        $this->tags->meta('keywords', $this->params['contact-us']['keywords']);
        $this->tags->meta('description', $this->params['contact-us']['description']);
        $this->render('contact-us');
    }

    public function actionLogin() {
        $this->tags->title($this->params['login']['title']);
        $this->tags->meta('keywords', $this->params['login']['keywords']);
        $this->tags->meta('description', $this->params['login']['description']);
        $this->render('login');
    }

    public function actionHowitworks() {
        $this->tags->title($this->params['how-it-works']['title']);
        $this->tags->meta('keywords', $this->params['how-it-works']['keywords']);
        $this->tags->meta('description', $this->params['how-it-works']['description']);
        $this->render('how-it-works');
    }

    public function actionSignup() {
        $this->tags->title($this->params['signup']['title']);
        $this->tags->meta('keywords', $this->params['signup']['keywords']);
        $this->tags->meta('description', $this->params['signup']['description']);
        $this->render('signup');
    }
    
     public function actionRegister() {
        $this->tags->title($this->params['signup']['title']);
        $this->tags->meta('keywords', $this->params['signup']['keywords']);
        $this->tags->meta('description', $this->params['signup']['description']);
        $this->render('register');
    }
    
    public function actionSend() {
        $this->tags->title($this->params['send']['title']);
        $this->tags->meta('keywords', $this->params['send']['keywords']);
        $this->tags->meta('description', $this->params['send']['description']);
        $this->render('send');
    }
    

    public function actionFaq() {
        $this->tags->title($this->params['faq']['title']);
        $this->tags->meta('keywords', $this->params['faq']['keywords']);
        $this->tags->meta('description', $this->params['faq']['description']);
        $this->render('faq');
    }

    
    public function actionReceive() {
        $this->tags->title($this->params['receive']['title']);
        $this->tags->meta('keywords', $this->params['receive']['keywords']);
        $this->tags->meta('description', $this->params['receive']['description']);
        $this->render('receive');
    }
   
    public function actionSpecialoffer() {
        $this->tags->title($this->params['special-offer']['title']);
        $this->tags->meta('keywords', $this->params['special-offer']['keywords']);
        $this->tags->meta('description', $this->params['special-offer']['description']);
        $this->render('special-offer');
    }

    public function actionCreatemember() {
        $this->tags->title($this->params['createmember']['title']);
        $this->tags->meta('keywords', $this->params['createmember']['keywords']);
        $this->tags->meta('description', $this->params['createmember']['description']);
        $this->render('createmember');
    } 
    
    public function actionContactform() {
        //print_r($_POST);
        $mail = $this->sendMail($_POST);
        echo $mail;
    }

    public function sendMail($data) {
        $mail = new PHPMailer(true);
        if (filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            try {
                //Server settings
                $mail->SMTPDebug = 0; //$_SERVER['APP_DEBUG'];                                       // Enable verbose debug output
                $mail->isSMTP();                                            // Set mailer to use SMTP
                $mail->Host = '';  // Specify main and backup SMTP servers
                $mail->SMTPAuth = true;                                   // Enable SMTP authentication
                $mail->Username = '';                     // SMTP username
                $mail->Password = '';                               // SMTP password
                $mail->SMTPSecure = 'TLS';                                  // Enable TLS encryption, `ssl` also accepted
                $mail->Port = '587';                                   // TCP port to connect to
                //Recipients
                $mail->setFrom('ks@ggcash.in', $data['name']);
                $mail->addAddress('', '');     // Add a recipient
                $mail->addAddress('', '');     // Add a recipient
                $mail->addAddress('', '');
                // Content
                $mail->isHTML(true);                                  // Set email format to HTML
                $mail->Subject = '';
                $mail->Body = "<table>
  
            <tr>
              <td> first name</td>
              <td>" . $data['name'] . "</td>
            </tr>
            <tr>
              <td> email</td>
              <td>" . $data['email'] . "</td>
            </tr>
            <tr>
              <td> phone number</td>
              <td>" . $data['phone'] . "</td>
            </tr>
            <tr>
              <td> comment</td>
              <td>" . $data['message'] . "</td>
            </tr>
            <tr>
              <td> ip</td>
              <td>" . $_SERVER['REMOTE_ADDR'] . "</td>
            </tr>
          </table>";

                $mail->send();
                echo "Sent";
                return 'Message has been sent';
            } catch (Exception $e) {
                return "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
        } else {
            return "invalid email id";
        }
    }

}
