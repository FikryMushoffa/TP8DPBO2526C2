CREATE DATABASE IF NOT EXISTS tp_mvc25;
USE tp_mvc25;

DROP TABLE IF EXISTS courses;
DROP TABLE IF EXISTS lecturers;
DROP TABLE IF EXISTS departments;

CREATE TABLE departments (
  id INT(11) NOT NULL AUTO_INCREMENT,
  code VARCHAR(10) NOT NULL,
  name VARCHAR(100) NOT NULL,
  faculty VARCHAR(100) NOT NULL,
  PRIMARY KEY (id)
);

INSERT INTO departments (id, code, name, faculty) VALUES
(1, 'RPL', 'Rekayasa Perangkat Lunak', 'FPTI'),
(2, 'TEK', 'Teknik Komputer', 'FPTI'),
(3, 'BIO', 'Biologi', 'FPMIPA'),
(4, 'KIM', 'Kimia', 'FPMIPA'),
(5, 'SIND', 'Sains Data', 'FPMIPA');

CREATE TABLE lecturers (
  id INT(11) NOT NULL AUTO_INCREMENT,
  name VARCHAR(100) NOT NULL,
  nidn VARCHAR(20) NOT NULL,
  phone VARCHAR(20) NOT NULL,
  join_date DATE NOT NULL,
  department_id INT(11) DEFAULT NULL,
  PRIMARY KEY (id),
  KEY idx_lecturers_department (department_id),
  CONSTRAINT fk_lecturers_department FOREIGN KEY (department_id)
    REFERENCES departments (id)
    ON DELETE SET NULL
    ON UPDATE CASCADE
);

INSERT INTO lecturers (id, name, nidn, phone, join_date, department_id) VALUES
(1, 'Dr. Hendra Kusuma', '0415088901', '081321456789', '2020-02-10', 1),
(2, 'Nadia Maharani, M.Kom.', '0422099102', '085298765432', '2022-08-17', 1),
(3, 'Dr. Fajar Nugroho', '0411038703', '082144556677', '2019-04-03', 2),
(4, 'Prof. Ratna Puspita', '0408127804', '087811223344', '2021-09-01', 3),
(5, 'Bagas Prakoso, M.Si.', '0419079305', '089655443322', '2024-01-15', 5);

CREATE TABLE courses (
  id INT(11) NOT NULL AUTO_INCREMENT,
  course_code VARCHAR(20) NOT NULL,
  course_name VARCHAR(100) NOT NULL,
  sks INT(11) NOT NULL,
  semester VARCHAR(30) NOT NULL,
  lecturer_id INT(11) DEFAULT NULL,
  PRIMARY KEY (id),
  KEY idx_courses_lecturer (lecturer_id),
  CONSTRAINT fk_courses_lecturer FOREIGN KEY (lecturer_id)
    REFERENCES lecturers (id)
    ON DELETE SET NULL
    ON UPDATE CASCADE
);

INSERT INTO courses (id, course_code, course_name, sks, semester, lecturer_id) VALUES
(1, 'RP201', 'Arsitektur Perangkat Lunak', 3, 'Ganjil 2026/2027', 1),
(2, 'RP204', 'Pengujian & Penjaminan Mutu', 3, 'Genap 2026/2027', 2),
(3, 'TK102', 'Sistem Tertanam', 3, 'Ganjil 2026/2027', 3),
(4, 'TK205', 'Komputasi Awan', 3, 'Genap 2026/2027', 3),
(5, 'BI104', 'Bioinformatika Dasar', 2, 'Ganjil 2026/2027', 4),
(6, 'SD301', 'Pembelajaran Mesin Lanjut', 4, 'Ganjil 2026/2027', 5);
