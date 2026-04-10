

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Pedidos - Lanchonete</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body class="container mt-4">
    <nav class="mb-4">
        <a href="produtos.php" class="btn btn-secondary">Produtos</a>
        <a href="pedidos.php" class="btn btn-primary">Pedidos</a>
    </nav>

    <h2>Criar Novo Pedido</h2>
    <form method="POST" class="card card-body mb-4">
        <input type="text" name="cliente" class="form-control mb-2" placeholder="Nome do Cliente" required>
        <p>Selecione os Produtos:</p>
        <div class="mb-2">
            <?php foreach($todos_produtos as $prod): ?>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="produtos_id[]" value="<?= $prod['id'] ?>">
                    <label class="form-check-label"><?= $prod['nome'] ?> - R$ <?= $prod['preco'] ?></label>
                </div>
            <?php endforeach; ?>
        </div>
        <button type="submit" name="novo_pedido" class="btn btn-success">Finalizar Pedido</button>
    </form>

    <h2>Listagem de Pedidos</h2>
    <table class="table table-bordered">
        <thead class="table-dark">
            <tr><th>Cód</th><th>Cliente</th><th>Data</th><th>Total</th><th>Status</th><th>Ação</th></tr>
        </thead>
        <tbody>
            <?php foreach($pedidos as $ped): ?>
            <tr>
                <td><?= $ped['id'] ?></td>
                <td><?= htmlspecialchars($ped['cliente']) ?></td>
                <td><?= date('d/m H:i', strtotime($ped['data_pedido'])) ?></td>
                <td>R$ <?= number_format($ped['total'], 2, ',', '.') ?></td>
                <td>
                    <form method="POST" class="d-inline">
                        <input type="hidden" name="pedido_id" value="<?= $ped['id'] ?>">
                        <select name="novo_status" onchange="this.form.submit()" class="form-select form-select-sm d-inline w-auto">
                            <option value="em preparo" <?= $ped['status']=='em preparo'?'selected':'' ?>>Em preparo</option>
                            <option value="pronto" <?= $ped['status']=='pronto'?'selected':'' ?>>Pronto</option>
                            <option value="entregue" <?= $ped['status']=='entregue'?'selected':'' ?>>Entregue</option>
                        </select>
                        <input type="hidden" name="atualizar_status">
                    </form>
                </td>
                <td><a href="detalhes.php?id=<?= $ped['id'] ?>" class="btn btn-info btn-sm">Ver Itens</a></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>