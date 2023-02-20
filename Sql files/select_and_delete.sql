use miya;

SELECT * FROM `members`;
SELECT * FROM `customers`;
SELECT * FROM `drink orders`;
SELECT * FROM `food orders`;
SELECT * FROM `table occupancy`;
SELECT * FROM `individual visits`;
SELECT * FROM `notifications`;
SELECT * FROM `sub customers`;
SELECT * FROM `service request records`;

DELETE FROM `members`;
DELETE FROM `customers`;
DELETE FROM `table occupancy`;
DELETE FROM `individual visits`;
DELETE FROM `notifications`;
DELETE FROM `drink orders`;
DELETE FROM `food orders`;
DELETE FROM `sub customers`;

UPDATE `table occupancy` 
SET `occupancy status` = 'checked out'
WHERE `table number` = 1 and `table occupancy id` = 48;


ALTER TABLE `food orders`
ADD CONSTRAINT constraint_name
FOREIGN KEY foreign_key_name(columns)
REFERENCES parent_table(columns)
ON DELETE action
ON UPDATE action;