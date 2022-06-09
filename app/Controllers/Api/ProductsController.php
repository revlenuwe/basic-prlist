<?php


namespace App\Controllers\Api;


use App\Services\ProductManager;
use Psr\Http\Message\ServerRequestInterface;

class ProductsController extends BaseApiController
{
    private ProductManager $productManager;

    public function __construct()
    {
        $this->productManager = new ProductManager();
    }

    public function edit(ServerRequestInterface $request, array $args)
    {
        $product = $this->productManager->getById($args['id']);

        if(!$product) {
            return $this->response([
                'error' => 'Unable to edit product'
            ]);
        }

        $product->update($request->getParsedBody());

        return $this->response(['message' => 'Changes successfully saved']);
    }
}