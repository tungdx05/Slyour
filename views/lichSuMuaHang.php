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
        <div class="section-bg-color p-4 rounded shadow">
            <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover align-middle text-center">
                            <thead class="table-dark">
                                <tr>
                                    <th>Mã đơn hàng</th>
                                    <th>Ngày đặt</th>
                                    <th>Tổng tiền</th>
                                    <th>Phương thức thanh toán</th>
                                    <th>Trạng thái</th>
                                    <th>Thao tác</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($donHangs as $donHang): ?>
                                    <tr>
                                        <td class="fw-bold"><?= $donHang['ma_don_hang'] ?></td>
                                        <td><?= date("d/m/Y", strtotime($donHang['ngay_dat'])) ?></td>
                                        <td class="text-success fw-bold"><?= formatPrice($donHang['tong_tien']) ?> $</td>
                                        <td><?= $phuongThucThanhToan[$donHang['phuong_thuc_thanh_toan_id']] ?></td>
                                        <td>
                                            <span class="badge bg-<?= ($donHang['trang_thai_id'] == 1) ? 'warning' : 'success' ?>">
                                                <?= $trangThaiDonHang[$donHang['trang_thai_id']] ?>
                                            </span>
                                        </td>
                                        <td>
                                            <a href="<?= BASE_URL ?>?act=chi-tiet-mua-hang&id=<?= $donHang['id'] ?>" class="btn btn-success btn-sm me-2"    style="
display: inline-block;
padding: 10px 15px;
background-color: green; 
color: white; 
text-decoration: none; 
border-radius: 5px; 
border: none; 
cursor: pointer;
text-align: center;">
                                                Chi tiết
                                            </a>
                                            <?php if ($donHang['trang_thai_id'] == 1): ?>
                                                <a href="<?= BASE_URL ?>?act=huy-don-hang&id=<?= $donHang['id'] ?>" class="btn btn-danger btn-sm"
                                                   onclick="return confirm('Bạn có muốn hủy đơn hàng này không?')"
                                                   style="
display: inline-block;
padding: 10px 15px;
background-color: red; 
color: white; 
text-decoration: none; 
border-radius: 5px; 
border: none; 
cursor: pointer;
text-align: center;"
                                                   >
                                                    Hủy đơn
                                                </a>
                                            <?php endif ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div> <!-- End row -->
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