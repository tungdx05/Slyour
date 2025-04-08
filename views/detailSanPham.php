<?php
require_once "./views/layout/header.php";
require_once "./views/layout/menu1.php";

?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Website bán thú cưng</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/dog.png">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,300i,400,400i,700,900" rel="stylesheet">
    <link rel="stylesheet" href="./views/assets1/css/vendor/bootstrap.min.css">
    <link rel="stylesheet" href="./views/assets1/css/vendor/pe-icon-7-stroke.css">
    <link rel="stylesheet" href="./views/assets1/css/vendor/font-awesome.min.css">
    <link rel="stylesheet" href="./views/assets1/css/plugins/slick.min.css">
    <link rel="stylesheet" href="./views/assets1/css/plugins/animate.css">
    <link rel="stylesheet" href="./views/assets1/css/plugins/nice-select.css">
    <link rel="stylesheet" href="./views/assets1/css/plugins/jqueryui.min.css">
    <link rel="stylesheet" href="./views/assets1/css/style.css">

</head>
<!-- <div class="breadcrumb-area">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="breadcrumb-wrap">
                    <nav aria-label="breadcrumb">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="<?= BASE_URL ?>"><i class="fa fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#">Sản phẩm</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Chi tiết sản phẩm</li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div> -->

<div class="shop-main-wrapper section-padding pb-0">
<?php if (isset($_SESSION['error'])): ?>
    <div class="alert alert-danger">
        <?= $_SESSION['error']; unset($_SESSION['error']); ?>
    </div>
<?php endif; ?>

<?php if (isset($_SESSION['success'])): ?>
    <div class="alert alert-success">
        <?= $_SESSION['success']; unset($_SESSION['success']); ?>
    </div>
<?php endif; ?>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 order-1 order-lg-2">
                <div class="product-details-inner">
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="product-large-slider">
                                <?php foreach ($listAnhSanPham as $anhSanPham): ?>
                                    <div class="pro-large-img img-zoom">
                                        <img src="<?= BASE_URL . htmlspecialchars($anhSanPham['link_hinh_anh']) ?>" alt="product-details" />
                                    </div>
                                <?php endforeach; ?>
                            </div>
                            <div class="pro-nav slick-row-10 slick-arrow-style">
                                <?php foreach ($listAnhSanPham as $anhSanPham): ?>
                                    <div class="pro-nav-thumb">
                                        <img src="<?= BASE_URL . htmlspecialchars($anhSanPham['link_hinh_anh']) ?>" alt="product-details" />
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="product-details-des">
                                <h3 class="product-name"><?= htmlspecialchars($sanPham['ten_san_pham']) ?></h3>
                                <div class="ratings d-flex">
                                    <div class="pro-review">
                                        <span><?= count($listBinhLuan) . ' Bình luận' ?></span>
                                    </div>
                                </div>
                                <div class="price-box">
                                    <?php if ($sanPham['gia_khuyen_mai'] > 0) { ?>
                                        <span class="price-regular"><?= formatPrice($sanPham['gia_khuyen_mai']) . ' $' ?></span>
                                        <span class="price-old"><del><?= formatPrice($sanPham['gia_san_pham']) . ' $' ?></del></span>
                                    <?php } else { ?>
                                        <span class="price-regular"><?= formatPrice($sanPham['gia_san_pham']) . '$' ?></span>
                                    <?php } ?>
                                </div>
                                <div class="availability">
                                    <i class="fa fa-check-circle"></i>
                                    <span><?= $sanPham['so_luong'] . ' sản phẩm' ?></span>
                                </div>
                                <form action="<?= BASE_URL . '?act=them-gio-hang' ?>" method="POST">
    <p class="pro-desc"><?= htmlspecialchars($sanPham['mo_ta']) ?></p>
    <div class="quantity-cart-box d-flex align-items-center">
        <h6 class="option-title">Số lượng:</h6>
        <div class="quantity">
            <input type="hidden" name="san_pham_id" value="<?= $sanPham['id'] ?>">
            <div class="product-single-qty">
                <button type="button" id="decrease" onclick="changeQuantity(-1)" <?= $sanPham['so_luong'] == 0 ? 'disabled' : '' ?>></button>
                <input 
                    id="quantityInput" 
                    type="number" 
                    name="so_luong" 
                    min="1" 
                    max="<?= $sanPham['so_luong'] ?>" 
                    value="<?= $sanPham['so_luong'] == 0 ? '0' : '1' ?>" 
                    <?= $sanPham['so_luong'] == 0 ? 'readonly' : '' ?>>
                <button type="button" id="increase" onclick="changeQuantity(1)" <?= $sanPham['so_luong'] == 0 ? 'disabled' : '' ?>></button>
            </div>
        </div>
        <div class="action_link">
            <?php if ($sanPham['so_luong'] == 0): ?>
                <span class="text-danger">Hết hàng</span>
            <?php else: ?>
                <button class="btn btn-cart2" type="submit">Thêm vào giỏ hàng</button>
            <?php endif; ?>
        </div>
    </div>
</form>

                            </div>
                        </div>
                    </div>

                    <div class="product-details-reviews section-padding pb-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="product-review-info">
                                    <ul class="nav review-tab">
                                        <li>
                                            <a class="active" data-bs-toggle="tab" href="#tab_three">Bình luận (<?= count($listBinhLuan) ?>)</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content reviews-tab">
                                        <div class="tab-pane fade show active" id="tab_three">
                                            <?php if (!empty($listBinhLuan)) : ?>
                                                <?php foreach ($listBinhLuan as $binhLuan) : ?>
                                                    <div class="total-reviews">
                                                        <div class="rev-avatar">
                                                            <img src="<?= BASE_URL . htmlspecialchars($binhLuan['anh_dai_dien']) ?>" alt="">
                                                        </div>
                                                        <div class="review-box">
                                                            <div class="post-author">
                                                                <p><span><?= htmlspecialchars($binhLuan['ho_ten']) ?> - </span><?= htmlspecialchars($binhLuan['ngay_dang']) ?></p>
                                                            </div>
                                                            <p><?= htmlspecialchars($binhLuan['noi_dung']) ?></p>
                                                        </div>
                                                    </div>
                                                <?php endforeach; ?>
                                            <?php else : ?>
                                                <p>Chưa có bình luận nào.</p>
                                            <?php endif; ?>

                                            <form action="<?= BASE_URL . '?act=gui-binh-luan' ?>" method="POST" class="review-form">
                                                <input type="hidden" name="san_pham_id" value="<?= $sanPham['id'] ?>">
                                                <div class="form-group row">
                                                    <div class="col">
                                                        <label class="col-form-label"><span class="text-danger">*</span> Bình luận</label>
                                                        <?php if (!isset($_SESSION['user_client'])) : ?>
                                                            <p class="text-danger">Vui lòng đăng nhập để gửi bình luận</p>
                                                        <?php else : ?>
                                                            <input type="hidden" name="tai_khoan_id" value="<?= $_SESSION['user_client']['id'] ?>">
                                                            <textarea class="form-control" name="binh_luan" required></textarea>
                                                        <?php endif; ?>
                                                    </div>
                                                </div>
                                                <div class="buttons">
                                                    <button class="btn btn-sqr" type="submit">Gửi bình luận</button>
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
        </div>

        <section class="related-products section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="section-title text-center">
                            <h2 class="title">Sản phẩm liên quan</h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="product-carousel-4 slick-row-10 slick-arrow-style">
                            <?php foreach ($listSanPhamCungDanhMuc as $sanPham) : ?>
                                <div class="product-item">
                                    <figure class="product-thumb">
                                        <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' . $sanPham['id'] ?>">
                                            <img style="height: 300px;" class="pri-img" src="<?= BASE_URL . htmlspecialchars($sanPham['hinh_anh']) ?>" alt="product">
                                            <img class="sec-img" src="<?= BASE_URL . htmlspecialchars($sanPham['hinh_anh']) ?>" alt="product">
                                        </a>
                                        <div class="product-badge">
                                            <?php
                                            $ngayNhap = new DateTime($sanPham['ngay_nhap']);
                                            $ngayHienTai = new DateTime();
                                            $tinhNgay = $ngayHienTai->diff($ngayNhap);
                                            if ($tinhNgay->days <= 7) { ?>
                                                <div class="product-label new">
                                                    <span>Mới</span>
                                                </div>
                                            <?php } ?>
                                            <?php if ($sanPham['gia_khuyen_mai'] > 0) { ?>
                                                <div class="product-label discount">
                                                    <span>Giảm giá</span>
                                                </div>
                                            <?php } ?>
                                        </div>
                                        <div class="cart-hover">
                                            <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' . $sanPham['id'] ?>">
                                                <button class="btn btn-cart">Xem chi tiết</button>
                                            </a>
                                        </div>
                                    </figure>
                                    <div class="product-caption text-center">
                                        <h6 class="product-name">
                                            <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' . $sanPham['id'] ?>"><?= htmlspecialchars($sanPham['ten_san_pham']) ?></a>
                                        </h6>
                                        <div class="price-box">
                                            <?php if ($sanPham['gia_khuyen_mai'] > 0) { ?>
                                                <span class="price-regular"><?= formatPrice($sanPham['gia_khuyen_mai']) . ' $' ?></span>
                                                <span class="price-old"><del><?= formatPrice($sanPham['gia_san_pham']) . ' $' ?></del></span>
                                            <?php } else { ?>
                                                <span class="price-regular"><?= formatPrice($sanPham['gia_san_pham']) . ' $' ?></span>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <?php require_once "./views/layout/footer.php"; ?>


    </div>
</div>
<!-- JS Scripts -->
<script src="./views/assets1/js/vendor/modernizr-3.6.0.min.js"></script>
<script src="./views/assets1/js/vendor/jquery-3.6.0.min.js"></script>
<script src="./views/assets1/js/vendor/bootstrap.bundle.min.js"></script>
<script src="./views/assets1/js/plugins/slick.min.js"></script>
<script src="./views/assets1/js/plugins/countdown.min.js"></script>
<script src="./views/assets1/js/plugins/nice-select.min.js"></script>
<script src="./views/assets1/js/plugins/jqueryui.min.js"></script>
<script src="./views/assets1/js/plugins/image-zoom.min.js"></script>
<script src="./views/assets1/js/plugins/imagesloaded.pkgd.min.js"></script>
<script src="./views/assets1/js/plugins/ajaxchimp.js"></script>
<script src="./views/assets1/js/plugins/ajax-mail.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY"></script>
<script src="./views/assets1/js/plugins/google-map.js"></script>
<script src="./views/assets1/js/main.js"></script>