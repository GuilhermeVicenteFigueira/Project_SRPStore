<?php

declare(strict_types=1);

namespace Src\Contracts;

interface Productrepository
{
    /**
     * @param array{
     * id: int,
     * name:string,
     * price:float
     * } $products
     */
    public function saveProduct(array $products): void;
}