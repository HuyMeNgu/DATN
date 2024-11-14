-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 13, 2024 lúc 05:01 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `balostore`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
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

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `brands`
--

INSERT INTO `brands` (`id`, `name`) VALUES
(1, 'Natoli'),
(2, 'Mikkor'),
(3, 'Kmore'),
(4, 'Parkland');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'balo du lich'),
(2, 'Balo thể thao'),
(3, 'Balo thời trang'),
(4, 'balo du lịch');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `colors`
--

CREATE TABLE `colors` (
  `id` int(11) NOT NULL,
  `color_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `colors`
--

INSERT INTO `colors` (`id`, `color_name`) VALUES
(1, 'Trắng'),
(2, 'Đen'),
(3, 'Xanh lá'),
(4, 'Vàng'),
(5, 'Xám');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customers`
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
-- Đang đổ dữ liệu cho bảng `customers`
--

INSERT INTO `customers` (`id`, `name`, `password`, `phone`, `email`, `address`, `create_at`, `update_at`) VALUES
(1, 'the vinh', '12234', '083838388', 'vinh@gmail.com', 'Long An', '2024-11-13 16:58:33', '2024-11-13 16:58:33');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `color_id` int(11) NOT NULL,
  `path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `images`
--

INSERT INTO `images` (`id`, `product_id`, `color_id`, `path`) VALUES
(1, 1, 1, 'img1'),
(2, 1, 1, 'img2');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `import_detail_orders`
--

CREATE TABLE `import_detail_orders` (
  `imporder_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `import_orders`
--

CREATE TABLE `import_orders` (
  `id` int(11) NOT NULL,
  `code` varchar(10) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `create_at` datetime NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `code` varchar(10) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `address` mediumtext NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `paymnet` varchar(255) NOT NULL,
  `note` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_details`
--

CREATE TABLE `order_details` (
  `order_id` int(11) NOT NULL,
  `productcolor_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` double NOT NULL,
  `review_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `productcolors`
--

CREATE TABLE `productcolors` (
  `product_id` int(11) NOT NULL,
  `color_id` int(11) NOT NULL,
  `img_path` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `productcolors`
--

INSERT INTO `productcolors` (`product_id`, `color_id`, `img_path`, `quantity`) VALUES
(1, 2, 'balo-natolib17-grey.png', 19),
(1, 5, 'balo-natolib17-grey.png', 0),
(1, 4, 'balo-natolib17-grey.png', 30),
(2, 1, 'balo-mikkorkalino-black.png', 49),
(2, 2, 'balo-mikkorkalino-navy.png', 0),
(3, 2, 'balo-mikkor15-black.png', 0),
(4, 2, 'balo-kmoreeliot-black.png', 0),
(4, 2, 'balo-kmoreeliot-black.png', 12);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
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
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `product_name`, `description`, `price`, `category_id`, `brand_id`, `rating`, `img`, `is_active`, `create_at`, `update_at`) VALUES
(1, 'Balo cặp đa năng thời trang Natoli B17', 'Kích thước: 25x41x18 cm (cao x ngang x hông)\r\n\r\nThiết kế này không chỉ phục vụ cho nhu cầu mang đi học mà còn hữu ích cho các hoạt động ngoài trời và du lịch.\r\n\r\nĐầu khóa kéo cặp sách HKK đúc khuôn Natoli chắc chắn\r\n\r\nNgăn đựng bình nước, ô dù\r\n\r\nNgăn đựng laptop riêng biệt 11 - 15.6inch, cặp đựng máy tính có đai cài cố định giúp cho laptop không bị va đập.', 120000, 3, 1, 3, 'balo-natolib17-black.png', b'1', '2024-11-13 15:02:22', '2024-11-12 15:38:09'),
(2, 'Balo form hộp Mikkor The Kalino', '\r\nKích thước balo:44cm x 31cm x 15cm\r\nFix laptop:15.6 Inch\r\nCân nặng:0.8 kg\r\nTải trọng tối đa:20kg\r\nBảo hành:5 năm\r\n \r\n\r\nThân sau đệm foam trên nền lưới airmesh thoáng nhiệt tạo sự êm ái và thoải mái khi đeo.\r\n\r\nThân túi đệm foam pe giày giúp chống sốc tốt và bảo vệ máy tính cũng như đồ dùng bên trong được an toàn, foam dày cũng giúp cho sản phẩm định hình tốt và luôn có dáng form đẹp.\r\n\r\nQuai đeo balo du lịch êm ái giúp giảm bớt cảm giác mỏi vai và lưng khi đeo trong thời gian dài. Bên cạnh đó, quai đeo còn có thể tăng giảm độ dài, tiện lợi để bạn điều chỉnh phù hợp với chiều cao của mình.\r\n\r\n Balo Mikkor The Kalino được thiết kế gồm 1 ngăn chính lớn, 1 ngăn laptop cho các dòng máy tính lớn lên đến 15.6 PC, 2 ngăn nhỏ đựng phụ kiện, 2 ngăn dắt viết, 1 ngăn lưới đựng chìa khoá, tai nghe, bên ngoài với 2 ngăn đựng bình nước.\r\n\r\nMẫu balo Mikkor The Kalino mang đến cho bạn sự lựa chọn tuyệt vời khi cần mang theo nhiều đồ dùng trong mỗi chuyến đi.', 150000, 2, 2, 5, 'balo-mikkorkalino-red', b'1', '2024-11-25 15:07:34', '2024-11-26 15:07:34'),
(3, 'Balo laptop nam nữ thời trang Mikkor Slim Levi 15', 'Chất liệu: vải Polyester 600*900 WR PU 3T, Polyester 210D\r\n\r\nKích thước : 40cm x 27cm x 11cm\r\n\r\nCân nặng : 600 gr\r\n\r\nBảo hành : 05 năm\r\n\r\nNgăn chính gồm ngăn chống sốc phù hợp cho các dòng laptop 15 inch, ngăn để Ipab và ngăn dây kéo nhỏ phía trước để các vật dụng như bóp ví, điện thoại,…không gian còn lại để sách vở hoặc tài liệu cần thiết cho một ngày làm việc của bạn. Ngăn bình nước được tích hợp bên trong, thuận tiện hơn trong quá trình di chuyển.\r\n\r\nMặt trước túi với ngăn dây kéo giúp bạn để những vật dụng nhỏ gọn và lấy ra thường xuyên như: sổ tay, bút viết,…\r\n\r\nQuai đeo được thiết kế với mút dày và êm trên nền Airmesh thoáng nhiệt. Quai đeo êm giúp giảm bớt cảm giác mỏi vai và lưng khi đeo trong thời gian dài.\r\n\r\nPhía sau cùng được thiết kế một vách để gắn vào tay kéo va li, giúp cho những chuyến công tác của bạn trở lên đơn giản và gọn nhẹ hơn.\r\n\r\nMặt trước balo đính logo chú sói biểu tượng thương hiệu và logo hợp kim MIKKOR nổi bật.', 110000, 3, 2, 3.4, 'balo-mikkor15-navy.png', b'1', '2024-11-12 15:11:11', '2024-11-14 15:11:11'),
(4, 'Balo Mini thời trang Kmore The Elliot', 'Kích thước :  31cm x 18cm x 9cm\r\n\r\nBảo hành: 5 năm\r\n\r\nCân nặng : 300 g\r\n\r\nĐược thiết kế trên nền vải 900D Twill Polyester with PU&WR ,  PU/2T, tráng phủ PU. Ngăn chính đủ để bạn mang theo đồ dùng cá nhân hàng ngày cùng một chiếc Ipad, ngoài ra ngăn dây kéo phụ phía trong giúp bạn có thể chia đồ một cách dễ dàng.\r\n\r\nNgăn ngoài cùng với dây kéo thiết kế ẩn kết hợp logo thương hiệu balo thời trang trên nền hypalon tạo điểm nhấn nổi bật cho sản phẩm, với ngăn phía trước này bạn có thể dễ dàng cất/lấy thẻ giữ xe, chìa khóa hoặc những vật dụng nhỏ gọn khác.\r\n\r\nQuai xách đỉnh với 2 quai cân bằng và bọc da PU làm tăng sự độc đáo của sản phẩm, bạn có thể xách ba lô với 2 quai xách giữa hoặc đeo sau lưng với 2 quai đeo có thể điều chỉnh, tăng giảm.\r\n\r\nChiếc balo Kmore mang phong cách hiện đại, được thiết kế màu trung tính hướng đến sự đơn giản hài hòa, thích hợp cho các bạn ưa sự năng động, cá tính gồm 3 màu: Black, Navy và Tan', 130000, 3, 3, 4.1, 'balo-kmoreeliot-navy.png', b'0', '2024-11-13 15:15:28', '2024-11-13 15:15:28'),
(5, 'Balo nam nữ thời trang Kmore Violet', 'Chất liệu: vải Polyester 600*900 WR PU 3T, Polyester 210D\r\n\r\nKích thước : 38cm x 28cm x 10cm.\r\n\r\nCân nặng : 600gr\r\n\r\nBảo hành : 05 năm\r\n\r\nVới 9 màu sắc đa dạng, từ những tông màu trung tính như Black, Navy, Graphite đến những gam màu nổi bật như Red, Orange và những gam màu phối tinh tế khác.\r\n\r\nBa lô The Violet của Kmore đáp ứng mọi sở thích và cá tính, tôn lên phong cách riêng biệt của bạn. Ba lô The Violet chú trọng vào từng đường may, chi tiết thiết kế, mang đến vẻ ngoài sang trọng và tinh tế cho người sử dụng.\r\n\r\nVới sự kết hợp hoàn hảo giữa chất liệu, kiểu dáng và tính năng Ba lô The Violet  là người bạn đồng hành lý tưởng cho mọi hành trình, từ đi học, đi làm đến du lịch, dã ngoại.\r\n\r\nVới ngăn chính rộng rãi và tiện lợi để đựng sách vở hoặc tài liệu làm việc.Ngoài ra có thêm ngăn dây kéo phụ kiện bên trong tiện lợi để đựng các vật dụng nhỏ như điện thoại, ví, bút, sạc....', 150000, 3, 3, 2, 'balo-kmoreviolet-orange.png', b'1', '2024-11-13 15:17:13', '2024-11-13 15:17:13'),
(6, 'Balo thể thao Jogarbola dạng nắp', 'Kích thước: 33cm x 64cm x 16cm\r\n\r\nChất liệu: 100% polyester\r\nVới thiết kế chuyên biệt cho thể thao nhưng cũng có thể kết hợp nếu cần. \r\n\r\nNgăn chính lớn có khoá bằng dây rút và bên trên là nắp.\r\n\r\nCó ngăn đựng giày riêng sạch sẽ.\r\n\r\nVới chất liệu polyester làm balo thể thao giúp cho việc đựng đồ dụng cụ thể thao được sạch, khô thoáng, và khó bám bụi, dễ vệ sinh hơn.', 200000, 2, 4, 3.5, 'balo-jogarbola.png', b'0', '2024-11-13 15:19:26', '2024-11-13 15:19:26'),
(7, 'Balo thời trang đẹp Kmore Abel', '\r\nKích thước :40cm x 29cm x 16cm\r\nFitlaptop:14 inch\r\nBảo hành:5 năm\r\nCân nặng :450 g\r\n \r\n\r\nNgăn chính gồm ngăn laptop để vừa máy 14 inch, ngăn chính rộng nên tiện lợi để sách vở hoặc tài liệu làm việc, ngoài ra có thêm ngăn dây kéo phụ kiện bên trong.\r\n\r\nPhía trước có thêm ngăn đựng phụ kiện kèm logo thương hiệu làm nổi bật kiểu dáng của sản phẩm.\r\n\r\nHai bên hông túi là 2 ngăn nhỏ, được thiết kế thêm móc tăng giảm để cố định hoặc nới balo tùy theo nhu cầu sử dụng của bạn.\r\n\r\nQuai đeo ba lô được may chắc chắn vào thân đệm lưng, sức chịu tải tốt kết hợp giữa mousse dày cùng lưới air thoát nhiệt cực nhanh sẽ làm bạn không còn cảm giác nóng bức khi mang ba lô bên mình.', 100000, 3, 3, 2.7, 'balo-kmoreabel-black.png', b'1', '2024-11-13 15:20:49', '2024-11-13 15:20:49');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `productcolor_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `rating` float NOT NULL,
  `comment` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `suppliers`
--

CREATE TABLE `suppliers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `adress` mediumtext NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `import_orders`
--
ALTER TABLE `import_orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `admin_id` (`admin_id`),
  ADD KEY `supplier_id` (`supplier_id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD KEY `order_id` (`order_id`),
  ADD KEY `productcolor_id` (`productcolor_id`);

--
-- Chỉ mục cho bảng `productcolors`
--
ALTER TABLE `productcolors`
  ADD KEY `product_id` (`product_id`),
  ADD KEY `color_id` (`color_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `brand_id` (`brand_id`);

--
-- Chỉ mục cho bảng `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `colors`
--
ALTER TABLE `colors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `import_orders`
--
ALTER TABLE `import_orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `import_orders`
--
ALTER TABLE `import_orders`
  ADD CONSTRAINT `import_orders_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `admin` (`id`),
  ADD CONSTRAINT `import_orders_ibfk_2` FOREIGN KEY (`supplier_id`) REFERENCES `suppliers` (`id`);

--
-- Các ràng buộc cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`productcolor_id`) REFERENCES `products` (`id`);

--
-- Các ràng buộc cho bảng `productcolors`
--
ALTER TABLE `productcolors`
  ADD CONSTRAINT `productcolors_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `productcolors_ibfk_2` FOREIGN KEY (`color_id`) REFERENCES `colors` (`id`);

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`brand_id`) REFERENCES `brands` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
