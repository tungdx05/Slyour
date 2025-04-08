<?php require_once "./views/layout/header.php"; ?>
<?php require_once "./views/layout/menu1.php"; ?>

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Slyour</title>
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
<main>

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
    <div class="cart-main-wrapper section-padding">
        <div class="container">
            <div class="section-bg-color p-4 rounded shadow">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- Cart Table Area -->
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover align-middle text-center">
                                <thead class="table-dark">
                                    <tr>
                                        <th>Ảnh sản phẩm</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Giá</th>
                                        <th>Số lượng</th>
                                        <th>Tổng tiền</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $tongGioHang = 0;
                                    foreach ($chiTietGioHang as $key => $sanPham): ?>
                                        <form action="<?= BASE_URL . '?act=xoa-san-pham-gio-hang' ?>" method="POST">
                                            <input type="hidden" name="chi_tiet_gio_hang_id" value="<?= $sanPham['id'] ?>">
                                            <tr>
                                                <td><img class="img-fluid rounded" src="<?= BASE_URL . $sanPham['hinh_anh'] ?>" alt="Product" width="80px" /></td>
                                                <td><?= $sanPham['ten_san_pham'] ?></td>
                                                <td class="text-success">
                                                    <?php if ($sanPham['gia_khuyen_mai'] > 0): ?>
                                                        <?= formatPrice($sanPham['gia_khuyen_mai']) ?>$
                                                    <?php else: ?>
                                                        <?= formatPrice($sanPham['gia_san_pham']) ?>$
                                                    <?php endif ?>
                                                </td>
                                                <td><?= $sanPham['so_luong'] ?></td>
                                                <td class="fw-bold">
                                                    <?php
                                                    $tongTien = $sanPham['gia_khuyen_mai'] > 0
                                                        ? $sanPham['gia_khuyen_mai'] * $sanPham['so_luong']
                                                        : $sanPham['gia_san_pham'] * $sanPham['so_luong'];
                                                    $tongGioHang += $tongTien;
                                                    echo formatPrice($tongTien) . '$';
                                                    ?>
                                                </td>
                                                <td>
                                                    <button type="submit" class="btn btn-danger btn-sm">
                                                        <i class="fa fa-trash-o"></i> Xóa
                                                    </button>
                                                </td>
                                            </tr>
                                        </form>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                

                <!-- Cart Calculation Area -->
                <div class="row justify-content-end mt-4">
                    <div class="col-lg-5">
                        <div class="p-4 bg-light rounded shadow">
                            <h5 class="text-center mb-3">Tổng đơn hàng</h5>
                            <table class="table">
                                <tr>
                                    <td>Tổng tiền sản phẩm:</td>
                                    <td class="text-end fw-bold"><?= formatPrice($tongGioHang) ?> $</td>
                                </tr>
                                <tr>
                                    <td>Vận chuyển:</td>
                                    <td class="text-end fw-bold">2$</td>
                                </tr>
                                <tr class="total fw-bold fs-5">
                                    <td>Tổng thanh toán:</td>
                                    <td class="text-end text-danger"><?= formatPrice($tongGioHang + 2) ?> $</td>
                                </tr>
                            </table>
                            <a href="<?= BASE_URL . '?act=thanh-toan' ?>" class="btn btn-sqr w-100 mt-3 ">
                                Tiến hành đặt hàng
                            </a>

                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

    <!-- cart main wrapper end -->
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
</main>



<?php require_once "./views/layout/footer.php"; ?>