<<<<<<< HEAD
-- Removendo a criação do banco de dados (para evitar erro de permissão)
-- CREATE DATABASE IF NOT EXISTS inga_luz_db;
-- USE inga_luz_db;
=======
CREATE DATABASE IF NOT EXISTS inga_luz_db;
USE inga_luz_db;
>>>>>>> ef6bd75 (Revert to commit cc7678f)

CREATE TABLE IF NOT EXISTS newsletter (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    telefone VARCHAR(20) NOT NULL,
    endereco VARCHAR(200) NOT NULL,
    cidade VARCHAR(100) NOT NULL,
    data_cadastro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);