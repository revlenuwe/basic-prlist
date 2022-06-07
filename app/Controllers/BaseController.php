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
        $loader = new FilesystemLoader($this->basePath('templates'));
        $this->twig = new Environment($loader, [
            'cache' => false
        ]);
    }

    protected function basePath(string $path)
    {
        return __DIR__ . '/../..//' . ($path ? DIRECTORY_SEPARATOR . $path : $path);
    }

}