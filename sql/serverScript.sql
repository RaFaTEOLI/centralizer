CREATE DATABASE IF NOT EXISTS centralizer;

USE centralizer;

CREATE TABLE sql_updates_global (
	id INT(10) NOT NULL AUTO_INCREMENT,
	command TEXT NOT NULL,
	description TEXT NULL DEFAULT NULL,
	created_at DATETIME NULL DEFAULT NULL,
	PRIMARY KEY (id)
);

CREATE TABLE ssh_updates_global (
	id INT(10) NOT NULL AUTO_INCREMENT,
	command TEXT NOT NULL,
	description TEXT NULL DEFAULT NULL,
	created_at DATETIME NULL DEFAULT NULL,
	PRIMARY KEY (id)
);