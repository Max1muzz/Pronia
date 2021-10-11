<?php


namespace app\controllers;


use app\widgets\pagination\Pagination;
use RedBeanPHP\R;
use shop\App;
use shop\Cache;

class SearchController extends AppController {

    public function indexAction(){
        $cache = Cache::instance();
        $cart = $cache->get('cart');
        $curr = App::$app->getProperty('currency');
        $numCart = !empty($cart) ? count($cart) : 0;

        $query = !empty($_GET['search']) ? trim(htmlspecialchars($_GET['search'], ENT_QUOTES)) : null;
        if ($query == null){
            $products =  array();

            $this->set(compact('products','curr', 'numCart', 'query'));
        }else{
            $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
            $perPage = App::$app->getProperty('pagination');
            $numProduct = count(R::find('product', "title LIKE ?", ["%{$query}%"]));
            $pagination = new Pagination($page, $perPage, $numProduct);
            $start = $pagination->getStart();
            $products = R::find('product', "title LIKE ? LIMIT $start, $perPage", ["%{$query}%"]);
            $this->set(compact('products','curr', 'numCart', 'pagination', 'numProduct', 'query'));
        }

        $this->setMeta("Поиск по $query" , 'Магазин растений', 'Магазин');

    }

}