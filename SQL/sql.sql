CREATE DATABASE IF NOT EXISTS panther;

CREATE  TABLE IF NOT EXISTS `WT_USERS` (
  `username` VARCHAR(150) NOT NULL ,
  `password` VARCHAR(100) ,
  PRIMARY KEY (`username`) )
ENGINE = InnoDB;

INSERT INTO `WT_USERS` (`username`,`password`)
    VALUES ('admin','adminpass');
INSERT INTO `WT_USERS` (`username`,`password`)
    VALUES ('mohit','igotopes');

SELECT * FROM `wt_users` WHERE username='mohit'