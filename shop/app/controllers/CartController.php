<?php


namespace app\controllers;


use app\models\CartModel;
use shop\App;
use shop\Cache;

class CartController extends AppController
{

    public function indexAction()
    {
        $this->setMeta('Корзина', 'Магазин растений', 'Магазин');
        $cache = Cache::instance();
        $cart = $cache->get('cart');

        if (isset($_GET['number']) && isset($_GET['id'])) {
            $id = (int)$_GET['id'];
            $product = CartModel::getOne($id, 'product');
            $product[$id]['number'] = (int)$_GET['number'];
            $cart[$id] = $product[$id];
            $cache->set('cart', $cart);
        } elseif (!isset($_GET['number']) && isset($_GET['id'])) {
            $id = (int)$_GET['id'];
            unset($cart[$id]);
            $cache->set('cart', $cart);
        }

        $cart = !empty($cart) ? $cart : 0;
        $curr = App::$app->getProperty('currency');
        $numCart = !empty($cart) ? count($cart) : 0;
        $this->set(compact('cart', 'curr', 'numCart'));

    }

    public function changeAction()
    {
        $id = !empty($_GET['id']) ? (int)$_GET['id'] : null;
        if ($id) {
            CartModel::deleteCart($id);
        }
        redirect();
    }

}