<?php


namespace shop;

use \RedBeanPHP\R;
class Db extends \RedBeanPHP\SimpleModel {
    use TSingleton;
    protected function __construct(){
        $db = require_once CONF . '/config_db.php';
        R::setup($db['dsn'], $db['user'], $db['pass']);
        if (!R::testConnection()){
            throw new \Exception("Нет соединения с базой", 500);
        }
        R::freeze(true);
        if(DEBUG){
            R::debug(true, 1);
        }
    }
}