<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Список заказов</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= ADMIN; ?>">Главная</a></li>
                    <li class="breadcrumb-item active">Заказы</li>
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
                                    <th>Имя</th>
                                    <th>Дата создания</th>
                                    <th>Дата редактирования</th>
                                    <th>Сумма</th>
                                    <th>Статус</th>
                                    <th><span class="float-right">Подробнее</span></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($orders as $order): ?>
                                    <tr>
                                        <td><?= $order['id']; ?></td>
                                        <td><?= $order['name']; ?></td>
                                        <td><?= $order['date']; ?></td>
                                        <td><?= $order['update_at']; ?></td>
                                        <td><?= $order['sum']; ?> <?= $order['currency']; ?></td>
                                        <td>
                                            <?php if ($order['status'] == 0): ?>
                                                <span class="badge badge-danger">Новый</span>
                                            <?php else: ?>
                                                <span class="badge badge-success">Выполнен</span>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <a href="<?= ADMIN; ?>/order/view?id=<?= $order['id']; ?>"
                                               class="btn btn-sm btn-info float-right">
                                                <i class="far fa-check-square"></i>
                                            </a>

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
                                <div class="col-9 align-self-end">
                                    <?php if ($pagination->countPages > 1): ?>
                                        <?= $pagination; ?>
                                    <?php endif; ?>
                                </div>
                                <div class="col-3 align-self-center">
                                    <p class="float-sm-right">
                                        Показано: <span><?= count($orders); ?></span> | Всего:
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