<?php
declare(strict_types=1);

use src\Application\ProductService;
use src\Infra\FileProductRepository;

$repository = new FileProductRepository(__DIR__ . '/../storage/products.json');
$service = new ProductService($repository);

$products = $service->listAll();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de produtos</title>
</head>
<body>
    <h1>Usuários</h1>
    <table border="1" cellpadding="5">
        <thead>
            <tr>
                <th>Nome</th>
                <th>Preço</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product): ?>
                <tr>
                    <td><?= htmlspecialchars($product['name'] ?? '') ?></td>
                    <td><?= htmlspecialchars($product['price'] ?? '') ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
