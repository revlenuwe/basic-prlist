<?php


namespace App\Controllers\Api\Auth;


use App\Controllers\Api\BaseApiController;
use App\Services\Authenticator;
use Psr\Http\Message\ServerRequestInterface;

class RegisterController extends BaseApiController
{
    private Authenticator $authenticator;

    public function __construct()
    {
        $this->authenticator = new Authenticator();
    }

    public function __invoke(ServerRequestInterface $request)
    {
        if($request->getParsedBody()['password'] != $request->getParsedBody()['password_confirmation']) {
            return $this->response([
                'error' => 'Passwords must match'
            ], 422);
        }

        $auth = $this->authenticator->register($request->getParsedBody());

        if(!$auth) {
            return $this->response([
                'error' => 'User with this username already exists'
            ], 422);
        }

        return $this->response([
            'registered' => true
        ]);
    }
}