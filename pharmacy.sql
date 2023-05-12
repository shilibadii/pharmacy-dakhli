-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 12, 2023 at 11:28 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pharmacy`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `brand` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `tags` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `brand`, `price`, `status`, `img`, `tags`) VALUES
(14, 'Acetaminophen', '', 'Actamin', '20dt', 'available', 'uploads/nike-t-shirt-m-club-ssnl.webp', 'headache, muscle aches, arthritis, backache, toothaches, sore throat, colds, flu, fevers'),
(15, 'Atorvastatin ', '', 'Lipitor', '16.5dt', 'available', 'uploads/ativan-500x500.webp', 'liver problems,  muscle pain , weakness,  kidney disease,  diabetes'),
(16, 'Buprenorphine ', '', 'Subutex', '19dt', 'out of stock', 'uploads/70e6eaf4-3eeb-4b09-9a12-6fbc28eb24d1.png', 'methadone treatment, breathing problems, sleep apnea'),
(17, 'Cephalexin', '', 'Zartan', '35dt', 'available', 'uploads/146582_MAIN._AC_SS300_V1602868883_.webp', 'respiratory infections, ear infections, skin infections, urinary tract infections ,bone infections'),
(18, 'Cephalexin ', '', 'Panixine', '31dt', 'available', 'uploads/063657-cefalexin-wallpaper.png', 'respiratory infections, ear infections, skin infections, urinary tract infections ,bone infections'),
(19, 'Lisinopril', '', 'Zestril', '60dt', 'out of stock', 'uploads/lisinopril-tablets-es-611654603352.webp', 'respiratory infections, ear infections, skin infections, urinary tract infections ,bone infections'),
(20, 'Prinivil', '', 'Prinivil', '42.3dt', 'available', 'uploads/fa124a0e58de48bc866fd0761089caa5-prinivil_391993.jpg', 'high blood pressure'),
(21, 'Zestril', '', 'Prinivil', '62dt', 'available', 'uploads/102399.jpg', 'high blood pressure');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `created_at`) VALUES
(1, 'admin', '$2y$10$v9LoeVroWLK2zeA9jW2zBOJs1lDOUDs.iFah6oq2fCrUgBtl7hE.i', '2023-05-03 21:22:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
