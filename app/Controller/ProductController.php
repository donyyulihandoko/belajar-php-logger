<?php

namespace App\Controller;

class ProductController
{
    public function categories(string $productId, string $categoryId): void
    {
        echo "Product $productId, Categories $categoryId";
    }
}
