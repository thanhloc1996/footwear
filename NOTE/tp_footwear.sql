-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th12 18, 2018 lúc 07:38 AM
-- Phiên bản máy phục vụ: 5.7.23
-- Phiên bản PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `tp_footwear`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `identifier` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instance` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=800 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`id`, `identifier`, `instance`, `content`, `created_at`, `updated_at`) VALUES
(199, '154235237760accforyou123accforyou123@gmail.com60', 'default', 'O:29:\"Illuminate\\Support\\Collection\":1:{s:8:\"\0*\0items\";a:0:{}}', '2018-11-16 00:12:57', NULL),
(251, '154235470490thaipham90', 'default', 'O:29:\"Illuminate\\Support\\Collection\":1:{s:8:\"\0*\0items\";a:1:{s:32:\"907904c878a4dac797210dab2f354648\";O:32:\"Gloudemans\\Shoppingcart\\CartItem\":8:{s:5:\"rowId\";s:32:\"907904c878a4dac797210dab2f354648\";s:2:\"id\";i:2;s:3:\"qty\";s:1:\"1\";s:4:\"name\";s:17:\"Vans Old Skool v2\";s:5:\"price\";d:1;s:7:\"options\";O:39:\"Gloudemans\\Shoppingcart\\CartItemOptions\":1:{s:8:\"\0*\0items\";a:1:{s:14:\"product_detail\";O:24:\"App\\Models\\ProductDetail\":27:{s:8:\"\0*\0table\";s:17:\"tp_product_detail\";s:8:\"\0*\0dates\";a:1:{i:0;s:10:\"deleted_at\";}s:10:\"timestamps\";b:1;s:11:\"\0*\0fillable\";a:9:{i:0;s:2:\"id\";i:1;s:10:\"product_id\";i:2;s:8:\"color_id\";i:3;s:4:\"size\";i:4;s:4:\"name\";i:5;s:5:\"image\";i:6;s:5:\"price\";i:7;s:6:\"status\";i:8;s:8:\"quantity\";}s:13:\"\0*\0connection\";s:5:\"mysql\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:13:\"\0*\0attributes\";a:11:{s:2:\"id\";i:2;s:10:\"product_id\";i:2;s:8:\"color_id\";i:3;s:4:\"size\";N;s:4:\"name\";s:17:\"Vans Old Skool v3\";s:5:\"image\";s:32:\"upload/1542271266MUS6BT-HERO.jpg\";s:5:\"price\";i:1;s:8:\"quantity\";i:6;s:10:\"deleted_at\";N;s:10:\"created_at\";s:19:\"2018-11-15 08:41:06\";s:10:\"updated_at\";s:19:\"2018-11-15 08:41:06\";}s:11:\"\0*\0original\";a:11:{s:2:\"id\";i:2;s:10:\"product_id\";i:2;s:8:\"color_id\";i:3;s:4:\"size\";N;s:4:\"name\";s:17:\"Vans Old Skool v3\";s:5:\"image\";s:32:\"upload/1542271266MUS6BT-HERO.jpg\";s:5:\"price\";i:1;s:8:\"quantity\";i:6;s:10:\"deleted_at\";N;s:10:\"created_at\";s:19:\"2018-11-15 08:41:06\";s:10:\"updated_at\";s:19:\"2018-11-15 08:41:06\";}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:2:{s:7:\"product\";O:18:\"App\\Models\\Product\":27:{s:8:\"\0*\0table\";s:10:\"tp_product\";s:8:\"\0*\0dates\";a:1:{i:0;s:10:\"deleted_at\";}s:10:\"timestamps\";b:1;s:11:\"\0*\0fillable\";a:7:{i:0;s:2:\"id\";i:1;s:11:\"category_id\";i:2;s:8:\"brand_id\";i:3;s:4:\"name\";i:4;s:5:\"image\";i:5;s:6:\"status\";i:6;s:11:\"description\";}s:13:\"\0*\0connection\";s:5:\"mysql\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:13:\"\0*\0attributes\";a:10:{s:2:\"id\";i:2;s:11:\"category_id\";i:9;s:8:\"brand_id\";i:2;s:4:\"name\";s:17:\"Vans Old Skool v2\";s:5:\"image\";s:32:\"upload/1541994025MUS6BT-HERO.jpg\";s:6:\"status\";i:1;s:11:\"description\";N;s:10:\"deleted_at\";N;s:10:\"created_at\";s:19:\"2018-11-12 03:40:25\";s:10:\"updated_at\";s:19:\"2018-11-13 02:57:34\";}s:11:\"\0*\0original\";a:10:{s:2:\"id\";i:2;s:11:\"category_id\";i:9;s:8:\"brand_id\";i:2;s:4:\"name\";s:17:\"Vans Old Skool v2\";s:5:\"image\";s:32:\"upload/1541994025MUS6BT-HERO.jpg\";s:6:\"status\";i:1;s:11:\"description\";N;s:10:\"deleted_at\";N;s:10:\"created_at\";s:19:\"2018-11-12 03:40:25\";s:10:\"updated_at\";s:19:\"2018-11-13 02:57:34\";}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}s:16:\"\0*\0forceDeleting\";b:0;}s:5:\"color\";O:16:\"App\\Models\\Color\":27:{s:8:\"\0*\0table\";s:8:\"tp_color\";s:8:\"\0*\0dates\";a:1:{i:0;s:10:\"deleted_at\";}s:10:\"timestamps\";b:1;s:11:\"\0*\0fillable\";a:2:{i:0;s:2:\"id\";i:1;s:4:\"name\";}s:13:\"\0*\0connection\";s:5:\"mysql\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:13:\"\0*\0attributes\";a:6:{s:2:\"id\";i:3;s:4:\"name\";s:3:\"Red\";s:4:\"code\";s:6:\"df3b3b\";s:10:\"created_at\";N;s:10:\"updated_at\";N;s:10:\"deleted_at\";N;}s:11:\"\0*\0original\";a:6:{s:2:\"id\";i:3;s:4:\"name\";s:3:\"Red\";s:4:\"code\";s:6:\"df3b3b\";s:10:\"created_at\";N;s:10:\"updated_at\";N;s:10:\"deleted_at\";N;}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}s:16:\"\0*\0forceDeleting\";b:0;}}s:10:\"\0*\0touches\";a:0:{}s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}s:16:\"\0*\0forceDeleting\";b:0;}}}s:49:\"\0Gloudemans\\Shoppingcart\\CartItem\0associatedModel\";N;s:41:\"\0Gloudemans\\Shoppingcart\\CartItem\0taxRate\";i:0;}}}', '2018-11-16 00:51:44', NULL),
(303, '154235608987thaiphamaccforyou123@gmail.com87', 'default', 'O:29:\"Illuminate\\Support\\Collection\":1:{s:8:\"\0*\0items\";a:0:{}}', '2018-11-16 01:14:49', NULL),
(306, '154235636489thaiphamvitop.thaipham@gmail.com89', 'default', 'O:29:\"Illuminate\\Support\\Collection\":1:{s:8:\"\0*\0items\";a:0:{}}', '2018-11-16 01:19:24', NULL),
(308, '154235645588thaiphammrquangthai278@gmail.com88', 'default', 'O:29:\"Illuminate\\Support\\Collection\":1:{s:8:\"\0*\0items\";a:0:{}}', '2018-11-16 01:20:55', NULL),
(310, '154235717692thaiphammrquangthai278@gmail.com92', 'default', 'O:29:\"Illuminate\\Support\\Collection\":1:{s:8:\"\0*\0items\";a:0:{}}', '2018-11-16 01:32:56', NULL),
(313, '154235720291sonnguyenthanhsoemhoc222@gmail.com91', 'default', 'O:29:\"Illuminate\\Support\\Collection\":1:{s:8:\"\0*\0items\";a:1:{s:32:\"5a6686b9cc6d7164b4c8653aba7f629d\";O:32:\"Gloudemans\\Shoppingcart\\CartItem\":8:{s:5:\"rowId\";s:32:\"5a6686b9cc6d7164b4c8653aba7f629d\";s:2:\"id\";i:1;s:3:\"qty\";s:1:\"6\";s:4:\"name\";s:14:\"Vans Old Skool\";s:5:\"price\";d:5000;s:7:\"options\";O:39:\"Gloudemans\\Shoppingcart\\CartItemOptions\":1:{s:8:\"\0*\0items\";a:1:{s:14:\"product_detail\";O:24:\"App\\Models\\ProductDetail\":27:{s:8:\"\0*\0table\";s:17:\"tp_product_detail\";s:8:\"\0*\0dates\";a:1:{i:0;s:10:\"deleted_at\";}s:10:\"timestamps\";b:1;s:11:\"\0*\0fillable\";a:9:{i:0;s:2:\"id\";i:1;s:10:\"product_id\";i:2;s:8:\"color_id\";i:3;s:4:\"size\";i:4;s:4:\"name\";i:5;s:5:\"image\";i:6;s:5:\"price\";i:7;s:6:\"status\";i:8;s:8:\"quantity\";}s:13:\"\0*\0connection\";s:5:\"mysql\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:13:\"\0*\0attributes\";a:11:{s:2:\"id\";i:1;s:10:\"product_id\";i:1;s:8:\"color_id\";i:1;s:4:\"size\";i:41;s:4:\"name\";s:5:\"Ver A\";s:5:\"image\";s:32:\"upload/1542268152MUS6BT-HERO.jpg\";s:5:\"price\";i:5000;s:8:\"quantity\";i:10;s:10:\"deleted_at\";N;s:10:\"created_at\";N;s:10:\"updated_at\";s:19:\"2018-11-15 07:49:22\";}s:11:\"\0*\0original\";a:11:{s:2:\"id\";i:1;s:10:\"product_id\";i:1;s:8:\"color_id\";i:1;s:4:\"size\";i:41;s:4:\"name\";s:5:\"Ver A\";s:5:\"image\";s:32:\"upload/1542268152MUS6BT-HERO.jpg\";s:5:\"price\";i:5000;s:8:\"quantity\";i:10;s:10:\"deleted_at\";N;s:10:\"created_at\";N;s:10:\"updated_at\";s:19:\"2018-11-15 07:49:22\";}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:2:{s:7:\"product\";O:18:\"App\\Models\\Product\":27:{s:8:\"\0*\0table\";s:10:\"tp_product\";s:8:\"\0*\0dates\";a:1:{i:0;s:10:\"deleted_at\";}s:10:\"timestamps\";b:1;s:11:\"\0*\0fillable\";a:7:{i:0;s:2:\"id\";i:1;s:11:\"category_id\";i:2;s:8:\"brand_id\";i:3;s:4:\"name\";i:4;s:5:\"image\";i:5;s:6:\"status\";i:6;s:11:\"description\";}s:13:\"\0*\0connection\";s:5:\"mysql\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:13:\"\0*\0attributes\";a:10:{s:2:\"id\";i:1;s:11:\"category_id\";i:16;s:8:\"brand_id\";i:2;s:4:\"name\";s:14:\"Vans Old Skool\";s:5:\"image\";s:32:\"upload/1541992933MUS6BT-HERO.jpg\";s:6:\"status\";i:1;s:11:\"description\";s:14:\"Best p/p shoes\";s:10:\"deleted_at\";N;s:10:\"created_at\";s:19:\"2018-11-12 03:22:13\";s:10:\"updated_at\";s:19:\"2018-11-12 03:25:14\";}s:11:\"\0*\0original\";a:10:{s:2:\"id\";i:1;s:11:\"category_id\";i:16;s:8:\"brand_id\";i:2;s:4:\"name\";s:14:\"Vans Old Skool\";s:5:\"image\";s:32:\"upload/1541992933MUS6BT-HERO.jpg\";s:6:\"status\";i:1;s:11:\"description\";s:14:\"Best p/p shoes\";s:10:\"deleted_at\";N;s:10:\"created_at\";s:19:\"2018-11-12 03:22:13\";s:10:\"updated_at\";s:19:\"2018-11-12 03:25:14\";}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}s:16:\"\0*\0forceDeleting\";b:0;}s:5:\"color\";O:16:\"App\\Models\\Color\":27:{s:8:\"\0*\0table\";s:8:\"tp_color\";s:8:\"\0*\0dates\";a:1:{i:0;s:10:\"deleted_at\";}s:10:\"timestamps\";b:1;s:11:\"\0*\0fillable\";a:2:{i:0;s:2:\"id\";i:1;s:4:\"name\";}s:13:\"\0*\0connection\";s:5:\"mysql\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:13:\"\0*\0attributes\";a:6:{s:2:\"id\";i:1;s:4:\"name\";s:4:\"Gold\";s:4:\"code\";s:6:\"b19c83\";s:10:\"created_at\";N;s:10:\"updated_at\";N;s:10:\"deleted_at\";N;}s:11:\"\0*\0original\";a:6:{s:2:\"id\";i:1;s:4:\"name\";s:4:\"Gold\";s:4:\"code\";s:6:\"b19c83\";s:10:\"created_at\";N;s:10:\"updated_at\";N;s:10:\"deleted_at\";N;}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}s:16:\"\0*\0forceDeleting\";b:0;}}s:10:\"\0*\0touches\";a:0:{}s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}s:16:\"\0*\0forceDeleting\";b:0;}}}s:49:\"\0Gloudemans\\Shoppingcart\\CartItem\0associatedModel\";N;s:41:\"\0Gloudemans\\Shoppingcart\\CartItem\0taxRate\";i:0;}}}', '2018-11-16 01:33:22', NULL),
(315, '154235722693sonnguyenthanhsoemhoc222@gmail.com93', 'default', 'O:29:\"Illuminate\\Support\\Collection\":1:{s:8:\"\0*\0items\";a:0:{}}', '2018-11-16 01:33:46', NULL),
(319, '154235725695thaiphamaccforyou123@gmail.com95', 'default', 'O:29:\"Illuminate\\Support\\Collection\":1:{s:8:\"\0*\0items\";a:0:{}}', '2018-11-16 01:34:16', NULL),
(342, '154236159394thaiphamvitop.thaipham@gmail.com94', 'default', 'O:29:\"Illuminate\\Support\\Collection\":1:{s:8:\"\0*\0items\";a:0:{}}', '2018-11-16 02:46:33', NULL),
(346, '154236172196thaipham96', 'default', 'O:29:\"Illuminate\\Support\\Collection\":1:{s:8:\"\0*\0items\";a:1:{s:32:\"5a6686b9cc6d7164b4c8653aba7f629d\";O:32:\"Gloudemans\\Shoppingcart\\CartItem\":8:{s:5:\"rowId\";s:32:\"5a6686b9cc6d7164b4c8653aba7f629d\";s:2:\"id\";i:1;s:3:\"qty\";s:1:\"5\";s:4:\"name\";s:14:\"Vans Old Skool\";s:5:\"price\";d:5000;s:7:\"options\";O:39:\"Gloudemans\\Shoppingcart\\CartItemOptions\":1:{s:8:\"\0*\0items\";a:1:{s:14:\"product_detail\";O:24:\"App\\Models\\ProductDetail\":27:{s:8:\"\0*\0table\";s:17:\"tp_product_detail\";s:8:\"\0*\0dates\";a:1:{i:0;s:10:\"deleted_at\";}s:10:\"timestamps\";b:1;s:11:\"\0*\0fillable\";a:9:{i:0;s:2:\"id\";i:1;s:10:\"product_id\";i:2;s:8:\"color_id\";i:3;s:4:\"size\";i:4;s:4:\"name\";i:5;s:5:\"image\";i:6;s:5:\"price\";i:7;s:6:\"status\";i:8;s:8:\"quantity\";}s:13:\"\0*\0connection\";s:5:\"mysql\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:13:\"\0*\0attributes\";a:11:{s:2:\"id\";i:1;s:10:\"product_id\";i:1;s:8:\"color_id\";i:1;s:4:\"size\";i:41;s:4:\"name\";s:5:\"Ver A\";s:5:\"image\";s:32:\"upload/1542268152MUS6BT-HERO.jpg\";s:5:\"price\";i:5000;s:8:\"quantity\";i:10;s:10:\"deleted_at\";N;s:10:\"created_at\";N;s:10:\"updated_at\";s:19:\"2018-11-15 07:49:22\";}s:11:\"\0*\0original\";a:11:{s:2:\"id\";i:1;s:10:\"product_id\";i:1;s:8:\"color_id\";i:1;s:4:\"size\";i:41;s:4:\"name\";s:5:\"Ver A\";s:5:\"image\";s:32:\"upload/1542268152MUS6BT-HERO.jpg\";s:5:\"price\";i:5000;s:8:\"quantity\";i:10;s:10:\"deleted_at\";N;s:10:\"created_at\";N;s:10:\"updated_at\";s:19:\"2018-11-15 07:49:22\";}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:2:{s:7:\"product\";O:18:\"App\\Models\\Product\":27:{s:8:\"\0*\0table\";s:10:\"tp_product\";s:8:\"\0*\0dates\";a:1:{i:0;s:10:\"deleted_at\";}s:10:\"timestamps\";b:1;s:11:\"\0*\0fillable\";a:7:{i:0;s:2:\"id\";i:1;s:11:\"category_id\";i:2;s:8:\"brand_id\";i:3;s:4:\"name\";i:4;s:5:\"image\";i:5;s:6:\"status\";i:6;s:11:\"description\";}s:13:\"\0*\0connection\";s:5:\"mysql\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:13:\"\0*\0attributes\";a:10:{s:2:\"id\";i:1;s:11:\"category_id\";i:16;s:8:\"brand_id\";i:2;s:4:\"name\";s:14:\"Vans Old Skool\";s:5:\"image\";s:32:\"upload/1541992933MUS6BT-HERO.jpg\";s:6:\"status\";i:1;s:11:\"description\";s:14:\"Best p/p shoes\";s:10:\"deleted_at\";N;s:10:\"created_at\";s:19:\"2018-11-12 03:22:13\";s:10:\"updated_at\";s:19:\"2018-11-12 03:25:14\";}s:11:\"\0*\0original\";a:10:{s:2:\"id\";i:1;s:11:\"category_id\";i:16;s:8:\"brand_id\";i:2;s:4:\"name\";s:14:\"Vans Old Skool\";s:5:\"image\";s:32:\"upload/1541992933MUS6BT-HERO.jpg\";s:6:\"status\";i:1;s:11:\"description\";s:14:\"Best p/p shoes\";s:10:\"deleted_at\";N;s:10:\"created_at\";s:19:\"2018-11-12 03:22:13\";s:10:\"updated_at\";s:19:\"2018-11-12 03:25:14\";}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}s:16:\"\0*\0forceDeleting\";b:0;}s:5:\"color\";O:16:\"App\\Models\\Color\":27:{s:8:\"\0*\0table\";s:8:\"tp_color\";s:8:\"\0*\0dates\";a:1:{i:0;s:10:\"deleted_at\";}s:10:\"timestamps\";b:1;s:11:\"\0*\0fillable\";a:2:{i:0;s:2:\"id\";i:1;s:4:\"name\";}s:13:\"\0*\0connection\";s:5:\"mysql\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:13:\"\0*\0attributes\";a:6:{s:2:\"id\";i:1;s:4:\"name\";s:4:\"Gold\";s:4:\"code\";s:6:\"b19c83\";s:10:\"created_at\";N;s:10:\"updated_at\";N;s:10:\"deleted_at\";N;}s:11:\"\0*\0original\";a:6:{s:2:\"id\";i:1;s:4:\"name\";s:4:\"Gold\";s:4:\"code\";s:6:\"b19c83\";s:10:\"created_at\";N;s:10:\"updated_at\";N;s:10:\"deleted_at\";N;}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}s:16:\"\0*\0forceDeleting\";b:0;}}s:10:\"\0*\0touches\";a:0:{}s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}s:16:\"\0*\0forceDeleting\";b:0;}}}s:49:\"\0Gloudemans\\Shoppingcart\\CartItem\0associatedModel\";N;s:41:\"\0Gloudemans\\Shoppingcart\\CartItem\0taxRate\";i:0;}}}', '2018-11-16 02:48:41', NULL),
(619, '154510973039adminadmin@gmail.com39', 'default', 'O:29:\"Illuminate\\Support\\Collection\":1:{s:8:\"\0*\0items\";a:2:{s:32:\"5a6686b9cc6d7164b4c8653aba7f629d\";O:32:\"Gloudemans\\Shoppingcart\\CartItem\":8:{s:5:\"rowId\";s:32:\"5a6686b9cc6d7164b4c8653aba7f629d\";s:2:\"id\";i:1;s:3:\"qty\";s:1:\"6\";s:4:\"name\";s:14:\"Vans Old Skool\";s:5:\"price\";d:5000;s:7:\"options\";O:39:\"Gloudemans\\Shoppingcart\\CartItemOptions\":1:{s:8:\"\0*\0items\";a:1:{s:14:\"product_detail\";O:24:\"App\\Models\\ProductDetail\":27:{s:8:\"\0*\0table\";s:17:\"tp_product_detail\";s:8:\"\0*\0dates\";a:1:{i:0;s:10:\"deleted_at\";}s:10:\"timestamps\";b:1;s:11:\"\0*\0fillable\";a:9:{i:0;s:2:\"id\";i:1;s:10:\"product_id\";i:2;s:8:\"color_id\";i:3;s:4:\"size\";i:4;s:4:\"name\";i:5;s:5:\"image\";i:6;s:5:\"price\";i:7;s:6:\"status\";i:8;s:8:\"quantity\";}s:13:\"\0*\0connection\";s:5:\"mysql\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:13:\"\0*\0attributes\";a:11:{s:2:\"id\";i:1;s:10:\"product_id\";i:1;s:8:\"color_id\";i:1;s:4:\"size\";i:41;s:4:\"name\";s:5:\"Ver A\";s:5:\"image\";s:32:\"upload/1542268152MUS6BT-HERO.jpg\";s:5:\"price\";i:5000;s:8:\"quantity\";i:10;s:10:\"deleted_at\";N;s:10:\"created_at\";N;s:10:\"updated_at\";s:19:\"2018-11-15 07:49:22\";}s:11:\"\0*\0original\";a:11:{s:2:\"id\";i:1;s:10:\"product_id\";i:1;s:8:\"color_id\";i:1;s:4:\"size\";i:41;s:4:\"name\";s:5:\"Ver A\";s:5:\"image\";s:32:\"upload/1542268152MUS6BT-HERO.jpg\";s:5:\"price\";i:5000;s:8:\"quantity\";i:10;s:10:\"deleted_at\";N;s:10:\"created_at\";N;s:10:\"updated_at\";s:19:\"2018-11-15 07:49:22\";}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:2:{s:7:\"product\";O:18:\"App\\Models\\Product\":27:{s:8:\"\0*\0table\";s:10:\"tp_product\";s:8:\"\0*\0dates\";a:1:{i:0;s:10:\"deleted_at\";}s:10:\"timestamps\";b:1;s:11:\"\0*\0fillable\";a:7:{i:0;s:2:\"id\";i:1;s:11:\"category_id\";i:2;s:8:\"brand_id\";i:3;s:4:\"name\";i:4;s:5:\"image\";i:5;s:6:\"status\";i:6;s:11:\"description\";}s:13:\"\0*\0connection\";s:5:\"mysql\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:13:\"\0*\0attributes\";a:10:{s:2:\"id\";i:1;s:11:\"category_id\";i:16;s:8:\"brand_id\";i:2;s:4:\"name\";s:14:\"Vans Old Skool\";s:5:\"image\";s:32:\"upload/1541992933MUS6BT-HERO.jpg\";s:6:\"status\";i:1;s:11:\"description\";s:14:\"Best p/p shoes\";s:10:\"deleted_at\";N;s:10:\"created_at\";s:19:\"2018-11-12 03:22:13\";s:10:\"updated_at\";s:19:\"2018-11-12 03:25:14\";}s:11:\"\0*\0original\";a:10:{s:2:\"id\";i:1;s:11:\"category_id\";i:16;s:8:\"brand_id\";i:2;s:4:\"name\";s:14:\"Vans Old Skool\";s:5:\"image\";s:32:\"upload/1541992933MUS6BT-HERO.jpg\";s:6:\"status\";i:1;s:11:\"description\";s:14:\"Best p/p shoes\";s:10:\"deleted_at\";N;s:10:\"created_at\";s:19:\"2018-11-12 03:22:13\";s:10:\"updated_at\";s:19:\"2018-11-12 03:25:14\";}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}s:16:\"\0*\0forceDeleting\";b:0;}s:5:\"color\";O:16:\"App\\Models\\Color\":27:{s:8:\"\0*\0table\";s:8:\"tp_color\";s:8:\"\0*\0dates\";a:1:{i:0;s:10:\"deleted_at\";}s:10:\"timestamps\";b:1;s:11:\"\0*\0fillable\";a:2:{i:0;s:2:\"id\";i:1;s:4:\"name\";}s:13:\"\0*\0connection\";s:5:\"mysql\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:13:\"\0*\0attributes\";a:6:{s:2:\"id\";i:1;s:4:\"name\";s:4:\"Gold\";s:4:\"code\";s:6:\"b19c83\";s:10:\"created_at\";N;s:10:\"updated_at\";N;s:10:\"deleted_at\";N;}s:11:\"\0*\0original\";a:6:{s:2:\"id\";i:1;s:4:\"name\";s:4:\"Gold\";s:4:\"code\";s:6:\"b19c83\";s:10:\"created_at\";N;s:10:\"updated_at\";N;s:10:\"deleted_at\";N;}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}s:16:\"\0*\0forceDeleting\";b:0;}}s:10:\"\0*\0touches\";a:0:{}s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}s:16:\"\0*\0forceDeleting\";b:0;}}}s:49:\"\0Gloudemans\\Shoppingcart\\CartItem\0associatedModel\";N;s:41:\"\0Gloudemans\\Shoppingcart\\CartItem\0taxRate\";i:0;}s:32:\"907904c878a4dac797210dab2f354648\";O:32:\"Gloudemans\\Shoppingcart\\CartItem\":8:{s:5:\"rowId\";s:32:\"907904c878a4dac797210dab2f354648\";s:2:\"id\";i:2;s:3:\"qty\";s:1:\"5\";s:4:\"name\";s:17:\"Vans Old Skool v2\";s:5:\"price\";d:1;s:7:\"options\";O:39:\"Gloudemans\\Shoppingcart\\CartItemOptions\":1:{s:8:\"\0*\0items\";a:1:{s:14:\"product_detail\";O:24:\"App\\Models\\ProductDetail\":27:{s:8:\"\0*\0table\";s:17:\"tp_product_detail\";s:8:\"\0*\0dates\";a:1:{i:0;s:10:\"deleted_at\";}s:10:\"timestamps\";b:1;s:11:\"\0*\0fillable\";a:9:{i:0;s:2:\"id\";i:1;s:10:\"product_id\";i:2;s:8:\"color_id\";i:3;s:4:\"size\";i:4;s:4:\"name\";i:5;s:5:\"image\";i:6;s:5:\"price\";i:7;s:6:\"status\";i:8;s:8:\"quantity\";}s:13:\"\0*\0connection\";s:5:\"mysql\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:13:\"\0*\0attributes\";a:11:{s:2:\"id\";i:2;s:10:\"product_id\";i:2;s:8:\"color_id\";i:3;s:4:\"size\";N;s:4:\"name\";s:17:\"Vans Old Skool v3\";s:5:\"image\";s:32:\"upload/1542271266MUS6BT-HERO.jpg\";s:5:\"price\";i:1;s:8:\"quantity\";i:6;s:10:\"deleted_at\";N;s:10:\"created_at\";s:19:\"2018-11-15 08:41:06\";s:10:\"updated_at\";s:19:\"2018-11-15 08:41:06\";}s:11:\"\0*\0original\";a:11:{s:2:\"id\";i:2;s:10:\"product_id\";i:2;s:8:\"color_id\";i:3;s:4:\"size\";N;s:4:\"name\";s:17:\"Vans Old Skool v3\";s:5:\"image\";s:32:\"upload/1542271266MUS6BT-HERO.jpg\";s:5:\"price\";i:1;s:8:\"quantity\";i:6;s:10:\"deleted_at\";N;s:10:\"created_at\";s:19:\"2018-11-15 08:41:06\";s:10:\"updated_at\";s:19:\"2018-11-15 08:41:06\";}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:2:{s:7:\"product\";O:18:\"App\\Models\\Product\":27:{s:8:\"\0*\0table\";s:10:\"tp_product\";s:8:\"\0*\0dates\";a:1:{i:0;s:10:\"deleted_at\";}s:10:\"timestamps\";b:1;s:11:\"\0*\0fillable\";a:7:{i:0;s:2:\"id\";i:1;s:11:\"category_id\";i:2;s:8:\"brand_id\";i:3;s:4:\"name\";i:4;s:5:\"image\";i:5;s:6:\"status\";i:6;s:11:\"description\";}s:13:\"\0*\0connection\";s:5:\"mysql\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:13:\"\0*\0attributes\";a:10:{s:2:\"id\";i:2;s:11:\"category_id\";i:9;s:8:\"brand_id\";i:2;s:4:\"name\";s:17:\"Vans Old Skool v2\";s:5:\"image\";s:32:\"upload/1541994025MUS6BT-HERO.jpg\";s:6:\"status\";i:1;s:11:\"description\";N;s:10:\"deleted_at\";N;s:10:\"created_at\";s:19:\"2018-11-12 03:40:25\";s:10:\"updated_at\";s:19:\"2018-11-13 02:57:34\";}s:11:\"\0*\0original\";a:10:{s:2:\"id\";i:2;s:11:\"category_id\";i:9;s:8:\"brand_id\";i:2;s:4:\"name\";s:17:\"Vans Old Skool v2\";s:5:\"image\";s:32:\"upload/1541994025MUS6BT-HERO.jpg\";s:6:\"status\";i:1;s:11:\"description\";N;s:10:\"deleted_at\";N;s:10:\"created_at\";s:19:\"2018-11-12 03:40:25\";s:10:\"updated_at\";s:19:\"2018-11-13 02:57:34\";}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}s:16:\"\0*\0forceDeleting\";b:0;}s:5:\"color\";O:16:\"App\\Models\\Color\":27:{s:8:\"\0*\0table\";s:8:\"tp_color\";s:8:\"\0*\0dates\";a:1:{i:0;s:10:\"deleted_at\";}s:10:\"timestamps\";b:1;s:11:\"\0*\0fillable\";a:2:{i:0;s:2:\"id\";i:1;s:4:\"name\";}s:13:\"\0*\0connection\";s:5:\"mysql\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:13:\"\0*\0attributes\";a:6:{s:2:\"id\";i:3;s:4:\"name\";s:3:\"Red\";s:4:\"code\";s:6:\"df3b3b\";s:10:\"created_at\";N;s:10:\"updated_at\";N;s:10:\"deleted_at\";N;}s:11:\"\0*\0original\";a:6:{s:2:\"id\";i:3;s:4:\"name\";s:3:\"Red\";s:4:\"code\";s:6:\"df3b3b\";s:10:\"created_at\";N;s:10:\"updated_at\";N;s:10:\"deleted_at\";N;}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}s:16:\"\0*\0forceDeleting\";b:0;}}s:10:\"\0*\0touches\";a:0:{}s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}s:16:\"\0*\0forceDeleting\";b:0;}}}s:49:\"\0Gloudemans\\Shoppingcart\\CartItem\0associatedModel\";N;s:41:\"\0Gloudemans\\Shoppingcart\\CartItem\0taxRate\";i:0;}}}', '2018-12-17 22:08:50', NULL),
(799, '154511859797thanhlochongthanhloc1996@gmail.com97', 'default', 'O:29:\"Illuminate\\Support\\Collection\":1:{s:8:\"\0*\0items\";a:2:{s:32:\"f87a4de8cede42a8e21a3a6503fb3860\";O:32:\"Gloudemans\\Shoppingcart\\CartItem\":8:{s:5:\"rowId\";s:32:\"f87a4de8cede42a8e21a3a6503fb3860\";s:2:\"id\";i:14;s:3:\"qty\";s:2:\"50\";s:4:\"name\";s:9:\"Test Test\";s:5:\"price\";d:90;s:7:\"options\";O:39:\"Gloudemans\\Shoppingcart\\CartItemOptions\":1:{s:8:\"\0*\0items\";a:1:{s:14:\"product_detail\";O:24:\"App\\Models\\ProductDetail\":27:{s:8:\"\0*\0table\";s:17:\"tp_product_detail\";s:8:\"\0*\0dates\";a:1:{i:0;s:10:\"deleted_at\";}s:10:\"timestamps\";b:1;s:11:\"\0*\0fillable\";a:9:{i:0;s:2:\"id\";i:1;s:10:\"product_id\";i:2;s:8:\"color_id\";i:3;s:4:\"size\";i:4;s:4:\"name\";i:5;s:5:\"image\";i:6;s:5:\"price\";i:7;s:6:\"status\";i:8;s:8:\"quantity\";}s:13:\"\0*\0connection\";s:5:\"mysql\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:13:\"\0*\0attributes\";a:11:{s:2:\"id\";i:21;s:10:\"product_id\";i:14;s:8:\"color_id\";i:7;s:4:\"size\";i:42;s:4:\"name\";s:7:\"blue-42\";s:5:\"image\";s:27:\"upload/1545117807rs (2).jpg\";s:5:\"price\";i:90;s:8:\"quantity\";i:50;s:10:\"deleted_at\";N;s:10:\"created_at\";s:19:\"2018-12-18 07:23:27\";s:10:\"updated_at\";s:19:\"2018-12-18 07:23:27\";}s:11:\"\0*\0original\";a:11:{s:2:\"id\";i:21;s:10:\"product_id\";i:14;s:8:\"color_id\";i:7;s:4:\"size\";i:42;s:4:\"name\";s:7:\"blue-42\";s:5:\"image\";s:27:\"upload/1545117807rs (2).jpg\";s:5:\"price\";i:90;s:8:\"quantity\";i:50;s:10:\"deleted_at\";N;s:10:\"created_at\";s:19:\"2018-12-18 07:23:27\";s:10:\"updated_at\";s:19:\"2018-12-18 07:23:27\";}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:2:{s:7:\"product\";O:18:\"App\\Models\\Product\":27:{s:8:\"\0*\0table\";s:10:\"tp_product\";s:8:\"\0*\0dates\";a:1:{i:0;s:10:\"deleted_at\";}s:10:\"timestamps\";b:1;s:11:\"\0*\0fillable\";a:7:{i:0;s:2:\"id\";i:1;s:11:\"category_id\";i:2;s:8:\"brand_id\";i:3;s:4:\"name\";i:4;s:5:\"image\";i:5;s:6:\"status\";i:6;s:11:\"description\";}s:13:\"\0*\0connection\";s:5:\"mysql\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:13:\"\0*\0attributes\";a:10:{s:2:\"id\";i:14;s:11:\"category_id\";i:10;s:8:\"brand_id\";i:2;s:4:\"name\";s:9:\"Test Test\";s:5:\"image\";s:26:\"upload/1545117736rs(1).jpg\";s:6:\"status\";i:1;s:11:\"description\";s:18:\"AAAAAAAAAAAAAAAAAA\";s:10:\"deleted_at\";N;s:10:\"created_at\";s:19:\"2018-12-18 07:22:16\";s:10:\"updated_at\";s:19:\"2018-12-18 07:22:16\";}s:11:\"\0*\0original\";a:10:{s:2:\"id\";i:14;s:11:\"category_id\";i:10;s:8:\"brand_id\";i:2;s:4:\"name\";s:9:\"Test Test\";s:5:\"image\";s:26:\"upload/1545117736rs(1).jpg\";s:6:\"status\";i:1;s:11:\"description\";s:18:\"AAAAAAAAAAAAAAAAAA\";s:10:\"deleted_at\";N;s:10:\"created_at\";s:19:\"2018-12-18 07:22:16\";s:10:\"updated_at\";s:19:\"2018-12-18 07:22:16\";}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}s:16:\"\0*\0forceDeleting\";b:0;}s:5:\"color\";O:16:\"App\\Models\\Color\":27:{s:8:\"\0*\0table\";s:8:\"tp_color\";s:8:\"\0*\0dates\";a:1:{i:0;s:10:\"deleted_at\";}s:10:\"timestamps\";b:1;s:11:\"\0*\0fillable\";a:3:{i:0;s:2:\"id\";i:1;s:4:\"code\";i:2;s:4:\"name\";}s:13:\"\0*\0connection\";s:5:\"mysql\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:13:\"\0*\0attributes\";a:6:{s:2:\"id\";i:7;s:4:\"name\";s:4:\"Blue\";s:4:\"code\";s:6:\"0000FF\";s:10:\"created_at\";N;s:10:\"updated_at\";N;s:10:\"deleted_at\";N;}s:11:\"\0*\0original\";a:6:{s:2:\"id\";i:7;s:4:\"name\";s:4:\"Blue\";s:4:\"code\";s:6:\"0000FF\";s:10:\"created_at\";N;s:10:\"updated_at\";N;s:10:\"deleted_at\";N;}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}s:16:\"\0*\0forceDeleting\";b:0;}}s:10:\"\0*\0touches\";a:0:{}s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}s:16:\"\0*\0forceDeleting\";b:0;}}}s:49:\"\0Gloudemans\\Shoppingcart\\CartItem\0associatedModel\";N;s:41:\"\0Gloudemans\\Shoppingcart\\CartItem\0taxRate\";i:0;}s:32:\"0d6f5ea59806667d46c89cee2473c861\";O:32:\"Gloudemans\\Shoppingcart\\CartItem\":8:{s:5:\"rowId\";s:32:\"0d6f5ea59806667d46c89cee2473c861\";s:2:\"id\";i:12;s:3:\"qty\";s:2:\"12\";s:4:\"name\";s:20:\"Terrex Agravic Speed\";s:5:\"price\";d:120;s:7:\"options\";O:39:\"Gloudemans\\Shoppingcart\\CartItemOptions\":1:{s:8:\"\0*\0items\";a:1:{s:14:\"product_detail\";O:24:\"App\\Models\\ProductDetail\":27:{s:8:\"\0*\0table\";s:17:\"tp_product_detail\";s:8:\"\0*\0dates\";a:1:{i:0;s:10:\"deleted_at\";}s:10:\"timestamps\";b:1;s:11:\"\0*\0fillable\";a:9:{i:0;s:2:\"id\";i:1;s:10:\"product_id\";i:2;s:8:\"color_id\";i:3;s:4:\"size\";i:4;s:4:\"name\";i:5;s:5:\"image\";i:6;s:5:\"price\";i:7;s:6:\"status\";i:8;s:8:\"quantity\";}s:13:\"\0*\0connection\";s:5:\"mysql\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:13:\"\0*\0attributes\";a:11:{s:2:\"id\";i:18;s:10:\"product_id\";i:12;s:8:\"color_id\";i:7;s:4:\"size\";i:38;s:4:\"name\";s:7:\"blue-38\";s:5:\"image\";s:27:\"upload/1545077422rs (1).jpg\";s:5:\"price\";i:120;s:8:\"quantity\";i:12;s:10:\"deleted_at\";N;s:10:\"created_at\";s:19:\"2018-12-17 20:10:22\";s:10:\"updated_at\";s:19:\"2018-12-18 03:23:08\";}s:11:\"\0*\0original\";a:11:{s:2:\"id\";i:18;s:10:\"product_id\";i:12;s:8:\"color_id\";i:7;s:4:\"size\";i:38;s:4:\"name\";s:7:\"blue-38\";s:5:\"image\";s:27:\"upload/1545077422rs (1).jpg\";s:5:\"price\";i:120;s:8:\"quantity\";i:12;s:10:\"deleted_at\";N;s:10:\"created_at\";s:19:\"2018-12-17 20:10:22\";s:10:\"updated_at\";s:19:\"2018-12-18 03:23:08\";}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:2:{s:7:\"product\";O:18:\"App\\Models\\Product\":27:{s:8:\"\0*\0table\";s:10:\"tp_product\";s:8:\"\0*\0dates\";a:1:{i:0;s:10:\"deleted_at\";}s:10:\"timestamps\";b:1;s:11:\"\0*\0fillable\";a:7:{i:0;s:2:\"id\";i:1;s:11:\"category_id\";i:2;s:8:\"brand_id\";i:3;s:4:\"name\";i:4;s:5:\"image\";i:5;s:6:\"status\";i:6;s:11:\"description\";}s:13:\"\0*\0connection\";s:5:\"mysql\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:13:\"\0*\0attributes\";a:10:{s:2:\"id\";i:12;s:11:\"category_id\";i:8;s:8:\"brand_id\";i:3;s:4:\"name\";s:20:\"Terrex Agravic Speed\";s:5:\"image\";s:26:\"upload/1545077364rs(1).jpg\";s:6:\"status\";i:2;s:11:\"description\";N;s:10:\"deleted_at\";N;s:10:\"created_at\";s:19:\"2018-12-17 20:09:24\";s:10:\"updated_at\";s:19:\"2018-12-17 20:09:24\";}s:11:\"\0*\0original\";a:10:{s:2:\"id\";i:12;s:11:\"category_id\";i:8;s:8:\"brand_id\";i:3;s:4:\"name\";s:20:\"Terrex Agravic Speed\";s:5:\"image\";s:26:\"upload/1545077364rs(1).jpg\";s:6:\"status\";i:2;s:11:\"description\";N;s:10:\"deleted_at\";N;s:10:\"created_at\";s:19:\"2018-12-17 20:09:24\";s:10:\"updated_at\";s:19:\"2018-12-17 20:09:24\";}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}s:16:\"\0*\0forceDeleting\";b:0;}s:5:\"color\";O:16:\"App\\Models\\Color\":27:{s:8:\"\0*\0table\";s:8:\"tp_color\";s:8:\"\0*\0dates\";a:1:{i:0;s:10:\"deleted_at\";}s:10:\"timestamps\";b:1;s:11:\"\0*\0fillable\";a:3:{i:0;s:2:\"id\";i:1;s:4:\"code\";i:2;s:4:\"name\";}s:13:\"\0*\0connection\";s:5:\"mysql\";s:13:\"\0*\0primaryKey\";s:2:\"id\";s:10:\"\0*\0keyType\";s:3:\"int\";s:12:\"incrementing\";b:1;s:7:\"\0*\0with\";a:0:{}s:12:\"\0*\0withCount\";a:0:{}s:10:\"\0*\0perPage\";i:15;s:6:\"exists\";b:1;s:18:\"wasRecentlyCreated\";b:0;s:13:\"\0*\0attributes\";a:6:{s:2:\"id\";i:7;s:4:\"name\";s:4:\"Blue\";s:4:\"code\";s:6:\"0000FF\";s:10:\"created_at\";N;s:10:\"updated_at\";N;s:10:\"deleted_at\";N;}s:11:\"\0*\0original\";a:6:{s:2:\"id\";i:7;s:4:\"name\";s:4:\"Blue\";s:4:\"code\";s:6:\"0000FF\";s:10:\"created_at\";N;s:10:\"updated_at\";N;s:10:\"deleted_at\";N;}s:10:\"\0*\0changes\";a:0:{}s:8:\"\0*\0casts\";a:0:{}s:13:\"\0*\0dateFormat\";N;s:10:\"\0*\0appends\";a:0:{}s:19:\"\0*\0dispatchesEvents\";a:0:{}s:14:\"\0*\0observables\";a:0:{}s:12:\"\0*\0relations\";a:0:{}s:10:\"\0*\0touches\";a:0:{}s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}s:16:\"\0*\0forceDeleting\";b:0;}}s:10:\"\0*\0touches\";a:0:{}s:9:\"\0*\0hidden\";a:0:{}s:10:\"\0*\0visible\";a:0:{}s:10:\"\0*\0guarded\";a:1:{i:0;s:1:\"*\";}s:16:\"\0*\0forceDeleting\";b:0;}}}s:49:\"\0Gloudemans\\Shoppingcart\\CartItem\0associatedModel\";N;s:41:\"\0Gloudemans\\Shoppingcart\\CartItem\0taxRate\";i:0;}}}', '2018-12-18 00:36:37', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('admin@gmail.com', '$2y$10$WcuHG4lfqHYooXZZoYTucOBQASFiE.trFA35ks8uLG2HSs3J5AQYO', '2018-11-16 03:21:53'),
('mrquangthai278@gmail.com', '$2y$10$taP5hkiL3QL0Gcbx7JJ58OKo1KMLoWmvFnD8MekTAC9p5DlPkjBIC', '2018-11-16 04:03:06');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `social_accounts`
--

DROP TABLE IF EXISTS `social_accounts`;
CREATE TABLE IF NOT EXISTS `social_accounts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `provider_user_id` int(11) DEFAULT NULL,
  `provider` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tp_bill`
--

DROP TABLE IF EXISTS `tp_bill`;
CREATE TABLE IF NOT EXISTS `tp_bill` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(1) DEFAULT '1' COMMENT '1.Processing 2.Complete 3.Canceled',
  `note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `date_receive` date DEFAULT NULL,
  `date_delivery` date DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `paypal_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tp_bill_user_id_foreign` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tp_bill`
--

INSERT INTO `tp_bill` (`id`, `user_id`, `address`, `phone`, `status`, `note`, `date_receive`, `date_delivery`, `total`, `paypal_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(6, 97, 'hongthanhloc1996@gmail.com', '0383032891', 1, NULL, '2019-01-04', '2019-01-04', 412, NULL, '2018-12-17 20:10:40', '2018-12-17 20:10:40', NULL),
(7, 97, '1 Main St CA 1 Main St San Jose US', NULL, 2, 'vitop.thaipham@gmail.com', '2019-01-04', '2019-01-04', 537, 'PAY-5LM71427LX2220619LQMGNRA', '2018-12-17 20:17:57', '2018-12-17 20:18:42', NULL),
(8, 97, '1 Main St CA 1 Main St San Jose US', NULL, 4, 'vitop.thaipham@gmail.com', '2019-01-04', '2019-01-04', 1000, 'PAY-9R763169GG314880CLQMKBTY', '2018-12-18 00:25:38', '2018-12-18 00:25:38', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tp_bill_detail`
--

DROP TABLE IF EXISTS `tp_bill_detail`;
CREATE TABLE IF NOT EXISTS `tp_bill_detail` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `bill_id` int(10) UNSIGNED DEFAULT NULL,
  `product_detail_id` int(10) UNSIGNED DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tp_bill_detail_bill_id_foreign` (`bill_id`),
  KEY `tp_bill_detail_product_detail_id_foreign` (`product_detail_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tp_bill_detail`
--

INSERT INTO `tp_bill_detail` (`id`, `bill_id`, `product_detail_id`, `quantity`, `total`, `created_at`, `updated_at`, `deleted_at`) VALUES
(13, 6, 18, 3, 360, '2018-12-17 20:10:40', '2018-12-17 20:10:40', NULL),
(14, 6, 11, 2, 52, '2018-12-17 20:10:40', '2018-12-17 20:10:40', NULL),
(15, 7, 12, 3, 297, '2018-12-17 20:17:57', '2018-12-17 20:17:57', NULL),
(16, 7, 18, 2, 240, '2018-12-17 20:17:57', '2018-12-17 20:17:57', NULL),
(17, 8, 18, 5, 600, '2018-12-18 00:25:38', '2018-12-18 00:25:38', NULL),
(18, 8, 20, 4, 400, '2018-12-18 00:25:38', '2018-12-18 00:25:38', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tp_brand`
--

DROP TABLE IF EXISTS `tp_brand`;
CREATE TABLE IF NOT EXISTS `tp_brand` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tp_brand`
--

INSERT INTO `tp_brand` (`id`, `name`, `image`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Converse', 'upload/1541992008200px-Converse_logo.svg.png', '2018-11-11 20:06:48', '2018-11-11 20:06:48', NULL),
(2, 'Vans', 'upload/15419920169159c037deef39d83852f1b3946dcf4b.png', '2018-11-11 20:06:56', '2018-11-11 20:06:56', NULL),
(3, 'Adidas', 'upload/1541992025Adidas_Originals_logo.png', '2018-11-11 20:07:05', '2018-11-11 20:07:05', NULL),
(4, 'Gucci', 'upload/1541992032gucci-logo-D760C0492E-seeklogo.com_.png', '2018-11-11 20:07:12', '2018-11-11 20:07:12', NULL),
(5, 'Balenciaga', 'upload/1541992041Logo-Balenciaga.png', '2018-11-11 20:07:21', '2018-11-11 20:07:21', NULL),
(6, 'Nike', 'upload/1541992050nike-logo-5C7A059F94-seeklogo.com.png', '2018-11-11 20:07:30', '2018-11-11 20:07:30', NULL),
(7, 'Puma', 'upload/1541992057puma-logo-F9E13B654C-seeklogo.com.png', '2018-11-11 20:07:37', '2018-11-11 20:07:37', NULL),
(8, 'Timberland', 'upload/1543592701tảixuống.png', '2018-11-30 08:45:01', '2018-11-30 08:45:01', NULL),
(9, 'Cole Haan', 'upload/1545078128Cole_Haan_Logo_BlackOnWhite_hd_1600.jpg', '2018-12-17 12:11:42', '2018-12-17 13:22:08', NULL),
(10, 'BearPaw', 'upload/1545074842black-bear-paw-claws-vector-260nw-374158195.jpg', '2018-12-17 12:27:22', '2018-12-17 12:27:22', NULL),
(11, 'Levi\'s', 'upload/1545074934levis.jpg', '2018-12-17 12:28:54', '2018-12-17 12:28:54', NULL),
(12, 'Unisa', 'upload/1545078141aa1096110d6621cd63a9ab63205741dd.jpeg', '2018-12-17 12:39:45', '2018-12-17 13:22:21', NULL),
(13, 'Naturalizer', 'upload/1545078304Naturalizer.png', '2018-12-17 12:40:07', '2018-12-17 13:25:04', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tp_category`
--

DROP TABLE IF EXISTS `tp_category`;
CREATE TABLE IF NOT EXISTS `tp_category` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `parent_id` int(10) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tp_category`
--

INSERT INTO `tp_category` (`id`, `parent_id`, `name`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Luxury', NULL, NULL, '2018-12-17 11:57:23'),
(5, NULL, 'Sport', NULL, NULL, NULL),
(6, NULL, 'Sandals', NULL, NULL, NULL),
(7, 5, 'Soccer', NULL, NULL, NULL),
(8, 5, 'Running', NULL, NULL, NULL),
(9, 1, 'Boots', '2018-12-17 23:42:46', NULL, '2018-12-17 23:42:46'),
(10, 1, 'High Heels', NULL, NULL, NULL),
(11, 5, 'Training', NULL, NULL, NULL),
(12, 6, 'Flip Flops', NULL, NULL, NULL),
(13, 6, 'Flats ', NULL, NULL, NULL),
(14, 5, 'Tennis', NULL, '2018-11-11 20:19:02', '2018-11-11 20:19:02'),
(15, NULL, 'Sneaker', NULL, NULL, NULL),
(16, 15, 'Casual', NULL, '2018-11-11 20:20:14', '2018-11-11 20:20:14'),
(17, 15, 'Chunky', NULL, '2018-11-11 20:20:33', '2018-11-11 20:20:33'),
(18, 1, 'Boots', NULL, '2018-12-17 23:43:31', '2018-12-17 23:43:31');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tp_color`
--

DROP TABLE IF EXISTS `tp_color`;
CREATE TABLE IF NOT EXISTS `tp_color` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tp_color`
--

INSERT INTO `tp_color` (`id`, `name`, `code`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Gold', 'ffd900', NULL, NULL, NULL),
(2, 'Grey', '8c8c8c', NULL, NULL, NULL),
(3, 'Red', 'df3b3b', NULL, NULL, NULL),
(4, 'Purple', '9e12c9', NULL, '2018-12-17 22:18:51', NULL),
(5, 'White', 'ffffff', NULL, '2018-12-17 22:18:26', NULL),
(6, 'Black', '000000', NULL, NULL, NULL),
(7, 'Blue', '0000FF', NULL, NULL, NULL),
(8, 'Brown', 'DEB887', NULL, NULL, NULL),
(9, 'Pink', 'd119d1', '2018-12-17 21:18:26', '2018-12-17 21:18:26', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tp_comment`
--

DROP TABLE IF EXISTS `tp_comment`;
CREATE TABLE IF NOT EXISTS `tp_comment` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `product_id` int(10) UNSIGNED DEFAULT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `star` tinyint(4) NOT NULL DEFAULT '3' COMMENT '1-5 Star',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tp_comment_user_id_foreign` (`user_id`),
  KEY `tp_comment_product_id_foreign` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tp_comment`
--

INSERT INTO `tp_comment` (`id`, `user_id`, `product_id`, `content`, `star`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 39, 1, 'Best product', 4, '2018-12-17 12:03:49', '2018-11-15 00:45:12', '2018-12-17 12:03:49'),
(2, 39, 2, 'fsadsadsad', 4, '2018-12-17 12:03:49', '2018-11-15 03:16:58', '2018-12-17 12:03:49'),
(3, 97, 3, 'Hàng sử dụng tốt ,bền lâu', 4, '2018-12-17 12:04:52', '2018-11-30 08:37:55', '2018-12-17 12:04:52'),
(4, 97, 4, 'hàng ok', 5, '2018-12-17 12:04:52', '2018-11-30 09:00:42', '2018-12-17 12:04:52'),
(5, 97, 12, 'Mẫu mã đẹp', 4, NULL, '2018-12-17 13:27:08', '2018-12-17 13:27:08'),
(6, 97, 11, 'Chất lượng tốt', 5, NULL, '2018-12-17 13:35:10', '2018-12-17 13:35:10'),
(7, 97, 13, 'Sản phẩm dùng tốt', 5, NULL, '2018-12-17 13:36:44', '2018-12-17 13:36:44');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tp_feedback`
--

DROP TABLE IF EXISTS `tp_feedback`;
CREATE TABLE IF NOT EXISTS `tp_feedback` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `content` text,
  `star` int(11) DEFAULT '1',
  `reply` int(1) DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tp_feedback`
--

INSERT INTO `tp_feedback` (`id`, `user_id`, `content`, `star`, `reply`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 97, 'dịch vụ làm việc tốt, tôi rất thích', 5, 1, NULL, '2018-12-17 14:43:54', '2018-12-17 20:23:43');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tp_gallery`
--

DROP TABLE IF EXISTS `tp_gallery`;
CREATE TABLE IF NOT EXISTS `tp_gallery` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` int(10) UNSIGNED DEFAULT NULL,
  `url` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tp_gallery_product_id_foreign` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tp_gallery`
--

INSERT INTO `tp_gallery` (`id`, `product_id`, `url`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'upload/1541993060MUS6BT-HERO.jpg', '2018-11-11 20:24:20', '2018-11-11 20:24:20', NULL),
(2, 2, 'upload/1541996929MUS6BT-HERO.jpg', '2018-11-11 21:28:49', '2018-11-11 21:28:49', NULL),
(3, 2, 'upload/15420145129e70d7bdda84b6cf808d8f9e6b4758c6.jpg', '2018-11-12 02:21:52', '2018-11-12 02:21:52', NULL),
(4, 2, 'upload/154201451235a0dd4304fd6cd49243433925c027c3.jpg', '2018-11-12 02:21:52', '2018-11-12 02:21:52', NULL),
(5, 2, 'upload/154201451228753004_178492066122361_8401511258578223104_n.jpg', '2018-11-12 02:21:52', '2018-11-12 02:21:52', NULL),
(6, 2, 'upload/1542014512ginneynoa.jpg', '2018-11-12 02:21:52', '2018-11-12 02:21:52', NULL),
(7, 2, 'upload/1542014512img_0007-e1501393429496.jpg', '2018-11-12 02:21:52', '2018-11-12 02:21:52', NULL),
(8, 2, 'upload/1542014512maxresdefault.jpg', '2018-11-12 02:21:52', '2018-11-12 02:21:52', NULL),
(9, 4, 'upload/1543592876shoes_ia92631.jpg', '2018-11-30 08:47:56', '2018-11-30 08:47:56', NULL),
(10, 4, 'upload/1543592876shoes_ib92631.jpg', '2018-11-30 08:47:56', '2018-11-30 08:47:56', NULL),
(11, 4, 'upload/1543592876shoes_id92631.jpg', '2018-11-30 08:47:56', '2018-11-30 08:47:56', NULL),
(12, 4, 'upload/1543592876shoes_if92631.jpg', '2018-11-30 08:47:56', '2018-11-30 08:47:56', NULL),
(13, 4, 'upload/1543593020shoes_ia92634.jpg', '2018-11-30 08:50:20', '2018-11-30 08:50:20', NULL),
(14, 4, 'upload/1543593020shoes_ib92634.jpg', '2018-11-30 08:50:20', '2018-11-30 08:50:20', NULL),
(15, 4, 'upload/1543593020shoes_id92634.jpg', '2018-11-30 08:50:20', '2018-11-30 08:50:20', NULL),
(16, 4, 'upload/1543593021shoes_if92634.jpg', '2018-11-30 08:50:21', '2018-11-30 08:50:21', NULL),
(17, 5, 'upload/1543629091shoes_ia18041.jpg', '2018-11-30 18:51:31', '2018-11-30 18:51:54', '2018-11-30 18:51:54'),
(18, 5, 'upload/1543629091shoes_ib18041.jpg', '2018-11-30 18:51:31', '2018-11-30 18:51:54', '2018-11-30 18:51:54'),
(19, 5, 'upload/1543629091shoes_id18041.jpg', '2018-11-30 18:51:31', '2018-11-30 18:51:31', NULL),
(20, 5, 'upload/1543629091shoes_if18041.jpg', '2018-11-30 18:51:31', '2018-11-30 18:51:31', NULL),
(21, 7, 'upload/1545074523shoes_ia93428.jpg', '2018-12-17 12:22:03', '2018-12-17 12:22:03', NULL),
(22, 7, 'upload/1545074523shoes_ib93428.jpg', '2018-12-17 12:22:03', '2018-12-17 12:22:03', NULL),
(23, 7, 'upload/1545074523shoes_id93428.jpg', '2018-12-17 12:22:03', '2018-12-17 12:22:03', NULL),
(24, 7, 'upload/1545074523shoes_ie93428.jpg', '2018-12-17 12:22:03', '2018-12-17 12:22:03', NULL),
(25, 7, 'upload/1545074523shoes_if93428.jpg', '2018-12-17 12:22:03', '2018-12-17 12:22:03', NULL),
(26, 8, 'upload/1545075158shoes_ia93057.jpg', '2018-12-17 12:32:38', '2018-12-17 12:32:38', NULL),
(27, 8, 'upload/1545075158shoes_ib93057.jpg', '2018-12-17 12:32:38', '2018-12-17 12:32:38', NULL),
(28, 8, 'upload/1545075158shoes_id93057.jpg', '2018-12-17 12:32:38', '2018-12-17 12:32:38', NULL),
(29, 8, 'upload/1545075158shoes_ie93057.jpg', '2018-12-17 12:32:38', '2018-12-17 12:32:38', NULL),
(30, 8, 'upload/1545075158shoes_if93057.jpg', '2018-12-17 12:32:38', '2018-12-17 12:32:38', NULL),
(31, 9, 'upload/1545075358shoes_ia92922.jpg', '2018-12-17 12:35:58', '2018-12-17 12:35:58', NULL),
(32, 9, 'upload/1545075358shoes_ib92922.jpg', '2018-12-17 12:35:58', '2018-12-17 12:35:58', NULL),
(33, 9, 'upload/1545075358shoes_id92922.jpg', '2018-12-17 12:35:58', '2018-12-17 12:35:58', NULL),
(34, 9, 'upload/1545075358shoes_ie92922.jpg', '2018-12-17 12:35:58', '2018-12-17 12:35:58', NULL),
(35, 9, 'upload/1545075358shoes_if92922.jpg', '2018-12-17 12:35:58', '2018-12-17 12:35:58', NULL),
(36, 10, 'upload/1545076005shoes_ia92375.jpg', '2018-12-17 12:46:45', '2018-12-17 12:46:45', NULL),
(37, 10, 'upload/1545076005shoes_ib92375.jpg', '2018-12-17 12:46:45', '2018-12-17 12:46:45', NULL),
(38, 10, 'upload/1545076006shoes_id92375.jpg', '2018-12-17 12:46:46', '2018-12-17 12:46:46', NULL),
(39, 10, 'upload/1545076006shoes_ie92375.jpg', '2018-12-17 12:46:46', '2018-12-17 12:46:46', NULL),
(40, 10, 'upload/1545076006shoes_if92375.jpg', '2018-12-17 12:46:46', '2018-12-17 12:46:46', NULL),
(41, 11, 'upload/1545076535shoes_ia56922.jpg', '2018-12-17 12:55:35', '2018-12-17 12:55:35', NULL),
(42, 11, 'upload/1545076545shoes_ib56922.jpg', '2018-12-17 12:55:45', '2018-12-17 12:55:45', NULL),
(43, 11, 'upload/1545076545shoes_id56922.jpg', '2018-12-17 12:55:45', '2018-12-17 12:55:45', NULL),
(44, 11, 'upload/1545076545shoes_ie56922.jpg', '2018-12-17 12:55:45', '2018-12-17 12:55:45', NULL),
(45, 11, 'upload/1545076545shoes_if56922.jpg', '2018-12-17 12:55:45', '2018-12-17 12:55:45', NULL),
(46, 12, 'upload/1545077435rs(1).jpg', '2018-12-17 13:10:35', '2018-12-17 13:10:35', NULL),
(47, 12, 'upload/1545077435rs(2).jpg', '2018-12-17 13:10:35', '2018-12-17 13:10:35', NULL),
(48, 12, 'upload/1545077435rs(3).jpg', '2018-12-17 13:10:35', '2018-12-17 13:10:35', NULL),
(49, 12, 'upload/1545077435rs(4).jpg', '2018-12-17 13:10:35', '2018-12-17 13:10:35', NULL),
(50, 12, 'upload/1545077435rs.jpg', '2018-12-17 13:10:35', '2018-12-17 13:10:35', NULL),
(51, 13, 'upload/1545077678rs(1).jpg', '2018-12-17 13:14:38', '2018-12-17 13:14:38', NULL),
(52, 13, 'upload/1545077678rs(2).jpg', '2018-12-17 13:14:38', '2018-12-17 13:14:38', NULL),
(53, 13, 'upload/1545077678rs(5).jpg', '2018-12-17 13:14:38', '2018-12-17 13:14:38', NULL),
(54, 13, 'upload/1545077678rs.jpg', '2018-12-17 13:14:38', '2018-12-17 13:14:38', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tp_product`
--

DROP TABLE IF EXISTS `tp_product`;
CREATE TABLE IF NOT EXISTS `tp_product` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_id` int(10) UNSIGNED DEFAULT NULL,
  `brand_id` int(10) UNSIGNED DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT '1' COMMENT '1:now 2:stop 3:coming',
  `description` text COLLATE utf8mb4_unicode_ci,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tp_product_category_id_foreign` (`category_id`),
  KEY `tp_product_brand_id_foreign` (`brand_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tp_product`
--

INSERT INTO `tp_product` (`id`, `category_id`, `brand_id`, `name`, `image`, `status`, `description`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 16, 2, 'Vans Old Skool', 'upload/1541992933MUS6BT-HERO.jpg', 1, 'Best p/p shoes', NULL, '2018-11-11 20:22:13', '2018-12-17 12:03:49'),
(2, 9, 2, 'Vans Old Skool v2', 'upload/1541994025MUS6BT-HERO.jpg', 1, NULL, NULL, '2018-11-11 20:40:25', '2018-12-17 12:03:49'),
(3, 16, 6, 'TANJUN SNEAKER', 'upload/1543591007shoes_ib59550.jpg', 1, NULL, NULL, '2018-11-30 08:16:47', '2018-12-17 12:04:52'),
(4, 9, 8, 'GROVETON CHUKKA  BOOT', 'upload/1543592761shoes_ib92631.jpg', 1, NULL, NULL, '2018-11-30 08:46:01', '2018-12-17 12:04:52'),
(5, 8, 3, 'adiads', 'upload/1543628923shoes_ib18041.jpg', 1, 'giay dep', NULL, '2018-11-30 18:48:43', '2018-12-17 12:04:52'),
(6, 13, 6, 'BENASSI JDI SLIDE SANDALS', 'upload/1545072361shoes_ia36398.jpg', 1, 'Giầy đẹp chất lượng cao', NULL, '2018-12-17 11:46:01', '2018-12-17 11:54:28'),
(7, 18, 9, 'GRAND TOUR CHUKKA', 'upload/1545074151shoes_ia93428.jpg', 1, NULL, NULL, '2018-12-17 12:15:51', '2018-12-17 23:44:29'),
(8, 18, 10, 'OVERLAND WATERPROOF HIKING WINTER BOOT', 'upload/1545075070shoes_ia93057.jpg', 1, NULL, NULL, '2018-12-17 12:31:10', '2018-12-17 23:44:13'),
(9, 18, 11, 'NORFOLK LACE UP BOOT', 'upload/1545075278shoes_ia92922.jpg', 1, NULL, NULL, '2018-12-17 12:34:38', '2018-12-17 23:44:01'),
(10, 10, 12, 'WOMEN\'S ROWEN BOOTIE', 'upload/1545075840shoes_ia92375.jpg', 2, 'Giày sắp ra mắt', NULL, '2018-12-17 12:44:00', '2018-12-17 12:44:00'),
(11, 10, 13, 'LEAH DRESS HIGH HEELS', 'upload/1545076443shoes_ia56922.jpg', 1, NULL, NULL, '2018-12-17 12:54:04', '2018-12-17 12:54:04'),
(12, 8, 3, 'Terrex Agravic Speed', 'upload/1545077364rs(1).jpg', 2, NULL, NULL, '2018-12-17 13:09:24', '2018-12-17 13:09:24'),
(13, 8, 3, 'Terrex Two Boa Shoes', 'upload/1545077618rs(1).jpg', 1, NULL, NULL, '2018-12-17 13:13:38', '2018-12-17 13:13:38'),
(14, 10, 2, 'Test Test', 'upload/1545117736rs(1).jpg', 1, 'AAAAAAAAAAAAAAAAAA', NULL, '2018-12-18 00:22:16', '2018-12-18 00:22:16');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tp_product_detail`
--

DROP TABLE IF EXISTS `tp_product_detail`;
CREATE TABLE IF NOT EXISTS `tp_product_detail` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` int(10) UNSIGNED DEFAULT NULL,
  `color_id` int(10) UNSIGNED DEFAULT NULL,
  `size` int(2) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tp_product_detail_product_id_foreign` (`product_id`),
  KEY `tp_product_detail_color_id_foreign` (`color_id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tp_product_detail`
--

INSERT INTO `tp_product_detail` (`id`, `product_id`, `color_id`, `size`, `name`, `image`, `price`, `quantity`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 41, 'Ver A', 'upload/1542268152MUS6BT-HERO.jpg', 5000, 9, NULL, NULL, '2018-11-30 08:02:37'),
(2, 2, 3, NULL, 'Vans Old Skool v3', 'upload/1542271266MUS6BT-HERO.jpg', 1, 6, NULL, '2018-11-15 01:41:06', '2018-11-15 01:41:06'),
(3, 3, 3, 37, 'Red 37', 'upload/1543591248shoes_ib59550.jpg', 100, 10, NULL, '2018-11-30 08:20:48', '2018-11-30 08:20:48'),
(4, 3, 2, 40, 'Grey 40', 'upload/1543591270shoes_ib59550.jpg', 105, 5, NULL, '2018-11-30 08:21:10', '2018-11-30 08:21:10'),
(5, 4, 3, 37, 'GROVETON CHUKKA SNEAKER BOOT RED', 'upload/1543592833shoes_ib92631.jpg', 79, 10, NULL, '2018-11-30 08:47:13', '2018-11-30 08:47:13'),
(6, 4, 6, 38, 'GROVETON CHUKKA SNEAKER BOOT BLACK', 'upload/1543592995shoes_ib92634.jpg', 80, 7, NULL, '2018-11-30 08:49:55', '2018-11-30 09:26:52'),
(7, 5, 7, 37, 'adiads blue', 'upload/1543629060shoes_ib18041.jpg', 50, 10, NULL, '2018-11-30 18:51:00', '2018-11-30 18:51:00'),
(8, 4, 3, 38, 'timberland red', 'upload/1543630144shoes_ib92631.jpg', 50, 10, NULL, '2018-11-30 19:09:04', '2018-11-30 19:09:04'),
(9, 6, 6, 37, 'MEN\'S BENASSI JDI SLIDE 37', 'upload/1545072411shoes_ia36398.jpg', 24, 15, NULL, '2018-12-17 11:46:51', '2018-12-17 11:50:46'),
(10, 6, 6, 38, 'MEN\'S BENASSI JDI SLIDE 38', 'upload/1545072481shoes_ia36398.jpg', 26, 10, NULL, '2018-12-17 11:48:01', '2018-12-17 11:50:22'),
(11, 6, 6, 39, 'MEN\'S BENASSI JDI SLIDE 39', 'upload/1545072560shoes_ia36398.jpg', 26, 7, NULL, '2018-12-17 11:49:20', '2018-12-17 11:49:20'),
(12, 7, 8, 37, 'Brown-37', 'upload/1545074504shoes_ia93428.jpg', 99, 19, NULL, '2018-12-17 12:21:44', '2018-12-17 20:23:08'),
(13, 7, 8, 38, 'Brown-38', 'upload/1545074579shoes_ia93428.jpg', 99, 12, NULL, '2018-12-17 12:22:59', '2018-12-17 12:22:59'),
(14, 8, 6, 39, 'Black Brown - 39', 'upload/1545075141shoes_ia93057.jpg', 60, 17, NULL, '2018-12-17 12:32:21', '2018-12-17 12:32:21'),
(15, 9, 8, 36, 'Dark Brown- 36', 'upload/1545075339shoes_ia92922.jpg', 46, 16, NULL, '2018-12-17 12:35:39', '2018-12-17 12:35:39'),
(16, 10, 6, 37, 'Black-37', 'upload/1545075889shoes_ia92375.jpg', 79, 20, NULL, '2018-12-17 12:44:49', '2018-12-17 12:44:49'),
(17, 11, 5, 37, 'white pink', 'upload/1545076524shoes_ia56922.jpg', 90, 11, NULL, '2018-12-17 12:55:24', '2018-12-17 12:55:24'),
(18, 12, 7, 38, 'blue-38', 'upload/1545077422rs (1).jpg', 120, 12, NULL, '2018-12-17 13:10:22', '2018-12-17 20:23:08'),
(19, 13, 5, 37, 'white-36', 'upload/1545077656rs.jpg', 90, 16, NULL, '2018-12-17 13:14:16', '2018-12-17 13:14:16'),
(20, 14, 7, 40, 'blue-40', 'upload/1545117777rs (2).jpg', 100, 100, NULL, '2018-12-18 00:22:57', '2018-12-18 00:22:57'),
(21, 14, 7, 42, 'blue-42', 'upload/1545117807rs (2).jpg', 90, 50, NULL, '2018-12-18 00:23:27', '2018-12-18 00:23:27');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tp_specification`
--

DROP TABLE IF EXISTS `tp_specification`;
CREATE TABLE IF NOT EXISTS `tp_specification` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` int(10) UNSIGNED DEFAULT NULL,
  `material` tinyint(4) DEFAULT NULL COMMENT '1.Leather 2.Canvas 3.Other',
  `gender` tinyint(4) DEFAULT NULL COMMENT '1.Male 2.Female 3.Unisex',
  `trendy` tinyint(4) DEFAULT NULL COMMENT '1.Street 2.Vintage 3.High-end 4.Other',
  `weight` float DEFAULT '0',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tp_specification_product_id_foreign` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tp_specification`
--

INSERT INTO `tp_specification` (`id`, `product_id`, `material`, `gender`, `trendy`, `weight`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 3, 1, 1.5, '2018-12-17 12:03:49', '2018-11-11 20:22:13', '2018-12-17 12:03:49'),
(2, 2, 2, 1, 3, 2, '2018-12-17 12:03:49', '2018-11-11 20:40:25', '2018-12-17 12:03:49'),
(3, 3, 1, 2, 2, 2.5, '2018-12-17 12:04:52', '2018-11-30 08:16:47', '2018-12-17 12:04:52'),
(4, 4, 0, 1, 4, 1.8, '2018-12-17 12:04:52', '2018-11-30 08:46:01', '2018-12-17 12:04:52'),
(5, 5, NULL, NULL, NULL, 0, '2018-12-17 12:04:52', '2018-11-30 18:48:43', '2018-12-17 12:04:52'),
(6, 6, NULL, NULL, NULL, 0, NULL, '2018-12-17 11:46:02', '2018-12-17 11:46:02'),
(7, 7, NULL, NULL, NULL, 0, NULL, '2018-12-17 12:15:51', '2018-12-17 12:15:51'),
(8, 8, NULL, NULL, NULL, 0, NULL, '2018-12-17 12:31:10', '2018-12-17 12:31:10'),
(9, 9, NULL, NULL, NULL, 0, NULL, '2018-12-17 12:34:38', '2018-12-17 12:34:38'),
(10, 10, NULL, NULL, NULL, 0, NULL, '2018-12-17 12:44:00', '2018-12-17 12:44:00'),
(11, 11, NULL, NULL, NULL, 0, NULL, '2018-12-17 12:54:04', '2018-12-17 12:54:04'),
(12, 12, NULL, NULL, NULL, 0, NULL, '2018-12-17 13:09:24', '2018-12-17 13:09:24'),
(13, 13, 1, 2, 2, 1, NULL, '2018-12-17 13:13:38', '2018-12-17 20:25:58'),
(14, 14, NULL, NULL, NULL, 0, NULL, '2018-12-18 00:22:16', '2018-12-18 00:22:16');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tp_user`
--

DROP TABLE IF EXISTS `tp_user`;
CREATE TABLE IF NOT EXISTS `tp_user` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group_id` int(10) UNSIGNED DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password2nd` int(6) NOT NULL DEFAULT '123456',
  `provider` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `provider_id` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gender` int(11) DEFAULT NULL COMMENT '1:male 2:female',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `tp_user_group_id_foreign` (`group_id`)
) ENGINE=InnoDB AUTO_INCREMENT=98 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `tp_user`
--

INSERT INTO `tp_user` (`id`, `username`, `group_id`, `first_name`, `last_name`, `image`, `address`, `phone`, `email`, `password`, `password2nd`, `provider`, `provider_id`, `gender`, `remember_token`, `deleted_at`, `created_at`, `updated_at`) VALUES
(39, 'admin', 1, 'Thái', 'Phạm', 'upload/1542165053iphone-x-256gb-silver-400x460.png', '1234567789', '0901234567', 'admin@gmail.com', '$2y$10$Mcv/Nf8uzaaJA73BQ2Wvru4SxMHbY9j3l8YiuLCNyaWc/Tab0WUPa', 123456, NULL, NULL, 1, '8k1raU0u2vNqUFPPrRr0t2i6ZJOVKu2c9jKo8jyiwEPG6p7J2SJSMUBAusqC', NULL, NULL, '2018-11-30 08:08:53'),
(43, 'admin1', 1, 'Thái', 'Dúi', 'upload/user/154045758122688671_352284811887968_2938503844386741342_n.jpg', NULL, NULL, 'admin1@gmail.com', '$2y$10$7GJ3GsYUpVYMkxA1wBQVi.uqiDaynKmxsiJv9Y7xRR7nYFk0p9J2q', 0, NULL, NULL, 1, NULL, NULL, '2018-10-25 01:52:08', '2018-10-25 03:47:38'),
(50, 'sonthai1996', 2, 'Sơn', 'Thái', 'upload/154158849140065051_471955986619224_812535949010403328_n.png', '1234567789', '0901234567', 'admin13123@gmail.com', '$2y$10$Fz7.cRpFbbnkkjaTkxUQte80xJteEGNrDDUhdzvlFyN3LXE4YyFlq', 123456, NULL, NULL, 1, NULL, '2018-11-07 20:04:05', '2018-11-07 04:01:31', '2018-11-07 20:04:05'),
(60, 'accforyou123', 2, 'Thái', 'Dúi', 'upload/154158499643693519_244047603134616_4910733999858515968_n.jpg', '792/23 Doan VanBo', '0904464478', 'accforyou123@gmail.com', '$2y$10$cgJAJXIzo3p/5w8dzAjO0ecM8zhZtlZ5O8WBKJbDutrmOC4SOCq.q', 0, NULL, NULL, 1, 'CpYNcP2xrlxtyZDYx9wcDB3w6nEegVo0uDDsp1zEH5HCzvxot4WcWftLv256', NULL, '2018-10-25 01:52:08', '2018-11-16 04:06:35'),
(80, 'accforyou123', 2, 'Thái', 'Dúi', 'upload/154158499643693519_244047603134616_4910733999858515968_n.jpg', '792/23 Doan VanBo', '0904464478', 'accforyou123@gmail.com', '', 0, NULL, NULL, 1, NULL, NULL, '2018-10-25 01:52:08', '2018-11-07 03:03:16'),
(92, 'thaipham', 2, 'Thái', 'Phạm', 'upload/user/1542357168thaipham', NULL, NULL, 'mrquangthai278@gmail.com', NULL, 123456, 'google', '107532138900884478021', NULL, 'x8x4zxktejMDw2f4aWreQM1lUKbjgxiwvUvxL2aCPIh7GNxNx22iKUtAODFz', NULL, '2018-11-16 01:32:49', '2018-11-16 01:32:49'),
(93, 'sonnguyenthanh', 2, 'son', 'nguyen thanh', 'upload/user/1542357222sonnguyenthanh', NULL, NULL, 'soemhoc222@gmail.com', NULL, 123456, 'google', '106118625832609922317', NULL, 'fBPHzUBGjab4XoQn7hiXpOaol3jKMFmiIKgEUYx9eyzkXKrDXSPywaH6E1H0', NULL, '2018-11-16 01:33:43', '2018-11-16 01:33:43'),
(94, 'thaipham', 2, 'Thái', 'Phạm', 'upload/user/1542357237thaipham', NULL, NULL, 'vitop.thaipham@gmail.com', NULL, 123456, 'google', '107696113562240369664', NULL, 'qfV5i2jClp8B0bd7xsq5uNcei9qO0dmaRVZ8Vnik0382baRRfuh0Auz7RbZO', NULL, '2018-11-16 01:33:57', '2018-11-16 01:33:57'),
(95, 'thaipham', 2, 'Thái', 'Phạm', 'upload/user/1542357252thaipham', NULL, NULL, 'accforyou123@gmail.com', NULL, 123456, 'google', '103220311927942754268', NULL, 'BOofXeLuusfs9Wje8Gx6hMuKXJLyAxbRvxBn4AZ2qtRy0Fg8z0gYjp3TgbJM', NULL, '2018-11-16 01:34:12', '2018-11-16 01:34:12'),
(96, 'thaipham', 2, NULL, NULL, 'upload/user/1542357263thaipham', NULL, NULL, NULL, NULL, 123456, 'facebook', '559198627863251', NULL, 'kLYlTCJLeEIzjNaCyUusrjLhE4xTzD8Jmjt1emuEsnEujzDicnOhHkZatsp5', NULL, '2018-11-16 01:34:25', '2018-11-16 01:34:25'),
(97, 'thanhloc', 2, 'Thành', 'Lộc', 'upload/user/1543589838thanhloc', '123456', '123456', 'hongthanhloc1996@gmail.com', NULL, 123456, 'google', '111577275916707713776', 1, 'aMuk6VX4OF2Njg4OLFA8F9jITwd7ERqSy0tS1WfJHSbHiDyCfHcgX5fO3cHB', NULL, '2018-11-30 07:57:19', '2018-11-30 09:22:39');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tp_user_group`
--

DROP TABLE IF EXISTS `tp_user_group`;
CREATE TABLE IF NOT EXISTS `tp_user_group` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
