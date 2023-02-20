-- const reference table for food menu sub categories
DROP TABLE if exists `sub customers`;
CREATE TABLE `sub customers`
(
	`sub customer id` int auto_increment,
	`name` varchar(50) NOT NULL,
	`main visit id` int NOT NULL,
    `table occupancy id` int,
    primary key (`sub customer id`),
	FOREIGN KEY(`main visit id`) references `individual visits`(`individual visit id`) on delete cascade,
	FOREIGN KEY(`main visit id`) references `individual visits`(`individual visit id`) on update cascade,
	FOREIGN KEY(`table occupancy id`) references `table occupancy`(`table occupancy id`) on delete cascade,
	FOREIGN KEY(`table occupancy id`) references `table occupancy`(`table occupancy id`) on update cascade
);

select * from `sub customers`;

delete from `sub customers`;
