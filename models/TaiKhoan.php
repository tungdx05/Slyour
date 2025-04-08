<?php

class TaiKhoan {
    public $conn;

    public function __construct() {
        $this->conn = connectDB();
    }

    public function checkLogin($email, $mat_khau)
    {
        try {
            $sql = "SELECT * FROM tai_khoans WHERE email = :email";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(
                [
                    ':email' => $email
                ]
            );
            $user = $stmt->fetch();
            if ($user && $mat_khau == $user['mat_khau']) {
                if ($user['chuc_vu_id'] == 2) {
                    if ($user['trang_thai'] == 1) {
                        return [
                            'email' => $user['email'],
                            'id' => $user['id']
                        ]; // trả về email và id
                    } else {
                        return "Tài khoản bị cấm";
                    }
                }
            } elseif ($user && password_verify($mat_khau, $user['mat_khau'])) {
                if ($user['chuc_vu_id'] == 1) {
                    return "Tài khoản không có quyền đăng nhập khách hàng";
                }
            } else {
                return 'Vui lòng kiểm tra lại thông tin đăng nhập';
            }
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
            return  false;
        }
    }
    public function getTaiKhoanFromEmail($email) {
        try {
            $sql = "SELECT * FROM tai_khoans WHERE email = :email";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':email' => $email]);
            return $stmt->fetch();
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
        }
    }

    public function binhLuan($tai_khoan_id, $san_pham_id, $noi_dung, $ngay_dang) {
        try {
            $sql = "INSERT INTO binh_luans (tai_khoan_id, san_pham_id, noi_dung, ngay_dang) VALUES (:tai_khoan_id, :san_pham_id, :noi_dung, :ngay_dang)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':tai_khoan_id' => $tai_khoan_id,
                ':san_pham_id' => $san_pham_id,
                ':noi_dung' => $noi_dung,
                ':ngay_dang' => $ngay_dang,
            ]);
            return true;
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
            return false;
        }
    }

    public function insertTaiKhoan($ho_ten,  $email, $mat_khau, $chuc_vu_id) {
        try {
            $sql = "INSERT INTO tai_khoans (ho_ten, email, mat_khau, chuc_vu_id) VALUES (:ho_ten,  :email,  :mat_khau, :chuc_vu_id)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':ho_ten' => $ho_ten,
               
                ':email' => $email,
               
                ':mat_khau' => $mat_khau, 
                ':chuc_vu_id' => $chuc_vu_id,
                
            ]);
            return true;
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
            return false;
        }
    }
    public function thongTinTaiKhoan($id) {
        try {
            $sql = "SELECT * FROM tai_khoans WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id' => $id]);
            return $stmt->fetch();
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
            return false;
        }
    }

    public function updateTaiKhoan($id, $ho_ten, $email, $so_dien_thoai, $dia_chi) {
        try {
            $sql = "UPDATE tai_khoans SET ho_ten = :ho_ten, email = :email, so_dien_thoai = :so_dien_thoai, dia_chi = :dia_chi WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':ho_ten' => $ho_ten,
                ':email' => $email,
                ':so_dien_thoai' => $so_dien_thoai,
                ':dia_chi' => $dia_chi,
                ':id' => $id,
            ]);
            return true;
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
            return false;
        }
    }

    public function updateMatKhau($id, $mat_khau) {
        try {
            $sql = "UPDATE tai_khoans SET mat_khau = :mat_khau WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':mat_khau' => password_hash($mat_khau, PASSWORD_BCRYPT), // Băm mật khẩu
                ':id' => $id,
            ]);
            return true;
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
            return false;
        }
    }

    public function updateAnhDaiDien($id, $anh_dai_dien) {
        try {
            $sql = "UPDATE tai_khoans SET anh_dai_dien = :anh_dai_dien WHERE id = :id";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':anh_dai_dien' => $anh_dai_dien,
                ':id' => $id,
            ]);
            return true;
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
            return false;
        }
    }

    public function checkEmail($email) {
        try {
            $sql = "SELECT * FROM tai_khoans WHERE email = :email";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':email' => $email]);
            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Lỗi: " . $e->getMessage();
            return false;
        }
    }
}
?>