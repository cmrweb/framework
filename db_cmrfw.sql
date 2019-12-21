-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le :  sam. 05 oct. 2019 à 12:11
-- Version du serveur :  5.7.26
-- Version de PHP :  7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `db_cmrfw`
--

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `owner` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `chat`
--

DROP TABLE IF EXISTS `chat`;
CREATE TABLE IF NOT EXISTS `chat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `date` datetime NOT NULL DEFAULT '2019-10-03 00:00:00',
  `sendby` int(11) NOT NULL,
  `sendto` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=74 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `cmr_code`
--

DROP TABLE IF EXISTS `cmr_code`;
CREATE TABLE IF NOT EXISTS `cmr_code` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category_id` int(11) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `demo` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `cmr_code`
--

INSERT INTO `cmr_code` (`id`, `category_id`, `titre`, `code`, `demo`) VALUES
(1, 1, 'Balise', 'code(string $tag ,string $content ,?string $class ,?string $id )', 'echo $html->code(\'section\',\'ceci est une section\',\'large dark center\');\r\necho $html->code(\'section\',$html->code(\'p\',\'paragraphe\'),\'medium primary center\');'),
(2, 1, 'Titre', 'h(int $num ,string $content )', 'echo $html->h( 2 ,\'ceci est un titre h2\' );\r\necho  $html->h( 3 ,\'ceci est un titre h3\' );'),
(3, 1, 'Paragraphe', 'p( string $content )', 'echo $html->p(\'ceci est un paragraphe\');'),
(4, 1, 'lien', 'a( string $link , string $content );', 'echo $html->a(\'#\',\'ceci est un lien\');'),
(5, 1, 'Menu', 'menu( [\'content\' => \'link\'] , ?string $class , ?string $id )', 'echo $html->menu( [\'menu 1\' => \'#\']);\r\necho $html->code(\'nav\',\r\n$html->menu( [\r\n\'menu 1\' => \'#\',\r\n\"menu 2</a>\". $html->menu( [\'sous-menu\' => \'#\']) => \'#\' ]),\'nav navrad\');'),
(6, 1, 'Image', 'img ( string $source , ?string $alt, ?string $class )', 'echo$html->img(ROOT_DIR.IMG_DIR.\'tykrastalion.png\',\'text alternatif\',\'small center\');'),
(7, 2, 'formulaire', 'formOpen( string $action , string $method , ?string $class )\r\nformClose() ', 'echo $html->formOpen(\'\',\'post\').\r\n$html->input(\'text\',\'text\',\'text\').\r\n$html->formClose();'),
(8, 2, 'Input', 'input( string $type , string $name/$id , string $label , ?string $class , ?string $placeholder, ?string $value )', 'echo $html->input(\'text\',\'user\',\'Name\',\'small\',\'username\').\r\n$html->input(\'number\',\'age\',\'Age\',\'small\');'),
(9, 2, 'Bouton', 'button( string $type , string $class-color , ?string $label , ?string $name , ?string $id )', 'echo $html->button(\'submit\',\'primary\',\'send\');'),
(10, 2, 'Checkbox', 'checkbox( string $value , string $content , ?string $name , ?string $id )', 'echo $html->checkbox(\'1\',\'1\',\'opt\').\r\n$html->checkbox(\'2\',\'2\',\'opt\');'),
(11, 2, 'Option', 'option( string $value , string $content , ?string $name , ?string $id )', 'echo $html->option(\'1\',\'1\',\'opt\').\r\n$html->option(\'2\',\'2\',\'opt\');'),
(12, 2, 'Select', 'select( [ \'key\' => \'content\'] , ?string $label , ?string $name , ?string $id )', 'echo $html->select( [\r\n\'1\' => \'choix 1\',\r\n\'2\' => \'choix 2\'\r\n]);');

-- --------------------------------------------------------

--
-- Structure de la table `cmr_code_category`
--

DROP TABLE IF EXISTS `cmr_code_category`;
CREATE TABLE IF NOT EXISTS `cmr_code_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `cmr_code_category`
--

INSERT INTO `cmr_code_category` (`id`, `name`) VALUES
(1, 'HTML'),
(2, 'FORM'),
(3, 'CSS'),
(4, 'DB');

-- --------------------------------------------------------

--
-- Structure de la table `cmr_follow`
--

DROP TABLE IF EXISTS `cmr_follow`;
CREATE TABLE IF NOT EXISTS `cmr_follow` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `follow_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `cmr_hashtag`
--

DROP TABLE IF EXISTS `cmr_hashtag`;
CREATE TABLE IF NOT EXISTS `cmr_hashtag` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `tag` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `cmr_user`
--

DROP TABLE IF EXISTS `cmr_user`;
CREATE TABLE IF NOT EXISTS `cmr_user` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `admin_lvl` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `post`
--

DROP TABLE IF EXISTS `post`;
CREATE TABLE IF NOT EXISTS `post` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `post` text,
  `img` varchar(50) DEFAULT NULL,
  `category` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `post`
--

INSERT INTO `post` (`id`, `parent_id`, `user_id`, `title`, `post`, `img`, `category`) VALUES
(9, NULL, 2, 'ad', 'adad', NULL, NULL),
(10, NULL, 2, 'banner', 'jsbrjs', '71873a51ba.jpg', NULL),
(5, NULL, 2, 'scsc', 'test 33', '80fc8bbbfe.jpg', NULL),
(6, NULL, 1, 'plus', 'test', '6eddb6b141.png', NULL),
(11, NULL, 2, 'test', 'test', 'be2e858ffa.jpg', NULL),
(8, NULL, 1, 'cmrweb logo', 'ceci est le nouveau logo cmrweb', '7976c121cf.png', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

DROP TABLE IF EXISTS `produit`;
CREATE TABLE IF NOT EXISTS `produit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `description` text,
  `livraison` varchar(255) DEFAULT NULL,
  `category` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
