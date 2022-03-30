CREATE TABLE `tarefa1503`.`cidade` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NULL,
  PRIMARY KEY (`id`));

  CREATE TABLE `tarefa1503`.`estado` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(45) NULL,
  `sigla` VARCHAR(45) NULL,
  PRIMARY KEY (`id`));

  INSERT INTO `tarefa1503`.`cidade` (`name`) VALUES ('rio do sul');
INSERT INTO `tarefa1503`.`cidade` (`name`) VALUES ('blumenau');
INSERT INTO `tarefa1503`.`cidade` (`name`) VALUES ('floripa');
INSERT INTO `tarefa1503`.`cidade` (`name`) VALUES ('joinvile');

INSERT INTO `tarefa1503`.`estado` (`name`, `sigla`) VALUES ('santa catarina', 'sc');
INSERT INTO `tarefa1503`.`estado` (`name`, `sigla`) VALUES ('rio grande do sul', 'rs');
INSERT INTO `tarefa1503`.`estado` (`name`, `sigla`) VALUES ('parana', 'pr');
