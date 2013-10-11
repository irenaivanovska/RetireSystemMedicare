CREATE TABLE `pharmacy_networks_file` (
  `pharmacy_network_file_id` int(4) NOT NULL AUTO_INCREMENT,
  `contract_id` char(5) NOT NULL,
  `plan_id` char(3) NOT NULL,
  `segment_id` char(3) NOT NULL,
  `pharmacy_number` char(12) NOT NULL,
  `pharmacy_zipcode` char(5) NOT NULL,
  `prefferred_status_retail` char(1) NOT NULL,
  `prefferred_status_mail` char(1) NOT NULL,
  `pharmacy_retail` char(1) NOT NULL,
  `pharmacy_mail` char(1) NOT NULL,
  `in_aria_flag` varchar(9) NOT NULL,
  PRIMARY KEY (`pharmacy_network_file_id`),
  KEY `contract_id` (`contract_id`),
  KEY `plan_id` (`plan_id`),
  KEY `segment_id` (`segment_id`)
) ENGINE=InnoDB;