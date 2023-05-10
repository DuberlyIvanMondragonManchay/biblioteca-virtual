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
    ('https://images-na.ssl-images-amazon.com/images/I/51ximzwj+rL._SY445_.jpg', '1967', 1, 'Cien años de soledad', 'https://www.secst.cl/upfiles/documentos/02072019_916am_5d1b755b8c54f.pdf', 'Ficción', 'Editorial Sudamericana'),
    ('https://images-na.ssl-images-amazon.com/images/I/51Ez37rEvQL._SY498_BO1,204,203,200_.jpg', '1960', 2, 'La ciudad y los perros', 'https://www.guao.org/sites/default/files/biblioteca/La%20ciudad%20y%20los%20perros%20Vargas%20LLosa.pdf', 'Ficción', 'Editorial Losada'),
    ('https://images-na.ssl-images-amazon.com/images/I/51oAFvJ7pQL._SY498_BO1,204,203,200_.jpg', '1963', 3, 'Rayuela', 'https://web.seducoahuila.gob.mx/biblioweb/upload/Cortazar,%20Julio%20-%20Rayuela.pdf', 'Ficción', 'Editorial Sudamericana'),
    ('https://images-na.ssl-images-amazon.com/images/I/61wG+80HSDL._SY498_BO1,204,203,200_.jpg', '1982', 4, 'La casa de los espíritus', 'https://www.suneo.mx/literatura/subidas/Isabel%20Allende%20La%20Casa%20de%20los%20Esp%C3%ADritus.pdf', 'Ficción', 'Plaza & Janés'),
    ('https://images-na.ssl-images-amazon.com/images/I/41CHM8PZNKL._SY498_BO1,204,203,200_.jpg', '1949', 5, 'Ficciones', 'https://web.seducoahuila.gob.mx/biblioweb/upload/Borges%20Jorge%20-%20Ficciones.pdf', 'Ficción', 'Emecé Editores'),
    ('https://images-na.ssl-images-amazon.com/images/I/51G2f1s+X9L._SY498_BO1,204,203,200_.jpg', '1924', 6, 'Veinte poemas de amor y una canción desesperada', 'http://www.archivochile.com/Homenajes/neruda/de_neruda/homenajepneruda0007.pdf', 'Poesía', 'Editorial Losada');
