drop database if exists miya;
create database miya;
use miya;

DROP TABLE if exists `members`;
CREATE TABLE `important quality` (
	`id` int auto_increment,
    `first name` varchar(25) NOT NULL,
    `last name` varchar(25),
    `birthday` date,
    `password` varchar(255) NOT NULL,
    `city` varchar(25),
    `state` varchar(25),
    `phone number` varchar(50),
    `created_at` timestamp NOT NULL default current_timestamp,

	PRIMARY KEY(`id`)
);