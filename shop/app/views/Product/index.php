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


    <div class="single-product-area">
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
                            <!--
                            <li class="compare-btn-wrap">
                                <a class="custom-circle-btn" href="compare.html">
                                    <i class="pe-7s-refresh-2"></i>
                                </a>
                            </li>
                            -->


                        </ul>
                        </form>


                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="product-tab-area section-space-top-100 section-space-bottom-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <ul class="nav product-tab-nav tab-style-2 pt-0" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="tab-btn" id="information-tab" data-bs-toggle="tab" href="#information" role="tab"
                               aria-controls="information" aria-selected="false">
                                Information
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="active tab-btn" id="description-tab" data-bs-toggle="tab" href="#description"
                               role="tab" aria-controls="description" aria-selected="true">
                                Description
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="tab-btn" id="reviews-tab" data-bs-toggle="tab" href="#reviews" role="tab"
                               aria-controls="reviews" aria-selected="false">
                                Reviews(3)
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content product-tab-content">
                        <div class="tab-pane fade" id="information" role="tabpanel" aria-labelledby="information-tab">
                            <div class="product-information-body">
                                <h4 class="title">Shipping</h4>
                                <p class="short-desc mb-4">The item will be shipped from China. So it need 15-20 days to
                                    deliver. Our product is good with reasonable price and we believe you will worth it.
                                    So please wait for it patiently! Thanks.Any question please kindly to contact us and
                                    we promise to work hard to help you to solve the problem</p>
                                <h4 class="title">About return request</h4>
                                <p class="short-desc mb-4">If you don't need the item with worry, you can contact us
                                    then we will help you to solve the problem, so please close the return request!
                                    Thanks</p>
                                <h4 class="title">Guarantee</h4>
                                <p class="short-desc mb-0">If it is the quality question, we will resend or refund to
                                    you; If you receive damaged or wrong items, please contact us and attach some
                                    pictures about product, we will exchange a new correct item to you after the
                                    confirmation.</p>
                            </div>
                        </div>
                        <div class="tab-pane fade show active" id="description" role="tabpanel"
                             aria-labelledby="description-tab">
                            <div class="product-description-body">
                                <p class="short-desc mb-0">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed
                                    do eiusmod tempor incidid ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
                                    Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                                    fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa
                                    qui officia deserunt mollit anim id est laborum. Sed ut perspiciatis unde omnis iste
                                    natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam,
                                    eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta
                                    sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut
                                    fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi
                                    nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet,
                                </p>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
                            <div class="product-review-body">
                                <div class="blog-comment mt-0">
                                    <h4 class="heading">Comments (03)</h4>
                                    <div class="blog-comment-item">
                                        <div class="blog-comment-img">
                                            <img src="/shop/public/images/blog/avatar/1-1-120x120.png" alt="User Image">
                                        </div>
                                        <div class="blog-comment-content">
                                            <div class="user-meta">
                                                <h2 class="user-name">Donald Chavez</h2>
                                                <span class="date">21 July 2021</span>
                                            </div>
                                            <p class="user-comment">Lorem ipsum dolor sit amet, consectetur adipisi
                                                elit, sed
                                                do eiusmod tempor incidid ut labore etl dolore magna aliqua. Ut enim ad
                                                minim
                                                veniam, quis nostrud exercitati ullamco laboris nisi ut aliquiex ea
                                                commodo
                                                consequat.
                                            </p>
                                            <a class="btn btn-custom-size comment-btn" href="#">Reply</a>
                                        </div>
                                    </div>
                                    <div class="blog-comment-item relpy-item">
                                        <div class="blog-comment-img">
                                            <img src="/shop/public/images/blog/avatar/1-2-120x120.png" alt="User Image">
                                        </div>
                                        <div class="blog-comment-content">
                                            <div class="user-meta">
                                                <h2 class="user-name">Marissa Swan</h2>
                                                <span class="date">21 July 2021</span>
                                            </div>
                                            <p class="user-comment">Lorem ipsum dolor sit amet, consectetur adipisi
                                                elit, sed do
                                                eiusmod tempr incidid ut labore etl dolore magna aliqua. Ut enim ad
                                                minim veniam,
                                                quisnos exercitati ullamco laboris nisi ut aliquiex.
                                            </p>
                                            <a class="btn btn-custom-size comment-btn style-2" href="#">Reply</a>
                                        </div>
                                    </div>
                                    <div class="blog-comment-item">
                                        <div class="blog-comment-img">
                                            <img src="/shop/public/images/blog/avatar/1-3-120x120.png" alt="User Image">
                                        </div>
                                        <div class="blog-comment-content">
                                            <div class="user-meta">
                                                <h2 class="user-name">Donald Chavez</h2>
                                                <span class="date">21 July 2021</span>
                                            </div>
                                            <p class="user-comment">Lorem ipsum dolor sit amet, consectetur adipisi
                                                elit, sed
                                                do eiusmod tempor incidid ut labore etl dolore magna aliqua. Ut enim ad
                                                minim
                                                veniam, quis nostrud exercitati ullamco laboris nisi ut aliquiex ea
                                                commodo
                                                consequat.
                                            </p>
                                            <a class="btn btn-custom-size comment-btn" href="#">Reply</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="feedback-area">
                                    <h2 class="heading">Leave a comment</h2>
                                    <form class="feedback-form" action="#">
                                        <div class="group-input">
                                            <div class="form-field me-md-30 mb-30 mb-md-0">
                                                <input type="text" name="name" placeholder="Your Name*"
                                                       class="input-field">
                                            </div>
                                            <div class="form-field">
                                                <input type="text" name="email" placeholder="Your Email*"
                                                       class="input-field">
                                            </div>
                                        </div>
                                        <div class="form-field mt-30">
                                            <input type="text" name="subject" placeholder="Subject (Optinal)"
                                                   class="input-field">
                                        </div>
                                        <div class="form-field mt-30">
                                            <textarea name="message" placeholder="Message"
                                                      class="textarea-field"></textarea>
                                        </div>
                                        <div class="button-wrap pt-5">
                                            <button type="submit" value="submit"
                                                    class="btn btn-custom-size xl-size btn-pronia-primary"
                                                    name="submit">Post
                                                Comment
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



</main>
<!-- Main Content Area End Here  -->
