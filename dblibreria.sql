CREATE DATABASE dblibreria

CREATE TABLE contactos (
    `id` int AUTO_INCREMENT PRIMARY KEY,
    `fecha` date,
    `correo` varchar(150),
    `nombre` varchar(200),
    `asunto` varchar(200),
    `comentario` text
);

CREATE TABLE `autores` (
  `id_autor` varchar(11) NOT NULL,
  `apellido` varchar(15) NOT NULL,
  `nombre` varchar(15) NOT NULL,
  `telefono` varchar(12) NOT NULL,
  `direccion` varchar(20) NOT NULL,
  `ciudad` varchar(15) NOT NULL,
  `estado` varchar(2) NOT NULL,
  `pais` varchar(3) NOT NULL,
  `cod_postal` int(5) NOT NULL,
  PRIMARY KEY  (`id_autor`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

CREATE TABLE `titulos` (
  `id_titulo` varchar(6) NOT NULL,
  `titulo` varchar(60) NOT NULL,
  `tipo` varchar(15) NOT NULL,
  `id_pub` varchar(4) NOT NULL,
  `precio` double default NULL,
  `avance` double default NULL,
  `total_ventas` int(11) default NULL,
  `notas` varchar(255) NOT NULL,
  `fecha_pub` datetime NOT NULL,
  `contrato` varchar(1) NOT NULL,
  PRIMARY KEY  (`id_titulo`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

CREATE TABLE `titulo_autor` (
  `id_autor` varchar(11) NOT NULL,
  `id_titulo` varchar(6) NOT NULL,
  `ord_au` varchar(1) NOT NULL,
  `derechos` int(11) NOT NULL,
  PRIMARY KEY  (`id_autor`,`id_titulo`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;



INSERT INTO `autores` VALUES ('172-32-117', 'White', 'Johnson   ', '408-496-7210', 'BiggMenlo ', 'Park', 'CA', 'USA', 94025);
INSERT INTO `autores` VALUES ('213-46-891', 'Green', 'Marjorie  ', '415 986-7030', '63rd', 'SOakland', 'CA', 'USA', 94618);
INSERT INTO `autores` VALUES ('238-95-776', 'Carson', 'Cheryl ', '415 548-7758', 'Darwin', 'Berkeley', 'CA', 'USA', 94705);
INSERT INTO `autores` VALUES ('267-41-239O', 'Leary   ', 'Michael', '408 286-2422', 'Clevela', 'San Jose', 'CA', 'USA', 95128);
INSERT INTO `autores` VALUES ('274-80-9391', 'Straight', 'Dick', '415 834-2919', '5420 College Av.', 'Oakland', 'CA', 'USA', 94609);
INSERT INTO `autores` VALUES ('341-22-1782', 'Smith', 'Meander', '913 843-0462', '10 Mississippi Dr.', 'Lawrence', 'KS', 'USA', 66044);
INSERT INTO `autores` VALUES ('409-56-7008', 'Bennet', 'Abraham', '415 658-9932', '6223 Bateman St.', 'Berkeley', 'CA', 'USA', 94705);
INSERT INTO `autores` VALUES ('472-27-2349', 'Gringlesby', 'Burt', '707 938-6445', 'PO Box 792', 'Covelo', 'CA', 'USA', 95428);
INSERT INTO `autores` VALUES ('486-29-1786', 'Locksley', 'Chastity', '415 585-4620', '18 Broadway Av.', 'San Francisco', 'CA', 'USA', 94130);
INSERT INTO `autores` VALUES ('527-72-3246', 'Greene', 'Morningstar', '615 297-2723', '22 Graybar House Rd.', 'Nashville', 'TN', 'USA', 37215);
INSERT INTO `autores` VALUES ('648-92-1872', 'Blotchet-Halls', 'Reginald', '503 745-6402', '55 Hillsdale Bl.', 'Corvallis', 'OR', 'USA', 97330);
INSERT INTO `autores` VALUES ('672-71-3249', 'Yokomoto', 'Akiko', '415 935-4228', '3 Silver Ct.', 'Walnut Creek', 'CA', 'USA', 94595);
INSERT INTO `autores` VALUES ('712-45-1867', 'del Castillo', 'Innes', '615 996-8275', '2286 Cram Pl. #86', 'Ann Arbor', 'MI', 'USA', 48105);
INSERT INTO `autores` VALUES ('722-51-5454', 'DeFrance', 'Michel', '219 547-9982', '3 Balding Pl.', 'Gary', 'IN', 'USA', 46403);
INSERT INTO `autores` VALUES ('724-08-9931', 'Stringer', 'Dirk', '415 843-2991', '5420 Telegraph Av.', 'Oakland', 'CA', 'USA', 94609);
INSERT INTO `autores` VALUES ('724-80-9391', 'MacFeather', 'Stearns', '415 354-7128', '44 Upland Hts.', 'Oakland', 'CA', 'USA', 94612);
INSERT INTO `autores` VALUES ('756-30-7391', 'Karsen', 'Livia', '415 534-9219', '5720 McAuley St.', 'Oakland', 'CA', 'USA', 94609);
INSERT INTO `autores` VALUES ('807-91-6654', 'Panteley', 'Sylvia', '301 946-8853', '1956 Arlington Pl.', 'Rockville', 'MD', 'USA', 20853);
INSERT INTO `autores` VALUES ('846-92-7186', 'Hunter', 'Sheryl', '415 836-7128', '3410 Blonde St.', 'Palo Alto', 'CA', 'USA', 94301);
INSERT INTO `autores` VALUES ('893-72-1158', 'McBadden', 'Heather', '707 448-4982', '301 Putnam', 'Vacaville', 'CA', 'USA', 95688);
INSERT INTO `autores` VALUES ('899-46-2035', 'Ringer', 'Anne', '801 826-0752', '67 Seventh Av.', 'Salt Lake City', 'UT', 'USA', 84152);
INSERT INTO `autores` VALUES ('998-72-3567', 'Ringer', 'Albert', '801 826-0752', '67 Seventh Av.', 'Salt Lake City', 'UT', 'USA', 84152);


INSERT INTO `titulos` VALUES ('BU1032', 'The Busy Executive''s Database Guide', 'business', '1389', 20, 5000, 4095, 'An overview of available database systems with emphasis on common business applications.  Illustrated.', '1986-06-12 12:00:00', '1');
INSERT INTO `titulos` VALUES ('BU1111', 'Cooking with Computers: Surreptitious Balance Sheets', 'business', '1389', 12, 5000, 3876, 'Helpful hints on how to use your electronic resources to the best advantage.', '1988-06-09 12:00:00', '1');
INSERT INTO `titulos` VALUES ('BU2075', 'You Can Combat Computer Stress!', 'business', '0736', 2.99, 10125, 18722, 'The latest medical and psychological techniques for living with the electronic office.  Easy-to-understand explanations.', '1985-06-30 12:00:00', '1');
INSERT INTO `titulos` VALUES ('BU7832', 'Straight Talk About Computers', 'business', '1389', 20, 5000, 4095, 'Annotated analysis of what computers can do for you: a no-hype guide for the critical user.', '1987-06-22 12:00:00', '1');
INSERT INTO `titulos` VALUES ('MC2222', 'Silicon Valley Gastronomic Treats', 'mod_cook', '0877', 20, 0, 2032, 'Favorite recipes for quick, easy, and elegant meals, tried and tested by people who never have time to eat, let alone cook.', '1989-06-09 12:00:00', '1');
INSERT INTO `titulos` VALUES ('MC3021', 'The Gourmet Microwave', 'mod_cook', '0877', 2.99, 15000, 22246, 'Traditional French gourmet recipes adapted for modern microwave cooking.', '1985-06-18 12:00:00', '1');
INSERT INTO `titulos` VALUES ('MC3026', 'The Psychology of Computer Cooking', 'UNDECIDED', '0877', NULL, NULL, NULL, '', '2000-01-10 12:19:59', '0');
INSERT INTO `titulos` VALUES ('PC1035', 'But Is It User Friendly?', 'popular_comp', '1389', 23, 7000, 8780, 'A survey of software for the naive user, focusing on the ''friendliness'' of each.', '1986-06-30 12:00:00', '1');
INSERT INTO `titulos` VALUES ('PC8888', 'Secrets of Silicon Valley', 'popular_comp', '1389', 20, 8000, 4095, 'Muckraking reporting by two courageous women on the world''s largest computer hardware and software manufacturers.', '1987-06-12 12:00:00', '1');
INSERT INTO `titulos` VALUES ('PC9999', 'Net Etiquette', 'popular_comp', '1389', NULL, NULL, NULL, 'A must-read for computer conferencing debutantes!', '2000-01-10 12:19:13', '0');
INSERT INTO `titulos` VALUES ('PS1372', 'Computer Phobic and Non-Phobic Individuals: Behavior Variati', 'psychology', '0877', 21.6, 7000, 375, 'A must for the specialist, this book examines the difference between those who hate and fear computers and those who think they are swell.', '1989-06-15 12:00:00', '1');
INSERT INTO `titulos` VALUES ('PS2091', 'Is Anger the Enemy?', 'psychology', '0736', 11, 2275, 2045, 'Carefully researched study of the effects of strong emotions on the body.  Metabolic charts included.', '1989-06-15 12:00:00', '1');
INSERT INTO `titulos` VALUES ('PS2106', 'Life Without Fear', 'psychology', '0736', 7, 6000, 111, 'New exercise, meditation, and nutritional techniques that can reduce the shock of daily interactions. Popular audience.  Sample menus included, exercise video available separately.', '1990-10-05 12:00:00', '1');
INSERT INTO `titulos` VALUES ('PS3333', 'Prolonged Data Deprivation: Four Case Studies', 'psychology', '0736', 20, 2000, 4072, 'What happens when the data runs dry?  Searching evaluations of information-shortage effects on heavy users.', '1988-06-12 12:00:00', '1');
INSERT INTO `titulos` VALUES ('PS7777', 'Emotional Security: A New Algorithm', 'psychology', '0736', 7.99, 4000, 3336, 'Protecting yourself and your loved ones from undue emotional stress in the modern world.  Use of computer and nutritional aids emphasized.', '1988-06-12 12:00:00', '1');
INSERT INTO `titulos` VALUES ('TC3218', 'Onions, Leeks, and Garlic: Cooking Secrets of the Mediterran', 'trad_cook', '0877', 21, 7000, 375, 'Profusely illustrated in color, this makes a wonderful gift book for a cuisine-oriented friend.', '1990-10-21 12:00:00', '1');
INSERT INTO `titulos` VALUES ('TC4203', 'Fifty Years in Buckingham Palace Kitchens', 'trad_cook', '0877', 12, 4000, 15096, 'More anecdotes from the Queen''s favorite cook describing life among English royalty.  Recipes, techniques, tender vignettes.', '1985-06-12 12:00:00', '1');
INSERT INTO `titulos` VALUES ('TC7777', 'Sushi, Anyone?', 'trad_cook', '0877', 15, 8000, 4095, 'Detailed instructions on improving your position in life by learning how to make authentic Japanese sushi in your spare time.  5-10% increase in number of friends per recipe reported from beta test.', '1987-06-12 12:00:00', '1');


INSERT INTO `titulo_autor` VALUES ('172-32-1176', 'PS3333', '1', 100);
INSERT INTO `titulo_autor` VALUES ('213-46-8915', 'BU1032', '2', 40);
INSERT INTO `titulo_autor` VALUES ('213-46-8915', 'BU2075', '1', 100);
INSERT INTO `titulo_autor` VALUES ('238-95-7766', 'PC1035', '1', 100);
INSERT INTO `titulo_autor` VALUES ('267-41-2394', 'BU1111', '2', 40);
INSERT INTO `titulo_autor` VALUES ('267-41-2394', 'TC7777', '2', 30);
INSERT INTO `titulo_autor` VALUES ('274-80-9391', 'BU7832', '1', 100);
INSERT INTO `titulo_autor` VALUES ('409-56-7008', 'BU1032', '1', 60);
INSERT INTO `titulo_autor` VALUES ('427-17-2319', 'PC8888', '1', 50);
INSERT INTO `titulo_autor` VALUES ('472-27-2349', 'TC7777', '3', 30);
INSERT INTO `titulo_autor` VALUES ('486-29-1786', 'PC9999', '1', 100);
INSERT INTO `titulo_autor` VALUES ('486-29-1786', 'PS7777', '1', 100);
INSERT INTO `titulo_autor` VALUES ('648-92-1872', 'TC4203', '1', 100);
INSERT INTO `titulo_autor` VALUES ('672-71-3249', 'TC7777', '1', 40);
INSERT INTO `titulo_autor` VALUES ('712-45-1867', 'MC2222', '1', 100);
INSERT INTO `titulo_autor` VALUES ('722-51-5454', 'MC3021', '1', 75);
INSERT INTO `titulo_autor` VALUES ('724-80-9391', 'BU1111', '1', 60);
INSERT INTO `titulo_autor` VALUES ('724-80-9391', 'PS1372', '2', 25);
INSERT INTO `titulo_autor` VALUES ('756-30-7391', 'PS1372', '1', 75);
INSERT INTO `titulo_autor` VALUES ('807-91-6654', 'TC3218', '1', 100);
INSERT INTO `titulo_autor` VALUES ('846-92-7186', 'PC8888', '2', 50);
INSERT INTO `titulo_autor` VALUES ('899-46-2035', 'MC3021', '2', 25);
INSERT INTO `titulo_autor` VALUES ('899-46-2035', 'PS2091', '2', 50);
INSERT INTO `titulo_autor` VALUES ('998-72-3567', 'PS2091', '1', 50);
INSERT INTO `titulo_autor` VALUES ('998-72-3567', 'PS2106', '1', 100);