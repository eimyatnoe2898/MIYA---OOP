use `miya`;

DROP TABLE if exists `service request records`;
CREATE TABLE `service request records`
(
	`individual visit id` int NOT NULL,
    `service requested` enum
	(	'water',
		'utensils',
        'to go box',
        'check out',
        'table service',
        'paper towel',
        'drink refill',
        'others'
    ) NOT NULL,
	`table occupancy id` int NOT NULL,
    primary key(`individual visit id`, `service requested`),
	FOREIGN KEY(`individual visit id`) references `individual visits`(`individual visit id`) on delete cascade,
	FOREIGN KEY(`individual visit id`) references `individual visits`(`individual visit id`) on update cascade,
	FOREIGN KEY (`table occupancy id`) references `table occupancy`(`table occupancy id`) on delete cascade,
  	FOREIGN KEY (`table occupancy id`) references `table occupancy`(`table occupancy id`) on update cascade
);