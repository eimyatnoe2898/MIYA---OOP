use `miya`;

DROP TABLE IF EXISTS `drink menus`;
CREATE TABLE `drink menus`
(
    `meal` enum(
			'Lunch',
            'Dinner',
            'Lunch/Dinner') 
	NOT NULL,
	`main category` varchar(50) NOT NULL,
    `sub category` varchar(50),
    `name` varchar(125) NOT NULL,
    `size` varchar(25),
    `price` decimal(10,2) NOT NULL,
    `refill?` boolean default false,
    `notes` varchar(50),
	PRIMARY KEY (`main category`, `name`, `size`, `price`),
	FOREIGN KEY(`size`) REFERENCES `drink sizes`(`size`) on delete cascade,
	FOREIGN KEY(`size`) REFERENCES `drink sizes`(`size`) on update cascade,
	FOREIGN KEY(`main category`) REFERENCES `main category`(`main category`) on delete cascade,
	FOREIGN KEY(`main category`) REFERENCES `main category`(`main category`) on update cascade,
	FOREIGN KEY(`sub category`) REFERENCES `sub category`(`sub category`) on delete cascade,
	FOREIGN KEY(`sub category`) REFERENCES `sub category`(`sub category`) on update cascade
);


INSERT INTO `drink menus`(`main category`, `sub category`, `name`, `size`, `price`)
values 
	('Wine', 'Red Wine', 'Angeline Pinot Nior', 'glass', 7.25),
    ('Wine', 'Red Wine', 'Angeline Cabernet', 'glass', 7.25), 
    ('Wine', 'Red Wine', 'Angeline Pinot Nior', 'bottle', 26), 
    ('Wine', 'Red Wine', 'Angeline Cabernet', 'bottle', 26), 
    ('Wine', 'White Wine', 'Canyon Road Moscato', 'glass', 6.25), 
    ('Wine', 'White Wine', 'Benziger Sauv Blanc', 'glass', 8.25), 
    ('Wine', 'White Wine', 'Imagery Chardonnay', 'glass', 8.25), 
    ('Wine', 'White Wine', 'Kinsen Plum Wine', 'glass', 6.25), 
	('Wine', 'White Wine', 'Canyon Road Moscato', 'bottle', 22), 
    ('Wine', 'White Wine', 'Benziger Sauv Blanc', 'bottle', 28), 
    ('Wine', 'White Wine', 'Imagery Chardonnay', 'bottle', 28), 
    ('Wine', 'White Wine', 'Kinsen Plum Wine', 'bottle', 22) 
    ;
    
INSERT INTO `drink menus`(`main category`, `name`, `size`, `price`, `notes`)
values
	('Sake', 'Nigori', 'bottle', 13.25, 'Hot Sake'),
	('Sake', 'Nigori', 'small', 4.75, 'Hot Sake'),
	('Sake', 'Nigori', 'large', 7.75, 'Hot Sake'),
	('Sake', 'Hana Sake', 'bottle', 28.00, null),
	('Sake', 'Hana Sake', 'small', 5.75, null),
	('Sake', 'Hana Sake', 'large', 8.25, null)
    ;

INSERT INTO `drink menus`(`main category`, `name`, `size`, `price`)
values
	('Beer', 'Saporo', 'bottle', 4.00),
	('Beer', 'Saporo', 'can', 6.75),
	('Beer', 'Corona', 'bottle', 4.00),
	('Beer', 'Tiger Lager', 'bottle', 4.00),
	('Beer', 'Tsingtao', 'bottle', 4.00),
	('Beer', 'Bud Light', 'bottle', 3.00),
	('Beer', 'Michelob Golden Light', 'bottle', 3.00)
    ;
    
INSERT INTO `drink menus`(`main category`, `name`, `size`, `price`, `refill?`, `notes`)
values
	('Soda & Others', 'Fountain Soda', 'none', 2.50, 0, null),
	('Soda & Others', 'Japanese Soda', 'none', 2.75, 0, null),
	('Soda & Others', 'Hot Japanese Green Tea', 'none',  2.00, 1, null),
	('Soda & Others', 'Organic Milk', 'none',  2.75, 0, null),
	('Soda & Others', 'Specialty Lemonade/Ice Tea', 'none', 3.00, 0, 'Made with Strawberry, Mango, Raspberry')
    ;

UPDATE `drink menus` SET `meal` = 'Lunch/Dinner';
select * from `drink menus`;


DROP TABLE IF EXISTS `drink flavors/types`;
CREATE TABLE `drink flavors/types`
(
	`name` varchar(50) NOT NULL,
    `flavors/types` varchar(50) NOT NULL,
    PRIMARY KEY (`name`, `flavors/types`)
);

INSERT INTO `drink flavors/types` values 
	('Hana Sake', 'Apple'),
    ('Hana Sake', 'Lychee'),
    ('Fountain Soda', 'Coke'),
    ('Fountain Soda', 'Diet Coke'),
    ('Fountain Soda', 'Root Beer'),
    ('Fountain Soda', 'Sprite'),
    ('Fountain Soda', 'Mello Yello'),
    ('Fountain Soda', 'Lemonade'),
    ('Fountain Soda', 'Iced Tea');

select * from `drink menus`;

DROP TABLE IF EXISTS `drink sizes`;
CREATE TABLE `drink sizes`
(
	`size` varchar(25) NOT NULL,
    PRIMARY KEY(`size`)
);

INSERT INTO `drink sizes` values
('glass'), ('bottle'), ('small'), ('large'), ('can');

INSERT INTO `drink sizes` values 
('none');

select * from `drink sizes`;



