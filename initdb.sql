--DROP DATABASE IF EXISTS `piquepei`;
CREATE DATABASE IF NOT EXISTS `piquepei`
DEFAULT CHARACTER SET = latin1;

USE 'piquepei'

DROP TABLE IF EXISTS `users` ;
CREATE TABLE IF NOT EXISTS `users` (
  `id` VARCHAR(255) DEFAULT NULL,
  `name` VARCHAR(255) DEFAULT NULL,
  `username` VARCHAR(255) DEFAULT NULL)
  DEFAULT CHARACTER SET = latin1;

LOAD DATA INFILE "/home/sigkill/Desktop/users-data/users.csv" INTO TABLE users COLUMNS TERMINATED BY ',' OPTIONALLY ENCLOSED BY '"' LINES TERMINATED BY '\r\n' (id, name, username);


DROP TABLE IF EXISTS `relevancia1` ;
CREATE TABLE IF NOT EXISTS `relevancia1` (
  `id` VARCHAR(255) DEFAULT NULL,
  PRIMARY KEY (`id`))
DEFAULT CHARACTER SET = latin1;


DROP TABLE IF EXISTS `relevancia2` ;
CREATE TABLE IF NOT EXISTS `relevancia2` (
  `id` VARCHAR(255) DEFAULT NULL,
  PRIMARY KEY (`id`))
DEFAULT CHARACTER SET = latin1;


LOAD DATA INFILE "/home/sigkill/Desktop/users-data/lista_relevancia_1.txt" INTO TABLE relevancia1 COLUMNS TERMINATED BY '\n' LINES TERMINATED BY '\n' (id);

LOAD DATA INFILE "/home/sigkill/Desktop/users-data/lista_relevancia_2.txt" INTO TABLE relevancia2 COLUMNS TERMINATED BY '\n' LINES TERMINATED BY '\n' (id);

-- flush privileges;
-- grant all privileges on *.* to 'root'@'%' with grant option;

quit
