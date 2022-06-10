<?php


namespace App\Controllers;

use App\Models\Product;
use App\Services\ProductManager;
use Psr\Http\Message\ServerRequestInterface;

class ProductsController extends BaseController
{

    private $productManager;

    public function __construct()
    {
        parent::__construct();
        $this->productManager = new ProductManager();
    }

    public function index(ServerRequestInterface $request)
    {
        return $this->renderView('index.twig', []);
    }

    public function product(ServerRequestInterface $request, array $args)
    {
        $product = $this->productManager->getById($args['id']);

        if(!$product) {
            return $this->redirect('/');
        }

        return $this->renderView('product.twig', [
            'product' => $product
        ]);
    }

    public function add(ServerRequestInterface $request)
    {
        return $this->renderView('add.twig', []);
    }

    public function edit(ServerRequestInterface $request, array $args)
    {
        $product = $this->productManager->getById($args['id']);

        if(!$product) {
            return $this->redirect('/');
        }

        return $this->renderView('edit.twig', [
            'product' => $product
        ]);
    }
}