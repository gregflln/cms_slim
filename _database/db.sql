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

-- Listage de la structure de la table db. axe_travail
CREATE TABLE IF NOT EXISTS `axe_travail` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `axe_travail` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Listage des données de la table db.axe_travail : ~6 rows (environ)
/*!40000 ALTER TABLE `axe_travail` DISABLE KEYS */;
INSERT INTO `axe_travail` (`id`, `axe_travail`) VALUES
	(1, 'accompagnement social/administraif'),
	(2, 'accompagnement professionnel'),
	(3, 'soutient psychologique'),
	(4, 'Groupe "Histoire et image"'),
	(5, 'Atelier art thérapie'),
	(6, 'Module AEDS');
/*!40000 ALTER TABLE `axe_travail` ENABLE KEYS */;

-- Listage de la structure de la table db. beneficiaires
CREATE TABLE IF NOT EXISTS `beneficiaires` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `date_creation` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `id_ss` varchar(50) NOT NULL,
  `id_rsa` varchar(50) NOT NULL,
  `id_mdd` varchar(50) NOT NULL,
  `id_pe` varchar(50) NOT NULL,
  `date_naissance` date NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `code_postal` varchar(50) NOT NULL,
  `ville` varchar(50) NOT NULL,
  `telephone` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `age` tinyint(4) NOT NULL,
  `date_inscription` date NOT NULL,
  `situation_familiale` int(11) unsigned NOT NULL,
  `nombre_enfant` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `orientation` int(11) unsigned NOT NULL,
  `partenaires` int(11) unsigned NOT NULL,
  `type_logement` int(11) unsigned NOT NULL,
  `secteur` int(11) unsigned NOT NULL,
  `situation_ressources` int(10) unsigned NOT NULL,
  `rsa` int(11) NOT NULL,
  `service_instructeur_referent` varchar(50) NOT NULL,
  `etranger` bit(1) NOT NULL DEFAULT b'0',
  `sante` int(11) unsigned NOT NULL,
  `niveau_etude` int(11) unsigned NOT NULL,
  `situation_professionnelle` int(11) unsigned NOT NULL,
  `axe_travail` int(11) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_beneficiaires_situation_familiale` (`situation_familiale`),
  KEY `FK_beneficiaires_orientation` (`orientation`),
  KEY `FK_beneficiaires_partenaires` (`partenaires`),
  KEY `FK_beneficiaires_type_logement` (`type_logement`),
  KEY `FK_beneficiaires_secteur` (`secteur`),
  KEY `FK_beneficiaires_situation_ressources` (`situation_ressources`),
  KEY `FK_beneficiaires_sante` (`sante`),
  KEY `FK_beneficiaires_niveau_etude` (`niveau_etude`),
  KEY `FK_beneficiaires_situation_professionnelle` (`situation_professionnelle`),
  KEY `FK_beneficiaires_axe_travail` (`axe_travail`),
  CONSTRAINT `FK_beneficiaires_axe_travail` FOREIGN KEY (`axe_travail`) REFERENCES `axe_travail` (`id`),
  CONSTRAINT `FK_beneficiaires_niveau_etude` FOREIGN KEY (`niveau_etude`) REFERENCES `niveau_etude` (`id`),
  CONSTRAINT `FK_beneficiaires_orientation` FOREIGN KEY (`orientation`) REFERENCES `orientation` (`id`),
  CONSTRAINT `FK_beneficiaires_partenaires` FOREIGN KEY (`partenaires`) REFERENCES `partenaires` (`id`),
  CONSTRAINT `FK_beneficiaires_sante` FOREIGN KEY (`sante`) REFERENCES `sante` (`id`),
  CONSTRAINT `FK_beneficiaires_secteur` FOREIGN KEY (`secteur`) REFERENCES `secteur` (`id`),
  CONSTRAINT `FK_beneficiaires_situation_familiale` FOREIGN KEY (`situation_familiale`) REFERENCES `situation_familiale` (`id`),
  CONSTRAINT `FK_beneficiaires_situation_professionnelle` FOREIGN KEY (`situation_professionnelle`) REFERENCES `situation_professionnelle` (`id`),
  CONSTRAINT `FK_beneficiaires_situation_ressources` FOREIGN KEY (`situation_ressources`) REFERENCES `situation_ressources` (`id`),
  CONSTRAINT `FK_beneficiaires_type_logement` FOREIGN KEY (`type_logement`) REFERENCES `type_logement` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1 COMMENT='table des beneficiaire, element central';

-- Listage des données de la table db.beneficiaires : ~1 rows (environ)
/*!40000 ALTER TABLE `beneficiaires` DISABLE KEYS */;
INSERT INTO `beneficiaires` (`id`, `nom`, `prenom`, `date_creation`, `id_ss`, `id_rsa`, `id_mdd`, `id_pe`, `date_naissance`, `adresse`, `code_postal`, `ville`, `telephone`, `email`, `age`, `date_inscription`, `situation_familiale`, `nombre_enfant`, `orientation`, `partenaires`, `type_logement`, `secteur`, `situation_ressources`, `rsa`, `service_instructeur_referent`, `etranger`, `sante`, `niveau_etude`, `situation_professionnelle`, `axe_travail`) VALUES
	(4, 'greg', 'fillion', '2022-09-29 15:19:48', '45er poz', '456', 'orleans', 'xwcxwx', '2022-09-02', 'wxc', 'xwc', 'xwc', 'xwcwcx', 'wxc@gmail.com', 0, '2022-09-21', 1, 21, 1, 1, 1, 1, 1, 0, '1', b'0', 1, 1, 1, 1),
	(5, 'greg', 'greg', '2022-10-01 14:46:28', 'ozkmzfe', '45000', 'rerg', 'fdgdfg', '2022-09-15', 'dfg', '4500', 'dfg', '0645045065', 'filliongregoire@gmail.com', 0, '2022-09-09', 2, 21, 1, 1, 1, 1, 1, 0, '453543513', b'0', 1, 1, 2, 1);
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

-- Listage de la structure de la table db. orientation
CREATE TABLE IF NOT EXISTS `orientation` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `orientation` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Listage des données de la table db.orientation : ~2 rows (environ)
/*!40000 ALTER TABLE `orientation` DISABLE KEYS */;
INSERT INTO `orientation` (`id`, `orientation`) VALUES
	(1, 'spontanée'),
	(2, 'partenaires');
/*!40000 ALTER TABLE `orientation` ENABLE KEYS */;

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

-- Listage de la structure de la table db. sante
CREATE TABLE IF NOT EXISTS `sante` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `sante` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Listage des données de la table db.sante : ~3 rows (environ)
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

-- Listage de la structure de la table db. situation_familiale
CREATE TABLE IF NOT EXISTS `situation_familiale` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `situation_familiale` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Listage des données de la table db.situation_familiale : ~2 rows (environ)
/*!40000 ALTER TABLE `situation_familiale` DISABLE KEYS */;
INSERT INTO `situation_familiale` (`id`, `situation_familiale`) VALUES
	(1, 'en couple'),
	(2, 'célibataire');
/*!40000 ALTER TABLE `situation_familiale` ENABLE KEYS */;

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

-- Listage de la structure de la table db. situation_ressources
CREATE TABLE IF NOT EXISTS `situation_ressources` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `situation_ressources` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Listage des données de la table db.situation_ressources : ~6 rows (environ)
/*!40000 ALTER TABLE `situation_ressources` DISABLE KEYS */;
INSERT INTO `situation_ressources` (`id`, `situation_ressources`) VALUES
	(1, 'RSA'),
	(2, 'Pension invaliditié'),
	(3, 'pole emploi'),
	(4, 'ATA'),
	(5, 'IIJ'),
	(6, 'AAH');
/*!40000 ALTER TABLE `situation_ressources` ENABLE KEYS */;

-- Listage de la structure de la table db. type_logement
CREATE TABLE IF NOT EXISTS `type_logement` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `type_logement` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Listage des données de la table db.type_logement : ~4 rows (environ)
/*!40000 ALTER TABLE `type_logement` DISABLE KEYS */;
INSERT INTO `type_logement` (`id`, `type_logement`) VALUES
	(1, 'bailleur public'),
	(2, 'privé'),
	(3, 'hebergé'),
	(4, 'autres');
/*!40000 ALTER TABLE `type_logement` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
