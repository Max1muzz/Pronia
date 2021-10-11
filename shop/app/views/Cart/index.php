<!-- Begin Main Content Area -->

<main class="main-content">
    <div class="breadcrumb-area breadcrumb-height" data-bg-image="/shop/public/images/breadcrumb/bg/1-1-1919x388.jpg">
        <div class="container h-100">
            <div class="row h-100">
                <div class="col-lg-12">
                    <div class="breadcrumb-item">
                        <h2 class="breadcrumb-heading">Корзина</h2>
                        <ul>
                            <li>
                                <a href="<?= PATH; ?>">Главная</a>
                            </li>
                            <li>Корзина</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php if ($cart !== 0): ?>
    <div class="cart-area section-space-y-axis-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <form action="javascript:void(0)">
                        <div class="table-content table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th class="product_remove">Удалить</th>
                                    <th class="product-thumbnail">Изображение</th>
                                    <th class="cart-product-name">Название</th>
                                    <th class="product-price">Цена</th>
                                    <th class="product-quantity">Количество</th>
                                    <th class="product-subtotal">Сумма</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $result = 0;?>
                                <?php foreach ($cart as $id => $product): ?>
                                    <tr>
                                        <td class="product_remove">
                                            <a href="cart?id=<?= $id; ?>">
                                                <i class="pe-7s-close" data-tippy="Remove" data-tippy-inertia="true"
                                                   data-tippy-animation="shift-away" data-tippy-delay="50"
                                                   data-tippy-arrow="true" data-tippy-theme="sharpborder"></i>
                                            </a>
                                        </td>
                                        <td class="product-thumbnail">
                                            <a href="product/<?= $product['alias'] ?>">
                                                <img src="/shop/public/images/product/medium-size/<?= $product['img'] ?>"
                                                     alt="Cart Thumbnail">
                                            </a>
                                        </td>
                                        <td class="product-name"><a
                                                    href="product/<?= $product['alias'] ?>"><?= $product['title'] ?></a>
                                        </td>
                                        <td class="product-price"><span
                                                    class="amount"><?= $curr['symbol'] . round($product['price'] * $curr['value'], 1); ?></span>
                                        </td>
                                        <td class="product-subtotal"><span
                                                    class="amount"><?= $product['number'] ?></span></td>
                                        <td class="product-subtotal"><span
                                                    class="amount"><?= $curr['symbol'] . round($product['price'] * $curr['value'], 1) * $product['number']; ?></span>
                                        </td>
                                    </tr>
                                    <?php $result += round($product['price'] * $curr['value'], 1) * $product['number'];?>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>

                        <div class="row">
                            <div class="col-md-5 ml-auto">
                                <div class="cart-page-total">
                                    <h2>Сумма заказа</h2>
                                    <ul>
                                        <li>Итого: <span><?= $curr['symbol'] . $result;?></span></li>
                                    </ul>
                                    <a href="order">Оформить заказ</a>
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
<?php else: ?>
    <div class="breadcrumb-area breadcrumb-height">
        <div class="container h-75 mt-5">
            <div class="row h-75">
                <div class="col-lg-12">
                    <div class="breadcrumb-item">
                        <?php if(!empty($_SESSION['message'])):?>
                        <div class="alert alert-success" role="alert">
                            <?=$_SESSION['message'];?>
                        </div>
                        <?php unset($_SESSION['message']); endif;?>
                        <h1 class="breadcrumb-heading">Корзина пуста!</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php endif ?>


