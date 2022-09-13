use `miya`;

DROP TABLE if exists `notifications`;
CREATE TABLE `notifications` 
(	
	`notification id` int auto_increment,
    `status`  boolean NOT NULL default 0,
    `for`  set(
			'master',
            'admin',
            'customer') 
	NOT NULL,
    `category` enum(
			'check in',
			'order submission',
            'service request',
            'check out request') 
	NOT NULL,
--     `table occupancy id` int NOT NULL,
    `individual visit id` int NOT NULL,
	`content` varchar(250) NOT NULL,
    PRIMARY KEY (`notification id`),
-- 	FOREIGN KEY (`table occupancy id`) references `table occupancy`(`table occupancy id`) on delete cascade,
--   	FOREIGN KEY (`table occupancy id`) references `table occupancy`(`table occupancy id`) on update cascade,
	FOREIGN KEY (`individual visit id`) references `individual visits`(`individual visit id`) on delete cascade,
  	FOREIGN KEY (`individual visit id`) references `individual visits`(`individual visit id`) on update cascade
    
);

INSERT INTO `notifications`(`for`, `category`, `individual visit id`, `content`)
values ();
select * FROM `notifications`;