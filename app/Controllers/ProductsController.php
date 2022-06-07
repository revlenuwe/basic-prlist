<?php


namespace App\Controllers;

use App\Models\Product;
use App\Services\ProductManager;
use Laminas\Diactoros\Response\RedirectResponse;
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
        $products = $this->productManager->getAll();

        return $this->renderView('index.twig', [
            'products' => $products
        ]);
    }

    public function product(ServerRequestInterface $request, array $args)
    {
        $product = $this->productManager->getById($args['id']);

        if(!$product) {
            return new RedirectResponse('/');
        }

        return $this->renderView('product.twig', [
            'product' => $product
        ]);
    }
}