<!DOCTYPE html>
<html>

<head>

    <?=$this->getMeta();?>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">



    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="/shop/public/images/favicon.ico"/>

    <!-- CSS
    ============================================ -->

    <link rel="stylesheet" href="/shop/public/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="/shop/public/css/font-awesome.min.css"/>
    <link rel="stylesheet" href="/shop/public/css/Pe-icon-7-stroke.css"/>
    <link rel="stylesheet" href="/shop/public/css/animate.min.css">
    <link rel="stylesheet" href="/shop/public/css/swiper-bundle.min.css">
    <link rel="stylesheet" href="/shop/public/css/nice-select.css">
    <link rel="stylesheet" href="/shop/public/css/magnific-popup.min.css"/>
    <link rel="stylesheet" href="/shop/public/css/ion.rangeSlider.min.css"/>

    <!-- Style CSS -->
    <link rel="stylesheet" href="/shop/public/css/style.css">

</head>

<body>
<div class="preloader-activate preloader-active open_tm_preloader">
    <div class="preloader-area-wrap">
        <div class="spinner d-flex justify-content-center align-items-center h-100">
            <div class="bounce1"></div>
            <div class="bounce2"></div>
            <div class="bounce3"></div>
        </div>
    </div>
</div>
<div class="main-wrapper">

    <!-- Begin Main Header Area -->
    <header class="main-header-area">
        <div class="header-top bg-pronia-primary d-none d-lg-block">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-6">
                        <div class="header-top-left">
                            <span class="pronia-offer">HELLO EVERYONE! 25% Off All Products</span>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="header-top-right">
                            <ul class="dropdown-wrap">
                                <li class="dropdown">
                                    <?php new \app\widgets\currency\Currency();?>
                                </li>
                                <li class="dropdown">
                                    <?php if (!empty($_SESSION['user'])):?>
                                        <button class="btn btn-link dropdown-toggle ht-btn" type="button"
                                                id="languageButton" data-bs-toggle="dropdown" aria-label="language"
                                                aria-expanded="false">
                                            <?=$_SESSION['user']['name'];?>
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="languageButton">
                                            <li><a class="dropdown-item" href="/shop/user/logout">Выход</a></li>
                                        </ul>
                                    <?php else:?>
                                        <button class="btn btn-link dropdown-toggle ht-btn" type="button"
                                                id="languageButton" data-bs-toggle="dropdown" aria-label="language"
                                                aria-expanded="false">
                                            Профиль
                                        </button>
                                        <ul class="dropdown-menu" aria-labelledby="languageButton">
                                            <li><a class="dropdown-item" href="/shop/user/login">Вход</a></li>
                                            <li><a class="dropdown-item" href="/shop/user/register">Регистрация</a></li>
                                        </ul>
                                    <?php endif;?>

                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-middle py-30">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-12">
                        <div class="header-middle-wrap position-relative">
                            <div class="header-contact d-none d-lg-flex">
                                <i class="pe-7s-call"></i>
                                <a href="tel://+00-123-456-789">+00 123 456 789</a>
                            </div>

                            <a href="<?= PATH; ?>" class="header-logo">
                                <img src="/shop/public/images/logo/dark.png" alt="Header Logo">
                            </a>

                            <div class="header-right">
                                <ul>
                                    <li>
                                        <a href="#exampleModal" class="search-btn bt" data-bs-toggle="modal"
                                           data-bs-target="#exampleModal">
                                            <i class="pe-7s-search"></i>
                                        </a>
                                    </li>


                                    <li class="minicart-wrap me-3 me-lg-0">
                                        <a href="#miniCart" class="minicart-btn toolbar-btn">
                                            <i class="pe-7s-shopbag"></i>
                                            <span class="quantity"><?=$numCart;?></span>
                                        </a>
                                    </li>
                                    <li class="mobile-menu_wrap d-block d-lg-none">
                                        <a href="#mobileMenu" class="mobile-menu_btn toolbar-btn pl-0">
                                            <i class="pe-7s-menu"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-bottom d-none d-lg-block">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="main-menu position-relative">
                            <nav class="main-nav">
                                <ul>
                                    <li>
                                        <a href="<?= PATH; ?>">Магазин</a>
                                    </li>
                                    <li>
                                        <a href="/shop/blog">Блог</a>
                                    </li>
                                    <li>
                                        <a href="/shop/about">О нас</a>
                                    </li>
                                    <li class="drop-holder">
                                        <a href="/shop/faq">FAQ</a>
                                    </li>
                                    <li>
                                        <a href="/shop/contact">Контакты</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-sticky py-4 py-lg-0">
            <div class="container">
                <div class="header-nav position-relative">
                    <div class="row align-items-center">
                        <div class="col-lg-3 col-6">

                            <a href="index.html" class="header-logo">
                                <img src="/shop/public/images/logo/dark.png" alt="Header Logo">
                            </a>

                        </div>
                        <div class="col-lg-6 d-none d-lg-block">
                            <div class="main-menu">
                                <nav class="main-nav">
                                    <ul>
                                        <li>
                                            <a href="<?= PATH; ?>">Магазин</a>
                                        </li>
                                        <li>
                                            <a href="/shop/blog">Блог</a>
                                        </li>
                                        <li>
                                            <a href="/shop/about">О нас</a>
                                        </li>
                                        <li>
                                            <a href="/shop/faq">FAQ</a>
                                        </li>
                                        <li>
                                            <a href="/shop/contact">Контакты</a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="col-lg-3 col-6">
                            <div class="header-right">
                                <ul>
                                    <li>
                                        <a href="#exampleModal" class="search-btn bt" data-bs-toggle="modal"
                                           data-bs-target="#exampleModal">
                                            <i class="pe-7s-search"></i>
                                        </a>
                                    </li>
                                    <li class="dropdown d-none d-lg-block">
                                        <?php if (!empty($_SESSION['user'])):?>
                                            <button class="btn btn-link dropdown-toggle ht-btn" type="button"
                                                    id="languageButton" data-bs-toggle="dropdown" aria-label="language"
                                                    aria-expanded="false">
                                                <i class="pe-7s-users"></i>
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="languageButton">
                                                <li><a class="dropdown-item" href="/shop/user/logout">Выход</a></li>
                                            </ul>
                                        <?php else:?>
                                            <button class="btn btn-link dropdown-toggle ht-btn" type="button"
                                                    id="languageButton" data-bs-toggle="dropdown" aria-label="language"
                                                    aria-expanded="false">
                                                <i class="pe-7s-users"></i>
                                            </button>
                                            <ul class="dropdown-menu" aria-labelledby="languageButton">
                                                <li><a class="dropdown-item" href="/shop/user/login">Вход</a></li>
                                                <li><a class="dropdown-item" href="/shop/user/register">Регистрация</a></li>
                                            </ul>
                                        <?php endif;?>
                                    </li>

                                    <li class="minicart-wrap me-3 me-lg-0">
                                        <a href="#miniCart" class="minicart-btn toolbar-btn">
                                            <i class="pe-7s-shopbag"></i>
                                            <span class="quantity"><?=$numCart;?></span>
                                        </a>
                                    </li>
                                    <li class="mobile-menu_wrap d-block d-lg-none">
                                        <a href="#mobileMenu" class="mobile-menu_btn toolbar-btn pl-0">
                                            <i class="pe-7s-menu"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="mobile-menu_wrapper" id="mobileMenu">
            <div class="offcanvas-body">
                <div class="inner-body">
                    <div class="offcanvas-top">
                        <a href="#" class="button-close"><i class="pe-7s-close"></i></a>
                    </div>
                    <div class="header-contact offcanvas-contact">
                        <i class="pe-7s-call"></i>
                        <a href="tel://+00-123-456-789">+00 123 456 789</a>
                    </div>
                    <div class="offcanvas-user-info">
                        <ul class="dropdown-wrap ms-5">

                            <li class="dropdown">
                                <?php new \app\widgets\currency\Currency() ;?>
                            </li>
                            <li class="dropdown">
                                <?php if (!empty($_SESSION['user'])):?>
                                    <button class="btn btn-link dropdown-toggle ht-btn" type="button"
                                            id="languageButton" data-bs-toggle="dropdown" aria-label="language"
                                            aria-expanded="false">
                                        <?=$_SESSION['user']['name'];?>
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="languageButton">
                                        <li><a class="dropdown-item" href="/shop/user/logout">Выход</a></li>
                                    </ul>
                                <?php else:?>
                                    <button class="btn btn-link dropdown-toggle ht-btn" type="button"
                                            id="languageButton" data-bs-toggle="dropdown" aria-label="language"
                                            aria-expanded="false">
                                        Профиль
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="languageButton">
                                        <li><a class="dropdown-item" href="/shop/user/login">Войти</a></li>
                                        <li><a class="dropdown-item" href="/shop/user/register">Регистрация</a></li>
                                    </ul>
                                <?php endif;?>
                            </li>
                        </ul>
                    </div>
                    <div class="offcanvas-menu_area">
                        <nav class="offcanvas-navigation">
                            <ul class="mobile-menu">
                                <li>
                                    <a href="<?= PATH; ?>">
                                        <span class="mm-text">Магазин</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="/shop/blog">
                                        <span class="mm-text">Блог</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="/shop/about">
                                        <span class="mm-text">О нас</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="/shop/faq">
                                        <span class="mm-text">FAQ</span>
                                    </a>
                                </li>
                                <li>
                                    <a href="/shop/contact">
                                        <span class="mm-text">Контакты</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModal" aria-hidden="true">
            <div class="modal-dialog modal-fullscreen">
                <div class="modal-content modal-bg-dark">
                    <div class="modal-header">
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
                                data-tippy="Close" data-tippy-inertia="true" data-tippy-animation="shift-away"
                                data-tippy-delay="50" data-tippy-arrow="true" data-tippy-theme="sharpborder">
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="modal-search">
                            <span class="searchbox-info">Введите запрос и нажмите Enter</span>
                            <form method="get" action="/shop/search" class="hm-searchbox">
                                <input type="text" name="search" value="Поиск..."
                                       onblur="if(this.value==''){this.value='Поиск...'}"
                                       onfocus="if(this.value=='Поиск...'){this.value=''}" autocomplete="off">
                                <button class="search-btn" type="submit" aria-label="searchbtn">
                                    <i class="pe-7s-search"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- !!! MINI CART insert here !!! -->
        <?php new \app\widgets\cart\Cart();?>
        <div class="global-overlay"></div>
    </header>
    <!-- Main Header Area End Here -->

    <!-- !!! CONTENT insert here !!! -->
    <?=$content;?>

    <!-- Begin Footer Area -->
    <div class="footer-area" data-bg-image="/shop/public/images/footer/bg/1-1920x465.jpg">
        <div class="footer-top section-space-top-100 pb-60">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="footer-widget-item">
                            <div class="footer-widget-logo">
                                <a href="index.html">
                                    <img src="/shop/public/images/logo/dark.png" alt="Logo">
                                </a>
                            </div>
                            <p class="footer-widget-desc">Lorem ipsum dolor sit amet, consec adipisl elit, sed do
                                eiusmod
                                tempor
                                <br>
                                incidio ut labore et dolore magna.
                            </p>
                            <div class="social-link with-border">
                                <ul>
                                    <li>
                                        <a href="#" data-tippy="Facebook" data-tippy-inertia="true"
                                           data-tippy-animation="shift-away" data-tippy-delay="50"
                                           data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                            <i class="fa fa-facebook"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" data-tippy="Twitter" data-tippy-inertia="true"
                                           data-tippy-animation="shift-away" data-tippy-delay="50"
                                           data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                            <i class="fa fa-twitter"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" data-tippy="Pinterest" data-tippy-inertia="true"
                                           data-tippy-animation="shift-away" data-tippy-delay="50"
                                           data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                            <i class="fa fa-pinterest"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#" data-tippy="Dribbble" data-tippy-inertia="true"
                                           data-tippy-animation="shift-away" data-tippy-delay="50"
                                           data-tippy-arrow="true" data-tippy-theme="sharpborder">
                                            <i class="fa fa-dribbble"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 pt-40">
                        <div class="footer-widget-item">
                            <h3 class="footer-widget-title">Useful Links</h3>
                            <ul class="footer-widget-list-item">
                                <li>
                                    <a href="#">About Pronia</a>
                                </li>
                                <li>
                                    <a href="#">How to shop</a>
                                </li>
                                <li>
                                    <a href="#">FAQ</a>
                                </li>
                                <li>
                                    <a href="#">Contact us</a>
                                </li>
                                <li>
                                    <a href="#">Log in</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 pt-40">
                        <div class="footer-widget-item">
                            <h3 class="footer-widget-title">My Account</h3>
                            <ul class="footer-widget-list-item">
                                <li>
                                    <a href="#">Sign In</a>
                                </li>
                                <li>
                                    <a href="#">View Cart</a>
                                </li>
                                <li>
                                    <a href="#">My Wishlist</a>
                                </li>
                                <li>
                                    <a href="#">Track My Order</a>
                                </li>
                                <li>
                                    <a href="#">Help</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-4 pt-40">
                        <div class="footer-widget-item">
                            <h3 class="footer-widget-title">Our Service</h3>
                            <ul class="footer-widget-list-item">
                                <li>
                                    <a href="#">Payment Methods</a>
                                </li>
                                <li>
                                    <a href="#">Money Guarantee!</a>
                                </li>
                                <li>
                                    <a href="#">Returns</a>
                                </li>
                                <li>
                                    <a href="#">Shipping</a>
                                </li>
                                <li>
                                    <a href="#">Privacy Policy</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-3 pt-40">
                        <div class="footer-contact-info">
                            <h3 class="footer-widget-title">Got Question? Call Us</h3>
                            <a class="number" href="tel://123-456-789">123 456 789</a>
                            <div class="address">
                                <ul>
                                    <li>
                                        Your Address Goes Here
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="payment-method">
                            <a href="#">
                                <img src="/shop/public/images/payment/1.png" alt="Payment Method">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="copyright">
                                <span class="copyright-text">© 2021 Pronia Made with <i
                                            class="fa fa-heart text-danger"></i> by
                            <a href="https://hasthemes.com/" rel="noopener" target="_blank">HasThemes</a> </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer Area End Here -->



    <!-- Begin Scroll To Top -->
    <a class="scroll-to-top" href="">
        <i class="fa fa-angle-double-up"></i>
    </a>
    <!-- Scroll To Top End Here -->

</div>

<!-- Global Vendor, plugins JS -->

<!-- JS Files
============================================ -->

<script src="/shop/public/js/vendor/bootstrap.bundle.min.js"></script>
<script src="/shop/public/js/vendor/jquery-3.6.0.min.js"></script>
<script src="/shop/public/js/vendor/jquery-migrate-3.3.2.min.js"></script>
<script src="/shop/public/js/vendor/jquery.waypoints.js"></script>
<script src="/shop/public/js/vendor/modernizr-3.11.2.min.js"></script>
<script src="/shop/public/js/plugins/wow.min.js"></script>
<script src="/shop/public/js/plugins/swiper-bundle.min.js"></script>
<script src="/shop/public/js/plugins/jquery.nice-select.js"></script>
<script src="/shop/public/js/plugins/parallax.min.js"></script>
<script src="/shop/public/js/plugins/jquery.magnific-popup.min.js"></script>
<script src="/shop/public/js/plugins/tippy.min.js"></script>
<script src="/shop/public/js/plugins/ion.rangeSlider.min.js"></script>
<script src="/shop/public/js/plugins/mailchimp-ajax.js"></script>
<script src="/shop/public/js/plugins/jquery.counterup.js"></script>

<!--Main JS (Common Activation Codes)-->
<script src="/shop/public/js/main.js"></script>

</body>

</html>
