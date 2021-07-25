DROP TABLE IF EXISTS `slider`;
CREATE TABLE IF NOT EXISTS `slider` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `online` tinyint(3) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

DROP TABLE IF EXISTS `slider_image`;
CREATE TABLE IF NOT EXISTS `slider_image` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) DEFAULT NULL,
  `text` TEXT DEFAULT NULL,
  `file_image` varchar(255) DEFAULT NULL,
  `page_link_id` int(10) unsigned DEFAULT NULL,
  `order_index` int(10) unsigned DEFAULT NULL,
  `slider_id` int(10) unsigned DEFAULT NULL,
  `online` tinyint(3) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `slider_image_index_1` (`page_link_id`),
  KEY `slider_image_index_2` (`slider_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

DROP TABLE IF EXISTS `slider_page_controller`;
CREATE TABLE IF NOT EXISTS `slider_page_controller` (
  `id` int(11) NOT NULL,
  `slider_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `slider_page_controller_index_1` (`slider_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
