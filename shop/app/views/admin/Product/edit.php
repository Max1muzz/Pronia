<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Редактирование товара</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= ADMIN; ?>">Главная</a></li>
                    <li class="breadcrumb-item active"><a href="<?= ADMIN; ?>/product">Товары</a></li>
                    <li class="breadcrumb-item active"><?=$product->title;?></li>
                </ol>
            </div>
        </div>
    </div>
</div>
<section class="content">
    <form method="post" action="/shop/admin/product/edit">
        <div class="container-fluid">
            <div class="card card-default">
                <div class="row justify-content-md-center">
                    <div class="col-md-6 mt-3">
                        <label>Наименование</label>
                        <input name="title" class="form-control filter mb-3" type="text" value="<?=$product->title;?>">
                        <label>Категория</label>
                        <select name="category_id" class="form-control mb-3" style="width: 100%;">
                            <?php new \app\widgets\sidebar\Sidebar($options = [
                                'tpl' => APP . '/views/admin/select/select.php',
                                'tplAll' => APP . '/views/admin/select/selectAll.php',
                                'cacheKey' => 'select_edit'
                            ]);?>
                        </select>
                        <label>Цена в $</label>
                        <input name="price" class="form-control filter mb-3" type="text" value="<?=$product->price;?>">
                        <label>Контент</label>
                        <textarea name="content" class="form-control mb-3" rows="3"
                            ><?=$product->content;?></textarea>
                        <label>Ключевые слова</label>
                        <input name="keywords" class="form-control filter mb-3" type="text" value="<?=$product->keywords;?>">
                        <label>Описание</label>
                        <input name="description" class="form-control filter mb-3" type="text" value="<?=$product->description;?>">
                        <label>Статус</label>
                        <select name="status" class="form-control mb-3" style="width: 100%;">
                            <option value="0" <?php if ($product->status == 0) echo ' selected';?>>Нет в наличии</option>
                            <option value="1" <?php if ($product->status == 1) echo ' selected';?>>В наличии</option>
                        </select>
                        <input name="id" type="hidden" value="<?=$product->id;?>">
                    </div>
                </div>
            </div>
        </div>

        <div class="card-footer">
            <div class="row justify-content-md-center">
                <div class="col-md-6">
                    <button type="submit" class="btn btn-primary">Изменить данные</button>
                </div>
            </div>
        </div>
    </form>
    <form method="post" action="/shop/admin/product/changeimg" enctype="multipart/form-data">
        <div class="container-fluid">
            <div class="card card-default">
                <div class="row justify-content-md-center">
                    <div class="col-md-6 mt-3 mb-3">
                        <img src="/shop/public/images/product/medium-size/<?=$product->img;?>" class="shadow p-3 mb-5 bg-white rounded">
                        <br>
                        <input type="file" name="img">
                        <input name="id" type="hidden" value="<?=$product->id;?>">
                        <p><small>Рекомендуемые размеры: 300х400px, и не более 1 Mb</small></p>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <div class="row justify-content-md-center">
                <div class="col-md-6">
                    <button type="submit" class="btn btn-primary">Заменить изображение</button>
                </div>
            </div>
        </div>
    </form>


</section>