<?php


namespace App\Services;


class Authenticator
{

    private UserManager $userManager;

    public function __construct()
    {
        $this->userManager = new UserManager();
    }

    public function authorize($user)
    {
        if(!$_SESSION['auth_user']){
            $_SESSION['auth_user'] = $user->id;
        }

        return true;
    }

    public function isUserLoggedIn()
    {
        if(!$_SESSION['auth_user']){
            return false;
        }

        $user = $this->userManager->getById($_SESSION['auth_user']);

        if(!$user) {
            unset($_SESSION['auth_user']);

            return false;
        }

        return true;
    }

    public function register($credentials)
    {
        $user = $this->userManager->getByUsername($credentials['username']);

        if(!$user) {
            $user = $this->userManager->create([
                'username' => $credentials['username'],
                'password' => password_hash($credentials['password'], PASSWORD_DEFAULT)
            ]);

            $this->authorize($user);

            return true;
        }

        return false;
    }

}