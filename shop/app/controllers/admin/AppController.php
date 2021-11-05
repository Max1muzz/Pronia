<?php


namespace app\controllers\admin;


use app\models\AppModel;
use shop\base\Controller;

class AppController extends Controller {

    public $layout = 'admin';

    public function __construct($route)
    {
        parent::__construct($route);
        if (!(isset($_SESSION['user']) && $_SESSION['user']['role'] == 'admin')){
            redirect('/shop/user/login');
        }
        new AppModel();
    }

    public function getRequestID($get = true, $id = 'id'){
        if($get){
            $data = $_GET;
        }else{
            $data = $_POST;
        }
        $id = !empty($data[$id]) ? (int)$data[$id] : null;
        if(!$id){
            throw new \Exception('Страница не найдена', 404);
        }
        return $id;
    }
}