<?php

declare(strict_types=1);

namespace src\Domain;

use src\Contracts\ProductValidator;

final class SimpleProductValidator implements ProductValidator
{
    public function validate(array $input): array
    {
        $log = [];

        $name = trim($input['name'] ?? '');
        $price = $input['price'] ?? null;

    
        if ($name === '') {
            $log[] = "Nome é obrigatório";
        }
        if ($name !== '' && strlen($name) < 2) {
            $log[] = "Rejeitado! nome muito pequeno";
        }
        if ($name !== '' && strlen($name) > 100) {
            $log[] = "Rejeitado! nome muito grande";
        }

   
        if ($price === null || $price === '') {
            $log[] = "Preço é obrigatório";
        }
        if ($price !== null && $price !== '' && !is_numeric($price)) {
            $log[] = "Rejeitado! o preço deve ser um numérico";
        }
        if ($price !== null && $price !== '' && is_numeric($price) && $price < 0) {
            $log[] = "Rejeitado! preço está negativo";
        }

    return $log;
    }

}
   
