use miya;

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
UPDATE `table occupancy`
SET `occupancy status` = 'checked out';
delete from `table occupancy`;
