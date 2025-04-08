<?php include './views/layout/header.php'; ?>
<!-- Navbar -->
<?php include './views/layout/navbar.php'; ?>

<!-- /.navbar -->

<!-- Main Sidebar Container -->
<?php include './views/layout/sidebar.php'; ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-9">
                    <h1>Quản lý danh sách đơn hàng: <?= isset($donHang['ma_don_hang']) ? $donHang['ma_don_hang'] : 'N/A' ?></h1>
                </div>
                <div class="col-sm-3">
                </div>
            </div><!-- /.container-fluid -->
        </div>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="alert alert-<?= $colorAlerts ?>" role="alert">
                           <b style="color: red;">Đơn hàng</b>:  <?= isset($donHang['ten_trang_thai']) ? $donHang['ten_trang_thai'] : 'N/A' ?>
                    </div>

                    <!-- Main content -->
                    <div class="invoice p-3 mb-3">
                        <!-- title row -->
                        <div class="row">
                            <div class="col-12">
                                <h4>
                                <b style="color: red;">SLYOUR</b>
                                    <small class="float-right">Ngày đặt: <?= formatDate($donHang['ngay_dat']); ?></small>
                                </h4>
                            </div>
                        </div>
                        <!-- info row -->
                        <div class="row invoice-info">
                            <div class="col-sm-4 invoice-col">
                                <strong>Thông tin người đặt</strong>
                                <address>
                                    <strong><?= isset($donHang['ho_ten']) ? $donHang['ho_ten'] : 'N/A' ?></strong><br>
                                    Email: <?= isset($donHang['email']) ? $donHang['email'] : 'N/A' ?><br>
                                    Số điện thoại: <?= isset($donHang['so_dien_thoai']) ? $donHang['so_dien_thoai'] : 'N/A' ?><br>
                                </address>
                            </div>
                            <div class="col-sm-4 invoice-col">
                                <strong>Người nhận</strong>
                                <address>
                                    <strong><?= isset($donHang['ten_nguoi_nhan']) ? $donHang['ten_nguoi_nhan'] : 'N/A' ?></strong><br>
                                    Email: <?= isset($donHang['email_nguoi_nhan']) ? $donHang['email_nguoi_nhan'] : 'N/A' ?><br>
                                    Số điện thoại: <?= isset($donHang['sdt_nguoi_nhan']) ? $donHang['sdt_nguoi_nhan'] : 'N/A' ?><br>
                                    Địa chỉ: <?= isset($donHang['dia_chi_nguoi_nhan']) ? $donHang['dia_chi_nguoi_nhan'] : 'N/A' ?><br>
                                </address>
                            </div>
                            <div class="col-sm-4 invoice-col">
                                <strong>Thông tin</strong>
                                <address>
                                    <strong>Mã đơn hàng: <?= isset($donHang['ma_don_hang']) ? $donHang['ma_don_hang'] : 'N/A' ?></strong><br>
                                    Tổng tiền: <?= isset($donHang['tong_tien']) ? $donHang['tong_tien'] : 'N/A' ?><br>
                                    Ghi chú: <?= isset($donHang['ghi_chu']) ? $donHang['ghi_chu'] : 'N/A' ?><br>
                                    Thanh toán: <?= isset($donHang['ten_phuong_thuc']) ? $donHang['ten_phuong_thuc'] : 'N/A' ?><br>
                                </address>
                            </div>
                        </div>
                        <!-- /.row -->

                        <!-- Table row -->
                        <div class="row">
                            <div class="col-12 table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Tên sản phẩm</th>
                                            <th>Đơn giá</th>
                                            <th>Số lượng</th>
                                            <th>Thành tiền</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $tong_tien = 0; ?>
                                        <?php foreach ($sanPhamDonHang as $key => $sanPham) { ?>
                                            <tr>
                                                <td><?= $key + 1 ?></td>
                                                <td><?= isset($sanPham['ten_san_pham']) ? $sanPham['ten_san_pham'] : 'N/A' ?></td>
                                                <td><?= isset($sanPham['don_gia']) ? $sanPham['don_gia'] : 'N/A' ?></td>
                                                <td><?= isset($sanPham['so_luong']) ? $sanPham['so_luong'] : 'N/A' ?></td>
                                                <td><?= isset($sanPham['thanh_tien']) ? $sanPham['thanh_tien'] : 'N/A' ?></td>
                                            </tr>
                                            <?php $tong_tien += $sanPham['thanh_tien']; ?>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.row -->

                        <div class="row">
                            <div class="col-6">
                                <p class="lead">Ngày đặt hàng: <?= isset($donHang['ngay_dat']) ? $donHang['ngay_dat'] : 'N/A' ?></p>
                                <div class="table-responsive">
                                    <table class="table">
                                        <tr>
                                            <th style="width: 50%">Thành tiền:</th>
                                            <td><?= $tong_tien ?></td>
                                        </tr>
                                        <tr>
                                            <th>Vận chuyển:</th>
                                            <td>200000</td>
                                        </tr>
                                        <tr>
                                            <th>Tổng tiền:</th>
                                            <td><?= $tong_tien + 200000 ?></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.invoice -->
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<!-- Footer -->
<?php include './views/layout/footer.php'; ?>

<!-- /.control-sidebar -->
</div>
<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>
</body>
</html>