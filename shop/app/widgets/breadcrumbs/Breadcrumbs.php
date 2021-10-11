<?php


namespace app\widgets\breadcrumbs;


use app\models\AppModel;

class Breadcrumbs {

    protected $tpl;
    protected $breadcrumbs;
    protected $title;

    public function __construct($id, $title = null){
        $this->tpl = __DIR__ . '/breadcrumbs_tpl/breadcrumbs.php';
        $category = AppModel::getCategory();
        $this->breadcrumbs = self::getParts($category, $id);
        $this->title = $title;
        echo $this->getHtml();
    }

    public static function getParts($cats, $id){
        if(!$id) return false;
        $breadcrumbs = [];
        foreach($cats as $k => $v){
            if(isset($cats[$id])){
                $breadcrumbs[$cats[$id]['alias']] = $cats[$id]['title'];
                $id = $cats[$id]['parent_id'];
            }else break;
        }
        return array_reverse($breadcrumbs, true);
    }

    protected function getHtml(){
        ob_start();
        require_once $this->tpl;
        return ob_get_clean();
    }
}