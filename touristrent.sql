USE mysql;

CREATE USER 'admin'@'localhost' IDENTIFIED BY 'fjeclot';

CREATE DATABASE touristrent;

USE touristrent;

GRANT ALL PRIVILEGES ON touristrent.* TO 'admin'@'localhost';

FLUSH PRIVILEGES;