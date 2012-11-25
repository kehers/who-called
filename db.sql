DROP TABLE IF EXISTS `logs`;

CREATE TABLE `logs` (
  `id` int(11) NOT NULL auto_increment,
  `frm` varchar(20) NOT NULL,
  `date` datetime NOT NULL,
  PRIMARY KEY  (`id`)
);
