-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 18, 2022 at 06:47 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `adminpanel`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `AllCategory` ()   SELECT category from category$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `AllPosts` ()   SELECT * from tbl_post$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `category_id` (IN `catname` VARCHAR(100))   select c_id FROM category WHERE category=catname$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `c_id` int(11) NOT NULL,
  `category` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`c_id`, `category`) VALUES
(3, 'entertainment'),
(4, 'social'),
(5, 'programing');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_post`
--

CREATE TABLE `tbl_post` (
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_content` text NOT NULL,
  `categ_id` int(11) NOT NULL,
  `post_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `photo` varchar(255) NOT NULL,
  `comment` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_post`
--

INSERT INTO `tbl_post` (`post_id`, `user_id`, `post_title`, `post_content`, `categ_id`, `post_date`, `photo`, `comment`) VALUES
(6, 1, 'CKEDITOR Ayaan kutijaabinyaa ', '<p>&nbsp;</p>\n\n<h3>Aut minus, reiciendis fuga sit consequuntur iste, amet numquam, laudantium nam repellendus ipsa vero ipsum dicta blanditiis reprehenderit.</h3>\n\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde, nam nisi, excepturi amet repellendus, commodi sunt architecto eum optio cumque recusandae. Ut necessitatibus, rem impedit enim saepe reprehenderit asperiores velit.</p>\n\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat maiores possimus deserunt nam dolores! Unde autem eius deserunt, adipisci officiis ipsum eveniet quidem fugiat nihil temporibus soluta nam animi provident corrupti quod aut ducimus ex, repellendus aperiam minima, deleniti non! Alias, id. Debitis molestiae minima eius adipisci non distinctio expedita cumque ab, accusantium molestias amet cupiditate, nobis sed! Facilis, saepe.</p>\n\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus, dicta cum, earum expedita laboriosam doloribus. Aliquid, quibusdam vitae ratione fugiat labore numquam quo corporis, iure fugit incidunt nemo dolorum soluta facilis dolor. Quas quo enim consequatur commodi, quisquam, maiores at quasi quae est quis officiis alias eum omnis amet repudiandae. Nisi alias in, consequuntur? Minus fuga, modi provident laboriosam doloribus.</p>\n\n<p>&nbsp;</p>\n\n<h4>Harum libero esse sed nostrum laboriosam dolores rerum</h4>\n\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptatibus consequuntur fuga, provident quibusdam rerum maxime nostrum blanditiis numquam eos accusantium, quis quaerat sed voluptatem optio, nobis, officiis officia ipsum animi.</p>\n\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Unde, nam nisi, excepturi amet repellendus, commodi sunt architecto eum optio cumque recusandae. Ut necessitatibus, rem impedit enim saepe reprehenderit asperiores velit.</p>\n\n<p>&nbsp;</p>\n\n<h4>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim voluptatum sint autem, esse nihil. Eaque.</h4>\n\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quaerat maiores possimus deserunt nam dolores! Unde autem eius deserunt, adipisci officiis ipsum eveniet quidem fugiat nihil temporibus soluta nam animi provident corrupti quod aut ducimus ex, repellendus aperiam minima, deleniti non! Alias, id. Debitis molestiae minima eius adipisci non distinctio expedita cumque ab, accusantium molestias amet cupiditate, nobis sed! Facilis, saepe.</p>\n\n<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Possimus, dicta cum, earum expedita laboriosam doloribus. Aliquid, quibusdam vitae ratione fugiat labore numquam quo corporis, iure fugit incidunt nemo dolorum soluta facilis dolor. Quas quo enim consequatur commodi, quisquam, maiores at quasi quae est quis officiis alias eum omnis amet repudiandae. Nisi alias in, consequuntur? Minus fuga, modi provident laboriosam doloribus.</p>\n\n<p>&quot;&gt;</p>\n', 1, '2022-10-23 08:51:17', 'fruut.png', ''),
(7, 2, 'waa tijaabadii udambeesay ee CKEDITOr', '<p>&nbsp;</p>\n\n<p>udambeesay CKEDITOR&nbsp;waa tibaadaii udambeesay ee CKEDITOR&nbsp;waa tibaadaii udambeesay ee CKEDITOR&nbsp;waa tibaadaii udambeesay ee CKEDITOR&nbsp;waa tibaadaii udambeesay ee CKEDITOR&nbsp;waa tibaadaii udambeesay ee CKEDITOR&nbsp;waa tibaadaii udambeesay ee CKEDITOR&nbsp;waa tibaadaii udambeesay ee CKEDITOR&nbsp;waa tibaadaii udambeesay ee CKEDITOR&nbsp;waa tibaadaii udambeesay ee CKEDITOR&nbsp;waa tibaadaii udambeesay ee CKEDITOR&nbsp;waa tibaadaii udambeesay ee CKEDITOR&nbsp;waa tibaadaii udambeesay ee CKEDITOR&nbsp;waa tibaadaii udambeesay ee CKEDITOR&nbsp;waa tibaadaii udambeesay ee CKEDITOR&nbsp;waa tibaadaii udambeesay ee CKEDITOR&nbsp;waa tibaadaii udambeesay ee CKEDITOR&nbsp;waa tibaadaii udambeesay ee CKEDITOR&nbsp;waa tibaadaii udambeesay ee CKEDITOR&nbsp;waa tibaadaii udambeesay ee CKEDITOR&nbsp;waa tibaadaii udambeesay ee CKEDITOR&nbsp;waa tibaadaii udambeesay ee CKEDITOR&nbsp;waa tibaadaii udambeesay ee CKEDITOR&nbsp;waa tibaadaii udambeesay ee CKEDITOR&nbsp;waa tibaadaii udambeesay ee CKEDITOR&nbsp;waa tibaadaii udambeesay ee CKEDITOR&nbsp;waa tibaadaii udambeesay ee CKEDITOR&nbsp;waa tibaadaii udambeesay ee CKEDITOR&nbsp;waa tibaadaii udambeesay ee CKEDITOR&nbsp;waa tibaadaii udambeesay ee CKEDITOR&nbsp;waa tibaadaii udambeesay ee CKEDITOR&nbsp;waa tibaadaii udambeesay ee CKEDITOR&nbsp;</p>\n\n<p>&quot;&gt;<img alt=\"\" src=\"../img/928158668.jpg\" style=\"height:525px; width:700px\" /></p>\n', 2, '2022-10-23 09:01:01', 'output-onlinepngtools.png', ''),
(11, 0, 'update Tijaabo waana duceysane', '<p>yeeeeeeeeeeeeeeeeeeeees</p>\r\n', 4, '2022-10-23 09:07:28', 'duco.jpg', ''),
(12, 1, 'waxaa update gareeyay Adminka', '<p>maxeey xogta usoo muuqan la dahay markii la rabo in update la sameeyo</p>\r\n', 3, '2022-10-23 11:14:39', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `img` varchar(250) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `userType` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `img`, `name`, `email`, `password`, `userType`) VALUES
(1, 'duco.jpg', 'Administrator', 'admin@gmail.com', ' 827ccb0eea8a706c4c34a16891f84e7b', 'Admin'),
(3, 'g2.jpg ', 'sucaado', 'sucaado@gmail.com', ' 827ccb0eea8a706c4c34a16891f84e7b', 'user'),
(38, 'duco.jpg', 'mustaqiim abdifitah', 'mustaf@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Admin'),
(39, 'index.jpg', 'mohamed', 'mohamed@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `tbl_post`
--
ALTER TABLE `tbl_post`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `category_id` (`categ_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_post`
--
ALTER TABLE `tbl_post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
