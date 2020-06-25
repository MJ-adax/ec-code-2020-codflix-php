-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jun 25, 2020 at 06:21 PM
-- Server version: 5.7.26
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `codflix`
--

-- --------------------------------------------------------

--
-- Table structure for table `genre`
--

CREATE TABLE `genre` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `genre`
--

INSERT INTO `genre` (`id`, `name`) VALUES
(1, 'Action'),
(2, 'Horreur'),
(3, 'Science-Fiction');

-- --------------------------------------------------------

--
-- Table structure for table `history`
--

CREATE TABLE `history` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `media_id` int(11) NOT NULL,
  `start_date` datetime NOT NULL,
  `finish_date` datetime DEFAULT NULL,
  `watch_duration` int(11) NOT NULL DEFAULT '0' COMMENT 'in seconds'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` int(11) NOT NULL,
  `genre_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `type` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL,
  `release_date` date NOT NULL,
  `summary` longtext NOT NULL,
  `trailer_url` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `genre_id`, `title`, `type`, `status`, `release_date`, `summary`, `trailer_url`) VALUES
(1, 1, 'The Simpsons : The Movie', 'Film', 'Publié', '2007-07-27', 'Une histoire de DOME', 'https://www.youtube.com/embed/8arbBxezySc'),
(2, 2, 'En Avant !', 'Film', 'Publié', '2020-03-04', 'Gnome et Magie en perspective', 'https://www.youtube.com/embed/XRF6uuubGcI'),
(3, 3, 'Scary Movie', 'Film', 'Publié', '2020-10-25', 'Un soir, Drew Becker reçoit un appel anonyme dun maniaque. Traquée dans sa maison, puis dans son jardin, elle finit par se faire tuer. Sa mort plonge ses camarades de lycée en plein cauchemar, d\'autant qu\'ils doivent désormais faire face à un tueur en série, caché parmi eux. Flairant le scoop, la journaliste Gail Hailstorn débarque en ville, bien décidée à harceler Cindy Campbell et ses amis à propos de cette histoire.', 'https://www.youtube.com/embed/2g9OefP1Kg4'),
(6, 3, 'CROSSED', 'Serie', 'Publié', '2013-12-09', 'Une série autour des films basé sur le jeu vidéo', 'https://www.youtube.com/embed/wCgs8edZGfE');

-- --------------------------------------------------------

--
-- Table structure for table `serie`
--

CREATE TABLE `serie` (
  `id` int(11) NOT NULL,
  `media_id` int(11) NOT NULL,
  `season` int(11) NOT NULL,
  `name_episode` varchar(100) NOT NULL,
  `num_episode` int(11) NOT NULL,
  `summary` longtext NOT NULL,
  `release_date` date NOT NULL,
  `trailer_url` varchar(100) NOT NULL,
  `duration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `serie`
--

INSERT INTO `serie` (`id`, `media_id`, `season`, `name_episode`, `num_episode`, `summary`, `release_date`, `trailer_url`, `duration`) VALUES
(1, 6, 1, 'Super Mario Bros', 1, 'Analyse et Joyeusetés autour du film Super Mario Bros', '2013-12-09', 'https://www.youtube.com/embed/wCgs8edZGfE', 590),
(2, 6, 1, 'Gamer', 2, 'Nos joyeux comparses démolissent la bouse filmique que représente le film Gamer', '2013-12-17', 'https://www.youtube.com/embed/iNQFMYDgUPs', 698),
(3, 6, 1, 'Silent Hill', 3, 'Karim et ses compagnons décrivent Silent Hill', '2014-01-02', 'https://www.youtube.com/embed/V7utSIOWA4o', 645),
(4, 6, 2, 'Troll 2', 1, 'Mr Debbache est reparti pour de nouvelles aventures et entame sa folle épopée avec la critique du film Troll 2', '2016-09-21', 'https://www.youtube.com/embed/y-LvewxKfaw', 1317);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `email` varchar(254) NOT NULL,
  `password` varchar(80) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `email`, `password`) VALUES
(2, 'test@test.com', 'jesuisuntest'),
(3, 'gnagna@gmail.com', 'bonjour'),
(7, 'tata@tata.com', 'gneeeeeeee'),
(9, 'tete@tete.com', '$2y$10$rwXIqhhQlrFtHJuuJqxUo.vx4hLUz0/3L67sfa5ddXb.Xpfm4HXo2'),
(15, 'f@f.com', '03ac674216f3e15c761ee1a5e255f067953623c8b388b4459e13f978d7c846f4'),
(16, 'coding@gmail.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92'),
(18, 'jean@jean.com', '57ce7e99afd3c03813b5883f6835b4434a79f69cf9fa66104b35ff93e8c97743');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `genre`
--
ALTER TABLE `genre`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `history`
--
ALTER TABLE `history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `history_user_id_fk_media_id` (`user_id`),
  ADD KEY `history_media_id_fk_media_id` (`media_id`);

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`),
  ADD KEY `media_genre_id_fk_genre_id` (`genre_id`) USING BTREE;

--
-- Indexes for table `serie`
--
ALTER TABLE `serie`
  ADD PRIMARY KEY (`id`),
  ADD KEY `serie_serie_id_fk_media_id` (`media_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `genre`
--
ALTER TABLE `genre`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `history`
--
ALTER TABLE `history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `history`
--
ALTER TABLE `history`
  ADD CONSTRAINT `history_media_id_fk_media_id` FOREIGN KEY (`media_id`) REFERENCES `media` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `history_user_id_fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `media`
--
ALTER TABLE `media`
  ADD CONSTRAINT `media_genre_id_b1257088_fk_genre_id` FOREIGN KEY (`genre_id`) REFERENCES `genre` (`id`);