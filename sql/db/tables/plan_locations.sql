CREATE TABLE `plan_locations` (
  `plan_id` int(11) NOT NULL,
  `address_id` int(11) NOT NULL,
  PRIMARY KEY PK_PLAN_LOCATIONS(`plan_id`, `address_id`),
  constraint FK1_PLAN_LOCATIONS FOREIGN KEY (`plan_id`) references `plans`(`plan_id`),
  constraint FK2_PLAN_LOCATIONS FOREIGN KEY (`address_id`) references `addresses`(`address_id`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8;