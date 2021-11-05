<?php


namespace app\controllers\admin;


use app\models\UserAdminModel;
use app\widgets\pagination\Pagination;
use RedBeanPHP\R;
use shop\App;

class UserController extends AppController {

    public function indexAction(){
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $perPage = App::$app->getProperty('pagination');
        $numUsers = R::count('user');
        $pagination = new Pagination($page, $perPage, $numUsers);
        $start = $pagination->getStart();
        $users = R::findAll('user', "LIMIT $start, $perPage");
        $this->setMeta('Список пользователей');
        $this->set(compact('users', 'pagination', 'numUsers'));
    }

    public function editAction(){
        if(!empty($_POST)) {
            $id = $this->getRequestID(false);
            $user = new UserAdminModel();
            $data = $_POST;
            $user->load($data);
            if(!$user->attributes['password']){
                unset($user->attributes['password']);
            }else{
                $user->attributes['password'] = password_hash($user->attributes['password'], PASSWORD_DEFAULT);
            }
            if(!$user->validate($data) || !$user->checkUnique()){
                $user->getErrors();
                redirect();
            }
            if($user->update('user', $id)){
                $_SESSION['success'] = 'Изменения сохранены';
            }
            redirect();
        }
        $user_id = $this->getRequestID();
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $perPage = App::$app->getProperty('pagination');
        $numOrders = R::count('order');
        $pagination = new Pagination($page, $perPage, $numOrders);
        $start = $pagination->getStart();
        $orders = R::getAll("SELECT `order`.`id`, `order`.`user_id`, `order`.`status`, `order`.`date`, `order`.`update_at`, `order`.`currency`, ROUND(SUM(`order_product`.`price`*`order_product`.`qty`), 2) AS `sum` FROM `order`
              JOIN `order_product` ON `order`.`id` = `order_product`.`order_id`
              WHERE user_id = {$user_id} 
              GROUP BY `order`.`id` ORDER BY `order`.`status`, `order`.`date` LIMIT $start, $perPage");
        $user = R::load('user', $user_id);

        $this->setMeta('Редактирование профиля пользователя');
        $this->set(compact('user', 'orders', 'pagination', 'numOrders'));
    }

}