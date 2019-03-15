-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 22, 2019 at 05:16 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spu_question`
--

-- --------------------------------------------------------

--
-- Table structure for table `paper`
--

CREATE TABLE `paper` (
  `id` int(255) NOT NULL,
  `papername` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `paper`
--

INSERT INTO `paper` (`id`, `papername`) VALUES
(4, 'BCS 4102: COMPUTER GRAPHICS SECTION A'),
(5, 'BCS 4102: COMPUTER GRAPHICS SECTION B'),
(6, 'BCS 4102: COMPUTER GRAPHICS SECTION C');

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(255) NOT NULL,
  `paper` varchar(255) NOT NULL,
  `question` text NOT NULL,
  `type` varchar(255) NOT NULL,
  `obj1` varchar(255) NOT NULL,
  `obj2` varchar(255) NOT NULL,
  `obj3` varchar(255) NOT NULL,
  `obj4` varchar(255) NOT NULL,
  `turefalse` varchar(255) NOT NULL,
  `oneword` varchar(255) NOT NULL,
  `open_ended` varchar(2000) NOT NULL,
  `answer` varchar(255) NOT NULL,
  `marks` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `paper`, `question`, `type`, `obj1`, `obj2`, `obj3`, `obj4`, `turefalse`, `oneword`, `open_ended`, `answer`, `marks`) VALUES
(14, '4', 'Define the following terms as used in Computer Graphics', 'Multiple Choice', 'Computer graphics                                                                                    (1 marks)', 'Rasterization.                                                                                               (2 marks)', 'Transformation.                                                                                                         (2 marks)', 'Homogenous Coordinates.                                                                                   (2 marks)', '', '', '', '', 0),
(15, '4', 'Explain refreshed as used in computer Graphic.                       (2 marks)', 'Open Ended', '', '', '', '', '', '', '', '', 0),
(16, '4', '   Discuss full-color systems in Computer graphics.                 (2 marks)', 'Open Ended', '', '', '', '', '', '', '', '', 0),
(17, '4', 'Explain how the Cathode Ray Tube works.                             (3 marks)', 'Open Ended', '', '', '', '', '', '', '', '', 0),
(18, '4', 'Explain how in a raster system pixels are displayed.             (2 marks)', 'Open Ended', '', '', '', '', '', '', '', '', 0),
(19, '4', 'Write a simple program in Open Gl that represent  a triangle                                                                                                              (4 marks)', 'Open Ended', '', '', '', '', '', '', '', '', 0),
(20, '4', 'Discus how OpenGL works from a programmerâ€™s point of view.                                                                                                              (3 marks)', 'Open Ended', '', '', '', '', '', '', '', '', 0),
(21, '4', 'Discuss types of transformation in computer Graphics.     (3 marks)', 'Open Ended', '', '', '', '', '', '', '', '', 0),
(22, '4', 'Explain what you understand by determinants in Matrices as applied in computer graphics.                                                             (2 marks', 'Open Ended', '', '', '', '', '', '', '', '', 0),
(23, '4', '10. Compute the determinant of the following matrix.              (2 marks)', 'Open Ended', '', '', '', '', '', '', '', '', 0),
(24, '5', 'Explain FOUR applications areas of Computer Graphics.       (2 marks)', 'Open Ended', '', '', '', '', '', '', '', '', 0),
(25, '5', 'Define matrix for 2D Rotation about the origin as implied in geometric transformation.                                                                            (3 marks)', 'Open Ended', '', '', '', '', '', '', '', '', 0),
(26, '5', 'Explain your understanding of a product matrix as used in geometric transformation.                                                                                                    (2 marks)', 'Open Ended', '', '', '', '', '', '', '', '', 0),
(27, '5', 'Discuss the purpose of frame buffer as used in Computer graphics.                                                                                                                       (2 marks) ', 'Open Ended', '', '', '', '', '', '', '', '', 0),
(28, '5', 'By Using a diagram discusses Graphics Pipeline as implied in Computer graphics.                                                                                               ( 5 marks)', 'Open Ended', '', '', '', '', '', '', '', '', 0),
(29, '5', 'Define 2D Translations as implied in geometric transformation. ', 'Open Ended', '', '', '', '', '', '', '', '', 0),
(30, '5', 'Define 2D Translations as implied in geometric transformation.                                                                                                                                                               (2 marks) ', 'Open Ended', '', '', '', '', '', '', '', '', 0),
(31, '5', 'Define 2D Scaling from the origin as implied in geometric transformation.                                                                                                                     (2 marks)', 'Open Ended', '', '', '', '', '', '', '', '', 0),
(32, '6', 'I sat in the car, and find the side mirror is 0.4m on my right and 0.3m in my front I started my car and drove 5m forward, turned 30 degrees to right, moved 5m forward again, and turned 45 degrees to the right, and stopped.What is the position of the side mirror now,relative to where I was sitting in the beginning. (4 marks)                                                                                                               ', 'Open Ended', '', '', '', '', '', '', '', '', 0),
(33, '6', 'Using a diagram discuss an output device in computer Graphics. (4 marks) ', 'Open Ended', '', '', '', '', '', '', '', '', 0),
(34, '6', 'Discuss how the Shadow-mask CRT functions using a diagram.     (4 marks)', 'Open Ended', '', '', '', '', '', '', '', '', 0),
(35, '6', 'Using generic flat panel display, discuss ï¬‚at-screen technologies as used in computer graphics.                                                                                   (5 marks', 'Open Ended', '', '', '', '', '', '', '', '', 0),
(36, '6', 'Discuss the opengl library organization using a diagram.                (3 marks)', 'Open Ended', '', '', '', '', '', '', '', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `firsrtname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `emailid` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `firsrtname`, `lastname`, `emailid`) VALUES
(1, 'admin', 'admin', 'Aamir', 'Khan', 'aamir@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `paper`
--
ALTER TABLE `paper`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
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
-- AUTO_INCREMENT for table `paper`
--
ALTER TABLE `paper`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
