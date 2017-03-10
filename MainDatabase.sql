-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               10.1.19-MariaDB - mariadb.org binary distribution
-- Server OS:                    Win32
-- HeidiSQL Version:             9.4.0.5125
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for enywas
DROP DATABASE IF EXISTS `enywas`;
CREATE DATABASE IF NOT EXISTS `enywas` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci */;
USE `enywas`;

-- Dumping structure for table enywas.answers
DROP TABLE IF EXISTS `answers`;
CREATE TABLE IF NOT EXISTS `answers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `author` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `question_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK__questions` (`question_id`),
  CONSTRAINT `FK__questions` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table enywas.answers: ~8 rows (approximately)
/*!40000 ALTER TABLE `answers` DISABLE KEYS */;
INSERT INTO `answers` (`id`, `author`, `email`, `body`, `question_id`) VALUES
	(2, NULL, NULL, 'This is a test answer', 1),
	(3, 'Konstantin', 'koceto@mail.com', 'This is my answer', 1),
	(4, 'Pesho', 'pesho@mail.com', 'This is the next answer', 2),
	(5, '', '', 'I am a nobody', 2),
	(7, '', '', 'sad', 2),
	(8, 'Novak', 'novak@mail.copm', 'asdasd\r\n', 2),
	(9, 'asd', 'asd@asd.asd', 'asd', 2),
	(14, 'Quest User', 'guest@mail.com', 'Heloooo', 1);
/*!40000 ALTER TABLE `answers` ENABLE KEYS */;

-- Dumping structure for table enywas.questions
DROP TABLE IF EXISTS `questions`;
CREATE TABLE IF NOT EXISTS `questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_questions_users` (`user_id`),
  CONSTRAINT `FK_questions_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table enywas.questions: ~2 rows (approximately)
/*!40000 ALTER TABLE `questions` DISABLE KEYS */;
INSERT INTO `questions` (`id`, `title`, `body`, `user_id`) VALUES
	(1, 'Test Question', 'This is a test', 1),
	(2, 'New Question', 'This is a new question\r\nasdfafadsf', 3);
/*!40000 ALTER TABLE `questions` ENABLE KEYS */;

-- Dumping structure for table enywas.users
DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table enywas.users: ~5 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
	(1, 'testUser', 'testuser@mail.com', '123'),
	(2, 'asd', 'asd@mail.com', '$2y$10$zzqtZ40//w9sFkcu9EsA8uz7eDEFizaYtE.vFJk/ZSy3brZI.JYdC'),
	(3, 'Ivan', 'ivan@mail.com', '$2y$10$UXfu0RPKX5Q8quk.M2Em8eaqVViXDHevomwhRC2kQV6ss7MlhA2tu'),
	(4, 'Kolio', 'kolio@abv.bg', '$2y$10$PaS3EF2ez7CoO594ywcKjusr6u4lVG11aOWQkDjZbzoeb6qNHp/Wu'),
	(5, 'Stens', 'Stens@abv.bg', '$2y$10$JYGagMj21CKpRxpsvfZae.gvHZyvK4dZ1K.OinQFnvkxXhwB68/9S');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
