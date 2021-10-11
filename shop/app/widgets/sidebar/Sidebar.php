<?php


namespace app\widgets\sidebar;

use app\controllers\CategoryController;
use app\models\AppModel;
use shop\Cache;

class Sidebar {

    protected $data;
    protected $tree;
    protected $sidebarHtml;

    public function __construct() {
        $cache = Cache::instance();
        $this->sidebarHtml = $cache->get('sidebar');

        if(!$this->sidebarHtml){
            $this->data = AppModel::getCategory();
            $this->tree = $this->getTree();
            $this->sidebarHtml = $this->getSidebarHtml($this->tree);
            $cache->set('sidebar', $this->sidebarHtml);
        }
        $this->output();
    }

    protected function output(){
        ob_start();
        require_once __DIR__ . '/sidebar_tpl/allSidebar.php';
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
        require __DIR__ . '/sidebar_tpl/sidebar.php';
        return ob_get_clean();
    }
}