CREATE DATABASE IF NOT EXISTS video_laravel;
USE video_laravel;

CREATE TABLE Users(
	ID INTEGER PRIMARY KEY AUTO_INCREMENT,
    Rol VARCHAR(20),
    Name VARCHAR(255),
    Surname VARCHAR(255),
    Email VARCHAR(255),
    Password VARCHAR(255),
    Image VARCHAR(255),
    Created_at DATETIME,
    Updated_at DATETIME,
    Remember_tokeh VARCHAR(255)
)ENGINE=InnoDb;

CREATE TABLE Videos(
	ID INTEGER PRIMARY KEY AUTO_INCREMENT,
    User_Id INTEGER NOT NULL,
    Title VARCHAR(255),
    Description TEXT,
    Status VARCHAR(20),
    Image VARCHAR(255),
    VideoPath VARCHAR(255),
    Created_at DATETIME,
    Updated_at DATETIME,
    CONSTRAINT fk_videos_users FOREIGN KEY (User_Id) REFERENCES Users(ID)
)ENGINE=InnoDb;

CREATE TABLE Comments(
	ID INTEGER PRIMARY KEY AUTO_INCREMENT,
    User_Id INTEGER NOT NULL,
	Video_Id INTEGER NOT NULL,
    Body TEXT,
    Created_at DATETIME,
    Updated_at DATETIME,
    CONSTRAINT fk_comments_users FOREIGN KEY (User_Id) REFERENCES Users(ID),
    CONSTRAINT fk_comments_videos FOREIGN KEY (Video_Id) REFERENCES Videos(ID)
)ENGINE=InnoDb;














