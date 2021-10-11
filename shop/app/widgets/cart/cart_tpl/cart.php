<div class="offcanvas-minicart_wrapper" id="miniCart">
    <div class="offcanvas-body">
        <div class="minicart-content">
            <div class="minicart-heading">
                <h4 class="mb-0">Корзина</h4>
                <a href="#" class="button-close"><i class="pe-7s-close" data-tippy="Close"
                                                    data-tippy-inertia="true"
                                                    data-tippy-animation="shift-away" data-tippy-delay="50"
                                                    data-tippy-arrow="true"
                                                    data-tippy-theme="sharpborder"></i></a>
            </div>
            <ul class="minicart-list">
                <?php if ($this->cart !== 0): ?>
                <?php $result = 0; ?>
                <?php foreach ($this->cart as $id => $product): ?>
                    <li class="minicart-product">
                        <a class="product-item_remove" href="/shop/cart/change?id=<?= $id ?>"><i class="pe-7s-close"
                                                                                                 data-tippy="Remove"
                                                                                                 data-tippy-inertia="true"
                                                                                                 data-tippy-animation="shift-away"
                                                                                                 data-tippy-delay="50"
                                                                                                 data-tippy-arrow="true"
                                                                                                 data-tippy-theme="sharpborder"></i></a>
                        <a href="product/<?= $product['alias'] ?>" class="product-item_img">
                            <img class="img-full" src="/shop/public/images/product/medium-size/<?= $product['img'] ?>"
                                 alt="Product Image">
                        </a>
                        <div class="product-item_content">
                            <a class="product-item_title"
                               href="product/<?= $product['alias'] ?>"><?= $product['title'] ?></a>
                            <span class="product-item_quantity"><?= $product['number'] ?> x <?= $this->curr['symbol'] . round($product['price'] * $this->curr['value'], 1); ?></span>
                        </div>
                    </li>
                    <?php $result += round($product['price'] * $this->curr['value'], 1) * $product['number']; ?>
                <?php endforeach; ?>
            </ul>
        </div>
        <div class="minicart-item_total">
            <span>Total</span>
            <span class="ammount"><?= $this->curr['symbol'] . $result; ?></span>
        </div>

        <div class="group-btn d-grid gap-2 mb-3">
            <a href="/shop/cart" class="btn btn-dark">Перейти в корзину</a>
        </div>
        <div class="group-btn d-grid gap-2">
            <a href="/shop/order" class="btn btn-dark">Оформить заказ</a>
        </div>
        <?php else: ?>
            <li class="minicart-product">
                Здесь пусто!
            </li>
        <?php endif ?>
    </div>
</div>
