use `miya`;


-- const reference table for food menu main categories
DROP TABLE if exists `meals`;
CREATE TABLE `meals`
(
	`meal` varchar(50) NOT NULL, 
    primary key (`meal`)
);

INSERT INTO `meals` values
	('Lunch'),
    ('Lunch/Dinner');

-- const reference table for food menu main categories
DROP TABLE if exists `main category`;
CREATE TABLE `main category`
(
	`main category` varchar(50) NOT NULL, 
    `notes` varchar(255), 
    primary key (`main category`)
);

INSERT INTO `main category`values
	('Bento Boxes', 'Served with miso soup, white rice, and California roll. Upgrade white rice to fried rice for $1.50'), 
	('Desserts', null),
    ('Entrees', null),
    ('Fried Rice', 'Served with miso soup'),
    ('Hibachi', 'Served with onion soup, white rice, vegetables, ginger sauce, and yummy sauce. Upgrade white rice to fried rice for $1'),
    ('Kids menu', 'For kids 12 and under. Served with onion soup and white rice. Upgrade white rice to fried rice for $1'),
    ('Specialty Rolls', null),
    ('Starters', null),
    ('Sushi Rolls', 'Served with miso soup'),
    ('Sushi & Sashimi A La Carte', 'Sushi 2 pieces or sashimi 3 pieces per order'),
    ('Side menus', null);


INSERT INTO `main category` values ('Wine', null), ('Sake', null), ('Beer', null), ('Soda & Others', null);
select * from `main category`;
    
-- const reference table for food menu sub categories
DROP TABLE if exists `sub category`;
CREATE TABLE `sub category`
(
	`sub category` varchar(50) NOT NULL,
    `notes` varchar(255),
    primary key (`sub category`)
);

INSERT INTO `sub category`values
	('Fried Rice','Served with miso soup'),
    ('Katsu', '(Breaded and fried fillet) Served with miso soup, salad, and white rice. Upgrade white rice to fried rice for $1'),
    ('Teriyaki', 'Served with miso soup, salad, and white rice. Upgrade white rice to fried rice for $1'),
    ('Combos', null);

INSERT INTO `sub category` values 
    ('Any Two Rolls', null),
    ('Any Three Rolls', null);
    
INSERT INTO `sub category` values
	('Red Wine', null),
    ('White Wine', null);
select * from `sub category`;


-- const reference table for customer types
DROP TABLE if exists `customer type`;
CREATE TABLE `customer type`
(
	`customer type` varchar(25) NOT NULL, 
	primary key (`customer type`)
);

INSERT INTO `customer type`values('master'), ('customer'), ('sub-customer');
select * from `customer type`;


-- const reference table for Tables
DROP TABLE IF EXISTS `tables`;
create table `tables`
(
	`table number` int not null,
    `capacity` int not null,
    primary key (`table number`)
);

INSERT INTO `tables`values(1, 4);
INSERT INTO `tables`values(2, 4), (3, 4), (4, 4), (5,4), (6,4), (7,4), (8,8), (9,8), (10,8);


-- const reference table for States
DROP TABLE IF EXISTS `states`;
CREATE TABLE `states` (
  `code` char(2) NOT NULL DEFAULT '',
  `name` varchar(128) NOT NULL DEFAULT '',
  PRIMARY KEY (`code`)
);

insert into states (code,name) values ('AL','Alabama');
insert into states (code,name) values ('AK','Alaska');
insert into states (code,name) values ('AS','American Samoa');
insert into states (code,name) values ('AZ','Arizona');
insert into states (code,name) values ('AR','Arkansas');
insert into states (code,name) values ('CA','California');
insert into states (code,name) values ('CO','Colorado');
insert into states (code,name) values ('CT','Connecticut');
insert into states (code,name) values ('DE','Delaware');
insert into states (code,name) values ('DC','District of Columbia');
insert into states (code,name) values ('FM','Federated States of Micronesia');
insert into states (code,name) values ('FL','Florida');
insert into states (code,name) values ('GA','Georgia');
insert into states (code,name) values ('GU','Guam');
insert into states (code,name) values ('HI','Hawaii');
insert into states (code,name) values ('ID','Idaho');
insert into states (code,name) values ('IL','Illinois');
insert into states (code,name) values ('IN','Indiana');
insert into states (code,name) values ('IA','Iowa');
insert into states (code,name) values ('KS','Kansas');
insert into states (code,name) values ('KY','Kentucky');
insert into states (code,name) values ('LA','Louisiana');
insert into states (code,name) values ('ME','Maine');
insert into states (code,name) values ('MH','Marshall Islands');
insert into states (code,name) values ('MD','Maryland');
insert into states (code,name) values ('MA','Massachusetts');
insert into states (code,name) values ('MI','Michigan');
insert into states (code,name) values ('MN','Minnesota');
insert into states (code,name) values ('MS','Mississippi');
insert into states (code,name) values ('MO','Missouri');
insert into states (code,name) values ('MT','Montana');
insert into states (code,name) values ('NE','Nebraska');
insert into states (code,name) values ('NV','Nevada');
insert into states (code,name) values ('NH','New Hampshire');
insert into states (code,name) values ('NJ','New Jersey');
insert into states (code,name) values ('NM','New Mexico');
insert into states (code,name) values ('NY','New York');
insert into states (code,name) values ('NC','North Carolina');
insert into states (code,name) values ('ND','North Dakota');
insert into states (code,name) values ('MP','Northern Mariana Islands');
insert into states (code,name) values ('OH','Ohio');
insert into states (code,name) values ('OK','Oklahoma');
insert into states (code,name) values ('OR','Oregon');
insert into states (code,name) values ('PW','Palau');
insert into states (code,name) values ('PA','Pennsylvania');
insert into states (code,name) values ('PR','Puerto Rico');
insert into states (code,name) values ('RI','Rhode Island');
insert into states (code,name) values ('SC','South Carolina');
insert into states (code,name) values ('SD','South Dakota');
insert into states (code,name) values ('TN','Tennessee');
insert into states (code,name) values ('TX','Texas');
insert into states (code,name) values ('UT','Utah');
insert into states (code,name) values ('VT','Vermont');
insert into states (code,name) values ('VI','Virgin Islands');
insert into states (code,name) values ('VA','Virginia');
insert into states (code,name) values ('WA','Washington');
insert into states (code,name) values ('WV','West Virginia');
insert into states (code,name) values ('WI','Wisconsin');
insert into states (code,name) values ('WY','Wyoming');

select * from `states`;
SELECT COUNT(code) FROM `states`;