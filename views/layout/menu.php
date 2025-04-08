<header class="header axil-header header-style-2">

    <!-- Start Header Top Area  -->
    <div class="axil-header-top">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-2 col-sm-3 col-5">
                    <div class="header-brand">
                        <a href="http://localhost/Slyour/" class="logo logo-dark">
                            <img src="assets/images/logo/logo1.png" alt="Site Logo">
                        </a>
                        <a href="<?php BASE_URL ?>" class="logo logo-light">
                            <img src="assets/images/logo/logo1-light.png" alt="Site Logo">
                        </a>
                    </div>
                </div>
                <div class="col-lg-10 col-sm-9 col-7">
                    <div class="header-top-dropdown dropdown-box-style">
                        <!-- <div class="header-search-container">
                            <button class="search-trigger d-xl-none d-lg-block"> <i class="far fa-search"></i></button>
                            <form class="header-search-box d-lg-none d-xl-block" action=">" method="POST" style="width:750px;">
                                <input type="text" name="keyword" placeholder="Nhập tên sản phẩm" class="header-search-field">
                                <button class="header-search-btn" type="submit"> <i class="far fa-search"></i></button>
                            </form>
                        </div> -->
                        <div class="container-fluid">
                            <form class="d-flex" role="search" action="<?= BASE_URL . '?act=search' ?>" method="POST">
                                <input class="form-control me-2" name="keyword" type="search" placeholder="Tìm kiếm sản phẩm..." aria-label="Search" style="width:625px;">
                                <button class="btn btn-outline-success" type="submit" style="width:70px;"> <i class="far fa-search"></i></button>
                            </form>
                        </div>
                        <div class="dropdown">
                            <button class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                USD
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">USD</a></li>
                                <li><a class="dropdown-item" href="#">AUD</a></li>
                                <li><a class="dropdown-item" href="#">EUR</a></li>
                            </ul>
                        </div>
                        <div class="dropdown">
                            <button class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                EN
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">EN</a></li>
                                <li><a class="dropdown-item" href="#">ARB</a></li>
                                <li><a class="dropdown-item" href="#">SPN</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Header Top Area  -->

    <!-- Start Mainmenu Area  -->
    <div class="axil-mainmenu aside-category-menu">
        <div class="container">
            <div class="header-navbar">
                <div class="header-nav-department">
                    <aside class="header-department">
                        <button class="header-department-text department-title">
                            <span class="icon"><i class="fal fa-bars"></i></span>
                            <span class="text">Danh mục sản phẩm</span>
                        </button>

                        <nav class="department-nav-menu">
                            <button class="sidebar-close"><i class="fas fa-times"></i></button>
                            <ul class="nav-menu-list">
                                <?php foreach ($listDanhMuc as $danhMuc) { ?>
                                    <li>

                                        <a href="#" class="nav-link ">

                                            <span class="menu-text"><a href="<?= BASE_URL . '?act=san-pham-theo-danh-muc&danh_muc_id=' . $danhMuc['id'] ?>"><?= $danhMuc['ten_danh_muc'] ?></a></span>
                                        </a>

                                    </li>
                                <?php } ?>
                               

                            </ul>
                        </nav>

                    </aside>
                </div>
                <div class="header-main-nav">
                    <!-- Start Mainmanu Nav -->
                    <nav class="mainmenu-nav">
                        <button class="mobile-close-btn mobile-nav-toggler"><i class="fas fa-times"></i></button>
                        <div class="mobile-nav-brand">
                            <a href="<?php ?>" class="logo">
                                <img src="assets/images/logo/logo.png" alt="Site Logo">
                            </a>
                        </div>
                        <ul class="mainmenu">
                            <li class="menu">
                                <a href="http://localhost/Slyour/">Home</a>

                            </li>
                            <li class="menu-item-has-children">

                                <a href="#">Sản phẩm</a>
                                <ul class="axil-submenu">
                                    <?php foreach ($listDanhMuc as $danhMuc) { ?>
                                        <li><a href="<?= BASE_URL . '?act=san-pham-theo-danh-muc&danh_muc_id=' . $danhMuc['id'] ?>"><?= $danhMuc['ten_danh_muc'] ?></a></li>
                                    <?php } ?>
                                </ul>
                            </li>

                            <li><a href="<?=BASE_URL.'?act=gioi-thieu'?>">Giới thiệu</a></li>

                            <li><a href="<?=BASE_URL .'?act=lien-he'?>">Liên hệ</a></li>
                        </ul>
                    </nav>
                    <!-- End Mainmanu Nav -->
                </div>
                <label for="">
                                          <?php
                                            if (isset($_SESSION['user_client'])) {
                                                echo $_SESSION['user_client']['email'];
                                            }

                                            ?>
                                      </label>
                <div class="header-action">
                    <ul class="action-list">
                        <li class="axil-search d-sm-none d-block">
                            <a href="javascript:void(0)" class="header-search-icon" title="Search">
                                <i class="flaticon-magnifying-glass"></i>
                            </a>
                        </li>
                        <!-- <li class="wishlist">
                                <a href="wishlist.html">
                                    <i class="flaticon-heart"></i>
                                </a>
                            </li> -->
                       
                        <li class="my-account">
                            <a href="javascript:void(0)">
  
                            <i class="flaticon-person"></i>
                            </a>
                            <div class="my-account-dropdown">
                               
                                <!-- <span class="title">QUICKLINKS</span> -->
                                <ul>
                                <?php
                                                if (!isset($_SESSION['user_client'])) { ?>
                                                  <li><a href="<?= BASE_URL . '?act=form-login' ?>">Đăng nhập</a></li>
                                                  <li><a href="<?= BASE_URL .'?act=form-dang-ky'?>">Đăng ký</a></li>
                                                  <li><a href="<?= BASE_URL_ADMIN?>">Đăng nhập Admin</a></li>


                                              <?php } else { ?>

                                                  <li><a href="<?= BASE_URL .'?act=quan-ly-tai-khoan'?>">Tài khoản</a></li>
                                                  
                                                  <li><a href="<?= BASE_URL .'?act=lich-su-mua-hang'?>">Đơn hàng</a></li>
                                                  <li><a href="<?= BASE_URL .'?act=quen-mat-khau'?>">Quên mật khẩu</a></li>
                                                <li><a href="<?=BASE_URL .'?act=logout'?>">Đăng xuất</a></li>
                                                <li><a href="<?= BASE_URL_ADMIN?>">Đăng nhập Admin</a></li>
                                            <?php } ?>
                                </ul>
                                
                               

                            </div>
                        </li>
                         <li class="shopping-cart">
                            <a href="http://localhost/Slyour/?act=gio-hang" >
                                <!-- <span class="cart-count">3</span> -->
                                <i class="flaticon-shopping-cart"></i>
                            </a>
                        </li>
                        <li class="axil-mobile-toggle">
                            <button class="menu-btn mobile-nav-toggler">
                                <i class="flaticon-menu-2"></i>
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- End Mainmenu Area  -->
</header>
<style>

</style>