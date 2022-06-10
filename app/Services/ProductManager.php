<?php


namespace App\Services;


use App\Models\Product;

class ProductManager
{
    public function getAll(string $field = 'id', string $orderBy = 'desc')
    {
        return Product::orderBy($field, $orderBy)->get();
    }

    public function getSerializedProducts(string $searchBy, string $searchText = null)
    {
        return Product::where($searchBy,'like', '%'.$searchText.'%')->get()->toArray();
    }

    public function getById(int $id)
    {
        return Product::find($id);
    }

    public function create(array $data)
    {
        return Product::create($data);
    }
}