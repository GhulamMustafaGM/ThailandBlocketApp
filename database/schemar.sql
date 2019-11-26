SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL';

CREATE SCHEMA IF NOT EXISTS `blocket` DEFAULT CHARACTER SET latin1 COLLATE latin1_german1_ci ;
USE `blocket` ;

-- -----------------------------------------------------
-- Table `blocket`.`category_group`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `blocket`.`category_group` ;

CREATE  TABLE IF NOT EXISTS `blocket`.`category_group` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(255) NOT NULL ,
  `created_at` TIMESTAMP NULL ,
  `updated_at` TIMESTAMP NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `blocket`.`item_category`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `blocket`.`item_category` ;

CREATE  TABLE IF NOT EXISTS `blocket`.`item_category` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `category_group_id` INT NOT NULL ,
  `name` VARCHAR(255) NOT NULL ,
  `associated_form` VARCHAR(255) NOT NULL DEFAULT 'Default' ,
  `created_at` TIMESTAMP NULL ,
  `updated_at` TIMESTAMP NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_item_category_category_group` (`category_group_id` ASC) ,
  CONSTRAINT `fk_item_category_category_group`
    FOREIGN KEY (`category_group_id` )
    REFERENCES `blocket`.`category_group` (`id` )
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `blocket`.`region`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `blocket`.`region` ;

CREATE  TABLE IF NOT EXISTS `blocket`.`region` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `blocket`.`city`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `blocket`.`city` ;

CREATE  TABLE IF NOT EXISTS `blocket`.`city` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(255) NULL ,
  `created_at` TIMESTAMP NULL ,
  `updated_at` TIMESTAMP NULL ,
  `region_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_city_region1` (`region_id` ASC) ,
  CONSTRAINT `fk_city_region1`
    FOREIGN KEY (`region_id` )
    REFERENCES `blocket`.`region` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `blocket`.`advertisement`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `blocket`.`advertisement` ;

CREATE  TABLE IF NOT EXISTS `blocket`.`advertisement` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `add_title` VARCHAR(255) NOT NULL ,
  `item_category_id` INT NOT NULL ,
  `user_name` VARCHAR(45) NULL ,
  `user_email` VARCHAR(45) NULL ,
  `user_password` VARCHAR(45) NULL ,
  `created_at` TIMESTAMP NULL ,
  `updated_at` TIMESTAMP NULL ,
  `city_id` INT NOT NULL ,
  `description` TEXT NULL ,
  `price` VARCHAR(255) NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_advertisement_item_category1` (`item_category_id` ASC) ,
  INDEX `fk_advertisement_city1` (`city_id` ASC) ,
  CONSTRAINT `fk_advertisement_item_category1`
    FOREIGN KEY (`item_category_id` )
    REFERENCES `blocket`.`item_category` (`id` )
    ON DELETE CASCADE
    ON UPDATE CASCADE,
  CONSTRAINT `fk_advertisement_city1`
    FOREIGN KEY (`city_id` )
    REFERENCES `blocket`.`city` (`id` )
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `blocket`.`user`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `blocket`.`user` ;

CREATE  TABLE IF NOT EXISTS `blocket`.`user` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `email` VARCHAR(255) NOT NULL ,
  `password` VARCHAR(255) NULL ,
  `is_admin` INT NOT NULL DEFAULT 0 ,
  `created_at` TIMESTAMP NULL ,
  `updated_at` TIMESTAMP NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `blocket`.`car_brand`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `blocket`.`car_brand` ;

CREATE  TABLE IF NOT EXISTS `blocket`.`car_brand` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `blocket`.`car_model`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `blocket`.`car_model` ;

CREATE  TABLE IF NOT EXISTS `blocket`.`car_model` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NOT NULL ,
  `car_brand_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_car_model_car_brand1` (`car_brand_id` ASC) ,
  CONSTRAINT `fk_car_model_car_brand1`
    FOREIGN KEY (`car_brand_id` )
    REFERENCES `blocket`.`car_brand` (`id` )
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `blocket`.`type`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `blocket`.`type` ;

CREATE  TABLE IF NOT EXISTS `blocket`.`type` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(255) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `blocket`.`power`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `blocket`.`power` ;

CREATE  TABLE IF NOT EXISTS `blocket`.`power` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `blocket`.`milage`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `blocket`.`milage` ;

CREATE  TABLE IF NOT EXISTS `blocket`.`milage` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `name` VARCHAR(45) NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `blocket`.`details`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `blocket`.`details` ;

CREATE  TABLE IF NOT EXISTS `blocket`.`details` (
  `id` INT NOT NULL ,
  `item_category_id` INT NOT NULL DEFAULT 0 ,
  `car_brand` TINYINT(1)  NULL DEFAULT 0 ,
  `milage` TINYINT(1)  NULL DEFAULT 0 ,
  `power` TINYINT(1)  NULL DEFAULT 0 ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_details_item_category1` (`item_category_id` ASC) ,
  CONSTRAINT `fk_details_item_category1`
    FOREIGN KEY (`item_category_id` )
    REFERENCES `blocket`.`item_category` (`id` )
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `blocket`.`advertisment_image`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `blocket`.`advertisment_image` ;

CREATE  TABLE IF NOT EXISTS `blocket`.`advertisment_image` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `image_path` VARCHAR(255) NOT NULL ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `blocket`.`advertisment_details`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `blocket`.`advertisment_details` ;

CREATE  TABLE IF NOT EXISTS `blocket`.`advertisment_details` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `key_name` VARCHAR(255) NOT NULL ,
  `key_value` VARCHAR(45) NULL ,
  `advertisement_id` INT NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_advertisment_details_advertisement1` (`advertisement_id` ASC) ,
  CONSTRAINT `fk_advertisment_details_advertisement1`
    FOREIGN KEY (`advertisement_id` )
    REFERENCES `blocket`.`advertisement` (`id` )
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;



SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
