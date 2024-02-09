-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 24, 2023 at 07:40 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `appointer`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `Name` varchar(200) NOT NULL,
  `Email` varchar(200) NOT NULL,
  `Password` varchar(200) NOT NULL,
  `User_type` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `Name`, `Email`, `Password`, `User_type`) VALUES
(1, 'Rafi', 'rafi@gamil.com', '$2y$10$.tk2hINnEcFa46r.VB.Aven3kGopyN3Xxwu0j4N6IUsSHw83O8LKO', 'admin'),
(2, 'Admin', 'admin@gmail.com', '$2y$10$jtPMRGsPAaqCTz2.ETHQ7.J6kst4ae87/qPVEkyQZLZndtUtGg9na', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `id` int(100) NOT NULL,
  `Name` varchar(200) NOT NULL,
  `Phone` int(50) NOT NULL,
  `Date` date NOT NULL,
  `Time` time NOT NULL,
  `DoctorName` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `Name`, `Phone`, `Date`, `Time`, `DoctorName`) VALUES
(1, 'Tanjilul Haq', 1773488082, '2023-12-25', '17:00:00', 'Dr.siam'),
(3, 'Tanjilul Haq', 191676311, '2023-12-26', '17:00:00', 'Dr.siam'),
(4, 'Habib', 1976261113, '2023-12-27', '16:22:00', 'Akib'),
(5, 'Rafi', 1773488082, '2023-12-27', '18:00:00', 'Akib'),
(6, 'Papon', 1876721231, '2023-12-27', '19:20:00', 'Akib');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `id` int(11) NOT NULL,
  `Name` varchar(300) NOT NULL,
  `Email` varchar(300) NOT NULL,
  `Password` varchar(200) NOT NULL,
  `Specialization` varchar(100) NOT NULL,
  `Availability` varchar(100) NOT NULL,
  `Contact_Information` varchar(100) NOT NULL,
  `Image` varchar(100) NOT NULL,
  `Fee` int(11) NOT NULL,
  `User_type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`id`, `Name`, `Email`, `Password`, `Specialization`, `Availability`, `Contact_Information`, `Image`, `Fee`, `User_type`) VALUES
(3, 'Dr.siam', 'siama@gmail.com', '$2y$10$wrJ/3nX.70I87qlnpqRSxef2/z.NKWVItybPShFhqwNSc0coXiCTq', 'Cardiology', '10:00 AM - 05:00 PM', '0197373844', 'doctor.jpg', 1000, 'doctor'),
(4, 'Tanjilul Haq', 'rafi@gmail.com', '$2y$10$HoNtSDToQOo.uxYgIpNJkeI5Ywvranpj/X5nTX4kKsCippkArJrU6', 'Cardiology', '10:00 AM - 05:00 PM', '01773488082', 'doctor1.jpg', 500, 'doctor'),
(5, 'Naomi', 'naomi@gmail.com', '$2y$10$K9lgbatFWwLq1klcNsJUFuHBRvbO1dDYbRnfbLt4PVqGw2BBN54Nq', 'Psychiatrists', '04:00 PM - 11:00 PM', '0197277271', 'doctor2jpg.jpg', 700, 'doctor'),
(6, 'Zarin', 'zarin1@gmail.com', '$2y$10$95LJ5V7S0kk.TCaKJTqA9.CFwV18cUhhdR57I2qp/q64Jc2wU9iUG', 'Psychiatrists', '10:00 AM - 05:00 PM', '0172717222', 'doctor3.jpg', 800, 'doctor'),
(7, 'Akib', 'akib@gmail.com', '$2y$10$UGhsGg5h0/R72KG.G0Cxi.f0yqtMn9Dm9ysr575pLve8jPIt8wlzy', 'Emergency Medicine', '04:00 PM - 11:00 PM', '0182978111', 'doctor4png.png', 700, 'doctor');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(200) NOT NULL,
  `Name` varchar(300) NOT NULL,
  `Email` varchar(300) NOT NULL,
  `Password` varchar(300) NOT NULL,
  `User_type` varchar(100) NOT NULL DEFAULT 'User'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `Name`, `Email`, `Password`, `User_type`) VALUES
(1, 'Tanjilul Haq', 'thrafi16@gmail.com', '$2y$10$mrpbHv2izrSw7uvOm46amu2j1z6F4KFtTgTf5p1sdsaSCUuuDqv5.', 'user'),
(3, 'Fariha', 'fariha@gmail', '$2y$10$NrXQGhlAayygPtcDhSvFCecPZpco63Z80HN9/.zh5jH7h9U9DXl9y', 'user'),
(4, 'Zarin', 'zarin@gmail.com', '$2y$10$jRrrClpy/60ocj/QYr0sou1XEp3g8sJeJP1t3i1eh1XDA/uRQVqZG', 'user'),
(5, 'Arman', 'arman@gmail.com', '$2y$10$skWV8IMnE8.cu6PZeai6wO2hbGF9yY8pMTjNjmhr4wdq.w56MchYe', 'user'),
(6, 'Upoma', 'upo@gmail.com', '$2y$10$yPo96LPmVvrPHQZUQJJlVuOMEfecRMmnmSDSUqedn/ErcXbcApYs.', 'user'),
(7, 'Habib', 'habib@gmail.com', '$2y$10$Gl3vSyO1UDfEBZ3AlCJbOeMd6I4wZV9a/q1M60k8fB5dpY0hUvP.e', 'user'),
(8, 'User', 'user@gmail.com', '$2y$10$dJzd.hJMlyMwpMpQiGOgG.vEaSKdfnEfQjjVvwKpy3..jZnZ7SauK', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
