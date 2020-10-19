<?php

namespace System;

use PedroBorges\MetaTags\MetaTags;

/**
 * Description of BaseController
 *
 * @author gift
 */
class BaseController {

    public $tags;
    public $template = 'app';
    public $params = [];

    public function __construct() {
        $this->tags = new MetaTags;
        $this->params = $params = require(ROOT_PATH . '/src/params.php');
    }

    public function getTemplatePath() {
        return 'templates' . DS . 'app' . DS;
    }

    public function getHeader() {
        return $this->import($this->getTemplatePath() . 'header.php');
    }

    public function getFooter() {
        return $this->import($this->getTemplatePath() . 'footer.php');
    }

    public function loadCss(array $files) {
        $css = '';
        if (is_array($files)) {
            foreach ($files as $file) {
                $css .= '<link href="' . $_SERVER['BASE_URL'] . '/assets/css/' . $file . '.css" rel="stylesheet" type="text/css" media="screen" />';
            }
        }
        return $css;
    }

    public function loadJs(array $files) {
        $js = '';
        if (is_array($files)) {
            foreach ($files as $file) {
                $js .= '<script type="text/javascript" charset="utf-8" src="' . $_SERVER['BASE_URL'] . '/assets/js/' . $file . '.js"></script>';
            }
        }
        return $js;
    }

    public function loadAssets() {
        $file = dirname(__DIR__) . '/assets/assets.php';
        if (file_exists($file)) {
            require $file;
            if (isset($assets['css'])) {
                foreach ($assets['css'] as $file) {
                    echo '<link href="' . $_SERVER['BASE_URL'] . $file . '" rel="stylesheet" type="text/css" media="screen" />';
                }
            }
            if (isset($assets['js'])) {
                foreach ($assets['js'] as $file) {
                    echo '<script type="text/javascript" charset="utf-8" src="' . $_SERVER['BASE_URL'] . $file . '"></script>';
                }
            }
        } else {
            return ($_SERVER['APP_ENV'] == 'dev') ? 'File not found' . $file : '';
        }
    }
    
    public function loadCssAssets() {
        $file = dirname(__DIR__) . '/assets/assets.php';
        if (file_exists($file)) {
            require $file;
            if (isset($assets['css'])) {
                foreach ($assets['css'] as $file) {
                    echo '<link href="' . $_SERVER['BASE_URL'] . $file . '" rel="stylesheet" type="text/css" media="screen" />';
                }
            }
        } else {
            return ($_SERVER['APP_ENV'] == 'dev') ? 'File not found' . $file : '';
        }
    }
    
    public function loadJsAssets() {
        $file = dirname(__DIR__) . '/assets/assets.php';
        if (file_exists($file)) {
            require $file;
            if (isset($assets['js'])) {
                foreach ($assets['js'] as $file) {
                    echo '<script type="text/javascript" charset="utf-8" src="' . $_SERVER['BASE_URL'] . $file . '"></script>';
                }
            }
        } else {
            return ($_SERVER['APP_ENV'] == 'dev') ? 'File not found' . $file : '';
        }
    }

    public function import($file, $data = null) {
        $file = dirname(__DIR__) . DS . $file;
        if (file_exists($file)) {
             require_once $file;
        } else {
            return ($_SERVER['APP_ENV'] == 'dev') ? 'File not found' . $file : '';
        }
    }

    public function render($file, $data = null) {
        $this->getHeader();
        $this->import($this->getTemplatePath() . $file . '.php', $data);
        $this->getFooter();
    }

    public function renderPartial($file, $data = null) {
        return $this->import($this->getTemplatePath() . DS . $file . '.php', $data);
    }

    public function renderCssFile($file) {
        if ($file) {
            return '<link href="' . $_SERVER['BASE_URL'] . '/assets/css/' . $file . '.css" rel="stylesheet" type="text/css" media="screen" />';
        } else {
            return ($_SERVER['APP_ENV'] == 'dev') ? 'File not found' . $file : '';
        }
    }

    public function renderJsFile($file) {
        if ($file) {
            return '<script type="text/javascript" charset="utf-8" src="' . $_SERVER['BASE_URL'] . '/assets/js/' . $file . '.js"></script>';
        } else {
            return ($_SERVER['APP_ENV'] == 'dev') ? 'File not found' . $file : '';
        }
    }
    
    public function predie($data){
        print_r($data);
        die();
    }

}
