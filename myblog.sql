-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 30, 2022 at 10:54 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myblog`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_banner`
--

CREATE TABLE `tbl_banner` (
  `id` int(11) NOT NULL,
  `img` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_comment`
--

CREATE TABLE `tbl_comment` (
  `id` int(5) NOT NULL,
  `idUser` int(5) NOT NULL,
  `idPost` int(5) NOT NULL,
  `comment` text COLLATE utf8_unicode_ci NOT NULL,
  `time_comment` varchar(200) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_comment`
--

INSERT INTO `tbl_comment` (`id`, `idUser`, `idPost`, `comment`, `time_comment`) VALUES
(13, 3, 13, 'rất hay', '2022/12/29 16:27:01');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_introduction`
--

CREATE TABLE `tbl_introduction` (
  `id` int(4) NOT NULL,
  `img` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_introduction`
--

INSERT INTO `tbl_introduction` (`id`, `img`, `content`, `status`) VALUES
(4, 'about.jpg', '\r\n                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor laudantium dolorem distinctio laborum nulla consequatur, quo perspiciatis ab modi excepturi illo. Eaque ducimus harum ullam iusto, culpa nostrum fugiat magni eligendi expedita deleniti tempora eum dolor maiores ut sequi atque, dicta incidunt dignissimos delectus vero alias omnis natus. Culpa facilis doloremque rerum, repellendus nulla nesciunt reiciendis facere sequi velit provident magnam iusto possimus distinctio totam eveniet quis quos ut tenetur quaerat dignissimos cumque sunt asperiores iure quae. Alias, aliquam. Perferendis laboriosam voluptas harum, dolorum molestiae repellendus dolores deserunt. Beatae quis similique alias accusantium at! Exercitationem cupiditate accusamus quaerat a hic.\r\n                        ', 1),
(5, 'banner4.jpg', 'Hello, my name is Ngoc Tu, and I am eighteen years old. I just finished high school and I am going to be a student of Foreign Trade University this year. I was born in Quy Nhon province, but I just moved to Ho Chi Minh city a few weeks ago. I am friendly but a bit shy, so it is difficult for me to start a conversation with other people.\r\n\r\nI like going out with my friends on the weekend. We usually go to the cinema and watch horror movies, then have dinner together. ', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_navigation`
--

CREATE TABLE `tbl_navigation` (
  `id` int(4) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_navigation`
--

INSERT INTO `tbl_navigation` (`id`, `name`, `status`) VALUES
(3, 'Blog3', 1),
(4, 'Blog', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_post`
--

CREATE TABLE `tbl_post` (
  `id` int(5) NOT NULL,
  `title` text COLLATE utf8_unicode_ci NOT NULL,
  `img` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `content` longtext COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `id_nav` int(4) NOT NULL,
  `time_post` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_post`
--

INSERT INTO `tbl_post` (`id`, `title`, `img`, `content`, `status`, `id_nav`, `time_post`) VALUES
(13, 'Giá đất 5 huyện ven TP HCM giảm mạnh', 'dat.jpg', '<p>Cuối th&aacute;ng 12, gi&aacute; b&aacute;n đất nền tại huyện Nh&agrave; B&egrave;, B&igrave;nh Ch&aacute;nh, Cần Giờ, Củ Chi, H&oacute;c M&ocirc;n ghi nhận giảm cao nhất 20-30%, song chưa đến mức cắt lỗ.</p>\r\n\r\n<p>Ghi nhận của&nbsp;<em>VnExpress</em>&nbsp;cho thấy, từ giữa th&aacute;ng 12, đất nền lẻ v&agrave; đất nền nh&agrave; liền thổ trong c&aacute;c dự &aacute;n tại 5 huyện ven đ&ocirc; S&agrave;i G&ograve;n xuất hiện nhiều trường hợp giảm gi&aacute; ch&agrave;o b&aacute;n so với đầu năm nay, thanh khoản trầm lắng. C&aacute;c nh&agrave; đầu tư c&oacute; động th&aacute;i giảm gi&aacute; đất &iacute;t nhất tr&ecirc;n dưới 5% v&agrave; nhiều nhất 10-20%, c&aacute; biệt c&oacute; một số trường hợp giảm gần 30% so với đầu năm.</p>\r\n\r\n<p>Tại huyện đảo Cần Giờ, tuần đầu ti&ecirc;n của th&aacute;ng 12, nh&agrave; đầu tư &ocirc;m đất mặt tiền biển l&ocirc; lớn tr&ecirc;n 2.500 m2 ch&agrave;o b&aacute;n 37 tỷ đồng mỗi l&ocirc; nếu giao dịch ngay thời điểm cuối năm nay (đầu năm, gi&aacute; mỗi l&ocirc; n&agrave;y l&agrave; 52 tỷ đồng), tức giảm 29%. Chủ đất cho biết, do thiếu hụt d&ograve;ng tiền n&ecirc;n giảm gi&aacute; s&acirc;u để cơ cấu lại danh mục đầu tư.</p>\r\n\r\n<p>Gi&aacute; đất tại đường Giồng Ao thuộc thị trấn Cần Thạnh, đầu năm nay l&agrave; 38 triệu đồng một m2, đến th&aacute;ng 12, nhiều trường hợp chủ đất sẵn s&agrave;ng b&aacute;n gi&aacute; 31-32 triệu đồng, tức giảm 20% để chốt lời.</p>\r\n\r\n<p>Hay c&aacute;ch đ&acirc;y v&agrave;i tuần, một nh&agrave; đầu tư cho biết đ&atilde; b&aacute;n xong l&ocirc; đất thổ cư 600 m2, vị tr&iacute; mặt tiền ở thị trấn Cần Thạnh với gi&aacute; 18 tỷ đồng - giảm 3 tỷ đồng so với đợt ch&agrave;o b&aacute;n qu&yacute; đầu năm - cho kh&aacute;ch h&agrave;ng thanh to&aacute;n nhanh. Giao dịch diễn ra cuối th&aacute;ng 10 v&agrave; ho&agrave;n tất c&aacute;c thủ tục v&agrave;o th&aacute;ng n&agrave;y. &quot;T&ocirc;i giảm gi&aacute; b&aacute;n v&igrave; cần tiền mặt cơ cấu lại d&ograve;ng vốn. Thực tế b&aacute;n 18 tỷ đồng t&agrave;i sản n&agrave;y bi&ecirc;n lợi nhuận đ&atilde; giảm từ 50% xuống c&ograve;n 20% (đ&atilde; trừ thuế, c&aacute;c chi ph&iacute; t&agrave;i ch&iacute;nh)&quot;, nh&agrave; đầu tư n&agrave;y giải th&iacute;ch.</p>\r\n\r\n<p>Ở huyện Củ Chi, gi&aacute; đất mặt tiền tr&ecirc;n địa b&agrave;n huyện đầu th&aacute;ng 12 được nhiều chủ nh&agrave; ch&agrave;o b&aacute;n 20-25 triệu đồng một m2 t&ugrave;y vị tr&iacute;, giảm 15% so đầu năm với c&aacute;c l&ocirc; diện t&iacute;ch ti&ecirc;u chuẩn khoảng 100-150 m2. Nhiều chủ đất nền kh&aacute;c giảm gi&aacute; b&aacute;n từ 20 triệu đồng xuống c&ograve;n 16 triệu đồng một m2 đối với đất l&ocirc; lớn quy m&ocirc; h&agrave;ng ngh&igrave;n m2, tương đương mức giảm 20%.</p>\r\n\r\n<p>Giữa th&aacute;ng 12, chủ một l&ocirc; đất mặt tiền tại x&atilde; T&acirc;n Th&ocirc;ng Hội, huyện Củ Chi ch&agrave;o gi&aacute; b&aacute;n 7,25 tỷ đồng, trong khi đầu năm l&ocirc; n&agrave;y l&agrave; 9 tỷ đồng, tương đương mức giảm 20%. Nhờ chấp nhận giảm gi&aacute; mạnh hơn so với rổ h&agrave;ng neo gi&aacute; cao tr&ecirc;n c&ugrave;ng địa b&agrave;n, chủ đất đ&atilde; chốt giao dịch th&agrave;nh c&ocirc;ng, ho&agrave;n tất kh&acirc;u thương lượng đặt cọc.</p>\r\n\r\n<p><img alt=\"Thị trường nhà đất xã đảo Thạnh An, huyện Cần Giờ. Ảnh: Quỳnh Trần\" src=\"https://i1-kinhdoanh.vnecdn.net/2022/12/27/B64B35537961536F356ED53012B8AF-6357-8998-1672136752.jpg?w=680&amp;h=0&amp;q=100&amp;dpr=1&amp;fit=crop&amp;s=yx2bmKabk-bnCgFZShZw_A\" /></p>\r\n\r\n<p><iframe frameborder=\"0\" height=\"1\" id=\"google_ads_iframe_/27973503/Vnexpress/Desktop/Inimage/Kinhdoanh/Kinhdoanh.batdongsan.detail_0\" name=\"google_ads_iframe_/27973503/Vnexpress/Desktop/Inimage/Kinhdoanh/Kinhdoanh.batdongsan.detail_0\" scrolling=\"no\" tabindex=\"0\" title=\"3rd party ad content\" width=\"1\"></iframe></p>\r\n\r\n<p>Nh&agrave; đất x&atilde; đảo Thạnh An, huyện Cần Giờ nh&igrave;n từ tr&ecirc;n cao. Ảnh:&nbsp;<em>Quỳnh Trần</em></p>\r\n\r\n<p>Trong khi đ&oacute;, ở huyện Nh&agrave; B&egrave;, đất nền dự &aacute;n ch&agrave;o b&aacute;n tr&ecirc;n thị trường thứ cấp thuộc trục đường L&ecirc; Văn Lương ghi nhận gi&aacute; 27-53 triệu đồng một m2 t&ugrave;y vị tr&iacute; từng l&ocirc;, giảm 10-15% so với gi&aacute; từng rao b&aacute;n hồi đầu năm.</p>\r\n\r\n<p>Tr&ecirc;n địa b&agrave;n x&atilde; Ph&uacute; Xu&acirc;n, quanh trục đường Nguyễn Lương Bằng, đất nền dự &aacute;n x&acirc;y nh&agrave; liền thổ được ch&agrave;o b&aacute;n thứ cấp 33-60 triệu đồng một m2 t&ugrave;y vị tr&iacute;, giảm 8-17% so với c&ugrave;ng kỳ năm ngo&aacute;i. Gi&aacute; đất nền trục đường Huỳnh Tấn Ph&aacute;t cũng ghi nhận mức ch&agrave;o b&aacute;n 40-63 triệu đồng, giảm 7-14% so với c&ugrave;ng kỳ. Tại x&atilde; Phước Kiển, đất nền x&acirc;y nh&agrave; liền thổ dự &aacute;n quy m&ocirc; tr&ecirc;n 20 ha tr&ecirc;n trục đường Nguyễn Hữu Thọ hiện c&oacute; gi&aacute; 55-110 triệu đồng một m2, giảm 21% so với cuối năm ngo&aacute;i.</p>\r\n\r\n<p>Với huyện B&igrave;nh Ch&aacute;nh, khu vực Trung Sơn, đất nền dự &aacute;n x&acirc;y nh&agrave; liền thổ loại 100 m2 đang rao gi&aacute; 7,3-7,6 tỷ đồng c&oacute; thương lượng, giảm 10% so với đầu năm. Trong khi đ&oacute;, đất dự &aacute;n ch&agrave;o b&aacute;n thứ cấp tr&ecirc;n trục Nguyễn Văn Linh hiện c&oacute; gi&aacute; 78-80 triệu đồng một m2, giảm 8-10% so với c&ugrave;ng kỳ năm trước.</p>\r\n\r\n<p><img alt=\"Thị trường nhà đất huyện Nhà Bè. Ảnh: Quỳnh Trần\" src=\"https://i1-kinhdoanh.vnecdn.net/2022/12/27/DJI-0868-1419-1672136752.jpg?w=680&amp;h=0&amp;q=100&amp;dpr=1&amp;fit=crop&amp;s=aAcVZI3ovVPGF3mzW5IcTw\" /></p>\r\n\r\n<p>Thị trường nh&agrave; đất huyện Nh&agrave; B&egrave;. Ảnh:&nbsp;<em>Quỳnh Trần</em></p>\r\n\r\n<p>Ở khu vực H&oacute;c M&ocirc;n, đất nền x&acirc;y nh&agrave; liền thổ thuộc một dự &aacute;n quy m&ocirc; 3 ha tr&ecirc;n đường Nguyễn Văn Bứa, x&atilde; Xu&acirc;n Thới Sơn ghi nhận gi&aacute; ch&agrave;o b&aacute;n 22-23 triệu đồng một m2, giảm 10% so với đầu năm nay. Cũng tr&ecirc;n địa b&agrave;n huyện n&agrave;y, đất nền quanh đường Nguyễn Ảnh Thủ, B&agrave; Điểm c&oacute; gi&aacute; 22-25 triệu đồng một m2, giảm 9% so với c&ugrave;ng kỳ. Tuy nhi&ecirc;n, c&aacute;c trường hợp ch&agrave;o b&aacute;n đều rơi v&agrave;o nh&oacute;m nh&agrave; đầu tư ngộp t&agrave;i ch&iacute;nh; ri&ecirc;ng những người kh&ocirc;ng bị kh&oacute; khăn về d&ograve;ng tiền chọn c&aacute;ch &ocirc;m h&agrave;ng trong trung v&agrave; d&agrave;i hạn.</p>\r\n\r\n<p>B&aacute;o c&aacute;o mới nhất về thị trường đất nền 5 huyện ngoại th&agrave;nh TP HCM của DKRA Việt Nam cũng cho biết, thị trường đất nền c&oacute; dấu hiệu giảm tốc từ cuối th&aacute;ng 4 v&agrave; đ&agrave; giảm mạnh dần khi c&agrave;ng về cuối năm. T&iacute;nh đến ng&agrave;y 26/12, gi&aacute; b&aacute;n đất nền dự &aacute;n giảm thấp nhất trong ngưỡng tr&ecirc;n dưới 5% v&agrave; cao nhất l&ecirc;n đến 21% so với c&ugrave;ng kỳ năm ngo&aacute;i.</p>\r\n\r\n<p>Đơn vị n&agrave;y x&aacute;c nhận, đất nền l&ocirc; lẻ ghi nhận mức giảm gi&aacute; cao nhất l&ecirc;n đến 25% so với c&ugrave;ng kỳ 2021, trong đ&oacute;, tại huyện H&oacute;c M&ocirc;n, gi&aacute; đất nền lẻ giảm 10-15%, tại Cần Giờ giảm 11-18%, huyện Củ Chi hạ 13-25%. Tuy gi&aacute; b&aacute;n điều chỉnh, c&aacute;c giao dịch th&agrave;nh c&ocirc;ng vẫn kh&aacute; khi&ecirc;m tốn, thanh khoản thị trường sụt 70-75% so với đầu năm.</p>\r\n\r\n<p><strong>Diễn biến giảm gi&aacute; đất tại c&aacute;c huyện ven được m&ocirc;i giới tr&ecirc;n c&aacute;c địa b&agrave;n n&agrave;y nh&igrave;n nhận</strong>&nbsp;l&agrave; do thị trường chịu t&aacute;c động bởi việc c&aacute;c ng&acirc;n h&agrave;ng tăng cường kiểm so&aacute;t t&iacute;n dụng, thanh khoản sụt giảm. Th&ecirc;m v&agrave;o đ&oacute;, th&ocirc;ng tin cuối th&aacute;ng 11, UBND TP HCM đề nghị c&aacute;c huyện ngoại th&agrave;nh kh&ocirc;ng xin chủ trương l&ecirc;n quận hoặc th&agrave;nh phố m&agrave; chờ sau khi đạt chuẩn mới quyết định m&ocirc; h&igrave;nh ph&ugrave; hợp với từng địa phương cũng t&aacute;c động đ&aacute;ng kể đến t&acirc;m l&yacute; người b&aacute;n lẫn người mua trong bối cảnh thị trường thanh khoản k&eacute;m.</p>\r\n\r\n<p>Trước đ&oacute;, th&aacute;ng 1/2021, Sở Nội vụ TP HCM c&oacute; kế hoạch&nbsp;<a href=\"https://vnexpress.net/thoi-su/hoc-mon-binh-chanh-nha-be-du-kien-thanh-quan-truoc-2025-4248920.html\" rel=\"dofollow\">x&acirc;y dựng</a>&nbsp;Đề &aacute;n chuyển một số huyện th&agrave;nh quận hoặc th&agrave;nh phố, giai đoạn 2021-2030, với l&yacute; do c&aacute;c địa phương n&agrave;y c&oacute; tốc độ đ&ocirc; thị ho&aacute; nhanh, nhiều khu đ&ocirc; thị, hạ tầng, tuyến cao tốc đ&atilde; v&agrave; đang h&igrave;nh th&agrave;nh. Tr&igrave;nh độ d&acirc;n tr&iacute;, lối sống đ&ocirc; thị ở 5 huyện kh&ocirc;ng kh&aacute;c nhiều c&aacute;c quận nội th&agrave;nh.</p>\r\n\r\n<p>Sau khi đề &aacute;n được c&ocirc;ng bố, 5 huyện ngoại th&agrave;nh đ&atilde; tổ chức c&aacute;c hội nghị, hội thảo lấy &yacute; kiến c&aacute;c chuy&ecirc;n gia, nh&agrave; đầu tư về định hướng ph&aacute;t triển. Một số huyện đưa ra mục ti&ecirc;u l&ecirc;n quận trước năm 2025 như B&igrave;nh Ch&aacute;nh, Nh&agrave; B&egrave;, H&oacute;c M&ocirc;n; c&ograve;n Củ Chi, Cần Giờ dự kiến l&ecirc;n quận trước 2030. Tuy nhi&ecirc;n, sau đ&oacute; lần lượt 5 huyện ngoại th&agrave;nh đều c&ocirc;ng bố &yacute; định n&acirc;ng cấp&nbsp;<a href=\"https://vnexpress.net/thoi-su/ly-do-5-huyen-tp-hcm-muon-len-thanh-pho-4471954.html\" rel=\"dofollow\">l&ecirc;n th&agrave;nh phố</a>, thay v&igrave; quận.</p>\r\n\r\n<p>Theo l&atilde;nh đạo UBND TP HCM, l&yacute; do th&agrave;nh phố y&ecirc;u cầu 5 huyện kh&ocirc;ng xin l&ecirc;n quận hay th&agrave;nh phố v&igrave; việc n&agrave;y c&oacute; thể g&acirc;y sốt đất, đầu cơ, chưa kể thẩm quyền n&acirc;ng cấp đơn vị h&agrave;nh ch&iacute;nh l&agrave; của Quốc hội.</p>\r\n\r\n<p>Thực tế, ngay khi c&oacute; th&ocirc;ng tin một số huyện tại TP HCM được&nbsp;<a href=\"https://vnexpress.net/hoc-mon-binh-chanh-nha-be-du-kien-thanh-quan-truoc-2025-4248920.html\" rel=\"dofollow\">định hướng l&ecirc;n quận</a>&nbsp;hồi đầu năm 2021 đ&atilde; khiến thị trường đất nền c&aacute;c huyện ven đ&ocirc; S&agrave;i G&ograve;n biến động. Hồi th&aacute;ng 3/2021&nbsp;<a href=\"https://vnexpress.net/kinh-doanh/gia-dat-5-huyen-ven-do-dong-loat-tang-4253806.html\" rel=\"dofollow\">gi&aacute; đất huyện ven đ&ocirc;</a>&nbsp;tăng ở bi&ecirc;n độ phổ biến 3-20% so với hồi cuối năm 2020 bất chấp Covid-19 diễn biến phức tạp. Khi đ&oacute;, gi&aacute; đất 5 huyện đạt đỉnh 45-92 triệu đồng mỗi m2.</p>\r\n\r\n<p>Đ&agrave; tăng vẫn tiếp tục trong qu&yacute; I/2022 nhưng từ qu&yacute; II trở đi, xu hướng giảm gi&aacute; b&aacute;n bắt đầu xuất hiện. C&aacute;c động th&aacute;i giảm gi&aacute; đất tại 5 huyện ven trong nửa cuối năm nay mạnh dần, song được m&ocirc;i giới địa phương thừa nhận nh&agrave; đầu tư &ocirc;m đất chỉ đang cắt lời chứ chưa xảy ra trường hợp bị lỗ do đ&atilde; tăng gi&aacute; cao trước đ&oacute;.</p>\r\n\r\n<p>&Ocirc;ng Phan C&ocirc;ng Ch&aacute;nh, Tổng gi&aacute;m đốc Ph&uacute; Vinh Group cho biết c&aacute;c th&ocirc;ng tin kỳ vọng n&acirc;ng cấp từ huyện l&ecirc;n quận lu&ocirc;n phản &aacute;nh v&agrave;o gi&aacute; (gi&aacute; kỳ vọng) trước khi mức gi&aacute; đ&oacute; được thị trường chấp nhận (gi&aacute; thị trường). V&igrave; vậy, khi c&aacute;c th&ocirc;ng tin kỳ vọng n&agrave;y yếu đi hoặc kh&ocirc;ng c&ograve;n chắc chắn sẽ c&oacute; t&aacute;c động k&eacute;o gi&aacute; kỳ vọng xuống, tức l&agrave;m giảm gi&aacute; ch&agrave;o b&aacute;n tr&ecirc;n thị trường.</p>\r\n\r\n<p>&Ocirc;ng Ch&aacute;nh ph&acirc;n t&iacute;ch, đa số nh&agrave; đầu tư &ocirc;m đất tại 5 huyện ven 2,5-3 năm trở l&ecirc;n đều l&atilde;i lớn, nếu c&aacute;c nh&oacute;m n&agrave;y giảm gi&aacute; b&aacute;n chỉ l&agrave; giảm lời, chia sẻ một phần lợi nhuận lại cho người mua sau. Rủi ro thua lỗ v&igrave; gi&aacute; giảm chỉ xuất hiện cho những người đ&atilde; mua trong giai đoạn đầu năm 2021 đến đầu năm 2022 do đ&atilde; đặt cược qu&aacute; nhiều v&agrave;o mức gi&aacute; kỳ vọng vốn đ&atilde; neo rất cao. Khoản rủi ro họ phải chịu l&agrave; ch&ecirc;nh lệch giữa gi&aacute; kỳ vọng v&agrave; gi&aacute; thị trường ng&agrave;y c&agrave;ng lớn. Ch&ecirc;nh lệch n&agrave;y thường dao động trong khoảng trung b&igrave;nh 5-15% v&agrave; cao 20-30% mức gi&aacute; trong điều kiện thị trường diễn biến b&igrave;nh thường.</p>\r\n\r\n<p>CEO Ph&uacute; Vinh Group n&ecirc;u v&iacute; dụ, một căn nh&agrave; trong khu d&acirc;n cư hiện hữu, c&oacute; thể d&ugrave;ng để ở v&agrave; cho thu&ecirc; gi&aacute; 10 tỷ, khi thị trường ổn định, giảm gi&aacute; xuống c&ograve;n 8-8,5 tỷ sẽ c&oacute; thanh khoản ngay. Tuy nhi&ecirc;n, trong giai đoạn thị trường bị bong b&oacute;ng kh&ocirc;ng thể đo được sự ch&ecirc;nh lệch giữa gi&aacute; thật v&agrave; gi&aacute; ảo, mức giảm t&agrave;i sản rất kh&oacute; đo lường. Cộng th&ecirc;m t&acirc;m l&yacute; thị trường xấu dẫn đến hệ quả d&ugrave; giảm gi&aacute; nhưng thanh khoản trầm lắng.</p>\r\n\r\n<p>Theo &ocirc;ng Ch&aacute;nh, đến nay quan s&aacute;t thị trường, nh&oacute;m nh&agrave; đầu tư bất động sản c&oacute; l&atilde;i vẫn chiếm tỷ lệ lời cao, c&ograve;n lỗ chỉ chiếm thiểu số thường rơi v&agrave;o nh&oacute;m nh&agrave; đầu tư non kinh nghiệm v&agrave; d&ugrave;ng đ&ograve;n bẩy qu&aacute; đ&agrave;.</p>\r\n\r\n<p>C&ograve;n &ocirc;ng V&otilde; Hồng Thắng, Ph&oacute; gi&aacute;m đốc Nghi&ecirc;n cứu &amp; Ph&aacute;t triển DKRA Việt Nam cho biết ngo&agrave;i nguy&ecirc;n nh&acirc;n UBND TP HCM gần đ&acirc;y chủ trương 5 huyện kh&ocirc;ng vội đề xuất l&ecirc;n quận hoặc th&agrave;nh phố, c&ograve;n c&oacute; hai nguy&ecirc;n nh&acirc;n ch&iacute;nh kh&aacute;c dẫn đến thị trường sụt giảm.</p>\r\n\r\n<p>Thứ nhất l&agrave; do sự tăng cường kiểm so&aacute;t t&iacute;n dụng bất động sản. Từ cuối th&aacute;ng 4 cơ quan quản l&yacute; nh&agrave; nước đ&atilde; tăng cường kiểm so&aacute;t t&iacute;n dụng, trong đ&oacute; bao gồm cả k&ecirc;nh ph&aacute;t h&agrave;nh tr&aacute;i phiếu doanh nghiệp. Doanh nghiệp địa ốc gặp kh&oacute; trong việc tiếp cận nguồn vốn từ 2 k&ecirc;nh n&agrave;y dẫn đến nguồn cung sụt giảm, nh&agrave; đầu tư c&aacute; nh&acirc;n kh&oacute; tiếp cận vốn vay ng&acirc;n h&agrave;ng dẫn đến sức cầu của thị trường sụt giảm.</p>\r\n\r\n<p>Thứ hai theo &ocirc;ng Thắng, l&agrave; do l&atilde;i suất tăng mạnh. L&atilde;i suất cho vay mua bất động sản t&iacute;nh đến ng&agrave;y 26/12 dao động 11-15% một năm. Với mức l&atilde;i suất n&agrave;y, nhiều nh&agrave; đầu tư thận trọng hơn trong quyết định d&ugrave;ng đ&ograve;n bẩy t&agrave;i ch&iacute;nh để đầu tư t&agrave;i sản trong giai đoạn thanh khoản to&agrave;n thị trường xuống thấp. Những nh&agrave; đầu tư c&oacute; sử dụng đ&ograve;n bẩy t&agrave;i ch&iacute;nh chịu &aacute;p lực l&atilde;i vay ng&agrave;y c&agrave;ng lớn khi l&atilde;i suất tăng manh, với t&igrave;nh h&igrave;nh kinh tế đang gặp kh&oacute; khăn, thu nhập bị sụt giảm khiến nh&agrave; đầu tư phải chấp nhận giảm gi&aacute;, cắt lỗ hoặc giảm một phần lợi nhuận để xả h&agrave;ng, giảm &aacute;p lực t&agrave;i ch&iacute;nh c&aacute; nh&acirc;n.</p>\r\n\r\n<p>Tuy nhi&ecirc;n, việc giằng co tr&ecirc;n thị trường diễn ra mạnh mẽ khi một b&ecirc;n muốn b&aacute;n d&ugrave; giảm gi&aacute;, b&ecirc;n kia thận trọng khi ra quyết định đầu tư trong giai đoạn n&agrave;y. Đ&acirc;y l&agrave; l&yacute; do ch&iacute;nh khiến mặt bằng gi&aacute; giảm mạnh trong thời gian vừa qua nhưng thanh khoản lại rất thấp.</p>\r\n\r\n<p style=\"text-align:right\"><strong>Vũ L&ecirc;</strong></p>\r\n<script src=\"chrome-extension://lopnbnfpjmgpbppclhclehhgafnifija/aiscripts/t.js\"></script>\r\n<script src=\"chrome-extension://lopnbnfpjmgpbppclhclehhgafnifija/aiscripts/script-main.js\"></script>\r\n<div id=\"ag-translate-icon\" style=\"bottom:-2550px; left:-24px; user-select:none\">\r\n<div class=\"img\">&nbsp;</div>\r\n</div>\r\n', 1, 4, '2022/12/28 16:18:52'),
(14, 'Giá đất 5 huyện ven TP HCM giảm mạnh', 'dat.jpg', '<p>Cuối th&aacute;ng 12, gi&aacute; b&aacute;n đất nền tại huyện Nh&agrave; B&egrave;, B&igrave;nh Ch&aacute;nh, Cần Giờ, Củ Chi, H&oacute;c M&ocirc;n ghi nhận giảm cao nhất 20-30%, song chưa đến mức cắt lỗ.</p>\r\n\r\n<p>Ghi nhận của&nbsp;<em>VnExpress</em>&nbsp;cho thấy, từ giữa th&aacute;ng 12, đất nền lẻ v&agrave; đất nền nh&agrave; liền thổ trong c&aacute;c dự &aacute;n tại 5 huyện ven đ&ocirc; S&agrave;i G&ograve;n xuất hiện nhiều trường hợp giảm gi&aacute; ch&agrave;o b&aacute;n so với đầu năm nay, thanh khoản trầm lắng. C&aacute;c nh&agrave; đầu tư c&oacute; động th&aacute;i giảm gi&aacute; đất &iacute;t nhất tr&ecirc;n dưới 5% v&agrave; nhiều nhất 10-20%, c&aacute; biệt c&oacute; một số trường hợp giảm gần 30% so với đầu năm.</p>\r\n\r\n<p>Tại huyện đảo Cần Giờ, tuần đầu ti&ecirc;n của th&aacute;ng 12, nh&agrave; đầu tư &ocirc;m đất mặt tiền biển l&ocirc; lớn tr&ecirc;n 2.500 m2 ch&agrave;o b&aacute;n 37 tỷ đồng mỗi l&ocirc; nếu giao dịch ngay thời điểm cuối năm nay (đầu năm, gi&aacute; mỗi l&ocirc; n&agrave;y l&agrave; 52 tỷ đồng), tức giảm 29%. Chủ đất cho biết, do thiếu hụt d&ograve;ng tiền n&ecirc;n giảm gi&aacute; s&acirc;u để cơ cấu lại danh mục đầu tư.</p>\r\n\r\n<p>Gi&aacute; đất tại đường Giồng Ao thuộc thị trấn Cần Thạnh, đầu năm nay l&agrave; 38 triệu đồng một m2, đến th&aacute;ng 12, nhiều trường hợp chủ đất sẵn s&agrave;ng b&aacute;n gi&aacute; 31-32 triệu đồng, tức giảm 20% để chốt lời.</p>\r\n\r\n<p>Hay c&aacute;ch đ&acirc;y v&agrave;i tuần, một nh&agrave; đầu tư cho biết đ&atilde; b&aacute;n xong l&ocirc; đất thổ cư 600 m2, vị tr&iacute; mặt tiền ở thị trấn Cần Thạnh với gi&aacute; 18 tỷ đồng - giảm 3 tỷ đồng so với đợt ch&agrave;o b&aacute;n qu&yacute; đầu năm - cho kh&aacute;ch h&agrave;ng thanh to&aacute;n nhanh. Giao dịch diễn ra cuối th&aacute;ng 10 v&agrave; ho&agrave;n tất c&aacute;c thủ tục v&agrave;o th&aacute;ng n&agrave;y. &quot;T&ocirc;i giảm gi&aacute; b&aacute;n v&igrave; cần tiền mặt cơ cấu lại d&ograve;ng vốn. Thực tế b&aacute;n 18 tỷ đồng t&agrave;i sản n&agrave;y bi&ecirc;n lợi nhuận đ&atilde; giảm từ 50% xuống c&ograve;n 20% (đ&atilde; trừ thuế, c&aacute;c chi ph&iacute; t&agrave;i ch&iacute;nh)&quot;, nh&agrave; đầu tư n&agrave;y giải th&iacute;ch.</p>\r\n\r\n<p>Ở huyện Củ Chi, gi&aacute; đất mặt tiền tr&ecirc;n địa b&agrave;n huyện đầu th&aacute;ng 12 được nhiều chủ nh&agrave; ch&agrave;o b&aacute;n 20-25 triệu đồng một m2 t&ugrave;y vị tr&iacute;, giảm 15% so đầu năm với c&aacute;c l&ocirc; diện t&iacute;ch ti&ecirc;u chuẩn khoảng 100-150 m2. Nhiều chủ đất nền kh&aacute;c giảm gi&aacute; b&aacute;n từ 20 triệu đồng xuống c&ograve;n 16 triệu đồng một m2 đối với đất l&ocirc; lớn quy m&ocirc; h&agrave;ng ngh&igrave;n m2, tương đương mức giảm 20%.</p>\r\n\r\n<p>Giữa th&aacute;ng 12, chủ một l&ocirc; đất mặt tiền tại x&atilde; T&acirc;n Th&ocirc;ng Hội, huyện Củ Chi ch&agrave;o gi&aacute; b&aacute;n 7,25 tỷ đồng, trong khi đầu năm l&ocirc; n&agrave;y l&agrave; 9 tỷ đồng, tương đương mức giảm 20%. Nhờ chấp nhận giảm gi&aacute; mạnh hơn so với rổ h&agrave;ng neo gi&aacute; cao tr&ecirc;n c&ugrave;ng địa b&agrave;n, chủ đất đ&atilde; chốt giao dịch th&agrave;nh c&ocirc;ng, ho&agrave;n tất kh&acirc;u thương lượng đặt cọc.</p>\r\n\r\n<p><img alt=\"Thị trường nhà đất xã đảo Thạnh An, huyện Cần Giờ. Ảnh: Quỳnh Trần\" src=\"https://i1-kinhdoanh.vnecdn.net/2022/12/27/B64B35537961536F356ED53012B8AF-6357-8998-1672136752.jpg?w=680&amp;h=0&amp;q=100&amp;dpr=1&amp;fit=crop&amp;s=yx2bmKabk-bnCgFZShZw_A\" /></p>\r\n\r\n<p><iframe frameborder=\"0\" height=\"1\" id=\"google_ads_iframe_/27973503/Vnexpress/Desktop/Inimage/Kinhdoanh/Kinhdoanh.batdongsan.detail_0\" name=\"google_ads_iframe_/27973503/Vnexpress/Desktop/Inimage/Kinhdoanh/Kinhdoanh.batdongsan.detail_0\" scrolling=\"no\" tabindex=\"0\" title=\"3rd party ad content\" width=\"1\"></iframe></p>\r\n\r\n<p>Nh&agrave; đất x&atilde; đảo Thạnh An, huyện Cần Giờ nh&igrave;n từ tr&ecirc;n cao. Ảnh:&nbsp;<em>Quỳnh Trần</em></p>\r\n\r\n<p>Trong khi đ&oacute;, ở huyện Nh&agrave; B&egrave;, đất nền dự &aacute;n ch&agrave;o b&aacute;n tr&ecirc;n thị trường thứ cấp thuộc trục đường L&ecirc; Văn Lương ghi nhận gi&aacute; 27-53 triệu đồng một m2 t&ugrave;y vị tr&iacute; từng l&ocirc;, giảm 10-15% so với gi&aacute; từng rao b&aacute;n hồi đầu năm.</p>\r\n\r\n<p>Tr&ecirc;n địa b&agrave;n x&atilde; Ph&uacute; Xu&acirc;n, quanh trục đường Nguyễn Lương Bằng, đất nền dự &aacute;n x&acirc;y nh&agrave; liền thổ được ch&agrave;o b&aacute;n thứ cấp 33-60 triệu đồng một m2 t&ugrave;y vị tr&iacute;, giảm 8-17% so với c&ugrave;ng kỳ năm ngo&aacute;i. Gi&aacute; đất nền trục đường Huỳnh Tấn Ph&aacute;t cũng ghi nhận mức ch&agrave;o b&aacute;n 40-63 triệu đồng, giảm 7-14% so với c&ugrave;ng kỳ. Tại x&atilde; Phước Kiển, đất nền x&acirc;y nh&agrave; liền thổ dự &aacute;n quy m&ocirc; tr&ecirc;n 20 ha tr&ecirc;n trục đường Nguyễn Hữu Thọ hiện c&oacute; gi&aacute; 55-110 triệu đồng một m2, giảm 21% so với cuối năm ngo&aacute;i.</p>\r\n\r\n<p>Với huyện B&igrave;nh Ch&aacute;nh, khu vực Trung Sơn, đất nền dự &aacute;n x&acirc;y nh&agrave; liền thổ loại 100 m2 đang rao gi&aacute; 7,3-7,6 tỷ đồng c&oacute; thương lượng, giảm 10% so với đầu năm. Trong khi đ&oacute;, đất dự &aacute;n ch&agrave;o b&aacute;n thứ cấp tr&ecirc;n trục Nguyễn Văn Linh hiện c&oacute; gi&aacute; 78-80 triệu đồng một m2, giảm 8-10% so với c&ugrave;ng kỳ năm trước.</p>\r\n\r\n<p><img alt=\"Thị trường nhà đất huyện Nhà Bè. Ảnh: Quỳnh Trần\" src=\"https://i1-kinhdoanh.vnecdn.net/2022/12/27/DJI-0868-1419-1672136752.jpg?w=680&amp;h=0&amp;q=100&amp;dpr=1&amp;fit=crop&amp;s=aAcVZI3ovVPGF3mzW5IcTw\" /></p>\r\n\r\n<p>Thị trường nh&agrave; đất huyện Nh&agrave; B&egrave;. Ảnh:&nbsp;<em>Quỳnh Trần</em></p>\r\n\r\n<p>Ở khu vực H&oacute;c M&ocirc;n, đất nền x&acirc;y nh&agrave; liền thổ thuộc một dự &aacute;n quy m&ocirc; 3 ha tr&ecirc;n đường Nguyễn Văn Bứa, x&atilde; Xu&acirc;n Thới Sơn ghi nhận gi&aacute; ch&agrave;o b&aacute;n 22-23 triệu đồng một m2, giảm 10% so với đầu năm nay. Cũng tr&ecirc;n địa b&agrave;n huyện n&agrave;y, đất nền quanh đường Nguyễn Ảnh Thủ, B&agrave; Điểm c&oacute; gi&aacute; 22-25 triệu đồng một m2, giảm 9% so với c&ugrave;ng kỳ. Tuy nhi&ecirc;n, c&aacute;c trường hợp ch&agrave;o b&aacute;n đều rơi v&agrave;o nh&oacute;m nh&agrave; đầu tư ngộp t&agrave;i ch&iacute;nh; ri&ecirc;ng những người kh&ocirc;ng bị kh&oacute; khăn về d&ograve;ng tiền chọn c&aacute;ch &ocirc;m h&agrave;ng trong trung v&agrave; d&agrave;i hạn.</p>\r\n\r\n<p>B&aacute;o c&aacute;o mới nhất về thị trường đất nền 5 huyện ngoại th&agrave;nh TP HCM của DKRA Việt Nam cũng cho biết, thị trường đất nền c&oacute; dấu hiệu giảm tốc từ cuối th&aacute;ng 4 v&agrave; đ&agrave; giảm mạnh dần khi c&agrave;ng về cuối năm. T&iacute;nh đến ng&agrave;y 26/12, gi&aacute; b&aacute;n đất nền dự &aacute;n giảm thấp nhất trong ngưỡng tr&ecirc;n dưới 5% v&agrave; cao nhất l&ecirc;n đến 21% so với c&ugrave;ng kỳ năm ngo&aacute;i.</p>\r\n\r\n<p>Đơn vị n&agrave;y x&aacute;c nhận, đất nền l&ocirc; lẻ ghi nhận mức giảm gi&aacute; cao nhất l&ecirc;n đến 25% so với c&ugrave;ng kỳ 2021, trong đ&oacute;, tại huyện H&oacute;c M&ocirc;n, gi&aacute; đất nền lẻ giảm 10-15%, tại Cần Giờ giảm 11-18%, huyện Củ Chi hạ 13-25%. Tuy gi&aacute; b&aacute;n điều chỉnh, c&aacute;c giao dịch th&agrave;nh c&ocirc;ng vẫn kh&aacute; khi&ecirc;m tốn, thanh khoản thị trường sụt 70-75% so với đầu năm.</p>\r\n\r\n<p><strong>Diễn biến giảm gi&aacute; đất tại c&aacute;c huyện ven được m&ocirc;i giới tr&ecirc;n c&aacute;c địa b&agrave;n n&agrave;y nh&igrave;n nhận</strong>&nbsp;l&agrave; do thị trường chịu t&aacute;c động bởi việc c&aacute;c ng&acirc;n h&agrave;ng tăng cường kiểm so&aacute;t t&iacute;n dụng, thanh khoản sụt giảm. Th&ecirc;m v&agrave;o đ&oacute;, th&ocirc;ng tin cuối th&aacute;ng 11, UBND TP HCM đề nghị c&aacute;c huyện ngoại th&agrave;nh kh&ocirc;ng xin chủ trương l&ecirc;n quận hoặc th&agrave;nh phố m&agrave; chờ sau khi đạt chuẩn mới quyết định m&ocirc; h&igrave;nh ph&ugrave; hợp với từng địa phương cũng t&aacute;c động đ&aacute;ng kể đến t&acirc;m l&yacute; người b&aacute;n lẫn người mua trong bối cảnh thị trường thanh khoản k&eacute;m.</p>\r\n\r\n<p>Trước đ&oacute;, th&aacute;ng 1/2021, Sở Nội vụ TP HCM c&oacute; kế hoạch&nbsp;<a href=\"https://vnexpress.net/thoi-su/hoc-mon-binh-chanh-nha-be-du-kien-thanh-quan-truoc-2025-4248920.html\" rel=\"dofollow\">x&acirc;y dựng</a>&nbsp;Đề &aacute;n chuyển một số huyện th&agrave;nh quận hoặc th&agrave;nh phố, giai đoạn 2021-2030, với l&yacute; do c&aacute;c địa phương n&agrave;y c&oacute; tốc độ đ&ocirc; thị ho&aacute; nhanh, nhiều khu đ&ocirc; thị, hạ tầng, tuyến cao tốc đ&atilde; v&agrave; đang h&igrave;nh th&agrave;nh. Tr&igrave;nh độ d&acirc;n tr&iacute;, lối sống đ&ocirc; thị ở 5 huyện kh&ocirc;ng kh&aacute;c nhiều c&aacute;c quận nội th&agrave;nh.</p>\r\n\r\n<p>Sau khi đề &aacute;n được c&ocirc;ng bố, 5 huyện ngoại th&agrave;nh đ&atilde; tổ chức c&aacute;c hội nghị, hội thảo lấy &yacute; kiến c&aacute;c chuy&ecirc;n gia, nh&agrave; đầu tư về định hướng ph&aacute;t triển. Một số huyện đưa ra mục ti&ecirc;u l&ecirc;n quận trước năm 2025 như B&igrave;nh Ch&aacute;nh, Nh&agrave; B&egrave;, H&oacute;c M&ocirc;n; c&ograve;n Củ Chi, Cần Giờ dự kiến l&ecirc;n quận trước 2030. Tuy nhi&ecirc;n, sau đ&oacute; lần lượt 5 huyện ngoại th&agrave;nh đều c&ocirc;ng bố &yacute; định n&acirc;ng cấp&nbsp;<a href=\"https://vnexpress.net/thoi-su/ly-do-5-huyen-tp-hcm-muon-len-thanh-pho-4471954.html\" rel=\"dofollow\">l&ecirc;n th&agrave;nh phố</a>, thay v&igrave; quận.</p>\r\n\r\n<p>Theo l&atilde;nh đạo UBND TP HCM, l&yacute; do th&agrave;nh phố y&ecirc;u cầu 5 huyện kh&ocirc;ng xin l&ecirc;n quận hay th&agrave;nh phố v&igrave; việc n&agrave;y c&oacute; thể g&acirc;y sốt đất, đầu cơ, chưa kể thẩm quyền n&acirc;ng cấp đơn vị h&agrave;nh ch&iacute;nh l&agrave; của Quốc hội.</p>\r\n\r\n<p>Thực tế, ngay khi c&oacute; th&ocirc;ng tin một số huyện tại TP HCM được&nbsp;<a href=\"https://vnexpress.net/hoc-mon-binh-chanh-nha-be-du-kien-thanh-quan-truoc-2025-4248920.html\" rel=\"dofollow\">định hướng l&ecirc;n quận</a>&nbsp;hồi đầu năm 2021 đ&atilde; khiến thị trường đất nền c&aacute;c huyện ven đ&ocirc; S&agrave;i G&ograve;n biến động. Hồi th&aacute;ng 3/2021&nbsp;<a href=\"https://vnexpress.net/kinh-doanh/gia-dat-5-huyen-ven-do-dong-loat-tang-4253806.html\" rel=\"dofollow\">gi&aacute; đất huyện ven đ&ocirc;</a>&nbsp;tăng ở bi&ecirc;n độ phổ biến 3-20% so với hồi cuối năm 2020 bất chấp Covid-19 diễn biến phức tạp. Khi đ&oacute;, gi&aacute; đất 5 huyện đạt đỉnh 45-92 triệu đồng mỗi m2.</p>\r\n\r\n<p>Đ&agrave; tăng vẫn tiếp tục trong qu&yacute; I/2022 nhưng từ qu&yacute; II trở đi, xu hướng giảm gi&aacute; b&aacute;n bắt đầu xuất hiện. C&aacute;c động th&aacute;i giảm gi&aacute; đất tại 5 huyện ven trong nửa cuối năm nay mạnh dần, song được m&ocirc;i giới địa phương thừa nhận nh&agrave; đầu tư &ocirc;m đất chỉ đang cắt lời chứ chưa xảy ra trường hợp bị lỗ do đ&atilde; tăng gi&aacute; cao trước đ&oacute;.</p>\r\n\r\n<p>&Ocirc;ng Phan C&ocirc;ng Ch&aacute;nh, Tổng gi&aacute;m đốc Ph&uacute; Vinh Group cho biết c&aacute;c th&ocirc;ng tin kỳ vọng n&acirc;ng cấp từ huyện l&ecirc;n quận lu&ocirc;n phản &aacute;nh v&agrave;o gi&aacute; (gi&aacute; kỳ vọng) trước khi mức gi&aacute; đ&oacute; được thị trường chấp nhận (gi&aacute; thị trường). V&igrave; vậy, khi c&aacute;c th&ocirc;ng tin kỳ vọng n&agrave;y yếu đi hoặc kh&ocirc;ng c&ograve;n chắc chắn sẽ c&oacute; t&aacute;c động k&eacute;o gi&aacute; kỳ vọng xuống, tức l&agrave;m giảm gi&aacute; ch&agrave;o b&aacute;n tr&ecirc;n thị trường.</p>\r\n\r\n<p>&Ocirc;ng Ch&aacute;nh ph&acirc;n t&iacute;ch, đa số nh&agrave; đầu tư &ocirc;m đất tại 5 huyện ven 2,5-3 năm trở l&ecirc;n đều l&atilde;i lớn, nếu c&aacute;c nh&oacute;m n&agrave;y giảm gi&aacute; b&aacute;n chỉ l&agrave; giảm lời, chia sẻ một phần lợi nhuận lại cho người mua sau. Rủi ro thua lỗ v&igrave; gi&aacute; giảm chỉ xuất hiện cho những người đ&atilde; mua trong giai đoạn đầu năm 2021 đến đầu năm 2022 do đ&atilde; đặt cược qu&aacute; nhiều v&agrave;o mức gi&aacute; kỳ vọng vốn đ&atilde; neo rất cao. Khoản rủi ro họ phải chịu l&agrave; ch&ecirc;nh lệch giữa gi&aacute; kỳ vọng v&agrave; gi&aacute; thị trường ng&agrave;y c&agrave;ng lớn. Ch&ecirc;nh lệch n&agrave;y thường dao động trong khoảng trung b&igrave;nh 5-15% v&agrave; cao 20-30% mức gi&aacute; trong điều kiện thị trường diễn biến b&igrave;nh thường.</p>\r\n\r\n<p>CEO Ph&uacute; Vinh Group n&ecirc;u v&iacute; dụ, một căn nh&agrave; trong khu d&acirc;n cư hiện hữu, c&oacute; thể d&ugrave;ng để ở v&agrave; cho thu&ecirc; gi&aacute; 10 tỷ, khi thị trường ổn định, giảm gi&aacute; xuống c&ograve;n 8-8,5 tỷ sẽ c&oacute; thanh khoản ngay. Tuy nhi&ecirc;n, trong giai đoạn thị trường bị bong b&oacute;ng kh&ocirc;ng thể đo được sự ch&ecirc;nh lệch giữa gi&aacute; thật v&agrave; gi&aacute; ảo, mức giảm t&agrave;i sản rất kh&oacute; đo lường. Cộng th&ecirc;m t&acirc;m l&yacute; thị trường xấu dẫn đến hệ quả d&ugrave; giảm gi&aacute; nhưng thanh khoản trầm lắng.</p>\r\n\r\n<p>Theo &ocirc;ng Ch&aacute;nh, đến nay quan s&aacute;t thị trường, nh&oacute;m nh&agrave; đầu tư bất động sản c&oacute; l&atilde;i vẫn chiếm tỷ lệ lời cao, c&ograve;n lỗ chỉ chiếm thiểu số thường rơi v&agrave;o nh&oacute;m nh&agrave; đầu tư non kinh nghiệm v&agrave; d&ugrave;ng đ&ograve;n bẩy qu&aacute; đ&agrave;.</p>\r\n\r\n<p>C&ograve;n &ocirc;ng V&otilde; Hồng Thắng, Ph&oacute; gi&aacute;m đốc Nghi&ecirc;n cứu &amp; Ph&aacute;t triển DKRA Việt Nam cho biết ngo&agrave;i nguy&ecirc;n nh&acirc;n UBND TP HCM gần đ&acirc;y chủ trương 5 huyện kh&ocirc;ng vội đề xuất l&ecirc;n quận hoặc th&agrave;nh phố, c&ograve;n c&oacute; hai nguy&ecirc;n nh&acirc;n ch&iacute;nh kh&aacute;c dẫn đến thị trường sụt giảm.</p>\r\n\r\n<p>Thứ nhất l&agrave; do sự tăng cường kiểm so&aacute;t t&iacute;n dụng bất động sản. Từ cuối th&aacute;ng 4 cơ quan quản l&yacute; nh&agrave; nước đ&atilde; tăng cường kiểm so&aacute;t t&iacute;n dụng, trong đ&oacute; bao gồm cả k&ecirc;nh ph&aacute;t h&agrave;nh tr&aacute;i phiếu doanh nghiệp. Doanh nghiệp địa ốc gặp kh&oacute; trong việc tiếp cận nguồn vốn từ 2 k&ecirc;nh n&agrave;y dẫn đến nguồn cung sụt giảm, nh&agrave; đầu tư c&aacute; nh&acirc;n kh&oacute; tiếp cận vốn vay ng&acirc;n h&agrave;ng dẫn đến sức cầu của thị trường sụt giảm.</p>\r\n\r\n<p>Thứ hai theo &ocirc;ng Thắng, l&agrave; do l&atilde;i suất tăng mạnh. L&atilde;i suất cho vay mua bất động sản t&iacute;nh đến ng&agrave;y 26/12 dao động 11-15% một năm. Với mức l&atilde;i suất n&agrave;y, nhiều nh&agrave; đầu tư thận trọng hơn trong quyết định d&ugrave;ng đ&ograve;n bẩy t&agrave;i ch&iacute;nh để đầu tư t&agrave;i sản trong giai đoạn thanh khoản to&agrave;n thị trường xuống thấp. Những nh&agrave; đầu tư c&oacute; sử dụng đ&ograve;n bẩy t&agrave;i ch&iacute;nh chịu &aacute;p lực l&atilde;i vay ng&agrave;y c&agrave;ng lớn khi l&atilde;i suất tăng manh, với t&igrave;nh h&igrave;nh kinh tế đang gặp kh&oacute; khăn, thu nhập bị sụt giảm khiến nh&agrave; đầu tư phải chấp nhận giảm gi&aacute;, cắt lỗ hoặc giảm một phần lợi nhuận để xả h&agrave;ng, giảm &aacute;p lực t&agrave;i ch&iacute;nh c&aacute; nh&acirc;n.</p>\r\n\r\n<p>Tuy nhi&ecirc;n, việc giằng co tr&ecirc;n thị trường diễn ra mạnh mẽ khi một b&ecirc;n muốn b&aacute;n d&ugrave; giảm gi&aacute;, b&ecirc;n kia thận trọng khi ra quyết định đầu tư trong giai đoạn n&agrave;y. Đ&acirc;y l&agrave; l&yacute; do ch&iacute;nh khiến mặt bằng gi&aacute; giảm mạnh trong thời gian vừa qua nhưng thanh khoản lại rất thấp.</p>\r\n\r\n<p style=\"text-align:right\"><strong>Vũ L&ecirc;</strong></p>\r\n\r\n<div id=\"ag-translate-icon\" style=\"bottom:-2550px; left:-24px; user-select:none\">\r\n<div class=\"img\">&nbsp;</div>\r\n</div>\r\n<script src=\"chrome-extension://lopnbnfpjmgpbppclhclehhgafnifija/aiscripts/t.js\"></script>\r\n<script src=\"chrome-extension://lopnbnfpjmgpbppclhclehhgafnifija/aiscripts/script-main.js\"></script>\r\n', 1, 4, '2022/12/28 16:32:38');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id` int(4) NOT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `avatar` varchar(200) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `role` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id`, `name`, `username`, `password`, `email`, `avatar`, `status`, `role`) VALUES
(2, 'Lê Tấn Kim', 'letankim2003', '12345678', 'letankim2003@gmail.com', NULL, 1, 1),
(3, 'Trần Thị Yến Ngọc', 'yenngoc2003', '12345678', 'tranthiyengoc2003cd@gmail.com', 'ngoc.jpg', 1, 0),
(9, 'lê tấn kim', 'user', '4B16D#l&', 'letankim2003@gmail.com', 'aokhat2.jpg', 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_banner`
--
ALTER TABLE `tbl_banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_comment`
--
ALTER TABLE `tbl_comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_comment` (`idUser`),
  ADD KEY `fk_post_comment` (`idPost`);

--
-- Indexes for table `tbl_introduction`
--
ALTER TABLE `tbl_introduction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_navigation`
--
ALTER TABLE `tbl_navigation`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_post`
--
ALTER TABLE `tbl_post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_nav_post` (`id_nav`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_banner`
--
ALTER TABLE `tbl_banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_comment`
--
ALTER TABLE `tbl_comment`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tbl_introduction`
--
ALTER TABLE `tbl_introduction`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_navigation`
--
ALTER TABLE `tbl_navigation`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_post`
--
ALTER TABLE `tbl_post`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_comment`
--
ALTER TABLE `tbl_comment`
  ADD CONSTRAINT `fk_post_comment` FOREIGN KEY (`idPost`) REFERENCES `tbl_post` (`id`),
  ADD CONSTRAINT `fk_user_comment` FOREIGN KEY (`idUser`) REFERENCES `tbl_user` (`id`);

--
-- Constraints for table `tbl_post`
--
ALTER TABLE `tbl_post`
  ADD CONSTRAINT `fk_nav_post` FOREIGN KEY (`id_nav`) REFERENCES `tbl_navigation` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
