<?php

declare(strict_types=1);

namespace Src\Contracts;

final class ProductValidator
{
    /**
     * @param array{
     * id?:int,
     * name?:string,
     * price?:float
     * } $input
     */

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

        if(strlen($name)<2) {
            $log[] = "Rejeitado! nome muito pequeno";
        }

        if($price < 0) {
            $log[] = "Rejeitado! preço está negativo";
        }

        return $log;
    }
}