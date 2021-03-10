CREATE SCHEMA `impulsbroodjes` ;

CREATE TABLE `impulsbroodjes`.`broodjes` (
  `broodje_id` INT NOT NULL AUTO_INCREMENT,
  `broodje_name` VARCHAR(45) NOT NULL,
  `broodje_ingredients` VARCHAR(45) NOT NULL,
  `broodje_price` FLOAT NOT NULL,
  `broodje_image` VARCHAR(45) NOT NULL,
  `broodje_image_thumbnail` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`broodje_id`),
  UNIQUE INDEX `broodje_name_UNIQUE` (`broodje_name` ASC),
  UNIQUE INDEX `broodje_ingredients_UNIQUE` (`broodje_ingredients` ASC),
  UNIQUE INDEX `broodje_image_thumbnail_UNIQUE` (`broodje_image_thumbnail` ASC),
  UNIQUE INDEX `broodje_image_UNIQUE` (`broodje_image` ASC) );

ALTER TABLE `impulsbroodjes`.`broodjes` 
CHANGE COLUMN `broodje_image` `broodje_image` VARCHAR(45) NULL ,
CHANGE COLUMN `broodje_image_thumbnail` `broodje_image_thumbnail` VARCHAR(45) NULL ,
DROP INDEX `broodje_image_UNIQUE` ,
DROP INDEX `broodje_image_thumbnail_UNIQUE` ;
;

ALTER TABLE `impulsbroodjes`.`broodjes` 
CHANGE COLUMN `broodje_image` `broodje_image` VARCHAR(500) NULL DEFAULT NULL ;

ALTER TABLE `impulsbroodjes`.`broodjes` 
CHANGE COLUMN `broodje_ingredients` `broodje_ingredients` VARCHAR(150) NOT NULL ;

INSERT INTO `impulsbroodjes`.`broodjes` (`broodje_name`, `broodje_ingredients`, `broodje_price`, `broodje_image`) VALUES ('Kaas', 'kaas, mayo, ei, tomaat, komkommer, sla, wortel', '3.40', 'https://www.managejekanker.nl/wp-content/uploads/2016/04/broodje-kaas-1.jpg');
INSERT INTO `impulsbroodjes`.`broodjes` (`broodje_name`, `broodje_ingredients`, `broodje_price`, `broodje_image`) VALUES ('Mozarella Extra', 'mozzarella, pesto, olijven, zongedroogde tomaten, rucola', '3.70', 'https://www.managejekanker.nl/wp-content/uploads/2016/04/broodje-kaas-1.jpg');
INSERT INTO `impulsbroodjes`.`broodjes` (`broodje_name`, `broodje_ingredients`, `broodje_price`, `broodje_image`) VALUES ('Brie noten', 'Brie, honing, noten, sla', '3.70', 'https://f.jwwb.nl/public/m/y/q/temp-wnpqzwvhamcdljawxeam/0xhh3j/broodjebriehoningnoten.png');
INSERT INTO `impulsbroodjes`.`broodjes` (`broodje_name`, `broodje_ingredients`, `broodje_price`, `broodje_image`) VALUES ('Geitenkaas', 'geitenkaas, honing, pijnboompitten, appel, sla', '3.90', 'https://i0.wp.com/etenmetroos.nl/wp-content/uploads/2017/08/geit.jpg?resize=900%2C450');
INSERT INTO `impulsbroodjes`.`broodjes` (`broodje_name`, `broodje_ingredients`, `broodje_price`, `broodje_image`) VALUES ('Ham', 'ham, ei, tomaat, komkommer, sla, wortel, mayo', '3.50', 'https://www.hoogerbrugcuisine.nl/foto/47/1000/files/Afbeeldingen/zacht_wit_broodje_ham.jpg');
INSERT INTO `impulsbroodjes`.`broodjes` (`broodje_name`, `broodje_ingredients`, `broodje_price`, `broodje_image`) VALUES ('Prepare', 'Preparé, ei, tomaat, komkommer, wortel, sla, mayo', '3.50', 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSzlRVEki80bEoRsSmxrJ906aBQqudVtnKHsg&usqp=CAU');
INSERT INTO `impulsbroodjes`.`broodjes` (`broodje_name`, `broodje_ingredients`, `broodje_price`, `broodje_image`) VALUES ('Kippenwit', 'kippenwit, ei, tomaat, komkommer, sla, wortel, mayo', '3.60', 'https://broodjes-jipsy.be/wp-content/uploads/2014/08/Broodjes_Jipsy.jpg');
INSERT INTO `impulsbroodjes`.`broodjes` (`broodje_name`, `broodje_ingredients`, `broodje_price`, `broodje_image`) VALUES ('Club', 'préparé, augurk, tomaat, verse ui, sla, tartaarsaus', '3.70', 'https://bakkerijaernoudt.be/sites/default/files/styles/large/public/club_00004.jpg?itok=xctOugAl');
INSERT INTO `impulsbroodjes`.`broodjes` (`broodje_name`, `broodje_ingredients`, `broodje_price`, `broodje_image`) VALUES ('Smoske', 'ham, kaas, ei, tomaat, komkommer, sla, wortel, mayo', '3.60', 'https://upload.wikimedia.org/wikipedia/commons/thumb/6/6b/Dagobert_au_jmbon_et_crudit%C3%A9s.jpg/266px-Dagobert_au_jmbon_et_crudit%C3%A9s.jpg');
INSERT INTO `impulsbroodjes`.`broodjes` (`broodje_name`, `broodje_ingredients`, `broodje_price`, `broodje_image`) VALUES ('Martino', 'préparé, augurk, ansjovis, zilveruitjes, tomaat, tabasco, sla, martinosaus', '3.70', 'https://i2.wp.com/www.seasonwithlove.nl/wp-content/uploads/2014/11/broodjemartino.jpg?fit=1000%2C669&ssl=1');
INSERT INTO `impulsbroodjes`.`broodjes` (`broodje_name`, `broodje_ingredients`, `broodje_price`, `broodje_image`) VALUES ('Griekse salade', 'basis + feta kaas, ui, olijven, paprika, rucola', '7.00', 'https://www.leukerecepten.nl/wp-content/uploads/2019/07/griekse-salade_v.jpg');
INSERT INTO `impulsbroodjes`.`broodjes` (`broodje_name`, `broodje_ingredients`, `broodje_price`, `broodje_image`) VALUES ('Kip salade', 'basis + pasta, kippenblokjes, rode ui, olijven, kersttomaten', '7.00', 'https://i0.wp.com/kitchenista.nl/wp-content/uploads/2017/01/kipsalade.jpg?resize=600%2C320&ssl=1');
INSERT INTO `impulsbroodjes`.`broodjes` (`broodje_name`, `broodje_ingredients`, `broodje_price`, `broodje_image`) VALUES ('Salade nicoise', 'basis+ tonijn natuur, ui, paprika, ansjovis, bieslookdressing', '8.00', 'https://img-3.journaldesfemmes.fr/8COrhFruV2keguuWQqaL0SoViws=/748x499/smart/3a86b25b4fd94561959d9ff592bce391/recipe-jdf/10025061.jpg');
INSERT INTO `impulsbroodjes`.`broodjes` (`broodje_name`, `broodje_ingredients`, `broodje_price`, `broodje_image`) VALUES ('Worstenbroodje', 'null', '2.00', 'https://img-3.journaldesfemmes.fr/8COrhFruV2keguuWQqaL0SoViws=/748x499/smart/3a86b25b4fd94561959d9ff592bce391/recipe-jdf/10025061.jpg');

UPDATE `impulsbroodjes`.`broodjes` SET `broodje_id` = '1' WHERE (`broodje_id` = '6');
UPDATE `impulsbroodjes`.`broodjes` SET `broodje_id` = '2' WHERE (`broodje_id` = '7');
UPDATE `impulsbroodjes`.`broodjes` SET `broodje_id` = '3' WHERE (`broodje_id` = '8');
UPDATE `impulsbroodjes`.`broodjes` SET `broodje_id` = '4' WHERE (`broodje_id` = '9');
UPDATE `impulsbroodjes`.`broodjes` SET `broodje_id` = '6' WHERE (`broodje_id` = '11');
UPDATE `impulsbroodjes`.`broodjes` SET `broodje_id` = '5' WHERE (`broodje_id` = '10');
UPDATE `impulsbroodjes`.`broodjes` SET `broodje_id` = '7' WHERE (`broodje_id` = '12');
UPDATE `impulsbroodjes`.`broodjes` SET `broodje_id` = '8' WHERE (`broodje_id` = '13');
UPDATE `impulsbroodjes`.`broodjes` SET `broodje_id` = '9' WHERE (`broodje_id` = '14');
UPDATE `impulsbroodjes`.`broodjes` SET `broodje_id` = '10' WHERE (`broodje_id` = '15');
UPDATE `impulsbroodjes`.`broodjes` SET `broodje_id` = '11' WHERE (`broodje_id` = '16');
UPDATE `impulsbroodjes`.`broodjes` SET `broodje_id` = '12' WHERE (`broodje_id` = '17');
UPDATE `impulsbroodjes`.`broodjes` SET `broodje_id` = '13' WHERE (`broodje_id` = '18');
UPDATE `impulsbroodjes`.`broodjes` SET `broodje_id` = '14' WHERE (`broodje_id` = '19');

ALTER TABLE `impulsbroodjes`.`broodjes` 
ADD COLUMN `broodje_type` VARCHAR(15) NULL AFTER `broodje_name`;

UPDATE `impulsbroodjes`.`broodjes` SET `broodje_type` = 'broodje' WHERE (`broodje_id` = '1');
UPDATE `impulsbroodjes`.`broodjes` SET `broodje_type` = 'broodje' WHERE (`broodje_id` = '2');
UPDATE `impulsbroodjes`.`broodjes` SET `broodje_type` = 'broodje' WHERE (`broodje_id` = '3');
UPDATE `impulsbroodjes`.`broodjes` SET `broodje_type` = 'broodje' WHERE (`broodje_id` = '4');
UPDATE `impulsbroodjes`.`broodjes` SET `broodje_type` = 'broodje' WHERE (`broodje_id` = '5');
UPDATE `impulsbroodjes`.`broodjes` SET `broodje_type` = 'broodje' WHERE (`broodje_id` = '6');
UPDATE `impulsbroodjes`.`broodjes` SET `broodje_type` = 'broodje' WHERE (`broodje_id` = '7');
UPDATE `impulsbroodjes`.`broodjes` SET `broodje_type` = 'broodje' WHERE (`broodje_id` = '8');
UPDATE `impulsbroodjes`.`broodjes` SET `broodje_type` = 'broodje' WHERE (`broodje_id` = '9');
UPDATE `impulsbroodjes`.`broodjes` SET `broodje_type` = 'broodje' WHERE (`broodje_id` = '10');
UPDATE `impulsbroodjes`.`broodjes` SET `broodje_type` = 'salade' WHERE (`broodje_id` = '11');
UPDATE `impulsbroodjes`.`broodjes` SET `broodje_type` = 'salade' WHERE (`broodje_id` = '12');
UPDATE `impulsbroodjes`.`broodjes` SET `broodje_type` = 'salade' WHERE (`broodje_id` = '13');
UPDATE `impulsbroodjes`.`broodjes` SET `broodje_type` = 'andere' WHERE (`broodje_id` = '14');

-- impulsbroodjes.users definition

CREATE TABLE `users` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `user_email` varchar(45) DEFAULT NULL,
  `user_firstname` varchar(45) DEFAULT NULL,
  `user_lastname` varchar(45) DEFAULT NULL,
  `user_password` varchar(60) DEFAULT NULL,
  `user_enabled` tinyint DEFAULT '1',
  `user_is_admin` tinyint DEFAULT '0',
  `user_can_view_orders` tinyint DEFAULT '0',
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `user_email_UNIQUE` (`user_email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;