<?php


namespace app\controllers;


use app\models\CartModel;
use RedBeanPHP\R;
use shop\App;

class ProductController extends AppController {

    public function indexAction() {
        $alias = $this->route['alias'];
        $product = R::findOne('product', "alias = ? AND status = '1'", [$alias]);
        if (!$product){
            throw new \Exception('Страница не найдена', 404);
        }
        $this->setMeta($product->title, $product->description, $product->keywords);
        $curr = App::$app->getProperty('currency');
        $cart = CartModel::getCart();
        $numCart = !empty($cart) ? count($cart) : 0;
        $this->set(compact('product', 'curr', 'numCart'));
    }
}