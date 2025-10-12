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
    $products = json_decode(file_get_contents($this->filePath), true) ?: [];


    $product['id'] = $products ? max(array_column($products, 'id')) + 1 : 1;

 
    $products[] = $product;

    file_put_contents(
        $this->filePath,
        json_encode($products, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT)
    );
}


    public function findAll(): array
    {
        $data = file_get_contents($this->filePath); 
        $products = json_decode($data, true);      
        return $products ?: []; 
    }

}