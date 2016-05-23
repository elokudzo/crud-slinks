-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Sep 01, 2015 at 12:31 AM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `slinks`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_name` varchar(255) NOT NULL,
  `category_uniq_id` varchar(255) NOT NULL,
  `category_description` text NOT NULL,
  `image_main` varchar(255) NOT NULL,
  `added_date` varchar(255) NOT NULL,
  `deleted` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `category_uniq_id`, `category_description`, `image_main`, `added_date`, `deleted`) VALUES
(1, 'first category', '', 'this is the first categoraaa', '', '17-07-2015 12:08:57', 'yes'),
(2, 'Second category', '', 'this is the second category', '', '17-07-2015 12:09:08', 'yes'),
(3, 'one cate', 'bdad88e40817fda3d8a5393a2b24c16f', '      \r\ngreat this is one cat', '', '17-07-2015 10:08:48', 'yes'),
(4, 'new cat', 'e54c8e1cf88bbc6fe6a3feb00eabeb1f', 'great this is the new cat', '', '17-07-2015 10:42:42', 'yes'),
(5, 'oncat', '935d08bf56e2413c152b494597cd9574', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '', '17-07-2015 11:34:56', 'yes'),
(6, 'greatcat here kkk', '8ffefb514c04b0fdf0f80f8a204914e2', '      \r\nLorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n  \r\n  \r\n  \r\n  \r\n  \r\n  \r\n  ', 'files/categories/hmprod2.jpg', '17-07-2015 11:37:43', 'yes'),
(7, 'newcat', '1cbe7cba371863b61143d08f5506c877', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'files/categories/icon.png', '18-07-2015 02:40:58', 'yes'),
(8, 'another cat', '2d6789d5d827da9390472bcab970a1b1', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'files/categories/logo.png', '18-07-2015 02:44:00', 'yes'),
(9, 'a new cat', '6dc3199f271501502a308e8ea34ac0ea', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'files/categories/bg_debutdark.png', '18-07-2015 02:45:11', 'yes'),
(10, 'Clothes', '52e226ce79f225211bc1299671b4f0ae', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'files/categories/hmprod.jpg', '18-07-2015 04:26:14', 'no'),
(11, 'Shoes', '9b107a397f070805f820abb539cc2280', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'files/categories/shoes.jpg', '18-07-2015 04:27:06', 'no'),
(12, 'shoprite', 'f0604b9c625357eaad3c245f2d508fac', 'all  dksjhksdjnvk ', 'files/categories/Alicia_Keys_6-1024.jpg', '18-07-2015 06:15:50', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE IF NOT EXISTS `companies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_name` varchar(255) NOT NULL,
  `company_uniq_id` varchar(255) NOT NULL,
  `company_category` varchar(255) NOT NULL,
  `company_subcategory` varchar(255) NOT NULL,
  `image_main` varchar(255) NOT NULL,
  `image_main_one` varchar(255) NOT NULL,
  `image_main_two` varchar(255) NOT NULL,
  `image_main_three` varchar(255) NOT NULL,
  `company_creation_date` varchar(255) NOT NULL,
  `company_owner_name` varchar(255) NOT NULL,
  `company_owner_phone` varchar(255) NOT NULL,
  `company_owner_email` varchar(255) NOT NULL,
  `company_address` varchar(255) NOT NULL,
  `company_website` varchar(255) DEFAULT NULL,
  `company_facebook` varchar(255) DEFAULT NULL,
  `company_contact_name` varchar(255) NOT NULL,
  `company_contact_phone` varchar(255) NOT NULL,
  `company_contact_email` varchar(255) NOT NULL,
  `company_contact_whatsapp` varchar(255) NOT NULL,
  `company_contact_skype` varchar(255) NOT NULL,
  `company_dealings` text NOT NULL,
  `company_working_days` varchar(255) NOT NULL,
  `company_working_hours` varchar(255) NOT NULL,
  `agent_name` varchar(255) NOT NULL,
  `agent_contact` varchar(255) NOT NULL,
  `agent_email` varchar(255) NOT NULL,
  `deleted` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `company_name`, `company_uniq_id`, `company_category`, `company_subcategory`, `image_main`, `image_main_one`, `image_main_two`, `image_main_three`, `company_creation_date`, `company_owner_name`, `company_owner_phone`, `company_owner_email`, `company_address`, `company_website`, `company_facebook`, `company_contact_name`, `company_contact_phone`, `company_contact_email`, `company_contact_whatsapp`, `company_contact_skype`, `company_dealings`, `company_working_days`, `company_working_hours`, `agent_name`, `agent_contact`, `agent_email`, `deleted`) VALUES
(1, 'Delaphone gh', 'b9ed117c093e3040cd512b375a549335', 'first category', '', 'files/hmprod.jpg', 'files/hmprod2.jpg', '', '', '08/07/2015', 'adf', '24354', 'adf@yahoo.com', 'adf', 'adf', 'adsf', 'adf', 'adf', 'adf', 'asfd', 'asdf', 'adsf', 'monday-wednesday', '01:05-14:10', 'adsf', 'ad', 'adsf', 'no'),
(2, 'now at shoprite', 'a5f58db25bf98ff8af398f413c230df9', 'shoprite', '', 'files/alicia_keys_10-1024.jpg', '', '', '', '18/07/2015', 'Nii', '+233261603606', '', 'P. O. Box WL161, Kwabenya, Accra, Ghana', 'www.selnet.com', 'facebook.com/selnet', 'kjadhlj', '+233261603606', 'email@email.email', '1616451', 'dkjnhgkjds', 'all bla bla ', 'monday-sunday', '01:05-04:15', 'junior', 'linda', 'bla@bla@bla', 'no'),
(3, 'jack comp', 'cfc03592ba416351d36c817aadc76a0b', 'shoprite', 'another shoprite', 'files/10609541_10152359175097253_9007702793645412151_n.jpg', 'files/10614294_1377835075840271_5170767232935546680_n.jpg', '', '', '02/07/2015', 'jjl', 'sadf', 'sd', 'df', 'df', 'dsf', 'fds', 'sfd', 'sfd', 'dsf', 'sf', '    \r\n   Clothes  ', 'monday-tuesday', '12:05-23:07', 'sdfa', 's', 'sdf', 'yes'),
(4, 'jackcomp', 'b5713a6699e1da19f7d609c9eddb87f7', 'shoprite', 'another shoprite', 'files/hmprod.jpg', 'files/hmprod2.jpg', '', '', '29/07/2015', 'jack', '002854654', 'adf', 'asdf', 'adsf', 'adsf', 'afd', 'dsf', 'sdf', 'sdf', 'sfd', '    \r\n   Clothes  ', 'monday-thursday', '12:05-01:15', 'af', 'lik', 'ljk', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `subcategories`
--

CREATE TABLE IF NOT EXISTS `subcategories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subcat_name` varchar(255) NOT NULL,
  `subcat_uniq_id` varchar(255) NOT NULL,
  `category_uniq_id` varchar(255) NOT NULL,
  `subcat_image_path` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `added_date` varchar(255) NOT NULL,
  `deleted` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `subcategories`
--

INSERT INTO `subcategories` (`id`, `subcat_name`, `subcat_uniq_id`, `category_uniq_id`, `subcat_image_path`, `description`, `added_date`, `deleted`) VALUES
(1, 'nikes', '6bc6d7803c3fc44878f06485c9486ed1', '', 'files/subcategories/10712718_653526411432968_369495182214823834_n.jpg', '', 'added_date', 'yes'),
(2, 'allstar', 'bc6840aa49725bc6414b52a52bd8dd78', '9b107a397f070805f820abb539cc2280', 'files/subcategories/shoes.jpg', 'desc', 'added_date', 'yes'),
(3, 'myshoes', '8d286d763124f4b64aa200fc5a8494c7', 'f0604b9c625357eaad3c245f2d508fac', 'files/subcategories/EUR_promo2014.jpg', 'adfdddjack', 'added_date', 'no'),
(4, 'new shoprite stuff22', 'ca83d6ec2e2f93cc4a572de31c1f2542', '52e226ce79f225211bc1299671b4f0ae', 'files/subcategories/1235131_10203015443694292_946648927_n.jpg', 'ok jack how re u', '25-07-2015 06:08:26', 'no'),
(5, 'another shoprite', '86f9ffee8f8118811f17b255fbf8251f', 'f0604b9c625357eaad3c245f2d508fac', 'files/subcategories/10371607_871870059502845_2877800087737424433_n-feb.jpg', 'adf', '25-07-2015 06:23:33', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `web_users`
--

CREATE TABLE IF NOT EXISTS `web_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_uniq_id` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telephone` varchar(255) NOT NULL,
  `superadmin` varchar(255) NOT NULL,
  `deleted` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `web_users`
--

INSERT INTO `web_users` (`id`, `username`, `password`, `user_uniq_id`, `email`, `telephone`, `superadmin`, `deleted`) VALUES
(1, 'slinks', '85A36E2A2DA45D02C62D4DBF10B238E4', '', 'niidow3@gmail.com', '0240252093', 'yes', 'no'),
(2, 'test', '098f6bcd4621d373cade4e832627b4f6', '', 'test@test.test', '123456789', '', 'no'),
(3, 'jack', '4ff9fc6e4e5d5f590c4f2134a8cc96d1', '7d080df4192dbff7dcd75029cf694068', 'elojack@yahoo.fr', '546547654', '', 'no');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
