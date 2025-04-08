<?php require_once "./views/layout/header.php"; ?>
<?php require_once "./views/layout/menu1.php"; ?>

<?php
// Kết nối lớp SanPham
$sanPham = new SanPham();

// Lấy ID danh mục từ URL
$danh_muc_id = isset($_GET['danh_muc_id']) ? $_GET['danh_muc_id'] : 0;

// Lấy danh sách sản phẩm theo danh mục
$listSanPham = $sanPham->sanPhamTheoDanhMuc($danh_muc_id);

// Lấy thông tin danh mục
$listDanhMuc = $sanPham->getAllDanhMuc();
$danhMucHienTai = array_filter($listDanhMuc, function($dm) use ($danh_muc_id) {
    return $dm['id'] == $danh_muc_id;
});
$danhMucHienTai = reset($danhMucHienTai);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sản phẩm theo danh mục - <?= $danhMucHienTai['ten_danh_muc'] ?></title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<h3 class="title">Danh mục: <?= $danhMucHienTai['ten_danh_muc'] ?></h3>

    <div class="new-arrivals-product-activation slick-layout-wrapper--15 axil-slick-arrow arrow-top-slide">
        <?php if (!empty($listSanPham)) { ?>
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
        <?php } ?>
    </div>
</body>
</html>
<?php require_once "./views/layout/footer.php"; ?>