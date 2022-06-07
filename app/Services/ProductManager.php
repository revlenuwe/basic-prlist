<?php


namespace App\Services;


use App\Models\Product;

class ProductManager
{
    public function getAll(string $field = 'id', string $orderBy = 'desc')
    {
        return Product::orderBy($field, $orderBy)->get();
    }

    public function getById(int $id)
    {
        return Product::find($id);
    }
}