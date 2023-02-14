-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 23, 2022 at 01:23 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hiconnect`
--

-- --------------------------------------------------------

--
-- Table structure for table `achievements`
--

CREATE TABLE `achievements` (
  `achievement_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `achievements`
--

INSERT INTO `achievements` (`achievement_id`, `name`, `description`, `user_id`) VALUES
(2, 'udemy certificate', 'udemy', 2),
(3, 'Best Employee', 'Employee of the month', 2),
(5, 'erf3efe', 'fef', 2),
(6, 'fdgh', 'vbn', 5),
(7, 'bnm', ' nm ', 5),
(9, 'fefewef', 'eger', 2);

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `company_id` int(11) NOT NULL,
  `company_name` varchar(255) NOT NULL,
  `year_start` year(4) NOT NULL,
  `business_nature` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `company_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`company_id`, `company_name`, `year_start`, `business_nature`, `description`, `user_id`, `date`, `company_image`) VALUES
(2, 'decorra', 2019, 'interior', 'sfffsf', 1, '2022-01-06', ''),
(3, 'Decorra interiors', 2018, 'Interior Design', 'Kitchen Cupboard, ceiling', 2, '2022-01-06', 'pexels_christina_mor_DaBP2.jpg'),
(4, 'Webly connect', 2020, 'Digital Marketing', 'dsgf', 15, '2022-01-11', ''),
(5, 'decorra', 2020, 'vbnmbn', 'nmn,nmxxfghjhkl', 5, '2022-01-19', ''),
(6, 'Decorra interiors', 2020, 'Interior Design', 'sadfghjhj', 16, '2022-01-22', 'pexels_pixabay_27179_mQswc.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `contact_details`
--

CREATE TABLE `contact_details` (
  `contact_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mob1` varchar(20) NOT NULL,
  `mob2` varchar(20) NOT NULL,
  `mob3` varchar(20) NOT NULL,
  `whatsapp1` varchar(20) NOT NULL,
  `whatsapp2` varchar(20) NOT NULL,
  `whatsapp3` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact_details`
--

INSERT INTO `contact_details` (`contact_id`, `user_id`, `email`, `mob1`, `mob2`, `mob3`, `whatsapp1`, `whatsapp2`, `whatsapp3`) VALUES
(1, 2, 'send2maya123@gmail.com', '9020309203', '7012160627', '7806575766', '9020309203', '7806575766', '7012160627');

-- --------------------------------------------------------

--
-- Table structure for table `contact_form_info`
--

CREATE TABLE `contact_form_info` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `comments` text NOT NULL,
  `date` date NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact_form_info`
--

INSERT INTO `contact_form_info` (`id`, `name`, `email`, `phone`, `comments`, `date`, `user_id`) VALUES
(1, 'Maya Ramanan', 'vrmaya10@gmail.com', '9020309203', 'ewrsfrfxerger', '2022-03-07', 0),
(2, 'shiv', 'send2maya123@gmail.com', '7907807682', 'rgrefrfefe', '2022-03-07', 0),
(3, 'arun', 'arun@gmail.com', '790780756', 'sdfsdsdfsdfs', '2022-03-07', 0),
(4, 'wwwwwfsdfd', 'vrmaya1e0@gmail.com', '7907807433', 'fv xfvdfvd', '2022-03-07', 1),
(5, 'sds gdsda', 'vrmaya10@gmail.com', '9020309203', 'dxfsadfsa', '2022-03-07', 2),
(6, 'rfwrewfre', 'vrmaya10@gmail.com', '4352534234', 'xfdfdds', '2022-03-08', 2),
(9, 'vdfb', 'send2maya123@gmail.com', '7907807682', 'sdfsdfsdf', '2022-03-09', 2),
(10, 'asdfghgfds', 'send2maya123@gmail.com', '35443543', 'dgsdgsdsfasf', '2022-03-10', 2),
(11, 'asdfghgfds', 'send2maya123@gmail.com', '35443543', 'dgsdgsdsfasf', '2022-03-14', 2);

-- --------------------------------------------------------

--
-- Table structure for table `counter`
--

CREATE TABLE `counter` (
  `id` int(11) NOT NULL,
  `visiters` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `counter`
--

INSERT INTO `counter` (`id`, `visiters`, `user_id`) VALUES
(1, 1, 2),
(2, 1, 1),
(3, 1, 21),
(4, 1, 24),
(5, 1, 25);

-- --------------------------------------------------------

--
-- Table structure for table `cover_category`
--

CREATE TABLE `cover_category` (
  `category_id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cover_category`
--

INSERT INTO `cover_category` (`category_id`, `category`) VALUES
(1, 'Information Teachnology'),
(2, 'Interior design'),
(3, 'Beauty Parlour'),
(5, 'Entertainment'),
(14, 'test');

-- --------------------------------------------------------

--
-- Table structure for table `cover_image`
--

CREATE TABLE `cover_image` (
  `cover_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `file_name` varchar(255) NOT NULL,
  `uploaded_on` datetime NOT NULL,
  `added_by` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cover_image`
--

INSERT INTO `cover_image` (`cover_id`, `category_id`, `file_name`, `uploaded_on`, `added_by`, `user_id`) VALUES
(27, 1, 'pexels_luis_gomes_54_Pfuyw.jpg', '2022-01-20 18:26:51', 1, 1),
(28, 1, 'pexels_pixabay_26166_bcKHC.jpg', '2022-01-20 18:26:51', 1, 1),
(29, 2, 'pexels_pixabay_27179_mQswc.jpg', '2022-01-20 18:27:04', 1, 1),
(30, 3, 'pexels_ary_shutter_8_yMKNO.jpg', '2022-01-20 18:27:20', 1, 1),
(31, 3, 'pexels_tu___n_ki___t_hI4Vl.jpg', '2022-01-20 18:27:20', 1, 1),
(47, 1, 'pexels_pixabay_28023_NJnko.jpg', '2022-01-22 18:17:58', 1, 1),
(48, 1, 'pexels_pixabay_45965_dC1lC.jpg', '2022-01-22 18:17:58', 1, 1),
(49, 1, 'pexels_wendy_wei_117_tWG3V1.jpg', '2022-01-22 18:17:58', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `cupon`
--

CREATE TABLE `cupon` (
  `cupon_id` int(11) NOT NULL,
  `cupon_name` varchar(50) NOT NULL,
  `percentage` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cupon`
--

INSERT INTO `cupon` (`cupon_id`, `cupon_name`, `percentage`, `status`) VALUES
(1, 'test', '10', '1');

-- --------------------------------------------------------

--
-- Table structure for table `education`
--

CREATE TABLE `education` (
  `education_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `university` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `description` text NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `education`
--

INSERT INTO `education` (`education_id`, `name`, `university`, `start_date`, `end_date`, `description`, `user_id`) VALUES
(1, 'computer engineering', 'technical education', '2008-03-01', '2011-03-05', 'diploma', 2),
(2, 'bca', 'bharathiar', '2017-05-08', '2020-05-08', 'bachelor of computer application', 2),
(10, 'Maya', 'bharathiar', '0000-00-00', '0000-00-00', 'ftyuio', 2),
(14, 'aaaaaaaaaa', 'sdfsdfsdf', '0000-00-00', '0000-00-00', 'dsfdsf', 2),
(15, 'BSC IT', 'Delhi university', '2019-01-11', '2022-01-13', 'dxcfvgbhnjkml;fctvygbnjmkl;', 15),
(17, 'msc', 'bharathiar', '2022-01-07', '2022-01-15', 'dfdngfgn', 1),
(20, 'uiouio', 'uiouio', '0000-00-00', '0000-00-00', '', 2);

-- --------------------------------------------------------

--
-- Table structure for table `experience`
--

CREATE TABLE `experience` (
  `experience_id` int(11) NOT NULL,
  `company` varchar(255) NOT NULL,
  `position` varchar(255) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `description` text NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `experience`
--

INSERT INTO `experience` (`experience_id`, `company`, `position`, `start_date`, `end_date`, `description`, `user_id`) VALUES
(1, 'IMMCO', 'junior engineer', '2011-12-01', '2014-01-31', 'tyjyjytjytjy', 2),
(2, 'Riolabz', 'junior php programmer', '2014-02-01', '2015-05-31', 'rtrtrtgrvgrvgv', 2),
(3, 'Suvan Technology', 'PHP Programmer', '2021-12-30', '2022-01-19', 'rthrthr n tdnnnnnnnnnnnnnnn', 2);

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `file_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `uploaded_on` datetime NOT NULL,
  `status` enum('1','0') COLLATE utf8_unicode_ci NOT NULL DEFAULT '1' COMMENT '1=Active, 0=Inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `file_name`, `user_id`, `uploaded_on`, `status`) VALUES
(36, 'Default.jpg', 0, '2022-01-16 17:39:10', '1'),
(41, 'pexels_andre_furtado_WVctD.jpg', 2, '2022-01-27 13:15:17', '1'),
(42, 'pexels_ary_shutter_8_yMKNO.jpg', 2, '2022-01-27 13:15:17', '1'),
(43, 'pexels_burst_374899.jpg', 2, '2022-01-27 13:15:17', '1'),
(44, 'pexels_christina_mor_DaBP2.jpg', 2, '2022-01-27 13:15:17', '1');

-- --------------------------------------------------------

--
-- Table structure for table `ipdb`
--

CREATE TABLE `ipdb` (
  `id` int(11) NOT NULL,
  `ip` text NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ipdb`
--

INSERT INTO `ipdb` (`id`, `ip`, `user_id`) VALUES
(1, '::1', 2),
(2, '::1', 1),
(3, '::1', 21),
(4, '::1', 24),
(5, '::1', 25);

-- --------------------------------------------------------

--
-- Table structure for table `manage_package`
--

CREATE TABLE `manage_package` (
  `id` int(11) NOT NULL,
  `package_id` int(11) NOT NULL,
  `page` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `manage_package`
--

INSERT INTO `manage_package` (`id`, `package_id`, `page`) VALUES
(1, 1, 'Themes,Contact Details,Achievements,Experience,Education,Gallery,Payment Details,Enquiries'),
(2, 2, 'Themes,Covers,Personal Details,Contact Details,Social Links,Services,Testimonials,Achievements,Education,Gallery,Payment Details,Enquiries,Generate QR Code,Change Password,Package'),
(3, 3, 'Themes,Covers,Personal Details,Company Details,Contact Details,Social Links,Services,Testimonials,Achievements,Products,Gallery,Payment Details,Enquiries'),
(5, 4, 'Themes,Covers,Personal Details,Company Details,Contact Details,Social Links,Services,Testimonials,Achievements,Experience,Education,Products,Gallery,Payment Details,Enquiries,Generate QR Code,Change Password,Package'),
(6, 7, 'Themes,Personal Details,Contact Details,Social Links,Gallery,Change Password,Package');

-- --------------------------------------------------------

--
-- Table structure for table `manage_products`
--

CREATE TABLE `manage_products` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `regular_price` decimal(10,2) NOT NULL,
  `sale_price` decimal(10,2) NOT NULL,
  `image` varchar(255) NOT NULL,
  `short_description` tinytext NOT NULL,
  `long_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `manage_products`
--

INSERT INTO `manage_products` (`id`, `product_name`, `regular_price`, `sale_price`, `image`, `short_description`, `long_description`) VALUES
(1, 'Hiconnect card', '1000.00', '660.00', 'card12.gif', 'Hiconnect card', 'Hiconnect card Free Package'),
(2, 'Custom Card', '8000.00', '7500.00', 'WhiteMetal_343x.gif', 'Custom Card', 'Custom Card gold package g'),
(3, 'Plastic card', '4500.00', '4000.00', 'v1ce-bamboo_business_card-nfc-tap-all_in_one_card_343x.gif', 'Plastic card', 'Plastic card');

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE `package` (
  `package_id` int(11) NOT NULL,
  `package` varchar(255) NOT NULL,
  `currency` varchar(255) NOT NULL,
  `regular_price` decimal(10,2) NOT NULL,
  `sale_price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `package`
--

INSERT INTO `package` (`package_id`, `package`, `currency`, `regular_price`, `sale_price`) VALUES
(1, 'Platinum', 'INR', '15000.00', '10000.00'),
(2, 'Silver', 'AUD', '8000.00', '7000.00'),
(3, 'Gold', 'AFN', '6500.00', '6200.00'),
(4, 'Diamond', '', '5000.00', '4500.00'),
(7, 'Free', '', '0.00', '0.00');

-- --------------------------------------------------------

--
-- Table structure for table `payment_app`
--

CREATE TABLE `payment_app` (
  `app_id` int(11) NOT NULL,
  `payment_type` varchar(20) NOT NULL,
  `app_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment_app`
--

INSERT INTO `payment_app` (`app_id`, `payment_type`, `app_name`) VALUES
(2, 'Wallet', 'Google pay'),
(4, 'Wallet', 'phone pay'),
(5, 'Wallet', 'Paytm'),
(6, 'Account', 'Paypal');

-- --------------------------------------------------------

--
-- Table structure for table `payment_details`
--

CREATE TABLE `payment_details` (
  `payment_id` int(11) NOT NULL,
  `payment_type` varchar(20) NOT NULL,
  `account_no` varchar(255) NOT NULL,
  `ifsc` varchar(255) NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `bank_branch` varchar(255) NOT NULL,
  `bank_address` text NOT NULL,
  `app_id` int(11) NOT NULL,
  `handle` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payment_details`
--

INSERT INTO `payment_details` (`payment_id`, `payment_type`, `account_no`, `ifsc`, `bank_name`, `bank_branch`, `bank_address`, `app_id`, `handle`, `user_id`) VALUES
(1, 'Account', '10000539992', 'icici2222', 'icic', 'ekm', 'ekm', 2, '', 2),
(2, 'Account', '100051023949', 'indb1000200', 'indusind', 'kothamangalam', 'kothamangalam', 2, '', 2),
(4, 'Wallet', '', '', '', '', '', 5, '9020309203', 2),
(5, 'Wallet', '', '', '', '', '', 4, '7907688987', 2),
(7, 'Wallet', '', '', '', '', '', 2, '9020309203', 5),
(13, 'Wallet', '', '', '', '', '', 2, '7012160627', 2),
(14, 'Account', '10005343543', 'hdfc1000200', 'hdfc', 'kothamangalam', 'kothamangalam', 2, '', 5);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `currency` varchar(20) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `description` text NOT NULL,
  `product_image` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `currency`, `price`, `description`, `product_image`, `user_id`) VALUES
(2, 'Hiconnect card', 'INR', '500000.00', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Consectetur vel voluptatibus, esse adipisci libero repellendus temporibus labore aperiam quaerat aliquam nihil hic, asperiores quis voluptas id dolor tempore alias illum eos, necessitatibus quidem. Consequuntur debitis expedita quae nesciunt fugiat architecto iusto voluptatibus laborum nisi, iure consequatur voluptate quo sequi exercitationem aliquid facere perspiciatis magnam quasi.\n\nDelivery time is 1-2 Weeks\nI confirm that the artwork I am submitting for my hiConnect is my own orginal work or I have been given permission to use the work', 'pexels_christina_mor_DaBP2.jpg', 2),
(5, 'Hiconnect card', '', '32323.00', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Consectetur vel voluptatibus, esse adipisci libero repellendus temporibus labore aperiam quaerat aliquam nihil hic, asperiores quis voluptas id dolor tempore alias illum eos, necessitatibus quidem. Consequuntur debitis expedita quae nesciunt fugiat architecto iusto voluptatibus laborum nisi, iure consequatur voluptate quo sequi exercitationem aliquid facere perspiciatis magnam quasi.\n\nDelivery time is 1-2 Weeks\nI confirm that the artwork I am submitting for my hiConnect is my own orginal work or I have been given permission to use the work', 'pexels_pixabay_27179_mQswc.jpg', 5),
(7, 'Custom Card', '', '12000.00', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Consectetur vel voluptatibus, esse adipisci libero repellendus temporibus labore aperiam quaerat aliquam nihil hic, asperiores quis voluptas id dolor tempore alias illum eos, necessitatibus quidem. Consequuntur debitis expedita quae nesciunt fugiat architecto iusto voluptatibus laborum nisi, iure consequatur voluptate quo sequi exercitationem aliquid facere perspiciatis magnam quasi.\n\nDelivery time is 1-2 Weeks\nI confirm that the artwork I am submitting for my hiConnect is my own orginal work or I have been given permission to use the work', 'pexels_pixabay_27179_mQswc.jpg', 5),
(8, 'Custom Card', '', '123432.00', 'wxefwef', 'pexels_pixabay_27179_mQswc.jpg', 5),
(10, 'Custom Card', '', '0.00', 'cxbxcv', 'pexels_kaboompics_co_hdqUY.jpg', 5),
(11, 'Custom Card', '', '50.00', 'scdscsdcsd', 'pexels_pixabay_27179_mQswc.jpg', 5),
(12, 'Plastic card', '', '2345.00', 'hkghkhjk', 'pexels_andre_furtado_WVctD.jpg', 5),
(13, 'Plastic card', '', '800.00', 'qqqqqq', 'pexels_burst_374899.jpg', 2),
(14, 'Plastic card', '', '150000.00', 'sfsdgdgd', 'pexels_andre_furtado_WVctD1.jpg', 2),
(17, 'Plastic card', 'INR', '42000.00', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Consectetur vel voluptatibus, esse adipisci libero repellendus temporibus labore aperiam quaerat aliquam nihil hic, asperiores quis voluptas id dolor tempore alias illum eos, necessitatibus quidem. Consequuntur debitis expedita quae nesciunt fugiat architecto iusto voluptatibus laborum nisi, iure consequatur voluptate quo sequi exercitationem aliquid facere perspiciatis magnam quasi.\n\nDelivery time is 1-2 Weeks\nI confirm that the artwork I am submitting for my hiConnect is my own orginal work or I have been given permission to use the work', 'pexels_pixabay_45965_dC1lC.jpg', 16),
(18, 'Plastic card', 'ZAR', '3423.00', 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Consectetur vel voluptatibus, esse adipisci libero repellendus temporibus labore aperiam quaerat aliquam nihil hic, asperiores quis voluptas id dolor tempore alias illum eos, necessitatibus quidem. Consequuntur debitis expedita quae nesciunt fugiat architecto iusto voluptatibus laborum nisi, iure consequatur voluptate quo sequi exercitationem aliquid facere perspiciatis magnam quasi.\n\nDelivery time is 1-2 Weeks\nI confirm that the artwork I am submitting for my hiConnect is my own orginal work or I have been given permission to use the work', 'pexels_pixabay_27179_mQswc.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `qr_images`
--

CREATE TABLE `qr_images` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `qr_image` varchar(255) NOT NULL,
  `qr_text` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `qr_images`
--

INSERT INTO `qr_images` (`id`, `user_id`, `qr_image`, `qr_text`) VALUES
(1, 2, '83909817.png', 'http://localhost/card/?shiv.k.achari'),
(2, 21, '409083211.png', 'http://localhost/card/?ammu'),
(3, 24, '1274391604.png', 'http://localhost/card/?test.user'),
(4, 22, '735203681.png', 'http://localhost/card/?vinu');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `service_id` int(11) NOT NULL,
  `service` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`service_id`, `service`, `description`, `user_id`) VALUES
(1, 'kitchen cubboards', 'kitchen cubboards wds', 2),
(2, 'gypsum ceiling', 'gypsum ceiling dffdgdd rfhf', 2),
(4, 'ghjk', 'jhklghkjlfdghjk', 5);

-- --------------------------------------------------------

--
-- Table structure for table `set_cover`
--

CREATE TABLE `set_cover` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `cover_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `set_cover`
--

INSERT INTO `set_cover` (`id`, `user_id`, `cover_id`) VALUES
(4, 2, 28),
(5, 5, 46),
(6, 21, 31);

-- --------------------------------------------------------

--
-- Table structure for table `social_link_type`
--

CREATE TABLE `social_link_type` (
  `social_link_id` int(11) NOT NULL,
  `social_link_type` varchar(255) NOT NULL,
  `social_class` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `social_link_type`
--

INSERT INTO `social_link_type` (`social_link_id`, `social_link_type`, `social_class`) VALUES
(1, 'facebook', 'share-button-facebook fab fa-facebook-f'),
(2, 'twitter', 'share-button-twitter fab fa-twitter'),
(3, 'instagram', 'share-button-instagram fab fa-instagram'),
(9, 'youtube', 'share-button-youtube fab fa-youtube'),
(10, 'pinterest', 'share-button-pinterest fab fa-pinterest-p'),
(11, 'linkedin', 'share-button-linkedin fab fa-linkedin-in'),
(12, 'telegram', 'share-button-telegram fab fa-telegram-plane');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `testimonial_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `company` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`testimonial_id`, `name`, `designation`, `company`, `message`, `user_id`) VALUES
(1, 'Maya', 'PHP Developer', 'Webly Connect', 'dfhgjhkjglk;hljjhlhkjghfd', 2),
(2, 'Ammu', 'Developer', 'Webly', 'gdfgdfgdsvsvsdvs', 2),
(4, 'dfgfhj', 'fghj', 'gh', 'vbnm', 5);

-- --------------------------------------------------------

--
-- Table structure for table `themes`
--

CREATE TABLE `themes` (
  `theme_id` int(11) NOT NULL,
  `theme_name` varchar(255) NOT NULL,
  `theme_image` varchar(255) NOT NULL,
  `uploaded_on` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `themes`
--

INSERT INTO `themes` (`theme_id`, `theme_name`, `theme_image`, `uploaded_on`) VALUES
(1, 'theme1', 'template2.png', '2022-02-16 22:30:40'),
(2, 'theme2', 'template3.png', '2022-02-16 22:31:09');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `user_id` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `type` int(11) NOT NULL,
  `user_level` int(11) NOT NULL,
  `register_date` date NOT NULL,
  `theme_id` int(11) NOT NULL,
  `profession` varchar(200) NOT NULL,
  `website` varchar(255) NOT NULL,
  `google_map_link` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `about` text NOT NULL,
  `user_image` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `added_by` int(11) NOT NULL,
  `card_id` varchar(255) NOT NULL,
  `package` int(11) NOT NULL,
  `code` varchar(255) NOT NULL,
  `product` int(11) NOT NULL,
  `order_status` int(11) NOT NULL,
  `shipping_address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `user_id`, `password`, `type`, `user_level`, `register_date`, `theme_id`, `profession`, `website`, `google_map_link`, `address`, `about`, `user_image`, `status`, `added_by`, `card_id`, `package`, `code`, `product`, `order_status`, `shipping_address`) VALUES
(1, 'Maya Ramanan', 'vrmaya1@gmail.com', '9020309203', 'admin', '202cb962ac59075b964b07152d234b70', 1, 1, '2021-12-27', 1, 'Engineer', 'www.mayavr.com', 'ertdfhgf', 'Kizhakkekkara (H)\r\nMuthamkuzhi P.O\r\nKothamangalam\r\nPIN:686699', 'dfbffg', 'pexels_ary_shutter_8_yMKNO3.jpg', 1, 1, 'maya.ramanan', 1, '', 0, 0, 'Kizhakkekkara (H)\r\nMuthamkuzhi P.O\r\nKothamangalam\r\nPIN:686699'),
(2, 'Shiv K Achari', 'shiv@gmail.com', '7907807682', '7907807682', '202cb962ac59075b964b07152d234b70', 2, 3, '2021-12-28', 3, 'Engineer', 'decorrainteriors.com', 'https://goo.gl/maps/SEEWmk58dAtWpGk27', 'Kizhakkekkara (H)\r\nMuthamkuzhi P.O\r\nKothamangalam\r\nPIN:686699', 'wwwwwwwddsssssssssshkhgk', 'pexels_tirachard_kum_DC8wl.jpg', 1, 1, 'shiv.k.achari', 4, '', 0, 0, 'Kizhakkekkara (H)\r\nMuthamkuzhi P.O\r\nKothamangalam\r\nPIN:686699'),
(5, 'Arun', 'send2arun123@gmail.com', '7907807682', '1234567890', '202cb962ac59075b964b07152d234b70', 2, 2, '2021-12-30', 0, 'Engineer', '', '', '', 'fvdfdfsfsd', 'pexels_andre_furtado_WVctD1.jpg', 1, 1, 'arun', 3, '', 0, 0, ''),
(16, 'Unni', 'unni@gmail.com', '9020196548', '9020196548', '202cb962ac59075b964b07152d234b70', 2, 2, '2022-01-11', 0, 'Engineer', 'decorrainteriors.com', '', '', '', 'pexels_andre_furtado_WVctD4.jpg', 1, 1, '', 0, '', 0, 0, ''),
(17, 'Jango', 'jango@gmail.com', '9745354915', '9745354915', '202cb962ac59075b964b07152d234b70', 1, 3, '2022-02-01', 0, '', '', '', '', '', '', 1, 5, '', 0, '', 0, 0, ''),
(18, 'John', 'john@gmail.com', '7654321233', '7654321233', 'cc2bba0f100c73e68c4ea8678ba44218', 1, 3, '2022-02-01', 0, '', '', '', '', '', '', 0, 5, '', 0, '', 0, 0, ''),
(19, 'Shyju', 'sh@gmail.com', '6477546346', '6477546346', '2141630c48b94acb4e940ab572944a1e', 1, 3, '2022-02-01', 0, '', '', '', '', '', '', 0, 5, '', 0, '', 0, 0, ''),
(20, 'Manu', 'manu@gmail.com', '4564643445', '4564643445', '202cb962ac59075b964b07152d234b70', 1, 3, '2022-02-01', 0, '', '', '', '', '', '', 0, 16, '', 0, '', 0, 0, ''),
(21, 'Ammu', 'ammu@gmail.com', '3333333333', '3333333333', '202cb962ac59075b964b07152d234b70', 1, 3, '2022-02-01', 0, '', '', '', '', '', '', 1, 1, 'ammu', 0, '', 0, 0, ''),
(22, 'Vinu', 'vinu@gmail.com', '9876543210', '9876543210', '202cb962ac59075b964b07152d234b70', 1, 3, '2022-02-04', 0, '', '', '', '', '', '', 1, 1, 'vinu', 0, '', 0, 0, ''),
(24, 'test user', 'vrma0@gmail.com', '4444444444', '4444444444', '202cb962ac59075b964b07152d234b70', 1, 3, '2022-02-22', 0, '', '', '', '', '', '', 1, 1, 'test.user', 0, '', 0, 0, ''),
(25, 'Decorra Interiors', 'decorra.interiors@gmail.com', '9847548401', '9847548401', '202cb962ac59075b964b07152d234b70', 2, 3, '2022-04-01', 0, '', '', '', '', '', '', 1, 1, 'decorra.interiors', 0, '', 0, 0, ''),
(26, 'Webly Connect', 'webly@gmail.com', '8765433455', '8765433455', '202cb962ac59075b964b07152d234b70', 2, 3, '2022-04-01', 0, '', '', '', '', '', '', 1, 1, 'webly.connect', 0, '', 0, 0, ''),
(27, 'Maya eee', 'ddsy@ddffdgital.codm', '34567890090', '34567890090', '28449b43da79380d0494152115c4be35', 1, 3, '2022-04-11', 0, '', '', '', '', '', '', 0, 1, 'maya.eee', 0, '', 0, 0, ''),
(28, 'Shivani', 'shivani@gmail.com', '7553280532', '7553280532', '401567382ad18ab73a277b54a015a8bd', 1, 3, '2022-04-11', 0, '', '', '', '', '', '', 0, 1, 'shivani', 3, '', 0, 0, ''),
(29, 'shivdff', 'abcd@gmail.com', '6435464352', '6435464352', '7c630002fcfb843c4b18d0034a7e4c22', 1, 3, '2022-04-11', 0, '', '', '', '', '', '', 0, 1, 'shivdff', 3, '', 0, 0, ''),
(30, 'Shivani k a', 'sghigff@gmail.com', '9876545678', '9876545678', '202cb962ac59075b964b07152d234b70', 1, 3, '2022-04-11', 0, '', '', '', '', '', '', 1, 1, 'shivani.k.a', 7, '', 0, 0, ''),
(31, 'ddg', 'ddcas@gmail.com', '6479943224', '6479943224', '5d539598eb0acc5bea144b7fb7778f72', 1, 3, '2022-04-11', 0, '', '', '', '', '', '', 0, 1, 'ddg', 2, '', 0, 0, ''),
(32, 'zzvvd', 'dfsd@rgfjh.g', '6556444454', '6556444454', 'e5a71737eb498978f6e723f279d62cde', 1, 3, '2022-04-11', 0, '', '', '', '', '', '', 0, 1, 'zzvvd', 1, '', 0, 0, ''),
(33, 'xfvx', 'xzczx@ff.h', '4453436435', '4453436435', '98d6b5487a2f9198b558a2869eac6ca8', 1, 3, '2022-04-11', 0, '', '', '', '', '', '', 0, 1, 'xfvx', 4, '', 0, 0, ''),
(34, 'khgvh', 'hbj@rg.kj', '9876555609', '9876555609', '07cfd7ecd8469f519239e5c33f767c43', 1, 3, '2022-04-11', 0, '', '', '', '', '', '', 0, 1, 'khgvh', 2, '', 0, 0, ''),
(35, 'Aaryan', 'aryan@gmail.com', '4444444445', '4444444445', '202cb962ac59075b964b07152d234b70', 0, 3, '2022-04-14', 0, '', '', '', '', '', '', 0, 0, 'aaryan', 2, '', 0, 0, ''),
(36, 'Mayadfsd', 'vrmsds10@gmail.com', '1234567890', '1234567890', '202cb962ac59075b964b07152d234b70', 0, 3, '2022-04-14', 0, '', '', '', '', '', '', 0, 0, 'mayadfsd', 2, '', 0, 0, ''),
(37, 'pdpdp', 'pdpd@hfjf.fd', '1234567432', '1234567432', '202cb962ac59075b964b07152d234b70', 0, 3, '2022-04-14', 0, '', '', '', '', '', '', 1, 0, 'pdpdp', 3, '', 0, 0, ''),
(40, 'Maya erfwe', 'vrmay@gmail.com', '11111111112', '11111111112', '202cb962ac59075b964b07152d234b70', 0, 3, '2022-04-22', 0, '', '', '', '', '', '', 1, 0, 'maya.erfwe', 4, 'Y1zBk9V4lHrI', 0, 0, ''),
(42, 'Seenia', 'sna0@gmail.com', '89536432223', '89536432223', '202cb962ac59075b964b07152d234b70', 0, 3, '2022-05-14', 0, '', '', '', '', '', '', 0, 0, 'seenia', 4, 'mBEnTXw15CH6', 3, 2, ''),
(43, 'Niya', 'niya@gmail.com', '43234234344', '43234234344', '202cb962ac59075b964b07152d234b70', 0, 3, '2022-05-16', 0, '', '', '', '', '', '', 1, 0, 'niya', 4, 'aM8uLnxprm6v', 1, 1, ''),
(44, 'Neha', 'neha@gmail.com', '2123121312', '2123121312', '202cb962ac59075b964b07152d234b70', 0, 3, '2022-05-16', 0, '', '', '', '', '', '', 1, 0, 'neha', 3, 'abycm4RdqvGK', 2, 3, ''),
(45, 'Jasna', 'jsn@gmail.com', '8765432190', '8765432190', '202cb962ac59075b964b07152d234b70', 0, 3, '2022-05-16', 0, '', '', '', '', '', '', 1, 0, 'jasna', 3, 'Ku9VrY43XEmB', 1, 3, ''),
(46, 'Jasmin', 'jasmin@gmail.com', '1234976352', '1234976352', '81dc9bdb52d04dc20036dbd8313ed055', 0, 3, '2022-05-19', 0, '', '', '', 'plot :1/3\r\nkollam', '', '', 1, 0, 'jasmin', 7, '1U5zFglC6Rw7', 0, 0, 'plot :1/3\r\nkollam'),
(47, 'Kannan', 'kannan@gmail.com', '9847654321', '9847654321', '81dc9bdb52d04dc20036dbd8313ed055', 0, 3, '2022-05-19', 0, '', '', '', '', '', '', 1, 0, 'kannan', 7, 'xKTGBz1FHNpR', 0, 0, ''),
(48, 'Nandhu', 'vrmaya10@gmail.com', '9876533120', '9876533120', '202cb962ac59075b964b07152d234b70', 0, 3, '2022-05-19', 0, '', '', '', '', '', '', 1, 0, 'nandhu', 4, 'FXv8SrKuY2JB', 3, 0, ''),
(49, 'akhilesh k', 'kakhilesh55@gmail.com', '+918943700900', 'kakhilesh55@gmail.com', '202cb962ac59075b964b07152d234b70', 1, 3, '2022-09-19', 0, '', '', '', '', '', '', 1, 0, '', 0, 'frJ92yz48cVn', 0, 0, ''),
(50, 'akhi k', 'ak@gmail.com', '+919999999999', 'ak@gmail.com', '202cb962ac59075b964b07152d234b70', 1, 3, '2022-09-19', 0, '', '', '', '', '', '', 1, 0, '', 0, 'pqCAwgOPfjkv', 0, 0, ''),
(51, 'baiju', 'bbbb@gmail.com', '08976435768', 'bbbb@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e', 1, 3, '2022-09-22', 0, '', '', '', '', '', '', 1, 0, '', 0, 'g1pRnNFdvzY4', 0, 0, ''),
(52, 'asds k', 'kakhilesh55@gmail.com', ' 918943700900', 'kakhilesh55@gmail.com', '15de21c670ae7c3f6f3f1f37029303c9', 1, 3, '2022-09-22', 0, '', '', '', '', '', '', 1, 0, '', 0, '98NwkxHZKl7m', 0, 0, ''),
(53, 'HZHH', 'ak@gmail.com', ' 919999999999', 'ak@gmail.com', '15de21c670ae7c3f6f3f1f37029303c9', 1, 3, '2022-09-22', 0, '', '', '', '', '', '', 1, 0, '', 0, 'jOkqPXACmLrW', 0, 0, ''),
(54, 'asds k', 'kakhilesh55@gmail.com', ' 918943700900', 'kakhilesh55@gmail.com', '7694f4a66316e53c8cdd9d9954bd611d', 1, 3, '2022-09-22', 0, '', '', '', '', '', '', 1, 0, '', 0, '5E6TmjZn8iuH', 0, 0, ''),
(55, 'akhi k', 'ak@gmail.com', ' 919999999999', 'ak@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 1, 3, '2022-09-22', 0, '', '', '', '', '', '', 1, 0, '', 0, 'vLd9upPqU2Of', 0, 0, ''),
(56, 'baiju', 'ak@gmail.com', '08976435768', 'ak@gmail.com', '202cb962ac59075b964b07152d234b70', 1, 3, '2022-09-22', 0, '', '', '', '', '', '', 1, 0, '', 0, 'N4nwtzESXjpx', 0, 0, ''),
(57, 'asds k', 'kakhilesh55@gmail.com', ' 918943700900', 'kakhilesh55@gmail.com', '550a141f12de6341fba65b0ad0433500', 1, 3, '2022-09-22', 0, '', '', '', '', '', '', 1, 0, '', 0, 's3czMjX7IkUR', 0, 0, ''),
(58, 'danish k', 'kakhilesh55@gmail.com', ' 918943700900', 'kakhilesh55@gmail.com', 'c81e728d9d4c2f636f067f89cc14862c', 1, 3, '2022-09-22', 0, '', '', '', '', '', '', 1, 0, '', 0, 'vziw5flcoqI4', 0, 0, ''),
(59, 'asds k', 'kakhilesh55@gmail.com', ' 918943700900', 'kakhilesh55@gmail.com', 'b6d767d2f8ed5d21a44b0e5886680cb9', 1, 3, '2022-09-22', 0, '', '', '', '', '', '', 1, 0, '', 0, '4LVg9i1cIwZv', 0, 0, ''),
(60, 'akhi k', 'ak@gmail.com', ' 919999999999', 'ak@gmail.com', '1aabac6d068eef6a7bad3fdf50a05cc8', 1, 3, '2022-09-22', 0, '', '', '', '', '', '', 1, 0, '', 0, 'DeWfkynHTgK3', 0, 0, ''),
(61, 'asds k', 'kakhilesh55@gmail.com', ' 918943700900', 'kakhilesh55@gmail.com', '15de21c670ae7c3f6f3f1f37029303c9', 1, 3, '2022-09-22', 0, '', '', '', '', '', '', 1, 0, '', 0, 'uos9nbwN4yZX', 0, 0, ''),
(62, 'akhi k', 'ak@gmail.com', ' 919999999999', 'ak@gmail.com', '182be0c5cdcd5072bb1864cdee4d3d6e', 1, 3, '2022-09-22', 0, '', '', '', '', '', '', 1, 0, '', 0, 'dZyLlmjvhnE4', 0, 0, ''),
(63, 'akhi k', 'ak@gmail.com', ' 919999999999', 'ak@gmail.com', '310dcbbf4cce62f762a2aaa148d556bd', 1, 3, '2022-09-22', 0, '', '', '', '', '', '', 1, 0, '', 0, 'po4nfW9UEB7L', 0, 0, ''),
(64, 'asds k', 'kakhilesh55@gmail.com', ' 918943700900', 'kakhilesh55@gmail.com', '698d51a19d8a121ce581499d7b701668', 1, 3, '2022-09-22', 0, '', '', '', '', '', '', 1, 0, '', 0, 'cAX2WnKRxDqL', 0, 0, ''),
(65, 'asds k', 'kakhilesh55@gmail.com', ' 918943700900', 'kakhilesh55@gmail.com', '698d51a19d8a121ce581499d7b701668', 1, 3, '2022-09-22', 0, '', '', '', '', '', '', 1, 0, '', 0, 'Wo29Y4FRzbdA', 0, 0, ''),
(66, 'asds k', 'kakhilesh55@gmail.com', ' 918943700900', 'kakhilesh55@gmail.com', '698d51a19d8a121ce581499d7b701668', 1, 3, '2022-09-22', 0, '', '', '', '', '', '', 1, 0, '', 0, 'qAteTJS8uW4C', 0, 0, ''),
(67, 'asds k', 'kakhilesh55@gmail.com', ' 918943700900', 'kakhilesh55@gmail.com', 'fae0b27c451c728867a567e8c1bb4e53', 1, 3, '2022-09-22', 0, '', '', '', '', '', '', 1, 0, '', 0, 'DzEoNRjMgAXK', 0, 0, ''),
(68, 'asds k', 'kakhilesh55@gmail.com', ' 918943700900', 'kakhilesh55@gmail.com', '698d51a19d8a121ce581499d7b701668', 1, 3, '2022-09-22', 0, '', '', '', '', '', '', 1, 0, '', 0, 'Ug7MIOXvPapk', 0, 0, ''),
(69, 'akhi k', 'ak@gmail.com', ' 919999999999', 'ak@gmail.com', '698d51a19d8a121ce581499d7b701668', 1, 3, '2022-09-22', 0, '', '', '', '', '', '', 1, 0, '', 0, 'I8j74xCSsb63', 0, 0, ''),
(70, 'asds k', 'kakhilesh55@gmail.com', ' 918943700900', 'kakhilesh55@gmail.com', 'ac627ab1ccbdb62ec96e702f07f6425b', 1, 3, '2022-09-22', 0, '', '', '', '', '', '', 1, 0, '', 0, 'DHoNR5qV6Uh4', 0, 0, ''),
(71, 'akhi k', 'ak@gmail.com', ' 919999999999', 'ak@gmail.com', '202cb962ac59075b964b07152d234b70', 1, 3, '2022-09-22', 0, '', '', '', '', '', '', 1, 0, '', 0, '6ZBO2fHJyhdk', 0, 0, ''),
(72, 'asds k', 'kakhilesh55@gmail.com', ' 918943700900', 'kakhilesh55@gmail.com', '698d51a19d8a121ce581499d7b701668', 1, 3, '2022-09-23', 0, '', '', '', '', '', '', 1, 0, '', 0, 'yXzwxdVE3m8G', 0, 0, ''),
(73, 'akhi k', 'ak@gmail.com', ' 919999999999', 'ak@gmail.com', '698d51a19d8a121ce581499d7b701668', 1, 3, '2022-09-23', 0, '', '', '', '', '', '', 1, 0, '', 0, 'YgN1SDKJfj6x', 0, 0, ''),
(74, 'asds k', 'kakhilesh55@gmail.com', ' 918943700900', 'kakhilesh55@gmail.com', '698d51a19d8a121ce581499d7b701668', 1, 3, '2022-09-23', 0, '', '', '', '', '', '', 1, 0, '', 0, 'QNVvpRMwoUGl', 0, 0, ''),
(75, 'asds k', 'kakhilesh55@gmail.com', ' 918943700900', 'kakhilesh55@gmail.com', '698d51a19d8a121ce581499d7b701668', 1, 3, '2022-09-23', 0, '', '', '', '', '', '', 1, 0, '', 0, 'X16U5R4TbLqO', 0, 0, ''),
(76, 'asds k', 'kakhilesh55@gmail.com', ' 918943700900', 'kakhilesh55@gmail.com', '6512bd43d9caa6e02c990b0a82652dca', 1, 3, '2022-09-23', 0, '', '', '', '', '', '', 1, 0, '', 0, '6VWGIap7DCn9', 0, 0, ''),
(77, 'asds k', 'kakhilesh55@gmail.com', ' 918943700900', 'kakhilesh55@gmail.com', '698d51a19d8a121ce581499d7b701668', 1, 3, '2022-09-23', 0, '', '', '', '', '', '', 1, 0, '', 0, 'Lv2Rq8OoBc6d', 0, 0, ''),
(78, 'asds k', 'kakhilesh55@gmail.com', ' 918943700900', 'kakhilesh55@gmail.com', '698d51a19d8a121ce581499d7b701668', 1, 3, '2022-09-23', 0, '', '', '', '', '', '', 1, 0, '', 0, '1YMxrv8UITcy', 0, 0, ''),
(79, 'baiju', 'kakhilesh55@gmail.com', '08976435768', 'kakhilesh55@gmail.com', '698d51a19d8a121ce581499d7b701668', 1, 3, '2022-09-23', 0, '', '', '', '', '', '', 1, 0, '', 0, 'aDZlshiQ6gw4', 0, 0, ''),
(80, 'baiju k', 'kakhilesh55@gmail.com', ' 918943700900', 'kakhilesh55@gmail.com', 'b59c67bf196a4758191e42f76670ceba', 1, 3, '2022-09-23', 0, '', '', '', '', '', '', 1, 0, '', 0, 'Y5ZGAwduP13e', 0, 0, ''),
(81, 'baiju k', 'kakhilesh55@gmail.com', ' 918943700900', 'kakhilesh55@gmail.com', '698d51a19d8a121ce581499d7b701668', 1, 3, '2022-09-23', 0, '', '', '', '', '', '', 1, 0, '', 0, 'kfwPChcsY8GR', 0, 0, ''),
(82, 'akhi k', 'ak@gmail.com', ' 919999999999', 'ak@gmail.com', '698d51a19d8a121ce581499d7b701668', 1, 3, '2022-09-23', 0, '', '', '', '', '', '', 1, 0, '', 0, '8Qw1FIZLKzJU', 0, 0, ''),
(83, 'baiju k', 'kakhilesh55@gmail.com', ' 918943700900', 'kakhilesh55@gmail.com', '698d51a19d8a121ce581499d7b701668', 1, 3, '2022-09-23', 0, '', '', '', '', '', '', 1, 0, '', 0, 'J61MzvPTxNCo', 0, 0, ''),
(84, 'akhi k', 'ak@gmail.com', ' 919999999999', 'ak@gmail.com', '698d51a19d8a121ce581499d7b701668', 1, 3, '2022-09-23', 0, '', '', '', '', '', '', 1, 0, '', 0, 'ta5rhmDXHdqw', 0, 0, ''),
(85, 'akhi k', 'ak@gmail.com', ' 919999999999', 'ak@gmail.com', '698d51a19d8a121ce581499d7b701668', 1, 3, '2022-09-23', 0, '', '', '', '', '', '', 1, 0, '', 0, 'KgUdscq2ijOm', 0, 0, ''),
(86, 'akhi k', 'ak@gmail.com', ' 919999999999', 'ak@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 1, 3, '2022-09-23', 0, '', '', '', '', '', '', 1, 0, '', 0, 'EjzkNlLWZg7J', 0, 0, ''),
(87, 'baiju k', 'kakhilesh55@gmail.com', ' 918943700900', 'kakhilesh55@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 1, 3, '2022-09-23', 0, '', '', '', '', '', '', 1, 0, '', 0, 'hV4N2d8FDoRb', 0, 0, ''),
(88, 'baiju k', 'kakhilesh55@gmail.com', ' 918943700900', 'kakhilesh55@gmail.com', '698d51a19d8a121ce581499d7b701668', 1, 3, '2022-09-23', 0, '', '', '', '', '', '', 1, 0, '', 0, '1wELxFcOT2hR', 0, 0, ''),
(89, 'akhi k', 'ak@gmail.com', ' 919999999999', 'ak@gmail.com', '698d51a19d8a121ce581499d7b701668', 1, 3, '2022-09-23', 0, '', '', '', '', '', '', 1, 0, '', 0, 'TdhlVpStNFyK', 0, 0, ''),
(90, 'akhi k', 'ak@gmail.com', ' 919999999999', 'ak@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 1, 3, '2022-09-23', 0, '', '', '', '', '', '', 1, 0, '', 0, 'Xut1do3ByDVE', 0, 0, ''),
(91, 'baiju k', 'kakhilesh55@gmail.com', ' 918943700900', 'kakhilesh55@gmail.com', '698d51a19d8a121ce581499d7b701668', 1, 3, '2022-09-23', 0, '', '', '', '', '', '', 1, 0, '', 0, 'Vng7up8EmY9z', 0, 0, ''),
(92, 'baiju k', 'kakhilesh55@gmail.com', ' 918943700900', 'kakhilesh55@gmail.com', '698d51a19d8a121ce581499d7b701668', 1, 3, '2022-09-23', 0, '', '', '', '', '', '', 1, 0, '', 0, 'tm6jBiKZnyuU', 0, 0, ''),
(93, 'akhi k', 'ak@gmail.com', ' 919999999999', 'ak@gmail.com', '698d51a19d8a121ce581499d7b701668', 1, 3, '2022-09-23', 0, '', '', '', '', '', '', 1, 0, '', 0, '4pLZ3iSRqcuh', 0, 0, ''),
(94, 'baiju k', 'kakhilesh55@gmail.com', ' 918943700900', 'kakhilesh55@gmail.com', '698d51a19d8a121ce581499d7b701668', 1, 3, '2022-09-23', 0, '', '', '', '', '', '', 1, 0, '', 0, 'FCmvGfInalUP', 0, 0, ''),
(95, 'baiju k', 'kakhilesh55@gmail.com', ' 918943700900', 'kakhilesh55@gmail.com', '698d51a19d8a121ce581499d7b701668', 1, 3, '2022-09-23', 0, '', '', '', '', '', '', 1, 0, '', 0, 'JFNoXekZIKRB', 0, 0, ''),
(96, 'akhi k', 'ak@gmail.com', ' 919999999999', 'ak@gmail.com', '698d51a19d8a121ce581499d7b701668', 1, 3, '2022-09-23', 0, '', '', '', '', '', '', 1, 0, '', 0, '5lTCn7cvzkyH', 0, 0, ''),
(97, 'baiju k', 'kakhilesh55@gmail.com', ' 918943700900', 'kakhilesh55@gmail.com', '6512bd43d9caa6e02c990b0a82652dca', 1, 3, '2022-09-23', 0, '', '', '', '', '', '', 1, 0, '', 0, 'OFJRjIsAUvw2', 0, 0, ''),
(98, 'baiju k', 'kakhilesh55@gmail.com', ' 918943700900', 'kakhilesh55@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 1, 3, '2022-09-23', 0, '', '', '', '', '', '', 1, 0, '', 0, 'xP3etT4gsV1D', 0, 0, ''),
(99, 'baiju k', 'kakhilesh55@gmail.com', ' 918943700900', 'kakhilesh55@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 1, 3, '2022-09-23', 0, '', '', '', '', '', '', 1, 0, '', 0, 'E3pYmroKbWGy', 0, 0, ''),
(100, 'baiju k', 'kakhilesh55@gmail.com', ' 918943700900', 'kakhilesh55@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 1, 3, '2022-09-23', 0, '', '', '', '', '', '', 1, 0, '', 0, 'q3IdiyrUN2Kg', 0, 0, ''),
(101, 'baiju k', 'kakhilesh55@gmail.com', ' 918943700900', 'kakhilesh55@gmail.com', '698d51a19d8a121ce581499d7b701668', 1, 3, '2022-09-23', 0, '', '', '', '', '', '', 1, 0, '', 0, 'KUIq3Zn4gBN9', 0, 0, ''),
(102, 'akhilesh k', 'kakhilesh55@gmail.com', ' 918943700900', 'kakhilesh55@gmail.com', '698d51a19d8a121ce581499d7b701668', 1, 3, '2022-09-23', 0, '', '', '', '', '', '', 1, 0, '', 0, 'XRNbIKQeJTnz', 0, 0, ''),
(103, 'baiju k', 'kakhilesh55@gmail.com', ' 918943700900', 'kakhilesh55@gmail.com', '6512bd43d9caa6e02c990b0a82652dca', 1, 3, '2022-09-23', 0, '', '', '', '', '', '', 1, 0, '', 0, 'B6wprVhe9FIK', 0, 0, ''),
(104, 'akhi k', 'ak@gmail.com', ' 919999999999', 'ak@gmail.com', '698d51a19d8a121ce581499d7b701668', 1, 3, '2022-09-23', 0, '', '', '', '', '', '', 1, 0, '', 0, 'aTwKGiH7bU6R', 0, 0, ''),
(105, 'akhilesh k', 'kakhilesh55@gmail.com', ' 918943700900', 'kakhilesh55@gmail.com', '698d51a19d8a121ce581499d7b701668', 1, 3, '2022-09-23', 0, '', '', '', '', '', '', 1, 0, '', 0, 'j1f6ESpxgH58', 0, 0, ''),
(106, 'akhilesh k', 'kakhilesh55@gmail.com', ' 918943700900', 'kakhilesh55@gmail.com', '698d51a19d8a121ce581499d7b701668', 1, 3, '2022-09-23', 0, '', '', '', '', '', '', 1, 0, '', 0, 'Nn4POeq5CDys', 0, 0, ''),
(107, 'arjun', 'kakhilesh55@gmail.com', ' 918943700900', 'kakhilesh55@gmail.com', '698d51a19d8a121ce581499d7b701668', 1, 3, '2022-09-23', 0, '', '', '', '', '', '', 1, 0, '', 0, 'k3sLS4JYtEBg', 0, 0, ''),
(108, 'akhi gggggggggggg', 'ak@gmail.com', ' 919999999999', 'ak@gmail.com', '698d51a19d8a121ce581499d7b701668', 1, 3, '2022-09-23', 0, '', '', '', '', '', '', 1, 0, '', 0, 'UQTPztC5rnOp', 0, 0, ''),
(109, 'akhilesh k', 'kakhilesh55@gmail.com', ' 918943700900', 'kakhilesh55@gmail.com', '698d51a19d8a121ce581499d7b701668', 1, 3, '2022-09-23', 0, '', '', '', '', '', '', 1, 0, '', 0, '4cQydbEhA5G3', 0, 0, ''),
(110, 'aaaaaaaaa', 'ak@gmail.com', ' 919999999999', 'ak@gmail.com', '698d51a19d8a121ce581499d7b701668', 1, 3, '2022-09-23', 0, '', '', '', '', '', '', 1, 0, '', 0, 'dW7V8UHgeOoa', 0, 0, ''),
(111, 'akhi k11', 'ak@gmail.com', ' 919999999999', 'ak@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 1, 3, '2022-09-23', 0, '', '', '', '', '', '', 1, 0, '', 0, 'INckPYLQATfr', 0, 0, ''),
(112, 'akhilesh k', 'kakhilesh55@gmail.com', ' 918943700900', 'kakhilesh55@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b', 1, 3, '2022-09-23', 0, '', '', '', '', '', '', 1, 0, '', 0, 'EPifzTxSkctg', 0, 0, ''),
(113, 'akhi k', 'ak@gmail.com', ' 919999999999', 'ak@gmail.com', '698d51a19d8a121ce581499d7b701668', 1, 3, '2022-09-23', 0, '', '', '', '', '', '', 1, 0, '', 0, 'iUXpLtAle9ob', 0, 0, ''),
(114, 'baiju k', 'kakhilesh55@gmail.com', ' 918943700900', 'kakhilesh55@gmail.com', '6512bd43d9caa6e02c990b0a82652dca', 1, 3, '2022-09-23', 0, '', '', '', '', '', '', 1, 0, '', 0, 'dkyBu83i6R27', 0, 0, ''),
(115, 'akhilesh k', 'kakhilesh55@gmail.com', ' 918943700900', 'kakhilesh55@gmail.com', '698d51a19d8a121ce581499d7b701668', 1, 3, '2022-09-23', 0, '', '', '', '', '', '', 1, 0, '', 0, 'kORP7TiVHfch', 0, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `user_social_links`
--

CREATE TABLE `user_social_links` (
  `user_social_id` int(11) NOT NULL,
  `social_link_type` int(11) NOT NULL,
  `link` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_social_links`
--

INSERT INTO `user_social_links` (`user_social_id`, `social_link_type`, `link`, `user_id`) VALUES
(1, 1, 'http://facebook.com/mayavr', 1),
(2, 2, 'http://twitter.com/maya', 1),
(3, 3, 'http://instagram.com/maya', 1),
(5, 1, 'facebook.com/maya', 1),
(7, 1, 'https://www.facebook.com/maya.ramanan', 2),
(8, 2, 'http://twitter.com/mayadsv', 2),
(10, 3, '89p78o7o', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_theme`
--

CREATE TABLE `user_theme` (
  `user_theme_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `theme_id` int(11) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_theme`
--

INSERT INTO `user_theme` (`user_theme_id`, `user_id`, `theme_id`, `date`) VALUES
(1, 2, 1, '2022-03-31 07:44:05'),
(2, 21, 2, '2022-02-18 09:01:38'),
(3, 24, 2, '2022-02-25 07:15:40');

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_token`
--

INSERT INTO `user_token` (`id`, `email`, `token`, `date_created`) VALUES
(1, 'vrmaya10@gmail.com', '9yJaeioc9GtsiJjntORCPLPvyAJOPjkb0upEY9gHPJM=', '2022-02-22 15:20:01'),
(2, 'vrmaya10@gmail.com', 'MubTJo7eQeEcGgsksYw1ZET4Ow6pajhWVdyttTafzpE=', '2022-02-22 15:38:04'),
(3, 'vrmaya10@gmail.com', 'Hwgt9Shng5c6nvga8y+zRZO0luCdJO84JPUq7coJpBE=', '2022-04-13 04:48:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `achievements`
--
ALTER TABLE `achievements`
  ADD PRIMARY KEY (`achievement_id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`company_id`);

--
-- Indexes for table `contact_details`
--
ALTER TABLE `contact_details`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `contact_form_info`
--
ALTER TABLE `contact_form_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `counter`
--
ALTER TABLE `counter`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cover_category`
--
ALTER TABLE `cover_category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `cover_image`
--
ALTER TABLE `cover_image`
  ADD PRIMARY KEY (`cover_id`);

--
-- Indexes for table `cupon`
--
ALTER TABLE `cupon`
  ADD PRIMARY KEY (`cupon_id`);

--
-- Indexes for table `education`
--
ALTER TABLE `education`
  ADD PRIMARY KEY (`education_id`);

--
-- Indexes for table `experience`
--
ALTER TABLE `experience`
  ADD PRIMARY KEY (`experience_id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ipdb`
--
ALTER TABLE `ipdb`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manage_package`
--
ALTER TABLE `manage_package`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manage_products`
--
ALTER TABLE `manage_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `package`
--
ALTER TABLE `package`
  ADD PRIMARY KEY (`package_id`);

--
-- Indexes for table `payment_app`
--
ALTER TABLE `payment_app`
  ADD PRIMARY KEY (`app_id`);

--
-- Indexes for table `payment_details`
--
ALTER TABLE `payment_details`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `qr_images`
--
ALTER TABLE `qr_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `set_cover`
--
ALTER TABLE `set_cover`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `social_link_type`
--
ALTER TABLE `social_link_type`
  ADD PRIMARY KEY (`social_link_id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`testimonial_id`);

--
-- Indexes for table `themes`
--
ALTER TABLE `themes`
  ADD PRIMARY KEY (`theme_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_social_links`
--
ALTER TABLE `user_social_links`
  ADD PRIMARY KEY (`user_social_id`);

--
-- Indexes for table `user_theme`
--
ALTER TABLE `user_theme`
  ADD PRIMARY KEY (`user_theme_id`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `achievements`
--
ALTER TABLE `achievements`
  MODIFY `achievement_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `company_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `contact_details`
--
ALTER TABLE `contact_details`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `contact_form_info`
--
ALTER TABLE `contact_form_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `counter`
--
ALTER TABLE `counter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cover_category`
--
ALTER TABLE `cover_category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `cover_image`
--
ALTER TABLE `cover_image`
  MODIFY `cover_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `cupon`
--
ALTER TABLE `cupon`
  MODIFY `cupon_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `education`
--
ALTER TABLE `education`
  MODIFY `education_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `experience`
--
ALTER TABLE `experience`
  MODIFY `experience_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `ipdb`
--
ALTER TABLE `ipdb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `manage_package`
--
ALTER TABLE `manage_package`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `manage_products`
--
ALTER TABLE `manage_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `package`
--
ALTER TABLE `package`
  MODIFY `package_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `payment_app`
--
ALTER TABLE `payment_app`
  MODIFY `app_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `payment_details`
--
ALTER TABLE `payment_details`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `qr_images`
--
ALTER TABLE `qr_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `set_cover`
--
ALTER TABLE `set_cover`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `social_link_type`
--
ALTER TABLE `social_link_type`
  MODIFY `social_link_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `testimonial_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `themes`
--
ALTER TABLE `themes`
  MODIFY `theme_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;

--
-- AUTO_INCREMENT for table `user_social_links`
--
ALTER TABLE `user_social_links`
  MODIFY `user_social_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user_theme`
--
ALTER TABLE `user_theme`
  MODIFY `user_theme_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
