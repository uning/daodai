-- phpMyAdmin SQL Dump
-- version 2.11.4
-- http://www.phpmyadmin.net
--
-- 主机: localhost
-- 生成日期: 2009 年 06 月 16 日 15:50
-- 服务器版本: 5.0.51
-- PHP 版本: 5.2.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- 数据库: `daodai`
--

-- --------------------------------------------------------

--
-- 表的结构 `records`
--

CREATE TABLE IF NOT EXISTS `records` (
  `id` int(11) NOT NULL auto_increment,
  `user_id` int(11) NOT NULL,
  `yyyy` int(11) NOT NULL,
  `mm` tinyint(4) NOT NULL,
  `dd` tinyint(4) NOT NULL,
  `content` text NOT NULL,
  `create_at` datetime NOT NULL,
  `update_at` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  PRIMARY KEY  (`id`),
  KEY `user_id` (`user_id`),
  KEY `yyyy` (`yyyy`),
  KEY `mm` (`mm`),
  KEY `dd` (`dd`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `records`
--


-- --------------------------------------------------------

--
-- 表的结构 `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(256) NOT NULL,
  `password` varchar(32) NOT NULL,
  `create_at` datetime NOT NULL,
  `update_at` datetime NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `name` (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

--
-- 导出表中的数据 `users`
--

