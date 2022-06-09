<?php


namespace App\Controllers;


use App\Services\Authenticator;
use Laminas\Diactoros\Response;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use Laminas\Diactoros\Response\RedirectResponse;

abstract class BaseController
{
    protected $twig;
    protected $authenticator;

    public function __construct()
    {
        $this->bootTwig();
        $this->authenticator = new Authenticator();
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

    public function renderView(string $view, array $data)
    {
        $response = new Response();

        $isLoggedIn = $this->authenticator->isUserLoggedIn();
        $authUser = $isLoggedIn ? $this->authenticator->getAuthUser() : null;

        $response->getBody()->write(
            $this->twig->render(
                $view,
                array_merge($data, ['isUserLoggedIn' => $isLoggedIn, 'authUser' => $authUser])
            )
        );

        return $response;
    }

    public function redirect(string $url, int $status = 302) {
        return new RedirectResponse($url, $status);
    }

}