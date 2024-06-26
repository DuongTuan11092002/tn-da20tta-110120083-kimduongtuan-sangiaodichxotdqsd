-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2024 at 01:41 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `khoaluan_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `account`
--

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `name_business` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `thumbnail` text NOT NULL,
  `role` int(11) DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 0,
  `status_premium` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `account`
--

INSERT INTO `account` (`id`, `fullname`, `name_business`, `email`, `phone`, `address`, `password`, `created_at`, `thumbnail`, `role`, `status`, `status_premium`) VALUES
(1, 'Kim Dương Tuấn', NULL, 'admin@gmail.com', '0911096648', 'Số 126, Nguyễn Thiện Thành, Phường 5, Thành phố Trà Vinh', 'c4ca4238a0b923820dcc509a6f75849b', '2024-06-23 10:45:24', '', 2, 1, 0),
(9, 'Nguyễn Văn A', NULL, 'user1@gmail.com', '0364202644', 'Số 126, Nguyễn Thiện Thành, Phường 5, Thành phố Trà Vinh', '202cb962ac59075b964b07152d234b70', '2024-06-23 10:31:15', '', 0, 1, 0),
(10, 'Nguyễn Văn B', 'Mazda showroom', 'user2@gmail.com', '0364202123', 'Số 127, Nguyễn Thiện Thành, Phường 5, Thành phố Trà Vinh', '202cb962ac59075b964b07152d234b70', '2024-06-24 11:43:14', '1719229394mazda-logo.png', 1, 1, 2),
(11, 'Nguyễn Văn C', NULL, 'user3@gmail.com', '03642026231', 'Số 128, Nguyễn Thiện Thành, Phường 5, Thành phố Trà Vinh', '202cb962ac59075b964b07152d234b70', '2024-06-23 10:32:44', '', 0, 1, 0),
(12, 'Nguyễn Văn D', NULL, 'user4@gmail.com', '034512648', 'Số 126, Nguyễn Thiện Thành, Phường 5, Thành phố Trà Vinh', '202cb962ac59075b964b07152d234b70', '2024-06-24 08:25:34', '', 0, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `id` int(11) NOT NULL,
  `image` text NOT NULL,
  `status` int(11) NOT NULL,
  `account_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id`, `image`, `status`, `account_id`) VALUES
(5, '1717037258banner_1.png', 2, 1),
(6, '1717037264banner_2.png', 2, 1),
(7, '1717037268banner_3.png', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories_company`
--

CREATE TABLE `categories_company` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories_company`
--

INSERT INTO `categories_company` (`id`, `name`, `slug`, `status`) VALUES
(7, 'Toyota', 'toyota', 1),
(8, 'Honda', 'honda', 1),
(9, 'Ford', 'ford', 1),
(10, 'Chevrolet', 'chevrolet', 1),
(11, 'Nissan', 'nissan', 1),
(12, 'Hyundai', 'hyundai', 1),
(13, 'Kia', 'kia', 1),
(14, 'BMW', 'bmw', 1),
(15, 'Mercedes-Benz', 'mercedes-benz', 1),
(16, 'Audi', 'audi', 1),
(17, 'Volkswagen', 'volkswagen', 1),
(18, 'Porsche', 'porsche', 1),
(19, 'Lexus', 'lexus', 1),
(20, 'Mazda', 'mazda', 1),
(21, 'Subaru', 'subaru', 1),
(22, 'Mitsubishi', 'mitsubishi', 1),
(23, 'Tesla', 'tesla', 1),
(24, 'Volvo', 'volvo', 1),
(25, 'Jaguar', 'jaguar', 1),
(26, 'Land Rover', 'land-rover', 1),
(27, 'Ferrari', 'ferrari', 1),
(28, 'Lamborghini', 'lamborghini', 1),
(29, 'Bentley', 'bentley', 1),
(30, 'Rolls-Royce', 'rolls-royce', 1),
(31, 'Aston Martin', 'aston-martin', 1),
(32, 'Maserati', 'maserati', 1),
(33, 'Infiniti', 'infiniti', 1),
(34, 'Acura', 'acura', 1),
(35, 'Buick', 'buick', 1),
(36, 'Cadillac', 'cadillac', 1),
(37, 'Chrysler', 'chrysler', 1),
(38, 'Dodge', 'dodge', 1),
(39, 'Jeep', 'jeep', 1),
(40, 'GMC', 'gmc', 1),
(41, 'Genesis', 'genesis', 1),
(42, 'Mini', 'mini', 1),
(43, 'Fiat', 'fiat', 1),
(44, 'Peugeot', 'peugeot', 1),
(45, 'Renault', 'renault', 1),
(46, 'Citroën', 'citroen', 1),
(47, 'Alfa Romeo', 'alfa-romeo', 1),
(48, 'Suzuki', 'suzuki', 1),
(49, 'Saab', 'saab', 1),
(50, 'Skoda', 'skoda', 1),
(51, 'Tata Motors', 'tata-motors', 1),
(52, 'Mahindra', 'mahindra', 1),
(53, 'Daihatsu', 'daihatsu', 1),
(54, 'Isuzu', 'isuzu', 1),
(55, 'MG', 'mg', 1),
(56, 'Rivian', 'rivian', 1),
(57, 'Lucid', 'lucid', 1),
(58, 'Pagani', 'pagani', 1),
(59, 'Koenigsegg', 'koenigsegg', 1),
(60, 'Bugatti', 'bugatti', 1),
(61, 'McLaren', 'mclaren', 1),
(62, 'Genesis', 'genesis', 1),
(63, 'Polestar', 'polestar', 1),
(64, 'Ram', 'ram', 1),
(65, 'Seat', 'seat', 1),
(66, 'Opel', 'opel', 1),
(67, 'Vauxhall', 'vauxhall', 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories_news`
--

CREATE TABLE `categories_news` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories_news`
--

INSERT INTO `categories_news` (`id`, `name`, `slug`, `status`) VALUES
(1, 'Bản tin mua xe', 'ban-tin-mua-xe', 1),
(2, 'Tin tức', 'tin-tuc', 1);

-- --------------------------------------------------------

--
-- Table structure for table `citys`
--

CREATE TABLE `citys` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `citys`
--

INSERT INTO `citys` (`id`, `name`, `slug`, `status`) VALUES
(6, 'Hà Nội', 'ha-noi', 1),
(7, 'Hà Giang', 'ha-giang', 1),
(8, 'Cao Bằng', 'cao-bang', 1),
(9, 'Bắc Kạn', 'bac-kan', 1),
(10, 'Tuyên Quang', 'tuyen-quang', 1),
(11, 'Lào Cai', 'lao-cai', 1),
(12, 'Điện Biên', 'dien-bien', 1),
(13, 'Lai Châu', 'lai-chau', 1),
(14, 'Sơn La', 'son-la', 1),
(15, 'Yên Bái', 'yen-bai', 1),
(16, 'Hoà Bình', 'hoa-binh', 1),
(17, 'Thái Nguyên', 'thai-nguyen', 1),
(18, 'Lạng Sơn', 'lang-son', 1),
(19, 'Quảng Ninh', 'quang-ninh', 1),
(20, 'Bắc Giang', 'bac-giang', 1),
(21, 'Phú Thọ', 'phu-tho', 1),
(22, 'Vĩnh Phúc', 'vinh-phuc', 1),
(23, 'Bắc Ninh', 'bac-ninh', 1),
(24, 'Hải Dương', 'hai-duong', 1),
(25, 'Hải Phòng', 'hai-phong', 1),
(26, 'Hưng Yên', 'hung-yen', 1),
(27, 'Thái Bình', 'thai-binh', 1),
(28, 'Hà Nam', 'ha-nam', 1),
(29, 'Nam Định', 'nam-dinh', 1),
(30, 'Ninh Bình', 'ninh-binh', 1),
(31, 'Thanh Hoá', 'thanh-hoa', 1),
(32, 'Nghệ An', 'nghe-an', 1),
(33, 'Hà Tĩnh', 'ha-tinh', 1),
(34, 'Quảng Bình', 'quang-binh', 1),
(35, 'Quảng Trị', 'quang-tri', 1),
(36, 'Thừa Thiên Huế', 'thua-thien-hue', 1),
(37, 'Đà Nẵng', 'da-nang', 1),
(38, 'Quảng Nam', 'quang-nam', 1),
(39, 'Quảng Ngãi', 'quang-ngai', 1),
(40, 'Bình Định', 'binh-dinh', 1),
(41, 'Phú Yên', 'phu-yen', 1),
(42, 'Khánh Hòa', 'khanh-hoa', 1),
(43, 'Ninh Thuận', 'ninh-thuan', 1),
(44, 'Bình Thuận', 'binh-thuan', 1),
(45, 'Kon Tum', 'kon-tum', 1),
(46, 'Gia Lai', 'gia-lai', 1),
(47, 'Đắk Lắk', 'dak-lak', 1),
(48, 'Đắk Nông', 'dak-nong', 1),
(49, 'Lâm Đồng', 'lam-dong', 1),
(50, 'Bình Phước', 'binh-phuoc', 1),
(51, 'Tây Ninh', 'tay-ninh', 1),
(52, 'Bình Dương', 'binh-duong', 1),
(53, 'Đồng Nai', 'dong-nai', 1),
(54, 'Bà Rịa - Vũng Tàu', 'ba-ria-vung-tau', 1),
(55, 'Hồ Chí Minh', 'ho-chi-minh', 1),
(56, 'Long An', 'long-an', 1),
(57, 'Tiền Giang', 'tien-giang', 1),
(58, 'Bến Tre', 'ben-tre', 1),
(59, 'Trà Vinh', 'tra-vinh', 1),
(60, 'Vĩnh Long', 'vinh-long', 1),
(61, 'Đồng Tháp', 'dong-thap', 1),
(62, 'An Giang', 'an-giang', 1),
(63, 'Kiên Giang', 'kien-giang', 1),
(64, 'Cần Thơ', 'can-tho', 1),
(65, 'Hậu Giang', 'hau-giang', 1),
(66, 'Sóc Trăng', 'soc-trang', 1),
(67, 'Bạc Liêu', 'bac-lieu', 1),
(68, 'Cà Mau', 'ca-mau', 1);

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` longtext NOT NULL,
  `status` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `product_car_id` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp(),
  `star` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `fullname`, `email`, `message`, `status`, `account_id`, `product_car_id`, `date`, `star`) VALUES
(9, 'Nguyễn Văn D', 'user4@gmail.com', 'Xe đẹp, chạy rất êm', 1, 12, 72, '2024-06-25 03:29:03', 5);

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `account_id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `fullname`, `email`, `phone`, `content`, `created_at`, `account_id`, `product_id`, `status`) VALUES
(10, 'Nguyễn Thị bé', 'nguyenthibe@gmail.com', '091106125', 'Tôi cần đăng ký những dịch vụ lâu dài hơn', '2024-06-23 12:15:15', 1, NULL, 0),
(11, 'Nguyễn Văn D', 'user4@gmail.com', '0364505648', 'Tôi cần biết thêm thông tin về sản phẩm xe này, có thể thương lượng giá sản phẩm', '2024-06-24 11:47:17', 10, 77, 0);

-- --------------------------------------------------------

--
-- Table structure for table `library_img`
--

CREATE TABLE `library_img` (
  `id` int(11) NOT NULL,
  `img_car` text NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `library_img`
--

INSERT INTO `library_img` (`id`, `img_car`, `product_id`) VALUES
(122, '1719217380_mazda-3-detail.jpg', 72),
(123, '1719217380_mazda-3-front.jpg', 72),
(124, '1719217380_mazda-3-thumbnail.jpg', 72),
(125, '1719217380_noi-that-mazda-3.jpg', 72),
(126, '1719217810_mitsubishi-triton-detail.jpg', 73),
(127, '1719217810_mitsubishi-triton-front.jpeg', 73),
(128, '1719217810_mitsubishi-triton-thumbnail.jpg', 73),
(129, '1719228830_mazda-cx-5-2.jpg', 74),
(130, '1719228830_mazda-cx-5-3.jpg', 74),
(131, '1719228830_mazda-cx-5-4.jpg', 74),
(132, '1719228899_cx-30-front.jpg', 75),
(133, '1719228899_cx-30-thumbnail.jpg', 75),
(134, '1719228899_mazda-cx-30.jpg', 75),
(135, '1719228970_cx-30-front.jpg', 76),
(136, '1719228970_cx-30-thumbnail.jpg', 76),
(137, '1719228970_mazda-cx-30.jpg', 76),
(138, '1719229041_mazda-3-detail.jpg', 77),
(139, '1719229041_mazda-3-front.jpg', 77),
(140, '1719229041_mazda-3-thumbnail.jpg', 77),
(141, '1719229041_noi-that-mazda-3.jpg', 77),
(142, '1719229091_mazda-6-detail.jpg', 78),
(143, '1719229091_mazda-6-front.jpg', 78),
(144, '1719229091_mazda-6-thumbnail.jpg', 78),
(145, '1719232734_Honda-City-detail.jpg', 79),
(146, '1719232734_honda-city-front.jpg', 79),
(147, '1719232734_honda-city-thumbnail.jpg', 79);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `content` text NOT NULL,
  `thumbnail` text NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `categories_news_id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `name`, `slug`, `description`, `content`, `thumbnail`, `status`, `created_at`, `categories_news_id`, `account_id`) VALUES
(9, 'Tốc độ tối ưu chỉ 60-70 km/h, Wuling Mini EV liệu có được phép chạy trên cao tốc Việt Nam?', 'toc-do-toi-uu-chi-60-70-kmh-wuling-mini-ev-lieu-co-duoc-phep-chay-tren-cao-toc-viet-nam', 'Tốc độ tối đa của Mini EV trên 100 km/h nhưng tốc độ tối ưu của xe khoảng 60-70 km/h, tức ngang với các xe máy nên nhiều người tò mò không biết chiếc xe điện Trung Quốc có được phép chạy vào các cao tốc tại Việt Nam hay không.', '<p>&nbsp;</p>\r\n\r\n<p>Tốc độ tối đa của Mini EV tr&ecirc;n 100 km/h nhưng tốc độ tối ưu của xe khoảng 60-70 km/h, tức ngang với c&aacute;c xe m&aacute;y n&ecirc;n nhiều người t&ograve; m&ograve; kh&ocirc;ng biết chiếc xe điện Trung Quốc c&oacute; được ph&eacute;p chạy v&agrave;o c&aacute;c cao tốc tại Việt Nam hay kh&ocirc;ng.</p>\r\n\r\n<p>Ng&agrave;y&nbsp;29/6/2023, chiếc xe điện&nbsp;Wuling&nbsp;Mini EV đ&atilde;&nbsp;ch&iacute;nh thức được ra mắt với c&aacute;c kh&aacute;ch h&agrave;ng tại Việt Nam, sau 3 năm ra mắt tại qu&ecirc; nh&agrave;. Người ti&ecirc;u d&ugrave;ng c&ograve;n đang rất quan t&acirc;m về sức mạnh của xe điện Mini EV, do v&oacute;c d&aacute;ng n&oacute; qu&aacute; nhỏ b&eacute;. X&eacute;t tr&ecirc;n th&ocirc;ng số kỹ thuật,&nbsp;xe được trang bị một động cơ điện c&oacute; c&ocirc;ng suất 17,4 m&atilde; lực, chỉ mạnh hơn 0,5 m&atilde; lực so với xe tay ga Honda SH150i, thậm ch&iacute;, vận tốc tối ưu của xe khoảng 60-70 km/h, tương đương với tốc độ tối đa của xe m&aacute;y được ph&eacute;p chạy tại c&aacute;c con đường ở Việt Nam.</p>\r\n\r\n<p>Với nhiều người, c&aacute;c th&ocirc;ng số tr&ecirc;n kh&ocirc;ng mấy ấn tượng cho 1 chiếc xe &ocirc; t&ocirc;, thậm ch&iacute;, kh&ocirc;ng &iacute;t người c&ograve;n t&ograve; m&ograve;,&nbsp;Mini EV liệu c&oacute; được ph&eacute;p chạy tr&ecirc;n c&aacute;c cao tốc tại Việt Nam hay kh&ocirc;ng?</p>\r\n\r\n<p><img alt=\"\" src=\"https://img.tinxe.vn/resize/1000x-/2023/06/24/95ywCUPr/inxe-8-d0b8.jpg\" style=\"height:402px; width:720px\" /></p>', '1719372127inxe-8-d0b8.jpg', 1, '2024-06-26 03:22:07', 2, 1),
(10, 'Mercedes-Benz 250SL ngót nghét 60 tuổi khoe dán tại thành phố sương mù của tỉnh Lâm Đồng', 'mercedes-benz-250sl-ngot-nghet-60-tuoi-khoe-dan-tai-thanh-pho-suong-mu-cua-tinh-lam-dong', 'Mercedes-Benz 250SL chính là bản tiền nhiệm của dòng xe Mercedes-Benz 190SL rất nổi tiếng, hiện tại Việt Nam chỉ có đúng 1 chiếc xuất hiện, mang màu bạc, và thường xuyên xuất hiện trong vai trò xe hoa.', '<p>Mercedes-Benz 250SL ch&iacute;nh l&agrave; bản tiền nhiệm của d&ograve;ng xe Mercedes-Benz 190SL rất nổi tiếng, hiện tại Việt Nam chỉ c&oacute; đ&uacute;ng 1 chiếc xuất hiện, mang m&agrave;u bạc, v&agrave; thường xuy&ecirc;n xuất hiện trong vai tr&ograve; xe hoa.</p>\r\n\r\n<p>Số lượng c&aacute;c mẫu xe cổ tại Việt Nam kh&aacute; đa dạng, trong đ&oacute;, ri&ecirc;ng d&ograve;ng xe Mercedes-Benz SL trứ danh c&oacute; 190SL, 250SL, 280SL, 560SL v&agrave; c&ograve;n nhiều h&agrave;ng độc lạ c&ograve;n b&iacute; ẩn, trong số những c&aacute;i t&ecirc;n n&agrave;y, Mercedes-Benz 250SL được cho l&agrave; chỉ c&oacute; đ&uacute;ng 1 chiếc xe xuất hiện tại dải đất h&igrave;nh chữ S n&agrave;y.</p>\r\n\r\n<p>Chiếc xe thể thao mui trần Mercedes-Benz 250SL n&agrave;y thuộc sở hữu của 1 đại gia ở Th&agrave;nh phố Hồ Ch&iacute; Minh, trong thời gian vừa qua, thay v&igrave; để trong garage ngắm, anh lại mang xe ra ngo&agrave;i để kết hợp vừa c&agrave; ph&ecirc;, vừa cho thu&ecirc; chụp ảnh cưới.</p>\r\n\r\n<p><img alt=\"\" src=\"https://img.tinxe.vn/resize/1000x-/2024/06/24/95ywCUPr/448767113-1561948851367239-8494511689778024892-n-8b8e.webp\" style=\"height:386px; width:720px\" /></p>\r\n\r\n<p><img alt=\"\" src=\"https://img.tinxe.vn/resize/1000x-/2024/06/24/95ywCUPr/448800025-3054706317999389-4015212537620114780-n-6b67.webp\" style=\"height:448px; width:720px\" /></p>\r\n\r\n<p>Mới đ&acirc;y, chiếc xe thể thao Mercedes-Benz 250SL n&agrave;y đ&atilde; được mang l&ecirc;n th&agrave;nh phố Đ&agrave; Lạt, tỉnh L&acirc;m Đồng để chụp ảnh. Sự c&oacute; mặt của h&agrave;ng hiếm n&agrave;y, đ&atilde; nhanh ch&oacute;ng thu h&uacute;t sự quan t&acirc;m của kh&aacute;ch tham quan, cũng như c&aacute;c d&acirc;n m&ecirc; xe cổ tại xứ sở ng&agrave;n hoa.</p>\r\n\r\n<p>Mercedes-Benz 250SL ch&iacute;nh l&agrave; bản tiền nhiệm của d&ograve;ng xe Mercedes-Benz 190SL rất nổi tiếng, xe được giới thiệu tại triển l&atilde;m &ocirc; t&ocirc; Geneva năm 1967, để tiếp nối th&agrave;nh c&ocirc;ng của 230SL để lại, nhưng c&ocirc;ng việc sản xuất đ&atilde; bắt đầu v&agrave;o th&aacute;ng 12 năm 1966 v&agrave; kết th&uacute;c v&agrave;o th&aacute;ng 1 năm 1968. Qu&aacute; tr&igrave;nh sản xuất k&eacute;o d&agrave;i một năm ngắn ngủi khiến 250 SL trở th&agrave;nh chiếc xe hiếm nhất trong số những chiếc xe thuộc d&ograve;ng W 113 ra l&ograve;.</p>\r\n\r\n<p><img alt=\"\" src=\"https://img.tinxe.vn/resize/1000x-/2024/06/24/95ywCUPr/448765029-1561948898033901-7816864095757676654-n-abc1.webp\" style=\"height:629px; width:720px\" /></p>', '1719372337448767113-1561948851367239-8494511689778024892-n-8b8e.jpg', 1, '2024-06-26 03:25:37', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `new_car_sales`
--

CREATE TABLE `new_car_sales` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `code_sales` varchar(255) NOT NULL,
  `thumbnail` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `end_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` int(11) NOT NULL,
  `categories_company_id` int(11) DEFAULT NULL,
  `categories_vehicles_id` int(11) DEFAULT NULL,
  `categories_new_id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `new_car_sales`
--

INSERT INTO `new_car_sales` (`id`, `name`, `description`, `code_sales`, `thumbnail`, `created_at`, `end_time`, `status`, `categories_company_id`, `categories_vehicles_id`, `categories_new_id`, `account_id`) VALUES
(24, 'Cần tìm xe Honda civic 2015', 'cần tìm dòng xe dùng để đi lại', '569295', '1719370480honda-civic-thumbnail.jpg', '2024-06-26 09:29:02', '2024-06-24 17:00:00', 2, 8, 1, 1, 11);

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

CREATE TABLE `packages` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `price` varchar(255) NOT NULL,
  `date` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`id`, `name`, `slug`, `description`, `price`, `date`, `status`) VALUES
(4, 'Gói cơ bản', 'goi-co-ban', '<h2>&nbsp;</h2>\r\n\r\n<ul>\r\n	<li><strong>Kiểm Tra Tổng Quan</strong></li>\r\n	<li><strong>Kiểm Tra Lịch Sử</strong></li>\r\n	<li><strong>Đăng Tin Tr&ecirc;n Website</strong></li>\r\n	<li><strong>Tối Ưu SEO</strong></li>\r\n	<li><strong>Hỗ Trợ 24/7</strong></li>\r\n	<li><strong>Chăm S&oacute;c Sau B&aacute;n H&agrave;ng</strong></li>\r\n</ul>\r\n', '3000000', 1, 1),
(5, 'Gói chuyên nghiệp', 'goi-chuyen-nghiep', '<h3>&nbsp;</h3>\r\n\r\n<ul>\r\n	<li><strong>Kiểm Tra Kỹ Thuật Chuy&ecirc;n S&acirc;u</strong></li>\r\n	<li><strong>Ph&acirc;n T&iacute;ch Chi Tiết Lịch Sử Xe</strong></li>\r\n	<li><strong>Chụp Ảnh 360 Độ</strong></li>\r\n	<li><strong>Quay Video Giới Thiệu</strong></li>\r\n	<li><strong>Đăng Tin Đặc Biệt:</strong></li>\r\n	<li><strong>Tối Ưu SEO Chuy&ecirc;n Nghiệp</strong></li>\r\n	<li><strong>Ph&acirc;n T&iacute;ch Thị Trường Chi Tiết</strong></li>\r\n	<li><strong>Hỗ Trợ Đ&agrave;m Ph&aacute;n Chuy&ecirc;n Nghiệp</strong></li>\r\n	<li><strong>Tư Vấn Ph&aacute;p L&yacute;</strong></li>\r\n	<li><strong>Hỗ Trợ Kh&aacute;ch H&agrave;ng Ưu Ti&ecirc;n</strong></li>\r\n	<li><strong>Chăm S&oacute;c Sau B&aacute;n H&agrave;ng</strong></li>\r\n</ul>\r\n\r\n<h3>&nbsp;</h3>\r\n', '7000000', 1, 1),
(6, 'Gói doanh nghiệp', 'goi-doanh-nghiep', '<h3>&nbsp;</h3>\r\n\r\n<ul>\r\n	<li><strong>Tạo T&agrave;i Khoản Doanh Nghiệp</strong></li>\r\n	<li><strong>Quản L&yacute; Sản Phẩm</strong></li>\r\n	<li><strong>Đăng Tin Kh&ocirc;ng Giới Hạn</strong></li>\r\n	<li><strong>Quản L&yacute; Tin Đăng</strong></li>\r\n	<li><strong>Quảng C&aacute;o Tr&ecirc;n Trang Chủ</strong></li>\r\n	<li><strong>Quảng C&aacute;o Tr&ecirc;n Mạng X&atilde; Hội</strong></li>\r\n	<li><strong>B&aacute;o C&aacute;o Hiệu Quả</strong></li>\r\n	<li><strong>Ph&acirc;n T&iacute;ch Xu Hướng Thị Trường</strong></li>\r\n	<li><strong>Hỗ Trợ Ưu Ti&ecirc;n</strong></li>\r\n	<li><strong>Quản L&yacute; Kh&aacute;ch H&agrave;ng</strong></li>\r\n	<li><strong>Đ&agrave;o Tạo Nh&acirc;n Vi&ecirc;n</strong></li>\r\n	<li><strong>Hỗ Trợ Kỹ Thuật</strong></li>\r\n</ul>\r\n', '10000000', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_cars`
--

CREATE TABLE `product_cars` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_slug` varchar(255) NOT NULL,
  `product_price` bigint(20) NOT NULL,
  `product_thumbnail` text NOT NULL,
  `product_content` text NOT NULL,
  `manufacture_year` int(11) NOT NULL,
  `type_gearbox` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `product_status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `created_end` timestamp NULL DEFAULT NULL,
  `categories_company_id` int(11) NOT NULL,
  `city_area_id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `vehicles_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_cars`
--

INSERT INTO `product_cars` (`product_id`, `product_name`, `product_slug`, `product_price`, `product_thumbnail`, `product_content`, `manufacture_year`, `type_gearbox`, `code`, `product_status`, `created_at`, `created_end`, `categories_company_id`, `city_area_id`, `account_id`, `vehicles_id`) VALUES
(72, 'MAZDA 3', 'mazda-3', 650000001, '1719217380mazda-3-thumbnail.jpg', 'BÁN XE MAZDA 3 2018\r\n\r\nThông tin chi tiết:\r\n\r\n- Năm sản xuất: 2018\r\n- Số km đã đi: 60,000 km\r\n- Màu sắc: Trắng\r\n- Tình trạng: Xe không có tai nạn, không ngập nước. Xe được bảo dưỡng định kỳ tại hãng Mazda.\r\n- Động cơ: SkyActiv-G 1.5L, 4 xy-lanh thẳng hàng\r\n- Công suất cực đại: 110 mã lực tại 6,000 vòng/phút\r\n- Mô-men xoắn cực đại: 144 Nm tại 4,000 vòng/phút\r\n- Hộp số: Tự động 6 cấp\r\n- Dẫn động: Cầu trước (FWD)\r\n- Tiêu thụ nhiên liệu: Khoảng 5.9 lít/100 km (đường hỗn hợp)\r\n\r\nTrang bị và tiện nghi:\r\n\r\n- Hệ thống giải trí: Màn hình cảm ứng 7 inch, hỗ trợ Apple CarPlay và Android Auto, hệ thống âm thanh 6 loa.\r\n- An toàn: Hệ thống cảnh báo điểm mù, phanh ABS, hỗ trợ phanh khẩn cấp EBA, cân bằng điện tử DSC.\r\n- Nội thất: Ghế da cao cấp, ghế lái chỉnh điện 6 hướng, điều hòa tự động 1 vùng.\r\n- Ngoại thất: Đèn pha LED, đèn LED ban ngày, mâm xe hợp kim 16 inch.\r\n\r\nLý do bán: Không còn nhu cầu sử dụng, muốn đổi sang xe khác.\r\n\r\nGiá bán: 650 triệu VND (có thương lượng).\r\n\r\nLiên hệ: 0912345678 (Anh Tuấn)\r\n\r\nXe Mazda 3 2018 là lựa chọn tuyệt vời cho những ai muốn sở hữu một chiếc sedan hiện đại, tiết kiệm nhiên liệu và an toàn. Xe đã được chăm sóc kỹ lưỡng và bảo dưỡng định kỳ, đảm bảo hoạt động ổn định và bền bỉ. Hãy liên hệ ngay để xem xe và trải nghiệm trực tiếp!', 2018, '1', '579947', 2, '2024-06-24 08:32:11', '2024-12-19 17:00:00', 20, 57, 11, 1),
(73, 'MITSUBISHI TRITON', 'mitsubishi-triton', 750000000, '1719217810mitsubishi-triton-thumbnail.jpg', 'BÁN XE MITSUBISHI TRITON 2019\r\n\r\nThông tin chi tiết:\r\n\r\n- Năm sản xuất: 2019\r\n- Số km đã đi: 50,000 km\r\n- Màu sắc: Xám\r\n- Tình trạng: Xe không có tai nạn, không ngập nước. Xe còn mới, bảo dưỡng định kỳ tại hãng Mitsubishi.\r\n- Động cơ: 2.4L MIVEC Turbo Diesel, 4 xy-lanh thẳng hàng\r\n- Công suất cực đại: 181 mã lực tại 3,500 vòng/phút\r\n- Mô-men xoắn cực đại: 430 Nm tại 2,500 vòng/phút\r\n- Hộp số: Tự động 6 cấp\r\n- Dẫn động: 2 cầu (4WD)\r\n- Tiêu thụ nhiên liệu: Khoảng 8.5 lít/100 km (đường hỗn hợp)\r\n\r\nTrang bị và tiện nghi:\r\n\r\n- Hệ thống giải trí: Màn hình cảm ứng 7 inch, hỗ trợ Apple CarPlay và Android Auto, hệ thống âm thanh 6 loa.\r\n- An toàn: Hệ thống cảnh báo điểm mù, phanh ABS, hỗ trợ phanh khẩn cấp BA, cân bằng điện tử ASC, hệ thống kiểm soát lực kéo, cảm biến lùi, camera lùi.\r\n- Nội thất: Ghế da cao cấp, ghế lái chỉnh điện 8 hướng, điều hòa tự động 2 vùng, hàng ghế sau gập linh hoạt.\r\n- Ngoại thất: Đèn pha LED, đèn LED ban ngày, mâm xe hợp kim 18 inch, bệ bước chân, nắp thùng sau thể thao.\r\n\r\nLý do bán: Không còn nhu cầu sử dụng, muốn đổi sang xe khác.\r\n\r\nGiá bán: 750 triệu VND (có thương lượng).\r\n\r\nLiên hệ: 0912345678 (Anh Tuấn)\r\n\r\nXe Mitsubishi Triton 2019 là lựa chọn tuyệt vời cho những ai cần một chiếc bán tải mạnh mẽ, đa dụng và tiết kiệm nhiên liệu. Xe đã được chăm sóc kỹ lưỡng và bảo dưỡng định kỳ, đảm bảo hoạt động ổn định và bền bỉ. Hãy liên hệ ngay để xem xe và trải nghiệm trực tiếp!', 2019, '1', '661559', 2, '2024-06-24 12:39:35', '2024-07-06 17:00:00', 22, 62, 12, 2),
(74, 'Mazda CX-5', 'mazda-cx-5', 850000000, '1719228830thumbnail_CX-5.jpg', '<p>&nbsp;</p>\r\n\r\n<p><br />\r\nTh&ocirc;ng tin chi tiết:</p>\r\n\r\n<p>- Năm sản xuất: 2019<br />\r\n- Số km đ&atilde; đi: 45,000 km<br />\r\n- M&agrave;u sắc: Đỏ<br />\r\n- T&igrave;nh trạng: Xe kh&ocirc;ng c&oacute; tai nạn, kh&ocirc;ng ngập nước. Xe c&ograve;n mới, bảo dưỡng định kỳ tại h&atilde;ng Mazda.<br />\r\n- Động cơ: SkyActiv-G 2.0L, 4 xy-lanh thẳng h&agrave;ng<br />\r\n- C&ocirc;ng suất cực đại: 153 m&atilde; lực tại 6,000 v&ograve;ng/ph&uacute;t<br />\r\n- M&ocirc;-men xoắn cực đại: 200 Nm tại 4,000 v&ograve;ng/ph&uacute;t<br />\r\n- Hộp số: Tự động 6 cấp<br />\r\n- Dẫn động: Cầu trước (FWD)<br />\r\n- Ti&ecirc;u thụ nhi&ecirc;n liệu: Khoảng 6.8 l&iacute;t/100 km (đường hỗn hợp)</p>\r\n\r\n<p>Trang bị v&agrave; tiện nghi:</p>\r\n\r\n<p>- Hệ thống giải tr&iacute;: M&agrave;n h&igrave;nh cảm ứng 7 inch, hỗ trợ Apple CarPlay v&agrave; Android Auto, hệ thống &acirc;m thanh Bose 10 loa.<br />\r\n- An to&agrave;n: Hệ thống cảnh b&aacute;o điểm m&ugrave;, cảnh b&aacute;o chệch l&agrave;n đường, phanh khẩn cấp tự động, cảm biến l&ugrave;i, camera 360 độ.<br />\r\n- Nội thất: Ghế da cao cấp, ghế l&aacute;i chỉnh điện 8 hướng, ghế phụ chỉnh điện 4 hướng, điều h&ograve;a tự động 2 v&ugrave;ng.<br />\r\n- Ngoại thất: Đ&egrave;n pha LED, đ&egrave;n LED ban ng&agrave;y, m&acirc;m xe hợp kim 19 inch.</p>\r\n\r\n<p>L&yacute; do b&aacute;n: Kh&ocirc;ng c&ograve;n nhu cầu sử dụng, muốn đổi sang xe kh&aacute;c.</p>\r\n\r\n<p>Gi&aacute; b&aacute;n: 850 triệu VND (c&oacute; thương lượng).</p>\r\n\r\n<p>Li&ecirc;n hệ: 0912345678 (Văn B)</p>\r\n\r\n<p>Xe Mazda CX-5 2019 n&agrave;y l&agrave; lựa chọn ho&agrave;n hảo cho gia đ&igrave;nh hoặc c&aacute; nh&acirc;n muốn sở hữu một chiếc SUV mạnh mẽ, tiện nghi v&agrave; an to&agrave;n. Xe đ&atilde; được chăm s&oacute;c cẩn thận v&agrave; lu&ocirc;n bảo dưỡng định kỳ, đảm bảo hoạt động tốt v&agrave; bền bỉ. H&atilde;y li&ecirc;n hệ ngay để xem xe v&agrave; trải nghiệm trực tiếp!</p>', 2019, '1', '172390', 1, '2024-06-24 11:33:50', NULL, 20, 52, 10, 1),
(75, 'MAZDA CX-30', 'mazda-cx-30', 820000000, '1719228899cx-30-thumbnail.jpg', '<p>B&Aacute;N XE MAZDA CX-30 2020</p>\r\n\r\n<p>Th&ocirc;ng tin chi tiết:</p>\r\n\r\n<p>- Năm sản xuất: 2020<br />\r\n- Số km đ&atilde; đi: 25,000 km<br />\r\n- M&agrave;u sắc: Xanh dương<br />\r\n- T&igrave;nh trạng: Xe kh&ocirc;ng c&oacute; tai nạn, kh&ocirc;ng ngập nước. Xe c&ograve;n mới, bảo dưỡng định kỳ tại h&atilde;ng Mazda.<br />\r\n- Động cơ: SkyActiv-G 2.0L, 4 xy-lanh thẳng h&agrave;ng<br />\r\n- C&ocirc;ng suất cực đại: 155 m&atilde; lực tại 6,000 v&ograve;ng/ph&uacute;t<br />\r\n- M&ocirc;-men xoắn cực đại: 200 Nm tại 4,000 v&ograve;ng/ph&uacute;t<br />\r\n- Hộp số: Tự động 6 cấp<br />\r\n- Dẫn động: Cầu trước (FWD)<br />\r\n- Ti&ecirc;u thụ nhi&ecirc;n liệu: Khoảng 6.5 l&iacute;t/100 km (đường hỗn hợp)</p>\r\n\r\n<p>Trang bị v&agrave; tiện nghi:</p>\r\n\r\n<p>- Hệ thống giải tr&iacute;: M&agrave;n h&igrave;nh cảm ứng 8.8 inch, hỗ trợ Apple CarPlay v&agrave; Android Auto, hệ thống &acirc;m thanh 8 loa.<br />\r\n- An to&agrave;n: Hệ thống cảnh b&aacute;o điểm m&ugrave;, cảnh b&aacute;o chệch l&agrave;n đường, phanh khẩn cấp tự động, cảm biến l&ugrave;i, camera 360 độ.<br />\r\n- Nội thất: Ghế da cao cấp, ghế l&aacute;i chỉnh điện 8 hướng, điều h&ograve;a tự động 2 v&ugrave;ng.<br />\r\n- Ngoại thất: Đ&egrave;n pha LED, đ&egrave;n LED ban ng&agrave;y, m&acirc;m xe hợp kim 18 inch.</p>\r\n\r\n<p>L&yacute; do b&aacute;n: Kh&ocirc;ng c&ograve;n nhu cầu sử dụng, muốn đổi sang xe kh&aacute;c.</p>\r\n\r\n<p>Gi&aacute; b&aacute;n: 820 triệu VND (c&oacute; thương lượng).</p>\r\n\r\n<p>Li&ecirc;n hệ: 0912345678 (Anh Tuấn)</p>\r\n\r\n<p>Xe Mazda CX-30 2020 l&agrave; sự lựa chọn ho&agrave;n hảo cho những ai muốn sở hữu một chiếc SUV nhỏ gọn, hiện đại v&agrave; an to&agrave;n. Xe đ&atilde; được chăm s&oacute;c kỹ lưỡng v&agrave; bảo dưỡng định kỳ, đảm bảo hoạt động ổn định v&agrave; bền bỉ. H&atilde;y li&ecirc;n hệ ngay để xem xe v&agrave; trải nghiệm trực tiếp!</p>', 2020, '2', '2977993', 1, '2024-06-24 11:34:59', NULL, 20, 51, 10, 2),
(76, 'MAZDA CX-30', 'mazda-cx-30', 500000000, '1719228970cx-30-thumbnail.jpg', '<p>B&Aacute;N XE MAZDA CX-30 2017</p>\r\n\r\n<p>Th&ocirc;ng tin chi tiết:</p>\r\n\r\n<p>- Năm sản xuất: 2020<br />\r\n- Số km đ&atilde; đi: 25,000 km<br />\r\n- M&agrave;u sắc: Xanh dương<br />\r\n- T&igrave;nh trạng: Xe kh&ocirc;ng c&oacute; tai nạn, kh&ocirc;ng ngập nước. Xe c&ograve;n mới, bảo dưỡng định kỳ tại h&atilde;ng Mazda.<br />\r\n- Động cơ: SkyActiv-G 2.0L, 4 xy-lanh thẳng h&agrave;ng<br />\r\n- C&ocirc;ng suất cực đại: 155 m&atilde; lực tại 6,000 v&ograve;ng/ph&uacute;t<br />\r\n- M&ocirc;-men xoắn cực đại: 200 Nm tại 4,000 v&ograve;ng/ph&uacute;t<br />\r\n- Hộp số: Tự động 6 cấp<br />\r\n- Dẫn động: Cầu trước (FWD)<br />\r\n- Ti&ecirc;u thụ nhi&ecirc;n liệu: Khoảng 6.5 l&iacute;t/100 km (đường hỗn hợp)</p>\r\n\r\n<p>Trang bị v&agrave; tiện nghi:</p>\r\n\r\n<p>- Hệ thống giải tr&iacute;: M&agrave;n h&igrave;nh cảm ứng 8.8 inch, hỗ trợ Apple CarPlay v&agrave; Android Auto, hệ thống &acirc;m thanh 8 loa.<br />\r\n- An to&agrave;n: Hệ thống cảnh b&aacute;o điểm m&ugrave;, cảnh b&aacute;o chệch l&agrave;n đường, phanh khẩn cấp tự động, cảm biến l&ugrave;i, camera 360 độ.<br />\r\n- Nội thất: Ghế da cao cấp, ghế l&aacute;i chỉnh điện 8 hướng, điều h&ograve;a tự động 2 v&ugrave;ng.<br />\r\n- Ngoại thất: Đ&egrave;n pha LED, đ&egrave;n LED ban ng&agrave;y, m&acirc;m xe hợp kim 18 inch.</p>\r\n\r\n<p>L&yacute; do b&aacute;n: Kh&ocirc;ng c&ograve;n nhu cầu sử dụng, muốn đổi sang xe kh&aacute;c.</p>\r\n\r\n<p>Gi&aacute; b&aacute;n: 50 triệu VND (c&oacute; thương lượng).</p>\r\n\r\n<p>Li&ecirc;n hệ: 0912345678 (Văn B)</p>\r\n\r\n<p>Xe Mazda CX-30 2020 l&agrave; sự lựa chọn ho&agrave;n hảo cho những ai muốn sở hữu một chiếc SUV nhỏ gọn, hiện đại v&agrave; an to&agrave;n. Xe đ&atilde; được chăm s&oacute;c kỹ lưỡng v&agrave; bảo dưỡng định kỳ, đảm bảo hoạt động ổn định v&agrave; bền bỉ. H&atilde;y li&ecirc;n hệ ngay để xem xe v&agrave; trải nghiệm trực tiếp!</p>', 2017, '3', '9667909', 1, '2024-06-24 11:36:10', NULL, 20, 40, 10, 3),
(77, 'MAZDA 3', 'mazda-3', 650000000, '1719229041mazda-3-thumbnail.jpg', '<p>B&Aacute;N XE MAZDA 3 2018</p>\r\n\r\n<p>Th&ocirc;ng tin chi tiết:</p>\r\n\r\n<p>- Năm sản xuất: 2018<br />\r\n- Số km đ&atilde; đi: 60,000 km<br />\r\n- M&agrave;u sắc: Trắng<br />\r\n- T&igrave;nh trạng: Xe kh&ocirc;ng c&oacute; tai nạn, kh&ocirc;ng ngập nước. Xe được bảo dưỡng định kỳ tại h&atilde;ng Mazda.<br />\r\n- Động cơ: SkyActiv-G 1.5L, 4 xy-lanh thẳng h&agrave;ng<br />\r\n- C&ocirc;ng suất cực đại: 110 m&atilde; lực tại 6,000 v&ograve;ng/ph&uacute;t<br />\r\n- M&ocirc;-men xoắn cực đại: 144 Nm tại 4,000 v&ograve;ng/ph&uacute;t<br />\r\n- Hộp số: Tự động 6 cấp<br />\r\n- Dẫn động: Cầu trước (FWD)<br />\r\n- Ti&ecirc;u thụ nhi&ecirc;n liệu: Khoảng 5.9 l&iacute;t/100 km (đường hỗn hợp)</p>\r\n\r\n<p>Trang bị v&agrave; tiện nghi:</p>\r\n\r\n<p>- Hệ thống giải tr&iacute;: M&agrave;n h&igrave;nh cảm ứng 7 inch, hỗ trợ Apple CarPlay v&agrave; Android Auto, hệ thống &acirc;m thanh 6 loa.<br />\r\n- An to&agrave;n: Hệ thống cảnh b&aacute;o điểm m&ugrave;, phanh ABS, hỗ trợ phanh khẩn cấp EBA, c&acirc;n bằng điện tử DSC.<br />\r\n- Nội thất: Ghế da cao cấp, ghế l&aacute;i chỉnh điện 6 hướng, điều h&ograve;a tự động 1 v&ugrave;ng.<br />\r\n- Ngoại thất: Đ&egrave;n pha LED, đ&egrave;n LED ban ng&agrave;y, m&acirc;m xe hợp kim 16 inch.</p>\r\n\r\n<p>L&yacute; do b&aacute;n: Kh&ocirc;ng c&ograve;n nhu cầu sử dụng, muốn đổi sang xe kh&aacute;c.</p>\r\n\r\n<p>Gi&aacute; b&aacute;n: 650 triệu VND (c&oacute; thương lượng).</p>\r\n\r\n<p>Li&ecirc;n hệ: 0912345678 (Văn B)</p>\r\n\r\n<p>Xe Mazda 3 2018 l&agrave; lựa chọn tuyệt vời cho những ai muốn sở hữu một chiếc sedan hiện đại, tiết kiệm nhi&ecirc;n liệu v&agrave; an to&agrave;n. Xe đ&atilde; được chăm s&oacute;c kỹ lưỡng v&agrave; bảo dưỡng định kỳ, đảm bảo hoạt động ổn định v&agrave; bền bỉ. H&atilde;y li&ecirc;n hệ ngay để xem xe v&agrave; trải nghiệm trực tiếp!</p>', 2018, '4', '5778873', 1, '2024-06-24 11:37:21', NULL, 20, 52, 10, 1),
(78, 'MAZDA 6', 'mazda-6', 950000000, '1719229091mazda-6-thumbnail.jpg', '<p>B&Aacute;N XE MAZDA 6 2019</p>\r\n\r\n<p>Th&ocirc;ng tin chi tiết:</p>\r\n\r\n<p>- Năm sản xuất: 2019<br />\r\n- Số km đ&atilde; đi: 35,000 km<br />\r\n- M&agrave;u sắc: Đen<br />\r\n- T&igrave;nh trạng: Xe kh&ocirc;ng c&oacute; tai nạn, kh&ocirc;ng ngập nước. Xe c&ograve;n mới, bảo dưỡng định kỳ tại h&atilde;ng Mazda.<br />\r\n- Động cơ: SkyActiv-G 2.5L, 4 xy-lanh thẳng h&agrave;ng<br />\r\n- C&ocirc;ng suất cực đại: 188 m&atilde; lực tại 6,000 v&ograve;ng/ph&uacute;t<br />\r\n- M&ocirc;-men xoắn cực đại: 252 Nm tại 4,000 v&ograve;ng/ph&uacute;t<br />\r\n- Hộp số: Tự động 6 cấp<br />\r\n- Dẫn động: Cầu trước (FWD)<br />\r\n- Ti&ecirc;u thụ nhi&ecirc;n liệu: Khoảng 7.5 l&iacute;t/100 km (đường hỗn hợp)</p>\r\n\r\n<p>Trang bị v&agrave; tiện nghi:</p>\r\n\r\n<p>- Hệ thống giải tr&iacute;: M&agrave;n h&igrave;nh cảm ứng 8 inch, hỗ trợ Apple CarPlay v&agrave; Android Auto, hệ thống &acirc;m thanh Bose 11 loa.<br />\r\n- An to&agrave;n: Hệ thống cảnh b&aacute;o điểm m&ugrave;, cảnh b&aacute;o chệch l&agrave;n đường, phanh khẩn cấp tự động, cảm biến l&ugrave;i, camera 360 độ.<br />\r\n- Nội thất: Ghế da cao cấp, ghế l&aacute;i chỉnh điện 10 hướng, ghế phụ chỉnh điện 6 hướng, điều h&ograve;a tự động 2 v&ugrave;ng.<br />\r\n- Ngoại thất: Đ&egrave;n pha LED, đ&egrave;n LED ban ng&agrave;y, m&acirc;m xe hợp kim 19 inch.</p>\r\n\r\n<p>L&yacute; do b&aacute;n: Kh&ocirc;ng c&ograve;n nhu cầu sử dụng, muốn đổi sang xe kh&aacute;c.</p>\r\n\r\n<p>Gi&aacute; b&aacute;n: 950 triệu VND (c&oacute; thương lượng).</p>\r\n\r\n<p>Li&ecirc;n hệ: 0912345678 (Anh Tuấn)</p>\r\n\r\n<p>Xe Mazda 6 2019 l&agrave; sự kết hợp ho&agrave;n hảo giữa hiệu suất mạnh mẽ, thiết kế sang trọng v&agrave; c&aacute;c c&ocirc;ng nghệ an to&agrave;n hiện đại. Xe đ&atilde; được chăm s&oacute;c cẩn thận v&agrave; bảo dưỡng định kỳ, đảm bảo hoạt động tốt v&agrave; bền bỉ. H&atilde;y li&ecirc;n hệ ngay để xem xe v&agrave; trải nghiệm trực tiếp!</p>', 2019, '1', '3262974', 1, '2024-06-24 11:38:11', NULL, 20, 16, 10, 2),
(79, 'HONDA CITY', 'honda-city', 580000000, '1719232734honda-city-thumbnail.jpg', 'BÁN XE HONDA CITY 2020\r\n\r\nThông tin chi tiết:\r\n\r\n- Năm sản xuất: 2020\r\n- Số km đã đi: 30,000 km\r\n- Màu sắc: Bạc\r\n- Tình trạng: Xe không có tai nạn, không ngập nước. Xe còn mới, bảo dưỡng định kỳ tại hãng Honda.\r\n- Động cơ: 1.5L i-VTEC, 4 xy-lanh thẳng hàng\r\n- Công suất cực đại: 118 mã lực tại 6,600 vòng/phút\r\n- Mô-men xoắn cực đại: 145 Nm tại 4,600 vòng/phút\r\n- Hộp số: Tự động vô cấp CVT\r\n- Dẫn động: Cầu trước (FWD)\r\n- Tiêu thụ nhiên liệu: Khoảng 5.8 lít/100 km (đường hỗn hợp)\r\n\r\nTrang bị và tiện nghi:\r\n\r\n- Hệ thống giải trí: Màn hình cảm ứng 8 inch, hỗ trợ Apple CarPlay và Android Auto, hệ thống âm thanh 8 loa.\r\n- An toàn: Hệ thống cảnh báo điểm mù, phanh ABS, hỗ trợ phanh khẩn cấp BA, cân bằng điện tử VSA, túi khí đôi trước.\r\n- Nội thất: Ghế da cao cấp, ghế lái chỉnh điện 6 hướng, điều hòa tự động 1 vùng.\r\n- Ngoại thất: Đèn pha LED, đèn LED ban ngày, mâm xe hợp kim 16 inch.\r\n\r\nLý do bán: Không còn nhu cầu sử dụng, muốn đổi sang xe khác.\r\n\r\nGiá bán: 580 triệu VND (có thương lượng).\r\n\r\nLiên hệ: 0912345678 (Anh Tuấn)\r\n\r\nXe Honda City 2020 là lựa chọn lý tưởng cho những ai muốn sở hữu một chiếc sedan nhỏ gọn, tiết kiệm nhiên liệu và đáng tin cậy. Xe đã được chăm sóc cẩn thận và bảo dưỡng định kỳ, đảm bảo hoạt động ổn định và bền bỉ. Hãy liên hệ ngay để xem xe và trải nghiệm trực tiếp!', 2020, '2', '294239', 2, '2024-06-24 12:39:21', '2024-12-19 17:00:00', 8, 64, 11, 2);

-- --------------------------------------------------------

--
-- Table structure for table `register_packages`
--

CREATE TABLE `register_packages` (
  `id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `package_id` int(11) NOT NULL,
  `start_time` date NOT NULL,
  `end_time` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `register_packages`
--

INSERT INTO `register_packages` (`id`, `account_id`, `package_id`, `start_time`, `end_time`, `created_at`, `status`) VALUES
(9, 9, 6, '0000-00-00', '0000-00-00', '2024-06-24 04:16:15', 1),
(10, 10, 6, '2024-06-24', '2024-07-05', '2024-06-24 07:35:45', 2);

-- --------------------------------------------------------

--
-- Table structure for table `vehicles`
--

CREATE TABLE `vehicles` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `vehicles`
--

INSERT INTO `vehicles` (`id`, `name`, `slug`, `status`) VALUES
(1, 'Sedan', 'sedan', 1),
(2, 'hatchback', 'hatchback', 1),
(3, 'suv', 'suv', 1),
(4, 'crossover', 'crossover', 1),
(5, 'MPV / Minivan', 'mpv-minivan', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`),
  ADD KEY `account_id` (`account_id`);

--
-- Indexes for table `categories_company`
--
ALTER TABLE `categories_company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories_news`
--
ALTER TABLE `categories_news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `citys`
--
ALTER TABLE `citys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `QK_account_comment` (`account_id`),
  ADD KEY `QK_product_comment` (`product_car_id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `QDK_id` (`account_id`),
  ADD KEY `QDK_product` (`product_id`);

--
-- Indexes for table `library_img`
--
ALTER TABLE `library_img`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`),
  ADD KEY `account_id` (`account_id`),
  ADD KEY `categories_news_id` (`categories_news_id`);

--
-- Indexes for table `new_car_sales`
--
ALTER TABLE `new_car_sales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `account_id` (`account_id`),
  ADD KEY `categories_sale_id` (`categories_new_id`);

--
-- Indexes for table `packages`
--
ALTER TABLE `packages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_cars`
--
ALTER TABLE `product_cars`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `categories_company_id` (`categories_company_id`),
  ADD KEY `account_id` (`account_id`),
  ADD KEY `city_area_id` (`city_area_id`),
  ADD KEY `product_cars_ibfk_3` (`vehicles_id`);

--
-- Indexes for table `register_packages`
--
ALTER TABLE `register_packages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `package_id` (`package_id`),
  ADD KEY `account_id` (`account_id`);

--
-- Indexes for table `vehicles`
--
ALTER TABLE `vehicles`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `categories_company`
--
ALTER TABLE `categories_company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `categories_news`
--
ALTER TABLE `categories_news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `citys`
--
ALTER TABLE `citys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `library_img`
--
ALTER TABLE `library_img`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=148;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `new_car_sales`
--
ALTER TABLE `new_car_sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `product_cars`
--
ALTER TABLE `product_cars`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `register_packages`
--
ALTER TABLE `register_packages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `vehicles`
--
ALTER TABLE `vehicles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `banner`
--
ALTER TABLE `banner`
  ADD CONSTRAINT `banner_ibfk_1` FOREIGN KEY (`account_id`) REFERENCES `account` (`id`);

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `QK_account_comment` FOREIGN KEY (`account_id`) REFERENCES `account` (`id`),
  ADD CONSTRAINT `QK_product_comment` FOREIGN KEY (`product_car_id`) REFERENCES `product_cars` (`product_id`);

--
-- Constraints for table `contacts`
--
ALTER TABLE `contacts`
  ADD CONSTRAINT `QDK_id` FOREIGN KEY (`account_id`) REFERENCES `account` (`id`),
  ADD CONSTRAINT `QDK_product` FOREIGN KEY (`product_id`) REFERENCES `product_cars` (`product_id`);

--
-- Constraints for table `library_img`
--
ALTER TABLE `library_img`
  ADD CONSTRAINT `library_img_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product_cars` (`product_id`);

--
-- Constraints for table `news`
--
ALTER TABLE `news`
  ADD CONSTRAINT `news_ibfk_1` FOREIGN KEY (`account_id`) REFERENCES `account` (`id`),
  ADD CONSTRAINT `news_ibfk_2` FOREIGN KEY (`categories_news_id`) REFERENCES `categories_news` (`id`);

--
-- Constraints for table `new_car_sales`
--
ALTER TABLE `new_car_sales`
  ADD CONSTRAINT `new_car_sales_ibfk_1` FOREIGN KEY (`account_id`) REFERENCES `account` (`id`),
  ADD CONSTRAINT `new_car_sales_ibfk_2` FOREIGN KEY (`categories_new_id`) REFERENCES `categories_news` (`id`);

--
-- Constraints for table `product_cars`
--
ALTER TABLE `product_cars`
  ADD CONSTRAINT `product_cars_ibfk_1` FOREIGN KEY (`categories_company_id`) REFERENCES `categories_company` (`id`),
  ADD CONSTRAINT `product_cars_ibfk_2` FOREIGN KEY (`account_id`) REFERENCES `account` (`id`),
  ADD CONSTRAINT `product_cars_ibfk_3` FOREIGN KEY (`vehicles_id`) REFERENCES `vehicles` (`id`),
  ADD CONSTRAINT `product_cars_ibfk_4` FOREIGN KEY (`city_area_id`) REFERENCES `citys` (`id`);

--
-- Constraints for table `register_packages`
--
ALTER TABLE `register_packages`
  ADD CONSTRAINT `register_packages_ibfk_1` FOREIGN KEY (`package_id`) REFERENCES `packages` (`id`),
  ADD CONSTRAINT `register_packages_ibfk_2` FOREIGN KEY (`account_id`) REFERENCES `account` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
