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
                                <div class="single-slide slick-slide">
                                    <div class="main-slider-content">
                                        <span class="subtitle"><i class="fal fa-watch"></i> Smartwatch</span>
                                        <h1 class="title">Bloosom Smat Watch</h1>
                                        <div class="shop-btn">
                                            <a href="shop.html" class="axil-btn">Shop Now <i class="fal fa-long-arrow-right"></i></a>
                                        </div>
                                    </div>
                                    <div class="main-slider-thumb">
                                        <img src="assets/images/product/product-40.png" alt="Product">
                                    </div>
                                </div>
                                <div class="single-slide slick-slide">
                                    <div class="main-slider-content">
                                        <span class="subtitle"><i class="fal fa-watch"></i> Smartwatch</span>
                                        <h1 class="title">Delux Brand Watch</h1>
                                        <div class="shop-btn">
                                            <a href="shop.html" class="axil-btn">Shop Now <i class="fal fa-long-arrow-right"></i></a>
                                        </div>
                                    </div>
                                    <div class="main-slider-thumb">
                                        <img src="assets/images/product/product-46.png" alt="Product">
                                    </div>
                                </div>
                                <div class="single-slide slick-slide">
                                    <div class="main-slider-content">
                                        <span class="subtitle"><i class="fal fa-watch"></i> Smartwatch</span>
                                        <h1 class="title">Bloosom Smat Watch</h1>
                                        <div class="shop-btn">
                                            <a href="shop.html" class="axil-btn">Shop Now <i class="fal fa-long-arrow-right"></i></a>
                                        </div>
                                    </div>
                                    <div class="main-slider-thumb">
                                        <img src="assets/images/product/product-40.png" alt="Product">
                                    </div>
                                </div>
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
                <div class="col">
                    <div class="service-box">
                        <div class="icon">
                            <img src="assets/images/icons/service1.png" alt="Service">
                        </div>
                        <h6 class="title">Fast &amp; Secure Delivery</h6>
                    </div>
                </div>
                <div class="col">
                    <div class="service-box">
                        <div class="icon">
                            <img src="assets/images/icons/service2.png" alt="Service">
                        </div>
                        <h6 class="title">100% Guarantee On Product</h6>
                    </div>
                </div>
                <div class="col">
                    <div class="service-box">
                        <div class="icon">
                            <img src="assets/images/icons/service3.png" alt="Service">
                        </div>
                        <h6 class="title">24 Hour Return Policy</h6>
                    </div>
                </div>
                <div class="col">
                    <div class="service-box">
                        <div class="icon">
                            <img src="assets/images/icons/service4.png" alt="Service">
                        </div>
                        <h6 class="title">24 Hour Return Policy</h6>
                    </div>
                </div>
                <div class="col">
                    <div class="service-box">
                        <div class="icon">
                            <img src="assets/images/icons/service5.png" alt="Service">
                        </div>
                        <h6 class="title">Next Level Pro Quality</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Start New Arrivals Product Area  -->

    <div class="axil-new-arrivals-product-area fullwidth-container bg-color-white axil-section-gap pb--0">
        <div class="container ml--xxl-0">
            <div class="product-area pb--50">
                <div class="section-title-wrapper">
                    <span class="title-highlighter highlighter-primary"><i class="far fa-shopping-basket"></i> This Week’s</span>
                    <h2 class="title">Sản phẩm của chúng tôi</h2>
                </div>
                <div class="new-arrivals-product-activation slick-layout-wrapper--15 axil-slick-arrow  arrow-top-slide">
                    <?php foreach ($listSanPhamTimKiem as $key => $sanPham): ?>
                        <!-- End .slick-single-layout -->
                        <div class="slick-single-layout">
                            <div class="axil-product product-style-four">
                                <div class="thumbnail">
                                    <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' . $sanPham['id']; ?>">
                                        <img data-sal="fade" data-sal-delay="100" data-sal-duration="1500" src="<?= $sanPham['hinh_anh'] ?>" alt="Product Images">
                                        <img class="hover-img" src="<?= $sanPham['hinh_anh'] ?>" alt="Product Images">
                                    </a>
                                    <div class="label-block label-right">
                                    <?php
                                                    $ngayNhap = new DateTime($sanPham['ngay_nhap']);
                                                    $ngayHienTai = new DateTime();
                                                    $tinhNgay = $ngayHienTai->diff($ngayNhap);
                                                    if ($tinhNgay->days <= 7) { 
                                                        ?>
                                                        <div class="product-badget">Mới</div>


                                        <?php }?>
                                        
                                                    <?php if ($sanPham['gia_khuyen_mai'] > 0) { ?>
                                                        <div class="product-badget">giảm giá</div>

                                                    <?php } ?>
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
                                        <?php if ($sanPham['gia_khuyen_mai'] > 0) { ?>
                                                        <span class="price current-price"><?= formatPrice($sanPham['gia_khuyen_mai']) . '$'; ?></span>
                                                        <span class="price old-price"><del><?= formatPrice($sanPham['gia_san_pham']) . '$'; ?></del></span>
                                                    <?php } else { ?>
                                                        <span class="price current-price"><?= formatPrice($sanPham['gia_san_pham']) . '$' ?></span>


                                                    <?php }    ?>
                                            <!-- <span class="price old-price">$80</span>
                                            <span class="price current-price">$60</span> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach ?>
                 

                </div>

                <div class="row">
                        <div class="col-lg-12 text-center mt--20 mt_sm--0">
                            <a href="shop.html" class="axil-btn btn-bg-lighter btn-load-more">View All Products</a>
                        </div>
                    </div>

            </div>



        </div>

    </div>
  
    <!-- End New Arrivals Product Area  -->



    <!-- Start Expolre Product Area  -->
   
     

</main>

<div class="service-area">
    <div class="container">
        <div class="row row-cols-xl-4 row-cols-sm-2 row-cols-1 row--20">
            <div class="col">
                <div class="service-box service-style-2">
                    <div class="icon">
                        <img src="assets/images/icons/service1.png" alt="Service">
                    </div>
                    <div class="content">
                        <h6 class="title">Fast &amp; Secure Delivery</h6>
                        <p>Tell about your service.</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="service-box service-style-2">
                    <div class="icon">
                        <img src="assets/images/icons/service2.png" alt="Service">
                    </div>
                    <div class="content">
                        <h6 class="title">Money Back Guarantee</h6>
                        <p>Within 10 days.</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="service-box service-style-2">
                    <div class="icon">
                        <img src="assets/images/icons/service3.png" alt="Service">
                    </div>
                    <div class="content">
                        <h6 class="title">24 Hour Return Policy</h6>
                        <p>No question ask.</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="service-box service-style-2">
                    <div class="icon">
                        <img src="assets/images/icons/service4.png" alt="Service">
                    </div>
                    <div class="content">
                        <h6 class="title">Pro Quality Support</h6>
                        <p>24/7 Live support.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require_once "./views/layout/footer.php"; ?>