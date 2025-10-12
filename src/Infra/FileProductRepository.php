<?php

declare(strict_types=1);

namespace src\Infra;

use src\Contracts\ProductRepository;

final class  FileProductRepository implements ProductRepository 
{
    public function __construct(private string $filePath)
    {
        $dir = dirname($this->filePath);
        if(!is_dir($dir)) {
            mkdir($dir, 0777,true);
        }
        if(!file_exists($this->filePath)) {
            touch($this->filePath);
        }

    }


    
   public function saveProduct(array $product): void
    {
        $product = json_decode(file_get_contents($this->filePath), true) ?: [];

        
        $product['id'] = $product ? max(array_column($product, 'id')) + 1 : 1;

        $product[] = $product;

        file_put_contents(
            $this->filePath,
            json_encode($product, JSON_UNESCAPED_UNICODE) . PHP_EOL,
            FILE_APPEND
        );
    }

    public function findAll(): array 
    {
        
    }

}