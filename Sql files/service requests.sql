use `miya`;

DROP TABLE if exists `service requests`;
CREATE TABLE `service requests`
(
	`individual visit id` int NOT NULL,
    `service requested` enum
	(	'water',
		'cutleries',
        'to go box',
        'others'
    ) NOT NULL,
    primary key(`individual visit id`, `service requested`),
	FOREIGN KEY(`individual visit id`) references `individual visits`(`individual visit id`) on delete cascade,
	FOREIGN KEY(`individual visit id`) references `individual visits`(`individual visit id`) on update cascade
    
);