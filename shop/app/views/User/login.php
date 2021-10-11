<!-- Begin Main Content Area -->
<main class="main-content">
    <div class="breadcrumb-area breadcrumb-height" data-bg-image="/shop/public/images/breadcrumb/bg/1-1-1919x388.jpg">
        <div class="container h-100">
            <div class="row h-100">
                <div class="col-lg-12">
                    <div class="breadcrumb-item">
                        <h2 class="breadcrumb-heading">Войти в профиль</h2>
                        <ul>
                            <li>
                                <a href="<?= PATH; ?>">Главная</a>
                            </li>
                            <li>Вход | <a href="/shop/user/register">Регистрация</a></li>
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
                    <form method="post" action="/shop/user/login">
                        <div class="login-form">
                            <h4 class="login-title">Вход</h4>
                            <div class="row">
                                <div class="col-lg-12">
                                    <label>Логин</label>
                                    <input type="text" placeholder="Логин" name="login" placeholder="Login">
                                </div>
                                <div class="col-lg-12">
                                    <label>Пароль</label>
                                    <input type="password" placeholder="Пароль" name="password">
                                </div>
                                <div class="col-md-8">
                                    <div class="check-box">
                                        <input type="checkbox" id="remember_me">
                                        <label for="remember_me">Запомнить меня</label>
                                    </div>
                                </div>
                                <div class="col-lg-12 pt-5">
                                    <button type="submit" class="btn btn-custom-size lg-size btn-pronia-primary">Войти</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</main>
<!-- Main Content Area End Here -->