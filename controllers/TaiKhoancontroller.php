<?php

class TaiKhoanController
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

    public function formLogin()
    {
        $listDanhMuc = $this->modelSanPham->getAllDanhMuc();

        if (isset($_SESSION['user_client'])) {
            header('Location:' . BASE_URL);
            exit();
        }
        require_once('./views/auth/formLogin.php');
        deleteSessionErrors();
    }

    public function postLogin()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // var_dump($_POST);
            // die;
            $email = filter_var(trim($_POST['email']), FILTER_SANITIZE_EMAIL);
            $password = $_POST['password'];

            $result = $this->modelTaiKhoan->checkLogin($email, $password);
            // var_dump($result);
            // die;
            if (is_array($result)) {
                var_export(
                    "abc"
                );
                // die;
                // Đăng nhập thành công
                $_SESSION['user_client'] = [
                    'email' => $result['email'],
                    'id' => $result['id']
                ];
                header("Location:" . BASE_URL);
                exit();
            } else {
                // Lưu lỗi vào session
                $_SESSION['errors'] = 'Đăng nhập thất bại. Vui lòng kiểm tra lại email và mật khẩu.';
                $_SESSION['flash'] = true;
                header("Location:" . BASE_URL . '?act=form-login');
                exit();
            }
        }
    }

    public function formDangKy()
    {
        if (isset($_SESSION['user_client'])) {
            header('Location:' . BASE_URL);
            exit();
        }
        $listDanhMuc = $this->modelSanPham->getAllDanhMuc();
        require_once('./views/auth/formDangKy.php');
        deleteSessionErrors();
    }

    public function dangKy()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // var_dump($_POST);
            // die;
            $ho_ten = trim($_POST['ho_ten'] ?? '');


            $email = filter_var(trim($_POST['email'] ?? ''), FILTER_SANITIZE_EMAIL);

            $mat_khau = $_POST['mat_khau'] ?? '';

            $chuc_vu = 2;
            $errors = [];
            // var_dump($errors);die;
            if (empty($ho_ten)) $errors['ho_ten'] = 'Họ tên không được để trống';

            if (empty($email)) $errors['email'] = 'Email không được để trống';

            if (empty($mat_khau)) $errors['mat_khau'] = 'Mật khẩu không được để trống';


            $_SESSION['errors'] = $errors;


            if (empty($errors)) {
                // var_dump("abc");
                // die;





                $this->modelTaiKhoan->insertTaiKhoan($ho_ten, $email, $mat_khau, $chuc_vu);

                $_SESSION['thongBao'] = 'Đăng ký thành công. Vui lòng đăng nhập để mua hàng và bình luận.';
                header("Location: " . BASE_URL . '?act=form-dang-ky');
                exit();
            } else {
                $_SESSION['flash'] = true;
                header("Location: " . BASE_URL . '?act=form-dang-ky');
                exit();
            }
        }
    }

    public function logout()
    {
        if (isset($_SESSION['user_client'])) {
            unset($_SESSION['user_client']);
            header('Location:' . BASE_URL);
            exit();
        }
    }

    public function suaTaiKhoan()
    {
        $listDanhMuc = $this->modelSanPham->getAllDanhMuc();
        $tai_khoan_id = $_SESSION['user_client']['id'] ?? '';
        $thongTin = $this->modelTaiKhoan->thongTinTaiKhoan($tai_khoan_id);
        require_once './views/suaThongTinTaiKhoan.php';
        deleteSessionErrors();
    }

    public function suaThongTinCaNhan()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $tai_khoan_id = $_POST['tai_khoan_id'];
            $ho_ten = $_POST['ho_ten'] ?? '';
            $email = filter_var(trim($_POST['email'] ?? ''), FILTER_SANITIZE_EMAIL);
            $so_dien_thoai = $_POST['so_dien_thoai'] ?? '';
            $dia_chi = $_POST['dia_chi'] ?? '';

            $errors = [];
            if (empty($ho_ten)) $errors['ho_ten'] = 'Họ tên không được để trống';
            if (empty($so_dien_thoai)) $errors['so_dien_thoai'] = 'Số điện thoại không được để trống';
            if (empty($dia_chi)) $errors['dia_chi'] = 'Địa chỉ không được để trống';
            if (empty($email)) $errors['email'] = 'Email không được để trống';

            $_SESSION['errors'] = $errors;

            if (empty($errors)) {
                $this->modelTaiKhoan->updateTaiKhoan($tai_khoan_id, $ho_ten, $email, $so_dien_thoai, $dia_chi);
                $_SESSION['successTt'] = "Đã đổi thông tin thành công";
                $_SESSION['flash'] = true;
                header("Location: " . BASE_URL . '?act=quan-ly-tai-khoan');
                exit();
            } else {
                $_SESSION['flash'] = true;
                header("Location: " . BASE_URL . '?act=quan-ly-tai-khoan');
                exit();
            }
        }
    }

    public function suaMatKhau()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $tai_khoan_id = $_SESSION['user_client']['id'] ?? '';
            $old_pass = $_POST['old_pass'] ?? '';
            $new_pass = $_POST['new_pass'] ?? '';
            $confirm_pass = $_POST['confirm_pass'] ?? '';

            $user = $this->modelTaiKhoan->thongTinTaiKhoan($tai_khoan_id);
            $errors = [];

            if (empty($old_pass)) $errors['old_pass'] = 'Mật khẩu cũ không được để trống';
            if (empty($new_pass)) $errors['new_pass'] = 'Mật khẩu mới không được để trống';
            if ($new_pass !== $confirm_pass) $errors['confirm_pass'] = 'Mật khẩu nhập lại không đúng';

            if (!password_verify($old_pass, $user['mat_khau'])) {
                $errors['old_pass'] = 'Mật khẩu cũ không đúng';
            }

            $_SESSION['errors'] = $errors;

            if (empty($errors)) {
                $this->modelTaiKhoan->updateMatKhau($user['id'], password_hash($new_pass, PASSWORD_BCRYPT));
                $_SESSION['successMk'] = "Đã đổi mật khẩu thành công";
                $_SESSION['flash'] = true;
                header("Location:" . BASE_URL . '?act=quan-ly-tai-khoan');
            } else {
                $_SESSION['flash'] = true;
                header("Location:" . BASE_URL . '?act=quan-ly-tai-khoan');
                exit();
            }
        }
    }

    public function suaAnhTaiKhoan()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $tai_khoan_id = $_POST['tai_khoan_id'];
            $thongTinCu = $this->modelTaiKhoan->thongTinTaiKhoan($tai_khoan_id);
            $anh_cu = $thongTinCu['anh_dai_dien'];
            $anh_dai_dien = $_FILES['anh_dai_dien'] ?? null;

            if ($anh_dai_dien && $anh_dai_dien['error'] == 0) {
                $new_file = uploadFile($anh_dai_dien, './uploads');
                if (!empty($anh_cu)) {
                    deleteFile($anh_cu);
                }
            } else {
                $new_file = $anh_cu;
            }

            if ($new_file) {
                $this->modelTaiKhoan->updateAnhDaiDien($tai_khoan_id, $new_file);
                $_SESSION['successAnh'] = "Đã đổi ảnh đại diện thành công";
                $_SESSION['flash'] = true;
            }

            header("Location:" . BASE_URL . '?act=quan-ly-tai-khoan');
            exit();
        }
    }

    public function quenMatKhau()
    {
        $listDanhMuc = $this->modelSanPham->getAllDanhMuc();
        require_once './views/quenMatKhau.php';
        deleteSessionErrors();
    }

    public function layMatKhau()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = filter_var(trim($_POST['email'] ?? ''), FILTER_SANITIZE_EMAIL);
            $checkEmail = $this->modelTaiKhoan->checkEmail($email);

            if (is_array($checkEmail)) {
                $_SESSION['layMk'] = 'Mật khẩu của bạn là: ' . $checkEmail[0]['mat_khau'];
            } else {
                $_SESSION['flash'] = true;
                $_SESSION['layMk'] = 'Email không tồn tại';
            }

            header('Location:' . BASE_URL . '?act=quen-mat-khau');
            exit();
        }
    }
}