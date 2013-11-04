CREATE TABLE `orgs` (
  `org_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `trade_name` varchar(255) NOT NULL,
  `main_address_id` int(11) NULL,
  PRIMARY KEY PK_ORGS(`org_id`),
  KEY `IX1_ORGS`(`name`),
  constraint `FK1_ORGS` foreign key (`main_address_id`) references `addresses`(`address_id`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

CREATE TABLE `orgs_lang` (
  `org_id` int(11) NOT NULL,
  `lang_id` int(11) NOT NULL,
  `caption` varchar(255) NOT NULL,
  PRIMARY KEY PK_ORGS_LANG(`org_id`, `lang_id`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;

CREATE TABLE `orgs_addresses` (
  `org_id` int(11) NOT NULL,
  `address_id` int(11) NOT NULL,
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;


