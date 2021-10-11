<?php


namespace app\widgets\cart;


use app\models\CartModel;
use shop\App;

class Cart {

    protected $cart;
    protected $curr;

    public function __construct(){
        $this->cart = CartModel::getCart();
        $this->curr = App::$app->getProperty('currency');
        echo $this->getHtml();
    }

    protected function getHtml(){
        ob_start();
        require_once  __DIR__ . '/cart_tpl/cart.php';
        return ob_get_clean();
    }

}