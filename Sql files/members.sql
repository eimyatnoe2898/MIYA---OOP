drop database if exists miya;
create database miya;
use miya;


-- Schema for Members
DROP TABLE if exists `members`;
CREATE TABLE `members` (
	`id` int auto_increment,
    `first name` varchar(25) NOT NULL,
    `last name` varchar(25),
    `email` varchar(100) NOT NULL,
    `password` varchar(255) NOT NULL,
	`birthday` date,
    `city` varchar(25),
    `state` varchar(25),
    `phone number` varchar(50),
    `created at` timestamp default current_timestamp,
	UNIQUE(`email`),
	FOREIGN KEY(`state`) REFERENCES `states`(`code`) on delete cascade,
	FOREIGN KEY(`state`) REFERENCES `states`(`code`) on update cascade,
	PRIMARY KEY(`id`)
);

select * from `members`;
INSERT INTO `members`(`first name`, `last name`, `email`, `password`) VALUES ('John', 'Doe', 'johndoe@gmail.com', '$2y$10$VuF2TdiPUlSMBDJBzR6Qo.hK73d8NgyDQ6CI4rtbRONSpQgQQHDtS');
INSERT INTO `members` VALUES (2, 'Iggy', 'Azle', 'igggy@gmail.com', '$2y$10$VuF2TdiPUlSMBDJBzR6Qo.hK73d8NgyDQ6CI4rtbRONSpQgQQHDtS', '1997-02-03', 'Lacrosse', 'MN', '222-222-222' );
INSERT INTO `members` (`first name`, `last name`, `email`, `password`, `birthday`, `city`, `state`, `phone number`)VALUES ('Ariana', 'Grande', 'ariana@gmail.com', '$2y$10$VuF2TdiPUlSMBDJBzR6Qo.hK73d8NgyDQ6CI4rtbRONSpQgQQHDtS', '1997-02-03', 'Lacrosse', 'MN', '222-222-222' );
INSERT INTO `members` (`first name`, `last name`, `email`, `password`, `birthday`, `city`, `state`, `phone number`)VALUES ('Wonwoo', 'Jeon', 'wonwoo@gmail.com', '$2y$10$VuF2TdiPUlSMBDJBzR6Qo.hK73d8NgyDQ6CI4rtbRONSpQgQQHDtS', '1997-02-03', 'Lacrosse', 'MN', '222-222-222' );
SELECT * FROM `members`;
INSERT INTO `members` (`first name`, `last name`, `email`, `password`) VALUES
(1, 'John', 'Doe', 'johndoe', 'john@example.com', '1234554', '2022-02-03 06:26:57'),
(3, 'Aung', 'Htay', 'aung', 'aung@gmail.com', '123468', '2022-02-03 06:29:56'),
(5, 'Ei', 'Aung', 'eiwww', 'ei@gmail.com', '2222222', '2022-02-03 06:31:00'),
(7, 'Ei', 'Myat', 'eimyatNOE', 'eiei@gmail.com', '12345678', '2022-02-03 22:08:07'),
(8, 'Ei', 'Ei', 'eiei', 'eieieie@gmail.com', '123456712', '2022-02-04 03:35:23'),
(9, 'Ei', 'Aung', 'eimyatnoeaung', 'eimyatnoeaung@gmail.com', '123456788', '2022-02-04 03:36:33'),
(10, 'Ei', 'AungEi', 'eieieiaung', 'eiaung@gmail.com', '1234567', '2022-02-04 03:42:20'),
(12, 'eI', 'EI', 'EIEIE', 'eimyatttt@gmail.com', '1234567', '2022-02-04 03:46:22'),
(14, 'Ei', 'EIIII', 'eIIIIIIIII', 'ei2@gmail.com', '2222222', '2022-02-04 03:47:40'),
(16, 'Aung', 'Aung', 'aungaung98', 'aung@gmail.com', '11111111', '2022-02-04 03:49:02'),
(17, 'HTAY', 'HTAY', 'htay', 'htayei@gmail.com', '33333333', '2022-02-04 03:50:18'),
(19, 'Aungei', 'eiaung', 'eiaunghtay', 'eiaunghtay@gmail.com', '1234567', '2022-02-04 04:42:48'),
(20, 'Htay', 'Htay', 'htay3', 'htay34@gmail.com', '22222222', '2022-02-04 04:45:07'),
(21, 'ohmm', 'marr', 'ohmar456', 'ohmar456@gmail.com', '3456789', '2022-02-04 05:16:16'),
(22, 'Myat', 'NOE', 'myatnoe', 'myatnoe@gmail.com', 'ddd', '2022-02-04 05:24:41'),
(23, 'NOKA', 'NUM', 'nokanum23', 'nokanum@gmail.com', '', '2022-02-04 05:40:01'),
(24, 'BUI', 'num', 'buinum456', 'buinum@gmail.com', '', '2022-02-04 05:43:15'),
(25, 'Ei', 'Aung', 'eiaung', 'eaung8@gmail.com', '', '2022-02-10 02:28:51'),
(26, 'aung', 'ei', 'aungeioo', 'aungeioo@gmail.com', '', '2022-02-10 02:29:51'),
(27, 'Lucy', 'Jane', 'lucyjane', 'lucyjane@gmail.com', '', '2022-02-10 03:22:07'),
(28, 'Tommy', 'Hill', 'tommy', 'tommy@gmail.com', '', '2022-02-10 04:08:11'),
(29, 'tui', 'hui', 'tuihui', 'tuihui@gmail.com', '', '2022-02-10 04:19:58'),
(30, 'uee', 'kim', 'kimuee', 'kimuee@gmail.com', '$2y$10$VuF2TdiPUlSMBDJBzR6Qo.hK73d8NgyDQ6CI4rtbRONSpQgQQHDtS', '2022-02-10 04:27:36'),
(31, 'yui', 'kim', 'kimyui', 'kimyui@gmail.com', '$2y$10$/wN1woICrbFVNj0LgaJ94Op8dJoqE9hFQZBwoTx7XlvqKUaQPgX3e', '2022-02-11 00:36:16'),
(32, 'Honoka', 'Ka', 'honoka', 'honoka@gmail.com', '$2y$10$A8RrFaCL0cBCDU2TKNKQfewO8bR32xkvT8pvtEijQ1ezeZuiWfwBC', '2022-02-24 23:10:31'),
(33, 'Mah', 'Lok', 'mahlok', 'mahlok@gmail.com', '$2y$10$9uZihFxDtglnPdKeDQ0RwewTZvXReHORKMOLDVosEnQoHmJsCxVPK', '2022-02-24 23:29:17');



