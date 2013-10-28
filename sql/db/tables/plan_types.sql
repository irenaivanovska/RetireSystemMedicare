CREATE TABLE `plan_types` (
  `plan_type_id` int(15) NOT NULL AUTO_INCREMENT,
  `short_desc` varchar(255) NOT NULL,
  `long_desc` text,
  PRIMARY KEY PK_PLAN_TYPES(`plan_type_id`),
  KEY `IX1_PLAN_TYPES`(`short_desc`)
) ENGINE=InnoDB;

insert into `plan_types`(short_desc) values('HMO');
insert into `plan_types`(short_desc) values('HMO-POS');
insert into `plan_types`(short_desc) values('PFFS');
insert into `plan_types`(short_desc) values('PPO');
insert into `plan_types`(short_desc) values('SNP');