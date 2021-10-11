<?php


namespace app\models;


use shop\App;

class CategoryModel extends AppModel{

    public static function getIds($id, $ids=null){
        $cats = self::getCategory();
        foreach($cats as $k => $v){
            if($v['parent_id'] == $id){
                $ids .= ','.$k;
                $ids .= self::getIds($k);
            }
        }
        return $ids;
    }

}