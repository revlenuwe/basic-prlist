<?php


namespace App\Controllers;


class LoginController extends BaseController
{
    public function login()
    {
        return $this->renderView('auth/login.twig', []);
    }

    public function logout()
    {
        $this->authenticator->logout();

        return $this->redirect('/auth/login');
    }
}