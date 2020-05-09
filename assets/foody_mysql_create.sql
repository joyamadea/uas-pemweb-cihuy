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

CREATE TABLE `Super Admin` (
	`superAdminID` INT(3) NOT NULL AUTO_INCREMENT,
	`email` varchar(255) NOT NULL,
	`displayName` varchar(255) NOT NULL,
	`password` varchar(255) NOT NULL,
	`fullName` varchar(255) NOT NULL,
	`birthDate` DATE NOT NULL,
	PRIMARY KEY (`superAdminID`)
);

CREATE TABLE `Food` (
	`foodID` INT(3) NOT NULL AUTO_INCREMENT,
	`foodName` varchar(255) NOT NULL,
	`foodCategory` int(3) NOT NULL,
	`stock` INT(25) NOT NULL,
	`photoLink` varchar(255) NOT NULL,
	`desc` varchar(255) NOT NULL,
	`price` FLOAT NOT NULL,
	PRIMARY KEY (`foodID`)
);

CREATE TABLE `FoodCategory` (
	`categoryID` INT(3) NOT NULL AUTO_INCREMENT,
	`categoryName` varchar(255) NOT NULL,
	PRIMARY KEY (`categoryID`)
);

CREATE TABLE `Transaction` (
	`transID` INT(3) NOT NULL AUTO_INCREMENT,
	`custID` int(3) NOT NULL,
	`orderDate` DATE NOT NULL,
	`paymentType` int(3) NOT NULL,
	`total` FLOAT NOT NULL,
	`status` BOOLEAN NOT NULL DEFAULT '0',
	PRIMARY KEY (`transID`)
);


CREATE TABLE `Transaction Detail` (
	`transID` INT(3) NOT NULL,
	`foodID` int(3) NOT NULL,
	`quantity` INT(5) NOT NULL
);

CREATE TABLE `Payment` (
	`paymentID` INT(3) NOT NULL,
	`payment` varchar(15) NOT NULL,
	PRIMARY KEY (`paymentID`)
);

ALTER TABLE `Food` ADD CONSTRAINT `Food_fk0` FOREIGN KEY (`foodCategory`) REFERENCES `FoodCategory`(`categoryID`);

ALTER TABLE `Transaction` ADD CONSTRAINT `Transaction_fk0` FOREIGN KEY (`custID`) REFERENCES `User`(`custID`);

ALTER TABLE `Transaction` ADD CONSTRAINT `Transaction_fk1` FOREIGN KEY (`paymentType`) REFERENCES `Payment`(`paymentID`);

ALTER TABLE `Transaction Detail` ADD CONSTRAINT `Transaction Detail_fk0` FOREIGN KEY (`transID`) REFERENCES `Transaction`(`transID`);

ALTER TABLE `Transaction Detail` ADD CONSTRAINT `Transaction Detail_fk1` FOREIGN KEY (`foodID`) REFERENCES `Food`(`foodID`);


INSERT INTO `FoodCategory`(`categoryName`) VALUES ('Appetizer'), ('Main Course'), ('Dessert'), ('Snack'), ('Drink');

INSERT INTO `Food` (`foodName`,`foodCategory`,`stock`, `photoLink`,`desc`,`price`)
VALUES ( 'Mushroom Soup', '1', '20', 'Creamy-Garlic-Mushroom-Soup-spoon.jpg', 'Creamy mushroom soup that will warm your body', '40000'),
('Chicken Soup', '1', '20', 'soup.jpg', 'Creamy and cheesy chicken soup that will warm your body', '40000'),
('Tenderloin Steak', '2', '20', '045813900_1489071066-sirloin.jpg', 'Thick, hearty, juicy steak cooked according to your liking', '300000'),
('Spaghetti Carbonara', '2', '20','recipe-image-legacy-id--1001491_11.jpg', 'Creamy pasta cooked to al dente','70000'),
('Chocolate Lava Cake','3','20','IMG_6207-chocolate-molten-lava-cakes-recipe-square.jpg','Chocolate goodness that will melt in your mouth', '35000'),
('Gelato Ice Cream','3', '20','76389-es-krim-neapolitan-shutterstock.jpg','Italian style ice cream (Chocolate, Strawberry, Vanilla flavor)','35000'),
('Seasoned Fries','4','20','frozenfrenchfries14.jpg','Seasoned with our specialty herbs and with your choice of dipping sauce', '40000'),
('Lemonade','5','20','2586d951-a46a-4091-aec6-eca3adefb409.jpg','Refreshing lemonade, perfect for summer!','28000')
