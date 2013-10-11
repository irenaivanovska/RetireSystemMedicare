CREATE TABLE `drugs` (
  `drug_id` int(15) NOT NULL AUTO_INCREMENT,
  `drug_name` varchar(255) NOT NULL,
  `dose` decimal(9,2) NULL,
  `frequency` int(15) NULL,
  `pharmacy_type_id` int(15) NULL,
  PRIMARY KEY PK_DRUGS(`drug_id`),
  KEY `IX1_DRUGS`(`drug_id`),
  FOREIGN KEY FK1_DRUGS(`pharmacy_type_id`) REFERENCES `pharmacy_type`(`pharmacy_type_id`)
) ENGINE=InnoDB;