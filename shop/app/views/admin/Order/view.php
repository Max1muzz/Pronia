<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Заказ № <?= $order['id']; ?>
                    <?php if(!$order['status']): ?>
                        <a href="<?=ADMIN;?>/order/change?id=<?=$order['id'];?>&status=1" class="btn btn-success btn-xs">Одобрить</a>
                    <?php else: ?>
                        <a href="<?=ADMIN;?>/order/change?id=<?=$order['id'];?>&status=0" class="btn btn-default btn-xs">Вернуть на доработку</a>
                    <?php endif; ?>
                    <a href="<?=ADMIN;?>/order/delete?id=<?=$order['id'];?>" class="btn btn-danger btn-xs delete">Удалить</a>
                </h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= ADMIN; ?>">Главная</a></li>
                    <li class="breadcrumb-item"><a href="<?= ADMIN; ?>/order">Заказы</a></li>
                    <li class="breadcrumb-item active">Заказ № <?= $order['id']; ?></li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-12">
                <!-- TABLE: LATEST ORDERS -->
                <div class="card">
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table m-0">
                                <tbody>
                                <tr>
                                    <td>ID заказа</td>
                                    <td><?= $order['id']; ?></td>
                                </tr>
                                <tr>
                                    <td>Имя заказчика</td>
                                    <td><?= $order['name']; ?></td>
                                </tr>
                                <tr>
                                    <td>Дата оформления</td>
                                    <td><?= $order['date']; ?></td>
                                </tr>
                                <tr>
                                    <td>Дата редактирования</td>
                                    <td><?= $order['update_at']; ?></td>
                                </tr>
                                <tr>
                                    <td>Количество позиций в заказе</td>
                                    <td><?= count($order_products); ?></td>
                                </tr>
                                <tr>
                                    <td>Сумма заказа</td>
                                    <td><?= $order['sum']; ?> <?= $order['currency']; ?></td>
                                <tr>
                                    <td>Коментарий</td>
                                    <td><?= $order['note']; ?></td>
                                <tr>
                                    <td>Статус</td>
                                    <td>
                                        <?php if ($order['status'] == 0): ?>
                                            <span class="badge badge-danger">Новый</span>
                                        <?php else: ?>
                                            <span class="badge badge-success">Выполнен</span>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer clearfix">

                    </div>
                    <!-- /.card -->
                </div>
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Товары в заказе</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>ID товара</th>
                                <th>Наименование</th>
                                <th>Количество</th>
                                <th>Цена</th>
                                <th>Сумма</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php $qty = 0; foreach ($order_products as $product): ?>
                            <tr>
                                <td><?= $product['product_id']; ?></td>
                                <td><?= $product['title']; ?></td>
                                <td><?= $product['qty']; $qty += $product['qty']; ?></td>
                                <td><?= $product['price']; ?> <?= $order['currency']; ?></td>
                                <td><?= $product['price'] * $product['qty']; ?> <?= $order['currency']; ?></td>
                            </tr>
                            <?php endforeach;?>
                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Итого:</th>
                                <th></th>
                                <th><?= $qty; ?></th>
                                <th></th>
                                <th><?= $order['sum']; ?> <?= $order['currency']; ?></th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
</section>
<!-- /.content -->



