<?php


namespace app\controllers\admin;


use RedBeanPHP\R;

class MainController extends AppController {

    public function indexAction(){
        $countOrders = R::count('order', "status = '0'" );
        $countUsers = R::count('user');
        $countProducts = R::count('product');
        $countCategories = R::count('category');
        $this->setMeta('Админ-панель');
        $this->set(compact('countOrders', 'countUsers', 'countProducts', 'countCategories'));
    }

}