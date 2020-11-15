<?php

namespace App\Controller;

use System\BaseController;

/**
 * Description of HomeController
 *
 * @author gift
 */
class HomeController extends BaseController
{

    public $action;

    public function __construct($action)
    {
        parent::__construct();
        $this->action = $action;
    }

    public function index()
    {
        $this->tags->title($this->params['home']['title']);
        $this->tags->meta('keywords', $this->params['home']['keywords']);
        $this->tags->meta('description', $this->params['home']['description']);
        $this->tags->og('title', $this->params['home']['title']);
        $this->tags->og('description', $this->params['home']['description']);
        $this->setCss([
            'assets/js/revolution-slider/css/settings.css',
            'assets/js/revolution-slider/css/layers.css',
            'assets/js/revolution-slider/css/navigation.css',
        ]);
        $this->setJs([
            'assets/js/home-slider.js',
            'assets/js/revolution-slider/js/extensions/revolution.extension.actions.min.js',
            'assets/js/revolution-slider/js/extensions/revolution.extension.carousel.min.js',
            'assets/js/revolution-slider/js/extensions/revolution.extension.kenburn.min.js',
            'assets/js/revolution-slider/js/extensions/revolution.extension.layeranimation.min.js',
            'assets/js/revolution-slider/js/extensions/revolution.extension.migration.min.js',
            'assets/js/revolution-slider/js/extensions/revolution.extension.navigation.min.js',
            'assets/js/revolution-slider/js/extensions/revolution.extension.parallax.min.js',
            'assets/js/revolution-slider/js/extensions/revolution.extension.slideanims.min.js',
            'assets/js/revolution-slider/js/extensions/revolution.extension.video.min.js',
        ]);
        $this->render('index');
    }

    public function action404()
    {
        $this->render('404');
    }
}
