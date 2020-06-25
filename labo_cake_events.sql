-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le :  lun. 04 mai 2020 à 08:30
-- Version du serveur :  5.7.26
-- Version de PHP :  7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `labo_cake_events`
--

-- --------------------------------------------------------

--
-- Structure de la table `conversations`
--

CREATE TABLE `conversations` (
  `id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `user1_id` int(11) NOT NULL,
  `user2_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `conversations`
--

INSERT INTO `conversations` (`id`, `created`, `modified`, `user1_id`, `user2_id`) VALUES
(1, '2020-05-01 09:47:30', '2020-05-01 09:47:30', 5, 13),
(2, '2020-05-01 09:47:30', '2020-05-01 09:47:30', 5, 3),
(5, '2020-05-01 16:05:00', '2020-05-01 16:05:00', 5, 18),
(6, '2020-05-01 22:24:45', '2020-05-01 22:24:45', 19, 3),
(7, '2020-05-03 23:49:14', '2020-05-03 23:49:14', 21, 3);

-- --------------------------------------------------------

--
-- Structure de la table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `title` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `beginning` datetime NOT NULL,
  `location` varchar(200) DEFAULT NULL,
  `description` text,
  `picture` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `events`
--

INSERT INTO `events` (`id`, `created`, `modified`, `title`, `user_id`, `beginning`, `location`, `description`, `picture`) VALUES
(1, '2020-04-17 07:24:31', '2020-04-17 07:24:31', 'évenement 0', 9, '2020-04-17 07:24:00', 'inconnu', 'ma description\r\n\r\nadl\r\nz\r\nda\r\nda\r\nd\r\nzad\r\nzad\r\nzad\r\nza', ''),
(2, '2020-04-17 07:51:45', '2020-04-17 14:15:45', 'parcours initiation', 3, '2020-03-20 16:42:00', 'Webinar en ligne modifié', 'Parcours d\'initiation modifié deuxième fois', ''),
(3, '2020-04-17 16:25:04', '2020-04-17 16:25:04', 'tomorrowland 2k20', 3, '2020-04-17 16:20:00', 'belgium', 'tomorrowland 2k20', 'event-1587140704.jpg'),
(5, '2020-04-23 07:47:40', '2020-05-04 07:51:57', 'tomorrowland france', 5, '2020-12-23 07:43:00', 'Courchevel', 'French event !!!', 'event-5-1588578717.jpg'),
(6, '2020-04-23 07:55:30', '2020-04-23 07:55:30', 'tomorrowland france', 5, '2020-12-23 07:43:00', 'Courchevel', 'French event', 'event-1587628530.jpg'),
(7, '2020-04-23 09:28:00', '2020-04-23 09:28:00', 'tomorrowland belgium', 3, '2019-08-15 09:27:00', 'Bruxelles', '18ème édition', 'event-1587634080.jpg'),
(10, '2020-04-23 09:44:13', '2020-05-04 08:03:52', 'tomorrowland summer 2021', 15, '2021-06-23 09:43:00', 'Miami', 'Event @Miami', 'event-10-1588579432.jpeg'),
(9, '2020-04-23 09:39:08', '2020-05-04 08:25:03', 'test user test1', 3, '2020-04-23 09:38:00', '', 'test user test1', 'event-9-1588580703.jpg'),
(11, '2020-04-23 09:46:35', '2020-05-04 08:24:32', 'tagada', 3, '2022-12-23 09:46:00', '', 'tagada', 'event-11-1588580672.jpeg'),
(12, '2020-04-23 14:35:06', '2020-05-04 08:08:43', 'event bidon', 15, '2020-04-25 13:00:00', 'bidon', 'event bidon', 'event-12-1588579723.png'),
(20, '2020-04-24 16:28:29', '2020-05-04 08:22:50', 'test 18 event', 18, '2020-04-25 00:00:00', 'online', 'test 1 event', 'event-20-1588580570.jpg'),
(14, '2020-04-24 08:03:24', '2020-05-04 08:19:06', 'multiple invit', 15, '2020-04-09 00:00:00', '', 'multiple invit', 'event-14-1588580346.jpg'),
(15, '2020-04-24 09:08:31', '2020-05-04 08:15:25', 'Event today', 15, '2020-04-24 12:00:00', 'Paris', 'Today event', 'event-15-1588580125.png'),
(21, '2020-04-25 14:30:16', '2020-04-25 14:30:16', 'Webinar CakePHP', 5, '2020-04-26 00:00:00', 'Online', 'Webinar sur CakePhp v.3.8', 'event-1587825016.png'),
(22, '2020-05-03 12:20:33', '2020-05-03 12:20:33', 'First event refonte', 5, '2020-05-15 12:10:00', 'Online', 'Lorem ipsum dolor sin amet', 'event-1588508432.jpg'),
(23, '2020-05-03 13:14:59', '2020-05-03 13:14:59', 'TomorrowCake PHP', 5, '2020-05-17 01:01:00', 'Online', 'dazodkaok  oazkdoazd azodkaozkd ad azokd oazkdoazkd ak azodkaozkd azokd oazdkazokdazo dkzaodkazodkazk akdoaz kdozakod kzaodk azod kazokd aozkd oazk dozakd oazkd ozakd ozadza', 'event-1588511699.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `guests`
--

CREATE TABLE `guests` (
  `id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `event_id` int(11) NOT NULL,
  `status` varchar(30) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `guests`
--

INSERT INTO `guests` (`id`, `created`, `modified`, `user_id`, `event_id`, `status`) VALUES
(1, '2020-04-17 10:26:58', '2020-04-17 10:26:58', 15, 1, 'validated'),
(2, '2020-04-17 10:26:58', '2020-04-17 10:26:58', 8, 1, 'validated'),
(3, '2020-04-17 09:39:30', '2020-04-17 09:39:30', 2, 1, 'validated'),
(5, '2020-04-17 10:18:54', '2020-04-17 10:18:54', 4, 1, 'validated'),
(6, '2020-04-17 10:19:29', '2020-04-17 10:19:29', 14, 1, 'validated'),
(7, '2020-04-23 12:22:33', '2020-04-23 12:22:33', 5, 10, 'validated'),
(8, '2020-04-23 14:20:15', '2020-04-23 14:20:15', 12, 10, 'validated'),
(9, '2020-04-23 14:23:13', '2020-04-23 14:23:13', 3, 10, 'validated'),
(10, '2020-04-23 14:23:22', '2020-04-23 14:23:22', 9, 10, 'validated'),
(11, '2020-04-23 15:27:42', '2020-05-04 00:27:44', 5, 12, 'canceled'),
(12, '2020-04-23 15:35:48', '2020-04-23 15:35:48', 14, 12, 'validated'),
(13, '2020-04-23 15:36:27', '2020-04-23 15:36:27', 8, 12, 'validated'),
(14, '2020-04-24 07:58:57', '2020-04-24 07:58:57', 11, 10, 'validated'),
(15, '2020-04-24 07:59:18', '2020-04-24 07:59:18', 11, 10, 'validated'),
(16, '2020-04-24 07:59:55', '2020-04-24 07:59:55', 7, 10, 'validated'),
(17, '2020-04-24 08:00:37', '2020-04-24 08:00:37', 14, 10, 'validated'),
(18, '2020-04-24 08:03:49', '2020-04-24 08:03:49', 3, 14, 'validated'),
(19, '2020-04-24 08:05:02', '2020-04-24 08:05:02', 7, 14, 'validated'),
(20, '2020-04-24 08:05:11', '2020-04-24 08:05:11', 7, 14, 'validated'),
(21, '2020-04-24 08:05:55', '2020-04-24 08:05:55', 14, 14, 'validated'),
(22, '2020-04-24 16:29:29', '2020-04-24 16:29:29', 10, 20, 'validated'),
(23, '2020-04-24 16:32:51', '2020-04-24 16:32:51', 10, 20, 'validated'),
(25, '2020-04-25 15:04:20', '2020-04-25 15:04:20', 5, 11, 'pending'),
(26, '2020-04-26 14:28:20', '2020-04-26 14:28:20', 15, 11, 'validated'),
(27, '2020-04-26 14:40:30', '2020-04-26 14:40:30', 144, 11, 'pending'),
(28, '2020-04-26 14:40:30', '2020-04-26 14:40:30', 122, 11, 'pending'),
(29, '2020-04-26 14:57:06', '2020-04-26 14:57:06', 11, 11, 'validated'),
(30, '2020-04-26 14:57:23', '2020-04-26 14:57:23', 18, 11, 'validated'),
(31, '2020-04-26 16:15:01', '2020-04-26 16:15:01', 14, 11, 'validated'),
(32, '2020-04-26 16:15:43', '2020-04-26 16:15:43', 17, 11, 'validated'),
(33, '2020-04-29 20:05:19', '2020-04-29 20:05:19', 145, 5, 'pending'),
(34, '2020-04-29 20:05:19', '2020-04-29 20:05:19', 123, 5, 'pending'),
(35, '2020-05-01 14:06:13', '2020-05-04 03:43:25', 18, 5, 'validated'),
(36, '2020-05-01 22:36:29', '2020-05-01 22:36:29', 19, 11, 'pending'),
(37, '2020-05-02 23:48:22', '2020-05-02 23:48:22', 19, 5, 'pending'),
(38, '2020-05-03 13:58:33', '2020-05-03 13:58:33', 5, 20, 'pending');

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `event_id` int(11) DEFAULT NULL,
  `content` text NOT NULL,
  `readstatus` datetime DEFAULT NULL,
  `type` varchar(30) NOT NULL,
  `conversation_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `messages`
--

INSERT INTO `messages` (`id`, `created`, `modified`, `sender_id`, `receiver_id`, `event_id`, `content`, `readstatus`, `type`, `conversation_id`) VALUES
(1, '2020-04-24 11:18:49', '2020-04-24 11:18:49', 5, 15, NULL, 'first message', NULL, 'message', 1),
(3, '2020-04-24 14:43:24', '2020-04-24 14:43:24', 15, 3, NULL, 'Bonjour. Je serais très interressé pour participer à votre événement. Merci d\'accepter mon invitation.', NULL, 'request', 1),
(4, '2020-04-24 14:52:13', '2020-04-24 14:52:13', 5, 15, NULL, 'Bonjour. Je serais très interressé pour participer à votre événement. Merci d\'accepter mon invitation.', NULL, 'request', 1),
(5, '2020-04-24 15:12:55', '2020-04-24 15:12:55', 11, 3, NULL, 'Bonjour. Je serais très interressé pour participer à votre événement. Merci d\'accepter mon invitation.', NULL, 'request', 0),
(6, '2020-04-24 16:35:28', '2020-04-24 16:35:28', 18, 15, NULL, 'Bonjour. Je serais très interressé pour participer à votre événement. Merci d\'accepter mon invitation.', NULL, 'request', 0),
(7, '2020-04-25 07:16:01', '2020-04-25 07:16:01', 5, 3, NULL, 'Bonjour. Je serais très interressé pour participer à votre événement. Merci d\'accepter mon invitation.', NULL, 'request', 2),
(8, '2020-04-25 14:34:34', '2020-04-25 14:34:34', 3, 5, NULL, 'Message de user ID 3', '2020-05-04 04:35:44', 'message', 2),
(9, '2020-04-25 14:43:55', '2020-04-25 14:43:55', 5, 3, NULL, 'Bonjour. Je serais très interressé pour participer à votre événement. Merci d\'accepter mon invitation.', NULL, 'request', 2),
(10, '2020-04-25 14:53:01', '2020-04-25 14:53:01', 5, 3, 11, 'Bonjour. Je serais très interressé pour participer à votre événement. Merci d\'accepter mon invitation.', NULL, 'request', 2),
(11, '2020-04-25 15:03:28', '2020-04-25 15:03:28', 5, 3, 11, 'test', NULL, 'request', 2),
(12, '2020-04-25 15:04:20', '2020-04-25 15:04:20', 5, 3, 11, 'Bonjour. Je serais très interressé pour participer à votre événement. Merci d\'accepter mon invitation.', NULL, 'request', 2),
(14, '2020-05-01 22:36:29', '2020-05-01 22:36:29', 19, 3, 11, 'Avez vous vu mon message précédent ?', NULL, 'request', 6),
(13, '2020-05-01 14:06:12', '2020-05-01 14:06:12', 18, 5, 5, 'Yo. Une invit\' please\r\nMerci', '2020-05-04 03:59:33', 'request', 5),
(15, '2020-05-03 13:58:33', '2020-05-03 13:58:33', 5, 18, 20, 'Hey stp invite me', NULL, 'request', 5),
(16, '2020-05-03 17:24:16', '2020-05-03 17:24:16', 5, 18, NULL, 'ok je vais voir', NULL, 'message', 5),
(17, '2020-05-03 17:24:57', '2020-05-03 17:24:57', 5, 18, NULL, 'nouvel essai', NULL, 'message', 5),
(18, '2020-05-03 23:49:14', '2020-05-03 23:49:14', 21, 3, 11, 'Votre événement m\'intéresse beaucoup je souhaiterais pouvoir y assister.\r\n\r\nMerci', NULL, 'request', 7),
(19, '2020-05-04 00:54:52', '2020-05-04 00:54:52', 21, 3, 11, 'Bonjour. Essai .', NULL, 'request', 7),
(20, '2020-05-04 04:14:23', '2020-05-04 04:14:23', 5, 18, NULL, 'Message de test', NULL, 'message', 5);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `login` varchar(20) NOT NULL,
  `password` varchar(150) NOT NULL,
  `lastin` datetime DEFAULT NULL,
  `lastout` datetime DEFAULT NULL,
  `avatar` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `created`, `modified`, `login`, `password`, `lastin`, `lastout`, `avatar`) VALUES
(5, '2020-04-16 14:05:18', '2020-05-04 07:25:32', 'test2', '$2y$10$fD0XMWB0F5oxm.9a2FoUkO5EtpaYU3hxeOWZ4W.hZo5L5/eGtP79q', '2020-05-04 07:25:32', '2020-05-04 04:41:08', ''),
(3, '2020-04-16 09:15:15', '2020-05-04 08:23:06', 'test1', '$2y$10$V34p7nm1E00ZQaAl8aCz1eBJypf1BJ3Jn1hvMCzDFRzM.xza332iq', '2020-05-04 08:23:06', '2020-05-04 08:21:02', 'user-3-1587045753.jpg'),
(20, '2020-05-02 14:23:59', '2020-05-02 14:25:58', 'test002', '$2y$10$iVIu1MpVWWsBA2IKh7PCeOVO0DRhCP1mOWgCgZimvyr6ZrQ4Y.NNm', '2020-05-02 14:23:59', '2020-05-02 14:25:58', NULL),
(7, '2020-04-16 14:10:10', '2020-04-17 12:25:04', 'test3', '$2y$10$oIbkO8uThlmr8hkeQwd0pOD.KrrEpHvDH1DE0N1jjwlHgiKtSjNDK', '2020-04-17 12:09:49', '2020-04-17 12:25:04', NULL),
(8, '2020-04-16 14:22:48', '2020-04-16 14:23:44', 'test4', '$2y$10$jI2uao8pENnhnfHqi5UM9OEHd4CovUq.PNkgeRRDgYPzDOvJE5.c.', NULL, '2020-04-16 14:23:44', NULL),
(9, '2020-04-16 14:24:12', '2020-04-17 07:09:49', 'test5', '$2y$10$Uiki7S8jLTrQpZKgxaWlX.CpzAi3q5sRltZ6lkofx32r7I5dnugra', '2020-04-17 07:09:49', '2020-04-16 14:38:30', NULL),
(10, '2020-04-16 14:38:39', '2020-04-16 14:39:21', 'test6', '$2y$10$fgg0H7TNLN3QolS2sTFFvueUcblom5U6BbkVRfOVxbifO0w8wc2qe', NULL, '2020-04-16 14:39:21', NULL),
(11, '2020-04-16 14:39:15', '2020-04-24 15:12:47', 'test7', '$2y$10$xp9Nm9gFNUBHdz8puBpMQucVjXz76LVsO7SSVnJ0xnhPV/xUsp1g.', '2020-04-24 15:12:47', NULL, NULL),
(19, '2020-05-01 22:14:16', '2020-05-02 14:23:49', 'test001', '$2y$10$R6whLiySZVYrrRuvZ8mYyORruskqfKOX.9W3.6YGrSwUOQAW/Pah.', '2020-05-02 14:20:22', '2020-05-02 14:23:49', NULL),
(14, '2020-04-16 14:43:54', '2020-04-16 14:55:23', 'test8', '$2y$10$OEJKQOHFaVg8AWnYh5dpje2lUJJNwVoxVTuHPQu4hoopJDzcOonL6', '2020-04-16 14:44:44', '2020-04-16 14:55:23', NULL),
(15, '2020-04-16 14:55:34', '2020-05-04 08:19:20', 'test9', '$2y$10$fao5R2jhxrmJu4STH02/XOLQDipLA7lRn1z2GrgAGEHSyKLWQMyuK', '2020-05-04 08:00:25', '2020-05-04 08:19:20', 'user-9-1587045753.jpg'),
(17, '2020-04-24 08:13:00', '2020-04-25 14:22:45', 'test10', '$2y$10$94DJXqP4VOBmcIjCV3HOjO/QyOH81rbuV1T5iGbMSTQXcyEGt1qAK', '2020-04-25 14:17:43', '2020-04-25 14:22:45', NULL),
(18, '2020-04-24 16:27:53', '2020-05-04 08:22:54', 'test18', '$2y$10$0NXdB1Xi03f1gqeXo17xHu1nzliPXkgO007yoJAFgRrNhdyMknRKa', '2020-05-04 08:22:24', '2020-05-04 08:22:54', NULL),
(22, '2020-05-04 02:07:15', '2020-05-04 02:45:04', 'test0407bis', '$2y$10$U2/zrig.YzGoGE.XnDs7/O.pMUk0aWrFXlg3nyrvBja35u9ue.Enu', '2020-05-04 02:07:15', '2020-05-04 02:45:04', NULL);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `conversations`
--
ALTER TABLE `conversations`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `guests`
--
ALTER TABLE `guests`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `conversations`
--
ALTER TABLE `conversations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT pour la table `guests`
--
ALTER TABLE `guests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT pour la table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
