<?php


namespace app\controllers;


use app\models\OrderModel;
use shop\App;
use shop\Cache;

class OrderController extends AppController {

    public function indexAction()
    {
        $this->setMeta('Оформление заказа', 'Магазин растений', 'Магазин');
        $cache = Cache::instance();
        $cart = $cache->get('cart');

        if (empty($cart)){
            throw new \Exception('Страница не найдена', 404);
        }
        if(!isset($_SESSION['user'])) redirect('/shop/user/login');

        $curr = App::$app->getProperty('currency');
        $numCart = !empty($cart) ? count($cart) : 0;
            //debug($_SESSION);
            //exit();
        if(!empty($_POST)){
            $data['note'] = !empty($_POST['note']) ? htmlspecialchars($_POST['note']) : null;
            $data['currency'] = $curr['code'];
            $data['user_id'] = $_SESSION['user']['id'];
            $order_id = OrderModel::saveOrder($data);
            OrderModel::saveOrderProduct($order_id, $cart, $curr['value']);
            $_SESSION['message'] = 'Заказ отправлен в обработку!';
            $cache->delete('cart');
            redirect('/shop/cart');
        }


        $this->set(compact('cart', 'curr', 'numCart'));

    }

}