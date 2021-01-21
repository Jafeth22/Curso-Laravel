CREATE DATABASE laravelTest;
USE laravelTest;
CREATE TABLE notes(
	ID INTEGER PRIMARY KEY auto_increment,
    title VARCHAR(255),
    description text,
    created_on datetime DEFAULT NULL,
    updated_on datetime DEFAULT NULL
);
SELECT * FROM notes;