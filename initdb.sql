/* falta criar a database... tenho no meu notebook mas só posso acessar a tarde rs. mas é só criar ela aqui (chamei de usersdb)
e fazer "use usersdb" antes de começar a criar as tables */
DROP DATABASE IF EXISTS `piquepei`;
CREATE DATABASE IF NOT EXISTS `piquepei`
DEFAULT CHARACTER SET = utf8;

USE 'piquepei'

DROP TABLE IF EXISTS `users` ;
CREATE TABLE IF NOT EXISTS `users` (
  `id` VARCHAR(255) NULL DEFAULT NULL,
  `name` VARCHAR(255) NULL DEFAULT NULL,
  `username` VARCHAR(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
  DEFAULT CHARACTER SET = utf8;

LOAD DATA INFILE "/home/sigkill/Desktop/users-data/users.csv" INTO TABLE users COLUMNS TERMINATED BY ',' OPTIONALLY ENCLOSED BY '"' LINES TERMINATED BY '\r\n' (id, name, username);


DROP TABLE IF EXISTS `relevancia1` ;
CREATE TABLE IF NOT EXISTS `relevancia1` (
  `id` VARCHAR(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
DEFAULT CHARACTER SET = utf8;


DROP TABLE IF EXISTS `relevancia2` ;
CREATE TABLE IF NOT EXISTS `relevancia2` (
  `id` VARCHAR(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id`))
DEFAULT CHARACTER SET = utf8;


LOAD DATA INFILE "/home/sigkill/Desktop/users-data/listarelevancia1.txt" INTO TABLE relevancia1 COLUMNS TERMINATED BY '\n' LINES TERMINATED BY '\n' (id);

LOAD DATA INFILE "/home/sigkill/Desktop/users-data/listarelevancia2.txt" INTO TABLE relevancia2 COLUMNS TERMINATED BY '\n' LINES TERMINATED BY '\n' (id);

-- flush privileges;
-- grant all privileges on *.* to 'root'@'%' with grant option;

quit
