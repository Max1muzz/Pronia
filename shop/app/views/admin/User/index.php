<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1 class="m-0">Список пользователей</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="<?= ADMIN; ?>">Главная</a></li>
                    <li class="breadcrumb-item active">Пользователи</li>
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
                                    <th>Логин</th>
                                    <th>Имя</th>
                                    <th>Email</th>
                                    <th>Адресс</th>
                                    <th>Роль</th>
                                    <th><span class="float-right">Действия</span></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($users as $user): ?>
                                    <tr>
                                        <td><?= $user['id']; ?></td>
                                        <td><?= $user['login']; ?></td>
                                        <td><?= $user['name']; ?></td>
                                        <td><?= $user['email']; ?></td>
                                        <td><?= $user['address']; ?></td>
                                        <td><?= $user['role']; ?></td>
                                        <td>
                                            <a href="<?= ADMIN; ?>/user/edit?id=<?= $user['id']; ?>"
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
                                        Показано: <span><?= count($users); ?></span> | Всего:
                                        <span><?= $numUsers; ?></span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>