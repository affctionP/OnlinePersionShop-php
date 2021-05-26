-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2021 at 02:19 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hosseini`
--
CREATE DATABASE IF NOT EXISTS `hosseini` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `hosseini`;



-- --------------------------------------------------------


--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(10) NOT NULL,
  `admin_email` varchar(255) NOT NULL,
  `admin_pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_email`, `admin_pass`) VALUES
(1, 'atefeh-hosseinii@yahoo.com', '123456789a');

-- --------------------------------------------------------
--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `brand_id` int(100) NOT NULL,
  `brand_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`brand_id`, `brand_title`) VALUES
(8, 'حسینی');

-- --------------------------------------------------------

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `ip_add` varchar(255) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`cart_id`, `p_id`, `ip_add`, `qty`) VALUES
(1, 6, '', 2),
(2, 5, '', 0),
(6, 9, '216.177.133.31', 1);

-- --------------------------------------------------------
-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(100) NOT NULL,
  `cat_title` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(7, 'قارچ دکمه ای'),
(9, 'فلفل دلمه'),
(10, 'ذرت'),
(11, 'گوجه ');

-- --------------------------------------------------------
-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(10) NOT NULL,
  `c_name` varchar(255) NOT NULL,
  `c_email` varchar(255) NOT NULL,
  `c_body` varchar(255) NOT NULL,
  `p_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `c_name`, `c_email`, `c_body`, `p_id`) VALUES
(8, 'عاطفه بانو', 'atefeh_11@gmail.com', 'پسندیدم این را', 5),
(9, 'ali', 'alijab@yahoo.com', 'خشمزه بودن', 5),
(10, 'ali', 'alijab@yahoo.com', 'خشمزه بودن', 5);

-- --------------------------------------------------------
-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `customer_id` int(10) NOT NULL,
  `customer_ip` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `customer_name` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `customer_email` varchar(100) NOT NULL,
  `customer_pass` varchar(100) NOT NULL,
  `customer_city` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `customer_phone` text NOT NULL,
  `customer_image` text CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  `customer_gender` varchar(50) NOT NULL,
  `customer_provice` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `customer_lastname` text CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `customer_address` text NOT NULL,
  `confirmed` int(11) NOT NULL,
  `confiremd_code` int(11) NOT NULL,
  `lost` varchar(100) CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`customer_id`, `customer_ip`, `customer_name`, `customer_email`, `customer_pass`, `customer_city`, `customer_phone`, `customer_image`, `customer_gender`, `customer_provice`, `customer_lastname`, `customer_address`, `confirmed`, `confiremd_code`, `lost`) VALUES
(16, '::1', 'مینو', 'minomansouri74@gmail.com', 'mino12345', 'آستانه اشرفيه', '09132022354', 'customer/customer_profile/00overlooked-Jones2-superJumbo-v3.jpg', 'زن', 'گیلان', 'منصوری', 'خیابان اتشگاه خیابان مظاهری محله گلبان پلاک 4', 1, 2012931803, '');

-- --------------------------------------------------------


--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `order_id` int(11) NOT NULL,
  `order_time` datetime NOT NULL DEFAULT current_timestamp(),
  `order_total_price` decimal(10,0) NOT NULL,
  `order_is_verified` text NOT NULL,
  `order_email_customer` varchar(100) NOT NULL,
  `refid` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`order_id`, `order_time`, `order_total_price`, `order_is_verified`, `order_email_customer`, `refid`) VALUES
(9, '2021-04-29 21:54:20', '137000', 'false', 'minomansouri74@gmail.com', ''),
(11, '2021-04-29 23:54:57', '6700', 'false', 'minomansouri74@gmail.com', ''),
(12, '2021-04-30 00:13:37', '137000', 'false', 'minomansouri74@gmail.com', ''),
(13, '2021-04-30 00:20:53', '137000', 'true', 'minomansouri74@gmail.com', '12345678'),
(14, '2021-05-01 09:54:26', '137000', 'true', 'minomansouri74@gmail.com', '12345678');

-- --------------------------------------------------------

--
-- Table structure for table `pay_cart`
--

CREATE TABLE `pay_cart` (
  `cart_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `ip_add` varchar(255) NOT NULL,
  `qty` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `order_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pay_cart`
--

INSERT INTO `pay_cart` (`cart_id`, `p_id`, `ip_add`, `qty`, `order_id`, `order_time`) VALUES
(1, 6, '::1', 2, 0, '2021-04-29 19:44:33'),
(2, 10, '::1', 1, 0, '2021-04-29 19:44:33'),
(3, 7, '::1', 1, 0, '2021-04-29 19:44:33'),
(4, 6, '::1', 2, 13, '2021-04-29 19:50:58'),
(5, 10, '::1', 1, 13, '2021-04-29 19:50:58'),
(6, 7, '::1', 1, 13, '2021-04-29 19:50:58'),
(7, 5, '::1', 1, 14, '2021-05-01 05:24:34'),
(8, 7, '::1', 1, 14, '2021-05-01 05:24:34');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(10) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_body` text NOT NULL,
  `post_time` timestamp NOT NULL DEFAULT current_timestamp(),
  `post_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_title`, `post_body`, `post_time`, `post_image`) VALUES
(3, 'چگونه قارج تولید کنیم؟!', '<h2 style=\"padding: 0px; margin: 0px 0px 0.5em; list-style: none; border: 0px; outline: none; box-sizing: border-box; line-height: 1.3; font-size: 27px; font-family: IRANSans; color: #2c2f34; text-align: center;\"><span style=\"padding: 0px; margin: 0px; list-style: none; border: 0px; outline: none; box-sizing: border-box; color: #ff0000;\">طراحی سالن پرورش قارچ</span></h2>\r\n<p style=\"padding: 0px; margin: 0px 0px 25px; list-style: none; border: 0px; outline: none; box-sizing: border-box; line-height: 26px; color: #2c2f34; font-family: IRANSans; font-size: 15px; text-align: right;\">اکثر سالن های پرورش قارچ دکمه &shy;ای در ایران، دارای دیوارهای بتونی و کف موزاییک می باشند. لیکن برای واحدهای صنعتی از دیوارهای&nbsp;<span style=\"padding: 0px; margin: 0px; list-style: none; border: 0px; outline: none; box-sizing: border-box; color: #ff00ff;\"><span style=\"padding: 0px; margin: 0px; list-style: none; border: 0px; outline: none; box-sizing: border-box; font-weight: 600;\"><a style=\"padding: 0px; margin: 0px; list-style: none; border: 0px; outline: none; box-sizing: border-box; background-color: transparent; color: #ff00ff; text-decoration-line: none; transition: all 0.15s ease 0s;\" href=\"https://datagharch.com/11-%D8%B1%D9%88%D8%B4-%DA%A9%D8%A7%D9%87%D8%B4-%D9%85%D8%B5%D8%B1%D9%81-%D8%A7%D9%86%D8%B1%DA%98%DB%8C-%D8%AF%D8%B1-%D8%B3%D8%A7%D9%84%D9%86-%D9%87%D8%A7%DB%8C-%D9%BE%D8%B1%D9%88%D8%B1%D8%B4-%D9%82\" target=\"_blank\" rel=\"noopener noreferrer\">ساندویچ پنل</a></span></span>&nbsp;که عایق هستند، استفاده می &shy;کنند.</p>\r\n<p style=\"padding: 0px; margin: 0px 0px 25px; list-style: none; border: 0px; outline: none; box-sizing: border-box; line-height: 26px; color: #2c2f34; font-family: IRANSans; font-size: 15px; text-align: right;\">برای سقف سالن&shy; ها پلیت، تیرچه بلوک و یا بلوک همراه فوم بکار می&zwnj;برند. معمولاً ابعاد سالن&zwnj;ها را (۲۱-۱۸)&times; ۶ متر با ارتفاع ۴/۵ متر در نظر می&shy; گیرند که این ابعاد در واحدهای مختلف متغیر است. در سالن یک شیب ملایم به مقدار یک سانتی&shy; متر از ابتدای سالن به انتهای آن و از کناره &shy;ها به سمت وسط سالن به مقدار ۲ سانتی&shy; متر جهت جلوگیری از تجمع آب در زمان شستشوی کف، وجود دارد.</p>\r\n<h2 style=\"padding: 0px; margin: 0px 0px 0.5em; list-style: none; border: 0px; outline: none; box-sizing: border-box; line-height: 1.3; font-size: 27px; font-family: IRANSans; color: #2c2f34; text-align: right;\"><span style=\"padding: 0px; margin: 0px; list-style: none; border: 0px; outline: none; box-sizing: border-box; color: #ff0000;\">قفسه بندی سالن پرورش قارچ:</span></h2>\r\n<p style=\"padding: 0px; margin: 0px 0px 25px; list-style: none; border: 0px; outline: none; box-sizing: border-box; line-height: 26px; color: #2c2f34; font-family: IRANSans; font-size: 15px; text-align: right;\">استفاده از عرض ۱۴۰ سانتی&zwnj;متر و ۱۶۰ سانتی&zwnj;متر در کشور ما مرسوم است که با سایز ۱۴۰ سانتی&zwnj;متر، کار کارگر داخل سالن راحت&zwnj;تر است ولی اغلب از سایز ۱۶۰ سانتی&shy; متر جهت افزایش سطح زیر کشت استفاده می&zwnj;کنند. البته با توجه به وضعیت عرض سالن و محدودیت&zwnj;های هر محل باید جداگانه طراحی شود.</p>\r\n<p style=\"padding: 0px; margin: 0px 0px 25px; list-style: none; border: 0px; outline: none; box-sizing: border-box; line-height: 26px; color: #2c2f34; font-family: IRANSans; font-size: 15px; text-align: right;\">فاصله بین طبقات ۶۵ تا ۷۰ سانتی&zwnj;متر مناسب است که کار کارگران راحت&zwnj;تر باشد و اختلاف حدود ۲۰ سانتی&zwnj;متر طبقه اول از کف سالن جهت شست&zwnj;وشو و نظافت در پایان هر مرحله کاری، لازم است.</p>\r\n<p style=\"padding: 0px; margin: 0px 0px 25px; list-style: none; border: 0px; outline: none; box-sizing: border-box; line-height: 26px; color: #2c2f34; font-family: IRANSans; font-size: 15px; text-align: right;\">در تولید قارچ، جنس قفسه بندی بسته به میزان هزینه ای که برای آن در نظر گرفته می شود، متفاوت است؛ سازه پروفیل ساختمانی با آهن سیاه، لوله&nbsp;و پروفیل صنعتی را می توان برای قفسه بندی در نظر گرفت.</p>\r\n<p style=\"padding: 0px; margin: 0px 0px 25px; list-style: none; border: 0px; outline: none; box-sizing: border-box; line-height: 26px; color: #2c2f34; font-family: IRANSans; font-size: 15px; text-align: right;\">معمولاً از سازه لوله بدلیل&nbsp;هزینه نسبتاً مناسب نسبت به روش&zwnj;های دیگر، استقامت و مقاومت نسبت به روش&zwnj;های دیگر&nbsp;به علت نوع سازه و همچنین شکل&zwnj;پذیری به مراتب بیشتر استفاده می شود.</p>', '2021-04-27 20:09:36', 'posts_imageIMG_6102-1024x768.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(100) UNSIGNED NOT NULL,
  `product_cat` int(100) NOT NULL,
  `product_brand` int(100) NOT NULL,
  `product_title` varchar(255) NOT NULL,
  `product_price` int(100) NOT NULL,
  `product_desc` text NOT NULL,
  `product_image` text NOT NULL,
  `product_keywords` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `p_status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_cat`, `product_brand`, `product_title`, `product_price`, `product_desc`, `product_image`, `product_keywords`, `created_at`, `p_status`) VALUES
(5, 7, 8, 'قارچ صدفی -سبد3کیلویی', 72000, '.قارچ صدفی کیلویی 24هزار تومان\r\n.ارسال محصول حداکثر تا 24 ساعت بعداز\r\nثبت سفارش.', 'products_images/mush3.jpg', 'قارچ عمده', '2021-04-24 14:51:54', 'موجودی دارد'),
(6, 9, 8, 'فلفل دلمه سبدی', 16000, 'فلفل دلمه ای سبدی 3 کیلویی\r\nکیلویی 5000تومن\r\nسه رنگ سبز / قرمز / زرد', 'products_images/peper.jpeg', 'فلفل دلمه عمده', '2021-04-24 22:07:56', 'موجودی دارد'),
(7, 7, 8, 'قارچ', 5000, 'قارچ بسته بندی حسینی ', 'products_images/small-mush.jpg', 'قارچ', '2021-04-24 22:28:35', 'در انبار موجود نیست'),
(8, 7, 8, 'قارچ بسته 100گرمی', 6500, 'قارچ حسیتی\r\nمرغوب', 'products_images/inpack-mush.jpg', 'قارچ', '2021-04-24 22:33:54', 'در انبار موجود نیست'),
(9, 7, 8, 'قارچ اسلایس شده', 6700, '.قارچ اسلایس شده \r\n.مناسب برا ی پخت فست فود', 'products_images/70ca0c8a-4720-4fe9-8052-f16b7150c03c.3b1e00b3fe7411a314e4783c27dfdb5a.jpeg', 'قارچ', '2021-04-25 00:22:46', 'موجودی دارد'),
(10, 7, 8, 'قارچ اسلایس شده فله ای', 100000, 'هر بسته 4 کیلوگرم می بتشد', 'products_images/قارچ-اسلایس-جعبه-ای-5-کیلوگرمی-4.jpg', 'قارچ', '2021-04-25 00:30:37', 'موجودی دارد');

-- --------------------------------------------------------

--
-- Table structure for table `total`
--

CREATE TABLE `total` (
  `total_id` int(20) NOT NULL,
  `ip` varchar(255) NOT NULL,
  `total_price_purchase` decimal(20,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `total`
--

INSERT INTO `total` (`total_id`, `ip`, `total_price_purchase`) VALUES
(1, '::1', '137000'),
(2, '216.177.133.31', '137000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `pay_cart`
--
ALTER TABLE `pay_cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `total`
--
ALTER TABLE `total`
  ADD PRIMARY KEY (`total_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `brand_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `customer_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `pay_cart`
--
ALTER TABLE `pay_cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(100) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `total`
--
ALTER TABLE `total`
  MODIFY `total_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
