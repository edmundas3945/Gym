CREATE TABLE `gym`.`feedback` ( `id` INT NOT NULL AUTO_INCREMENT , `comentator` VARCHAR(30) NOT NULL , `comment` TEXT NOT NULL , `created_at` DATETIME on update CURRENT_TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP , PRIMARY KEY (`id`)) ENGINE = InnoDB;