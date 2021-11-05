<!-- Begin Main Content Area  -->
<main class="main-content">
    <div class="breadcrumb-area breadcrumb-height" data-bg-image="/shop/public/images/breadcrumb/bg/1-1-1919x388.jpg">
        <div class="container h-100">
            <div class="row h-100">
                <div class="col-lg-12">
                    <div class="breadcrumb-item">
                        <h2 class="breadcrumb-heading">Один продукт</h2>
                        <ul>
                            <li>
                                <a href="<?= PATH; ?>">Главная</a>
                            </li>
                            <li>Продукт</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php new \app\widgets\breadcrumbs\Breadcrumbs($product->category_id, $product->title)?>


    <div class="single-product-area mb-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="row">
                        <img class="col img-thumbnail"
                             src="/shop/public/images/product/medium-size/<?= $product->img; ?>" alt="Product Image">
                    </div>
                </div>
                <div class="col-lg-8 pt-5 pt-lg-0">
                    <div class="single-product-content">
                        <h1 class="title"><?= $product->title; ?></h1>
                        <div class="price-box">
                            <span class="new-price"><?=$curr['symbol'] . round($product->price * $curr['value'], 1);?></span>
                        </div>
                        <hr>
                        <p class="short-desc"><?=$product->content;?></p>
                        <form>
                            <input type="hidden" name="id" value="<?=$product->id;?>">
                        <ul class="quantity-with-btn">

                            <li class="quantity">
                                <div class="cart-plus-minus">
                                    <input type="text" class="cart-plus-minus-box" value="1" name="number" formmethod="">
                                </div>
                            </li>
                            <li class="add-to-cart">
                                    <input class="btn btn-custom-size lg-size btn-pronia-primary" type="submit" formmethod="get" formaction="/shop/cart?lo=23" value="Add to cart">
                            </li>
                        </ul>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>




</main>
<!-- Main Content Area End Here  -->
