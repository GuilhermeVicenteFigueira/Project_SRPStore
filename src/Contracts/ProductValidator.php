<?php

declare(strict_types=1);

namespace src\Contracts;

interface  ProductValidator
{
    /**
     * @param array{
     * name?:string,
     * price?:float
     * } $input
     */

    public function validate(array $input): array;
   
}