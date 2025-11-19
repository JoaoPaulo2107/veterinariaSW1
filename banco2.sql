-- Criar banco e selecionar
CREATE DATABASE IF NOT EXISTS veterinaria;
USE veterinaria;

###############################################################
#   TABELA: Animal
###############################################################
CREATE TABLE Animal (
  Raca VARCHAR(50),
  Nome VARCHAR(50),
  ID_Animal INT PRIMARY KEY AUTO_INCREMENT,
  Idade INT,
  Sexo VARCHAR(10),
  Especie VARCHAR(50),
  Peso DECIMAL(5,2),
  Observacao VARCHAR(255),
  idDono_animal INT   -- FK → usuario
);

-- Inserir dados já existentes
INSERT INTO Animal (Raca, Nome, ID_Animal, Idade, Sexo, Especie, Peso, Observacao, idDono_animal) VALUES
('Persa', 'Betty', 2, 5, 'Fêmea', 'Gato', 5.60, 'Alergia leve', 2),
('Persa', 'Jasmin', 4, 5, 'Fêmea', 'Gato', 13.00, 'Ela é pequena', 1),
('Pastor Alemão', 'Elizabeth', 5, 2, 'Fêmea', 'Cachorro', 22.00, 'Ela é grande', 2),
('Persa', 'Taylor', 6, 11, 'Macho', 'Gato', 12.00, 'Ele é agitado.', 1),
('Labrador', 'Justin', 10, 5, 'Macho', 'Cachorro', 50.00, 'come muito', 1),
('Beija-flor', 'Shawn', 17, 11, 'Fêmea', 'Gato', 11.00, 'Ela é pequena', 2),
('Beija-flor', 'Taylor', 20, 5, 'Macho', 'Cachorro', 13.00, 'ela é violenta.', 5),
('Labrador', 'Justin', 21, 2, 'Macho', 'Cachorro', 50.00, 'Ela é pequena', 6);

###############################################################
#   TABELA: Dono_animal (não usada no login, mas mantida)
###############################################################
CREATE TABLE Dono_animal (
  Telefone VARCHAR(20),
  Nome VARCHAR(80),
  ID_Dono_animal INT PRIMARY KEY AUTO_INCREMENT,
  Email VARCHAR(100),
  CPF VARCHAR(14),
  Endereco VARCHAR(255)
);

INSERT INTO Dono_animal (Telefone, Nome, ID_Dono_animal, Email, CPF, Endereco) VALUES
('(11) 9999-8888', 'João', 1, 'joao@email.com', '123.456.789-00', 'Rua das Flores, 100'),
('(11) 7777-6666', 'Maria', 2, 'maria@email.com', '987.654.321-00', 'Av. Central, 200');

###############################################################
#   TABELA: Funcionario
###############################################################
CREATE TABLE Funcionario (
  ID_veterinario INT PRIMARY KEY AUTO_INCREMENT,
  CRMV VARCHAR(20),
  Nome VARCHAR(80),
  Email VARCHAR(100),
  Telefone VARCHAR(20),
  Especialidade VARCHAR(50),
  Horario VARCHAR(30),
  Sexo VARCHAR(10),
  Data_Nascimento DATE,
  CPF VARCHAR(14)
);

INSERT INTO Funcionario (ID_veterinario, CRMV, Nome, Email, Telefone, Especialidade, Horario, Sexo, Data_Nascimento, CPF) VALUES
(1, '12345-SP', 'Dr. Carlos', 'carlos@vet.com', '(11) 98888-7777', 'Clínico Geral', '08:00-17:00', 'M', '1985-05-20', '111.222.333-44'),
(2, '67890-SP', 'Dra. Ana', 'ana@vet.com', '(11) 97777-6666', 'Cirurgia', '09:00-18:00', 'F', '1990-08-15', '555.666.777-88');

###############################################################
#   TABELA: Usuario (login do sistema)
###############################################################
CREATE TABLE usuario (
  ID_usuario INT PRIMARY KEY AUTO_INCREMENT,
  idDono_animal INT DEFAULT NULL,
  Telefone VARCHAR(20),
  Tipo VARCHAR(20),
  CPF VARCHAR(14),
  Email VARCHAR(100),
  Senha VARCHAR(255),
  Nome VARCHAR(80)
);

INSERT INTO usuario (ID_usuario, idDono_animal, Telefone, Tipo, CPF, Email, Senha, Nome) VALUES
(1, NULL, '1111111111', NULL, '1111111111', 'gabi@gmail.com', '$2y$10$Q0VoBwD4xlLA4KyO9MRYduhPl0cuO/qY6qrSIzbI60b09ss36Z8kK', 'Gabriela Romano'),
(2, NULL, '13131313', NULL, '1111111112', 'a@gmail.com', '$2y$10$HeXc0SbvVty8.2c1.9VPSeKtC2uksnRVz4CfFFzux4yF8fxly/5xi', 'Taylor Swift'),
(3, NULL, '12', NULL, '12', 'sofi@gmail.com', '$2y$10$V6UvCH6m.ZBtGpu29KjaUOP6th3eNoHF3bouNL/veaRr0kZBrKG1u', 'Sofia'),
(4, NULL, '13131313', NULL, '1111111112', 'sofia@gmail.com', '$2y$10$py.gB0VTdJqDujXCVGDcmOruBCY7gCfJ7sONV.bl3.ztds96DhUZe', 'Sofia'),
(5, NULL, '13131313', NULL, '1111111111', 'c@gmail.com', '$2y$10$oa6KNb1w6Ja7IufUDvz3P.ur.v4L2ylURG3ux9tYpXzpJyyw0erpq', 'Clara'),
(6, NULL, '13131313', NULL, '1111111111', 'isa@gmail.com', '$2y$10$Iyq2J78cOueOM1B7130BZup3NshnXFD9dXx4rR4v9hGeEuBHmlvfG', 'Isabela');

###############################################################
#   TABELA: Consulta
###############################################################
CREATE TABLE Consulta (
  ID_consulta INT PRIMARY KEY AUTO_INCREMENT,
  Data_consulta DATE,
  Procedimento VARCHAR(100),
  Horario VARCHAR(30),
  Observacao VARCHAR(255),
  ID_Animal INT,
  ID_veterinario INT
);

INSERT INTO Consulta (ID_consulta, Data_consulta, Procedimento, Horario, Observacao, ID_Animal, ID_veterinario) VALUES
(2, '2024-01-16', 'Check-up', '14:00', 'Consulta de rotina', 2, 2);

###############################################################
#   RELACIONAMENTOS (FOREIGN KEYS)
###############################################################

-- Animal pertence ao USUÁRIO logado
ALTER TABLE Animal
ADD CONSTRAINT fk_animal_usuario
FOREIGN KEY (idDono_animal) REFERENCES usuario(ID_usuario)
ON DELETE CASCADE;

-- Consulta → Animal
ALTER TABLE Consulta
ADD CONSTRAINT fk_consulta_animal
FOREIGN KEY (ID_Animal) REFERENCES Animal(ID_Animal);

-- Consulta → Funcionario
ALTER TABLE Consulta
ADD CONSTRAINT fk_consulta_funcionario
FOREIGN KEY (ID_veterinario) REFERENCES Funcionario(ID_veterinario);

INSERT INTO usuario (Telefone, CPF, Email, Senha, Nome)
VALUES (
  '11999999999',
  '00000000000',
  'admin@vet.com',
  '$2y$10$Q0VoBwD4xlLA4KyO9MRYduhPl0cuO/qY6qrSIzbI60b09ss36Z8kK', -- senha 123
  'Administrador'
);