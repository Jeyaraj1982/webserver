<?php

namespace System;

use App\Controller\HomeController;
use App\Controller\PageController;
use App\Controller\DepartmentController;

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

    public function getPage() {
        return $this->page;
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
            $params = explode('/', $this->page);
            if (count($params) == 1) {
                $controller = '\\App\\Controller\\PageController';
                $action = 'action' . ucfirst(str_replace('-', '', $this->page));
            } else {
                $controller = '\\App\\Controller\\' . ucfirst($params[0]) . 'Controller';
                $action = 'action' . ucfirst(str_replace('-', '', $params[1]));
            }

            if (class_exists($controller)) {
                $class = new $controller($action);
                if (method_exists($class, $action)) {
                    call_user_func([$class, $action]);
                }
            } else {
                $class = new HomeController($this->page);
                call_user_func([$class, 'action404']);
            }
        }
    }

}
