source ../db/tables/plan_types.sql
source ../db/tables/carriers.sql

alter table `plans` add column `plan_type_id` int(15) NULL;
alter table `plans` add column `carrier_id` int(15) NULL;
alter table `plans` add constraint `FK1_PLANS` FOREIGN KEY (`plan_type_id`) REFERENCES `plan_types`(`plan_type_id`);
alter table `plans` add constraint `FK2_PLANS` FOREIGN KEY (`carrier_id`) REFERENCES `carriers`(`carrier_id`);