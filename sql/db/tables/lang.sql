CREATE TABLE `lang` (
  `lang_id` int(11) NOT NULL,
  `code` varchar(10) NULL,
  `name` varchar(30) NOT NULL,
  `name_english` varchar(30) NOT NULL,
  PRIMARY KEY PK_LANG(`lang_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
insert into `lang`(`lang_id`, `code`, `name`, `name_english`) values(1, 'us_EN', 'English', 'English');
insert into `lang`(`lang_id`, `code`, `name`, `name_english`) values(2, 'es_ES', 'Espa–ol', 'Spanish');