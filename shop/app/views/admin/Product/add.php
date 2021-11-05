<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Новый товар</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= ADMIN; ?>">Главная</a></li>
                    <li class="breadcrumb-item active"><a href="<?= ADMIN; ?>/product">Товары</a></li>
                    <li class="breadcrumb-item active">Новый</li>
                </ol>
            </div>
        </div>
    </div>
</div>
<section class="content">
    <form method="post" action="/shop/admin/product/add" enctype="multipart/form-data">
        <div class="container-fluid">
            <div class="card card-default">
                <div class="row justify-content-md-center">
                    <div class="col-md-6 mt-3">
                        <label>Наименование</label>
                        <input name="title" class="form-control filter mb-3" type="text"
                               value="<?=isset($_SESSION['form_data']['title']) ? $_SESSION['form_data']['title'] : ''; ?>">
                        <label>Категория</label>
                        <select name="category_id" class="form-control mb-3" style="width: 100%;">
                            <?php new \app\widgets\sidebar\Sidebar($options = [
                                'tpl' => APP . '/views/admin/select/select.php',
                                'tplAll' => APP . '/views/admin/select/selectAll.php',
                                'cacheKey' => 'select_add'
                            ]);?>
                        </select>
                        <label>Цена в $</label>
                        <input name="price" class="form-control filter mb-3" type="text"
                               value="<?=isset($_SESSION['form_data']['price']) ? $_SESSION['form_data']['price'] : ''; ?>">
                        <label>Контент</label>
                        <textarea name="content" class="form-control" rows="3"
                        ><?=isset($_SESSION['form_data']['content']) ? $_SESSION['form_data']['content'] : ''; ?></textarea>
                        <label>Ключевые слова</label>
                        <input name="keywords" class="form-control filter mb-3" type="text"
                               value="<?=isset($_SESSION['form_data']['keywords']) ? $_SESSION['form_data']['keywords'] : ''; ?>">
                        <label>Описание</label>
                        <input name="description" class="form-control filter mb-3" type="text"
                               value="<?=isset($_SESSION['form_data']['description']) ? $_SESSION['form_data']['description'] : ''; ?>">
                        <label>Добавить изображение</label><br>
                        <input type="file" name="img">
                        <p><small>Рекомендуемые размеры: 300х400px, и не более 1 Mb</small></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="card-footer">
            <div class="row justify-content-md-center">
                <div class="col-md-6">
                    <button type="submit" class="btn btn-primary">Создать</button>
                </div>
            </div>
        </div>
    </form>

</section>
<?php if(isset($_SESSION['form_data'])) unset($_SESSION['form_data']); ?>
