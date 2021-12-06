DROP DATABASE cameraproject;
CREATE DATABASE IF NOT EXISTS cameraproject;
CREATE USER IF NOT EXISTS 'user'@'%';
ALTER USER 'user'@'%' IDENTIFIED BY 'password';
GRANT ALL PRIVILEGES ON cameraproject.* TO 'user'@'%';
FLUSH PRIVILEGES;
USE cameraproject;

CREATE TABLE IF NOT EXISTS Cameras (
  cameraId int NOT NULL AUTO_INCREMENT,
  address text NOT NULL,
  setting enum('speed','line','sign'),
  PRIMARY KEY (cameraId)
);



CREATE TABLE IF NOT EXISTS Car (
  regPlate varchar(11) NOT NULL,
  model text NOT NULL,
  PRIMARY KEY (regPlate)
);

CREATE TABLE IF NOT EXISTS dbuser (
  userId int NOT NULL AUTO_INCREMENT,
  name text NOT NULL,
  email text NOT NULL,
  PRIMARY KEY (userId)
);

CREATE TABLE IF NOT EXISTS file (
  fileId int NOT NULL AUTO_INCREMENT,
  fileLink text NOT NULL,
  PRIMARY KEY (fileId)
);

CREATE TABLE IF NOT EXISTS factdedication (
  factId int NOT NULL AUTO_INCREMENT,
  cameraId int NOT NULL,
  regPlate varchar(11) NOT NULL,
  fileId int NOT NULL,
  PRIMARY KEY (factId),
  KEY cameraId (cameraId),
  KEY regPlate (regPlate),
  KEY files_ibfk_1 (fileId),
  CONSTRAINT factdedication_ibfk_1 FOREIGN KEY (cameraId) REFERENCES Cameras (cameraId),
  CONSTRAINT factdedication_ibfk_2 FOREIGN KEY (regPlate) REFERENCES Car (regPlate),
  CONSTRAINT files_ibfk_1 FOREIGN KEY (fileId) REFERENCES file (fileId)
);

CREATE TABLE IF NOT EXISTS fine (
  fineId int NOT NULL AUTO_INCREMENT,
  datetime datetime NOT NULL,
  userId int NOT NULL,
  setting enum('speed','line','sign') NOT NULL,
  PRIMARY KEY (fineId),
  KEY userId (userId),
  CONSTRAINT fine_ibfk_1 FOREIGN KEY (userId) REFERENCES dbuser (userId)
);

CREATE TABLE IF NOT EXISTS vehicleowner (
  idCard int NOT NULL,
  fineId int DEFAULT 0,
  name varchar(20) NOT NULL,
  carReg varchar(11) NOT NULL,
  PRIMARY KEY (idCard),
  KEY carReg (carReg),
  KEY fineId (fineId),
  CONSTRAINT vehicleowner_ibfk_1 FOREIGN KEY (carReg) REFERENCES Car (regPlate),
  CONSTRAINT vehicleowner_ibfk_2 FOREIGN KEY (fineId) REFERENCES fine (fineId)
);

-- TRUNCATE table cameraproject.Cameras;

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

insert into cameraproject.car (regPlate,model) values
	('000D065 58','АО «Симонов-Фокин»'),
	('001CD7 80','РАО «Захарова Миронова»'),
	('002D386 83','ТАИФ-НК'),
	('002D571 77','Максимов Лтд'),
	('003CD5 08','Зарубежнефть'),
	('004CD7 102','Нестле Россия'),
	('005CD7 16','НПО «Белозеров Королев»'),
	('005T121 27','НПО «Шилова-Богданова»'),
	('006CD0 22','Фаберлик'),
	('006CD4 799','АО «Туров, Богданова и Фомина»');
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

insert into cameraproject.factdedication (cameraId,regPlate,fileId) values
	(1,'000D065 58',1);



-- insert into cameraproject.vehicleowner (idCard,fineId,name,carReg) values
-- 	(100,10,'Юрий','000D065 58'),
-- 	(200,20,'Елисей','001CD7 80'),
-- 	(300,30,'Сергей','002D386 83'),
-- 	(400,40,'Зосима','002D571 77'),
-- 	(500,50,'Глафира','003CD5 08');