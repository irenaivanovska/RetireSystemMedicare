source pharmacy_type.sql
source drugs.sql
source plans.sql
	
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

CREATE TABLE `basic_drugs_formulary_file` (
  `formulary_id` int(8) NOT NULL AUTO_INCREMENT,
  `formulary_version` decimal(9,2) NOT NULL,
  `contract_year` char(4) NOT NULL,
  `rxcui` char(8) NOT NULL,
  `ndc` char(11) NOT NULL,
  `tier_level_value` decimal(9,2) NOT NULL,
  `quantity_limit_yn` char(1) NOT NULL,
  `quantity_limit_amount` decimal(9,6) NOT NULL,
  `quantity_limit_days` decimal(9,6) NOT NULL,
  `prior_authorization_yn` char(1) NOT NULL,
  `step_therapy_yn` char(1) NOT NULL,
  PRIMARY KEY (`formulary_id`),
  KEY `formulary_id` (`formulary_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table beneficiary_cost_file
# ------------------------------------------------------------

CREATE TABLE `beneficiary_cost_file` (
  `beneficiary_cost_file_id` int(4) NOT NULL AUTO_INCREMENT,
  `contract_id` char(5) NOT NULL,
  `plan_id` char(3) NOT NULL,
  `segment_id` char(3) NOT NULL,
  `coverage_level` varchar(9) NOT NULL,
  `tier` varchar(9) NOT NULL,
  `days_supply` varchar(9) NOT NULL,
  `cost_type_pref` varchar(9) NOT NULL,
  `cost_amt_pref` varchar(9) NOT NULL,
  `cost_min_amt_pref` varchar(9) NOT NULL,
  `cost_max_amt_pref` varchar(9) NOT NULL,
  `cost_type_nonpref` varchar(9) NOT NULL,
  `cost_amt_nonpref` varchar(9) NOT NULL,
  `cost_min_amt_nonpref` varchar(9) NOT NULL,
  `cost_max_amt_nonpref` varchar(9) NOT NULL,
  `cost_type_mail` varchar(9) NOT NULL,
  `cost_amt_mail` varchar(9) NOT NULL,
  `cost_min_amt_mail` varchar(9) NOT NULL,
  `cost_max_amt_mail` varchar(9) NOT NULL,
  `tier_specialty_yn` char(1) NOT NULL,
  `ded_applies_yn` char(1) NOT NULL,
  `gap_cov_tier` char(1) NOT NULL,
  PRIMARY KEY (`beneficiary_cost_file_id`),
  KEY `contract_id` (`contract_id`),
  KEY `plan_id` (`plan_id`),
  KEY `segment_id` (`segment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `excluded_drugs_formulary_file` (
  `excluded_drugs_formulary_file_id` int(4) NOT NULL AUTO_INCREMENT,
  `contract_id` char(5) NOT NULL,
  `plan_id` char(3) NOT NULL,
  `ndc` char(11) NOT NULL,
  `tier` float NOT NULL,
  `quantity_limit_yn` char(1) NOT NULL,
  `quantity_limit_amount` char(7) NOT NULL,
  `quantity_limit_days` float NOT NULL,
  `prior_authorization_yn` char(1) NOT NULL,
  `step_therapy_yn` char(1) NOT NULL,
  `capped_benefit_yn` char(1) NOT NULL,
  `gap_cov` char(1) NOT NULL,
  PRIMARY KEY (`excluded_drugs_formulary_file_id`),
  KEY `contract_id` (`contract_id`),
  KEY `plan_id` (`plan_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table geographic_locator_file
# ------------------------------------------------------------

CREATE TABLE `geographic_locator_file` (
  `country_code` int(5) NOT NULL,
  `statename` char(30) NOT NULL,
  `country` char(30) NOT NULL,
  `ma_region_code` char(2) NOT NULL,
  `ma_region` char(150) NOT NULL,
  `pdp_region_code` char(2) NOT NULL,
  `pdp_region` char(150) NOT NULL,
  PRIMARY KEY (`country_code`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table ma_region_code
# ------------------------------------------------------------

CREATE TABLE `ma_region_code` (
  `ma_region_code_id` char(2) NOT NULL,
  `value` varchar(150) NOT NULL,
  PRIMARY KEY (`ma_region_code_id`),
  KEY `ma_region_code_id` (`ma_region_code_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table partial_gap_coverage_file
# ------------------------------------------------------------

CREATE TABLE `partial_gap_coverage_file` (
  `partial_gap_id` int(4) NOT NULL AUTO_INCREMENT,
  `contract_id` char(5) NOT NULL,
  `plan_id` char(3) NOT NULL,
  `formulary_id` char(8) NOT NULL,
  `rxcui` char(8) NOT NULL,
  `contract_year` char(4) NOT NULL,
  PRIMARY KEY (`partial_gap_id`),
  KEY `contract_id` (`contract_id`),
  KEY `plan_id` (`plan_id`),
  KEY `formulary_id` (`formulary_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table pdp_region_code
# ------------------------------------------------------------

CREATE TABLE `pdp_region_code` (
  `pdp_region_code_id` char(2) NOT NULL,
  `value` varchar(150) NOT NULL,
  PRIMARY KEY (`pdp_region_code_id`),
  KEY `pdp_region_code_id` (`pdp_region_code_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table pharmacy_networks_file
# ------------------------------------------------------------
source pharmacy_networks_file.sql

# Dump of table phone_type
# ------------------------------------------------------------

CREATE TABLE `phone_type` (
  `phone_type_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `phone_type` varchar(20) NOT NULL,
  PRIMARY KEY (`phone_type_id`),
  UNIQUE KEY `phone_type_UNIQUE` (`phone_type`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table plan_information_file
# ------------------------------------------------------------
source plan_information_file.sql

# Dump of table search_index
# ------------------------------------------------------------

CREATE TABLE `search_index` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `association_key` int(11) NOT NULL,
  `model` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `data` longtext COLLATE utf8_unicode_ci NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `association_key` (`association_key`,`model`),
  FULLTEXT KEY `data` (`data`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Dump of table secret_questions
# ------------------------------------------------------------

CREATE TABLE `secret_questions` (
  `secret_question_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `secret_question` varchar(255) NOT NULL,
  PRIMARY KEY (`secret_question_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table user_druglists
# ------------------------------------------------------------

CREATE TABLE `user_druglists` (
  `user_druglist_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `user_druglist_status` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`user_druglist_id`),
  KEY `fk_user_druglists_users1_idx` (`user_id`),
  CONSTRAINT `fk_user_druglists_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table user_pharmacies
# ------------------------------------------------------------

CREATE TABLE `user_pharmacies` (
  `user_pharmacy_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pharmacy_name` varchar(60) NOT NULL,
  `user_pharmacy_address_line1` varchar(60) NOT NULL,
  `user_pharmacy_address_line2` varchar(60) DEFAULT NULL,
  `user_pharmacy_city` varchar(45) NOT NULL,
  `user_pharmacy_state` varchar(2) NOT NULL,
  `user_pharmacy_postal_code` varchar(10) NOT NULL,
  `user_pharmacy_primary_phone` varchar(12) NOT NULL,
  `user_pharmacy_secondary_phone` varchar(12) DEFAULT NULL,
  `user_pharmacy_active` int(1) NOT NULL DEFAULT '0',
  `user_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`user_pharmacy_id`),
  KEY `fk_user_pharmacies_users1_idx` (`user_id`),
  CONSTRAINT `fk_user_pharmacies_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table user_plan_contacts
# ------------------------------------------------------------

CREATE TABLE `user_plan_contacts` (
  `user_plan_contact_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_plan_id` int(10) unsigned NOT NULL,
  `user_plan_contact_date` datetime NOT NULL,
  PRIMARY KEY (`user_plan_contact_id`),
  KEY `fk_user_plan_contacts_user_plans1_idx` (`user_plan_id`),
  CONSTRAINT `fk_user_plan_contacts_user_plans1` FOREIGN KEY (`user_plan_id`) REFERENCES `user_plans` (`user_plan_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table user_plans
# ------------------------------------------------------------

CREATE TABLE `user_plans` (
  `user_plan_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `plan_id` int(10) unsigned NOT NULL,
  `user_plan_status` int(1) unsigned NOT NULL DEFAULT '0',
  `user_id` int(10) unsigned NOT NULL,
  PRIMARY KEY (`user_plan_id`),
  KEY `fk_user_plans_users1_idx` (`user_id`),
  CONSTRAINT `fk_user_plans_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table user_secret_questions
# ------------------------------------------------------------

CREATE TABLE `user_secret_questions` (
  `user_secret_question_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `secret_questions_secret_question_id` int(10) unsigned NOT NULL,
  `alternativesecret_question` varchar(255) DEFAULT NULL,
  `question_answer` varchar(255) NOT NULL,
  PRIMARY KEY (`user_secret_question_id`),
  KEY `fk_users_has_secret_questions_secret_questions1_idx` (`secret_questions_secret_question_id`),
  KEY `fk_users_has_secret_questions_users1_idx` (`user_id`),
  CONSTRAINT `fk_users_has_secret_questions_secret_questions1` FOREIGN KEY (`secret_questions_secret_question_id`) REFERENCES `secret_questions` (`secret_question_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_has_secret_questions_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table user_status_history
# ------------------------------------------------------------

CREATE TABLE `user_status_history` (
  `user_status_history_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `user_status_action` varchar(255) NOT NULL,
  `user_status_created` datetime NOT NULL,
  `user_status_created_by` int(11) NOT NULL,
  `user_status_note` text,
  PRIMARY KEY (`user_status_history_id`),
  KEY `fk_user_status_history_users1_idx` (`user_id`),
  CONSTRAINT `fk_user_status_history_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table user_types
# ------------------------------------------------------------

CREATE TABLE `user_types` (
  `user_type_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_type` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`user_type_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table users
# ------------------------------------------------------------

CREATE TABLE `users` (
  `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_firstname` varchar(30) DEFAULT NULL,
  `user_lastname` varchar(30) DEFAULT NULL,
  `user_email_address` varchar(60) NOT NULL,
  `password` varchar(30) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `user_active` int(1) unsigned NOT NULL DEFAULT '0',
  `step` int(1) NOT NULL DEFAULT '1',
  `user_address_line1` varchar(60) DEFAULT NULL,
  `user_address_line2` varchar(60) DEFAULT NULL,
  `user_city` varchar(45) DEFAULT NULL,
  `user_state` varchar(2) DEFAULT NULL,
  `user_postal_code` varchar(10) DEFAULT NULL,
  `user_county` varchar(45) DEFAULT NULL,
  `user_primary_phone` varchar(12) DEFAULT NULL,
  `user_secondard_phone` varchar(12) DEFAULT NULL,
  `user_dob` date DEFAULT NULL,
  `user_gender` enum('M','F') DEFAULT NULL,
  `user_type_id` int(10) unsigned NOT NULL,
  `primary_phone_type_id` int(10) unsigned DEFAULT NULL,
  `secondary_phone_type_id` int(10) unsigned DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  KEY `fk_users_user_types_idx` (`user_type_id`),
  KEY `fk_users_phone_type1_idx` (`primary_phone_type_id`),
  KEY `fk_users_phone_type2_idx` (`secondary_phone_type_id`),
  CONSTRAINT `fk_users_phone_type1` FOREIGN KEY (`primary_phone_type_id`) REFERENCES `phone_type` (`phone_type_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_phone_type2` FOREIGN KEY (`secondary_phone_type_id`) REFERENCES `phone_type` (`phone_type_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_user_types` FOREIGN KEY (`user_type_id`) REFERENCES `user_types` (`user_type_id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=latin1;



# Dump of table vwapp_mppf_medigap_plantype_xwalk_local
# ------------------------------------------------------------

CREATE TABLE `vwapp_mppf_medigap_plantype_xwalk_local` (
  `plan_type_xwalk_id` int(4) NOT NULL AUTO_INCREMENT,
  `simple_plantype` text,
  `plan_type` int(10) DEFAULT NULL,
  `state_abbrev` text,
  `contract_year` text,
  PRIMARY KEY (`plan_type_xwalk_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table vwapp_mppf_medigap_premiums_local
# ------------------------------------------------------------

CREATE TABLE `vwapp_mppf_medigap_premiums_local` (
  `premiums_id` int(11) NOT NULL AUTO_INCREMENT,
  `state_abbrev` text,
  `plan_type` int(10) DEFAULT NULL,
  `age_category` int(10) DEFAULT NULL,
  `premium_range` text,
  `contract_year` text,
  `seq_id` int(10) DEFAULT NULL,
  `language_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`premiums_id`),
  KEY `seq_id` (`seq_id`),
  KEY `language_id` (`language_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table vwapp_mppf_medigap_simple_plantype_name_local
# ------------------------------------------------------------

CREATE TABLE `vwapp_mppf_medigap_simple_plantype_name_local` (
  `simple_plantype_name_id` int(11) NOT NULL AUTO_INCREMENT,
  `simple_plantype` int(11) DEFAULT NULL,
  `simple_plantype_name` int(11) DEFAULT NULL,
  `contract_year` int(11) NOT NULL,
  `language_id` int(10) DEFAULT NULL,
  PRIMARY KEY (`simple_plantype_name_id`),
  KEY `language_id` (`language_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table vwcostbenefitreportstructure
# ------------------------------------------------------------

CREATE TABLE `vwcostbenefitreportstructure` (
  `costbenefitreportstructure_id` int(4) NOT NULL AUTO_INCREMENT,
  `Language` varchar(25) NOT NULL,
  `SectionHeadingDescription` int(11) NOT NULL,
  `CategoryDescription` int(11) NOT NULL,
  `CategoryCode` bigint(4) NOT NULL,
  `CategorySortOrder` bigint(4) NOT NULL,
  `SectionHeadingSortOrder` bigint(4) NOT NULL,
  PRIMARY KEY (`costbenefitreportstructure_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table vwgeography
# ------------------------------------------------------------

CREATE TABLE `vwgeography` (
  `geography_id` int(11) NOT NULL AUTO_INCREMENT,
  `StateCode` varchar(3) DEFAULT NULL,
  `StateName` varchar(50) NOT NULL,
  `CountyName` varchar(50) NOT NULL,
  `CountyFIPSCode` bigint(4) NOT NULL,
  `zip_code` varchar(5) DEFAULT NULL,
  PRIMARY KEY (`geography_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table vwlocalcontractserviceareas
# ------------------------------------------------------------

CREATE TABLE `vwlocalcontractserviceareas` (
  `County_code` bigint(5) NOT NULL,
  `localcontractserviceareas_id` int(11) NOT NULL AUTO_INCREMENT,
  `Zip_Code` int(5) NOT NULL,
  `Contract_ID` varchar(5) NOT NULL,
  `Contract_Year` int(4) NOT NULL,
  PRIMARY KEY (`localcontractserviceareas_id`),
  KEY `Contract_ID` (`Contract_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table vworgsbystate_local
# ------------------------------------------------------------

CREATE TABLE `vworgsbystate_local` (
  `StateName` text,
  `Org_ID` int(10) NOT NULL AUTO_INCREMENT,
  `Name` text,
  `Phone` text,
  `Ext` text,
  PRIMARY KEY (`Org_ID`),
  KEY `Org_ID` (`Org_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table vwplancobrandnames
# ------------------------------------------------------------

CREATE TABLE `vwplancobrandnames` (
  `Contract_ID` int(5) DEFAULT NULL,
  `Plan_ID` int(3) DEFAULT NULL,
  `Cobrand_ID` int(10) NOT NULL AUTO_INCREMENT,
  `Cobrand_name` text,
  `Contract_Year` text,
  PRIMARY KEY (`Cobrand_ID`),
  KEY `Contract_ID` (`Contract_ID`),
  KEY `Plan_ID` (`Plan_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table vwplandrugscostsharing
# ------------------------------------------------------------

CREATE TABLE `vwplandrugscostsharing` (
  `plandrugcostsharing_id` int(11) NOT NULL AUTO_INCREMENT,
  `contract_id` int(5) NOT NULL,
  `segment_id` int(1) NOT NULL,
  `plan_id` int(3) NOT NULL,
  `contract_year` varchar(4) NOT NULL,
  `language_id` bigint(4) NOT NULL,
  `plan_cvrg_typ_id` bigint(4) DEFAULT NULL,
  `mnthly_prm` decimal(12,2) DEFAULT NULL,
  `ann_ddctbl` decimal(12,2) DEFAULT NULL,
  `icl_lmt` decimal(12,2) DEFAULT NULL,
  `thrshld` decimal(12,2) DEFAULT NULL,
  `copay_amt_inn_prefrd` text,
  `copay_amt_inn_prefrd_lvl` tinyint(3) unsigned DEFAULT NULL,
  `coins_amt_inn_prefrd` text,
  `coins_amt_inn_prefrd_lvl` tinyint(3) unsigned DEFAULT NULL,
  `copay_amt_inn_general` text,
  `copay_amt_inn_general_lvl` tinyint(3) unsigned DEFAULT NULL,
  `coins_amt_inn_general` text,
  `coins_amt_inn_general_lvl` tinyint(3) unsigned DEFAULT NULL,
  `copay_amt_mail_ordr_prefrd` text,
  `copay_amt_mail_ordr_prefrd_lvl` tinyint(3) unsigned DEFAULT NULL,
  `coins_amt_mail_ordr_prefrd` text,
  `coins_amt_mail_ordr_prefrd_lvl` tinyint(3) unsigned DEFAULT NULL,
  `copay_amt_mail_ordr_general` text,
  `copay_amt_mail_ordr_general_lvl` tinyint(3) unsigned DEFAULT NULL,
  `coins_amt_mail_ordr_general` text,
  `coins_amt_mail_ordr_general_lvl` tinyint(3) unsigned DEFAULT NULL,
  `is_mdcr_dfnd_std_yn` varchar(1) DEFAULT NULL,
  `post_thrshld_mdcr_std_cost` tinyint(3) unsigned DEFAULT NULL,
  PRIMARY KEY (`plandrugcostsharing_id`),
  KEY `contract_id` (`contract_id`),
  KEY `segment_id` (`segment_id`),
  KEY `plan_id` (`plan_id`),
  KEY `plan_cvrg_typ_id` (`plan_cvrg_typ_id`),
  KEY `language_id` (`language_id`)
) ENGINE=InnoDB AUTO_INCREMENT=82 DEFAULT CHARSET=utf8;



# Dump of table vwplandrugtiercost
# ------------------------------------------------------------

CREATE TABLE `vwplandrugtiercost` (
  `plundrugtiercost_id` int(11) NOT NULL AUTO_INCREMENT,
  `Language` text,
  `segment_id` int(11) NOT NULL,
  `contract_id` varchar(255) NOT NULL DEFAULT '',
  `plan_id` int(11) NOT NULL,
  `contract_year` int(4) NOT NULL,
  `language_id` int(10) DEFAULT NULL,
  `tier_level` int(10) DEFAULT NULL,
  `tier_label` text,
  `tier_type_desc` text,
  `cost_share_pref` text,
  `cost_share_gen` text,
  `exception_tier_ind` int(10) DEFAULT NULL,
  PRIMARY KEY (`plundrugtiercost_id`),
  KEY `segment_id` (`segment_id`),
  KEY `contract_id` (`contract_id`),
  KEY `plan_id` (`plan_id`)
) ENGINE=InnoDB AUTO_INCREMENT=348601 DEFAULT CHARSET=utf8;



# Dump of table vwplaninfobycounty_part1
# ------------------------------------------------------------

CREATE TABLE `vwplaninfobycounty_part1` (
  `planinfobycountry1_id` int(11) NOT NULL AUTO_INCREMENT,
  `contract_id` int(11) NOT NULL,
  `plan_id` int(11) NOT NULL,
  `segment_id` int(11) NOT NULL,
  `contract_year` text,
  `org_name` text,
  `plan_name` text,
  `sp_plan_name` text,
  `geo_name` text,
  `tax_stus_cd` varchar(1) DEFAULT NULL,
  `tax_status_desc` text,
  `sp_tax_status_desc` text,
  `plan_type` int(10) DEFAULT NULL,
  `plan_type_desc` text,
  `web_address` text,
  `partd_wb_adr` text,
  `frmlry_wbst_adr` text,
  `phrmcy_wbst_adr` text,
  `fed_approval_status` text,
  `sp_fed_approval_status` text,
  `pos_available_flag` text,
  `mail_ordr_avlblty` text,
  `cvrg_gap_ofrd` text,
  `cvrg_gap_ind` int(10) DEFAULT NULL,
  `cvrg_gap_desc` text,
  `contract_important_note` text,
  `sp_contract_important_note` text,
  `plan_important_note` text,
  `sp_plan_important_note` text,
  `segment_important_note` text,
  `sp_segment_important_note` text,
  `legal_entity_name` text,
  `trade_name` text,
  `network_english` text,
  `network_spanish` text,
  `contact_person` text,
  `street_address` text,
  `city` text,
  `state_code` text,
  `zip_code` text,
  `email_prospective` text,
  `local_phone_prospective` text,
  `tollfree_phone_prospective` text,
  `local_tty_prospective` text,
  `tollfree_tty_prospective` text,
  `email_current` text,
  `local_phone_current` text,
  `tollfree_phone_current` text,
  `local_tty_current` text,
  `tollfree_tty_current` text,
  `contact_person_pd` text,
  `street_address_pd` text,
  `city_pd` text,
  `state_code_pd` text,
  `zip_code_pd` text,
  `email_prospective_pd` text,
  `local_phone_prospective_pd` text,
  `tollfree_phone_prospective_pd` text,
  `local_tty_prospective_pd` text,
  `tollfree_tty_prospective_pd` text,
  `email_current_pd` text,
  `local_phone_current_pd` text,
  `tollfree_phone_current_pd` text,
  `local_tty_current_pd` text,
  `tollfree_tty_current_pd` text,
  `ma_pd_indicator` text,
  `ppo_pd_indicator` text,
  `snp_id` varchar(1) DEFAULT NULL,
  `snp_desc` text,
  `sp_snp_desc` text,
  `lis_100` text,
  `lis_75` text,
  `lis_50` text,
  `lis_25` text,
  `regional_indicator` text,
  `CountyFIPSCode` int(10) DEFAULT NULL,
  PRIMARY KEY (`planinfobycountry1_id`),
  KEY `contract_id` (`contract_id`),
  KEY `plan_id` (`plan_id`),
  KEY `segment_id` (`segment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table vwplaninfobycounty_part2
# ------------------------------------------------------------

CREATE TABLE `vwplaninfobycounty_part2` (
  `planinfobycountry2_id` int(11) NOT NULL AUTO_INCREMENT,
  `contract_id` varchar(11) NOT NULL,
  `plan_id` int(11) NOT NULL,
  `segment_id` int(11) NOT NULL,
  `contract_year` text,
  `org_name` text,
  `plan_name` text,
  `sp_plan_name` text,
  `geo_name` text,
  `tax_stus_cd` varchar(1) DEFAULT NULL,
  `tax_status_desc` text,
  `sp_tax_status_desc` text,
  `plan_type` int(10) DEFAULT NULL,
  `plan_type_desc` text,
  `web_address` text,
  `partd_wb_adr` text,
  `frmlry_wbst_adr` text,
  `phrmcy_wbst_adr` text,
  `fed_approval_status` text,
  `sp_fed_approval_status` text,
  `pos_available_flag` text,
  `mail_ordr_avlblty` text,
  `cvrg_gap_ofrd` text,
  `cvrg_gap_ind` int(10) DEFAULT NULL,
  `cvrg_gap_desc` text,
  `contract_important_note` text,
  `sp_contract_important_note` text,
  `plan_important_note` text,
  `sp_plan_important_note` text,
  `segment_important_note` text,
  `sp_segment_important_note` text,
  `legal_entity_name` text,
  `trade_name` text,
  `network_english` text,
  `network_spanish` text,
  `contact_person` text,
  `street_address` text,
  `city` text,
  `state_code` text,
  `zip_code` text,
  `email_prospective` text,
  `local_phone_prospective` text,
  `tollfree_phone_prospective` text,
  `local_tty_prospective` text,
  `tollfree_tty_prospective` text,
  `email_current` text,
  `local_phone_current` text,
  `tollfree_phone_current` text,
  `local_tty_current` text,
  `tollfree_tty_current` text,
  `contact_person_pd` text,
  `street_address_pd` text,
  `city_pd` text,
  `state_code_pd` text,
  `zip_code_pd` text,
  `email_prospective_pd` text,
  `local_phone_prospective_pd` text,
  `tollfree_phone_prospective_pd` text,
  `local_tty_prospective_pd` text,
  `tollfree_tty_prospective_pd` text,
  `email_current_pd` text,
  `local_phone_current_pd` text,
  `tollfree_phone_current_pd` text,
  `local_tty_current_pd` text,
  `tollfree_tty_current_pd` text,
  `ma_pd_indicator` text,
  `ppo_pd_indicator` text,
  `snp_id` varchar(1) DEFAULT NULL,
  `snp_desc` text,
  `sp_snp_desc` text,
  `lis_100` text,
  `lis_75` text,
  `lis_50` text,
  `lis_25` text,
  `regional_indicator` text,
  `CountyFIPSCode` int(10) DEFAULT NULL,
  PRIMARY KEY (`planinfobycountry2_id`),
  KEY `contract_id` (`contract_id`),
  KEY `plan_id` (`plan_id`),
  KEY `segment_id` (`segment_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;



# Dump of table vwplanrating_domains
# ------------------------------------------------------------

CREATE TABLE `vwplanrating_domains` (
  `planraitings_domains_id` int(11) NOT NULL AUTO_INCREMENT,
  `Contract_ID` int(11) NOT NULL,
  `Domain_Name` text,
  `Domain_Star_Rating` text,
  `Language` text,
  `FIPS_County_Code` text,
  PRIMARY KEY (`planraitings_domains_id`),
  KEY `Contract_ID` (`Contract_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table vwplanrating_measures
# ------------------------------------------------------------

CREATE TABLE `vwplanrating_measures` (
  `planraiting_measures_id` int(11) NOT NULL AUTO_INCREMENT,
  `Contract_ID` int(11) NOT NULL,
  `Measure_Name` text,
  `Star_Rating` text,
  `Number_Star_Rating` text,
  `Language` text,
  `FIPS_County_Code` text,
  PRIMARY KEY (`planraiting_measures_id`),
  KEY `Contract_ID` (`Contract_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table vwplanrating_measures_prevyear
# ------------------------------------------------------------

CREATE TABLE `vwplanrating_measures_prevyear` (
  `planraiting_measures_prevyear_id` int(11) NOT NULL AUTO_INCREMENT,
  `Contract_ID` int(11) NOT NULL,
  `Language` text,
  `Domain_Name` text,
  `Measure_Name` text,
  `Star_Rating` text,
  `Number_Star_Rating` text,
  `FIPS_County_Code` text,
  PRIMARY KEY (`planraiting_measures_prevyear_id`),
  KEY `Contract_ID` (`Contract_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table vwplanrating_poorperformers
# ------------------------------------------------------------

CREATE TABLE `vwplanrating_poorperformers` (
  `planraiting_poorperformers_id` int(11) NOT NULL AUTO_INCREMENT,
  `Contract_ID` int(11) NOT NULL,
  `Plan_ID` int(11) NOT NULL,
  `Poor_Performer` text,
  `Language` text,
  PRIMARY KEY (`planraiting_poorperformers_id`),
  KEY `Contract_ID` (`Contract_ID`),
  KEY `Plan_ID` (`Plan_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;



# Dump of table vwplanrating_summaryscores
# ------------------------------------------------------------

CREATE TABLE `vwplanrating_summaryscores` (
  `palnraiting_summaryscores_id` int(11) NOT NULL AUTO_INCREMENT,
  `Contract_ID` int(11) NOT NULL,
  `Summary_Score` text,
  `Star_Rating_Current` text,
  `Star_Rating_Previous` text,
  `lang_dscrptn` text,
  PRIMARY KEY (`palnraiting_summaryscores_id`),
  KEY `Contract_ID` (`Contract_ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table vwplansbystate_local
# ------------------------------------------------------------

CREATE TABLE `vwplansbystate_local` (
  `planbystate_id` int(11) NOT NULL AUTO_INCREMENT,
  `state_name` text,
  `name` text,
  `addr` text,
  `city` text,
  `abbrev` text,
  `zip` text,
  `webaddr` text,
  `textcond` text,
  `sp_text_cond` text,
  `description` text,
  `over65` smallint(5) DEFAULT NULL,
  `under65` smallint(5) DEFAULT NULL,
  `na_available` smallint(5) DEFAULT NULL,
  `community` smallint(5) DEFAULT NULL,
  `issue` smallint(5) DEFAULT NULL,
  `attained` smallint(5) DEFAULT NULL,
  `na_rating` smallint(5) DEFAULT NULL,
  `last_mod` text,
  PRIMARY KEY (`planbystate_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table vwplansbyzipnew_local
# ------------------------------------------------------------

CREATE TABLE `vwplansbyzipnew_local` (
  `palnbyzipnew_id` int(11) NOT NULL AUTO_INCREMENT,
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
  `last_mod` text,
  PRIMARY KEY (`palnbyzipnew_id`)
) ENGINE=InnoDB AUTO_INCREMENT=24283 DEFAULT CHARSET=utf8;



# Dump of table vwplanservices
# ------------------------------------------------------------

CREATE TABLE `vwplanservices` (
  `palnsevices_id` int(11) NOT NULL AUTO_INCREMENT,
  `Language` char(25) NOT NULL,
  `Contract_Year` int(4) NOT NULL,
  `Contract_ID` int(5) NOT NULL,
  `Plan_ID` int(3) NOT NULL,
  `Segment_ID` int(1) NOT NULL,
  `CategoryDescription` text,
  `CategoryCode` bigint(4) NOT NULL,
  `Benefit` text,
  `package_name` text,
  `package_id` int(3) NOT NULL,
  `sentences_sort_order` int(2) DEFAULT NULL,
  PRIMARY KEY (`palnsevices_id`),
  KEY `Contract_ID` (`Contract_ID`),
  KEY `Plan_ID` (`Plan_ID`),
  KEY `Segment_ID` (`Segment_ID`),
  KEY `package_id` (`package_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table vwregionalcontractserviceareas_local
# ------------------------------------------------------------

CREATE TABLE `vwregionalcontractserviceareas_local` (
  `regionalcontractseviceareas_id` int(11) NOT NULL AUTO_INCREMENT,
  `contract_id` int(11) NOT NULL,
  `region_id` int(10) NOT NULL,
  `region_description` text,
  `contract_year` int(11) NOT NULL,
  PRIMARY KEY (`regionalcontractseviceareas_id`),
  KEY `contract_id` (`contract_id`),
  KEY `region_id` (`region_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
