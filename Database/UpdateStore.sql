ALTER TABLE `act` ADD `store` VARCHAR(5) NULL AFTER `user`;

-- update act set store = 'HYD'

CREATE TABLE `testulm`.`store` (`id` INT NOT NULL AUTO_INCREMENT , `strid` VARCHAR(5) NULL , `strname` VARCHAR(50) NULL , `status` INT NULL , PRIMARY KEY (`id`)) ENGINE = MyISAM;

INSERT INTO `store` ( `strid`, `strname`, `status`) VALUES ( 'HYD', 'Hyderabad', '1'), ( 'VIJ', 'Vijayawada', '1');