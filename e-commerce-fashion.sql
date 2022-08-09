-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Agu 2022 pada 08.41
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-commerce-fashion`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `cart_item`
--

DROP TABLE IF EXISTS `cart_item`;
CREATE TABLE IF NOT EXISTS `cart_item` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `session_id` int(11) UNSIGNED NOT NULL,
  `product_id` int(11) UNSIGNED NOT NULL,
  `size` varchar(5) NOT NULL,
  `color` varchar(100) NOT NULL,
  `quantity` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `modified_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cart_item_session_id_foreign` (`session_id`),
  KEY `cart_item_product_id_foreign` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `cart_item`
--

INSERT INTO `cart_item` (`id`, `session_id`, `product_id`, `size`, `color`, `quantity`, `created_at`, `modified_at`) VALUES
(2, 2, 7, 'XL', 'Hitam', 2, NULL, NULL),
(7, 11, 28, 'XL', 'Hitam', 1, '2022-08-08 05:58:15', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `color`
--

DROP TABLE IF EXISTS `color`;
CREATE TABLE IF NOT EXISTS `color` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` int(11) UNSIGNED NOT NULL,
  `color` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `color`
--

INSERT INTO `color` (`id`, `product_id`, `color`, `created_at`, `modified_at`) VALUES
(1, 7, 'Hitam', '2022-07-30 03:37:29', '2022-07-30 03:37:29'),
(2, 7, 'Merah', '2022-07-30 03:37:29', '2022-07-30 03:37:29'),
(3, 7, 'Biru', '2022-07-30 03:37:29', '2022-07-30 03:37:29'),
(4, 7, 'Hijau', '2022-07-30 03:37:29', '2022-07-30 03:37:29'),
(5, 7, 'Kuning', '2022-07-30 06:48:54', '2022-07-30 06:48:54'),
(7, 10, 'Hitam', '2022-08-08 04:08:25', '2022-08-08 04:12:52'),
(8, 28, 'Hitam', '2022-08-08 04:19:59', '2022-08-08 04:20:11'),
(9, 28, 'Merah', '2022-08-08 04:20:22', '2022-08-08 04:20:22'),
(10, 28, 'Biru', '2022-08-08 04:20:32', '2022-08-08 04:20:32'),
(11, 28, 'Navy', '2022-08-08 04:20:41', '2022-08-08 04:20:41');

-- --------------------------------------------------------

--
-- Struktur dari tabel `discount`
--

DROP TABLE IF EXISTS `discount`;
CREATE TABLE IF NOT EXISTS `discount` (
  `discount_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `discount_name` varchar(255) NOT NULL,
  `discount_desc` text DEFAULT NULL,
  `discount_percent` double NOT NULL,
  `active` enum('active','failed') NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `modified_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`discount_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `discount`
--

INSERT INTO `discount` (`discount_id`, `discount_name`, `discount_desc`, `discount_percent`, `active`, `created_at`, `modified_at`, `deleted_at`) VALUES
(1, 'Tidak Ada', 'Untuk mengisi diproduk jika tidak ada diskon', 0, 'active', '2022-07-18 07:03:55', '2022-07-22 08:23:27', NULL),
(2, 'Diskon Lebaran', 'Diskon Lebaran', 50, 'active', '2022-07-20 01:58:43', NULL, NULL),
(3, 'Diskon Hari Merdeka', 'Diskon Hari Merdeka', 25, 'active', '2022-07-16 21:18:03', '2022-07-22 08:27:14', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `room_number` int(11) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `sender_id` int(11) UNSIGNED NOT NULL,
  `recipient_id` int(11) UNSIGNED NOT NULL,
  `message` text NOT NULL,
  `is_read` int(1) NOT NULL DEFAULT 0,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `message_sender_id_foreign` (`sender_id`),
  KEY `message_recipient_id_foreign` (`recipient_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `message`
--

INSERT INTO `message` (`id`, `room_number`, `user_id`, `sender_id`, `recipient_id`, `message`, `is_read`, `time`) VALUES
(1, 1, 2, 2, 1, 'Halo Aku Satu\r\n', 1, '2022-07-28 10:28:41'),
(2, 1, 2, 1, 2, 'Iya halo aku dua', 1, '2022-07-28 10:28:41'),
(3, 2, 3, 3, 1, 'Halo', 1, '2022-07-28 10:34:45'),
(4, 2, 3, 1, 3, 'iya', 0, '2022-07-27 09:23:20'),
(6, 1, 2, 2, 1, 'Punten Brow', 1, '2022-07-28 10:28:41'),
(14, 2, 3, 1, 3, 'Holaaa Berhasilllll', 0, '2022-07-27 10:08:19'),
(15, 2, 3, 3, 1, 'Yeayyy!', 1, '2022-07-28 10:34:45'),
(16, 1, 2, 1, 2, 'Ada apa brow', 1, '2022-07-28 10:28:41'),
(19, 2, 3, 1, 3, 'Alhamdulillah', 0, '2022-07-28 08:42:19'),
(20, 2, 3, 3, 1, 'Mantap', 1, '2022-08-01 11:43:36'),
(24, 1, 2, 1, 2, 'Cek cek', 0, '2022-07-28 10:31:23'),
(25, 1, 2, 2, 1, 'coba', 1, '2022-08-01 13:54:28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `message_latest`
--

DROP TABLE IF EXISTS `message_latest`;
CREATE TABLE IF NOT EXISTS `message_latest` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) UNSIGNED NOT NULL,
  `message_id` int(11) UNSIGNED NOT NULL,
  `time_in` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `message_id` (`message_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `message_latest`
--

INSERT INTO `message_latest` (`id`, `user_id`, `message_id`, `time_in`) VALUES
(1, 2, 25, '2022-07-28 10:00:52'),
(5, 3, 20, '2022-08-01 11:19:30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `message_room`
--

DROP TABLE IF EXISTS `message_room`;
CREATE TABLE IF NOT EXISTS `message_room` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) UNSIGNED NOT NULL,
  `message_id` int(11) UNSIGNED NOT NULL,
  `room` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `message_id` (`message_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `message_room`
--

INSERT INTO `message_room` (`id`, `user_id`, `message_id`, `room`, `created_at`, `modified_at`) VALUES
(1, 2, 1, 1, '2022-07-19 21:30:24', '2022-07-27 07:00:25'),
(2, 1, 2, 1, '2022-07-19 21:31:50', '2022-07-27 07:01:37'),
(3, 2, 6, 1, '2022-07-25 18:26:35', '2022-07-27 07:03:25'),
(4, 3, 3, 2, '2022-07-21 03:52:33', '2022-07-27 08:04:24'),
(5, 3, 14, 2, '2022-07-27 08:45:23', '2022-07-27 08:45:41'),
(6, 3, 19, 2, '2022-07-28 08:42:19', '2022-07-28 08:42:19'),
(7, 3, 20, 2, '2022-07-28 08:43:03', '2022-07-28 08:43:03'),
(11, 2, 24, 1, '2022-07-28 09:05:24', '2022-07-28 09:05:24'),
(12, 2, 25, 1, '2022-07-28 10:00:52', '2022-07-28 10:00:52');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=82 DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(67, '2022-07-10-163455', 'App\\Database\\Migrations\\User', 'default', 'App', 1658049400, 1),
(68, '2022-07-11-033257', 'App\\Database\\Migrations\\UserAddress', 'default', 'App', 1658049401, 1),
(69, '2022-07-11-041643', 'App\\Database\\Migrations\\UserPayment', 'default', 'App', 1658049402, 1),
(70, '2022-07-11-050040', 'App\\Database\\Migrations\\ShoppingSession', 'default', 'App', 1658049403, 1),
(71, '2022-07-11-050516', 'App\\Database\\Migrations\\ProductCategory', 'default', 'App', 1658049403, 1),
(72, '2022-07-11-051300', 'App\\Database\\Migrations\\ProductInventory', 'default', 'App', 1658049403, 1),
(73, '2022-07-11-051907', 'App\\Database\\Migrations\\Discount', 'default', 'App', 1658049404, 1),
(74, '2022-07-11-052412', 'App\\Database\\Migrations\\Product', 'default', 'App', 1658049404, 1),
(75, '2022-07-11-053619', 'App\\Database\\Migrations\\CartItem', 'default', 'App', 1658049404, 1),
(76, '2022-07-11-055231', 'App\\Database\\Migrations\\PaymentDetails', 'default', 'App', 1658049404, 1),
(77, '2022-07-11-060858', 'App\\Database\\Migrations\\OrderDetails', 'default', 'App', 1658049405, 1),
(78, '2022-07-11-061239', 'App\\Database\\Migrations\\OrderItems', 'default', 'App', 1658049406, 1),
(79, '2022-07-12-044339', 'App\\Database\\Migrations\\Store', 'default', 'App', 1658049407, 1),
(80, '2022-07-20-112852', 'App\\Database\\Migrations\\Message', 'default', 'App', 1658316940, 2),
(81, '2022-07-11-052050', 'App\\Database\\Migrations\\ProductBrand', 'default', 'App', 1658892545, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `order_delivery`
--

DROP TABLE IF EXISTS `order_delivery`;
CREATE TABLE IF NOT EXISTS `order_delivery` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `expedition` varchar(255) NOT NULL,
  `shiping` varchar(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `order_delivery`
--

INSERT INTO `order_delivery` (`id`, `expedition`, `shiping`, `created_at`, `modified_at`) VALUES
(1, 'J&T', '5000', '2022-07-31 10:57:15', '2022-07-31 10:57:15'),
(2, 'JNE', '5000', '2022-07-31 10:57:15', '2022-07-31 10:57:15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `order_details`
--

DROP TABLE IF EXISTS `order_details`;
CREATE TABLE IF NOT EXISTS `order_details` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `invoice` varchar(20) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `delivery_id` int(11) UNSIGNED NOT NULL,
  `resi` varchar(50) NOT NULL,
  `subtotal` varchar(11) NOT NULL,
  `shiping` int(11) NOT NULL,
  `total` decimal(11,0) NOT NULL,
  `payment_id` int(11) UNSIGNED NOT NULL,
  `booking_date` timestamp NULL DEFAULT NULL,
  `delivery_date` timestamp NULL DEFAULT NULL,
  `date_received` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `order_details_user_id_foreign` (`user_id`),
  KEY `order_details_payment_id_foreign` (`payment_id`),
  KEY `delivery_id` (`delivery_id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `order_product`
--

DROP TABLE IF EXISTS `order_product`;
CREATE TABLE IF NOT EXISTS `order_product` (
  `order_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `invoice` varchar(20) NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `product_id` int(11) UNSIGNED NOT NULL,
  `payment_id` int(11) UNSIGNED NOT NULL,
  `delivery_id` int(11) UNSIGNED NOT NULL,
  `size_item` varchar(5) NOT NULL,
  `color_item` varchar(100) NOT NULL,
  `qty` int(11) NOT NULL,
  `status_item` enum('in','delivery','complete') NOT NULL,
  `resi` varchar(50) NOT NULL,
  `subtotal` int(11) NOT NULL,
  `shiping` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `booking_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `delivery_date` timestamp NULL DEFAULT NULL,
  `date_received` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`order_id`),
  KEY `order_items_product_id_foreign` (`product_id`),
  KEY `user_id_ibfk_1` (`user_id`),
  KEY `payment_id` (`payment_id`),
  KEY `delivery_id` (`delivery_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `order_product`
--

INSERT INTO `order_product` (`order_id`, `invoice`, `user_id`, `product_id`, `payment_id`, `delivery_id`, `size_item`, `color_item`, `qty`, `status_item`, `resi`, `subtotal`, `shiping`, `total`, `booking_date`, `delivery_date`, `date_received`) VALUES
(15, 'INV0808220001', 2, 10, 33, 2, '32', 'Hitam', 2, 'complete', 'JNP87283232', 144900, 5000, 224900, '2022-08-08 05:52:04', '2022-08-08 06:12:38', '2022-08-08 06:25:39'),
(16, 'INV0808220001', 2, 7, 33, 2, 'L', 'Hitam', 2, 'complete', 'JNP87283232', 75000, 5000, 224900, '2022-08-08 05:52:04', '2022-08-08 06:12:45', '2022-08-08 06:27:49'),
(17, 'INV0908220001', 5, 7, 34, 1, 'M', 'Merah', 1, 'delivery', 'JNT88921312', 37500, 5000, 42500, '2022-08-09 06:14:45', '2022-08-09 06:22:48', NULL);

--
-- Trigger `order_product`
--
DROP TRIGGER IF EXISTS `InsertOrderItem`;
DELIMITER $$
CREATE TRIGGER `InsertOrderItem` BEFORE INSERT ON `order_product` FOR EACH ROW BEGIN
	UPDATE product set quantity = quantity - NEW.qty 
    WHERE id = NEW.product_id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `payment_details`
--

DROP TABLE IF EXISTS `payment_details`;
CREATE TABLE IF NOT EXISTS `payment_details` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_payment_id` int(11) UNSIGNED NOT NULL,
  `gross_amount` int(11) NOT NULL,
  `bank` varchar(255) NOT NULL,
  `transaction_status` varchar(100) NOT NULL,
  `transaction_time` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `payment_id` (`user_payment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `payment_details`
--

INSERT INTO `payment_details` (`id`, `user_payment_id`, `gross_amount`, `bank`, `transaction_status`, `transaction_time`) VALUES
(33, 34, 224900, 'bri', 'pending', '2022-08-08 05:52:01'),
(34, 35, 42500, 'bri', 'pending', '2022-08-09 06:14:43');

-- --------------------------------------------------------

--
-- Struktur dari tabel `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `desc` text DEFAULT NULL,
  `category_id` int(11) UNSIGNED NOT NULL,
  `brand_id` int(11) UNSIGNED NOT NULL,
  `material` varchar(100) NOT NULL,
  `weight` varchar(10) NOT NULL,
  `quantity` int(11) NOT NULL,
  `discount_id` int(11) UNSIGNED DEFAULT NULL,
  `original_price` int(11) NOT NULL,
  `price` decimal(11,0) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `modified_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `product_category_id_foreign` (`category_id`),
  KEY `product_discount_id_foreign` (`discount_id`),
  KEY `brand_id` (`brand_id`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `product`
--

INSERT INTO `product` (`id`, `name`, `image`, `slug`, `desc`, `category_id`, `brand_id`, `material`, `weight`, `quantity`, `discount_id`, `original_price`, `price`, `created_at`, `modified_at`, `deleted_at`) VALUES
(7, 'Kaos Polos', 'kaos.jpg', 'kaos-polos', '<p>Ready kaos polos super premium\r\n</p><p>DETAIL KAOS :\r\nKaos polos basic\r\nmatt spandex asli premium 30s\r\nBahan adem,lembut ,nyerap keringat,di jamin nyaman di pakai\r\nJahitan rantai rapi standar distro clothing\r\n</p><p>\r\nNB:\r\nBUKAN SPANDEX PE YG HARGA JUAL 18 RIBUAN\r\nTEKSTUR BAHAN PANAS DAN CEPAT BERBULU</p><p>\r\n\r\nSIZE CHART :\r\nM=LD 96cm x PJG 66cm\r\nL=LD 98cm x PJG 68cm\r\nXL=LD 100cm x  PJG 70cm\r\n</p><p>Toleransi 1-2 cm, karna produksi nya massal\r\nBerat produk 180gr\r\n1kg muat 7 pcs\r\n\r\nKualitas original mantap\r\nreal pict & good quality\r\n\r\n\r\n#kaospolos #T-shirtso-neck #kaosdistro #kaospolosmurah #kaospolosspandex\r\n\r\nTerima kasih!</p>', 1, 2, 'cotton', '300gram', 86, 2, 75000, '37500', '2022-07-20 01:59:50', '2022-08-08 04:02:31', NULL),
(10, 'Celana panjang jeans premium', 'Celana panjang jeans pria hitam premium.jpg', 'celana-panjang-jeans-premium', '<p>==========================================\r\n</p><p>● Bahan : Badjatex Premium Stretch</p><p>● Model : Slim Fit\r\n</p><p>● Bahan Strerch /  elastis nyaman dipakai</p><p>\r\n==========================================\r\n</p><p>\r\nPanduan Size Chart Lokal :</p><p>\r\nUkuran  28 : Lingkaran pinggang 72 cm x Panjang Celana 98 cm\r\n</p><p>Ukuran  30 : Lingkaran pinggang 78 cm x Panjang Celana 99 cm</p><p>Ukuran  32 : Lingkaran pinggang 83 cm x Panjang Celana 100 cm\r\n</p><p>Ukuran  34 : Lingkaran pinggang 88 cm x Panjang Celana 101 cm</p><p>\r\n\r\n*Toleransi Ukuran 1-2 Centimeters\r\n\r\nLengkapi keseharian kalian dengan CELVIN DENIM STRETCH. Bahan kualitas premium dan diproduksi dari tangan-tangan kreatif INDONESIA bakal bikin hari hari kalian semakin sempurna.\r\nBahan Denim Stretch (bahan melar / ngaret) dan potongan SLIMFIT akan bikin kalian nyaman, bebas bergerak, dan terlihat semakin kece.\r\n\r\nHappy Shopping Guyss :)</p>', 2, 1, 'levis', '320gram', 93, 2, 144900, '72450', '2022-07-22 08:01:58', '2022-08-08 04:03:08', NULL),
(28, 'Crewneck Champions', 'asdasd_1.jpg', 'crewneck-champions', '<p>SIZE CHART CHAMPION\r\n</p><p>Panjang X Lebar\r\n</p><p>M- 64 x 50</p><p>L- 65 x 52</p><p>XL- 67 x 55\r\n</p><p>\r\nFULL LABEL\r\n</p><p>\r\nNOTE: </p><p>Kenapa murah? Karena ini barang langsung dari pabrik dan tidak lulus QC (QUALITY CONTROL) atau barang sisa lebih, Jadi kalo ada beberapa yang kotor dikit jangan kaget yahh, namanya barang tidak lulus QC tapi dijamin ? ORIGINAL dan barang sama seperti di store, kalau mau barang perfect langsung beli di storenya aja yahh.</p>', 1, 1, 'adasd', '340gram', 22, 1, 150000, '150000', '2022-07-30 05:03:30', '2022-08-08 04:41:43', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `product_brand`
--

DROP TABLE IF EXISTS `product_brand`;
CREATE TABLE IF NOT EXISTS `product_brand` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `modified_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `product_brand`
--

INSERT INTO `product_brand` (`id`, `name`, `slug`, `created_at`, `modified_at`, `deleted_at`) VALUES
(1, 'No Brand', 'no-brand', '2022-07-26 15:41:18', NULL, NULL),
(2, 'Erigo', 'erigo', '2022-07-26 15:41:18', NULL, NULL),
(3, 'Aerostreet', 'aerostreet', '2022-07-27 06:57:46', '2022-07-27 06:59:47', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `product_category`
--

DROP TABLE IF EXISTS `product_category`;
CREATE TABLE IF NOT EXISTS `product_category` (
  `category_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) NOT NULL,
  `category_slug` varchar(225) NOT NULL,
  `category_desc` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `modified_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`category_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `product_category`
--

INSERT INTO `product_category` (`category_id`, `category_name`, `category_slug`, `category_desc`, `created_at`, `modified_at`, `deleted_at`) VALUES
(1, 'Baju', 'baju', 'Baju-baju bagus', '2022-07-16 21:17:51', '2022-07-27 06:39:35', NULL),
(2, 'Celana', 'celana', 'Celana-celana bagus', '2022-07-16 21:17:51', '2022-07-27 06:39:41', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `shopping_session`
--

DROP TABLE IF EXISTS `shopping_session`;
CREATE TABLE IF NOT EXISTS `shopping_session` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) UNSIGNED NOT NULL,
  `total` decimal(20,0) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `modified_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `shopping_session_user_id_foreign` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `shopping_session`
--

INSERT INTO `shopping_session` (`id`, `user_id`, `total`, `created_at`, `modified_at`) VALUES
(2, 3, '37500', NULL, NULL),
(10, 2, '150000', '2022-08-08 05:56:25', NULL),
(11, 2, '150000', '2022-08-08 05:58:15', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `size`
--

DROP TABLE IF EXISTS `size`;
CREATE TABLE IF NOT EXISTS `size` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` int(11) UNSIGNED NOT NULL,
  `size` varchar(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `modified_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `size`
--

INSERT INTO `size` (`id`, `product_id`, `size`, `created_at`, `modified_at`) VALUES
(1, 7, 'S', '2022-07-30 03:38:14', '2022-07-30 03:38:14'),
(2, 7, 'M', '2022-07-30 03:38:14', '2022-07-30 03:38:14'),
(3, 7, 'L', '2022-07-30 03:38:14', '2022-07-30 03:38:14'),
(4, 7, 'XL', '2022-07-30 03:38:14', '2022-07-30 03:38:14'),
(5, 7, 'XXL', '2022-07-30 06:45:48', '2022-07-30 06:46:02'),
(8, 10, '28', '2022-08-08 04:24:27', '2022-08-08 04:25:38'),
(9, 10, '29', '2022-08-08 04:26:20', '2022-08-08 04:26:20'),
(10, 10, '30', '2022-08-08 04:26:31', '2022-08-08 04:26:31'),
(11, 10, '31', '2022-08-08 04:26:42', '2022-08-08 04:26:42'),
(12, 10, '32', '2022-08-08 04:26:52', '2022-08-08 04:26:52'),
(13, 10, '33', '2022-08-08 04:27:07', '2022-08-08 04:27:07'),
(14, 10, '34', '2022-08-08 04:27:50', '2022-08-08 04:27:50'),
(15, 10, '35', '2022-08-08 04:27:59', '2022-08-08 04:28:06'),
(16, 28, 'M', '2022-08-08 04:28:32', '2022-08-08 04:28:32'),
(17, 28, 'S', '2022-08-08 04:28:43', '2022-08-08 04:28:43'),
(18, 28, 'L', '2022-08-08 04:28:54', '2022-08-08 04:28:54'),
(19, 28, 'XL', '2022-08-08 04:29:11', '2022-08-08 04:29:11'),
(20, 28, 'XXL', '2022-08-08 04:29:23', '2022-08-08 04:29:23');

-- --------------------------------------------------------

--
-- Struktur dari tabel `store`
--

DROP TABLE IF EXISTS `store`;
CREATE TABLE IF NOT EXISTS `store` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `about` varchar(255) NOT NULL,
  `address` text DEFAULT NULL,
  `telephone` varchar(13) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `instagram` varchar(255) NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `modified_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `store`
--

INSERT INTO `store` (`id`, `name`, `email`, `image`, `about`, `address`, `telephone`, `facebook`, `instagram`, `twitter`, `created_at`, `modified_at`) VALUES
(1, 'LEON.ID', 'leon_id@gmail.com', 'LEON.ID.png', 'Leon ID merupakan sebuah usaha toko online shop yang bergerak di bidang fashion', 'Cirebon, Jawa Barat, ID', '0889898989', '#', '#', '#', '2022-07-16 21:17:38', '2022-08-09 06:23:29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `image` varchar(255) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `last_name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `telephone` varchar(13) NOT NULL,
  `level` enum('admin','user') NOT NULL,
  `status` enum('offline','online') NOT NULL DEFAULT 'offline',
  `created_at` timestamp NULL DEFAULT NULL,
  `modified_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `image`, `first_name`, `last_name`, `email`, `telephone`, `level`, `status`, `created_at`, `modified_at`) VALUES
(1, 'admin', '$2y$10$vPvqNvGrk9ArMZaKldTjxexIxDm.PC.1q4tH9XJ9yV.9TP84CfVC6', 'avatar-1.png', 'Moh', 'Irwansyah', 'mohammadirwansyah1933@gmail.com', '083825287988', 'admin', 'offline', '2022-07-16 21:17:13', '2022-08-03 04:43:57'),
(2, 'user', '$2y$10$slfY443MHVJdzhrFTln5p.KOLiGMabiqJaYK1mKo5Pszk4xkGM0Fm', 'user.png', 'User', '', 'user@gmail.com', '081233434392', 'user', 'offline', '2022-07-16 21:17:13', '2022-07-16 21:17:13'),
(3, 'percobaan', 'percobaan', 'percobaan.png', 'Percobaan', '', 'percobaan@gmail.com', '0813434433', 'user', 'offline', '2022-07-21 10:50:47', NULL),
(5, 'mirwansyahs', '$2y$10$vPvqNvGrk9ArMZaKldTjxexIxDm.PC.1q4tH9XJ9yV.9TP84CfVC6', 'avatar-1.png', 'Mohammad', 'Irwansyah Somantri', 'mirwansyah1933@gmail.com', '083825287989', 'user', 'online', '2022-08-09 06:09:57', '2022-08-09 06:09:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_address`
--

DROP TABLE IF EXISTS `user_address`;
CREATE TABLE IF NOT EXISTS `user_address` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) UNSIGNED NOT NULL,
  `address` varchar(255) NOT NULL,
  `country` varchar(100) NOT NULL,
  `province` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `district` varchar(100) NOT NULL,
  `village` varchar(100) NOT NULL,
  `postal_code` varchar(5) NOT NULL,
  `telephone` varchar(13) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_address_user_id_foreign` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `user_address`
--

INSERT INTO `user_address` (`id`, `user_id`, `address`, `country`, `province`, `city`, `district`, `village`, `postal_code`, `telephone`) VALUES
(1, 1, 'jl. abc no 45', 'Indonesia', 'Jawa Barat', 'Cirebon', 'Waled', 'Ciuyah', '98272', '0812334343'),
(2, 2, 'jl. sds no 40', 'Indonesia', 'Jawa Barat', 'Cirebon', 'Waled', 'Ambit', '98232', '0823232423'),
(3, 3, 'cek', 'cek', '', '', '', '', '3223', '0823232'),
(5, 5, 'Jl. RA Kartini', 'Indonesia', 'Jawa Barat', 'Cirebon', 'Ciledug', 'Ciledug Kulon', '45188', '083825287989');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_payment`
--

DROP TABLE IF EXISTS `user_payment`;
CREATE TABLE IF NOT EXISTS `user_payment` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `user_id` int(11) UNSIGNED NOT NULL,
  `payment_type` varchar(255) NOT NULL,
  `va_number` varchar(100) NOT NULL,
  `expiry` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_payment_user_id_foreign` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `user_payment`
--

INSERT INTO `user_payment` (`id`, `user_id`, `payment_type`, `va_number`, `expiry`) VALUES
(34, 2, 'bank_transfer', '785009126813079457', NULL),
(35, 5, 'bank_transfer', '785009140860671147', NULL);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `cart_item`
--
ALTER TABLE `cart_item`
  ADD CONSTRAINT `cart_item_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cart_item_session_id_foreign` FOREIGN KEY (`session_id`) REFERENCES `shopping_session` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `color`
--
ALTER TABLE `color`
  ADD CONSTRAINT `color_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_recipient_id_foreign` FOREIGN KEY (`recipient_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `message_sender_id_foreign` FOREIGN KEY (`sender_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `message_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `message_latest`
--
ALTER TABLE `message_latest`
  ADD CONSTRAINT `message_latest_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `message_latest_ibfk_2` FOREIGN KEY (`message_id`) REFERENCES `message` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `message_room`
--
ALTER TABLE `message_room`
  ADD CONSTRAINT `message` FOREIGN KEY (`message_id`) REFERENCES `message` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_delivery_id_foreign` FOREIGN KEY (`delivery_id`) REFERENCES `order_delivery` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_details_payment_id_foreign` FOREIGN KEY (`payment_id`) REFERENCES `payment_details` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_details_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `order_product`
--
ALTER TABLE `order_product`
  ADD CONSTRAINT `order_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_product_ibfk_1` FOREIGN KEY (`payment_id`) REFERENCES `payment_details` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `order_product_ibfk_2` FOREIGN KEY (`delivery_id`) REFERENCES `order_delivery` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_id_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `payment_details`
--
ALTER TABLE `payment_details`
  ADD CONSTRAINT `payment_details_ibfk_1` FOREIGN KEY (`user_payment_id`) REFERENCES `user_payment` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_brand_id_foreign` FOREIGN KEY (`brand_id`) REFERENCES `product_brand` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `product_category` (`category_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `product_discount_id_foreign` FOREIGN KEY (`discount_id`) REFERENCES `discount` (`discount_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `shopping_session`
--
ALTER TABLE `shopping_session`
  ADD CONSTRAINT `shopping_session_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `size`
--
ALTER TABLE `size`
  ADD CONSTRAINT `size_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `user_address`
--
ALTER TABLE `user_address`
  ADD CONSTRAINT `user_address_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `user_payment`
--
ALTER TABLE `user_payment`
  ADD CONSTRAINT `user_payment_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
