-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 25, 2022 at 04:40 AM
-- Server version: 8.0.27
-- PHP Version: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ideaphotography`
--

-- --------------------------------------------------------

--
-- Table structure for table `album`
--

DROP TABLE IF EXISTS `album`;
CREATE TABLE IF NOT EXISTS `album` (
  `id` int NOT NULL AUTO_INCREMENT,
  `privacy` varchar(255) NOT NULL DEFAULT 'Private',
  `user` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `album`
--

INSERT INTO `album` (`id`, `privacy`, `user`, `name`, `date`) VALUES
(1, 'Private', 'BhagyaSamarawikrama@gmail.com', 'Birthday_Shoot_20', '2022-04-20'),
(2, 'Public', 'ChathuryaSandabarana@gmail.com', 'Modal_Album_Chathurya_Sandabarana', '2022-04-20'),
(3, 'Public', 'MalkiPerera@gmail.com', 'Preshoot_Album_Chanuka_And_Malki', '2022-04-20'),
(4, 'Public', 'DilshaWijethunga@gmail.com', 'The_Golden_Road_Show', '2022-04-20'),
(5, 'Public', 'SajiniJayasinghe@gmail.com', 'Wedding_Album_Ishan_And_Sajini', '2022-04-20');

-- --------------------------------------------------------

--
-- Table structure for table `appoinment_data`
--

DROP TABLE IF EXISTS `appoinment_data`;
CREATE TABLE IF NOT EXISTS `appoinment_data` (
  `id` int NOT NULL,
  `name` varchar(100) NOT NULL,
  `contact` int NOT NULL,
  `email` varchar(30) NOT NULL,
  `datetime` datetime NOT NULL,
  PRIMARY KEY (`datetime`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appoinment_data`
--

INSERT INTO `appoinment_data` (`id`, `name`, `contact`, `email`, `datetime`) VALUES
(100, 'Malki Perera', 719119300, 'MalkiPerera@gmail.com', '2022-04-21 10:31:00');

-- --------------------------------------------------------

--
-- Table structure for table `birthday_shoot_20`
--

DROP TABLE IF EXISTS `birthday_shoot_20`;
CREATE TABLE IF NOT EXISTS `birthday_shoot_20` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `imagename` varchar(30) DEFAULT NULL,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `birthday_shoot_20`
--

INSERT INTO `birthday_shoot_20` (`id`, `imagename`, `date`) VALUES
(6, '5.jpg', '2022-04-20'),
(2, '1.jpg', '2022-04-20'),
(3, '2.jpg', '2022-04-20'),
(4, '3.jpg', '2022-04-20'),
(5, '4.jpg', '2022-04-20'),
(7, '6.jpg', '2022-04-20'),
(8, '7.jpg', '2022-04-20'),
(9, '8.jpg', '2022-04-20'),
(10, '9.jpg', '2022-04-20'),
(11, '10.jpg', '2022-04-20'),
(12, '11.jpg', '2022-04-20'),
(13, '12.jpg', '2022-04-20'),
(14, '13.jpg', '2022-04-20'),
(15, '14.jpg', '2022-04-20'),
(16, '15.jpg', '2022-04-20');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `catid` int NOT NULL AUTO_INCREMENT,
  `catname` varchar(255) NOT NULL,
  PRIMARY KEY (`catid`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`catid`, `catname`) VALUES
(1, 'Event'),
(2, 'Models'),
(3, 'Birthdays'),
(4, 'Weddings'),
(5, 'Preshoot');

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

DROP TABLE IF EXISTS `chat`;
CREATE TABLE IF NOT EXISTS `chat` (
  `chatid` int NOT NULL AUTO_INCREMENT,
  `sender_userid` int NOT NULL,
  `reciever_userid` int NOT NULL,
  `message` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` int NOT NULL,
  PRIMARY KEY (`chatid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `chat_login_details`
--

DROP TABLE IF EXISTS `chat_login_details`;
CREATE TABLE IF NOT EXISTS `chat_login_details` (
  `id` int NOT NULL AUTO_INCREMENT,
  `userid` int NOT NULL,
  `last_activity` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `is_typing` enum('no','yes') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `comid` int NOT NULL AUTO_INCREMENT,
  `compid` int NOT NULL,
  `comauthor` varchar(255) NOT NULL,
  `comemail` varchar(255) NOT NULL,
  `comcontent` varchar(255) NOT NULL,
  `comstatus` varchar(255) NOT NULL,
  `comdate` date NOT NULL,
  PRIMARY KEY (`comid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

DROP TABLE IF EXISTS `gallery`;
CREATE TABLE IF NOT EXISTS `gallery` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `Image` text NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`Id`, `Image`) VALUES
(1, '7.jpg'),
(2, '2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `mainslider`
--

DROP TABLE IF EXISTS `mainslider`;
CREATE TABLE IF NOT EXISTS `mainslider` (
  `pid` int NOT NULL AUTO_INCREMENT,
  `image` text NOT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mainslider`
--

INSERT INTO `mainslider` (`pid`, `image`) VALUES
(9, '2.jpg'),
(10, '3.jpg'),
(11, '4.jpg'),
(13, '1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `modal_album_chathurya_sandabarana`
--

DROP TABLE IF EXISTS `modal_album_chathurya_sandabarana`;
CREATE TABLE IF NOT EXISTS `modal_album_chathurya_sandabarana` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `imagename` varchar(30) DEFAULT NULL,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `modal_album_chathurya_sandabarana`
--

INSERT INTO `modal_album_chathurya_sandabarana` (`id`, `imagename`, `date`) VALUES
(1, '1.jpg', '2022-04-20'),
(2, '2.jpg', '2022-04-20'),
(3, '3.jpg', '2022-04-20'),
(4, '4.jpg', '2022-04-20'),
(5, '5.jpg', '2022-04-20'),
(6, '6.jpg', '2022-04-20'),
(7, '7.jpg', '2022-04-20'),
(8, '8.jpg', '2022-04-20'),
(9, '9.jpg', '2022-04-20'),
(10, '10.jpg', '2022-04-20'),
(11, '11.jpg', '2022-04-20'),
(12, '12.jpg', '2022-04-20'),
(13, '13.jpg', '2022-04-20'),
(14, '14.jpg', '2022-04-20'),
(15, '15.jpg', '2022-04-20');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
CREATE TABLE IF NOT EXISTS `orders` (
  `oid` int NOT NULL AUTO_INCREMENT,
  `cemail` varchar(225) NOT NULL,
  `package` varchar(225) NOT NULL,
  `date` date NOT NULL,
  `status` varchar(225) NOT NULL,
  `payment` text NOT NULL,
  `description` varchar(225) NOT NULL,
  `fname` varchar(225) NOT NULL,
  `lname` varchar(225) NOT NULL,
  `tpnumber` int NOT NULL,
  `address` varchar(225) NOT NULL,
  `note` varchar(225) NOT NULL,
  PRIMARY KEY (`oid`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`oid`, `cemail`, `package`, `date`, `status`, `payment`, `description`, `fname`, `lname`, `tpnumber`, `address`, `note`) VALUES
(1, 'BhagyaSamarawikrama@gmail.com', 'Basic', '2022-04-22', 'Order Aproved.Wating for Payment', '', '', 'Bhagya', 'Samarawikrama', 719119303, 'No.53/3/3,Senuri,Bata-ata,Hungama', ''),
(2, 'ChathuryaSandabarana@gmail.com', ' Professional', '2022-04-28', 'Order Aproved.Wating for Payment', '', '', 'Chathurya', 'Sandabarana', 719119304, '53/3/5,', '');

-- --------------------------------------------------------

--
-- Table structure for table `packages`
--

DROP TABLE IF EXISTS `packages`;
CREATE TABLE IF NOT EXISTS `packages` (
  `pac_id` int NOT NULL AUTO_INCREMENT,
  `pac_name` varchar(225) NOT NULL,
  `price` int NOT NULL,
  `description` varchar(225) NOT NULL,
  `date` date NOT NULL,
  `status` varchar(225) NOT NULL DEFAULT 'Draft',
  PRIMARY KEY (`pac_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `packages`
--

INSERT INTO `packages` (`pac_id`, `pac_name`, `price`, `description`, `date`, `status`) VALUES
(1, 'Basic', 2000, '3 Photo albums,Drone photgraphy,Dress', '2022-04-08', 'Published'),
(3, ' Professional ', 50000, '3 Photo albums,\r\nDrone photgraphy,\r\nDress,\r\nMakeup,Preeshoot', '2022-04-08', 'Published');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
CREATE TABLE IF NOT EXISTS `posts` (
  `pid` int NOT NULL AUTO_INCREMENT,
  `pcatid` int NOT NULL,
  `ptitle` varchar(255) NOT NULL,
  `pauthor` varchar(255) NOT NULL,
  `pdate` date NOT NULL,
  `pimage` text NOT NULL,
  `pcontent` text NOT NULL,
  `ptag` varchar(255) NOT NULL,
  `pstatus` varchar(255) NOT NULL DEFAULT 'draft',
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`pid`, `pcatid`, `ptitle`, `pauthor`, `pdate`, `pimage`, `pcontent`, `ptag`, `pstatus`) VALUES
(2, 5, 'Preshoot_Album_Chanuka_and_Malki', 'MInura Kavishan', '2022-04-20', '5.jpg', 'Preshoot_Album_Chanuka_and_Malki', 'PreShoot', 'Published'),
(3, 2, 'Modal Album Chathurya Sandabarana', 'MInura Kavishan', '2022-04-21', '1.jpg', 'Modal Album Chathurya Sandabarana', 'Modal', 'Published'),
(4, 3, 'Bhagyas Birthday Shoot', 'MInura Kavishan', '2022-04-21', '7.jpg', 'Bhagyas Birthday Shoot', 'Birthday', 'Published'),
(5, 1, 'The Golden Road Show', 'MInura Kavishan', '2022-04-21', '15.jpg', 'The Golden Road Show', 'Event', 'Published'),
(6, 4, 'Wedding Album Ishan And Sajini', 'MInura Kavishan', '2022-04-21', '6.jpg', 'Wedding Album Ishan And Sajini', 'Wedding', 'Published');

-- --------------------------------------------------------

--
-- Table structure for table `preshoot_album_chanuka_and_malki`
--

DROP TABLE IF EXISTS `preshoot_album_chanuka_and_malki`;
CREATE TABLE IF NOT EXISTS `preshoot_album_chanuka_and_malki` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `imagename` varchar(30) DEFAULT NULL,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `preshoot_album_chanuka_and_malki`
--

INSERT INTO `preshoot_album_chanuka_and_malki` (`id`, `imagename`, `date`) VALUES
(1, '1.jpg', '2022-04-20'),
(2, '2.jpg', '2022-04-20'),
(3, '3.jpg', '2022-04-20'),
(4, '4.jpg', '2022-04-20'),
(5, '5.jpg', '2022-04-20'),
(6, '6.jpg', '2022-04-20'),
(7, '7.jpg', '2022-04-20'),
(8, '8.jpg', '2022-04-20'),
(9, '9.jpg', '2022-04-20'),
(10, '10.jpg', '2022-04-20'),
(11, '11.jpg', '2022-04-20'),
(12, '12.jpg', '2022-04-20'),
(13, '13.jpg', '2022-04-20'),
(14, '14.jpg', '2022-04-20'),
(15, '15.jpg', '2022-04-20');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

DROP TABLE IF EXISTS `slider`;
CREATE TABLE IF NOT EXISTS `slider` (
  `pid` int NOT NULL AUTO_INCREMENT,
  `imgcaption` varchar(225) NOT NULL,
  `img` text NOT NULL,
  PRIMARY KEY (`pid`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`pid`, `imgcaption`, `img`) VALUES
(12, '', 'slider1.jpg'),
(13, '', 'slider2.jpg'),
(14, '', 'slider3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `support`
--

DROP TABLE IF EXISTS `support`;
CREATE TABLE IF NOT EXISTS `support` (
  `Id` int NOT NULL AUTO_INCREMENT,
  `Name` varchar(225) NOT NULL,
  `Email` varchar(20) NOT NULL,
  `Message` varchar(225) NOT NULL,
  `Date` date NOT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `the_golden_road_show`
--

DROP TABLE IF EXISTS `the_golden_road_show`;
CREATE TABLE IF NOT EXISTS `the_golden_road_show` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `imagename` varchar(30) DEFAULT NULL,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `the_golden_road_show`
--

INSERT INTO `the_golden_road_show` (`id`, `imagename`, `date`) VALUES
(1, '1.jpg', '2022-04-20'),
(2, '2.jpg', '2022-04-20'),
(3, '3.jpg', '2022-04-20'),
(4, '4.jpg', '2022-04-20'),
(5, '5.jpg', '2022-04-20'),
(6, '6.jpg', '2022-04-20'),
(7, '7.jpg', '2022-04-20'),
(8, '8.jpg', '2022-04-20'),
(9, '9.jpg', '2022-04-20'),
(10, '10.jpg', '2022-04-20'),
(11, '11.jpg', '2022-04-20'),
(12, '12.jpg', '2022-04-20'),
(13, '13.jpg', '2022-04-20'),
(14, '14.jpg', '2022-04-20'),
(15, '15.jpg', '2022-04-20');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `uid` int NOT NULL AUTO_INCREMENT,
  `upassword` varchar(255) NOT NULL,
  `ufirstname` varchar(255) NOT NULL,
  `ulastname` varchar(255) NOT NULL,
  `urole` varchar(255) NOT NULL,
  `uemail` varchar(255) NOT NULL,
  `uimage` text NOT NULL,
  `utnumber` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `active` int DEFAULT '0',
  `current_session` int NOT NULL,
  PRIMARY KEY (`uid`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `wedding_album_ishan_and_sajini`
--

DROP TABLE IF EXISTS `wedding_album_ishan_and_sajini`;
CREATE TABLE IF NOT EXISTS `wedding_album_ishan_and_sajini` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `imagename` varchar(30) DEFAULT NULL,
  `date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `wedding_album_ishan_and_sajini`
--

INSERT INTO `wedding_album_ishan_and_sajini` (`id`, `imagename`, `date`) VALUES
(1, '1.jpg', '2022-04-20'),
(2, '2.jpg', '2022-04-20'),
(3, '3.jpg', '2022-04-20'),
(4, '4.jpg', '2022-04-20'),
(5, '5.jpg', '2022-04-20'),
(6, '6.jpg', '2022-04-20'),
(7, '7.jpg', '2022-04-20'),
(8, '8.jpg', '2022-04-20'),
(9, '9.jpg', '2022-04-20'),
(10, '10.jpg', '2022-04-20'),
(11, '11.jpg', '2022-04-20'),
(12, '12.jpg', '2022-04-20'),
(13, '13.jpg', '2022-04-20'),
(14, '14.jpg', '2022-04-20'),
(15, '15.jpg', '2022-04-20');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
