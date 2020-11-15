<?php

namespace App\Controller;

use System\BaseController;

/**
 * Description of PageController
 *
 * @author gift
 */
class PageController extends BaseController
{

    public $action;

    public function __construct($action)
    {
        parent::__construct();
        $this->action = $action;
    }

    public function action404()
    {
        $this->render('404');
    }

    public function actionAboutUs()
    {
        $this->tags->title($this->params['about-us']['title']);
        $this->tags->meta('keywords', $this->params['about-us']['keywords']);
        $this->tags->meta('description', $this->params['about-us']['description']);
        $this->tags->og('title', $this->params['about-us']['title']);
        $this->tags->og('description', $this->params['about-us']['description']);
        $this->render('about');
    }

    public function actionGallery()
    {
        $this->tags->title($this->params['gallery']['title']);
        $this->tags->meta('keywords', $this->params['gallery']['keywords']);
        $this->tags->meta('description', $this->params['gallery']['description']);
        $this->tags->og('title', $this->params['gallery']['title']);
        $this->tags->og('description', $this->params['gallery']['description']);
        $this->render('gallery');
    }

    public function actionHostel()
    {
        $this->tags->title($this->params['hostel']['title']);
        $this->tags->meta('keywords', $this->params['hostel']['keywords']);
        $this->tags->meta('description', $this->params['hostel']['description']);
        $this->tags->og('title', $this->params['hostel']['title']);
        $this->tags->og('description', $this->params['hostel']['description']);
        $this->render('hostel');
    }

    public function actionLibrary()
    {
        $this->tags->title($this->params['library']['title']);
        $this->tags->meta('keywords', $this->params['library']['keywords']);
        $this->tags->meta('description', $this->params['library']['description']);
        $this->tags->og('title', $this->params['library']['title']);
        $this->tags->og('description', $this->params['library']['description']);
        $this->render('library');
    }

    public function actionTransport()
    {
        $this->tags->title($this->params['transport']['title']);
        $this->tags->meta('keywords', $this->params['transport']['keywords']);
        $this->tags->meta('description', $this->params['transport']['description']);
        $this->tags->og('title', $this->params['transport']['title']);
        $this->tags->og('description', $this->params['transport']['description']);
        $this->render('transport');
    }

    public function actionSalientFeatures()
    {
        $this->tags->title($this->params['salient-features']['title']);
        $this->tags->meta('keywords', $this->params['salient-features']['keywords']);
        $this->tags->meta('description', $this->params['salient-features']['description']);
        $this->tags->og('title', $this->params['salient-features']['title']);
        $this->tags->og('description', $this->params['salient-features']['description']);
        $this->render('salient-features');
    }

    public function actionActivities()
    {
        $this->tags->title($this->params['activities']['title']);
        $this->tags->meta('keywords', $this->params['activities']['keywords']);
        $this->tags->meta('description', $this->params['activities']['description']);
        $this->tags->og('title', $this->params['activities']['title']);
        $this->tags->og('description', $this->params['activities']['description']);
        $this->render('activities');
    }

    public function actionOthers()
    {
        $this->tags->title($this->params['others']['title']);
        $this->tags->meta('keywords', $this->params['others']['keywords']);
        $this->tags->meta('description', $this->params['others']['description']);
        $this->tags->og('title', $this->params['others']['title']);
        $this->tags->og('description', $this->params['others']['description']);
        $this->render('others');
    }

    public function actionCampusTour()
    {
        $this->tags->title($this->params['campus-tour']['title']);
        $this->tags->meta('keywords', $this->params['campus-tour']['keywords']);
        $this->tags->meta('description', $this->params['campus-tour']['description']);
        $this->tags->og('title', $this->params['campus-tour']['title']);
        $this->tags->og('description', $this->params['campus-tour']['description']);
        $this->render('campus-tour');
    }

    public function actionSports()
    {
        $this->tags->title($this->params['sports']['title']);
        $this->tags->meta('keywords', $this->params['sports']['keywords']);
        $this->tags->meta('description', $this->params['sports']['description']);
        $this->tags->og('title', $this->params['sports']['title']);
        $this->tags->og('description', $this->params['sports']['description']);
        $this->render('sports');
    }

    public function actionSocialActivities()
    {
        $this->tags->title($this->params['social-activities']['title']);
        $this->tags->meta('keywords', $this->params['social-activities']['keywords']);
        $this->tags->meta('description', $this->params['social-activities']['description']);
        $this->tags->og('title', $this->params['social-activities']['title']);
        $this->tags->og('description', $this->params['social-activities']['description']);
        $this->render('social-activities');
    }

    public function actionSpecialEventsCelebrations()
    {
        $this->tags->title($this->params['special-events-celebrations']['title']);
        $this->tags->meta('keywords', $this->params['special-events-celebrations']['keywords']);
        $this->tags->meta('description', $this->params['special-events-celebrations']['description']);
        $this->tags->og('title', $this->params['special-events-celebrations']['title']);
        $this->tags->og('description', $this->params['special-events-celebrations']['description']);
        $this->render('special-events-celebrations');
    }


    public function actionContact()
    {
        $this->tags->title($this->params['contact-us']['title']);
        $this->tags->meta('keywords', $this->params['contact-us']['keywords']);
        $this->tags->meta('description', $this->params['contact-us']['description']);
        $this->tags->og('title', $this->params['contact-us']['title']);
        $this->tags->og('description', $this->params['contact-us']['description']);
        $this->render('contact');
    }

    public function actionMission()
    {
        $this->tags->title($this->params['mission']['title']);
        $this->tags->meta('keywords', $this->params['mission']['keywords']);
        $this->tags->meta('description', $this->params['mission']['description']);
        $this->tags->og('title', $this->params['mission']['title']);
        $this->tags->og('description', $this->params['mission']['description']);
        $this->render('mission');
    }

    public function actionActionPlanKeyStrategy()
    {
        $this->tags->title($this->params['action-plan-key-strategy']['title']);
        $this->tags->meta('keywords', $this->params['action-plan-key-strategy']['keywords']);
        $this->tags->meta('description', $this->params['action-plan-key-strategy']['description']);
        $this->tags->og('title', $this->params['action-plan-key-strategy']['title']);
        $this->tags->og('description', $this->params['action-plan-key-strategy']['description']);
        $this->render('action-plan-key-strategy');
    }

    public function actionPlacementCell()
    {
        $this->tags->title($this->params['placement-cell']['title']);
        $this->tags->meta('keywords', $this->params['placement-cell']['keywords']);
        $this->tags->meta('description', $this->params['placement-cell']['description']);
        $this->tags->og('title', $this->params['placement-cell']['title']);
        $this->tags->og('description', $this->params['placement-cell']['description']);
        $this->render('placement-cell');
    }

    public function actionPlacementTraining()
    {
        $this->tags->title($this->params['placement-training']['title']);
        $this->tags->meta('keywords', $this->params['placement-training']['keywords']);
        $this->tags->meta('description', $this->params['placement-training']['description']);
        $this->tags->og('title', $this->params['placement-training']['title']);
        $this->tags->og('description', $this->params['placement-training']['description']);
        $this->render('placement-training');
    }

    public function actionTerms()
    {
        $this->tags->title($this->params['terms']['title']);
        $this->tags->meta('keywords', $this->params['terms']['keywords']);
        $this->tags->meta('description', $this->params['terms']['description']);
        $this->tags->og('title', $this->params['terms']['title']);
        $this->tags->og('description', $this->params['terms']['description']);
        $this->render('terms');
    }
    public function actionFirstyear()
    {
        $this->tags->title($this->params['firstyear']['title']);
        $this->tags->meta('keywords', $this->params['firstyear']['keywords']);
        $this->tags->meta('description', $this->params['firstyear']['description']);
        $this->tags->og('title', $this->params['firstyear']['title']);
        $this->tags->og('description', $this->params['firstyear']['description']);
        $this->render('firstyear');
    }
    public function actionviewform()
    {
        $this->tags->title($this->params['viewform']['title']);
        $this->tags->meta('keywords', $this->params['viewform']['keywords']);
        $this->tags->meta('description', $this->params['viewform']['description']);
        $this->tags->og('title', $this->params['viewform']['title']);
        $this->tags->og('description', $this->params['viewform']['description']);
        $this->render('viewform');
    }
    public function actionviewfirstyear()
    {
        $this->tags->title($this->params['viewfirstyear']['title']);
        $this->tags->meta('keywords', $this->params['viewfirstyear']['keywords']);
        $this->tags->meta('description', $this->params['viewfirstyear']['description']);
        $this->tags->og('title', $this->params['viewfirstyear']['title']);
        $this->tags->og('description', $this->params['viewfirstyear']['description']);
        $this->render('viewfirstyear');
    }
    public function actioneditfirstyear()
    {
        $this->tags->title($this->params['editfirstyear']['title']);
        $this->tags->meta('keywords', $this->params['editfirstyear']['keywords']);
        $this->tags->meta('description', $this->params['editfirstyear']['description']);
        $this->tags->og('title', $this->params['editfirstyear']['title']);
        $this->tags->og('description', $this->params['editfirstyear']['description']);
        $this->render('editfirstyear');
    }
    public function actionsecondyear()
    {
        $this->tags->title($this->params['secondyear']['title']);
        $this->tags->meta('keywords', $this->params['secondyear']['keywords']);
        $this->tags->meta('description', $this->params['secondyear']['description']);
        $this->tags->og('title', $this->params['secondyear']['title']);
        $this->tags->og('description', $this->params['secondyear']['description']);
        $this->render('secondyear');
    }
    public function actionviewsecondyear()
    {
        $this->tags->title($this->params['viewsecondyear']['title']);
        $this->tags->meta('keywords', $this->params['viewsecondyear']['keywords']);
        $this->tags->meta('description', $this->params['viewsecondyear']['description']);
        $this->tags->og('title', $this->params['viewsecondyear']['title']);
        $this->tags->og('description', $this->params['viewsecondyear']['description']);
        $this->render('viewsecondyear');
    }
    public function actioneditsecondyear()
    {
        $this->tags->title($this->params['editsecondyear']['title']);
        $this->tags->meta('keywords', $this->params['editsecondyear']['keywords']);
        $this->tags->meta('description', $this->params['editsecondyear']['description']);
        $this->tags->og('title', $this->params['editsecondyear']['title']);
        $this->tags->og('description', $this->params['editsecondyear']['description']);
        $this->render('editsecondyear');
    }

    public function actionContactSubmit()
    {
        if (isset($_POST['contact_submit'])) {

            $course = $_POST['course'];
            $first_name = $_POST['first_name'];
            $email_id = $_POST['email_id'];
            $mobile_number = $_POST['mobile_number'];
            $message = $_POST['message'];

            if (isset($_POST['registration_date'])) {
                $date = $_POST['registration_date'];
                $registration_date = date("Y-m-d", strtotime($date));
            } else {
                $registration_date = date('Y-m-d');
            }


            $sql1 = mysqli_query($this->db->conn, "INSERT INTO  bookings (first_name,email_id,mobile_number,message,course,registration_date,booking_date)VALUES ('$first_name','$email_id','$mobile_number','$message','$course','$registration_date',NOW())");
            $id = mysqli_insert_id($this->db->conn);

            if ($sql1) {
                echo '1';
            } else {
                echo '0';
            }
        }
    }

    /* public function actionSendmail() {
      Read the form values
      $success = false;
      $senderName = isset($_POST['name']) ? preg_replace("/[^\.\-\' a-zA-Z0-9]/", "", $_POST['name']) : "";
      $senderEmail = isset($_POST['email']) ? preg_replace("/[^\.\-\_\@a-zA-Z0-9]/", "", $_POST['email']) : "";
      $senderPhone = isset($_POST['phone']) ? preg_replace("/[^\.\-\' a-zA-Z0-9]/", "", $_POST['phone']) : "";
      $subject = isset($_POST['subject']) ? preg_replace("/[^\.\-\' a-zA-Z0-9]/", "", $_POST['subject']) : "";
      $message = isset($_POST['message']) ? preg_replace("/(From:|To:|BCC:|CC:|Subject:|Content-Type:)/", "", $_POST['message']) : "";

      If all values exist, send the email
      if ($senderName && $senderEmail && $message) {
      $recipient = '4D' . " <" . 'prabhu@nexifysoftware.com' . ">";
      $headers = "From: " . $senderName . " <" . $senderEmail . ">";
      $mailBody = 'Sender Name: ' . $senderName . "\r\n" . 'Sender Email: ' . $senderEmail . "\r\n" . 'Sender Phone: ' . $senderPhone . "\r\n" . 'Subject: ' . $subject . "\r\n" . 'Message: ' . $message;
      $success = mail($recipient, $subject, $mailBody, $headers);
      echo "<p class='success'>Thanks for contacting us. We will contact you ASAP!</p>";
      }
      } */
}
