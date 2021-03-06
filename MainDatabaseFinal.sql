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
  CONSTRAINT `FK__questions` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table enywas.answers: ~15 rows (approximately)
/*!40000 ALTER TABLE `answers` DISABLE KEYS */;
INSERT INTO `answers` (`id`, `author`, `email`, `body`, `question_id`) VALUES
	(16, 'Ivan', 'ivan@mail.com', 'Yes, that is correct', 22),
	(17, 'Kolio', 'kolio@abv.bg', 'You understood it corectly', 22),
	(18, 'Kolio', 'kolio@abv.bg', 'That is indeed correct', 23),
	(19, 'John', 'john2@smith.com', 'I am not sure about that. Sorry', 23),
	(20, 'Ivan', 'ivan@mail.com', ' In some countries, a CV is typically the first item that a potential employer encounters regarding the job seeker and is typically used to screen applicants, often followed by an interview. CVs may also be requested for applicants to postsecondary programs, scholarships, grants and bursaries. In the 2010s, some applicants provide an electronic text of their CV to employers using email, an online employment website or using a job-oriented social networking service\' website, such as LinkedIn.', 24),
	(21, 'Spas', 'spas@amv.bg', 'Ne znam opraiai se brat', 24),
	(22, 'John', 'john2@smith.com', 'You wont tell me what to do', 25),
	(23, 'Ivan', 'ivan@mail.com', 'That isnt really a question', 27),
	(24, 'john', 'john2@smith.com', 'I didnt know that. Thanks', 27),
	(25, 'Ivan', 'ivan@mail.com', 'Its fine i think', 29),
	(26, 'John', 'john2@smith.com', 'Its a one way trip', 29),
	(27, 'Spas', 'spas@amv.bg', 'Its ok', 30),
	(28, 'John', 'john2@smith.com', 'Yes i can play', 32),
	(29, 'Ivan', 'ivan@mail.com', 'Tennis is good', 32),
	(30, 'Jordan', 'jor@mail.com', 'I suck at tennis', 32);
/*!40000 ALTER TABLE `answers` ENABLE KEYS */;

-- Dumping structure for table enywas.questions
DROP TABLE IF EXISTS `questions`;
CREATE TABLE IF NOT EXISTS `questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `body` text COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `views` int(11) NOT NULL DEFAULT '0',
  `deleted_on` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_questions_users` (`user_id`),
  CONSTRAINT `FK_questions_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table enywas.questions: ~11 rows (approximately)
/*!40000 ALTER TABLE `questions` DISABLE KEYS */;
INSERT INTO `questions` (`id`, `title`, `body`, `user_id`, `views`, `deleted_on`) VALUES
	(22, 'Question about PHP', 'PHP is a server-side scripting language designed primarily for web development but also used as a general-purpose programming language. Originally created by Rasmus Lerdorf in 1994, the PHP reference implementation is now produced by The PHP Development Team. PHP originally stood for Personal Home Page, but it now stands for the recursive acronym PHP: Hypertext Preprocessor. Is that correct?', 3, 5, NULL),
	(23, 'Hawaii', 'The state encompasses nearly the entire volcanic Hawaiian archipelago, which comprises hundreds of islands spread over 1,500 miles (2,400 km). At the southeastern end of the archipelago, the eight main islands are—in order from northwest to southeast: Niʻihau, Kauaʻi, Oʻahu, Molokaʻi, Lānaʻi, Kahoʻolawe, Maui, and the Island of Hawaiʻi. The last is the largest island in the group; it is often called the "Big Island" or "Hawaiʻi Island" to avoid confusion with the state or archipelago. The archipelago is physiographically and ethnologically part of the Polynesian subregion of Oceania. Is that true?', 3, 1, NULL),
	(24, 'How do i write my CV?', 'Please help i need to write my cv.', 4, 15, NULL),
	(25, 'Test question', 'This is a test question. Please ignore', 4, 1, NULL),
	(26, 'Lorem', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. A accusantium debitis deserunt, dolor fugiat harum illum ipsam, mollitia necessitatibus nulla officiis omnis repellat sequi sint sunt temporibus tenetur ut velit.', 4, 7, NULL),
	(27, 'A question about JS', 'JavaScript is a high-level, dynamic, untyped, and interpreted programming language.It has been standardized in the ECMAScript language specification. Alongside HTML and CSS, JavaScript is one of the three core technologies of World Wide Web content production; the majority of websites employ it, and all modern Web browsers support it without the need for plug-ins. JavaScript is prototype-based with first-class functions, making it a multi-paradigm language, supporting object-oriented, imperative, and functional programming styles.It has an API for working with text, arrays, dates and regular expressions, but does not include any I/O, such as networking, storage, or graphics facilities, relying for these upon the host environment in which it is embedded.', 8, 2, NULL),
	(28, 'Java', 'Java is a general-purpose computer programming language that is concurrent, class-based, object-oriented, and specifically designed to have as few implementation dependencies as possible. It is intended to let application developers "write once, run anywhere" (WORA), meaning that compiled Java code can run on all platforms that support Java without the need for recompilation. Java applications are typically compiled to bytecode that can run on any Java virtual machine (JVM) regardless of computer architecture. As of 2016, Java is one of the most popular programming languages in use, particularly for client-server web applications, with a reported 9 million developers. Java was originally developed by James Gosling at Sun Microsystems (which has since been acquired by Oracle Corporation) and released in 1995 as a core component of Sun Microsystems\' Java platform. The language derives much of its syntax from C and C++, but it has fewer low-level facilities than either of them. Is that correct?', 8, 5, NULL),
	(29, 'Trip to Somalia', 'Hello. I would like to ask is a trip to Somalia a good idea? Is it safe?', 8, 6, NULL),
	(30, 'Work in programming', 'Computer programming (often shortened to programming) is a process that leads from an original formulation of a computing problem to executable computer programs. Programming involves activities such as analysis, developing understanding, generating algorithms, verification of requirements of algorithms including their correctness and resources consumption, and implementation (commonly referred to as coding) of algorithms in a target programming language. Source code is written in one or more programming languages. The purpose of programming is to find a sequence of instructions that will automate performing a specific task or solving a given problem. The process of programming thus often requires expertise in many different subjects, including knowledge of the application domain, specialized algorithms, and formal logic. Is it true? How about java?', 7, 22, NULL),
	(31, 'Fitness question', 'Physical fitness is a general state of health and well-being and, more specifically, the ability to perform aspects of sports, occupations and daily activities. Physical fitness is generally achieved through proper nutrition, moderate-vigorous physical exercise, and sufficient rest. Is that true?', 7, 8, NULL),
	(32, 'Do you know tennis?', 'Tennis is a racket sport that can be played individually against a single opponent (singles) or between two teams of two players each (doubles). Each player uses a tennis racket that is strung with cord to strike a hollow rubber ball covered with felt over or around a net and into the opponent\'s court. The object of the game is to play the ball in such a way that the opponent is not able to play a valid return. The player who is unable to return the ball will not gain a point, while the opposite player will.', 7, 37, NULL);
/*!40000 ALTER TABLE `questions` ENABLE KEYS */;

-- Dumping structure for table enywas.questions_tags
DROP TABLE IF EXISTS `questions_tags`;
CREATE TABLE IF NOT EXISTS `questions_tags` (
  `question_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL,
  PRIMARY KEY (`question_id`,`tag_id`),
  KEY `FK__tags` (`tag_id`),
  CONSTRAINT `FK__tags` FOREIGN KEY (`tag_id`) REFERENCES `tags` (`id`),
  CONSTRAINT `FK_questions_tags_questions` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table enywas.questions_tags: ~20 rows (approximately)
/*!40000 ALTER TABLE `questions_tags` DISABLE KEYS */;
INSERT INTO `questions_tags` (`question_id`, `tag_id`) VALUES
	(22, 27),
	(22, 28),
	(23, 29),
	(23, 30),
	(24, 28),
	(24, 32),
	(25, 33),
	(26, 33),
	(27, 27),
	(27, 36),
	(28, 27),
	(28, 38),
	(29, 29),
	(30, 27),
	(30, 28),
	(30, 38),
	(31, 43),
	(31, 44),
	(32, 43),
	(32, 52);
/*!40000 ALTER TABLE `questions_tags` ENABLE KEYS */;

-- Dumping structure for table enywas.tags
DROP TABLE IF EXISTS `tags`;
CREATE TABLE IF NOT EXISTS `tags` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=58 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table enywas.tags: ~13 rows (approximately)
/*!40000 ALTER TABLE `tags` DISABLE KEYS */;
INSERT INTO `tags` (`id`, `name`) VALUES
	(44, 'fitness'),
	(30, 'fun'),
	(32, 'help'),
	(38, 'java'),
	(36, 'javascript'),
	(27, 'programming'),
	(43, 'sports'),
	(52, 'tennis'),
	(33, 'test'),
	(55, 'testt'),
	(57, 'testtt'),
	(29, 'vacation'),
	(28, 'work');
/*!40000 ALTER TABLE `tags` ENABLE KEYS */;

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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- Dumping data for table enywas.users: ~9 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
	(1, 'testUser', 'testuser@mail.com', '123'),
	(2, 'asd', 'asd@mail.com', '$2y$10$zzqtZ40//w9sFkcu9EsA8uz7eDEFizaYtE.vFJk/ZSy3brZI.JYdC'),
	(3, 'Ivan', 'ivan@mail.com', '$2y$10$UXfu0RPKX5Q8quk.M2Em8eaqVViXDHevomwhRC2kQV6ss7MlhA2tu'),
	(4, 'Kolio', 'kolio@abv.bg', '$2y$10$PaS3EF2ez7CoO594ywcKjusr6u4lVG11aOWQkDjZbzoeb6qNHp/Wu'),
	(5, 'Stens', 'Stens@abv.bg', '$2y$10$JYGagMj21CKpRxpsvfZae.gvHZyvK4dZ1K.OinQFnvkxXhwB68/9S'),
	(6, 'zotakk', 'zotak3105@gmail.com', '$2y$10$1bxcBv7TKKM2OtUL4FMWUOqxhOkkqrVL4zIpNA1QkBxye1.dBRGZy'),
	(7, 'Regi', 'regi@mail.com', '$2y$10$EWlxgvHALN8ohIWwgmUC4OcZm3FuVewGSnP8KI4kcw1aVoG2yXk1y'),
	(8, 'SimSim', 'phpMaster@pro.bg', '$2y$10$Xh6nF/VVdyKsIE8Y9MR4n.liNKS9VNbQTmLj3stzQfAITlASz.hg.'),
	(9, 'adminin', 'adminin@gmail.com', '$2y$10$QD7UUJiKCM8R0zKECkxHIOxpipJmXNOZs2lFsYc7.4I6F4dSA9ZJm');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
