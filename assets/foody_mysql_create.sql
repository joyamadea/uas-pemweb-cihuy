CREATE TABLE `User` (
	`custID` INT(3) NOT NULL AUTO_INCREMENT,
	`email` varchar(255) NOT NULL,
	`displayName` varchar(255) NOT NULL,
	`password` varchar(255) NOT NULL,
	`fullName` varchar(255) NOT NULL,
	`birthDate` DATE NOT NULL,
	`profileLink` varchar(255),
	PRIMARY KEY (`custID`)
);

CREATE TABLE `Admin` (
	`adminID` INT(3) NOT NULL AUTO_INCREMENT,
	`email` varchar(255) NOT NULL,
	`displayName` varchar(255) NOT NULL,
	`password` varchar(255) NOT NULL,
	`fullName` varchar(255) NOT NULL,
	`birthDate` DATE NOT NULL,
	PRIMARY KEY (`adminID`)
);

CREATE TABLE `Food` (
	`foodID` INT(3) NOT NULL AUTO_INCREMENT,
	`foodName` varchar(255) NOT NULL,
	`foodCategory` varchar(255) NOT NULL,
	`stock` INT(25) NOT NULL,
	`photoLink` varchar(255) NOT NULL,
	`desc` varchar(255) NOT NULL,
	`price` FLOAT NOT NULL,
	PRIMARY KEY (`foodID`)
);

CREATE TABLE `Transaction` (
	`transID` INT(3) NOT NULL AUTO_INCREMENT,
	`custID` varchar(255) NOT NULL,
	`orderDate` DATE NOT NULL,
	`paymentType` varchar(3) NOT NULL,
	`total` FLOAT NOT NULL,
	`status` BOOLEAN NOT NULL DEFAULT '0',
	PRIMARY KEY (`transID`)
);

CREATE TABLE `Food Category` (
	`categoryID` INT(3) NOT NULL AUTO_INCREMENT,
	`categoryName` varchar(255) NOT NULL,
	PRIMARY KEY (`categoryID`)
);

CREATE TABLE `Transaction Detail` (
	`transID` INT(3) NOT NULL,
	`foodID` varchar(255) NOT NULL,
	`quantity` INT(5) NOT NULL
);

CREATE TABLE `Payment` (
	`paymentID` INT(3) NOT NULL,
	`payment` varchar(15) NOT NULL,
	PRIMARY KEY (`paymentID`)
);

CREATE TABLE `Super Admin` (
	`superAdminID` INT(3) NOT NULL AUTO_INCREMENT,
	`email` varchar(255) NOT NULL,
	`displayName` varchar(255) NOT NULL,
	`password` varchar(255) NOT NULL,
	`fullName` varchar(255) NOT NULL,
	`birthDate` DATE NOT NULL,
	PRIMARY KEY (`superAdminID`)
);

ALTER TABLE `Food` ADD CONSTRAINT `Food_fk0` FOREIGN KEY (`foodCategory`) REFERENCES `Food Category`(`categoryID`);

ALTER TABLE `Transaction` ADD CONSTRAINT `Transaction_fk0` FOREIGN KEY (`custID`) REFERENCES `User`(`custID`);

ALTER TABLE `Transaction Detail` ADD CONSTRAINT `Transaction Detail_fk0` FOREIGN KEY (`transID`) REFERENCES `Transaction`(`transID`);

ALTER TABLE `Transaction Detail` ADD CONSTRAINT `Transaction Detail_fk1` FOREIGN KEY (`foodID`) REFERENCES `Food`(`foodID`);

ALTER TABLE `Payment` ADD CONSTRAINT `Payment_fk0` FOREIGN KEY (`paymentID`) REFERENCES `Transaction`(`paymentType`);

