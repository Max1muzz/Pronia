<?php


namespace app\models;


use RedBeanPHP\R;

class OrderModel extends AppModel {

    public static function saveOrder($data){
        $order = R::dispense('order');
        $order->user_id = $data['user_id'];
        $order->currency = $data['currency'];
        $order->note = $data['note'];
        $order_id = R::store($order);
        return $order_id;
    }

    public static function saveOrderProduct($order_id, $cart, $value){
        $data = '';
        foreach ($cart as $id => $product){
            $price = round($product['price'] * $value, 1);
            $data .= "($order_id, $id, {$product['number']}, '{$product['title']}', $price),";
        }
        $data = rtrim($data, ',');
        R::exec("INSERT INTO order_product (order_id, product_id, qty, title, price) VALUES $data");
        return true;
    }

}