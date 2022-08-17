use `miya`;

DROP TABLE if exists `individual visits`;
CREATE TABLE `individual visits`
(
	`individual visit id` int auto_increment,
    `member id` int default NULL,  
	`name` varchar(50) NOT NULL,
    `order status`  set(
			'waiting for food',
            'waiting for checkout',
            'browsing menu',
			'dining') 
	default 'browsing menu',
    `customer type`  enum(
			'master',
            'customer') 
	default 'customer',
--     `signup method` varchar(25) NOT NULL, 
-- 	`table number` int not null,
    `table occupancy id` int default null,
    `checked in at` timestamp default current_timestamp,
    `checked out at` timestamp,
	`logged in` boolean NOT NULL,
    PRIMARY KEY(`individual visit id`),
    FOREIGN KEY(`member id`) references `members`(`id`) on delete cascade,
	FOREIGN KEY(`member id`) references `members`(`id`) on update cascade,
	FOREIGN KEY(`table occupancy id`) references `table occupancy`(`table occupancy id`) on delete cascade,
	FOREIGN KEY(`table occupancy id`) references `table occupancy`(`table occupancy id`) on update cascade
    
);

INSERT INTO `individual visits`(`member id`, `name`, `order status`, `customer type`, `logged in?`)
values (8, 'Ei','browsing menu', 'master', 1);

INSERT INTO `individual visits`(`name`, `logged in`) VALUES ('Ei', true);

select * from `individual visits`;

select `individual visit id` from `individual visits` ORDER BY `individual visit id` DESC LIMIT 1;
DROP TABLE if exists `sub customers`;
CREATE TABLE `sub customers` 
(
	`individual visit id` int NOT NULL,
    `sub customer name` varchar(50) NOT NULL,
    PRIMARY KEY (`individual visit id`, `sub customer name`),
	FOREIGN KEY(`individual visit id`) references `individual visits`(`individual visit id`) on delete cascade,
	FOREIGN KEY(`individual visit id`) references `individual visits`(`individual visit id`) on update cascade
);	


CREATE TABLE `test`
(
	`name` varchar(50) NOT NULL,
    `logged in?` boolean not null
);

