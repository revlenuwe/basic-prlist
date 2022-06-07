<?php


namespace App\Controllers;


use Laminas\Diactoros\Response;
use Psr\Http\Message\ServerRequestInterface;

class ProductsController
{
    public function index(ServerRequestInterface $request)
    {
        $response = new Response();

        $response->getBody()->write('Test');

        return $response;
    }
}