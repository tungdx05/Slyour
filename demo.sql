-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 13, 2024 at 11:55 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `demo`
--

-- --------------------------------------------------------

--
-- Table structure for table `binh_luans`
--

CREATE TABLE `binh_luans` (
  `id` int NOT NULL,
  `san_pham_id` int NOT NULL,
  `tai_khoan_id` int NOT NULL,
  `noi_dung` text NOT NULL,
  `ngay_dang` date NOT NULL,
  `trang_thai` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `binh_luans`
--

INSERT INTO `binh_luans` (`id`, `san_pham_id`, `tai_khoan_id`, `noi_dung`, `ngay_dang`, `trang_thai`) VALUES
(1, 1, 3, 'Mèo đẹp', '2024-07-24', 2),
(2, 2, 4, 'Đẹp', '2024-07-16', 2),
(3, 6, 8, 'Chó đẹp quá', '2024-06-12', 1),
(6, 6, 9, 'Shop còn em này không, đẹp quá', '2024-08-04', 1),
(7, 2, 4, 'Hello', '2024-08-05', 1),
(8, 4, 4, 'Mèo đẹp quá <3', '2024-08-05', 1),
(10, 1, 4, 'Không thích mèo này', '2024-08-05', 2),
(13, 1, 4, 'mèo xấu hoắc', '2024-08-06', 2),
(14, 2, 24, 'Đẹp quá', '2024-08-06', 1),
(15, 1, 23, 'Xin chào', '2024-08-08', 1),
(16, 3, 23, 'ssas', '2024-08-13', 1);

-- --------------------------------------------------------

--
-- Table structure for table `chi_tiet_don_hangs`
--

CREATE TABLE `chi_tiet_don_hangs` (
  `id` int NOT NULL,
  `don_hang_id` int NOT NULL,
  `san_pham_id` int NOT NULL,
  `don_gia` decimal(10,2) NOT NULL,
  `so_luong` int NOT NULL,
  `thanh_tien` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `chi_tiet_don_hangs`
--

INSERT INTO `chi_tiet_don_hangs` (`id`, `don_hang_id`, `san_pham_id`, `don_gia`, `so_luong`, `thanh_tien`) VALUES
(1, 1, 1, '30000000.00', 2, '30000000'),
(2, 2, 2, '55000000.00', 1, '55000000');

-- --------------------------------------------------------

--
-- Table structure for table `chi_tiet_gio_hangs`
--

CREATE TABLE `chi_tiet_gio_hangs` (
  `id` int NOT NULL,
  `gio_hang_id` int NOT NULL,
  `san_pham_id` int NOT NULL,
  `so_luong` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `chi_tiet_gio_hangs`
--

INSERT INTO `chi_tiet_gio_hangs` (`id`, `gio_hang_id`, `san_pham_id`, `so_luong`) VALUES
(12, 70, 2, 13),
(13, 70, 13, 16),
(14, 70, 13, 16),
(15, 70, 1, 8),
(16, 70, 3, 15),
(17, 70, 5, 2),
(18, 70, 8, 4),
(19, 70, 7, 1);

-- --------------------------------------------------------

--
-- Table structure for table `chuc_vus`
--

CREATE TABLE `chuc_vus` (
  `id` int NOT NULL,
  `ten_chuc_vu` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `chuc_vus`
--

INSERT INTO `chuc_vus` (`id`, `ten_chuc_vu`) VALUES
(1, 'admin'),
(2, 'Khách hàng');

-- --------------------------------------------------------

--
-- Table structure for table `danh_mucs`
--

CREATE TABLE `danh_mucs` (
  `id` int NOT NULL,
  `ten_danh_muc` varchar(255) NOT NULL,
  `mo_ta` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `danh_mucs`
--

INSERT INTO `danh_mucs` (`id`, `ten_danh_muc`, `mo_ta`) VALUES
(1, 'Túi sách tay', ''),
(2, 'Túi đeo chéo', ''),
(3, 'Túi du lịch ', ''),
(6, 'Túi tote', ''),
(7, 'Túi để laptop', ''),
(8, 'Túi thể thao ', ''),
(9, 'Balo đi học ', ''),
(10, 'Balo thể thao ', ''),
(11, 'Ví', '');

-- --------------------------------------------------------

--
-- Table structure for table `don_hangs`
--

CREATE TABLE `don_hangs` (
  `id` int NOT NULL,
  `ma_don_hang` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `tai_khoan_id` int NOT NULL,
  `ten_nguoi_nhan` varchar(255) NOT NULL,
  `email_nguoi_nhan` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `sdt_nguoi_nhan` varchar(15) NOT NULL,
  `dia_chi_nguoi_nhan` text NOT NULL,
  `ngay_dat` date NOT NULL,
  `tong_tien` decimal(10,2) NOT NULL,
  `ghi_chu` text,
  `phuong_thuc_thanh_toan_id` int NOT NULL DEFAULT '1',
  `trang_thai_id` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `don_hangs`
--

INSERT INTO `don_hangs` (`id`, `ma_don_hang`, `tai_khoan_id`, `ten_nguoi_nhan`, `email_nguoi_nhan`, `sdt_nguoi_nhan`, `dia_chi_nguoi_nhan`, `ngay_dat`, `tong_tien`, `ghi_chu`, `phuong_thuc_thanh_toan_id`, `trang_thai_id`) VALUES
(1, 'DH001', 3, 'Ngọc Mai', 'mai@gmail.com', '0949607556', '13 Trịnh Văn Bô', '2024-07-01', '3000000.00', '', 1, 5),
(2, 'DH002', 3, 'Nga01', 'nga@gmail.com', '0958668342', '6 206 Phương Canh', '2024-07-01', '55000000.00', 'Vui lòng ship nhanh nhé shop', 2, 2),
(3, 'DH003', 8, 'TNAm', 'nam@gmail.com', '0949607556', 'Số 1 đường Phương Canh', '2024-07-02', '3000000.00', NULL, 2, 4),
(4, 'DH004', 8, 'Nam', 'nam@gmail.com', '0949607556', 'Thôn Bún', '2024-07-02', '3000000.00', NULL, 2, 6);

-- --------------------------------------------------------

--
-- Table structure for table `gio_hangs`
--

CREATE TABLE `gio_hangs` (
  `id` int NOT NULL,
  `tai_khoan_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `gio_hangs`
--

INSERT INTO `gio_hangs` (`id`, `tai_khoan_id`) VALUES
(70, 23),
(71, 23),
(72, 25);

-- --------------------------------------------------------

--
-- Table structure for table `hinh_anh_san_phams`
--

CREATE TABLE `hinh_anh_san_phams` (
  `id` int NOT NULL,
  `san_pham_id` int NOT NULL,
  `link_hinh_anh` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `hinh_anh_san_phams`
--

INSERT INTO `hinh_anh_san_phams` (`id`, `san_pham_id`, `link_hinh_anh`) VALUES
(1, 3, './uploads/1722007109shiba2_1.jpg'),
(2, 3, './uploads/1722517360shiba2_1.jpg'),
(4, 3, './uploads/1722517360shiba2_2.jpg'),
(5, 4, './uploads/1722008439ragdol1_1.jpg'),
(6, 4, './uploads/1722008439ragdol1_2.jpg'),
(7, 4, './uploads/1722008439ragdol1_3.jpg'),
(8, 2, './uploads/1722081298shiba1_1.jpg'),
(9, 2, './uploads/1722081298shiba1_2.jpg'),
(10, 2, './uploads/1722081298shiba1_3.jpg'),
(11, 6, './uploads/1722081419alaska1_1.jpg'),
(12, 6, './uploads/1722081419alaska1_2.jpg'),
(13, 6, './uploads/1722081419alaska1_3.jpg'),
(14, 7, './uploads/1722081583alaska2_1.jpg'),
(15, 7, './uploads/1722081583alaska2_2.jpg'),
(16, 7, './uploads/1722081583alaska2_3.jpg'),
(17, 8, './uploads/1722081858alaska3.jpg'),
(18, 9, './uploads/1722082089anh1_1.jpg'),
(19, 9, './uploads/1722082089anh1_2.jpg'),
(20, 10, './uploads/1722082276anh2_2.jpg'),
(21, 10, './uploads/1722082276anh2_3.jpg'),
(22, 11, './uploads/1722082415phoc1_1.jpg'),
(23, 12, './uploads/1722082648sam1.jpg'),
(24, 12, './uploads/1722082648sam1_1.jpg'),
(25, 12, './uploads/1722082648sam1_2.jpg'),
(26, 11, './uploads/1722082683sam1_1.jpg'),
(27, 11, './uploads/1722082683sam1_2.jpg'),
(28, 1, './uploads/1722503043Sphynx1.jpg'),
(29, 14, './uploads/1722780289ps1.jpg'),
(30, 14, './uploads/1722780289ps12.jpg'),
(31, 14, './uploads/1722780289ps13.jpg'),
(32, 15, './uploads/1722780571ps31.jpg'),
(33, 15, './uploads/1722780571ps32.jpg'),
(34, 15, './uploads/1722780571ps3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `phuong_thuc_thanh_toans`
--

CREATE TABLE `phuong_thuc_thanh_toans` (
  `id` int NOT NULL,
  `ten_phuong_thuc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `phuong_thuc_thanh_toans`
--

INSERT INTO `phuong_thuc_thanh_toans` (`id`, `ten_phuong_thuc`) VALUES
(1, 'COD (thanh toán khi nhận hàng)'),
(2, 'Thanh toán qua Banking');

-- --------------------------------------------------------

--
-- Table structure for table `san_phams`
--

CREATE TABLE `san_phams` (
  `id` int NOT NULL,
  `ten_san_pham` varchar(255) NOT NULL,
  `gia_san_pham` decimal(10,2) NOT NULL,
  `gia_khuyen_mai` decimal(10,2) DEFAULT NULL,
  `hinh_anh` varchar(255) DEFAULT NULL,
  `so_luong` int NOT NULL,
  `luot_xem` int DEFAULT '0',
  `ngay_nhap` date NOT NULL,
  `mo_ta` text,
  `danh_muc_id` int NOT NULL,
  `trang_thai` tinyint NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `san_phams`
--

INSERT INTO `san_phams` (`id`, `ten_san_pham`, `gia_san_pham`, `gia_khuyen_mai`, `hinh_anh`, `so_luong`, `luot_xem`, `ngay_nhap`, `mo_ta`, `danh_muc_id`, `trang_thai`) VALUES
(1, 'Mèo Sphynx11', '300.00', '0.00', './uploads1723462762Sphynx1.jpg', 3, 100, '2024-07-01', 'Mèo đẹp, ăn khỏe, đã tiêm phòng', 1, 1),
(2, 'Chó Shiba Inu Vàng  Đực', '500.00', '0.00', './uploads1723462779shiba1.jpg', 5, 77, '2024-07-03', 'Shiba năng động, đã tiêm phong 2 mũi', 2, 1),
(3, 'Shiba Inu Trắng Vàng Cái', '700.00', '89000000.00', './uploads1722517401shiba2_3.jpg', 20, 86, '2024-07-11', '', 2, 1),
(4, 'Mèo Radgol', '350.00', '80000000.00', './uploads/1722008439ragdol1.jpg', 6, 0, '2024-07-25', '', 6, 1),
(5, 'Mèo Bengal Brown Cái', '980.00', '96000000.00', './uploads1722081234bengal.jpg', 9, 0, '2024-07-03', '', 7, 2),
(6, 'Alaska Nâu Đỏ Cái', '750.00', '70000000.00', './uploads/1722081419alsaska1.jpg', 7, 50, '2024-07-15', '', 8, 1),
(7, 'Alaska Standard Đen Trắng Cái', '87000000.00', '87000000.00', './uploads/1722081583alaska2.jpg', 12, 30, '2024-04-10', 'Alaska đẹp, đã tiêm 2 mũi', 8, 1),
(8, 'Alaska Oversize Xám Trắng Cái', '99000000.00', '99000000.00', './uploads/1722081858alaska3.jpg', 8, 99, '2024-04-10', 'Alaska siêu đẹp, số lượng có hạn', 8, 1),
(9, 'Anh Lông Dài Bicolor Đực', '89000000.00', '89000000.00', './uploads/1722082089anh1.jpg', 6, 70, '2024-04-13', '', 9, 1),
(10, 'Anh Lông Dài Orange Đực', '89000000.00', '89000000.00', './uploads/1722082276anh2_1.jpg', 13, 43, '2024-04-01', '', 9, 1),
(11, 'Phốc Sóc Trắng Đực', '89000000.00', '89000000.00', './uploads/1722082415phoc1.jpg', 13, 80, '2024-04-01', '', 10, 1),
(12, 'Samoyed Đực', '95000000.00', '95000000.00', './uploads/1722082648sam1.jpg', 9, 68, '2024-02-09', '', 11, 1),
(13, 'Chó Golden trắng, cái', '60000000.00', '60000000.00', './uploads/1722517605golden1.jpg', 12, 56, '2024-08-14', 'Golden hiền, thông minh, đã tiêm phòng đầy đủ', 3, 2),
(14, 'Phốc Sóc Orange Cái', '97600000.00', '97600000.00', './uploads/1722780289ps1.jpg', 30, 0, '2024-07-29', '', 10, 1),
(15, 'Phốc Sóc Parti Cái', '50000000.00', '50000000.00', './uploads/1722780571ps3.jpg', 26, 0, '2024-04-24', '', 10, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tai_khoans`
--

CREATE TABLE `tai_khoans` (
  `id` int NOT NULL,
  `ho_ten` varchar(255) NOT NULL,
  `anh_dai_dien` varchar(255) DEFAULT NULL,
  `ngay_sinh` date DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `so_dien_thoai` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `gioi_tinh` tinyint(1) DEFAULT '1',
  `dia_chi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci,
  `mat_khau` varchar(255) NOT NULL,
  `chuc_vu_id` int DEFAULT NULL,
  `trang_thai` tinyint(1) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tai_khoans`
--

INSERT INTO `tai_khoans` (`id`, `ho_ten`, `anh_dai_dien`, `ngay_sinh`, `email`, `so_dien_thoai`, `gioi_tinh`, `dia_chi`, `mat_khau`, `chuc_vu_id`, `trang_thai`) VALUES
(3, 'Trần Thị Ngọc Mai', NULL, '2024-07-01', 'maai@gmail.com', '0335323863', 1, '13 Trịnh Văn Bô', '12345678', 1, 1),
(4, 'Trần Thanh Nga', NULL, '2024-07-23', 'thanh@gmail.com', '0942413406', 2, '206 Phương Canh', '$2y$10$cEgR/GLYzli6Q1FX4vP5NOnSSuiOZExHvFWICBRvlPI96dcTHKZt.', 1, 1),
(5, 'Trần Đình Thái', NULL, NULL, 'thuymt2005@gmail.com', '0942413406', 1, NULL, '$2y$10$q689I2nlLXYhmalS0sQUi.YOHYfXCNnQGJGrwbTfr3AcJ5nZfmE9e', 1, 2),
(8, 'Vũ Thành Nam', NULL, '2024-07-06', 'thanhnam@gmail.com', '0949607556', 1, 'Trịnh Văn Bô', '$2y$10$TpyMtKdRxU5oeahaGh4a.uXilBg18uJh00Ln/mpssUJ8x5RXNiILy', 2, 2),
(9, 'Trần Anh Thư1', './uploads1722960038avatar5.png', NULL, 'anhthu22@gmail.com', '098765876', 1, 'Cầu Diễn', '$2y$10$9Zt3rTLD0.lW3b.4FKnS6OK0sazPq/n.tSFD1gksMO8QPnGkyv2n2', 1, 1),
(10, 'Lê Thị Lan Anh', NULL, '2024-08-21', 'ngaa205@gmail.com', '0942413406', 1, 'Nam Định', '$2y$10$I0U0J/7wAv83.Bai/jpt1uGR6l9RI2AVoSCpC9RIb338AvsbYGmGG', 1, 1),
(16, 'Trần Văn Nam', NULL, '2024-08-15', 'abc@gmai.com', '0335323863', 1, 'Ba Đình', 'nga123', NULL, 1),
(17, 'Trần Văn B', NULL, '2024-08-06', '12222@gmail.com', '0335323863', 1, 'Trịnh Văn Bô 12', '123', NULL, 1),
(18, 'â', NULL, '2024-08-16', 'nhi2005@gmail.com', '0982334532', 2, 'Ba Đình', '$2y$10$gVG6XNjtezoNXaqgcD54Lu8Z79znjtFzKsaMvaPJ1RItskylx1oFy', 2, 1),
(19, 'Nguyễn Minh Hùng', NULL, '2024-08-18', 'hungg@gmail.com', '0982334532', 1, 'Ba Đình', 'nga123', NULL, 1),
(20, 'Hà Quang Huy', NULL, '2024-08-15', 'quanghuy@gmail.com', '0335323863', 1, 'Cầu Diễn', '$2y$10$AzbGn9vsYwQ3zm1xM1sWRO9oT.yIOKEo0fQtxpXQY6BGifzooA26m', 1, 1),
(22, 'tuine', NULL, NULL, 'maaa@gmail.com', NULL, 1, NULL, '$2y$10$5or2uSreHHNrE6EDaGHIv.qcr2l30SPAembS7oukRtNyI65dJYFYO', 1, 1),
(23, 'Hạnh Nguyên', './uploads17231935281722954183avatar2.png', '2024-08-07', 'hanhnguyen@gmail.com', '0992145596', 2, 'Cầu Diễn', '1234', 2, 1),
(24, 'Diệp Anh', './uploads1722959038user3-128x128.jpg', '2024-08-21', 'diepanh@gmail.com', '0911887235', 2, '36/10/10 Cầu Giấy', '1234', 2, 2),
(25, 'Son', './uploads/1731421486uploads1722517401shiba2_3.jpg', '2006-08-08', 'sonvuong915@gmail.com', '93998337', 1, 'hauyyfffff', '1234567', 1, 1),
(28, 'Son', NULL, '2005-11-11', 'sonvuong@gmail.com', '88777887', 1, 'hauyyfffff', '123456789', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `trang_thai_don_hangs`
--

CREATE TABLE `trang_thai_don_hangs` (
  `id` int NOT NULL,
  `ten_trang_thai` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `trang_thai_don_hangs`
--

INSERT INTO `trang_thai_don_hangs` (`id`, `ten_trang_thai`) VALUES
(1, 'Chưa xác nhận'),
(2, 'Đã xác nhận'),
(3, 'Chưa thanh toán'),
(4, 'Đã thanh toán'),
(5, 'Đang chuẩn bị hàng'),
(6, 'Đang giao'),
(7, 'Đã giao'),
(8, 'Đã nhận'),
(9, 'Thành công'),
(10, 'Hoàn hàng'),
(11, 'Hủy đơn');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `binh_luans`
--
ALTER TABLE `binh_luans`
  ADD PRIMARY KEY (`id`),
  ADD KEY `san_pham_id` (`san_pham_id`,`tai_khoan_id`),
  ADD KEY `tai_khoan_id` (`tai_khoan_id`);

--
-- Indexes for table `chi_tiet_don_hangs`
--
ALTER TABLE `chi_tiet_don_hangs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `don_hang_id` (`don_hang_id`,`san_pham_id`),
  ADD KEY `san_pham_id` (`san_pham_id`);

--
-- Indexes for table `chi_tiet_gio_hangs`
--
ALTER TABLE `chi_tiet_gio_hangs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `gio_hang_id` (`gio_hang_id`,`san_pham_id`),
  ADD KEY `san_pham_id` (`san_pham_id`);

--
-- Indexes for table `chuc_vus`
--
ALTER TABLE `chuc_vus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `danh_mucs`
--
ALTER TABLE `danh_mucs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `don_hangs`
--
ALTER TABLE `don_hangs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tai_khoan_id` (`tai_khoan_id`,`phuong_thuc_thanh_toan_id`,`trang_thai_id`),
  ADD KEY `phuong_thuc_thanh_toan_id` (`phuong_thuc_thanh_toan_id`),
  ADD KEY `trang_thai_id` (`trang_thai_id`);

--
-- Indexes for table `gio_hangs`
--
ALTER TABLE `gio_hangs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tai_khoan_id` (`tai_khoan_id`);

--
-- Indexes for table `hinh_anh_san_phams`
--
ALTER TABLE `hinh_anh_san_phams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `phuong_thuc_thanh_toans`
--
ALTER TABLE `phuong_thuc_thanh_toans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `san_phams`
--
ALTER TABLE `san_phams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `danh_muc_id` (`danh_muc_id`);

--
-- Indexes for table `tai_khoans`
--
ALTER TABLE `tai_khoans`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `chuc_vu_id` (`chuc_vu_id`);

--
-- Indexes for table `trang_thai_don_hangs`
--
ALTER TABLE `trang_thai_don_hangs`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `binh_luans`
--
ALTER TABLE `binh_luans`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `chi_tiet_don_hangs`
--
ALTER TABLE `chi_tiet_don_hangs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `chi_tiet_gio_hangs`
--
ALTER TABLE `chi_tiet_gio_hangs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `chuc_vus`
--
ALTER TABLE `chuc_vus`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `danh_mucs`
--
ALTER TABLE `danh_mucs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `don_hangs`
--
ALTER TABLE `don_hangs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `gio_hangs`
--
ALTER TABLE `gio_hangs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `hinh_anh_san_phams`
--
ALTER TABLE `hinh_anh_san_phams`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `phuong_thuc_thanh_toans`
--
ALTER TABLE `phuong_thuc_thanh_toans`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `san_phams`
--
ALTER TABLE `san_phams`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tai_khoans`
--
ALTER TABLE `tai_khoans`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `trang_thai_don_hangs`
--
ALTER TABLE `trang_thai_don_hangs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `binh_luans`
--
ALTER TABLE `binh_luans`
  ADD CONSTRAINT `binh_luans_ibfk_1` FOREIGN KEY (`san_pham_id`) REFERENCES `san_phams` (`id`),
  ADD CONSTRAINT `binh_luans_ibfk_2` FOREIGN KEY (`tai_khoan_id`) REFERENCES `tai_khoans` (`id`);

--
-- Constraints for table `chi_tiet_don_hangs`
--
ALTER TABLE `chi_tiet_don_hangs`
  ADD CONSTRAINT `chi_tiet_don_hangs_ibfk_1` FOREIGN KEY (`don_hang_id`) REFERENCES `don_hangs` (`id`),
  ADD CONSTRAINT `chi_tiet_don_hangs_ibfk_2` FOREIGN KEY (`san_pham_id`) REFERENCES `san_phams` (`id`);

--
-- Constraints for table `chi_tiet_gio_hangs`
--
ALTER TABLE `chi_tiet_gio_hangs`
  ADD CONSTRAINT `chi_tiet_gio_hangs_ibfk_1` FOREIGN KEY (`gio_hang_id`) REFERENCES `gio_hangs` (`id`),
  ADD CONSTRAINT `chi_tiet_gio_hangs_ibfk_2` FOREIGN KEY (`san_pham_id`) REFERENCES `san_phams` (`id`);

--
-- Constraints for table `don_hangs`
--
ALTER TABLE `don_hangs`
  ADD CONSTRAINT `don_hangs_ibfk_1` FOREIGN KEY (`tai_khoan_id`) REFERENCES `tai_khoans` (`id`),
  ADD CONSTRAINT `don_hangs_ibfk_2` FOREIGN KEY (`phuong_thuc_thanh_toan_id`) REFERENCES `phuong_thuc_thanh_toans` (`id`),
  ADD CONSTRAINT `don_hangs_ibfk_3` FOREIGN KEY (`trang_thai_id`) REFERENCES `trang_thai_don_hangs` (`id`);

--
-- Constraints for table `gio_hangs`
--
ALTER TABLE `gio_hangs`
  ADD CONSTRAINT `gio_hangs_ibfk_1` FOREIGN KEY (`tai_khoan_id`) REFERENCES `tai_khoans` (`id`);

--
-- Constraints for table `san_phams`
--
ALTER TABLE `san_phams`
  ADD CONSTRAINT `san_phams_ibfk_1` FOREIGN KEY (`danh_muc_id`) REFERENCES `danh_mucs` (`id`);

--
-- Constraints for table `tai_khoans`
--
ALTER TABLE `tai_khoans`
  ADD CONSTRAINT `tai_khoans_ibfk_1` FOREIGN KEY (`chuc_vu_id`) REFERENCES `chuc_vus` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
