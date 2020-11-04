create database `tienda_peliculas`;

use `tienda_peliculas`;

CREATE TABLE `login` (
  `id` int(9) NOT NULL auto_increment,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,  
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB;

CREATE TABLE `peliculas` (
  `id` int(11) NOT NULL auto_increment,
  `titulo` varchar(100) NOT NULL,
  `sinopsis` varchar(100) NOT NULL,
  `login_id` int(11) NOT NULL,
  `fecha_creacion` date NOT NULL,
  `year` int(4) NOT NULL,
  PRIMARY KEY  (`id`),
  FOREIGN KEY (login_id) REFERENCES login(id)
  ON UPDATE CASCADE ON DELETE CASCADE
) ENGINE=InnoDB;
