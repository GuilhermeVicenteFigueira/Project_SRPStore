<?php

declare(strict_types=1);

namespace src\Application;

use src\Domain\SimpleProductValidator;
use src\Infra\FileProductRepository;

final class ProductService 
{
    public function __construct(
        private SimpleProductValidator $validator,
        private FileProductRepository $repo
    ) {
    }

    public function register(array $input): bool
    {
        $errors = $this->validator->validate($input);
        if ($errors !== []) {
            return false;
        }

        $product =  [
            'name' => $input['name'] ?? 'Sem nome',
            'price' => $input['price'],
        ];

        $this->repo->saveProduct($product);
        return true;
    }

    
}
