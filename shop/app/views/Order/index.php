<!-- Begin Main Content Area -->

<main class="main-content">
    <div class="breadcrumb-area breadcrumb-height" data-bg-image="/shop/public/images/breadcrumb/bg/1-1-1919x388.jpg">
        <div class="container h-100">
            <div class="row h-100">
                <div class="col-lg-12">
                    <div class="breadcrumb-item">
                        <h2 class="breadcrumb-heading">Оформление заказа</h2>
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

    <div class="cart-area section-space-y-axis-100">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <form action="javascript:void(0)">
                        <div class="table-content table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>Изображение</th>
                                    <th>Название</th>
                                    <th>Цена</th>
                                    <th>Количество</th>
                                    <th>Сумма</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $result = 0; ?>
                                <?php foreach ($cart as $id => $product): ?>
                                    <tr>
                                        <td>
                                            <a href="product/<?= $product['alias'] ?>">
                                                <img class="w-25"
                                                     src="/shop/public/images/product/medium-size/<?= $product['img'] ?>">
                                            </a>
                                        </td>
                                        <td class="col">
                                            <a href="product/<?= $product['alias'] ?>"><?= $product['title'] ?></a>
                                        </td>
                                        <td class="col">
                                            <span class="amount"><?= $curr['symbol'] . round($product['price'] * $curr['value'], 1); ?></span>
                                        </td>
                                        <td class="col">
                                            <span class="amount"><?= $product['number'] ?></span></td>
                                        <td class="col">
                                            <span class="amount"><?= $curr['symbol'] . round($product['price'] * $curr['value'], 1) * $product['number']; ?></span>
                                        </td>
                                    </tr>
                                    <?php $result += round($product['price'] * $curr['value'], 1) * $product['number']; ?>
                                <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>

                        <div class="row">
                            <div class="col-md-5 ml-auto">
                                <div class="cart-page-total">
                                    <h2>Сумма заказа</h2>
                                    <ul>
                                        <li>Итого: <span><?= $curr['symbol'] . $result; ?></span></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </form>
                    <form method="post" action="/shop/order">
                        <div class="cart-page-total">
                            <h2>Примечания</h2>
                            <textarea class="form-control mt-3" type="text" placeholder="Примечания"
                                      name="note"></textarea>
                            <div class="group-btn_wrap mt-3">
                                <button type="submit" class="btn lg-size btn-dark">Оформить
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>
<!-- Main Content Area End Here -->



