-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th4 28, 2017 lúc 12:18 AM
-- Phiên bản máy phục vụ: 5.6.35
-- Phiên bản PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `nhmayugz_namdong`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category`
--

CREATE TABLE `category` (
  `catid` int(5) NOT NULL,
  `cat_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `show_home` int(2) NOT NULL DEFAULT '1',
  `alias` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `parent` int(11) NOT NULL,
  `ord` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category`
--

INSERT INTO `category` (`catid`, `cat_name`, `show_home`, `alias`, `parent`, `ord`) VALUES
(25, 'Máy tính Xách tay', 1, 'may-tinh-xach-tay', 0, 0),
(26, 'Máy tính Đồng bộ', 0, 'may-tinh-dong-bo', 0, 0),
(30, 'Asus', 0, 'asus', 25, 0),
(31, 'Dell', 0, 'dell', 25, 0),
(32, 'Lenovo', 0, 'lenovo', 25, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `category_service`
--

CREATE TABLE `category_service` (
  `catid` int(5) NOT NULL,
  `cat_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `show_home` int(2) NOT NULL DEFAULT '1',
  `alias` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `parent` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `category_service`
--

INSERT INTO `category_service` (`catid`, `cat_name`, `show_home`, `alias`, `parent`) VALUES
(3, 'Dịch vụ tư vấn CNTT', 0, 'dich-vu-tu-van-cntt', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cat_news`
--

CREATE TABLE `cat_news` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(200) NOT NULL,
  `alias` varchar(200) NOT NULL,
  `link` varchar(200) NOT NULL,
  `type` int(2) UNSIGNED NOT NULL,
  `active` tinyint(1) DEFAULT NULL,
  `ord` int(4) UNSIGNED DEFAULT NULL,
  `parent` int(11) NOT NULL,
  `home` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `cat_news`
--

INSERT INTO `cat_news` (`id`, `name`, `alias`, `link`, `type`, `active`, `ord`, `parent`, `home`) VALUES
(1, 'Giới thiệu', 'gioi-thieu', '#', 0, 1, 1, 0, 0),
(4, 'Liên hệ', 'lien-he', '#', 4, 1, 10, 0, 0),
(10, 'Sản phẩm', 'san-pham', '#', 1, 1, 6, 0, 0),
(11, 'Tổng quan', 'tong-quan', '#', 2, 1, 2, 1, 0),
(12, 'Lịch sử phát triển', 'lich-su-phat-trien', '#', 2, 1, 4, 1, 0),
(13, 'Tầm nhìn', 'tam-nhin', '#', 2, 1, 3, 1, 0),
(14, 'Tin tức', 'tin-tuc', '#', 0, 1, 5, 0, 0),
(18, 'Dịch vụ', 'dich-vu', '#', 3, 0, 6, 0, 1),
(19, 'kkk', 'kkk', '', 0, 1, 0, 14, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `demo`
--

CREATE TABLE `demo` (
  `id` int(3) NOT NULL,
  `title` varchar(120) COLLATE utf8_unicode_ci NOT NULL,
  `body` text COLLATE utf8_unicode_ci
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `demo`
--

INSERT INTO `demo` (`id`, `title`, `body`) VALUES
(1, 'nguyen duc hung', 'Em la ai co gai hay nang tien'),
(2, 'thu huong', 'Hom qua Thai lan da tong tien cong phong chong lu lut o bangkob');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `group_menufooter`
--

CREATE TABLE `group_menufooter` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(200) NOT NULL,
  `alias` varchar(200) NOT NULL,
  `link` varchar(200) NOT NULL,
  `type` int(11) NOT NULL,
  `active` int(11) NOT NULL,
  `ord` int(11) NOT NULL,
  `parent` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `metakeyword` varchar(200) NOT NULL,
  `metadescription` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `group_menufooter`
--

INSERT INTO `group_menufooter` (`id`, `name`, `alias`, `link`, `type`, `active`, `ord`, `parent`, `title`, `metakeyword`, `metadescription`) VALUES
(3, 'Thi công hệ thống', '', '#', 0, 1, 2, 0, '', 'thi công hệ thống, thi công mạng, thi công mạng LAN, thi cong mang, thi cong mang LAN', 'MAC thi công hệ thống mạng LAN, mạng nội bộ cho tòa nhà, văn phòng và khu công nghiệp. Liên hệ thi công: 012 19001080'),
(2, 'Thi công nội thất ', '', 'http://noithat.org.vn/thi-cong-noi-that', 0, 1, 1, 0, '', 'Thi công nội thất, thi cong noi that, thiet ke noi that, thiết kế nội thất, nội thất', 'Nhận thiết kế và thi công nội thất văn phòng tòa nhà chuyên nghiệp tại Hà Nội. Liên hệ: 012 19001080'),
(5, 'Thi công điện nước', '', 'http://noithat.org.vn/thi-cong-dien-nuoc', 0, 1, 3, 0, '', 'thi cong dien nuoc, thi công điện, thi cong dien, thi cong nuoc, thi công nước', 'Nhận thi công điện nước cho tòa nhà, văn phòng, khu công nghiệp. Liên hệ: 012 19001080');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hotro`
--

CREATE TABLE `hotro` (
  `id` int(11) NOT NULL,
  `name` varchar(200) CHARACTER SET utf8 NOT NULL,
  `info` varchar(200) CHARACTER SET utf8 NOT NULL,
  `used` int(11) NOT NULL COMMENT 'Dùng để xem loại 1 là yahoo, 2 là skype, 3 là phone',
  `type` int(11) NOT NULL COMMENT '1 là xuất khẩu lao động, 2 là bán vé máy bay',
  `active` int(11) NOT NULL,
  `ord` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `hotro`
--

INSERT INTO `hotro` (`id`, `name`, `info`, `used`, `type`, `active`, `ord`) VALUES
(4, 'Nhật Minh', 'nhatnguyen@iflight.com.vn', 1, 2, 1, 1),
(5, 'Skype 2', 'binhvv.helios', 2, 2, 1, 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `introduc`
--

CREATE TABLE `introduc` (
  `content` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `introduc`
--

INSERT INTO `introduc` (`content`) VALUES
('<p><img style=\"float: left; margin: 0px 10px;\" src=\"/tinymce/uploaded/advright_s324.jpg\" alt=\"\" width=\"175\" height=\"135\" /><strong><span style=\"font-family: arial,helvetica,sans-serif; font-size: small;\">Giới thiệu về C&ocirc;ng ty Ch&iacute;nh T&acirc;m</span></strong></p>');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khachhang`
--

CREATE TABLE `khachhang` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(200) NOT NULL,
  `path` varchar(200) NOT NULL,
  `url` varchar(200) DEFAULT NULL,
  `ord` int(3) UNSIGNED DEFAULT NULL,
  `active` int(1) UNSIGNED DEFAULT NULL,
  `metakeyword` varchar(200) NOT NULL,
  `metadescription` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `khachhang`
--

INSERT INTO `khachhang` (`id`, `name`, `path`, `url`, `ord`, `active`, `metakeyword`, `metadescription`) VALUES
(10, 'Thi công mạng LAN', 'images/khachhang/banner_6f4922f4.png', '#', 0, 1, '', ''),
(11, 'Thi công mạng nội bộ', 'images/khachhang/banner_1f0e3dad.png', '#', 0, 1, '', ''),
(13, 'MAC', 'images/khachhang/banner_98f13708.png', '#', 0, 1, '', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lienhe`
--

CREATE TABLE `lienhe` (
  `id` int(10) UNSIGNED NOT NULL,
  `hoten` varchar(200) NOT NULL,
  `tieude` varchar(200) NOT NULL,
  `noidung` varchar(2000) NOT NULL,
  `email` varchar(200) NOT NULL,
  `thoigian` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `lienhe`
--

INSERT INTO `lienhe` (`id`, `hoten`, `tieude`, `noidung`, `email`, `thoigian`) VALUES
(3, 'sdfsdf', 'sdfsdf', 'dsfsdff', 'maimaiyeuemhp90@yahoo.com', '2014-6-16'),
(2, 'Nam dong tesst', 'tesst', 'sfgsf', 'binhminhthanhdat@gmail.com', '2014-6-16'),
(4, 'dfdsf', 'slfskld', 'slkjfskldfjs', 'binhminhthanhdat@gmail.com', '2014-6-16');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `menufooter`
--

CREATE TABLE `menufooter` (
  `id` int(11) NOT NULL,
  `name` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `ord` int(11) NOT NULL,
  `link` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `parent` int(11) NOT NULL,
  `metakeyword` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `metadescription` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `menufooter`
--

INSERT INTO `menufooter` (`id`, `name`, `ord`, `link`, `parent`, `metakeyword`, `metadescription`) VALUES
(9, 'Thi công mạng LAN trường học', 0, 'http://noithat.org.vn/thi-cong-mang-lan/thi-cong-mang-lan-truong-hoc', 3, '', ''),
(11, 'Thiết kế thi công văn phòng', 1, 'http://noithat.org.vn/thi-cong-noi-that/thiet-ke-thi-cong-van-phong', 2, '', ''),
(12, 'Thi công điện chuyên nghiệp', 1, 'http://noithat.org.vn/thi-cong-dien-nuoc/thi-cong-dien-chuyen-nghiep', 5, '', ''),
(16, 'Thi công lắp đặt camera', 2, 'http://noithat.org.vn/he-thong-giam-sat/thi-cong-lap-dat-camera', 3, '', ''),
(21, 'Thi công nội thất văn phòng', 2, 'http://noithat.org.vn/thi-cong-noi-that/thi-cong-noi-that-van-phong', 2, '', ''),
(22, 'Lắp đặt điện nước chuyên nghiệp', 2, 'http://noithat.org.vn/thi-cong-dien-nuoc/lap-dat-dien-nuoc-chuyen-nghiep', 5, '', ''),
(23, 'Thi công mạng nội bộ', 2, 'http://noithat.org.vn/thi-cong-mang-lan/thi-cong-mang-noi-bo', 3, '', ''),
(24, 'Thi công nội thất showroom', 3, 'http://noithat.org.vn/thi-cong-noi-that/thiet-ke-thi-cong-noi-that-showroom', 2, '', ''),
(25, 'Thi công mạng LAN Hà Nội', 0, 'http://noithat.org.vn/thi-cong-mang-lan/thi-cong-mang-lan-tai-ha-noi', 3, '', ''),
(28, 'Dịch vụ sửa nhà Hà Nội', 0, 'http://noithat.org.vn/sua-chua-nha-cua/dich-vu-sua-nha-ha-noi', 2, '', ''),
(29, 'Thi công điện nước Hà Nội', 0, 'http://noithat.org.vn/thi-cong-dien-nuoc/thi-cong-dien-nuoc-ha-noi', 5, '', ''),
(30, 'Thi công điện nhẹ chuyên nghiệp', 0, 'http://noithat.org.vn/thi-cong-dien-nhe/thi-cong-dien-nhe-chuyen-nghiep', 5, '', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news`
--

CREATE TABLE `news` (
  `id` int(5) NOT NULL,
  `title` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `intro` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `create_date` int(5) DEFAULT NULL,
  `modify_date` int(5) DEFAULT NULL,
  `cat_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `news`
--

INSERT INTO `news` (`id`, `title`, `intro`, `content`, `image`, `create_date`, `modify_date`, `cat_id`) VALUES
(18, 'HP ra mắt máy để bàn thế hệ mới', 'HP ra mắt máy để bàn thế hệ mới', '<p>HP cho ra đời d&ograve;ng để b&agrave;n Pavilion thế hệ 2013 với t&ecirc;n gọi v&agrave; chip thế hệ mới. D&ograve;ng PC n&agrave;y th&iacute;ch hợp cho gia đ&igrave;nh v&agrave; văn ph&ograve;ng nhỏ với nhiều sự thay đổi to&agrave;n diện về thiết kế b&ecirc;n ngo&agrave;i nhưng vẫn giữ nguy&ecirc;n triết l&yacute; sản phẩm PC tiết kiệm điện năng v&agrave; th&acirc;n thiện m&ocirc;i trường.</p>\n<p>Dễ nhận thấy nhất ở HP Pavilion PC thế hệ 2013 l&agrave; sự thay đổi t&ecirc;n m&atilde; sản phẩm so với c&aacute;c sản phẩm thế hệ trước. Sản phẩm gi&aacute; rẻ si&ecirc;u tiết kiệm điện năng HP Pavilion P2 được đổi th&agrave;nh t&ecirc;n mới l&agrave; HP Pavilion 110 series v&agrave; sản phẩm tầm trung HP pavilion P6 được thay t&ecirc;n mới bằng HP pavilion 500 series. Về thiết kế, d&aacute;ng vẻ mềm mại trước đ&acirc;y đ&atilde; trở n&ecirc;n cứng c&aacute;p, chắc chắn v&agrave; mạnh mẽ hơn nhờ khung viền bo quanh ở ph&iacute;a trước mặt m&aacute;y.&nbsp;</p>\n<div><img src=\"http://tuanthanh.com.vn/pic/news/images/635138043081730623.jpg\" alt=\"HP Pavilion 110 tiết ki&ecirc;m năng lượng v&agrave; th&acirc;n thiện với m&ocirc;i trường\" /></div>\n<div>HP Pavilion 110 tiết ki&ecirc;m năng lượng v&agrave; th&acirc;n thiện với m&ocirc;i trường</div>\n<p><strong>HP Pavilion 110</strong></p>\n<p><strong>Tối ưu h&oacute;a nhu cầu sử dụng - ti&ecirc;u thụ điện năng thấp nhất trong c&aacute;c d&ograve;ng PC</strong></p>\n<p>HP Pavilion 110 hiện c&oacute; cấu h&igrave;nh duy nhất xuất hiện tại Việt Nam với bộ xử l&yacute; cơ bản của Intel Pentium Dual Core thế hệ mới nhất tr&ecirc;n nền tảng Ivy Bridge, bộ nhớ Ram ti&ecirc;u chuẩn 2GB (c&oacute; thể mở rộng l&ecirc;n 8GB) c&ugrave;ng ổ đĩa cứng 500GB, ổ đĩa quang chuẩn đọc ghi đa định dạng. C&aacute;c cổng cắm kết nối kh&aacute; đầy đủ kể cả cổng kết nối DVI trước đ&acirc;y thường chỉ c&oacute; ở model tầm trung.</p>\n<p>Pavilion 110 dễ l&agrave;m người d&ugrave;ng h&agrave;i l&ograve;ng bằng việc đ&aacute;p ứng tốt những nhu cầu cơ bản như truy cập ứng dụng mạng x&atilde; hội, nhận gửi email, c&aacute;c t&iacute;nh to&aacute;n t&agrave;i ch&iacute;nh c&aacute;c nh&acirc;n hay phục vụ nhu cầu học tập cơ bản cho sinh vi&ecirc;n v&agrave; đặc biệt th&iacute;ch hợp với nhu cầu mua sắm online - xu thế ti&ecirc;u d&ugrave;ng rất thịnh h&agrave;nh hiện nay.</p>\n<p>HP Pavilion110 c&oacute; lượng điện ti&ecirc;u thụ bằng một chiếc m&aacute;y laptop, mức ti&ecirc;u thụ điện thấp nhất trong c&aacute;c d&ograve;ng PC hiện nay. Để l&agrave;m được điều n&agrave;y, nh&agrave; sản xuất HP đ&atilde; sử dụng main board được thiết kế ri&ecirc;ng cho bộ nguồn 1 chiều DC v&agrave; nhờ bộ nguồn b&ecirc;n ngo&agrave;i Adapter c&ocirc;ng suất 90W gi&uacute;p việc ti&ecirc;u thụ điện năng của Pavilion 110 chỉ tương đương như một chiếc laptop.</p>\n<div><img src=\"http://tuanthanh.com.vn/pic/news/images/635138043086450623.jpg\" alt=\"HP Pavilion 500 c&oacute; hới hướng của d&ograve;ng sản phẩm Buiseness\" /></div>\n<div>HP Pavilion 500 c&oacute; hới hướng của d&ograve;ng sản phẩm Buiseness</div>\n<p><strong><a href=\"http://tuanthanh.com.vn/tim-san-pham/tu-khoa-HP-Pavilion-500.htm\">HP Pavilion 500</a>&nbsp;&ndash; lựa chọn ho&agrave;n hảo cho doanh nghiệp</strong></p>\n<p><strong>Kết nối Wifi - tốc độ xử l&yacute; si&ecirc;u nhanh - tiết kiệm điện năng tối đa cho doanh nghiệp</strong></p>\n<p>Trong khi đ&oacute; HP Pavilion 500 l&agrave; model PC tầm trung đ&aacute;p ứng c&aacute;c ứng dụng trung cao cấp cho cả nhu cầu c&aacute; nh&acirc;n cũng như m&ocirc;i trường doanh nghiệp v&agrave; văn ph&ograve;ng nhỏ.</p>\n<p>HP PC Pavilion 500 thế hệ mới l&agrave; chiếc m&aacute;y b&agrave;n c&oacute; t&iacute;ch hợp kết nối Wi-Fi, bộ xử l&yacute; được n&acirc;ng cấp l&ecirc;n thế hệ thứ 3 tr&ecirc;n nền tảng c&ocirc;ng nghệ Ivy Bridge so với Sandy Bridge ở thế hệ trước đ&acirc;y. Đồng thời ở một số model cao cấp được trang bị bộ xử l&yacute; Intel Core i5 kết hợp với card đồ họa rời gi&uacute;p cho Pavilion 500 c&oacute; tốc độ xử l&yacute; đ&aacute;ng kinh ngạc.</p>\n<p>Thiết kế bề ngo&agrave;i của Pavilion 500 l&agrave; sự kết hợp giữa d&ograve;ng PC doanh nghiệp HP Pro với thiết kế b&oacute;ng bảy bắt mắt của d&ograve;ng HP Pavilion P6 trước đ&acirc;y.</p>\n<p>Khả năng tiết kiệm điện cũng l&agrave; điểm đ&aacute;ng ch&uacute; &yacute; của HP Pavilion 500. Đạt 2 ti&ecirc;u chuẩn EPEAT (th&acirc;n thiện với m&ocirc;i trường) v&agrave; ENERGY STAR (tiết kiệm điện), chiếc m&aacute;y để b&agrave;n n&agrave;y cũng l&agrave; ứng cử vi&ecirc;n h&agrave;ng đầu trong số những m&aacute;y PC c&oacute; khả năng tiết kiệm điện năng cao gi&uacute;p hạ thấp chi ph&iacute; sử dụng điện cho gia đ&igrave;nh cũng như doanh nghiệp sử dụng.</p>\n<p>Hiện HP Pavilion 110 Series v&agrave; HP Pavilion 500 Series được ph&acirc;n phối rộng r&atilde;i tại hệ thống đại l&yacute; của FPT Distribution tr&ecirc;n to&agrave;n quốc. Tại H&agrave; Nội, Tp.HCM, Đ&agrave; Nẵng v&agrave; Cần Thơ, người d&ugrave;ng khi mua HP Pavilion sẽ được hưởng dịch vụ bảo h&agrave;nh tận nơi trong v&ograve;ng 8 tiếng kể từ l&uacute;c y&ecirc;u cầu dịch vụ. Nh&acirc;n vi&ecirc;n kỹ thuật bảo h&agrave;nh sẽ đến tận nơi kiểm tra t&igrave;nh trạng thiết bị, xử l&yacute; tại chỗ đối với những trục trặc đơn giản, hoặc lấy thiết bị mang về trung t&acirc;m xử l&yacute;.</p>', 'data_uploads/tin_tuc/hinh22.jpg', 1407926079, 1407928121, 14);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `partner`
--

CREATE TABLE `partner` (
  `content` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `partner`
--

INSERT INTO `partner` (`content`) VALUES
('<p><strong><span style=\"font-family: arial,helvetica,sans-serif; font-size: medium;\">Đối t&aacute;c giao dịch</span></strong></p>');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `parttent`
--

CREATE TABLE `parttent` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(200) NOT NULL,
  `path` varchar(200) NOT NULL,
  `url` varchar(200) DEFAULT NULL,
  `ord` int(3) UNSIGNED DEFAULT NULL,
  `active` int(1) UNSIGNED DEFAULT NULL,
  `metakeyword` varchar(200) NOT NULL,
  `metadescription` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `parttent`
--

INSERT INTO `parttent` (`id`, `name`, `path`, `url`, `ord`, `active`, `metakeyword`, `metadescription`) VALUES
(10, 'Thi công mạng LAN', 'images/partner/kenhnhansu.png', '#', 0, 1, '', ''),
(11, 'Thi công mạng nội bộ', 'images/partner/MAC.png', '#', 0, 1, '', ''),
(13, 'MAC', 'images/partner/thicongmang.png', 'noithat.org.vn', 0, 1, '', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product`
--

CREATE TABLE `product` (
  `id` int(10) NOT NULL,
  `catid` int(3) NOT NULL,
  `p_name` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `p_name_alias` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `p_description` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `p_detail` text COLLATE utf8_unicode_ci,
  `p_image` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `p_image_thumb` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(2) DEFAULT '1',
  `khuyenmai` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `gia` int(11) NOT NULL,
  `noibat` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product`
--

INSERT INTO `product` (`id`, `catid`, `p_name`, `p_name_alias`, `p_description`, `p_detail`, `p_image`, `p_image_thumb`, `status`, `khuyenmai`, `gia`, `noibat`) VALUES
(25, 25, 'Laptop Lenovo ThinkPad X240 20AMA01-LVA', 'laptop-lenovo-thinkpad-x240-20ama01-lva', '', '<p><strong>M&aacute;y t&iacute;nh x&aacute;ch tay Lenovo ThinkPad X240 20AMA01-LVA</strong></p>\n<p><span style=\"color: #ff0000; font-size: medium;\"><strong>Gi&aacute; b&aacute;n: 20.985.000 VNĐ&nbsp;</strong><strong>(Đ&atilde; bao gồm VAT)</strong></span><strong>&nbsp;</strong></p>\n<p><strong>M&atilde; h&agrave;ng:</strong>&nbsp;<strong>20AMA01-LVA</strong></p>\n<p>- B&ocirc;̣ vi xử lý: Core i5 - 4200U - 1.6GHz/ Cores 2&nbsp;</p>\n<p>- B&ocirc;̣ nhớ trong: 4Gb DDR3&nbsp;</p>\n<p>- Dung lượng &ocirc;̉ cứng:500GB&nbsp;</p>\n<p>- Màn hình: 12.5&rdquo; Led HD&nbsp;</p>\n<p>- Cạc đ&ocirc;̀ họa: Intel HD Graphics&nbsp;</p>\n<p>- Khối lượng : 1.8 Kg&nbsp;</p>\n<p>- Hệ điều h&agrave;nh : Dos</p>\n<p><strong>Bảo h&agrave;nh:</strong>&nbsp;36 th&aacute;ng tại leonovo Việt Nam</p>', 'data_uploads/product/Lenovo.jpg', 'data_uploads/product/thumb/Lenovo.jpg', 1, '', 20985000, 0),
(27, 25, 'Laptop Asus N550LF-XO125D - Dark GRAY i5 ', 'laptop-asus-n550lf-xo125d-dark-gray-i5-', '', '<p><strong>Asus N550LF-XO125D - Dark GRAY i5 4200U, 4GB, 750GB,GT 745M 4GB</strong></p>\n<p><span style=\"color: #ff0000; font-size: medium;\"><strong>Gi&aacute; b&aacute;n: 16.520.000 VNĐ&nbsp;(Đ&atilde; bao gồm VAT)&nbsp;</strong></span></p>\n<p><strong>M&atilde; h&agrave;ng:</strong>&nbsp;<strong>N550LF-XO125D</strong></p>\n<p>Laptop Asus N550LF-XO125D - Đen - Intel Core i5-4200U(1.6Ghz, 3MB Cache, Up to 2.6Ghz) , 4GB DDR3 1600Mhz , 750GB SATA 7200rpm , NVIDIA&reg; GeForce GT745M with 2GB DDR3 VRAM , 15.6\" 16:9 HD (1366x768) ,DVD-RW , WC+BT+WL, CR , USB3.0 ,VGA D-sub, HDMI , 6 cell , PC DOS - thiết kế vỏ nh&ocirc;m</p>\n<p><strong>Bảo h&agrave;nh:</strong>&nbsp;24 th&aacute;ng</p>', 'data_uploads/product/Asus.jpg', 'data_uploads/product/thumb/Asus.jpg', 1, '', 16520000, 0),
(26, 25, 'Laptop HP Probook 440 F6Q40PA', 'laptop-hp-probook-440-f6q40pa', '', '<p><strong>Laptop HP Probook 440 F6Q40PA</strong></p>\n<p><span style=\"font-size: medium; color: #ff0000;\"><strong>Gi&aacute; b&aacute;n: 14.450.000 VNĐ&nbsp;(Đ&atilde; bao gồm VAT)&nbsp;</strong></span></p>\n<p><strong>M&atilde; h&agrave;ng:</strong>&nbsp;<strong>F6Q40PA</strong></p>\n<p>- B&ocirc;̣ vi xử lý: Intel Core i5-4200M(2.5GHz/3MB)&nbsp;</p>\n<p>- B&ocirc;̣ nhớ trong: 4GB RAM DDR3&nbsp;</p>\n<p>- Dung lượng &ocirc;̉ cứng: 500GB HDD&nbsp;</p>\n<p>- Màn hình: 14.0 Inch&nbsp;</p>\n<p>- Cạc đ&ocirc;̀ họa: AMD Radeon HD 8750M 2GB Graphics&nbsp;</p>\n<p>- Ổ quang: DVDSM&nbsp;</p>\n<p>- Wlan b/g/n +BT, 14&rdquo;, Webcam , Soft Touch Black &amp; Alum&nbsp;</p>\n<p>- Pin 6cell&nbsp;</p>\n<p>- Hệ điều h&agrave;nh: DOS</p>\n<p><strong>Bảo h&agrave;nh:</strong>&nbsp;12 th&aacute;ng tại HP Việt Nam</p>', 'data_uploads/product/HP_4401.jpg', 'data_uploads/product/thumb/HP_4401.jpg', 1, '', 1445000, 0),
(28, 31, 'Laptop DELL Vostro V5560B P34F001-TI54102 ', 'laptop-dEll-vostro-v5560b-p34f001-ti54102-', '', '<p>Laptop DELL Vostro V5560B P34F001-TI54102 Silver Core i5- 3230M</p>\n<p><span style=\"font-size: medium; color: #ff0000;\"><strong>Gi&aacute; b&aacute;n: 14.560.000 VNĐ&nbsp;(Đ&atilde; bao gồm VAT)&nbsp;</strong></span></p>\n<p><strong>M&atilde; h&agrave;ng:</strong>&nbsp;<strong>V5560B P34F001-</strong></p>\n<p>- Bộ vi xử l&yacute;: Intel Core i5 3230M 2.6Ghz-3Mb&nbsp;</p>\n<p>- Bộ nhớ trong: 4Gb&nbsp;</p>\n<p>- Dung lượng ổ cứng: 1Tb&nbsp;</p>\n<p>- M&agrave;n h&igrave;nh: 15.6\" HD WLED Anti Glare&nbsp;</p>\n<p>- Cạc đồ họa: Nvidia GT630M 2Gb&nbsp;</p>\n<p>- Hệ điều h&agrave;nh: Dos</p>\n<p><strong>Bảo h&agrave;nh:</strong>&nbsp;12 th&aacute;ng tại Dell Việt Nam</p>', 'data_uploads/product/Dell1.jpg', 'data_uploads/product/thumb/Dell1.jpg', 1, '', 14560000, 0),
(29, 25, 'Laptop DELL Vostro V5560B P34F001-TI54102 ', 'laptop-dEll-vostro-v5560b-p34f001-ti54102-', '', '<p>Laptop DELL Vostro V5560B P34F001-TI54102 Silver Core i5- 3230M</p>\n<p><span style=\"color: #ff0000; font-size: medium;\"><strong>Gi&aacute; b&aacute;n: 14.560.000 VNĐ&nbsp;(Đ&atilde; bao gồm VAT)&nbsp;</strong></span></p>\n<p><strong>M&atilde; h&agrave;ng:</strong>&nbsp;<strong>V5560B P34F001-</strong></p>\n<p>- Bộ vi xử l&yacute;: Intel Core i5 3230M 2.6Ghz-3Mb&nbsp;</p>\n<p>- Bộ nhớ trong: 4Gb&nbsp;</p>\n<p>- Dung lượng ổ cứng: 1Tb&nbsp;</p>\n<p>- M&agrave;n h&igrave;nh: 15.6\" HD WLED Anti Glare&nbsp;</p>\n<p>- Cạc đồ họa: Nvidia GT630M 2Gb&nbsp;</p>\n<p>- Hệ điều h&agrave;nh: Dos</p>\n<p><strong>Bảo h&agrave;nh:</strong>&nbsp;12 th&aacute;ng tại Dell Việt Nam</p>', 'data_uploads/product/Dell.jpg', 'data_uploads/product/thumb/Dell.jpg', 1, '', 14560000, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `promotion`
--

CREATE TABLE `promotion` (
  `content` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `promotion`
--

INSERT INTO `promotion` (`content`) VALUES
('<p><span style=\"font-family: arial,helvetica,sans-serif; font-size: small;\">Chương tr&igrave;nh khuyến m&atilde;i</span></p>');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `service`
--

CREATE TABLE `service` (
  `id` int(10) NOT NULL,
  `catid` int(3) NOT NULL,
  `p_name` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `p_name_alias` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `p_description` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `p_detail` text COLLATE utf8_unicode_ci,
  `p_image` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `p_image_thumb` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(2) DEFAULT '1',
  `khuyenmai` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `gia` int(11) NOT NULL,
  `noibat` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `service`
--

INSERT INTO `service` (`id`, `catid`, `p_name`, `p_name_alias`, `p_description`, `p_detail`, `p_image`, `p_image_thumb`, `status`, `khuyenmai`, `gia`, `noibat`) VALUES
(25, 3, 'sdfdsf', 'sdfdsf', '', '<p>dsfsdf</p>', '', '', 1, '', 0, 0),
(26, 3, 'wrwerewr', 'wrwerewr', '', '<p>ewrwerewr</p>', '', '', 1, '', 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `setting`
--

CREATE TABLE `setting` (
  `meta_key` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_desc` varchar(250) COLLATE utf8_unicode_ci DEFAULT NULL,
  `per_page` int(5) DEFAULT NULL,
  `address` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `site_name` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `site_status` int(2) NOT NULL DEFAULT '1',
  `google_analytics` varchar(150) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `setting`
--

INSERT INTO `setting` (`meta_key`, `meta_desc`, `per_page`, `address`, `phone`, `site_name`, `site_status`, `google_analytics`, `id`) VALUES
('may tinh nam dong', 'may tinh nam dong', 20, 'Số 9 ngõ 125 Trung Kính - Yên Hòa - Cầu Giấy - Hà Nội', '091 9993683', 'NAM DONG COMPUTER', 1, 'info@maytinhnamdong.vn', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slide`
--

CREATE TABLE `slide` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(200) NOT NULL,
  `contents` varchar(500) NOT NULL,
  `img` varchar(200) NOT NULL,
  `url` varchar(200) DEFAULT NULL,
  `ord` int(3) UNSIGNED DEFAULT NULL,
  `active` int(1) UNSIGNED DEFAULT NULL,
  `metakeyword` varchar(200) NOT NULL,
  `metadescription` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `slide`
--

INSERT INTO `slide` (`id`, `name`, `contents`, `img`, `url`, `ord`, `active`, `metakeyword`, `metadescription`) VALUES
(1, 'Vietnam Headhunt Solutions', 'Investigators Vietnam offer the most discreet private investigation services in all of Vietnam – at local and affordable rates! Your \'eyes and ears\' on the ground anywhere in Vietnam, always on-time and always confidential. We are the most trusted and reliable detective agency in Vietnam!', 'images/slide/Vietnam_Headhunt_Solutions.jpg', 'http://noithat.org.vn/thi-cong-noi-that', 3, 1, '', ''),
(2, 'Vietnam Headhunt Solutions', 'Investigators Vietnam offer the most discreet private investigation services in all of Vietnam – at local and affordable rates! Your \'eyes and ears\' on the ground anywhere in Vietnam, always on-time and always confidential. We are the most trusted and reliable detective agency in Vietnam!', 'images/slide/Vietnam_Headhunt_Solutions.jpg', 'http://noithat.org.vn/thi-cong-mang-lan', 1, 1, '', ''),
(6, 'Vietnam Headhunt Solutions a', '<p>\r\n	Investigators Vietnam offer the most discreet private investigation services in all of Vietnam &ndash; at local and affordable rates! Your &#39;eyes and ears&#39; on the ground anywhere in Vietnam, always on-time and always confidential. We are the most trusted and reliable detective agency in Vietnam!</p>\r\n', 'images/slide/Vietnam_Headhunt_Solutions.jpg', 'http://noithat.org.vn/thi-cong-dien-nuoc', 3, 1, '', '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_group`
--

CREATE TABLE `user_group` (
  `user_group_id` int(3) NOT NULL,
  `user_group_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `permission_view` text COLLATE utf8_unicode_ci NOT NULL,
  `permission_edit_del` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user_group`
--

INSERT INTO `user_group` (`user_group_id`, `user_group_name`, `permission_view`, `permission_edit_del`) VALUES
(1, ' demo', 'a:1:{i:0;s:10:\"admin/user\";}', 'a:1:{i:0;s:10:\"admin/user\";}');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `user_user`
--

CREATE TABLE `user_user` (
  `user_id` int(3) NOT NULL,
  `user_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `user_fullname` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_email` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `user_active` int(2) NOT NULL DEFAULT '1',
  `user_group_id` int(3) DEFAULT NULL,
  `user_password` varchar(150) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `user_user`
--

INSERT INTO `user_user` (`user_id`, `user_name`, `user_fullname`, `user_email`, `user_active`, `user_group_id`, `user_password`) VALUES
(1, 'admin', 'Nguyen Duc Hung', 'supper_itpro@yahoo.com', 1, NULL, '21232f297a57a5a743894a0e4a801fc3'),
(2, 'demo', 'Demo', 'abc@yahoo.com', 1, 1, 'e10adc3949ba59abbe56e057f20f883e');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`catid`);

--
-- Chỉ mục cho bảng `category_service`
--
ALTER TABLE `category_service`
  ADD PRIMARY KEY (`catid`);

--
-- Chỉ mục cho bảng `cat_news`
--
ALTER TABLE `cat_news`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `demo`
--
ALTER TABLE `demo`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `demo` ADD FULLTEXT KEY `title` (`title`,`body`);

--
-- Chỉ mục cho bảng `group_menufooter`
--
ALTER TABLE `group_menufooter`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `hotro`
--
ALTER TABLE `hotro`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `lienhe`
--
ALTER TABLE `lienhe`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `menufooter`
--
ALTER TABLE `menufooter`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `parttent`
--
ALTER TABLE `parttent`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `product` ADD FULLTEXT KEY `p_name` (`p_name`);
ALTER TABLE `product` ADD FULLTEXT KEY `p_name_alias` (`p_name_alias`);
ALTER TABLE `product` ADD FULLTEXT KEY `p_name_2` (`p_name`,`p_name_alias`);

--
-- Chỉ mục cho bảng `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `service` ADD FULLTEXT KEY `p_name` (`p_name`);
ALTER TABLE `service` ADD FULLTEXT KEY `p_name_alias` (`p_name_alias`);
ALTER TABLE `service` ADD FULLTEXT KEY `p_name_2` (`p_name`,`p_name_alias`);

--
-- Chỉ mục cho bảng `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `user_group`
--
ALTER TABLE `user_group`
  ADD PRIMARY KEY (`user_group_id`);

--
-- Chỉ mục cho bảng `user_user`
--
ALTER TABLE `user_user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `category`
--
ALTER TABLE `category`
  MODIFY `catid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
--
-- AUTO_INCREMENT cho bảng `category_service`
--
ALTER TABLE `category_service`
  MODIFY `catid` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT cho bảng `cat_news`
--
ALTER TABLE `cat_news`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT cho bảng `demo`
--
ALTER TABLE `demo`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT cho bảng `group_menufooter`
--
ALTER TABLE `group_menufooter`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT cho bảng `hotro`
--
ALTER TABLE `hotro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT cho bảng `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT cho bảng `lienhe`
--
ALTER TABLE `lienhe`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT cho bảng `menufooter`
--
ALTER TABLE `menufooter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT cho bảng `news`
--
ALTER TABLE `news`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT cho bảng `parttent`
--
ALTER TABLE `parttent`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT cho bảng `product`
--
ALTER TABLE `product`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT cho bảng `service`
--
ALTER TABLE `service`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT cho bảng `setting`
--
ALTER TABLE `setting`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT cho bảng `slide`
--
ALTER TABLE `slide`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT cho bảng `user_group`
--
ALTER TABLE `user_group`
  MODIFY `user_group_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT cho bảng `user_user`
--
ALTER TABLE `user_user`
  MODIFY `user_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
