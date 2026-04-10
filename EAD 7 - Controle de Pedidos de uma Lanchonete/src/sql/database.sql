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

SELECT * FROM itens_pedido;

SELECT
    p.id AS pedido_id,
    p.nome_cliente,
    p.data,
    p.status,
    pr.nome AS produto_nome,
    ip.quantidade,
    ip.preco
FROM
    pedidos p
    INNER JOIN itens_pedido ip ON p.id = ip.fkIdPedido
    INNER JOIN produtos pr ON ip.fkIdProduto = pr.id
ORDER BY p.id;