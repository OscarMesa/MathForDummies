# ************************************************************
# Sequel Pro SQL dump
# Version 3408
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: gogopoint.com (MySQL 5.0.96-community)
# Database: agogo_webs-standards
# Generation Time: 2012-11-13 14:11:28 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table companies
# ------------------------------------------------------------

DROP TABLE IF EXISTS `companies`;

CREATE TABLE `companies` (
  `companies_id` int(11) NOT NULL auto_increment,
  `companies_name` varchar(45) NOT NULL default 'Diligenciar este campo',
  `companies_title` varchar(75) NOT NULL,
  `companies_meta` varchar(175) NOT NULL,
  `companies_keyword` varchar(155) NOT NULL,
  `companies_domain` varchar(100) default 'Diligenciar este campo',
  `companies_address` text NOT NULL,
  `companies_city` varchar(75) NOT NULL,
  `companies_phone` int(15) NOT NULL default '1111111',
  `companies_price` varchar(100) NOT NULL default '1111',
  `companies_description_presentation` varchar(1500) default 'Diligenciar este campo',
  `coordinates_coordinates` varchar(45) NOT NULL default '6.248559922606595,-75.56869626045227',
  `companies_timetable` varchar(200) NOT NULL default 'Diligenciar este campo' COMMENT 'Horario en el cual atienden',
  `companies_logo` varchar(50) default 'WebesStandarPerfil.jpg',
  `companies_banner` varchar(50) default 'WebesStandarBaner.jpg',
  `companies_top` varchar(30) NOT NULL default 'Diligenciar este campo',
  `companies_url` varchar(100) default NULL,
  `companies_facebook` varchar(70) default 'https://www.facebook.com',
  `companies_twitter` varchar(70) default 'https://www.twitter.com',
  `companies_gogopoint` varchar(70) default 'www.gogopoint.com',
  PRIMARY KEY  (`companies_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

LOCK TABLES `companies` WRITE;
/*!40000 ALTER TABLE `companies` DISABLE KEYS */;

INSERT INTO `companies` (`companies_id`, `companies_name`, `companies_title`, `companies_meta`, `companies_keyword`, `companies_domain`, `companies_address`, `companies_city`, `companies_phone`, `companies_price`, `companies_description_presentation`, `coordinates_coordinates`, `companies_timetable`, `companies_logo`, `companies_banner`, `companies_top`, `companies_url`, `companies_facebook`, `companies_twitter`, `companies_gogopoint`)
VALUES
	(1,'prueba','','','','prueba.com','calle 47 Nro 56 B 18 barrio santa ana bello','',4440002,'$50000','super rico.\n\nsuper deliciosa\n\naaaa\n\nbbb','6.331787599999999,-75.56619920000003','lunes a viernes de 9:00 am a 8:00 pm y de sabado a domingo de 200\n\nlisto','e2d1d9aa-1061-42c0-a2e0-27bb1df44838.jpg','7bbfd74c-1214-471c-8c03-68aa15ff44be.jpg','-149px','labs.gogopoint.com','https://www.facebook.com/gogopoint','https://www.twitter.com/gogopoint','http://www.gogopoint.com/bluemarlin'),
	(3,'Prueba Mao','','','','mao.com','calle 43 No 53 - 22','Concordia,Antioquia',2147483647,'10387682478','Hola esta es una puta prueba \n\nasdfkasjfdkjasdf que miedo parce\n\nasdf','6.038608,-75.90018959999998','6:00 am a 11:30 - 1:00 p.m a 5:00 p.m','58ddeea6-a352-4532-bc03-dd07d0a2ca01.png','d9de46b2-d165-4523-862b-51710b460182.jpg','-359px','localhost','https://www.facebook.com','https://www.twitter.com','www.gogopoint.com'),
	(2,'Pizza Factory','Pizza Factory - En todo momento - domicilios','Las mejores pizzas a domicilios, también encuentras hamburguesas, lasagna, pollo, alitas de pollo, grandes promociones y descuentos','Pizzas, hamburguesas, pollo, alitas de pollo, lasagna, promociones, descuentos, domicilio Medellín, Domicilios Bogotá','pizzafactory.com.co','Cra. 69c Nro. 30b 66 Belen rosales\n\nCra. 70 Nro. 18 29 barrio Belen las Playas\n\nCalle 44 Nro. 74-108 San juan.','',4487373,'Desde $11.500','Pizza Factory es lo que estabas esperando, lo mejor en comidas rápidas, con super precios y al instante.\n\nCon nosotros no necesitas cupones, por tan solo $11.500 pesos en nuestro puntos de venta, puedes comprar 1 pizza familiar o 4 lasagnas, o 4 hamburguesas o 24 alitas. \n\nPide ya tus domicilios en el 4487373\n\nLos domicilios solo se realizan en el sector Belén, muy pronto estaran disponibles en todo el valle de aburra.','6.235925,-75.57513699999998','lun. a Dom. de         12:00 m. a 10:00 pm','e1331751-5b37-4436-a864-636336156d55.jpg','46468678-ca1e-4602-818e-fc33cebe3b58.jpg','0px','pizzafactory.com.co','https://www.facebook.com/pizzafactory','https://www.twitter.com/pizzafactorycol','http://gogopoint.com/pizzafactory');

/*!40000 ALTER TABLE `companies` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table content_categories
# ------------------------------------------------------------

DROP TABLE IF EXISTS `content_categories`;

CREATE TABLE `content_categories` (
  `content_categories_id` int(11) NOT NULL auto_increment,
  `content_categories_companies_id` int(11) NOT NULL,
  `content_categories_type_category_id` int(11) NOT NULL,
  `content_categories_title` varchar(100) NOT NULL default '',
  `content_categories_content` text NOT NULL COMMENT 'Texto.',
  `content_categories_price` varchar(50) default NULL,
  PRIMARY KEY  (`content_categories_id`),
  KEY `fk_content_categories_type_category_id` (`content_categories_type_category_id`),
  KEY `fk_content_categories_companies_id` (`content_categories_companies_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `content_categories` WRITE;
/*!40000 ALTER TABLE `content_categories` DISABLE KEYS */;

INSERT INTO `content_categories` (`content_categories_id`, `content_categories_companies_id`, `content_categories_type_category_id`, `content_categories_title`, `content_categories_content`, `content_categories_price`)
VALUES
	(8,1,3,'Arroz','arroz con leche','500'),
	(3,1,1,'PIZZA NAPOLITANA','DFASDFSDFSAFASFD. ASDFSAGAGSSDFASFASF\n\nDSFJASFJKLSDAJFKLAS\nDSKFLSAÑFJKSDJFALKF','$5000'),
	(6,0,0,'','',NULL),
	(7,1,4,'postre 1','descripcion postre 1','1000'),
	(22,1,5,'Combazo 1','cuatro hamburguesas deliciosas con carne queso y ensalada','10000'),
	(10,1,4,'Helado de Chantilli','es un delicioso helado con frutas y chantilli que te encantara demasiado','2000'),
	(11,1,3,'asdas','asdas','30000'),
	(30,2,5,'Hamburguesa','Disfruta una deliciosa hamburguesa con carne y adicion de queso y tocineta.','$4.000'),
	(33,2,5,'Pizza','Con un ingrediente.','15.000'),
	(34,2,5,'Hamburgueza','4 * 15.000','15.000'),
	(35,2,5,'Alitas','Ricas','24 * 15.000'),
	(36,2,5,'Pollo','Asado','15.000'),
	(37,2,5,'Lasagña','Te invitamos a disfrutar una deliciosa lasagña con pollo, carne o mixta.','4 * 15.000'),
	(17,1,4,'perror gris','pepepeepepe','1223'),
	(21,1,1,'Pizza doble pizza','no que chimba eso esta muy bueno que funcionalidad.\n\nme gusta mucho','5000');

/*!40000 ALTER TABLE `content_categories` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table photos
# ------------------------------------------------------------

DROP TABLE IF EXISTS `photos`;

CREATE TABLE `photos` (
  `photos_id` int(11) NOT NULL auto_increment,
  `photos_companies_id` int(11) NOT NULL,
  `photos_description` text NOT NULL COMMENT 'Direcci?n en el servidor de la foto que se coloca en la galer?a de las fotos de una empresa.',
  `photos_name` text NOT NULL,
  `photos_date` timestamp NOT NULL default CURRENT_TIMESTAMP,
  PRIMARY KEY  (`photos_id`),
  KEY `fk_photos_companies_id` (`photos_companies_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `photos` WRITE;
/*!40000 ALTER TABLE `photos` DISABLE KEYS */;

INSERT INTO `photos` (`photos_id`, `photos_companies_id`, `photos_description`, `photos_name`, `photos_date`)
VALUES
	(198,3,'139daa3d-ce76-45f2-947a-72a21af3cbd0.jpg','Ingresar una descripción','2012-10-30 13:18:53'),
	(197,3,'03fcc95d-317d-44de-a451-af6bb1197c49.jpg','Ingresar una descripción','2012-10-30 13:16:52'),
	(191,2,'35a71f71-11e3-468f-a744-e45deb055191.jpg','Ingresar una descripción','2012-10-26 14:52:31'),
	(192,2,'30b8a764-253d-4d15-a7b1-e949581a6a3c.jpg','Ingresar una descripción','2012-10-26 16:05:35'),
	(193,2,'3cd52693-94ca-4337-bb01-9c74e3b37bb8.jpg','Ingresar una descripción','2012-10-26 16:07:20'),
	(194,2,'c02ab5e0-b391-4d7a-9f9c-25c1caacbea5.jpg','Ingresar una descripción','2012-10-26 16:19:45'),
	(195,3,'6a5b7af2-abf3-434c-ae92-c25ebd54c05c.jpg','Ingresar una descripción','2012-10-30 13:16:09'),
	(189,1,'1bfa4c37-e7fc-4eda-afbf-9ed5764d4a22.jpg','Ingresar una descripción','2012-10-10 15:04:53'),
	(188,1,'0a63d6d2-2d69-40e9-9015-d021d461111f.jpg','Ingresar una descripción','2012-10-10 14:51:16');

/*!40000 ALTER TABLE `photos` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table type_category
# ------------------------------------------------------------

DROP TABLE IF EXISTS `type_category`;

CREATE TABLE `type_category` (
  `type_category_id` int(11) NOT NULL auto_increment,
  `type_category_name` varchar(45) default NULL,
  PRIMARY KEY  (`type_category_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

LOCK TABLES `type_category` WRITE;
/*!40000 ALTER TABLE `type_category` DISABLE KEYS */;

INSERT INTO `type_category` (`type_category_id`, `type_category_name`)
VALUES
	(1,'Entrada'),
	(2,'Ensalada'),
	(3,'Plato fuerte'),
	(4,'Postre'),
	(5,'Productos'),
	(6,'Combos'),
	(7,'Promociones');

/*!40000 ALTER TABLE `type_category` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table user
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `user_email` varchar(100) NOT NULL default '',
  `user_name` varchar(100) default '',
  `user_password` varchar(45) default '',
  PRIMARY KEY  (`user_email`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;

INSERT INTO `user` (`user_email`, `user_name`, `user_password`)
VALUES
	('johnjaime.restrepo@gmail.com','John','40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
	('oscarmesa.elpoli@gmail.com','Oskar','24facd3be84f16918c71878f00727d956626aa18'),
	('macmol@gmail.com','Mauricio','40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
	('manhesoft@hotmail.com','ALex','40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
	('daniel.cadavid@gogopoint.com','Daniel','40bd001563085fc35165329ea1ff5c5ecbdbbeef'),
	('pizzafactorymedellin@gmail.com','Pizza','40bd001563085fc35165329ea1ff5c5ecbdbbeef');

/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table user_companies
# ------------------------------------------------------------

DROP TABLE IF EXISTS `user_companies`;

CREATE TABLE `user_companies` (
  `companies_id` int(11) unsigned NOT NULL,
  `user_email` varchar(100) NOT NULL default ''
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

LOCK TABLES `user_companies` WRITE;
/*!40000 ALTER TABLE `user_companies` DISABLE KEYS */;

INSERT INTO `user_companies` (`companies_id`, `user_email`)
VALUES
	(1,'johnjaime.restrepo@gmail.com'),
	(3,'macmol@gmail.com'),
	(2,'pizzafactorymedellin@gmail.com');

/*!40000 ALTER TABLE `user_companies` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
