<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Список товаров</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= ADMIN; ?>">Главная</a></li>
                    <li class="breadcrumb-item active">Товары</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table m-0">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Наименование</th>
                                    <th>Категория</th>
                                    <th>Цена</th>
                                    <th>Статус</th>
                                    <th><span class="float-right">Действия</span></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($products as $product): ?>
                                    <tr>
                                        <td><?= $product['id']; ?></td>
                                        <td><?= $product['title']; ?></td>
                                        <td><?= $product['category']; ?></td>
                                        <td>$<?= $product['price']; ?></td>
                                        <td>
                                            <?php if ($product['status'] == 0): ?>
                                                <span class="badge badge-danger">Нет в наличии</span>
                                            <?php else: ?>
                                                <span class="badge badge-success">В наличии</span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <div class="float-right">
                                                <a href="<?= ADMIN; ?>/product/delete?id=<?= $product['id']; ?>"
                                                   class="btn btn-sm btn-danger" title="Удалить">
                                                    <i class="fas fa-times"></i>
                                                </a>
                                                <a href="<?= ADMIN; ?>/product/edit?id=<?= $product['id']; ?>"
                                                   class="btn btn-sm btn-info" title="Редактировать">
                                                    <i class="far fa-check-square"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="card-footer clearfix">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-3 align-self-start">
                                    <a href="<?= ADMIN; ?>/product/add" type="button" class="btn btn-primary">Добавть товар
                                    </a>
                                </div>
                                <div class="col-6 align-self-end">
                                    <?php if ($pagination->countPages > 1): ?>
                                        <?= $pagination; ?>
                                    <?php endif; ?>
                                </div>
                                <div class="col-3 align-self-center">
                                    <p class="float-sm-right">
                                        Показано: <span><?= count($products); ?></span> | Всего:
                                        <span><?= $numOrders; ?></span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
