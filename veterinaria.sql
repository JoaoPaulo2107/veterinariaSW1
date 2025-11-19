-- Criar banco e tabelas
CREATE DATABASE veterinaria;
USE veterinaria;

CREATE TABLE Dono_animal (
    ID_Dono INT PRIMARY KEY AUTO_INCREMENT,
    Nome VARCHAR(100),
    Telefone VARCHAR(20)
);

CREATE TABLE Animal (
    ID_Animal INT PRIMARY KEY AUTO_INCREMENT,
    Nome VARCHAR(100),
    Especie VARCHAR(50),
    Raca VARCHAR(50),
    ID_Dono INT,
    FOREIGN KEY (ID_Dono) REFERENCES Dono_animal(ID_Dono)
);

CREATE TABLE Funcionario (
    ID_Func INT PRIMARY KEY AUTO_INCREMENT,
    Nome VARCHAR(100),
    Cargo VARCHAR(50),
    Salario DECIMAL(10,2)
);

CREATE TABLE Consulta (
    ID_Animal INT,
    ID_Func INT,
    Data_consulta DATE,
    FOREIGN KEY (ID_Animal) REFERENCES Animal(ID_Animal),
    FOREIGN KEY (ID_Func) REFERENCES Funcionario(ID_Func)
);

-- Inserindo dados 
INSERT INTO Dono_animal (Nome, Telefone) VALUES 
('João', '(11) 9999-8888'),
('Maria', '(11) 7777-6666');

INSERT INTO Animal (Nome, Especie, Raca, ID_Dono) VALUES 
('Rex', 'Cachorro', 'Labrador', 1),
('Mimi', 'Gato', 'Siamês', 2);

INSERT INTO Funcionario (Nome, Cargo, Salario) VALUES 
('Dr. Carlos', 'Veterinário', 5000.00),
('Dra. Ana', 'Veterinária', 4500.00);

INSERT INTO Consulta VALUES 
(1, 1, '2024-01-15'),
(2, 2, '2024-01-16');

-- Ver tabelas
SELECT * FROM Dono_animal;
SELECT * FROM Animal;
SELECT * FROM Funcionario;
SELECT * FROM Consulta;