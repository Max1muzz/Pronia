<!-- Begin Main Content Area -->
<main class="main-content">
    <div class="breadcrumb-area breadcrumb-height" data-bg-image="/shop/public/images/breadcrumb/bg/1-1-1919x388.jpg">
        <div class="container h-100">
            <div class="row h-100">
                <div class="col-lg-12">
                    <div class="breadcrumb-item">
                        <h2 class="breadcrumb-heading">Страница регистрации</h2>
                        <ul>
                            <li>
                                <a href="<?= PATH; ?>">Главная</a>
                            </li>
                            <li><a href="/shop/user/login">Вход</a> | Регистрация</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="login-register-area section-space-y-axis-100">

        <!-- -----------Вывод ошибок------ -->

        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6 alert-danger">
                    <?php if (isset($_SESSION['error'])): ?>
                        <?php echo $_SESSION['error'];
                        unset($_SESSION['error']); ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>


        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <form method="post" action="/shop/user/register">
                        <div class="login-form">
                            <h4 class="login-title">Регистрация</h4>
                            <div class="row">
                                <div class="col-12">
                                    <label>Логин</label>
                                    <input type="text" placeholder="Логин" name="login" value="<?=isset($_SESSION['form_data']['login']) ? ($_SESSION['form_data']['login']) : '';?>">
                                </div>
                                <div class="col-12">
                                    <label>Имя</label>
                                    <input type="text" placeholder="Имя" name="name" value="<?=isset($_SESSION['form_data']['name']) ? ($_SESSION['form_data']['name']) : '';?>">
                                </div>
                                <div class="col-12">
                                    <label>Email</label>
                                    <input type="email" placeholder="Email" name="email" value="<?=isset($_SESSION['form_data']['email']) ? ($_SESSION['form_data']['email']) : '';?>">
                                </div>
                                <div class="col-12">
                                    <label>Адрес</label>
                                    <input type="text" placeholder="Адрес" name="address" value="<?=isset($_SESSION['form_data']['address']) ? ($_SESSION['form_data']['address']) : '';?>">
                                </div>
                                <div class="col-12">
                                    <label>Пароль</label>
                                    <input type="password" placeholder="Пароль" name="password">
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-custom-size lg-size btn-pronia-primary">Register</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <?php if(isset($_SESSION['form_data'])) unset($_SESSION['form_data']); ?>
                </div>

            </div>
        </div>
    </div>
</main>
<!-- Main Content Area End Here -->
