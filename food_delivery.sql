-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 14, 2024 at 12:47 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `food_delivery`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `full_name`, `username`, `password`) VALUES
(9, 'Numidu Dulanga', 'sc12848', '12345'),
(20, 'Dhanesh Lakshan', '200121501123', '98+9+9');

-- --------------------------------------------------------

--
-- Table structure for table `enquiries`
--

CREATE TABLE `enquiries` (
  `id` int(11) UNSIGNED NOT NULL,
  `fname` varchar(50) NOT NULL,
  `sname` varchar(50) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `country` varchar(100) NOT NULL,
  `enquiry` text NOT NULL,
  `date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `enquiries`
--

INSERT INTO `enquiries` (`id`, `fname`, `sname`, `contact`, `email`, `address`, `country`, `enquiry`, `date`) VALUES
(1, 'numi', 'dulanga', '0710805748', 'dnumidu@gmail.com', 'Hettigedara,Nawathalwatha', 'sri Lanka', 'Numidu', '2024-09-04 20:38:39'),
(2, 'Dulanga', 'Numidu', '0710805748', 'dnumidu@gmail.com', 'Hettigedara/Nawathalwatha/Alawwa /Kurunagala', 'India', 'we are proud', '2024-09-04 20:49:22'),
(3, 'Numidu Dulanga', 'dulanga', '589955', 'dnumidu@gmail.com', 'sqwdqwd', 'dqwqssqw', 'swqqsqsqswq', '2024-09-04 20:50:11'),
(4, '', 'Dulanga', '0710805748', 'dnumidu@gmail.com', '', 'sri Lanka', 'dscs bfdhqk qehbkj', '2024-09-07 01:22:28'),
(5, '', 'dulanga', '0710805748', 'dnumidu@gmail.com', '', 'sri Lanka', 'kkkkk', '2024-09-07 01:24:53'),
(6, '', 'dulanga', '0710805748', 'numidu@gmail.com', 'fdasevrv', 'sri Lanka', 'aevfda', '2024-09-07 01:32:27'),
(7, 'NUmidu', 'dulanga', '589955', 'numidu@gmail.com', 'fdasevrv', 'sri Lanka', 'n, njhbj', '2024-09-07 13:16:40'),
(8, 'NUmidu', 'dulanga', '589955', 'numidu@gmail.com', 'fdasevrv', 'sri Lanka', 'n, njhbj', '2024-09-07 13:22:06'),
(9, 'dhanesh', 'lakshan', '0773937391', 'yasitha@gmail.com', 'nattandiya', 'sri lanka', 'can i order product 3', '2024-09-07 14:25:17'),
(10, 'dafba', 'erhttrhtr', 'hjg', 'methsara@gmail.com', 'regqh', 'wrgf', 'ggq3g', '2024-09-07 18:23:42'),
(11, 'Numidu', 'Dulanga', '0773937391', 'numindu@gmail.com', 'matara/hospital', 'sri Langka', 'kama 5 diyan huttho', '2024-09-07 19:01:06'),
(12, 'dhanesh', 'lakshan', '0773937391', 'methsara@gmail.com', 'no 82,madangaha junction ,mawila ,nattandiya', 'sri lanka', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem illo delectus reiciendis unde maiores ab excepturi provident! Architecto id nihil blanditiis, non adipisci nam facere expedita nisi ipsa saepe. Atque corporis suscipit assumenda deserunt mollitia quas placeat animi quaerat. Blanditiis dicta quo minus nobis quibusdam optio mollitia? Necessitatibus, qui similique?', '2024-09-08 00:38:15'),
(13, 'Dhanesh', 'Lakshan', '0773937391', 'dhanalak2013@gmail.com', 'no:82,madangaha junction,mawila,nattandiya', 'Sri Lanka', 'kanna deepn hutto', '2024-09-08 15:10:35'),
(14, 'Dhanesh', 'Lakshan', '0773937391', 'dhanalak2013@gmail.com', 'no:82,madangaha junction,mawila,nattandiya', 'Sri Lanka', 'lk;kio', '2024-09-08 15:13:23'),
(15, 'Dhanesh', 'Lakshan', '0773937391', 'dhanalak2013@gmail.com', 'no:82,madangaha junction,mawila,nattandiya', 'Sri Lanka', 'gtjtyugiku', '2024-09-08 15:15:04'),
(16, 'Dhanesh', 'Lakshan', '0773937391', 'dhanalak2013@gmail.com', 'no:82,madangaha junction,mawila,nattandiya', 'Sri Lanka', '656566868', '2024-09-08 15:17:05'),
(17, 'Dhanesh', 'Lakshan', '0773937391', 'dhanalak2013@gmail.com', 'no:82,madangaha junction,mawila,nattandiya', 'Sri Lanka', '64\r\n849\r\n9', '2024-09-08 15:17:25'),
(18, 'Dhanesh', 'Lakshan', '0773937391', 'dhanalak2013@gmail.com', 'no:82,madangaha junction,mawila,nattandiya', 'Sri Lanka', '16\r\n\r\n684', '2024-09-08 15:17:39'),
(19, 'Dhanesh', 'Lakshan', '0773937391', 'dhanalak2013@gmail.com', 'no:82,madangaha junction,mawila,nattandiya', 'Sri Lanka', 'yugykikiyho7y9', '2024-09-08 15:21:59'),
(20, 'fdgdgdsr', 'sgdss', '07108', 'fsgrr@gmail.com', 'no:82,madangaha junction,mawila,nattandiya', 'gfsgssg', 'xAXWDD', '2024-09-08 15:27:14'),
(21, 'fdgdgdsr', 'sgdss', '07108', 'fsgrr@gmail.com', 'no:82,madangaha junction,mawila,nattandiya', 'gfsgssg', 'gvhj', '2024-09-08 15:32:10'),
(22, 'Dhanesh', 'Lakshan', '0773937391', 'dhanalak2013@gmail.com', 'no:82,madangaha junction,mawila,nattandiya', 'Sri Lanka', 'gch', '2024-09-08 15:32:56'),
(23, 'Dhanesh', 'Lakshan', '0773937391', 'dhanalak2013@gmail.com', 'no:82,madangaha junction,mawila,nattandiya', 'Sri Lanka', 'gcydydy', '2024-09-08 15:36:21'),
(24, 'Dhanesh', 'Lakshan', '0773937391', 'dhanalak2013@gmail.com', 'no:82,madangaha junction,mawila,nattandiya', 'Sri Lanka', 'cjgyjusc', '2024-09-08 15:54:02'),
(25, 'Dhanesh', 'Lakshan', '0773937391', 'dhanalak2013@gmail.com', 'no:82,madangaha junction,mawila,nattandiya', 'Sri Lanka', 'gujyyugyug', '2024-09-08 16:00:30'),
(26, 'Dhanesh', 'Lakshan', '0773937391', 'dhanalak2013@gmail.com', 'no:82,madangaha junction,mawila,nattandiya', 'Sri Lanka', 'tyftfigukygu', '2024-09-08 16:01:23'),
(27, 'Dhanesh', 'Lakshan', '0773937391', 'dhanalak2013@gmail.com', 'no:82,madangaha junction,mawila,nattandiya', 'Sri Lanka', 'dsgzyr', '2024-09-08 16:02:25'),
(28, 'Dhanesh', 'Lakshan', '0773937391', 'dhanalak2013@gmail.com', 'no:82,madangaha junction,mawila,nattandiya', 'Sri Lanka', 'uhohupo', '2024-09-08 16:05:02'),
(29, 'Dhanesh', 'Lakshan', '0773937391', 'dhanalak2013@gmail.com', 'no:82,madangaha junction,mawila,nattandiya', 'Saint Lucia', 'gfdtryxy', '2024-09-08 16:22:25'),
(30, 'Dhanesh', 'Lakshan', '0773937391', 'dhanalak2013@gmail.com', 'no:82,madangaha junction,mawila,nattandiya', 'Jamaica', 'rverv', '2024-09-08 16:31:17'),
(31, 'Dhanesh', 'Lakshan', '0773937391', 'dhanalak2013@gmail.com', 'no:82,madangaha junction,mawila,nattandiya', 'Belgium', 'sdcac', '2024-09-08 17:32:16'),
(32, 'Dhanesh', 'Lakshan', '', 'dhanalak2013@gmail.com', 'no:82,madangaha junction,mawila,nattandiya', 'Belgium', 'deceveew', '2024-09-08 17:49:42'),
(33, 'Dhanesh', 'Lakshan', '', 'dhanalak2013@gmail.com', 'no:82,madangaha junction,mawila,nattandiya', 'Belgium', 'dscwvw', '2024-09-08 17:51:18'),
(34, 'Dhanesh', 'Lakshan', '', 'dhanalak2013@gmail.com', 'no:82,madangaha junction,mawila,nattandiya', 'Belgium', 'dvs', '2024-09-08 17:52:32'),
(35, 'Dhanesh', 'Lakshan', '+440773937391', 'dhanalak2013@gmail.com', 'no:82,madangaha junction,mawila,nattandiya', 'Belgium', 'bvuuvhjv', '2024-09-08 18:03:37'),
(36, 'Dhanesh', 'Lakshan', '(+44) 077393739', 'dhanalak2013@gmail.com', 'no:82,madangaha junction,mawila,nattandiya', 'Belgium', 'jnjnj', '2024-09-08 18:10:32'),
(37, 'Dhanesh', 'Lakshan', '(+93) 077393739', 'dhanalak2013@gmail.com', 'no:82,madangaha junction,mawila,nattandiya', 'Belgium', 'hbhbju', '2024-09-08 18:45:37'),
(38, 'Dhanesh', 'Lakshan', '', 'dhanalak2013@gmail.com', 'no:82,madangaha junction,mawila,nattandiya', 'Belgium', 'nbketkkebe', '2024-09-08 18:47:26'),
(39, 'Dhanesh', 'Lakshan', '(+94) 077393739', 'dhanalak2013@gmail.com', 'no:82,madangaha junction,mawila,nattandiya', 'Sri Lanka', 'vhchuychy', '2024-09-08 18:53:46'),
(40, 'Dhanesh', 'Lakshan', '(+94) 077393739', 'dhanalak2013@gmail.com', 'no:82,madangaha junction,mawila,nattandiya', 'Sri Lanka', 'dxrexrct', '2024-09-08 23:24:26'),
(41, 'ghghvhvh', 'ygyjuyu', '(+355) 07145698', 'numidu@gmail.com', 'hghjhjghj', 'Afghanistan', 'tftyfyfyuyu', '2024-09-11 12:00:43'),
(42, 'ghghvhvh', 'ygyjuyu', '(+355) 07145698', 'numidu@gmail.com', 'hghjhjghj', 'Afghanistan', 'tftyfyfyuyu', '2024-09-11 12:05:31'),
(43, 'kjljuui', 'tftyfy', '(+297) 1525666', 'ytg@gmail.com', 'gnkjui', 'Afghanistan', 'ygjyugjgty', '2024-09-11 12:06:18'),
(44, 'kjljuui', 'tftyfy', '(+297) 1525666', 'ytg@gmail.com', 'gnkjui', 'Afghanistan', 'ygjyugjgty', '2024-09-11 12:08:39'),
(45, 'DHANESH', 'LAKSHAN', '(+94) 773937391', 'dhanalak2013@gmail.com', 'NO 82 ,MADANGAHA JUNCTION', 'Sri Lanka', 'I want to oder 200 pieces of banana', '2024-09-14 11:41:57'),
(46, 'Dhanesh', 'Lakshan', '(+93) 077393739', 'dhanalak2013@gmail.com', 'no:82,madangaha junction,mawila,nattandiya', 'Belgium', 'gfvvfddthbnkjml', '2024-09-14 14:30:35');

-- --------------------------------------------------------

--
-- Table structure for table `frozen`
--

CREATE TABLE `frozen` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `frozen`
--

INSERT INTO `frozen` (`id`, `name`, `image`) VALUES
(5, 'IDLY', 'image/66e09d8dad57e-Screenshot 2024-09-10 2138.png'),
(6, 'dhanesh', 'image/66e119c1189bb-Screenshot 2024-09-10 2138.png'),
(7, 'dhanesh', 'image/66e11a2e8ce22-Screenshot 2024-09-10 214005.png'),
(8, 'abcvcsa', 'image/66e12f4e813cd-2.png'),
(9, 'Soy protein vegan scrabbled egg ', 'image/66e13c35e8eae-2.png'),
(10, 'Vegan meat balls with sweet and sour sauce', 'image/66e140229c8b9-8.png'),
(11, 'Curry leaf idly with green chutney ', 'image/66e140bedf1e9-Screenshot 2024-09-10 213900.png'),
(12, 'abcvcsa', 'image/66e16b4198abb-8.png');

-- --------------------------------------------------------

--
-- Table structure for table `frozendetails`
--

CREATE TABLE `frozendetails` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `appearance` varchar(255) DEFAULT NULL,
  `flavour` varchar(255) DEFAULT NULL,
  `texture` varchar(255) DEFAULT NULL,
  `ingredient` text DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `tags` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `frozendetails`
--

INSERT INTO `frozendetails` (`id`, `name`, `image`, `appearance`, `flavour`, `texture`, `ingredient`, `category`, `tags`) VALUES
(5, 'IDLY', 'image/66e09d8dad57e-Screenshot 2024-09-10 2138.png', 'ffgfhfhgfhg', 'fdvxvxcv', 'sdvsvdvds', 'xcvxcvxv', 'category1', 'sdvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvvv'),
(6, 'dhanesh', 'image/66e119c1189bb-Screenshot 2024-09-10 2138.png', 'fvhbewgk', 'agvd', 'void', 'Dates,Almond,Seasalt', 'category1', 'gregereg'),
(7, 'dhanesh', 'image/66e11a2e8ce22-Screenshot 2024-09-10 214005.png', 'vdggfehqe', 'banana', 'qevgbrqhjvy', 'Dates,Almond,Seasalt', 'category1', 'qcewvrqe'),
(8, 'abcvcsa', 'image/66e12f4e813cd-2.png', 'ffgfhfhgfhg', 'qejrhjge', 'void', 'Dates,Almond,Seasalt', 'category1', 'hgbhjgbjhg'),
(9, 'Soy protein vegan scrabbled egg ', 'image/66e13c35e8eae-2.png', 'ffgfhfhgfhg', 'fdvxvxcv', 'xdxfdxfxf', 'Dates,Almond,Seasalt', 'category1', 'hgbhjgbjhg'),
(10, 'Vegan meat balls with sweet and sour sauce', 'image/66e140229c8b9-8.png', 'fvhbewgk', 'eagaw', 'void', 'Dates,Almond,Seasalt', 'category1', 'fgww'),
(11, 'Curry leaf idly with green chutney ', 'image/66e140bedf1e9-Screenshot 2024-09-10 213900.png', 'ffgfhfhgfhg', 'qejrhjge', 'xdxfdxfxf', 'Dates,Almond,Seasalt', 'category1', 'quhwkbhki'),
(12, 'abcvcsa', 'image/66e16b4198abb-8.png', 'fvhbewgk', 'agvd', 'xdxfdxfxf', 'Dates,Almond,Seasalt', 'Frozen No Preservatives', 'hgbhjgbjhg');

-- --------------------------------------------------------

--
-- Table structure for table `newtable`
--

CREATE TABLE `newtable` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `detail1` text NOT NULL,
  `detail2` text DEFAULT NULL,
  `detail3` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `newtable`
--

INSERT INTO `newtable` (`id`, `name`, `detail1`, `detail2`, `detail3`) VALUES
(5, 'IDLY', 'ssssssssssssss', 'ssssssssssssss', 'sssssssssssss'),
(6, 'dhanesh', 'A The potassium in this tropical fruit could help lower your blood pressure, which can help protect against heart disease and stroke. And, the fiber can help lower your cholesterol. Skin problems. The high amounts of vitamin C in jackfruit may help protect your skin from sun damage.', '24 months', '100g'),
(7, 'dhanesh', 'A The potassium in this tropical fruit could help lower your blood pressure, which can help protect against heart disease and stroke. And, the fiber can help lower your cholesterol. Skin problems. The high amounts of vitamin C in jackfruit may help protect your skin from sun damage.', '24 months', '100g'),
(8, 'abcvcsa', 'A The potassium in this tropical fruit could help lower your blood pressure, which can help protect against heart disease and stroke. And, the fiber can help lower your cholesterol. Skin problems. The high amounts of vitamin C in jackfruit may help protect your skin from sun damage.', '24 months', '100g'),
(9, 'Soy protein vegan scrabbled egg ', 'A The potassium in this tropical fruit could help lower your blood pressure, which can help protect against heart disease and stroke. And, the fiber can help lower your cholesterol. Skin problems. The high amounts of vitamin C in jackfruit may help protect your skin from sun damage.', '24 months', '100g'),
(10, 'Vegan meat balls with sweet and sour sauce', 'A The potassium in this tropical fruit could help lower your blood pressure, which can help protect against heart disease and stroke. And, the fiber can help lower your cholesterol. Skin problems. The high amounts of vitamin C in jackfruit may help protect your skin from sun damage.', '24 months', '100g'),
(11, 'Curry leaf idly with green chutney ', 'A The potassium in this tropical fruit could help lower your blood pressure, which can help protect against heart disease and stroke. And, the fiber can help lower your cholesterol. Skin problems. The high amounts of vitamin C in jackfruit may help protect your skin from sun damage.', '24 months', '100g'),
(12, 'abcvcsa', 'erhfbkhereq', '24 months', '100g');

-- --------------------------------------------------------

--
-- Table structure for table `newtable2`
--

CREATE TABLE `newtable2` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `detail1` text NOT NULL,
  `detail2` text DEFAULT NULL,
  `detail3` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `newtable2`
--

INSERT INTO `newtable2` (`id`, `name`, `detail1`, `detail2`, `detail3`) VALUES
(1, 'dhanesh', 'jhghjjhjghj', 'gfchgcfgchcg', 'fgcgchhcchfg'),
(3, 'product5', 'edwdw', 'dewefrfrr', 'wfetgrhyye5y'),
(4, 'abcvcsa', 'A The potassium in this tropical fruit could help lower your blood pressure, which can help protect against heart disease and stroke. And, the fiber can help lower your cholesterol. Skin problems. The high amounts of vitamin C in jackfruit may help protect your skin from sun damage.', '24 months', '100g');

-- --------------------------------------------------------

--
-- Table structure for table `newtable3`
--

CREATE TABLE `newtable3` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `detail1` text NOT NULL,
  `detail2` text DEFAULT NULL,
  `detail3` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `newtable3`
--

INSERT INTO `newtable3` (`id`, `name`, `detail1`, `detail2`, `detail3`) VALUES
(1, 'dhanesh', 'jhghjjhjghj', 'gfchgcfgchcg', 'gtejqjuhutigiu');

-- --------------------------------------------------------

--
-- Table structure for table `nutritional`
--

CREATE TABLE `nutritional` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nutritional`
--

INSERT INTO `nutritional` (`id`, `name`, `image`) VALUES
(1, 'dhanesh', 'image/66dc4e9f60d15-member-1.jpg'),
(3, 'product5', 'image/66ddd45019c0d-apple-touch-icon.png'),
(4, 'abcvcsa', 'image/66e126164c00b-Screenshot 2024-09-10 214555.png');

-- --------------------------------------------------------

--
-- Table structure for table `nutritionaldetails`
--

CREATE TABLE `nutritionaldetails` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `appearance` varchar(255) DEFAULT NULL,
  `flavour` varchar(255) DEFAULT NULL,
  `texture` varchar(255) DEFAULT NULL,
  `ingredient` text DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `tags` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nutritionaldetails`
--

INSERT INTO `nutritionaldetails` (`id`, `name`, `image`, `appearance`, `flavour`, `texture`, `ingredient`, `category`, `tags`) VALUES
(1, 'dhanesh', 'image/66dc4e9f60d15-member-1.jpg', 'fvhbewgk', 'gffhhcfchhcfhc', 'xdxfdxfxf', 'iukhuilo', 'category2', 'hgbhjgbjhg'),
(3, 'product5', 'image/66ddd45019c0d-apple-touch-icon.png', 'salt', 'banana', 'salt', 'sisni', 'category1', 'sdddwde'),
(4, 'abcvcsa', 'image/66e126164c00b-Screenshot 2024-09-10 214555.png', 'fvhbewgk', 'banana', 'void', 'Dates,Almond,Seasalt', 'category2', 'bhjhjhbj');

-- --------------------------------------------------------

--
-- Table structure for table `organic`
--

CREATE TABLE `organic` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `organic`
--

INSERT INTO `organic` (`id`, `name`, `image`) VALUES
(1, 'dhanesh', 'image/66dc54b3c7a03-member-2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `organicdetails`
--

CREATE TABLE `organicdetails` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `appearance` varchar(255) DEFAULT NULL,
  `flavour` varchar(255) DEFAULT NULL,
  `texture` varchar(255) DEFAULT NULL,
  `ingredient` text DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL,
  `tags` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `organicdetails`
--

INSERT INTO `organicdetails` (`id`, `name`, `image`, `appearance`, `flavour`, `texture`, `ingredient`, `category`, `tags`) VALUES
(1, 'dhanesh', 'image/66dc54b3c7a03-member-2.jpg', 'fvhbewgk', 'gffhhcfchhcfhc', 'xdxfdxfxf', 'lhikhhkuhyyi', 'category3', 'gregereg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `enquiries`
--
ALTER TABLE `enquiries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `frozen`
--
ALTER TABLE `frozen`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `frozendetails`
--
ALTER TABLE `frozendetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newtable`
--
ALTER TABLE `newtable`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newtable2`
--
ALTER TABLE `newtable2`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `newtable3`
--
ALTER TABLE `newtable3`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nutritional`
--
ALTER TABLE `nutritional`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nutritionaldetails`
--
ALTER TABLE `nutritionaldetails`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `organic`
--
ALTER TABLE `organic`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `organicdetails`
--
ALTER TABLE `organicdetails`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `enquiries`
--
ALTER TABLE `enquiries`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `frozen`
--
ALTER TABLE `frozen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `frozendetails`
--
ALTER TABLE `frozendetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `newtable`
--
ALTER TABLE `newtable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `newtable2`
--
ALTER TABLE `newtable2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `newtable3`
--
ALTER TABLE `newtable3`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `nutritional`
--
ALTER TABLE `nutritional`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `nutritionaldetails`
--
ALTER TABLE `nutritionaldetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `organic`
--
ALTER TABLE `organic`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `organicdetails`
--
ALTER TABLE `organicdetails`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
