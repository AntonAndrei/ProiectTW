-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 14 Iun 2018 la 20:23
-- Versiune server: 10.1.31-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `trex`
--

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `groups`
--

CREATE TABLE `groups` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Salvarea datelor din tabel `groups`
--

INSERT INTO `groups` (`id`, `name`) VALUES
(0, 'personal'),
(1000, 'base'),
(1002, 'Rent'),
(1005, 'Work');

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `gr_sp`
--

CREATE TABLE `gr_sp` (
  `id_group` int(11) NOT NULL,
  `id_spendings` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `gr_us`
--

CREATE TABLE `gr_us` (
  `id_user` int(11) NOT NULL,
  `id_group` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Salvarea datelor din tabel `gr_us`
--

INSERT INTO `gr_us` (`id_user`, `id_group`) VALUES
(1001, 1002),
(1002, 1005),
(1001, 1005),
(1003, 1002);

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `spendings`
--

CREATE TABLE `spendings` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `group_id` int(11) DEFAULT NULL,
  `category` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `cost` double NOT NULL,
  `date` date NOT NULL,
  `obs` varchar(760) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Salvarea datelor din tabel `spendings`
--

INSERT INTO `spendings` (`id`, `user_id`, `group_id`, `category`, `name`, `cost`, `date`, `obs`) VALUES
(1000, 1000, NULL, 'others', 'base', 0.02, '2000-02-20', NULL),
(1001, 1001, 0, 'food', 'Pizza', 9.7, '2018-09-13', ' It was gooood!'),
(1002, 1001, 0, 'food', 'Ice', 1, '2018-06-07', '  I\'m liking this icecream.'),
(1003, 1001, 1005, 'others', 'Chair', 399, '2018-06-14', ' It\'s just 399!'),
(1004, 1001, 1005, 'studies', 'Book', 102.55, '2018-06-30', ' I am writing a lot of stuff just to see how the site handles long descriptions of the added objects.  I am writing a lot of stuff just to see how the site handles long descriptions of the added objects.  I am writing a lot of stuff just to see how the site handles long descriptions of the added objects. '),
(1005, 1001, 1005, 'bills', 'Electricity', 1337, '2018-06-14', ' Who let the heater on over the weekend?!'),
(1006, 1001, 0, 'bills', 'Gas', 92, '2018-04-26', ' Cold!!!'),
(1007, 1001, 1005, 'food', 'Taco Day', 50.5, '2018-07-18', ' I bought everyone at work a taco.'),
(1008, 1001, 0, 'studies', 'Manga', 20.35, '2018-05-16', ' Good stuff.'),
(1009, 1002, 1005, 'others', 'Bigger chair', 499, '2018-06-22', ' It\'s better than the other one.'),
(1010, 1003, 1002, 'bills', 'Water Bill', 120, '2018-06-29', ' ');

-- --------------------------------------------------------

--
-- Structura de tabel pentru tabelul `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `pass` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Salvarea datelor din tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `pass`) VALUES
(1000, 'admin', 'teodor.tanase.97@gmail.com', 'admin'),
(1001, 'Teodor', 'doublebluet@gmail.com', '$2y$10$HxEnIO9A3GFHUUk2DGU89uPHGYu52cRjwl..jc29BNbmOjq6aOXT.'),
(1002, 'Framiu', 'filuta99@yahoo.com', '$2y$10$zAhMn4B31RTfuORr7ZD6FuYe3A6lPFqK9UFg2W/7rnil2t6VhsWuW'),
(1003, 'Silviu', 'darklimiter@gmail.com', '$2y$10$.GMNsdFtSzbmmvcBQuXdgu18AMUIRz5mkcPfYCpkxNQtOvXlfHzDC');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gr_sp`
--
ALTER TABLE `gr_sp`
  ADD KEY `id_group` (`id_group`),
  ADD KEY `id_spendings` (`id_spendings`);

--
-- Indexes for table `spendings`
--
ALTER TABLE `spendings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Restrictii pentru tabele sterse
--

--
-- Restrictii pentru tabele `gr_sp`
--
ALTER TABLE `gr_sp`
  ADD CONSTRAINT `gr_sp_ibfk_1` FOREIGN KEY (`id_group`) REFERENCES `groups` (`id`),
  ADD CONSTRAINT `gr_sp_ibfk_2` FOREIGN KEY (`id_spendings`) REFERENCES `spendings` (`id`);

--
-- Restrictii pentru tabele `spendings`
--
ALTER TABLE `spendings`
  ADD CONSTRAINT `spendings_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
