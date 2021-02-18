CREATE DATABASE "uballers";

CREATE TABLE `uballers`.`user` ( 
    `id` INT NOT NULL AUTO_INCREMENT , 
    `email` VARCHAR(320) NULL , 
    `phone` VARCHAR(10) NULL , 
    `password` VARCHAR(80) NOT NULL , 
    `name_first` VARCHAR(60) NULL , 
    `name_last` VARCHAR(120) NULL , 
    `birthday` DATE NULL , 
    `gender` ENUM('null','man','woman','') NULL , 
    PRIMARY KEY (`id`)
) ENGINE = InnoDB;
