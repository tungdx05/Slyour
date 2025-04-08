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
  
<div class="cart-main-wrapper section-padding">
    <div class="container">
        <div class="section-bg-color">
            <div class="row">
                <!-- Thông tin sản phẩm -->
                <div class="col-lg-7 mb-4">
                    <div class="card shadow rounded">
                        <div class="card-header bg-primary text-white text-center">
                            <h4>Thông Tin Sản Phẩm</h4>
                        </div>
                        <div class="card-body table-responsive">
                            <table class="table table-hover align-middle">
                                <thead class="table-light">
                                    <tr class="text-center">
                                        <th>Hình ảnh</th>
                                        <th>Tên sản phẩm</th>
                                        <th>Đơn giá</th>
                                        <th>Số lượng</th>
                                        <th>Thành tiền</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($chiTietDonHang as $item): ?>
                                        <tr class="text-center">
                                            <td><img class="img-fluid rounded" src="<?= BASE_URL . $item['hinh_anh'] ?>" alt="Product" width="80px" /></td>
                                            <td><?= $item['ten_san_pham'] ?></td>
                                            <td><?= number_format($item['don_gia'], 0, ',', '.') ?>$</td>
                                            <td><?= $item['so_luong'] ?></td>
                                            <td class="text-success fw-bold"><?= number_format($item['thanh_tien'], 0, ',', '.') ?>$</td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

                <!-- Thông tin đơn hàng -->
                <div class="col-lg-5 mb-4">
                    <div class="card shadow rounded">
                        <div class="card-header bg-secondary text-white text-center">
                            <h4>Thông Tin Đơn Hàng</h4>
                        </div>
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item"><strong>Mã đơn hàng:</strong> <?= $donHang['ma_don_hang'] ?></li>
                                <li class="list-group-item"><strong>Người nhận:</strong> <?= $donHang['ten_nguoi_nhan'] ?></li>
                                <li class="list-group-item"><strong>Email:</strong> <?= $donHang['email_nguoi_nhan'] ?></li>
                                <li class="list-group-item"><strong>Địa chỉ:</strong> <?= $donHang['dia_chi_nguoi_nhan'] ?></li>
                                <li class="list-group-item"><strong>Ngày đặt:</strong> <?= $donHang['ngay_dat'] ?></li>
                                <li class="list-group-item"><strong>Ghi chú:</strong> <?= $donHang['ghi_chu'] ?></li>
                                <li class="list-group-item"><strong>Tổng tiền:</strong> <span class="text-danger fw-bold"><?= number_format($donHang['tong_tien']) ?> $</span></li>
                                <li class="list-group-item"><strong>Phương thức thanh toán:</strong> <?= $phuongThucThanhToan[$donHang['phuong_thuc_thanh_toan_id']] ?></li>
                                <li class="list-group-item"><strong>Trạng thái đơn hàng:</strong> 
                                    <span class="badge bg-<?= ($donHang['trang_thai_id'] == 1) ? 'warning' : 'success' ?>">
                                        <?= $trangThaiDonHang[$donHang['trang_thai_id']] ?>
                                    </span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div> <!-- row end -->
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