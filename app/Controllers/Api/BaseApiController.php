<?php


namespace App\Controllers\Api;


use Laminas\Diactoros\Response;

abstract class BaseApiController
{
    public function response(array $data)
    {
        $response = new Response();

        $response->getBody()->write(json_encode($data));

        return $response->withAddedHeader('content-type', 'application/json')->withStatus(200);
    }
}