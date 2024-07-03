-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 15, 2024 at 01:24 PM
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
(1, 'Kim Dương Tuấn', 'admin', 'admin@gmail.com', '0911096648', 'sdsasdadasd', 'c4ca4238a0b923820dcc509a6f75849b', '2024-04-26 08:57:32', '', 2, 0, 0),
(3, 'Kim Dương Thành', 'Honda Salon', 'Kimtun@gmail.com', '0911096648', 'asdsdad', '202cb962ac59075b964b07152d234b70', '2024-04-29 07:45:56', '1714126125logo_honda.png', 1, 1, 2),
(4, 'Nguyễn Văn AX', NULL, 'user@gmail.com', '0931084095', 'Châu thành, Trà Vinh', '202cb962ac59075b964b07152d234b70', '2024-04-26 10:50:44', '', 0, 1, 0);

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

-- --------------------------------------------------------

--
-- Table structure for table `categories_company`
--

CREATE TABLE `categories_company` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `thumbnail` text NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories_company`
--

INSERT INTO `categories_company` (`id`, `name`, `slug`, `thumbnail`, `status`) VALUES
(1, 'Honda', 'honda', '', 1),
(2, 'Suzuki', 'suzuki', '1714101798hinh-anh-xe-o-to_1.jpg', 1),
(3, 'Mazda', 'mazda', '1714101790hinh-anh-xe-o-to_1.jpg', 1),
(4, 'maserati', 'maserati', '1714047601hinh-anh-xe-o-to_1.jpg', 1);

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
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `citys`
--

CREATE TABLE `citys` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `citys`
--

INSERT INTO `citys` (`id`, `name`, `slug`, `status`) VALUES
(1, 'Trà Vinh', 'tra-vinh', 1),
(4, 'Cà mau', 'ca-mau', 1),
(5, 'Hà Nội', 'ha-noi', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `fullname`, `email`, `phone`, `content`) VALUES
(1, 'Kim Dương Tuấn', 'Trungtam@gmail.com', '0911096648', 'sadasdsad'),
(2, 'Nguyễn Văn B', 'admin@gmail.com', '0364202648', 'asdasdsa');

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
(20, '1714195505_Hi-nh-4.jpg', 12),
(21, '1714195505_Hi-nh-5.jpg', 12),
(22, '1714195505_Hi-nh-6.jpg', 12),
(23, '1714195505_No-i-tha-t-1.jpg', 12),
(24, '1714199145_Mazda3-2020-VnE-0062-1311-1573-6225-9096-1573621053.jpg', 13),
(25, '1714199145_Mazda3-2020-VnE-0065.jpg', 13),
(26, '1714199145_Mazda3-2020-VnE-9945.jpg', 13),
(27, '1714199145_Mazda3-2020-VnE-9954-9735-1573-1992-2091-1573621051.jpg', 13),
(28, '1714199145_Mazda3-2020-VnE-9970-2981-1573-8293-9286-1573621052.jpg', 13),
(29, '1714199145_Mazda3-2021-VnE-0060.jpg', 13),
(30, '1714205986_Mazda3-2020-VnE-9954-9735-1573-1992-2091-1573621051.jpg', 14),
(31, '1714205986_Mazda3-2021-VnE-0060.jpg', 14),
(32, '1714205986_Mazda32020VnE993047211573621051jpg-1631963909.jpg', 14);

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
  `categories_news_id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `new_car_sales`
--

CREATE TABLE `new_car_sales` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `code_sales` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `categories_company_id` int(11) DEFAULT NULL,
  `categories_vehicles_id` int(11) DEFAULT NULL,
  `categories_sale_id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, 'Gói HOT', 'goi-hot', '<ul>\r\n	<li><em><strong>Tin sản phẩm được đưa l&ecirc;n sản phẩm HOT</strong></em></li>\r\n	<li><em><strong>Được hỗ trợ 24/7</strong></em></li>\r\n	<li><em><strong>Tin sản phẩm được duyệt nhanh nhất</strong></em></li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n', '500000', 1, 1),
(2, 'Gói Premium', 'goi-premium', '<ul>\r\n	<li><em><strong>Được hỗ trợ 24/7</strong></em></li>\r\n	<li><em><strong>Tin sản phẩm đăng b&aacute;n được duyệt nhanh nhất</strong></em></li>\r\n	<li><em><strong>Đưa tin th&agrave;nh sản phẩm HOT</strong></em></li>\r\n	<li><em><strong>Marketing tr&ecirc;n Facebook, youtube,...</strong></em></li>\r\n</ul>\r\n', '2000000', 1, 1),
(3, 'Gói Doanh nghiệp', 'goi-doanh-nghiep', '<ul>\r\n	<li><em><strong>Doanh nghiệp được hoạt động tr&ecirc;n hệ thống</strong></em></li>\r\n	<li><em><strong>Đăng b&agrave;i kh&ocirc;ng cần duyệt</strong></em></li>\r\n	<li><em><strong>Hỗ trợ 24/7</strong></em></li>\r\n	<li><em><strong>Đăng c&aacute;c b&agrave;i tin tức về doanh nghiệp</strong></em></li>\r\n</ul>\r\n', '8000000', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `product_cars`
--

CREATE TABLE `product_cars` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_slug` varchar(255) NOT NULL,
  `product_price` varchar(255) NOT NULL,
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
(1, 'Honda CS5', 'honda-cs5', '600000000', '1713947688hinh-anh-xe-o-to_1.jpg', '<p>asdasdada</p>', 2021, '3', '7626221', 3, '2024-04-27 05:38:55', NULL, 3, 5, 3, 3),
(12, 'Mazda CX-5', 'mazda-cx-5', '800000000', '1714195505Hinh1jpg-1688811842.jpg', '<p>d&ograve;ng xe mazda được sản xuất , m&agrave;u trắng</p>\r\n\r\n<p>Số odo: 10000km</p>', 2020, '1', '4573395', 3, '2024-04-27 05:38:58', NULL, 3, 1, 3, 2),
(13, 'Mazda 3', 'mazda-3', '575000000', '1714199145Mazda32020VnE993047211573621051jpg-1631963909.jpg', '<p>asdasdsdasd</p>', 2021, '1', '5426703', 1, '2024-04-27 06:25:45', NULL, 3, 4, 3, 1),
(14, 'Mitsubishi Xpander', 'mitsubishi-xpander', '560000000', '1714205986Mazda3-2020-VnE-9970-2981-1573-8293-9286-1573621052.jpg', '<p>saddsdd</p>', 2024, '2', '5862147', 1, '2024-04-27 08:19:46', NULL, 2, 1, 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `register_packages`
--

CREATE TABLE `register_packages` (
  `id` int(11) NOT NULL,
  `account_id` int(11) NOT NULL,
  `package_id` int(11) NOT NULL,
  `start_time` varchar(255) NOT NULL,
  `end_time` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `register_packages`
--

INSERT INTO `register_packages` (`id`, `account_id`, `package_id`, `start_time`, `end_time`, `created_at`, `status`) VALUES
(1, 3, 2, '', '', '2024-05-04 12:09:06', 1),
(2, 3, 3, '', '', '2024-05-04 12:09:48', 1),
(3, 3, 2, '', '', '2024-05-04 12:10:14', 1);

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
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`),
  ADD KEY `account_id` (`account_id`);

--
-- Indexes for table `citys`
--
ALTER TABLE `citys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

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
  ADD KEY `categories_sale_id` (`categories_sale_id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categories_company`
--
ALTER TABLE `categories_company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `categories_news`
--
ALTER TABLE `categories_news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `citys`
--
ALTER TABLE `citys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `library_img`
--
ALTER TABLE `library_img`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `new_car_sales`
--
ALTER TABLE `new_car_sales`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `packages`
--
ALTER TABLE `packages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product_cars`
--
ALTER TABLE `product_cars`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `register_packages`
--
ALTER TABLE `register_packages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
-- Constraints for table `chat`
--
ALTER TABLE `chat`
  ADD CONSTRAINT `chat_ibfk_1` FOREIGN KEY (`account_id`) REFERENCES `account` (`id`);

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
  ADD CONSTRAINT `new_car_sales_ibfk_2` FOREIGN KEY (`categories_sale_id`) REFERENCES `categories_news` (`id`);

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
