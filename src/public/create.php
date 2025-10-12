<?php

declare(strict_types=1);

require __DIR__ . '/../vendor/autoload.php';

use src\Infra\FileProductRepository;
use src\Domain\SimpleProductValidator;
use src\Application\ProductService;

$file = __DIR__ . '/../data/products.json';

$service = new ProductService(
    new SimpleProductValidator(),
    new FileProductRepository($file),
);

$response = $service->register($_POST);

http_response_code($response ? 201 : 422);

echo $response ? 'Usuario cadastrado com sucesso' : 'Falha no cadastro: produto com nome muito curto';