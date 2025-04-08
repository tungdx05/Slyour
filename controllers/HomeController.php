<?php

class HomeController
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
    

    public function home()
    {
        $listDanhMuc = $this->modelSanPham->getAllDanhMuc();
        $listTop10 = $this->modelSanPham->top10();
        $listSanPham = $this->modelSanPham->getAllSanPham();

        require_once('./views/home.php');
    }

    public function chiTietSanPham()
    {
        $id = $_GET['id_san_pham'] ?? null;

        if ($id) {
            $sanPham = $this->modelSanPham->getDetailSanPham($id);
            if ($sanPham) {
                $listDanhMuc = $this->modelSanPham->getAllDanhMuc();
                $listAnhSanPham = $this->modelSanPham->getListAnhSanPham($id);
                $listBinhLuan = $this->modelSanPham->getBinhLuanFromSanPham($id);
                $listSanPhamCungDanhMuc = $this->modelSanPham->getListSanPhamdDanhMuc($sanPham['id'], $sanPham['danh_muc_id']);
                require_once './views/detailSanPham.php';
            } else {
                $this->redirectHome();
            }
        } else {
            $this->redirectHome();
        }
    }

    public function sanPhamDanhMuc()
    {
        $listDanhMuc = $this->modelSanPham->getAllDanhMuc();
        $listTop10 = $this->modelSanPham->top10();

        if (isset($_GET['danh_muc_id']) && $_GET['danh_muc_id'] > 0) {
            $iddm = $_GET['danh_muc_id'];
            $spdm = $this->modelSanPham->sanPhamTheoDanhMuc($iddm);
            require_once './views/sanPhamTheoDanhMuc.php';
        } else {
            $this->redirectHome();
        }
    }

    public function timKiem()
    {
        $listDanhMuc = $this->modelSanPham->getAllDanhMuc();
        $listTop10 = $this->modelSanPham->top10();

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $keyword = $_POST['keyword'] ?? '';
            $listSanPhamTimKiem = $this->modelSanPham->search($keyword);
            require_once './views/timKiemSp.php';
        } else {
            require_once './views/timKiemSp.php'; // Hiển thị trang tìm kiếm nếu không có POST
        }
    }

    public function lienHe()
    {
        $listDanhMuc = $this->modelSanPham->getAllDanhMuc();
        require_once './views/lienHe.php';
    }

    public function gioiThieu()
    {
        $listDanhMuc = $this->modelSanPham->getAllDanhMuc();
        require_once './views/gioiThieu.php';
    }

    private function redirectHome()
    {
        header("Location: " . BASE_URL);
        exit();
    }

    public function formLogin()
    {
        require_once './views/auth/formLogin.php';
        deleteSessionErrors(); // Xóa các lỗi trước khi hiển thị form đăng nhập
    }

    public function postLogin()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'] ?? '';
            $password = $_POST['password'] ?? '';

            // Kiểm tra thông tin đăng nhập
            $conn = connectDB(); // Kết nối đến cơ sở dữ liệu
            $stmt = $conn->prepare("SELECT * FROM tai_khoans WHERE email = :email");
            $stmt->execute([':email' => $email]);
            $user = $stmt->fetch();

            // Kiểm tra mật khẩu
            if ($user && password_verify($password, $user['mat_khau'])) {
                // Đăng nhập thành công
                $_SESSION['user_client'] = [
                    'email' => $user['email'],
                    'id' => $user['id']
                ];
                header("Location: " . BASE_URL); // Chuyển hướng về trang chính
                exit();
            } else {
                // Nếu có lỗi, lưu lỗi vào session
                $_SESSION['errors'][] = 'Vui lòng kiểm tra lại thông tin đăng nhập';
                header("Location: " . BASE_URL . '?act=login'); // Chuyển hướng về trang đăng nhập
                exit();
            }
        }
    }
    
    public function guiBinhLuan()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['binh_luan']) && isset($_SESSION['user_client'])) {
            $tai_khoan_id = $_SESSION['user_client']['id']; // Lấy ID từ session người dùng
            $binh_luan = $_POST['binh_luan'] ?? '';
            $san_pham_id = $_POST['san_pham_id'] ?? '';
            $ngay_dang = date('Y-m-d H:i:s');

            // Gọi phương thức để lưu bình luận
            $status = $this->modelTaiKhoan->binhLuan($tai_khoan_id, $san_pham_id, $binh_luan, $ngay_dang);
            
            // Chuyển hướng về chi tiết sản phẩm
            header('Location: ' . BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' . $san_pham_id);
            exit();
        }
    }
    //dat hang
    public function daDatHang()
    {
        $thongTinDonHang = $this->modelDonHang->getAllDonHang($_SESSION['thong_tin_don_hang']['id']);
        $listDanhMuc = $this->modelSanPham->getAllDanhMuc();
        
        if (isset($_SESSION['user_client'])) {

            $user = $this->modelTaiKhoan->getTaiKhoanFromEmail($_SESSION['user_client']['email']);
            //    var_dump($mail['id']);die();

            // lẤy dl giỏ hàng
            $gioHang = $this->modelGioHang->getGioHangFromUser($user['id']);
            if (!$gioHang) {
                $_SESSION['flash'] = true;
                $_SESSION['dat_hang_thanh_cong'] = 'Đã đặt hàng thành công! Cảm ơn bạn đã sử dụng dịch vụ của chúng tôi';
                $gioHangId = $this->modelGioHang->addGioHang($user['id']);
                $gioHang = ['id' => $gioHangId];
                $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
            } else {
                $_SESSION['flash'] = true;
                $_SESSION['dat_hang_thanh_cong'] = 'Đã đặt hàng thành công! Cảm ơn bạn đã sử dụng dịch vụ của chúng tôi';
                $chiTietGioHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
            }

        } else {
            header('Location:' . BASE_URL . '?act=form-login');
        }
        require_once './views/daDatHang.php';
        deleteSessionErrors();
    }
}

?>