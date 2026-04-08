DROP DATABASE IF EXISTS lanchonete;
CREATE DATABASE lanchonete;
USE lanchonete;

CREATE TABLE produtos (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    descricao TEXT NULL,
    preco DECIMAL(10, 2) NOT NULL
);

CREATE TABLE pedidos (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome_cliente VARCHAR(100) NOT NULL,
    data DATETIME DEFAULT CURRENT_TIMESTAMP,
    status ENUM("em preparo", "pronto", "entregue") DEFAULT "em preparo"
);

CREATE TABLE itens_pedido (
    id INT PRIMARY KEY AUTO_INCREMENT,
    fkIdPedido INT,
    fkIdProduto INT,
    quantidade INT DEFAULT 1,
    preco DECIMAL(10, 2),

    FOREIGN KEY (fkIdPedido) REFERENCES pedidos(id),
    FOREIGN KEY (fkIdProduto) REFERENCES produtos(id)
);