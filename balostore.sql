-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2024 at 09:33 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `balostore`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `create_at` datetime NOT NULL,
  `update_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `fullname`, `password`, `email`, `phone`, `create_at`, `update_at`) VALUES
(1, 'thevinh', 'Lâm Thế Vinh', '$2y$10$lxzXkbERPgNbnyZZik8AJuH4zBFAHjFlZNpem.CB4vKJk3y847G4G', 'vinh2002@gmail.com', '0933210233', '2024-11-15 16:14:13', '2024-11-15 16:14:13'),
(2, 'ngochuy', 'Phạm Ngọc Huy', '$2y$10$1C2/BXCOm78Jvv7ys.pkaechkpKo3CEYZW0C8zCWrqMmhPboCqgEy', 'huy2002@gmail.com', '0382999364', '2024-11-15 16:15:44', '2024-11-15 16:15:44');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `brand_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brand_name`) VALUES
(1, ' Natoly'),
(2, 'Mikkor'),
(3, 'Kmore'),
(4, 'Parkland'),
(5, 'Sakos');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `cate_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `cate_name`) VALUES
(1, ' Túi du lịck'),
(2, 'Balo thể thao'),
(3, 'Balo thời trang'),
(4, 'Túi thể thao'),
(5, 'Balo du lịch'),
(6, 'Túi đeo chéo'),
(7, 'Túi da');

-- --------------------------------------------------------

--
-- Table structure for table `colors`
--

CREATE TABLE `colors` (
  `id` int(11) NOT NULL,
  `color_name` varchar(255) NOT NULL,
  `code` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `colors`
--

INSERT INTO `colors` (`id`, `color_name`, `code`) VALUES
(1, 'Đỏ', '#FF0000'),
(2, 'Xanh lá cây', '#008000'),
(3, 'Xanh dương', '#0000FF'),
(4, 'Vàng', '#FFFF00'),
(5, 'Cam', '#FFA500'),
(6, 'Tím', '#800080'),
(7, 'Hồng', '#FFC0CB'),
(8, 'Nâu', '#A52A2A'),
(9, 'Trắng', '#FFFFFF'),
(10, 'Đen', '#000000'),
(11, 'Xám', '#808080');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` mediumtext NOT NULL,
  `create_at` datetime NOT NULL,
  `update_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `password`, `phone`, `email`, `address`, `create_at`, `update_at`) VALUES
(1, 'Nguyễn Văn A', '123456', '083838388', 'anguyen@gmail.com', 'Long An', '2024-11-13 16:58:33', '2024-11-13 16:58:33'),
(2, 'Nguyễn Văn B', '123456', '0835207276', 'bnguyen@gmail.com', 'Cần Thơ', '2024-11-14 06:58:18', '2024-11-14 06:58:18'),
(3, 'Trần Minh C', '123456', '0835207275', 'minhc@gmail.com', 'TP.HCM', '2024-11-20 15:20:53', '2024-11-20 15:20:53'),
(4, 'Đặng Thị D', '123456', '0903611455', 'thid@gmail.com', 'Tiền Giang', '2024-11-20 15:20:53', '2024-11-20 15:20:53'),
(5, 'Đặng Văn E', '123456', ' 0393503350', 'evan@gmail.com', 'Tp.HCM', '2024-10-16 00:37:20', '2024-10-16 00:37:20'),
(6, 'Nguyễn Thị V', '123456', '0933210235', 'vnguyen@gmail.com', 'Đồng Nai', '2024-09-03 00:40:21', '2024-09-03 00:40:24'),
(7, 'anh Hanh', '$2y$10$VDXg0bVyHXZr2gmxz8CSwuWsjSljouObJAkMOX1eymZXyExb4JiSe', '0904124298', 'anha@gmail.com', '', '2024-12-01 17:08:56', '2024-12-01 17:08:56'),
(8, 'Phạm Ngọc Huy', '$2y$10$F80f19wqGXtaxEsreUECNukdrg5SEBJyypHvHG/VdGptHMnKCaidq', '0915688432', 'huyksks258@gmail.com', '', '2024-12-02 00:54:14', '2024-12-02 00:54:14');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `color_id` int(11) NOT NULL,
  `path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `product_id`, `color_id`, `path`) VALUES
(1, 1, 1, 'img1'),
(2, 1, 1, 'img2');

-- --------------------------------------------------------

--
-- Table structure for table `import_detail_orders`
--

CREATE TABLE `import_detail_orders` (
  `imporder_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `color_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `import_orders`
--

CREATE TABLE `import_orders` (
  `id` int(11) NOT NULL,
  `code` varchar(10) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `create_at` datetime NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `total` double NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `import_orders`
--

INSERT INTO `import_orders` (`id`, `code`, `admin_id`, `create_at`, `supplier_id`, `total`, `status`) VALUES
(1, 'wetfgd', 2, '2024-11-26 18:22:56', 1, 1000000, 1),
(2, 'teddge', 2, '2024-11-26 18:23:28', 2, 1200000, 1),
(3, 'fsddka', 1, '2024-11-26 18:23:28', 4, 2000000, 1),
(4, 'hfsdkj', 1, '2024-11-26 18:24:50', 3, 1500000, 1),
(5, 'oidsus', 1, '2024-11-26 18:25:30', 1, 2000000, 1),
(6, 'ladjge', 2, '2024-11-26 18:25:30', 4, 3000000, 1),
(7, '#ffhff', 2, '2024-12-02 06:05:00', 1, 1500000, 1),
(8, ' #1dfa', 2, '2024-12-02 06:33:00', 2, 2100000, 1);

-- --------------------------------------------------------

--
-- Table structure for table `login_token`
--

CREATE TABLE `login_token` (
  `tokenID` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `create_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login_token`
--

INSERT INTO `login_token` (`tokenID`, `customer_id`, `token`, `create_at`) VALUES
(1, 7, '288d9d674f394d7fa390948714b1d1d967b42b74', '2024-12-01 17:09:13'),
(2, 8, 'd61620fc493e495039a338c4f4095624eabb9108', '2024-12-02 00:54:23');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `code` varchar(10) NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `customer_name` varchar(255) DEFAULT NULL,
  `address` mediumtext NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `total_price` double NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `payment` varchar(255) NOT NULL,
  `note` varchar(255) DEFAULT NULL,
  `create_at` datetime DEFAULT NULL,
  `update_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `code`, `customer_id`, `customer_name`, `address`, `phone`, `email`, `total_price`, `status`, `payment`, `note`, `create_at`, `update_at`) VALUES
(9, '534486', NULL, 'Pham Ngoc Huy', '65 huynh thuc khang', '0915688432', 'huyksks258@gmail.com', 0, 1, 'COD', 'balo xinh dep', '2024-12-02 15:06:17', NULL),
(10, '775793', NULL, 'Pham Ngoc Huy', '65 huynh thuc khang', '0915688432', 'huyksks258@gmail.com', 0, 1, 'COD', 'balo xinh dep', '2024-12-02 15:09:25', NULL),
(11, '237748', NULL, 'Pham Ngoc Huy', '65 huynh thuc khang', '0915688432', 'huyksks258@gmail.com', 0, 1, 'COD', 'balo xinh dep', '2024-12-02 15:16:29', NULL),
(12, '488116', NULL, 'Pham Ngoc Huy', '65 huynh thuc khang', '0915688432', 'huyksks258@gmail.com', 0, 1, 'COD', 'balo xinh dep', '2024-12-02 15:16:42', NULL),
(13, '830655', NULL, 'Pham Ngoc Huy', '65 huynh thuc khang', '0915688432', 'huyksks258@gmail.com', 0, 1, 'COD', 'balo xinh dep', '2024-12-02 15:17:08', NULL),
(14, '687580', NULL, 'Pham Ngoc Huy', '65 huynh thuc khang', '0915688432', 'huyksks258@gmail.com', 0, 1, 'COD', 'balo xinh dep', '2024-12-02 15:18:23', NULL),
(15, '257316', NULL, 'Lam The Vinh', '65 huynh thuc khang', '0937517098', 'vinh@gmail.com', 0, 1, 'VN-pay', 'aaaaa', '2024-12-02 15:27:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `order_id` int(11) NOT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `price` double NOT NULL,
  `review_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`order_id`, `product_id`, `quantity`, `price`, `review_id`) VALUES
(10, 21, 2, 550000, 0),
(15, 21, 1, 550000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `productcolors`
--

CREATE TABLE `productcolors` (
  `product_id` int(11) NOT NULL,
  `color_id` int(11) NOT NULL,
  `img_path` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `productcolors`
--

INSERT INTO `productcolors` (`product_id`, `color_id`, `img_path`, `quantity`) VALUES
(21, 1, 'uploads/balo-kmore-violet-do.png', 10),
(21, 10, 'uploads/balo-kmore-violet-den.png', 10),
(22, 2, 'uploads/balo-parkland-kingston-xanh-la.png', 10),
(22, 4, 'uploads/balo-parkland-kingston-vang.png', 10),
(23, 1, 'uploads/balo-kmore-knox-do.png', 10),
(23, 3, 'uploads/balo-kmore-knox-xanh-duong.png', 10),
(23, 10, 'uploads/balo-kmore-knox-den.png', 10),
(24, 3, 'uploads/balo-kmore-lenox-xanh-duong.png', 10),
(24, 10, 'uploads/balo-kmore-lenox-mau-den.png', 10),
(24, 11, 'uploads/balo-kmore-lenox-xam.png', 10),
(25, 4, 'uploads/balo-natoli-b16-mau-vang.png', 10),
(25, 10, 'uploads/balo-natoli-b16-den.png', 10),
(26, 3, 'uploads/balo-mikkor-ralph-premier-l-navy.png', 10),
(26, 10, 'uploads/balo-mikkor-ralph-premier-l-black.png', 10),
(26, 11, 'uploads/balo-mikkor-ralph-premier-l-grey.png', 10),
(27, 2, 'uploads/balo-kmore-elliot-mau-tan.png', 30),
(27, 3, 'uploads/balo-kmore-elliot-mau-xanh-navy.png', 30),
(27, 10, 'uploads/balo-kmore-elliot-mau-den.png', 20),
(28, 3, 'uploads/balo-laptop-mikkor-levi-17-inch-navy.png', 10),
(28, 10, 'uploads/balo-laptop-mikkor-levi-17-inch-black2.png', 20),
(29, 10, 'uploads/balo-cap-da-nang-natoli-b17.png', 30),
(29, 11, 'uploads/balo-cap-da-nang-natoli-b17-xam.png', 10),
(30, 3, 'uploads/balo-natoli-wolfi-b7-xanh-duong-blue.png', 5),
(30, 8, 'uploads/balo-natoli-wolfi-b7-vang-tan.png', 10),
(30, 11, 'uploads/balo-natoli-wolfi-b7-xam-nhat.png', 10),
(31, 1, 'uploads/balo-laptop-mikkor-the-kalino-backpack-red.jpg', 5),
(31, 3, 'uploads/balo-laptop-mikkor-the-kalino-backpack-navy.jpg', 5),
(31, 11, 'uploads/balo-laptop-mikkor-the-kalino-backpack-grey.jpg', 5),
(32, 10, 'uploads/', 10);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `description` mediumtext NOT NULL,
  `price` double NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `rating` float NOT NULL,
  `img` varchar(255) NOT NULL,
  `is_active` bit(1) NOT NULL,
  `create_at` timestamp NULL DEFAULT NULL,
  `update_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `description`, `price`, `category_id`, `brand_id`, `rating`, `img`, `is_active`, `create_at`, `update_at`) VALUES
(21, 'Balo nam nữ thời trang Kmore Violet Backpack', '<p><strong>Chất liệu:</strong>&nbsp;vải Polyester 600*900 WR PU 3T, Polyester 210D</p>\r\n\r\n<p><strong>K&iacute;ch thước&nbsp;</strong>:&nbsp;38cm x 28cm x 10cm.</p>\r\n\r\n<p><strong>C&acirc;n nặng :</strong>&nbsp;600gr</p>\r\n\r\n<p><strong>Bảo h&agrave;nh :</strong>&nbsp;05 năm</p>\r\n\r\n<p>Với 9 m&agrave;u sắc đa dạng, từ những t&ocirc;ng m&agrave;u trung t&iacute;nh như Black, Navy, Graphite đến những gam m&agrave;u nổi bật như Red, Orange v&agrave; những gam m&agrave;u phối tinh tế kh&aacute;c.</p>\r\n\r\n<p>Ba l&ocirc; The Violet của Kmore đ&aacute;p ứng mọi sở th&iacute;ch v&agrave; c&aacute; t&iacute;nh, t&ocirc;n l&ecirc;n phong c&aacute;ch ri&ecirc;ng biệt của bạn. Ba l&ocirc; The Violet ch&uacute; trọng v&agrave;o từng đường may, chi tiết thiết kế, mang đến vẻ ngo&agrave;i sang trọng v&agrave; tinh tế cho người sử dụng.</p>\r\n\r\n<p>Với sự kết hợp ho&agrave;n hảo giữa chất liệu, kiểu d&aacute;ng v&agrave; t&iacute;nh năng Ba l&ocirc; The Violet &nbsp;l&agrave; người bạn đồng h&agrave;nh l&yacute; tưởng cho mọi h&agrave;nh tr&igrave;nh, từ đi học, đi l&agrave;m đến du lịch, d&atilde; ngoại.</p>\r\n\r\n<p>Với ngăn ch&iacute;nh rộng r&atilde;i v&agrave; tiện lợi để đựng s&aacute;ch vở hoặc t&agrave;i liệu l&agrave;m việc.Ngo&agrave;i ra c&oacute; th&ecirc;m ngăn d&acirc;y k&eacute;o phụ kiện b&ecirc;n trong tiện lợi để đựng c&aacute;c vật dụng nhỏ như điện thoại, v&iacute;, b&uacute;t, sạc....</p>\r\n', 550000, 3, 3, 5, 'uploads/balo-kmore-violet-do.png', b'0', NULL, NULL),
(22, 'Balo thời trang Parkland Kingston Backpack', '<p><strong>K&iacute;ch thước</strong>: 17.75&quot; x 12.25&quot; x 6&quot;&nbsp;</p>\r\n\r\n<p><strong>Thể t&iacute;ch:</strong>&nbsp;&nbsp;30L Fix laptop &nbsp;15 inch</p>\r\n\r\n<p><strong>Chất liệu</strong>&nbsp;100% polyester t&aacute;i chế</p>\r\n\r\n<p>Thiết kế cổ điển của n&oacute; cung cấp nhiều kh&ocirc;ng gian để lưu trữ những thứ cần thiết h&agrave;ng ng&agrave;y của bạn, bao gồm cả m&aacute;y t&iacute;nh x&aacute;ch tay 15&quot;.&nbsp;</p>\r\n\r\n<p>D&acirc;y đai c&oacute; đệm lưới T&uacute;i zip ph&iacute;a trước an to&agrave;n Gh&eacute; Balo Online lu&ocirc;n c&oacute; balo xịn s&ograve; ạ.</p>\r\n', 350000, 3, 4, 5, 'uploads/balo-parkland-kingston-xanh-la.png', b'0', NULL, NULL),
(23, 'Balo thời trang Kmore Knox', '<h1>Balo thời trang Kmore Knox l&agrave; một sản phẩm ph&ugrave; hợp cho c&aacute;c học sinh sinh vi&ecirc;n , nh&acirc;n vi&ecirc;n văn ph&ograve;ng</h1>\r\n', 550000, 3, 3, 5, 'uploads/balo-kmore-knox-xanh-duong.png', b'0', NULL, NULL),
(24, 'Balo thời trang nam nữ Kmore Lenox', '<p><strong>Chất liệu:&nbsp;</strong>vải Polyester 600*900 WR PU 3T, Polyester 210D</p>\r\n\r\n<p><strong>K&iacute;ch thước&nbsp;</strong>: 42cm x 29cm x 13cm</p>\r\n\r\n<p><strong>C&acirc;n nặng&nbsp;</strong>: 400 gr</p>\r\n\r\n<p><strong>Bảo h&agrave;nh</strong>&nbsp;: 05 năm.</p>\r\n\r\n<p>Hơn nữa, chất liệu vải polyester cao cấp mang lại cảm gi&aacute;c chắc chắn v&agrave; bảo vệ an to&agrave;n cho đồ đạc b&ecirc;n trong.</p>\r\n\r\n<p>Chất liệu n&agrave;y kh&ocirc;ng chỉ c&oacute; độ bền cao, th&ocirc;ng tho&aacute;ng kh&iacute; tốt m&agrave; c&ograve;n dễ vệ sinh. The Lennox backpack c&oacute; ngăn ch&iacute;nh rộng r&atilde;i, b&ecirc;n trong balo c&oacute; ngăn ph&acirc;n khu r&otilde; r&agrave;ng, gi&uacute;p bạn dễ d&agrave;ng sắp xếp v&agrave; t&igrave;m kiếm c&aacute;c vật dụng.</p>\r\n\r\n<p>Ngo&agrave;i ra, balo c&ograve;n c&oacute; một ngăn laptop ri&ecirc;ng biệt đựng vừa laptop 15.6 inches c&ugrave;ng ngăn nhỏ kh&oacute;a k&eacute;o đựng đồ c&aacute; nh&acirc;n gọn g&agrave;ng.</p>\r\n\r\n<p>Ngăn h&ocirc;ng th&iacute;ch hợp đựng b&igrave;nh nước hoặc d&ugrave; che mưa gấp nhỏ.&nbsp;</p>\r\n\r\n<p>Quai đeo &ecirc;m &aacute;i, d&agrave;y dặn c&ugrave;ng lưng tho&aacute;ng kh&iacute; mang lại sự thoải m&aacute;i khi mang balo suốt cả ng&agrave;y.&nbsp;</p>\r\n\r\n<p>Mặt trước balo đ&iacute;nh logo PVC ch&uacute; r&ugrave;a biểu tượng thương hiệu Kmore nổi bật.</p>\r\n\r\n<p>Chiếc <strong>balo thời trang đẹp</strong>&nbsp;ra mắt lần n&agrave;y nhằm hướng đến những bạn lu&ocirc;n t&igrave;m kiếm cho m&igrave;nh sự &ldquo;đơn giản&rdquo; cho đến độ tiện lợi tối đa cần c&oacute; trong một chiếc balo.</p>\r\n\r\n<p>Lennox Backpack l&agrave; lựa chọn ho&agrave;n hảo cho những ai y&ecirc;u th&iacute;ch phong c&aacute;ch hiện đại v&agrave; cần một chiếc balo đa năng, tiện dụng.</p>\r\n', 500000, 3, 3, 5, 'uploads/balo-kmore-lenox-xam.png', b'0', NULL, NULL),
(25, 'Balo nữ thời trang Natoli Teddy Bear School B16', '<p>K&iacute;ch thước: 28 x 40 x 12 cm (ngang x cao x h&ocirc;ng)</p>\r\n\r\n<p>Trọng lượng: 500g.&nbsp;</p>\r\n\r\n<p>Balo gấu b&ocirc;ng với thiết kế nhỏ gọn c&ugrave;ng với chất liệu vải polyester trượt nước, balo gấu b&ocirc;ng kh&ocirc;ng chỉ l&agrave; một phụ kiện dễ thương m&agrave; c&ograve;n mang đến cảm gi&aacute;c thoải m&aacute;i v&agrave; tiện lợi trong mọi hoạt động h&agrave;ng ng&agrave;y.&nbsp;</p>\r\n\r\n<p>Sản phẩm balo nữ thời trang h&agrave;n quốc d&agrave;nh ri&ecirc;ng cho c&aacute;c bạn trẻ y&ecirc;u th&iacute;ch phong c&aacute;c thời trang H&agrave;n Quốc. Gấu b&ocirc;ng đ&aacute;ng y&ecirc;u tr&ecirc;n balo thu h&uacute;t c&aacute;c bạn c&ugrave;ng giới v&agrave; kh&aacute;c giới ch&uacute; &yacute;. Balo thời trang nữ tạo n&ecirc;n cho bạn một phong c&aacute;ch thời trang m&agrave; người kh&aacute;c phải ngưỡng mộ.</p>\r\n\r\n<p>Balo teen<a href=\"https://baloonline.com/balo-teen\"><strong>&nbsp;</strong></a>gấu b&ocirc;ng với thiết kế basic, phong c&aacute;ch dễ thương với c&aacute;c m&agrave;u sắc nhẹ nh&agrave;ng như hồng pastel, m&agrave;u be hoặc m&agrave;u x&aacute;m.</p>\r\n\r\n<p>Điểm nhấn của balo nữ đi học ch&iacute;nh l&agrave; ch&uacute; gấu nhỏ b&aacute;m ở một b&ecirc;n của balo - một lựa chọn kh&ocirc;ng thể thiếu cho những người y&ecirc;u th&iacute;ch sự dễ thương v&agrave; độc đ&aacute;o. Đ&acirc;y l&agrave; sản phẩm tin d&ugrave;ng l&agrave;m balo cấp 2, balo cấp 3 m&agrave; c&aacute;c bạn kh&ocirc;ng thể bỏ lỡ.&nbsp;</p>\r\n\r\n<p>Balo nữ thời trang chỉ nặng 500gr n&ecirc;n mang rất nhẹ, tiện lợi v&agrave; dễ sử dụng&nbsp;</p>\r\n\r\n<p>Phần đ&aacute;y của ngăn laptop được l&oacute;t đệm m&uacute;t &ecirc;m &aacute;i gi&uacute;p giảm sốc cho laptop&nbsp;</p>\r\n\r\n<p>Mặt lưng của balo nữ cấp 2 cấp 3 được cấu tạo bằng đệm l&oacute;t tổ ong tho&aacute;ng kh&iacute;, đồng thời gi&uacute;p người d&ugrave;ng kh&ocirc;ng bị đau lưng khi đeo cặp gấu b&ocirc;ng trong thời gian d&agrave;i.&nbsp;</p>\r\n', 600000, 3, 1, 5, 'uploads/balo-natoli-b16-mau-vang.png', b'0', NULL, NULL),
(26, 'Balo đựng laptop Mikkor Ralph Premier Backpack', '<p>Chất liệu: vải Polyester 1260D WR 3PU&nbsp;</p>\r\n\r\n<p>Số ngăn: 3 ngăn ch&iacute;nh, 1 ngăn phụ v&agrave; nhiều ngăn phụ kiện.</p>\r\n\r\n<p><strong>K&iacute;ch thước size M (14 inch)&nbsp;</strong>:&nbsp;&nbsp;40cm x 27cm x 12cm</p>\r\n\r\n<p><strong>K&iacute;ch thước size L (15 inch)&nbsp;</strong>: 42cm x 29cm x 13cm</p>\r\n\r\n<p>Bảo h&agrave;nh : 05 năm&nbsp;</p>\r\n\r\n<p>Diện mạo mới tr&ecirc;n nền Polyester 1260D WR 3PU chống thấm tuyệt vời ph&ugrave; hợp với mọi phong c&aacute;ch v&agrave; c&aacute; t&iacute;nh.</p>\r\n\r\n<p>The Ralph Premier size M,L thiết kế với ngăn laptop ri&ecirc;ng biệt ph&ugrave; hợp cho c&aacute;c d&ograve;ng m&aacute;y 15.6 inch hoặc macbook 17 inch trở xuống.&nbsp;</p>\r\n\r\n<p>Ngăn ch&iacute;nh rộng r&atilde;i, c&oacute; thể để được rất nhiều s&aacute;ch vở t&agrave;i liệu hoặc 3-4 bộ quần &aacute;o cho chuyến đi du lịch, c&ocirc;ng t&aacute;c ngắn ng&agrave;y, b&ecirc;n trong c&oacute; th&ecirc;m 1 ngăn lưới c&oacute; kh&oacute;a k&eacute;o. Ph&iacute;a trước l&agrave; một ngăn với nhiều ngăn nhỏ được chia khoa học để dễ d&agrave;ng sắp xếp c&aacute;c vật dụng c&aacute; nh&acirc;n nhỏ gọn như b&uacute;t viết, namecard, điện thoại,&hellip;</p>\r\n\r\n<p>Ngăn phụ ngo&agrave;i c&ugrave;ng với d&acirc;y k&eacute;o thiết kế c&aacute;ch điệu kết hợp logo thương hiệu tạo điểm nhấn nổi bật cho sản phẩm.</p>\r\n\r\n<p>Quai x&aacute;ch đỉnh v&agrave; quai đeo vai được đệm foam d&agrave;y &ecirc;m gi&uacute;p bạn cảm gi&aacute;c thoải m&aacute;i khi đeo hay x&aacute;ch balo.&nbsp;</p>\r\n\r\n<p>Th&acirc;n sau được thiết kế với m&uacute;t d&agrave;y v&agrave; &ecirc;m tr&ecirc;n nền Airmesh tho&aacute;ng nhiệt.</p>\r\n\r\n<p>Ph&iacute;a sau c&ugrave;ng được thiết kế một d&acirc;y đai để gắn tay k&eacute;o va li, gi&uacute;p cho những chuyến c&ocirc;ng t&aacute;c của bạn trở l&ecirc;n đơn giản v&agrave; gọn nhẹ hơn.&nbsp;</p>\r\n', 700000, 3, 2, 5, 'uploads/balo-mikkor-ralph-premier-l-navy.png', b'0', NULL, NULL),
(27, 'Balo Mini thời trang Kmore The Elliot Backpack', '<p><strong>K&iacute;ch thước&nbsp;</strong>:&nbsp;&nbsp;31cm x 18cm x 9cm</p>\r\n\r\n<p><strong>Bảo h&agrave;nh:</strong>&nbsp;5 năm</p>\r\n\r\n<p><strong>C&acirc;n nặng&nbsp;</strong>:&nbsp;300 g</p>\r\n\r\n<p>Được thiết kế tr&ecirc;n nền vải 900D Twill Polyester with PU&amp;WR ,&nbsp; PU/2T, tr&aacute;ng phủ PU. Ngăn&nbsp;ch&iacute;nh đủ để bạn mang theo đồ d&ugrave;ng c&aacute; nh&acirc;n h&agrave;ng ng&agrave;y c&ugrave;ng một chiếc Ipad, ngo&agrave;i ra ngăn d&acirc;y k&eacute;o phụ ph&iacute;a trong gi&uacute;p bạn c&oacute; thể chia đồ một c&aacute;ch dễ d&agrave;ng.</p>\r\n\r\n<p>Ngăn ngo&agrave;i c&ugrave;ng với d&acirc;y k&eacute;o thiết kế ẩn kết hợp logo thương hiệu balo thời trang&nbsp;tr&ecirc;n nền hypalon tạo điểm nhấn nổi bật cho sản phẩm, với ngăn ph&iacute;a trước n&agrave;y bạn c&oacute; thể dễ d&agrave;ng cất/lấy thẻ giữ xe, ch&igrave;a kh&oacute;a hoặc những vật dụng nhỏ gọn kh&aacute;c.</p>\r\n\r\n<p>Quai x&aacute;ch đỉnh với 2 quai c&acirc;n bằng v&agrave; bọc da PU l&agrave;m tăng sự độc đ&aacute;o của sản phẩm, bạn c&oacute; thể x&aacute;ch ba l&ocirc; với 2 quai x&aacute;ch giữa hoặc đeo sau lưng với 2 quai đeo c&oacute; thể điều chỉnh, tăng giảm.</p>\r\n\r\n<p>Chiếc balo Kmore&nbsp;mang phong c&aacute;ch hiện đại, được thiết kế m&agrave;u trung t&iacute;nh hướng đến sự đơn giản h&agrave;i h&ograve;a, th&iacute;ch hợp cho c&aacute;c bạn ưa sự năng động, c&aacute; t&iacute;nh gồm 3 m&agrave;u: Black, Navy v&agrave; Tan</p>\r\n', 450000, 3, 3, 5, 'uploads/balo-kmore-elliot-mau-tan.png', b'0', NULL, NULL),
(28, 'Balo đựng máy tính Mikkor Levi 17 inch cao cấp', '<p><strong>Chất liệu:&nbsp;</strong>vải Polyester 600*900 WR PU 3T, Polyester 210D</p>\r\n\r\n<p><strong>K&iacute;ch thước :&nbsp;</strong>47cm x 34cm x 17cm</p>\r\n\r\n<p><strong>C&acirc;n nặng :</strong>&nbsp;1 kg</p>\r\n\r\n<p><strong>Bảo h&agrave;nh&nbsp;:&nbsp;</strong>05 năm</p>\r\n\r\n<p>The Levi 17 inch sử dụng vải Polyester 600*900 WR PU 3T, Polyester 210D &nbsp;tr&aacute;ng PU chống thấm, đệm chống sốc ở mặt sau c&oacute; thể bảo vệ m&aacute;y t&iacute;nh v&agrave; đồ d&ugrave;ng b&ecirc;n trong tốt hơn.</p>\r\n\r\n<p>Ngăn ch&iacute;nh <strong>balo mikkor</strong>&nbsp;The Levi 17 inch với khoang chứa rộng, được ph&acirc;n t&aacute;ch cho laptop, ngăn để iPad, ngăn d&acirc;y k&eacute;o phụ kiện, kh&ocirc;ng gian c&ograve;n lại để cặp, s&aacute;ch, quần &aacute;o d&ugrave;ng cho mọi hoạt động như học tập, l&agrave;m việc hay đi chơi đến 3 - 4 ng&agrave;y.</p>\r\n\r\n<p>Ngăn thứ ch&iacute;nh được thiết kế với nhiều chi tiết, ngăn đựng b&oacute;p v&iacute;, ngăn đựng điện thoại, ngăn dắt viết, ngăn đựng danh thiếp.</p>\r\n\r\n<p>Mặt trước t&uacute;i l&agrave; &nbsp;ngăn d&acirc;y k&eacute;o thao t&aacute;c nhanh để bạn c&oacute; thể bỏ những đồ d&ugrave;ng cần bỏ v&agrave;o hoặc lấy ra thường xuy&ecirc;n như điện thoại, sổ tay,...</p>\r\n\r\n<p>B&ecirc;n h&ocirc;ng balo l&agrave; ngăn d&acirc;y k&eacute;o v&agrave; ngăn chứa cho chai nước hoặc vật dụng c&aacute; nh&acirc;n nhỏ gọn. Đồng thời cũng l&agrave; điểm nhấn đặc biệt cho chiếc balo th&ecirc;m ấn tượng.</p>\r\n\r\n<p>Th&acirc;n sau v&agrave; quai đeo được thiết kế với m&uacute;t d&agrave;y v&agrave; &ecirc;m tr&ecirc;n nền Airmesh tho&aacute;ng nhiệt. Quai đeo &ecirc;m, c&oacute; kho&aacute; trợ lực ngực hỗ trợ khi di chuyển.&nbsp;B&ecirc;n cạnh đ&oacute;, quai đeo c&ograve;n c&oacute; thể tăng giảm độ d&agrave;i, tiện lợi để bạn điều chỉnh ph&ugrave; hợp với chiều cao của m&igrave;nh.&nbsp;Quai x&aacute;ch đỉnh được thiết kế h&agrave;i ho&agrave;, n&acirc;ng đều chiếc balo khi bạn x&aacute;ch.</p>\r\n\r\n<p>The Levi 17 inch được thiết kế với d&acirc;y đai dọc ph&iacute;a sau, gi&uacute;p tiện lợi hơn cho việc kết hợp c&ugrave;ng Vali k&eacute;o.</p>\r\n\r\n<p>Mặt trước balo đ&iacute;nh logo ch&uacute; s&oacute;i biểu tượng thương hiệu v&agrave; logo hợp kim MIKKOR nổi bật.</p>\r\n', 1000000, 3, 2, 5, 'uploads/balo-laptop-mikkor-levi-17-inch-navy.png', b'0', NULL, NULL),
(29, 'Balo cặp đa năng thời trang Natoli B17', '<p>K&iacute;ch thước: 25x41x18 cm (cao x ngang x h&ocirc;ng)</p>\r\n\r\n<p>Thiết kế n&agrave;y kh&ocirc;ng chỉ phục vụ cho nhu cầu mang đi học m&agrave; c&ograve;n hữu &iacute;ch cho c&aacute;c hoạt động ngo&agrave;i trời v&agrave; du lịch.</p>\r\n\r\n<p>Đầu kh&oacute;a k&eacute;o cặp s&aacute;ch HKK đ&uacute;c khu&ocirc;n Natoli&nbsp;chắc chắn</p>\r\n\r\n<p>Ngăn đựng b&igrave;nh nước, &ocirc; d&ugrave;</p>\r\n\r\n<p>Ngăn đựng laptop ri&ecirc;ng biệt 11 - 15.6inch, cặp đựng m&aacute;y t&iacute;nh c&oacute; đai c&agrave;i cố định gi&uacute;p cho laptop kh&ocirc;ng bị va đập.</p>\r\n', 450000, 2, 1, 5, 'uploads/balo-cap-da-nang-natoli-b17-xam.png', b'0', NULL, NULL),
(30, 'Balo thời trang nam nữ Natoli Wolfi B7', '<p><strong>&nbsp;K&iacute;ch thước:</strong>&nbsp;48 x 29 x 15 (cm)</p>\r\n\r\n<p><strong>Chất liệu vải:</strong>&nbsp;Polyester 1200D cao cấp trượt nước l&ecirc;n đến 90%.</p>\r\n\r\n<p><strong>Fitlaptop:&nbsp;</strong>15.6 inch</p>\r\n\r\n<p>Balo c&oacute; dung t&iacute;ch sức chứa lớn l&ecirc;n đến 25kg, n&ecirc;n bạn cứ tha hồ thoải m&aacute;i để &ldquo;cả thế giới&rdquo; v&agrave;o để mang l&ecirc;n vai đi phượt.</p>\r\n\r\n<p>Quai đeo cấu tạo chữ S k&egrave;m th&ecirc;m lớp tổ ong tho&aacute;ng kh&iacute; gi&uacute;p &ocirc;m s&aacute;t bờ lưng của bạn, tạo một cảm gi&aacute;c thật thoải m&aacute;i khi mang.</p>\r\n\r\n<p>B&ecirc;n ngo&agrave;i balo đi học&nbsp;c&oacute; 4 ngăn nhỏ: 2 ngăn ph&iacute;a trước nhỏ gọn c&oacute; thể đựng vừa điện thoại, v&iacute; hoặc d&acirc;y sạc v&agrave; c&oacute; một phụ kiện m&oacute;c ch&igrave;a kh&oacute;a tiện lợi, 2 ngăn ph&iacute;a 2 b&ecirc;n để vừa b&igrave;nh nước hoặc &ocirc;.</p>\r\n\r\n<p>B&ecirc;n trong balo c&oacute; ngăn chống sốc ri&ecirc;ng cho laptop từ size 11 &ndash; 15.6 inch, ngăn phụ nhỏ ph&iacute;a trước ngăn chống sốc đựng chuột hoặc l&oacute;t chuột, được th&ecirc;m ngăn phụ để đựng v&iacute;, b&uacute;t ri&ecirc;ng lẻ dễ d&agrave;ng lấy ra. Ngăn ch&iacute;nh rộng r&atilde;i, bạn c&oacute; thể tha hồ đựng s&aacute;ch vở hoặc quần &aacute;o cần thiết khi đi du lịch.</p>\r\n\r\n<p>Ph&iacute;a sau balo được trang bị th&ecirc;m một ngăn b&iacute; mật tiện lợi, mặt lưng balo được đệm th&ecirc;m một lớp đệm xốp tổ ong tho&aacute;ng kh&iacute;, tạo cảm gi&aacute;c &ecirc;m &aacute;i cho bờ lưng.</p>\r\n\r\n<p>Quai đeo được thiết kế theo cấu tạo chữ S v&agrave; cũng c&oacute; lớp đệm tổ ong tho&aacute;ng kh&iacute; gi&uacute;p &ocirc;m s&aacute;t bờ lưng của bạn, tạo cảm gi&aacute;c thoải m&aacute;i kh&ocirc;ng g&acirc;y b&iacute; b&aacute;ch kh&oacute; chịu khi mang balo tr&ecirc;n vai.</p>\r\n', 700000, 3, 1, 5, 'uploads/balo-natoli-wolfi-b7-xanh-duong-blue.png', b'0', NULL, NULL),
(31, 'Balo form hộp Mikkor The Kalino', '<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>K&iacute;ch thước balo:</td>\r\n			<td>&nbsp;44cm x 31cm x 15cm</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Fix laptop</td>\r\n			<td>&nbsp;15.6 Inch</td>\r\n		</tr>\r\n		<tr>\r\n			<td>C&acirc;n nặng:</td>\r\n			<td>&nbsp;0.8 kg</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Tải trọng tối đa:</td>\r\n			<td>&nbsp;20kg</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Bảo h&agrave;nh:</td>\r\n			<td>&nbsp;5 năm</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Th&acirc;n sau</strong>&nbsp;đệm foam tr&ecirc;n nền lưới airmesh tho&aacute;ng nhiệt tạo sự &ecirc;m &aacute;i v&agrave; thoải m&aacute;i khi đeo.</p>\r\n\r\n<p>Th&acirc;n t&uacute;i đệm foam pe gi&agrave;y gi&uacute;p chống sốc tốt v&agrave; bảo vệ m&aacute;y t&iacute;nh cũng như đồ d&ugrave;ng b&ecirc;n trong được an to&agrave;n, foam d&agrave;y cũng gi&uacute;p cho sản phẩm định h&igrave;nh tốt v&agrave; lu&ocirc;n c&oacute; d&aacute;ng form đẹp.</p>\r\n\r\n<p><strong>Quai đeo&nbsp;</strong><a href=\"https://baloonline.com/balo-du-lich\">&nbsp;</a>&ecirc;m &aacute;i gi&uacute;p giảm bớt cảm gi&aacute;c mỏi vai v&agrave; lưng khi đeo trong thời gian d&agrave;i. B&ecirc;n cạnh đ&oacute;, quai đeo c&ograve;n c&oacute; thể tăng giảm độ d&agrave;i, tiện lợi để bạn điều chỉnh ph&ugrave; hợp với chiều cao của m&igrave;nh.</p>\r\n\r\n<p><strong>&nbsp;</strong>Balo&nbsp;<strong>Mikkor The Kalino&nbsp;</strong>được thiết kế gồm 1 ngăn ch&iacute;nh lớn, 1 ngăn laptop cho c&aacute;c d&ograve;ng m&aacute;y t&iacute;nh lớn l&ecirc;n đến&nbsp;<strong>15.6 PC,&nbsp;</strong>2 ngăn nhỏ đựng phụ kiện, 2 ngăn dắt viết, 1 ngăn lưới đựng ch&igrave;a kho&aacute;, tai nghe, b&ecirc;n ngo&agrave;i với 2 ngăn đựng b&igrave;nh nước.</p>\r\n\r\n<p>Mẫu balo Mikkor The Kalino mang đến cho bạn sự lựa chọn tuyệt vời khi cần mang theo nhiều đồ d&ugrave;ng trong mỗi chuyến đi.</p>\r\n', 500000, 2, 2, 5, 'uploads/balo-laptop-mikkor-the-kalino-backpack-red.jpg', b'0', NULL, NULL),
(32, 'Balo cao cấp Sakos Morale', '<p>Balo Sakos Morale i17 l&agrave; d&ograve;ng balo th&ocirc;ng minh mới nhất của h&atilde;ng Sakos với nhiều t&iacute;nh năng hiện đại. D&ograve;ng balo cao cấp hướng đến giới trẻ năng động c&oacute; kiểu d&aacute;ng gọn nhẹ, ph&acirc;n ngăn tiện dụng c&ugrave;ng nhiều tiện &iacute;ch vượt trội về chống nước đ&atilde; tạo n&ecirc;n một d&ograve;ng balo ho&agrave;n hảo.</p>\r\n\r\n<table>\r\n	<tbody>\r\n		<tr>\r\n			<td>M&agrave;u sắc:</td>\r\n			<td>Đen</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Chất liệu:</td>\r\n			<td>Polyester, PU, EVA, PE</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Trọng lượng:</td>\r\n			<td>0.94 kg</td>\r\n		</tr>\r\n		<tr>\r\n			<td>K&iacute;ch thước: (DxRxC)</td>\r\n			<td>31 x 16 x 47 cm</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Ngăn laptop:</td>\r\n			<td>15.6 inch</td>\r\n		</tr>\r\n		<tr>\r\n			<td>Tải trọng tối đa:</td>\r\n			<td>15 kg</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>D&ograve;ng balo&nbsp;<strong>th&ocirc;ng minh&nbsp;</strong>Morale bắt kịp xu hướng thời đại khi t&iacute;ch hợp cổng sạc v&agrave; USB ở vị tr&iacute; b&ecirc;n h&ocirc;ng, tiện lợi trong việc sạc pin hay nghe nhạc m&agrave; kh&ocirc;ng cần mở kh&oacute;a balo bằng nhiều thao t&aacute;c rườm r&agrave;.</p>\r\n\r\n<p>Chất liệu Polyester cao cấp, trượt nước hiệu quả, bề mặt s&aacute;ng mịn, chống bạm bụi v&agrave; bền bỉ c&ugrave;ng thời gian.</p>\r\n\r\n<p>Hệ thống ngăn chứa gồm 1 ngăn ch&iacute;nh v&agrave; nhiều ngăn phụ đa k&iacute;ch thước ph&ugrave; hợp sử dụng để đi học, đi l&agrave;m hoặc đi chơi, du lịch. Khoang ch&iacute;nh t&iacute;ch hợp hẳn ngăn đựng laptop l&ecirc;n đến 17 inches với đệm EVA &ecirc;m &aacute;i, chống sốc, chống trầy xước hiệu quả.</p>\r\n\r\n<p>Kh&ocirc;ng gian c&ograve;n lại của ngăn ch&iacute;nh th&iacute;ch hợp để mang theo quần &aacute;o, t&agrave;i liệu hay s&aacute;ch vở t&ugrave;y theo mục đ&iacute;ch sử dụng.&nbsp;</p>\r\n\r\n<p><strong>Mặt lưng v&agrave; quai đeo</strong>&nbsp;Morale của Sakos l&oacute;t đệm 3D dạng lưới tho&aacute;ng kh&iacute;, chống hằn, hạn chế tiết mồ h&ocirc;i v&agrave; giảm &aacute;p lực l&ecirc;n cơ thể.</p>\r\n', 1000000, 5, 5, 5, 'uploads/balo-sakos-morale.png', b'0', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `rating` float NOT NULL,
  `comment` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` int(11) NOT NULL,
  `supp_name` varchar(255) NOT NULL,
  `address` mediumtext NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `supp_name`, `address`, `phone`, `email`) VALUES
(1, ' Haludi', '  Số 72 Đường số 1, Phường An Phú, Quận 2, TP.Hồ Chí Minh', '  0835.207.276', '  banhang@haludo.com'),
(2, 'Balo Túi Xách Tân Phú', '26/11T Ấp Xuân Thới Đông 1, Xã Xuân Thới Đông, Huyện Hóc Môn, TP. Hồ Chí Minh, Việt Nam', '0903611433', 'info@tanphuco.com'),
(3, 'Balo Túi Xách Punaco', '352 Giải Phóng, P. Phương Liệt, Q. Thanh Xuân, Hà Nội, Việt Nam.', '(024) 38643449', 'kinhdoanh@punaco.vn'),
(4, 'Lizard Bag', '86 Dương Đình Hội, Phường Phước Long B, Quận 9, TP. Hồ Chí Minh, Việt Nam.', '0909472441 ', 'lizardbag@gmail.com'),
(5, 'aaa', 'dfdsaf', '094040404', 'mail@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `import_detail_orders`
--
ALTER TABLE `import_detail_orders`
  ADD KEY `imporder_id` (`imporder_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `color_id` (`color_id`);

--
-- Indexes for table `import_orders`
--
ALTER TABLE `import_orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_id` (`admin_id`),
  ADD KEY `supplier_id` (`supplier_id`);

--
-- Indexes for table `login_token`
--
ALTER TABLE `login_token`
  ADD PRIMARY KEY (`tokenID`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD KEY `order_id` (`order_id`),
  ADD KEY `productcolor_id` (`product_id`);

--
-- Indexes for table `productcolors`
--
ALTER TABLE `productcolors`
  ADD PRIMARY KEY (`product_id`,`color_id`),
  ADD KEY `color_id` (`color_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `brand_id` (`brand_id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `reviews_ibfk_2` (`product_id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `colors`
--
ALTER TABLE `colors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `import_orders`
--
ALTER TABLE `import_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `login_token`
--
ALTER TABLE `login_token`
  MODIFY `tokenID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `import_detail_orders`
--
ALTER TABLE `import_detail_orders`
  ADD CONSTRAINT `import_detail_orders_ibfk_1` FOREIGN KEY (`imporder_id`) REFERENCES `import_orders` (`id`),
  ADD CONSTRAINT `import_detail_orders_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `productcolors` (`product_id`),
  ADD CONSTRAINT `import_detail_orders_ibfk_3` FOREIGN KEY (`color_id`) REFERENCES `colors` (`id`);

--
-- Constraints for table `import_orders`
--
ALTER TABLE `import_orders`
  ADD CONSTRAINT `import_orders_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`id`),
  ADD CONSTRAINT `import_orders_ibfk_2` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`);

--
-- Constraints for table `login_token`
--
ALTER TABLE `login_token`
  ADD CONSTRAINT `login_token_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `productcolors`
--
ALTER TABLE `productcolors`
  ADD CONSTRAINT `productcolors_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `productcolors_ibfk_2` FOREIGN KEY (`color_id`) REFERENCES `colors` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`);

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `reviews_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
