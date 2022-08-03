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
	NOT NULL,
    `customer type`  enum(
			'master',
            'sub-customer',
            'customer') 
	NOT NULL,
--     `signup method` varchar(25) NOT NULL, 
-- 	`table number` int not null,
    `table occupancy id` int default null,
    `checked in at` timestamp default current_timestamp,
    `checked out at` timestamp,
	`logged in?` boolean NOT NULL,
    PRIMARY KEY(`individual visit id`),
    FOREIGN KEY(`member id`) references `members`(`id`) on delete cascade,
	FOREIGN KEY(`member id`) references `members`(`id`) on update cascade,
	FOREIGN KEY(`table occupancy id`) references `table occupancy`(`table occupancy id`) on delete cascade,
	FOREIGN KEY(`table occupancy id`) references `table occupancy`(`table occupancy id`) on update cascade
    
);

INSERT INTO `individual visits`(`member id`, `name`, `order status`, `customer type`, `logged in?`)
values (8, 'Ei','browsing menu', 'master', 1);