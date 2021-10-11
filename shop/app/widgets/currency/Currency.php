<?php


namespace app\widgets\currency;

use RedBeanPHP\R;
use shop\App;

class Currency {
    protected $tpl;
    protected $currencies;
    protected $currency;

    public function __construct(){
        $this->tpl = __DIR__ . '/currency_tpl/currency.php';
        $this->run();
    }

    //---Записывает в свойства данные о валютах из контейнера ---
    protected function run(){
        $this->currencies = App::$app->getProperty('currencies');
        $this->currency = App::$app->getProperty('currency');
        echo $this->getHtml();
    }

    public static function getCurrencies(){
        return R::getAssoc("SELECT code, title, value, symbol, base FROM currency ORDER BY base DESC");
    }

    public static function getCurrency($currencies){
        if(isset($_COOKIE['currency']) && array_key_exists($_COOKIE['currency'], $currencies)){
            $key = $_COOKIE['currency'];
        }else{
            $key = key($currencies);
        }
        $currency = $currencies[$key];
        $currency['code'] = $key;
        return $currency;
    }

    protected function getHtml(){
        ob_start();
        require $this->tpl;
        return ob_get_clean();
    }
}