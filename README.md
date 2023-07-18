# Data_Siswa
Jika ingin memasukan data siswa menggunakan database(sql)

Buatlah table dan database:

CREATE DATABASE school;
CREATE TABLE students (
    id int(6) NOT NULL AUTO_INREMENT,
    name varchar(32) NOT NUL,
    email varchar(32) NOT NUL,
    address text,
);
