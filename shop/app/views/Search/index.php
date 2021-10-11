<!-- Begin Main Content Area -->
<main class="main-content">
    <div class="breadcrumb-area breadcrumb-height" data-bg-image="public/images/breadcrumb/bg/1-1-1919x388.jpg">
        <div class="container h-100">
            <div class="row h-100">
                <div class="col-lg-12">
                    <div class="breadcrumb-item">
                        <h2 class="breadcrumb-heading">Поиск по запросу: "<?=$query;?>"</h2>
                        <ul>
                            <li>
                                <a href="<?= PATH; ?>">Главная</a>
                            </li>
                            <li>Поиск</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="shop-area section-space-y-axis-100">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-4 order-2 order-lg-1 pt-5 pt-lg-0">
                    <!--   ----------------------------------------- -->
                    <?php new \app\widgets\sidebar\Sidebar();?>
                    <!--   ----------------------------------------- -->
                </div>
                <div class="col-xl-9 col-lg-8 order-1 order-lg-2">
                    <?php if (!count($products)):?>
                    <div class="container text-center">
                        <h1 class="breadcrumb-heading">Товар не найден!</h1>
                    </div>
                    <?php else:?>
                    <div class="product-topbar">
                        <ul>
                            <li>
                                <div>
                                    <nav aria-label="Page navigation example">
                                        <?php if ($pagination->countPages > 1):?>
                                            <?=$pagination;?>
                                        <?php endif;?>
                                    </nav>
                                </div>
                            </li>
                            <li> </li>
                            <li class="page-count">
                                Показано: <span><?=count($products);?></span> | Всего: <span><?=$numProduct;?></span>
                            </li>

                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="grid-view" role="tabpanel" aria-labelledby="grid-view-tab">
                            <div class="product-grid-view row g-y-20">

                                <!-- -----------------------СПИСОК ТОВАРОВ------------------------ -->

                                <?php foreach ($products as $product):?>
                                    <div class="col-md-4 col-sm-6">
                                        <div class="product-item">
                                            <div class="product-img">
                                                <a href="product/<?=$product->alias;?>">
                                                    <img class="img-thumbnail breadcrumb-height" src="public/images/product/medium-size/<?=$product->img;?>" alt="Product Images">

                                                </a>
                                            </div>
                                            <div class="product-content">
                                                <a class="product-name" href="product/<?=$product->alias;?>"><?=$product->title;?></a>
                                                <div class="price-box pb-1">
                                                    <span class="new-price"><?=$curr['symbol'] . round($product->price * $curr['value'], 1);?></span>
                                                </div>
                                                <div class="rating-box">
                                                    <ul>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                        <li><i class="fa fa-star"></i></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach;?>
                                <!-- ----------------------- КОНЕЦ СПИСКА ТОВАРОВ------------------------ -->

                            </div>
                        </div>
                    </div>
                    <div class="pagination-area">
                        <nav aria-label="Page navigation example">
                            <?php if ($pagination->countPages > 1):?>
                                <?=$pagination;?>
                            <?php endif;?>
                        </nav>
                    </div>
                    <?php endif?>
                </div>
            </div>
        </div>
    </div>
</main>
<!-- Main Content Area End Here -->