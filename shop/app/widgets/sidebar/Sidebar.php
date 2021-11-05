<?php


namespace app\widgets\sidebar;

use app\controllers\CategoryController;
use app\models\AppModel;
use shop\Cache;

class Sidebar {

    protected $data;
    protected $tree;
    protected $sidebarHtml;
    protected $tpl;
    protected $tplAll;
    protected $cacheKey;

    public function __construct($options = []) {

        $this->getOptions($options);
        $cache = Cache::instance();
        $this->sidebarHtml = $cache->get($this->cacheKey);

        if(!$this->sidebarHtml){
            $this->data = AppModel::getCategory();
            $this->tree = $this->getTree();
            $this->sidebarHtml = $this->getSidebarHtml($this->tree);
            $cache->set($this->cacheKey, $this->sidebarHtml);
        }
        $this->output();
    }

    protected function getOptions($options){
        foreach($options as $k => $v){
            if(property_exists($this, $k)){
                $this->$k = $v;
            }
        }
    }

    protected function output(){
        ob_start();
        require_once $this->tplAll;
        echo ob_get_clean();
    }

    protected function getTree(){
        $tree = [];
        $data = $this->data;
        foreach ($data as $id => &$node) {
            if (!$node['parent_id']){
                $tree[$id] = &$node;
            }else{
                $data[$node['parent_id']]['childs'][$id] = &$node;
            }
        }
        return $tree;
    }

    protected function getSidebarHtml($tree){
        $str = '';
        foreach($tree as $id => $cat){
            $num = count(CategoryController::getProductsCategory($cat['alias']));
            $str .= $this->catToTemplate($cat, $id, $num);
        }
        return $str;
    }

    protected function catToTemplate($cat, $id, $num){
        ob_start();
        require $this->tpl;
        return ob_get_clean();
    }
}