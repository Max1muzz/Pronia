<?php


namespace app\controllers\admin;


use app\models\AppModel;
use app\models\CategoryModel;
use RedBeanPHP\R;
use shop\App;

class CategoryController extends AppController{

    public function indexAction(){
        $this->setMeta('Категории');
    }

    public function deleteAction(){
        $id = $this->getRequestID();
        $children = R::count('category', 'parent_id = ?', [$id]);
        $errors = '';
        if($children){
            $errors .= '<li>Удаление невозможно, в категории есть вложенные категории</li>';
        }
        $products = R::count('product', 'category_id = ?', [$id]);
        if($products){
            $errors .= '<li>Удаление невозможно, в категории есть товары</li>';
        }
        if($errors){
            $_SESSION['error'] = "<ul>$errors</ul>";
            redirect(ADMIN.'/category');
        }
        $category = R::load('category', $id);
        R::trash($category);
        $_SESSION['success'] = 'Категория удалена';
        AppModel::cleanCache();
        redirect();
    }

    public function addAction(){
        if(!empty($_POST)){
            $category = new CategoryModel();
            $data = $_POST;
            $category->load($data);
            if($category->validate($data)){
                $category->attributes['alias'] = AppModel::createAlias('category', 'alias', $data['title']);
                $category->save('category');
                $_SESSION['success'] = 'Категория добавлена';
                AppModel::cleanCache();
            }else{
                $category->getErrors();
            }
            redirect();
        }
        $this->setMeta('Новая категория');
    }

    public function editAction(){
        if(!empty($_POST)){
            $id = $this->getRequestID(false);
            $category = new CategoryModel();
            $data = $_POST;
            $category->load($data);
            if($category->validate($data)){
                $category->attributes['alias'] = AppModel::createAlias('category', 'alias', $data['title']);
                $category->update('category', $id);
                $_SESSION['success'] = 'Категория обновлена';
            }else{
                $category->getErrors();
            }
            redirect();
        }
        AppModel::cleanCache();
        $id = $this->getRequestID();
        $category = R::load('category', $id);
        App::$app->setProperty('parent_id', $category->parent_id);
        $this->setMeta('Редактирование категории');
        $this->set(compact('category'));
    }


}