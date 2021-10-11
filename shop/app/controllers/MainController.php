<?php


namespace app\controllers;

use app\models\CartModel;
use app\widgets\pagination\Pagination;
use RedBeanPHP\R;
use shop\App;


class MainController extends AppController {

    public function indexAction(){

        $this->setMeta(App::$app->getProperty('shop_name'), 'Описание', 'Ключи');
        $curr = App::$app->getProperty('currency');
        $cart = CartModel::getCart();
        $numCart = !empty($cart) ? count($cart) : 0;

        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $perPage = App::$app->getProperty('pagination');
        $numProduct = count(R::findAll('product'));
        $pagination = new Pagination($page, $perPage, $numProduct);
        $start = $pagination->getStart();

        $products = R::find('product', "LIMIT $start, $perPage");
        $this->set(compact('products', 'curr', 'numCart', 'pagination', 'numProduct'));

    }
}