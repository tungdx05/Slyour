<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US">
<!--<![endif]-->

<!-- Mirrored from themesflat.co/html/ecomus/admin-ecomus/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 06 Nov 2024 14:58:58 GMT -->

<head>
    <!-- Basic Page Needs -->
    <meta charset="utf-8">
    <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
    <title>Admin Slyour</title>

    <meta name="author" content="themesflat.com">

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Theme Style -->
    <link rel="stylesheet" type="text/css" href="asset1/css/animation.css">
    <link rel="stylesheet" type="text/css" href="asset1/css/animation.css">
    <link rel="stylesheet" type="text/css" href="asset1/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="asset1/css/bootstrap-select.min.css">
    <link rel="stylesheet" type="text/css" href="asset1/css/styles.css">


    <!-- Font -->
    <link rel="stylesheet" href="asset1/font/fonts.css">

    <!-- Icon -->
    <link rel="stylesheet" href="asset1/icon/style.css">

    <!-- Favicon and Touch Icons  -->
    <link rel="shortcut icon" href="asset1/images/favicon.png">
    <link rel="apple-touch-icon-precomposed" href="asset1/images/favicon.png">

</head>

<body class="body">

    <!-- #wrapper -->
    <div id="wrapper">
        <!-- #page -->
        <div id="page" class="">
            <div class="login-page">
                <div class="left">
                    <div class="login-box">
                        <div>

                            <h3>LOGIN ADMIN</h3>
                            <?php if (isset($_SESSION['errors'])) { ?>
                                <p class="text-danger text-center"><?= $_SESSION['errors'] ?></p>
                            <?php } else { ?>
                                <p class="body-text text-white"></p>
                            <?php } ?>

                        </div>

                        <form class="form-login flex flex-column gap22 w-full" action="<?= BASE_URL_ADMIN . '?act=check-login-admin' ?>" method="post">
                            <form class="form-login flex flex-column gap22 w-full" action="<?= BASE_URL_ADMIN . '?act=check-login-admin' ?>" method="post">
                                <fieldset class="email">
                                    <div class="body-title mb-10 text-white">Email address <span class="tf-color-1">*</span></div>
                                    <input class="flex-grow" type="email" placeholder="Enter your email address" name="email" required="">
                                </fieldset>
                                <fieldset class="password">
                                    <div class="body-title mb-10 text-white">Password <span class="tf-color-1">*</span></div>
                                    <input class="password-input" type="password" placeholder="Enter your password" name="password" required="">
                                    <span class="show-pass">
                                        <i class="icon-eye view"></i>
                                        <i class="icon-eye-off hide"></i>
                                    </span>
                                </fieldset>
                                <div class="flex justify-between items-center">

                                    <a href="#" class="body-text tf-color">Quên mật khẩu ?</a>
                                </div>
                                <button type="submit" class="tf-button w-full">Login</button>
                            </form>
                            <div class="bottom body-text text-center text-center text-white w-full">

                            </div>
                    </div>
                </div>
                <div class="right">
                    <img src="asset1/images/images-section/hehe.jpg" alt="">
                </div>
            </div>
        </div>
        <!-- /#page -->
    </div>
    <!-- /#wrapper -->

    <!-- Javascript -->
    <script src="asset1/js/jquery.min.js"></script>
    <script src="asset1/js/bootstrap.min.js"></script>
    <script src="asset1/js/bootstrap-select.min.js"></script>
    <script defer src="asset1/js/main.js"></script>

</body>

<!-- Mirrored from themesflat.co/html/ecomus/admin-ecomus/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 06 Nov 2024 14:58:58 GMT -->

</html>