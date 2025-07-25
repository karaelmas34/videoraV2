CREATE DATABASE videora_db;
USE videora_db;

CREATE TABLE downloads (
  id INT AUTO_INCREMENT PRIMARY KEY,
  url TEXT,
  filename TEXT,
  downloaded_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);