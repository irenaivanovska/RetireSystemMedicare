alter table `drugs` add `generic` tinyint(10) not null default '0';
alter table `drugs` add `quantity` decimal(10, 2) null;