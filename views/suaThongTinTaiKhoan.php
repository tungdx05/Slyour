<?php require_once 'layout/header.php'  ?>
<?php require_once 'layout/menu1.php'  ?>


<main>
    <!-- My Account Wrapper Start -->
    <div class="my-account-wrapper section-padding">
        <div class="container">
            <div class="section-bg-color p-4 rounded shadow-sm">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- My Account Page Start -->
                        <div class="myaccount-page-wrapper">
                            <!-- My Account Tab Menu Start -->
                            <div class="row">

                                <!-- Edit Account Info -->
                                <div class="tab-pane col-lg-6 mb-4" id="account-info" role="tabpanel">
                                    <div class="myaccount-content border p-4 rounded shadow-sm bg-white">
                                        <h5 class="mb-4 text-primary">Sửa thông tin tài khoản</h5>
                                        <?php if (isset($_SESSION['successTt'])) { ?>
                                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                <?= $_SESSION['successTt'] ?>
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        <?php } ?>
                                        <form action="<?= BASE_URL . '?act=sua-thong-tin-ca-nhan' ?>" method="POST">
                                            <input type="hidden" name="tai_khoan_id" value="<?= $thongTin['id'] ?>">
                                            <div class="form-row">
                                                <div class="col-md-6 mb-3">
                                                    <label for="ho_ten" class="required">Họ tên</label>
                                                    <input type="text" class="form-control" name="ho_ten" placeholder="Họ tên" value="<?= $thongTin['ho_ten'] ?>" />
                                                    <?php if (isset($_SESSION['errors']['ho_ten'])) { ?>
                                                        <small class="text-danger"><?= $_SESSION['errors']['ho_ten'] ?></small>
                                                    <?php } ?>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="email" class="required">Email</label>
                                                    <input type="email" class="form-control" name="email" placeholder="Email" value="<?= $thongTin['email'] ?>" />
                                                    <?php if (isset($_SESSION['errors']['email'])) { ?>
                                                        <small class="text-danger"><?= $_SESSION['errors']['email'] ?></small>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="so_dien_thoai" class="required">Số điện thoại</label>
                                                <input type="text" class="form-control" name="so_dien_thoai" placeholder="Số điện thoại" value="<?= $thongTin['so_dien_thoai'] ?>" />
                                                <?php if (isset($_SESSION['errors']['so_dien_thoai'])) { ?>
                                                    <small class="text-danger"><?= $_SESSION['errors']['so_dien_thoai'] ?></small>
                                                <?php } ?>
                                            </div>
                                            <div class="form-group">
                                                <label for="dia_chi" class="required">Địa chỉ</label>
                                                <input type="text" class="form-control" name="dia_chi" placeholder="Địa chỉ" value="<?= $thongTin['dia_chi'] ?>" />
                                                <?php if (isset($_SESSION['errors']['dia_chi'])) { ?>
                                                    <small class="text-danger"><?= $_SESSION['errors']['dia_chi'] ?></small>
                                                <?php } ?>
                                            </div>
                                            <button type="submit" class="btn btn-primary btn-block">Lưu thông tin</button>
                                        </form>
                                    </div>
                                </div>

                                <!-- Change Profile Picture -->
                                <div class="tab-pane col-lg-6 mb-4" id="account-info" role="tabpanel">
                                    <div class="myaccount-content border p-4 rounded shadow-sm bg-white">
                                        <h5 class="mb-4 text-primary">Sửa ảnh đại diện</h5>
                                        <?php if (isset($_SESSION['successAnh'])) { ?>
                                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                <?= $_SESSION['successAnh'] ?>
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        <?php } ?>
                                        <form action="<?= BASE_URL . '?act=sua-anh-tai-khoan' ?>" enctype="multipart/form-data" method="POST">
                                            <input type="hidden" name="tai_khoan_id" value="<?= $thongTin['id'] ?>">
                                            <div class="text-center mb-4">
                                                <img src="<?= $thongTin['anh_dai_dien'] ?>" class="rounded-circle mb-3" style="width: 100px;" alt="avatar">
                                                <input type="file" class="form-control-file" name="anh_dai_dien">
                                            </div>
                                            <button type="submit" class="btn btn-primary btn-block">Lưu ảnh đại diện</button>
                                        </form>
                                    </div>
                                </div>

                                <!-- Change Password -->
                                <div class="tab-pane col-lg-12" id="account-info" role="tabpanel">
                                    <div class="myaccount-content border p-4 rounded shadow-sm bg-white">
                                        <h5 class="mb-4 text-primary">Sửa mật khẩu</h5>
                                        <?php if (isset($_SESSION['successMk'])) { ?>
                                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                                <?= $_SESSION['successMk'] ?>
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        <?php } ?>
                                        <form action="<?= BASE_URL . '?act=sua-mat-khau' ?>" method="POST">
                                            <div class="form-group">
                                                <label for="current-pwd" class="required">Mật khẩu hiện tại</label>
                                                <input type="password" class="form-control" name="old_pass" placeholder="Mật khẩu hiện tại" />
                                                <?php if (isset($_SESSION['errors']['old_pass'])) { ?>
                                                    <small class="text-danger"><?= $_SESSION['errors']['old_pass'] ?></small>
                                                <?php } ?>
                                            </div>
                                            <div class="form-row">
                                                <div class="col-md-6 mb-3">
                                                    <label for="new-pwd" class="required">Mật khẩu mới</label>
                                                    <input type="password" class="form-control" name="new_pass" placeholder="Mật khẩu mới" />
                                                    <?php if (isset($_SESSION['errors']['new_pass'])) { ?>
                                                        <small class="text-danger"><?= $_SESSION['errors']['new_pass'] ?></small>
                                                    <?php } ?>
                                                </div>
                                                <div class="col-md-6 mb-3">
                                                    <label for="confirm-pwd" class="required">Nhập lại mật khẩu mới</label>
                                                    <input type="password" class="form-control" name="confirm_pass" placeholder="Nhập lại" />
                                                    <?php if (isset($_SESSION['errors']['confirm_pass'])) { ?>
                                                        <small class="text-danger"><?= $_SESSION['errors']['confirm_pass'] ?></small>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-primary btn-block">Lưu mật khẩu</button>
                                        </form>
                                    </div>
                                </div>

                            </div>
                        </div> <!-- My Account Page End -->
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- My Account Wrapper End -->
</main>



<!-- offcanvas mini cart start -->
<?php require_once 'layout/miniCart.php' ?>
<!-- offcanvas mini cart end -->

<?php require_once 'layout/footer.php' ?>