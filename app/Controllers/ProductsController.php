<?php


namespace App\Controllers;

use Psr\Http\Message\ServerRequestInterface;

class ProductsController extends BaseController
{
    public function index(ServerRequestInterface $request)
    {
        return $this->renderView('index.twig', [
            'test' => 'Cs'
        ]);
    }

    public function product(ServerRequestInterface $request, array $args)
    {
        return $this->renderView('product.twig', [
            'productId' => $args['id']
        ]);
    }
}