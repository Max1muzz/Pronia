<?php


namespace app\models;


use shop\Cache;

class CartModel extends AppModel {

    public static function getCart() {
        $cache = Cache::instance();
        $cart = $cache->get('cart');
        $cart = !empty($cart) ? $cart : 0;
        return $cart;
    }
    public static function deleteCart($id){
        $cache = Cache::instance();
        $cart = $cache->get('cart');
        if (!empty($cart[$id])) {
            unset($cart[$id]);
            $cache->set('cart', $cart);
        }
        return true;
    }

}