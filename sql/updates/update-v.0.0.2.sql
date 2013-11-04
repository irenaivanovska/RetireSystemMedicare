source ../db/tables/lang.sql

create table temp_plans as select * from plans;
drop table if exists plan_locations;
truncate table plans;
drop table if exists plan_favorites;
drop table plans;
drop table if exists carriers_lang;
drop table if exists orgs;
source ../db/tables/orgs.sql
drop table if exists plan_types;
source ../db/tables/plan_types.sql

source ../db/tables/plans.sql
source ../db/tables/plan_locations.sql

source ../db/tables/geography.sql
insert into `states`(`code`, `name`) select distinct l.StateCode, l.StateName from `migrate`.`vwGeography` l order by l.StateName;

insert into `counties`(`state_id`, `name`, `FIPSCode`) 
select distinct s.state_id, l.CountyName, l.CountyFIPSCode 
from `migrate`.`vwGeography` l
inner join `states` s on s.name=l.StateName and s.code=l.StateCode
order by s.state_id, l.CountyName;

insert into `zips`(`county_id`, `zip_code`)
select distinct c.county_id, l.zip_code
from `migrate`.`vwGeography` l
inner join `states` s on s.name=l.StateName and s.code=l.StateCode
inner join `counties` c on c.state_id=s.state_id and l.CountyName=c.name and l.CountyFIPSCode=c.FIPScode
order by s.state_id, l.CountyName;

insert into `addresses`(`zip_id`,`county_id`, `street_address`, `city`, `www`)
select distinct z.zip_id, c.county_id, l.addrs1 as street_address, l.city, l.web_addr as www
from `migrate`.`vwPlansByZipNew` l
inner join `states` s on s.name=l.state_name
inner join `counties` c on c.state_id=s.state_id and c.name=l.county_name
inner join `zips` z on z.zip_code=l.zip_code
order by z.zip_id, c.county_id;

insert into contact_types(contact_type_id, caption) values(1, 'phone');
insert into contact_types(contact_type_id, caption) values(2, 'email');

insert into `orgs`(`name`) select distinct l.`name` from `migrate`.`vwOrgsByState` l order by l.`name`;

create table `migrate`.`planinfo` as select * from `migrate`.`vwPlanInfoByCounty_Part1` union select * from `migrate`.`vwPlanInfoByCounty_Part2`;
insert into `plan_types`(`plan_type_id`, `short_desc`, `long_desc`) select distinct plan_type, plan_type_desc, null from `migrate`.`planinfo` order by plan_type;



`plan_id` int(11) NOT NULL AUTO_INCREMENT,
  `plan_type_id` int(15) NULL,
  `carrier_id` int(15) NULL,
  `zip_code` varchar(5) DEFAULT NULL,
  `county_name` text,
  `state_name` text,
  `name` text,
  `addrs1` text,
  `city` text,
  `abbrev` text,
  `zip` text,
  `web_addr` text,
  `textcond` text,
  `sp_textcond` text,
  `description` text,
  `over65` smallint(5) DEFAULT NULL,
  `under65` smallint(5) DEFAULT NULL,
  `na_available` smallint(5) DEFAULT NULL,
  `community` smallint(5) DEFAULT NULL,
  `issue` smallint(5) DEFAULT NULL,
  `attained` smallint(5) DEFAULT NULL,
  `na_rating` smallint(5) DEFAULT NULL,
  `montly_premium` decimal(12, 2) default null,
  `health_deductable` decimal(12, 2) default null,
  `drug_deductable` decimal(12, 2) default null,
  `dt_created` timestamp default current_timestamp,
  `dt_modified` timestamp default current_timestamp,
  PRIMARY KEY PK_PLANS(`plan_id`),
  FOREIGN KEY FK1_PLANS(`plan_type_id`) REFERENCES `plan_types`(`plan_type_id`),
  FOREIGN KEY FK2_PLANS(`carrier_id`) REFERENCES `carriers`(`carrier_id`)