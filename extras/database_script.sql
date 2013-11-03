SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

DROP SCHEMA IF EXISTS `miton` ;
CREATE SCHEMA IF NOT EXISTS `miton` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci ;
USE `miton` ;

-- -----------------------------------------------------
-- Table `miton`.`usuario`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `miton`.`usuario` ;

CREATE  TABLE IF NOT EXISTS `miton`.`usuario` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(150) NOT NULL ,
  `email` VARCHAR(100) NOT NULL ,
  `password` VARCHAR(100) NOT NULL ,
  `activo` ENUM('0','1') NOT NULL DEFAULT '0' ,
  `llave_activacion` VARCHAR(150) NOT NULL ,
  `ulltima_visita` DATETIME NOT NULL ,
  `cont_fallos` INT NOT NULL ,
  `bloqueado` TINYINT(1) NOT NULL DEFAULT 0 ,
  `imagen` VARCHAR(150) NULL ,
  `fecha_creada` DATE NULL ,
  PRIMARY KEY (`id`) ,
  UNIQUE INDEX `correo_UNIQUE` (`email` ASC) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `miton`.`pais`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `miton`.`pais` ;

CREATE  TABLE IF NOT EXISTS `miton`.`pais` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(45) NOT NULL ,
  `activo` TINYINT(1) NOT NULL DEFAULT 1 ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `miton`.`categoria`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `miton`.`categoria` ;

CREATE  TABLE IF NOT EXISTS `miton`.`categoria` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(150) NOT NULL ,
  `activo` TINYINT(1) NOT NULL DEFAULT 1 ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `miton`.`estado`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `miton`.`estado` ;

CREATE  TABLE IF NOT EXISTS `miton`.`estado` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `nombre` VARCHAR(150) NOT NULL ,
  `activo` TINYINT(1) NOT NULL DEFAULT 1 ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `miton`.`tag`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `miton`.`tag` ;

CREATE  TABLE IF NOT EXISTS `miton`.`tag` (
  `id` INT NOT NULL ,
  `nombre` VARCHAR(150) NOT NULL ,
  `activo` TINYINT(1) NOT NULL DEFAULT 1 ,
  `frecuencia` INT NOT NULL DEFAULT 0 ,
  PRIMARY KEY (`id`) )
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `miton`.`ciudad`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `miton`.`ciudad` ;

CREATE  TABLE IF NOT EXISTS `miton`.`ciudad` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `pais_id` INT NOT NULL ,
  `nombre` VARCHAR(140) NOT NULL ,
  `activo` VARCHAR(45) NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_ciudad_pais1_idx` (`pais_id` ASC) ,
  CONSTRAINT `fk_ciudad_pais1`
    FOREIGN KEY (`pais_id` )
    REFERENCES `miton`.`pais` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `miton`.`tienda`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `miton`.`tienda` ;

CREATE  TABLE IF NOT EXISTS `miton`.`tienda` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `usuario_id` INT NOT NULL ,
  `ciudad_id` INT NOT NULL ,
  `nombre` VARCHAR(150) NOT NULL ,
  `direccion` TEXT NOT NULL ,
  `activo` TINYINT(1) NOT NULL DEFAULT 1 ,
  `ruta` VARCHAR(150) NOT NULL ,
  `fecha_creada` DATE NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_tienda_usuario_idx` (`usuario_id` ASC) ,
  INDEX `fk_tienda_ciudad1_idx` (`ciudad_id` ASC) ,
  CONSTRAINT `fk_tienda_usuario`
    FOREIGN KEY (`usuario_id` )
    REFERENCES `miton`.`usuario` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_tienda_ciudad1`
    FOREIGN KEY (`ciudad_id` )
    REFERENCES `miton`.`ciudad` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `miton`.`producto`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `miton`.`producto` ;

CREATE  TABLE IF NOT EXISTS `miton`.`producto` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `tienda_id` INT NOT NULL ,
  `categoria_id` INT NOT NULL ,
  `estado_id` INT NOT NULL ,
  `nombre` VARCHAR(150) NOT NULL ,
  `descripcion` TEXT NOT NULL ,
  `precio` DOUBLE NOT NULL ,
  `activo` TINYINT(1) NOT NULL DEFAULT 1 ,
  `fecha_creada` DATE NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_producto_tienda1_idx` (`tienda_id` ASC) ,
  INDEX `fk_producto_categoria1_idx` (`categoria_id` ASC) ,
  INDEX `fk_producto_estado1_idx` (`estado_id` ASC) ,
  CONSTRAINT `fk_producto_tienda1`
    FOREIGN KEY (`tienda_id` )
    REFERENCES `miton`.`tienda` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_producto_categoria1`
    FOREIGN KEY (`categoria_id` )
    REFERENCES `miton`.`categoria` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_producto_estado1`
    FOREIGN KEY (`estado_id` )
    REFERENCES `miton`.`estado` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `miton`.`seleccion`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `miton`.`seleccion` ;

CREATE  TABLE IF NOT EXISTS `miton`.`seleccion` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `producto_id` INT NOT NULL ,
  `usuario_id` INT NOT NULL ,
  `cancelada` TINYINT(1) NOT NULL DEFAULT 1 ,
  `fecha_creada` DATE NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_seleccion_producto1_idx` (`producto_id` ASC) ,
  INDEX `fk_seleccion_usuario1_idx` (`usuario_id` ASC) ,
  CONSTRAINT `fk_seleccion_producto1`
    FOREIGN KEY (`producto_id` )
    REFERENCES `miton`.`producto` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_seleccion_usuario1`
    FOREIGN KEY (`usuario_id` )
    REFERENCES `miton`.`usuario` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `miton`.`telefono`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `miton`.`telefono` ;

CREATE  TABLE IF NOT EXISTS `miton`.`telefono` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `usuario_id` INT NOT NULL ,
  `telefono` VARCHAR(45) NOT NULL ,
  `activo` TINYINT(1) NOT NULL DEFAULT 1 ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_telefono_usuario1_idx` (`usuario_id` ASC) ,
  CONSTRAINT `fk_telefono_usuario1`
    FOREIGN KEY (`usuario_id` )
    REFERENCES `miton`.`usuario` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `miton`.`imagen_producto`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `miton`.`imagen_producto` ;

CREATE  TABLE IF NOT EXISTS `miton`.`imagen_producto` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `producto_id` INT NOT NULL ,
  `ruta` VARCHAR(150) NOT NULL ,
  `activo` TINYINT(1) NOT NULL DEFAULT 1 ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_imagen_producto_producto1_idx` (`producto_id` ASC) ,
  CONSTRAINT `fk_imagen_producto_producto1`
    FOREIGN KEY (`producto_id` )
    REFERENCES `miton`.`producto` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `miton`.`detalle`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `miton`.`detalle` ;

CREATE  TABLE IF NOT EXISTS `miton`.`detalle` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `producto_id` INT NOT NULL ,
  `nombre` VARCHAR(150) NOT NULL ,
  `activo` TINYINT(1) NOT NULL DEFAULT 1 ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_detalle_producto1_idx` (`producto_id` ASC) ,
  CONSTRAINT `fk_detalle_producto1`
    FOREIGN KEY (`producto_id` )
    REFERENCES `miton`.`producto` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `miton`.`oferta`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `miton`.`oferta` ;

CREATE  TABLE IF NOT EXISTS `miton`.`oferta` (
  `id` INT NOT NULL AUTO_INCREMENT ,
  `producto_id` INT NOT NULL ,
  `activo` TINYINT(1) NOT NULL DEFAULT 1 ,
  `fecha_creacion` DATETIME NOT NULL ,
  `fecha_termina` DATETIME NOT NULL ,
  PRIMARY KEY (`id`) ,
  INDEX `fk_oferta_producto1_idx` (`producto_id` ASC) ,
  CONSTRAINT `fk_oferta_producto1`
    FOREIGN KEY (`producto_id` )
    REFERENCES `miton`.`producto` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `miton`.`producto_tag`
-- -----------------------------------------------------
DROP TABLE IF EXISTS `miton`.`producto_tag` ;

CREATE  TABLE IF NOT EXISTS `miton`.`producto_tag` (
  `tag_id` INT NOT NULL ,
  `producto_id` INT NOT NULL ,
  INDEX `fk_producto_tag_producto1_idx` (`producto_id` ASC) ,
  UNIQUE INDEX `tag_id_UNIQUE` (`tag_id` ASC) ,
  CONSTRAINT `fk_producto_tag_tag1`
    FOREIGN KEY (`tag_id` )
    REFERENCES `miton`.`tag` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_producto_tag_producto1`
    FOREIGN KEY (`producto_id` )
    REFERENCES `miton`.`producto` (`id` )
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

USE `miton` ;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
