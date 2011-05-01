ALTER TABLE `#__podcastmanager` ADD `feedname` varchar(255) default NULL AFTER `filename`;

ALTER TABLE `#__podcastmanager` DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `#__podcastmanager_feeds` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(255) default NULL,
  `published` tinyint(1) NOT NULL default '0',
  `created` datetime NOT NULL default '0000-00-00 00:00:00',
  `modified` datetime NOT NULL default '0000-00-00 00:00:00',
  `modified_by` integer unsigned NOT NULL default '0',
  `checked_out` integer unsigned NOT NULL default '0',
  `checked_out_time` datetime NOT NULL default '0000-00-00 00:00:00',
  `language` char(7) NOT NULL,
  PRIMARY KEY (`id`)
) DEFAULT CHARSET=utf8;