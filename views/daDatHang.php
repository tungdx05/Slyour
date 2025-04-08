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
        <!-- Notification Section -->
        <div class="row mb-4">
            <div class="col-12">
                <?php if (isset($_SESSION['dat_hang_thanh_cong'])): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="fas fa-check-circle me-2"></i> <!-- Font Awesome icon for feedback -->
                        <?= $_SESSION['dat_hang_thanh_cong'] ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>
            </div>
        </div>

        <!-- Order Information -->
        <div class="row mb-3">
            <div class="col-12">
                <p class="text-success"><strong>Ngày đặt:</strong> <?= $thongTinDonHang[0]['ngay_dat'] ?></p>
                <p class="text-success"><strong>Mã đơn hàng:</strong> <?= $thongTinDonHang[0]['ma_don_hang'] ?></p>
                <p class="text-success"><strong>Trạng thái đơn hàng:</strong> <?= $thongTinDonHang[0]['ten_trang_thai'] ?></p>
            </div>
        </div>

        <!-- Checkout Details and Summary -->
        <div class="row">
            <!-- Billing Details -->
            <div class="col-lg-6 mb-4">
                <div class="checkout-billing-details-wrap bg-light p-4 rounded shadow-sm">
                    <h5 class="checkout-title mb-4">Thông Tin Người Nhận</h5>
                    <div class="billing-form-wrap">
                        <div class="mb-3">
                            <label class="form-label">Tên Người Nhận</label>
                            <input type="text" class="form-control" value="<?= $thongTinDonHang[0]['ten_nguoi_nhan'] ?>" disabled />
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Địa Chỉ Email</label>
                            <input type="email" class="form-control" value="<?= $thongTinDonHang[0]['email_nguoi_nhan'] ?>" disabled />
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Số Điện Thoại</label>
                            <input type="text" class="form-control" value="<?= $thongTinDonHang[0]['sdt_nguoi_nhan'] ?>" disabled />
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Địa Chỉ Người Nhận</label>
                            <input type="text" class="form-control" value="<?= $thongTinDonHang[0]['dia_chi_nguoi_nhan'] ?>" disabled />
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Ghi Chú</label>
                            <textarea class="form-control" rows="3" disabled><?= $thongTinDonHang[0]['ghi_chu'] ?></textarea>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Order Summary Details -->
            <div class="col-lg-6">
                <div class="order-summary-details bg-light p-4 rounded shadow-sm">
                    <h5 class="checkout-title mb-4">Thông Tin Sản Phẩm</h5>
                    <div class="order-summary-content">
                        <!-- Order Summary Table -->
                        <div class="table-responsive">
                            <table class="table table-bordered text-center align-middle">
                                <thead class="table-dark">
                                    <tr>
                                        <th>Sản Phẩm</th>
                                        <th>Tổng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $tongGioHang = 0; ?>
                                    <?php foreach ($chiTietGioHang as $sanPham): ?>
                                        <tr>
                                            <td><?= htmlspecialchars($sanPham['ten_san_pham']) ?> × <strong><?= $sanPham['so_luong'] ?></strong></td>
                                            <td>
                                                <?php
                                                    $tongTien = $sanPham['gia_khuyen_mai'] > 0 ? $sanPham['gia_khuyen_mai'] * $sanPham['so_luong'] : $sanPham['gia_san_pham'] * $sanPham['so_luong'];
                                                    $tongGioHang += $tongTien;
                                                    echo formatPrice($tongTien) . ' $';
                                                ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                                <tfoot class="fw-bold">
                                    <tr>
                                        <td>Tổng Tiền Sản Phẩm</td>
                                        <td><?= formatPrice($tongGioHang) . ' $' ?></td>
                                    </tr>
                                    <tr>
                                        <td>Phí Vận Chuyển</td>
                                        <td>2 $</td>
                                    </tr>
                                    <tr class="table-success">
                                        <td>Tổng Đơn Hàng</td>
                                        <td><?= formatPrice($tongGioHang + 2) . ' $' ?></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>

                        <!-- Payment Method Display -->
                        <div class="mt-3">
                            <p class="text-success"><strong>Phương Thức Thanh Toán:</strong> <?= $thongTinDonHang[0]['phuong_thuc_thanh_toan_id'] === 1 ? 'Thanh toán khi nhận hàng' : 'Thanh toán qua banking (ONLINE)' ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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