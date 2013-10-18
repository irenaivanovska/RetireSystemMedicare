CREATE TABLE `favorite_drugs` (
  `user_id` int(10) unsigned NOT NULL,
  `drug_id` int(15) NOT NULL,
  PRIMARY KEY PK_FAVORITE_DRUGS(`user_id`, `drug_id`),
  KEY `IX1_FAVORITE_DRUGS`(`user_id`, `drug_id`),
  FOREIGN KEY FK1_FAVORITE_DRUGS(`user_id`) REFERENCES `users`(`user_id`),
  FOREIGN KEY FK2_FAVORITE_DRUGS(`drug_id`) REFERENCES `drugs`(`drug_id`)
) ENGINE=InnoDB;

CREATE TABLE `favorite_plans` (
  `user_id` int(10) unsigned NOT NULL,
  `plan_id` int(15) NOT NULL,
  PRIMARY KEY PK_FAVORITE_PLANS(`user_id`, `plan_id`),
  KEY `IX1_FAVORITE_PLANS`(`user_id`, `plan_id`),
  FOREIGN KEY FK1_FAVORITE_PLANS(`user_id`) REFERENCES `users`(`user_id`),
  FOREIGN KEY FK2_FAVORITE_PLANS(`plan_id`) REFERENCES `plans`(`plan_id`)
) ENGINE=InnoDB;