CREATE TABLE `carriers` (
  `carrier_id` int(15) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY PK_CARRIERS(`carrier_id`),
  KEY `IX1_CARRIERS`(`name`)
) ENGINE=InnoDB;

insert into `carriers`(name) values('Humana');
insert into `carriers`(name) values('HealthNet');
insert into `carriers`(name) values('Providence');
insert into `carriers`(name) values('Keizer');
