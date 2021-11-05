<?php


namespace app\models;


use shop\App;

class CategoryModel extends AppModel{

    public $attributes = [
        'title' => '',
        'parent_id' => '',
        'keywords' => '',
        'description' => '',
        'alias' => '',
    ];

    public $rules = [
        'required' => [
            ['title'],
        ]
    ];

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