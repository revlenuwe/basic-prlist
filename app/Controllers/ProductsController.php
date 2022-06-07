<?php


namespace App\Controllers;

use App\Models\Product;
use Psr\Http\Message\ServerRequestInterface;

class ProductsController extends BaseController
{
    public function index(ServerRequestInterface $request)
    {
        $products = Product::all();

        return $this->renderView('index.twig', [
            'products' => $products
        ]);
    }

    public function product(ServerRequestInterface $request, array $args)
    {

        return $this->renderView('product.twig', [
            'productId' => $args['id']
        ]);
    }
}