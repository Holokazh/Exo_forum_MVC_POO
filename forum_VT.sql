-- --------------------------------------------------------
-- Host:                         localhost
-- Server version:               5.7.24 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             10.2.0.5599
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Dumping database structure for exercice_forum_vt
CREATE DATABASE IF NOT EXISTS `exercice_forum_vt` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `exercice_forum_vt`;

-- Dumping structure for table exercice_forum_vt.categorie
CREATE TABLE IF NOT EXISTS `categorie` (
  `id_categorie` int(11) NOT NULL AUTO_INCREMENT,
  `nomCategorie` varchar(50) NOT NULL,
  PRIMARY KEY (`id_categorie`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table exercice_forum_vt.categorie: ~4 rows (approximately)
/*!40000 ALTER TABLE `categorie` DISABLE KEYS */;
INSERT INTO `categorie` (`id_categorie`, `nomCategorie`) VALUES
	(1, 'Classes'),
	(2, 'Sorts'),
	(3, 'Equipements'),
	(4, 'Bestiaire'),
	(5, 'Donjons');
/*!40000 ALTER TABLE `categorie` ENABLE KEYS */;

-- Dumping structure for table exercice_forum_vt.message
CREATE TABLE IF NOT EXISTS `message` (
  `id_message` int(11) NOT NULL AUTO_INCREMENT,
  `textMessage` text NOT NULL,
  `dateCreationMessage` datetime NOT NULL,
  `utilisateur_id` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL,
  PRIMARY KEY (`id_message`),
  KEY `MESSAGE_UTILISATEUR_FK` (`utilisateur_id`),
  KEY `MESSAGE_TOPIC0_FK` (`topic_id`),
  CONSTRAINT `MESSAGE_TOPIC0_FK` FOREIGN KEY (`topic_id`) REFERENCES `topic` (`id_topic`),
  CONSTRAINT `MESSAGE_UTILISATEUR_FK` FOREIGN KEY (`utilisateur_id`) REFERENCES `utilisateur` (`id_utilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

-- Dumping data for table exercice_forum_vt.message: ~26 rows (approximately)
/*!40000 ALTER TABLE `message` DISABLE KEYS */;
INSERT INTO `message` (`id_message`, `textMessage`, `dateCreationMessage`, `utilisateur_id`, `topic_id`) VALUES
	(1, 'bcp tro abusé lol', '2020-10-12 09:50:16', 2, 1),
	(2, 'Grooooos j\'en suis à 2964 j\'ai toujours pas réussis !', '2020-10-12 09:55:08', 4, 4),
	(3, 'Bande de cucks', '2020-10-12 09:55:21', 5, 4),
	(4, 'Bah depuis le nerf c\'est pas ouf quoi', '2020-10-16 11:05:19', 2, 2),
	(5, 'Caillouuuuuu c\'est devenu trop nul', '2020-10-16 11:05:41', 3, 2),
	(6, 'Honnêtement j\'pense que c\'est panda ou feca', '2020-10-16 11:06:58', 1, 3),
	(7, 'Okay merci', '2020-10-16 11:07:29', 2, 3),
	(8, 'je c pa je kroi enu il en a un', '2020-10-16 11:09:26', 4, 5),
	(9, 'Mais devin arrête de faire l\'idiot du village xD', '2020-10-16 11:09:41', 1, 5),
	(10, 'euuuh moi j\'ai vu sur internet un stuff de fou avec bistouille', '2020-10-16 11:10:45', 5, 6),
	(11, 'Non Virgile, crois pas pranack il a dépensé 20m dans le vent pour un stuff eau qu\'il a trouvé sur internet et il fait 0 dégats xDD', '2020-10-16 11:11:06', 4, 6),
	(12, 'ah ok merci devin xD du coup t\'en penses quoi ?', '2020-10-16 11:12:00', 1, 6),
	(15, 'Tiens : https://www.youtube.com/watch?v=YgAGgQ22I04', '2020-10-16 11:13:30', 1, 8),
	(16, 'Cimer frerooooot', '2020-10-16 11:16:47', 4, 8),
	(17, 'Non c\'est devenu pourri', '2020-10-16 11:17:14', 4, 9),
	(18, 'Je confirme je suis en bad mood depuis...', '2020-10-16 11:17:30', 5, 9),
	(19, 'j\'suis chaud', '2020-10-16 11:18:04', 1, 10),
	(20, 'ouaip moi', '2020-10-16 11:18:20', 2, 10),
	(21, 'grave moi aussi', '2020-10-16 11:18:32', 4, 10),
	(22, 'moi aussi, on se fait un groupe discord ?', '2020-10-16 11:18:47', 13, 10),
	(23, 'chaud', '2020-10-16 11:19:18', 12, 10),
	(24, 'cailouuuuuu', '2020-10-16 11:19:27', 3, 10),
	(25, 'tgtg', '2020-10-16 11:19:55', 1, 11),
	(26, 'tgtg', '2020-10-16 11:20:03', 12, 11),
	(27, 'tgtg', '2020-10-16 11:20:17', 5, 11),
	(28, 'haha', '2020-10-31 20:42:17', 4, 12),
	(29, 'hihi', '2020-10-31 20:42:29', 3, 12);
/*!40000 ALTER TABLE `message` ENABLE KEYS */;

-- Dumping structure for table exercice_forum_vt.topic
CREATE TABLE IF NOT EXISTS `topic` (
  `id_topic` int(11) NOT NULL AUTO_INCREMENT,
  `titreTopic` varchar(50) NOT NULL,
  `dateCreationTopic` datetime NOT NULL,
  `textTopic` text NOT NULL,
  `statut` tinyint(1) NOT NULL DEFAULT '1',
  `utilisateur_id` int(11) NOT NULL,
  `categorie_id` int(11) NOT NULL,
  PRIMARY KEY (`id_topic`),
  KEY `TOPIC_UTILISATEUR_FK` (`utilisateur_id`),
  KEY `TOPIC_CATEGORIE0_FK` (`categorie_id`),
  CONSTRAINT `TOPIC_CATEGORIE0_FK` FOREIGN KEY (`categorie_id`) REFERENCES `categorie` (`id_categorie`),
  CONSTRAINT `TOPIC_UTILISATEUR_FK` FOREIGN KEY (`utilisateur_id`) REFERENCES `utilisateur` (`id_utilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

-- Dumping data for table exercice_forum_vt.topic: ~11 rows (approximately)
/*!40000 ALTER TABLE `topic` DISABLE KEYS */;
INSERT INTO `topic` (`id_topic`, `titreTopic`, `dateCreationTopic`, `textTopic`, `statut`, `utilisateur_id`, `categorie_id`) VALUES
	(1, 'Les sacrieurs sont trop cheatés', '2020-10-12 09:46:14', 'Hello tout l\'monde vous trouvez pas que les sacri sont cheat avec leur nouveau sort de vol de vie', 1, 3, 1),
	(2, 'Vous pensez quoi du iop eau ?', '2020-10-12 09:47:35', 'Bonjour ! J\'aimerais reroll en iop eau, je suis level 200 vous en pensez quoi ?', 1, 13, 1),
	(3, 'Meilleur classe tank ?', '2020-10-12 09:48:36', 'c koi la meilleur classe tank ? lol', 1, 2, 1),
	(4, 'Combien d\'essais pour arriver à exo PM le gelano ?', '2020-10-12 09:49:12', 'Bonjour bonjour ! C\'est encore moi, vous avez fait combien d\'essais maxi pour passer le pm ?', 1, 1, 3),
	(5, 'Les sorts de désenvoutement', '2020-10-16 10:55:00', 'Salut les dofusiens, je voulais savoir quelles sont les classes qui possèdent un ou des sorts de désenvoutement', 1, 12, 2),
	(6, 'Bistouille ou pandatak ?', '2020-10-16 10:56:19', 'Bonsoiiiiiiiiiir ! Pour un panda tank, c\'est quoi le meilleur sort ?', 1, 1, 2),
	(8, 'Le lord du comte harebourg', '2020-10-16 10:59:12', 'Y a moyen d\'avoir le lord du comte harbourg ?', 1, 4, 4),
	(9, 'PL Korri nerf ?', '2020-10-16 10:59:49', 'Bonsouaaar ! On peut plus rush korri ?', 1, 1, 4),
	(10, 'ça tente qui le kralamour géant à 21h ajd ?', '2020-10-16 11:00:30', 'Wesh les cucks, ça tente du monde le krala géant ce soir ?', 1, 5, 5),
	(11, 'ki ve fér le dj inkarnam avk mwa ?', '2020-10-16 11:02:59', 'alor ki ve ? ki ve ?', 1, 4, 5),
	(12, 'test à supprimer', '2020-10-30 14:11:37', 'Test à supprimer', 1, 12, 1),
	(17, 'On fait un topic test', '2020-11-04 11:35:00', 'testeuh', 1, 16, 2);
/*!40000 ALTER TABLE `topic` ENABLE KEYS */;

-- Dumping structure for table exercice_forum_vt.utilisateur
CREATE TABLE IF NOT EXISTS `utilisateur` (
  `id_utilisateur` int(11) NOT NULL AUTO_INCREMENT,
  `pseudonyme` varchar(18) NOT NULL,
  `motDePasse` varchar(255) NOT NULL,
  `emailUtilisateur` varchar(255) NOT NULL,
  `imgUtilisateur` varchar(255) DEFAULT NULL,
  `roleUtilisateur` varchar(1) DEFAULT NULL,
  `dateCreationUtilisateur` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_utilisateur`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

-- Dumping data for table exercice_forum_vt.utilisateur: ~7 rows (approximately)
/*!40000 ALTER TABLE `utilisateur` DISABLE KEYS */;
INSERT INTO `utilisateur` (`id_utilisateur`, `pseudonyme`, `motDePasse`, `emailUtilisateur`, `imgUtilisateur`, `roleUtilisateur`, `dateCreationUtilisateur`) VALUES
	(1, 'Virgile', 'test', 'virgile.tomadon@orange.fr', 'img', NULL, '2020-10-11 00:00:00'),
	(2, 'Iann', 'test', 'iann.bensaada@gmail.com', 'img', NULL, '2020-10-12 00:00:00'),
	(3, 'Pierre', 'test', 'vergeture@gmail.com', 'img', NULL, '2020-10-12 00:00:00'),
	(4, 'Kévin', 'test', 'kevin.tomadon@orange.fr', 'img', NULL, '2020-10-12 00:00:00'),
	(5, 'Pranack', 'test', 'pranack.richart@orange.fr', 'img', NULL, '2020-10-12 00:00:00'),
	(12, 'Kyle', 'test', 'kyle.tomadon@orange.fr', 'img', NULL, '2020-10-12 00:00:00'),
	(13, 'Alex', 'text', 'alexandre.erhardt68@gmail.com', 'img', NULL, '2020-10-12 00:00:00'),
	(15, 'Holokazh', '$2y$10$9jSQQQxLKN5fAzH/er2iMucFFBHkRGi8vBcq4hca4BTLuGGhKe8QK', 'holokazh@hotmail.fr', NULL, NULL, '2020-10-28 09:10:38'),
	(16, 'Levih', '$2y$10$uaYDg879Rku.lTlp6teVeew5UIB21LU7s/jnTPvDEde1cQHusJ0Ru', 'levih.yt@gmail.com', NULL, NULL, '2020-11-03 10:53:22');
/*!40000 ALTER TABLE `utilisateur` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
