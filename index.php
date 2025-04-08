<?php 
//$pass = password_hash('123456' ,PASSWORD_BCRYPT);
// echo $pass;
//echo password_verify('1234567', '$2y$10$hy/XcXUljDqto0twa7j16uJfTzzyE3ZkET93RnDV1.Ub/2uS6Fq/q');


// die;
session_start();

// Require file Common
require_once './commons/env.php'; // Khai báo biến môi trường
require_once './commons/function.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers
require_once './controllers/HomeController.php';
require_once './controllers/GioHangDonHangController.php';
// require_once './controllers/SanPhamController.php';
// require_once './controllers/TaiKhoanController.php';
require_once './controllers/TaiKhoanController.php';
// Require toàn bộ file Models
require_once './models/SanPham.php';
require_once 'models/TaiKhoan.php';
require_once 'models/GioHang.php';
require_once 'models/DonHang.php';
// Route
$act = $_GET['act'] ?? '/';


    match ($act) {
        // route
        '/' => (new HomeController())->home(),
        'da-dat-hang' =>(new HomeController())->daDatHang(),
        'search' => (new HomeController())->timKiem(),
        'lien-he' =>(new HomeController())->lienHe(),
        'gioi-thieu' =>(new HomeController())->gioiThieu(),

   'chi-tiet-san-pham' =>(new HomeController())->chiTietSanPham(),
   'san-pham-theo-danh-muc' =>(new HomeController())->sanPhamDanhMuc(),
   


   //giohang
   'them-gio-hang' =>(new GioHangDonHangController())->addGioHang(),
   'gio-hang' =>(new GioHangDonHangController())->gioHang(),
   //thanh toan
   'thanh-toan' =>(new GioHangDonHangController())->thanhToan(),
   'xu-ly-thanh-toan' =>(new GioHangDonHangController())->postThanhToan(),
   'xoa-san-pham-gio-hang' =>(new GioHangDonHangController())->xoaSp(),
   'lich-su-mua-hang' =>(new GioHangDonHangController())->lichSuMuaHang(),
   'chi-tiet-mua-hang' =>(new GioHangDonHangController())->chiTietMuaHang(),
   'huy-don-hang' =>(new GioHangDonHangController())->huyDonHang(),
   // Người dùng
   'form-login' =>(new TaiKhoanController())->formLogin(),
   'check-login' =>(new TaiKhoanController())->postLogin(),
   'logout' =>(new TaiKhoanController())->logout(),
   'form-dang-ky' =>(new TaiKhoanController())->formDangKy(),
   'dang-ky' =>(new TaiKhoanController())->dangKy(),




   'quan-ly-tai-khoan' =>(new TaiKhoanController())->suaTaiKhoan(),
   'sua-thong-tin-ca-nhan' =>(new TaiKhoanController())->suaThongTinCaNhan(),
   'sua-mat-khau' =>(new TaiKhoanController())->suaMatKhau(),
   'sua-anh-tai-khoan' =>(new TaiKhoanController())->suaAnhTaiKhoan(),
  'gui-binh-luan' =>(new HomeController())->guiBinhLuan(),
   'quen-mat-khau' =>(new TaiKhoanController())->quenMatKhau(),
   'lay-mat-khau' =>(new TaiKhoanController())->layMatKhau(),



   
        
        
};