CREATE TABLE `pharmacy_type` (
  `pharmacy_type_id` int(15) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY PK_PHARMACY_TYPE(`pharmacy_type_id`),
  KEY `IX1_PHARMACY_TYPE`(`pharmacy_type_id`)
) ENGINE=InnoDB;