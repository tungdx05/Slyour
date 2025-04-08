<?php require_once "./views/layout/header.php"; ?>
<?php require_once "./views/layout/menu.php"; ?>

<main class="main-wrapper">

    <!-- Start Slider Area -->
    <div class="axil-main-slider-area main-slider-style-2">
        <div class="container">
            <div class="slider-offset-left">
                <div class="row row--20">
                    <div class="col-lg-9">
                        <div class="slider-box-wrap">
                            <div class="slider-activation-one axil-slick-dots">
                                <?php foreach ($listSanPham as $sanPham): ?>
                                    <div class="single-slide slick-slide">
                                        <div class="main-slider-content">
                                            <span class="subtitle"><i class="fal fa-watch"></i> Smartwatch</span>
                                            <h1 class="title"><?= $sanPham['ten_san_pham'] ?></h1>
                                            <div class="shop-btn">
                                                <a href="shop.html" class="axil-btn">Shop Now <i class="fal fa-long-arrow-right"></i></a>
                                            </div>
                                        </div>
                                        <div class="main-slider-thumb">
                                            <img style="height: 200px;" src="<?= $sanPham['hinh_anh'] ?>" alt="Product">
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3">
                        <div class="slider-product-box">
                            <div class="product-thumb">
                                <a href="single-product.html">
                                    <img src="assets/images/product/product-41.png" alt="Product">
                                </a>
                            </div>
                            <h6 class="title"><a href="single-product.html">Yantiti Leather Bags</a></h6>
                            <span class="price">$29.99</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Slider Area -->

    <div class="service-area">
        <div class="container">
            <div class="row row-cols-xl-5 row-cols-lg-5 row-cols-md-3 row-cols-sm-2 row-cols-1 row--20">
                <?php 
                $services = [
                    ['icon' => 'service1.png', 'title' => 'Fast & Secure Delivery'],
                    ['icon' => 'service2.png', 'title' => '100% Guarantee On Product'],
                    ['icon' => 'service3.png', 'title' => '24 Hour Return Policy'],
                    ['icon' => 'service4.png', 'title' => 'Next Level Pro Quality'],
                    ['icon' => 'service5.png', 'title' => 'Customer Support']
                ];
                foreach ($services as $service): ?>
                    <div class="col">
                        <div class="service-box">
                            <div class="icon">
                                <img src="assets/images/icons/<?= $service['icon'] ?>" alt="Service">
                            </div>
                            <h6 class="title"><?= $service['title'] ?></h6>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <!-- Start New Arrivals Product Area -->
    <div class="axil-new-arrivals-product-area fullwidth-container bg-color-white axil-section-gap pb--0">
        <div class="container ml--xxl-0">
            <div class="product-area pb--50">
                <div class="section-title-wrapper">
                    <span class="title-highlighter highlighter-primary"><i class="far fa-shopping-basket"></i> This Week’s</span>
                    <h2 class="title">Sản phẩm của chúng tôi</h2>
                </div>
                <div class="new-arrivals-product-activation slick-layout-wrapper--15 axil-slick-arrow arrow-top-slide">
                    <?php foreach ($listSanPham as $sanPham): ?>
                        <div class="slick-single-layout">
                            <div class="axil-product product-style-four">
                                <div class="thumbnail">
                                    <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' . $sanPham['id']; ?>">
                                        <img style="height: 300px;" data-sal="fade" data-sal-delay="100" data-sal-duration="1500" src="<?= $sanPham['hinh_anh'] ?>" alt="Product Images">
                                        <img class="hover-img" src="<?= $sanPham['hinh_anh'] ?>" alt="Product Images">
                                    </a>
                                    <div class="label-block label-right">
                                        <?php if ((new DateTime())->diff(new DateTime($sanPham['ngay_nhap']))->days <= 7): ?>
                                            <div class="product-badget">Mới</div>
                                        <?php endif; ?>
                                        <?php if ($sanPham['gia_khuyen_mai'] > 0): ?>
                                            <div class="product-badget">Giảm giá</div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="product-hover-action">
                                        <ul class="cart-action">
                                            <li class="wishlist"><a href="wishlist.html"><i class="far fa-heart"></i></a></li>
                                            <li class="select-option"><a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' . $sanPham['id']; ?>">Xem chi tiết</a></li>
                                            <li class="quickview"><a href="#" data-bs-toggle="modal" data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <div class="inner">
                                        <h5 class="title"><a href="single-product.html"><?= $sanPham['ten_san_pham'] ?></a></h5>
                                        <div class="product-price-variant">
                                            <?php if ($sanPham['gia_khuyen_mai'] > 0): ?>
                                                <span class="price current-price"><?= formatPrice($sanPham['gia_khuyen_mai']) . '$'; ?></span>
                                                <span class="price old-price"><del><?= formatPrice($sanPham['gia_san_pham']) . '$'; ?></del></span>
                                            <?php else: ?>
                                                <span class="price current-price"><?= formatPrice($sanPham['gia_san_pham']) . '$' ?></span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <div class="row">
                    <div class="col-lg-12 text-center mt--20 mt_sm--0">
                        <a href="shop.html" class="axil-btn btn-bg-lighter btn-load-more">Xem tất cả sản phẩm</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End New Arrivals Product Area -->

    <!-- Start Explore Product Area -->
    <div class="axil-new-arrivals-product-area fullwidth-container bg-color-white axil-section-gap pb--0">
        <div class="container">
            <div class="product-area pb--50">
                <div class="section-title-wrapper">
                    <span class="title-highlighter highlighter-primary"><i class="far fa-shopping-basket"></i> This Week’s</span>
                    <h2 class="title">Top 10 sản phẩm nổi bật</h2>
                </div>
                <div class="new-arrivals-product-activation slick-layout-wrapper--15 axil-slick-arrow arrow-top-slide">
                    <?php foreach ($listTop10 as $topSp): ?>
                        <div class="slick-single-layout">
                            <div class="axil-product product-style-four">
                                <div class="thumbnail">
                                    <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' . $topSp['id']; ?>">
                                        <img style="height: 300px;" data-sal="fade" data-sal-delay="100" data-sal-duration="1500" src="<?= $topSp['hinh_anh'] ?>" alt="Product Images">
                                        <img class="hover-img" src="<?= $topSp['hinh_anh'] ?>" alt="Product Images">
                                    </a>
                                    <div class="label-block label-right">
                                        <?php if ((new DateTime())->diff(new DateTime($topSp['ngay_nhap']))->days <= 7): ?>
                                            <div class="product-badget">Mới</div>
                                        <?php endif; ?>
                                        <?php if ($topSp['gia_khuyen_mai'] > 0): ?>
                                            <div class="product-badget">Giảm giá</div>
                                        <?php endif; ?>
                                    </div>
                                    <div class="product-hover-action">
                                        <ul class="cart-action">
                                            <li class="wishlist"><a href="wishlist.html"><i class="far fa-heart"></i></a></li>
                                            <li class="select-option"><a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' . $topSp['id']; ?>">Xem chi tiết</a></li>
                                            <li class="quickview"><a href="#" data-bs-toggle="modal" data-bs-target="#quick-view-modal"><i class="far fa-eye"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="product-content">
                                    <div class="inner">
                                        <h5 class="title"><a href="single-product.html"><?= $topSp['ten_san_pham'] ?></a></h5>
                                        <div class="product-price-variant">
                                            <?php if ($topSp['gia_khuyen_mai'] > 0): ?>
                                                <span class="price current-price"><?= formatPrice($topSp['gia_khuyen_mai']) . '$'; ?></span>
                                                <span class="price old-price"><del><?= formatPrice($topSp['gia_san_pham']) . '$'; ?></del></span>
                                            <?php else: ?>
                                                <span class="price current-price"><?= formatPrice($topSp['gia_san_pham']) . '$' ?></span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>

                <div class="row">
                    <div class="col-lg-12 text-center mt--20 mt_sm--0">
                        <a href="shop.html" class="axil-btn btn-bg-lighter btn-load-more">Xem tất cả sản phẩm</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Start Axil Newsletter Area -->
    <div class="axil-newsletter-area axil-section-gap pt--0">
        <div class="container">
            <div class="etrade-newsletter-wrapper bg_image bg_image--12">
                <div class="newsletter-content">
                    <span class="title-highlighter highlighter-primary2"><i class="fas fa-envelope-open"></i>Newsletter</span>
                    <h2 class="title mb--40 mb_sm--30">Get weekly update</h2>
                    <div class="input-group newsletter-form">
                        <div class="position-relative newsletter-inner mb--15">
                            <input placeholder="example@gmail.com" type="text">
                        </div>
                        <button type="submit" class="axil-btn mb--15">Subscribe</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- End .container -->
    </div>
    <!-- End Axil Newsletter Area -->

</main>

<div class="service-area">
    <div class="container">
        <div class="row row-cols-xl-4 row-cols-sm-2 row-cols-1 row--20">
            <?php 
            $footerServices = [
                ['icon' => 'service1.png', 'title' => 'Fast & Secure Delivery', 'description' => 'Tell about your service.'],
                ['icon' => 'service2.png', 'title' => 'Money Back Guarantee', 'description' => 'Within 10 days.'],
                ['icon' => 'service3.png', 'title' => '24 Hour Return Policy', 'description' => 'No question ask.'],
                ['icon' => 'service4.png', 'title' => 'Pro Quality Support', 'description' => '24/7 Live support.']
            ];
            foreach ($footerServices as $service): ?>
                <div class="col">
                    <div class="service-box service-style-2">
                        <div class="icon">
                            <img src="assets/images/icons/<?= $service['icon'] ?>" alt="Service">
                        </div>
                        <div class="content">
                            <h6 class="title"><?= $service['title'] ?></h6>
                            <p><?= $service['description'] ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<?php require_once "./views/layout/footer.php"; ?>