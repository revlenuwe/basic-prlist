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
}