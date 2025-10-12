<?php

declare(strict_types=1);

namespace src\Contracts;

interface ProductRepository
{
    /**
     * @param array{
     * id: int,
     * name:string,
     * price:float
     * } $products
     */
    
    public function saveProduct(array $products): void;

    public function findAll(): array;
}