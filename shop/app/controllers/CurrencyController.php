<?php


namespace app\controllers;

use shop\App;

class CurrencyController extends AppController {

//---Проверяем _GET, записываем в cookie код валюты---
    public function changeAction(){
        $currency = !empty($_GET['curr']) ? $_GET['curr'] : null;
        if($currency){
            $curr = array_key_exists($currency, App::$app->getProperty('currencies')) ? $currency : null;
            if(!empty($curr)){
                setcookie('currency', $currency, time() + 3600*24*7, '/');
            }
        }
        redirect();
    }
}