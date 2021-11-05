<?php


namespace app\controllers\admin;


use app\models\AppModel;
use app\models\ProductModel;
use app\widgets\pagination\Pagination;
use RedBeanPHP\R;
use shop\App;

class ProductController extends AppController{

    public function indexAction(){
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $perPage = App::$app->getProperty('pagination');
        $numOrders = count(R::findAll('product'));
        $pagination = new Pagination($page, $perPage, $numOrders);
        $start = $pagination->getStart();
        $products = R::getAll("SELECT `product`.`id`, `product`.`title`, `product`.`price`, `product`.`status`, `category`.`title` AS `category` FROM `product`
              JOIN `category` ON `product`.`category_id` = `category`.`id`            
              GROUP BY `product`.`id` LIMIT $start, $perPage");
        $this->setMeta('Список товаров');
        $this->set(compact('products', 'pagination', 'numOrders'));
    }

    public function addAction(){
        if(!empty($_POST)){
            $data = $_POST;
            $product = new ProductModel();
            $product->load($data);
            $product->attributes['status'] = 1;
            if($product->validate($data)){
                if ($_FILES['img']['error'] == 0){
                    $filename = $product->uploadImg();
                    if (isset($filename['file'])){
                        $product->attributes['img'] = $filename['file'];
                        $product->attributes['alias'] = AppModel::createAlias('product', 'alias', $data['title']);
                        $product->save('product');
                        $_SESSION['success'] = 'Товар добавлен';
                    }elseif (isset($filename['error'])){
                        $_SESSION['error'] = $filename['error'];
                        $_SESSION['form_data'] = $data;
                    }
                }else{
                    $_SESSION['error'] = 'Добавьте изображение!';
                    $_SESSION['form_data'] = $data;
                }

            }
            else{
                $product->getErrors();
                $_SESSION['form_data'] = $data;
            }
            redirect();
        }
        if (!empty($_SESSION['form_data']['category_id'])){
            App::$app->setProperty('parent_id', $_SESSION['form_data']['category_id']);
        }
        AppModel::cleanCache();
        $this->setMeta('Добавление товара');
    }

    public function editAction(){
        if(!empty($_POST)){
            $id = $this->getRequestID(false);
            $product = new ProductModel();
            $data = $_POST;
            $product->load($data);
            //$product->attributes['status'] += 0;
            if($product->validate($data)){
                $product->attributes['alias'] = AppModel::createAlias('product', 'alias', $data['title']);
                $product->update('product', $id);
                $_SESSION['success'] = 'Товар обновлён';
            }else{
                $product->getErrors();
            }
            redirect();
        }
        AppModel::cleanCache();
        $id = $this->getRequestID();
        $product = R::load('product', $id);
        App::$app->setProperty('parent_id', $product->category_id);
        $this->setMeta('Редактирование товара');
        $this->set(compact('product'));
    }

    public function changeImgAction(){
        if ($_FILES['img']['error'] == 0 && isset($_POST['id'])){
            $id = $_POST['id'];
            $data = R::load('product', $id);
            $product = new ProductModel();
            $product->load($data);
            $filename = $product->uploadImg();
            if (isset($filename['file'])){
                $product->attributes['img'] = $filename['file'];
                $product->update('product', $id);
                unlink(WWW.'/images/product/medium-size/'.$data->img);
                $_SESSION['success'] = 'Изображение успешно заменено';
            }elseif (isset($filename['error'])){
                $_SESSION['error'] = $filename['error'];
            }
        }else{$_SESSION['error'] = 'Добавьте изображение!';}
        redirect();
    }

    public function deleteAction(){
        $id = $this->getRequestID();
        $product = R::load('product', $id);
        unlink(WWW.'/images/product/medium-size/'.$product->img);
        R::trash($product);
        $_SESSION['success'] = 'Товар удалён';
        AppModel::cleanCache();
        redirect();
    }
}