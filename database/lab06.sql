DROP DATABASE lab06;
CREATE DATABASE IF NOT EXISTS lab06;
USE lab06;

-- TABLE ALUMNOS 
CREATE TABLE ALUMNOS(
    alumno_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    ape_paterno VARCHAR(100) NOT NULL,
    ape_materno VARCHAR(100) NOT NULL
);

-- TABLE CURSOS
CREATE TABLE CURSOS(
    curso_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nombre_curso VARCHAR(100),
    creditos INT
);

-- TABLE MATRICULAS
CREATE TABLE MATRICULAS(
    matricula_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    curso_id INT,
    alumno_id INT
);

-- ADD FOREIGN KEY 
ALTER TABLE MATRICULAS
ADD FOREIGN KEY (curso_id) REFERENCES CURSOS(curso_id) ON DELETE CASCADE;

ALTER TABLE MATRICULAS
ADD FOREIGN KEY (alumno_id) REFERENCES ALUMNOS(alumno_id) ON DELETE CASCADE ;

-- INSERT DATA IN THE TABLE ALUMNOS
INSERT INTO ALUMNOS (nombre, ape_paterno, ape_materno) VALUES
    ('Duberly', 'Mondragon', 'Manchay'), 
    ('Jaime', 'Farfan', 'Gomes'), 
    ('Pedro', 'Martínez', 'Cruz');

-- INSERT DATA IN THE TABLE CURSOS
INSERT INTO CURSOS (nombre_curso, creditos) VALUES
    ('Poo', 4), 
    ('Bd', 3), 
    ('Ingles', 5);

-- INSERT DATA IN THE TABLE MATRICULAs
INSERT INTO MATRICULAS (curso_id, alumno_id) VALUES
    (1, 1),
    (2, 1),
    (3, 2);




SELECT M.matricula_id,A.nombre, A.ape_paterno, A.ape_materno, C.nombre_curso,C.creditos
FROM ALUMNOS AS A
INNER JOIN MATRICULAS AS M ON A.alumno_id = M.alumno_id
INNER JOIN CURSOS AS C ON M.curso_id = C.curso_id;
