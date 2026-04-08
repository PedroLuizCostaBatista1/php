<?php
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Novo Pedido - Lanchonete</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>🍔 Novo Pedido</h2>
        <a href="index.php" class="btn btn-outline-secondary">Voltar para Lista</a>
    </div>

    <?php if ($mensagem): ?>
        <div class="alert alert-danger"><?= $mensagem ?></div>
    <?php endif; ?>

    <form action="novo_pedido.php" method="POST" class="card shadow-sm p-4">
        <div class="mb-4">
            <label class="form-label fw-bold">Nome do Cliente</label>
            <input type="text" name="nome_cliente" class="form-control" placeholder="Digite o nome do cliente" required>
        </div>

        <h4 class="mb-3">Selecione os Produtos</h4>
        <table class="table align-middle">
            <thead class="table-light">
                <tr>
                    <th>Produto</th>
                    <th>Preço Unitário</th>
                    <th style="width: 150px;">Quantidade</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($produtos as $prod): ?>
                <tr>
                    <td>
                        <strong><?= $prod['nome'] ?></strong><br>
                        <small class="text-muted"><?= $prod['descricao'] ?></small>
                    </td>
                    <td>R$ <?= number_format($prod['preco'], 2, ',', '.') ?></td>
                    <td>
                        <input type="number" name="produtos[<?= $prod['id'] ?>]" 
                               class="form-control" value="0" min="0">
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <div class="text-end mt-3">
            <button type="reset" class="btn btn-light">Limpar</button>
            <button type="submit" class="btn btn-success btn-lg">Finalizar Pedido</button>
        </div>
    </form>
</div>
</body>
</html>