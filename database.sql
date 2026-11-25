CREATE DATABASE IF NOT EXISTS mecatec CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE mecatec;
CREATE TABLE IF NOT EXISTS clientes (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nome VARCHAR(100) NOT NULL,
  email VARCHAR(100) NOT NULL UNIQUE,
  telefone VARCHAR(20) NOT NULL,
  veiculo VARCHAR(80) NOT NULL,
  criado_em TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
INSERT INTO clientes (nome, email, telefone, veiculo) VALUES
('Marcos Oliveira', 'marcos@email.com', '(21) 98888-1111', 'Gol 1.0 2014'),
('Ana Ribeiro', 'ana@email.com', '(21) 97777-2222', 'Onix 2020');
