use `miya`;

DROP TABLE if exists `notifications`;
CREATE TABLE `notifications` 
(	
	`notification id` int auto_increment,
    `status`  enum(
			'read',
            'unread')
	NOT NULL,
    `for?`  set(
			'master',
            'admin',
            'customer') 
	NOT NULL,
    `category` enum(
			'order submission',
            'service request',
            'check out request') 
	NOT NULL,
    `table occupancy id` int NOT NULL,
    `individual visit id` int NOT NULL,
	`content` varchar(250) NOT NULL,
    PRIMARY KEY (`notification id`),
	FOREIGN KEY (`table occupancy id`) references `table occupancy`(`table occupancy id`) on delete cascade,
  	FOREIGN KEY (`table occupancy id`) references `table occupancy`(`table occupancy id`) on update cascade,
	FOREIGN KEY (`individual visit id`) references `individual visits`(`individual visit id`) on delete cascade,
  	FOREIGN KEY (`individual visit id`) references `individual visits`(`individual visit id`) on update cascade
    
);