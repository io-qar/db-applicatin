-- DROP DATABASE cameraproject;

CREATE DATABASE IF NOT EXISTS cameraproject;
CREATE USER IF NOT EXISTS 'user'@'%';
ALTER USER 'user'@'%' IDENTIFIED BY 'password';
GRANT ALL PRIVILEGES ON cameraproject.* TO 'user'@'%';
FLUSH PRIVILEGES;
USE cameraproject;
	
CREATE TABLE IF NOT EXISTS Cameras (
	cameraId int NOT NULL AUTO_INCREMENT,
	address text NOT NULL,
	setting enum('speed', 'line', 'sign') NOT NULL,
	PRIMARY KEY (cameraId)
);

CREATE TABLE IF NOT EXISTS Cars (
	regPlate varchar(11) NOT NULL,
	model text NOT NULL,
	PRIMARY KEY (regPlate)
);

CREATE TABLE IF NOT EXISTS Db_users (
	userId int NOT NULL AUTO_INCREMENT,
	name text NOT NULL,
	password text NOT NULL,
	user_privilege enum('admin', 'user') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT 'user',
	PRIMARY KEY (userId)
);

CREATE TABLE Files (
	fileId int NOT NULL AUTO_INCREMENT,
	fileLink text NOT NULL,
	PRIMARY KEY (fileId)
);

CREATE TABLE Facts (
	factId int NOT NULL AUTO_INCREMENT,
	cameraId int NOT NULL,
	regPlate varchar(11) NOT NULL,
	fileId int NOT NULL,
	status tinyint(1) NOT NULL DEFAULT '0',
	PRIMARY KEY (factId),
	KEY cameraId (cameraId),
	KEY regPlate (regPlate),
	KEY files_ibfk_1 (fileId),
	CONSTRAINT factdedication_ibfk_2 FOREIGN KEY (regPlate) REFERENCES Cars (regPlate) ON DELETE RESTRICT ON UPDATE CASCADE,
	CONSTRAINT Facts_FK FOREIGN KEY (cameraId) REFERENCES Cameras (cameraId) ON DELETE RESTRICT ON UPDATE CASCADE,
	CONSTRAINT files_ibfk_1 FOREIGN KEY (fileId) REFERENCES Files (fileId) ON DELETE RESTRICT ON UPDATE CASCADE
);

CREATE TABLE Vehicle_owners (
	cardId int NOT NULL,
	name varchar(20) NOT NULL,
	carReg varchar(11) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
	PRIMARY KEY (cardId),
	KEY carReg (carReg),
	CONSTRAINT Vehicle_owners_FK FOREIGN KEY (carReg) REFERENCES Cars (regPlate) ON DELETE SET NULL ON UPDATE CASCADE
);

CREATE TABLE Fines (
	fineId int NOT NULL AUTO_INCREMENT,
	datetime datetime NOT NULL,
	userId int NOT NULL,
	ownerId int DEFAULT NULL,
	cameraId int NOT NULL,
	PRIMARY KEY (fineId),
	KEY userId (userId),
	KEY Fines_FK (cameraId),
	KEY fine_ibfk_2 (ownerId),
	CONSTRAINT fine_ibfk_1 FOREIGN KEY (userId) REFERENCES Db_users (userId) ON DELETE CASCADE ON UPDATE CASCADE,
	CONSTRAINT fine_ibfk_2 FOREIGN KEY (ownerId) REFERENCES Vehicle_owners (cardId) ON DELETE CASCADE ON UPDATE CASCADE,
	CONSTRAINT Fines_FK FOREIGN KEY (cameraId) REFERENCES Cameras (cameraId) ON DELETE CASCADE ON UPDATE CASCADE
);

insert into Cameras (address,setting) values
	('наб. Шолохова, д. 42','speed'),
	('пер. Чайкиной, д. 307','line'),
	('ул. Коммуны, д. 3/1 стр. 83','speed'),
	('пер. Ильича, д. 39 стр. 4','sign'),
	('наб. 9 мая, д. 884 к. 465','sign'),
	('ул. Речная, д. 6/8 стр. 6','sign'),
	('ул. Октябрьская, д. 92 стр. 6/6','sign'),
	('алл. Мостовая, д. 10 стр. 736','sign'),
	('пр. Запрудный, д. 325 к. 2/4','sign'),
	('алл. Комарова, д. 8 стр. 86','sign');

ALTER TABLE Cameras CONVERT TO CHARACTER SET = utf8;

insert into Cars (regPlate,model) values
	('000D065 58','Kia Rio'),
	('001CD7 80','Lada Vesta'),
	('002D386 83','Skada Kodiaq'),
	('002D571 77','BMW X6'),
	('003CD5 08','Honda Pilot'),
	('004CD7 102','Ford Transit'),
	('005CD7 16','Nissan Qashai'),
	('005T121 27','Tayota Camry'),
	('006CD0 22','Renault Logan'),
	('006CD4 799','Mitsubishi Pajero');

ALTER TABLE Cars CONVERT TO CHARACTER SET = utf8;

insert into cameraproject.file (fileLink) values
	('https://placekitten.com/548/847'),
	('https://www.lorempixel.com/221/827'),
	('https://placeimg.com/751/596/any'),
	('https://placeimg.com/701/628/any'),
	('https://placeimg.com/156/368/any'),
	('https://dummyimage.com/183x18'),
	('https://dummyimage.com/794x56'),
	('https://dummyimage.com/209x637'),
	('https://placekitten.com/589/138'),
	('https://placeimg.com/135/370/any');

-- insert into cameraproject.factdedication (cameraId,regPlate,fileId) values
-- 	(1,'000D065 58',1);

-- insert into cameraproject.vehicleowner (idCard,fineId,name,carReg) values
-- 	(100,10,'Юрий','000D065 58'),
-- 	(200,20,'Елисей','001CD7 80'),
-- 	(300,30,'Сергей','002D386 83'),
-- 	(400,40,'Зосима','002D571 77'),
-- 	(500,50,'Глафира','003CD5 08');