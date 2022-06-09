<?php


namespace App\Controllers;


class LoginController extends BaseController
{
    public function index()
    {
        return $this->renderView('auth/login.twig', []);
    }
}