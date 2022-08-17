use `miya`;


DROP TABLE if exists `food orders`;
CREATE TABLE `food orders`
(
	`individual visit id` int NOT NULL,
    `food order id` int auto_increment,
    `menubook id` varchar(10) NOT NULL,
	`meal` enum(
			'Lunch',
            'Dinner',
            'Lunch/Dinner') 
	NOT NULL,
    `name` varchar(50) NOT NULL,
	`price` decimal(10,2) NOT NULL,
	`quantity` int NOT NULL,
    `to go?` boolean NOT NULL,
	`total price` decimal(10,2) NOT NULL,
	`order status` varchar(25) NOT NULL,
    `customer notes` varchar(250) default null,
    PRIMARY KEY(`food order id`),
	FOREIGN KEY (`menubook id`, `meal`, `name`, `price`) references `food menus`(`menubook id`, `meal`, `name`, `price`) on delete cascade,
  	FOREIGN KEY (`menubook id`, `meal`, `name`, `price`) references `food menus`(`menubook id`, `meal`, `name`, `price`) on update cascade
);



DROP TABLE if exists `drink orders`;
CREATE TABLE `drink orders`
(
	`individual visit id` int NOT NULL,
    `drink order id` int auto_increment,
	`main category` varchar(50) NOT NULL,
    `name` varchar(50) NOT NULL,
    `size` varchar(25),
    `flavors/types` varchar(50) default null,
	`price` decimal(10,2) NOT NULL,
	`quantity` int NOT NULL,
    `to go?` boolean NOT NULL,
	`total price` decimal(10,2) NOT NULL,
	`order status` varchar(25) NOT NULL,
    `customer notes` varchar(250) default null,
    PRIMARY KEY(`drink order id`),
	FOREIGN KEY (`main category`, `name`, `size`, `price`) references `drink menus`(`main category`, `name`, `size`, `price`) on delete cascade,
  	FOREIGN KEY (`main category`, `name`, `size`, `price`) references `drink menus`(`main category`, `name`, `size`, `price`) on update cascade
);


DROP TABLE if exists `order records`;
CREATE TABLE `order records`
(
-- 	`order id` int NOT NULL,
	`individual visit id` int NOT NULL,
    `menu type` varchar(5) NOT NULL,
    `menubook id` varchar(10) NOT NULL,
	`meal` enum(
			'Lunch',
            'Dinner',
            'Lunch/Dinner') 
	NOT NULL,
    `main category` varchar(50) NOT NULL,
    `name` varchar(50) NOT NULL,
    `size` varchar(25),
    `flavors/types` varchar(50) NOT NULL,
	`price` decimal(10,2) NOT NULL,
	`notes` longtext DEFAULT NULL,
	`quantity` int NOT NULL,
    `to go` boolean NOT NULL,
	`total price` decimal(10,2) NOT NULL,
	`order status` varchar(25) NOT NULL,
    `customer notes` varchar(250) default null,
	FOREIGN KEY (`menubook id`, `meal`, `name`, `price`) references `food menus`(`menubook id`, `meal`, `name`, `price`) on delete cascade,
  	FOREIGN KEY (`menubook id`, `meal`, `name`, `price`) references `food menus`(`menubook id`, `meal`, `name`, `price`) on update cascade,
	FOREIGN KEY (`main category`, `name`, `size`, `price`) references `drink menus`(`main category`, `name`, `size`, `price`) on delete cascade,
  	FOREIGN KEY (`main category`, `name`, `size`, `price`) references `drink menus`(`main category`, `name`, `size`, `price`) on update cascade,
	FOREIGN KEY (`name`, `flavors/types`) references `drink flavors/types`(`name`, `flavors/types`) on delete cascade,
	FOREIGN KEY (`name`, `flavors/types`) references `drink flavors/types`(`name`,`flavors/types`) on update cascade
    );
-- food menus primary key
-- ADD PRIMARY KEY (`menubook id`, `meal`, `name`, `price`);


-- drink menus primary ke-- 
-- ADD PRIMARY KEY (`main category`, `name`, `size`, `price`);

