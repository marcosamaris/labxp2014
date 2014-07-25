-- phpMyAdmin SQL Dump
-- version 4.1.10
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 25, 2014 at 12:22 PM
-- Server version: 5.5.37-0ubuntu0.12.04.1
-- PHP Version: 5.3.10-1ubuntu3.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `aws`
--

-- --------------------------------------------------------

--
-- Table structure for table `elgg_datalists`
--

CREATE TABLE IF NOT EXISTS `elgg_datalists` (
  `name` varchar(255) NOT NULL,
  `value` text NOT NULL,
  PRIMARY KEY (`name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `elgg_datalists`
--

INSERT INTO `elgg_datalists` (`name`, `value`) VALUES
('filestore_run_once', '1395257547'),
('plugin_run_once', '1395257547'),
('elgg_widget_run_once', '1395257547'),
('installed', '1395257831'),
('path', '/var/www/startup/'),
('dataroot', '/mnt/elgg-data/'),
('default_site', '1'),
('version', '2014012000'),
('simplecache_enabled', '0'),
('system_cache_enabled', '0'),
('processed_upgrades', 'a:45:{i:0;s:14:"2008100701.php";i:1;s:14:"2008101303.php";i:2;s:14:"2009022701.php";i:3;s:14:"2009041701.php";i:4;s:14:"2009070101.php";i:5;s:14:"2009102801.php";i:6;s:14:"2010010501.php";i:7;s:14:"2010033101.php";i:8;s:14:"2010040201.php";i:9;s:14:"2010052601.php";i:10;s:14:"2010060101.php";i:11;s:14:"2010060401.php";i:12;s:14:"2010061501.php";i:13;s:14:"2010062301.php";i:14;s:14:"2010062302.php";i:15;s:14:"2010070301.php";i:16;s:14:"2010071001.php";i:17;s:14:"2010071002.php";i:18;s:14:"2010111501.php";i:19;s:14:"2010121601.php";i:20;s:14:"2010121602.php";i:21;s:14:"2010121701.php";i:22;s:14:"2010123101.php";i:23;s:14:"2011010101.php";i:24;s:61:"2011021800-1.8_svn-goodbye_walled_garden-083121a656d06894.php";i:25;s:61:"2011022000-1.8_svn-custom_profile_fields-390ac967b0bb5665.php";i:26;s:60:"2011030700-1.8_svn-blog_status_metadata-4645225d7b440876.php";i:27;s:51:"2011031300-1.8_svn-twitter_api-12b832a5a7a3e1bd.php";i:28;s:57:"2011031600-1.8_svn-datalist_grows_up-0b8aec5a55cc1e1c.php";i:29;s:61:"2011032000-1.8_svn-widgets_arent_plugins-61836261fa280a5c.php";i:30;s:59:"2011032200-1.8_svn-admins_like_widgets-7f19d2783c1680d3.php";i:31;s:14:"2011052801.php";i:32;s:60:"2011061200-1.8b1-sites_need_a_site_guid-6d9dcbf46c0826cc.php";i:33;s:62:"2011092500-1.8.0.1-forum_reply_river_view-5758ce8d86ac56ce.php";i:34;s:54:"2011123100-1.8.2-fix_friend_river-b17e7ff8345c2269.php";i:35;s:53:"2011123101-1.8.2-fix_blog_status-b14c2a0e7b9e7d55.php";i:36;s:50:"2012012000-1.8.3-ip_in_syslog-87fe0f068cf62428.php";i:37;s:50:"2012012100-1.8.3-system_cache-93100e7d55a24a11.php";i:38;s:59:"2012041800-1.8.3-dont_filter_passwords-c0ca4a18b38ae2bc.php";i:39;s:58:"2012041801-1.8.3-multiple_user_tokens-852225f7fd89f6c5.php";i:40;s:59:"2013030600-1.8.13-update_user_location-8999eb8bf1bdd9a3.php";i:41;s:62:"2013051700-1.8.15-add_missing_group_index-52a63a3a3ffaced2.php";i:42;s:53:"2013052900-1.8.15-ipv6_in_syslog-f5c2cc0196e9e731.php";i:43;s:50:"2013060900-1.8.15-site_secret-404fc165cf9e0ac9.php";i:44;s:50:"2014012000-1.8.18-remember_me-9a8a433685cf7be9.php";}'),
('admin_registered', '1'),
('simplecache_lastupdate_default', '1400807725'),
('simplecache_lastcached_default', '1400807725'),
('__site_secret__', 'zRnsQARi6lxG3WZY_3q6tsXNvrPgPBfu'),
('simplecache_lastupdate_failsafe', '0'),
('simplecache_lastcached_failsafe', '0'),
('simplecache_lastupdate_foaf', '0'),
('simplecache_lastcached_foaf', '0'),
('simplecache_lastupdate_ical', '0'),
('simplecache_lastcached_ical', '0'),
('simplecache_lastupdate_installation', '0'),
('simplecache_lastcached_installation', '0'),
('simplecache_lastupdate_json', '0'),
('simplecache_lastcached_json', '0'),
('simplecache_lastupdate_opendd', '0'),
('simplecache_lastcached_opendd', '0'),
('simplecache_lastupdate_php', '0'),
('simplecache_lastcached_php', '0'),
('simplecache_lastupdate_rss', '0'),
('simplecache_lastcached_rss', '0'),
('simplecache_lastupdate_xml', '0'),
('simplecache_lastcached_xml', '0');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
