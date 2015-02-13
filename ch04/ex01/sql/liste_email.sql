-- phpMyAdmin SQL Dump
-- version 2.9.0-rc1
-- http://www.phpmyadmin.net
-- 
-- Serveur: localhost
-- Généré le : Jeudi 28 Juin 2007 à 23:41
-- Version du serveur: 5.0.18
-- Version de PHP: 5.2.2
-- 
-- Base de données: `emsc_site_dyn`
-- 

-- --------------------------------------------------------

-- 
-- Structure de la table `email`
-- 

CREATE TABLE `liste_email` (
  `email_id` int(11) NOT NULL auto_increment,
  `email` varchar(125) NOT NULL,
  `date_inscription` datetime NOT NULL,
  PRIMARY KEY  (`email_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- 
-- Contenu de la table `email`
-- 

