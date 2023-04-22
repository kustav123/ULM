CREATE TABLE `testulm`.`store` (`id` INT NOT NULL AUTO_INCREMENT , `strid` VARCHAR(5) NULL , `strname` VARCHAR(50) NULL , `status` INT NULL , PRIMARY KEY (`id`)) ENGINE = MyISAM;
INSERT INTO `store` ( `strid`, `strname`, `status`) VALUES ( 'HYD', 'Hyderabad', '1'), ( 'VIJ', 'Vijayawada', '1');

ALTER TABLE `act` ADD `store` VARCHAR(5) NULL AFTER `user`;
update act set store = 'HYD'


ALTER TABLE `users` ADD `store` VARCHAR(4) NULL AFTER `onstatus`;
update users set store = 'HYD' ;




-- add photo
ALTER TABLE `users` ADD `photo` VARCHAR(20) NULL AFTER `store`;