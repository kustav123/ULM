CREATE TABLE `testulm`.`store` (`id` INT NOT NULL AUTO_INCREMENT , `strid` VARCHAR(5) NULL , `strname` VARCHAR(50) NULL , `status` INT NULL , PRIMARY KEY (`id`)) ENGINE = MyISAM;
INSERT INTO `store` ( `strid`, `strname`, `status`) VALUES ( 'HYD', 'Hyderabad', '1'), ( 'VIJ', 'Vijayawada', '1');

ALTER TABLE `act` ADD `store` VARCHAR(5) NULL AFTER `user`;
update act set store = 'HYD'


ALTER TABLE `users` ADD `store` VARCHAR(4) NULL AFTER `onstatus`;
update users set store = 'HYD' ;




-- add photo
ALTER TABLE `users` ADD `photo` VARCHAR(20) NULL AFTER `store`;

ALTER TABLE `castin` ADD `store` VARCHAR(5) NULL;

ALTER TABLE `associate` ADD `store` VARCHAR(5) NULL;
ALTER TABLE `chat` ADD `store` VARCHAR(5) NULL;
ALTER TABLE `coustomeradd` ADD `store` VARCHAR(5) NULL;

ALTER TABLE `executive` ADD `store` VARCHAR(5) NULL;
ALTER TABLE `followup` ADD `store` VARCHAR(5) NULL;
ALTER TABLE `messages` ADD `store` VARCHAR(5) NULL;
ALTER TABLE `notification` ADD `store` VARCHAR(5) NULL;

ALTER TABLE `product` ADD `store` VARCHAR(5) NULL;