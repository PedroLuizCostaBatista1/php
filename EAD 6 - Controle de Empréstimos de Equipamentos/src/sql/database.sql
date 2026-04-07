CREATE DATABASE emprestimos;
USE emprestimos;

CREATE TABLE usuario (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    telefone VARCHAR(20),
    tipo ENUM("Aluno", "Professor") NOT NULL
);

CREATE TABLE equipamento (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(200) NOT NULL,
    categoria VARCHAR(50),
    patrimonio VARCHAR(50) UNIQUE,
    estado ENUM("disponivel", "emprestado") DEFAULT "disponivel"
);

CREATE TABLE emprestimos (
    id INT PRIMARY KEY AUTO_INCREMENT,
    fkIdUsuario INT,
    fkIdEquipamento INT,
    dataEmprestimo DATE NOT NULL,
    dataPrevista DATE NOT NULL,
    dataReal DATE DEFAULT NULL,
    status ENUM("emprestado", "devolvido", "atrasado") DEFAULT "emprestado",

    FOREIGN KEY (fkIdUsuario) REFERENCES usuario(id),
    FOREIGN KEY (fkIdEquipamento) REFERENCES equipamento(id)
);
