<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Список категорий</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?=ADMIN;?>">Главная</a></li>
                    <li class="breadcrumb-item active">Категории</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<section class="content">
    <div class="container-fluid">

        <?php new \app\widgets\sidebar\Sidebar($options = [
            'tpl' => APP . '/views/admin/Category/list.php',
            'tplAll' => APP . '/views/admin/Category/listAll.php',
            'cacheKey' => 'admin_cat'
        ]);?>
        <a href="<?=ADMIN;?>/category/add" type="button" class="btn btn-primary">Добавть катекорию</a>
    </div>
</section>