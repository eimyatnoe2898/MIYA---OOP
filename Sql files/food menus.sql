use `miya`;

DROP TABLE if exists `food menus`;
CREATE TABLE `food menus`
(
-- 	`food id` int not null auto_increment,
    `menubook id` varchar(10) NOT NULL,
    `meal` enum(
			'Lunch',
            'Dinner',
            'Lunch/Dinner') 
	NOT NULL,
    `main category` varchar(50) NOT NULL,
	`sub category` varchar(50),
    `name` varchar(50) NOT NULL,
    `raw meat` boolean default false,
    `price` decimal(10,2) NOT NULL,
    `notes` varchar(255),
    `in stock` int default 0,
    `preparation time(mins)` decimal  NOT NULL,
    PRIMARY KEY (`menubook id`, `meal`),
	FOREIGN KEY(`main category`) REFERENCES `main category`(`main category`) on delete cascade,
	FOREIGN KEY(`main category`) REFERENCES `main category`(`main category`) on update cascade,
	FOREIGN KEY(`sub category`) REFERENCES `sub category`(`sub category`) on delete cascade,
	FOREIGN KEY(`sub category`) REFERENCES `sub category`(`sub category`) on update cascade
    
);

INSERT INTO `food menus` (`menubook id`, `meal`, `main category`, `name`, `price`, `preparation time(mins)`) values 
('1', 'Lunch/Dinner', 'Starters', 'Seaweed Salad', 5.75, 10);
INSERT INTO `food menus` (`menubook id`, `meal`, `main category`, `name`,`price`, `preparation time(mins)`) values 
('2', 'Lunch/Dinner', 'Starters', 'Garden Salad', 3.75, 10);
INSERT INTO `food menus` (`menubook id`, `meal`, `main category`, `name`,`price`, `notes`, `preparation time(mins)`) values 
('3', 'Lunch/Dinner', 'Starters', 'Kani Salad', 6.90, 'Japanese crab salad', 10);
INSERT INTO `food menus` (`menubook id`, `meal`, `main category`, `name`,`price`, `preparation time(mins)`) values 
('4', 'Lunch/Dinner', 'Starters', 'Onion Soup', 2.75, 10);
INSERT INTO `food menus` (`menubook id`, `meal`, `main category`, `name`,`price`, `preparation time(mins)`) values 
('5', 'Lunch/Dinner', 'Starters', 'Miso Soup', 2.75, 10);
INSERT INTO `food menus` (`menubook id`, `meal`, `main category`, `name`,`price`, `preparation time(mins)`) values 
('6', 'Lunch/Dinner', 'Starters', 'Fried Calamari', 8.2, 10),
('11', 'Lunch/Dinner', 'Starters', 'Vegetable Gyoza', 5.75, 10),
('12', 'Lunch/Dinner', 'Starters', 'Pepper Tuna Tataki', 12.2, 20),
('13', 'Lunch/Dinner', 'Starters', 'Yellowtail Jalapeno', 12.2, 20)
;
INSERT INTO `food menus` (`menubook id`, `meal`, `main category`, `name`,`price`, `notes`, `preparation time(mins)`) values 
('7', 'Lunch/Dinner', 'Starters', 'Shumai', 6.20, 'Steamed shrimp dumpling', 10),
('8', 'Lunch/Dinner', 'Starters', 'Haru Maki', 5.25, 'Vegetable spring roll', 10),
('9', 'Lunch/Dinner', 'Starters', 'Edamame', 4.75, 'Japanese soybean', 10),
('10', 'Lunch/Dinner', 'Starters', 'Gyoza', 5.75, 'Japanese pan-fried dumpling', 10)
;

INSERT INTO `food menus` (`menubook id`, `meal`, `main category`, `sub category`, `name`, `price`, `preparation time(mins)`) values 
('14a', 'Lunch/Dinner', 'Entrees', 'Fried Rice', 'Chicken Fried Rice', 11.20, 30),
('14b', 'Lunch/Dinner', 'Entrees', 'Fried Rice', 'Beef Fried Rice', 12.20, 30),
('14c', 'Lunch/Dinner', 'Entrees', 'Fried Rice', 'Shrimp Fried Rice',  12.20, 30)
;

INSERT INTO `food menus` (`menubook id`, `meal`, `main category`, `sub category`, `name`, `price`, `preparation time(mins)`) values 
('15a', 'Lunch/Dinner', 'Entrees', 'Katsu', 'Chicken Katsu', 15.70, 30),
('15b', 'Lunch/Dinner', 'Entrees', 'Katsu', 'Pork Katsu', 15.70, 30)
;

INSERT INTO `food menus` (`menubook id`, `meal`, `main category`, `sub category`, `name`, `price`, `preparation time(mins)`) values 
('16a', 'Lunch/Dinner', 'Entrees', 'Teriyaki', 'Chicken Teriyaki', 15.70, 30),
('16b', 'Lunch/Dinner', 'Entrees', 'Teriyaki', 'Shrimp Teriyaki', 18.70, 30),
('16c', 'Lunch/Dinner', 'Entrees', 'Teriyaki', 'Salmon Teriyaki', 19.70, 30)
;

INSERT INTO `food menus` (`menubook id`, `meal`, `main category`, `name`, `price`, `preparation time(mins)`) values 
('17', 'Dinner', 'Hibachi', 'Vegetable Hibachi', 14.70, 30),
('18', 'Dinner', 'Hibachi', 'Chicken Hibachi', 16.70, 30),
('19', 'Dinner', 'Hibachi', 'Scallop Hibachi', 26.20, 30),
('20', 'Dinner', 'Hibachi', 'Salmon Hibachi', 20.20, 30),
('21', 'Dinner', 'Hibachi', 'Shrimp Hibachi', 19.7, 30),
('22', 'Dinner', 'Hibachi', 'New York Steak Hibachi', 20.7, 30)
;

INSERT INTO `food menus` (`menubook id`, `meal`, `main category`, `sub category`, `name`, `price`, `preparation time(mins)`) values 
('23', 'Lunch/Dinner', 'Hibachi', 'Combos', 'Chicken & Shrimp', 20.70, 30),
('24', 'Lunch/Dinner', 'Hibachi', 'Combos',  'Shrimp & Scallop', 26.20, 30),
('25', 'Lunch/Dinner', 'Hibachi', 'Combos', 'New York Steak & Chicken', 22.70, 30),
('26', 'Lunch/Dinner', 'Hibachi', 'Combos', 'New York Steak & Shrimp', 23.70, 30),
('27', 'Lunch/Dinner', 'Hibachi', 'Combos', 'New York Steak & Scallop', 26.2, 30);

INSERT INTO `food menus` (`menubook id`, `meal`, `main category`, `name`, `price`, `preparation time(mins)`) values 
('17', 'Lunch', 'Hibachi', 'Vegetable Hibachi', 9.20, 30),
('18', 'Lunch', 'Hibachi', 'Chicken Hibachi', 10.20, 30),
('19', 'Lunch', 'Hibachi', 'Scallop Hibachi', 14.20, 30),
('20', 'Lunch', 'Hibachi', 'Salmon Hibachi', 11.20, 30),
('21', 'Lunch', 'Hibachi', 'Shrimp Hibachi', 11.20, 30),
('22', 'Lunch', 'Hibachi', 'New York Steak Hibachi', 12.20, 30)
;

INSERT INTO `food menus` (`menubook id`, `meal`, `main category`, `name`, `raw meat`, `price`, `notes`, `preparation time(mins)`) values 
('28', 'Lunch/Dinner', 'Sushi & Sashimi A La Carte', 'Tuna', 1, 5.75, 'Maguro', 30),
('31', 'Lunch/Dinner', 'Sushi & Sashimi A La Carte', 'Eel', 0, 5.75, 'Unagi', 30),
('32', 'Lunch/Dinner', 'Sushi & Sashimi A La Carte', 'Shrimp', 0, 5.75, 'Ebi', 30),
('33', 'Lunch/Dinner', 'Sushi & Sashimi A La Carte', 'Mackarel', 0, 4.75, 'Saba', 30),
('35', 'Lunch/Dinner', 'Sushi & Sashimi A La Carte', 'Salmon', 1, 5.75, 'Sake', 30),
('36', 'Lunch/Dinner', 'Sushi & Sashimi A La Carte', 'Yellowtail', 1, 5.75, 'Hamachi', 30),
('37', 'Lunch/Dinner', 'Sushi & Sashimi A La Carte', 'Salmon Roe', 1, 5.75, 'Ikura', 30),
('38', 'Lunch/Dinner', 'Sushi & Sashimi A La Carte', 'Red Snapper', 1, 5.25, 'Tai', 30)
;

INSERT INTO `food menus` (`menubook id`, `meal`, `main category`, `name`, `raw meat`, `price`, `preparation time(mins)`) values 
('29', 'Lunch/Dinner', 'Sushi & Sashimi A La Carte', 'White Tuna', 1, 5.75, 30),
('30', 'Lunch/Dinner', 'Sushi & Sashimi A La Carte', 'Smoked Salmon', 0, 6.00, 30),
('34', 'Lunch/Dinner', 'Sushi & Sashimi A La Carte', 'Flying Fish Egg', 1, 5.25,  30)
;

INSERT INTO `food menus` (`menubook id`, `meal`, `main category`, `name`, `raw meat`, `price`, `preparation time(mins)`) values 
('39', 'Lunch/Dinner', 'Sushi Rolls', 'Avocado Maki', 0, 4.75, 30),
('41', 'Lunch/Dinner', 'Sushi Rolls', 'Tuna Maki', 1, 5.25, 30),
('42', 'Lunch/Dinner', 'Sushi Rolls', 'Salmon Maki', 1, 5.25, 30),
('43', 'Lunch/Dinner', 'Sushi Rolls', 'Yellowtail Maki', 1, 5.25, 30),
('47', 'Lunch/Dinner', 'Sushi Rolls', 'Sweet Potato Tempura Roll', 0, 5.25, 30),
('49', 'Lunch/Dinner', 'Sushi Rolls', 'Spicy Tuna Roll', 1, 6.25, 30),
('50', 'Lunch/Dinner', 'Sushi Rolls', 'Spicy Salmon Roll', 1, 6.25, 30),
('51', 'Lunch/Dinner', 'Sushi Rolls', 'Spicy Snow Crab Roll', 0, 6.25, 30)
;

INSERT INTO `food menus` (`menubook id`, `meal`, `main category`, `name`, `raw meat`, `price`, `notes`, `preparation time(mins)`) values 
('40', 'Lunch/Dinner', 'Sushi Rolls', 'Kapa Maki', 0, 4.75, 'Cucumber', 30),
('44', 'Lunch/Dinner', 'Sushi Rolls', 'California Roll', 0, 5.25, 'Imitation crab, cucumber, and cream cheese', 30),
('45', 'Lunch/Dinner', 'Sushi Rolls', 'Philadelphia Roll', 0, 6.25, 'Smoked salmon, cucumber, and cream cheese', 30),
('46a', 'Lunch/Dinner', 'Sushi Rolls', 'Eel Avocado Roll', 0, 6.70 , 'Served with eel sauce', 30),
('46b', 'Lunch/Dinner', 'Sushi Rolls', 'Eel Cucumber Roll', 0, 6.70, 'Served with eel sauce', 30),
('48', 'Lunch/Dinner', 'Sushi Rolls', 'Alaska Roll', 1, 6.25, 'Salmon, cucumber, avocado',  30),
('52', 'Lunch/Dinner', 'Sushi Rolls', 'Boston Roll', 0, 5.25, 'Shrimp, cucumber, lettuce, and mayo', 30),
('53', 'Lunch/Dinner', 'Sushi Rolls', 'Shrimp Tempura Roll', 0, 8.70, 'Shrimp tempura, cucumber, avocado, and eel sauce', 30),
('54', 'Lunch/Dinner', 'Sushi Rolls', 'Spider Roll', 0, 10.25, 'Tempura soft shell imitation crab, cucumber, avocado, and eel sauce', 30)
;

INSERT INTO `food menus` (`menubook id`, `meal`, `main category`, `name`, `price`, `preparation time(mins)`) values 
('55', 'Lunch/Dinner', 'Kids Menu', 'Chicken Junior', 10.20, 30);

INSERT INTO `food menus` (`menubook id`, `meal`, `main category`, `name`, `price`, `preparation time(mins)`) values 
('56', 'Lunch/Dinner', 'Kids Menu', 'Shrimp Junior', 11.20, 30),
('57', 'Lunch/Dinner', 'Kids Menu', 'Steak Junior', 12.20, 30)
;

INSERT INTO `food menus` (`menubook id`, `meal`, `main category`, `name`, `raw meat`, `price`, `notes`, `preparation time(mins)`) values 
('58', 'Lunch/Dinner', 'Specialty Rolls', 'Volcano Roll', 1, 15.70, 'Fried spicy tuna and cream cheese topped with 
spicy imitation snow crab, eel sauce, and spicy mayo', 30),
('59', 'Lunch/Dinner', 'Specialty Rolls', 'Mi Ya Roll', 1, 14.70, 'Fried jalapeno stuffed with spicy tuna, cream cheese,
eel, avocado, eel sauce, and spicy mayo', 30),
('60', 'Lunch/Dinner', 'Specialty Rolls', 'Dragon Roll', 0, 11.70, 'Eel, cucumber, and avocado topped with eel sauce masago', 30),
('61', 'Lunch/Dinner', 'Specialty Rolls', 'Rainbow Roll', 1, 12.70, 'Imitation crab, cucumber, and avocado topped wioth tuna,
salmon, white fish, and masago', 30),
('62', 'Lunch/Dinner', 'Specialty Rolls', 'Salmon Family Roll', 0, 14.70, 'Spicy salmon, imitation crab, and cream cheese
deep fried with eel sauce, spicy mayo and honey wasabi', 30),
('63', 'Lunch/Dinner', 'Specialty Rolls', 'Fancy Salmon Roll', 0, 13.70, 'Smoked salmon, imitation crab, and cream cheese
deep fried with eel sauce, spicy mayo, and honey wasabi', 30),
('64', 'Lunch/Dinner', 'Specialty Rolls', 'MJ Roll', 0, 14.70, 'Shrimp tempura and cucumber topped with spicy imitation snow crab
and eel sauce', 30),
('65', 'Lunch/Dinner', 'Specialty Rolls', 'Crazy Tuna Roll', 1, 14.70, 'Spicy tuna, cucumber inside, topped with seared tuna,
avocado, masago, eel sauce, and honey wasabi sauce', 30),
('66', 'Lunch/Dinner', 'Specialty Rolls', 'King Lobster Roll', 0, 17.70, 'Tempura lobster tail, spicy imitation snow crab
and avocado wrapped with soy bean paper, with eel sauce and spicy mayo', 30),
('67', 'Lunch/Dinner', 'Specialty Rolls', 'Crunch Roll', 0, 13.70, 'Shrimp tempura an cucumber topped with masago, crunch, spicy mayo,
and eel sauce', 30),
('68', 'Lunch/Dinner', 'Specialty Rolls', 'Naruto Special Roll', 1, 14.70, 'Tuna, salmon, white fish, avocado, and tobiko
wrapped with cucumber in ponzu sauce', 30),
('69', 'Lunch/Dinner', 'Specialty Rolls', 'Mexican Roll', 1, 13.70, 'Tuna, salmon, and white fish topped with yellowtail, avocado
, sliced jalapeno, masago, and ponzu sauce', 30)
;

INSERT INTO `food menus` (`menubook id`, `meal`, `main category`, `name`, `price`, `preparation time(mins)`) values 
('70', 'Lunch/Dinner', 'Desserts', 'Mochi Ice Cream', 4.20, 10),
('71', 'Lunch/Dinner', 'Desserts', 'Fried Cheesecake', 4.50, 10),
('72', 'Lunch/Dinner', 'Desserts', 'Fried Banana', 4.20, 10)
;

ALTER TABLE `food menus`
DROP PRIMARY KEY;

ALTER TABLE `food menus`
ADD PRIMARY KEY (`menubook id`, `meal`, `name`, `price`);

INSERT INTO `food menus` (`menubook id`, `meal`, `main category`, `sub category`, `name`, `raw meat`, `price`, `preparation time(mins)`) values 
('73', 'Lunch', 'Sushi Rolls', 'Any Two Rolls', 'Avocado Roll', 0, 4.60, 20),
('74', 'Lunch', 'Sushi Rolls', 'Any Two Rolls', 'California Roll', 0, 4.60, 20),
('75', 'Lunch', 'Sushi Rolls', 'Any Two Rolls', 'Tuna Roll', 1, 4.60, 20),
('76', 'Lunch', 'Sushi Rolls', 'Any Two Rolls', 'Salmon Roll', 1, 4.60, 20),
('77', 'Lunch', 'Sushi Rolls', 'Any Two Rolls', 'Yellowtail Roll', 1, 4.60, 20),
('78', 'Lunch', 'Sushi Rolls', 'Any Two Rolls', 'Tuna Avocado Roll', 1, 4.60, 20),
('79', 'Lunch', 'Sushi Rolls', 'Any Two Rolls', 'Salmon Avocado Roll', 1, 4.60, 20),
('80', 'Lunch', 'Sushi Rolls', 'Any Two Rolls', 'Cucumber Roll', 0, 4.60, 20),
('81', 'Lunch', 'Sushi Rolls', 'Any Two Rolls', 'Sweet Potato Roll', 0, 4.60, 20),
('82', 'Lunch', 'Sushi Rolls', 'Any Two Rolls', 'Philadelphia Roll', 0, 4.60, 20),
('83', 'Lunch', 'Sushi Rolls', 'Any Two Rolls', 'Spicy Tuna Roll', 1, 4.60, 20),
('84', 'Lunch', 'Sushi Rolls', 'Any Two Rolls', 'Spicy Salmon Roll', 1, 4.60, 20),
('85', 'Lunch', 'Sushi Rolls', 'Any Two Rolls', 'Spicy Snow Crab Roll', 0, 4.60, 20),
('86', 'Lunch', 'Sushi Rolls', 'Any Two Rolls', 'Shrimp Tempura Roll', 0, 4.60, 20),
('87', 'Lunch', 'Sushi Rolls', 'Any Two Rolls', 'Eel Cucumber Roll', 0, 4.60, 20)
;

INSERT INTO `food menus` (`menubook id`, `meal`, `main category`, `sub category`, `name`, `raw meat`, `price`, `preparation time(mins)`) values 
('73', 'Lunch', 'Sushi Rolls', 'Any Three Rolls', 'Avocado Roll', 0, 4.07, 20),
('74', 'Lunch', 'Sushi Rolls', 'Any Three Rolls', 'California Roll', 0, 4.07, 20),
('75', 'Lunch', 'Sushi Rolls', 'Any Three Rolls', 'Tuna Roll', 1, 4.07, 20),
('76', 'Lunch', 'Sushi Rolls', 'Any Three Rolls', 'Salmon Roll', 1, 4.07, 20),
('77', 'Lunch', 'Sushi Rolls', 'Any Three Rolls', 'Yellowtail Roll', 1, 4.07, 20),
('78', 'Lunch', 'Sushi Rolls', 'Any Three Rolls', 'Tuna Avocado Roll', 1, 4.07, 20),
('79', 'Lunch', 'Sushi Rolls', 'Any Three Rolls', 'Salmon Avocado Roll', 1, 4.07, 20),
('80', 'Lunch', 'Sushi Rolls', 'Any Three Rolls', 'Cucumber Roll', 0, 4.07, 20),
('81', 'Lunch', 'Sushi Rolls', 'Any Three Rolls', 'Sweet Potato Roll', 0, 4.07, 20),
('82', 'Lunch', 'Sushi Rolls', 'Any Three Rolls', 'Philadelphia Roll', 0, 4.07, 20),
('83', 'Lunch', 'Sushi Rolls', 'Any Three Rolls', 'Spicy Tuna Roll', 1, 4.07, 20),
('84', 'Lunch', 'Sushi Rolls', 'Any Three Rolls', 'Spicy Salmon Roll', 1, 4.07, 20),
('85', 'Lunch', 'Sushi Rolls', 'Any Three Rolls', 'Spicy Snow Crab Roll', 0, 4.07, 20),
('86', 'Lunch', 'Sushi Rolls', 'Any Three Rolls', 'Shrimp Tempura Roll', 0, 4.07, 20),
('87', 'Lunch', 'Sushi Rolls', 'Any Three Rolls', 'Eel Cucumber Roll', 0, 4.07, 20)
;

INSERT INTO `food menus` (`menubook id`, `meal`, `main category`, `name`, `price`, `preparation time(mins)`) values 
('88', 'Lunch', 'Bento Boxes', 'Chicken Teriyaki Box', 11.20, 10),
('89', 'Lunch', 'Bento Boxes', 'Salmon Teriyaki Box', 12.20, 10),
('90', 'Lunch/Dinner', 'Bento Boxes', 'Angus Beef Teriyaki Box', 13.20, 10)
;

UPDATE 	`food menus` SET `meal` = 'Lunch' WHERE `menubook id` = '90' and `meal` = 'Lunch/Dinner';
UPDATE `food menus` 
SET `meal` = 'Lunch/Dinner'
WHERE `menubook id` = '17' and `meal` = 'Dinner';

UPDATE `food menus` 
SET `meal` = 'Lunch/Dinner'
WHERE `menubook id` = '18' and `meal` = 'Dinner';

UPDATE `food menus` 
SET `meal` = 'Lunch/Dinner'
WHERE `menubook id` = '19' and `meal` = 'Dinner';

UPDATE `food menus` 
SET `meal` = 'Lunch/Dinner'
WHERE `menubook id` = '20' and `meal` = 'Dinner';

UPDATE `food menus` 
SET `meal` = 'Lunch/Dinner'
WHERE `menubook id` = '21' and `meal` = 'Dinner';

UPDATE `food menus` 
SET `meal` = 'Lunch/Dinner'
WHERE `menubook id` = '22' and `meal` = 'Dinner';

select * from `food menus`;

select * from `food menus` inner join `main category` where `food menus`.`main category` = `main category`.`main category` AND `food menus`.`main category` = 'Bento Boxes';
select * from `main category`;
