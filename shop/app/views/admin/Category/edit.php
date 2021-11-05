<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Редактирование категории</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= ADMIN; ?>">Главная</a></li>
                    <li class="breadcrumb-item active"><a href="<?= ADMIN; ?>/category">Категории</a></li>
                    <li class="breadcrumb-item active"><?=$category->title;?></li>
                </ol>
            </div>
        </div>
    </div>
</div>
<section class="content">
    <form method="post" action="/shop/admin/category/edit">
        <div class="container-fluid">
            <div class="card card-default">
                <div class="row justify-content-md-center">
                    <div class="col-md-6 mt-3">
                        <label>Наименование</label>
                        <input name="title" class="form-control filter mb-3" type="text" value="<?=$category->title;?>">
                        <label>Родительская категория</label>
                        <select name="parent_id" class="form-control mb-3" style="width: 100%;">
                            <option value="0">Сделать категорию корневой</option>
                            <option disabled>-----------------------</option>
                            <?php new \app\widgets\sidebar\Sidebar($options = [
                                'tpl' => APP . '/views/admin/select/select.php',
                                'tplAll' => APP . '/views/admin/select/selectAll.php',
                                'cacheKey' => 'select_edit'
                            ]);?>
                        </select>
                        <label>Ключевые слова</label>
                        <input name="keywords" class="form-control filter mb-3" type="text" value="<?=$category->keywords;?>">
                        <label>Описание</label>
                        <input name="description" class="form-control filter mb-3" type="text" value="<?=$category->description;?>">
                        <input name="id" type="hidden" value="<?=$category->id;?>">
                    </div>
                </div>
            </div>
        </div>

        <div class="card-footer">
            <div class="row justify-content-md-center">
                <div class="col-md-6">
                    <button type="submit" class="btn btn-primary">Изменить</button>
                </div>
            </div>
        </div>
    </form>

</section>