CREATE TABLE `test`.`country` (`id` INT NOT NULL AUTO_INCREMENT , `city_name` VARCHAR(30) NOT NULL , `status` TINYINT(1) NOT NULL , PRIMARY KEY (`id`)) ENGINE = MyISAM;


CREATE TABLE `test`.`state` (`id` INT NOT NULL AUTO_INCREMENT , `state_name` VARCHAR(30) NOT NULL , `status` TINYINT(1) NOT NULL , PRIMARY KEY (`id`)) ENGINE = MyISAM;

ALTER TABLE `coustomeradd` ADD `state` VARCHAR(20) NOT NULL AFTER `address`, ADD `county` VARCHAR(20) NOT NULL AFTER `state`;


