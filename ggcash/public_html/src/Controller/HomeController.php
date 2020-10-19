<?php

namespace App\Controller;

use System\BaseController;

/**
 * Description of HomeController
 *
 * @author gift
 */
class HomeController extends BaseController {

    public $action;

    public function __construct($action) {
        parent::__construct();
        $this->action = $action;
    }

    public function index() {
        $this->tags->title($this->params['home']['title']);
        $this->tags->meta('keywords', $this->params['home']['keywords']);
        $this->tags->meta('description', $this->params['home']['description']);
        $this->tags->og('title', $this->params['home']['title']);
        $this->tags->og('description', $this->params['home']['description']);
        $this->render('index');
    }

}
