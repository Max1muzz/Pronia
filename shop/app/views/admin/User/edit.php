<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Редактирование профиля № <?=$user->id;?></h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= ADMIN; ?>">Главная</a></li>
                    <li class="breadcrumb-item active"><a href="<?= ADMIN; ?>/user">Пользователи</a></li>
                    <li class="breadcrumb-item active"><?=$user->name;?></li>
                </ol>
            </div>
        </div>
    </div>
</div>
<section class="content">
    <form method="post" action="/shop/admin/user/edit">
        <div class="container-fluid">
            <div class="card card-default">
                <div class="row justify-content-md-center">
                    <div class="col-md-6 mt-3">
                        <label>Имя</label>
                        <input name="name" class="form-control filter mb-3" type="text" value="<?=$user->name;?>">
                        <label>Логин</label>
                        <input name="login" class="form-control filter mb-3" type="text" value="<?=$user->login;?>">
                        <label>Email</label>
                        <input name="email" class="form-control filter mb-3" type="text" value="<?=$user->email;?>">
                        <label>Адресс</label>
                        <input name="address" class="form-control filter mb-3" type="text" value="<?=$user->address;?>">
                        <label>Роль</label>
                        <select name="role" class="form-control mb-3" style="width: 100%;">
                            <option value="admin"<?php if ($user->role == 'admin') echo ' selected';?>>Администратор</option>
                            <option value="user"<?php if ($user->role == 'user') echo ' selected';?>>Пользователь</option>
                        </select>
                        <label>Пароль</label>
                        <input name="password" class="form-control filter mb-3" type="password" placeholder="Хотите изменить пароль?">
                        <input name="id" type="hidden" value="<?=$user->id;?>">
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
<?php if ($orders):?>
<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Все заказы пользователя</h1>
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
<?php else:?>
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">У пользователя нет заказов!</h1>
                </div>
            </div>
        </div>
    </div>
<?php endif;?>