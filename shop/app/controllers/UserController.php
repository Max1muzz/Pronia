<?php


namespace app\controllers;


use app\models\CartModel;
use app\models\UserModel;

class UserController extends AppController {

    public function registerAction(){
        if(!empty($_POST)){
            $user = new UserModel();
            $data = $_POST;
            $user->load($data);
            if(!$user->validate($data) || !$user->checkUnique()){
                $user->getErrors();
                $_SESSION['form_data'] = $data;
            }else{
                $user->attributes['password'] = password_hash($user->attributes['password'], PASSWORD_DEFAULT);
                if($user->save('user')){
                    //$_SESSION['success'] = 'Пользователь зарегистрирован';
                    redirect('/shop/user/login');
                    exit();
                }else{
                    $_SESSION['error'] = 'Ошибка!';
                }
            }
            redirect();
        }
        $this->setMeta('Регистрация');
        $cart = CartModel::getCart();
        $numCart = !empty($cart) ? count($cart) : 0;
        $this->set(compact('numCart'));
    }

    public function loginAction(){
        if(!empty($_POST)){
            $user = new UserModel();
            if($user->login()){
                //$_SESSION['success'] = 'Вы успешно авторизованы';
                redirect('/shop');
                exit();
            }else{
                $_SESSION['error'] = 'Логин/пароль введены неверно';
            }
            redirect();
        }
        $this->setMeta('Вход');
        $cart = CartModel::getCart();
        $numCart = !empty($cart) ? count($cart) : 0;
        $this->set(compact('numCart'));
    }

    public function logoutAction(){
        if(isset($_SESSION['user'])) unset($_SESSION['user']);
        redirect();
    }

}