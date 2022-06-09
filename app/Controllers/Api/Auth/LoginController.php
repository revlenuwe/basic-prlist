<?php


namespace App\Controllers\Api\Auth;


use App\Controllers\Api\BaseApiController;
use App\Services\Authenticator;
use Psr\Http\Message\ServerRequestInterface;

class LoginController extends BaseApiController
{
    private Authenticator $authenticator;

    public function __construct()
    {
        $this->authenticator = new Authenticator();
    }

    public function __invoke(ServerRequestInterface $request)
    {
        $auth = $this->authenticator->login($request->getParsedBody());

        if(!$auth) {
            return $this->response([
                'error' => 'Wrong password or user does not exist'
            ], 422);
        }

        return $this->response([
            'authenticated' => true
        ]);
    }
}