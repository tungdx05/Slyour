<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Slyout || Sign In</title>
    <meta name="robots" content="noindex, follow" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.png">
    <link rel="stylesheet" href="assets/css/vendor/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.min.css">
</head>

<body>

    <div class="axil-signin-area">
        <div class="signin-header">
            <div class="row align-items-center">
                <div class="col-sm-4">
                    <a href="index.html" class="site-logo"><img src="assets/images/logo/logo.png" alt="logo"></a>
                </div>
                <div class="col-sm-8">
                    <div class="singin-header-btn">
                        <a href="<?= BASE_URL . '?act=form-dang-ky' ?>" class="axil-btn btn-bg-secondary sign-up-btn">Đăng kí</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-4 col-lg-6">
                <div class="axil-signin-banner bg_image bg_image--9">
                    <h3 class="title">Mang đến trải nghiệm tốt nhất cho khách hàng</h3>
                </div>
            </div>
            <div class="col-lg-6 offset-xl-2">
                <div class="axil-signin-form-wrap">
                    <div class="axil-signin-form">
                        <h5 class="text-center">Đăng nhập Slyour</h5>
                        <?php if (isset($_SESSION['errors'])): ?>
                            <p class="text-danger text-center">
                                <?php 
                                    if (is_array($_SESSION['errors'])) {
                                        echo implode(", ", $_SESSION['errors']); 
                                    } else {
                                        echo $_SESSION['errors'];
                                    }
                                ?>
                            </p>
                            <?php
                            
                             unset($_SESSION['errors']);?>
                        <?php else: ?>
                            <p class="login-box-msg text-center"></p>
                        <?php endif; ?>
                        <form action="<?= BASE_URL . '?act=check-login' ?>" method="post">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" required>
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" name="password" required>
                            </div>
                            <div class="form-group d-flex align-items-center justify-content-between">
                                <button type="submit" class="axil-btn btn-bg-primary submit-btn">Đăng nhập</button>
                                <a href="<?= BASE_URL . '?act=quen-mat-khau' ?>" class="forgot-btn">Quên mật khẩu?</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="assets/js/vendor/jquery.js"></script>
    <script src="assets/js/vendor/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>

</html>