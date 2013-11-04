CREATE TABLE `states` (
  `state_id` int(11) not null auto_increment,
  `code` varchar(3) DEFAULT NULL,
  `name` varchar(50) NOT NULL,
  PRIMARY KEY PK_GEOGRAPHY(`state_id`),
  UNIQUE KEY UQ1_STATES(`code`),
  UNIQUE KEY UQ2_STATES(`name`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `counties` (
  `county_id` int(11) not null auto_increment,
  `state_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `FIPSCode` bigint(4) NOT NULL,
  PRIMARY KEY PK_COUNTIES(`county_id`),
  UNIQUE KEY UQ1_COUNTIES(`state_id`, `name`),
  UNIQUE KEY UQ2_COUNTIES(`state_id`, `FIPSCode`),
  constraint FK1_COUNTIES FOREIGN KEY (`state_id`) REFERENCES `states`(`state_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `zips` (
  `zip_id` int(11) NOT NULL AUTO_INCREMENT,
  `county_id` int(11) NOT NULL,
  `zip_code` varchar(5) DEFAULT NULL,
  PRIMARY KEY PK_ZIPS(`zip_id`),
  UNIQUE KEY UQ1_ZIPS(`county_id`, `zip_code`),
  constraint FK1_ZIPS FOREIGN KEY (`county_id`) REFERENCES `counties`(`county_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `addresses` (
  `address_id` int(11) NOT NULL AUTO_INCREMENT,
  `zip_id` int(11) NULL,
  `county_id` int(11) NOT NULL,
  `street_address` text NOT NULL,
  `city` text not NULL,
  `www` text NULL,
  PRIMARY KEY PK_ADDRESSES(`address_id`),
  constraint FK1_ADDRESSES FOREIGN KEY (`zip_id`) REFERENCES `zips`(`zip_id`),
  constraint FK2_ADDRESSES FOREIGN KEY (`county_id`) REFERENCES `counties`(`county_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `contact_types` (
  `contact_type_id` int(11) NOT NULL AUTO_INCREMENT,
  `contact_person` varchar(255),
  `caption` varchar(255) NOT NULL,
  PRIMARY KEY PK_CONTACT_TYPES(`contact_type_id`),
  UNIQUE UQ1_CONTACT_TYPES(`caption`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `contacts` (
  `contact_id` int(11) NOT NULL AUTO_INCREMENT,
  `address_id` int(11) NOT NULL,
  `contact_type_id` int(11) NOT NULL,
  `contact` text NOT NULL,
  PRIMARY KEY PK_CONTACTS(`contact_id`),
  constraint FK1_CONTACT foreign key (`address_id`) references `addresses`(`address_id`),
  constraint FK2_CONTACT foreign key (`contact_type_id`) references `contact_types`(`contact_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;