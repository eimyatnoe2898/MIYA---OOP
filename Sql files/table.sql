use miya;

DROP TABLE IF EXISTS `tables`;
create table `tables`
(
	`table number` int not null,
    `capacity` int not null,
    primary key (`table number`)
);

INSERT INTO `tables`values(1, 4);
INSERT INTO `tables`values(2, 4), (3, 4), (4, 4), (5,4), (6,4), (7,4), (8,8), (9,8), (10,8);

select * from `tables`;

DROP TABLE if exists `table occupancy`;
CREATE TABLE `table occupancy` 
(
	`table occupancy id` int auto_increment,
    `table number` int not null,
    `occupancy status` enum (
		'checked in',
		'checked out') NOT NULL,
	`checked in at` timestamp default current_timestamp,
    `checked out at` timestamp,
    PRIMARY KEY (`table occupancy id`),
    FOREIGN KEY (`table number`) references `tables`(`table number`) on delete cascade,
	FOREIGN KEY (`table number`) references `tables`(`table number`) on update cascade
)
;

INSERT INTO `table occupancy` (`table number`, `occupancy status`) VALUES
(2, 'checked out');
UPDATE `table occupancy`
SET `occupancy status` = 'checked in'
WHERE `table number` = 2;
INSERT INTO `table occupancy` (`table number`, `occupancy status`, `checked out at`) VALUES (10, 'checked in', '2022-07-11 23:44:59');
select * from `table occupancy`;

