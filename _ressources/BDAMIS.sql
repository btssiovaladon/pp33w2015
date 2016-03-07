


CREATE DATABASE  BDAMIS;
USE BDAMIS;
# -----------------------------------------------------------------------------
#       TABLE : FONCTION
# -----------------------------------------------------------------------------

CREATE TABLE  FONCTION
 (
   NUMFONCTION INTEGER(2) NOT NULL AUTO_INCREMENT ,
   NUMAMIS SMALLINT(1) NOT NULL  ,
   NOMFONCTION CHAR(255) NULL  
   , PRIMARY KEY (NUMFONCTION) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE FONCTION
# -----------------------------------------------------------------------------


CREATE UNIQUE INDEX I_FK_FONCTION_AMIS
     ON FONCTION (NUMAMIS ASC);

# -----------------------------------------------------------------------------
#       TABLE : ACTION
# -----------------------------------------------------------------------------

CREATE TABLE  ACTION
 (
   NUMACTION INTEGER(2) NOT NULL AUTO_INCREMENT ,
   NUMAMIS SMALLINT(1) NOT NULL  ,
   NUMCOMMISSION INTEGER(2) NULL  ,
   NOMACTION CHAR(255) NULL  ,
   DATEDEBUTACTION DATE NULL  ,
   DUREEACTION INTEGER(2) NULL  ,
   FONDCOLLECTEACTION DECIMAL(13,2) NULL  
   , PRIMARY KEY (NUMACTION) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE ACTION
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_ACTION_AMIS
     ON ACTION (NUMAMIS ASC);

CREATE  INDEX I_FK_ACTION_COMMISSION
     ON ACTION (NUMCOMMISSION ASC);

# -----------------------------------------------------------------------------
#       TABLE : DINER
# -----------------------------------------------------------------------------

CREATE TABLE  DINER
 (
   NUMDINER CHAR(32) NOT NULL  ,
   DATEDINER DATE NULL  ,
   LIEUDINER CHAR(255) NULL  ,
   PRIXDINER DECIMAL(13,2) NULL  
   , PRIMARY KEY (NUMDINER) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : COMMISSION
# -----------------------------------------------------------------------------

CREATE TABLE  COMMISSION
 (
   NUMCOMMISSION INTEGER(2) NOT NULL AUTO_INCREMENT ,
   NOMCOMMISSION CHAR(255) NULL  
   , PRIMARY KEY (NUMCOMMISSION) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : AMIS
# -----------------------------------------------------------------------------

CREATE TABLE  AMIS
 (
   NUMAMIS SMALLINT(1) NOT NULL AUTO_INCREMENT ,
   NOMAMIS CHAR(255) NULL  ,
   PRENOMAMIS CHAR(255) NULL  ,
   TELEPHONEFIXEAMIS CHAR(10) NULL  ,
   TELEPHONEPORTAMIS CHAR(10) NULL  ,
   EMAILAMIS CHAR(255) NULL  ,
   NUMRUEAMIS INTEGER(2) NULL  ,
   ADRESSEAMIS CHAR(255) NULL  ,
   VILLEAMIS CHAR(255) NULL  ,
   CPAMIS CHAR(5) NULL  ,
   DATEENTREECLUBAMIS DATE NULL  
   , PRIMARY KEY (NUMAMIS) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : PARAMETRE
# -----------------------------------------------------------------------------

CREATE TABLE  PARAMETRE
 (
   NUMPARAMETRE INTEGER(2) NOT NULL AUTO_INCREMENT ,
   MONTANTCOTISATIONANNUELLE DECIMAL(13,2) NULL  
   , PRIMARY KEY (NUMPARAMETRE) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : PARTICIPER
# -----------------------------------------------------------------------------

CREATE TABLE  PARTICIPER
 (
   NUMAMIS SMALLINT(1) NOT NULL  ,
   NUMCOMMISSION INTEGER(2) NOT NULL  ,
   NUMFONCTION INTEGER(2) NOT NULL  
   , PRIMARY KEY (NUMAMIS,NUMCOMMISSION) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE PARTICIPER
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_PARTICIPER_AMIS
     ON PARTICIPER (NUMAMIS ASC);

CREATE  INDEX I_FK_PARTICIPER_COMMISSION
     ON PARTICIPER (NUMCOMMISSION ASC);

CREATE  INDEX I_FK_PARTICIPER_FONCTION
     ON PARTICIPER (NUMFONCTION ASC);

# -----------------------------------------------------------------------------
#       TABLE : PARRAINER
# -----------------------------------------------------------------------------

CREATE TABLE  PARRAINER
 (
   NUMAMIS SMALLINT(1) NOT NULL  ,
   NUMAMIS_1 SMALLINT(1) NOT NULL  ,
   NUMAMIS_2 SMALLINT(1) NOT NULL  
   , PRIMARY KEY (NUMAMIS,NUMAMIS_1,NUMAMIS_2) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE PARRAINER
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_PARRAINER_AMIS
     ON PARRAINER (NUMAMIS ASC);

CREATE  INDEX I_FK_PARRAINER_AMIS1
     ON PARRAINER (NUMAMIS_1 ASC);

CREATE  INDEX I_FK_PARRAINER_AMIS2
     ON PARRAINER (NUMAMIS_2 ASC);

# -----------------------------------------------------------------------------
#       TABLE : PARTICIPANT
# -----------------------------------------------------------------------------

CREATE TABLE  PARTICIPANT
 (
   NUMACTION INTEGER(2) NOT NULL  ,
   NUMAMIS SMALLINT(1) NOT NULL  
   , PRIMARY KEY (NUMACTION,NUMAMIS) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE PARTICIPANT
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_PARTICIPANT_ACTION
     ON PARTICIPANT (NUMACTION ASC);

CREATE  INDEX I_FK_PARTICIPANT_AMIS
     ON PARTICIPANT (NUMAMIS ASC);

# -----------------------------------------------------------------------------
#       TABLE : MANGER
# -----------------------------------------------------------------------------

CREATE TABLE  MANGER
 (
   NUMDINER CHAR(32) NOT NULL  ,
   NUMAMIS SMALLINT(1) NOT NULL  ,
   NBPARTICIPANT INTEGER(2) NULL  
   , PRIMARY KEY (NUMDINER,NUMAMIS) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE MANGER
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_MANGER_DINER
     ON MANGER (NUMDINER ASC);

CREATE  INDEX I_FK_MANGER_AMIS
     ON MANGER (NUMAMIS ASC);


# -----------------------------------------------------------------------------
#       CREATION DES REFERENCES DE TABLE
# -----------------------------------------------------------------------------


ALTER TABLE FONCTION 
  ADD FOREIGN KEY FK_FONCTION_AMIS (NUMAMIS)
      REFERENCES AMIS (NUMAMIS) ;


ALTER TABLE ACTION 
  ADD FOREIGN KEY FK_ACTION_AMIS (NUMAMIS)
      REFERENCES AMIS (NUMAMIS) ;


ALTER TABLE ACTION 
  ADD FOREIGN KEY FK_ACTION_COMMISSION (NUMCOMMISSION)
      REFERENCES COMMISSION (NUMCOMMISSION) ;


ALTER TABLE PARTICIPER 
  ADD FOREIGN KEY FK_PARTICIPER_AMIS (NUMAMIS)
      REFERENCES AMIS (NUMAMIS) ;


ALTER TABLE PARTICIPER 
  ADD FOREIGN KEY FK_PARTICIPER_COMMISSION (NUMCOMMISSION)
      REFERENCES COMMISSION (NUMCOMMISSION) ;


ALTER TABLE PARTICIPER 
  ADD FOREIGN KEY FK_PARTICIPER_FONCTION (NUMFONCTION)
      REFERENCES FONCTION (NUMFONCTION) ;


ALTER TABLE PARRAINER 
  ADD FOREIGN KEY FK_PARRAINER_AMIS (NUMAMIS)
      REFERENCES AMIS (NUMAMIS) ;


ALTER TABLE PARRAINER 
  ADD FOREIGN KEY FK_PARRAINER_AMIS1 (NUMAMIS_1)
      REFERENCES AMIS (NUMAMIS) ;


ALTER TABLE PARRAINER 
  ADD FOREIGN KEY FK_PARRAINER_AMIS2 (NUMAMIS_2)
      REFERENCES AMIS (NUMAMIS) ;


ALTER TABLE PARTICIPANT 
  ADD FOREIGN KEY FK_PARTICIPANT_ACTION (NUMACTION)
      REFERENCES ACTION (NUMACTION) ;


ALTER TABLE PARTICIPANT 
  ADD FOREIGN KEY FK_PARTICIPANT_AMIS (NUMAMIS)
      REFERENCES AMIS (NUMAMIS) ;


ALTER TABLE MANGER 
  ADD FOREIGN KEY FK_MANGER_DINER (NUMDINER)
      REFERENCES DINER (NUMDINER) ;


ALTER TABLE MANGER 
  ADD FOREIGN KEY FK_MANGER_AMIS (NUMAMIS)
      REFERENCES AMIS (NUMAMIS) ;

=======
-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Client :  127.0.0.1
-- Généré le :  Lun 23 Novembre 2015 à 10:29
-- Version du serveur :  5.6.15-log
-- Version de PHP :  5.5.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `bdamis`
--

-- --------------------------------------------------------

--
-- Structure de la table `action`
--

CREATE TABLE IF NOT EXISTS `action` (
  `NUMACTION` int(2) NOT NULL AUTO_INCREMENT,
  `NUMAMIS` smallint(1) NOT NULL,
  `NUMCOMMISSION` int(2) DEFAULT NULL,
  `NOMACTION` char(255) DEFAULT NULL,
  `DATEDEBUTACTION` date DEFAULT NULL,
  `DUREEACTION` int(2) DEFAULT NULL,
  `FONDCOLLECTEACTION` decimal(13,2) DEFAULT NULL,
  PRIMARY KEY (`NUMACTION`),
  KEY `I_FK_ACTION_AMIS` (`NUMAMIS`),
  KEY `I_FK_ACTION_COMMISSION` (`NUMCOMMISSION`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `amis`
--

CREATE TABLE IF NOT EXISTS `amis` (
  `NUMAMIS` smallint(1) NOT NULL AUTO_INCREMENT,
  `NOMAMIS` char(255) DEFAULT NULL,
  `PRENOMAMIS` char(255) DEFAULT NULL,
  `TELEPHONEFIXEAMIS` char(10) DEFAULT NULL,
  `TELEPHONEPORTAMIS` char(10) DEFAULT NULL,
  `EMAILAMIS` char(255) DEFAULT NULL,
  `NUMRUEAMIS` int(2) DEFAULT NULL,
  `ADRESSEAMIS` char(255) DEFAULT NULL,
  `VILLEAMIS` char(255) DEFAULT NULL,
  `CPAMIS` char(5) DEFAULT NULL,
  `DATEENTREECLUBAMIS` date DEFAULT NULL,
  `NUMPARRAIN_1` smallint(1) DEFAULT NULL,
  `NUMPARRAIN_2` smallint(1) DEFAULT NULL,
  PRIMARY KEY (`NUMAMIS`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `commission`
--

CREATE TABLE IF NOT EXISTS `commission` (
  `NUMCOMMISSION` int(2) NOT NULL AUTO_INCREMENT,
  `NOMCOMMISSION` char(255) DEFAULT NULL,
  PRIMARY KEY (`NUMCOMMISSION`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `diner`
--

CREATE TABLE IF NOT EXISTS `diner` (
  `NUMDINER` char(32) NOT NULL,
  `DATEDINER` date DEFAULT NULL,
  `LIEUDINER` char(255) DEFAULT NULL,
  `PRIXDINER` decimal(13,2) DEFAULT NULL,
  PRIMARY KEY (`NUMDINER`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `fonction`
--

CREATE TABLE IF NOT EXISTS `fonction` (
  `NUMFONCTION` int(2) NOT NULL AUTO_INCREMENT,
  `NUMAMIS` smallint(1) NOT NULL,
  `NOMFONCTION` char(255) DEFAULT NULL,
  PRIMARY KEY (`NUMFONCTION`),
  UNIQUE KEY `I_FK_FONCTION_AMIS` (`NUMAMIS`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `manger`
--

CREATE TABLE IF NOT EXISTS `manger` (
  `NUMDINER` char(32) NOT NULL,
  `NUMAMIS` smallint(1) NOT NULL,
  `NBPARTICIPANT` int(2) DEFAULT NULL,
  PRIMARY KEY (`NUMDINER`,`NUMAMIS`),
  KEY `I_FK_MANGER_DINER` (`NUMDINER`),
  KEY `I_FK_MANGER_AMIS` (`NUMAMIS`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `parametre`
--

CREATE TABLE IF NOT EXISTS `parametre` (
  `NUMPARAMETRE` int(2) NOT NULL AUTO_INCREMENT,
  `MONTANTCOTISATIONANNUELLE` decimal(13,2) DEFAULT NULL,
  PRIMARY KEY (`NUMPARAMETRE`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Structure de la table `participant`
--

CREATE TABLE IF NOT EXISTS `participant` (
  `NUMACTION` int(2) NOT NULL,
  `NUMAMIS` smallint(1) NOT NULL,
  PRIMARY KEY (`NUMACTION`,`NUMAMIS`),
  KEY `I_FK_PARTICIPANT_ACTION` (`NUMACTION`),
  KEY `I_FK_PARTICIPANT_AMIS` (`NUMAMIS`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `participer`
--

CREATE TABLE IF NOT EXISTS `participer` (
  `NUMAMIS` smallint(1) NOT NULL,
  `NUMCOMMISSION` int(2) NOT NULL,
  `NUMFONCTION` int(2) NOT NULL,
  PRIMARY KEY (`NUMAMIS`,`NUMCOMMISSION`),
  KEY `I_FK_PARTICIPER_AMIS` (`NUMAMIS`),
  KEY `I_FK_PARTICIPER_COMMISSION` (`NUMCOMMISSION`),
  KEY `I_FK_PARTICIPER_FONCTION` (`NUMFONCTION`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

