-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 17, 2022 at 01:12 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clinic`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `app_id` int(255) NOT NULL,
  `stud_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `date` date NOT NULL,
  `app_status` varchar(255) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`app_id`, `stud_id`, `title`, `description`, `date`, `app_status`) VALUES
(4, 2, 'lorem', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Recusandae et mollitia placeat autem odio. Eligendi, incidunt autem omnis earum facilis eveniet deleniti asperiores fugiat reprehenderit rerum, accusantium, quaerat dolore odit.\r\n', '2022-11-02', 'declined'),
(5, 2, 'Again', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Recusandae et mollitia placeat autem odio. Eligendi, incidunt autem omnis earum facilis eveniet deleniti asperiores fugiat reprehenderit rerum, accusantium, quaerat dolore odit.\r\n', '2022-11-26', 'approved'),
(6, 3, 'testing', 'testing testuing', '2022-11-24', 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `stud_id` int(11) NOT NULL,
  `reg_number` varchar(255) NOT NULL,
  `full_names` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'not registered'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`stud_id`, `reg_number`, `full_names`, `email`, `gender`, `address`, `password`, `status`) VALUES
(2, 'R171767H', 'DonaldTonderai Mashiri', 'donaldtondemashiri@gmail.com', 'male', 'Mkoba18\r\n6692', 'donnie', 'rejected'),
(3, 'R215356M', 'Clifford Nyamuchari', 'cliff@gmail.com', 'male', 'Senga Nehosho', 'cliff', 'rejected');

-- --------------------------------------------------------

--
-- Table structure for table `treatments`
--

CREATE TABLE `treatments` (
  `treat_id` int(11) NOT NULL,
  `stud_id` int(11) NOT NULL,
  `conditions` varchar(255) NOT NULL,
  `prescription` text NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `treatments`
--

INSERT INTO `treatments` (`treat_id`, `stud_id`, `conditions`, `prescription`, `date`) VALUES
(1, 2, 'headache', 'bruden', '0000-00-00'),
(2, 3, 'gumbo', 'pain eaze\r\nbrufen', '2022-11-16'),
(3, 3, 'headache', 'gjbjl', '2022-11-16');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`app_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`stud_id`);

--
-- Indexes for table `treatments`
--
ALTER TABLE `treatments`
  ADD PRIMARY KEY (`treat_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `app_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `stud_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `treatments`
--
ALTER TABLE `treatments`
  MODIFY `treat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
