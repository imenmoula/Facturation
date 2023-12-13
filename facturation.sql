# Base de données : 

-- phpMyAdmin SQL Dump
-- version 2.11.0
-- http://www.phpmyadmin.net
--
-- Serveur: localhost
-- Généré le : Mer 13 Décembre 2023 à 21:49
-- Version du serveur: 4.1.22
-- Version de PHP: 5.2.3

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Base de données: `facturation`
--

-- --------------------------------------------------------

--
-- Structure de la table `invoices`
--

CREATE TABLE IF NOT EXISTS `invoices` (
  `id` int(11) NOT NULL auto_increment,
  `iduser` int(11) NOT NULL default '0',
  `net_paye` double NOT NULL default '0',
  `dateecheance` date NOT NULL default '0000-00-00',
  `dateemission` date NOT NULL default '0000-00-00',
  `datepaid` timestamp NOT NULL default '0000-00-00 00:00:00',
  `paid` int(11) NOT NULL default '0',
  `type` varchar(250) NOT NULL default '',
  PRIMARY KEY  (`id`),
  KEY `iduser` (`iduser`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=37 ;

--
-- Contenu de la table `invoices`
--

INSERT INTO `invoices` (`id`, `iduser`, `net_paye`, `dateecheance`, `dateemission`, `datepaid`, `paid`, `type`) VALUES
(27, 13, 150, '2023-12-01', '2023-12-30', '2023-12-12 13:15:10', 1, 'Facture estimative'),
(26, 11, 22, '2023-12-16', '0000-00-00', '2023-12-10 18:33:06', 1, 'Facture rÃ©elle'),
(18, 9, 100, '2023-12-13', '2023-12-22', '0000-00-00 00:00:00', 0, 'Facture rÃ©elle'),
(32, 16, 70, '2023-10-05', '2023-12-30', '2023-12-11 21:48:03', 1, 'Facture rÃ©elle'),
(29, 14, 60, '2023-12-01', '2023-12-30', '2023-12-11 21:22:04', 1, 'Facture estimative'),
(36, 13, 60, '2023-12-07', '2023-12-21', '2023-12-12 13:20:37', 1, 'Facture rÃ©elle');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(255) NOT NULL default '',
  `email` varchar(255) NOT NULL default '',
  `password` varchar(255) NOT NULL default '',
  `is_admin` int(11) NOT NULL default '0',
  `adresse` varchar(255) NOT NULL default '',
  `phone` varchar(255) NOT NULL default '',
  `rib` varchar(255) NOT NULL default '',
  `cin` varchar(255) NOT NULL default '',
  `ville` varchar(255) NOT NULL default '',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Contenu de la table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `is_admin`, `adresse`, `phone`, `rib`, `cin`, `ville`) VALUES
(11, 'Mohamed xxxxx', 'mohamed@gmail.com', '2002', 0, 'Nahj sidi  ben issa', '71556666', ' 11111111', ' 2020202020', ' nabeul'),
(12, 'xxxx imen', 'imen@gmail.com', 'im2002', 1, 'nabeul', '00000000', '2121212121', '1212121212', 'nabeul'),
(13, 'alya xxxx', 'alya@gmail.com', 'alya', 0, 'nabeul', '0000000', '123', '145', 'nabeul');