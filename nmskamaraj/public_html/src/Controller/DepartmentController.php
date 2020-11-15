<?php

namespace App\Controller;

use System\BaseController;

/**
 * Description of PageController
 *
 * @author gift
 */
class DepartmentController extends BaseController
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

    public function actionAutomobileEngineering()
    {
        $this->tags->title($this->params['automobile-engineering']['title']);
        $this->tags->meta('keywords', $this->params['automobile-engineering']['keywords']);
        $this->tags->meta('description', $this->params['automobile-engineering']['description']);
        $this->tags->og('title', $this->params['automobile-engineering']['title']);
        $this->tags->og('description', $this->params['automobile-engineering']['description']);
        $this->render('automobile-engineering');
    }
    public function actionComputerEngineering()
    {
        $this->tags->title($this->params['computer-engineering']['title']);
        $this->tags->meta('keywords', $this->params['computer-engineering']['keywords']);
        $this->tags->meta('description', $this->params['computer-engineering']['description']);
        $this->tags->og('title', $this->params['computer-engineering']['title']);
        $this->tags->og('description', $this->params['computer-engineering']['description']);
        $this->render('computer-engineering');
    }

    public function actionCivilEngineering()
    {
        $this->tags->title($this->params['civil-engineering']['title']);
        $this->tags->meta('keywords', $this->params['civil-engineering']['keywords']);
        $this->tags->meta('description', $this->params['civil-engineering']['description']);
        $this->tags->og('title', $this->params['civil-engineering']['title']);
        $this->tags->og('description', $this->params['civil-engineering']['description']);
        $this->render('civil-engineering');
    }

    public function actionMechanicalEngineering()
    {
        $this->tags->title($this->params['mechanical-engineering']['title']);
        $this->tags->meta('keywords', $this->params['mechanical-engineering']['keywords']);
        $this->tags->meta('description', $this->params['mechanical-engineering']['description']);
        $this->tags->og('title', $this->params['mechanical-engineering']['title']);
        $this->tags->og('description', $this->params['mechanical-engineering']['description']);
        $this->render('mechanical-engineering');
    }

    public function actionElectronicsCommunicationEngineering()
    {
        $this->tags->title($this->params['electronics-communication-engineering']['title']);
        $this->tags->meta('keywords', $this->params['electronics-communication-engineering']['keywords']);
        $this->tags->meta('description', $this->params['electronics-communication-engineering']['description']);
        $this->tags->og('title', $this->params['electronics-communication-engineering']['title']);
        $this->tags->og('description', $this->params['electronics-communication-engineering']['description']);
        $this->render('electronics-communication-engineering');
    }

    public function actionElectricalElectronicsEngineering()
    {
        $this->tags->title($this->params['electrical-electronics-engineering']['title']);
        $this->tags->meta('keywords', $this->params['electrical-electronics-engineering']['keywords']);
        $this->tags->meta('description', $this->params['electrical-electronics-engineering']['description']);
        $this->tags->og('title', $this->params['electrical-electronics-engineering']['title']);
        $this->tags->og('description', $this->params['electrical-electronics-engineering']['description']);
        $this->render('electrical-electronics-engineering');
    }
}
