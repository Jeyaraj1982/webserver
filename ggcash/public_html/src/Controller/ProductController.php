<?php

namespace App\Controller;

use System\BaseController;

/**
 * Description of PageController
 *
 * @author gift
 */
class ProductController extends BaseController {

    public function action404() {
        $this->render('404');
    }

    public function actionProducts() {
        $this->tags->title('Product List Page');
        $this->tags->meta('keywords', $this->params['contact']['keywords']);
        $this->tags->meta('description', $this->params['contact']['description']);
        $this->render('product-list');
    }


}
