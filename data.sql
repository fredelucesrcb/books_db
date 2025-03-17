-- create database

CREATE TABLE `books_db_fredeluces`.`books` ( `id` INT NOT NULL AUTO_INCREMENT , `title` TEXT NOT NULL , `isbn` TEXT NOT NULL , `author` TEXT NOT NULL , `publisher` TEXT NOT NULL , `year_published` INT NOT NULL , `category` TEXT NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;

-- populate data
INSERT INTO `books` (`id`, `title`, `isbn`, `author`, `publisher`, `year_published`, `category`) VALUES (NULL, 'Don Quixote', '9781234567897', 'Miguel de Cervantes Saavedra', 'Dover Publications, INC, Mineola, New York, 2018', '2018', 'Fiction'), (NULL, 'Alices adventures in wonderland', '9783127323207', 'Lewis Carroll ', 'Palazzo Editions Ltd, 2017', '2017', 'Fiction'), (NULL, 'The annotated Huckleberry Finn : Adventures of Huckleberry Finn (Tom Sawyer\'s comrade)', '9783127323202', 'Mark Twain', 'Norton, New York, 2001', '2001', 'Fiction')