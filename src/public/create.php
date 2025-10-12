<?php
declare(strict_types=1);

require __DIR__ . '/../../vendor/autoload.php';

use src\Infra\FileProductRepository;
use src\Domain\SimpleProductValidator;
use src\Application\ProductService;

$file = __DIR__ . '/../storage/products.json';

$service = new ProductService(
    new FileProductRepository($file),
    new SimpleProductValidator()
);

$response = $service->create($_POST ?? []);
$message = $response ? 'Produto cadastrado com sucesso!' : 'Falha no cadastro: dados inválidos';
$success = $response;
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Resultado Cadastro</title>
    <style>
        body {
            font-family: system-ui, Arial, sans-serif;
            background: linear-gradient(to right, #6a11cb, #2575fc);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .card {
            background: #fff;
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 8px 25px rgba(0,0,0,0.25);
            text-align: center;
            width: 320px;
        }
        h1 {
            color: #3a1fd3ff;
            font-size: 1.8rem;
            margin-bottom: 1rem;
        }
        p {
            font-size: 1rem;
            color: <?= $success ? '#2d8a4c' : '#d32f2f' ?>;
            margin-bottom: 1.5rem;
        }
        .btn {
            display: inline-block;
            padding: 0.8rem 1.8rem;
            background-color: #3a1fd3ff;
            color: #fff;
            font-weight: bold;
            border-radius: 8px;
            text-decoration: none;
            transition: all 0.3s ease;
            box-shadow: 0 4px 12px rgba(0,0,0,0.2);
        }
        .btn:hover {
            background-color: #2a0fa1ff;
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(0,0,0,0.25);
        }
    </style>
</head>
<body>
    <div class="card">
        <h1>Cadastro</h1>
        <p><?= htmlspecialchars($message) ?></p>
        <a href="index.php" class="btn">Voltar</a>
        <a href="products.php" class="btn" style="margin-left:10px;">Ver Produtos</a>
    </div>
</body>
</html>
