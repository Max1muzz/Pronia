<?php


namespace app\controllers;


use app\models\CartModel;
use app\models\CategoryModel;
use app\widgets\pagination\Pagination;
use RedBeanPHP\R;
use shop\App;

class CategoryController extends AppController {

    public function indexAction(){
        $alias = $this->route['alias'];
        $category = R::findOne('category', 'alias = ?', [$alias]);

        $title = $category->title;
        $category_id = $category->id;
        $curr = App::$app->getProperty('currency');
        $cart = CartModel::getCart();
        $numCart = !empty($cart) ? count($cart) : 0;


        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $perPage = App::$app->getProperty('pagination');
        $numProduct = count(self::getProductsCategory($alias, $category));
        $pagination = new Pagination($page, $perPage, $numProduct);
        $start = $pagination->getStart();

        $products = self::getProductsCategory($alias, $category, $start, $perPage);
        $this->setMeta($category->title, $category->description, $category->keywords);
        $this->set(compact('products', 'curr', 'numCart', 'title', 'category_id', 'pagination', 'numProduct'));


    }

    public static function getProductsCategory($alias, $category = null, $start = null, $perPage = null){
        if ($category === null){
            $category = R::findOne('category', 'alias = ?', [$alias]);
        }
        $ids = CategoryModel::getIds($category->id, $category->id);
        if ($start === null && $perPage === null){
            $products = R::find('product', "category_id IN ($ids)");
        }
        else {
            $products = R::find('product', "category_id IN ($ids) LIMIT $start, $perPage");
        }
        return $products;
    }

}