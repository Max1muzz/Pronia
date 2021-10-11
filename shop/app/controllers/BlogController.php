<?php


namespace app\controllers;


use shop\App;
use shop\Cache;

class BlogController extends AppController {

    public function indexAction(){
        $this->setMeta('Блог', 'Магазин растений', 'Магазин');
        $cache = Cache::instance();
        $cart = $cache->get('cart');
        $curr = App::$app->getProperty('currency');
        $numCart = !empty($cart) ? count($cart) : 0;
        $this->set(compact('curr', 'numCart'));
    }
}