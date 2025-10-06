CREATE DATABASE otimizetour; 
USE otimizetour; 

CREATE TABLE usuarios (
    id INT PRIMARY KEY AUTO_INCREMENT, 
    nome VARCHAR(50) NOT NULL, 
    email VARCHAR(30) NOT NULL, 
    senhaHash VARCHAR(100) NOT NULL 
);