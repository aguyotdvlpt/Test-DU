-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema dudb
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema dudb
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `dudb` ;
USE `dudb` ;

-- -----------------------------------------------------
-- Table `dudb`.`danger`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dudb`.`danger` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `listofdanger` VARCHAR(255) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dudb`.`frequency`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dudb`.`frequency` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `value` INT NULL,
  `description` VARCHAR(255) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dudb`.`gravity`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dudb`.`gravity` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `value` INT NULL,
  `description` VARCHAR(255) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dudb`.`sac`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dudb`.`sac` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `value` INT NULL,
  `description` VARCHAR(255) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `dudb`.`du`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `dudb`.`du` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `phase` VARCHAR(255) NULL,
  `danger_id` INT NOT NULL,
  `frequency_id` INT NOT NULL,
  `gravity_id` INT NOT NULL,
  `sac_id` INT NOT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_du_danger_idx` (`danger_id` ASC),
  INDEX `fk_du_frequency1_idx` (`frequency_id` ASC),
  INDEX `fk_du_gravity1_idx` (`gravity_id` ASC),
  INDEX `fk_du_sac1_idx` (`sac_id` ASC),
  CONSTRAINT `fk_du_danger`
    FOREIGN KEY (`danger_id`)
    REFERENCES `dudb`.`danger` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_du_frequency1`
    FOREIGN KEY (`frequency_id`)
    REFERENCES `dudb`.`frequency` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_du_gravity1`
    FOREIGN KEY (`gravity_id`)
    REFERENCES `dudb`.`gravity` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_du_sac1`
    FOREIGN KEY (`sac_id`)
    REFERENCES `dudb`.`sac` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
