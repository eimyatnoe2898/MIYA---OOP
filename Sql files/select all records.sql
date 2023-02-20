use `miya`;
select * from `individual visits`;
select * from `food orders`;
select * from `drink orders`;
select * from `table occupancy`;
select * from `sub customers`;
select * from `notifications`;
select * from `tables`;
select * from `service request records`;
INSERT INTO `notifications`(`for`, `table occupancy id`, `category`, `individual visit id`, `content`)
values ('admin', 43, 'check-in', 11, "Cocaa checked in");
INSERT INTO `notifications`(`for`, `table occupancy id`, `category`, `individual visit id`, `content`)
values ('master', 42, 'order verification', 11, "Cocaa checked in");
INSERT INTO `notifications`(`for`, `table occupancy id`, `category`, `individual visit id`, `content`)
values ('master', 42, 'check-in', 11, "Cocaa checked in");
INSERT INTO `notifications`(`for`, `table occupancy id`, `category`, `individual visit id`, `content`)
values ('customer', 42, 'check-in', 11, "Order is received");
SELECT * FROM notifications WHERE `for` = 'master' ORDER BY `notification id` DESC;