<?php


namespace App\Controllers;


class RegisterController extends BaseController
{
    public function index()
    {
        return $this->renderView('auth/register.twig', []);
    }
}