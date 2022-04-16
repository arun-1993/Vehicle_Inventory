-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 16, 2022 at 11:26 AM
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
-- Database: `vehicle_inventory`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `appointment_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `vehicle_id` bigint(20) UNSIGNED NOT NULL,
  `appointment_schedule` datetime NOT NULL,
  `appointment_status` enum('Requested','Upcoming','Cancelled','Completed') NOT NULL DEFAULT 'Requested',
  `appointment_comments` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`appointment_id`, `user_id`, `vehicle_id`, `appointment_schedule`, `appointment_status`, `appointment_comments`) VALUES
(1, 18, 10, '2022-04-27 13:16:00', 'Requested', 'Would like to see Ford Endevour in person'),
(2, 25, 16, '2022-05-13 16:46:00', 'Cancelled', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. '),
(3, 25, 16, '2022-04-19 10:46:00', 'Cancelled', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. '),
(17, 12, 11, '2022-05-16 15:55:00', 'Completed', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. '),
(18, 1, 8, '2022-04-26 14:04:00', 'Cancelled', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. '),
(19, 1, 20, '2022-04-20 14:04:00', 'Cancelled', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. '),
(20, 34, 4, '2022-04-27 16:11:00', 'Cancelled', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. '),
(21, 34, 3, '2022-04-17 14:11:00', 'Cancelled', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. '),
(22, 34, 4, '2022-05-03 12:31:00', 'Cancelled', 'new appointment'),
(23, 34, 48, '2022-04-27 17:00:00', 'Upcoming', 'here I am rescheduling my appointment.'),
(24, 39, 40, '2022-04-10 12:53:00', 'Cancelled', 'This is a test apppointment'),
(37, 4, 40, '2022-04-28 10:51:00', 'Cancelled', 'Appointment test');

-- --------------------------------------------------------

--
-- Table structure for table `bodycolor`
--

CREATE TABLE `bodycolor` (
  `color_id` bigint(20) UNSIGNED NOT NULL,
  `color` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bodycolor`
--

INSERT INTO `bodycolor` (`color_id`, `color`) VALUES
(20, 'bbbbbbaaa'),
(9, 'Beige'),
(2, 'Black'),
(6, 'Blue'),
(7, 'Brown'),
(16, 'Cyan'),
(11, 'Gold'),
(3, 'Gray'),
(8, 'Green'),
(17, 'Navy Blue'),
(10, 'Orange'),
(13, 'Purple'),
(5, 'Red'),
(4, 'Silver'),
(1, 'White'),
(12, 'Yellow');

-- --------------------------------------------------------

--
-- Table structure for table `brand_master`
--

CREATE TABLE `brand_master` (
  `brand_id` bigint(20) UNSIGNED NOT NULL,
  `brand_name` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brand_master`
--

INSERT INTO `brand_master` (`brand_id`, `brand_name`) VALUES
(15, 'Dummy1'),
(7, 'Ford'),
(1, 'Honda'),
(5, 'Hyundai'),
(6, 'Kia'),
(2, 'Maruti Suzuki'),
(3, 'MG'),
(8, 'Nissan'),
(10, 'Renault'),
(4, 'Tata'),
(9, 'Toyota');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `contact_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(60) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `message` varchar(1000) NOT NULL,
  `feedback_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`contact_id`, `name`, `email`, `phone`, `message`, `feedback_time`) VALUES
(1, 'Anjali', 'anjali@gmail.com', '6258242598', 'hello! i have a query', '2022-03-30 07:15:15'),
(2, 'Anjali', 'anjali@gmail.com', '6258242598', 'hello! i have a query', '2022-03-30 07:17:14'),
(3, 'Kavya', 'kavya@gmail.com', '987654321', 'Query', '2022-03-30 07:17:51'),
(4, 'Viraj', 'viraj@gmail.com', '9876543240', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. ', '2022-03-31 07:00:55'),
(5, 'Arun', 'arun0306.r@gmail.com', '8780487748', 'This is a test                                    ', '2022-04-14 11:56:10'),
(6, 'Arun Ravindran', 'arun0306.r@gmail.com', '8780487748', '                                    ', '2022-04-16 05:07:32');

-- --------------------------------------------------------

--
-- Table structure for table `edit_content`
--

CREATE TABLE `edit_content` (
  `content_id` bigint(20) UNSIGNED NOT NULL,
  `content_title` varchar(500) NOT NULL,
  `content_text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `edit_content`
--

INSERT INTO `edit_content` (`content_id`, `content_title`, `content_text`) VALUES
(1, 'Welcome to AUTOTRACK', 'Before we get ahead of ourselves, we want to welcome you to AutoTrack. While nothing can replace thing on-the-lot experience.\r\n\r\nWe appreciate you taking the time today to visit our web site. Our goal is to give you an interactive tour of our new and used inventory, as well as allow you to conveniently get a quote, schedule a service appointment, or apply for financing. The search for a luxury car is filled with high expectations.\r\n\r\nAutoTrack is your single stop for buying used and fresh vehicles, all over India. We\'ve brought together cutting-edge technology with country-wide partners and more importantly, deep understanding of what buyers need. We solve all pain points associated with purchasing a pre-loved one. Whether you\'re buying or selling, you get a quick, easy, fair, transparent, hassle (and haggle) free process.');

-- --------------------------------------------------------

--
-- Table structure for table `email_verification`
--

CREATE TABLE `email_verification` (
  `verfication_id` bigint(20) NOT NULL,
  `verification_mail` varchar(80) NOT NULL,
  `verification_token` varchar(20) NOT NULL,
  `token_datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `email_verification`
--

INSERT INTO `email_verification` (`verfication_id`, `verification_mail`, `verification_token`, `token_datetime`) VALUES
(1, 'sdasadasd@gmail.com', 'asd123', '2022-04-11 20:34:31'),
(2, 'jitendra2121@gmail.com', 'DlyBE', '2022-04-11 20:34:31'),
(3, 'jitendra2121@gmail.com', 'B3qtZ', '2022-04-11 20:46:49'),
(4, 'jitendra2121@gmail.com', 'X8ixr', '2022-04-11 20:49:01'),
(5, 'jhonqqqqq@gmail.com', 'cCbNL', '2022-04-11 20:57:46'),
(6, 'jhonqqqqq@gmail.com', '7Iqvv', '2022-04-11 20:58:16'),
(7, 'jhonqqqqq@gmail.com', '2VBd6', '2022-04-11 20:58:31'),
(8, 'jitendra21ss21@gmail.com', 'k4JIg', '2022-04-11 21:04:27'),
(9, 'bhavsarjitendra96@gmail.com', 'd0EXx', '2022-04-12 09:55:01');

-- --------------------------------------------------------

--
-- Table structure for table `fuel_type`
--

CREATE TABLE `fuel_type` (
  `fuel_type_id` bigint(20) UNSIGNED NOT NULL,
  `fuel_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fuel_type`
--

INSERT INTO `fuel_type` (`fuel_type_id`, `fuel_type`) VALUES
(2, 'Diesel'),
(6, 'Diesel + Electric'),
(4, 'Fully Electric'),
(10, 'Hava'),
(1, 'Petrol'),
(3, 'Petrol + CNG (Compressed Natural Gas)'),
(5, 'Petrol + Electric');

-- --------------------------------------------------------

--
-- Table structure for table `model_master`
--

CREATE TABLE `model_master` (
  `model_id` bigint(20) UNSIGNED NOT NULL,
  `brand_id` bigint(20) UNSIGNED NOT NULL,
  `model_name` varchar(30) NOT NULL,
  `general_description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `model_master`
--

INSERT INTO `model_master` (`model_id`, `brand_id`, `model_name`, `general_description`) VALUES
(1, 1, 'City', 'The Honda City has 1 Diesel Engine and 1 Petrol Engine on offer. The Diesel engine is 1498 cc while the Petrol engine is 1498 cc . It is available with Manual & Automatic transmission.Depending upon the variant and fuel type the City has a mileage of 17.8 to 24.1 kmpl . The City is a 5 seater 4 cylinder car and has length of 4549mm, width of 1748mm and a wheelbase of 2600mm'),
(2, 1, 'Amaze', 'The Honda Amaze has 1 Diesel Engine and 1 Petrol Engine on offer. The Diesel engine is 1498 cc while the Petrol engine is 1199 cc . It is available with Manual & Automatic transmission.Depending upon the variant and fuel type the Amaze has a mileage of 18.6 to 24.7 kmpl . The Amaze is a 5 seater 4 cylinder car and has length of 3995, width of 1695 and a wheelbase of 2470.'),
(3, 1, 'Jazz', 'The Petrol engine is 1199 cc . It is available with Manual & Automatic transmission. Depending upon the variant and fuel type the Jazz has a mileage of 16.6 to 17.1 kmpl . The Jazz is a 5 seater 4 cylinder car and has length of 3989mm, width of 1694mm and a wheelbase of 2530mm.'),
(4, 2, 'Swift Dzire', 'The Maruti Dzire has 1 Petrol Engine and 1 CNG Engine on offer. The Petrol engine is 1197 cc while the CNG engine is 1197 cc . It is available with Manual & Automatic transmission.Depending upon the variant and fuel type the Dzire has a mileage of 23.26 kmpl to 31.12 km/kg . The Dzire is a 5 seater 4 cylinder car and has length of 3995mm, width of 1735mm and a wheelbase of 2450mm.'),
(5, 2, 'Baleno', 'The Maruti Baleno has 1 Petrol Engine on offer. The Petrol engine is 1197 cc . It is available with Manual & Automatic transmission.Depending upon the variant and fuel type the Baleno has a mileage of 22.35 to 22.94 kmpl . The Baleno is a 5 seater 4 cylinder car and has length of 3990, width of 1745 and a wheelbase of 2520.'),
(6, 2, 'Ciaz', 'The Maruti Ciaz has 1 Petrol Engine on offer. The Petrol engine is 1462 cc . It is available with Manual & Automatic transmission.Depending upon the variant and fuel type the Ciaz has a mileage of 20.04 to 20.65 kmpl & Ground clearance of Ciaz is 170 mm. The Ciaz is a 5 seater 4 cylinder car and has length of 4490 mm, width of 1730 mm and a wheelbase of 2650 mm.'),
(7, 3, 'Hector', 'The MG Hector has 1 Diesel Engine and 1 Petrol Engine on offer. The Diesel engine is 1956 cc while the Petrol engine is 1451 cc . It is available with Manual & Automatic transmission.Depending upon the variant and fuel type the Hector has a mileage of & Ground clearance of Hector is 192. The Hector is a 5 seater 4 cylinder car and has length of 4655mm, width of 1835mm and a wheelbase of 2750mm.'),
(8, 3, 'Gloster', 'The MG Gloster has 1 Diesel Engine on offer. The Diesel engine is 1996 cc . It is available with Automatic transmission.Depending upon the variant and fuel type the Gloster has a mileage of . The Gloster is a 7 seater 4 cylinder car and has length of 4985mm, width of 1926mm and a wheelbase of 2950mm.'),
(9, 3, 'Astor', 'The MG Astor has 2 Petrol Engine on offer. The Petrol engine is 1498 cc and 1349 cc . It is available with Automatic & Manual transmission.Depending upon the variant and fuel type the Astor has a mileage of . The Astor is a 5 seater 4 cylinder car and has length of 4323, width of 1809 and a wheelbase of 2585.'),
(10, 4, 'Tiago', 'The Tata Tiago has 1 Petrol Engine and 1 CNG Engine on offer. The Petrol engine is 1199 cc while the CNG engine is 1199 cc . It is available with Manual & Automatic transmission.Depending upon the variant and fuel type the Tiago has a mileage of 23.84 kmpl to 26.49 km/kg & Ground clearance of Tiago is 168. The Tiago is a 5 seater 3 cylinder car and has length of 3765, width of 1677 and a wheelbase of 2400.'),
(11, 4, 'Nexon', 'Tata Nexon is a 5 seater SUV with a mileage of 17 KMPL depending upon it\\\'s transmission and fuel type. Nexon\\\'s 3 cylinder, 1199 cc, 1.2L Revotron Turbocharged can generate 120 PS @ 5500 rpm power and 170 Nm @ 1750-4000 rpm torque. It has a fuel tank capacity of 44 Litres L.'),
(12, 4, 'Tigor', 'The Tata Tigor has 1 Petrol Engine and 1 CNG Engine on offer. The Petrol engine is 1199 cc while the CNG engine is 1199 cc . It is available with Manual & Automatic transmission.Depending upon the variant and fuel type the Tigor has a mileage of . The Tigor is a 5 seater 3 cylinder car and has length of 3993, width of 1677 and a wheelbase of 2450.'),
(13, 5, 'Verna', 'The Hyundai Verna has 1 Diesel Engine and 2 Petrol Engine on offer. The Diesel engine is 1493 cc while the Petrol engine is 1497 cc and 998 cc . It is available with Manual & Automatic transmission.Depending upon the variant and fuel type the Verna has a mileage of 17.7 to 25.0 kmpl . The Verna is a 5 seater 4 cylinder car and has length of 4440mm, width of 1729mm and a wheelbase of 2600mm.'),
(14, 5, 'Elantra', 'The Hyundai Elantra has 1 Diesel Engine and 1 Petrol Engine on offer. The Diesel engine is 1493 cc while the Petrol engine is 1999 cc . It is available with Manual & Automatic transmission.Depending upon the variant and fuel type the Elantra has a mileage of 14.59 to 14.62 kmpl & Ground clearance of Elantra is 167mm. The Elantra is a 5 seater 4 cylinder car and has length of 4620mm, width of 1800mm and a wheelbase of 2700mm.'),
(15, 5, 'Creta', 'The Hyundai Creta has 1 Diesel Engine and 2 Petrol Engine on offer. The Diesel engine is 1493 cc while the Petrol engine is 1497 cc and 1353 cc . It is available with Manual & Automatic transmission.Depending upon the variant and fuel type the Creta has a mileage of 16.8 to 21.4 kmpl . The Creta is a 5 seater 4 cylinder car and has length of 4300mm, width of 1790mm and a wheelbase of 2610mm.'),
(16, 6, 'Seltos', 'The Kia Seltos has 1 Diesel Engine and 2 Petrol Engine on offer. The Diesel engine is 1493 cc while the Petrol engine is 1497 cc and 1353 cc . It is available with Automatic & Manual transmission.Depending upon the variant and fuel type the Seltos has a mileage of 16.5 to 20.8 kmpl . The Seltos is a 5 seater 4 cylinder car and has length of 4315mm, width of 1800mm and a wheelbase of 2610mm.'),
(17, 6, 'Carnival', 'The Kia Carnival has 1 Diesel Engine on offer. The Diesel engine is 2199 cc . It is available with Automatic transmission.Depending upon the variant and fuel type the Carnival has a mileage of 14.11 kmpl & Ground clearance of Carnival is 180mm. The Carnival is a 7 seater 4 cylinder car and has length of 5115, width of 1985 and a wheelbase of 3060.'),
(18, 6, 'Sonet', 'The Kia Sonet has 1 Diesel Engine and 2 Petrol Engine on offer. The Diesel engine is 1493 cc while the Petrol engine is 1197 cc and 998 cc . It is available with Automatic & Manual transmission.Depending upon the variant and fuel type the Sonet has a mileage of . The Sonet is a 5 seater 4 cylinder car and has length of 3995mm, width of 1790mm and a wheelbase of 2500mm.'),
(19, 7, 'Endeavour', 'The Ford Endeavour has 1 Diesel Engine on offer. The Diesel engine is 1996 cc . It is available with Automatic transmission.Depending upon the variant and fuel type the Endeavour has a mileage of 12.4 to 13.9 kmpl . The Endeavour is a 7 seater 4 cylinder car and has length of 4903mm, width of 1869mm and a wheelbase of 2850mm.'),
(20, 7, 'Ecosport', 'The Ford EcoSport has 1 Diesel Engine and 1 Petrol Engine on offer. The Diesel engine is 1498 cc while the Petrol engine is 1496 cc . It is available with Manual & Automatic transmission.Depending upon the variant and fuel type the EcoSport has a mileage of 14.7 to 21.7 kmpl . The EcoSport is a 5 seater 3 cylinder car and has length of 3998, width of 1765 and a wheelbase of 2519.'),
(21, 7, 'Figo', 'The Ford Figo has 2 Diesel Engine and 2 Petrol Engine on offer. The Diesel engine is 1498 cc and 1499 cc while the Petrol engine is 1194 cc and 1497 cc . It is available with Manual & Automatic transmission.Depending upon the variant and fuel type the Figo has a mileage of . The Figo is a seater 4 cylinder car.'),
(22, 8, 'Magnite', 'The Petrol engine is 999 cc . It is available with Manual & Automatic transmission. Depending upon the variant and fuel type the Magnite has a mileage of & Ground clearance of Magnite is 205. The Magnite is a 5 seater 3 cylinder car and has length of 3994mm, width of 1758mm and a wheelbase of 2500mm.'),
(23, 8, 'Terrano', 'The Nissan Terrano has 1 Diesel Engine and 1 Petrol Engine on offer. The Diesel engine is 1461 cc while the Petrol engine is 1598 cc . It is available with Manual & Automatic transmission.Depending upon the variant and fuel type the Terrano has a mileage of & Ground clearance of Terrano is 205mm. The Terrano is a 5 seater 4 cylinder car and has length of 4331mm, width of 1822mm and a wheelbase of 2673mm.'),
(24, 8, 'Murano', 'The Nissan Murano (Japanese: æ—¥ç”£ãƒ»ãƒ ãƒ©ãƒ¼ãƒŽ, Hepburn: Nissan MurÄno) is a mid-size crossover SUV manufactured and marketed by Nissan since May 2002 for the 2003 model year, and currently in its third generation.\\n\\nAs Nissan\\\'s first crossover SUV for the United States and Canada, the Murano was designed at Nissan America in La Jolla, California, and was based on the Nissan FF-L platform shared with the third generation Altima.[4] The European version of the Murano began sales in 2004'),
(25, 9, 'Glanza', 'Toyota Glanza is a 5 seater Hatchback available in a price range of Rs. 6.39 - 9.69 Lakh*. It is available in 7 variants, a 1197 cc, BS6 and 2 transmission options: Manual & Automatic. Other key specifications of the Glanza include a kerb weight of 935-960 and boot space of 318 Liters.'),
(26, 9, 'Innova', NULL),
(27, 9, 'Fortuner', NULL),
(28, 10, 'Kwid', NULL),
(29, 10, 'Triber', NULL),
(30, 10, 'Duster', NULL),
(38, 15, 'dummy model', 'this is a fucking dummy model');

-- --------------------------------------------------------

--
-- Table structure for table `popular_list`
--

CREATE TABLE `popular_list` (
  `list_id` bigint(20) UNSIGNED NOT NULL,
  `list_name` varchar(50) NOT NULL,
  `list_values` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `popular_list`
--

INSERT INTO `popular_list` (`list_id`, `list_name`, `list_values`) VALUES
(1, 'Popular Brands', '7,5,6,2,4'),
(2, 'Popular Cars', '1,27,28,11,4');

-- --------------------------------------------------------

--
-- Table structure for table `role_master`
--

CREATE TABLE `role_master` (
  `role_id` int(10) UNSIGNED NOT NULL,
  `role` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `role_master`
--

INSERT INTO `role_master` (`role_id`, `role`) VALUES
(2, 'Admin'),
(3, 'Site User'),
(1, 'Super Admin');

-- --------------------------------------------------------

--
-- Table structure for table `transmission`
--

CREATE TABLE `transmission` (
  `transmission_id` bigint(20) UNSIGNED NOT NULL,
  `transmission_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transmission`
--

INSERT INTO `transmission` (`transmission_id`, `transmission_type`) VALUES
(2, 'Automatic'),
(6, 'CVT'),
(1, 'Manual');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `user_role_id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `email` varchar(60) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(256) NOT NULL,
  `address` text NOT NULL,
  `user_image` varchar(100) DEFAULT NULL,
  `user_status` enum('Verified','Not verified','','') NOT NULL DEFAULT 'Not verified'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_role_id`, `first_name`, `last_name`, `email`, `username`, `password`, `address`, `user_image`, `user_status`) VALUES
(1, 1, 'Riya', 'Vora', 'riyaavora16@gmail.com', 'Riya16', '$2y$10$lowoE7ZW/8BeYna90bNQPe4vGdq9LcLjrL.1T2g6Egbnum/hjCuPe', 'Ahmedabad', 'upload2203281206.jpg', 'Verified'),
(2, 1, 'Jitendra', 'Bhavsar', 'jitendrabhavsar469@gmail.com', 'Jitendra21', '$2y$10$rFIpAckKKTgnxXeuxLZWlu3.eBRzxSJPT8Bb3SxsBDTU01hadla32', 'Mumbai', 'upload220328165.jpg', 'Verified'),
(3, 1, 'Arun', 'Ravindran', 'arun0306.r@gmail.com', 'Arun03', '$2y$10$0ktgM3SVwJ8INPfdSZjfDuy9r2dLbXIpSpRBT9PtFjrJ1vVsxq0IK', 'Pune', 'upload2203303204.jpg', 'Verified'),
(4, 2, 'Bryce', 'Abraham', 'bryce@gmail.com', 'Bryce04', '$2y$10$Cqufk0Q9Y8zxVAPHKSQ9B.hQgVHEKJR1kwtyFFjiQydywuTZSh8G2', 'Egypt', 'upload2204042545.jpg', 'Verified'),
(5, 2, 'Miles', 'Allen', 'miles@gmail.com', 'Miles05', '$2y$10$XxNsyMnaRzYTzgUND.fo4.54x.fiDmkkC4UzTFUtPhyvfcPW3b8Im', 'Leeds', NULL, 'Verified'),
(11, 2, 'Saloni', 'Shah', 'saloni@gmail.com', 'Saloni07', '$2y$10$nWGWUPCDaGTUYS4ihDnC/uHuuZokqIplY43MPEOU68dYluV51KOFq', 'Colorado', NULL, 'Verified'),
(12, 3, 'Vatsal', 'Karia', 'vatsal@gmail.com', 'Vatsal12', '$2y$10$luA7ma9TN8mgoFwL.pEhiOHv9bJnocPr24ISdfU1xW/tUv9g1UsPu', 'Rajkot', NULL, 'Verified'),
(13, 3, 'Prahan', 'Shah', 'prahan@gmail.com', 'Prahan13', '$2y$10$eQyW8S1t7zAkFgOb24X08OKogl04sjcjiqsT4BiL9zQ/BzArZ5dEC', 'Surat', NULL, 'Verified'),
(14, 3, 'Yashvi', 'Vadecha', 'yashvi@gmail.com', 'Yashvi14', '$2y$10$a1OHIpzdDBVj9NNGafjiJ.JSsbBkGb.b7nKkjreEhjQIoRY5q4E0K', 'Ahmedabad', NULL, 'Verified'),
(15, 3, 'Anjali', 'Parmar', 'anjali@gmail.com', 'Anjali15', '$2y$10$2zrLrIOOLhjebYdCTt7NO.MMJY2tFOczc5LUWsAJNFTx0lhTzh006', 'London', NULL, 'Verified'),
(17, 3, 'Jay', 'Bhavsar', 'bhavsarjitendra96@gmail.com', 'Jay13', '$2y$10$ZcVepkROSALFa9fw.rca1uL27vRx027c2vgZVzAtXa6kta/M9wof6', 'Ahmedabad', NULL, 'Verified'),
(18, 3, 'Vishwam', 'Vora', 'vishwam@gmail.com', 'Vishwam11', '$2y$10$I1GHGGASCLuVHzfH2zhoDO3mT8oO5o.8MSZWwQk4wQtkavA7KA89G', 'New York', NULL, 'Verified'),
(19, 3, 'Rutvi', 'Shah', 'rutvi@gmail.com', 'Rutvi18', '$2y$10$6EhUhYw9iLwxKTfYwAQBfOa83inIGwSC6khK35HvY.F7LrcHSoPEC', 'Sweden', NULL, 'Verified'),
(20, 3, 'Yamini', 'Parmar', 'yami@gmail.com', 'Yami20', '$2y$10$3KOOL7lvMyEocfqdU4uLHOKAxYXg/5luK9tweaKcOHMIpy0X9hSA2', 'Gandhinagar', NULL, 'Verified'),
(21, 3, 'Twinkal', 'Patel', 'twinkal@gmail.com', 'Twinkal02', '$2y$10$5dPh/l3u02IM2q2lLItvBOlottguJD/IbqMGbBqCzd7jWFFe3nYbm', 'Barrie', NULL, 'Verified'),
(22, 3, 'Jhanvi', 'Patel', 'jhanvi@gmail.com', 'Jhanvi25', '$2y$10$oehlC0z01RdViDMMIZ4fneLpPX4z3sl4EAwAin6coXz/di33UojXa', 'Leeds', NULL, 'Verified'),
(23, 3, 'Dhwani', 'Gajjar', 'dhwani@gmail.com', 'Dhwani13', '$2y$10$M8s5QJsWmS0lDOzdWicYz.OkRGU0pvdQdx/LXhYd13Z8KxNY9ncH.', 'Thailand', NULL, 'Verified'),
(24, 3, 'Uday', 'Gupta', 'uday@gmail.com', 'Uday24', '$2y$10$MV60wyVDVecCcp60SqW2Uuwu0cOfP5pt/PCerFn49OIIp/IHC3P7S', 'Surat', NULL, 'Verified'),
(25, 3, 'Keyur', 'Patel', 'keyur@gmail.com', 'Keyur18', '$2y$10$812OBK7zbTNjaxPj8RGYt.yE8JxkU.NWw59ETgBnoST5wMn5uU/c2', 'Punjab', NULL, 'Verified'),
(26, 3, 'Bhavisha', 'Deliwala', 'bhavi@gmail.com', 'Bhavi19', '$2y$10$6klxlPxdpnniZ1r182NOe.G6IlvCbTY1KFP.sn9ytZZP4aiTokh/y', 'Baroda', NULL, 'Verified'),
(27, 3, 'Brian', 'Doe', 'brian@gmail.com', 'Brian01', '$2y$10$HKw6rD/bgoX.5L3K0S9oAuZdwmPjyM.14Ct.Dv6mAwIj4OzV.HnJa', 'Paris', NULL, 'Verified'),
(28, 3, 'Allen', 'Joe', 'allen@gmail.com', 'Allen9', '$2y$10$7Pr0PO3mT8EQFkZtE5KHVeV9ApjKVDBji1gc0opQICdLBoq4YcpHC', 'Torronto', NULL, 'Verified'),
(30, 3, 'Aangi', 'Shah', 'aangi@gmail.com', 'Aangi12', '$2y$10$AS6WjH4Ubz2YpCNTypNK9.eBZBOeREdiMs1mNCmpdujrmoku/3DZS', 'Ahmedabad', NULL, 'Verified'),
(32, 3, 'Aditi', 'Upadhyay', 'aditi@gmail.com', 'Aditi16', '$2y$10$beU0vyAqcfPAIO.nbP3BNuGuVoNnM09bk1jmmlY7sFoze0ehLnfu6', 'Malbourne', NULL, 'Verified'),
(33, 3, 'Tirth', 'Barot', 'tirth@gmail.com', 'Tirth27', '$2y$10$giPl68PD2tBePAL0os1ElOYHiWz9/XX8A2OYiPcFtWcpdrIn4/npa', 'Ahmedabad', NULL, 'Verified'),
(34, 3, 'Viraj', 'Modi', 'viraj@gmail.com', 'Viraj20', '$2y$10$kAtEbJQdkxqHKvhjTq5tjeskNaiK2YKNdgRYTCUvfox5VZCQT2Acy', 'Manitobaa', NULL, 'Verified'),
(39, 3, 'Rohan', 'Mehta', 'rohan123@gmail.com', 'rohan123', '$2y$10$y9RFWyE85qjRb7p4/wp78Opfm1kHsPKbnSuQB3UMaU.ns9cInGm/q', 'Bellevuee', NULL, 'Verified'),
(44, 3, 'Jainam', 'Shah', 'jainam26@gmail.com', 'jainam26', '$2y$10$dvR5etqwXp551f.j9IWC2ekkdUK4E0pI/czHyG0udLHCM12i0a7O6', 'Ahmedabad', NULL, 'Verified'),
(50, 3, 'ararasdasdasldjaslkd', 'adasasdasdasdasdasda', 'aasdasdasd@sadasdasdasd.asdasdasdas', 'asdasdasdasdasdasdsa', '$2y$10$IqdyaKQQ/C6tZeRFz6cWDeL8uR0bvyn1A9Im9o9vnPg.ZOyTkQUeu', 'Ahmedabad', NULL, 'Verified'),
(51, 3, 'jitendra', 'bhavsar', 'jitendra33@gmail.com', 'jitendra33', '$2y$10$71F40fLHrW3UGB1lhYhkcutyF0qurbu6c3JThZ9/mBeYZd9sEc5lK', 'Ahmedabad', NULL, 'Verified');

-- --------------------------------------------------------

--
-- Table structure for table `vehicle`
--

CREATE TABLE `vehicle` (
  `vehicle_id` bigint(20) UNSIGNED NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  `exterior_color` bigint(20) UNSIGNED NOT NULL,
  `fuel_type_id` bigint(20) UNSIGNED NOT NULL,
  `transmission_id` bigint(20) UNSIGNED NOT NULL,
  `model_year` int(10) UNSIGNED NOT NULL,
  `seating_capacity` int(5) UNSIGNED NOT NULL,
  `vehicle_price` double UNSIGNED NOT NULL,
  `vehicle_vin` varchar(20) NOT NULL,
  `kms_driven` float UNSIGNED NOT NULL,
  `vehicle_description` text NOT NULL,
  `vehicle_image` varchar(100) NOT NULL,
  `vehicle_status` enum('Available','Sold') NOT NULL DEFAULT 'Available'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vehicle`
--

INSERT INTO `vehicle` (`vehicle_id`, `model_id`, `exterior_color`, `fuel_type_id`, `transmission_id`, `model_year`, `seating_capacity`, `vehicle_price`, `vehicle_vin`, `kms_driven`, `vehicle_description`, `vehicle_image`, `vehicle_status`) VALUES
(2, 2, 4, 2, 1, 2015, 5, 480000, '1FUJBBCK17LV75359', 130000, 'The Honda Amaze is a 4-door subcompact sedan produced by Honda slotted below the City.', 'honda-amaze-old1.jpg', 'Available'),
(3, 3, 5, 2, 1, 2022, 5, 820000, '5GAKVCKD7EJ346562', 0, 'The Honda Jazz has 1 Petrol Engine on offer. The Petrol engine is 1199 cc . It is available with Manual & Automatic transmission.', 'honda-jazz-new1.jpg', 'Available'),
(4, 4, 1, 3, 1, 2017, 5, 260000, '3A4FY48B77T553980', 80000, '2017 Maruti Suzuki Dzire vs Old Maruti Suzuki Swift Dzire – Dimension 2017 Maruti Suzuki Dzire Old Maruti Suzuki Swift Dzire Length – 3,995 mm 3,995 mm Width – 1,735 mm 1,695 mm Height – 1,515 mm 1,555 mm Wheelbase – 2,450 mm 2,430 mm', 'maruti-dzire-old1.jpg', 'Available'),
(6, 8, 2, 2, 2, 2022, 7, 3740000, '1FT7W2B66EEB31972', 0, 'The Diesel engine is 1996 cc . It is available with Automatic transmission. Depending upon the variant and fuel type the Gloster has a mileage of . The Gloster is a 7 seater 4 cylinder car and has length of 4985mm, width of 1926mm and a wheelbase of 2950mm.', 'mg-gloster-new1.jpg', 'Available'),
(8, 5, 6, 1, 1, 2021, 5, 760000, '3FAHP0JG7BR257109', 0, 'The Baleno is a 5 seater hatchback and has length of 3995mm, width of 1745mm and a wheelbase of 2520mm. Projector LED headlamps: The only car in its class to get these. ', 'maruti-baleno-new1.jpg', 'Available'),
(9, 21, 8, 3, 1, 2016, 5, 445000, 'JH4DA9350NS005381', 125000, 'The car will get great mileage. CNG cars tend to get great mileage. The CNG will return 16 km/kg in the city to 18km/kg on the highway.', 'ford-figo-old1.jpg', 'Available'),
(10, 19, 2, 2, 1, 2022, 7, 3298000, '1G8AN15F07Z174255', 0, 'Fortuner Plus Diesel, with a 3.0-litre turbo engine. All of them come standard with a 5-speed manual transmission', 'toyota-fortuner-new1.jpeg', 'Available'),
(11, 22, 1, 1, 2, 2022, 5, 670000, 'JH4KA7550NC033894', 0, 'Nissan positioned the Magnite as a value-for-money positioning with its sharp styling and feature-rich package. It boasts of a 7-inch digital driver\'s display, 8-inch touchscreen infotainment system with wireless connectivity for Android Auto and Apple CarPlay, LED headlamps, and auto AC with rear AC vents.', 'nissan-magnite-new1.jpg', 'Available'),
(12, 25, 4, 2, 1, 2015, 5, 639000, 'YS3DD78N4X7055320', 133000, 'Second hand toyota glanza cars available in fixed price. Select any model by trim, check all the specifications, owner details, transmission type etc.', 'toyota-glanza-old1.jpg', 'Available'),
(16, 14, 5, 2, 1, 2022, 5, 2100000, 'KMHWF35V5YA243476', 0, ' Hyundai Elantra is offered in 5 variants - the base model of Elantra is VTVT SX and the top variant Hyundai Elantra CRDi SX Option AT which comes at a price tag of Rs. 21.13 Lakh.', 'upload2203307917.jpg', 'Available'),
(20, 15, 2, 2, 1, 2022, 5, 1500000, 'KMHWF35V5YA243409', 0, 'dummy', 'upload2203311122.jpg', 'Available'),
(21, 12, 7, 1, 1, 2016, 5, 340000, 'YOHWF35V5YA243467', 56788, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. ', 'upload2203317897.jpg', 'Available'),
(22, 20, 7, 2, 1, 2013, 5, 400000, '2FMDK4GC9EBB58745', 0, 'dummy', 'upload2203313785.jpg', 'Available'),
(25, 20, 3, 1, 1, 2012, 5, 350000, '5N1AN08U08C509203', 136000, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'upload2204046892.jpg', 'Available'),
(26, 19, 2, 2, 2, 2019, 7, 2140000, '1FUYDCYB4RH593108', 73000, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'upload2204048518.jpg', 'Available'),
(30, 21, 3, 1, 1, 2021, 5, 670000, '5J6RE3H36BL031368', 0, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'upload2204042210.jpg', 'Available'),
(32, 2, 5, 2, 1, 2020, 5, 752000, '2HGFA16516H592787', 0, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'upload2204043519.jpg', 'Available'),
(34, 1, 3, 1, 1, 2020, 5, 860000, '1N4AL3APXEC405240', 0, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'upload2204045126.jpg', 'Available'),
(35, 1, 4, 1, 1, 2014, 5, 357000, '1N6AD07U58C403920', 158000, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'upload2204048667.jpg', 'Available'),
(36, 3, 1, 1, 1, 2016, 5, 651000, '2C4RC1BG6CR258886', 57000, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'upload220404578.jpg', 'Available'),
(37, 13, 2, 2, 2, 2021, 5, 1436000, '3GNAL4EKXES522400', 0, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'upload2204045344.jpeg', 'Available'),
(38, 13, 2, 2, 1, 2017, 5, 950000, '1XKDDU9X86J134775', 45000, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'upload2204045068.jpg', 'Available'),
(39, 17, 3, 2, 2, 2022, 7, 2866000, 'WP0AA2A73BL018762', 0, 'The Kia Grand Carnival is the second product under consideration for the Indian market. The company had revealed its plans to launch a new car in India in every six - nine months and the Grand Carnival is expected to be launched in the first half of 2020.', 'upload220404481.jpg', 'Available'),
(40, 16, 5, 1, 1, 2021, 5, 1095000, '1N4BL3AP0DC151248', 0, 'The price of Kia Seltos starts at Rs. 9.95 Lakh and goes upto Rs. 18.19 Lakh. Kia Seltos is offered in 17 variants - the base model of Seltos is HTE G and the top variant Kia Seltos X-Line AT D which comes at a price tag of Rs. 18.19 Lakh.', 'upload2204045012.jpg', 'Available'),
(41, 18, 1, 1, 2, 2021, 5, 1169000, 'WP1AC2A21DLA92116', 0, 'The price of Kia Sonet starts at Rs. 6.95 Lakh and goes upto Rs. 13.69 Lakh. Kia Sonet is offered in 27 variants - the base model of Sonet is 1.2 HTE and the top variant Kia Sonet 1.5 GTX Plus Diesel AT DT which comes at a price tag of Rs. 13.69 Lakh.', 'upload220404616.png', 'Available'),
(42, 18, 11, 2, 1, 2020, 5, 1070000, '1FMZU77E53UA25782', 21000, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'upload220404491.jpeg', 'Available'),
(43, 5, 17, 1, 1, 2017, 5, 650000, '5FNYF28677B011336', 21154, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'upload2204046765.jpg', 'Available'),
(44, 6, 6, 1, 1, 2020, 5, 987000, '2GNALDEK3C6395937', 0, 'The price of Maruti Ciaz starts at Rs. 8.87 Lakh and goes upto Rs. 11.86 Lakh. Maruti Ciaz is offered in 8 variants - the base model of Ciaz is Sigma and the top variant Maruti Ciaz Alpha AT which comes at a price tag of Rs. 11.86 Lakh.', 'upload220404814.jpg', 'Available'),
(45, 6, 6, 1, 1, 2016, 5, 410000, '3D4PG1FG0BT574420', 54000, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'upload2204044714.jpg', 'Available'),
(46, 4, 1, 3, 1, 2021, 5, 779000, '19UUA66268A010968', 0, 'The price of Maruti Dzire starts at Rs. 6.09 Lakh and goes upto Rs. 9.13 Lakh. Maruti Dzire is offered in 9 variants - the base model of Dzire is LXI and the top variant Maruti Swift Dzire ZXI Plus AT which comes at a price tag of Rs. 9.13 Lakh.', 'upload2204045070.jpg', 'Available'),
(47, 9, 2, 1, 2, 2021, 5, 1396000, '3GCUKSEC2EG129919', 0, 'The price of MG Astor starts at Rs. 9.98 Lakh and goes upto Rs. 17.72 Lakh. MG Astor is offered in 12 variants - the base model of Astor is Style and the top variant MG Astor Savvy Turbo AT which comes at a price tag of Rs. 17.72 Lakh.', 'upload2204048096.jpeg', 'Available'),
(48, 7, 1, 2, 1, 2021, 5, 1594000, 'KMHFH4JG8DA382196', 0, 'The price of MG Hector starts at Rs. 13.94 Lakh and goes upto Rs. 19.90 Lakh. MG Hector is offered in 11 variants - the base model of Hector is Style MT and the top variant MG Hector Sharp Diesel MT which comes at a price tag of Rs. 19.90 Lakh.', 'upload2204046600.jpg', 'Available'),
(49, 24, 17, 1, 2, 2021, 7, 2000000, '2G2FS22SXR2212631', 0, ' Nissan Murano in Indian market. Nissan might launch this SUV by 2012. With the launch of Nissan Murano, Nissan intends to tap into the potential offered by the growing SUV market of India. ', 'upload220404949.jpg', 'Available'),
(50, 24, 1, 1, 1, 2019, 7, 1750000, 'JTEBU14R050059807', 15900, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'upload2204044724.jpg', 'Available'),
(51, 23, 5, 2, 1, 2014, 5, 585000, '1B3ES56C32D591422', 75800, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'upload2204047868.png', 'Available'),
(52, 23, 3, 2, 1, 2020, 5, 1400000, '2B3KA53H36H148797', 0, 'The Terrano features a six-speed AMT gearbox which is well-tuned and is great to use in the city and on the highway.', 'upload2204045791.jpg', 'Available'),
(53, 30, 7, 1, 1, 2021, 5, 1127000, '2C4GP443X3R128892', 0, 'The price of Renault Duster starts at Rs. 9.86 Lakh and goes upto Rs. 14.25 Lakh. Renault Duster is offered in 7 variants - the base model of Duster is RXS and the top variant Renault Duster RXZ Turbo CVT which comes at a price tag of Rs. 14.25 Lakh.', 'upload2204047916.jpg', 'Available'),
(54, 30, 10, 1, 1, 2014, 5, 775000, '1HGEM22504L004702', 139000, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean id libero tincidunt, dapibus eros et, tincidunt nunc. Maecenas arcu dui, convallis semper lacus eget, ullamcorper tincidunt metus.', 'upload2204042919.jpg', 'Available'),
(55, 28, 4, 1, 1, 2021, 5, 488000, '3MHWF35V5YA243409', 0, 'The price of Renault KWID starts at Rs. 4.49 Lakh and goes upto Rs. 5.83 Lakh. Renault KWID is offered in 8 variants - the base model of KWID is RXL and the top variant Renault KWID CLIMBER AMT which comes at a price tag of Rs. 5.83 Lakh.', 'upload2204041180.jpg', 'Available'),
(56, 28, 2, 1, 1, 2020, 5, 397000, 'KTHWF35V5YA243409', 24000, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean id libero tincidunt, dapibus eros et, tincidunt nunc. Maecenas arcu dui, convallis semper lacus eget, ullamcorper tincidunt metus.', 'upload2204041953.jpg', 'Available'),
(57, 29, 12, 1, 2, 2021, 7, 832000, 'YOHWF35V5YA243786', 0, 'If you were looking for a spacious family car that can technically seat seven and haul that extra pair of suitcases from the airport or the railway station while carrying five adults, Renault’s latest offering, the Triber, would have piqued your curiosity.', 'upload2204049683.jpg', 'Available'),
(58, 11, 8, 4, 2, 2022, 5, 1625000, 'HYTWF35V5YA243409', 0, 'The Nexon EV is a package that makes a lot of sense. It’s an SUV that combines refreshingly sharp styling with performance that’s always usable and exciting when you want it to be.', 'upload2204048717.jpg', 'Available'),
(59, 10, 2, 3, 1, 2022, 5, 672000, 'UVHWF35V5YA24564', 0, 'Tata’s given the Tiago a model year update, and with it the much awaited CNG option. We find out how affordable it is as compared to petrol and what are its limitations', 'upload220404628.jpg', 'Available'),
(60, 10, 3, 1, 1, 2018, 5, 615000, 'FGRYT35V5YA249876', 67000, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean id libero tincidunt, dapibus eros et, tincidunt nunc. Maecenas arcu dui, convallis semper lacus eget, ullamcorper tincidunt metus.', 'upload2204048408.jpg', 'Available'),
(62, 12, 5, 3, 1, 2022, 5, 832000, 'JHGFF35V5YA243409', 0, 'Tigor 4-star safety rating and the value for money aspect is hard to ignore. However, the cabin and drive experience feels dated.', 'upload220404859.jpg', 'Available'),
(63, 27, 2, 2, 2, 2022, 7, 3200000, 'UYTRE35V5YA876543', 0, 'This Toyota Fortuner Legender model is not a world apart from the standard version, and yet gets a more premium looking face and more features on the inside. ', 'upload2204048178.jpeg', 'Available'),
(64, 25, 6, 1, 1, 2021, 5, 729000, 'JH4DA9350LS003644', 0, 'The price of Toyota Glanza starts at Rs. 6.39 Lakh and goes upto Rs. 9.69 Lakh. Toyota Glanza is offered in 7 variants - the base model of Glanza is E and the top variant Toyota Glanza V AMT which comes at a price tag of Rs. 9.69 Lakh.', 'upload2204049645.jpg', 'Available'),
(65, 25, 4, 1, 1, 2018, 5, 773000, 'JH4KA8171RC002009', 57000, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean id libero tincidunt, dapibus eros et, tincidunt nunc. Maecenas arcu dui, convallis semper lacus eget, ullamcorper tincidunt metus.', 'upload220404345.jpg', 'Available'),
(66, 26, 2, 2, 1, 2022, 8, 1785000, 'JH4DA1844GS001970', 0, 'The Toyota Innova Crysta facelift is available in three variants including GX, VX, and ZX. The Toyota Innova Crysta facelift was launched in India on 24 November, 2020.', 'upload22040465.jpg', 'Available'),
(70, 2, 20, 2, 2, 2021, 5, 1, '12345678942348979', 1, 'qwetuyrqiuwodsodf', 'ghost.png', 'Sold');

--
-- Triggers `vehicle`
--
DELIMITER $$
CREATE TRIGGER `audit` AFTER DELETE ON `vehicle` FOR EACH ROW insert into vehicle_audit(vehicle_id,model_id,model_year,vehicle_price,vehicle_vin,kms_driven)values(old.vehicle_id,old.model_id,old.model_year,old.vehicle_price,old.vehicle_vin,old.kms_driven)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_audit`
--

CREATE TABLE `vehicle_audit` (
  `vehicle_id` bigint(20) UNSIGNED NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  `model_year` int(10) UNSIGNED NOT NULL,
  `vehicle_price` double UNSIGNED NOT NULL,
  `vehicle_vin` varchar(20) NOT NULL,
  `kms_driven` float UNSIGNED NOT NULL,
  `sold_date` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vehicle_audit`
--

INSERT INTO `vehicle_audit` (`vehicle_id`, `model_id`, `model_year`, `vehicle_price`, `vehicle_vin`, `kms_driven`, `sold_date`) VALUES
(7, 15, 2022, 982000, 'JH4CL96824C026091', 0, '2022-03-31 06:22:50'),
(18, 1, 2010, 2100000, 'KMHWF35V5YA243469', 0, '2022-03-30 12:33:38'),
(19, 1, 2010, 95858, 'KMHWF35V5YA243430', 0, '2022-03-30 12:43:03'),
(23, 1, 2010, 210000, 'KMHWF35V5YA243430', 0, '2022-04-01 06:25:24'),
(24, 20, 2012, 350000, '5N1AN08U08C509203', 136000, '2022-04-01 05:16:13'),
(27, 19, 2019, 2140000, '1FUYDCYB4RH593108', 73000, '2022-04-01 05:25:08'),
(29, 8, 2010, 2100000, 'KMHWF35V5YA243476', 789999, '2022-04-01 05:27:07'),
(31, 1, 2021, 670000, '5J6RE3H36BL031368', 0, '2022-04-01 06:01:27'),
(33, 2, 2020, 752000, '2HGFA16516H592787', 0, '2022-04-01 06:09:32'),
(61, 17, 2022, 210000, 'KMHWF35V5YA243430', 40000, '2022-04-04 12:30:08'),
(67, 17, 2022, 2300000, 'abhi naya vin hai', 1200, '2022-04-08 08:03:50'),
(68, 2, 2000, 100000, '2HGFA16516H592700', 10000, '2022-04-12 07:05:33'),
(69, 2, 2011, 10, '12345678912345678', 10, '2022-04-16 08:58:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`appointment_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `vehicle_id` (`vehicle_id`);

--
-- Indexes for table `bodycolor`
--
ALTER TABLE `bodycolor`
  ADD PRIMARY KEY (`color_id`),
  ADD UNIQUE KEY `color` (`color`);

--
-- Indexes for table `brand_master`
--
ALTER TABLE `brand_master`
  ADD PRIMARY KEY (`brand_id`),
  ADD UNIQUE KEY `brand_name` (`brand_name`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `edit_content`
--
ALTER TABLE `edit_content`
  ADD PRIMARY KEY (`content_id`);

--
-- Indexes for table `email_verification`
--
ALTER TABLE `email_verification`
  ADD PRIMARY KEY (`verfication_id`);

--
-- Indexes for table `fuel_type`
--
ALTER TABLE `fuel_type`
  ADD PRIMARY KEY (`fuel_type_id`),
  ADD UNIQUE KEY `fuel_type` (`fuel_type`);

--
-- Indexes for table `model_master`
--
ALTER TABLE `model_master`
  ADD PRIMARY KEY (`model_id`),
  ADD UNIQUE KEY `model_name` (`model_name`),
  ADD KEY `brand_id` (`brand_id`);

--
-- Indexes for table `popular_list`
--
ALTER TABLE `popular_list`
  ADD PRIMARY KEY (`list_id`);

--
-- Indexes for table `role_master`
--
ALTER TABLE `role_master`
  ADD PRIMARY KEY (`role_id`),
  ADD UNIQUE KEY `role` (`role`);

--
-- Indexes for table `transmission`
--
ALTER TABLE `transmission`
  ADD PRIMARY KEY (`transmission_id`),
  ADD UNIQUE KEY `transmission_type` (`transmission_type`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `user_ibfk_1` (`user_role_id`);

--
-- Indexes for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD PRIMARY KEY (`vehicle_id`),
  ADD KEY `vehicle_ibfk_2` (`model_id`),
  ADD KEY `fuel_type_id` (`fuel_type_id`),
  ADD KEY `transmission_id` (`transmission_id`),
  ADD KEY `exterior_color` (`exterior_color`);

--
-- Indexes for table `vehicle_audit`
--
ALTER TABLE `vehicle_audit`
  ADD PRIMARY KEY (`vehicle_id`),
  ADD KEY `vehicle_ibfk_2` (`model_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `appointment_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `bodycolor`
--
ALTER TABLE `bodycolor`
  MODIFY `color_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `brand_master`
--
ALTER TABLE `brand_master`
  MODIFY `brand_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `contact_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `edit_content`
--
ALTER TABLE `edit_content`
  MODIFY `content_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `email_verification`
--
ALTER TABLE `email_verification`
  MODIFY `verfication_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `fuel_type`
--
ALTER TABLE `fuel_type`
  MODIFY `fuel_type_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `model_master`
--
ALTER TABLE `model_master`
  MODIFY `model_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `popular_list`
--
ALTER TABLE `popular_list`
  MODIFY `list_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `role_master`
--
ALTER TABLE `role_master`
  MODIFY `role_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transmission`
--
ALTER TABLE `transmission`
  MODIFY `transmission_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `vehicle`
--
ALTER TABLE `vehicle`
  MODIFY `vehicle_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;

--
-- AUTO_INCREMENT for table `vehicle_audit`
--
ALTER TABLE `vehicle_audit`
  MODIFY `vehicle_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `appointment_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `appointment_ibfk_2` FOREIGN KEY (`vehicle_id`) REFERENCES `vehicle` (`vehicle_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `model_master`
--
ALTER TABLE `model_master`
  ADD CONSTRAINT `model_master_ibfk_1` FOREIGN KEY (`brand_id`) REFERENCES `brand_master` (`brand_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`user_role_id`) REFERENCES `role_master` (`role_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `vehicle`
--
ALTER TABLE `vehicle`
  ADD CONSTRAINT `vehicle_ibfk_2` FOREIGN KEY (`model_id`) REFERENCES `model_master` (`model_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `vehicle_ibfk_5` FOREIGN KEY (`transmission_id`) REFERENCES `transmission` (`transmission_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `vehicle_ibfk_6` FOREIGN KEY (`exterior_color`) REFERENCES `bodycolor` (`color_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `vehicle_ibfk_8` FOREIGN KEY (`fuel_type_id`) REFERENCES `fuel_type` (`fuel_type_id`) ON DELETE CASCADE ON UPDATE CASCADE;

DELIMITER $$
--
-- Events
--
CREATE DEFINER=`root`@`localhost` EVENT `appointment` ON SCHEDULE EVERY 1 DAY STARTS '2022-04-04 18:30:09' ON COMPLETION PRESERVE ENABLE DO UPDATE appointment SET appointment_status = "Cancelled" WHERE DATEDIFF(appointment_created_date, CURDATE()) >=3 AND appointment_status = "Requested"$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
