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

    public function products(ServerRequestInterface $request)
    {
        $products = $this->productManager->getSerializedProducts('name', $request->getQueryParams()['name']);

        return $this->response($products);
    }

    public function add(ServerRequestInterface $request)
    {
        $product = $this->productManager->create($request->getParsedBody());

        return $this->response(['message' => 'Product successfully added.Redirecting...', 'productId' => $product->id]);
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