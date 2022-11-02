-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Nov 02, 2022 at 09:24 AM
-- Server version: 5.7.34
-- PHP Version: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `seri_phongtro`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `phone`, `avatar`, `password`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'doantotnghiep@gmail.com', '0909888222', NULL, '$2y$10$FcA73O0YRulE9fBEApMbd.2NLxugT2t2MhDUX2Za8/jOKT6bhO0CW', 1, '2022-10-27 02:43:18', '2022-10-27 02:43:18');

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `menu_id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `menu_id`, `name`, `slug`, `description`, `avatar`, `content`, `created_at`, `updated_at`) VALUES
(1, 0, 'Các công ty chuyển nhà trọ uy tín nhất hiện nay', 'cac-cong-ty-chuyen-nha-tro-uy-tin-nhat-hien-nay', 'Có 5 tiêu chí để đánh giá dịch vụ chuyển nhà trọ uy tín bao gồm thương hiệu, kinh nhiệm, chất lượng, thái độ và phản hồi của người dùng.', '2022-10-26__bai1.jpeg', '<p><i>Có 5 tiêu chí để đánh giá <strong>dịch vụ chuyển nhà trọ uy tín</strong> bao gồm thương hiệu, kinh nhiệm, chất lượng, thái độ và phản hồi của người dùng. Đơn vị nào được nhiều người tin tưởng, đã sử dụng và hài lòng với chất lượng cũng như thái độ phục vụ thì sẽ dần khẳng định được thương hiệu, sự uy tín của mình. Dưới đây </i><a href=\"https://phongtro123.com/\"><i>Phongtro123.com</i></a><i> đã nghiên cứu tổng hợp danh sách các công ty cung cấp dịch vụ chuyển nhà trọ uy tín nhất hiện nay tại Thành phố Hồ Chí Minh và Hà Nội mà các bạn có thể tham khảo để liên hệ hỗ trợ khi cần thiết.</i></p><h2><strong>Các công ty cung cấp dịch vụ chuyển nhà trọ uy tín tại thành phố Hồ Chí Minh</strong></h2><p>Đây đều là những đơn vị cung cấp <strong>dịch vụ chuyển nhà trọ</strong> chất lượng, uy tín và đảm bảo được đông đảo khách hàng đánh giá cao trên thị trường thành phố Hồ Chí Minh. Bạn có thể tìm hiểu từng đơn vị để có thể lựa chọn được cái tên phù hợp với nhu cầu của mình.</p><p><strong>1. Công ty vận chuyển nhà Taxi tải Sài Gòn - Saigon Express</strong></p><p><img src=\"https://pt123.cdn.static123.com/images/thumbs/900x600/fit/2022/06/23/chuyen-tro-taxi-tai-sai-gon-saigonexpress_1655952471.jpg\" alt=\"\"></p><ul><li>Với phong cách làm việc chuyên nghiệp Taxi tải Sài Gòn đang dẫn đầu top công ty vận chuyển chất lượng và tốt nhất thành phố Hồ Chí Minh</li><li>Đơn vị này cung cấp các dịch vụ chuyển nhà, chuyển trọ, chuyển văn phòng, di dời nhà xưởng…và có cả cho thuê xe tải.</li><li>Năm 2014, công ty này được thành lập, đến nay đã phục vụ được hơn 10.000 khách hàng là các cá nhân, hộ gia đình, cơ quan, doanh nghiệp.</li><li>Đội ngũ nhân viên của đơn vị được đào tạo bài bản, làm việc chuyên nghiệp và có thái độ phục vụ tốt nhất đối với khách hàng. Hiện Taxi tải Sài Gòn đang cung cấp chính sách đền bù 100% trường hợp đồ đạc hư hỏng trong quá trình chuyển dọn. Đây là yếu tố giúp nhận được sự tin cậy của khách hàng. Đồng thời Taxi tải Sài Gòn hiện đang cung cấp bảng giá vận chuyển vô cùng ưu đãi, các bạn có thể tham khảo trực tiếp tại trang web của đơn vị hoặc liên hệ địa chỉ Số 121, Đường Hoàng Quốc Việt, Phường Phú Thuận, Quận 7, Hồ Chí Minh&nbsp; và Hotline: 0939.176.176 hoặc (028) 38 38 22 38</li></ul><p><strong>2. Công ty Thành Hưng</strong></p><p><img src=\"https://pt123.cdn.static123.com/images/thumbs/900x600/fit/2022/06/23/cong-ty-taxi-thanh-hung_1655952771.jpg\" alt=\"\"></p><ul><li>Đây là thương hiệu lâu năm, được thành lập năm 1996, hiện tên tuổi của đơn vị được rất nhiều người biết đến.</li><li>Thành Hưng hiện sở hữu đội ngũ nhân viên hùng hậu và số lượng xe tải lớn.</li><li>Dịch vụ vận chuyển mà đơn vị cung cấp luôn được đánh giá cao về chất lượng, giá cả bình dân.</li><li>Đơn vị luôn cam kết bồi thường thiệt hại 100% nếu xảy ra hỏng hóc đồ đạc.&nbsp;</li><li>Địa chỉ: 1942/1C Vườn Lài nối dài, P.An Phú Đông, Q</li></ul>', '2022-10-26 08:08:38', '2022-10-26 08:08:38'),
(2, 0, 'Có nên đầu tư cho thuê căn hộ Azura không?', 'co-nen-dau-tu-cho-thue-can-ho-azura-khong', 'Được đầu tư và phát triển bởi VinaLiving – thương hiệu bất động sản đình đám trực thuộc VinaCapital Group và Nordica Properties (NRE) tại Việt Nam', '2022-10-26__bai2.jpeg', '<p><i>Được đầu tư và phát triển bởi VinaLiving – thương hiệu bất động sản đình đám trực thuộc VinaCapital Group và Nordica Properties (NRE) tại Việt Nam. Dự án chung cư Azura là dòng căn hộ cao cấp được chủ đầu tư sở hữu hàng loạt các ưu điểm và lợi thế tuyệt vời nhằm mang lại không gian sống đẳng cấp, hiện đại, mang lại cuộc sống hoàn hảo như mơ cho cư dân. Nếu bạn băn khoăn rằng: <strong>Có nên đầu tư cho thuê căn hộ Azura không</strong>? Vậy thì những thông tin&nbsp;do </i><a href=\"https://phongtro123.com/\"><i>phongtro123.com</i></a><i> chia sẽ&nbsp;dưới đây là rất đáng để bạn tham khảo đấy!</i></p><h2>1. Tổng quan dự án căn hộ Azura</h2><p>Để biết chính xác Azura có phải dòng căn hộ xứng đáng để đầu tư hay không. Việc tìm hiểu và nắm bắt những thông tin tổng quan về dự án là vô cùng cần thiết. Những tổng quan về <a href=\"https://thuecanho123.com/cho-thue-can-ho-chung-cu-can-ho-cao-cap-azura.html\">căn hộ Azura</a> dưới đây sẽ giúp bạn có được đầy đủ các kiến thức để đưa ra phán đoán chính xác nhất.</p><p><img src=\"https://pt123.cdn.static123.com/images/thumbs/900x600/fit/2022/03/29/tong-quan-can-ho-azura_1648541070.jpg\" alt=\"Tổng quan dự án căn hộ Azura\">Tổng quan dự án căn hộ Azura</p><p><i>Thông tin về dự án:</i></p><p>- Tên dự án: Căn hộ cao cấp Azura - Azura Tower.</p><p>- Vị trí: số 339 Trần Hưng Đạo, An Hải Bắc, Sơn Trà, Đà Nẵng (ngay cạnh Cầu Sông Hàn).</p><p>- Chủ đầu tư dự án: tập đoàn VinaCapital và Nordica Properties (Đan Mạch).</p><p>- Đơn vị quản lý vận hành: PMC- Tổng diện tích dự án: 3.238 m2.</p><p>- Quy mô xây dựng: 1 Block cao 34 tầng.</p><p>- Số lượng căn hộ: 225 căn hộ. Trong đó bao gồm: 210 căn hộ điển hình, 13 căn hộ thông tầng, 02 căn Penthouse.</p><p>- Diện tích căn hộ: từ 69 - 444m2 với 1 – 4 phòng ngủ.</p><p>- Hình thức sở hữu: Sở hữu lâu dài đối với người Việt Nam, áp dụng cho thuê 50 năm đối với người nước ngoài.</p><p>- Hiện trạng: bàn giao và đi vào hoạt động từ tháng 9/2012.</p><h2>2. Vị trí giao thông căn hộ Azura thuận tiện</h2><p>Tọa lạc tại số 339 Trần Hưng Đạo, An Hải Bắc, Sơn Trà, Đà Nẵng, dự án Azura nằm ngay cạnh Cầu Sông Hàn - cây cầu mang ý nghĩa chiến lược trong phát triển kinh tế, giao thông tại Đà Nẵng.</p><p>Từ vị trí của các căn hộ nơi đây, phóng tầm mắt ra xa, cư dân có thể ngắm nhìn cảnh sông Hàn về đêm, xa xa là trung tâm hành chính, cầu Rồng, bán đảo Sơn Trà, Ngũ Hành Sơn và rộng hơn là Biển Đông. Với vị trí vàng đầy đắc địa khi nằm giữa trung tâm Đà Nẵng, <strong>căn hộ Azura</strong> là sản phẩm bất động sản được đánh giá có view nhìn ấn tượng bậc nhất.</p><p>Không dừng lại tại đó, giá trị từ vị trí còn mang lại cho Azura Tower những thừa hưởng về hạ tầng giao thông đồng bộ với các kết nối hoàn toàn thông suốt. Với việc nằm ngay trên trục chính Trần Hưng Đạo, cư dân của căn hộ sẽ không mất quá nhiều thời gian để có thể di chuyển tới các điểm đến khác:</p><p>- Mất chỉ 2 phút đi xe đến bãi biển Đà Nẵng.</p><p>- Khoảng 5 phút lái xe để đến trung tâm hành chính Đà Nẵng.</p><p>- Chỉ mất khoảng 10 phút đến sân bay Đà Nẵng.</p><p>- Chỉ tốn 15 phút đến bán đảo Sơn Trà.</p><p>- Chạy xe khoảng 30 phút để đến phố cổ Hội An,…</p><p><img src=\"https://pt123.cdn.static123.com/images/thumbs/900x600/fit/2022/03/29/so-do-vi-tri-can-ho-azura-da-nang_1648541133.jpg\" alt=\"Vị trí dự án căn hộ Azura\">Vị trí dự án căn hộ Azura</p><p>Sự kết nối về giao thông thuận tiện giúp mang tới hệ thống các tiện ích ngoại khu chất lượng dành cho dự án của VinaLiving. Trong vòng bán kính 5km, cư dân có thể trải nghiệm mọi dịch vụ chất lượng: nhà hàng, quán café, bar, TTTM, bệnh viện, trường đại học, khu công nghiệp,…rất sẵn có.</p><p>Đặc biệt, từ vị trí căn hộ ra tới biển Đông chưa đầ 1km. Đây có thể được xem là lợi thế mang tính độc tôn, thúc đẩy giá trị của các hộ sẽ không ngừng thăng tiến trong tương lai. Trong bối cảnh, du lịch biển Đà Nẵng đang ngày càng phát triển, nhu cầu thuê phòng căn hộ luôn rất cao. Rõ ràng, với mọi mục đích đầu tư tại Azura đều cho thấy hiệu quả ấn tượng</p><p>Thêm vào đó, xuyên suốt trục đường Trần Hưng Đạo dài hơn 4km, quỹ đất ven sông Hàn dài 7km hiện đã cạn. Tính tới thời điểm hiện tại, chỉ có duy nhất 3 dự án căn hộ với phân khúc từ trung đến cao cấp. Rõ ràng, sự lựa chọn không nhiều giúp mang lại lợi thế rất chất lượng cho dự án. <strong>Chung cư Azura Tower</strong> được xem là viên ngọc đen trên cung đường triệu đô Trần Hưng Đạo.</p><p>===&gt; Xem thêm: những tin đăng cho thuê căn hộ Đà Nẵng mới nhất qua website <a href=\"https://thuecanho123.com/da-nang.html\">https://thuecanho123.com/da-nang.html</a></p><p><br>&nbsp;</p>', '2022-10-26 08:12:57', '2022-10-26 08:12:57');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `title`, `description`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Cho thuê phòng trọ', 'cho-thue-phong-tro', 'Cho thuê phòng trọ', 'Cho thuê phòng trọ', 1, '2022-06-12 09:56:48', '2022-06-12 09:56:48'),
(2, 'Nhà cho thuê', 'nha-cho-thue', 'Nhà cho thuê', 'Nhà cho thuê', 1, '2022-06-12 09:56:48', '2022-06-12 09:56:48'),
(3, 'Cho thuê mặt bằng', 'cho-thue-mat-bang', 'Cho thuê mặt bằng', 'Cho thuê mặt bằng', 1, '2022-06-12 09:56:48', '2022-06-12 09:56:48'),
(4, 'Ở ghép', 'o-ghep', NULL, 'Tìm người ở ghép giá rẻ, bất ngờ', 0, '2022-10-25 20:13:17', '2022-10-25 20:16:57');

-- --------------------------------------------------------

--
-- Table structure for table `codes`
--

CREATE TABLE `codes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(6) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_id` bigint(20) NOT NULL DEFAULT '0',
  `time_start` datetime DEFAULT NULL,
  `type` tinyint(4) NOT NULL DEFAULT '0' COMMENT ' 1 xác thực Update phone, 2 rút tiền, 3 chuyển tiền',
  `status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '1 mới khởi tạo, 2 xử lý, 3 hoàn thành, 3 huỷ',
  `service` char(20) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'email' COMMENT ' email | phone',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `room_id` bigint(20) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `locations`
--

CREATE TABLE `locations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `hot` tinyint(4) NOT NULL DEFAULT '0',
  `parent_id` bigint(20) NOT NULL DEFAULT '0',
  `type` tinyint(4) NOT NULL DEFAULT '1' COMMENT '1 tỉnh thành, 2 là quân huyện, 3 là phường xã',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `locations`
--

INSERT INTO `locations` (`id`, `name`, `slug`, `title`, `description`, `avatar`, `status`, `hot`, `parent_id`, `type`, `created_at`, `updated_at`) VALUES
(1, 'Hà nội', 'ha-noi', 'Hà nội', 'Hà nội', '2022-10-27__location-hn.jpg', 1, 1, 0, 1, '2022-06-12 09:58:33', '2022-10-27 03:06:24'),
(2, 'Hồ Chí Minh', 'ho-chi-minh', 'Hồ Chí Minh', 'Hồ Chí Minh', '2022-10-27__location-hcm.jpg', 1, 1, 0, 1, '2022-06-12 09:58:33', '2022-10-27 03:07:08'),
(3, 'Đã Nẵng', 'da-nang', 'Đã Nẵng', 'Đã Nẵng', '2022-10-27__location-dn.jpg', 1, 1, 0, 1, '2022-06-12 09:58:33', '2022-10-27 03:07:16'),
(4, 'Nghệ An', 'nghe-an', 'Nghệ An', 'Nghệ An', NULL, 1, 0, 0, 1, '2022-06-12 09:58:33', '2022-10-27 03:07:21'),
(7, 'Huyện Thanh Trì', 'huyen-thanh-tri', 'Huyện Thanh Trì', 'Huyện Thanh Trì', NULL, 1, 0, 1, 2, '2022-08-20 18:07:35', NULL),
(8, 'Tứ hiệp', 'tu-hiep', 'Tứ hiệp', 'Xã tứ hiệp', NULL, 1, 0, 7, 3, NULL, NULL),
(9, 'Hải phòng', 'hai-phong', NULL, NULL, NULL, 1, 0, 0, 1, '2022-10-25 11:03:35', '2022-10-25 11:03:35'),
(10, 'Phú yên', 'phu-yen', NULL, NULL, NULL, 1, 0, 0, 1, '2022-10-25 11:05:05', '2022-10-27 03:07:00'),
(11, 'Quỳnh Lưu', 'quynh-luu', NULL, NULL, NULL, 1, 0, 4, 2, '2022-10-25 11:14:09', '2022-10-25 11:14:16');

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE `menus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_06_12_162342_create_categories_table', 2),
(6, '2022_06_12_162532_create_locations_table', 3),
(8, '2022_06_12_163256_create_options_table', 4),
(9, '2022_06_12_163613_create_admins_table', 5),
(10, '2022_06_12_163809_create_images_table', 6),
(11, '2022_06_12_162740_create_rooms_table', 7),
(12, '2022_08_21_033748_create_codes_table', 8),
(13, '2022_10_26_072922_create_recharge_history_table', 9),
(14, '2022_10_26_072947_create_payment_history_table', 9),
(15, '2022_10_26_145748_create_menus_table', 10),
(16, '2022_10_26_145810_create_articles_table', 10);

-- --------------------------------------------------------

--
-- Table structure for table `options`
--

CREATE TABLE `options` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` tinyint(4) DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `options`
--

INSERT INTO `options` (`id`, `name`, `type`, `created_at`, `updated_at`) VALUES
(1, 'Nam', 1, '2022-06-12 09:59:29', '2022-06-12 09:59:29'),
(2, 'Nữ', 1, '2022-06-12 09:59:29', '2022-06-12 09:59:29');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment_history`
--

CREATE TABLE `payment_history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) NOT NULL DEFAULT '0',
  `type` tinyint(4) NOT NULL DEFAULT '1',
  `room_id` int(11) NOT NULL DEFAULT '0',
  `service_id` tinyint(4) NOT NULL DEFAULT '0',
  `money` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_history`
--

INSERT INTO `payment_history` (`id`, `user_id`, `type`, `room_id`, `service_id`, `money`, `status`, `created_at`, `updated_at`) VALUES
(8, 1, 1, 2, 0, 10000, 2, '2022-10-26 03:50:50', '2022-10-26 03:50:50'),
(9, 1, 4, 8, 0, 250000, 2, '2022-10-26 04:12:05', '2022-10-26 04:12:05'),
(10, 1, 3, 9, 0, 300000, 2, '2022-10-27 01:36:05', '2022-10-27 01:36:05'),
(11, 1, 5, 10, 0, 1120000, 2, '2022-10-28 03:14:50', '2022-10-28 03:14:50'),
(12, 1, 3, 9, 0, 300000, 2, '2022-10-29 23:37:46', '2022-10-29 23:37:46');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `recharge_history`
--

CREATE TABLE `recharge_history` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) NOT NULL DEFAULT '0',
  `type` tinyint(4) NOT NULL COMMENT 'phương thức',
  `money` int(11) NOT NULL DEFAULT '0',
  `discount` int(11) NOT NULL DEFAULT '0',
  `total_money` int(11) NOT NULL DEFAULT '0',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `note` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `recharge_history`
--

INSERT INTO `recharge_history` (`id`, `code`, `user_id`, `type`, `money`, `discount`, `total_money`, `status`, `note`, `created_at`, `updated_at`) VALUES
(1, 'TTc1ugBj51', 1, 1, 500000, 50000, 550000, 2, NULL, '2022-10-26 01:33:04', '2022-10-26 02:49:19'),
(2, 'Yk4bDnSVwNOg1fHmGBmV1', 1, 2, 100000, 0, 100000, 2, NULL, '2022-10-26 01:39:23', '2022-10-26 02:48:58'),
(5, 'hbLSiz6CPAtKBLr3', 2, 1, 500000, 0, 500000, 1, 'User không hợp lệ', '2022-10-26 01:41:42', '2022-10-26 01:49:08'),
(6, 'uJkrDQ6T4l2GUBl1', 1, 3, 50000, 0, 50000, 1, NULL, '2022-10-27 03:49:25', '2022-10-27 03:49:25'),
(7, 'IurIYh5ZFTb3FII1', 1, 3, 50000, 0, 50000, 1, NULL, '2022-10-27 04:03:31', '2022-10-27 04:03:31'),
(8, '3N3D4YzA4DZhGxl1', 1, 3, 200000, 0, 200000, 1, NULL, '2022-10-27 06:16:00', '2022-10-27 06:16:00'),
(9, 'vUZS27sbWBYdlFi1', 1, 3, 400000, 0, 400000, 1, NULL, '2022-10-27 06:17:22', '2022-10-27 06:17:22'),
(10, 'fCJCHnashYCU2MI1', 1, 3, 200000, 0, 200000, 1, NULL, '2022-10-27 06:28:09', '2022-10-27 06:28:09'),
(11, 'lPGzR4rooX5MCiY1', 1, 3, 200000, 0, 200000, 1, NULL, '2022-10-27 06:29:01', '2022-10-27 06:29:01'),
(12, 'LhC51hz8lwM0PjT1', 1, 3, 200000, 0, 200000, 1, NULL, '2022-10-27 06:30:47', '2022-10-27 06:30:47'),
(13, '1Rq5bnJKZb8Q0nS1', 1, 3, 200000, 0, 200000, 1, NULL, '2022-10-27 06:32:01', '2022-10-27 06:32:01'),
(14, 'tbnr8jUEQQUJj4m1', 1, 3, 500000, 0, 500000, 1, NULL, '2022-10-27 06:43:24', '2022-10-27 06:43:24'),
(15, 'EzkjscP3fzBDRwb1', 1, 3, 200000, 0, 200000, 1, NULL, '2022-10-27 06:46:20', '2022-10-27 06:46:20'),
(16, 'UfmQXFTIfdUqhmV1', 1, 3, 300000, 0, 300000, 2, NULL, '2022-10-27 06:48:25', '2022-10-27 06:48:45'),
(17, 'kpwKlSq6foc4NqG1', 1, 3, 500000, 0, 500000, 1, NULL, '2022-10-27 06:49:01', '2022-10-27 06:49:01'),
(18, '89y2fyJMi5un5FK1', 1, 3, 1000000, 0, 1000000, 2, NULL, '2022-10-27 06:58:54', '2022-10-27 06:59:18'),
(19, 'MhMzXc1QNWULfWI2', 2, 2, 300000, 0, 300000, 2, NULL, '2022-10-27 07:00:11', '2022-10-27 07:00:15'),
(20, 'UZ2EBZhsXor1e4j1', 1, 2, 400000, 0, 400000, 2, NULL, '2022-10-27 07:00:56', '2022-10-27 07:01:03'),
(21, 'hXbePyYxO44xw4H1', 1, 3, 700000, 0, 700000, 2, NULL, '2022-10-28 03:11:17', '2022-10-28 03:12:17'),
(22, '5B13czyfnd6AHvx2', 21121, 1, 100000, 0, 100000, -1, 'User không hợp lệ', '2022-10-28 03:12:40', '2022-10-28 03:12:51'),
(23, '4ZEo7fUZyYfSinG1', 1, 3, 500000, 0, 500000, 1, NULL, '2022-10-29 23:38:30', '2022-10-29 23:38:30');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` varchar(300) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city_id` bigint(20) NOT NULL DEFAULT '0',
  `district_id` bigint(20) NOT NULL DEFAULT '0',
  `wards_id` bigint(20) NOT NULL DEFAULT '0',
  `price` bigint(20) NOT NULL DEFAULT '0',
  `range_price` tinyint(4) NOT NULL DEFAULT '1',
  `range_area` tinyint(4) NOT NULL DEFAULT '1',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `area` int(11) NOT NULL DEFAULT '0',
  `apartment_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `full_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contents` text COLLATE utf8mb4_unicode_ci,
  `hot` tinyint(4) NOT NULL DEFAULT '0',
  `reason` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category_id` bigint(20) NOT NULL DEFAULT '0',
  `time_start` date DEFAULT NULL,
  `time_stop` date DEFAULT NULL,
  `auth_id` bigint(20) NOT NULL DEFAULT '0',
  `service_hot` tinyint(4) NOT NULL DEFAULT '0',
  `map` text COLLATE utf8mb4_unicode_ci,
  `subject_id` bigint(20) NOT NULL DEFAULT '0',
  `video_link` text COLLATE utf8mb4_unicode_ci COMMENT 'link yt',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `name`, `slug`, `avatar`, `description`, `city_id`, `district_id`, `wards_id`, `price`, `range_price`, `range_area`, `status`, `area`, `apartment_number`, `full_address`, `contents`, `hot`, `reason`, `category_id`, `time_start`, `time_stop`, `auth_id`, `service_hot`, `map`, `subject_id`, `video_link`, `created_at`, `updated_at`) VALUES
(2, 'CHo thuê phòng trọ tại tứ hiệp', 'cho-thue-phong', NULL, 'CHo thuê phòng trọ tại tứ hiệp', 1, 7, 8, 2000000, 1, 1, 3, 22, '28B', NULL, NULL, 1, 'Tin này không hợp lệ', 1, '2022-10-27', '2022-11-01', 1, 0, NULL, 0, NULL, '2022-08-20 11:33:20', '2022-10-26 03:50:50'),
(6, 'Cho thuê số nhà 33 triều khúc', 'cho-thue-phong-so-nha-33', NULL, 'Cho thuê số nhà 33 triều khúc', 1, 7, 8, 1200000, 1, 1, 3, 20, '23', NULL, NULL, 1, NULL, 2, NULL, NULL, 1, 0, NULL, 0, NULL, '2022-08-20 11:53:36', '2022-10-26 00:07:57'),
(7, 'Cho thuê phòng cao cấp, đầy đủ tiện nghi, như căn hộ, ngay trung tâm Quận 10', 'cho-thue-phong-cao-cap-day-du-tien-nghi-nhu-can-ho-ngay-trung-tam-quan-10', '2022-10-25__k5-1646446171.jpg', 'Đang cập nhật', 1, 7, 8, 2300000, 1, 1, 3, 10, '22', 'Số 2 - Tứ hiệp - Thanh Trì - Hà Nội', NULL, 0, NULL, 1, NULL, NULL, 1, 0, NULL, 0, NULL, '2022-10-25 09:30:23', '2022-10-26 00:07:55'),
(8, 'Cho ở ghép đôi nam nữ', 'cho-o-ghep-doi-nam-nu', NULL, 'Cho ở ghép đôi nam nữ', 1, 11, 8, 20000, 1, 1, 3, 10000, '22', 'Quỳnh Ngọc - Quỳnh Lưu nghệ AN', NULL, 0, NULL, 4, '2022-10-28', '2022-11-02', 1, 0, NULL, 0, NULL, '2022-10-26 04:11:33', '2022-10-26 04:12:05'),
(9, 'Cho thuê nhà nguyên căn đường Bạch Đằng', 'cho-thue-nha-nguyen-can-duong-bach-dang', '2022-10-26__z3482519869144-16f2f315ca0c16241d2769ad8e1a2d1b-1654860728.jpg', 'Nội dung đang cập nhật', 1, 11, 8, 2500000, 3, 1, 3, 12, '22', NULL, NULL, 0, 'TIn rác', 2, '2022-11-05', '2022-11-15', 1, 3, '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3726.4954777032276!2d105.84853591503425!3d20.932608396429377!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ad94997aaebd%3A0x3d43064ffff16941!2zVOG7qSBIaeG7h3AsIFRoYW5oIFRyw6wsIEjDoCBO4buZaSwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1666845233945!5m2!1svi!2s\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 0, NULL, '2022-10-26 07:27:15', '2022-10-29 23:37:46'),
(10, 'Tiêu đề test', 'tieu-de-test', NULL, 'Tiêu đề testTiêu đề testTiêu đề test', 3, 7, 8, 2500000, 3, 1, 3, 20, '212', 'Hà Nội qunhf Lưu', NULL, 0, NULL, 2, '2022-10-31', '2022-11-14', 1, 5, NULL, 0, NULL, '2022-10-28 03:14:10', '2022-10-28 03:14:50');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_balance` bigint(20) NOT NULL DEFAULT '0',
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `facebook`, `avatar`, `account_balance`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'TrungPhuNA', 'doantotnghiep@gmail.com', '0986420994', NULL, NULL, 1070000, NULL, '$2y$10$JFXfug1kVdlSQaPK2Bw71ujuOUriAQCfmeOn7zjEUPNGSDdeRJwsO', NULL, '2022-06-13 10:11:50', '2022-10-28 03:12:17'),
(2, 'Hạ Linh', 'phupt.humg.94@gmail.com', '0987676222', NULL, NULL, 300000, NULL, '$2y$10$AzMbddKJWhAdVx0Q8H7zaOioVL.hVMud5wgab2kNY8IauSieKSl8m', NULL, '2022-08-08 11:12:17', '2022-10-27 07:00:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`),
  ADD UNIQUE KEY `admins_phone_unique` (`phone`);

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Indexes for table `codes`
--
ALTER TABLE `codes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `locations`
--
ALTER TABLE `locations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `locations_slug_unique` (`slug`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `menus_slug_unique` (`slug`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `options`
--
ALTER TABLE `options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payment_history`
--
ALTER TABLE `payment_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `recharge_history`
--
ALTER TABLE `recharge_history`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `recharge_history_code_unique` (`code`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `users_phone_unique` (`phone`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `codes`
--
ALTER TABLE `codes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `locations`
--
ALTER TABLE `locations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `options`
--
ALTER TABLE `options`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `payment_history`
--
ALTER TABLE `payment_history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `recharge_history`
--
ALTER TABLE `recharge_history`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
