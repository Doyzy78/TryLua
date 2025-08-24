CREATE DATABASE mods_db;

USE mods_db;

CREATE TABLE mods (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    description TEXT NOT NULL,
    features TEXT NOT NULL,
    download_link VARCHAR(255) NOT NULL,
    youtube_link VARCHAR(255),
    image VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);