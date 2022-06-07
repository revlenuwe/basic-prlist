<?php


namespace App\Controllers;


use Twig\Environment;
use Twig\Loader\FilesystemLoader;

abstract class BaseController
{
    protected $twig;

    public function __construct()
    {
        $this->bootTwig();
    }

    private function bootTwig()
    {
        $loader = new FilesystemLoader(__DIR__ . '/../../templates');
        $this->twig = new Environment($loader, [
            'cache' => false
        ]);
    }

}