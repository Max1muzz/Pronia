<?php


namespace app\models;


use RedBeanPHP\R;
use shop\base\Model;
use shop\Cache;

class AppModel extends Model {

    public static function getCategory(){
        $cache = Cache::instance();
        $category = $cache->get('category');
        if (empty($category)){
            $category = R::getAssoc("SELECT * FROM category");
            $cache->set('category', $category);
        }
        return $category;
    }
    public static function getOne($id, $table){
        $product = R::getAssoc("SELECT * FROM $table WHERE id = $id");
        return $product;
    }

}