<?php
declare(strict_types=1);

require __DIR__ . '/../../vendor/autoload.php';

use src\Application\ProductService;
use src\Infra\FileProductRepository;
use src\Domain\SimpleProductValidator;

$jsonFile = __DIR__ . '/../storage/products.json'; 

// Cria diretório e arquivo se não existirem
$dir = dirname($jsonFile);
if (!is_dir($dir)) {
    mkdir($dir, 0777, true);
}
if (!file_exists($jsonFile) || trim(file_get_contents($jsonFile)) === '') {
    file_put_contents($jsonFile, json_encode([], JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT));
}

$repo = new FileProductRepository($jsonFile);
$validator = new SimpleProductValidator();
$service = new ProductService($repo, $validator);

$products = $service->list();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Lista de Produtos</title>
    <style>
        body {
            font-family: system-ui, Arial, sans-serif;
            background: linear-gradient(to right, #6a11cb, #2575fc);
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 100vh;
        }
        h1 {
            margin-top: 2rem;
            color: #fff;
            text-shadow: 2px 2px 5px rgba(0,0,0,0.3);
            font-size: 2.2rem;
        }
        table {
            border-collapse: collapse;
            width: 70%;
            margin: 2rem 0;
            background: #fff;
            border-radius: 12px;
            overflow: hidden;
            box-shadow: 0 8px 25px rgba(0,0,0,0.2);
            transition: transform 0.2s;
        }
        table:hover {
            transform: translateY(-3px);
        }
        th, td {
            padding: 1rem;
            text-align: center;
            border-bottom: 1px solid #eee;
        }
        th {
            background-color: #3a1fd3ff;
            color: #fff;
            font-size: 1.1rem;
            letter-spacing: 0.5px;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:last-child td {
            border-bottom: none;
        }
        .btn-back {
            display: inline-block;
            padding: 0.8rem 1.8rem;
            margin-bottom: 2rem;
            background-color: #3a1fd3ff;
            color: #fff;
            font-weight: bold;
            border-radius: 8px;
            text-decoration: none;
            transition: all 0.3s ease;
            box-shadow: 0 4px 10px rgba(0,0,0,0.2);
        }
        .btn-back:hover {
            background-color: #2a0fa1ff;
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(0,0,0,0.25);
        }
        @media (max-width: 768px) {
            table {
                width: 90%;
            }
        }
    </style>
</head>
<body>
    <h1>Produtos</h1>

    <table>
        <thead>
            <tr>
                <th>Nome</th>
                <th>Preço (R$)</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($products)): ?>
                <tr>
                    <td colspan="2">Nenhum produto cadastrado</td>
                </tr>
            <?php else: ?>
                <?php foreach ($products as $product): ?>
                    <tr>
                        <td><?= htmlspecialchars($product['name'] ?? '') ?></td>
                        <td><?= number_format((float)($product['price'] ?? 0), 2, ',', '.') ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>

    <a href="index.php" class="btn-back">Voltar</a>
</body>
</html>
