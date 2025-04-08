<?php
class GioHangDonHangController
{
    public $modelSanPham;
    public $modelTaiKhoan;
    public $modelGioHang;
    public $modelDonHang;

    public function __construct()
    {
        $this->modelSanPham = new SanPham();
        $this->modelTaiKhoan = new TaiKhoan();
        $this->modelGioHang = new GioHang();
        $this->modelDonHang = new DonHang();
    }


    public function addGioHang()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_SESSION['user_client'])) {
                $mail = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']['email']);
                $gioHang = $this->modelGioHang->getGioHangFromUser($mail['id']);
                if (!$gioHang) {
                    $gioHangId = $this->modelGioHang->addGioHang($mail['id']);
                    $gioHang = ['id' => $gioHangId];
                    $chiTietGioHang = [];
                } else {
                    $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
                }
    
                $san_pham_id = $_POST['san_pham_id'];
                $so_luong = $_POST['so_luong'];
    
                // Lấy thông tin sản phẩm từ kho
                $sanPham = $this->modelSanPham->getSanPhamById($san_pham_id);
                if (!$sanPham) {
                    $_SESSION['error'] = 'Sản phẩm không tồn tại.';
                    header('Location:' . BASE_URL);
                    exit();
                }
    
                if ($sanPham['so_luong'] < $so_luong) {
                    $_SESSION['error'] = 'Số lượng sản phẩm không đủ. Chỉ còn ' . $sanPham['so_luong'] . ' sản phẩm.';
                    header('Location:' . BASE_URL . '?act=chi-tiet&id=' . $san_pham_id);
                    exit();
                }
    
                $checkSanPham = false;
                foreach ($chiTietGioHang as $detail) {
                    if ($detail['san_pham_id'] == $san_pham_id) {
                        $newSoLuong = $detail['so_luong'] + $so_luong;
    
                        // Kiểm tra lại số lượng trước khi cập nhật
                        if ($sanPham['so_luong'] < $newSoLuong) {
                            $_SESSION['error'] = 'Số lượng sản phẩm không đủ. Chỉ còn ' . $sanPham['so_luong'] . ' sản phẩm.';
                            header('Location:' . BASE_URL . '?act=gio-hang');
                            exit();
                        }
    
                        $this->modelGioHang->updateSoLuong($gioHang['id'], $san_pham_id, $newSoLuong);
                        $checkSanPham = true;
                        break;
                    }
                }
                if (!$checkSanPham) {
                    $this->modelGioHang->addDetailGioHang($gioHang['id'], $san_pham_id, $so_luong);
                }
    
                $_SESSION['success'] = 'Thêm sản phẩm vào giỏ hàng thành công.';
                header('Location:' . BASE_URL . '?act=gio-hang');
            } else {
                header('Location:' . BASE_URL . '?act=form-login');
            }
        }
    }
    

    public function gioHang()
    {
        $listDanhMuc = $this->modelSanPham->getAllDanhMuc();

        if (isset($_SESSION['user_client'])) {
            $mail = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']['email']);
            //    var_dump($mail);die();

            // lẤy dl giỏ hàng
            $gioHang = $this->modelGioHang->getGioHangFromUser($mail['id']);
            //    var_dump($gioHang);die();

            if (!$gioHang) {
                $gioHangId = $this->modelGioHang->addGioHang($mail['id']);
                // var_dump($gioHangId);die();

                $gioHang = ['id' => $gioHangId];
                $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
                // var_dump($chiTietGioHang);die();

            } else {
                $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
            }

            require_once './views/gioHang.php';
        } else {
            header('Location:' . BASE_URL . '?act=form-login');
        }
    }

    public function thanhToan()
    {
        deleteSessionErrors();
        $listDanhMuc = $this->modelSanPham->getAllDanhMuc();

        if (isset($_SESSION['user_client'])) {
            $user = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']['email']);
            //    var_dump($mail['id']);die();

            // lẤy dl giỏ hàng
            $gioHang = $this->modelGioHang->getGioHangFromUser($user['id']);
            if (!$gioHang) {
                $gioHangId = $this->modelGioHang->addGioHang($user['id']);
                $gioHang = ['id' => $gioHangId];
                $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
            } else {
                $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
            }

            require_once './views/thanhToan.php';
        } else {
            header('Location:' . BASE_URL . '?act=form-login');
        }
    }

    public function postThanhToan()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $ten_nguoi_nhan = $_POST['ten_nguoi_nhan'];
            $email_nguoi_nhan = $_POST['email_nguoi_nhan'];
            $sdt_nguoi_nhan = $_POST['sdt_nguoi_nhan'];
            $dia_chi_nguoi_nhan = $_POST['dia_chi_nguoi_nhan'];
            $ghi_chu = $_POST['ghi_chu'];
            $tong_tien = $_POST['tong_tien'];
            $phuong_thuc_thanh_toan_id = $_POST['phuong_thuc_thanh_toan_id'];

            $ngay_dat = date('Y-m-d');
            $trang_thai_id = 1;

            $ma_don_hang = 'DH' . rand(1000, 9999);

            $user = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']['email']);
            $tai_khoan_id = $user['id'];

            $gioHang = $this->modelGioHang->getGioHangFromUser($user['id']);
            $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
            // var_dump($chiTietGioHang);die();


            $donHangId = $this->modelDonHang->addDonHang($tai_khoan_id, $ten_nguoi_nhan, $email_nguoi_nhan, $sdt_nguoi_nhan, $dia_chi_nguoi_nhan, $ghi_chu, $tong_tien, $phuong_thuc_thanh_toan_id, $ngay_dat, $ma_don_hang);
            $donHang = ['id' => $donHangId];
            $tong_tien = 0;

            foreach ($chiTietGioHang as $sanPham) {
                if ($sanPham['gia_khuyen_mai'] > 0 || $sanPham['gia_khuyen_mai'] == null) {
                    $don_gia = $sanPham['gia_khuyen_mai'];
                } else {
                    $don_gia = $sanPham['gia_san_pham'];
                }
                $tongTien = $don_gia * $sanPham['so_luong'];
            
                // Trừ số lượng sản phẩm trong kho
                $sanPhamHienTai = $this->modelSanPham->getSanPhamById($sanPham['san_pham_id']);
                if ($sanPhamHienTai['so_luong'] >= $sanPham['so_luong']) {
                    $this->modelSanPham->reduceQuantity($sanPham['san_pham_id'], $sanPham['so_luong']);
                } else {
                    $_SESSION['error'] = 'Sản phẩm "' . $sanPhamHienTai['ten_san_pham'] . '" không đủ số lượng!';
                    header('Location:' . BASE_URL . '?act=gio-hang');
                    exit();
                }
            
                // Xóa sản phẩm trong giỏ hàng
                $this->modelGioHang->clearDetailGioHang($gioHang['id']);
                $this->modelGioHang->clearGioHang($tai_khoan_id);
            
                // Thêm chi tiết đơn hàng
                $donHangId = $this->modelDonHang->addDetailDonHang($donHang['id'], $sanPham['san_pham_id'], $don_gia, $sanPham['so_luong'], $tongTien);
            }
            

            // var_dump($donHangId);die();

            if ($donHangId) {
                $donHang = $this->modelDonHang->getAllDonHang($donHangId);

                // Đăng nhập thành công

                if (!empty($donHang) && is_array($donHang)) {
                    $id = $donHang[0]['id'];
                    // Lưu thông tin vào session
                    $_SESSION['thong_tin_don_hang'] = [
                        'id' => $id,
                    ];
                    $thongTinDonHang = $this->modelDonHang->getAllDonHang($_SESSION['thong_tin_don_hang']['id']);

                    $_SESSION['flash'] = true;
                    $_SESSION['dat_hang_thanh_cong'] = 'Đã đặt hàng thành công! Cảm ơn bạn đã sử dụng dịch vụ của chúng tôi';
                    header('Location:' . BASE_URL . '?act=da-dat-hang');
                    exit();
                }
            }
        }
    }


    public function xoaSp()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $chi_tiet_gio_hang_id = $_POST['chi_tiet_gio_hang_id'];
            $xoa = $this->modelGioHang->deleteSanPhamGioHang($chi_tiet_gio_hang_id);
            // var_dump($xoa);die()
            header('Location:' . BASE_URL . '?act=gio-hang');
        }
    }


    public function lichSuMuaHang()
    {
        if (isset($_SESSION['user_client'])) {
            //lay thong tin tai khoan dang nhap
            $user = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']['email']);
            $tai_khoan_id = $user['id'];
            //lay ra danh sach trang thai don hang
            $arrayTrangThaiDonHang = $this->modelDonHang->getTrangThaiDonHang();
            // clum  ham lay mang truong lien hop gia tri cua truong ten trang thai
            $trangThaiDonHang = array_column($arrayTrangThaiDonHang, 'ten_trang_thai', 'id');

            //lay ra danh sach phuong thuc thanh toan
            $arrayPhuongThucThanhToan = $this->modelDonHang->getPhuongThucThanhToan();
            $phuongThucThanhToan = array_column($arrayPhuongThucThanhToan, 'ten_phuong_thuc', 'id');


            //lay ra tat ca dơn hang của tk
            $donHangs = $this->modelDonHang->getDonHangFromUser($tai_khoan_id);

            // var_dump($donHangs);
            // die;
            require_once "./views/lichSuMuaHang.php";
        } else {
        }
    }
    public function chiTietMuaHang()
    {
        if (isset($_SESSION['user_client'])) {
            //lay thong tin tai khoan dang nhap
            $user = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']['email']);
            $tai_khoan_id = $user['id'];

            //lấy id truyền từ URL
            $donHangId = $_GET['id'];
            //lay ra danh sach trang thai don hang
            $arrayTrangThaiDonHang = $this->modelDonHang->getTrangThaiDonHang();
            // clum  ham lay mang truong lien hop gia tri cua truong ten trang thai
            $trangThaiDonHang = array_column($arrayTrangThaiDonHang, 'ten_trang_thai', 'id');

            //lay ra danh sach phuong thuc thanh toan
            $arrayPhuongThucThanhToan = $this->modelDonHang->getPhuongThucThanhToan();
            $phuongThucThanhToan = array_column($arrayPhuongThucThanhToan, 'ten_phuong_thuc', 'id');


            //lấy ra thông tin đơn hàng theo id
            $donHang = $this->modelDonHang->getDonHangById($donHangId);
            //   var_dump($donHang);
            //   die;


            //lấy thông tin sản phâmr của đơn hàng trong bảng chi tiêt đơn hgangf

            $chiTietDonHang = $this->modelDonHang->getChiTietDonHangByDonHangId($donHangId);



            if ($donHang['tai_khoan_id'] != $tai_khoan_id) {
                echo "bạn không có quyền truy cập đơn hàng này";
                exit;
            }
            require_once "./views/chiTietMuaHang.php";
        } else {
            // var_dump("vui long login");
            // die;
        }
    }
    public function huyDonHang()
    {
        if (isset($_SESSION['user_client'])) {
            //lay thong tin tai khoan dang nhap
            $user = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']['email']);
            $tai_khoan_id = $user['id'];

            //lấy id truyền từ URL
            $donHangId = $_GET['id'];

            //kiểm tra đơn hàng
            $donHang = $this->modelDonHang->getDonHangById($donHangId);
            if ($donHang['tai_khoan_id'] != $tai_khoan_id) {
                echo "Bạn không có quyền hủy đơn hàng này";
                exit;
            }
            if ($donHang['trang_thai_id'] != 1) {
                echo "Chỉ đơn hàng chưa xác nhận mới có thể hủy";
                exit;
            }

            //hủy đơn
            $this->modelDonHang->updateTrangThaiDonHang($donHangId, 11);
            header('Location:' . BASE_URL . '?act=lich-su-mua-hang');
        } else {
        }
    }
}
