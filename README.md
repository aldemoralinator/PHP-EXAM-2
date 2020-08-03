### DATABASE SETUP

1. CREATE DATABASE vanillaphpapp; 


2. CREATE USER 'aldem'@'localhost' IDENTIFIED BY 'secret';


3. GRANT ALL PRIVILEGES ON vanillaphpapp.* TO 'aldem'@'localhost';

4. CREATE TABLE currency ( id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY, 
numCode VARCHAR(255) NOT NULL, charCode VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, value VARCHAR(255) NOT NULL, date DATE );

### To Run:

1. cd root

2. php -S localhost:8000
