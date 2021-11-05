<?php


namespace app\models;


class ProductModel extends AppModel{

    public $attributes = [
        'title' => '',
        'category_id' => '',
        'keywords' => '',
        'description' => '',
        'price' => '',
        'content' => '',
        'status' => '',
        'alias' => '',
    ];

    public $rules = [
        'required' => [
            ['title'],
            ['category_id'],
            ['price'],
        ],
        'integer' => [
            ['category_id'],
        ],
    ];

    public function uploadImg(){
        $uploaddir = WWW . '/images/product/medium-size/';
        $ext = strtolower(preg_replace("#.+\.([a-z]+)$#i", "$1", $_FILES['img']['name'])); // расширение картинки
        $types = array("image/gif", "image/png", "image/jpeg", "image/jpg", "image/x-png"); // массив допустимых расширений
        if($_FILES['img']['size'] > 1048576){
            $res = array("error" => "Ошибка! Максимальный вес файла - 1 Мб!");
            return $res;
        }
        if(!in_array($_FILES['img']['type'], $types)){
            $res = array("error" => "Допустимые расширения - .gif, .jpg, .png");
            return $res;
        }
        $new_name = md5(time()).".$ext";
        $uploadfile = $uploaddir.$new_name;
        if(@move_uploaded_file($_FILES['img']['tmp_name'], $uploadfile)){
            $res = array("file" => $new_name);
            return $res;
        }
    }
}