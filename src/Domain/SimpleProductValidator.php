<?php

declare(strict_types=1);

namespace src\Domain;

use src\Contracts\ProductValidator;

final class SimpleProductValidator implements ProductValidator
{

    public function validate(array $input): array
    {
        $log = [];

        $name = $input['name'] ?? '';
        $price = $input['price'] ?? '';

        if(empty($name)) {
            $log[] = "Nome é Obrigatório";
        }

        if(strlen($name) > 100) {
            $log[] = "Rejeitado! nome muito grande";
        }

        if(strlen($name) < 2) {
            $log[] = "Rejeitado! nome muito pequeno";
        }

        if($price < 0) {
            $log[] = "Rejeitado! preço está negativo";
        }

        if(!is_float($price)) {
            $log[] = "Rejeitado! o preço deve ser um numérico";
        }

        if ($price == null || $price == '') {
            $log[] = "Preço é obrigatório";
        }
        
        return $log;
    }
}