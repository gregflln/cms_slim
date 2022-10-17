-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           5.7.33 - MySQL Community Server (GPL)
-- SE du serveur:                Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Listage de la structure de la base pour db
CREATE DATABASE IF NOT EXISTS `db` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `db`;

-- Listage de la structure de la table db. beneficiaires
CREATE TABLE IF NOT EXISTS `beneficiaires` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `date_creation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_naissance` date NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `code_postal` varchar(50) NOT NULL,
  `ville` varchar(50) NOT NULL,
  `telephone` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `age` tinyint(4) NOT NULL,
  `date_inscription` date NOT NULL,
  `nombre_enfant` tinyint(3) unsigned NOT NULL,
  `partenaires` int(11) unsigned NOT NULL,
  `secteur` int(11) unsigned NOT NULL,
  `sante` int(11) unsigned NOT NULL,
  `niveau_etude` int(11) unsigned NOT NULL,
  `situation_professionnelle` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_beneficiaires_partenaires` (`partenaires`),
  KEY `FK_beneficiaires_secteur` (`secteur`),
  KEY `FK_beneficiaires_sante` (`sante`),
  KEY `FK_beneficiaires_niveau_etude` (`niveau_etude`),
  KEY `FK_beneficiaires_situation_professionnelle` (`situation_professionnelle`),
  CONSTRAINT `FK_beneficiaires_niveau_etude` FOREIGN KEY (`niveau_etude`) REFERENCES `niveau_etude` (`id`),
  CONSTRAINT `FK_beneficiaires_partenaires` FOREIGN KEY (`partenaires`) REFERENCES `partenaires` (`id`),
  CONSTRAINT `FK_beneficiaires_sante` FOREIGN KEY (`sante`) REFERENCES `sante` (`id`),
  CONSTRAINT `FK_beneficiaires_secteur` FOREIGN KEY (`secteur`) REFERENCES `secteur` (`id`),
  CONSTRAINT `FK_beneficiaires_situation_professionnelle` FOREIGN KEY (`situation_professionnelle`) REFERENCES `situation_professionnelle` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1 COMMENT='table des beneficiaire, element central';

-- Listage des données de la table db.beneficiaires : ~3 rows (environ)
/*!40000 ALTER TABLE `beneficiaires` DISABLE KEYS */;
INSERT INTO `beneficiaires` (`id`, `nom`, `prenom`, `date_creation`, `date_naissance`, `adresse`, `code_postal`, `ville`, `telephone`, `email`, `age`, `date_inscription`, `nombre_enfant`, `partenaires`, `secteur`, `sante`, `niveau_etude`, `situation_professionnelle`) VALUES
	(4, 'greg', 'fillion', '2022-09-29 15:19:48', '2022-09-02', 'wxc', 'xwc', 'xwc', 'xwcwcx', 'wxc@gmail.com', 0, '2022-09-21', 21, 1, 4, 1, 1, 1),
	(5, 'greg', 'greg', '2022-10-01 14:46:28', '2022-09-15', 'dfg', '4500', 'dfg', '0645045065', 'filliongregoire@gmail.com', 0, '2022-09-09', 21, 1, 1, 1, 1, 2),
	(6, 'Greg', 'Lol', '2022-10-15 20:49:25', '2022-09-29', '42 rue du poirier', '45000', 'Orleans', '0783414574', 'filnls@gmail.com', 0, '2022-10-12', 2, 1, 1, 3, 5, 1);
/*!40000 ALTER TABLE `beneficiaires` ENABLE KEYS */;

-- Listage de la structure de la table db. niveau_etude
CREATE TABLE IF NOT EXISTS `niveau_etude` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `niveau_etude` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Listage des données de la table db.niveau_etude : ~7 rows (environ)
/*!40000 ALTER TABLE `niveau_etude` DISABLE KEYS */;
INSERT INTO `niveau_etude` (`id`, `niveau_etude`) VALUES
	(1, 'non scolarisé'),
	(2, 'VI'),
	(3, 'V'),
	(4, 'IV'),
	(5, 'III'),
	(6, 'II'),
	(7, 'I');
/*!40000 ALTER TABLE `niveau_etude` ENABLE KEYS */;

-- Listage de la structure de la table db. partenaires
CREATE TABLE IF NOT EXISTS `partenaires` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `partenaires` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Listage des données de la table db.partenaires : ~4 rows (environ)
/*!40000 ALTER TABLE `partenaires` DISABLE KEYS */;
INSERT INTO `partenaires` (`id`, `partenaires`) VALUES
	(1, 'CAF'),
	(2, 'Region'),
	(3, 'Secu'),
	(4, 'MDPH');
/*!40000 ALTER TABLE `partenaires` ENABLE KEYS */;

-- Listage de la structure de la table db. rendezvous
CREATE TABLE IF NOT EXISTS `rendezvous` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `beneficiaire` int(11) NOT NULL,
  `date` date NOT NULL,
  `motif` varchar(50) NOT NULL,
  `duree` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

-- Listage des données de la table db.rendezvous : ~22 rows (environ)
/*!40000 ALTER TABLE `rendezvous` DISABLE KEYS */;
INSERT INTO `rendezvous` (`id`, `beneficiaire`, `date`, `motif`, `duree`) VALUES
	(1, 4, '2022-10-19', 'logement', 125),
	(2, 4, '2022-10-21', 'leihrgegr', 123),
	(3, 4, '2022-10-14', 'logement', 123),
	(4, 4, '2022-10-07', 'logement', 123),
	(5, 4, '2022-10-20', 'logement', 123),
	(6, 4, '2022-10-07', 'logement', 45),
	(7, 4, '2022-10-10', 'machin', 120),
	(8, 4, '2022-10-10', 'machin', 120),
	(9, 4, '2022-10-10', 'machin', 120),
	(10, 4, '2022-10-10', 'machin', 120),
	(11, 4, '2022-10-10', 'machin', 120),
	(12, 4, '2022-10-10', 'machin', 120),
	(13, 4, '2022-10-10', 'machin', 120),
	(14, 4, '2022-10-10', 'machin', 120),
	(15, 4, '2022-10-10', 'machin', 120),
	(16, 4, '2022-10-10', 'machin', 120),
	(17, 4, '2022-10-16', 'rdb', 1),
	(18, 4, '2022-10-16', 'rdb', 1),
	(19, 4, '2022-10-07', 'rdv time type', 1),
	(20, 4, '2022-10-14', 'rdv ttt', 1),
	(21, 4, '2022-10-07', 'motif lolptdr', 0),
	(22, 4, '2022-10-07', '60min', 60);
/*!40000 ALTER TABLE `rendezvous` ENABLE KEYS */;

-- Listage de la structure de la table db. sante
CREATE TABLE IF NOT EXISTS `sante` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `sante` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Listage des données de la table db.sante : ~2 rows (environ)
/*!40000 ALTER TABLE `sante` DISABLE KEYS */;
INSERT INTO `sante` (`id`, `sante`) VALUES
	(1, 'suivi généraliste'),
	(2, 'suivi spécialiste'),
	(3, 'suivi psy CMP / Libéral');
/*!40000 ALTER TABLE `sante` ENABLE KEYS */;

-- Listage de la structure de la table db. secteur
CREATE TABLE IF NOT EXISTS `secteur` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `secteur` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Listage des données de la table db.secteur : ~4 rows (environ)
/*!40000 ALTER TABLE `secteur` DISABLE KEYS */;
INSERT INTO `secteur` (`id`, `secteur`) VALUES
	(1, 'La Source'),
	(2, 'Orleans'),
	(3, 'Agglo'),
	(4, 'Hors Agglo');
/*!40000 ALTER TABLE `secteur` ENABLE KEYS */;

-- Listage de la structure de la table db. situation_professionnelle
CREATE TABLE IF NOT EXISTS `situation_professionnelle` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `situation_professionnelle` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Listage des données de la table db.situation_professionnelle : ~4 rows (environ)
/*!40000 ALTER TABLE `situation_professionnelle` DISABLE KEYS */;
INSERT INTO `situation_professionnelle` (`id`, `situation_professionnelle`) VALUES
	(1, 'CDI'),
	(2, 'CDD / Intérim / alternance'),
	(3, 'Contrat aidée'),
	(4, 'Stage'),
	(5, 'Travailleur handicapée');
/*!40000 ALTER TABLE `situation_professionnelle` ENABLE KEYS */;

-- Listage de la structure de la table db. users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  `password` varchar(64) NOT NULL,
  `admin` tinyint(3) unsigned DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Listage des données de la table db.users : ~1 rows (environ)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `email`, `password`, `admin`) VALUES
	(1, 'filliongregoire@gmail.com', '8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92', 1);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Listage de la structure de la table db. visites
CREATE TABLE IF NOT EXISTS `visites` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `motif` varchar(50) NOT NULL,
  `duree` int(11) NOT NULL,
  `beneficiaire` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `beneficiaire` (`beneficiaire`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Listage des données de la table db.visites : ~2 rows (environ)
/*!40000 ALTER TABLE `visites` DISABLE KEYS */;
INSERT INTO `visites` (`id`, `date`, `motif`, `duree`, `beneficiaire`) VALUES
	(1, '2022-10-20', 'test', 123, 4),
	(2, '2022-10-20', 'test', 123, 4),
	(3, '2022-10-07', 'logement', 120, 4);
/*!40000 ALTER TABLE `visites` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
