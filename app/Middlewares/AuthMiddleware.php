<?php


namespace App\Middlewares;


use App\Services\Authenticator;
use Laminas\Diactoros\Response\RedirectResponse;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Psr\Http\Server\MiddlewareInterface;
use Psr\Http\Server\RequestHandlerInterface;

class AuthMiddleware implements MiddlewareInterface
{


    private Authenticator $authenticator;

    public function __construct()
    {
        $this->authenticator = new Authenticator();
    }

    public function process(ServerRequestInterface $request, RequestHandlerInterface $handler): ResponseInterface
    {
        $auth = $this->authenticator->isUserLoggedIn();

        if($auth) {
            return $handler->handle($request);
        }

        return new RedirectResponse('/auth/login');
    }
}