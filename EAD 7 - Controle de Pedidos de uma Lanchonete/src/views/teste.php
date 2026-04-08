<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Controle de Pedidos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <h2 class="mb-4">📋 Pedidos da Lanchonete</h2>
    
    <form class="row g-3 mb-4">
        <div class="col-auto">
            <select name="status" class="form-select">
                <option value="">Todos os Status</option>
                <option value="em preparo">Em preparo</option>
                <option value="pronto">Pronto</option>
                <option value="entregue">Entregue</option>
            </select>
        </div>
        <div class="col-auto">
            <button type="submit" class="btn btn-primary">Filtrar</button>
        </div>
        <div class="col-auto">
            <a href="novo_pedido.php" class="btn btn-success">Novo Pedido</a>
        </div>
    </form>

    <table class="table table-hover bg-white shadow-sm rounded">
        <thead class="table-dark">
            <tr>
                <th>Código</th>
                <th>Cliente</th>
                <th>Data</th>
                <th>Total</th>
                <th>Status</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pedidos as $p): ?>
            <tr class="<?= $p['status'] != 'entregue' ? 'table-warning' : '' ?>">
                <td>#<?= $p['id'] ?></td>
                <td><?= $p['nome_cliente'] ?></td>
                <td><?= date('d/m/H:i', strtotime($p['data_pedido'])) ?></td>
                <td>R$ <?= number_format($p['total'] ?? 0, 2, ',', '.') ?></td>
                <td><span class="badge bg-secondary"><?= strtoupper($p['status']) ?></span></td>
                <td>
                    <a href="detalhes_pedido.php?id=<?= $p['id'] ?>" class="btn btn-sm btn-info">Ver Itens</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
</html>