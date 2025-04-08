<?php require_once 'layout/header.php' ?>

<?php require_once 'layout/menu1.php' ?>

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
    <!-- breadcrumb area start -->

    <!-- breadcrumb area end -->

    <!-- checkout main wrapper start -->
    <div class="checkout-page-wrapper section-padding">
    <div class="container">
        <div class="row">
            <div class="col-12 mb-4">
                <h2 class="text-center fw-bold">Thanh Toán</h2>
            </div>
        </div>
        <form action="<?= BASE_URL . '?act=xu-ly-thanh-toan' ?>" method="post">
            <div class="row">
                <!-- Checkout Billing Details -->
                <div class="col-lg-6">
                    <div class="checkout-billing-details-wrap bg-light p-4 rounded shadow-sm">
                        <h5 class="checkout-title mb-4">Thông Tin Người Nhận</h5>
                        <div class="billing-form-wrap">
                            <div class="mb-3">
                                <label for="ten_nguoi_nhan" class="form-label">Tên Người Nhận</label>
                                <input type="text" class="form-control" id="ten_nguoi_nhan" name="ten_nguoi_nhan" value="<?= $user['ho_ten'] ?>" required />
                            </div>
                            <div class="mb-3">
                                <label for="email_nguoi_nhan" class="form-label">Địa Chỉ Email</label>
                                <input type="email" class="form-control" id="email_nguoi_nhan" name="email_nguoi_nhan" value="<?= $user['email'] ?>" required />
                            </div>
                            <div class="mb-3">
                                <label for="sdt_nguoi_nhan" class="form-label">Số Điện Thoại</label>
                                <input type="text" class="form-control" id="sdt_nguoi_nhan" name="sdt_nguoi_nhan" value="<?= $user['so_dien_thoai'] ?>" required />
                            </div>
                            <div class="mb-3">
                                <label for="dia_chi_nguoi_nhan" class="form-label">Địa Chỉ Người Nhận</label>
                                <input type="text" class="form-control" id="dia_chi_nguoi_nhan" name="dia_chi_nguoi_nhan" value="<?= $user['dia_chi'] ?>" required />
                            </div>
                            <div class="mb-3">
                                <label for="ghi_chu" class="form-label">Ghi Chú</label>
                                <textarea class="form-control" id="ghi_chu" name="ghi_chu" rows="3" placeholder="Nhập ghi chú của bạn"></textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Order Summary Details -->
                <div class="col-lg-6">
                    <div class="order-summary-details bg-light p-4 rounded shadow-sm">
                        <h5 class="checkout-title mb-4">Thông Tin Sản Phẩm</h5>
                        <div class="order-summary-content">
                            <div class="table-responsive">
                                <table class="table table-bordered text-center">
                                    <thead class="table-dark">
                                        <tr>
                                            <th>Sản phẩm</th>
                                            <th>Tổng</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $tongGioHang = 0;
                                        foreach ($chiTietGioHang as $sanPham): ?>
                                            <tr>
                                                <td>
                                                    <?= $sanPham['ten_san_pham'] ?> <strong>× <?= $sanPham['so_luong'] ?></strong>
                                                </td>
                                                <td>
                                                    <?php
                                                    $tongTien = ($sanPham['gia_khuyen_mai'] > 0) 
                                                                ? $sanPham['gia_khuyen_mai'] * $sanPham['so_luong']
                                                                : $sanPham['gia_san_pham'] * $sanPham['so_luong'];
                                                    $tongGioHang += $tongTien;
                                                    echo formatPrice($tongTien) . '$';
                                                    ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                    <tfoot class="fw-bold">
                                        <tr>
                                            <td>Tổng Tiền Sản Phẩm</td>
                                            <td><?= formatPrice($tongGioHang) . '$' ?></td>
                                        </tr>
                                        <tr>
                                            <td>Phí Vận Chuyển</td>
                                            <td>2 $</td>
                                        </tr>
                                        <tr class="table-success">
                                            <td>Tổng Đơn Hàng</td>
                                            <input type="hidden" name="tong_tien" value="<?= $tongGioHang + 2 ?>">
                                            <td><?= formatPrice($tongGioHang + 2) . ' $' ?></td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>

                            <!-- Payment Method -->
                            <div class="mt-3">
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="radio" name="phuong_thuc_thanh_toan_id" id="cashon" value="1" checked>
                                    <label class="form-check-label" for="cashon">Thanh toán khi nhận hàng</label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="phuong_thuc_thanh_toan_id" id="directbank" value="2">
                                    <label class="form-check-label" for="directbank">Thanh toán qua ngân hàng</label>
                                </div>
                            </div>

                            <!-- Terms and Place Order Button -->
                            <div class="mt-4 text-center">
                                <div class="form-check mb-3">
                                    <input type="checkbox" class="form-check-input" id="terms" required>
                                    <label class="form-check-label" for="terms">Tôi đồng ý với các điều khoản</label>
                                </div>
                                <button type="submit" class="btn btn-sqr">Tiến hành đặt hàng</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>


    <!-- checkout main wrapper end -->
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

<?php require_once 'layout/miniCart.php' ?>

<?php require_once 'layout/footer.php' ?>