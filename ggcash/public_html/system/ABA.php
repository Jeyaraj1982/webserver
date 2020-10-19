<?php

namespace System;

use App\Controller\HomeController;
use App\Controller\PageController;
use App\Controller\ProductController;

/**
 * Description of ABA
 *
 * @author gift
 */
class ABA {

    public $page = 'home';
    public $request = NULL;
    public $params = [];

    public function __construct($request) {
        $this->request = (isset($request)) ? $request : NULL;
        $this->page = $this->setPage();
    }

    public function setPage() {
        $page = ltrim($this->request->getPathInfo(), '/');
        return (empty($page)) ? $this->page : $page;
    }

    public function run() {
        if ($this->page === 'home') {
            $class = new HomeController($this->page);
            call_user_func([$class, 'index']);
        } else {
            $action = 'action' . ucfirst(str_replace('-', '', $this->page));
            if (!class_exists('PageController')) {
                $class = new PageController($this->page);
                if (method_exists($class, $action))
                    call_user_func([$class, $action]);
                else
                    call_user_func([$class, 'action404']);
            }
        }
    }

}
