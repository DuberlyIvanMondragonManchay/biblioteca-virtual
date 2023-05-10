DROP DATABASE biblioteca;
CREATE DATABASE IF NOT EXISTS biblioteca;
USE biblioteca;

-- TABLE AUTORES    
CREATE TABLE AUTORES(
    autor_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    ape_paterno VARCHAR(100) NOT NULL,
    ape_materno VARCHAR(100) NOT NULL
);

-- TABLE LIBROS
CREATE TABLE LIBROS (
    libro_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    imagen VARCHAR(200),
    ano VARCHAR (4),
    autor_id INT NOT NULL,
    titulo VARCHAR(100) NOT NULL,
    url VARCHAR(255) NOT NULL,
    especialidad VARCHAR(100),
    editorial VARCHAR(100) 
);
ALTER TABLE LIBROS CONVERT TO CHARACTER SET utf8 COLLATE utf8_unicode_ci;
ALTER TABLE AUTORES CONVERT TO CHARACTER SET utf8 COLLATE utf8_unicode_ci;

-- ADD FOREIGN KEY 
ALTER TABLE LIBROS
ADD FOREIGN KEY (autor_id) REFERENCES AUTORES(autor_id) ON DELETE CASCADE;
ALTER TABLE LIBROS MODIFY COLUMN titulo VARCHAR(200) NOT NULL;
-- INSERT DATA IN THE TABLE AUTORES
-- INSERTAR DATOS EN LA TABLA AUTORES
INSERT INTO AUTORES (nombre, ape_paterno, ape_materno) VALUES 
    ('Gabriel Garcia', 'Marquez', 'Gonzalez'),
    ('Mario', 'Vargas Llosa', 'Uchuypoma'),
    ('Julio', 'Cortazar', 'Descotte'),
    ('Isabel', 'Allende', 'Llona'),
    ('Jorge', 'Luis Borges', 'Acevedo'),
    ('Pablo', 'Neruda', 'Ricardo'),
    ('Ernest', 'Hemingway', 'Miller'),
    ('William', 'Faulkner', 'Calkins'),
    ('Charles', 'Bukowski', 'Bukowski'),
    ('John', 'Steinbeck', 'Ernst');

-- INSERTAR DATOS EN LA TABLA LIBROS
-- ADD FOREIGN KEY 
INSERT INTO LIBROS (imagen, ano, autor_id, titulo, url, especialidad, editorial) VALUES 
    ('https://images-na.ssl-images-amazon.com/images/I/51ximzwj+rL._SY445_.jpg', '1967', 1, 'Cien años de soledad', 'https://www.amazon.com/Cien-A%C3%B1os-Soledad-Gabriel-Marquez/dp/0307474720/', 'Ficción', 'Editorial Sudamericana'),
    ('https://images-na.ssl-images-amazon.com/images/I/51Ez37rEvQL._SY498_BO1,204,203,200_.jpg', '1960', 2, 'La ciudad y los perros', 'https://www.amazon.com/ciudad-los-perros-Spanish/dp/8466302227/', 'Ficción', 'Editorial Losada'),
    ('https://images-na.ssl-images-amazon.com/images/I/51oAFvJ7pQL._SY498_BO1,204,203,200_.jpg', '1963', 3, 'Rayuela', 'https://www.amazon.com/Rayuela-spanish-Julio-Cortazar/dp/8466332393/', 'Ficción', 'Editorial Sudamericana'),
    ('https://images-na.ssl-images-amazon.com/images/I/61wG+80HSDL._SY498_BO1,204,203,200_.jpg', '1982', 4, 'La casa de los espíritus', 'https://www.amazon.com/Casa-los-Espiritus-Spanish/dp/8401420222/', 'Ficción', 'Plaza & Janés'),
    ('https://images-na.ssl-images-amazon.com/images/I/41CHM8PZNKL._SY498_BO1,204,203,200_.jpg', '1949', 5, 'Ficciones', 'https://www.amazon.com/Ficciones-Spanish-Jorge-Luis-Borges/dp/8466300429/', 'Ficción', 'Emecé Editores'),
    ('https://images-na.ssl-images-amazon.com/images/I/51G2f1s+X9L._SY498_BO1,204,203,200_.jpg', '1924', 6, 'Veinte poemas de amor y una canción desesperada', 'https://www.amazon.com/Veinte-Poemas-Amor-Cancion-Desesperada/dp/0307474747/', 'Poesía', 'Editorial Losada');
