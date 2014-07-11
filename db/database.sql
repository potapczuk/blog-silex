
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Copiando estrutura do banco de dados para blog
CREATE DATABASE IF NOT EXISTS `blog` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_bin */;
USE `blog`;


-- Copiando estrutura para tabela blog.post
CREATE TABLE IF NOT EXISTS `post` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(250) COLLATE utf8_bin DEFAULT NULL,
  `content` mediumtext COLLATE utf8_bin,
  `created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `year` int(11) DEFAULT NULL,
  `month` int(11) DEFAULT NULL,
  `day` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- Copiando dados para a tabela blog.post: 0 rows
/*!40000 ALTER TABLE `post` DISABLE KEYS */;
INSERT INTO `post` (`id`, `title`, `content`, `created`, `year`, `month`, `day`) VALUES
	(1, 'First post', 'content of the first post content of the first post content of the first post content of the first post content of the first post content of the first post content of the first post content of the first post content of the first post content of the first post content of the first post content of the first post content of the first post content of the first post content of the first post content of the first post content of the first post content of the first post content of the first post content of the first post content of the first post content of the first post content of the first post content of the first post content of the first post content of the first post content of the first post content of the first post content of the first post content of the first post content of the first post ', '2014-07-09 12:37:52', 2014, 7, 9),
	(2, 'Second One', 'Blah', '2014-07-10 14:38:15', 2014, 7, 10),
	(3, 'X1', NULL, '2014-06-03 15:07:53', 2014, 6, 3),
	(4, 'X2', NULL, '2013-12-01 15:08:16', 2013, 12, 1),
	(5, 'X3', NULL, '2013-11-01 15:08:24', 2013, 11, 1);
/*!40000 ALTER TABLE `post` ENABLE KEYS */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
